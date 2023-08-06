<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the questions for the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id', 'id');
    }

    /**
     * Get all of the attempts for the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attempts()
    {
        return $this->hasMany(UserQuizAttempt::class, 'quiz_id');
    }

    /**
     * Get the section that owns the Quiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function correctAnswers()
    {

    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function quizExist()
    {
        return $this;
    }

    public function parentSectionCompleted()
    {
        $completed = false;
        $sectionCheck = $this->section->completedByThisUser();

        if ($sectionCheck['is_read']) {
            $completed = true;
        }

        return $completed;

    }

    // For students
    public function calculateUserScoreForQuiz(UserQuizAttempt $attempt)
    {
        // echo "<pre>";
        // print_r($attempt);
        $score = 0;
        if ($attempt->userQuizAnswers->count()) {

            foreach ($attempt->userQuizAnswers as $answer) {

                if ($answer->quizQuestionOption->is_correct) {
                    $score++;
                }
            }

        }

        return $score;
    }
}
