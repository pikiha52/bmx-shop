<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'judul',
        'slug',
        'category_id',
        'isi',
        'image'
    ];

    public function getImageAttribute($image)
    {
        return asset('storage/upload/blog/' . $image);
    }
}
