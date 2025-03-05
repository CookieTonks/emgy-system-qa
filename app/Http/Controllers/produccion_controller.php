<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

use App\Models\Order;




class produccion_controller extends Controller
{
    public function dashboard_produccion()
    {
        $notificaciones = Models\notifications::all();

        $ordenes = DB::table('productions')
            ->join('orders', 'orders.id', '=', 'productions.ot')
            ->where('productions.estatus', '=', 'L.PRODUCCION')
            ->orWhere('productions.estatus', '=', 'ASIGNADA')
            ->orWhere('productions.estatus', '=', 'EN MAQUINA')
            ->orWhere('productions.estatus', '=', 'EN ESPERA')
            ->orWhere('productions.estatus', '=', 'FINALIZADA')
            ->orWhere('productions.estatus', '=', 'RETRABAJO')
            ->select('productions.*', 'orders.cantidad', 'orders.cant_entregada', 'orders.procesos', 'orders.cant_retrabajo')
            ->get();




        $usuarios = models\user::where('role', '=', 'Programador')->orderby('name', 'asc')->get();

        $maquinas = Models\maquinas::orderBy('codigo', 'ASC')->get();

        return view('modulos.produccion.dashboard_produccion', compact('usuarios', 'maquinas', 'ordenes', 'notificaciones'));
    }

    public function asignacion_produccion(Request $request)
    {


        $date = Carbon::now();

        $maquina = models\maquinas::where('codigo', '=', $request->maquina)->first();
        $programador = models\user::where('id', '=', $request->programador)->first();

        $suma_maquina = $maquina->carga + 1;
        $maquina->carga = $suma_maquina;
        $maquina->ultima_ot = $request->ot;
        $maquina->save();

        $registro_maquina = new models\registros_maquinas();
        $registro_maquina->ot = $request->ot;
        $registro_maquina->maquina = $request->maquina;
        $registro_maquina->responsable = $programador->name;
        $registro_maquina->save();


        $ot_produccion = models\production::where('ot', '=', $request->ot)->first();

        if ($ot_produccion->estatus === "RETRABAJO") {
            $ot = Order::where('id', '=', $request->ot)->first();
            $ot->cant_retrabajo = $request->retrabajo;
            $ot->save();
        }

        $ot_produccion->estatus = 'ASIGNADA';
        $ot_produccion->maquina_asignada = $request->maquina;
        $ot_produccion->persona_asignada = $programador->name;
        $ot_produccion->tiempo_asignada = $date;
        $ot_produccion->save();



        $orden_trabajo = Order::where('id', '=', $request->ot)->first();
        $orden_trabajo->estatus = "EN PRODUCCION";
        $orden_trabajo->save();



        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $ot_produccion->ot;
        $registro_jets->movimiento = 'PRODUCCION - ASIGNADA';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();

        return back()->with('mensaje-success', '¡Orden de trabajo asignada!');
    }

    public function reubicacion_orden(Request $request)
    {

        $produccion = models\production::where('ot', '=', $request->ot)->first();
        $carga_maquina = models\maquinas::where('codigo', '=', $produccion->maquina_asignada)->first();
        $carga_maquina->carga = $carga_maquina->carga - 1;
        $carga_maquina->save();

        $maquina = models\maquinas::where('codigo', '=', $request->maquina)->first();
        $programador = models\user::where('id', '=', $request->programador)->first();



        $registro_maquina = new models\registros_maquinas();
        $registro_maquina->ot = $request->ot;
        $registro_maquina->maquina = $request->maquina;
        $registro_maquina->responsable = $programador->name;
        $registro_maquina->save();

        $suma_maquina = $maquina->carga + 1;
        $maquina->carga = $suma_maquina;
        $maquina->ultima_ot = $request->ot;
        $maquina->save();
        $ot_produccion = models\production::where('ot', '=', $request->ot)->first();
        $ot_produccion->estatus = 'ASIGNADA';
        $ot_produccion->maquina_asignada = $request->maquina;
        $ot_produccion->persona_asignada = $programador->name;
        $ot_produccion->save();



        $orden_trabajo = Order::where('id', '=', $request->ot)->first();
        $orden_trabajo->estatus = "EN PRODUCCION";
        $orden_trabajo->save();



        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $ot_produccion->ot;
        $registro_jets->movimiento = 'PRODUCCION - REASIGNADA';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();

        return back()->with('mensaje-success', '¡Orden de trabajo asignada!');
    }

