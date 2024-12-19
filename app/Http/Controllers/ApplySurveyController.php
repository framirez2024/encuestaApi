<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSurvey;
use App\Models\ApplicationSurveyResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ApplySurveyController extends Controller
{
    /**
     * 
     */
    public function showQuestions(Request $request, ApplicationSurvey $application)
    {
        $application->survey->questions;

        return response()->json(['data' => $application], Response::HTTP_OK);
    }

    /**
     * 
     */
    public function saveSurveyApplication(Request $request, ApplicationSurvey $application)
    {
        $responses = collect();

        foreach ($request->toArray() as $key => $value) {
            $responses->add(new ApplicationSurveyResponse([
                'application_survey_id' =>  $application->id,
                'survey_question_id'    =>  $key,
                'response'              =>  $value
            ]));
        }

        ApplicationSurveyResponse::insert($responses->toArray());
        Storage::append('responses.json', json_encode($responses, JSON_PRETTY_PRINT));
        return response()->json(['data' => $request->all()], Response::HTTP_OK);
    }
}
