<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $table = 'parts';
    protected $casts = ['id' => 'string', 'category_id' => 'string'];
   
    protected $fillable = [
        'id',
        'category_id',
        'brand_id',
        'merk',
        'slug',
        'image',
        'price',
        'qty',
        'weight',
        'details',
    ];

    public function getImageAttribute($image)
    {
        return asset('storage/upload/part/' . $image);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class,'id','parts_id');
    }

    public function brand()
    {
        return $this->hasMany(Brand::class, 'id', 'brand_id');
    }
 
    public function checkouts()
    {
        return $this->belongsTo(Checkout::class,'id','parts_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'id','parts_id');
    }

}
