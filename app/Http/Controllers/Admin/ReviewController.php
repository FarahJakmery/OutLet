<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with(['product', 'user'])->get();
        return view('Admin.Reviews.reviews', compact('reviews'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $review = Review::find($request->id);
        $review->delete();
        session()->flash('delete', 'تم حذف المراجعة بنجاح');
        return redirect('/reviews');
    }
}
