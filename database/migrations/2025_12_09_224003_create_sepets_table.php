<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sepetler', function (Blueprint $table) { // Tablo adı: sepetler
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Hangi kullanıcıya ait
            $table->foreignId('cicek_id')->constrained('cicekler')->onDelete('cascade'); // Hangi çiçek
            $table->integer('adet')->default(1); // Miktar
            $table->timestamps();

            // Aynı kullanıcının aynı çiçeği tekrar eklemesini engellemek için
            $table->unique(['user_id', 'cicek_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sepetler');
    }
};
