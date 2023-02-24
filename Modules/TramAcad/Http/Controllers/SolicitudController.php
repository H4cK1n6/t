<?php

namespace Modules\TramAcad\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Modules\TramAcad\Entities\Solicitud;
use Modules\TramAcad\Entities\Unidad;
use Modules\TramAcad\Entities\Tipotramite;
use Modules\TramAcad\Entities\Tramite;

use function PHPSTORM_META\type;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        /* $solicitudes = Solicitud::all();
        return view('tramacad::solicitudes.index',compact('solicitudes')); */
        $solicitudes = Solicitud::all();
        //return $solicitudes;
        return view('tramacad::solicitudes.solicitudesUsuario',compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tramacad::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'item_id' => 'required',
            'unidad_id' => 'required'
        ]);

        $user = Auth::id();
        $detalle=Tipotramite::find($request->input('item_id'));
        //dd($request->input('item_id'));
        $solicitud = new Solicitud();
        $solicitud->user_id = $user;
        $solicitud->unidad_id = $request->unidad_id;
        //dd($detalle->nombre_tramite);
        
        $solicitud->fecha_envio = date('Y-m-d H:i:s');
        $solicitud->estado_solicitud = "Pendiente";
        $solicitud->save();

        //return $solicitud;
        echo "solicitud registrada..."; 

        return redirect()->route('solicitudesUsuario');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        //$solicitudes = Solicitud::all();
        //$solicitudes->users()->get();
        //return $solicitudes;
        //return view('tramacad::solicitudes.solicitudesUsuario',compact('solicitudes'));
        $usuarios = (new \Modules\TramAcad\Entities\Solicitud)::all()->where('user_id','=',Auth::id());
        foreach($usuarios as $dato)
            $datos = $dato->user->name;
            dd($datos)
;        
        return view('tramacad::solicitudes.solicitudesUsuario',compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('tramacad::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    //////////////////////////
    public function seleccionarTramite()
    {

        $items = Tipotramite::whereNotIn('id', function ($query) {
            $query->select('tipotramite_id')
                ->from('solicitudes');
        })->get();

        //dd($tiposNoSolicitados);

        $items = Tipotramite::select('id','nombre_tramite')->get();
       
        $unidades = Unidad::all();
        //dd($items->nombre_tramite);
        return view('tramacad::formularios.solicitar', compact('items','unidades'));
    }

    public function guardarItemSeleccionado(Request $request)
    {
        
        if ($request->input('item_id') == 'Seleccione tipo de trámite'){
            $item= array_push(['attributes' => ['error' => 'errrror', 'nombre_tramite' => 'seleccione una opcion']]);
            dd($item);
        }
        else{
            $item = Tipotramite::find($request->input('item_id'));
            dd($item);
        }
        return view('tramacad::formularios.index', compact('item'));
        // Realizar acción con el item seleccionado
        //return redirect('formularios');
        
    }

}
