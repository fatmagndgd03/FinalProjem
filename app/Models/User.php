<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Sepet;
use App\Models\Favori;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Sepet İlişkisi: Bir kullanıcının birden çok sepet öğesi olabilir
    public function sepetOgeleri()
    {
        // hasMany, bu modelin (User) id'sinin, Sepet tablosundaki user_id alanıyla eşleştiğini söyler.
        return $this->hasMany(Sepet::class);
    }

    // Favori İlişkisi: Bir kullanıcının birden çok favori öğesi olabilir
    public function favoriler()
    {
        return $this->hasMany(Favori::class);
    }

    /**
     * Kullanıcının kayıtlı adresleri.
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Kullanıcının geçmiş siparişleri.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
