<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SepedaMotor extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = "sepeda";
    protected $primaryKey = 'id';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'brand',
        'tahun',
        'kapasitas',
        'warna',
        'harga',
        'gambar'
    ];

    // Tentukan primary key jika bukan 'id'
   
}
