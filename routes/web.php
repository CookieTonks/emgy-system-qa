<?php

use App\Http\Controllers\admin_controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware;

use App\Http\Controllers\ordenes_controller;
use App\Http\Controllers\produccion_controller;
use Illuminate\Database\Events\ModelsPruned;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('states-city', 'livewire.home');


// Route::get('/dashboard_administrador', [App\Http\Controllers\admin_controller::class, 'dashboard'])->name('dashboard_administrador');


// Inicio de rutas modulo ordenes de trabajo

Route::get('/dashboard_ordenes', [App\Http\Controllers\ordenes_controller::class, 'dashboard_ordenes'])->name('dashboard_ordenes')->middleware('ordenes_middleware');
Route::post('/dashboard_ordenes/', [App\Http\Controllers\ordenes_controller::class, 'dashboard_ordenes_register'])->name('dashboard_ordenes_register');

Route::get('/order_pdf/{id}', [App\Http\Controllers\ordenes_controller::class, 'order_pdf'])->name('order_pdf')->middleware('ordenes_middleware');
Route::get('/edition_order/{id}', [App\Http\Controllers\ordenes_controller::class, 'edition_order'])->name('edition_order')->middleware('ordenes_middleware');
Route::post('/edition_order/{id}', [App\Http\Controllers\ordenes_controller::class, 'edition_order_save'])->name('edition_order_save')->middleware('ordenes_middleware');
Route::post('/upload-dibujo/{id}', [App\Http\Controllers\ordenes_controller::class, 'uploadDibujo'])->name('upload_dibujo');

Route::get('/material_order/{id}', [App\Http\Controllers\ordenes_controller::class, 'material_order'])->name('material_order')->middleware('ordenes_middleware');
Route::post('/material_register/}', [App\Http\Controllers\ordenes_controller::class, 'material_register'])->name('material_register')->middleware('ordenes_middleware');
Route::get('/material_delete/{id}', [App\Http\Controllers\ordenes_controller::class, 'material_delete'])->name('material_delete')->middleware('ordenes_middleware');
Route::get('/ruta_ot/{id}', [App\Http\Controllers\ordenes_controller::class, 'ruta_ot'])->name('ruta_ot')->middleware('ordenes_middleware');
Route::get('/ordenes_exports/', [App\Http\Controllers\ordenes_controller::class, 'ordenes_exports'])->name('ordenes_exports')->middleware('ordenes_middleware');


Route::get('/dashboard_ingenieria', [App\Http\Controllers\ingenieria_controller::class, 'dashboard_ingenieria'])->name('dashboard_ingenieria')->middleware('ingenieria_middleware');
Route::post('/carga_dibujo', [App\Http\Controllers\ingenieria_controller::class, 'carga_dibujo'])->name('carga_dibujo')->middleware('ingenieria_middleware');
Route::get('/dibujos_exports', [App\Http\Controllers\ingenieria_controller::class, 'dibujos_exports'])->name('dibujos_exports')->middleware('ingenieria_middleware');

Route::get('/dashboard_compras', [App\Http\Controllers\compras_controller::class, 'dashboard_compras'])->name('dashboard_compras')->middleware('compras_middleware');
Route::post('/dashboard_compras', [App\Http\Controllers\compras_controller::class, 'alta_oc'])->name('alta_oc')->middleware('compras_middleware');


Route::get('/dashboard_certificados', [App\Http\Controllers\compras_controller::class, 'dashboard_certificados'])->name('dashboard_certificados')->middleware('compras_middleware');


Route::get('/material_oc/{id}', [App\Http\Controllers\compras_controller::class, 'material_oc'])->name('material_oc')->middleware('compras_middleware');
Route::post('/material_proveedor/', [App\Http\Controllers\compras_controller::class, 'material_proveedor'])->name('material_proveedor')->middleware('compras_middleware');
Route::get('/buscador_material/{id}', [App\Http\Controllers\compras_controller::class, 'buscador_material'])->name('buscador_material')->middleware('compras_middleware');

Route::post('/material_oc/', [App\Http\Controllers\compras_controller::class, 'material_oc_alta'])->name('material_oc_alta')->middleware('compras_middleware');
Route::post('/edicion_material/', [App\Http\Controllers\compras_controller::class, 'edicion_material'])->name('edicion_material')->middleware('compras_middleware');


