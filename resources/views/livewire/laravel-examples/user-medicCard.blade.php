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
                            <div class= "col">
                                <label for="selectedProgram">Tipo de sangre.</label>
                                <input class="form-control" type="email"
                                                 placeholder="Tipo de sangre" id="user-email">
                                <br>
                            </div>
                        </div>
                            
                        <div class="container"> 
                                <div class="row">
                                    <div class="col">
                                        <br>
                                        <label for="user-email" class="form-control-label">¿Es alérgico a alguna sustancia en particular?</label>
                                        <br><br><br>
                                        <hr>
                                        <label for="user-email" class="form-control-label">Problemas visuales</label>
                                        <br><br><br>
                                        <hr>
                                        <label for="user-email" class="form-control-label">Enfermedad crónica</label>
                                        <br><br><br>
                                        <hr>
                                        <label for="user-email" class="form-control-label">¿Presenta algún tipo de discapacidad cognitiva?</label>
                                        <br><br><br>
                                        <hr>
                                        <label for="user-email" class="form-control-label">¿Presenta algún tipo de deficiencia motriz?</label>
                                        <br><br><br>
                                        <hr>
                                        <label for="user-email" class="form-control-label">¿Presenta algún tipo de trastorno psicológico? </label>
                                        <br><br><br>
                                        <hr>
                                        <label for="user-email" class="form-control-label">¿Toma medicamentos controlados?</label>
                                        <br><br><br>
                                        <hr>
                                        <label for="user-email" class="form-control-label">¿Presenta problemas de conducta en la escuela de procedencia?</label>
                                    </div>
                                        <br>
                                    <div class="col">
                                    <br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>
                                            <br><br><br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>
                                            <br><br><br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>
                                            <br><br><br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>
                                            <br><br><br><br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>
                                            <br><br><br><br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>
                                            <br><br><br><br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>
                                            <br><br><br><br>
                                            <label>
                                                <input type="radio" name="options" id="option1" autocomplete="off" > Sí
                                            </label>
                                            <label>
                                                <input type="radio" name="options" id="option2" autocomplete="off"> No
                                            </label>


                                    </div>

                                    <div class="col-6">
                                        <br>
                                            <input type="text" class="form-control" placeholder ="sustancia en particular">
                            
                                        <br>
                                        <hr>
                                        <br>
                                                <input type="text" class="form-control" placeholder ="Problema visual">
                                       
                                        <br>
                                        <hr>
                                        <br>
                                                <input type="text" class="form-control" placeholder ="Enfermedad cronica">
                                       
                                        <br>
                                        <hr>
                                        <br>
                                                <input type="text" class="form-control" placeholder ="Discapacidad cognitiva">
                    
                                        <br>
                                        <hr>
                                        <br>
                                                <input type="text" class="form-control" placeholder ="Deficiencia motriz">
                      
                                        <br>
                                        <hr>
                                        <br>
                                                <input type="text" class="form-control" placeholder ="Transtorno Psicológico">
                               
                                        <br>
                                        <hr>
                                        <br>
                                                <input type="text" class="form-control" placeholder ="Medicamentos controlados">
                                                
                                        <br>
                                        <hr>
                                        <br>
                                                <input type="text" class="form-control" placeholder ="Problemas de conducta">
                                       
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