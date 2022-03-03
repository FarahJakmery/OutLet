<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;
use App\Models\Subcategory;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Subcategories = Subcategory::translated()->get();
        $Branches = Branch::translated()->get();
        return view('Admin.Branches.branches', compact('Subcategories', 'Branches'));
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
                'branch_name_ar'      => ['required|unique:branches|max:255'],
                'branch_name_en'      => ['required|unique:branches|max:255'],
                'subcategory_id'      => ['required|exists:subcategories,id'],
            ],
            [
                'branch_name.required'  => 'Please enter the Branch Name',
                'branch_name.unique'    => 'Branch Name is already registered',
            ]
        );

        $data = [
            'subcategory_id'         => $request->subcategory_id,
            'ar' => ['branch_name'   => $request['branch_name_ar']],
            'en' => ['branch_name'   => $request['branch_name_en']],
        ];

        Branch::create($data);

        session()->flash('Add', 'تم إضافة الفرع بنجاح');
        return redirect('/branches');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;
        $validator = Validator::make(
            $request->all(),
            [
                'branch_name_ar'      => ['required|unique:branches|max:255'],
                'branch_name_en'      => ['required|unique:branches|max:255'],
                'subcategory_id'      => ['required|exists:subcategories,id'],
            ],
            [
                'branch_name.required'  => 'Please enter the Branch Name',
                'branch_name.unique'    => 'Branch Name is already registered',
            ]
        );

        $branch = Branch::find($id);

        $data = [
            'subcategory_id'         => $request->subcategory_id,
            'ar' => ['branch_name'   => $request['branch_name_ar']],
            'en' => ['branch_name'   => $request['branch_name_en']],
        ];

        $branch->update($data);

        session()->flash('Add', 'تم تعديل الفرع بنجاح');
        return redirect('/branches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Branch::find($id)->delete();
        session()->flash('delete', 'تم حذف الفرع بنجاح');
        return redirect('/branches');
    }
}
