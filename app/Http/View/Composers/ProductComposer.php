<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\View\View;

class ProductComposer
{
    public function compose(View $view)
    {
        $products = Product::with('images:id,image_name,product_id')->get();
        $allProducts = [];
        foreach ($products as $product) {
            $product = Product::with('images:id,image_name,product_id')->find($product->id);

            $totalHoursDiff   = $this->Date_Time_Difference_In_Seconds($product) / 60 / 60;

            $decreasePrice = $this->Amount_Of_Price_Decrease($product, $totalHoursDiff);

            $seconds = $product->minutes * 60;

            $productInfo = array(
                'product'            => $product,
                'totalHoursDiff'     => $totalHoursDiff,
                'decreasePrice'      => $decreasePrice,
                'seconds'            => $seconds,
            );
            array_push($allProducts, $productInfo);
        }
        $view->with('allProducts', $allProducts);
    }

    public function Date_Time_Difference_In_Seconds($product)
    {
        $d1 = strtotime($product->product_date);
        $d2 = strtotime($product->expiry_date);
        $totalSecondsDiff = abs($d2 - $d1);
        return $totalSecondsDiff;
    }

    public function Amount_Of_Price_Decrease($product, $totalHoursDiff)
    {
        $minutes = $product->minutes;
        $hour = $minutes / 60;
        $TwoPriceDiff = (float)$product->max_price - (float)$product->min_price;
        $one_item = $TwoPriceDiff * $hour;
        $total_for_one_item = $one_item / $totalHoursDiff;
        return $total_for_one_item;
    }
}
