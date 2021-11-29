<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;

use Livewire\Component;
use Livewire\WithFileUploads; //Agregado

class UserProfile extends Component
{
    public User $user;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    // ID's de los input del formulario
    public $selectedProgram;
    public $selectedFormat;
    public $dateRegister;
    public $nombre;
    public $apellidoP;
    public $apellidoM;
    public $estados;
    public $ciudad;
    public $municipio;
    public $dateNacimiento;
    public $genero;
    public $generoOtro;
    public $ultGrado;
    public $nombreEscuela;

    public $tipoSangre;
    public $alergia;
    public $proVisual;
    public $enfCronica;
    public $discCogn;
    public $defMotriz;
    public $transPsic;
    public $medicamentos;
    public $conducta;

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
                'selectedProgram'=>'required',
                'selectedFormat'=>'required',
                'dateRegister'=>'required',
                'nombre'=>'required|string',
                'apellidoP'=>'required|string',
                'apellidoM'=>'required|string',
                'estados'=>'required',
                'ciudad'=>'required',
                'municipio'=>'required',
                'dateNacimiento'=>'required',
                'genero'=>'required',
                'generoOtro'=>'',
                'ultGrado'=>'required',
                'nombreEscuela'=>'string|max:40|min:3'
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
    }

    public function register() {
        $this->resetErrorBag();
        if($this->currentStep == 4){
            /* $this->validate({
                
            }); */
        }
    }
}
