
<link rel="stylesheet" href= "/css/app.css" >



<section class="h-100-vh mb-8">
    <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Edicion de usuarios</title>
</head>
<body>
<div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
 style="background-image: url('../assets/img/curved-images/paraxuteregistro.png');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-black mb-2 mt-5">Editar Usuarios</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-body">
                              @if ($errors->any())
                              <div class="aler alert-dark alert-dismissible fade show" role="alert">
                              <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                              @endif     
                              {!! Form::model($user, ['method' => 'PUT','route' =>['usuarios.update', $user->id]]) !!}
                              <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                          <label for="name">Nombre</label>
                                          {!! Form::text('name', null, array('class' =>'form-control')) !!}
                                      </div>
                                  </div>                             
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                          <label for="name">Correo</label>
                                          {!! Form::text('email', null, array('class' =>'form-control')) !!}
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                          <label for="name">Contraseña</label>
                                          {!! Form::password('password', array('class' =>'form-control')) !!}
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-12">
                                      <div class="form-group">
                                          <label for="name">Rol</label>
                                          {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                      </div>
                                  </div>
                              </div>                                
                              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Guardar Cambios</button>
                              </div>
                              {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

