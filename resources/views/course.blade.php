<!DOCTYPE html>
<html lang="id">
@php
$isPresentation = isset($course['type']) && $course['type'] === 'ppt' && !empty($course['file']);
$isVideo = isset($course['type']) && $course['type'] === 'video' && !empty($course['video_url']);
$presentationPdf = $isPresentation ? ($course['pdf'] ?? null) : null;
$quizResult = session('quiz_result');

// Function to convert video URL to embeddable format
function getEmbedUrl($url) {
if (empty($url)) return null;

// YouTube URL handling
if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
return 'https://www.youtube.com/embed/' . $matches[1];
}
if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
return 'https://www.youtube.com/embed/' . $matches[1];
}
if (preg_match('/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
return $url; // Already embed format
}

// Google Drive URL handling - check if already in preview format
if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)\/preview/', $url, $matches)) {
return $url; // Already in preview format
}
if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
return 'https://drive.google.com/file/d/' . $matches[1] . '/preview';
}

return $url; // Return as-is if no match
}

$embedUrl = $isVideo ? getEmbedUrl($course['video_url']) : null;
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
        @endif

        @if($isVideo)
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-4">
            <div class="font-bold text-slate-900 mb-4 text-base">Materi Video</div>
            @if($embedUrl)
            <div class="relative w-full" style="padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px; background: #000;">
                <iframe
                    id="video-player"
                    src="{{ $embedUrl }}"
                    class="absolute top-0 left-0 w-full h-full border-none rounded-lg"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    style="width: 100%; height: 100%;">
                </iframe>
            </div>
            <div class="mt-4 flex gap-3 flex-wrap">
                <a href="{{ $course['video_url'] }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Buka di Tab Baru
                </a>
                <button onclick="toggleFullscreen()" class="inline-flex items-center justify-center px-4 py-2 bg-slate-600 text-white text-sm font-medium rounded-lg hover:bg-slate-700 transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                    </svg>
                    Fullscreen
                </button>
                <a href="{{ $course['video_url'] }}" download class="inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition shadow-sm no-underline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download
                </a>
            </div>
            @else
            <p class="text-slate-500 text-sm italic">Video belum tersedia.</p>
            @endif
        </div>
        @endif

        {{-- Chapters selalu ditampilkan jika ada --}}
        @if(!empty($course['chapters']) && count($course['chapters']) > 0)
        <div class="flex flex-col gap-0 border-t border-slate-200 bg-white rounded-xl overflow-hidden shadow-sm mt-4">
            @foreach ($course['chapters'] as $chapter)
            <a href="{{ route('course.chapter', ['slug'=>$slug,'index'=>$loop->iteration]) }}" class="flex justify-between items-center p-4 border-b border-slate-100 last:border-b-0 hover:bg-slate-50 transition no-underline group">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-blue-600 text-lg shrink-0 group-hover:bg-white group-hover:border-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4.5 h-4.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18c-2.305 0-4.408.867-6 2.292m0-14.25v14.25" />
                        </svg>
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
        @endif

        {{-- Quiz selalu menjadi bab terakhir --}}
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

    </div>

    @if($isVideo)
    <script>
        function toggleFullscreen() {
            const iframe = document.getElementById('video-player');
            const container = iframe.parentElement;

            if (!document.fullscreenElement) {
                if (container.requestFullscreen) {
                    container.requestFullscreen();
                } else if (container.webkitRequestFullscreen) {
                    container.webkitRequestFullscreen();
                } else if (container.msRequestFullscreen) {
                    container.msRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        }

        // Handle fullscreen change event
        document.addEventListener('fullscreenchange', function() {
            const iframe = document.getElementById('video-player');
            if (document.fullscreenElement) {
                iframe.style.width = '100vw';
                iframe.style.height = '100vh';
            } else {
                iframe.style.width = '100%';
                iframe.style.height = '100%';
            }
        });
    </script>
    @endif
</body>

</html>