<main>
        <div class="container-fluid py-5">
        <div class="card mb-4">
                                        <div class="card-header pb-0 px-3">
                                                <h6 class="mb-0">Recibos</h6>
                                                <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                                                        <form action="{{route('billing')}}" method="get">
                                                                <div class="input-group">
                                                                        <input class="btn btn-primary" type="submit" ></input>
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
                                                                        class="text-dark ms-2 font-weight-bold">{{$infoRecibo->id}}</span></span>
                                                                        
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
                                </div>
                        </div>
                        <div class="card-footer">
                                <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                        <a class="page-link" href="#">Anterior</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                <li class="page-item">
                                                        <a class="page-link" href="#">Siguiente</a>
                                                </li>
                                        </ul>
                                </nav>
                        </div>
                </div>
        </div>
</main>