<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\Estudiante;
use Livewire\Component;
use Livewire\WithFileUploads; //Agregado
use Carbon\Carbon; // Agregado
use Illuminate\Support\Facades\DB;
use App\Models\Ficha_medica;
use App\Models\tutor1;
use App\Models\domicilios;
use App\Models\contactos;
use App\Models\referencias;
use App\Models\Programas;
use App\Models\estado;
use Validator;
use Response;
use Redirect;
use App\Models\{ localidade, municipio};
class UserProfile extends Component
{

    use WithFileUploads;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    // ID's de los input del formulario

    //step one
    public $id_programas_;
    public $selectedFormat;
    public $dateRegister;
    public $nombre;
    public $apellido_P;
    public $apellido_M;
    public $estados=NULL;
    public $municipio=NULL;
    public $ciudad;
    public $dir_casa;
    public $fecha_Nac;
    public $sexo;
    public $generoOtro;
    public $ultimo_Grado;
    public $escuela_Proc;

    //step two
    /*public $id_ficha_medica_; */
    public $tipo_sangre;
    public $alergia;
    public $problemaVis;
    public $enfermedad_cron;
    public $deficiencia_cogn;
    public $deficiencia_mot;
    public $transtorno_Psic;
    public $medicamentos;
    public $conducta;

    //step three
    public $parentesco;
    public $fecha_nac;
    public $nombrep;
    public $estado_civil;
    public $apellido_m;
    public $apellido_p;
    public $ultimo_grado;
    public $nombre_escuela;
    public $nom_trabajo;
        //Contacto
    public $telefono;
    public $celular;
    public $correo;
    public $tel_trabajo;
        //Domicilio
    public $dir_casap;
    public $estado=NULL;
    public $municipioP=NULL;
    public $ciudadP;

    //step four
    public $parentesco3;
    public $nombre4;
    public $apellidoP4;
    public $apellidoM4;
    public $estados4=NULL;
    public $municipio4=NULL;
    public $ciudad4;
    public $telefono3;
    public $celular3;

    // variables de conteo
    public $totalSteps = 4;
    public $currentStep = 1;

    // Calcular edad
    public $edad = 0;
    //public $edad = Carbon::parse($fecha_Nac)->age;
    //public $edad=\Carbon\Carbon::parse($this->fecha_Nac->age); 

    public $estadosbase;
    public $ciudadesBase;
    public $estadoSel=NULL;
    public $localidadesBase;

