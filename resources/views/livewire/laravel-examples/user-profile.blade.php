<div>
    <div class="container-fluid">
        <div class="page-header min-height-150 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <a style="font-weight= bold">Nuevo estudiante</a>
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
                           
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Nombre') }}</label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input wire:model="user.name" class="form-control" type="text" placeholder="Nombre"
                                        id="user-name">
                                </div>
                                @error('user.name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class= "form-group">
                                <label for="selectedProgram">Selecciona un programa.</label>
                                <select name="programa" id="programaSeleccionado" class="form-control">
                                    <option>1-2 Días</option>
                                    <option>2-3 Días</option>
                                    <option>3-Más días</option>
                                </select>
                            </div>
                            <div class="column">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Apellidos') }}</label>
                                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                    <input wire:model="user.email" class="form-control" type="email"
                                        placeholder="Apellido" id="user-email">
                                </div>
                                @error('user.email') <div class="text-danger">{{ $message }}</div> @enderror
                                <label for="user-email" class="form-control-label">{{ __('Apellidos') }}</label>
                                <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" placeholder="Apellido" id="user-email" >
                                </div>
                            </div>
                                
                            </div>
                           

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.phone" class="form-control-label">{{ __('Programa') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                    <input wire:model="user.phone" class="form-control" type="tel"
                                        placeholder="Nombre del programa" id="phone">
                                </div>
                                @error('user.phone') <div class="text-danger">{{ $message }}</div> @enderror
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
                    <div class="form-group">
                        <label for="about">{{ 'Ubicación' }}</label>
                        <div class="@error('user.about')border border-danger rounded-3 @enderror">
                        <input class="form-control" type="text"
                                        placeholder="Calle, Municipio, Colonia" id="name">
                        </div>
                        @error('user.about') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Siguiente' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
