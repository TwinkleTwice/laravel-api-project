<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::query()->findOrFail($request->input('product_id'));

        if($cart = Cart::where(['session_id' => session()->getId(), 'product_id' => $product->id])->first()) {
            $cart->quantity++;
            $cart->save();
        } else {
            Cart::create([
                'session_id' => session()->getId(),
                'product_id' => $product->id,
                'quantity' => $request->input('quantity'),
                'price' => $product->price,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Item added successfully',
        ]);
    }

    public function remove(Request $request)
    {
        Cart::destroy($request->input('row_id'));

        return response()->json([
            'status' => 'success',
            'message' => 'Item successfully removed from cart!'
        ]);
    }

    public function quantity(Request $request)
    {
        $cart = Cart::findOrFail($request->id);

        $cart->quantity = $request->input('quantity');
        $cart->save();

        return response()->json([
            'id' => $cart->id,
            'quantity' => $cart->quantity
        ]);
    }

    public function total()
    {
        $amount = Cart::where(['session_id' => session()->getId()])->get()->map(function ($item) {
            return $item->price * $item->quantity;
        })->sum();

        return response()->json([
            'amount' => $amount
        ]);
    }
}
