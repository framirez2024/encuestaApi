<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SurveyQuestion $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, SurveyQuestion $question)
    {
        $question->fill($request->all());

        $question->update();

        return response()->json(['data' => $question, 200]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveyQuestion $question)
    {
        $question->delete();

        return response()->json([], Response::HTTP_CREATED);
    }
}
