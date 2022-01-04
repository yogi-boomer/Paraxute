<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;
use Illuminate\Pagination\Paginator;
use App\Models\Programas;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Carbon\Carbon;

class Tables extends Component
{

    use WithPagination;
    public $currentPage = 1;
    public function render() 
    {
        $datos = Estudiante::all();
/*         $programas = DB::select('SELECT tipo_programa,nombre,apellido_M,apellido_P,costo_mensual,codigo_Prog,estudiantes.id_programas_,estudiantes.id FROM estudiantes left join recibos on estudiantes.id=recibos.id_estudiantes_ left join programas on estudiantes.id_programas_=programas.id group by id_estudiantes_,tipo_programa');
 */     /*    $programas = Estudiante::join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
        ->select('tipo_programa','nombre','apellido_M', 'apellido_P','costo_mensual','codigo_Prog','id_programas_','estudiantes.id')
        ->paginate(8);
*/
DB::statement("SET SQL_MODE=''");
$programas = Estudiante::leftJoin('programas', 'estudiantes.id_programas_', '=', 'programas.id')
->leftJoin('recibos', 'estudiantes.id', '=', 'recibos.id_estudiantes_')
->select('tipo_programa','nombre','apellido_M', 'apellido_P','costo_mensual','codigo_Prog','estudiantes.id_programas_','estudiantes.id',DB::raw('MAX(fecha) as fecha'))
->groupBy('id_estudiantes_')
->paginate(8);
         $mytime = Carbon::now();
       
          $mytime->toDateString();

        
        $mytimeP = Carbon::now();
        $mytimeP->toDateString();
        return view('livewire.tables', compact('datos','programas','mytime','mytimeP'));
    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
}
