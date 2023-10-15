<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', 'App\Http\Controllers\FitoadminController@dashboard_1');
Route::get('/index', 'App\Http\Controllers\FitoadminController@dashboard_1');
Route::get('/distance-map', 'App\Http\Controllers\FitoadminController@distance_map');
Route::post('/recent-activities', 'App\Http\Controllers\FitoadminController@recent_activities');
Route::get('/food-menu', 'App\Http\Controllers\FitoadminController@food_menu');
Route::post('/food-menu-list', 'App\Http\Controllers\FitoadminController@food_menu_list');
Route::post('/trending-ingridients', 'App\Http\Controllers\FitoadminController@trending_ingridients');
Route::get('/workout-plan', 'App\Http\Controllers\FitoadminController@workout_plan');
Route::get('/workout-statistic', 'App\Http\Controllers\FitoadminController@workout_statistic');
Route::get('/personal-record', 'App\Http\Controllers\FitoadminController@personal_record');
Route::get('/app-calender', 'App\Http\Controllers\FitoadminController@app_calender');
Route::get('/app-profile', 'App\Http\Controllers\FitoadminController@app_profile');
Route::get('/chart-chartist', 'App\Http\Controllers\FitoadminController@chart_chartist');
Route::get('/chart-chartjs', 'App\Http\Controllers\FitoadminController@chart_chartjs');
Route::get('/chart-flot', 'App\Http\Controllers\FitoadminController@chart_flot');
Route::get('/chart-morris', 'App\Http\Controllers\FitoadminController@chart_morris');
Route::get('/chart-peity', 'App\Http\Controllers\FitoadminController@chart_peity');
Route::get('/chart-sparkline', 'App\Http\Controllers\FitoadminController@chart_sparkline');
Route::get('/ecom-checkout', 'App\Http\Controllers\FitoadminController@ecom_checkout');
Route::get('/ecom-customers', 'App\Http\Controllers\FitoadminController@ecom_customers');
Route::get('/ecom-invoice', 'App\Http\Controllers\FitoadminController@ecom_invoice');
Route::get('/ecom-product-detail', 'App\Http\Controllers\FitoadminController@ecom_product_detail');
Route::get('/ecom-product-grid', 'App\Http\Controllers\FitoadminController@ecom_product_grid');
Route::get('/ecom-product-list', 'App\Http\Controllers\FitoadminController@ecom_product_list');
Route::get('/ecom-product-order', 'App\Http\Controllers\FitoadminController@ecom_product_order');
Route::get('/email-compose', 'App\Http\Controllers\FitoadminController@email_compose');
Route::get('/email-inbox', 'App\Http\Controllers\FitoadminController@email_inbox');
Route::get('/email-read', 'App\Http\Controllers\FitoadminController@email_read');
Route::get('/form-editor-summernote', 'App\Http\Controllers\FitoadminController@form_editor_summernote');
Route::get('/form-element', 'App\Http\Controllers\FitoadminController@form_element');
Route::get('/form-pickers', 'App\Http\Controllers\FitoadminController@form_pickers');
Route::get('/form-validation-jquery', 'App\Http\Controllers\FitoadminController@form_validation_jquery');
Route::get('/form-wizard', 'App\Http\Controllers\FitoadminController@form_wizard');
Route::get('/map-jqvmap', 'App\Http\Controllers\FitoadminController@map_jqvmap');
Route::get('/page-error-400', 'App\Http\Controllers\FitoadminController@page_error_400');
Route::get('/page-error-403', 'App\Http\Controllers\FitoadminController@page_error_403');
Route::get('/page-error-404', 'App\Http\Controllers\FitoadminController@page_error_404');
Route::get('/page-error-500', 'App\Http\Controllers\FitoadminController@page_error_500');
Route::get('/page-error-503', 'App\Http\Controllers\FitoadminController@page_error_503');
Route::get('/page-forgot-password', 'App\Http\Controllers\FitoadminController@page_forgot_password');
Route::get('/page-lock-screen', 'App\Http\Controllers\FitoadminController@page_lock_screen');
Route::get('/page-login', 'App\Http\Controllers\FitoadminController@page_login');
Route::get('/page-register', 'App\Http\Controllers\FitoadminController@page_register');
Route::get('/table-bootstrap-basic', 'App\Http\Controllers\FitoadminController@table_bootstrap_basic');
Route::get('/table-datatable-basic', 'App\Http\Controllers\FitoadminController@table_datatable_basic');
Route::get('/uc-nestable', 'App\Http\Controllers\FitoadminController@uc_nestable');
Route::get('/uc-noui-slider', 'App\Http\Controllers\FitoadminController@uc_noui_slider');
Route::get('/uc-select2', 'App\Http\Controllers\FitoadminController@uc_select2');
Route::get('/uc-sweetalert', 'App\Http\Controllers\FitoadminController@uc_sweetalert');
Route::get('/uc-toastr', 'App\Http\Controllers\FitoadminController@uc_toastr');
Route::get('/ui-accordion', 'App\Http\Controllers\FitoadminController@ui_accordion');
Route::get('/ui-alert', 'App\Http\Controllers\FitoadminController@ui_alert');
Route::get('/ui-badge', 'App\Http\Controllers\FitoadminController@ui_badge');
Route::get('/ui-button', 'App\Http\Controllers\FitoadminController@ui_button');
Route::get('/ui-button-group', 'App\Http\Controllers\FitoadminController@ui_button_group');
Route::get('/ui-card', 'App\Http\Controllers\FitoadminController@ui_card');
Route::get('/ui-carousel', 'App\Http\Controllers\FitoadminController@ui_carousel');
Route::get('/ui-dropdown', 'App\Http\Controllers\FitoadminController@ui_dropdown');
Route::get('/ui-grid', 'App\Http\Controllers\FitoadminController@ui_grid');
Route::get('/ui-list-group', 'App\Http\Controllers\FitoadminController@ui_list_group');
Route::get('/ui-media-object', 'App\Http\Controllers\FitoadminController@ui_media_object');
Route::get('/ui-modal', 'App\Http\Controllers\FitoadminController@ui_modal');
Route::get('/ui-pagination', 'App\Http\Controllers\FitoadminController@ui_pagination');
Route::get('/ui-popover', 'App\Http\Controllers\FitoadminController@ui_popover');
Route::get('/ui-progressbar', 'App\Http\Controllers\FitoadminController@ui_progressbar');
Route::get('/ui-tab', 'App\Http\Controllers\FitoadminController@ui_tab');
Route::get('/ui-typography', 'App\Http\Controllers\FitoadminController@ui_typography');
Route::get('/widget-basic', 'App\Http\Controllers\FitoadminController@widget_basic');

