<div>
    <div class="container-fluid">
        <div class="page-header min-height-250 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/logoregistro.png'); background-position-y: 95%;">
            <span class="mask bg-gradient-primary opacity-1"></span>
        </div>

    </div>

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Información del estudiante') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                @if ($showDemoNotification)
                    <div wire:model="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show"
                        role="alert">
                        <span class="alert-text text-white">
                            {{ __('You are in a demo version, you can\'t update the profile.') }}</span>
                        <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                @if ($showSuccesNotification)
                    <div wire:model="showSuccesNotification"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ __('Datos guardados correctamente!') }}</span>
                        <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class= "form-group">
                                <label for="selectedProgram">Selecciona un programa.</label>
                                <select name="programa" id="programaSeleccionado" class="form-control">
                                    <option>Clase muestra</option>
                                    <option>Piano</option>
                                    <option>Bateria</option>
                                    <option>Violin</option>
                                    <option>Guitarra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class= "form-group">
                                <label for="selectedProgram">Selecciona un formato.</label>
                                <select name="programa" id="programaSeleccionado" class="form-control">
                                    <option>1-2 Días</option>
                                    <option>2-3 Días</option>
                                    <option>3-Más días</option>
                                </select>
                            </div>
                        </div>
                        <div class="container"> 
                                <div class="row">
                                    <div class="col">
                                        <label for="user-email" class="form-control-label">{{ __('Nombre.') }}</label>
                                            <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                                <input class="form-control" type="email"
                                                 placeholder="Nombre" id="user-email">
                                            </div>
                                    </div>

                                    <div class="col">
                                         <label for="user-email" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                            <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                                <input class="form-control" type="email"
                                                 placeholder="Apellido paterno" id="user-email">
                                            </div>
                                    </div>

                                <div class="col">
                                    <label for="user-email" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                        <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                            <input class="form-control" type="email"
                                                 placeholder="Apellido materno" id="user-email">
                                        </div>
                                </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">{{ __('Programa') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input  class="form-control" type="tel"
                                        placeholder="Nombre del programa" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.location" class="form-control-label">{{ __('Formato') }}</label>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                    <input wire:model="user.location" class="form-control" type="text"
                                        placeholder="Formato de horas" id="name">
                                </div>
                                @error('user.location') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="container">
                         <label for="about">{{ 'Ubicación' }}</label>
                         <div class="row">
                            <div class="col">
                            
                                 <label for="about">{{ 'Estado' }}</label>
                                      <select class="form-control"  name="Estados" id="estados">
                                            <option>Veracruz</option>
                                            <option>CDMX</option>
                                            <option>Puebla</option><option></option>
                                        </select>
                            </div>
                            <div class="col">
                                 <label for="about">{{ 'Ciudad' }}</label>
                                    <input type="text" class="form-control" placeholder="Ciudad" id="name">
                            </div>
                            <div class="col">
                                <label for="about">{{ 'Municipio' }}</label>
                                <input class="form-control" type="text"
                                        placeholder="Municipio" id="name">
                            </div>
                        </div>
                    </div>
                   
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="example-date-input" class="form-control-label">fecha de nacimiento</label>
                                    <input class="form-control" type="date" value="2018-11-23" id="example-date-input">
                            </div>
                            <div class="col">
                                <label for="example-date-input" class="form-control-label">Genero</label>
                                    <select name="Genero" id="genero" class="form-control">
                                            <option>Hombre</option>
                                            <option>Mujer</option>
                                            <option>Otro</option>
                                    </select>
                            </div>
                            <div class="col">
                            <label for="example-date-input" class="form-control-label">Especifique.</label>
                                    <input class="form-control" type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="example-date-input" class="form-control-label">Ultimo grado escolar</label>
                                    <select name="Genero" id="genero" class="form-control">
                                            <option>Kinder</option>
                                            <option>Primaria</option>
                                            <option>Secundaria</option>
                                            <option>Preparatoria</option>
                                            <option>Universidad</option>
                                    </select>
                            </div>
                            <div class="col">
                            <label for="example-date-input" class="form-control-label">Nombre de la escuela.</label>
                                    <input class="form-control" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end"> 
                        <div>
                        <br>
                        <a href="/laravel-user-medicCard" class="btn bg-gradient-info btn-sm mb-0"  type="button">Siguiente</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
