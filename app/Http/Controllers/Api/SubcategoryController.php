<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Mcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SubcategoryController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Subcategories = Subcategory::translated()->with('branches')->get();
        return $this->apiResponse($Subcategories, 'OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mcategory_id, $subcategoryID)
    {
        $Subcategory = Subcategory::where('mcategory_id', $mcategory_id)->with('branches')->find($subcategoryID);

        if ($Subcategory) {
            return $this->apiResponse($Subcategory, 'OK', 200);
        }
        return $this->apiResponse($Subcategory, 'The Sub category Not Found', 401);
    }
}
