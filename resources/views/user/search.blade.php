@extends('layout')
@section('content')

@php
     $all_products = App\Models\products::join('categories', 'products.category_id', '=' , 'categories.category_id')
    ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.subcategory_id')
    ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
    ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
    ->get();

@endphp
@foreach( $posts as $view_product)
<div class="col-sm-3">
    
    <div class="product-image-wrapper">
        <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{$view_product->product_image}}" style="height: 200px; width:200px;" alt="" />

                    <h2>{{$view_product->product_price}}Rs</h2>

                    <p>{{$view_product->product_name}}</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <a href="{{ url('/view-product/' .$view_product->product_id) }}">
                            <h2>{{$view_product->product_price}}Rs</h2>
                        </a>
                        <a href="{{ url('/view-product/' .$view_product->product_id) }}">
                            <p>{{$view_product->product_name}}</p>
                        </a>
                        <a href="{{ url('/view-product/' .$view_product->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="{{ url('/view-product/' .$view_product->product_id) }}"><i class="fa fa-plus-square"></i>View Product</a></li>
                <li><a href="#">{{$view_product->brand_name}}</a></li>
            </ul>
        </div>
    </div>
</div>
@endforeach
</div>

</div><!--features_items-->



</div>
<style>
.whatsapp-float{
    position: fixed;
    bottom: 40px;
    right: 20px;
}

</style>


<div class="whatsapp-float">
    <a href="https://wa.me/03340149751" target="_blank"><img src="{{ asset('image/whatsapp.png') }}" alt="" width="80px" class="whatsapp_float_btn">
    </a>
    </div>
@endsection