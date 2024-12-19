<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('application_survey_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_survey_id');
            $table->unsignedBigInteger('survey_question_id');
            $table->string('response')->nullable();
            $table->timestamps();


            $table->foreign('application_survey_id')->references('id')->on('application_surveys')->onDelete('cascade');
            $table->foreign('survey_question_id')->references('id')->on('survey_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_survey_responses');
    }
};
