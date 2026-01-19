<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
    $chapterType = $chapterModel->type ?? 'standard';
    $chapterFile = $chapterModel->file ?? null;
    $chapterPdf = $chapterModel->pdf ?? null;
    $chapterVideoUrl = $chapterModel->video_url ?? null;
    $isPresentationChapter = $chapterType === 'ppt' && $chapterPdf;
    $isVideoChapter = $chapterType === 'video' && $chapterVideoUrl;
    @endphp
    <title>{{ $course['title'] }} - {{ $chapter['title'] }} (Bagian {{ $partIndex }})</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-800">

    @include('navbar')

    <div class="mx-auto max-w-[980px] p-6 pt-[100px]">

        <a href="{{ route('course.show', $slug) }}"
            class="text-slate-500 hover:text-slate-700 text-sm font-medium no-underline transition-colors">
            ← Kembali ke Daftar Bab
        </a>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm mt-3 p-4">
            <div class="text-slate-500 text-xs">
                {{ $course['title'] }} › {{ $chapter['title'] }}
            </div>

            <div class="mt-2 font-bold text-gray-900">
                Bagian {{ $partIndex }} dari {{ $partCount }}
            </div>

            <div class="h-1.5 w-full bg-gray-200 rounded-full mt-1.5 overflow-hidden">
                <div class="h-full bg-green-500 transition-all duration-500 ease-out"
                    style="width: {{ $chapterProgressPct }}%"></div>
            </div>
        </div>

        @if($isPresentationChapter || $isVideoChapter)
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm mt-4 p-4">
            <div class="flex items-center gap-2.5 mb-4">
                <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center shrink-0">
                    📽️
                </div>
                <div class="font-extrabold text-gray-900 text-lg">
                    Materi {{ $chapterType === 'ppt' ? 'Presentasi' : 'Video' }} - {{ $chapter['title'] }}
                </div>
            </div>

            @if($isPresentationChapter)
            <iframe src="{{ asset($chapterPdf) }}#toolbar=1&navpanes=0&scrollbar=1"
                class="w-full min-h-[600px] border-none rounded-lg bg-slate-100"></iframe>
            <div class="mt-4 flex gap-3 flex-wrap">
                <a href="{{ asset($chapterPdf) }}" target="_blank"
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                    Unduh (PDF)
                </a>
                @if($chapterFile)
                <a href="{{ asset($chapterFile) }}" target="_blank"
                    class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition shadow-sm no-underline">
                    Unduh (PowerPoint)
                </a>
                @endif
            </div>
            @elseif($isVideoChapter)
            @php
            // Reuse simplified embed helper
            $embedUrl = $chapterVideoUrl;
            if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $chapterVideoUrl, $m)) {
                $embedUrl = 'https://www.youtube.com/embed/' . $m[1];
            } elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $chapterVideoUrl, $m)) {
                $embedUrl = 'https://www.youtube.com/embed/' . $m[1];
            } elseif (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)\/preview/', $chapterVideoUrl, $m)) {
                $embedUrl = $chapterVideoUrl;
            } elseif (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)/', $chapterVideoUrl, $m)) {
                $embedUrl = 'https://drive.google.com/file/d/' . $m[1] . '/preview';
            }
            @endphp
            <div class="relative w-full mt-2" style="padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px; background: #000;">
                <iframe src="{{ $embedUrl }}" allowfullscreen
                    class="absolute top-0 left-0 w-full h-full border-none rounded-lg"></iframe>
            </div>
            <div class="mt-4 flex gap-3 flex-wrap">
                <a href="{{ $chapterVideoUrl }}" target="_blank"
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition shadow-sm no-underline">
                    Buka di Tab Baru
                </a>
            </div>
            @endif
        </div>
        @endif

        <!-- Text content for the part (tetap ditampilkan) -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm mt-4 p-4">
            <div class="flex items-center gap-2.5 mb-2">
                <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-600 flex items-center justify-center shrink-0">
                    📘
                </div>
                <div class="font-extrabold text-gray-900 text-lg">
                    {{ $part['title'] }}
                </div>
            </div>

            <div class="space-y-4">
                @foreach(($part['content'] ?? []) as $p)
                <p class="text-slate-700 text-sm leading-relaxed">
                    {{ $p }}
                </p>
                @endforeach

                @if(empty($part['content']))
                <p class="text-slate-700 text-sm leading-relaxed italic">
                    Konten sub-bab ini sedang disusun.
                </p>
                @endif
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm mt-4 p-3 flex justify-between items-center">
            <div class="text-slate-500 text-sm">
                Lanjutkan
            </div>

            @if($nextPartIndex)
            <a class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium rounded-lg px-3 py-2 transition-colors duration-200"
                href="{{ route('course.chapter.part', ['slug'=>$slug,'chapterIndex'=>$chapterIndex,'partIndex'=>$nextPartIndex]) }}">
                Selanjutnya →
            </a>
            @elseif($nextChapterIndex)
            <a class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium rounded-lg px-3 py-2 transition-colors duration-200"
                href="{{ route('course.chapter.part', ['slug'=>$slug,'chapterIndex'=>$nextChapterIndex,'partIndex'=>1]) }}">
                Lanjut ke Bab Berikutnya →
            </a>
            @else
            <a class="bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium rounded-lg px-3 py-2 transition-colors duration-200"
                href="{{ route('course.show', $slug) }}">
                Selesai • Kembali ke Daftar Bab
            </a>
            @endif
        </div>
    </div>
</body>

</html>