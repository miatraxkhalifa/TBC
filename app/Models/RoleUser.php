<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'roles_id',
        'users_id',
    ];

    public function User() {
        $this->belongsToMany(User::class);
    }

    public function Role() {
        $this->belongsToMany(Role::class);
    }
}
