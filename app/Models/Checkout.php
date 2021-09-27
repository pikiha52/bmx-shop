<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'users_id',
        'parts_id',
        'carts_id',
        'qty'
    ];

    public function part()
	{
		return $this->hasOne(Part::class,'id','parts_id');
	}

	public function cart()
	{
		return $this->hasOne(Cart::class,'id','carts_id');
	} 
}
