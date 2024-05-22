<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;
    protected $table = 'kasir';
    protected $primaryKey = 'id_kasir';
    protected $fillable = ['id_cabang','nama','alamat'];
    protected $timestamps = false;
}
