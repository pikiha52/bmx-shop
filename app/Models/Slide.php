<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'slides';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'image',
        'details'
    ];

    public function getImageAttribute($image)
    {
        return asset('storage/upload/slide/' . $image);
    }
}
