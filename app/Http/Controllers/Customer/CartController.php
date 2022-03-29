<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Customer.Orders.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        if (auth()->user()) {
            $product = Product::findOrFail(request('productId'));
            $cart = session()->get('cart');
            if (empty($cart)) {
                // if (isset($cart[request('productId')])) {
                //     $cart[request('productId')]['quantity']++;
                // } else {
                //     $cart[request('productId')] = [
                //         "product_id" => request('productId'),
                //         "name"       => $product->product_name,
                //         "price"      => $product->max_price,
                //         "quantity"   => 1,
                //     ];
                // }
                // session()->put('cart', $cart);

                $NewCart             = new Cart;
                $NewCart->user_id    = Auth::user()->id;
                $NewCart->product_id = $cart->product_id;
                $NewCart->quantity   = $cart->quantity;
                $NewCart->save();
            } else {
                // echo "lena";
                $product = Product::findOrFail(request('productId'));
                $cart = session()->get('cart', []);
                if (isset($cart[request('productId')])) {
                    $cart[request('productId')]['quantity']++;
                } else {
                    $cart[request('productId')] = [
                        "product_id" => request('productId'),
                        "name"       => $product->product_name,
                        "price"      => $product->max_price,
                        "quantity"   => 1,
                    ];
                    session()->put('cart', $cart);
                    return $cart;
                    $NewCart = new Cart;
                    $NewCart->user_id = Auth::user()->id;
                    $NewCart->product_id = $cart->product_id;
                    $NewCart->quantity = $cart->quantity;
                    $NewCart->save();
                    echo "huda";
                }
            }
        } else {
            $product = Product::findOrFail(request('productId'));
            $cart = session()->get('cart', []);
            if (isset($cart[request('productId')])) {
                $cart[request('productId')]['quantity']++;
            } else {
                $cart[request('productId')] = [
                    "product_id" => request('productId'),
                    "name"       => $product->product_name,
                    "price"      => $product->max_price,
                    "quantity"   => 1,
                ];
            }
            session()->put('cart', $cart);
            return $cart;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
