
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
       <form action="">
       <div class="step-one">
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h3 class="mb-0">{{ __('Recibo de estudiante') }}</h3>
                    </div>
                    
                    <div class="card-body pt-4 p-3">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="form-control-label">{{ __('Nombre.') }}</label>
                                <input class="form-control" type="text" size="25" placeholder="Nombre(s)" id="nombre" name="nombre" wire:model="nombre" value='<?php echo $_GET["nombre"]; ?> <?php echo $_GET["apellidop"]; ?> <?php echo $_GET["apellidom"]; ?>' required> 
                                
                                <span class="text-danger">@error('nombre'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-6">
                                <div class= "form-group">
                                    <label for="selectedPago">Selecciona tipo de pago.</label>
                                    <select name="selectedPago" id="selectedPago" class="form-control" wire:model="selectedPago" required>
                                        <option value="" selected>Escoge tu tipo de pago</option>
                                        <option value="1">Contado</option>
                                        <option value="2">Crédito</option>
                                        <option value="3">Cheque</option>
                                    </select>
                                    <span class="text-danger">@error('selectedFormat'){{ $message }}@enderror</span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                        <div class="col-md-6">
                                <div class= "form-group">
                                    <label for="selectedProgram">Selecciona un programa.</label>
                                    <select name="selectedProgram" id="selectedProgram" class="form-control" wire:model="selectedProgram" required>
                                    <option value="<?php echo $_GET["prog"]; ?>" selected><?php echo $_GET["prog"]; ?></option>
                                        @foreach($programas as $progg)
                                        <option value="{{$progg->tipo_programa}}">{{$progg->tipo_programa}}</option>
                                        @endforeach
                                     </select>
                                    <span class="text-danger">@error('selectedProgram'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="dateRegister" class="form-control-label">Fecha de registro.</label>
                                <input class="form-control" type="date" value="2021-01-01" id="dateRegister" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" wire:model="dateRegister" required>
                                <span class="text-danger">@error('dateRegister'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Concepto" class="form-control-label">Concepto.</label>
                                <select name="Concepto" id="Concepto" class="form-control" wire:model="Concepto" required>
                                <option value="" selected>Escoge Concepto</option>
                                        @foreach($programas as $progg)
                                        <option value="{{$progg->tipo_programa}}">{{$progg->tipo_programa}}</option>
                                        @endforeach
                                </select>
                                <span class="text-danger">@error('Concepto'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-md-3">
                                <label for="Cantidad" class="form-control-label">Cantidad.</label>
                                <input class="form-control" id="Cantidad" type="number" size="50" wire:model="Cantidad" value='<?php echo $_GET["costo"]; ?>' required>
                                <span class="text-danger">@error('Cantidad'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-3">
                                <label for="Codigo" class="form-control-label">Código.</label>
                                <input class="form-control" id="Codigo" type="text" size="50" wire:model="Codigo" value='<?php echo $_GET["codigo"]; ?>' required>
                                <span class="text-danger">@error('Codigo'){{ $message }}@enderror</span>
                            </div>
                            <div class="col-md-3">
                                <label for="Total" class="form-control-label">Total.</label>
                                <input class="form-control" id="Total" type="number" size="50" wire:model="Total" value='<?php echo $_GET["costo"]; ?>' required>
                                <span class="text-danger">@error('Total'){{ $message }}@enderror</span>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="action-buttons d-grid gap-2 d-sm-flex justify-content-sm-end mt-1">
                        <a type="button" class="btn btn-sm mb-0 btn-success" href="{{ route('recibosRe.pdf') }}">Guardar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       </form>
    
    </div>
    
</body>
</html>