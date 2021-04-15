<?php

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


Route::get('/', function () {
    return view('plantilla');
});
Route::view('/', 'paginas.inicio');
//Route::view('/blog', 'paginas.blog');
//Route::view('/administradores', 'paginas.administradores');
//Route::view('/banner', 'paginas.banner');
//Route::view('/articulos', 'paginas.articulos');
//Route::view('/aqua', 'paginas.aqua');
//Route::view('/cliente_dos', 'paginas.cliente_dos');
//Route::view('/cliente_tres', 'paginas.cliente_tres');
//Route::view('/cliente_cuatro', 'paginas.cliente_cuatro');

//Rutas que incluyen todos los metodos
// php artisan route:list

Route::resource('/blog', 'BlogController');
Route::resource('/administradores', 'AdministradoresController');
Route::resource('/banner', 'BannerController');
Route::resource('/reportes', 'ReportesController');
Route::resource('/aqua', 'AquaController');
Route::resource('/cliente_dos', 'ClientedosController');
Route::resource('/cliente_tres', 'ClientetresController');
Route::resource('/cliente_cuatro', 'ClientecuatroController');

//empresas
Route::resource('/empresas', 'EmpresasController');
Route::resource('/totalcentros', 'TotalcentrosController');
//Route::resource('/pdf', 'PDFController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pdf', 'PDFController@PDF')->name('descargarPDF');
Route::get('/pdfmulti', 'PDFController@PDFmulti')->name('descargarPDFmulti');
Route::get('/pdfaysen', 'PDFController@PDFaysen')->name('descargarPDFaysen');
Route::get('/pdfaustral', 'PDFController@PDFaustral')->name('descargarPDFaustral');
Route::get('/inicio', 'HighchartController@highchart')->name('inicio');
//envio correo
Route::get('/correo', 'PDFController@CorreoAqua')->name('enviarPDFaqua');
Route::get('/correo/aysen', 'PDFController@CorreoAysen')->name('enviarPDFaysen');
Route::get('/correo/multi', 'PDFController@CorreoMulti')->name('enviarPDFmulti');
Route::get('/correo/austral', 'PDFController@CorreoAustral')->name('enviarPDFaustral');

//Prueba conexion excel

//Route::post('/ViewPages', 'ReportesController@exportprueba');
// no es necesario debido que el enlace se descarga automaticamente por el metodo Route::get('/excelPrueba', 'ReportesController@exportprueba')->name('descargarexcelprueba');
Route::post('/excelAqua', 'ReportesController@exportaqua');
Route::post('/excelMulti', 'ReportesController@exportmulti');
Route::post('/excelAysen', 'ReportesController@exportaysen');

