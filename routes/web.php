<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


        Route::get('/', function () {
          Flashy::message('Welcome Aboard!');
                  return view('welcome');
              });

                Route::group([
                'middleware' => 'auth',
                'namespace' =>'group'
                    ],function(){

                      Route::get('/pdf/output/', ['as'=>'pdf.output','uses'=>'ReportsController@pdf_group_report']);
                      Route::get('/pdf/download/{id}',['as'=>'pdf.download' ,'uses'=>'PdfviewController@pdf_force_download'
                    ]);


                    });



    Route::get('/farmers-groups', ['as' => 'farm.group',
     'uses' => 'GroupsviewController@index']);

     Route::get('/buyer-register', ['as' => 'buyer.register',
      'uses' => 'BuyersController@index']);

      Route::post('/buyer-register/create', ['as' => 'buyer.create',
       'uses' => 'BuyersController@store']);

//takes care of all authentication sign in,sign up and password resets
    Auth::routes();

    Route::group([
      'middleware' => 'auth',

            ], function(){



         Route::get('/profile/{username}', ['as' => 'profile', 'uses' => 'ProfileController@index']);

               Route::get('profile/edit/profile/{id}', [
                 'uses' => 'ProfileController@edit',
                 'as' => 'profile.edit',

                ]);

                Route::post('profile/update/profile', [
                  'uses' => 'ProfileController@update',
                  'as' => 'profile.update',

                ]);

 //Route::get('/produceinfo/{id}', 'infoController@getinfo');

});
Route::get('images/{filename}', function ($filename)
{
    return Image::make(storage_path() . '/' . $filename)->response();
});
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::group([
    'middleware' => 'auth',

], function(){

  Route::get('messenger/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
  Route::get('messenger', ['as' => 'messages', 'uses' => 'MessagesController@index']);
  Route::post('messenger/save', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
  Route::get('messenger/show/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
  Route::put('messenger/update/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

   });


Route::group([
  'namespace' =>'group',
  'middleware' => 'auth',

], function(){

Route::get('/group/request/{user_id}/{group_id}',['as'=>'group.request','uses'=>'GrouprequestController@request_to_join_group']);
Route::get('/group/acceptrequest/{user_id}/{group_id}',['as'=>'accept','uses'=>'GrouprequestController@accept_group_request']);
Route::get('/group/declinerequest/{user_id}/{group_id}',['as'=>'decline','uses'=>'GrouprequestController@decline_group_request']);

Route::get('group/prices/{id}',['as' =>'group.price', 'uses' =>'MarketController@price_chart']);
Route::get('show/groups/{id}', ['as' => 'show.groups', 'uses' => 'GroupsController@get_groups']);
Route::get('group/showjoinedgroups/{id}', ['as' => 'joined.group', 'uses' => 'GroupsController@show_joined_groups']);
Route::get('group/showgroupusers/{group_id}', ['as' => 'group.users', 'uses' => 'GroupsController@show_group_users']);
Route::get('group/deleteuser/{user_id}/{group_id}', ['as' => 'deleteuser', 'uses' => 'GroupsController@delete_user']);
Route::get('group/farmersdetails/{id}', ['as' => 'farmers.details', 'uses' => 'ReportsController@farmers_report']);
Route::get('group/GroupReport/{id}', ['as' => 'group.report', 'uses' => 'ReportsController@group_produce_report']);

Route::get('view/mygroups/{id}', ['as' => 'mygroups', 'uses' => 'GroupsController@show_created_groups']);
Route::get('/group/showpendingusers/{group_id}', ['as' => 'pending.users', 'uses' => 'GroupsController@show_pending_users']);

  Route::post('group/save', ['as' => 'group.store', 'uses' => 'GroupsController@store']);
  Route::get('group/{group_id}', ['as' => 'group', 'uses' => 'GroupsController@index']);
  Route::get('group/dashboard/{group_id}', ['as' => 'group.dash', 'uses' => 'GroupsController@index']);

  Route::get('group/edit/group/{id}', ['as' => 'group.edit', 'uses' => 'GroupsController@edit']);
  Route::post('group/update/group/{id}', ['as' => 'group.update', 'uses' => 'GroupsController@update']);
  Route::get('group/sales/{id}',['as'=> 'sale', 'uses' => 'SalesController@index']);
   Route::get('/produceinfo', ['as'=>'produce.info','uses'=>'ProduceController@getinfo']);
  Route::get('group/produce/form/{id}',['as'=> 'form.produce', 'uses' => 'ProduceController@index']);
  Route::post('group/produce/record/{id}',['as'=> 'record.produce', 'uses' => 'ProduceController@store']);
  Route::get('group/produce/chart/{id}',['as'=> 'produce.chart', 'uses' => 'ProduceController@produce_chart']);
});
