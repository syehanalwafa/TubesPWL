<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; // Jangan lupa import Hash facade

class User extends Authenticatable
{
    protected $table = 'tbMahasiswa';
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nrp',
        'password',  // Kolom password yang akan dienkripsi
    ];

    protected $primaryKey = 'nrp';  // Menyatakan bahwa 'nrp' adalah primary key
    public $incrementing = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Menyatakan bahwa password sudah terenkripsi
        ];
    }

    /**
     * Mutator untuk mengenkripsi password sebelum disimpan ke database.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        // Hanya enkripsi jika password tidak kosong
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);  // Mengenkripsi password
        }
    }
}

