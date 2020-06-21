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
            #clave foranea estado (fk)
            $table->foreignId('statuses')->constrained();

        });
        Schema::table('profiles', function (Blueprint $table){
            #Clave foranea Tipo de Documento
            $table->foreignId('id_type')->constrained();
            #Clave foranea estado del perfil
            $table->foreignId('statuses')->constrained();
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
            $table->dropColumn('statuses');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('id_type');
            $table->dropColumn('statuses');
        });
    }
}
