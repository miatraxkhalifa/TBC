<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'name', 'views', 'slug' ,'likes', 'status', 'image', 'image_alt', 'users_id'
    ];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
            ];
    }

    public function User() {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function Body() {
        return $this->hasMany(Body::class, 'post_id');
    }

    public function Category() 
    {
        return $this->belongsToMany(Category::class, 'category_posts', 'posts_id', 'categories_id'); // Model + Intermidiate Table Name + Foreign key on Categories_Posts(this Model) + Foreign Key on related Model(Category) 
    }

    public function Comment() 
    {
        return $this->belongsToMany(Comment::class, 'comment_posts', 'posts_id', 'comments_id'); // Model + Intermidiate Table Name + Foreign key on Categories_Posts(this Model) + Foreign Key on related Model(Category) 
    }
}
