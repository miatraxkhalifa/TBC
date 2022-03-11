<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    //use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function Role() {
        return $this->belongsToMany(Role::class, 'role_users', 'users_id', 'roles_id'); // Model + Intermidiate Table Name + Foreign key on RoleUser(this Model) + Foreign Key on related Model(Role) 
    }

    public function RoleUser() {
        return $this->hasMany(RoleUser::class, 'users_id');
    }

    public function Post() {
        return $this->hasMany(Post::class, 'users_id');
    }

    public function countPost(){
        return $this->hasMany(Post::class, 'users_id')->where('posts.status', 1);
    }

    public function countPostTest(){
        return $this->hasMany(Post::class, 'users_id')->count('posts.id');
    }

}
