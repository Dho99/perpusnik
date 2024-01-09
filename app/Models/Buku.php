<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = 'id';
    protected $fillable = [
        'judul',
        'penulis',
        'thumbnail',
        'penerbit',
        'views',
        'categoryId',
        'tahunTerbit'
    ];

    public function category(){
        return $this->belongsTo(\App\Models\Kategori::class, 'categoryId');
    }
}
