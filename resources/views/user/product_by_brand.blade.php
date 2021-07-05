@extends('layout')
@section('content')


            @foreach( $product_by_brand as $view_product_by_brand)
            <section id='main_content'>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            @extends('category_left_sidebar')
                        </div>
                        <div class="col-sm-9 padding-right">
                            <div class="features_items"><!--features_items-->
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{url($view_product_by_brand->product_image)}}" style="height: 300px;" alt="" />
                                                    <h2>{{$view_product_by_brand->product_price}}Rs</h2>
                                                    <p>{{$view_product_by_brand->product_name}}</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                <div class="product-overlay">
                                                    <div class="overlay-content">
                                                        <h2>{{$view_product_by_brand->product_price}}Rs</h2>
                                                        <p>{{$view_product_by_brand->product_name}}</p>
                                                        <a href="{{ url('/view-product/' .$view_product_by_brand->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="{{ url('/view-product/' .$view_product_by_brand->product_id) }}"><i class="fa fa-plus-square"></i>View Product</a></li>
                                                <li><a href="#"><i class="fa fa-plus-square"></i>Brand Name</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>
    
                              @endforeach
                             </div>
                        
                            </div><!--features_items-->
                            
                          <!--/category-tab-->
                          
                            
                        
                    </div>
                                
                                </div>  
                        </div>
            
                    {{-- </div>
                </div> --}}
            {{-- <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{url($view_product_by_catagory->product_image)}}" style="height: 300px;" alt="" />
                                <h2>{{$view_product_by_catagory->product_price}}Rs</h2>
                                <p>{{$view_product_by_catagory->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{$view_product_by_catagory->product_price}}Rs</h2>
                                    <p>{{$view_product_by_catagory->product_name}}</p>
                                    <a href="{{ url('/view-product/' .$view_product_by_catagory->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="{{ url('/view-product/' .$view_product_by_catagory->product_id) }}"><i class="fa fa-plus-square"></i>View Product</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Brand Name</a></li>
                        </ul>
                    </div>
                </div>
            </div>
          @endforeach
         </div>
        </div><!--features_items-->
        
      <!--/category-tab-->
      
        
        
        
</div> --}}
</section>

@endsection