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

// Route::get('/', function () {
//     return view('welcome');
// });

// FRONTEND

Route::name('frontend.index')
    ->get('/', 'FrontController@index');

Route::name('frontend.articulo')
    ->get('articulo/{categoria}/{id}/{slug}', 'FrontController@articulo');

Route::name('frontend.articulos')
    ->get('articulos', 'FrontController@articulos');




// Route::name('frontend.repuesto')
//     ->get('repuestos/{marca}/{id}/{slug}', 'FrontController@categoriaProducto');


//FIN FROM END


// //AUTH
// // Authentication Routes...
//     $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//     $this->post('login', 'Auth\LoginController@login');
//     $this->post('logout', 'Auth\LoginController@logout')->name('logout');
    
//     // Password Reset Routes...
//     $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//     $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//     $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//     $this->post('password/reset', 'Auth\ResetPasswordController@reset');


//Rutass para el admin
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/',['middleware' => 'nivel','as' => 'admin.index', function () {
        return view('admin.index');
    }]);

    //Route::name('usuario.index')
      //  ->get('usuario','UsersController@index');
    
    Route::resource('usuario', 'UsersController', ['middleware' => 'nivel', 'middleware' => 'usuario']);
    Route::get('usuario/{id}/destroy',[
        'uses' => 'UsersController@destroy',
        'as'   => 'usuario.destroy'
    ]);

    Route::resource('categorias', 'CategoriasController', ['middleware' => 'nivel', 'middleware' => 'usuario']);
    Route::get('categorias/{id}/destroy',[
        'uses' => 'CategoriasController@destroy',
        'as'   => 'categorias.destroy'
    ]);

    Route::resource('tags', 'TagsController', ['middleware' => 'nivel', 'middleware' => 'usuario']);
    Route::get('tags/{id}/destroy',[
        'uses' => 'TagsController@destroy',
        'as'   => 'tags.destroy'
    ]);

    Route::resource('articulos', 'ArticulosController', ['middleware' => 'nivel']);
    Route::get('articulos/{id}/destroy',[
        'uses' => 'ArticulosController@destroy',
        'as'   => 'articulos.destroy'
    ]);

    Route::resource('recursos', 'RecursosController', ['middleware' => 'nivel']);
    Route::get('recursos/{id}/destroy',[
        'uses' => 'RecursosController@destroy',
        'as'   => 'recursos.destroy'
    ]);
    Route::resource('comentarios', 'ComentariosController', ['middleware' => 'nivel']);
    
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
