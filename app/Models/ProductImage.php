<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'produk_id',
        'foto',
    ];

    public function produk() {
        return $this->belongsTo('App\Models\Product','produk_id');
    }
}
