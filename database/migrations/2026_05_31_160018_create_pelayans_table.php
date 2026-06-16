<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelayan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jabatan', [
                'Pendeta',
                'Majelis',
                'Vikaris'
            ]);
            $table->string('jenis_kelamin');
            $table->string('telepon')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tanggal_mulai_pelayanan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelayans');
    }
};
