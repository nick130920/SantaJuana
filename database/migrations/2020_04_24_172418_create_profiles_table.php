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
    public function up(){
        Schema::create('profiles', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('id_number')->unique();
          $table->enum('id_type', ['RC', 'TI', 'CC', 'CE', 'PA','SI']);
          $table->string('first_name', 30);
          $table->string('second_name', 30);
          $table->string('first_surname', 30);
          $table->string('second_surname', 30);
          $table->decimal('phone', 10, 0);
          $table->date('birth');
          $table->enum('sex', ['woman', 'man', 'other']);
          $table->enum('user_type', ['teacher', 'student', 'parent', 'manager']);


          #clave foranea Usuario (fk)
          $table->unsignedBigInteger('user_id');
          $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('profiles');
    }
}
