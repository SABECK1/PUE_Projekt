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
        Schema::create('questionnaire_survey_question', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Questionnaire::class)->constrained();
            $table->foreignIdFor(\App\Models\SurveyQuestion::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire_survey_question');
    }
};
