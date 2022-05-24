<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = 'detail_orders';
    protected $fillable = [
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
}
