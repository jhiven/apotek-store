<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Drug;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View|Factory
     */
    public function index(int $userId = null): View|Factory
    {
        if (isset($userId)) {
            $transactions = Transaction::whereUserId($userId)
                ->with('detail_transactions.drug')
                ->get();
            $user = User::find($userId);

            return view('pages.admin.transaction.index', compact('transactions', 'user'));
        }

        if (Auth::user()->is_admin) {
            $transactions = Transaction::with('detail_transactions.drug')
                ->get();

            return view('pages.admin.transaction.index', compact('transactions'));
        } else {
            $transactions = Transaction::whereUserId(Auth::id())
                ->with('detail_transactions.drug')
                ->get();

            return view('pages.user.transaction.index', compact('transactions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return View|Factory
     */
    public function create(Request $request): View|Factory
    {
        $request->validate([
            'carts' => 'required|array',
            'carts.*' => 'string',
        ]);

        $carts = Cart::whereIn('id', array_keys($request->carts))
            ->with('drug')
            ->get();

        return view('pages.user.transaction.create-transaction', compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     * @return RedirectResponse
     */
    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $transactionId = Transaction::create([
            'user_id' => Auth::id(),
            'total_harga' => array_sum($request->subtotal),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        for ($i = 0; $i < count($request->drugIdList); $i++) {
            Drug::find($request->drugIdList[$i])
                ->decrement('stok', $request->quantity[$i]);

            DetailTransaction::insert([
                'transaction_id' => $transactionId->id,
                'drug_id' => $request->drugIdList[$i],
                'quantity' => $request->quantity[$i],
                'subtotal' => $request->subtotal[$i],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        Cart::whereIn('drug_id', $request->drugIdList)->delete();

        return to_route('transaksi.index');
    }

    /**
     * Display the specified resource.
     * @return View|Factory
     */
    public function show(Transaction $transaksi): View|Factory
    {

        $detailTransactions = $transaksi
            ->detail_transactions()
            ->with('drug')
            ->get();

        return Auth::user()->is_admin
            ? view('pages.admin.transaction.detail-transaction', compact('detailTransactions'))
            : view('pages.user.transaction.detail-transaction', compact('detailTransactions'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return void
     */
    public function edit(Transaction $transaction): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @return void
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @return void
     */
    public function destroy(Transaction $transaction): void
    {
        //
    }
}