Route::get('/filtro_almacen', [App\Http\Controllers\almacen_controller::class, 'filtro_almacen'])->name('filtro_almacen')->middleware('almacen_middleware');
Route::post('/envio_material', [App\Http\Controllers\almacen_controller::class, 'envio_material'])->name('envio_material')->middleware('almacen_middleware');
Route::post('/material_stock', [App\Http\Controllers\almacen_controller::class, 'material_stock'])->name('material_stock')->middleware('almacen_middleware');


Route::get('/dashboard_almacen', [App\Http\Controllers\almacen_controller::class, 'dashboard_almacen'])->name('dashboard_almacen')->middleware('almacen_middleware');
Route::post('/dashboard_almacen', [App\Http\Controllers\almacen_controller::class, 'recepcion_material'])->name('recepcion_material')->middleware('almacen_middleware');
Route::post('/material_produccion', [App\Http\Controllers\almacen_controller::class, 'material_produccion'])->name('material_produccion')->middleware('almacen_middleware');
Route::post('/material_compras', [App\Http\Controllers\almacen_controller::class, 'material_compras'])->name('material_compras')->middleware('almacen_middleware');
Route::post('/envio_tratamiento', [App\Http\Controllers\almacen_controller::class, 'envio_tratamiento'])->name('envio_tratamiento')->middleware('almacen_middleware');
Route::post('/regreso_tratamiento_almacen', [App\Http\Controllers\almacen_controller::class, 'regreso_tratamiento_almacen'])->name('regreso_tratamiento_almacen')->middleware('almacen_middleware');
Route::post('/carga_certificado/', [App\Http\Controllers\almacen_controller::class, 'carga_certificado'])->name('carga_certificado')->middleware('compras_middleware');

Route::get('/dashboard_produccion', [App\Http\Controllers\produccion_controller::class, 'dashboard_produccion'])->name('dashboard_produccion')->middleware('produccion_middleware');
Route::post('/asignacion_produccion/', [App\Http\Controllers\produccion_controller::class, 'asignacion_produccion'])->name('asignacion_produccion')->middleware('produccion_middleware');
Route::post('/reubicacion_orden/', [App\Http\Controllers\produccion_controller::class, 'reubicacion_orden'])->name('reubicacion_orden')->middleware('produccion_middleware');
Route::post('/salida_produccion/', [App\Http\Controllers\produccion_controller::class, 'salida_produccion'])->name('salida_produccion')->middleware('produccion_middleware');
Route::post('/tareas_supervisor/', [App\Http\Controllers\produccion_controller::class, 'tareas_supervisor'])->name('tareas_supervisor')->middleware('produccion_middleware');


Route::get('/dashboard_programador', [App\Http\Controllers\produccion_controller::class, 'dashboard_programador'])->name('dashboard_programador')->middleware('programador_middleware');
Route::get('/inicio_ot/{id}', [App\Http\Controllers\produccion_controller::class, 'inicio_ot'])->name('inicio_ot')->middleware('programador_middleware');
Route::get('/pausa_ot/{id}', [App\Http\Controllers\produccion_controller::class, 'pausa_ot'])->name('pausa_ot')->middleware('programador_middleware');
Route::post('/final_ot/', [App\Http\Controllers\produccion_controller::class, 'final_ot'])->name('final_ot')->middleware('programador_middleware');


Route::get('/dashboard_calidad', [App\Http\Controllers\calidad_controller::class, 'dashboard_calidad'])->name('dashboard_calidad')->middleware('calidad_middleware');
Route::post('/calidad_embarques/', [App\Http\Controllers\calidad_controller::class, 'calidad_embarques'])->name('calidad_embarques')->middleware('calidad_middleware');
Route::get('/calidad_produccion/{id}', [App\Http\Controllers\calidad_controller::class, 'calidad_produccion'])->name('calidad_produccion')->middleware('calidad_middleware');

Route::post('/rechazo_cliente', [App\Http\Controllers\calidad_controller::class, 'rechazo_cliente'])->name('rechazo_cliente')->middleware('embarques_middleware');


Route::get('/dashboard_embarques', [App\Http\Controllers\embarques_controller::class, 'dashboard_embarques'])->name('dashboard_embarques')->middleware('embarques_middleware');
Route::post('/salida_embarques', [App\Http\Controllers\embarques_controller::class, 'salida_tratamiento'])->name('salida_tratamiento')->middleware('embarques_middleware');
Route::get('/regreso_tratamiento/{id}', [App\Http\Controllers\embarques_controller::class, 'regreso_tratamiento'])->name('regreso_tratamiento')->middleware('embarques_middleware');


