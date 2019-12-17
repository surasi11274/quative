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
Route::get('/preview', function () {
    return view('preview.preview');
});
Route::get('/previewmock', function () {
    return view('preview.previewmock');
});

Route::get('/select', function () {
    return view('select');
});
Route::get('/showmatch', function () {
    return view('showmatch');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
    
Route::get('/search', [
    'as' => 'search',
    'uses' => 'HomeController@create']);      

    // -------------------------- Designer ---------------------------
// Route::get('/designer','DesignerController@create');
Route::get('/designer', [
    'as' => 'designer.designer',
    'uses' => 'DesignerController@create']); 
// Route::get('/edit','DesignerController@edit');
Route::post('/designer/store', [
    'as' => 'designer.create.store',
    'uses' => 'DesignerController@store']);

Route::get('/designer/edit', [
    'as' => 'designer.edit',
    'uses' => 'DesignerController@edit']); 





    

// Route::get('/designer/edit','DesignerController@edit');


Route::get('/designer/show/{token}', [
    'as' => 'designer.show',
    'uses' => 'DesignerController@show']);
// Route::get('/login/designer', 'RegisterDesignerController@show' );

// Route::get('login/designer/{id}',function(){
//     $users = App\RegisterDesigner::select('name' ,'email')->get();
//     return view('auth.registerDesigner',compact('users'));
// });


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


