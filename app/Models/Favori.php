<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cicek_id'];

    public function kullanici()
    {
        return $this->belongsTo(User::class);
    }

    public function cicek()
    {
        return $this->belongsTo(Cicek::class);
    }
}