<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    //
    protected $table = 'questionaires';

    /**
     * Get all of the options for the question.
     */
    public function options()
    {
        return $this->hasMany('App\QuestionnaireOption', 'question_id');
    }
}
