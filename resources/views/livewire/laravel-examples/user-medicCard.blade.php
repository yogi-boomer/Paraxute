<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h3 class="mb-0">{{ __('Información Medica') }}</h3>
                <h4 for="selectedProgram">Marcar si o no segun corresponda.</h4>
            </div>
            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class= "form-group">
                                <label for="selectedProgram">Tipo de sangre.</label>
                                <input class="form-control" type="email"
                                                 placeholder="Tipo de sangre" id="user-email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class= "form-group">
                                <label for="selectedProgram">¿Es alérgico a alguna sustancia en particular?</label>
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
                                                 placeholder="Apellido" id="user-email">
                                            </div>
                                    </div>

                                    <div class="col">
                                         <label for="user-email" class="form-control-label">{{ __('Apellido Paterno.') }}</label>
                                            <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                                <input class="form-control" type="email"
                                                 placeholder="Apellido" id="user-email">
                                            </div>
                                    </div>

                                <div class="col">
                                    <label for="user-email" class="form-control-label">{{ __('Apellido Materno.') }}</label>
                                        <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                            <input class="form-control" type="email"
                                                 placeholder="Apellido" id="user-email">
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
</body>
</html>