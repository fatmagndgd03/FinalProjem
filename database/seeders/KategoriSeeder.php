<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Güller', 'Orkideler', 'Vazo Çiçekleri', 'Buketler', 'Saksı Çiçekleri'];

        foreach ($categories as $category) {
            DB::table('kategoriler')->insert([
                'ad' => $category,
                'slug' => Str::slug($category),
                'aciklama' => $category . ' kategorisi için açıklama.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
