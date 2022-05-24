<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'cart_id',
        'user_id',
        'nama_penerima',
        'no_tlp',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kodepos',
        'alamat',
    ];

    
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function cart() {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }
}
