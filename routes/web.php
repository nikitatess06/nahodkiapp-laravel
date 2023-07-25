<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
Route::get('/findings/create', function () {
    return view('finding-create');
});
Route::post('/findings/create', function(Request $request) {
    $name = $request->input('name');
    $location = $request->input('location');
    $contacts = $request->input('contacts');
    
    $find = new App\Models\Finding;
    $find->name = $name;
    $find->location = $location;
    $find->contacts = $contacts;
    $find->save();
    
    return redirect('/findings');
});