<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $totalGeneral = Transaction::getTotalByFundId('Fond général');
        //$transactions = Transaction::all();
        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
        $fund = Transaction::where('fund_type', 'Fond de fonctionnement')->get();

        return view('finances.index', compact('transactions', 'user', 'totalGeneral', 'fund'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'date' => 'required',
            'fund_type' => 'required',
            'donation_type' => 'required',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|decimal:2',
        ]);

        Transaction::create($validated);

        $totalGeneral = Transaction::getTotalByFundId('Fond général');
        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);

        return view('livewire.general-fund', compact('user', 'totalGeneral', 'transactions'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('finances.manual.create', compact('user'));
    }
}
