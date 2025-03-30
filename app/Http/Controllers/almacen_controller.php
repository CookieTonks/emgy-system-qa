<?php

namespace App\Http\Controllers;

use App\Models;

use App\Models\materiales;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;





class almacen_controller extends Controller
{


    //Maybe we going to delete this
    public function filtro_almacen()
    {
        $notificaciones = Models\notifications::all();

        $materiales = models\materiales::where('estatus', '=', 'P.REVISION')
            ->where('estatus', '=', 'ASI')
            ->get();


        return view('modulos.almacen.filtro_almacen', compact('materiales', 'notificaciones', 'proveedores'));
    }

    public function buscador_almacen()
    {
        $notificaciones = Models\notifications::all();

        $materiales = models\materiales::all();
        return view('modulos.almacen.buscador_almacen', compact('materiales', 'notificaciones'));
    }
    public function dashboard_almacen()
    {
        $materiales_revision = models\materiales::where('estatus', '=', 'P/ALMACEN')
            ->get();

        $materiales_recepcion = models\materiales::where('estatus', '=', 'ASIGNADA')
            ->get();

        $notificaciones = Models\notifications::all();

        $proveedores = models\proveedor::all();

        return view('modulos.almacen.dashboard_almacen ', compact('proveedores', 'materiales_revision', 'materiales_recepcion', 'notificaciones'));
    }

    public function recepcion_material(Request $request)
    {
        $date = Carbon::now();
        $registro_material = new models\registros_almacen();
        $registro_material->id_material = $request->id;
        $registro_material->ot = $request->ot;
        $registro_material->descripcion = $request->descripcion;
        $registro_material->factura = $request->factura;
        $registro_material->cantidad = $request->cantidad;
        $registro_material->tipo_recepcion = $request->tipo_recepcion;
        $registro_material->tipo_entrega = $request->tipo_entrega;
        $registro_material->oc = $request->oc;
        $registro_material->personal = $request->personal;
        $registro_material->fecha_recepcion = $date;
        $registro_material->save();

        $produccion = models\production::where('ot', '=', $request->ot)->first();


        if ($request->tipo_recepcion === 'PARCIAL') {
            $recepcion_material = models\materiales::where('id', '=', $request->id)->first();
            $recepcion_material->fecha_almacen = $date;
            $cantidad_total = $recepcion_material->cantidad_recibida + $request->cantidad_recibida;
            $recepcion_material->cantidad_recibida = $cantidad_total;
            $recepcion_material->personal_almacen = Auth::user()->name;
            $recepcion_material->save();
        } elseif ($request->tipo_recepcion === 'FINAL') {
            $recepcion_material = models\materiales::where('id', '=', $request->id)->first();
            $material_entrada = intval($request->cantidad_recibida);
            $material_historial = intval($recepcion_material->cantidad_recibida);
            $material_solicitado = intval($recepcion_material->cantidad_solicitada);

            $cantidad_total = $material_historial + $material_entrada;

            if ($registro_material->tipo_entrega === 'PRODUCCION' && $produccion->modalidad === 'SCRAP') {
                $recepcion_material->estatus = 'RECIBIDA';
            } else {
                if ($cantidad_total != $material_solicitado) {
                    return back()->with('mensaje-error', 'Las cantidades no coinciden, no puede ser salida final!');
                }
                $recepcion_material->estatus = 'RECIBIDA';
            }

            $recepcion_material->fecha_almacen = $date;
            $recepcion_material->cantidad_recibida = $cantidad_total;
            $recepcion_material->personal_almacen = Auth::user()->name;
            $recepcion_material->save();
        }


        if ($registro_material->tipo_entrega === 'PRODUCCION') {

            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $request->ot;
            $registro_jets->movimiento = 'ALMACEN - PRODUCCION';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            $ruta = models\emgy_rutas::where('ot', '=', $request->ot)->first();
            $ruta->sistema_almacenr = 'DONE';
            $ruta->sistema_compras = 'DONE';
            $ruta->sistema_almacen = 'DONE';
            $ruta->save();


            if ($produccion->estatus === 'REGISTRADA' || $produccion->estatus === 'E.CALIDAD') {
                $produccion->estatus = "L.PRODUCCION";
                $produccion->save();
            }
        }

        return back()->with('mensaje-success', '¡Alta de material registrada!');
    }


