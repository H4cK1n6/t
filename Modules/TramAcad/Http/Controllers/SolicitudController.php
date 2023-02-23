<?php

namespace Modules\TramAcad\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Modules\TramAcad\Entities\Solicitud;
use Modules\TramAcad\Entities\Unidad;
use Modules\TramAcad\Entities\Tipotramite;

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
        //return $request -> all();
       
        //dd($request->session(auth('user')));
        $user = Auth::id();
        $detalle=Tipotramite::find($request->input('item_id'));
        //dd($user);
        $solicitud = new Solicitud();
        $solicitud->user_id = $user;
        $solicitud->unidad_id = $request->unidad_id;
        //dd($detalle->nombre_tramite);
        $solicitud->detalle_solicitud = $detalle->nombre_tramite;
        $solicitud->fecha_envio = date('Y-m-d H:i:s');
        $solicitud->estado_solicitud = "Pendiente";
        $solicitud->save();

        //return $solicitud;

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
        $items = Tipotramite::all();
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
