<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profile_photo_id')->unsigned()->nullable();;
            $table->foreign('profile_photo_id')->references('id')->on('profile_photos')->onDelete('set null');
            $table->bigInteger('profile_file_id')->unsigned()->nullable();;
            $table->foreign('profile_file_id')->references('id')->on('profile_photos')->onDelete('set null');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->string('city');
            $table->string('job_type');
            $table->boolean('available');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles', );
    }
}
