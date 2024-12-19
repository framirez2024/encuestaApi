<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicationSurvey extends Model
{

    use HasFactory;
    //
    protected $fillable = [
        'school_id',
        'survey_id',
        'date'
    ];

    /**
     * 
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * 
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    /**
     * 
     */
    public function reponses(): HasMany
    {
        return $this->hasMany(ApplicationSurveyResponse::class, 'application_survey_id');
    }
}
