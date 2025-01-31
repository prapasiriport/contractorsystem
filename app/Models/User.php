<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'role', // เพิ่มฟิลด์ role
        'prefix', // เพิ่มฟิลด์ prefix
        'email',
        'username', // เพิ่มฟิลด์ username
        'password',
        'first_name', // เพิ่มฟิลด์ first_name
        'last_name', // เพิ่มฟิลด์ last_name
        'company_name', // เพิ่มฟิลด์ company_name
        'address', // เพิ่มฟิลด์ address
        'street', // เพิ่มฟิลด์ street
        'sub_district', // เพิ่มฟิลด์ sub_district
        'district', // เพิ่มฟิลด์ district
        'province', // เพิ่มฟิลด์ province
        'postal_code', // เพิ่มฟิลด์ postal_code
        'phone', // เพิ่มฟิลด์ phone
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
