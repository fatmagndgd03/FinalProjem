<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Yabancı anahtar kontrolünü kapat (Truncate işlemi için gerekli)
        Schema::disableForeignKeyConstraints();

        // Önce tabloları temizle
        DB::table('cicekler')->truncate();
        DB::table('kategoriler')->truncate();

        // Yabancı anahtar kontrolünü tekrar aç
        Schema::enableForeignKeyConstraints();

        $categories = [
            'Zamansız Güller',
            'Zarif Laleler',
            'Asil Lilyum Serisi',
            'Şönil Mini Çiçekler',
            'Özel Tasarım Buketler',
            'Gülümseten Papatyalar',
            'Tek Dal Mutluluk',
            'Şönil Vazolar',
            'Saksı Çiçekleri',
        ];

        foreach ($categories as $category) {
            DB::table('kategoriler')->insert([
                'ad' => $category,
                'slug' => Str::slug($category),
                'aciklama' => ucfirst($category) . ' kategorisi.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
