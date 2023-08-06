<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizAnswer extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the userQuizAttempts that owns the UserQuizAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userQuizAttempts()
    {
        return $this->belongsTo(UserQuizAttempts::class, 'user_quiz_attempt_id');
    }

    /**
     * Get the quizQuestionOption that owns the UserQuizAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizQuestionOption()
    {
        return $this->belongsTo(QuizQuestionOption::class, 'quiz_question_option_id');
    }
}
