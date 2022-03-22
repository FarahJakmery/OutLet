<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\SaveImageTrait;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    use SaveImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::translated()->get();
        return view('Admin.Brands.brands', compact('brands'));
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
        Validator::make(
            $request->all(),
            [
                'brand_name_ar'       => ['required|unique:brands|max:255'],
                'brand_name_en'       => ['required|unique:brands|max:255'],
                'description_ar'      => ['required|string|min:10|max:255'],
                'description_en'      => ['required|string|min:10|max:255'],
                'logo_name'           => ['required|mimes:jpeg,png,jpg'],

            ],
            [
                'brand_name_ar.required'  => 'Please enter the Brand Name',
                'brand_name.unique'    => 'Brand Name is already registered',
                'description_ar.required' => 'Please enter the Brand Description',
                'logo_name.mimes'      => 'Error, Logo must be in one of the required formats'
            ]
        );

        // Store Image
        $image_name = $this->saveImage($request->file('logo_name'), 'images/Brand');

        $data = [
            'logo_name'        => $image_name,
            'ar' => [
                'brand_name'   => $request['brand_name_ar'],
                'description'  => $request['description_ar'],
            ],
            'en' => [
                'brand_name'   => $request['brand_name_en'],
                'description'  => $request['description_en'],
            ],
        ];

        Brand::create($data);

        session()->flash('Add', 'تم إضافة العلامة التجارية بنجاح');
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
        $brand = Brand::find($id);
        Validator::make(
            $request->all(),
            [
                'brand_name_ar'       => ['required|max:255|unique:brand_translations,brand_name_ar,' . $id],
                'brand_name_en'       => ['required|max:255|unique:brand_translations,brand_name_en,' . $id],
                'description_ar'      => ['required|string|min:10|max:255'],
                'description_en'      => ['required|string|min:10|max:255'],
                'logo_name'           => ['required|mimes:jpeg,png,jpg'],

            ],
            [
                'brand_name_ar.required'  => 'Please enter the Brand Name',
                'brand_name.unique'       => 'Brand Name is already registered',
                'description_ar.required' => 'Please enter the Brand Description',
                'logo_name.mimes'         => 'Error, Logo must be in one of the required formats'
            ]
        );

        // Update The Image
        if ($request->hasFile('logo_name')) {
            $destination = 'images/Brand/' . $brand->logo_name;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image_name = $this->saveImage($request->file('logo_name'), 'images/Brand');
        }

        $data = [
            'logo_name'        => $image_name,
            'ar' => [
                'brand_name'   => $request['brand_name_ar'],
                'description'  => $request['description_ar'],
            ],
            'en' => [
                'brand_name'   => $request['brand_name_en'],
                'description'  => $request['description_en'],
            ],
        ];

        $brand->update($data);

        session()->flash('edit', 'تم تعديل العلامة التجارية بنجاح');
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
        $brand = Brand::find($id);
        $destination = 'images/Brand/' . $brand->logo_name;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $brand->delete();
        session()->flash('delete', 'تم حذف العلامة التجارية بنجاح');
        return redirect('/brands');
    }
}