    public function regreso_tratamiento_almacen(Request $request)
    {

        $material = models\materiales::where('id', '=', $request->id)->first();
        $material->estatus = "RECIBIDA";
        $material->factura = $request->factura;
        $material->save();

        $busqueda_ot = Order::where('id', '=', $request->ot)->first();


        $salida_produccion = new models\salidas_produccion();
        $salida_produccion->ot = $request->ot;
        $salida_produccion->descripcion = $busqueda_ot->descripcion;
        $salida_produccion->cliente = $busqueda_ot->cliente;
        $salida_produccion->tipo_salida = "REGRESO DE TRATAMIENTO";
        $salida_produccion->cantidad = $request->cantidad;
        $salida_produccion->estatus = "P/CALIDAD";
        $salida_produccion->save();

        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $request->ot;
        $registro_jets->movimiento = 'TRATAMIENTO (ALMACEN - EMBARQUES)';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();

        return back()->with('mensaje-success', '¡Orden de trabajo enviada a calidad!');
    }


    public function envio_material(Request $request)
    {
        $date = Carbon::now();

        $registro_material = new models\registros_almacen();
        $registro_material->id_material = $request->id;
        $registro_material->ot = $request->ot;
        $registro_material->descripcion = $request->descripcion;
        $registro_material->cantidad = $request->cantidad;
        $registro_material->tipo_recepcion = 'SOLICITADA';
        $registro_material->personal = $request->personal;
        $registro_material->fecha_recepcion = $date;
        $registro_material->save();


        $recepcion_material = models\materiales::where('id', '=', $request->id)->first();
        $recepcion_material->estatus = 'SOLICITADA';
        $recepcion_material->cantidad_almacen = $request->cantidad_almacen;
        $recepcion_material->fecha_almacen = $date;
        $recepcion_material->personal_almacen = Auth::user()->name;
        $recepcion_material->save();

        $material = Models\materiales::where('ot', '=', $request->ot)->count();
        $material_solicitado = Models\materiales::where('ot', '=', $request->ot)->where('estatus', '=', 'SOLICITADA')->count();



        $ruta = models\emgy_rutas::where('ot', '=', $request->ot)->first();
        $ruta->sistema_almacen = 'DONE';
        $ruta->save();

        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $request->ot;
        $registro_jets->movimiento = 'ALMACEN - COMPRAS';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();



        return back()->with('mensaje-success', '¡Alta de material registrada!');
    }


    public function material_stock(Request $request)
    {

        $date = Carbon::now();

        $registro_material = new models\registros_almacen();
        $registro_material->id_material = $request->id;
        $registro_material->ot = $request->ot;
        $registro_material->descripcion = $request->descripcion;
        $registro_material->cantidad = $request->cantidad;
        $registro_material->tipo_recepcion = 'STOCK ALMACEN';
        $registro_material->personal = $request->personal;
        $registro_material->fecha_recepcion = $date;
        $registro_material->save();


        $recepcion_material = models\materiales::where('id', '=', $request->id)->first();
        $recepcion_material->estatus = 'STOCK ALMACEN';
        $recepcion_material->cantidad_almacen = $request->cantidad_almacen;
        $recepcion_material->fecha_almacen = $date;
        $recepcion_material->personal_almacen = Auth::user()->name;
        $recepcion_material->save();



        $ruta = models\emgy_rutas::where('ot', '=', $request->ot)->first();
        $ruta->sistema_almacen = 'DONE';
        $ruta->save();

        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $request->ot;
        $registro_jets->movimiento = 'ALMACEN - PRODUCCION';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();


        $produccion = models\production::where('ot', '=', $request->ot)->first();
        $produccion->estatus = "L.PRODUCCION";
        $produccion->save();




        return back()->with('mensaje-success', '¡Alta de material registrada!');
    }

    public function envio_tratamiento(Request $request)
    {
        $tratamiento = models\materiales::where('id', '=', $request->id)->first();
        $tratamiento->estatus = 'SOLICITADA';
        $tratamiento->proveedor = $request->proveedor;
        $tratamiento->save();


        $salida_embarques = new models\salidas_embarques();
        $salida_embarques->ot = $request->ot;
        $salida_embarques->tipo_salida = 'TRATAMIENTO EXTERNO';
        $salida_embarques->tipo_tratamiento = '-';
        $salida_embarques->proveedor = $request->proveedor;
        $salida_embarques->cantidad = $request->cantidad;
        $salida_embarques->chofer = $request->chofer;
        $salida_embarques->estatus = 'Enviada tratamiento';
        $salida_embarques->save();

        //cambio



        return back()->with('mensaje-success', '¡Enviada a tratamiento con exito!');
    }


