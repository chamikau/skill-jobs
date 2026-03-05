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
        Schema::create('industry_job_titles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('industry_type_id');
            $table->foreign('industry_type_id')->references('id')->on('industry_types');
            $table->string('industry_job_title')->nullable();
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
        Schema::dropIfExists('industry_job_titles');
    }
};
