<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin Kullanıcısı
        User::create([
            'name' => 'Yönetici',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // Gerçek uygulamada güvenli şifre kullanın
            'role' => 'admin',
        ]);

        // Normal Test Kullanıcısı
        User::create([
            'name' => 'Müşteri',
            'email' => 'musteri@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $this->call([
            KategoriSeeder::class,
        ]);
    }
}
