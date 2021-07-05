<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addproduct');
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
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_size']=$request->product_size;
        $data['product_price']=$request->product_price;
        $data['product_color']=$request->product_color;

        $image = $request->file('product_image');
        if($image)
        {
            $image_name      = str::random(20);
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'image/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);

            if($success)
            {
                $data['product_image']= $image_url;

                products::insert($data);
                session()->put('message', 'product added successfully');
                return redirect('/addproduct');
            }



        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        $all_product_info=products::
         join('categories','products.category_id','=','categories.category_id')
         ->join('subcategories','products.subcategory_id','=','subcategories.subcategory_id')
         ->join('brands','products.brand_id','=','brands.brand_id')
         ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
         ->get();

       return view('admin.allproducts',['all_product_info' =>$all_product_info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $product_info = products::where('product_id', $product_id)->first();
        return view ('admin.editproduct', ['product_info' => $product_info ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$product_id)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_size']=$request->product_size;
        $data['product_price']=$request->product_price;
        $data['product_color']=$request->product_color;

        $image = $request->file('product_image');

        if($image)
        {
            $image_name      = str::random(20);
            $ext             = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path     = 'image/';
            $image_url       = $upload_path . $image_full_name;
            $success         = $image->move($upload_path, $image_full_name);

            if($success)
            {
                $data['product_image']= $image_url;

                products::where('product_id', $product_id)->update($data);
                session()->put('message', 'product updated successfully');
                return view ('admin.dashboard', ['product_id', $product_id]);
                
            }

            


        }
        // products::where('product_id', $product_id)->update($data);
        //         session()->put('message', 'product updated successfully');
                // return view('admin.dashboard', ['product_id', $product_id]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        products::where('product_id', $product_id)->delete();
        return view('admin.dashboard');

    }
}
