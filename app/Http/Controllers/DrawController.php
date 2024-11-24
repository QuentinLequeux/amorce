<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DrawController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('draw', compact('user'));
    }
}
