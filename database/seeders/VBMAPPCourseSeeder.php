<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Database\Seeder;

class VBMAPPCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if course already exists
        $course = Course::where('slug', 'vb-mapp')->first();

        if (!$course) {
            // Create VB-MAPP course
            $course = Course::create([
                'title' => 'Verbal Behavior - Milestone Assessment and Placement Program (VB-MAPP)',
                'subtitle' => 'Materi presentasi VB-MAPP lengkap',
                'slug' => 'vb-mapp',
                'type' => 'ppt',
                'file' => 'files/VBMAPP-PPT-2025.pptx',
                'pdf' => 'files/VBMAPP-PPT-2025.pdf',
            ]);
        }

        // Clear existing quizzes for this course (if reseeding)
        Quiz::where('course_id', $course->id)->delete();

        // Insert quiz questions
        $quizzes = [
            [
                'question' => 'Apa tujuan utama dari VB-MAPP?',
                'options' => [
                    'Mengukur milestone kemampuan verbal anak.',
                    'Menentukan skor IQ anak.',
                    'Mencatat riwayat medis keluarga.',
                    'Mengukur kemampuan motorik kasar.',
                ],
                'answer' => 'Mengukur milestone kemampuan verbal anak.',
                'order' => 1,
            ],
            [
                'question' => 'Bagian Transition Assessment pada VB-MAPP digunakan untuk?',
                'options' => [
                    'Menilai kesiapan pindah ke lingkungan belajar baru.',
                    'Mengukur tinggi badan anak.',
                    'Mengetes kemampuan membaca cepat.',
                    'Menentukan skor akademik rapor.',
                ],
                'answer' => 'Menilai kesiapan pindah ke lingkungan belajar baru.',
                'order' => 2,
            ],
            [
                'question' => 'Berapa tingkat milestone yang dicakup VB-MAPP?',
                'options' => [
                    'Level 1-3 (0-48 bulan perkembangan).',
                    'Level 1-2 saja.',
                    'Level sekolah dasar kelas 4-6.',
                    'Level remaja SMP.',
                ],
                'answer' => 'Level 1-3 (0-48 bulan perkembangan).',
                'order' => 3,
            ],
            [
                'question' => 'Apa fungsi Barriers Assessment dalam VB-MAPP?',
                'options' => [
                    'Mengidentifikasi hambatan belajar seperti prompt dependency atau behavior problem.',
                    'Mengukur tinggi badan anak.',
                    'Menghitung jumlah kata yang diketahui.',
                    'Menilai kemampuan olahraga.',
                ],
                'answer' => 'Mengidentifikasi hambatan belajar seperti prompt dependency atau behavior problem.',
                'order' => 4,
            ],
            [
                'question' => 'Siapa yang idealnya menggunakan VB-MAPP?',
                'options' => [
                    'Analyzer perilaku, terapis ABA, dan pendidik khusus.',
                    'Hanya orang tua tanpa pendamping profesional.',
                    'Instruktur olahraga.',
                    'Petugas administrasi sekolah umum.',
                ],
                'answer' => 'Analyzer perilaku, terapis ABA, dan pendidik khusus.',
                'order' => 5,
            ],
        ];

        foreach ($quizzes as $quizData) {
            Quiz::create([
                'course_id' => $course->id,
                'name' => 'Quiz Akhir', // Set quiz name
                'question' => $quizData['question'],
                'options' => $quizData['options'],
                'answer' => $quizData['answer'],
                'order' => $quizData['order'],
            ]);
        }

        $this->command->info('VB-MAPP course and quizzes seeded successfully!');
    }
}

