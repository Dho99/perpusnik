<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiPribadi extends Model
{
    use HasFactory;
    protected $guarded = 'id';
    protected $fillable = [
        'userId','bookId'
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'userId');
    }

    public function book(){
        return $this->belongsTo(\App\Models\Buku::class, 'bookId');
    }

    // public function category(){}
}
