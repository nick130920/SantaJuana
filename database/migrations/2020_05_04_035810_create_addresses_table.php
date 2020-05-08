<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->enum('primary', ['Calle', 'Carrera', 'diagonal', 'Avenida', 'Autopista', 'Transversal', 'Rural']);
            $table->integer('number_Primary');
            $table->string('alphabetic_Primary', 1)->nullable();
            $table->boolean('bis')->default(1);
            $table->enum('zone_Primary', ['Norte', 'Sur', 'Este', 'Oeste']);
            $table->integer('number_secondary');
            $table->string('alphabetic_Secondary', 1)->nullable();
            $table->integer('property_Number');
            $table->enum('zone_Secondary', ['Norte', 'Sur', 'Este', 'Oeste']);
            $table->point('position');

            #clave foranea Perfil (fk)
            $table->unsignedBigInteger('profile_id');
            $table->foreign("profile_id")->references('id')->on('profiles')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('addresses');
    }
}
