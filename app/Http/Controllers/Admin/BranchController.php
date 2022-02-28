<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Mcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Subcategories = Subcategory::all();
        $Branches = Branch::all();
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
        $request->validate(
            [
                'branch_name'      => 'required|unique:branches|max:255',
                'subcategory_id'   => 'required|exists:subcategories,id',

            ],
            [
                'branch_name.required'  => 'Please enter the Branch Name',
                'branch_name.unique'    => 'Branch Name is already registered',
            ]
        );

        Branch::create([
            'branch_name'     => $request->branch_name,
            'subcategory_id'  => $request->subcategory_id,
        ]);

        session()->flash('Add', 'Branch added successfully');
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
        $request->validate(
            [
                'branch_name'      => 'required|max:255|unique:branches,branch_name,' . $id,
                'subcategory_id'   => 'required|exists:subcategories,id',

            ],
            [
                'branch_name.required'  => 'Please enter the Branch Name',
                'branch_name.unique'    => 'Branch Name is already registered',
            ]
        );

        $branch = Branch::find($id);

        $branch->update([
            'branch_name'     => $request->branch_name,
            'subcategory_id'  => $request->subcategory_id,
        ]);

        session()->flash('Add', 'Branch has been successfully modified');
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
        session()->flash('delete', 'Branch has been removed successfully');
        return redirect('/branches');
    }
}
