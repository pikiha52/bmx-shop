<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $casts = ['id' => 'string'];

    protected $fillable = [
        'id',
        'name',
        'image',
    ];

    public function getImageAttribute($image)
    {
        return asset('storage/upload/brand/' . $image);
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'id', 'brand_id');
    }

}
