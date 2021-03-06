<x-layouts.base>

{{-- If the user is authenticated --}}
@auth()
    {{-- If the user is authenticated on the static sign up or the sign up page --}}
    @if (in_array(request()->route()->getName(),['static-sign-up', 'sign-up'],))
        @include('layouts.navbars.guest.sign-up')

        @include('layouts.footers.guest.with-socials')
        {{-- If the user is authenticated on the static sign in or the login page --}}
    @elseif (in_array(request()->route()->getName(),['sign-in', 'login'],))
        @include('layouts.navbars.guest.login')

        @include('layouts.footers.guest.description')
    @elseif (in_array(request()->route()->getName(),['profile', 'my-profile'],))
        @include('layouts.navbars.auth.sidebar')
        <div class="main-content position-relative bg-gray-100">
            @include('layouts.navbars.auth.nav-profile')
            <div>
                @include('layouts.footers.auth.footer')
            </div>
        </div>
        @include('components.plugins.fixed-plugin')
    @else
        @include('layouts.navbars.auth.sidebar')
        @include('layouts.navbars.auth.nav')
        @include('components.plugins.fixed-plugin')

        <main>
            <div class="container-fluid">
                <div class="row">
                    @include('layouts.footers.auth.footer')
                </div>
            </div>
        </main>
    @endif
@endauth

{{-- If the user is not authenticated (if the user is a guest) --}}
@guest
    {{-- If the user is on the login page --}}
    @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
        @include('layouts.navbars.guest.login')

        <div class="mt-5">
            @include('layouts.footers.guest.with-socials')
        </div>

        {{-- If the user is on the sign up page --}}
    @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
        <div>
            @include('layouts.navbars.guest.sign-up')

            @include('layouts.footers.guest.with-socials')
        </div>
    @endif
@endguest

