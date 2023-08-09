<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\DB;
use App\Models\Finding;
use Illuminate\Http\UploadedFile;
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

Route::get('/findings/create', function () {
    return view('finding-create');
});
Route::post('/findings/create', function(Request $request) {
    $name = $request->input('name');
    $location = $request->input('location');
    $contacts = $request->input('contacts');
    $path = $request->file('photo')->store('media');
    $find = new App\Models\Finding;
    $find->name = $name;
    $find->location = $location;
    $find->contacts = $contacts;
    $find->media = $path;
    $find->save();
    
    return redirect('/findings');
})->name('create');

Route::get('/findings/{id}', function (string $id) {
    $find = DB::table('findings')->where('id', $id)->first();
    return view('finding_id')
        ->with('name', $find->name)
        ->with('location', $find->location)
        ->with('contacts', $find->contacts)
        ->with('find', $find);
        
});
Route::get('/findings/{id}/file', function (string $id) {
    $filepath = DB::table('findings')->where('id', $id)->value('media');
    $path = storage_path('app/' . $filepath);
    return response()->file($path);
    
});

Route::get('/findings', function () {
    $findings = DB::table('findings')->simplePaginate(25);
    return view('findings_list', [        'findings' => $findings,    ]);
});

Route::get('/', function () {
    return redirect('/findings');
})->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::delete('/findings/{id}', function ($id) {
    $finding = Finding::find($id);
    $finding->delete();
    return redirect('/findings');
})->middleware('auth');
Route::get('/findings/{id}/edit', function ($id) {
    $find = Finding::find($id);
    return view('finding_edit')
    ->with('name', $find->name)
    ->with('location', $find->location)
    ->with('contacts', $find->contacts)
    ->with('find', $find);
    });
    
    Route::patch('/findings/{id}/edit', function ($id) {
    $name = request('name');
    $location = request('location');
    $contacts = request('contacts');
    $affected = DB::table('findings')
    ->where('id', $id)
    ->update(['name' => $name, 'location' => $location, 'contacts' => $contacts]);
    return redirect("/findings/{$id}");
    });
