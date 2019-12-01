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

route::get('/',[
    'uses' => 'index@get_index',
    'as' => 'index.get_index'
    ]);

route::get('/api/business',[
    'uses' => 'api\business@get_business',
    'as' => 'business.get_business'
    ]);

route::get('/api/reviews',[
    'uses' => 'api\reviews@get_reviews',
    'as' => 'reviews.get_reviews'
    ]);
