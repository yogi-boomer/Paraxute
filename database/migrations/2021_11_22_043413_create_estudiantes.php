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
      
        Schema::create('ficha_medicas', function (Blueprint $table) {
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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('telefono');
            $table->bigInteger('celular');
            $table->string('correo');
            $table->bigInteger('tel_trabajo');
       
        });
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();
            $table->string('dir_casa');
            $table->string('estado');
            $table->string('municipioP');
            $table->string('ciudad');
       
        });
        Schema::create('tutor1s', function (Blueprint $table) {
            $table->id();
            $table->string('parentesco');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('fecha_nac');
            $table->string('ultimo_grado');
            $table->string('estado_civil');
            $table->string('nom_trabajo');
            $table->foreignId('id_contacto_')->contrained('contactos');
            $table->foreignId('id_domicilio_')->contrained('domicilios');

        });
        Schema::create('tutor2s', function (Blueprint $table) {
            $table->id();
            $table->string('parentesco');
            $table->string('nombre');
            $table->string('apellido_p');
            $table->string('apellido_m');
            $table->string('fecha_nac');
            $table->string('ultimo_grado');
            $table->string('estado_civil');
            $table->string('nom_trabajo');
            $table->foreignId('id_contacto_')->contrained('contactos');
            $table->foreignId('id_domicilio_')->contrained('domicilios');

        });
      
        Schema::create('formato', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_formato');  
        });


        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_programa');
            $table->string('codigo_Prog');
            $table->string('num_sesiones_mes');
            $table->string('costo_mensual');
            $table->foreignId('id_formato_')->contrained('formato');                
        });

        Schema::create('referencias', function (Blueprint $table){
            $table->id();
            $table->string('parentesco3');
            $table->string('nombre4');
            $table->string('apellidoP4');
            $table->string('apellidoM4');
            $table->string('estados4');
            $table->string('ciudad4');
            $table->string('municipio4');
            $table->string('telefono3');
            $table->string('celular3');
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
            $table->foreignId('id_programas_')->constrained('programas');
            $table->foreignId('id_ficha_medicas_')->constrained('ficha_medicas');
            $table->foreignId('id_domicilios_')->constrained('domicilios');
            $table->foreignId('id_tutor1s_')->constrained('tutor1s');
           /*  $table->foreignId('id_tutor2s_')->constrained('tutor2s');  */ 
            $table->foreignId('id_referencias_')->constrained('referencias');
        });

        Schema::create('conceptos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_concepto');
            $table->string('codigo_con');
         
        });
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('forma_pago');
            $table->string('total');
            $table->foreignId('id_programas_')->constrained('programas');
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

        Schema::dropIfExists('contactos');   
        Schema::dropIfExists('formatos');    
          
        Schema::dropIfExists('concepto');    
        
        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('programas');    

        Schema::dropIfExists('ficha_medicas');
        Schema::dropIfExists('domicilios');
        Schema::dropIfExists('tutor1s');
        Schema::dropIfExists('tutor2s');
        Schema::dropIfExists('referencias');
    
    }
}
