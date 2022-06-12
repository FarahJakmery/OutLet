<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        Review::create($request->all() + ['user_id' => auth()->id()]);
        return redirect()->route('products.show', $request->product_id);
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
