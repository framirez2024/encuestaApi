<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\CreateSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveys = Survey::all();

        return response()->json(['data' =>  $surveys], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSurveyRequest $request)
    {
        $survey = Survey::create($request->all());

        return response()->json(['data' => $survey], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        $survey->questions;

        return response()->json(['data' => $survey], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyRequest $request, Survey $survey)
    {
        $survey->update($request->all());

        return response()->json([], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();
    }

    /**
     * 
     */
    public function addQuestion(CreateQuestionRequest $request, Survey $survey)
    {
        $question = $survey->questions()->save(new SurveyQuestion($request->all()));

        return response()->json(['data' => $question], Response::HTTP_OK);
    }
}
