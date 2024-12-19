<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationSurveyResponse extends Model
{
    protected $fillable = [
        'application_survey_id',
        'survey_question_id',
        'response'
    ];
}
