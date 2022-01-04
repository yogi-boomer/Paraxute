<div>
    <div class="container-fluid">
        <div class="page-header min-height-250 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/logoregistro.png'); background-position-y: 95%;">
            <span class="mask bg-gradient-primary opacity-1"></span>
        </div>
    </div>

    <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">

        {{-- STEP 1 --}}
        @if ($currentStep == 1)
        <div class="step-one">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Información del estudiante') }}</h3>
                    </div>
                    
                    <div class="card-body pt-4 p-3">
                        @if ($showDemoNotification)
                            <div wire:model="showDemoNotification" class="mt-3 alert alert-primary alert-dismissible fade show"role="alert">
                                <span class="alert-text text-white">
                                    {{ __('Estás en una versión beta, no puedes actualizar perfil.') }}
                                </span>
                                <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ __('¡Datos guardados correctamente!') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class= "form-group">                               
                                    <label for="id_programas_">Selecciona un programa.</label>
                                    <select name="id_programas_" id="id_programas_" class="form-control" wire:model="id_programas_" required>
                                    @foreach($progras as $progra)
                                        <option value="{{$progra->id}}">{{$progra->tipo_programa}}</option>
                                     @endforeach
                                    </select>
                                   
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
                                <input class="form-control dateP" type="date" value="2022-01-01" id="dateRegister" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" wire:model="dateRegister" required>
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
                                <label for="apellido_P" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Paterno" id="apellido_P" wire:model="apellido_P" required>
                                <span class="text-danger">@error('apellido_P'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="apellido_M" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Materno" id="apellido_M" wire:model="apellido_M" required>
                                <span class="text-danger">@error('apellido_M'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class= "form-group">
                                <label for="formaPago">Selecciona una forma de pago</label>
                                <select name="formaPago" id="formaPago" class="form-control" wire:model="formaPago" required>
                                    <option value="" selected>Forma de pago</option>
                                    <option value="Contado">Contado</option>
                                    <option value="Credito">Credito</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                                <span class="text-danger">@error('formaPago'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Ubicación'}}</label>
                            </div>


                            
                            <div class="col-md-4">
                                <label for="estados">Estado.</label>
                                <select class="form-control" name="estados" id="estados" wire:model="estados" required>
                                    <option value="" >Selecciona un estado</option>   
                                    @foreach ($estadosOwO as $estadosa)
                                    <option value="{{$estadosa->id}}" >{{$estadosa->nombre}}</option>
                                   @endforeach
                                </select>
                                <span class="text-danger">@error('estados'){{ $message }}@enderror</span>
                            </div>
                           
                            <div class="col-md-4">
                                <label for="ciudad">Municipio.</label>
                                <select class="form-control" name="ciudad" id="ciudad" wire:model="ciudad" required>
                                    <option value="" >Selecciona un municipio</option>
                                    @if (!is_null($estados))
                                        @foreach ($ciudadesBase as $ciudades )
                                            <option value="{{$ciudades->id}}" >{{$ciudades->nombre}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">@error('ciudad'){{ $message }}@enderror</span>
                            </div>
 
                            

                            <div class="col-md-4">
                                <label for="municipio">Ciudad.</label>
                                <select class="form-control"  name="municipio" id="municipio" wire:model="municipio" required >
                                    <option value="" >Selecciona una ciudad</option>
                                    @if (!is_null($ciudad))
                                    @foreach ($localidadesBase as $local )
                                    <option value="{{$local->id}}" >{{$local->nombre}}</option>
                                    @endforeach
                                    @endif
                                </select>

                                <span class="text-danger">@error('municipio'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="dir_casa" class="form-control-label">Dirección.</label>
                            <input class="form-control" id="dir_casa" type="text" size="50" wire:model="dir_casa" required>
                            <span class="text-danger">@error('dir_casa'){{ $message }}@enderror</span>
                        </div>
                        <div class="row">
                            <div class="mt-3">
                                <label for="about">Datos generales del estudiante</label>
                            </div>
                            <div class="col-md-4">
                                <label for="fecha_Nac" class="form-control-label">Fecha de nacimiento.</label>
                                <input class="form-control dateP" type="date" value="2022-01-01" id="fecha_Nac" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" wire:model="fecha_Nac" required>
                                <span class="text-danger">@error('fecha_Nac'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <div>
                                    <label for="sexo" class="form-control-label">Género.</label>
                                    <select name="sexo" id="sexo" class="form-control" wire:model="sexo" required>
                                        <option value="" selected>Escoge género</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    <span class="text-danger">@error('sexo'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            {{-- 
                            <div class="col-md-4">
                                <label for="generoOtro" class="form-control-label">Especifique.</label>
                                <input class="form-control" type="text" id="generoOtro" size="20" disabled="disabled" wire:model="generoOtro">
                                <span class="text-danger">@error('generoOtro'){{ $message }}@enderror</span>
                            </div>
                             --}}
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ultimo_Grado" class="form-control-label">Último grado escolar.</label>
                                <select name="ultimo_Grado" id="ultimo_Grado" class="form-control" wire:model="ultimo_Grado" required>
                                    <option value="" selected>Escoge tu último grado escolar</option>
                                    <option value="Preescolar">Preescolar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="Universidad">Universidad</option>
                                    <option value="Maestría">Maestría</option>
                                    <option value="Doctorado">Doctorado</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                                <span class="text-danger">@error('ultimo_Grado'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="escuela_Proc" class="form-control-label">Nombre de la escuela.</label>
                                <input class="form-control" id="escuela_Proc" type="text" size="50" wire:model="escuela_Proc" required>
                                <span class="text-danger">@error('escuela_Proc'){{ $message }}@enderror</span>
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
                        <h3 class="mb-0">{{ __('Información Médica') }}</h3>
                        <h4>Marcar <strong>sí</strong> o <strong>no</strong> según corresponda.</h4>
                    </div>

                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tipo_sangre" class="form-control-label">Tipo de Sangre.</label>
                                <select name="tipo_sangre" id="tipo_sangre" class="form-control" wire:model="tipo_sangre" required>
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
                                <span class="text-danger">@error('tipo_sangre'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>¿Es alérgico a alguna sustancia en particular?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="alergia">
                                            <input type="radio" name="alergia" id="option1" autocomplete="off" value="Sí" wire:model="alergia"> Sí
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
                                        <label for="problemaVis">
                                            <input type="radio" name="problemaVis" id="option1" autocomplete="off" value="Sí" wire:model="problemaVis">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="problemaVis" id="option2" autocomplete="off" value="No" wire:model="problemaVis">No
                                        </label>
                                        <span class="text-danger">@error('problemaVis'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="problemaVis" class="form-control" placeholder ="Problema visual" wire:model="problemaVis">
                                        <span class="text-danger">@error('problemaVis'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>Enfermedad crónica.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="enfermedad_cron">
                                            <input type="radio" name="enfermedad_cron" id="option1" autocomplete="off" value="Sí" wire:model="enfermedad_cron"> Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="enfermedad_cron" id="option2" autocomplete="off" value="No" wire:model="enfermedad_cron"> No
                                        </label>
                                        <span class="text-danger">@error('enfermedad_cron'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="enfermedad_cron" class="form-control" placeholder ="Enfermedad crónica" wire:model="enfermedad_cron">
                                        <span class="text-danger">@error('enfermedad_cron'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>¿Presenta algún tipo de discapacidad cognitiva?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="deficiencia_cogn">
                                            <input type="radio" name="deficiencia_cogn" id="option1" autocomplete="off" value="Sí" wire:model="deficiencia_cogn">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="deficiencia_cogn" id="option2" autocomplete="off" value="No" wire:model="deficiencia_cogn">No
                                        </label>
                                        <span class="text-danger">@error('deficiencia_cogn'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="deficiencia_cogn" class="form-control" placeholder ="Discapacidad cognitiva" wire:model="deficiencia_cogn">
                                        <span class="text-danger">@error('deficiencia_cogn'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>¿Presenta algún tipo de deficiencia motriz?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="deficiencia_mot">
                                            <input type="radio" name="deficiencia_mot" id="option1" autocomplete="off" value="Sí" wire:model="deficiencia_mot"> Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="deficiencia_mot" id="option2" autocomplete="off" value="No" wire:model="deficiencia_mot"> No
                                        </label>
                                        <span class="text-danger">@error('deficiencia_mot'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="deficiencia_mot" class="form-control" placeholder ="Deficiencia motriz" wire:model="deficiencia_mot">
                                        <span class="text-danger">@error('deficiencia_mot'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label>¿Presenta algún tipo de transtorno psicológico?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="transtorno_Psic">
                                            <input type="radio" name="transtorno_Psic" id="option1" autocomplete="off" value="Sí" wire:model="transtorno_Psic">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="transtorno_Psic" id="option2" autocomplete="off" value="No" wire:model="transtorno_Psic">No
                                        </label>
                                        <span class="text-danger">@error('transtorno_Psic'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="transtorno_Psic" class="form-control" placeholder ="Transtorno psicológico" wire:model="transtorno_Psic">
                                        <span class="text-danger">@error('transtorno_Psic'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label>¿Toma medicamentos controlados?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="medicamentos">
                                            <input type="radio" name="medicamentos" id="option1" autocomplete="off" value="Sí" wire:model="medicamentos"> Sí
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
                                    <label>¿Presenta problemas de conducta en la escuela de procedencia?.</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="conducta">
                                            <input type="radio" name="conducta" id="option1" autocomplete="off" value="Sí" wire:model="conducta">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="conducta" id="option2" autocomplete="off" value="No" wire:model="conducta">No
                                        </label>
                                        <span class="text-danger">@error('conducta'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="transtorno_Psic" class="form-control" placeholder ="Problemas de conducta" wire:model="conducta">
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

        @if (($currentStep == 3) /*&& ($edad < 18)*/)
        {{-- STEP 3 --}}
        <div class="step-three">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Información de Tutor') }}</h3>
                    </div>
                    
                    <div class="card-body pt-4 p-3">
                        @if ($showDemoNotification)
                            <div wire:model="showDemoNotification" class="mt-3 alert alert-primary alert-dismissible fade show"role="alert">
                                <span class="alert-text text-white">
                                    {{ __('Estás en una versión beta, no puedes actualizar perfil.') }}
                                </span>
                                <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ __('¡Datos guardados correctamente!') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <label for="parentesco" class="form-control-label">Parentesco.</label>
                                <select name="parentesco" id="parentesco" class="form-control" wire:model="parentesco" required>
                                    <option value="" selected>Escoge tu parentesco</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Hijo">Hijo</option>
                                    <option value="Hija">Hija</option>
                                    <option value="Abuelo">Abuelo</option>
                                    <option value="Abuela">Abuela</option>
                                    <option value="Nieto">Nieto</option>
                                    <option value="Nieta">Nieta</option>
                                    <option value="Bisabuelo">Bisabuelo</option>
                                    <option value="Bisabuela">Bisabuela</option>
                                    <option value="Bisnieto">Bisnieto</option>
                                    <option value="Bisnieta">Bisnieta</option>
                                    <option value="Hermano">Hermano</option>
                                    <option value="Hermana">Hermana</option>
                                    <option value="Tío">Tío</option>
                                    <option value="Tía">Tía</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Prima">Prima</option>
                                    <option value="Sobrino">Sobrino</option>
                                    <option value="Sobrina">Sobrina</option>
                                    <option value="Esposo">Esposo</option>
                                    <option value="Esposa">Esposa</option>
                                    <option value="Amigo">Amigo</option>
                                    <option value="Amiga">Amiga</option>
                                </select>
                                <span class="text-danger">@error('parentesco'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-4">
                                <label for="fecha_nac" class="form-control-label">Fecha de nacimiento.</label>
                                <input class="form-control dateP" type="date" value="2022-01-01" id="fecha_nac" wire:model="fecha_nac" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                                <span class="text-danger">@error('fecha_nac'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-4">
                                <label for="estado_civil" class="form-control-label">Estado civil.</label>
                                <select name="estado_civil" id="estado_civil" class="form-control" wire:model="estado_civil" required>
                                    <option value="" selected>Escoge tu estado civil</option>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Separación en proceso judicial">Separación en proceso judicial</option>
                                    <option value="Viudo">Viudo</option>
                                    <option value="Concubinato">Concubinato</option>
                                </select>
                                <span class="text-danger">@error('estado_civil'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombrep" class="form-control-label">{{ __('Nombre.') }}</label>
                                <input class="form-control" type="text" size="25" placeholder="Nombre(s)" id="nombrep" wire:model="nombrep" required>
                                <span class="text-danger">@error('nombrep'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="apellido_p" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Paterno" id="apellido_p" wire:model="apellido_p" required>
                                <span class="text-danger">@error('apellido_p'){{ $message }}@enderror</span>
                            </div>

                           <div class="col-md-4">
                                <label for="apellido_m" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                <input class="form-control" type="text" size="20" placeholder="Apellido Materno" id="apellido_m" wire:model="apellido_m" required>
                                <span class="text-danger">@error('apellido_m'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="ultimo_grado" class="form-control-label">Último grado escolar.</label>
                                <select name="ultGrado" id="ultimo_grado" class="form-control" wire:model="ultimo_grado" required>
                                    <option value="" selected>Escoge tu último grado escolar</option>
                                    <option value="Preescolar">Preescolar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="Universidad">Universidad</option>
                                    <option value="Maestría">Maestría</option>
                                    <option value="Doctorado">Doctorado</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                                <span class="text-danger">@error('ultimo_grado'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="nombre_escuela" class="form-control-label">Nombre de la escuela.</label>
                                <input class="form-control" id="nombre_escuela" type="text" size="50" wire:model="nombre_escuela" required>
                                <span class="text-danger">@error('nombre_escuela'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Ubicación'}}</label>
                            </div>
                            <div class="col-md-4">
                                <label for="estados">Estado.</label>
                                <select class="form-control" name="estados" id="estado" wire:model="estado" required>
                                    <option value="" selected>Selecciona un estado</option>
                                    @foreach ($estadosOwO as $estadose)
                                    <option value="{{$estadose->id}}" >{{$estadose->nombre}}</option>
                                   @endforeach
                                </select>
                                <span class="text-danger">@error('estado'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="ciudadP">Municipio.</label>
                                <select class="form-control" name="ciudadP" id="ciudadP" wire:model="ciudadP" required>
                                   
                                    <option value="" >Selecciona un municipio</option>
                                    @if (!is_null($estado))
                                        @foreach ($ciudadesBase as $ciudade )
                                            <option value="{{$ciudade->id}}" >{{$ciudade->nombre}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">@error('ciudadP'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="municipioP">Ciudad.</label>
                                <select class="form-control" name="municipioP" id="municipioP" wire:model="municipioP" required>
                                    <option value="" >Selecciona una ciudad</option>
                                    @if (!is_null($ciudadP))
                                    @foreach ($localidadesBase as $locale )
                                    <option value="{{$locale->id}}" >{{$locale->nombre}}</option>
                                    @endforeach
                                    @endif
                                </select>

                                <span class="text-danger">@error('municipioP'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="dir_casap" class="form-control-label">Dirección.</label>
                            <input class="form-control" id="dir_casap" type="text" size="50" wire:model="dir_casap" required>
                            <span class="text-danger">@error('dir_casap'){{ $message }}@enderror</span>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Contacto'}}</label>
                            </div>

                            <div class="col-md-4">
                                <label for="telefono" class="form-control-label">{{ __('Teléfono.') }}</label>
                                <input class="form-control" type="tel" size="25"placeholder="Teléfono" id="telefono" wire:model="telefono" required>
                                <span class="text-danger">@error('telefono'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="celular" class="form-control-label">{{ __('Celular.') }}</label>
                                <input class="form-control" type="tel" size="20" placeholder="Celular" id="celular" wire:model="celular" required>
                                <span class="text-danger">@error('celular'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="correo" class="form-control-label">{{ __('Correo Electrónico.') }}</label>
                                <input class="form-control" type="email" size="50" placeholder="Correo Electrónico" id="correo" wire:model="correo" required>
                                <span class="text-danger">@error('correo'){{ $message }}@enderror</span>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nom_trabajo" class="form-control-label">Nombre del lugar donde labora.</label>
                                <input class="form-control" id="nom_trabajo" type="text" size="50" wire:model="nom_trabajo" placeholder="Nombre del lugar donde labora" required>
                                <span class="text-danger">@error('nom_trabajo'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="tel_trabajo" class="form-control-label">{{ __('Teléfono de oficina o celular de la empresa.') }}</label>
                                <input class="form-control" type="tel" size="10" placeholder="Teléfono" id="tel_trabajo" wire:model="tel_trabajo" required>
                                <span class="text-danger">@error('tel_trabajo'){{ $message }}@enderror</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- STEP 4 --}}
        @if (($currentStep == 4) /*&& ($edad >= 18)*/)
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
                                    {{ __('Estás en una versión beta, no puedes actualizar perfil.') }}
                                </span>
                                <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($showSuccesNotification)
                            <div wire:model="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text text-white">{{ __('¡Datos guardados correctamente!') }}</span>
                                <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <label for="parentesco3" class="form-control-label">Parentesco.</label>
                                <select name="parentesco3" id="parentesco3" class="form-control" wire:model="parentesco3" required>
                                    <option value="" selected>Escoge tu parentesco</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Hijo">Hijo</option>
                                    <option value="Hija">Hija</option>
                                    <option value="Abuelo">Abuelo</option>
                                    <option value="Abuela">Abuela</option>
                                    <option value="Nieto">Nieto</option>
                                    <option value="Nieta">Nieta</option>
                                    <option value="Bisabuelo">Bisabuelo</option>
                                    <option value="Bisabuela">Bisabuela</option>
                                    <option value="Bisnieto">Bisnieto</option>
                                    <option value="Bisnieta">Bisnieta</option>
                                    <option value="Hermano">Hermano</option>
                                    <option value="Hermana">Hermana</option>
                                    <option value="Tío">Tío</option>
                                    <option value="Tía">Tía</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Prima">Prima</option>
                                    <option value="Sobrino">Sobrino</option>
                                    <option value="Sobrina">Sobrina</option>
                                    <option value="Esposo">Esposo</option>
                                    <option value="Esposa">Esposa</option>
                                    <option value="Amigo">Amigo</option>
                                    <option value="Amiga">Amiga</option>
                                </select>
                                <span class="text-danger">@error('parentesco3'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="nombre4" class="form-control-label">{{ __('Nombre.') }}</label>
                                <input class="form-control" type="text" size="25" placeholder="Nombre" id="nombre4" wire:model="nombre4" required>
                                <span class="text-danger">@error('nombre4'){{ $message }}@enderror</span>
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
                                <label for="about">{{'Ubicación'}}</label>
                            </div>
                            <div class="col-md-4">
                                <label for="estados4">Estado.</label>
                                <select class="form-control"  name="estados" id="estados4" wire:model="estados4" required>
                                    <option value="" selected>Selecciona un estado</option>
                                    @foreach ($estadosOwO as $estadosa)
                                    <option value="{{$estadosa->id}}" >{{$estadosa->nombre}}</option>
                                   @endforeach
                                </select>
                                <span class="text-danger">@error('estado4'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="ciudad4">Municipio.</label>
                                <select class="form-control" name="ciudad4" id="ciudad4" wire:model="ciudad4" required >
                                   
                                    <option value="" >Selecciona un municipio</option>
                                    @if (!is_null($estados4))
                                        @foreach ($ciudadesBase as $ciudades )
                                            <option value="{{$ciudades->id}}" >{{$ciudades->nombre}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="text-danger">@error('ciudad4'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="municipio4">Ciudad.</label>
                                <select class="form-control"  name="municipio4" id="municipio4" wire:model="municipio4" required >
                                    <option value="" >Selecciona una ciudad</option>
                                    @if (!is_null($ciudad4))
                                    @foreach ($localidadesBase as $local )
                                    <option value="{{$local->id}}" >{{$local->nombre}}</option>
                                    @endforeach
                                    @endif
                                </select>

                                <span class="text-danger">@error('municipio4'){{ $message }}@enderror</span>
                            </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Contacto'}}</label>
                            </div>
                            <div class="col-md-6">
                                <label for="telefono3" class="form-control-label">{{ __('Teléfono.') }}</label>
                                <input class="form-control" type="tel" size="15" placeholder="Teléfono" id="telefono3" wire:model="telefono3" required>
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


        <div class="container-fluid">
            <div class="action-buttons d-grid gap-2 d-sm-flex justify-content-sm-end mt-1">
                @if ($currentStep == 1)
                    <div></div>
                @endif

                @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                    <button type="button" class="btn btn-sm mb-0 btn-danger" wire:click="decreaseStep()">Regresar</button>
                @endif
                
                {{-- Botones que abarcan los cuatro pasos --}}
                {{-- INICIO --}}
                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                    <button type="button" class="btn btn-sm mb-0 btn-info" wire:click="increaseStep()">Siguiente</button>
                @endif

                @if ($currentStep == 4)
                    <button type="button" class="btn btn-sm mb-0 btn-success" wire:click="register()">Enviar</button>
                @endif
                {{-- FIN --}}


                {{-- Botones correctos para el formulario de acuerdo a la edad --}}
                {{-- 
                @if ($currentStep == 1 || $currentStep == 2)
                    <button type="button" class="btn btn-sm mb-0 btn-info" wire:click="increaseStep()">Siguiente</button>
                @endif

                @if($currentStep == 3 && $edad < 18)
                    <button type="button" class="btn btn-sm mb-0 btn-success" wire:click="register()">Enviar</button>
                @endif

                @if ($currentStep == 4 && $edad >= 18)
                    <button type="button" class="btn btn-sm mb-0 btn-success" wire:click="register()">Enviar</button>
                @endif
                --}}
            </div>
        </div>  

    </form>   
</div>

<!-- {{-- 
<script type = "text/javascript">
    $(function(){
        $(".opA").click(function(){
            if($(this).val()=="No"){
                $("#alergiaO").removeAttr('disabled');
                $("#alergiaO").focus();
            }else{
                $("#alergiaO").attr('disabled', 'disabled');
            }
        })
    })
</script>
 --}}

<script type="text/javascript">
    $('.dateP').datepicker({  
        format: 'yyyy/mm/dd'
        language: "es",
        autoclose: true
     });  
</script>  -->