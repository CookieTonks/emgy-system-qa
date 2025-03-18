<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use PDF;




class compras_controller extends Controller
{


    public function dashboard_compras(Request $request)
    {

        $notificaciones =  Models\notifications::all();

        $oc = models\ocompras::latest()->first();
        $ultima = $oc->id;
        $proveedores = models\proveedor::all();

        $materiales =  models\materiales::where('estatus', '=', 'SOLICITADA')->get();
        return view('modulos.compras.dashboard_compras', compact('proveedores', 'materiales', 'ultima', 'notificaciones'));
    }

    public function buscador_compras()
    {
        $notificaciones =  Models\notifications::all();
        $materiales =  models\materiales::all();

        $ocompras =  models\ocompras::all();

        return view('modulos.compras.buscador_compras', compact('materiales', 'notificaciones'));
    }

    public function dashboard_certificados()
    {

        $notificaciones =  Models\notifications::all();


        return view('modulos.compras.dashboard_certificados', compact('notificaciones'));
    }

    public function buscador_material($id)
    {
        $notificaciones =  Models\notifications::all();

        $materiales =  models\materiales::all();

        $materiales_asignados =  Models\materiales::where('oc', '=', $id)->get();

        return view('modulos.compras.buscador_material', compact('ocompras', 'materiales', 'notificaciones'));
    }

    public function alta_oc(Request $request)
    {

        $fecha = Carbon::now();

        $alta_oc = new models\ocompras();
        $alta_oc->proveedor = $request->proveedor;
        $alta_oc->usuario_alta = Auth::user()->name;
        $alta_oc->estatus = 'ASIGNADA';
        $alta_oc->save();

        $partidas = models\materiales::where('estatus', '=', 'SOLICITADA')->where('proveedor', '=', $alta_oc->proveedor)->get();

        foreach ($partidas as $partida) {
            $partida->oc = $alta_oc->id;
            $partida->fecha_oc = $fecha;
            $partida->personal_oc = Auth::user()->name;
            $partida->estatus = 'ASIGNADA';
            $partida->save();

            $ruta = models\emgy_rutas::where('ot', '=', $partida->ot)->first();
            $ruta->sistema_compras = 'DONE';
            $ruta->save();


            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $partida->ot;
            $registro_jets->movimiento = 'COMPRAS - OC';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();
        }


        $materiales = models\materiales::where('oc', '=', $alta_oc->id)->get();

        $pdf = PDF::loadView('modulos.compras.orden_pdf', compact('alta_oc', 'materiales'));

        return $pdf->stream($alta_oc->id . '.pdf');
    }
    public function material_oc($id)
    {
        $notificaciones =  Models\notifications::all();

        $ocompras = Models\ocompras::findOrFail($id);
        $materiales_asignados =  Models\materiales::where('oc', '=', $id)->get();
        $materiales_pendientes = Models\materiales::where('estatus', '=', 'SOLICITADA')->where('tipo', '=', $ocompras->tipo_oc)->get();

        return view('modulos.compras.dashboard_material', compact('ocompras', 'materiales_asignados', 'materiales_pendientes', 'notificaciones'));
    }

    public function material_proveedor(Request $request)
    {


        $asignar_oc =  Models\materiales::where('id', '=', $request->id)->first();
        $asignar_oc->cantidad_solicitada = $request->cantidad_solicitada;
        $asignar_oc->proveedor = $request->proveedor;
        $asignar_oc->save();


        return back()->with('mensaje-success', '¡Material agregado a la orden de compra con exito!');
    }

    public function edicion_material(Request $request)
    {
        $edicion_material =  Models\materiales::where('id', '=', $request->id)->first();
        $edicion_material->cantidad_solicitada = $request->cantidad;
        $edicion_material->save();
        return back()->with('mensaje-success', '¡Material modificado con exito!');
    }


}
