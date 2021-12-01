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

<div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Usuarios en Paraxute</h5>
                        </div>
                        <div>
                        @can('crear-rol')
                        <a href="{{ route('roles.index') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button"> 
                            <i class="fas fa-plus"></i>
                            Ver Roles</a>
                        @endcan
                        @csrf
                        @can('crear-usuario')
                        <a href="{{ route('usuarios.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                            <i class="fas fa-plus"></i>
                            Nuevo Usuario</a>
                        @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-hover align-items-center mb-0">
                            <thead style="position: sticky; top: 0">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 style=">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nombre
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Correo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Rol
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$usuario->id}}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-center">{{$usuario->name}}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-center">{{$usuario->email}}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                         @if(!empty($usuario->getRoleNames()))
                                            @foreach($usuario->getRoleNames() as $roleName)
                                            <h5><span class="badge badge-sm bg-gradient-dark">{{$roleName}}</span></h5>
                                            @endforeach
                                        @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                        @can ('editar-usuario')
                                        <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>                
                                        @endcan    
                                        @csrf      
                                        @can('eliminar-usuario')     
                                        {!! Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}
                                            {!! Form::submit('Eliminar', ['class'=> 'btn btn-danger']) !!}
                                        @endcan
                                        {!! Form::close() !!}
                                        
                                        </div>
                                    </td>
                                </tr>
                            @endforeach   
                            </tbody>               
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
