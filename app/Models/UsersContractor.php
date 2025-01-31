<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersContractor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users_contractor'; // ชื่อตารางที่เก็บข้อมูลของ contractor

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
        'tax_id',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
