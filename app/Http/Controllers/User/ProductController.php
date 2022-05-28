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
        $date = new Carbon;
        $Products = Product::translated()->where('expiry_date', '>', $date)->with('reviews')->orderBy('avg_rating', 'desc')->orderBy('reviews_count', 'desc')->get();
        $Brands = Brand::all();
        $mainCategories = Mcategory::all();
        $SubCategories = Subcategory::all();
        $Sizes = Size::all();
        $Products = Product::all();
        return view('Customer.Products.products', compact('Products', 'Brands', 'mainCategories', 'SubCategories', 'Sizes'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('reviews')->find($id);
        $reviews = Review::all();
        $colors = Color::where('product_id', $id)->get();
        $images = ProductImage::where('product_id', $id)->get();
        return view('Customer.Products.show_product', compact('product', 'colors', 'images', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            return view('Customer.Products.products', compact('Products'));
        }
    }
}
