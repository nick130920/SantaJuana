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
          //Clave foranea Adicionada de tipo de documento 
          //$table->foreignId('id_type')->constrained();
          $table->string('first_name', 30);
          $table->string('second_name', 30);
          $table->string('first_surname', 30);
          $table->string('second_surname', 30);
          $table->decimal('phone', 10, 0);
          $table->date('birth');
          $table->enum('sex', ['woman', 'man', 'other']);
          $table->enum('user_type', ['teacher', 'student', 'parent', 'manager']);
          //Clave foranea Adicionada de estado
          // Registro Secundario
          $table->string('eps', 100)->nullable();
          $table->enum('blood_type', ['A+', 'A-', 'AB+', 'AB-', 'B+', 'B-', 'O+', 'O-'])->nullable();
          $table->enum('social_stratum', ['1', '2', '3', '4', '5', '6'])->nullable();
          $table->enum('population',['Urban','Rural'])->nullable();
          
          #clave foranea Usuario (fk)
          $table->unsignedBigInteger('user_id');
          $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
          #clave foranea imagen (fk)
          $table->unsignedBigInteger('image_id');
          $table->foreign('image_id')->references('id')->on('images')->onDelete("cascade")->onUpdate("cascade")->nullable();
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
