<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('video_url')->nullable()->after('pdf');
        });

        // Modify enum type to include 'video'
        DB::statement("ALTER TABLE courses MODIFY COLUMN type ENUM('ppt', 'standard', 'video') DEFAULT 'standard'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('video_url');
        });

        // Revert enum type back to original
        DB::statement("ALTER TABLE courses MODIFY COLUMN type ENUM('ppt', 'standard') DEFAULT 'standard'");
    }
};
