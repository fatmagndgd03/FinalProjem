<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    // HasFactory'i kullanabilmek için buraya ekliyoruz:
    use HasFactory;

    protected $table = 'kategoriler'; // Tablo adı varsayılan (kategoris) değil

    // Mass Assignment Koruması
    protected $fillable = ['ad', 'slug', 'aciklama'];

    // İlişki: Bir kategoriye ait birden çok çiçek olabilir.
    public function cicekler()
    {
        // 'cicekler' tablosuna bağlantı kurmak için 'Cicek' modelini işaret ediyoruz.
        return $this->hasMany(Cicek::class);
    }
}
