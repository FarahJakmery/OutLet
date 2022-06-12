<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brands = Brand::with('products')->get();

        return $this->apiResponse($Brands, 'OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Brand = Brand::with('products.images:id,image_name,product_id')->find($id);
        if ($Brand) {
            return $this->apiResponse($Brand, 'OK', 200);
        }
        return $this->apiResponse($Brand, 'The Brand Not Found', 401);
    }
}
