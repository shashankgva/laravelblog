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

use App\Jobs\SendEmailJob;
use App\Mail\SendEmailMailable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

Route::get('/', [
	'uses' => 'FrontEndController@index',
	'as' => 'home'
]);

Auth::routes();

Route::post('/subscribe', function() {
	$email = request('email');
	Newsletter::subscribe($email);

	Session::flash('subscribed', 'Successfully subdscribed.');
	return redirect()->back();
});

Route::get('/test', function() {
	return App\Profile::find(1)->user;
});

Route::get('/post/{slug}', [
	'uses' => 'FrontEndController@single',
	'as' => 'post.single' 
]);

Route::get('/category/{id}', [
	'uses' => 'FrontEndController@category',
	'as' => 'category.single'
]);	

Route::get('/tag/{id}', [
	'uses' => 'FrontEndController@tag',
	'as' => 'tag.single'
]);

Route::get('/results', function() {
	$posts = App\Post::where('title', 'like', ' % '. request('query') .' % ')->get();
	return view('results')->with('posts', $posts)
						  ->with('title', 'Search Results'. request('query'))
						   ->with('categories', \App\Category::take(5)->get())
						   ->with('settings', \App\Setting::first())
						   ->with('tags', \App\Tag::all())
    					->with('query', request('query'));
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');
	Route::get('/post/create', [
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);

	Route::post('/post/store', [
		'uses' => 'PostsController@store',
		'as' => 'post.store'
	]);

	Route::get('/posts', [
		'uses' => 'PostsController@index',
		'as' => 'posts'
	]);

	Route::get('/posts/trashed', [
		'uses' => 'PostsController@trashed',
		'as' => 'posts.trashed'
	]);

	Route::get('/post/edit/{id}', [
		'uses' => 'PostsController@edit',
		'as' => 'post.edit'
	]);

	Route::get('/post/delete/{id}', [

		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);

	Route::get('/post/kill/{id}', [

		'uses' => 'PostsController@kill',
		'as' => 'post.kill'
	]);

	Route::get('/post/restore/{id}', [
		'uses' => 'PostsController@restore',
		'as' => 'post.restore'
	]);

	Route::post('/post/update/{id}', [
		'uses' => 'PostsController@update',
		'as' => 'post.update'
	]);

	Route::get('/category/create', [

		'uses' => 'CategoriesController@create',
		'as' => 'category.create'
	]);

	Route::get('/category/edit/{id}', [
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'
	]);

	Route::post('/category/update/{id}', [
		'uses' => 'CategoriesController@update',
		'as' => 'category.update'
	]);

	Route::get('/category/delete/{id}', [

		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete'
	]);

	Route::post('/category/store', [
		'uses' => 'CategoriesController@store',
		'as' => 'category.store'

	]);

	Route::post('/category/update/{id}', [
		'uses' => 'CategoriesController@update',
		'as' => 'category.update'

	]);

	Route::get('/categories', [

		'uses' => 'CategoriesController@index',
		'as' => 'categories'
	]);

	Route::get('/post/delete/{id}', [
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);

	Route::get('/category/edit/{id}', [
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'
	]);

	Route::get('/tags', [

		'uses' => 'TagsController@index',
		'as' => 'tags'
	]);

	Route::get('/tag/create', [

		'uses' => 'TagsController@create',
		'as' => 'tag.create'
	]);

	Route::get('/tag/edit/{id}', [
		'uses' => 'TagsController@edit',
		'as' => 'tag.edit'
	]);

	Route::post('/tag/update/{id}', [
		'uses' => 'TagsController@update',
		'as' => 'tag.update'

	]);

	Route::post('/tag/store', [
		'uses' => 'TagsController@store',
		'as' => 'tag.store'

	]);

	Route::get('/tag/delete/{id}', [
		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete'
	]);

	Route::get('/users', [

		'uses' => 'UsersController@index',
		'as' => 'users'
	]);

	Route::get('/user/create', [
		'uses' => 'UsersController@create',
		'as' => 'user.create'
	]);

	Route::get('/user/edit/{id}', [
		'uses' => 'UsersController@edit',
		'as' => 'user.edit'
	]);

	Route::post('/user/update/{id}', [
		'uses' => 'UsersController@update',
		'as' => 'user.update'

	]);

	Route::post('/user/store', [
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);

	Route::get('/user/delete/{id}', [
		'uses' => 'UsersController@destroy',
		'as' => 'user.delete'
	]);

	Route::get('/user/admin/{id}', [
		'uses' => 'UsersController@admin',
		'as' => 'user.admin'
	])->middleware('admin');

	Route::get('/user/not-admin/{id}', [
		'uses' => 'UsersController@not_admin',
		'as' => 'user.notadmin'
	]);

	Route::get('/user/profile', [
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'
	]);

	Route::post('/user/profile/update', [
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'
	]);
	
	Route::get('/settings', [
		'uses' => 'SettingsController@index',
		'as' => 'settings'
	])->middleware('admin');

	Route::post('/settings/update', [
		'uses' => 'SettingsController@update',
		'as' => 'settings.update'
	])->middleware('admin');
});

Route::get('sendemail', function() {

	$job = (new SendEmailJob())->delay(Carbon::now()->addMinutes(10));

	dispatch($job);
	return 'Email Send properly';
});