    public function dashboard_programador()
    {
        $notificaciones = Models\notifications::all();


        $ordenes = models\production::join('orders', 'orders.id', '=', 'productions.ot')
            ->where('productions.estatus', '<>', 'Finalizada')
            ->where('productions.persona_asignada', '=', Auth::user()->name)
            ->get(['productions.*', 'orders.cant_retrabajo', 'orders.cantidad']);


        return view('modulos.produccion.dashboard_programador', compact('ordenes', 'notificaciones'));
    }


    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = models\Events::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = models\Events::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = models\Events::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }

    public function inicio_ot($orden)
    {

        $now = Carbon::now();

        $orden_programador = models\production::where('id', '=', $orden)->first();

        $registro_maquina = new models\registros_maquinas();
        $registro_maquina->ot = $orden_programador->ot;
        $registro_maquina->tipo = 'INICIO';
        $registro_maquina->maquina = $orden_programador->maquina_asignada;
        $registro_maquina->hora = $now;
        $registro_maquina->responsable = Auth::user()->name;
        $registro_maquina->save();

        $orden_programador->tiempo_inicio = $now;
        $orden_programador->estatus = 'EN MAQUINA';
        $orden_programador->save();

        $maquina = models\maquinas::where('codigo', '=', $orden_programador->maquina_asignada)->first();
        $maquina->estatus = 'ACTIVA';
        $maquina->save();




        $registro_jets = new models\emgy_registros();
        $registro_jets->ot = $orden_programador->ot;
        $registro_jets->movimiento = 'PRODUCCION - INICIADA';
        $registro_jets->responsable = Auth::user()->name;
        $registro_jets->save();




        return back()->with('mensaje-success', '¡OT iniciada a las: ' . $now . ' registrada');
    }
    public function pausa_ot($orden)
    {

        $now = Carbon::now();

        $orden_programador = models\production::where('id', '=', $orden)->first();

        if ($orden_programador->tiempo_inicio == '') {
            return back()->with('mensaje-error', '¡La OT no ha sido iniciada!');
        } else {

            $registro_maquina = new models\registros_maquinas();
            $registro_maquina->ot = $orden_programador->ot;
            $registro_maquina->tipo = 'PAUSADA';
            $registro_maquina->maquina = $orden_programador->maquina_asignada;
            $registro_maquina->hora = $now;
            $registro_maquina->responsable = Auth::user()->name;
            $registro_maquina->save();

            $orden_programador->tiempo_final = $now;
            $orden_programador->estatus = 'EN ESPERA';

            $minutos = (strtotime($orden_programador->tiempo_inicio) - strtotime($orden_programador->tiempo_final)) / 60;
            $minutos = abs($minutos);
            $minutos = floor($minutos);


            $orden_programador->tiempo_progreso = $orden_programador->tiempo_progreso + $minutos;
            $orden_programador->save();

            $orden_programador_limpia = models\production::where('id', '=', $orden)->first();
            $orden_programador_limpia->tiempo_inicio = '';
            $orden_programador_limpia->tiempo_final = '';
            $orden_programador_limpia->save();

            $maquina = models\maquinas::where('codigo', '=', $orden_programador_limpia->maquina_asignada)->first();
            $maquina->estatus = 'SIN CARGA';
            $maquina->save();


            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $orden_programador->ot;
            $registro_jets->movimiento = 'PRODUCCION - PAUSADA';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            return back()->with('mensaje-success', '¡Orden de trabajo en espera!');
        }
    }


    public function final_ot(Request $request)
    {

        $now = Carbon::now();

        $orden_programador = models\production::where('id', '=', $request->id)->first();

        if ($orden_programador->tiempo_inicio == '') {
            return back()->with('mensaje-error', '¡La OT no ha sido iniciada!');
        } else {

            $registro_maquina = new models\registros_maquinas();
            $registro_maquina->ot = $orden_programador->ot;
            $registro_maquina->tipo = 'FINALIZADA';
            $registro_maquina->maquina = $orden_programador->maquina_asignada;
            $registro_maquina->hora = $now;
            $registro_maquina->responsable = Auth::user()->name;
            $registro_maquina->c_acabado = $request->criterio_acabado;
            $registro_maquina->c_rebabeo = $request->criterio_rebabeo;
            $registro_maquina->c_machueleado = $request->criterio_machueleado;
            $registro_maquina->c_limpieza = $request->criterio_limpieza;
            $registro_maquina->c_chaflanes = $request->criterio_chaflanes;
            $registro_maquina->c_roscas = $request->criterio_roscas;
            $registro_maquina->save();


            $orden_programador->tiempo_final = $now;
            $orden_programador->estatus = 'FINALIZADA';

            $minutos = (strtotime($orden_programador->tiempo_inicio) - strtotime($orden_programador->tiempo_final)) / 60;
            $minutos = abs($minutos);
            $minutos = floor($minutos);


            $orden_programador->tiempo_progreso = $orden_programador->tiempo_progreso + $minutos;
            $orden_programador->save();

            $orden_programador_limpia = models\production::where('id', '=', $request->id)->first();
            $orden_programador_limpia->tiempo_final = $now;
            $orden_programador_limpia->pr = $orden_programador_limpia->pr + 1;
            $orden_programador_limpia->save();

            $maquina = models\maquinas::where('codigo', '=', $orden_programador_limpia->maquina_asignada)->first();
            $maquina->carga = $maquina->carga - 1;
            $maquina->estatus = 'SIN CARGA';
            $maquina->save();




            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $orden_programador->ot;
            $registro_jets->movimiento = 'PRODUCCION - FINALIZADA';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            return back()->with('mensaje-success', '¡Orden de trabajo finalizada!');
        }
    }



    public function  tareas_supervisor(Request $request)
    {

        try {
            $orden = $request->ot;

            if ($request->tarea_supervisor === 'Inicio') {
                $now = Carbon::now();

                $orden_programador = models\production::where('ot', '=', $orden)->first();

                $registro_maquina = new models\registros_maquinas();
                $registro_maquina->ot = $orden_programador->ot;
                $registro_maquina->tipo = 'INICIO';
                $registro_maquina->hora = $now;
                $registro_maquina->responsable = Auth::user()->name;
                $registro_maquina->save();

                $orden_programador->tiempo_inicio = $now;
                $orden_programador->estatus = 'EN MAQUINA';
                $orden_programador->save();


                $registro_emgy = new models\emgy_registros();
                $registro_emgy->ot = $orden_programador->ot;
                $registro_emgy->movimiento = 'PRODUCCION - INICIADA';
                $registro_emgy->responsable = Auth::user()->name;
                $registro_emgy->save();




                return back()->with('mensaje-success', '¡OT iniciada a las: ' . $now . ' registrada');
            } elseif ($request->tarea_supervisor === 'Pausa') {
                $now = Carbon::now();

                $orden_programador = models\production::where('ot', '=', $orden)->first();

                if ($orden_programador->tiempo_inicio == '') {
                    return back()->with('mensaje-error', '¡La OT no ha sido iniciada!');
                } else {

                    $registro_maquina = new models\registros_maquinas();
                    $registro_maquina->ot = $orden_programador->ot;
                    $registro_maquina->tipo = 'PAUSADA';
                    $registro_maquina->hora = $now;
                    $registro_maquina->responsable = Auth::user()->name;
                    $registro_maquina->save();

                    $orden_programador->tiempo_final = $now;
                    $orden_programador->estatus = 'EN ESPERA';

                    $minutos = (strtotime($orden_programador->tiempo_inicio) - strtotime($orden_programador->tiempo_final)) / 60;
                    $minutos = abs($minutos);
                    $minutos = floor($minutos);


                    $orden_programador->tiempo_progreso = $orden_programador->tiempo_progreso + $minutos;
                    $orden_programador->save();

                    $orden_programador_limpia = models\production::where('ot', '=', $orden)->first();
                    $orden_programador_limpia->tiempo_inicio = '';
                    $orden_programador_limpia->tiempo_final = '';
                    $orden_programador_limpia->save();



                    $registro_emgy = new models\emgy_registros();
                    $registro_emgy->ot = $orden_programador->ot;
                    $registro_emgy->movimiento = 'PRODUCCION - PAUSADA';
                    $registro_emgy->responsable = Auth::user()->name;
                    $registro_emgy->save();
                    return back()->with('mensaje-success', '¡Orden de trabajo en espera!');
                }
            } elseif ($request->tarea_supervisor === 'Finalizar') {
                $now = Carbon::now();

                $orden_programador = models\production::where('ot', '=', $orden)->first();

                if ($orden_programador->tiempo_inicio == '') {
                    return back()->with('mensaje-error', '¡La OT no ha sido iniciada!');
                } else {

                    $registro_maquina = new models\registros_maquinas();
                    $registro_maquina->ot = $orden_programador->ot;
                    $registro_maquina->tipo = 'FINALIZADA';
                    $registro_maquina->hora = $now;
                    $registro_maquina->responsable = Auth::user()->name;
                    $registro_maquina->c_acabado = $request->criterio_acabado;
                    $registro_maquina->c_rebabeo = $request->criterio_rebabeo;
                    $registro_maquina->c_machueleado = $request->criterio_machueleado;
                    $registro_maquina->c_limpieza = $request->criterio_limpieza;
                    $registro_maquina->c_chaflanes = $request->criterio_chaflanes;
                    $registro_maquina->c_roscas = $request->criterio_roscas;
                    $registro_maquina->save();


                    $orden_programador->tiempo_final = $now;
                    $orden_programador->estatus = 'FINALIZADA';

                    $minutos = (strtotime($orden_programador->tiempo_inicio) - strtotime($orden_programador->tiempo_final)) / 60;
                    $minutos = abs($minutos);
                    $minutos = floor($minutos);


                    $orden_programador->tiempo_progreso = $orden_programador->tiempo_progreso + $minutos;
                    $orden_programador->save();

                    $orden_programador_limpia = models\production::where('ot', '=', $orden)->first();
                    $orden_programador_limpia->tiempo_final = $now;
                    $orden_programador_limpia->pr = $orden_programador_limpia->pr + 1;
                    $orden_programador_limpia->save();


                    $registro_emgy = new models\emgy_registros();
                    $registro_emgy->ot = $orden_programador->ot;
                    $registro_emgy->movimiento = 'PRODUCCION - FINALIZADA';
                    $registro_emgy->responsable = Auth::user()->name;
                    $registro_emgy->save();

                    return back()->with('mensaje-success', '¡Orden de trabajo finalizada!');
                }
            }
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Error al cambiar el estatus de la orden, por favor intenta de nuevo!' . $th);
        }
    }


    public function salida_produccion(Request $request)
    {
        $orden_programador = models\production::where('ot', '=', $request->ot)->first();

        if ($orden_programador->modalidad === 'SCRAP' || $orden_programador->modalidad === 'RETRABAJO') {
            // Realizar los registros sin verificar la igualdad
            $this->realizarRegistros($request);
        } else {
            $piezas = models\salidas_produccion::where('ot', '=', $request->ot)->sum('cantidad');
            $oc = Order::where('id', '=', $request->ot)->first();

            $suma = $piezas + $request->cantidad;

            if ($suma <= $oc->cantidad) {
                $this->realizarRegistros($request);
            } else {
                return $this->redireccionarConError('¡Las piezas no coinciden con la orden de compra!');
            }
        }

        return redirect()->route('dashboard_produccion')->with('mensaje-success', '¡Validación final registrada con éxito!');
    }


    public function realizarRegistros($request)
    {
        // Realizar los registros de salida de producción
        $salida_produccion = new models\salidas_produccion();
        $salida_produccion->ot = $request->ot;
        $salida_produccion->descripcion = $request->descripcion;
        $salida_produccion->cliente = $request->cliente;
        $salida_produccion->tipo_salida = $request->tipo_salida;
        $salida_produccion->cantidad = $request->cantidad;
        $salida_produccion->estatus = "P/CALIDAD";
        $salida_produccion->save();

        if ($request->tipo_salida === 'SALIDA PARCIAL') {
            // Registrar el movimiento de salida parcial
            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $request->ot;
            $registro_jets->movimiento = 'S. PRODUCCION - PARCIAL';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            return $this->redireccionarConExito('¡Validación parcial registrada con éxito!');
        }

        if ($request->tipo_salida === 'SALIDA FINAL') {
            // Actualizar el estado de la ruta de producción
            $ruta = models\emgy_rutas::where('ot', '=', $request->ot)->first();
            $ruta->sistema_produccion = 'DONE';
            $ruta->save();

            // Registrar el movimiento de salida final
            $registro_jets = new models\emgy_registros();
            $registro_jets->ot = $request->ot;
            $registro_jets->movimiento = 'S. PRODUCCION - FINALIZADA';
            $registro_jets->responsable = Auth::user()->name;
            $registro_jets->save();

            // Actualizar el estado de la orden de producción
            $orden_programador = models\production::where('ot', '=', $request->ot)->first();
            $orden_programador->estatus = 'E.CALIDAD';
            $orden_programador->save();

            return $this->redireccionarConExito('¡Validación final registrada con éxito!');
        }
    }

    private function redireccionarConError($mensaje)
    {
        return redirect()->route('dashboard_produccion')->with('mensaje-error', $mensaje);
    }

    private function redireccionarConExito($mensaje)
    {
        return redirect()->route('dashboard_produccion')->with('mensaje-success', $mensaje);
    }
}
