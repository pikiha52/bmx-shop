<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'parts_id',
        'user_id',
        'address_id',
        'kurir',
        'nama_layanan',
        'harga_layanan',
        'estimasi',
        'subtotal',
        'payment_status',
        'snap_token'
    ];

    public function getImageAttribute($image)
    {
        return asset('storage/upload/part/' . $image);
    }

    public function part()
    {
        return $this->hasMany(Part::class, 'id', 'parts_id');
    }

    public function address()
    {
        return $this->hasMany(Addres::class, 'id', 'address_id');
    }
}
