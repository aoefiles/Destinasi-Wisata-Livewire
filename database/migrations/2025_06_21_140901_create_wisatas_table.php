<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->foreignId('kota_id')->constrained('kotas')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->decimal('biaya_masuk', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
