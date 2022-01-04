<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante;
use App\Models\Programas;
use App\Models\recibo;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

class Billing extends Component
{
    use WithPagination;
    public $busqueda;
    public $currentPage = 1;
    public function render(Request $request)
    {
        $id=null;
        if(isset($_GET['idEst'])) {
            $id = $_GET["idEst"];
        }

        if($id!=NULL){

            $this->busqueda=$id;
       
                $infoRecibos = DB::table('recibos')
                 ->join('programas', 'programas.id', '=', 'recibos.id_programas_')
                 ->join('estudiantes', 'estudiantes.id', '=', 'recibos.id_estudiantes_' )
                ->select('tipo_programa','estudiantes.nombre','apellido_M', 'apellido_P', 'id_formatos_', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog','recibos.id_estudiantes_')
                ->where('recibos.id_estudiantes_', 'LIKE', '%'.$this->busqueda.'%')
                ->paginate(3);
            
        }else{
            if($this->busqueda != null){
                $infoRecibos = DB::table('recibos')
                 ->join('programas', 'programas.id', '=', 'recibos.id_programas_')
                 ->join('estudiantes', 'estudiantes.id', '=', 'recibos.id_estudiantes_' )
                ->select('tipo_programa','estudiantes.nombre','apellido_M', 'apellido_P', 'id_formatos_', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog','id_estudiantes_')
                ->where('nombre', 'LIKE', '%'.$this->busqueda.'%')
                ->orWhere('apellido_M', 'LIKE', '%'.$this->busqueda.'%')
                ->orWhere('apellido_P', 'LIKE', '%'.$this->busqueda.'%')
                ->orWhere('tipo_programa', 'LIKE', '%'.$this->busqueda.'%')
                ->orWhere('recibos.id', 'LIKE', '%'.$this->busqueda.'%')
                ->paginate(3);
             }else{
                 $infoRecibos = DB::table('recibos')
                 ->join('programas', 'programas.id', '=', 'recibos.id_programas_')
                 ->join('estudiantes', 'estudiantes.id', '=', 'recibos.id_estudiantes_' )
                 ->select('tipo_programa','estudiantes.nombre','apellido_M', 'apellido_P', 'id_formatos_', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog','id_estudiantes_')
                 ->paginate(3);
             }
             

        }
       
       // $reciboInfo=DB::select('SELECT nombre, apellido_P, apellido_M FROM estudiantes');
       
        return view('livewire.billing', compact('infoRecibos'));
    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
}
