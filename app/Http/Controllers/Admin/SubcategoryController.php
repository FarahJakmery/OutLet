<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mcategory;
use App\Models\Subcategory;
use Illuminate\Support\Facades\File;
use App\Http\Traits\SaveImageTrait;

class SubcategoryController extends Controller
{
    use SaveImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Subctegories = Subcategory::translated()->get();
        $MCategories = Mcategory::translated()->get();
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
        Validator::make(
            $request->all(),
            [
                'subcategory_name_ar'  => ['required|unique:subcategories|max:255'],
                'subcategory_name_en'  => ['required|unique:subcategories|max:255'],
                'description_ar'       => ['required|string|min:10|max:255'],
                'description_en'       => ['required|string|min:10|max:255'],
                'photo_name'           => ['required|mimes:jpeg,png,jpg'],
                'mcategory_id'         => ['required|exists:mcategories,id']
            ],
            [
                'subcategory_name.required' => 'Please enter the Subcategory Name',
                'subcategory_name.unique'   => 'Subcategory Name is already registered',
                'description.required'      => 'Please enter the Subcategory Description',
                'photo_name.mimes'          => 'Error, Logo must be in one of the required formats',
            ]
        );

        // Store Image
        $image_name = $this->saveImage($request->file('photo_name'), 'images/Sub_category');

        $data = [
            'photo_name'             => $image_name,
            'mcategory_id'           => $request->mcategory_id,
            'ar' => [
                'subcategory_name'   => $request['subcategory_name_ar'],
                'description'        => $request['description_ar'],
            ],
            'en' => [
                'subcategory_name'   => $request['subcategory_name_en'],
                'description'        => $request['description_en'],
            ],
        ];

        Subcategory::create($data);

        session()->flash('Add', 'تم إضافة التصنيف الثانوي بنجاح');
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
        $Subcate = Subcategory::find($id);
        Validator::make(
            $request->all(),
            [
                'subcategory_name_ar'  => ['required|max:255|unique:subcategories,subcategory_name,' . $id],
                'subcategory_name_en'  => ['required|max:255|unique:subcategories,subcategory_name,' . $id],
                'description_ar'       => ['required|string|min:10|max:255'],
                'description_en'       => ['required|string|min:10|max:255'],
                'photo_name'           => ['required|mimes:jpeg,png,jpg'],
                'mcategory_id'         => ['required|exists:mcategories,id']
            ],
            [
                'subcategory_name.required' => 'Please enter the Subcategory Name',
                'subcategory_name.unique'   => 'Subcategory Name is already registered',
                'description.required'      => 'Please enter the Subcategory Description',
                'photo_name.mimes'          => 'Error, Logo must be in one of the required formats',
            ]
        );

        // Update The Image
        if ($request->hasFile('photo_name')) {
            $destination = 'images/Sub_category/' . $Subcate->photo_name;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image_name = $this->saveImage($request->file('photo_name'), 'images/Sub_category');
        }

        $data = [
            'photo_name'             => $image_name,
            'mcategory_id'           => $request->mcategory_id,
            'ar' => [
                'subcategory_name'   => $request['subcategory_name_ar'],
                'description'        => $request['description_ar'],
            ],
            'en' => [
                'subcategory_name'   => $request['subcategory_name_en'],
                'description'        => $request['description_en'],
            ],
        ];

        $Subcate->update($data);

        session()->flash('edit', 'تم تعديل التصنيف الثانوي بنجاح');
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
        $subcate = Subcategory::find($id);
        $destination = 'images/Sub_category/' . $subcate->photo_name;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $subcate->delete();
        session()->flash('delete', 'تم حذف التصنيف الثانوي بنجاح');
        return redirect('/subcategories');
    }
}
