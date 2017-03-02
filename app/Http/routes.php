<?php


Route::get('/', function () {
    return redirect()->to('/login');
});

//middleware 'auth' redirige aqui
Route::get('/auth/login', function () {
    return redirect()->to('/login');
});

Route::get('/login',[function () {
    return view('auth.login');
},'as' => 'login']);

Route::get('admin', function (){
    return view('admin.plantilla');
});

Route::get('admin', function (){
    return view('admin.plantilla');
});

Route::post('auth/entrar','Auth\AutenticacionController@entrar')->name('user-login');

Route::group(['prefix' => 'admin/auth','middleware' => 'auth'], function (){
    Route::get('registro','Auth\AutenticacionController@nuevo')->name('user-registro');
    Route::post('registrar','Auth\AutenticacionController@crear')->name('user-guardado');
    Route::get('salir','Auth\AutenticacionController@salir')->name('user-logout');
});

Route::group(['prefix' => 'admin/','middleware' => 'auth'], function (){
    Route::get('inicio','panelController@inicio')->name('inicio');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('institutos/nuevo','InstitutoController@nuevo')->name('institutos-nuevo');
    Route::post('institutos/guardado','InstitutoController@guardado')->name('institutos-guardado');
    Route::get('institutos/verTodos','InstitutoController@verTodos')->name('institutos-ver');
    Route::get('institutos/editar/{id}','InstitutoController@editar')->name('institutos-editar');
    Route::post('institutos/editado','InstitutoController@editado')->name('institutos-editado');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('partidas/nueva','PartidaController@nueva')->name('partidas-nueva');
    Route::post('partidas/guardada','PartidaController@guardada')->name('partidas-guardada');
    Route::get('partidas/verTodas','PartidaController@verTodas')->name('partidas-ver');
    Route::get('partidas/eliminar/{id}','PartidaController@eliminar')->name('partidas-eliminar');
    Route::get('partidas/editar/{id}','PartidaController@editar')->name('partidas-editar');
    Route::post('partidas/editada','PartidaController@editada')->name('partidas-editada');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('origen-fondos/nuevo','OrigenFondosController@nuevo')->name('origenFondos-nuevo');
    Route::post('origen-fondos/guardado','OrigenFondosController@guardado')->name('origenFondos-guardado');
    Route::get('origen-fondos/verTodos','OrigenFondosController@verTodos')->name('origenFondos-ver');
    Route::get('origen-fondos/editar/{id}','OrigenFondosController@editar')->name('origenFondos-editar');
    Route::post('origen-fondos/editar/{id}','OrigenFondosController@editado')->name('origenFondos-editado');
    Route::get('origen-fondos/eliminar/{id}','OrigenFondosController@eliminar')->name('origenFondos-eliminar');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('tipo-gasto/nuevo','TipoGastoController@nuevo')->name('tipoGasto-nuevo');
    Route::post('tipo-gasto/guardado','TipoGastoController@guardado')->name('tipoGasto-guardado');
    Route::get('tipo-gasto/verTodos','TipoGastoController@verTodos')->name('tipoGasto-ver');
    Route::get('tipo-gasto/editar/{id}','TipoGastoController@editar')->name('tipoGasto-editar');
    Route::post('tipo-gasto/editar/{id}','TipoGastoController@editado')->name('tipoGasto-editado');
    Route::get('tipo-gasto/eliminar/{id}','TipoGastoController@eliminar')->name('tipoGasto-eliminar');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('clasificador-general/nuevo','ClasificadorController@nuevo')->name('clasifGnral-nuevo');
    Route::post('clasificador-general/guardado','ClasificadorController@guardado')->name('clasifGnral-guardado');
    Route::get('clasificador-general/verTodos','ClasificadorController@verTodos')->name('clasifGnral-ver');
    Route::get('clasificador-general/editar/{id}','ClasificadorController@editar')->name('clasifGnral-editar');
    Route::post('clasificador-general/editar/{id}','ClasificadorController@editado')->name('clasifGnral-editado');
    Route::get('clasificador-general/eliminar/{id}','ClasificadorController@eliminar')->name('clasifGnral-eliminar');
});
