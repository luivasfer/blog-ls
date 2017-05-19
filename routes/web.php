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

 

Route::get('/', function () {
    return view('index');
});


//AUTH
// Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');
    
    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');


//Rutass para el admin
Route::prefix('admin')->middleware('auth')->group(function(){
   Route::get('/',['as' => 'admin.index', function () {
        if(Auth::user()->nivel == "admin")
        {
            return view('admin.index');
        }
        else
        {
            return redirect('/');
        }
        //return 'Hello World';
    }]);
    
    Route::resource('usuario', 'UsersController');
    Route::get('usuario/{id}/destroy',[
        'uses' => 'UsersController@destroy',
        'as'   => 'usuario.destroy'
    ]);

    Route::resource('categorias', 'CategoriasController');
    Route::get('categorias/{id}/destroy',[
        'uses' => 'CategoriasController@destroy',
        'as'   => 'categorias.destroy'
    ]);

    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy',[
        'uses' => 'TagsController@destroy',
        'as'   => 'tags.destroy'
    ]);

    Route::resource('articulos', 'ArticulosController');
    Route::get('articulos/{id}/destroy',[
        'uses' => 'ArticulosController@destroy',
        'as'   => 'articulos.destroy'
    ]);
    
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
