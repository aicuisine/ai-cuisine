<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialog_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dialog_session_id');
            $table->mediumText('detectIntentResponseId')->nullable();
            $table->mediumText('lastMatchedIntent')->nullable();
            $table->mediumText('intent_original_value')->nullable();
            $table->mediumText('intent_resolved_value')->nullable();
            $table->mediumText('currentPage')->nullable();
            $table->mediumText('session_rest_name')->nullable();
            $table->mediumText('text')->nullable();
            $table->mediumText('languageCode')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dialog_requests');
    }
};
