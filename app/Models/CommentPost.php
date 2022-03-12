<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'posts_id',
        'comments_id',
    ];

    public function Comments()
    {
        return $this->hasMany(Comment::class, 'id', 'comments_id');
    }

}
