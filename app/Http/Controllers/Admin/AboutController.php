<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::translated()->get();
        return view('Admin.Pages.about', compact('abouts'));
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
                'text_ar'  => ['required'],
                'text_en'  => ['required'],
            ]
        );

        $data = [
            'ar' => [
                'text'    => $request['text_ar'],
            ],
            'en' => [
                'text'   => $request['text_en'],
            ],
        ];

        About::create($data);

        session()->flash('Add', 'تم إضافة عن كليكات بنجاح');
        return redirect('/admin/about');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'text_ar'  => ['required'],
                'text_en'  => ['required'],
            ]
        );

        $data = [
            'ar' => [
                'text'    => $request['text_ar'],
            ],
            'en' => [
                'text'   => $request['text_en'],
            ],
        ];

        $About = About::find($request->id);
        $About->update($data);

        session()->flash('Add', 'تم تعديل عن كليكات بنجاح');
        return redirect('/admin/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        About::find($request->id)->delete();
        session()->flash('delete', 'تم حذف عن كليكات بنجاح');
        return redirect('admin/about');
    }
}
