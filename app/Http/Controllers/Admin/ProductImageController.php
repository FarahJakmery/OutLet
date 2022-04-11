<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [

            'image_name' => 'mimes:jpeg,png,jpg',

        ], [
            'image_name.mimes' => 'صيغة الصورة يجب أن تكون   pdf, jpeg , png , jpg',
        ]);

        $imageExtension = $request->file('image_name')->getClientOriginalExtension();
        $image_name =  md5(rand(1000, 100000)) .  '.' . $imageExtension;
        $image_name_DataBase = 'images/The_Product/' . md5(rand(1000, 100000)) .  '.' . $imageExtension;
        Image::make($request->file('image_name'))->save('images/The_Product/' . $image_name, 60);
        $ProductImage = new ProductImage();
        $ProductImage->product_id = $request->product_id;
        $ProductImage->product_number = $request->product_number;
        $ProductImage->image_name = $image_name_DataBase;
        $ProductImage->save();
        session()->flash('Add', 'تم إضافة الصورة بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        //
    }
}
