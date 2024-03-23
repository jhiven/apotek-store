<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())
            ->with('drug')
            ->get();

        return view('cart.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $drug = Drug::find($request->id);
        return view('cart.create-cart', compact('drug'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        Cart::insert([
            'user_id' => Auth::id(),
            'drug_id' => $request->drug_id,
            'quantity' => $request->quantity,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('keranjang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cart $keranjang)
    {
        $keranjang->delete();

        // return redirect()->route('keranjang.index');
        return $request->expectsJson()
            ? null
            : back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }
}
