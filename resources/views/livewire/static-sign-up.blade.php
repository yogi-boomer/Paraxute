<section class="h-100-vh mb-8">
    <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('../assets/img/curved-images/paraxuteregistro.png');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Bienvenido!</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-body">
                        <form role="form text-left" wire:submit.prevent="register" method="PUT">
                            <h3><center>Ingresa los datos del nuevo usuario</center></h3>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nombre" aria-label="Name"
                                    >
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Correo" aria-label="Email"
                                    aria-describedby="email-addon">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="role">
                                    <option selected>Rol</option>
                                    <option value="1">PARAXUTEADMIN</option>
                                    <option value="2">PARAXUTERECEP</option>
                                    <option value="3">PARAXUTEGEREN</option>
                                    <option value="3">PARAXUTEDIR</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Contraseña" aria-label="Password"
                                    aria-describedby="password-addon">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Crear Cuenta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
