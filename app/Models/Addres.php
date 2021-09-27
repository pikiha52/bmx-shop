<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addres extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'users_id',
        'name',
        'phone',
        'provinsi_id',
        'kota_id',
        'kode_pos',
        'detail',
        'rincian'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'id','address_id');
    }
}
