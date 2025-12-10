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
        Schema::create('kategoriler', function (Blueprint $table) { // Tablo adı: kategoriler
        $table->id();
        $table->string('ad')->unique();
        $table->string('slug')->unique(); // SEO dostu URL'ler için benzersiz kısayol
        $table->text('aciklama')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};
