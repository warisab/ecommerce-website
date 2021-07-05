<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\category;

class HomeController extends Controller
{
    public function index(){
    // $all_products = products::join('categories', 'products.category_id', '=' , 'categories.category_id')
    // ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.subcategory_id')
    // ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
    // ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
    // ->get();

    // return view ('user.home', ['all_products'=>$all_products]);
    }

    public function product_by_category($category_id){
        $product_by_category = products::
                 join('categories', 'products.category_id', '=' , 'categories.category_id')
                 ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
                 ->select('products.*', 'brands.brand_name')
                ->select('products.*', 'categories.category_name')
                ->where('categories.category_id', $category_id)
                ->limit(100)
                ->get(); 

                return view('user.product_by_category',['product_by_category'=>$product_by_category]);
    }
    // public function top(category $category){
    //     $category = category::all();
    //     return view ('user.home', ['category'=>$category]);
    // }
    public function product_by_subcategory($subcategory_id){
        $product_by_subcategory = products::
                 join('categories', 'products.category_id', '=' , 'categories.category_id')
                 ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.subcategory_id')
                 ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
                 ->select('products.*', 'brands.brand_name')
                 ->select('product.*', 'subcategories.subcategory_name')
                ->select('products.*', 'categories.category_name')
                ->where('subcategories.subcategory_id', $subcategory_id)
                ->limit(100)
                ->get(); 

                return view('user.product_by_subcategory',['product_by_subcategory'=>$product_by_subcategory]);
    }
    public function product_by_brand($brand_id){
        $product_by_brand = products::
                 join('categories', 'products.category_id', '=' , 'categories.category_id')
                 ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.subcategory_id')
                 ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
                 ->select('products.*', 'brands.brand_name')
                 ->select('product.*', 'subcategories.subcategory_name')
                ->select('products.*', 'categories.category_name')
                ->where('brands.brand_id', $brand_id)
                ->limit(100)
                ->get();

                return view('user.product_by_brand',['product_by_brand'=>$product_by_brand]);
    }
    public function product_detail($product_id){
        $product_detail= products::
                 join('categories', 'products.category_id', '=' , 'categories.category_id')
                 ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.subcategory_id')
                 ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
                 ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name','brands.brand_name')
                ->where('products.product_id', $product_id)
               
                ->first(); 

                return view('user.product_detail',['product_detail'=>$product_detail]);
    }
}
