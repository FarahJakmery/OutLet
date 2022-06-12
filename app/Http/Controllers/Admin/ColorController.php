<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::translated()->get();
        $sizes = Size::all();
        $products = Product::get();
        return view('Admin.Colors.colors', compact('colors', 'sizes', 'products'));
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
                'name'        => ['required|unique:product_colors|max:255'],
                'color'       => ['required'],
            ],
            [
                'name.required'     => 'Please enter the Color Name',
                'name.unique'       => 'Color Name is already registered',
            ]
        );

        $data = [
            'color'       => $request['color'],
            'product_id'  => $request['product_id'],
            'size_name'   => $request['size_name'],
            'quantity'    => $request['quantity'],
            'material'    => $request['material'],
            'ar' => [
                'name'    => $request['name_ar'],
            ],
            'en' => [
                'name'    => $request['name_en'],
            ],
        ];

        $color = Color::create($data);

        // $color->sizes()->attach($request->sizes);
        $color->sizes()->attach(
            $request->sizes,
            [
                'product_id'  => $request['product_id'],
                'size_name'   => $request['size_name'],
                'quantity'    => $request['quantity'],
                'material'    => $request['material'],
            ]
        );


        session()->flash('Add', 'تم إضافة اللون بنجاح');
        return redirect('/colors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $id = $request->id;
        Validator::make(
            $request->all(),
            [
                'name'        => ['required|max:255|unique:product_colors,name,' . $id],
                'color'       => ['required'],
            ],
            [
                'name.required'     => 'Please enter the Color Name',
                'name.unique'       => 'Color Name is already registered',
            ]
        );

        $data = [
            'color'    => $request['color'],
            'ar' => [
                'name'    => $request['name_ar'],
            ],
            'en' => [
                'name'    => $request['name_en'],
            ],
        ];
        $color = Color::find($id);

        $color->update($data);
        session()->flash('edit', 'تم تعديل اللون بنجاح');
        return redirect('/colors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Color::find($id)->delete();
        session()->flash('delete', 'تم حذف اللون بنجاح');
        return redirect('/colors');
    }
}
