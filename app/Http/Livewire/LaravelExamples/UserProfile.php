<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\Estudiante;
use Livewire\Component;
use Livewire\WithFileUploads; //Agregado
use Illuminate\Support\Facades\DB;
use App\Models\Ficha_medica;

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
    public $dateNacimiento2;
    public $estadoCivil;
    public $nombre2;
    public $apellidoP2;
    public $apellidoM2;
    public $ultGrado2;
    public $nombreEscuela2;
    public $estados2;
    public $ciudad2;
    public $municipio2;
    public $telefono;
    public $celular;
    public $email;
    public $nombreTrabajo;
    public $telefonoEmpresa;

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

        return view('livewire.laravel-examples.user-profile');
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
                'id_programa_'=>'required',
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
                'dateNacimiento2'=>'required|date',
                'estadoCivil'=>'required',
                'nombre2'=>'required|string|max:25|min:3',
                'apellidoP2'=>'required|string|max:20|min:3',
                'apellidoM2'=>'required|string|max:20|min:3',
                'ultGrado2'=>'required',
                'nombreEscuela2'=>'required|max:50|min:3',
                'estados2'=>'required',
                'ciudad2'=>'required|string|max:25|min:3',
                'municipio2'=>'required|string|max:20|min:3',
                'telefono'=>'required|min:11|numeric',
                'celular'=>'required|min:11|numeric',
                'email'=>'required|email|unique:users|max:50|min:3',
                'nombreTrabajo'=>'required|max:50|min:3',
                'telefonoEmpresa'=>'required|min:11|numeric'
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
       $idFicha_medica_ = DB::select('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "paraxute" AND TABLE_NAME = "ficha_medica"');
/*         $idDomicilios = DB::select('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "paraxute" AND TABLE_NAME = "domicilios"');
        $idTutor1 = DB::select('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "paraxute" AND TABLE_NAME = "tutor1"');
        $idTutor2 = DB::select('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "paraxute" AND TABLE_NAME = "tutor2"'); */
        

        $fichaVals=array(
            "tipo_sangre"=>$this->tipo_sangre,
            "alergia"=>$this->alergia,
            "problemaVis"=>$this->problemaVis,
            "enfermedad_cron"=>$this->enfermedad_cron,
            "deficiencia_cogn"=>$this->deficiencia_cogn,
            "deficiencia_mot"=>$this->deficiencia_mot,
            "transtorno_Psic"=>$this->transtorno_Psic,
            "medicamentos"=>$this->medicamentos,
            "conducta"=>$this->conducta
        );

        $values = array(
            "nombre"=>$this->nombre,
            "apellido_P"=>$this->apellido_P,
            "apellido_M"=>$this->apellido_M,
            "fecha_Nac"=>$this->fecha_Nac,
            "sexo"=>$this->sexo,
            "escuela_Proc"=>$this->escuela_Proc,
            "ultimo_Grado"=>$this->ultimo_Grado,
/*             "id_programa_"=>$this->id_programa_, */
            "id_ficha_medica_"=>$this->idFicha_medica_,
/*             "id_domicilios_"=>$this->id_domicilios_,
            "id_tutor1_"=>$this->id_tutor1_,
            "id_tutor2_"=>$this->id_tutor2_ */
        );

        Estudiante::insert($values);
        $datas = ['nombre'=>$this->nombre.' '.$this->apellido_P.' '.$this->apellido_M.' ','fecha_Nac'=>$this->fecha_Nac,'sexo'=>$this->sexo,'escuela_Proc'=>$this->escuela_Proc,'ultimo_Grado'=>$this->ultimo_Grado,'id_ficha_medica_'=>$this->id_ficha_medica_];
        Ficha_medica::insert($fichaVals);
        $fichas = ['tipo_sangre'=>$this->tipo_sangre.'alergia'.$this->alergia.'problemaVis'.$this->problemaVis.'enfermedad_cron'.$this->enfermedad_cron.'deficiencia_cogn'.$this->deficiencia_cogn.'deficiencia_mot'.$this->deficiencia_mot.'transtorno_Psic'.$this->transtorno_Psic.'medicamentos'.$this->medicamentos.'conducta'.$this->conducta];
        return redirect()->route('tables', $datas, $fichas);

    }

}
