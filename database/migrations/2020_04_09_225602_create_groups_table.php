<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('Code', 3);//Grado:6--Número:01::::601
            #clave foranea grado (fk)
            $table->unsignedBigInteger('grade_id');
            $table->foreign("grade_id")->references('id')->on('grades');    

            //llave Foranea Asignada hacia Jornada
            //Llave foranea hacia las sedes adicionadas
            //LLave foranea Estado adicionada
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
        Schema::dropIfExists('groups');
    }
}
