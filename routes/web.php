<?php

use App\Http\Controllers\UploadfileController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[
    'as'=>'trangchu',
    'uses'=>'PageController@getIndex',
]);
Route::get('loai-san-pham/{type}',[
        'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaiSp'
 ]);
 Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
   'uses'=>'PageController@getChitiet'
]);

Route::get('gioi-thieu',[
    'as'=>'gioithieu',
   'uses'=>'PageController@getGioithieu'
]);
Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
   'uses'=>'PageController@getAddtoCart'
]);
Route::get('reduceByOne/{id}',[
    'as'=>'reduceByOne',
   'uses'=>'PageController@reduceByOne'
]);
Route::get('addByOne/{id}',[
    'as'=>'addByOne',
   'uses'=>'PageController@addByOne'
]);
Route::get('mua-hang',[
    'as'=>'muahang',
   'uses'=>'PageController@getMuahang'
]);
Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
   'uses'=>'PageController@getDelItemcart'
]);
 Route::get('dat-hang',[
     'as'=>'dathang',
  'uses'=>'PageController@getCheckout'
]);
 Route::post('dat-hang',[
     'as'=>'dathang',
    'uses'=>'PageController@getpostCheckout'
 ]);
 Route::get('tintuc/{id}', 'PageController@tintuc')->name('tintuc');

 Auth::routes();
 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('thongtincanhan/_edit', 'ThongtincanhanController@_edit')->name('thongtincanhan._edit');
 Route::get('list_bills', 'ThongtincanhanController@list_bills')->name('list_bills');
 Route::resource('thongtincanhan', 'ThongtincanhanController');
 Route::resource('support', 'SupportController');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'UsersController@index');
    Route::resource('/bills', 'BillsController');
    Route::resource('/bill_details', 'Bill_detailsController');
    Route::resource('/products', 'ProductsController');
    Route::resource('/productsType', 'ProductsTypeController');
    Route::resource('/slides', 'SlidesController');
    Route::resource('/customer', 'CustomerController');
    Route::resource('/news', 'NewsController');
    Route::resource('/users','UsersController');

       //----- delete Cookie checkAdmin ---
       Route::get('/deleteCookie_checkAdmin', function (Request $request) {
        \Cookie::queue(\Cookie::forget('checkAdmin'));
        return redirect()->route('login');
    })->name('deleteCookie_checkAdmin');
});


//facebook -------------
Route::get('login/facebook', 'Auth\LoginController@f_redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@f_handleProviderCallback')->name('login.facebook.callback');
//google--------------
Route::get('login/google', 'Auth\LoginController@g_redirectToProvider')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@g_handleProviderCallback')->name('login.google.callback');
//---------------------

