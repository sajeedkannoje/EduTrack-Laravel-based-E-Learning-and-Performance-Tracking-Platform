<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the options for the QuizQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(QuizQuestionOption::class, 'quiz_question_id');
    }

    /**
     * Get the quiz that owns the QuizQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
