<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('/user/login', function (Request $request) {
  $email = $request->email;
  $password = $request->password;

  // check the token
  if (!$token = auth()->attempt(['email' => $email, 'password' => $password])) {
    return response()->json(['error' => 'Unauthorized'], 401);
  }

  $user = \App\User::where('email', $email)->first();

  return response()->json(['token' => $user->api_token], 200);
});


Route::resource('/landing', 'LandingController');
Route::resource('/promos', 'PromoController');
Route::resource('/home_promo', 'HomePromoController');
Route::resource('/channels', 'ChannelController');
Route::resource('/categories', 'CategoryController');
Route::get('/channels/category/{id}', 'CategoryController@getChannels');
