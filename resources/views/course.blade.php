<!DOCTYPE html>
<html lang="id">
@php
$isPresentation = isset($course['type']) && $course['type'] === 'ppt' && !empty($course['file']);
$presentationPdf = $isPresentation ? ($course['pdf'] ?? null) : null;
$quizResult = session('quiz_result');
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $course['title'] }} - MediLearn</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased">
    @include('navbar')

    <div class="max-w-[980px] mx-auto px-6 pt-[100px] pb-6">

        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-700 transition mb-4 no-underline font-medium text-sm">
            <span>←</span> Kembali ke Modul
        </a>

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-4">
            <div class="font-extrabold text-lg text-slate-900 mb-1">{{ $course['title'] }}</div>
            <div class="text-slate-500 text-sm">{{ $course['subtitle'] }}</div>

            @if(($course['type'] ?? 'standard') === 'standard')
            <div class="mt-4">
                <div class="flex justify-between text-xs text-slate-500 mb-1.5 font-medium">
                    <div>Progress Pembelajaran</div>
                    <div>{{ $doneCount }}/{{ $total }} Bab Selesai</div>
                </div>
                <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-600 rounded-full transition-all duration-500" style="width: {{ $progressPct }}%"></div>
                </div>
            </div>
            @endif
        </div>

        @if($quizResult)
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-4 text-blue-800">
            <div class="font-bold text-blue-700 mb-1">Kuis berhasil dikumpulkan</div>
            <div class="text-sm">
                Skor Anda: <strong class="text-blue-900">{{ $quizResult['score'] }} / {{ $quizResult['total'] }}</strong> ({{ $quizResult['percentage'] }}%)
            </div>
        </div>
        @endif

        @if(!empty($completion))
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-4 text-green-800">
            <div class="font-bold text-green-700 mb-1">Catatan skor terakhir</div>
            <div class="text-sm mb-1">
                <strong class="text-green-900">{{ $completion->score }} / {{ $completion->total_questions }}</strong> ({{ $completion->percentage }}%)
            </div>
            @if($completion->completed_at)
            <div class="text-xs text-green-600">
                Diselesaikan pada {{ $completion->completed_at->format('d M Y H:i') }}
            </div>
            @endif
        </div>
        @endif

        @if ($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-4 text-red-700 text-sm font-medium">
            Pastikan semua pertanyaan telah dijawab sebelum mengumpulkan kuis.
        </div>
        @endif

        @if($isPresentation)
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-4">
            <div class="font-bold text-slate-900 mb-4 text-base">Materi Presentasi</div>
            @if($presentationPdf)
            <iframe src="{{ asset($presentationPdf) }}#toolbar=1&navpanes=0&scrollbar=1" class="w-full min-h-[700px] border-none rounded-lg bg-slate-100"></iframe>
            <div class="mt-4 flex gap-3">
                <a href="{{ asset($presentationPdf) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                    Unduh (PDF)
                </a>
                <a href="{{ asset($course['file']) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition shadow-sm no-underline">
                    Unduh (PowerPoint)
                </a>
            </div>
            @else
            <p class="text-slate-500 text-sm italic">Materi belum tersedia.</p>
            @endif
        </div>

        @if(!empty($course['quiz']) && count($course['quiz']) > 0)
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 flex items-center justify-between mt-4">
            <div>
                <div class="font-bold text-slate-900 mb-0.5">Kuis Akhir Modul</div>
                <div class="text-xs text-slate-500">Selesaikan kuis untuk mendapatkan sertifikat</div>
            </div>
            <a href="{{ route('course.quiz.show', $slug) }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                Mulai Kuis
            </a>
        </div>
        @endif

        @else
        <div class="flex flex-col gap-0 border-t border-slate-200 bg-white rounded-xl overflow-hidden shadow-sm mt-4">
            @foreach ($course['chapters'] as $chapter)
            <a href="{{ route('course.chapter.part', ['slug'=>$slug,'chapterIndex'=>$loop->iteration,'partIndex'=>1]) }}" class="flex justify-between items-center p-4 border-b border-slate-100 last:border-b-0 hover:bg-slate-50 transition no-underline group">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-blue-600 text-lg shrink-0 group-hover:bg-white group-hover:border-blue-200 transition">
                        📘
                    </div>
                    <div>
                        <div class="font-bold text-slate-800 text-sm mb-0.5 group-hover:text-blue-700 transition">{{ $chapter['title'] }}</div>
                        <div class="text-xs text-slate-500 leading-snug">{{ $chapter['desc'] }}</div>
                        @if($chapter['done'])
                        <span class="inline-block mt-2 bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full border border-green-200">
                            Selesai
                        </span>
                        @endif
                    </div>
                </div>
                <div class="text-xs text-slate-400 font-medium whitespace-nowrap ml-4">
                    {{ $chapter['duration'] }}
                </div>
            </a>
            @endforeach
        </div>

        @if(!empty($course['quiz']) && count($course['quiz']) > 0)
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 flex items-center justify-between mt-4">
            <div>
                <div class="font-bold text-slate-900 mb-0.5">Kuis Akhir Modul</div>
                <div class="text-xs text-slate-500">Selesaikan kuis untuk mendapatkan sertifikat</div>
            </div>
            <a href="{{ route('course.quiz.show', $slug) }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                Mulai Kuis
            </a>
        </div>
        @endif
        @endif

    </div>
</body>

</html>