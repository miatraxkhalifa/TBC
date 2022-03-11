<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'body'
    ];

    public function Post() 
    {
        return $this->belongsToMany(Post::class, 'comment_posts', 'comments_id', 'posts_id',); // Model + Intermidiate Table Name + Foreign key on Categories_Posts(this Model) + Foreign Key on related Model(Category) 
    }
}
