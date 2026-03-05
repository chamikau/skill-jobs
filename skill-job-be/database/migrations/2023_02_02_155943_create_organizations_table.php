<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->foreignIdFor(Admin::class)->constrained();
//            $table->unsignedBigInteger('admin_id')->nullable();
//            $table->foreign('admin_id')->references('id')->on('admins');
            $table->unsignedBigInteger('industry_type_id')->nullable();
            $table->foreign('industry_type_id')->references('id')->on('industry_types');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('name');
            $table->longText('about_the_company');
            $table->string('social_links')->nullable();
            $table->string('state');
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
        Schema::dropIfExists('organizations');
    }
};
