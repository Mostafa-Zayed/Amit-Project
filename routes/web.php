<?php
use App\Category;
use App\User;
use App\Profile;
use App\Page;
use App\Permission;
use App\Job;
use App\Type;
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




Route::get('/','HomeController@index');
Route::get('about','HomeController@about');
Route::get('categories','HomeController@categories');
Route::get('contact','HomeController@contact');
Route::post('contact','HomeController@sendContact');
Route::get('jobs','HomeController@jobs');
Route::get('jobs/{id}','HomeController@show_job');
Route::get('lang/{lang}','HomeController@setLang');
//Route::get('dashboard/my_profile/{id}','HomeController@myProfile');
//Route::get('/dashboard/{id}','HomeController@dashboard');
//Route::get('jobs/{$id}','HomeController@show');
//Route::get('blog','HomeController@blog');

Route::post('admin/profile','ProfileController@profile');


/// testing now project














                                    // ADMIN ROUtTES 

//////////////////////////////////////////////////////////////////////////////////////////////

                                   // Admin Dashboard

Route::get('admin','HomeController@admin')->middleware('can:submanage');

////////////////////////////////////////////////////////////////////////////////////////////////////

                                           // admin users

Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){

    Route::resource('users','UserController')->middleware('can:admin');

});                                           



///////////////////////////////////////////////////////////////////////////////////////////////

                                    // Admin Categories 


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){

    Route::resource('categories','CategoryController')->middleware('can:manage');

});



////////////////////////////////////////////////////////////////////////////////////

                                            // Auth Routes 
Auth::routes();

/////////////////////////////////////////////////////////////////////////////////////

                                            // Permissions Routes


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){

    Route::resource('permissions','PermissionController')->middleware('can:admin');

});     



//////////////////////////////////////////////////////////////////////////////////////////

                                              // Admin Type


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
    Route::resource('jobtypes','TypeController')->middleware('can:submanage');

});



///////////////////////////////////////////////////////////////////////////////////////////

                                    // Locations Routes 


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
    Route::resource('locations','LocationController')->middleware('can:submanage');
            
});             

////////////////////////////////////////////////////////////////////////////

                                    // Admin Testimones


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
    Route::resource('testimonies','TestimonieController')->middleware('can:manage');

});



////////////////////////////////////////////////////////////////////////////

                                               // Admin Teams


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
    Route::resource('ourteam','OurTeamController')->middleware('can:manage');
    
});


////////////////////////////////////////////////////////////////

                                // Admin Jobs 

Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
    Route::resource('jobs','JobController')->middleware('can:submanage');
    
});


    
    Route::get('dashboard/create','DashboardController@create');
    Route::get('dashboard/{id}','DashboardController@index');
    Route::get('dashboard/jobs/{id}','DashboardController@jobs');
    Route::get('dashboard/profile/{id}','DashboardController@profile');
    Route::post('dashboard','DashboardController@store');
    Route::get('dashboard/{id}/edit','DashboardController@edit');
    Route::put('dashboard/{id}','DashboardController@update');
    Route::delete('dashboard/{id}','DashboardController@destroy');






///////////////////////////////////////////////////////////////
                         
                           // Admin Settings Routes 

Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
    Route::resource('settings','SettingController')->middleware('can:manage');
    
});


/////////////////////////////////////////////////////////////////////

                         //  Admin Time Services

Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
Route::resource('servicestime','TimeServiceController')->middleware('can:submanage');
                            
});                         


/////////////////////////////////////////////////////////////////////

                            // Admin Pages

Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
    Route::resource('pages','PageController')->middleware('can:manage');
    
});


/////////////////////////////////////////////////////////////////////

                             // Admin Features 

Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
 
    Route::resource('features','FeatureController')->middleware('can:manage');
    
});


/////////////////////////////////////////////////////////////////////////



Route::get('icons',function(){

    return view('admin/icons');
});

//Route::post('admin/profile/{id}','ProfileController@profile');