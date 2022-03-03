<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use App\Models\Mcategory;

class McategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MCtegories = Mcategory::translated()->get();
        $brands = Brand::translated()->get();
        return view('Admin.MainCategory.mainCategories', compact('MCtegories', 'brands'));
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
        $validator = Validator::make(
            $request->all(),
            [
                'category_name_ar'  => ['required|unique:mcategories|max:255'],
                'category_name_en'  => ['required|unique:mcategories|max:255'],
                'description_ar'    => ['required|string|min:10|max:255'],
                'description_en'    => ['required|string|min:10|max:255'],
                'photo_name'        => ['required|mimes:jpeg,png,jpg'],
                'brands'            => ['required|array']
            ],
            [
                'category_name_ar.required'    => 'Please enter the Main Category Name',
                'category_name_ar.unique'      => 'Main Category Name is already registered',
                'description_ar.required'      => 'Please enter the Main Category Description',
                'photo_name.mimes'             => 'Error, Logo must be in one of the required formats',
            ]
        );

        $image = $request->file('photo_name');
        $file_name = $image->getClientOriginalName();

        $data = [
            'photo_name'          => $file_name,
            'ar' => [
                'category_name'   => $request['category_name_ar'],
                'description'     => $request['description_ar'],
            ],
            'en' => [
                'category_name'   => $request['category_name_en'],
                'description'     => $request['description_en'],
            ],
        ];
        $mcategory = Mcategory::create($data);

        $mcategory->brands()->attach($request->brands);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->photo_name->getClientOriginalName();
        $request->photo_name->move(public_path('MainCategoriesLogos/' . $request['category_name_en']), $imageName);

        session()->flash('Add', 'تم إضافة التصنيف الرئيسي بنجاح');
        return redirect('/mcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mcategory  $mcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Mcategory $mcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mcategory  $mcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Mcategory $mcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mcategory  $mcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $validator = Validator::make(
            $request->all(),
            [
                'category_name_ar' => ['required|max:255|unique:mcategories,category_name,' . $id],
                'category_name_en' => ['required|max:255|unique:mcategories,category_name,' . $id],
                'description_ar'   => ['required|string|min:10|max:255'],
                'description_en'   => ['required|string|min:10|max:255'],
                'photo_name'       => ['required|mimes:jpeg,png,jpg'],
                'brands'           => ['required|array']
            ],
            [
                'category_name.required'    => 'Please enter the Main Category Name',
                'category_name.unique'      => 'Main Category Name is already registered',
                'description.required'      => 'Please enter the Main Category Description',
                'photo_name.mimes'          => 'Error, Logo must be in one of the required formats',
            ]
        );

        $image = $request->file('photo_name');
        $file_name = $image->getClientOriginalName();

        $data = [
            'photo_name'       => $file_name,
            'ar' => [
                'category_name' => $request['category_name_ar'],
                'description'  => $request['description_ar'],
            ],
            'en' => [
                'category_name' => $request['category_name_en'],
                'description'  => $request['description_en'],
            ],
        ];
        $mcategory = Mcategory::find($id);

        $mcategory->update($data);

        $mcategory->brands()->sync($request->brands);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->photo_name->getClientOriginalName();
        $request->photo_name->move(public_path('MainCategoriesLogos/' . $request['category_name_en']), $imageName);

        session()->flash('edit', 'تم تعديل التصنيف الرئيسي بنجاح');
        return redirect('/mcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mcategory  $mcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Mcategory::find($id)->delete();
        session()->flash('delete', 'تم حذف التصنيف الرئيسي بنجاح');
        return redirect('/mcategories');
    }
}
