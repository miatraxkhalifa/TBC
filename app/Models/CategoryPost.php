<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'posts_id',
        'categories_id',
    ];

    public function Post()
    {
        return $this->belongsTo(Post::class, 'posts_id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