    use WithFileUploads; //Agregado

    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:10',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount() { 
        $this->currentStep = 1;
        $this->ciudadesBase = collect();
        $this->localidadesBase = collect();

    }

    public function save() {
        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
    }
   
    /*public function index(Request $request)
    {
        $fecha_Nac = '1997-08-15';
        $years = Carbon::parse($fecha_Nac)->age;
        dd($years);
    }*/

    public function getAgeAttribute(){
        // $edad = \Carbon\Carbon::parse($this->fecha_Nac)->diff(\Carbon\Carbon::now())->format('%y');
        $edad = Carbon::parse($this->fecha_Nac)->age;
         
        dd($edad);
    }
 
    /*public function getAgeAttribute(){
        return Carbon::parse($this->attributes['fecha_Nac'])->age;
        if($this->age >= 18){
            $this->currentStep = 3;
        }
        elseif($this->age < 18){
            $this->currentStep = 4;
        }
    }*/

    public function render(){ 
        $estadosOwO = DB::select('SELECT id,nombre FROM estados');
        $progras = DB::select('SELECT id,tipo_programa FROM programas');
        return view('livewire.laravel-examples.user-profile', compact('progras','estadosOwO'));
    }

    /* step 1 */
    public function updatedEstados($estadoid){
        $this->ciudadesBase=municipio::where('estado_id',$estadoid)->select('nombre','id')->orderBy('nombre')->get();
    }
    
    public function updatedCiudad($ciudadid){
        if(!is_null($ciudadid)){
           $this->localidadesBase=localidade::where('municipio_id',$ciudadid)->orderBy('nombre')->get();
        }
    }

    /* step 3 */
    public function updatedEstado($estadoid){
        $this->ciudadesBase=municipio::where('estado_id',$estadoid)->select('nombre','id')->orderBy('nombre')->get();
                
    }
    public function updatedCiudadP($ciudadid){
        if(!is_null($ciudadid)){
            $this->localidadesBase=localidade::where('municipio_id',$ciudadid)->orderBy('nombre')->get();
        }
    }

    /* step 4 */ 
    public function updatedEstados4($estadoid){
        $this->ciudadesBase=municipio::where('estado_id',$estadoid)->select('nombre','id')->orderBy('nombre')->get();
                    
    }
    public function updatedCiudad4($ciudadid){
        if(!is_null($ciudadid)){
            $this->localidadesBase=localidade::where('municipio_id',$ciudadid)->orderBy('nombre')->get();
        }
    }


    public function increaseStep() {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep() {
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'selectedFormat'=>'required',
                'dateRegister'=>'required|date',
                'nombre'=>'required|string|max:25|min:3',
                'apellido_P'=>'required|string|max:20|min:3',
                'apellido_M'=>'required|string|max:20|min:3',
                'estados'=>'required',
                'ciudad'=>'required',
                'municipio'=>'required',
                'dir_casa'=>'required|string|max:40|min:3',
                'fecha_Nac'=>'required|date|before_or_equal:today',
                'sexo'=>'required',
                'generoOtro'=>' ',
                'ultimo_Grado'=>'required',
                'escuela_Proc'=>'string|max:50|min:3'
            ]);
            $edad = Carbon::parse($this->fecha_Nac)->age;
         
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'tipo_sangre'=>'required',
                'alergia'=>'required',
                'problemaVis'=>'required',
                'enfermedad_cron'=>'required',
                'deficiencia_cogn'=>'required',
                'deficiencia_mot'=>'required',
                'transtorno_Psic'=>'required',
                'medicamentos'=>'required',
                'conducta'=>'required'
            ]);
        }

        elseif(($this->currentStep == 3) && ($this->edad < 18)){
            $this->validate([
                'parentesco'=>'required',
                'fecha_nac'=>'required|date|before_or_equal:today',
                'estado_civil'=>'required',
                'nombrep'=>'required|string|max:25|min:3',
                'apellido_p'=>'required|string|max:20|min:3',
                'apellido_m'=>'required|string|max:20|min:3',
                'ultimo_grado'=>'required',
                'nombre_escuela'=>'required|max:50|min:3',
                'estado'=>'required',
                'ciudadP'=>'required',
                'municipioP'=>'required',
                'dir_casap'=>'required|string|max:40|min:3',
                'telefono'=>'required|numeric|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
                'celular'=>'required|numeric|min:10',
                'correo'=>'required|email:rfc,dns|max:50|min:3',
                'nom_trabajo'=>'required|max:50|min:3',
                'tel_trabajo'=>'required|numeric|min:10'
            ]);
        }
    }

    public function register(){
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $this->validate([
                'parentesco3'=>'required',
                'nombre4'=>'required|string|max:25|min:3',
                'apellidoP4'=>'required|string|max:20|min:3',
                'apellidoM4'=>'required|string|max:20|min:3',
                'estados4'=>'required',
                'ciudad4'=>'required',
                'municipio4'=>'required',
                'telefono3'=>'required|numeric|min:10',
                'celular3'=>'required|numeric|min:10'
            ]);
        }

        $referenciasArray=array( //datos de referencias
            "parentesco3"=>$this->parentesco3,
            "nombre4"=>$this->nombre4,
            "apellidoP4"=>$this->apellidoP4,
            "apellidoM4"=>$this->apellidoM4,
            "estados4"=>$this->estados4,
            "ciudad4"=>$this->ciudad4,
            "municipio4"=>$this->municipio4,
            "telefono3"=>$this->telefono3,
            "celular3"=>$this->celular3,
        );
        referencias::insert($referenciasArray);
        $idReferencias = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM referencias');
        //cambiar cuando se inserte la ficha medica
      
        $fichaVals=array(
            "tipo_sangre"=>$this->tipo_sangre,
            "alergia"=>$this->alergia,
            "problemaVis"=>$this->problemaVis,
            "enfermedad_cron"=>$this->enfermedad_cron,
            "discapacidad_cogn"=>$this->deficiencia_cogn,
            "deficiencia_mot"=>$this->deficiencia_mot,
            "transtorno_Psic"=>$this->transtorno_Psic,
            "medicamentos"=>$this->medicamentos,
            "conducta"=>$this->conducta
        );
        Ficha_medica::insert($fichaVals); //insertar ficha

        $id_ficha_medica_ = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM ficha_medicas');

        $domAlumnoArray=array( //datos del domicilio del estudiante 1
            "estado"=>$this->estado,
            "municipioP"=>$this->municipio,
            "ciudad"=>$this->ciudad,
            "dir_casa"=>$this->dir_casa,
        );
        domicilios::insert($domAlumnoArray);//insertar datos del estudiante 1
        $idDomicilios = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM domicilios');  

        $domTutorArray=array( //datos del domicilio del tutor 1
            "estado"=>$this->estado,
            "municipioP"=>$this->municipioP,
            "ciudad"=>$this->ciudadP,
            "dir_casa"=>$this->dir_casap,
        );
        domicilios::insert($domTutorArray);//insertar datos del domicilio del tutor 1
        $idDomicilios = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM domicilios');

        $conTutor1Array=array( //datos del contacto del tutor 1

            "telefono"=>$this->telefono,
            "celular"=>$this->celular,
            "correo"=>$this->correo,
            "tel_trabajo"=>$this->tel_trabajo,
        );
        contactos::insert($conTutor1Array);//insertar datos del contacto del tutor 1
       
       
        $idContacto = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM contactos');
        $tutor1Array=array( //datos del tutor 1 
            "parentesco"=>$this->parentesco,
            "nombre"=>$this->nombrep,
            "apellido_p"=>$this->apellido_p,
            "apellido_m"=>$this->apellido_m,
            "fecha_nac"=>$this->fecha_nac,
            "ultimo_grado"=>$this->ultimo_grado,
            "estado_civil"=>$this->estado_civil,
            "nom_trabajo"=>$this->nom_trabajo,
            "id_contactos_"=>$idContacto[0]->AUTO_INCREMENT,
            "id_domicilios_"=>$idDomicilios[0]->AUTO_INCREMENT,
            
        );
        tutor1::insert($tutor1Array);
        $idTutor1 = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM tutor1s');

        $values = array(
            "nombre"=>$this->nombre,
            "apellido_P"=>$this->apellido_P,
            "apellido_M"=>$this->apellido_M,
            "fecha_Nac"=>$this->fecha_Nac,
            "sexo"=>$this->sexo,
            "escuela_Proc"=>$this->escuela_Proc,
            "dateRegister"=>$this->dateRegister,
            "ultimo_Grado"=>$this->ultimo_Grado,
            "id_programas_"=>$this->id_programas_,
            "id_ficha_medicas_"=>$id_ficha_medica_[0]->AUTO_INCREMENT,
            "id_domicilios_"=>$idDomicilios[0]->AUTO_INCREMENT,
            "id_tutor1s_"=>$idTutor1[0]->AUTO_INCREMENT,
            "id_referencias_"=>$idReferencias[0]->AUTO_INCREMENT,
        );
        Estudiante::insert($values);//insertar estudiantes

   
        $datas = ['nombre'=>$this->nombre.' '.$this->apellido_P.' '.$this->apellido_M.' '];
        return redirect()->route('tables', $datas);

    }

}
