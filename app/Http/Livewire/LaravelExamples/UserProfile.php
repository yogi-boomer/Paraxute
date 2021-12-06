<?php

namespace App\Http\Livewire\LaravelExamples;

use App\Models\Estudiante;
use Livewire\Component;
use Livewire\WithFileUploads; //Agregado

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
    public $id_ficha_medica_;
    public $tipoSangre;
    public $alergia;
    public $proVisual;
    public $enfCronica;
    public $discCogn;
    public $defMotriz;
    public $transPsic;
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
                'tipoSangre'=>'required',
                'alergia'=>'required',
                'proVisual'=>'required',
                'enfCronica'=>'required',
                'discCogn'=>'required',
                'defMotriz'=>'required',
                'transPsic'=>'required',
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

        $values = array(
            "nombre"=>$this->nombre,
            "apellido_P"=>$this->apellido_P,
            "apellido_M"=>$this->apellido_M,
            "fecha_Nac"=>$this->fecha_Nac,
            "sexo"=>$this->sexo,
            "escuela_Proc"=>$this->escuela_Proc,
            "ultimo_Grado"=>$this->ultimo_Grado,
            "id_programa_"=>$this->id_programa_,
            "id_ficha_medica_"=>$this->id_ficha_medica_,
            "id_domicilios_"=>$this->id_domicilios_,
            "id_tutor1_"=>$this->id_tutor1_,
            "id_tutor2_"=>$this->id_tutor2_
        );

        Estudiante::insert($values);
        $datas = ['nombre'=>$this->nombre.' '.$this->apellido_P.' '.$this->apellido_M.' ','fecha_Nac'=>$this->fecha_Nac,'sexo'=>$this->sexo,'escuela_Proc'=>$this->escuela_Proc,'ultimo_Grado'=>$this->ultimo_Grado];
        return redirect()->route('tables', $datas);

    }

}
