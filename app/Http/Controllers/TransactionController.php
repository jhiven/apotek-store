<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->with('detail_transactions.drug')
            ->get();
        // dd($transactions->first()->detail_transactions->first()->drug);
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        dd($request);
        $cartIds = array_keys($request->carts);
        return view('transaction.create-transaction');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaksi)
    {
        $detailTransactions = $transaksi
            ->detail_transactions()
            ->with('drug')
            ->get();

        return view('transaction.detail-transaction', compact('detailTransactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
