<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestionOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the quizQuestion that owns the QuizQuestionOption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizQuestion()
    {
        return $this->belongsTo(QuizQuestion::class, 'quiz_question_id');
    }
}
