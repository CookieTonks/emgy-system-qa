<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\inspections;
use App\Models\emgy_rutas;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\Storage;


class calidad_controller extends Controller
{
    public function dashboard_calidad()
    {
        $notificaciones = Models\notifications::all();

        $ordenes = models\salidas_produccion::where('estatus', '=', 'P/CALIDAD')->get();

        $retrabajos = models\production::where('modalidad', '=', 'RETRABAJO')->get();

        $usuarios = models\user::where('role', '=', 'Programador')->orderby('name', 'asc')->get();



        return view('modulos.calidad.dashboard_calidad', compact('retrabajos', 'ordenes', 'notificaciones', 'usuarios'));
    }

    public function buscador_calidad()
    {
        $ordenes = inspections::with('order')->get();


        $notificaciones = Models\notifications::all();


        return view('modulos.calidad.buscador_calidad', compact('ordenes', 'notificaciones'));
    }

    public function calidad_embarques(Request $request)
    {

        //Parcialidad liberada

        if ($request->tipo_inspeccion === 'LIBERADO') {

            $rutas_jets = models\emgy_rutas::where('ot', '=', $request->ot)->first();
            $rutas_jets->sistema_calidad = 'DONE';
            $rutas_jets->save();

            $orden_datos = Order::where('id', '=', $request->ot)->first();


            //Parcialidad liberada con tratamiento externo
            if ($request->servicio_externo == 'REQUERIDO') {
                $registro_jets = new models\emgy_registros();
                $registro_jets->ot = $request->ot;
                $registro_jets->movimiento = 'CALIDAD - TRATAMIENTO';
                $registro_jets->responsable = Auth::user()->name;
                $registro_jets->save();


                $salida = models\salidas_produccion::where('id', '=', $request->id)->first();
                $salida->estatus = "ENVIADA A TRATAMIENTO";
                $salida->save();



                $alta_material = new Models\materiales();
                $alta_material->ot = $request->ot;
                $alta_material->descripcion = $orden_datos->descripcion;
                $alta_material->tipo = 'TRATAMIENTO EXTERNO';
                $alta_material->codigo = $request->codigo;
                $alta_material->cantidad_solicitada = $request->cant_liberada;
                $alta_material->proveedor = '-';
                $alta_material->um = "PZA";
                $alta_material->empresa = $orden_datos->empresa;
                $alta_material->estatus = 'P/ALMACEN';
                $alta_material->save();
            }

            //Parcialidad liberada sin tratamiento externo
            else {
                $registro_jets = new models\emgy_registros();
                $registro_jets->ot = $request->ot;
                $registro_jets->movimiento = 'CALIDAD - EMBARQUES';
                $registro_jets->responsable = Auth::user()->name;
                $registro_jets->save();

                $calidad_proceso = models\salidas_produccion::where('id', '=', $request->id)->first();
                $calidad_proceso->estatus = 'P/EMBARQUES';
                $calidad_proceso->save();
            }


            //Carga de PDF liberación

            Storage::disk('public')->putFileAs('liberacion/' . $request->ot, $request->file('doc'), $request->ot . '.pdf');
        }

        //Parcialidad para retrabajo
        else if ($request->tipo_inspeccion === 'RETRABAJO') {




            $reporte = new models\pconforme();
            $reporte->ot = $request->ot;
            $reporte->num_parte = $request->num_parte;
            $reporte->operador = $request->operador;
            $reporte->descripcion = $request->descripcion;
            $reporte->cant = $request->cant_scrap;
            $reporte->cliente = $request->cliente;
            $reporte->analisis = $request->analisis;
            $reporte->origen = $request->origen;
            $reporte->disposicion = $request->disposicion;
            $reporte->save();

            $rutas_jets = models\emgy_rutas::where('ot', '=', $request->ot)->first();
            $rutas_jets->sistema_produccion = '-';
            $rutas_jets->save();


            $produccion = models\production::where('ot', '=', $request->ot)->first();
            $produccion->estatus = 'RETRABAJO';
            $produccion->pr = 0;

            $produccion->modalidad = 'RETRABAJO';
            $produccion->save();

            $order = Order::where('id', '=', $request->ot)->first();
            $order->cant_retrabajo = $request->cant_retrabajo;
            $order->save();

            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $rutas_jets->ot;
            $registro_jets->movimiento = 'CALIDAD - RETRABAJO';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            $calidad_proceso = models\salidas_produccion::where('id', '=', $request->id)->first();
            $calidad_proceso->estatus = 'P\RETRABAJO';
            $calidad_proceso->save();



            Storage::disk('public')->putFileAs('retrabajo/' . $request->ot, $request->file('doc'), $request->ot . '.pdf');
        } else if ($request->tipo_inspeccion === 'SCRAP') {



            $reporte = new models\pconforme();
            $reporte->ot = $request->ot;
            $reporte->num_parte = $request->num_parte;
            $reporte->operador = $request->operador;
            $reporte->descripcion = $request->descripcion;
            $reporte->cant = $request->cant_scrap;
            $reporte->cliente = $request->cliente;
            $reporte->analisis = $request->analisis;
            $reporte->origen = $request->origen;
            $reporte->disposicion = $request->disposicion;
            $reporte->save();

            $rutas_jets = models\emgy_rutas::where('ot', '=', $request->ot)->first();
            $rutas_jets->sistema_produccion = '-';
            $rutas_jets->sistema_almacenr = '-';
            $rutas_jets->sistema_compras = '-';
            $rutas_jets->sistema_almacen = '-';
            $rutas_jets->save();

            $produccion = models\production::where('ot', '=', $request->ot)->first();
            $produccion->estatus = "REGISTRADA";
            $produccion->pr = 0;

            $produccion->modalidad = "SCRAP";
            $produccion->save();

            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $rutas_jets->ot;
            $registro_jets->movimiento = 'CALIDAD - SCRAP';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();


            $calidad_proceso = models\salidas_produccion::where('id', '=', $request->id)->first();
            $calidad_proceso->estatus = "P\SCRAP";
            $calidad_proceso->save();


            $material = models\materiales::where('ot', '=', $request->ot)->get();

            Storage::disk('public')->putFileAs('scrap/' . $request->ot, $request->file('doc'), $request->ot . '.pdf');

            foreach ($material as $material) {
                $material->estatus = 'P/ALMACEN';
                $material->save();
            }
        }

        $inspections = new models\inspections();
        $inspections->ot = $request->ot;
        $inspections->tipo_inspeccion = $request->tipo_inspeccion;
        $inspections->cant_scrap = $request->cant_scrap;
        $inspections->cant_liberada = $request->cant_liberada;
        $inspections->cant_retrabajo = $request->cant_retrabajo;
        $inspections->usuario = Auth::user()->name;
        $inspections->observaciones = $request->observaciones;
        $inspections->save();


        return back()->with('mensaje-success', '¡Inpección realizada con exito!');
    }

    public function calidad_produccion($orden)
    {
        $orden_produccion = models\production::where('ot', '=', $orden)->first();
        $orden_produccion->estatus = 'L.Produccion';
        $orden_produccion->save();

        $rutas_jets = models\emgy_rutas::where('ot', '=', $orden)->first();
        $rutas_jets->sistema_produccion = '-';
        $rutas_jets->save();

        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $orden_produccion->ot;
        $registro_jets->movimiento = 'CALIDAD - PRODUCCION';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();

        return back()->with('mensaje-success', '¡OT regresada a producción con éxito!');
    }


    public function rechazo_cliente(Request $request)
    {
        $orden = models\production::where('ot', '=', $request->ot)->first();
        $orden->estatus = 'E.CALIDAD';
        $orden->save();

        $rutas_jets = models\emgy_rutas::where('ot', '=', $request->ot)->first();
        $rutas_jets->sistema_calidad = '-';
        $rutas_jets->sistema_produccion = 'DONE';

        $rutas_jets->save();

        return back()->with('mensaje-success', 'Rechazo registrado con exito!');
    }
}
