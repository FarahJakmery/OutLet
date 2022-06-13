<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Mcategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::translated()->all();
        return view('User.Products.products', compact('Products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('reviews', 'images:id,image_name,product_id')->find($id);

        $totalHoursDiff   = $this->Date_Time_Difference_In_Seconds($product) / 60 / 60;

        $total_for_one_item = $this->Amount_Of_Price_Decrease($product, $totalHoursDiff);

        $seconds = $product->minutes * 60;

        return view('User.Products.show_product', compact('product', 'totalHoursDiff', 'total_for_one_item', 'seconds'));
    }

    public function Date_Time_Difference_In_Seconds($product)
    {
        $d1 = strtotime($product->product_date);
        $d2 = strtotime($product->expiry_date);
        $totalSecondsDiff = abs($d2 - $d1);
        return $totalSecondsDiff;
    }

    public function Amount_Of_Price_Decrease($product, $totalHoursDiff)
    {
        $minutes = $product->minutes;
        $hour = $minutes / 60;
        $TwoPriceDiff = $product->max_price - $product->min_price;
        $one_item = $TwoPriceDiff * $hour;
        $total_for_one_item = $one_item / $totalHoursDiff;
        return $total_for_one_item;
    }

    public function getSizes($id)
    {
        $Sizes_id = DB::table('color_size')->where('color_id', $id)->pluck('size_id');
        $Sizes_names = Size::whereIn('id', $Sizes_id)->pluck('size_name');
        return json_encode($Sizes_names);
    }

    public function getProducts(Request $request)
    {
        if (isset($request->brand)) {
            $brand = $request->brand;
            $Products = Product::translated()->whereIn('brand_id', explode(',', $brand))->get();
            response()->json($Products); //return to ajax
            return view('Customer.Products.filteredProducts', compact('Products'));
        } else if (isset($request->mainCategory)) {
            $mainCategory = $request->mainCategory;
            $Products = Product::translated()->whereIn('mcategory_id', explode(',', $mainCategory))->get();
            response()->json($Products); //return to ajax
            return view('Customer.Products.filteredProducts', compact('Products'));
        } else if (isset($request->SubCategory)) {
            $SubCategory = $request->SubCategory;
            $Products = Product::translated()->whereIn('subcategory_id', explode(',', $SubCategory))->get();
            response()->json($Products); //return to ajax
            return view('Customer.Products.filteredProducts', compact('Products'));
        } else if (isset($request->Size)) {
            $Size = $request->Size;
            $products_id = DB::table('color_size')->whereIn('size_id', explode(',', $Size))->pluck('product_id');
            $Products = Product::translated()->whereIN('id', explode(',', $products_id))->get();
            response()->json($Products); //return to ajax
            return view('Customer.Products.filteredProducts', compact('Products'));
        } else {
            $Products = Product::translated()->get(); // now we are fetching all products
            return view('User.Products.products', compact('Products'));
        }
    }
}
