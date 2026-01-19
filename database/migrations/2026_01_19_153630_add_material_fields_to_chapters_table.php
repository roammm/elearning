<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->enum('type', ['standard', 'ppt', 'video'])->default('standard')->after('description');
            $table->string('file')->nullable()->after('type');      // PPT file
            $table->string('pdf')->nullable()->after('file');       // PDF version
            $table->string('video_url')->nullable()->after('pdf');  // Video link (YouTube/GDrive)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropColumn(['type', 'file', 'pdf', 'video_url']);
        });
    }
};
