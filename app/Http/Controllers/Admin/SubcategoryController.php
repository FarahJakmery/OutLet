<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Mcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Subctegories = Subcategory::all();
        $MCategories = Mcategory::all();
        return view('Admin.SubCategory.SubCtegories', compact('Subctegories', 'MCategories'));
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
                'subcategory_name'  => 'required|unique:subcategories|max:255',
                'description'       => 'required|string|min:10|max:255',
                'photo_name'        => 'required|mimes:jpeg,png,jpg',
                'MCategories'       => 'required|array'
            ],
            [
                'subcategory_name.required' => 'Please enter the Subcategory Name',
                'subcategory_name.unique'   => 'Subcategory Name is already registered',
                'description.required'      => 'Please enter the Subcategory Description',
                'photo_name.mimes'          => 'Error, Logo must be in one of the required formats',
            ]
        );

        $image = $request->file('photo_name');
        $file_name = $image->getClientOriginalName();

        $Subcate = Subcategory::create([
            'subcategory_name' => $request->subcategory_name,
            'description'      => $request->description,
            'photo_name'       => $file_name
        ]);

        $Subcate->mcategories()->attach($request->MCategories);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->photo_name->getClientOriginalName();
        $request->photo_name->move(public_path('SubcategoriesLogos/' . $request->subcategory_name), $imageName);

        session()->flash('Add', 'Subcategory added successfully');
        return redirect('/subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $request->validate(
            [
                'subcategory_name'  => 'required|max:255|unique:subcategories,subcategory_name,' . $id,
                'description'       => 'required|string|min:10|max:255',
                'photo_name'        => 'required|mimes:jpeg,png,jpg',
                'MCategories'       => 'required|array'
            ],
            [
                'subcategory_name.required' => 'Please enter the Subcategory Name',
                'subcategory_name.unique'   => 'Subcategory Name is already registered',
                'description.required'      => 'Please enter the Subcategory Description',
                'photo_name.mimes'          => 'Error, Logo must be in one of the required formats',
            ]
        );

        $image = $request->file('photo_name');
        $file_name = $image->getClientOriginalName();

        $Subcate = Subcategory::find($id);

        $Subcate->update([
            'subcategory_name' => $request->subcategory_name,
            'description'      => $request->description,
            'photo_name'       => $file_name
        ]);

        $Subcate->mcategories()->sync($request->MCategories);

        // move logo
        // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
        $imageName = $request->photo_name->getClientOriginalName();
        $request->photo_name->move(public_path('SubcategoriesLogos/' . $request->subcategory_name), $imageName);

        session()->flash('edit', 'Subcategory has been successfully modified');
        return redirect('/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Subcategory::find($id)->delete();
        session()->flash('delete', 'Subcategory has been removed successfully');
        return redirect('/subcategories');
    }
}
