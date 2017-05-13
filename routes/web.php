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
    
    Route::resource('user', 'UsersController');
    // Route::get('user/{id}/destroy',[
    //     'uses' => 'UsersController@destroy',
    //     'as'   => 'user.destroy'
    // ]);

    // Route::resource('categorias', 'CategoriasController');
    // Route::get('categorias/{id}/destroy',[
    //     'uses' => 'CategoriasController@destroy',
    //     'as'   => 'categorias.destroy'
    // ]);

    // Route::resource('tags', 'TagsController');
    // Route::get('tags/{id}/destroy',[
    //     'uses' => 'TagsController@destroy',
    //     'as'   => 'tags.destroy'
    // ]);
    
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
