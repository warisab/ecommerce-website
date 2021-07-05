@section('catagory_left_sidebar')

<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <?php 
        $all_publish_catagory=App\Models\category::all();
        
        
        foreach($all_publish_catagory as $view_catagory) { 
            ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{ url('/product_by_category/' .$view_catagory->category_id) }}">{{$view_catagory->category_name}}</a></h4>
            </div>
        </div>

        <?php } ?> 
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
        <?php 
        $all_publish_brands=App\Models\brands::
                              all();

            foreach($all_publish_brands as $view_brand) { ?>	

            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ url('/product_by_brand/' .$view_brand->brand_id) }}"> <span class="pull-right"></span>{{$view_brand->brand_name}}</a></li>
                
            </ul>
            <?php } ?> 
        </div>
    </div><!--/brands_products-->
    
    
   

</div>

@endsection