</x-layouts.base>
<div>
    <div class="container-fluid">
        <div class="page-header min-height-250 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/logoregistro.png'); background-position-y: 95%;">
            <span class="mask bg-gradient-primary opacity-1"></span>
        </div>
    </div>

    <form wire:submit.prevent="save" action="#" method="POST" role="form text-left"> {{-- wire:submit.prevent="save" action="#" method="POST" role="form text-left" --}}

        {{-- STEP 1 --}}
        @if ($currentStep == 1)

        <div class="step-one">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Informaci??n del estudiante') }}</h3>
                    </div>
                    
                    <div class="card-body pt-4 p-3">
                        @if ($showDemoNotification)
                            <div wire:model="showDemoNotification" class="mt-3 alert alert-primary alert-dismissible fade show"role="alert">
                                <span class="alert-text text-white">
                                    {{ __('Est??s en una versi??n beta, no puedes actualizar perfil.') }}
                                </span>
                                <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ __('??Datos guardados correctamente!') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class= "form-group">
                                    <label for="selectedProgram">Selecciona un programa.</label>
                                    <select name="selectedProgram" id="selectedProgram" class="form-control" wire:model="selectedProgram" required>
                                        <option value="" selected>Escoge programa</option>
                                        <option value="Bater??a">Bater??a</option>
                                        <option value="Bajo El??ctrico">Bajo El??ctrico</option>
                                        <option value="Clase Muestra">Clase Muestra</option>
                                        <option value="Estimulaci??n Musical">Estimulaci??n Musical</option>
                                        <option value="Estimulaci??n Musical Temprana">Estimulaci??n Musical Temprana</option>
                                        <option value="Guitarra Ac??stica">Guitarra Ac??stica</option>
                                        <option value="Guitarra El??ctrica">Guitarra El??ctrica</option>
                                        <option value="Iniciaci??n Musical 1">Iniciaci??n Musical 1</option>
                                        <option value="Iniciaci??n Musical 2">Iniciaci??n Musical 2</option>
                                        <option value="Piano">Piano</option>
                                        <option value="Viol??n">Viol??n</option>
                                    </select>
                                    <span class="text-danger">@error('selectedProgram'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class= "form-group">
                                    <label for="selectedFormat">Selecciona un formato.</label>
                                    <select name="selectedFormat" id="selectedFormat" class="form-control" wire:model="selectedFormat" required>
                                        <option value="" selected>Escoge formato</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="+3">+3</option>
                                    </select>
                                    <span class="text-danger">@error('selectedFormat'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="dateRegister" class="form-control-label">Fecha de registro.</label>
                                <input class="form-control" type="date" value="2021-01-01" id="dateRegister" wire:model="dateRegister" required>
                                <span class="text-danger">@error('dateRegister'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre" class="form-control-label">{{ __('Nombre.') }}</label>
                                <input class="form-control" type="text" size="25" placeholder="Nombre(s)" id="nombre" wire:model="nombre" required>
                                <span class="text-danger">@error('nombre'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="apellidoP" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Paterno" id="apellidoP" wire:model="apellidoP" required>
                                <span class="text-danger">@error('apellidoP'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="apellidoM" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Materno" id="apellidoM" wire:model="apellidoM" required>
                                <span class="text-danger">@error('apellidoM'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Ubicaci??n'}}</label>
                            </div>
                            <div class="col-md-4">
                                <label for="estados">Estado.</label>
                                <select class="form-control"  name="estados" id="estados" wire:model="estados" required>
                                    <option value="" selected>Escoge estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Ciudad de M??xico">Ciudad de M??xico</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de M??xico">Estado de M??xico</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoac??n">Michoac??n</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo Le??n">Nuevo Le??n</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Quer??taro">Quer??taro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potos??">San Luis Potos??</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaluipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucat??n">Yucat??n</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                                <span class="text-danger">@error('estados'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="estados">Ciudad.</label>
                                <input class="form-control" type="text" placeholder="Ciudad" id="ciudad" size="25" wire:model="ciudad" required>
                                <span class="text-danger">@error('ciudad'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="estados">Municipio.</label>
                                <input class="form-control" type="text" placeholder="Municipio" id="municipio" size="20" wire:model="municipio" required>
                                <span class="text-danger">@error('municipio'){{ $message }}@enderror</span>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="mt-3">
                                <label for="about">Datos generales del estudiante</label>
                            </div>
                            <div class="col-md-4">
                                <label for="dateNacimiento" class="form-control-label">Fecha de nacimiento.</label>
                                <input class="form-control" type="date" value="2021-01-01" id="dateNacimiento" wire:model="dateNacimiento" required>
                                <span class="text-danger">@error('dateNacimiento'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <div>
                                    <label for="genero" class="form-control-label">G??nero.</label>
                                    <select name="genero" id="genero" class="form-control" wire:model="genero" required>
                                        <option value="" selected>Escoge g??nero</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    <span class="text-danger">@error('genero'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="generoOtro" class="form-control-label">Especifique.</label>
                                <input class="form-control" type="text" id="generoOtro" size="20" disabled="disabled" wire:model="generoOtro">
                                <span class="text-danger">@error('generoOtro'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ultGrado" class="form-control-label">??ltimo grado escolar.</label>
                                <select name="ultGrado" id="ultGrado" class="form-control" wire:model="ultGrado" required>
                                    <option value="" selected>Escoge tu ??ltimo grado escolar</option>
                                    <option value="Preescolar">Preescolar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="Universidad">Universidad</option>
                                    <option value="Maestr??a">Maestr??a</option>
                                    <option value="Doctorado">Doctorado</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                                <span class="text-danger">@error('ultGrado'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="nombreEscuela" class="form-control-label">Nombre de la escuela.</label>
                                <input class="form-control" id="nombreEscuela" type="text" size="50" wire:model="nombreEscuela" required>
                                <span class="text-danger">@error('nombreEscuela'){{ $message }}@enderror</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @endif

        {{-- STEP 2 --}}
        @if ($currentStep == 2)
            
        <div class="step-two">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Informaci??n M??dica') }}</h3>
                        <h4>Marcar <strong>s??</strong> o <strong>no</strong> seg??n corresponda.</h4>
                    </div>

                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tipoSangre" class="form-control-label">Tipo de Sangre.</label>
                                <select name="tipoSangre" id="tipoSangre" class="form-control" wire:model="tipoSangre" required>
                                    <option value="" selected>Escoge tu tipo de Sangre</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <span class="text-danger">@error('tipoSangre'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>??Es al??rgico a alguna sustancia en particular?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="alergia">
                                            <input type="radio" name="alergia" id="option1" autocomplete="off" value="S??" wire:model="alergia"> S??
                                        </label>
                                        <label>
                                            <input type="radio" name="alergia" id="option2" autocomplete="off" value="No" wire:model="alergia"> No
                                        </label>
                                        <span class="text-danger">@error('alergia'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="alergia" class="form-control" placeholder ="Sustancia en particular" wire:model="alergia">
                                        <span class="text-danger">@error('alergia'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>Problemas visuales.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="proVisual">
                                            <input type="radio" name="proVisual" id="option1" autocomplete="off" value="S??" wire:model="proVisual">S??
                                        </label>
                                        <label>
                                            <input type="radio" name="proVisual" id="option2" autocomplete="off" value="No" wire:model="proVisual">No
                                        </label>
                                        <span class="text-danger">@error('proVisual'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="proVisual" class="form-control" placeholder ="Problema visual" wire:model="proVisual">
                                        <span class="text-danger">@error('proVisual'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>Enfermedad cr??nica.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="enfCronica">
                                            <input type="radio" name="enfCronica" id="option1" autocomplete="off" value="S??" wire:model="enfCronica"> S??
                                        </label>
                                        <label>
                                            <input type="radio" name="enfCronica" id="option2" autocomplete="off" value="No" wire:model="enfCronica"> No
                                        </label>
                                        <span class="text-danger">@error('enfCronica'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="enfCronica" class="form-control" placeholder ="Enfermedad cr??nica" wire:model="enfCronica">
                                        <span class="text-danger">@error('enfCronica'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>??Presenta alg??n tipo de discapacidad cognitiva?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="discCogn">
                                            <input type="radio" name="discCogn" id="option1" autocomplete="off" value="S??" wire:model="discCogn">S??
                                        </label>
                                        <label>
                                            <input type="radio" name="discCogn" id="option2" autocomplete="off" value="No" wire:model="discCogn">No
                                        </label>
                                        <span class="text-danger">@error('discCogn'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="discCogn" class="form-control" placeholder ="Discapacidad cognitiva" wire:model="discCogn">
                                        <span class="text-danger">@error('discCogn'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>??Presenta alg??n tipo de deficiencia motriz?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="defMotriz">
                                            <input type="radio" name="defMotriz" id="option1" autocomplete="off" value="S??" wire:model="defMotriz"> S??
                                        </label>
                                        <label>
                                            <input type="radio" name="defMotriz" id="option2" autocomplete="off" value="No" wire:model="defMotriz"> No
                                        </label>
                                        <span class="text-danger">@error('defMotriz'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="defMotriz" class="form-control" placeholder ="Deficiencia motriz" wire:model="defMotriz">
                                        <span class="text-danger">@error('defMotriz'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>??Presenta alg??n tipo de transtorno psicol??gico?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="transPsic">
                                            <input type="radio" name="transPsic" id="option1" autocomplete="off" value="S??" wire:model="transPsic">S??
                                        </label>
                                        <label>
                                            <input type="radio" name="transPsic" id="option2" autocomplete="off" value="No" wire:model="transPsic">No
                                        </label>
                                        <span class="text-danger">@error('transPsic'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="transPsic" class="form-control" placeholder ="Transtorno psicol??gico" wire:model="transPsic">
                                        <span class="text-danger">@error('transPsic'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>??Toma medicamentos controlados?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="medicamentos">
                                            <input type="radio" name="medicamentos" id="option1" autocomplete="off" value="S??" wire:model="medicamentos"> S??
                                        </label>
                                        <label>
                                            <input type="radio" name="medicamentos" id="option2" autocomplete="off" value="No" wire:model="medicamentos"> No
                                        </label>
                                        <span class="text-danger">@error('medicamentos'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="medicamentos" class="form-control" placeholder ="Medicamentos controlados" wire:model="medicamentos">
                                        <span class="text-danger">@error('medicamentos'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>??Presenta problemas de conducta en la escuela de procedencia?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="conducta">
                                            <input type="radio" name="conducta" id="option1" autocomplete="off" value="S??" wire:model="conducta">S??
                                        </label>
                                        <label>
                                            <input type="radio" name="conducta" id="option2" autocomplete="off" value="No" wire:model="conducta">No
                                        </label>
                                        <span class="text-danger">@error('conducta'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="transPsic" class="form-control" placeholder ="Problemas de conducta" wire:model="conducta">
                                        <span class="text-danger">@error('conducta'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>        
        @endif

        @if ($currentStep == 3)
        {{-- STEP 3 --}}
        <div class="step-three">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Informaci??n de Tutor') }}</h3>
                    </div>
                    
                    <div class="card-body pt-4 p-3">
                        @if ($showDemoNotification)
                            <div wire:model="showDemoNotification" class="mt-3 alert alert-primary alert-dismissible fade show"role="alert">
                                <span class="alert-text text-white">
                                    {{ __('Est??s en una versi??n beta, no puedes actualizar perfil.') }}
                                </span>
                                <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ __('??Datos guardados correctamente!') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <label for="parentesco" class="form-control-label">Parentesco.</label>
                                <input type="text" name="parentesco" class="form-control" size="20" placeholder="Parentesco" id="parentesco" wire:model="parentesco">
                                <span class="text-danger">@error('parentesco'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-4">
                                <label for="dateNacimiento2" class="form-control-label">Fecha de nacimiento.</label>
                                <input class="form-control" type="date" value="2021-01-01" id="dateNacimiento2" wire:model="dateNacimiento2" required>
                                <span class="text-danger">@error('dateNacimiento2'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-4">
                                <label for="estadoCivil" class="form-control-label">Estado civil.</label>
                                <select name="estadoCivil" id="estadoCivil" class="form-control" wire:model="estadoCivil" required>
                                    <option value="" selected>Escoge tu estado civil</option>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Separaci??n en proceso judicial">Separaci??n en proceso judicial</option>
                                    <option value="Viudo">Viudo</option>
                                    <option value="Concubinato">Concubinato</option>
                                </select>
                                <span class="text-danger">@error('estadoCivil'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre2" class="form-control-label">{{ __('Nombre.') }}</label>
                                <input class="form-control" type="text" size="25" placeholder="Nombre(s)" id="nombre2" wire:model="nombre2" required>
                                <span class="text-danger">@error('nombre2'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="apellidoP2" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Paterno" id="apellidoP2" wire:model="apellidoP2" required>
                                <span class="text-danger">@error('apellidoP2'){{ $message }}@enderror</span>
                            </div>

                           <div class="col-md-4">
                                <label for="apellidoM2" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Materno" id="apellidoM2" wire:model="apellidoM2" required>
                                <span class="text-danger">@error('apellidoM2'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="ultGrado2" class="form-control-label">??ltimo grado escolar.</label>
                                <select name="ultGrado" id="ultGrado2" class="form-control" wire:model="ultGrado2" required>
                                    <option value="" selected>Escoge tu ??ltimo grado escolar</option>
                                    <option value="Preescolar">Preescolar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="Universidad">Universidad</option>
                                    <option value="Maestr??a">Maestr??a</option>
                                    <option value="Doctorado">Doctorado</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                                <span class="text-danger">@error('ultGrado2'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="nombreEscuela2" class="form-control-label">Nombre de la escuela.</label>
                                <input class="form-control" id="nombreEscuela2" type="text" size="50" wire:model="nombreEscuela2" required>
                                <span class="text-danger">@error('nombreEscuela2'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Ubicaci??n'}}</label>
                            </div>
                            <div class="col-md-4">
                                <label for="estados">Estado.</label>
                                <select class="form-control"  name="estados" id="estados2" wire:model="estados2" required>
                                    <option value="" selected>Escoge estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Ciudad de M??xico">Ciudad de M??xico</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de M??xico">Estado de M??xico</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoac??n">Michoac??n</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo Le??n">Nuevo Le??n</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Quer??taro">Quer??taro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potos??">San Luis Potos??</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaluipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucat??n">Yucat??n</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                                <span class="text-danger">@error('estados2'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="estados">Ciudad.</label>
                                <input class="form-control" type="text" placeholder="Ciudad" id="ciudad2" size="25" wire:model="ciudad2" required>
                                <span class="text-danger">@error('ciudad2'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="estados">Municipio.</label>
                                <input class="form-control" type="text" placeholder="Municipio" id="municipio2" size="20" wire:model="municipio2" required>
                                <span class="text-danger">@error('municipio2'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Contacto'}}</label>
                            </div>

                            <div class="col-md-4">
                                <label for="telefono" class="form-control-label">{{ __('Telefono.') }}</label>
                                <input class="form-control" type="tel" size="25"placeholder="Tel??fono" id="telefono" wire:model="telefono" required>
                                <span class="text-danger">@error('telefono'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="celular" class="form-control-label">{{ __('Celular.') }}</label>
                                <input class="form-control" type="tel" size="20" placeholder="Celular" id="celular" wire:model="celular" required>
                                <span class="text-danger">@error('celular'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="email" class="form-control-label">{{ __('Correo Electr??nico.') }}</label>
                                <input class="form-control" type="email" size="50" placeholder="Correo Electr??nico" id="email" wire:model="email" required>
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombreTrabajo" class="form-control-label">Nombre del lugar donde labora.</label>
                                <input class="form-control" id="nombreTrabajo" type="text" size="50" wire:model="nombreTrabajo"  placeholder="Nombre del lugar donde labora" required>
                                <span class="text-danger">@error('nombreTrabajo'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="telefonoEmpresa" class="form-control-label">{{ __('Telefono de oficina o celular de la empresa.') }}</label>
                                <input class="form-control" type="tel" size="10" placeholder="Tel??fono" id="telefonoEmpresa" wire:model="telefonoEmpresa" required>
                                <span class="text-danger">@error('telefonoEmpresa'){{ $message }}@enderror</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($currentStep == 4)
        {{-- STEP 4 --}}
        <div class="step-four">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Referencias') }}</h3>
                    </div>
                    
                    <div class="card-body pt-4 p-3">
                        @if ($showDemoNotification)
                            <div wire:model="showDemoNotification" class="mt-3 alert alert-primary alert-dismissible fade show"role="alert">
                                <span class="alert-text text-white">
                                    {{ __('Est??s en una versi??n beta, no puedes actualizar perfil.') }}
                                </span>
                                <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ __('??Datos guardados correctamente!') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <label for="parentesco3" class="form-control-label">Parentesco.</label>
                                <input type="text" name="parentesco3" class="form-control" id="parentesco3" size="20" placeholder ="Parentesco" wire:model="parentesco3">
                                <span class="text-danger">@error('parentesco'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre4" class="form-control-label">{{ __('Nombre.') }}</label>
                                <input class="form-control" type="text" size="25" placeholder="Nombre" id="nombre4" wire:model="nombre4" required>
                                <span class="text-danger">@error('nombre'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="apellidoP4" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Paterno" id="apellidoP4" wire:model="apellidoP4" required>
                                <span class="text-danger">@error('apellidoP4'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="apellidoM4" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Materno" id="apellidoM4" wire:model="apellidoM4" required>
                                <span class="text-danger">@error('apellidoM4'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Ubicaci??n'}}</label>
                            </div>
                            <div class="col-md-4">
                                <label for="estados4">{{'Estado'}}</label>
                                <select class="form-control"  name="estados4" id="estados4" wire:model="estados4" required>
                                    <option value="" selected>Escoge estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Ciudad de M??xico">Ciudad de M??xico</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de M??xico">Estado de M??xico</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoac??n">Michoac??n</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo Le??n">Nuevo Le??n</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Quer??taro">Quer??taro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potos??">San Luis Potos??</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaluipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucat??n">Yucat??n</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                                <span class="text-danger">@error('estados4'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="ciudad4">{{'Ciudad'}}</label>
                                <input class="form-control" type="text" placeholder="Ciudad" id="ciudad4" size="25" wire:model="ciudad4" required>
                                <span class="text-danger">@error('ciudad'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="municipio4">{{'Municipio'}}</label>
                                <input class="form-control" type="text" placeholder="Municipio" id="municipio4" size="20" wire:model="municipio4" required>
                                <span class="text-danger">@error('municipio4'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Contacto'}}</label>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono3" class="form-control-label">{{ __('Telefono.') }}</label>
                                <input class="form-control" type="tel" size="15" placeholder="Tel??fono" id="telefono3" wire:model="telefono3" required>
                                <span class="text-danger">@error('telefono3'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="celular3" class="form-control-label">{{ __('Celular.') }}</label>
                                <input class="form-control" type="tel" size="10" placeholder="Celular" id="celular3" wire:model="celular3" required>
                                <span class="text-danger">@error('celular3'){{ $message }}@enderror</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif


        {{-- BOTONES --}}
        <div class="container-fluid">
            <div class="action-buttons d-grid gap-2 d-sm-flex justify-content-sm-end mt-1">
                @if ($currentStep == 1)
                    <div></div>
                @endif

                @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                    <button type="button" class="btn btn-sm mb-0 btn-danger" wire:click="decreaseStep()">Regresar</button>
                @endif

                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                    <button type="button" class="btn btn-sm mb-0 btn-info" wire:click="increaseStep()">Siguiente</button>
                @endif

                @if ($currentStep == 4)
                    <button type="button" class="btn btn-sm mb-0 btn-success">Enviar</button>
                @endif      
            </div>
        </div>  

    </form>   
</div>