<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::translated()->get();
        return view('Admin.Pages.features', compact('features'));
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
                'feature1_ar'  => ['required'],
                'text1_ar'     => ['required'],
                'feature1_en'  => ['required'],
                'text1_en'     => ['required'],

                'feature2_ar'  => ['required'],
                'text2_ar'     => ['required'],
                'feature2_en'  => ['required'],
                'text2_en'     => ['required'],

                'feature3_ar'  => ['required'],
                'text3_ar'     => ['required'],
                'feature3_en'  => ['required'],
                'text3_en'     => ['required'],

                'feature4_ar'  => ['required'],
                'text4_ar'     => ['required'],
                'feature4_en'  => ['required'],
                'text4_en'     => ['required'],
            ]
        );

        $data = [
            'ar' => [
                'feature1' => $request['feature1_ar'],
                'text1'    => $request['text1_ar'],
                'feature2' => $request['feature2_ar'],
                'text2'    => $request['text2_ar'],
                'feature3' => $request['feature3_ar'],
                'text3'    => $request['text3_ar'],
                'feature4' => $request['feature4_ar'],
                'text4'    => $request['text4_ar'],
            ],
            'en' => [
                'feature1' => $request['feature1_en'],
                'text1'    => $request['text1_en'],
                'feature2' => $request['feature2_en'],
                'text2'    => $request['text2_en'],
                'feature3' => $request['feature3_en'],
                'text3'    => $request['text3_en'],
                'feature4' => $request['feature4_en'],
                'text4'    => $request['text4_en'],
            ],
        ];

        Feature::create($data);

        session()->flash('Add', 'تم إضافة مميزات عن كليكات بنجاح');
        return redirect('/admin/features');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'feature1_ar'  => ['required'],
                'text1_ar'     => ['required'],
                'feature1_en'  => ['required'],
                'text1_en'     => ['required'],

                'feature2_ar'  => ['required'],
                'text2_ar'     => ['required'],
                'feature2_en'  => ['required'],
                'text2_en'     => ['required'],

                'feature3_ar'  => ['required'],
                'text3_ar'     => ['required'],
                'feature3_en'  => ['required'],
                'text3_en'     => ['required'],

                'feature4_ar'  => ['required'],
                'text4_ar'     => ['required'],
                'feature4_en'  => ['required'],
                'text4_en'     => ['required'],
            ]
        );

        $data = [
            'ar' => [
                'feature1' => $request['feature1_ar'],
                'text1'    => $request['text1_ar'],
                'feature2' => $request['feature2_ar'],
                'text2'    => $request['text2_ar'],
                'feature3' => $request['feature3_ar'],
                'text3'    => $request['text3_ar'],
                'feature4' => $request['feature4_ar'],
                'text4'    => $request['text4_ar'],
            ],
            'en' => [
                'feature1' => $request['feature1_en'],
                'text1'    => $request['text1_en'],
                'feature2' => $request['feature2_en'],
                'text2'    => $request['text2_en'],
                'feature3' => $request['feature3_en'],
                'text3'    => $request['text3_en'],
                'feature4' => $request['feature4_en'],
                'text4'    => $request['text4_en'],
            ],
        ];
        $Feature = Feature::find($request->id);
        $Feature->update($data);

        session()->flash('Add', 'تم تعديل المميزات بنجاح');
        return redirect('/admin/features');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Feature::find($request->id)->delete();
        session()->flash('delete', 'تم حذف المميزات بنجاح');
        return redirect('admin/features');
    }
}
