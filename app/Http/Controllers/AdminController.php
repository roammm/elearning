<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Chapter;
use App\Models\Part;
use App\Models\Quiz;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function index(): View
    {
        $stats = [
            'courses' => Course::count(),
            'chapters' => Chapter::count(),
            'users' => User::count(),
            'quiz_groups' => Quiz::whereNotNull('name')
                ->get()
                ->groupBy(function ($quiz) {
                    return $quiz->course_id . '-' . $quiz->name;
                })
                ->count(), // Count distinct quiz groups
            'questions' => Quiz::count(), // Count total questions
        ];

        return view('admin.dashboard', compact('stats'));
    }

    // ==================== COURSES ====================

    public function courses(): View
    {
        $courses = Course::withCount(['chapters', 'quizzes'])->latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function createCourse(): View
    {
        $roles = Role::orderBy('name')->get();
        return view('admin.courses.create', compact('roles'));
    }

    public function storeCourse(Request $request): RedirectResponse
    {
        $rules = [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'required|in:ppt,standard,video',
            'file' => 'nullable|file|mimes:pptx,ppt',
            'pdf' => 'nullable|file|mimes:pdf',
            'video_url' => 'nullable|url|max:500',
            'role_ids' => 'nullable|array',
            'role_ids.*' => 'integer|exists:roles,id',
            'new_role_name' => 'nullable|string|max:255',
        ];

        // Require video_url if type is video
        if ($request->type === 'video') {
            $rules['video_url'] = 'required|url|max:500';
        }

        $validated = $request->validate($rules);

        $slug = Str::slug($validated['title']);

        // Only handle file uploads if type is ppt
        if ($validated['type'] === 'ppt') {
            if ($request->hasFile('file')) {
                $validated['file'] = $request->file('file')->store('files', 'public');
            }

            if ($request->hasFile('pdf')) {
                $validated['pdf'] = $request->file('pdf')->store('files', 'public');
            }
        } else {
            // Clear file fields if not ppt type
            $validated['file'] = null;
            $validated['pdf'] = null;
        }

        // Only store video_url if type is video
        if ($validated['type'] !== 'video') {
            $validated['video_url'] = null;
        }

        $course = Course::create(array_merge($validated, ['slug' => $slug]));

        // Ensure default role for this course exists (slug == course slug)
        $defaultRole = Role::firstOrCreate(
            ['slug' => $slug],
            ['name' => $validated['title']]
        );

        $selectedRoleIds = $request->input('role_ids', []);

        // Optionally create a new role from input
        if ($request->filled('new_role_name')) {
            $newRoleSlug = Str::slug($request->input('new_role_name'));
            if ($newRoleSlug) {
                $newRole = Role::firstOrCreate(
                    ['slug' => $newRoleSlug],
                    ['name' => $request->input('new_role_name')]
                );
                $selectedRoleIds[] = $newRole->id;
            }
        }

        // Always include the default role
        $selectedRoleIds[] = $defaultRole->id;
        $selectedRoleIds = array_values(array_unique(array_map('intval', $selectedRoleIds)));

        $course->roles()->sync($selectedRoleIds);

        return redirect()->route('admin.courses')->with('success', 'Course berhasil ditambahkan.');
    }

    public function editCourse(Course $course): View
    {
        $roles = Role::orderBy('name')->get();
        $course->load('roles');
        return view('admin.courses.edit', compact('course', 'roles'));
    }

    public function updateCourse(Request $request, Course $course): RedirectResponse
    {
        $rules = [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'type' => 'required|in:ppt,standard,video',
            'file' => 'nullable|file|mimes:pptx,ppt',
            'pdf' => 'nullable|file|mimes:pdf',
            'video_url' => 'nullable|url|max:500',
            'role_ids' => 'nullable|array',
            'role_ids.*' => 'integer|exists:roles,id',
            'new_role_name' => 'nullable|string|max:255',
        ];

        // Require video_url if type is video
        if ($request->type === 'video') {
            $rules['video_url'] = 'required|url|max:500';
        }

        $validated = $request->validate($rules);

        $slug = Str::slug($validated['title']);

        // Only handle file uploads if type is ppt
        if ($validated['type'] === 'ppt') {
            if ($request->hasFile('file')) {
                if ($course->file) {
                    Storage::disk('public')->delete($course->file);
                }
                $validated['file'] = $request->file('file')->store('files', 'public');
            }

            if ($request->hasFile('pdf')) {
                if ($course->pdf) {
                    Storage::disk('public')->delete($course->pdf);
                }
                $validated['pdf'] = $request->file('pdf')->store('files', 'public');
            }
        } else {
            // Clear file fields if changing from ppt to other type
            if ($course->file) {
                Storage::disk('public')->delete($course->file);
            }
            if ($course->pdf) {
                Storage::disk('public')->delete($course->pdf);
            }
            $validated['file'] = null;
            $validated['pdf'] = null;
        }

        // Only store video_url if type is video
        if ($validated['type'] !== 'video') {
            $validated['video_url'] = null;
        }

        $course->update(array_merge($validated, ['slug' => $slug]));

        // Ensure default role for this course exists (slug == course slug)
        $defaultRole = Role::firstOrCreate(
            ['slug' => $slug],
            ['name' => $validated['title']]
        );

        $selectedRoleIds = $request->input('role_ids', []);

        if ($request->filled('new_role_name')) {
            $newRoleSlug = Str::slug($request->input('new_role_name'));
            if ($newRoleSlug) {
                $newRole = Role::firstOrCreate(
                    ['slug' => $newRoleSlug],
                    ['name' => $request->input('new_role_name')]
                );
                $selectedRoleIds[] = $newRole->id;
            }
        }

        // Always include the default role
        $selectedRoleIds[] = $defaultRole->id;
        $selectedRoleIds = array_values(array_unique(array_map('intval', $selectedRoleIds)));

        $course->roles()->sync($selectedRoleIds);

        return redirect()->route('admin.courses')->with('success', 'Course berhasil diperbarui.');
    }

    public function destroyCourse(Course $course): RedirectResponse
    {
        if ($course->file) {
            Storage::disk('public')->delete($course->file);
        }
        if ($course->pdf) {
            Storage::disk('public')->delete($course->pdf);
        }
        $course->delete();

        return redirect()->route('admin.courses')->with('success', 'Course berhasil dihapus.');
    }

    // ==================== CHAPTERS ====================

    public function chapters(Course $course): View
    {
        $chapters = $course->chapters()->withCount('parts')->orderBy('order')->get();
        return view('admin.chapters.index', compact('course', 'chapters'));
    }

    public function createChapter(Course $course): View
    {
        return view('admin.chapters.create', compact('course'));
    }

    public function storeChapter(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer|min:0',
        ]);

        $course->chapters()->create($validated);

        return redirect()->route('admin.chapters', $course)->with('success', 'Chapter berhasil ditambahkan.');
    }

    public function editChapter(Chapter $chapter): View
    {
        return view('admin.chapters.edit', compact('chapter'));
    }

    public function updateChapter(Request $request, Chapter $chapter): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer|min:0',
        ]);

        $chapter->update($validated);

        return redirect()->route('admin.chapters', $chapter->course)->with('success', 'Chapter berhasil diperbarui.');
    }

    public function destroyChapter(Chapter $chapter): RedirectResponse
    {
        $course = $chapter->course;
        $chapter->delete();

        return redirect()->route('admin.chapters', $course)->with('success', 'Chapter berhasil dihapus.');
    }

    // ==================== PARTS ====================

    public function parts(Chapter $chapter): View
    {
        $parts = $chapter->parts()->orderBy('order')->get();
        return view('admin.parts.index', compact('chapter', 'parts'));
    }

    public function createPart(Chapter $chapter): View
    {
        return view('admin.parts.create', compact('chapter'));
    }

    public function storePart(Request $request, Chapter $chapter): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|array',
            'order' => 'required|integer|min:0',
        ]);

        $chapter->parts()->create($validated);

        return redirect()->route('admin.parts', $chapter)->with('success', 'Part berhasil ditambahkan.');
    }

    public function editPart(Part $part): View
    {
        return view('admin.parts.edit', compact('part'));
    }

    public function updatePart(Request $request, Part $part): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|array',
            'order' => 'required|integer|min:0',
        ]);

        $part->update($validated);

        return redirect()->route('admin.parts', $part->chapter)->with('success', 'Part berhasil diperbarui.');
    }

    public function destroyPart(Part $part): RedirectResponse
    {
        $chapter = $part->chapter;
        $part->delete();

        return redirect()->route('admin.parts', $chapter)->with('success', 'Part berhasil dihapus.');
    }

    // ==================== QUIZZES ====================

    public function quizzes(Course $course): View
    {
        // Get distinct quiz groups (by name)
        $quizGroups = Quiz::where('course_id', $course->id)
            ->whereNotNull('name')
            ->select('name')
            ->distinct()
            ->get()
            ->map(function ($quiz) use ($course) {
                $questionsCount = Quiz::where('course_id', $course->id)
                    ->where('name', $quiz->name)
                    ->count();
                return [
                    'name' => $quiz->name,
                    'questions_count' => $questionsCount,
                ];
            });

        return view('admin.quizzes.index', compact('course', 'quizGroups'));
    }

    public function quizQuestions(Course $course, string $quizName): View
    {
        $decodedQuizName = urldecode($quizName);
        
        $quizzes = $course->quizzes()
            ->where('name', $decodedQuizName)
            ->orderBy('order')
            ->get();

        if ($quizzes->isEmpty()) {
            abort(404, 'Quiz tidak ditemukan.');
        }

        return view('admin.quizzes.questions', compact('course', 'quizzes', 'quizName'));
    }

    public function createQuiz(Course $course): View
    {
        return view('admin.quizzes.create', compact('course'));
    }

    public function storeQuiz(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'question' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'answer' => 'required|string',
            'order' => 'required|integer|min:0',
        ]);

        $course->quizzes()->create($validated);

        $quizName = urlencode($validated['name']);
        return redirect()->route('admin.quizzes.questions', ['course' => $course->id, 'quizName' => $quizName])->with('success', 'Soal berhasil ditambahkan.');
    }

    public function editQuiz(Quiz $quiz): View
    {
        return view('admin.quizzes.edit', compact('quiz'));
    }

    public function updateQuiz(Request $request, Quiz $quiz): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'answer' => 'required|string',
            'order' => 'required|integer|min:0',
        ]);

        $quiz->update($validated);

        return redirect()->route('admin.quizzes', $quiz->course)->with('success', 'Quiz berhasil diperbarui.');
    }

    public function destroyQuiz(Quiz $quiz): RedirectResponse
    {
        $course = $quiz->course;
        $quiz->delete();

        return redirect()->route('admin.quizzes', $course)->with('success', 'Quiz berhasil dihapus.');
    }

    // ==================== ROLES ====================

    public function storeRole(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9_-]+$/', 'unique:roles,name'],
        ], [
            'name.required' => 'Nama role wajib diisi.',
            'name.regex' => 'Nama role hanya boleh mengandung huruf, angka, underscore (_), dan dash (-).',
            'name.unique' => 'Role dengan nama ini sudah ada.',
        ]);

        $slug = Str::slug($validated['name']);

        Role::create([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()->route('admin.users')->with('success', 'Role "' . $validated['name'] . '" berhasil ditambahkan.');
    }

    public function destroyRole(Role $role): RedirectResponse
    {
        $roleName = $role->name;
        $role->delete();

        return redirect()->route('admin.users')->with('success', 'Role "' . $roleName . '" berhasil dihapus.');
    }

    // ==================== USERS ====================

    public function users(): View
    {
        $users = User::with('roles')->latest()->get();
        $roles = Role::orderBy('name')->get();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function updateUserRole(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            // Keep admin flag role for access to admin area; "user" remains as non-admin.
            'role' => 'required|in:admin,user',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'Role user berhasil diperbarui.');
    }

    public function updateUserRoles(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'role_ids' => 'nullable|array',
            'role_ids.*' => 'integer|exists:roles,id',
        ]);

        $roleIds = array_values(array_unique(array_map('intval', $validated['role_ids'] ?? [])));
        $user->roles()->sync($roleIds);

        return redirect()->route('admin.users')->with('success', 'Akses course user berhasil diperbarui.');
    }

    public function destroyUser(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }
}
