<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'image',
        'published_at',
    ];

    // Hubungan dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Hubungan dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
