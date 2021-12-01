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
<section class="h-100-vh mb-8">
    <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('../assets/img/curved-images/paraxuteregistro.png');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Roles</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-8 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-body">  
                    @can('crear-rol')
                    <a href="{{ route('roles.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">
                        <i class="fas fa-plus"></i>
                        Nuevo Rol</a>
                    @endcan
                    <table class="table table-hover align-items-center mb-0">
                            <thead style="position: sticky; top: 0">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 style=">
                                        Rol
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Acciones
                                    </th>
                    <tbody>
                    @foreach ($roles as $role)
                    <tr>
                    <td class="ps-4">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm ">{{ $role->name }}</h6>
                        </div>
                    </td>                     
                        <td> 
                            <div class="text-center">
                            @can('editar-rol')
                                <a class="btn btn-info" href="{{ route('roles.edit', $role->id) }}">Editar</a> 
                            @endcan   
                            @csrf 
                            @can('eliminar-rol')
                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['roles.destroy', $role->id], 'style'=>'display:inline']) !!}
                                {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>