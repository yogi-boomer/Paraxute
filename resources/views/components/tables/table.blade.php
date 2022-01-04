<link href="../resources/css/app.css" rel="stylesheet" type="text/css">

  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h3 class="mb-0">Alumnos</h3>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table table-hover align-items-center mb-0">
              <thead style="position: sticky; top: 0">
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nombre del Alumno</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Programa</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Estado</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($programas as $progra)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>

                        <img src="../assets/img/profile2.png" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 id="nombre",class="mb-0 text-sm">{{$progra->nombre}} {{$progra->apellido_P}} {{$progra->apellido_M}}</h6>
                        <p class="text-xs text-secondary mb-0"></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h6 id="programa",class="mb-0 text-sm">{{$progra->tipo_programa}}</h6>
                  </td>
                  <td class="align-middle text-center text-sm">
                    
                    @if ($mytime->lessThan($progra->fecha))
                    <span class="badge badge-sm bg-gradient-danger ">       </span>
                    @elseif ($mytimeP->lessThan($progra->fecha) && $mytime->greaterThan($progra->fecha))
                    <span class="badge badge-sm bg-gradient-warning ">       </span>
                    @elseif ($mytime->greaterThan($progra->fecha))
                    <span class="badge badge-sm bg-gradient-success">       </span>
                    
                    @endif
                   
                  </td>
                  @csrf
                  <td class="align-middle text-center">
                    <a href="{{ route('recibos.index',  ['nombre' => $progra->nombre, 'apellidop' =>$progra->apellido_P, 'apellidom' => $progra->apellido_M, 'costo'=> $progra->costo_mensual, 'codigo'=> $progra->codigo_Prog, 'prog'=> $progra->tipo_programa, 'idprog'=>$progra->id_programas_,'idest'=>$progra->id]) }}" class="text-secondary font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Generar recibo">
                      Generar Recibo
                    </a>
                  </td>
                  <td class="align-middle text-center">
                    <a href="{{route('billing', ['nombre' => $progra->nombre, 'apellidop' =>$progra->apellido_P, 'apellidom' => $progra->apellido_M, 'idEst' => $progra->id])}}" class="text-secondary font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Ver pagos">
                      Ver Pagos
                    </a>
                  </td>
                </tr>              
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
        <div class="d-flex justify-content-center">
         {{$programas->links('vendor.pagination.bootstrap-4') }}
         </div>
      </div>
    </div>
  </div>
</div>
