<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Mcategory;
use Illuminate\Http\Request;

class McategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MCtegories = Mcategory::all();
        $brands = Brand::all();
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
        $request->validate(
            [
                'category_name'  => 'required|unique:mcategories|max:255',
                'description'    => 'required|string|min:10|max:255',
                'photo_name'     => 'required|mimes:jpeg,png,jpg',
                'brands'         => 'required|array'
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

        $mcategory = Mcategory::create([
            'category_name' => $request->category_name,
            'description'   => $request->description,
            'photo_name'    => $file_name
        ]);

        $mcategory->brands()->attach($request->brands);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->photo_name->getClientOriginalName();
        $request->photo_name->move(public_path('MainCategoriesLogos/' . $request->category_name), $imageName);

        session()->flash('Add', 'Main Category added successfully');
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
        $request->validate(
            [
                'category_name'  => 'required|max:255|unique:mcategories,category_name,' . $id,
                'description'    => 'required|string|min:10|max:255',
                'photo_name'     => 'required|mimes:jpeg,png,jpg',
                'brands'         => 'required|array'
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

        $mcategory = Mcategory::find($id);

        $mcategory->update([
            'category_name' => $request->category_name,
            'description'   => $request->description,
            'photo_name'    => $file_name
        ]);

        $mcategory->brands()->sync($request->brands);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->photo_name->getClientOriginalName();
        $request->photo_name->move(public_path('MainCategoriesLogos/' . $request->category_name), $imageName);

        session()->flash('edit', 'Main Category has been successfully modified');
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
        session()->flash('delete', 'Main category has been removed successfully');
        return redirect('/mcategories');
    }
}