Route::get('/dashboard_facturacion', [App\Http\Controllers\facturacion_controller::class, 'dashboard_facturacion'])->name('dashboard_facturacion')->middleware('facturacion_middleware');
Route::post('/dashboard_facturacion', [App\Http\Controllers\facturacion_controller::class, 'registro_factura'])->name('registro_factura')->middleware('facturacion_middleware');


Route::get('/buscador_ordenes', [App\Http\Controllers\ordenes_controller::class, 'buscador_ordenes'])->name('buscador_ordenes');
Route::get('/buscador_ingenieria', [App\Http\Controllers\ingenieria_controller::class, 'buscador_ingenieria'])->name('buscador_ingenieria');
Route::get('/buscador_compras', [App\Http\Controllers\compras_controller::class, 'buscador_compras'])->name('buscador_compras');
Route::get('/buscador_almacen', [App\Http\Controllers\almacen_controller::class, 'buscador_almacen'])->name('buscador_almacen');

Route::get('/buscador_calidad', [App\Http\Controllers\calidad_controller::class, 'buscador_calidad'])->name('buscador_calidad');

Route::get('/buscador_embarques', [App\Http\Controllers\embarques_controller::class, 'buscador_embarques'])->name('buscador_embarques');
Route::get('/buscador_facturacion', [App\Http\Controllers\facturacion_controller::class, 'buscador_facturacion'])->name('buscador_facturacion');

Route::get('/dashboard_administrador', [App\Http\Controllers\admin_controller::class, 'dashboard_administrador'])->name('dashboard_administrador');
Route::post('/alta_cliente', [App\Http\Controllers\admin_controller::class, 'alta_cliente'])->name('alta_cliente')->middleware('facturacion_middleware');
Route::delete('/borrar_cliente/{id}', [App\Http\Controllers\admin_controller::class, 'borrar_cliente'])->name('borrar_cliente')->middleware('facturacion_middleware');
Route::post('/alta_usuario', [App\Http\Controllers\admin_controller::class, 'alta_usuario'])->name('alta_usuario')->middleware('facturacion_middleware');
Route::delete('/borrar_usuario/{id}', [App\Http\Controllers\admin_controller::class, 'borrar_usuario'])->name('borrar_usuario')->middleware('facturacion_middleware');
Route::post('/alta_proveedor', [App\Http\Controllers\admin_controller::class, 'alta_proveedor'])->name('alta_proveedor')->middleware('facturacion_middleware');
Route::delete('/borrar_proveedor/{id}', [App\Http\Controllers\admin_controller::class, 'borrar_proveedor'])->name('borrar_proveedor')->middleware('facturacion_middleware');
Route::post('/alta_maquina', [App\Http\Controllers\admin_controller::class, 'alta_maquina'])->name('alta_maquina')->middleware('facturacion_middleware');
Route::delete('/borrar_maquina/{id}', [App\Http\Controllers\admin_controller::class, 'borrar_maquina'])->name('borrar_maquina')->middleware('facturacion_middleware');
Route::post('/alta_tecnico', [App\Http\Controllers\admin_controller::class, 'alta_tecnico'])->name('alta_tecnico')->middleware('facturacion_middleware');
Route::delete('/borrar_tecnico/{id}', [App\Http\Controllers\admin_controller::class, 'borrar_tecnico'])->name('borrar_tecnico')->middleware('facturacion_middleware');


Route::controller(admin_controller::class)->group(function () {
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});

Route::get('/exportar_produccion', [App\Http\Controllers\ExportController::class, 'exportar_produccion'])->name('exportar_produccion');
Route::get('/exportar_ordenes', [App\Http\Controllers\ExportController::class, 'exportar_ordenes'])->name('exportar_ordenes');
Route::get('/exportar_embarques', [App\Http\Controllers\ExportController::class, 'exportar_embarques'])->name('exportar_embarques');
Route::get('/exportar_calidad', [App\Http\Controllers\ExportController::class, 'exportar_calidad'])->name('exportar_calidad');
Route::get('/exportar_facturacion', [App\Http\Controllers\ExportController::class, 'exportar_facturacion'])->name('exportar_facturacion');
Route::get('/exportar_ingenieria', [App\Http\Controllers\ExportController::class, 'exportar_ingenieria'])->name('exportar_ingenieria');
Route::get('/exportar_compras', [App\Http\Controllers\ExportController::class, 'exportar_compras'])->name('exportar_compras');
