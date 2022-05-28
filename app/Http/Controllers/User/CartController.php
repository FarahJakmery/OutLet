<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


// use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsInCart = Cart::where('user_id', auth()->user()->id)->pluck('product_id')->toArray();
        $productsToShow = Product::whereIn('id', $productsInCart)->get();
        return view('Customer.Orders.cart', compact('productsToShow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        // إذا كان المستخدم غير مسجل الدخول
        if (!auth()->user()) {
            $productId = Cookie::get($request->productId);
            $minutes = 60;
            if ($productId == null) {
                Cookie::queue("$request->productId", $request->productId, $minutes);
                Cookie::queue("quan" . $request->productId, $request->val, $minutes);
            } else {
                $item_qaun = Cookie::get("quan" . $request->productId);
                $quantity = $request->val;
                Cookie::queue("quan" . $request->productId, $quantity, $minutes);
            }
        }
        // إذا كان المستخدم مسجل الدخول
        else {
            $products = Product::all();
            $ids = [];
            $count_Products = 0;
            foreach ($products as $product) {
                $product_id = Cookie::get($product->id);
                if ($product_id == null) {
                } else {
                    $product_quant = Cookie::get("quan" . $product->id);
                    $count_Products += $product_quant;
                    array_push($ids, $product_id);
                }
            }

            $price = 0;
            $quan_cart = 1;
            foreach ($ids as $id) {
                $product_quant  = Cookie::get("quan" . $id);
                $products       = Product::where('id', $id)->first();
                $product_image  = ProductImage::where('product_id', $id)->first();
                $NewCart = new Cart;
                $NewCart->user_id = Auth::user()->id;
                $NewCart->product_id = $id;
                $NewCart->quantity = $product_quant;
                $NewCart->save();
            }
            session()->flash('Add', 'تم إضافة المنتج للعربة بنجاح');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
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
            Cart::find($request->id)->delete();
            session()->flash('success', 'Product removed successfully');
        }
    }
}

// $product = Product::findOrFail($request->productId);
// $cart = session()->get('cart');
// if (empty($cart)) {
//     // if (isset($cart[request('productId')])) {
//     //     $cart[request('productId')]['quantity']++;
//     // } else {
//     //     $cart[request('productId')] = [
//     //         "product_id" => request('productId'),
//     //         "name"       => $product->product_name,
//     //         "price"      => $product->max_price,
//     //         "quantity"   => 1,
//     //     ];
//     // }
//     // session()->put('cart', $cart);

//     $NewCart             = new Cart;
//     $NewCart->user_id    = Auth::user()->id;
//     $NewCart->product_id = $cart->product_id;
//     $NewCart->quantity   = $cart->quantity;
//     $NewCart->save();
// } else {
//     // echo "lena";
//     $product = Product::findOrFail(request('productId'));
//     $cart = session()->get('cart', []);
//     if (isset($cart[request('productId')])) {
//         $cart[request('productId')]['quantity']++;
//     } else {
//         $cart[request('productId')] = [
//             "product_id" => request('productId'),
//             "name"       => $product->product_name,
//             "price"      => $product->max_price,
//             "quantity"   => 1,
//         ];
//         session()->put('cart', $cart);
//         return $cart;
//         $NewCart = new Cart;
//         $NewCart->user_id = Auth::user()->id;
//         $NewCart->product_id = $cart->product_id;
//         $NewCart->quantity = $cart->quantity;
//         $NewCart->save();
//         echo "huda";
//     }
// }











// // إذا كان المستخدم غير مسجل الدخول
// if (!auth()->user()) {
//     $product = Product::findOrFail($request->productId);
//     $cart = session()->get('cart', []);
//     if (isset($cart[$request->productId])) {
//         $cart[$request->productId]['quantity']++;
//     } else {
//         $cart[$request->productId] = [
//             'product_id' => $request->productId,
//             'name'       => $product->product_name,
//             'price'      => $product->max_price,
//             'quantity'   => 1,
//         ];
//     }
//     session()->put('cart', $cart);
//     session()->flash('Add', 'تم إضافة المنتج للعربة بنجاح');
// }
// // إذا كان المستخدم مسجل الدخول
// else {
//     $product = Product::findOrFail($request->productId);
//     $cart = session()->get('cart', []);
//     // To determine if The Cart is Empty or Not
//     if ($request->session()->has('cart')) {
//         if (isset($cart[$request->productId])) {
//             $cart[$request->productId]['quantity']++;
//         } else {
//             $cart[$request->productId] = [
//                 'product_id' => $request->productId,
//                 'name'       => $product->product_name,
//                 'price'      => $product->max_price,
//                 'quantity'   => 1,
//             ];
//         }
//         session()->put('cart', $cart);
//         echo "bbbbbbbbb";
//         $NewCart = new Cart;
//         $NewCart->user_id = Auth::user()->id;
//         $NewCart->product_id = $request->productId;
//         $NewCart->quantity = $request->quantity;
//         $NewCart->save();
//         session()->flash('Add', 'تم إضافة المنتج للعربة بنجاح');
//     } else {
//         echo "mmmmmmmmmmm";
//     }
// }










// $product = Product::findOrFail($request->productId);
//             $cart = session()->get('cart', []);
//             // To determine if The Cart is Empty or Not
//             if ($request->session()->has('cart')) {
//                 if (isset($cart[$request->productId])) {
//                     $cart[$request->productId]['quantity']++;
//                 } else {
//                     $cart[$request->productId] = [
//                         'product_id' => $request->productId,
//                         'name'       => $product->product_name,
//                         'price'      => $product->max_price,
//                         'quantity'   => 1,
//                     ];
//                 }
//                 session()->put('cart', $cart);
//                 echo "bbbbbbbbb";
//                 $NewCart = new Cart;
//                 $NewCart->user_id = Auth::user()->id;
//                 $NewCart->product_id = $request->productId;
//                 $NewCart->quantity = $request->quantity;
//                 $NewCart->save();
//                 session()->flash('Add', 'تم إضافة المنتج للعربة بنجاح');
//             } else {
//                 echo "mmmmmmmmmmm";
//             }
