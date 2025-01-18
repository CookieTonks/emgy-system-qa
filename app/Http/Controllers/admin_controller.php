<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models;
use App\Models\orders;
use App\Models\registros_maquinas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class admin_controller extends Controller
{



    public function dashboard_administrador()
    {
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $notificaciones =  Models\notifications::all();
        $empresas = models\Empresas::all();


        $ordenes_asignadas = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->count();
        $ordenes_finalizadas = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('tiempo_final', 'LIKE', '%' . $fecha . '%')->count();
        $ordenes_pendientes = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('estatus', '<>', 'Finalizada')->count();
        $maquinas = models\maquinas::where('estatus', '=', 'ACTIVA')->count();
        $clientes_conteo = models\cliente::all()->count();
        $usuarios_conteo = models\usuarios::all()->count();
        $proveedor_conteo = models\proveedor::all()->count();
        $maquinas_conteo = models\maquinas::all()->count();




        $datos_ordena = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->get();
        $datos_ordenf = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('tiempo_final', 'LIKE', '%' . $fecha . '%')->get();
        $datos_ordenp = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->where('estatus', '<>', 'Finalizada')->get();

        $clientes_ordenes = Order::groupBy('cliente')->select('cliente', DB::raw('count(*) as total'), DB::raw('sum(cantidad) as cantidad_solicitada'), DB::raw('sum(cant_entregada) as cantidad_entregada'))->get();

        $tecnicos = models\production::groupBy('persona_asignada')->select('persona_asignada', DB::raw('count(*) as orden_trabajadas'))->where('estatus', '=', 'Finalizada')->get();
        $datos_maquina = models\maquinas::where('estatus', '=', 'ACTIVA')->get();

        $clientes = models\cliente::orderBy('cliente', 'ASC')->get();

        $maquinas_list = models\maquinas::orderBy('codigo', 'ASC')->get();
        $proveedores_list = models\proveedor::orderBy('nombre', 'ASC')->get();

        $usuarios_list = models\usuarios::with('clientes')->get();

        $tecnicos_list =  models\User::where('role', '=', 'Programador')->get();
        $tecnicos_count =  models\User::where('role', '=', 'Programador')->count();



        $ordenes_trabajadas = models\production::where('tiempo_asignada', 'LIKE', '%' . $fecha . '%')->count();

        return view('modulos.administrador.dashboard_administrador', compact('tecnicos_count', 'tecnicos_list', 'usuarios_list', 'proveedores_list', 'maquinas_list', 'empresas', 'maquinas_conteo', 'proveedor_conteo', 'clientes_conteo', 'usuarios_conteo', 'notificaciones', 'clientes', 'tecnicos', 'datos_maquina', 'fecha', 'datos_ordenf', 'datos_ordena', 'datos_ordenp', 'maquinas', 'ordenes_asignadas', 'ordenes_finalizadas', 'ordenes_pendientes', 'clientes_ordenes'));
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = models\Events::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('modulos.administrador.fullcalender');
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

    public function alta_cliente(Request $request)
    {
        $cliente = new models\cliente();
        $cliente->empresa = $request->empresa;

        $cliente->cliente = $request->nombre;
        $cliente->save();
        return back()->with('mensaje-success', '¡Nuevo cliente registrado con éxito!');
    }

    public function borrar_cliente($id)
    {
        try {
            $usuario = models\cliente::findOrFail($id);
            $usuario->delete();

            return back()->with('mensaje-success', 'Cliente eliminado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Hubo un problema al eliminar el cliente, por favor intenta de nuevo!' . $th);
        }
    }

    public function alta_usuario(Request $request)
    {
        $usuario = new models\usuarios();
        $usuario->cliente = $request->cliente;
        $usuario->name = $request->usuario;
        $usuario->save();
        return back()->with('mensaje-success', '¡Nuevo usuario registrado con éxito!');
    }


    public function borrar_usuario($id)
    {
        try {
            $usuario = models\usuarios::findOrFail($id);
            $usuario->delete();

            return back()->with('mensaje-success', 'Usuario eliminado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Hubo un problema al eliminar el usuario, por favor intenta de nuevo!' . $th);
        }
    }

    public function alta_proveedor(Request $request)
    {
        $proveedor = new  models\proveedor();
        $proveedor->nombre = $request->proveedor;
        $proveedor->save();

        return back()->with('mensaje-success', '¡Nuevo proveedor registrado con éxito!');
    }


    public function borrar_proveedor($id)
    {
        try {
            $proveedor = models\proveedor::findOrFail($id);
            $proveedor->delete();
            return back()->with('mensaje-success', 'Proveedor eliminado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Hubo un problema al eliminar el proveedor, por favor intenta de nuevo!' . $th);
        }
    }

    public function alta_maquina(Request $request)
    {
        $maquina = new models\maquinas();
        $maquina->codigo = $request->codigo;
        $maquina->descripcion = $request->descripcion;
        $maquina->marca = $request->marca;
        $maquina->modelo = $request->modelo;
        $maquina->numero_serie = $request->num_serie;
        $maquina->ano = $request->ano;
        $maquina->save();
        return back()->with('mensaje-success', '¡Nueva maquina registrado con éxito!');
    }

    public function borrar_maquina($id)
    {
        try {
            $proveedor = models\maquinas::findOrFail($id);
            $proveedor->delete();
            return back()->with('mensaje-success', 'Maquina eliminada correctamente.');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Hubo un problema al eliminar la maquina, por favor intenta de nuevo!' . $th);
        }
    }


    public function alta_tecnico(Request $request)
    {
        try {
            $tecnico = new models\user();
            $tecnico->name = $request->nombre;
            $tecnico->email = $request->email;
            $tecnico->role = "Programador";
            $password = Str::random(10);
            $tecnico->password = Hash::make($password);
            $tecnico->save();
            return back()->with('mensaje-success', 'Tecnico agregado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Hubo un problema al agregar el tecnico, por favor intenta de nuevo!' . $th);
        }
    }

    public function borrar_tecnico($id)
    {
        try {
            $tecnico =  models\user::findOrFail($id);
            $tecnico->delete();
            return back()->with('mensaje-success', 'Tecnico eliminado correctamente.');
        } catch (\Throwable $th) {
            return back()->with('mensaje-error', '¡Hubo un problema al eliminar el tecnico, por favor intenta de nuevo!' . $th);
        }
    }
}
