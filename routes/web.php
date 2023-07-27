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
Route::get('/findings/{id}', function (string $id) {
    $find = DB::table('findings')->where('id', $id)->first();
    return view('finding_id')
        ->with('name', $find->name)
        ->with('location', $find->location)
        ->with('contacts', $find->contacts);
});
Route::get('/findings', function () {
    $findings = DB::table('findings')->get();
    return view('findings_list')
    ->with('findings', $findings);
});
Route::get('/', function () {
    return redirect('/findings');
});
