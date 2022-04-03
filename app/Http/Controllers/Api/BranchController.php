<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
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
        $Branches = Branch::translated()->with('subcategory')->get();
        return $this->apiResponse($Branches, 'OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Branch = Branch::find($id);
        $Subcategory = $Branch->subcategory()->get();
        $array = [
            'Branch' => $Branch,
            'Subcategory' => $Subcategory,
        ];
        if ($array) {
            return $this->apiResponse($array, 'OK', 200);
        }
        return $this->apiResponse($array, 'The Branch Not Found', 401);
    }
}
