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
        Schema::create('cicekler', function (Blueprint $table) { // Tablo adı: cicekler
            $table->id();
            // Kategori ID'sine bağlantı. 'onDelete('cascade')' ile kategori silinirse çiçekler de silinir.
            $table->foreignId('kategori_id')->constrained('kategoriler')->onDelete('cascade');
            $table->string('ad');
            $table->string('slug')->unique();
            $table->text('aciklama');
            $table->decimal('fiyat', 8, 2); // Fiyat (Örn: 150.99)
            $table->integer('stok')->default(0);
            $table->string('fotograf_yolu')->nullable(); // Fotoğrafın dosya yolu
            $table->boolean('aktif_mi')->default(true); // Satışta olup olmadığı
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cicekler');
    }
};
