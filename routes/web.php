<?php

use App\Http\Controllers\AuthController;
use App\Models\Products;
use App\Models\Purchase;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'products' => Products::getAllProducts(),
        'purchases' => Purchase::getAllPurchases()
    ]);
})->name('home');

Route::get('/login', function() {
    return response()->view('auth.login');
})->name('login');

Route::get('/register', fn() => view('auth.register'));

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/products/{id}', function($id) {
    // $product = DB::table('products')->where('id', $id)->get();
    $product = Products::where('id', $id)->get();

    if($product->count() == 0) {
        return 'Product Not Found';
    }

    return view('product', ['product' => $product->first()]);
});

Route::post('/products/{id}', [Purchase::class, 'make']);
