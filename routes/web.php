<?php

//********************     PREFIX     ********************//
$ADMIN_PREFIX = "admin";


//********************     CACHE ROUTE     ********************//
Route::get('clear-cache', function () {
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('route:clear');
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('debugbar:clear');
	return ["status" => 1, "msg" => "Cache cleared successfully!"];
});

//*********************    FRONTEND ROUTES  ******************************//
 	Route::get('/', 'Frontend\HomeController@index')->name('frontend-homepage');
 	Route::get('who-uncle-tetsu','Frontend\WhoUncleController@index')->name('who-uncle-tetsu');
 	Route::get('our-philosophy','Frontend\OurPhilosophyController@index')->name('our-philosophy');
 	Route::get('our-products','Frontend\OurProductsController@index')->name('our-products');
 	Route::get('blogs','Frontend\BlogsController@index')->name('blogs');
 	Route::get('blog-details','Frontend\BlogsController@blog_details')->name('blog_details');
 	Route::get('store-location','Frontend\StoreLocationController@index')->name('store-location');
 	Route::get('franchising','Frontend\FranchisingController@index')->name('franchising');
 	Route::get('global-contact','Frontend\GlobalContactController@index')->name('global-contact');
 	Route::any('newslatter-form','Frontend\HomeController@postNewslatter')->name('newslatter-form');



//*********************    ADMIN ROUTES  ******************************//

Route::get($ADMIN_PREFIX, 'admin\AdminLoginController@getLogin')->name('admin_login');
Route::get($ADMIN_PREFIX . '/login', 'admin\AdminLoginController@getLogin');
Route::post($ADMIN_PREFIX . '/login', 'admin\AdminLoginController@postLogin');

Route::group(['prefix' => $ADMIN_PREFIX, 'middleware' => 'admin_auth'], function() {
//Dashboard
	Route::get('dashboard', 'admin\AdminController@index')->name('admin_dashboard');
	Route::get('logout', 'admin\AdminLoginController@getLogout')->name('logout');

	Route::get('change-password', 'admin\AdminController@changePassword')->name("change_password");
	Route::post('change-password', 'admin\AdminController@postChangePassword')->name("update_password");

	Route::get('my-profile', 'admin\AdminController@editProfile')->name("edit_profile");
    Route::post('edit-profile', 'admin\AdminController@updateProfile')->name("update_profile");
    
    Route::post('edit-profile-avatar', 'admin\AdminController@updateProfileAvatar')->name("update_profile_avatar");
    
    Route::post('edit-profile-privacy', 'admin\AdminController@updateProfilePrivacy')->name("update_privacy");
//Users
	Route::any('user-types/data', 'admin\UserTypesController@data')->name('user-types.data');
	Route::resource('user-types', 'admin\UserTypesController');

	Route::any('users/data', 'admin\UsersController@data')->name('users.data');
	Route::resource('users', 'admin\UsersController');

	Route::any('user-logs/data', 'admin\AdminUserLogsController@data')->name('user-logs.data');
	Route::resource('user-logs', 'admin\AdminUserLogsController'); 
	
// Permission
	Route::any('module-group-title/data', 'admin\AdminModuleTitleController@data')->name('module-group-title.data');
	Route::resource('module-group-title', 'admin\AdminModuleTitleController');
	
	Route::any('modules/data', 'admin\AdminModulesController@data')->name('modules.data');
	Route::resource('modules', 'admin\AdminModulesController');
        
	Route::any('module-pages/data', 'admin\AdminModulePagesController@data')->name('module-pages.data');
	Route::resource('module-pages', 'admin\AdminModulePagesController');

	Route::get('user-type-rights', 'admin\AdminController@rights')->name("list-assign-rights");
	Route::post('user-type-rights', 'admin\AdminController@rights')->name("assign-rights");

	Route::any('actions/data', 'admin\AdminActionController@data')->name('actions.data');
	Route::resource('actions', 'admin\AdminActionController');

//Banners
	Route::any('banner/data', 'admin\BannerController@data')->name('banner.data');
	Route::resource('banner', 'admin\BannerController');

//Pages
	Route::any('pages/data', 'admin\PagesController@data')->name('pages.data');
	Route::resource('pages', 'admin\PagesController');


//CRM
	Route::any('leads/data', 'admin\CrmController@data')->name('leads.data');
	Route::get('contact', 'admin\CrmController@contactData')->name('contact');
	Route::resource('leads', 'admin\CrmController');
	
//Email
	Route::get('app_inbox_compose', 'admin\EmailSmaTextController@inboxCompose')->name('app_inbox_compose');
	Route::get('app_inbox', 'admin\EmailSmaTextController@index')->name('app_inbox');
	Route::get('app_inbox_inbox', 'admin\EmailSmaTextController@AppInbox')->name('app_inbox_inbox');
	Route::get('app_inbox_view', 'admin\EmailSmaTextController@AppView')->name('app_inbox_view');
	Route::get('app_inbox_replay', 'admin\EmailSmaTextController@AppReplay')->name('app_inbox_replay');
//Calendar
	Route::get('calendar', 'admin\CalendarController@index')->name('calendar');

//Members
	Route::any('salespeople/data', 'admin\SalespeopleController@data')->name('salespeople.data');
	Route::resource('salespeople', 'admin\SalespeopleController');
});

