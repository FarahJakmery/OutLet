<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $Products = Product::translated()->where('product_name', 'like', "%$request->q%");
        // ->orWhere('description', 'like', "%$request->q%");
        // ->orWhereHas('tags', function (Builder $query) use ($request) {
        //     $query->where('name', 'like', "%$request->q%");
        // })
        // ->paginate(10);

        // $tags = Tag::where('name', 'like', "%$request->q%")->paginate(10);

        return view('Customer.Products.search', compact('Products'));
    }
}
