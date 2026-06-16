<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('pengumuman', 'waktu')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->time('waktu')->nullable()->after('tanggal');
            });
        }
    }

    public function down(): void
    {
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->dropColumn('waktu');
        });
    }
};