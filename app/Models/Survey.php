<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * 
     */
    public function questions(): HasMany
    {
        return $this->hasMany(SurveyQuestion::class, 'survey_id');
    }
}
