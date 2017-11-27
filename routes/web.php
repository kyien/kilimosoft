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

                                      //PDF routes

                Route::group([
                'middleware' => 'auth'

                    ],function(){

                      Route::get('pdf/farmersreport/per/group/pdf/{group_id}', ['as'=>'farmersreport.output','uses'=>'PdfviewController@view_farmers_per_group_report']);
                       Route::get('pdf/group_produce_report/pdf/{group_id}', ['as'=>'groups.output','uses'=>'PdfviewController@view_group_report']);
                       Route::get('pdf/farmersreport/all/groups/pdf/{user_id}', ['as'=>'allgroups.output','uses'=>'PdfviewController@view_farmers_all_groups_produce_report']);
                      Route::get('pdf/group/users/report/pdf/{group_id}', ['as'=>'groupusers.output','uses'=>'PdfviewController@group_users_report']);
                       Route::get('pdf/group/prices/report/output', ['as'=>'pdf.pricesoutput','uses'=>'PdfviewController@product_prices']);
                       Route::get('pdf/group/custom/produce/result/{group_id}/{from}/{to}', ['as'=>'pdf.produce_res','uses'=>'PdfviewController@form_query_produce_res']);
                       Route::get('pdf/group/custom/tool/result/{group_id}/{from}/{to}', ['as'=>'pdf.tool_res','uses'=>'PdfviewController@form_query_tool_res']);
                      // Route::get('pdf/farmersreport/output', ['as'=>'pdf.output','uses'=>'PdfviewController@pdf_render_view_farmers_report']);


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

  Route::get('messenger/create_message/{group_id}', ['as' =>'messages.create', 'uses' => 'MessagesController@create']);
  Route::get('messenger/{group_id}', ['as' => 'messages', 'uses' => 'MessagesController@index']);
  Route::post('messenger/save', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
  Route::get('messenger/show/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
  Route::put('messenger/update/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

   });

   Route::get('group/produce/produce_receipt','PdfviewController@receipt_generate');
   Route::get('Notification/user',['as'=>'user.notify', 'uses'=>'NotificationController@index']);
Route::group([
  'namespace' =>'group',
  'middleware' => 'auth',

], function(){
//user management routes
Route::get('/group/request/{user_id}/{group_id}',['as'=>'group.request','uses'=>'GrouprequestController@request_to_join_group']);
Route::get('/group/acceptrequest/{user_id}/{group_id}',['as'=>'accept','uses'=>'GrouprequestController@accept_group_request']);
Route::get('/group/declinerequest/{user_id}/{group_id}',['as'=>'decline','uses'=>'GrouprequestController@decline_group_request']);
//admin routes
Route::get('group/prices/{id}',['as' =>'group.price', 'uses' =>'MarketController@price_chart']);
Route::get('show/groups/{id}', ['as' => 'show.groups', 'uses' => 'GroupsController@get_groups']);
Route::get('group/showjoinedgroups/{id}', ['as' => 'joined.group', 'uses' => 'GroupsController@show_joined_groups']);
Route::get('group/showgroupusers/{group_id}', ['as' => 'group.users', 'uses' => 'GroupsController@show_group_users']);
Route::get('group/deleteuser/{user_id}/{group_id}', ['as' => 'deleteuser', 'uses' => 'GroupsController@delete_user']);
Route::get('group/edituser/{group_id}', ['as' => 'edit_group.users', 'uses' => 'GroupsController@edit_group_users']);
Route::get('group/changeroles/{group_id}', ['as' => 'changerole', 'uses' => 'RolesController@index']);
Route::post('group/edit_user_role', ['as' => 'edit_role', 'uses' => 'RolesController@assign_role']);
Route::get('group/about_group/{group_id}', ['as' => 'about.group', 'uses' => 'GroupsController@group_info']);


Route::get('view/mygroups/{id}', ['as' => 'mygroups', 'uses' => 'GroupsController@show_created_groups']);
Route::get('/group/showpendingusers/{group_id}', ['as' => 'pending.users', 'uses' => 'GroupsController@show_pending_users']);
//group operation routes
  Route::post('group/save', ['as' => 'group.store', 'uses' => 'GroupsController@store']);
  Route::get('group/create', ['as' => 'group.create', 'uses' => 'GroupsController@create_group_view']);
  Route::get('group/{group_id}', ['as' => 'group', 'uses' => 'GroupsController@index']);
  Route::get('group/posts/{group_id}', ['as' => 'group.post', 'uses' => 'GroupsController@group_posts']);

  Route::get('group/edit/group/{id}', ['as' => 'group.edit', 'uses' => 'GroupsController@edit']);
  Route::post('group/update/group/{id}', ['as' => 'group.update', 'uses' => 'GroupsController@update']);
  Route::get('group/sales/{id}',['as'=> 'sale', 'uses' => 'SalesController@index']);
  Route::get('group/create_post/view/{group_id}',['as'=> 'post.view', 'uses' => 'GroupPostController@create_post_view']);
  Route::post('group/create_post',['as'=> 'create.post', 'uses' => 'GroupPostController@store']);

    //  Produce Routes
   Route::get('/produceinfo', ['as'=>'produce.info','uses'=>'ProduceController@getinfo']);
  Route::get('group/produce/form/{id}',['as'=> 'form.produce', 'uses' => 'ProduceController@index']);
  Route::post('group/produce/record',['as'=> 'record.produce', 'uses' => 'ProduceController@store']);
  Route::get('group/produce/chart/{id}',['as'=> 'produce.chart', 'uses' => 'ProduceController@produce_chart']);
              //reporting routes
  Route::get('group/farmers/group/report/{user_id}/{group_id}', ['as' => 'farmers.reportpergroup', 'uses' => 'ReportsController@farmers_report_per_group']);
  Route::get('group/farmers/all/groups/report/{user_id}', ['as' => 'farmers.reportallgroups', 'uses' => 'ReportsController@farmers_report_all_groups']);
  Route::get('group/groupReport/{group_id}', ['as' => 'group.allproducereport', 'uses' => 'ReportsController@group_produce_report']);
  Route::get('group/users/Report/{group_id}', ['as' => 'group.allusersreport', 'uses' => 'ReportsController@group_users_report']);
  Route::get('group/prices/Report/{group_id}', ['as' => 'group.pricesreport', 'uses' => 'ReportsController@product_prices']);
  Route::get('group/custom/search/form/{group_id}', ['as' => 'form.query', 'uses' => 'ReportsController@custom_form_search']);
  Route::post('group/custom/form/submit', ['as' => 'submit.query', 'uses' => 'ReportsController@form_query']);
            //Group Inventory Routes
  Route::get('/toolinfo', ['as'=>'tool.info','uses'=>'GroupsInventoryController@tool_update_info']);
  Route::get('/group/tool/Register_form/{group_id}', ['as' => 'group.toolregister', 'uses' => 'GroupsInventoryController@group_tool_register_form']);
  Route::get('/group/tool/edit_form/{group_id}', ['as' => 'group.tooledit', 'uses' => 'GroupsInventoryController@group_tool_edit_form']);
  Route::post('/group/tool/record', ['as' => 'group.toolrecord', 'uses' => 'GroupsInventoryController@group_tool_record']);
  Route::post('/group/tool/update', ['as' => 'group.toolupdate', 'uses' => 'GroupsInventoryController@group_tool_update']);
  Route::get('/group/tool/search/form/{group_id}', ['as' => 'group.toolsearchform', 'uses' => 'GroupsInventoryController@tool_search_form']);
  Route::get('/group/toolsearch/results', ['as' => 'group.toolsearchresults', 'uses' => 'GroupsInventoryController@tool_search_results']);
  Route::post('/group/toolsearch_request/form', ['as' => 'group.toolsearchresultsform', 'uses' => 'GroupsInventoryController@tool_request']);


});
