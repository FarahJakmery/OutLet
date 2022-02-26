<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view("Admin.Brands.brands", compact('brands'));
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
        $request->validate(
            [
                'brand_name'   => 'required|unique:brands|max:255',
                'description'  => 'required|string|min:10|max:255',
                'logo_name'    => 'required|mimes:jpeg,png,jpg'
            ],
            [
                'brand_name.required'  => 'Please enter the Brand Name',
                'brand_name.unique'    => 'Brand Name is already registered',
                'description.required' => 'Please enter the Brand Description',
                'logo_name.mimes'      => 'Error, Logo must be in one of the required formats'
            ]
        );

        $image = $request->file('logo_name');
        $file_name = $image->getClientOriginalName();

        Brand::create([
            'brand_name'  => $request->brand_name,
            'description' => $request->description,
            'logo_name'   => $file_name
        ]);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->logo_name->getClientOriginalName();
        $request->logo_name->move(public_path('BrandsLogos/' . $request->brand_name), $imageName);

        session()->flash('Add', 'Brand added successfully');
        return redirect('/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $request->validate(
            [
                'brand_name'   => 'required|max:255|unique:brands,brand_name,' . $id,
                'description'  => 'required|string|min:10|max:255',
                'logo_name'    => 'required|mimes:jpeg,png,jpg'
            ],
            [
                'brand_name.required'  => 'Please enter the Brand Name',
                'brand_name.unique'    => 'Brand Name is already registered',
                'description.required' => 'Please enter the Brand Description',
                'logo_name.mimes'      => 'Error, Logo must be in one of the required formats'
            ]
        );

        $image = $request->file('logo_name');
        $file_name = $image->getClientOriginalName();

        $brand = Brand::find($id);

        $brand->update([
            'brand_name'   => $request->brand_name,
            'description'  => $request->description,
            'logo_name'    => $file_name
        ]);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->logo_name->getClientOriginalName();
        $request->logo_name->move(public_path('BrandsLogos/' . $request->brand_name), $imageName);

        session()->flash('edit', 'Brand has been successfully modified');
        return redirect('/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Brand::find($id)->delete();
        session()->flash('delete', 'Brand has been removed successfully');
        return redirect('/brands');
    }
}
