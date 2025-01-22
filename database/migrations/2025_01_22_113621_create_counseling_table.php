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
        Schema::create('counseling', function (Blueprint $table) {
            $table->id(); // kolom id (primary key, auto-increment)
            $table->unsignedBigInteger('id_students'); // kolom id_siswa (relasi ke tabel siswa)
            $table->unsignedBigInteger('id_users'); // kolom id_guru (relasi ke tabel guru)
            $table->unsignedBigInteger('id_classes'); // kolom id_kelas (relasi ke tabel kelas)
            $table->unsignedBigInteger('id_majors'); // kolom id_jurusan (relasi ke tabel jurusan)
            $table->date('tanggal'); // kolom tanggal (tanggal pengajuan)
            $table->text('keterangan'); // kolom keterangan (deskripsi pengajuan)
            $table->string('status')->default('pending'); // kolom status (default: pending)
            $table->timestamps(); // kolom created_at dan updated_at

            // Tambahkan foreign key untuk relasi
            $table->foreign('id_students')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('id_majors')->references('id')->on('majors')->onDelete('cascade');
            $table->foreign('id_classes')->references('id')->on('classes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counseling');
    }
};
