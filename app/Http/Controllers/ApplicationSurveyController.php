<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplicationSurveyRequest;
use App\Http\Requests\UpdateApplicationSurveyRequest;
use App\Models\ApplicationSurvey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApplicationSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = ApplicationSurvey::with(['school', 'survey'])->get();

        return response()->json(['data' => $applications], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateApplicationSurveyRequest $request)
    {
        $application = ApplicationSurvey::create($request->all());

        return response()->json([], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplicationSurvey $applicationSurvey)
    {
        //

        return response()->json(['data' => $applicationSurvey], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationSurveyRequest $request, ApplicationSurvey $applicationSurvey)
    {
        $applicationSurvey->update($request->all());

        return response()->json([], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationSurvey $applicationSurvey)
    {
        //
        $applicationSurvey->delete();

        return response()->json([], Response::HTTP_CREATED);
    }
}
