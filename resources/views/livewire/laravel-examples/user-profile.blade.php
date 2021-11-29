<div>
    <div class="container-fluid">
        <div class="page-header min-height-250 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/logoregistro.png'); background-position-y: 95%;">
            <span class="mask bg-gradient-primary opacity-1"></span>
        </div>
    </div>

    <form wire:submit.prevent="register"> {{-- wire:submit.prevent="save" action="#" method="POST" role="form text-left" --}}

        {{-- STEP 1 --}}
        @if ($currentStep == 1)

        <div class="step-one">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{ __('Información del estudiante') }}</h6>
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
                                    <label for="selectedProgram">Selecciona un programa.</label>
                                    <select name="selectedProgram" id="selectedProgram" class="form-control" wire:model="selectedProgram" required>
                                        <option value="" selected>Escoge programa</option>
                                        <option value="Batería">Batería</option>
                                        <option value="Bajo Eléctrico">Bajo Eléctrico</option>
                                        <option value="Clase Muestra">Clase Muestra</option>
                                        <option value="Estimulación Musical">Estimulación Musical</option>
                                        <option value="Estimulación Musical Temprana">Estimulación Musical Temprana</option>
                                        <option value="Guitarra Acústica">Guitarra Acústica</option>
                                        <option value="Guitarra Eléctrica">Guitarra Eléctrica</option>
                                        <option value="Iniciación Musical 1">Iniciación Musical 1</option>
                                        <option value="Iniciación Musical 2">Iniciación Musical 2</option>
                                        <option value="Piano">Piano</option>
                                        <option value="Violín">Violín</option>
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
                                <div class="@error('user.email') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" size="25"placeholder="Nombre" id="nombre" wire:model="nombre" required>
                                    <span class="text-danger">@error('nombre'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="apellidoP" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                <div class="@error('user.email') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" size="20" placeholder="Apellido Paterno" id="apellidoP" wire:model="apellidoP" required>
                                    <span class="text-danger">@error('apellidoP'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="apellidoM" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                <div class="@error('user.email') border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" size="20" placeholder="Apellido Materno" id="apellidoM" wire:model="apellidoM" required>
                                    <span class="text-danger">@error('apellidoM'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <label for="about">{{'Ubicación'}}</label>
                            </div>
                            <div class="col-md-4">
                                <label for="estados">{{'Estado'}}</label>
                                <select class="form-control"  name="estados" id="estados" wire:model="estados" required>
                                    <option value="" selected>Escoge estado</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Ciudad de México">Ciudad de México</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaluipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                                <span class="text-danger">@error('estados'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="ciudad">{{'Ciudad'}}</label>
                                <input class="form-control" type="text" placeholder="Ciudad" id="ciudad" size="25" wire:model="ciudad" required>
                                <span class="text-danger">@error('ciudad'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="municipio">{{'Municipio'}}</label>
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
                                <label for="genero" class="form-control-label">Género.</label>
                                <select name="genero" id="genero" class="form-control" wire:model="genero" required>
                                    <option value="" selected>Escoge género</option>
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <span class="text-danger">@error('genero'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-4">
                                <label for="generoOtro" class="form-control-label">Especifique.</label>
                                <input class="form-control" type="text" id="generoOtro" size="20" wire:model="generoOtro" readonly>
                                <span class="text-danger">@error('generoOtro'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ultGrado" class="form-control-label">Último grado escolar</label>
                                <select name="ultGrado" id="ultGrado" class="form-control" wire:model="ultGrado" required>
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
                                <span class="text-danger">@error('ultGrado'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <label for="nombreEscuela" class="form-control-label">Nombre de la escuela.</label>
                                <input class="form-control" id="nombreEscuela" type="text" size="50" wire:model="nombreEscuela" required>
                                <span class="text-danger">@error('nombreEscuela'){{ $message }}@enderror</span>
                            </div>
                        </div>

                        {{-- QUITAR? --}}
                        {{-- <div class="row mt-4">
                            <div class="d-flex justify-content-end"> 
                                <div>
                                    <a href="/laravel-user-medicCard" class="btn bg-gradient-info btn-sm mb-0"  type="button">Siguiente</a>
                                </div>
                            </div>
                        </div> --}}
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
                        <h4 for="selectedProgram">Marcar <strong>sí</strong> o <strong>no</strong> según corresponda.</h4>
                    </div>

                    <div class="card-body pt-4 p-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tipoSangre" class="form-control-label">Tipo de Sangre</label>
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
                                    <div class="col-md-6">
                                        <label>¿Es alérgico a alguna sustancia en particular?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="alergia">
                                            <input type="radio" name="alergia" id="option1" autocomplete="off" value="Sí" wire:model="alergia"> Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="alergia" id="option2" autocomplete="off" value="No" wire:model="alergia"> No
                                        </label>
                                        <span class="text-danger">@error('alergia'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="alergia" class="form-control" placeholder ="Sustancia en particular" wire:model="alergia">
                                        <span class="text-danger">@error('alergia'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Problemas visuales</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="proVisual">
                                            <input type="radio" name="proVisual" id="option1" autocomplete="off" value="Sí" wire:model="proVisual">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="proVisual" id="option2" autocomplete="off" value="No" wire:model="proVisual">No
                                        </label>
                                        <span class="text-danger">@error('proVisual'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <label>Enfermedad crónica</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="enfCronica">
                                            <input type="radio" name="enfCronica" id="option1" autocomplete="off" value="Sí" wire:model="enfCronica"> Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="enfCronica" id="option2" autocomplete="off" value="No" wire:model="enfCronica"> No
                                        </label>
                                        <span class="text-danger">@error('enfCronica'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="enfCronica" class="form-control" placeholder ="Enfermedad crónica" wire:model="enfCronica">
                                        <span class="text-danger">@error('enfCronica'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>¿Presenta algún tipo de discapacidad cognitiva?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="discCogn">
                                            <input type="radio" name="discCogn" id="option1" autocomplete="off" value="Sí" wire:model="discCogn">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="discCogn" id="option2" autocomplete="off" value="No" wire:model="discCogn">No
                                        </label>
                                        <span class="text-danger">@error('discCogn'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <label>¿Presenta algún tipo de deficiencia motriz?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="defMotriz">
                                            <input type="radio" name="defMotriz" id="option1" autocomplete="off" value="Sí" wire:model="defMotriz"> Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="defMotriz" id="option2" autocomplete="off" value="No" wire:model="defMotriz"> No
                                        </label>
                                        <span class="text-danger">@error('defMotriz'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="defMotriz" class="form-control" placeholder ="Deficiencia motriz" wire:model="defMotriz">
                                        <span class="text-danger">@error('defMotriz'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>¿Presenta algún tipo de transtorno psicológico?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="transPsic">
                                            <input type="radio" name="transPsic" id="option1" autocomplete="off" value="Sí" wire:model="transPsic">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="transPsic" id="option2" autocomplete="off" value="No" wire:model="transPsic">No
                                        </label>
                                        <span class="text-danger">@error('transPsic'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="transPsic" class="form-control" placeholder ="Transtorno psicológico" wire:model="transPsic">
                                        <span class="text-danger">@error('transPsic'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>¿Toma medicamentos controlados?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="medicamentos">
                                            <input type="radio" name="medicamentos" id="option1" autocomplete="off" value="Sí" wire:model="medicamentos"> Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="medicamentos" id="option2" autocomplete="off" value="No" wire:model="medicamentos"> No
                                        </label>
                                        <span class="text-danger">@error('medicamentos'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="medicamentos" class="form-control" placeholder ="Medicamentos controlados" wire:model="medicamentos">
                                        <span class="text-danger">@error('medicamentos'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>¿Presenta problemas de conducta en la escuela de procedencia?</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="conducta">
                                            <input type="radio" name="conducta" id="option1" autocomplete="off" value="Sí" wire:model="conducta">Sí
                                        </label>
                                        <label>
                                            <input type="radio" name="conducta" id="option2" autocomplete="off" value="No" wire:model="conducta">No
                                        </label>
                                        <span class="text-danger">@error('conducta'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="transPsic" class="form-control" placeholder ="Problemas de conducta" wire:model="conducta">
                                        <span class="text-danger">@error('conducta'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- QUITAR? --}}
                        {{-- <div class="row mt-4">
                            <div class="d-flex justify-content-end"> 
                                <div>
                                    <a href="/laravel-user-medicCard" class="btn bg-gradient-info btn-sm mb-0"  type="button">Siguiente</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        
        @endif

        {{-- STEP 3 --}}


        {{-- BOTONES --}}
        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-sm mb-0 btn-danger" wire:click="decreaseStep()">Regresar</button>
            @endif

            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                <button type="button" class="btn btn-sm mb-0 btn-info" wire:click="increaseStep()">Siguiente</button>
            @endif

            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-sm mb-0 btn-success">Enviar</button>
            @endif

        </div>

    </form>   
</div>