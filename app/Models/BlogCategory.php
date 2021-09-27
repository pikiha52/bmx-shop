<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'category_blogs';
    protected $casts = ['id' => 'string'];
    protected $fillable = [
        'id',
        'name',
        'slug',
        'image',
    ];
    
}
