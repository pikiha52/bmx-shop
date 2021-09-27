<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCategorie extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $casts = ['id' => 'string'];

    protected $fillable = [
        'id',
        'nama_kategori',
        'slug',
        'image'
    ];

    public function getImageAttribute($image)
    {
        return asset('storage/upload/part-categorie/' . $image);
    }
}
