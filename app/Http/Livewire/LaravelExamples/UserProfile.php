<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\Estudiante;
use Livewire\Component;
use Livewire\WithFileUploads; //Agregado
use Illuminate\Support\Facades\DB;
use App\Models\Ficha_medica;
use App\Models\tutor1;
use App\Models\domicilios;
use App\Models\contacto;
use App\Models\referencias;
use App\Models\Programas;

class UserProfile extends Component
{

    use WithFileUploads;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    // ID's de los input del formulario

    //step one
    public $id_programa_;
    public $selectedFormat;
    public $dateRegister;
    public $nombre;
    public $apellido_P;
    public $apellido_M;
    public $estados;
    public $ciudad;
    public $municipio;
    public $dir_casa;
    public $fecha_Nac;
    public $sexo;
    public $generoOtro;
    public $ultimo_Grado;
    public $escuela_Proc;

    //step two
/*     public $id_ficha_medica_; */
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
    public $estado; 
    public $municipioP;
    public $ciudadP;

    //step four
    public $parentesco3;
    public $nombre4;
    public $apellidoP4;
    public $apellidoM4;
    public $estados4;
    public $ciudad4;
    public $municipio4;
    public $telefono3;
    public $celular3;

    // variables de conteo
    public $totalSteps = 4;
    public $currentStep = 1;

    use WithFileUploads; //Agregado

    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:10',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount() { 
        //$this->user = auth()->user();
        $this->currentStep = 1;
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
    public function render()
    {
        $progras = programas::all();
        return view('livewire.laravel-examples.user-profile', compact('progras'));
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
                'ciudad'=>'required|string|max:25|min:3',
                'municipio'=>'required|string|max:20|min:3',
                'fecha_Nac'=>'required|date',
                'sexo'=>'required',
                'generoOtro'=>' ',
                'ultimo_Grado'=>'required',
                'escuela_Proc'=>'string|max:50|min:3'
            ]);
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

        elseif($this->currentStep == 3){
            $this->validate([
                'parentesco'=>'required|string|max:20|min:3',
                'fecha_nac'=>'required|date',
                'estado_civil'=>'required',
                'nombrep'=>'required|string|max:25|min:3',
                'apellido_p'=>'required|string|max:20|min:3',
                'apellido_m'=>'required|string|max:20|min:3',
                'ultimo_grado'=>'required',
                'nombre_escuela'=>'required|max:50|min:3',
                'estado'=>'required',
                'ciudadP'=>'required|string|max:25|min:3',
                'municipioP'=>'required|string|max:20|min:3',
                'telefono'=>'required|min:11|numeric',
                'celular'=>'required|min:11|numeric',
                'correo'=>'required|max:50|min:3',
                'nom_trabajo'=>'required|max:50|min:3',
                'tel_trabajo'=>'required|min:11|numeric'
            ]);
        }
    }

    public function register(){
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $this->validate([
                'parentesco3'=>'required|string|max:20|min:3',
                'nombre4'=>'required|string|max:25|min:3',
                'apellidoP4'=>'required|string|max:20|min:3',
                'apellidoM4'=>'required|string|max:20|min:3',
                'estados4'=>'required',
                'ciudad4'=>'required|string|max:25|min:3',
                'municipio4'=>'required|string|max:20|min:3',
                'telefono3'=>'required|min:11|numeric',
                'celular3'=>'required|min:11|numeric'
            ]);
        }
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

       

        $values = array(
            "nombre"=>$this->nombre,
            "apellido_P"=>$this->apellido_P,
            "apellido_M"=>$this->apellido_M,
            "fecha_Nac"=>$this->fecha_Nac,
            "sexo"=>$this->sexo,
            "escuela_Proc"=>$this->escuela_Proc,
            "ultimo_Grado"=>$this->ultimo_Grado,
            "id_programas_"=>$this->id_programas_,
            "id_ficha_medicas_"=>$id_ficha_medica_[0]->AUTO_INCREMENT,
            "id_domicilios_"=>$idDomicilios_[0]->AUTO_INCREMENT,
            "id_tutor1s_"=>$idTutor1_[0]->AUTO_INCREMENT,
            "id_referencias_"=>$idReferencias_[0]->AUTO_INCREMENT,
        );
        Estudiante::insert($values);//insertar estudiantes



        $domTutorArray=array( //datos del domicilio del tutor 1
            "dir_casa"=>$this->dir_casap,
            "estado"=>$this->estado,
            "municipioP"=>$this->municipioP,
            "ciudad"=>$this->ciudadP,
        );
        domicilios::insert($domTutorArray);//insertar datos del domicilio del tutor 1


        $conTutor1Array=array( //datos del contacto del tutor 1

            "telefono"=>$this->telefono,
            "celular"=>$this->celular,
            "correo"=>$this->correo,
            "tel_trabajo"=>$this->tel_trabajo,
        );
        contacto::insert($conTutor1Array);//insertar datos del domicilio del tutor 1
       

        $idDomicilios = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM domicilios');
        $idTutor1 = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM tutor1s');
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
            "id_contacto_"=>$idContacto[0]->AUTO_INCREMENT,
            "id_domicilio_"=>$idDomicilios[0]->AUTO_INCREMENT,

        );
        tutor1::insert($tutor1Array);

        $idReferencias = DB::select('SELECT MAX(id) as AUTO_INCREMENT FROM referencias');
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
        
        $fichas = ['tipo_sangre'=>$this->tipo_sangre.'alergia'.$this->alergia.'problemaVis'.$this->problemaVis.'enfermedad_cron'.$this->enfermedad_cron.'deficiencia_cogn'.$this->deficiencia_cogn.'deficiencia_mot'.$this->deficiencia_mot.'transtorno_Psic'.$this->transtorno_Psic.'medicamentos'.$this->medicamentos.'conducta'.$this->conducta];
        $datas = ['nombre'=>$this->nombre.' '.$this->apellido_P.' '.$this->apellido_M.' ','fecha_Nac'=>$this->fecha_Nac,'sexo'=>$this->sexo,'escuela_Proc'=>$this->escuela_Proc,'ultimo_Grado'=>$this->ultimo_Grado,'id_ficha_medicas_'=>$id_ficha_medica_[0]->AUTO_INCREMENT,'id_programas_'=>$id_programas_[0]->AUTO_INCREMENT,'id_domicilios_'=>$idDomicilios_[0]->AUTO_INCREMENT,'id_tutor1s_'=>$idTutor1_[0]->AUTO_INCREMENT,'id_referencias_'=>$idReferencias_[0]->AUTO_INCREMENT];
        return redirect()->route('tables', $fichas, $datas);

    }

}
