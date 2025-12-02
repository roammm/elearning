<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCompletion;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page (accessible to all users).
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Elearning modules page (moved from previous home content)
     */
    public function elearning(): View
    {
        // Load courses from database
        $courses = Course::all();
        
        $modules = $courses->map(function ($course) {
            // Get progress from completions if user is logged in
            $progress = 0;
            if (Auth::check()) {
                $completion = CourseCompletion::where('user_id', Auth::id())
                    ->where('course_slug', $course->slug)
                    ->first();
                $progress = $completion ? $completion->percentage : 0;
            }

            // Determine badge and metadata based on course type
            $badge = 'VB-MAPP'; // Default or extract from title
            if (stripos($course->title, 'VB-MAPP') !== false) {
                $badge = 'VB-MAPP';
            }

            return [
                'title' => $course->title,
                'desc' => $course->subtitle ?? 'Materi lengkap dalam bentuk presentasi interaktif',
                'hours' => $course->type === 'ppt' ? 'Self-paced' : 'Self-paced',
                'lessons' => $course->type === 'ppt' ? 'PowerPoint' : 'Chapter',
                'progress' => $progress,
                'badge' => $badge,
                'cta' => 'Buka Materi',
                'slug' => $course->slug
            ];
        })->toArray();

        // Fallback to hardcoded if no courses in database
        if (empty($modules)) {
        $modules = [
            [
                'title' => 'VB-MAPP - Verbal Behavior Program',
                'desc' => 'Materi lengkap VB-MAPP dalam bentuk presentasi interaktif',
                'hours' => 'Self-paced',
                'lessons' => 'PowerPoint',
                'progress' => 0,
                'badge' => 'VB-MAPP',
                'cta' => 'Buka Materi',
                'slug' => 'vb-mapp'
            ],
        ];
        }

        return view('elearning', ['modules' => $modules]);
    }

    /**
     * Display the leaderboard page populated with real quiz scores.
     */
    public function leaderboard(): View
    {
        $leaders = $this->buildLeaderboardEntries();
        $currentUserId = Auth::id();
        $currentUserEntry = null;
        $currentUserPosition = null;
        foreach ($leaders as $index => $leader) {
            if ((int) $leader->user_id === (int) $currentUserId) {
                $currentUserEntry = $leader;
                $currentUserPosition = $index + 1;
                break;
            }
        }

        return view('leaderboard', [
            'leaders' => $leaders,
            'currentUserId' => $currentUserId,
            'currentUserEntry' => $currentUserEntry,
            'currentUserPosition' => $currentUserPosition,
        ]);
    }

    /**
     * Display the profile page with current user data.
     */
    public function profile(): View
    {
        $user = Auth::user();
        $catalog = $this->getCatalog();

        $completions = CourseCompletion::where('user_id', $user->getAuthIdentifier())
            ->orderByDesc('completed_at')
            ->get();

        $totalModules = count($catalog);
        $modulesCompleted = $completions->count();
        $certificatesCount = $completions->where('percentage', '>=', 80)->count();
        $rawPoints = $completions->sum('score');
        $totalPoints = $rawPoints * 100;

        $metrics = [
            [
                'label' => 'Modul Selesai',
                'value' => $totalModules > 0 ? "{$modulesCompleted}/{$totalModules}" : $modulesCompleted,
                'progress' => $totalModules > 0 ? intval(($modulesCompleted / $totalModules) * 100) : 0,
            ],
            [
                'label' => 'Sertifikat',
                'value' => $certificatesCount,
                'progress' => $totalModules > 0 ? intval(($certificatesCount / $totalModules) * 100) : 0,
            ],
            [
                'label' => 'Total Poin',
                'value' => number_format($totalPoints),
                'progress' => $totalModules > 0
                    ? min(100, intval(($totalPoints / max(1, $totalModules * 500)) * 100))
                    : 0,
            ],
        ];

        $recentActivities = $completions->take(3)->map(function (CourseCompletion $completion) use ($catalog) {
            $courseTitle = $catalog[$completion->course_slug]['title'] ?? strtoupper($completion->course_slug);
            return [
                'title' => "Menyelesaikan {$courseTitle}",
                'percentage' => $completion->percentage,
                'time' => optional($completion->completed_at)->format('d M Y H:i') ?? '—',
            ];
        })->values();

        $progressList = collect($catalog)->map(function (array $course, string $slug) use ($completions) {
            $completion = $completions->firstWhere('course_slug', $slug);
            return [
                'title' => $course['title'],
                'percentage' => $completion->percentage ?? 0,
                'status' => $completion ? 'Selesai' : 'Belum selesai',
            ];
        })->values();

        $leaders = $this->buildLeaderboardEntries();
        $currentUserPosition = null;
        foreach ($leaders as $index => $leader) {
            if ((int) $leader->user_id === (int) $user->getAuthIdentifier()) {
                $currentUserPosition = $index + 1;
                break;
            }
        }

        $achievements = [
            [
                'title' => 'Fast Learner',
                'desc' => 'Selesaikan minimal 1 modul.',
                'achieved' => $modulesCompleted >= 1,
            ],
            [
                'title' => 'Perfect Score',
                'desc' => 'Raih nilai 100% pada kuis.',
                'achieved' => (bool) $completions->firstWhere('percentage', 100),
            ],
            [
                'title' => 'Certified Enthusiast',
                'desc' => 'Kumpulkan 3 sertifikat.',
                'achieved' => $certificatesCount >= 3,
            ],
            [
                'title' => 'Top Performer',
                'desc' => 'Masuk 3 besar leaderboard.',
                'achieved' => $currentUserPosition !== null && $currentUserPosition <= 3,
            ],
        ];

        return view('profile', [
            'user' => $user,
            'metrics' => $metrics,
            'recentActivities' => $recentActivities,
            'achievements' => $achievements,
            'progressList' => $progressList,
            'currentUserPosition' => $currentUserPosition,
        ]);
    }

    /**
     * Display a course page by slug with dynamic chapters & quiz.
     */
    public function course(string $slug): View
    {
        $catalog = $this->getCatalog();

        $course = $catalog[$slug] ?? [
            'title' => 'Course Tidak Ditemukan',
            'subtitle' => '—',
            'chapters' => [],
        ];

        $total = max(1, count($course['chapters']));
        $doneCount = collect($course['chapters'])->where('done', true)->count();
        $progressPct = intval(($doneCount / $total) * 100);

        $completion = null;
        if (Auth::check()) {
            $completion = CourseCompletion::where('user_id', Auth::id())
                ->where('course_slug', $slug)
                ->first();
        }

        return view('course', [
            'course' => $course,
            'slug' => $slug,
            'progressPct' => $progressPct,
            'doneCount' => $doneCount,
            'total' => $total,
            'completion' => $completion,
        ]);
    }

    /**
     * Display quiz page for a course.
     */
    public function showQuiz(string $slug): View
    {
        // Try to load from database first
        $courseModel = Course::where('slug', $slug)->with('quizzes')->first();
        
        if ($courseModel) {
            $quizzes = $courseModel->quizzes->sortBy('order')->values();
            
            if ($quizzes->isEmpty()) {
                abort(404, 'Quiz tidak ditemukan untuk course ini.');
            }

            return view('quiz', [
                'course' => [
                    'title' => $courseModel->title,
                    'slug' => $courseModel->slug,
                ],
                'quizzes' => $quizzes->map(function ($quiz) {
                    return [
                        'question' => $quiz->question,
                        'options' => $quiz->options,
                        'answer' => $quiz->answer,
                    ];
                })->toArray(),
                'slug' => $slug,
            ]);
        } else {
            // Fallback to catalog (hardcoded)
            $catalog = $this->getCatalog();
            if (! isset($catalog[$slug])) {
                abort(404);
            }

            $course = $catalog[$slug];
            $quiz = $course['quiz'] ?? [];
            if (empty($quiz)) {
                abort(404, 'Quiz tidak ditemukan untuk course ini.');
            }

            return view('quiz', [
                'course' => [
                    'title' => $course['title'],
                    'slug' => $slug,
                ],
                'quizzes' => $quiz,
                'slug' => $slug,
            ]);
        }
    }

    /**
     * Persist quiz score and redirect back to the course page.
     */
    public function submitQuiz(Request $request, string $slug): RedirectResponse
    {
        // Try to load from database first
        $courseModel = Course::where('slug', $slug)->with('quizzes')->first();
        
        if ($courseModel) {
            // Use database quizzes
            $quizzes = $courseModel->quizzes->sortBy('order')->values();
            
            if ($quizzes->isEmpty()) {
                abort(404, 'Quiz tidak ditemukan untuk course ini.');
            }

            $rules = [];
            foreach ($quizzes as $index => $_question) {
                $rules["question{$index}"] = ['required', 'string'];
            }
            $validated = $request->validate($rules, [
                'required' => 'Pertanyaan ini wajib dijawab.',
            ]);

            $score = 0;
            foreach ($quizzes as $index => $quiz) {
                if (($validated["question{$index}"] ?? null) === $quiz->answer) {
                    $score++;
                }
            }

            $total = $quizzes->count();
            $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
        } else {
            // Fallback to catalog (hardcoded)
        $catalog = $this->getCatalog();
        if (! isset($catalog[$slug])) {
            abort(404);
        }

        $course = $catalog[$slug];
        $quiz = $course['quiz'] ?? [];
        if (empty($quiz)) {
            abort(404);
        }

        $rules = [];
        foreach ($quiz as $index => $_question) {
            $rules["question{$index}"] = ['required', 'string'];
        }
        $validated = $request->validate($rules, [
            'required' => 'Pertanyaan ini wajib dijawab.',
        ]);

        $score = 0;
        foreach ($quiz as $index => $question) {
            if (($validated["question{$index}"] ?? null) === $question['answer']) {
                $score++;
            }
        }

        $total = count($quiz);
        $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
        }

        CourseCompletion::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'course_slug' => $slug,
            ],
            [
                'score' => $score,
                'total_questions' => $total,
                'percentage' => $percentage,
                'completed_at' => now(),
            ]
        );

        return redirect()
            ->route('course.show', $slug)
            ->with('quiz_result', [
                'score' => $score,
                'total' => $total,
                'percentage' => $percentage,
            ]);
    }

    /**
     * Display chapter detail page.
     */
    public function chapter(string $slug, int $index): View
    {
        // Reuse same catalog as in course()
        $catalog = $this->getCatalog();
        if (!isset($catalog[$slug])) {
            abort(404);
        }
        $course = $catalog[$slug];
        $chapters = $course['chapters'];
        if ($index < 1 || $index > count($chapters)) {
            abort(404);
        }
        // Default redirect to first part of this chapter
        return $this->chapterPart($slug, $index, 1);
    }

    /**
     * Display a specific part in a chapter.
     */
    public function chapterPart(string $slug, int $chapterIndex, int $partIndex): View
    {
        $catalog = $this->getCatalog();
        if (!isset($catalog[$slug])) abort(404);
        $course = $catalog[$slug];
        $chapters = $course['chapters'];
        if ($chapterIndex < 1 || $chapterIndex > count($chapters)) abort(404);
        $chapter = $chapters[$chapterIndex - 1];
        $parts = $chapter['parts'] ?? [ ['title' => $chapter['title'], 'content' => $chapter['content'] ?? []] ];
        if ($partIndex < 1 || $partIndex > count($parts)) abort(404);
        $part = $parts[$partIndex - 1];

        $chapterProgressPct = intval(($partIndex / max(1, count($parts))) * 100);

        // Determine next link
        $nextPartIndex = $partIndex < count($parts) ? $partIndex + 1 : null;
        $nextChapterIndex = ($nextPartIndex === null && $chapterIndex < count($chapters)) ? $chapterIndex + 1 : null;

        return view('chapter_part', [
            'slug' => $slug,
            'course' => $course,
            'chapter' => $chapter,
            'chapterIndex' => $chapterIndex,
            'chapterCount' => count($chapters),
            'part' => $part,
            'partIndex' => $partIndex,
            'partCount' => count($parts),
            'chapterProgressPct' => $chapterProgressPct,
            'nextPartIndex' => $nextPartIndex,
            'nextChapterIndex' => $nextChapterIndex,
        ]);
    }

    /**
     * Provide catalog data (loads from database first, fallback to hardcoded).
     */
    private function getCatalog(): array
    {
        $catalog = [];
        
        // Load courses from database
        $courses = Course::with(['quizzes' => function ($query) {
            $query->orderBy('order');
        }, 'chapters' => function ($query) {
            $query->orderBy('order')->with('parts');
        }])->get();

        foreach ($courses as $course) {
            // Transform chapters to array format
            $chapters = $course->chapters->map(function ($chapter) {
                $parts = $chapter->parts->map(function ($part) {
                    return [
                        'title' => $part->title,
                        'content' => $part->content ?? [],
                    ];
                })->toArray();

                return [
                    'title' => $chapter->title,
                    'desc' => $chapter->description ?? '',
                    'duration' => 'Self-paced',
                    'done' => false, // TODO: Implement progress tracking
                    'parts' => $parts,
                ];
            })->toArray();

            // Transform quizzes to array format
            $quizzes = $course->quizzes->map(function ($quiz) {
                return [
                    'question' => $quiz->question,
                    'options' => $quiz->options,
                    'answer' => $quiz->answer,
                ];
            })->toArray();

            $catalog[$course->slug] = [
                'title' => $course->title,
                'subtitle' => $course->subtitle ?? '',
                'chapters' => $chapters,
                'type' => $course->type ?? 'standard',
                'file' => $course->file,
                'pdf' => $course->pdf,
                'quiz' => $quizzes,
            ];
        }

        // Fallback to hardcoded data if database is empty
        if (empty($catalog)) {
        return [
            'vb-mapp' => [
                'title' => 'Verbal Behavior - Milestone Assessment and Placement Program (VB-MAPP)',
                'subtitle' => 'Materi presentasi VB-MAPP lengkap',
                'chapters' => [],
                'type' => 'ppt',
                'file' => 'files/VBMAPP-PPT-2025.pptx',
                'pdf' => 'files/VBMAPP-PPT-2025.pdf',
                'quiz' => [
                    [
                        'question' => 'Apa tujuan utama dari VB-MAPP?',
                        'options' => [
                            'Mengukur milestone kemampuan verbal anak.',
                            'Menentukan skor IQ anak.',
                            'Mencatat riwayat medis keluarga.',
                            'Mengukur kemampuan motorik kasar.',
                        ],
                        'answer' => 'Mengukur milestone kemampuan verbal anak.'
                    ],
                    [
                        'question' => 'Bagian Transition Assessment pada VB-MAPP digunakan untuk?',
                        'options' => [
                            'Menilai kesiapan pindah ke lingkungan belajar baru.',
                            'Mengukur tinggi badan anak.',
                            'Mengetes kemampuan membaca cepat.',
                            'Menentukan skor akademik rapor.',
                        ],
                        'answer' => 'Menilai kesiapan pindah ke lingkungan belajar baru.'
                    ],
                    [
                        'question' => 'Berapa tingkat milestone yang dicakup VB-MAPP?',
                        'options' => [
                            'Level 1-3 (0-48 bulan perkembangan).',
                            'Level 1-2 saja.',
                            'Level sekolah dasar kelas 4-6.',
                            'Level remaja SMP.',
                        ],
                        'answer' => 'Level 1-3 (0-48 bulan perkembangan).'
                    ],
                    [
                        'question' => 'Apa fungsi Barriers Assessment dalam VB-MAPP?',
                        'options' => [
                            'Mengidentifikasi hambatan belajar seperti prompt dependency atau behavior problem.',
                            'Mengukur tinggi badan anak.',
                            'Menghitung jumlah kata yang diketahui.',
                            'Menilai kemampuan olahraga.',
                        ],
                        'answer' => 'Mengidentifikasi hambatan belajar seperti prompt dependency atau behavior problem.'
                    ],
                    [
                        'question' => 'Siapa yang idealnya menggunakan VB-MAPP?',
                        'options' => [
                            'Analyzer perilaku, terapis ABA, dan pendidik khusus.',
                            'Hanya orang tua tanpa pendamping profesional.',
                            'Instruktur olahraga.',
                            'Petugas administrasi sekolah umum.',
                        ],
                        'answer' => 'Analyzer perilaku, terapis ABA, dan pendidik khusus.'
                    ],
                ],
            ],
        ];
        }

        return $catalog;
    }
    /**
     * Aggregate leaderboard entries for reuse.
     */
    private function buildLeaderboardEntries(): Collection
    {
        $userModel = new User();
        $userTable = $userModel->getTable();
        $userKey = $userModel->getKeyName();

        return CourseCompletion::query()
            ->selectRaw(
                'course_completions.user_id, ' .
                'SUM(course_completions.score) as total_score, ' .
                'SUM(course_completions.total_questions) as total_questions, ' .
                'COUNT(course_completions.id) as completions, ' .
                'MAX(course_completions.completed_at) as last_completed_at, ' .
                $userTable . '.name as name'
            )
            ->join($userTable, $userTable . '.' . $userKey, '=', 'course_completions.user_id')
            ->groupBy('course_completions.user_id', $userTable . '.name')
            ->orderByDesc('total_score')
            ->orderBy('last_completed_at')
            ->get()
            ->map(function ($row) {
                $parts = collect(preg_split('/\s+/', trim((string) $row->name)))->filter()->take(2);
                $row->initials = $parts->isEmpty()
                    ? Str::upper(Str::substr($row->name ?? 'U', 0, 1))
                    : $parts->map(fn ($part) => Str::upper(Str::substr($part, 0, 1)))->implode('');
                $row->percentage = ($row->total_questions ?? 0) > 0
                    ? round(($row->total_score / $row->total_questions) * 100)
                    : 0;
                return $row;
            });
    }
}
