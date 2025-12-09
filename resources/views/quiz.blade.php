<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuis - {{ $course['title'] }} - MediLearn</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-['Inter'] bg-slate-50 text-slate-800 m-0 p-0 antialiased">
    @include('navbar')

    <div class="max-w-[900px] mx-auto px-6 pt-[100px] pb-6">

        <a href="{{ route('course.show', $slug) }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-700 transition mb-6 no-underline font-medium text-sm">
            <span>←</span> Kembali ke Course
        </a>

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-8 mb-5">

            <div class="mb-8 pb-6 border-b-2 border-slate-100">
                <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Kuis Akhir Modul</h1>
                <p class="text-slate-500 text-base font-medium">{{ $course['title'] }}</p>
                <p class="text-slate-400 text-sm mt-2">Silakan jawab semua pertanyaan dengan benar</p>
            </div>

            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6 text-red-700 text-sm">
                <strong class="font-bold">Error:</strong> Pastikan semua pertanyaan telah dijawab sebelum mengumpulkan kuis.
            </div>
            @endif

            <form id="quiz-form" method="POST" action="{{ route('course.quiz.submit', $slug) }}">
                @csrf

                @foreach($quizzes as $index => $quiz)
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 mb-6 last:mb-0">
                    <div class="text-blue-600 text-sm font-semibold mb-2">Pertanyaan {{ $index + 1 }} dari {{ count($quizzes) }}</div>
                    <div class="text-lg font-semibold text-slate-900 mb-4 leading-relaxed">{{ $quiz['question'] }}</div>

                    <div class="space-y-2">
                        @foreach($quiz['options'] as $option)
                        <label class="flex items-center p-4 bg-white border-2 border-slate-200 rounded-lg cursor-pointer transition hover:bg-sky-50 hover:border-blue-500 has-[:checked]:border-blue-600 has-[:checked]:bg-sky-50">
                            <input type="radio"
                                name="question{{ $index }}"
                                value="{{ $option }}"
                                @checked(old("question{$index}")===$option)
                                required
                                class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500 mr-3 cursor-pointer">
                            <span class="text-slate-700 font-medium group-has-[:checked]:text-blue-700 group-has-[:checked]:font-bold">{{ $option }}</span>
                        </label>
                        @endforeach
                    </div>

                    @error("question{$index}")
                    <div class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</div>
                    @enderror
                </div>
                @endforeach

                <div class="flex gap-3 mt-8 pt-6 border-t-2 border-slate-100">
                    <button type="submit" class="inline-flex items-center justify-center px-7 py-3.5 bg-blue-600 text-white font-semibold text-base rounded-lg hover:bg-blue-700 transition shadow-sm cursor-pointer border-none">
                        Kumpulkan Jawaban
                    </button>
                    <a href="{{ route('course.show', $slug) }}" class="inline-flex items-center justify-center px-7 py-3.5 bg-slate-500 text-white font-semibold text-base rounded-lg hover:bg-slate-600 transition shadow-sm cursor-pointer border-none no-underline">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>