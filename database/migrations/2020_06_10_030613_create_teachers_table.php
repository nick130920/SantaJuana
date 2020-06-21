<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_id');//Codigo profesor verificación
            $table->string('study_center');//centro de estudios
            $table->string('university_degrees');//grado universitario
            $table->year('graduation_Year');//año de graduación
            $table->string('grade_rank',2);//escalafon
            $table->date('date_of_appointment');//fecha de nombramiento
            $table->integer('decree_of_appointment');//decreto de nombramiento

            #clave foranea Perfil (fk)
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('teachers');
    }
}
