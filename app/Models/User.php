<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'profile_image_path',
        'email_verified_at',
        'referral_code',
        'referred_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profileImage()
    {
        if ($this->profile_image_path) {
            return asset('uploads/profile_image/web/'.$this->profile_image_path);
        } else {
            return asset('images/avatars/profile.png');
        }
    }

    public function fullName()
    {
        return ucwords($this->first_name.' '.$this->last_name);

    }

    /**
     * Get all of the completedSection for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function completedSection()
    {
        return $this->hasMany(CompletedSection::class, 'user_id');
    }

    // /**
    //  * Get all of the completedModule for the User
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function completedModule()
    // {
    //     return $this->hasMany(CompletedModule::class);
    // }

    /**
     * Get all of the quizAttempts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizAttempts()
    {
        return $this->hasMany(UserQuizAttempt::class, 'user_id');
    }

    /**
     * Get all of the userAnswers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function userAnswers()
    {
        return $this->hasManyThrough(
            UserQuizAnswer::class,
            UserQuizAttempt::class,
            'user_id',
            'user_quiz_attempt_id',
        );
    }
}
