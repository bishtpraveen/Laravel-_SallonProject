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

// Route::get('/',function(){
//     return view('index');
// });
Route::get('/','index_page@index');
Route::get('change_password','index_page@change_password');
Route::post('/password_change_url','index_page@password_change_url');
Route::post('/image_change','index_page@image_change');
Route::get('/verification_code/{token}','index_page@email_verify');

Route::get('/mail_test',function(){
    return view('mail_test');
});

Route::get('/about','layout_page@about_page');
Route::get('/contact','layout_page@contact_page');
Route::post('/contact_form','layout_page@contact_form');

Route::get('/layout','layout_page@index');
Route::get('/search_link','layout_page@search_link');

// register_url
Route::get('register','RegisterController@index');
Route::post('/register_form','RegisterController@detail_set'); 
// Route::get('/register_confirm','RegisterController@detail_set');
Route::post('/register_complete_form','RegisterController@update');
Route::get('/email_ajax','RegisterController@email_ajax');

// login_url
Route::get('/login','login_page@index');
Route::post('/login_url','login_page@login_check');
Route::get('/logout','login_page@logout');
Route::get('/password_reset_ajax','login_page@password_reset');
Route::get('/reset-password/{token}','login_page@token_check_new_pass_page');
Route::post('/reset-password/{token}','login_page@new_password_set');

// Service_provider
    // sh
Route::group(['middleware'=>'s_p_login_check'],function(){
    Route::get('/s_p-index','service_provider@index');
    Route::get('/user-shop','service_provider@shop');
    Route::post('/shop_register','service_provider@create_shop');
    Route::get('/view-shop','service_provider@show_shop');
    Route::get('/comment_get','service_provider@comment_get');
    Route::get('/appointment_view','service_provider@appointment_view');
    Route::get('/comments_count','service_provider@comments_count');
    Route::get('/latest_appointment','service_provider@latest_appointment');
    Route::post('/payment_request','service_provider@payment_request');
    // sfh
    
    Route::post('/sfh_add_home','service_provider@sfh_add_home');
    
    
    // dod
});




// User
Route::group(['middleware'=>'user_login_check'],function(){

    Route::get('/my_account','user_dashboard@index');
    Route::get('/special_service/{id}','user_dashboard@special_service');
    Route::post('/comment_send','user_dashboard@comment_form');
    Route::post('/appointment_form','user_dashboard@appointment_form');
    Route::get('/appoint_check','user_dashboard@appoint_check');
    Route::get('/latest_appointment_user','user_dashboard@latest_appointment_user');
    Route::get('/user_comment','user_dashboard@user_comment');
    Route::get('/all_appoint','user_dashboard@all_appoint');
    Route::get('/view_profile','user_dashboard@view_profile');
    Route::post('/make_payment','user_dashboard@make_payment');
    Route::get('/like_shop_user','user_dashboard@like_shop_user');
});
Route::get('/comment_ajax_index','user_dashboard@comment_ajax_index');
Route::get('/like_ajax_index','user_dashboard@like_ajax_index');

Route::get('/pricing','user_dashboard@pricing_page');
Route::get('/gallery','user_dashboard@gallery_page');


// google authentication 
Route::get('/redirect', 'SocialAuthGoogleControllerController@redirect');
Route::get('/google_callback', 'SocialAuthGoogleControllerController@callback');


Route::post('/paytm-callback', 'user_dashboard@paytmCallback');