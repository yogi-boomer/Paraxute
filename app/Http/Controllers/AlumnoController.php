<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use PDF;
use App\Models\User;
use Livewire\Component;
use App\Http\Livewire\LaravelExamples\UserProfile;

class AlumnoController extends Controller
{
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    // ID's de los input del formulario

    //step one
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

    //step two
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

    public function increaseStep() {
     
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
                'dateRegister'=>'required|date',
                'nombre'=>'required|string|max:25|min:3',
                'apellidoP'=>'required|string|max:20|min:3',
                'apellidoM'=>'required|string|max:20|min:3',
                'estados'=>'required',
                'ciudad'=>'required|string|max:25|min:3',
                'municipio'=>'required|string|max:20|min:3',
                'dateNacimiento'=>'required|date',
                'genero'=>'required',
                'generoOtro'=>' ',
                'ultGrado'=>'required',
                'nombreEscuela'=>'string|max:50|min:3'
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

        elseif($this->currentStep == 4){
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
    }

    public function register() {
        $this->resetErrorBag();
        if($this->currentStep == 4){
            /* $this->validate({
                
            }); */
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalStep=$this->totalSteps;
        $currentStep=$this->currentStep;
        $showSuccesNotification=$this->showSuccesNotification;
        $showDemoNotification=$this->showDemoNotification;
        return view('livewire.laravel-examples.user-profile', compact('totalStep', 'currentStep', 'showSuccesNotification', 'showDemoNotification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        $pdf = PDF::loadView('recibos.pdf');
        return $pdf->stream();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
