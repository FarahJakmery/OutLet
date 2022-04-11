<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Branches = Branch::translated()->with('products')->get();
        return $this->apiResponse($Branches, 'OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($MainCategory_ID, $SubCategory_ID)
    {
        // $Branch = Branch::find($id);
        // $products = Product::where('branch_id', $id)->get();
        // $array = [
        //     'Branch' => $Branch,
        //     'products' => $products,
        // ];
        // $Branch = Branch::where('subcategory_id', $subcategory_id)->find($branchID);
        // $Branches = Branch::whereHas('subcategory', function (Builder $query) use ($MainCategory_ID) {
        //     $query->where('MainCategory_ID', $MainCategory_ID);
        // })->get();




        $SubCategory = Subcategory::where('mcategory_id', $MainCategory_ID)->with('branches.products')->find($SubCategory_ID);
        // $Branch = Branch::where('subcategory_id', $SubCategory_ID)->find($BranchID);
        if ($SubCategory) {
            return $this->apiResponse($SubCategory, 'OK', 200);
        }
        return $this->apiResponse($SubCategory, 'The Branch Not Found', 401);
    }
}
