<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizAttempt extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the UserQuizAttempt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the quizAnswers for the UserQuizAttempt
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userQuizAnswers()
    {
        return $this->hasMany(UserQuizAnswer::class, 'user_quiz_attempt_id');
    }

    /**
     * The userAnswers that belong to the UserQuizAttempt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function userAnswers()
    // {
    //     return $this->belongsToMany(QuizQuestionOption::class, 'user_quiz_answers', 'user_quiz_attempt_id', 'quiz_question_option_id');
    // }

}
