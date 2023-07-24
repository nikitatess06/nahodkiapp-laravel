<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Finding;

class FindingsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $find = new Finding; 
        $find->name = $request->input('name');
        $find->location = $request->input('location');
        $find->contacts = $request->input('contacts');
        $find->save();
        return redirect('/findings');
    }
}
