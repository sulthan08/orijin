<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'user_id',
        'name',
        'kode_produk',
        'ram',
        'cpu',
        'gpu',
        'psu',
        'harga',
        'stock',
        'foto',
        'deskripsi',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function images() {
        return $this->hasMany('App\Models\ProductImage', 'produk_id');
    }
 
}