    //Hay material va para compras
    public function material_produccion(Request $request)
    {
        $date = Carbon::now();

        $recepcion_material = models\materiales::where('id', '=', $request->id)->first();
        $recepcion_material->estatus = 'RECIBIDA';
        $recepcion_material->fecha_almacen = $date;
        $recepcion_material->personal_almacen = Auth::user()->name;
        $recepcion_material->save();

        $material = Models\materiales::where('ot', '=', $request->ot)->count();
        $material_solicitado = Models\materiales::where('ot', '=', $request->ot)->where('estatus', '=', 'RECIBIDA')->count();


        if ($material == $material_solicitado) {
            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $request->ot;
            $registro_jets->movimiento = 'ALMACEN - PRODUCCION';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            $ruta = models\emgy_rutas::where('ot', '=', $request->ot)->first();
            $ruta->sistema_almacenr = 'DONE';
            $ruta->sistema_compras = 'DONE';
            $ruta->sistema_almacen = 'DONE';
            $ruta->save();
        }


        $registro_material = new models\registros_almacen();
        $registro_material->id_material = $request->id;
        $registro_material->ot = $request->ot;
        $registro_material->descripcion = $request->descripcion;
        $registro_material->cantidad = $request->cantidad_recibida;
        $registro_material->tipo_recepcion = 'STOCK ALMACEN';
        $registro_material->tipo_entrega = $request->tipo_entrega;
        $registro_material->personal = $request->personal;
        $registro_material->fecha_recepcion = $date;
        $registro_material->save();

        if ($registro_material->tipo_entrega === 'PRODUCCION') {
            $produccion = models\production::where('ot', '=', $request->ot)->first();
            if ($produccion->estatus === 'REGISTRADA') {

                $produccion->estatus = "L.PRODUCCION";
                $produccion->save();
            }
        }


        return back()->with('mensaje-success', '¡Alta de material registrada!');
    }

    //Enviar a compras material
    public function material_compras(Request $request)
    {
        $date = Carbon::now();

        $recepcion_material = models\materiales::where('id', '=', $request->id)->first();
        $recepcion_material->estatus = 'SOLICITADA';
        $recepcion_material->save();



        $registro_material = new models\registros_almacen();
        $registro_material->id_material = $request->id;
        $registro_material->ot = $request->ot;
        $registro_material->descripcion = $request->descripcion;
        $registro_material->cantidad = $request->cantidad_recibida;
        $registro_material->tipo_recepcion = 'SOLCITADA ALMACEN';
        $registro_material->tipo_entrega = $request->tipo_entrega;
        $registro_material->personal = $request->personal;
        $registro_material->fecha_recepcion = $date;
        $registro_material->save();

        if ($registro_material->tipo_entrega === 'PRODUCCION') {
            $produccion = models\production::where('ot', '=', $request->ot)->first();
            if ($produccion->estatus === 'REGISTRADA') {

                $produccion->estatus = "L.PRODUCCION";
                $produccion->save();
            }
        }
        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $request->ot;
        $registro_jets->movimiento = 'ALMACEN - COMPRAS';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();



        $ruta = models\emgy_rutas::where('ot', '=', $request->ot)->first();
        $ruta->sistema_almacenr = 'DONE';
        $ruta->save();

        return back()->with('mensaje-success', '¡Alta de material registrada!');
    }

    public function carga_certificado(Request $request)
    {
        $request->validate([
            'oc' => 'required|exists:ocompras,id',
            'certificado' => 'required|file|mimes:pdf|max:2048',
        ]);

        $filename = $request->oc . '.pdf';
        $path = 'certificados/' . $request->oc;

        Storage::disk('public')->putFileAs($path, $request->file('certificado'), $filename);

        $ocompras = Models\ocompras::find($request->oc);
        $ocompras->certificado = 'CARGADO';
        $ocompras->save();

        return back()->with('mensaje-success', '¡Certificado cargado con éxito!');
    }
}
