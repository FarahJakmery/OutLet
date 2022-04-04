<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Mcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class McategoryController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MCtegories = Mcategory::translated()->with('brands')->get();
        return $this->apiResponse($MCtegories, 'OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $subcategories = Mcategory::find($id)->SubCategories->get;
        // $subcategories = Subcategory::where('mcategory_id', $id)->get();

        if ($subcategories)
            return $this->apiResponse($subcategories, 'OK', 200);
        else
            return $this->apiResponse($subcategories, 'The Main category Not Found', 401);
    }
}