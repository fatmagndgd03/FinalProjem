<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicek extends Model
{
    use HasFactory;

    protected $table = 'cicekler'; // Tablo adı varsayılan (ciceks) değil

    protected $fillable = ['kategori_id', 'ad', 'slug', 'aciklama', 'fiyat', 'stok', 'fotograf_yolu', 'aktif_mi'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function sepetOgeleri()
    {
        return $this->hasMany(Sepet::class);
    }

    public function favoriler()
    {
        return $this->hasMany(Favori::class);
    }
}