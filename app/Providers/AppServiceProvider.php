<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tüm view'larda kategorilere erişebilmek için paylaşıyoruz
        if (\Illuminate\Support\Facades\Schema::hasTable('kategoriler')) {
            $categories = \App\Models\Kategori::all();
            \Illuminate\Support\Facades\View::share('categories', $categories);
        }
    }
}
