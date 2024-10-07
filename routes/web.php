<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\DB;
use App\Models\Finding;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/findings/create', function () {
    if (!Auth::check()) {
        return redirect('/login'); 
    }
    return view('finding-create');
});
Route::post('/findings/create', function(Request $request) {
    $name = $request->input('name');
    $latitude = $request->input('latitude');
    $longitude = $request->input('longitude');
    $contacts = $request->input('contacts');
    $longitudeError = false;
    if (!$longitude) {
        $longitudeError = true;
    }
    if ($longitudeError) {
        return redirect()->back()->withErrors(['longitude' => $longitudeError])->withInput();
    }
    $user = Auth::user();
    $username = $user->name;
    $path = $request->hasFile('photo') ? $request->file('photo')->store('media') : '\public\default.png';
    $find = new App\Models\Finding;
    $find->name = $name;
    $find->latitude = $latitude;
    $find->longitude = $longitude;
    $find->contacts = $contacts;
    $find->username = $username;
    $find->media = $path;
    $find->save(); 

    return redirect('/findings');
})->name('create');


Route::get('/findings/{id}', function (string $id) {
    if (!Auth::check()) {
        return redirect('/login'); 
    }
    $find = DB::table('findings')->where('id', $id)->first();
    $findData = DB::table('findings')->where('id', $id)->select('latitude', 'longitude', 'name')->get();
    return view('finding_id')
        ->with('media',$find->media)
        ->with('name', $find->name)
        ->with('latitude', $find->latitude)
        ->with('longitude', $find->longitude)
        ->with('contacts', $find->contacts)
        ->with('findData', $findData)
        ->with('find', $find);    
});
Route::get('/findings/{id}/file', function (string $id) {
    if (!Auth::check()) {
        return redirect('/login'); 
    }
    $filepath = DB::table('findings')->where('id', $id)->value('media');
    $path = storage_path('app/'.$filepath);
    return response()->file($path);   
});

Route::get('/findings', function () {
    if (!Auth::check()) {
        return redirect('/login'); 
    }
    $findings = DB::table('findings')->simplePaginate(25);
    return view('findings_list', [        'findings' => $findings,    ]);
})->name('findings');

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login'); 
    }
    $lastFindings = DB::table('findings')->orderBy('created_at', 'desc')->take(10)->get();
    $findingsData = DB::table('findings')->select('latitude', 'longitude', 'name')->get();
    return view('main_screen', compact('lastFindings', 'findingsData'));
})->name('home');
use Illuminate\Support\Facades\Auth;

Route::get('/user', function () {
    if (!Auth::check()) {
        return redirect('/login'); 
    }
    $user = Auth::user();
    $username = $user->name;
    $findings = DB::table('findings')
    ->where('username', $username)->simplePaginate(25);
    return view('user_page', [        'findings' => $findings,    ] , compact('username'));
})->name('user');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::delete('/findings/{id}', function ($id) {
    $finding = Finding::find($id);
    $filepath = $finding->media;
    if($filepath != "\public\default.png"){
        unlink(storage_path('app/' . $filepath));
    }
    $finding->delete();
    return redirect('/findings');
})->middleware('auth');

Route::get('/findings/{id}/edit', function ($id) {
    if (!Auth::check()) {
        return redirect('/login'); 
    }
    $find = Finding::find($id);
    return view('finding_edit')
    ->with('name', $find->name)
    ->with('contacts', $find->contacts)
    ->with('find', $find);
    })->middleware('auth');
    
Route::patch('/findings/{id}/edit', function ($id) {
    $name = request('name');
    $contacts = request('contacts');
    $affected = DB::table('findings')
    ->where('id', $id)
    ->update(['name' => $name,  'contacts' => $contacts]);
    return redirect("/findings/{$id}");
    });



