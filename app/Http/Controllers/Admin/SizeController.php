<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;


class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('Admin.Sizes.sizes', compact('sizes'));
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
                'size_name'        => 'required|unique:sizes|max:255',
            ],
            [
                'size_name.required'     => 'Please enter the Size Name',
                'size_name.unique'       => 'Size Name is already registered',
            ]
        );

        $size = Size::create([
            'size_name'    => $request->size_name,
        ]);

        session()->flash('Add', 'تم إضافة المقاس بنجاح');
        return redirect('/sizes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $request->validate(
            [
                'size_name'       => 'required|max:255|unique:sizes,size_name,' . $id,
            ],
            [
                'size_name.required'     => 'Please enter the Size Name',
            ]
        );
        $size = Size::find($id);
        $size->update([
            'size_name'    => $request->size_name,
        ]);

        session()->flash('edit', 'تم تعديل المقاس بنجاح');
        return redirect('/sizes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Size::find($id)->delete();
        session()->flash('delete', 'تم حذف المقاس بنجاح');
        return redirect('/sizes');
    }
}
