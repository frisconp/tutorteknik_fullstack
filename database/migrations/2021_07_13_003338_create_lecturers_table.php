<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->string('identity_number')->nullable();
            $table->uuid('identity_image_id')->nullable();
            $table->uuid('profile_photo_id')->nullable();
            $table->uuid('user_id')->unique();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('identity_image_id')->references('id')->on('user_files');
            $table->foreign('profile_photo_id')->references('id')->on('user_files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
