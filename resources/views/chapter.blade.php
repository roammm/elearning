<!DOCTYPE html>
<html lang="id">
@php
// Determine chapter material type
// Check if chapterModel exists and has type, otherwise default to 'standard'
$chapterType = ($chapterModel && isset($chapterModel->type) && !empty($chapterModel->type)) ? $chapterModel->type : 'standard';

// Check for presentation materials (PPT)
$hasPdf = $chapterModel && !empty($chapterModel->pdf);
$hasFile = $chapterModel && !empty($chapterModel->file);
$isPresentationChapter = $chapterType === 'ppt' && ($hasPdf || $hasFile);

// Check for video materials
$isVideoChapter = $chapterType === 'video' && $chapterModel && !empty($chapterModel->video_url);

// Set presentation file paths
$presentationPdf = $hasPdf ? $chapterModel->pdf : null;
$presentationFile = $hasFile ? $chapterModel->file : null;

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
    
    // Google Drive URL handling
    if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)\/preview/', $url, $matches)) {
        return $url; // Already in preview format
    }
    if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return 'https://drive.google.com/file/d/' . $matches[1] . '/preview';
    }
    
    return $url; // Return as-is if no match
}

$embedUrl = $isVideoChapter && $chapterModel ? getEmbedUrl($chapterModel->video_url) : null;
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $course['title'] }} - {{ $chapter['title'] }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased">
    @include('navbar')

    <div class="max-w-[980px] mx-auto px-6 pt-[100px] pb-6">

        <a href="{{ route('course.show', $slug) }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-700 transition mb-4 no-underline font-medium text-sm">
            <span>←</span> Kembali ke Daftar Bab
        </a>

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-4">
            <div class="text-slate-500 text-xs mb-2">
                {{ $course['title'] }} › {{ $chapter['title'] }}
            </div>
            <div class="font-extrabold text-lg text-slate-900 mb-1">{{ $chapter['title'] }}</div>
            @if(!empty($chapter['desc']))
            <div class="text-slate-500 text-sm">{{ $chapter['desc'] }}</div>
            @endif

            @if($chapterType === 'standard' && $totalParts > 0)
            <div class="mt-4">
                <div class="flex justify-between text-xs text-slate-500 mb-1.5 font-medium">
                    <div>Progress Pembelajaran</div>
                    <div>{{ $doneParts }}/{{ $totalParts }} Bagian Selesai</div>
                </div>
                <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-600 rounded-full transition-all duration-500" style="width: {{ $totalParts > 0 ? intval(($doneParts / $totalParts) * 100) : 0 }}%"></div>
                </div>
            </div>
            @endif
        </div>

        {{-- Materi PPT --}}
        @if($isPresentationChapter)
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-4">
            <div class="font-bold text-slate-900 mb-4 text-base">Materi Presentasi</div>
            @if($presentationPdf)
            <iframe src="{{ asset('storage/' . $presentationPdf) }}#toolbar=1&navpanes=0&scrollbar=1" class="w-full min-h-[700px] border-none rounded-lg bg-slate-100"></iframe>
            <div class="mt-4 flex gap-3">
                <a href="{{ asset('storage/' . $presentationPdf) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                    Unduh (PDF)
                </a>
                @if($presentationFile)
                <a href="{{ asset('storage/' . $presentationFile) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition shadow-sm no-underline">
                    Unduh (PowerPoint)
                </a>
                @endif
            </div>
            @elseif($presentationFile)
            <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 text-center">
                <p class="text-slate-600 text-sm mb-4">File PowerPoint tersedia untuk diunduh</p>
                <a href="{{ asset('storage/' . $presentationFile) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition shadow-sm no-underline">
                    Unduh (PowerPoint)
                </a>
            </div>
            @else
            <p class="text-slate-500 text-sm italic">Materi belum tersedia.</p>
            @endif
        </div>
        @endif

        {{-- Materi Video --}}
        @if($isVideoChapter)
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
                <a href="{{ $chapterModel ? $chapterModel->video_url : '#' }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
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
                @if($chapterModel && str_contains($chapterModel->video_url, 'drive.google.com'))
                <a href="{{ str_replace('/preview', '?export=download', $embedUrl) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition shadow-sm no-underline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download
                </a>
                @endif
            </div>
            @else
            <p class="text-slate-500 text-sm italic">Video belum tersedia.</p>
            @endif
        </div>
        @endif

        {{-- Daftar Parts (Bagian-bagian) --}}
        @if(!empty($parts) && count($parts) > 0)
        <div class="flex flex-col gap-0 border-t border-slate-200 bg-white rounded-xl overflow-hidden shadow-sm mt-4">
            <div class="p-4 border-b border-slate-200 bg-slate-50">
                <div class="font-bold text-slate-900 text-sm">Bagian-bagian Materi</div>
                <div class="text-xs text-slate-500 mt-1">Klik untuk membuka bagian materi</div>
            </div>
            @foreach ($parts as $partIndex => $part)
            <a href="{{ route('course.chapter.part', ['slug'=>$slug,'chapterIndex'=>$chapterIndex,'partIndex'=>$partIndex + 1]) }}" 
                class="flex justify-between items-center p-4 border-b border-slate-100 last:border-b-0 hover:bg-slate-50 transition no-underline group">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-blue-600 text-lg shrink-0 group-hover:bg-white group-hover:border-blue-200 transition">
                        {{ $partIndex + 1 }}
                    </div>
                    <div>
                        <div class="font-bold text-slate-800 text-sm mb-0.5 group-hover:text-blue-700 transition">{{ $part['title'] }}</div>
                        @if(!empty($part['content']) && is_array($part['content']) && count($part['content']) > 0)
                        <div class="text-xs text-slate-500 leading-snug line-clamp-2">{{ $part['content'][0] }}</div>
                        @endif
                    </div>
                </div>
                <div class="text-xs text-slate-400 font-medium whitespace-nowrap ml-4">
                    →
                </div>
            </a>
            @endforeach
        </div>
        @elseif($chapterType === 'standard')
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-4">
            <p class="text-slate-500 text-sm italic text-center">Belum ada bagian materi untuk bab ini.</p>
        </div>
        @endif

        {{-- Navigation --}}
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-4 mt-4 flex justify-between items-center">
            <div class="text-slate-500 text-sm">
                @if($chapterIndex > 1)
                Bab {{ $chapterIndex - 1 }} dari {{ $chapterCount }}
                @else
                Bab pertama
                @endif
            </div>
            <div class="flex gap-2">
                @if($chapterIndex > 1)
                <a href="{{ route('course.chapter', ['slug'=>$slug,'index'=>$chapterIndex - 1]) }}" 
                    class="inline-flex items-center justify-center px-4 py-2 bg-slate-100 text-slate-700 text-sm font-medium rounded-lg hover:bg-slate-200 transition shadow-sm no-underline">
                    ← Sebelumnya
                </a>
                @endif
                @if($chapterIndex < $chapterCount)
                <a href="{{ route('course.chapter', ['slug'=>$slug,'index'=>$chapterIndex + 1]) }}" 
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                    Selanjutnya →
                </a>
                @else
                <a href="{{ route('course.show', $slug) }}" 
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                    Kembali ke Daftar Bab
                </a>
                @endif
            </div>
        </div>

    </div>

    @if($isVideoChapter)
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
