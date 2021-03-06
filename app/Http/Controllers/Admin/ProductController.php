<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Mcategory;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\SaveImageTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    use SaveImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::translated()->with('images')->get();
        $brands = Brand::translated()->get();
        $MCate = Mcategory::translated()->get();
        $SCate = Subcategory::translated()->get();
        $branches = Branch::translated()->get();
        return view('Admin.products.all_products', compact('products', 'brands', 'MCate', 'SCate', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::translated()->get();
        $MCates = Mcategory::translated()->get();
        $SCates = Subcategory::translated()->get();
        $branches = Branch::translated()->get();
        return view('Admin.products.add_product', compact('brands', 'MCates', 'SCates', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'product_number'             => ['required'],
                'product_name_ar'            => ['required'],
                'product_name_en'            => ['required'],
                'max_price'                  => ['required'],
                'min_price'                  => ['required'],
                'quantity'                   => ['required'],
                'return_option'              => ['required'],
                'description_ar'             => ['required'],
                'description_en'             => ['required'],
                'brand_id'                   => ['required'],
                'mcategory_id'               => ['required'],
                'subcategory_id'             => ['required'],
                'branch_id'                  => ['required'],
            ],
            [
                'product_name_ar.required'     => 'Please enter the Main Category Name',
                'product_name_ar.unique'       => 'Main Category Name is already registered',
                'description_ar.required'      => 'Please enter the Main Category Description',
                'photo_name.mimes'             => 'Error, Logo must be in one of the required formats',
            ]
        );

        $data = [
            'product_number'             => $request['product_number'],
            'product_date'               => $request['product_date'],
            'expiry_date'                => $request['expiry_date'],
            'min_price'                  => $request['min_price'],
            'max_price'                  => $request['max_price'],
            'minutes'                    => $request['minutes'],
            'quantity'                   => $request['quantity'],
            'return_option'              => $request['return_option'],
            'brand_id'                   => $request['brand_id'],
            'mcategory_id'               => $request['mcategory_id'],
            'subcategory_id'             => $request['subcategory_id'],
            'branch_id'                  => $request['branch_id'],
            'ar' => [
                'product_name'    => $request['product_name_ar'],
                'description'     => $request['description_ar'],
            ],
            'en' => [
                'product_name'    => $request['product_name_en'],
                'description'     => $request['description_en'],
            ],
        ];
        $product = Product::create($data);

        $images = array();
        $product_id = Product::latest()->first()->id;
        if ($Images = $request->file('images')) {
            // $this->validate(
            //     $request,
            //     [
            //         'images' => 'required|mimes:png,jpg,jpeg'
            //     ]
            // );
            foreach ($Images as $Image) {
                $imageExtension = $Image->getClientOriginalExtension();
                $image_name =  md5(rand(1000, 100000)) .  '.' . $imageExtension;
                $image_name_DataBase = 'images/The_Product/' . $image_name;
                Image::make($Image)->save('images/The_Product/' . $image_name, 60);
                $ProductImage = new ProductImage();
                $ProductImage->product_id = $product_id;
                $ProductImage->product_number = $request->product_number;
                $ProductImage->image_name = $image_name_DataBase;
                $ProductImage->save();
            }
        }

        session()->flash('Add', '???? ?????????? ???????????? ??????????');
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $colors = Color::where('product_id', $id)->get();
        $images = ProductImage::where('product_id', $id)->get();
        return view('Admin.products.show_product', compact('product', 'colors', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::translated()->get();
        $MCates = Mcategory::translated()->get();
        $SCates = Subcategory::translated()->get();
        $branches = Branch::translated()->get();
        return view('Admin.products.edit_product', compact('product', 'brands', 'MCates', 'SCates', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        Validator::make(
            $request->all(),
            [
                'product_number'             => ['required'],
                'product_name_ar'            => ['required'],
                'product_name_en'            => ['required'],
                'max_price'                  => ['required'],
                'min_price'                  => ['required'],
                'quantity'                   => ['required'],
                'return_option'              => ['required'],
                'description_ar'             => ['required'],
                'description_en'             => ['required'],
                'brand_id'                   => ['required'],
                'mcategory_id'               => ['required'],
                'subcategory_id'             => ['required'],
                'branch_id'                  => ['required'],
            ],
            [
                'product_name_ar.required'     => 'Please enter the Main Category Name',
                'product_name_ar.unique'       => 'Main Category Name is already registered',
                'description_ar.required'      => 'Please enter the Main Category Description',
                'photo_name.mimes'             => 'Error, Logo must be in one of the required formats',
            ]
        );

        $Images = $product->images()->pluck('image_name');
        foreach ($Images as $Image) {
            $destination = $Image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        // Update The Image
        if ($Images = $request->file('images')) {
            // $this->validate(
            //     $request,
            //     [
            //         'images' => 'required|mimes:png,jpg,jpeg'
            //     ]
            // );
            foreach ($Images as $Image) {
                $imageExtension = $Image->getClientOriginalExtension();
                $image_name =  md5(rand(1000, 100000)) .  '.' . $imageExtension;
                $image_name_DataBase = 'images/The_Product/' . md5(rand(1000, 100000)) .  '.' . $imageExtension;
                Image::make($Image)->save('images/The_Product/' . $image_name, 60);
                $ProductImage = new ProductImage();
                $ProductImage->product_id = $product->id;
                $ProductImage->product_number = $request->product_number;
                $ProductImage->image_name = $image_name_DataBase;
                $ProductImage->save();
            }
        }

        $data = [
            'product_number'             => $request['product_number'],
            'product_date'               => $request['product_date'],
            'expiry_date'                => $request['expiry_date'],
            'min_price'                  => $request['min_price'],
            'max_price'                  => $request['max_price'],
            'minutes'                    => $request['minutes'],
            'quantity'                   => $request['quantity'],
            'return_option'              => $request['return_option'],
            'brand_id'                   => $request['brand_id'],
            'mcategory_id'               => $request['mcategory_id'],
            'subcategory_id'             => $request['subcategory_id'],
            'branch_id'                  => $request['branch_id'],
            'ar' => [
                'product_name'    => $request['product_name_ar'],
                'description'     => $request['description_ar'],
            ],
            'en' => [
                'product_name'    => $request['product_name_en'],
                'description'     => $request['description_en'],
            ],
        ];

        $product->update($data);

        session()->flash('Add', '???? ?????????? ???????????? ??????????');
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $Images = $product->images()->pluck('image_name');
        foreach ($Images as $Image) {
            $destination = $Image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        $product->delete();
        session()->flash('delete', '???? ?????? ???????????? ??????????');
        return redirect('admin/products');
    }

    public function getMainCategories($id)
    {
        $Maincategories_id = DB::table('brand_mcategory')->where('brand_id', $id)->pluck('mcategory_id');
        $Maincategories_Names = DB::table('mcategory_translations')->whereIn('mcategory_id', $Maincategories_id)->where('locale', 'en')->pluck('category_name', 'id');
        return json_encode($Maincategories_Names);
    }

    public function destroy_image(Request $request)
    {
        $Image = ProductImage::findOrFail($request->id);
        $destination =  $Image->image_name;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $Image->delete();
        session()->flash('delete', '???? ?????? ???????????? ??????????');
        return back();
    }
}
