<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'user_id',
        'parts_id',
        'price',
        'qty_cart',
        'total',
        'weight',
    ];

    public function getImageAttribute($image)
    {
        return asset('storage/upload/part/' . $image);
    }

    public function parts()
    {
        return $this->hasMany(Part::class,'id','parts_id');
    }

    public function checkouts()
    {
        return $this->belongsTo(Checkout::class,'id','carts-id');
    }

}
