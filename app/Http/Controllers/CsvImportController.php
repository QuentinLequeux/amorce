<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CsvImport;

class CsvImportController extends Controller
{
    public function store(Request $request)
    {
        //
    }

    public function create()
    {
        $user = auth()->user();
        return view('finances.import.create', compact('user'));
    }
}
