<?php
use App\Http\Middleware\CheckPermission;

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
//Admin route
Route::get('/admin', 'SessionController@indexAdmin');
Route::post('/admin', 'SessionController@storeAdmin');
Route::get('admin/dashboard', 'AdminController@index');
Route::get('/admin/posts', 'PostsController@indexAdmin')->middleware(CheckPermission::class);
Route::get('/admin/posts/create', 'PostsController@createAdmin')->middleware(CheckPermission::class);
Route::post('/admin/posts', 'PostsController@store')->middleware(CheckPermission::class);
Route::delete('/admin/posts/{post}/delete', 'PostsController@delete')->middleware(CheckPermission::class);
Route::get('/admin/posts/{post}/edit', 'PostsController@edit')->middleware(CheckPermission::class);
Route::post('/admin/posts/{post}', 'PostsController@update')->middleware(CheckPermission::class);
Route::get('/admin/users', 'UsersController@indexAdmin')->middleware(CheckPermission::class);
Route::get('/admin/shops', 'ShopsController@indexAdmin');
Route::get('/admin/shops/search', 'ShopsController@search');
Route::get('/admin/shops/create', 'ShopsController@create');
Route::post('/admin/shops', 'ShopsController@store');
Route::delete('/admin/shops/{product}/delete', 'ShopsController@delete');
Route::get('/admin/shops/{product}/edit', 'ShopsController@edit');
Route::post('/admin/shops/{product}', 'ShopsController@update');
Route::get('/admin/transactions', 'TransactionsController@index');
Route::get('/admin/transactions/{transaction}', 'TransactionsController@show');

//Front route
Route::get('/home', 'HomeController@index');
Route::get('/login', 'SessionController@index');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/register', 'RegistrationController@index');
Route::post('/register', 'RegistrationController@store');
Route::get('/shop', 'ShopsController@index');
Route::get('/shop/{product}', 'ShopsController@show');
Route::get('/cart', 'CartController@index');
Route::post('/cart/add', 'CartController@add');
Route::post('/cart/remove', 'CartController@remove');
Route::post('/cart/update', 'CartController@update');
Route::post('/cart/clear', 'CartController@clear');
Route::get('/cart/confirm', 'CartController@confirm');
Route::post('/cart/pay', 'CartController@store');
Route::get('/contact', 'ContactController@index');
Route::get('/contact/confirm', 'ContactController@confirm');
Route::post('/contact/store', 'ContactController@store');
Route::get('/about', 'AboutController@index');
Route::get('/testdb', 'TestdbController@index');
Route::post('/testdb', 'TestdbController@save');
Route::get('/python', 'PythonController@callPython');
Route::post('/python', 'PythonController@runPython');
Route::get('/botman/test', 'BotmanController@index');
Route::match(['get', 'post'], 'botman', 'BotmanController@handle');