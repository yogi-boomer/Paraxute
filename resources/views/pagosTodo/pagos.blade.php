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
<main>
        <div class="container-fluid py-5">
        <div class="card mb-4">
                                        <div class="card-header pb-0 px-2">
                                                <h6 class="mb-2">Recibos</h6>
                                                <div class="ms-md-1 pe-md-3 d-flex align-items-center">
                                                <form action="{{route('pagos.index')}}" method="get">
                                                                <div class="input-group">
                                                                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                                                        <input type="text" class="form-control" name="busqueda" id="busqueda"></input>
                                                                </div>
                                                        </form>
                                                </div>
                                        </div>
                                       
                                        <div class="card-body pt-4 p-2">
                                        
                                                <ul class="list-group">
                                                @foreach($infoRecibos as $infoRecibo)
                                                                <li class="list-group-item border-2 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg"> 
                                                                <div class="d-flex flex-column">
                                                                
                                                                        <h6 class="mb-3 text-sm">{{$infoRecibo->nombre}}</h6>
                                                                        <span class="mb-2 text-xs">Programa: <span
                                                                        class="text-dark font-weight-bold ms-2">{{$infoRecibo->tipo_programa}}</span></span>
                                                                        <span class="mb-2 text-xs">Formato: <span
                                                                        class="text-dark ms-2 font-weight-bold">{{$infoRecibo->id_formatos_}}</span></span>                                                                     
                                                                        <span class="text-xs">No. Folio: <span
                                                                        class="text-dark ms-2 font-weight-bold" id="idRe">{{$infoRecibo->id}}</span></span>
                                                                        
                                                                </div>
                                                                
                                                                <div class="ms-auto">
                                                                        
                                                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                                                        class="far fa-trash-alt me-2"></i>Eliminar</a> 
                                                                        <a href="{{ route('recibosAlum.pdf', ['nombre' => $infoRecibo->nombre, 'apellidop' =>$infoRecibo->apellido_P, 'apellidom' => $infoRecibo->apellido_M, 'prog'=> $infoRecibo->tipo_programa, 'fecha'=> $infoRecibo->fecha, 'total'=>$infoRecibo->total, 'codigo' => $infoRecibo->codigo_Prog, 'idInfo' => $infoRecibo->id]) }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                                                        class="fas fa-file-pdf text-lg me-1"></i> PDF</a>    
                                                                        @endforeach                                                                   
                                                                </div>                                                                                                                
                                                        </li>                                                      
                                                </ul>                                               
                                        </div>
                                        
                                        <div class="d-flex justify-content-center">
                                              {!!$infoRecibos->links() !!}
                                         </div>
                                </div>
        </div>       