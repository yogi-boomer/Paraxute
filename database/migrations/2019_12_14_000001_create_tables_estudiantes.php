<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesEstudiantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('programa');
        Schema::dropIfExists('ficha_medica');
        Schema::dropIfExists('domicilios');

        Schema::create('ficha_medica', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_sangre');
            $table->string('alergia');
            $table->string('problemaVis');
            $table->string('enfermedad_cron');
            $table->string('discapacidad_cogn');
            $table->string('deficiencia_mot');
            $table->string('transtorno_Psic');
            $table->string('medicamentos');
            $table->string('conducta');
       
        });

        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('dir_casa');
            $table->string('estado');
            $table->string('municipio');
            $table->string('ciudad');
       
        });
        Schema::create('programa', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_programa');
            $table->string('codigo_Prog');
       
        });
        
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('id_est');
            $table->string('nombre');
            $table->string('apellido_P');
            $table->string('apellido_M');
            $table->string('sexo');
            $table->string('escuela_Proc');
            $table->string('ultimo_Grado');
            $table->timestamp('fecha_Nac');
            $table->integer('num_Tutores');
            $table->foreignId('id_programa_')->constrained('programa');
            $table->foreignId('id_ficha_medica_')->constrained('ficha_medica');
            $table->foreignId('id_domicilios_')->constrained('domicilios');

        

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('programa');

    }
}