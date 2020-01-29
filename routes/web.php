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


// Route::get('/preview', function () {
//     return view('preview.preview');
// });
// Route::get('/previewmock', function () {
//     return view('preview.previewmock');
// });

// Route::get('/select', function () {
//     return view('select');
// });
// Route::get('/showmatch', function () {
//     return view('showmatch');
// });
Route::get('/vote', function () {
    return view('vote.vote');
});
Route::get('/votedetail', function () {
    return view('vote.votedetail');
});
Route::get('/payment', function () {
    return view('payment');
});


// Route::get('/showjob', function () {
//     return view('showjob');
// });

Auth::routes();



Route::get('/', 'HomeController@index')->name('home');
    
Route::get('/search', [
    'as' => 'search.create',
    'uses' => 'HomeController@createSearchStep1']);  

Route::post('/search/create/store1', [
    'as' => 'search.create.store',
    'uses' => 'HomeController@storeSearchStep1']);

Route::delete('/search/show/delete/{token}',
    'HomeController@deleteStoreStep1');
    
// Route::get('/search/step2/{token}', [
//     'as' => 'search.create.step2',
//     'uses' => 'HomeController@createSearchStep2']);
        

Route::get('/search/show/{token}', [
    'as' => 'search.show',
    'uses' => 'HomeController@show']);

//Route::post('/search/create/store2/{token}', [
  //  'as' => 'search.create.store',
    //'uses' => 'HomeController@storeSearchStep2']);
Route::post('/search/create/store2', 
    'HomeController@storeSearchStep2');
    
    
Route::get('search/showfinal/{token}', [
    'as' => 'search.showfinal',
    'uses' => 'HomeController@searchstep3']);



Route::post('/search/create/store3', 
    'HomeController@storeSearchStep3');

// --------show finish search-------

Route::get('/showjob/{token}', [
    'as' => 'job.show',
    'uses' => 'HomeController@showjob']);

Route::post('/showjob/store', 
    'HomeController@storeShowJob');

Route::get('/reviewjob/{token}', [
    'as' => 'job.review',
    'uses' => 'HomeController@reviewJob']);

Route::post('/reviewjob/store', 
    'HomeController@storeReviewJob');
    



Route::get('/alljob', [
        'as' => 'show.alljob',
        'uses' => 'HomeController@alljob']);


    

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
    
 Route::get('/requestjob', [
    'as' => 'designer.requestjob',
    'uses' => 'DesignerController@requestjob']);

Route::get('/jobdetail/{id}', [
    'as' => 'designer.jobdetail',
    'uses' => 'DesignerController@showjobdetail']);

Route::post('/jobdetail/jobstatus/store', 
    'DesignerController@jobStatusStore');
// Route::get('/login/designer', 'RegisterDesignerController@show' );

// Route::get('login/designer/{id}',function(){
//     $users = App\RegisterDesigner::select('name' ,'email')->get();
//     return view('auth.registerDesigner',compact('users'));
// });


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


