
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
<!DOCTYPE html>
<html lang="es">
<body>
    <div class="container-fluid">
        {!! Form::open(array('route' =>'recibos.store', 'method' =>'POST')) !!}       <div class="step-one">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Recibo de estudiante') }}</h3>
                    </div>
                    
                    <div class="card-body pt-4 p-3">  
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="form-control-label">{{ __('Nombre.') }}</label>
                                {!! Form::text('nombre', $nombre, array('class' =>'form-control')) !!}
                                
                                <span class="text-danger">@error('nombre'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <div class= "form-group">
                                    <label for="selectedPago">Selecciona tipo de pago.</label>
                                    {!! Form::select('selectedPago', array('Contado' => 'Contado', 'Crédito'=> 'Crédito','Cheque' => 'Cheque' ),'Contado',array('class' => 'form-control')) !!}
                                  
                                    <span class="text-danger">@error('selectedFormat'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class= "form-group">
                                    <label for="selectedProgram">Selecciona un programa.</label>
                                   
                                    {!! Form::select('selectedProgram', $programas,--$idprog,array('class' => 'form-control')) !!}
                                    
                                    <span class="text-danger">@error('selectedProgram'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="dateRegister" class="form-control-label">Fecha de registro.</label>

                                {!! Form::date('dateRegister',date('Y-m-d'),array('class' => 'form-control')) !!}

                                <span class="text-danger">@error('dateRegister'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Concepto" class="form-control-label">Concepto.</label>
                                {!! Form::select('Concepto', $programas,$idprog,array('class' => 'form-control')) !!}
                                <span class="text-danger">@error('Concepto'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-3">
                                <label for="Cantidad" class="form-control-label">Cantidad.</label>
                                {!! Form::text('Cantidad', $costo, array('class' =>'form-control')) !!}

                                <span class="text-danger">@error('Cantidad'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-3">
                                <label for="Codigo" class="form-control-label">Código.</label>
                                {!! Form::text('codigo', $codigo, array('class' =>'form-control')) !!}
                                <span class="text-danger">@error('Codigo'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-3">
                                <label for="Total" class="form-control-label">Total.</label>
                                {!! Form::text('total', $costo, array('class' =>'form-control')) !!}
                                <span class="text-danger">@error('Total'){{ $message }}@enderror</span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="action-buttons d-grid gap-2 d-sm-flex justify-content-sm-end mt-1">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Generar recibo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::hidden('idest', $idest, array('style' =>'form-control')) !!}  
        {!! Form::close() !!}  
    </div>  
</body>
</html>