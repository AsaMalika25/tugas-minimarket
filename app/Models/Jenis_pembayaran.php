<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_pembayaran extends Model
{
    use HasFactory;
    protected $table = 'jenis_pembayaran';
    protected $primaryKey = 'id_jenis_pembayaran';
    protected $fillable = ['metode'];
    protected $timestamps = false;
}
