<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
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
        Schema::create('contacto', function (Blueprint $table) {
            $table->id();
            $table->integer('telefono');
            $table->integer('celular');
            $table->string('correo');
            $table->integer('tel_trabajo');
       
        });
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('dir_casa');
            $table->string('estado');
            $table->string('municipio');
            $table->string('ciudad');
       
        });
        Schema::create('tutor1', function (Blueprint $table) {
            $table->id();
            $table->string('parentesco');
            $table->string('nombre');
            $table->string('aprellido_p');
            $table->string('apellido_m');
            $table->string('fecha_nac');
            $table->string('ultimo_grado');
            $table->string('estado_civil');
            $table->string('nom_trabajo');
            $table->foreignId('id_contacto_')->contrained('contacto');
            $table->foreignId('id_domicilio_')->contrained('domicilios');

        });
        Schema::create('tutor2', function (Blueprint $table) {
            $table->id();
            $table->string('parentesco');
            $table->string('nombre');
            $table->string('aprellido_p');
            $table->string('apellido_m');
            $table->string('fecha_nac');
            $table->string('ultimo_grado');
            $table->string('estado_civil');
            $table->string('nom_trabajo');
            $table->foreignId('id_contacto_')->contrained('contacto');
            $table->foreignId('id_domicilio_')->contrained('domicilios');

        });
      
        Schema::create('formato', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_formato');  
        });


        Schema::create('programa', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_programa');
            $table->string('codigo_Prog');
            $table->string('num_sesiones_mes');
            $table->string('costo_mensual');
            $table->foreignId('id_formato_')->contrained('formato');                
        });

        
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_P');
            $table->string('apellido_M');
            $table->string('sexo');
            $table->string('escuela_Proc');
            $table->string('ultimo_Grado');
            $table->timestamp('fecha_Nac');
 /*          $table->integer('num_Tutores'); */
/*             $table->foreignId('id_programa_')->constrained('programa'); */
            $table->foreignId('id_ficha_medica_')->constrained('ficha_medica');
/*             $table->foreignId('id_domicilios_')->constrained('domicilios');
            $table->foreignId('id_tutor1_')->constrained('tutor1');
            $table->foreignId('id_tutor2_')->constrained('tutor2');  */
        });

        Schema::create('concepto', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_concepto');
            $table->string('codigo_con');
         
        });
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('forma_pago');
            $table->string('total');
            $table->foreignId('id_programa_')->constrained('programa');
            $table->foreignId('id_estudiante_')->constrained('estudiantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibos'); 

        Schema::dropIfExists('contacto');   
        Schema::dropIfExists('formato');    
          
        Schema::dropIfExists('concepto');    

        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('programa');    

        Schema::dropIfExists('ficha_medica');
        Schema::dropIfExists('domicilios');
        Schema::dropIfExists('tutor1');
        Schema::dropIfExists('tutor2');
    
    }
}
