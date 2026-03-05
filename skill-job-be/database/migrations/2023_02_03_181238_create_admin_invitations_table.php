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
        Schema::create('admin_invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invitee_id');
            $table->foreign('invitee_id')->references('id')->on('admins');

            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreignIdFor(\App\Models\Role::class)->constrained();

            $table->string('email');
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
        Schema::dropIfExists('admin_invitations');
    }
};
