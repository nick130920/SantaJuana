<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            #clave foranea departamento (fk)
            $table->unsignedBigInteger('cities_id');
            $table->foreign("cities_id")->references("id")->on("cities");      
        });
        Schema::table('groups', function (Blueprint $table) {
             #clave foranea jornada (fk)
            $table->unsignedBigInteger('working_day');
            $table->foreign("working_day")->references('id')->on('working_days');  
            #clave foranea sede (fk)
            $table->unsignedBigInteger('campus_id');
            $table->foreign("campus_id")->references('id')->on('campuses');    
            #clave foranea director (fk)
            $table->unsignedBigInteger('course_director');
            $table->foreign('course_director')->references('id')->on('teachers');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn('cities_id');
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('working_day');
            $table->dropColumn('campus_id');
        });
    }
}
