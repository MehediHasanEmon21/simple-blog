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

Route::get('/', 'HomePageController@index');
Route::get('/category/{id}', 'ListingPageController@listing');
Route::get('/author/{id}', 'ListingPageController@listing');
Route::get('/listing', 'ListingPageController@index');
Route::get('/details/{slug}', 'DetailsPageController@index')->name('details');
Route::post('/comments', 'DetailsPageController@comment');
Route::get('/mail/basic', 'ExampleController@basic');
Route::get('/mail/html', 'ExampleController@htmlMail');
Route::get('/mail/attachment', 'ExampleController@sendAttachment');

Route::get('/session/set', 'ExampleController@session_set');
Route::get('/session/get', 'ExampleController@session_get');
Route::get('/session/delete', 'ExampleController@session_delete');

Route::get('/cookie/set', 'ExampleController@cookie_set');
Route::get('/cookie/get', 'ExampleController@cookie_get');

Route::group(['prefix'=>'back','middleware'=>'auth'],function(){
	Route::get('/','Admin\DashboardController@index');
	Route::get('/category','Admin\CategoryController@index');
	Route::get('/category/create','Admin\CategoryController@create');
	Route::get('/category/edit','Admin\CategoryController@edit');

	Route::get('/permissions',[
		'uses'=>'Admin\PermissionController@index',
		'as'=>'permission-list',
		'middleware'=>'permission:Permission List|All'
	]);
	Route::get('/permission/create',[
		'uses'=>'Admin\PermissionController@create',
		'as'=>'permission-create',
		'middleware'=>'permission:Permission Add|All'
	]);
	Route::post('/permission/store',[
		'uses'=>'Admin\PermissionController@store',
		'as'=>'permission-store',
		'middleware'=>'permission:Permission Add|All'
	]);
	Route::get('/permission/edit/{id}',[
		'uses'=>'Admin\PermissionController@edit',
		'as'=>'permission-edit',
		'middleware'=>'permission:Permission Update|All'
	]);
	Route::put('/permission/edit/{id}',[
		'uses'=>'Admin\PermissionController@update',
		'as'=>'permission-update',
		'middleware'=>'permission:Permission Update|All'
	]);
	Route::delete('/permission/delete/{id}',[
		'uses'=>'Admin\PermissionController@destroy',
		'as'=>'permission-delete',
		'middleware'=>'permission:Permission Delete|All'
	]);

	Route::get('/roles',[
		'uses'=>'Admin\RoleController@index',
		'as'=>'role-list',
		'middleware'=>'permission:Role List|All'
	]);
	Route::get('/roles/create',[
		'uses'=>'Admin\RoleController@create',
		'as'=>'role-create',
		'middleware'=>'permission:Role Add|All'
	]);
	Route::post('/roles/store',[
		'uses'=>'Admin\RoleController@store',
		'as'=>'role-store',
		'middleware'=>'permission:Role Add|All'
	]);

	Route::get('/roles/edit/{id}',[
		'uses'=>'Admin\RoleController@edit',
		'as'=>'role-edit',
		'middleware'=>'permission:Role Update|All'
	]);

	Route::put('/roles/edit/{id}',[
		'uses'=>'Admin\RoleController@update',
		'as'=>'role-update',
		'middleware'=>'permission:Role Update|All'
	]);

	Route::delete('/roles/delete/{id}',[
		'uses'=>'Admin\RoleController@destroy',
		'as'=>'role-delete',
		'middleware'=>'permission:Role Delete|All'
	]);

	Route::get('/author',[
		'uses'=>'Admin\AuthorController@index',
		'as'=>'author-list',
		'middleware'=>'permission:Author List|All'
	]);

	Route::get('/author/create',[
		'uses'=>'Admin\AuthorController@create',
		'as'=>'author-create',
		'middleware'=>'permission:Author Add|All'
	]);
	Route::post('/author/store',[
		'uses'=>'Admin\AuthorController@store',
		'as'=>'author-store',
		'middleware'=>'permission:Author Add|All'
	]);

	Route::get('/author/edit/{id}',[
		'uses'=>'Admin\AuthorController@edit',
		'as'=>'author-edit',
		'middleware'=>'permission:Author Update|All'
	]);

	Route::put('/author/update/{id}',[
		'uses'=>'Admin\AuthorController@update',
		'as'=>'author-update',
		'middleware'=>'permission:Author Update|All'
	]);

	Route::delete('/author/delete/{id}',[
		'uses'=>'Admin\AuthorController@destroy',
		'as'=>'author-delete',
		'middleware'=>'permission:Author Delete|All'
	]);

	Route::get('/categories',[
		'uses'=>'Admin\CategoryController@index',
		'as'=>'category-list',
		'middleware'=>'permission:Category List|All'
	]);
	Route::get('/category/create',[
		'uses'=>'Admin\CategoryController@create',
		'as'=>'category-create',
		'middleware'=>'permission:Category Add|All'
	]);
	Route::post('/category/store',[
		'uses'=>'Admin\CategoryController@store',
		'as'=>'category-store',
		'middleware'=>'permission:Category Add|All'
	]);
	Route::put('/category/status/{id}',[
		'uses'=>'Admin\CategoryController@status',
		'as'=>'category-status',
		'middleware'=>'permission:Category Add|All'
	]);
	Route::get('/category/edit/{id}',[
		'uses'=>'Admin\CategoryController@edit',
		'as'=>'category-edit',
		'middleware'=>'permission:Category Update|All'
	]);
	Route::put('/category/update/{id}',[
		'uses'=>'Admin\CategoryController@update',
		'as'=>'category-update',
		'middleware'=>'permission:Category Update|All'
	]);
	Route::delete('/category/delete/{id}',[
		'uses'=>'Admin\CategoryController@destroy',
		'as'=>'category-delete',
		'middleware'=>'permission:Category Delete|All'
	]);
	Route::get('/posts',[
		'uses'=>'Admin\PostController@index',
		'as'=>'post-list',
		'middleware'=>'permission:Post List|All'
	]);
	Route::get('/post/create',[
		'uses'=>'Admin\PostController@create',
		'as'=>'post-create',
		'middleware'=>'permission:Post Add|All'
	]);
	Route::post('/post/store',[
		'uses'=>'Admin\PostController@store',
		'as'=>'post-store',
		'middleware'=>'permission:Post Add|All'
	]);
	Route::put('/post/status/{id}',[
		'uses'=>'Admin\PostController@status',
		'as'=>'post-status',
		'middleware'=>'permission:Post List|All'
	]);
	Route::put('/post/hot/news/{id}',[
		'uses'=>'Admin\PostController@hot_news',
		'as'=>'post-hot_news',
		'middleware'=>'permission:Post List|All'
	]);
	Route::get('/post/edit/{id}',[
		'uses'=>'Admin\PostController@edit',
		'as'=>'post-edit',
		'middleware'=>'permission:Post Update|All'
	]);
	Route::put('/post/update/{id}',[
		'uses'=>'Admin\PostController@update',
		'as'=>'post-update',
		'middleware'=>'permission:Post Update|All'
	]);
	Route::delete('/post/delete/{id}',[
		'uses'=>'Admin\PostController@destroy',
		'as'=>'post-delete',
		'middleware'=>'permission:Post Delete|All'
	]);
	Route::get('/comment/{id}',[
		'uses'=>'Admin\CommentController@index',
		'as'=>'comment-list',
		'middleware'=>'permission:Comment View|All'
	]);
	Route::get('/comment/reply/{id}',[
		'uses'=>'Admin\CommentController@reply',
		'as'=>'comment-view',
		'middleware'=>'permission:Comment Reply|All'
	]);
	Route::post('/comment/reply',[
		'uses'=>'Admin\CommentController@store',
		'as'=>'comment-reply',
		'middleware'=>'permission:Comment Reply|All'
	]);
	Route::put('/comment/status/{id}',[
		'uses'=>'Admin\CommentController@status',
		'as'=>'comment-status',
		'middleware'=>'permission:Comment Approval|All'
	]);
	Route::get('/settings',[
		'uses'=>'Admin\SettingController@index',
		'as'=>'settings',
		'middleware'=>'permission:System Settings|All'
	]);
	Route::put('/setting/update',[
		'uses'=>'Admin\SettingController@update',
		'as'=>'setting-update',
		'middleware'=>'permission:System Settings|All'
	]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


