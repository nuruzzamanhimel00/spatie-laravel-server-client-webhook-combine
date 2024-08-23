<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\WebhookServer\WebhookCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return view('product');
});
Route::post('/product', function (Request $request) {
    $request_data = $request->all();
    WebhookCall::create()
   ->url('http://localhost:8000/receive-product-webhook-url')
   ->payload(['payload' => $request_data])
   ->useSecret('sign-using-this-secret')
   ->dispatch();
    return redirect()->back();
});

Route::get('/post', function () {
    return view('post');
});
Route::post('/post', function (Request $request) {
    $request_data = $request->all();
    WebhookCall::create()
   ->url('http://localhost:8000/receive-post-webhook-url')
   ->payload(['payload' => $request_data])
   ->useSecret('sign-using-this-secret')
   ->dispatch();
    return redirect()->back();
});


Route::webhooks('receive-product-webhook-url','product-webhook-url');
Route::webhooks('receive-post-webhook-url','post-webhook-url');
