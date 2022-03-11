<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 
    ];

    public function Post() 
    {
        return $this->belongsToMany(Post::class, 'category_posts', 'categories_id', 'posts_id',); // Model + Intermidiate Table Name + Foreign key on Categories_Posts(this Model) + Foreign Key on related Model(Category) 
    }

    public function countPost()
    {
        return $this->hasMany(CategoryPost::class, 'categories_id');
    }
}
