<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = auth()->user()->wishlist()->latest()->get();
        return $this->apiResponse($products, 'OK', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (!auth()->user()->wishlistHas(request('productId'))) {
            auth()->user()->wishlist()->attach(request('productId'));
            $product = auth()->user()->wishlist(request('productId'))->get();
            return $this->apiResponse($product, 'The Product Added To WishList', 200);
        } else {

            return $this->apiResponse(null, 'The Product is Already Added To Wishlist', 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->user()->wishlist()->detach(request('productId'));
        if (!auth()->user()->wishlistHas(request('productId'))) {
            return $this->apiResponse(null, 'The Product Removed From The Wishlist', 200);
        }
    }
}
