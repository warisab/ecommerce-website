@extends('adminlayout')
@section('admin_content')
<style>
    .box-header{
        margin-left: 50px;
    }
    .box-content{
        margin-left: 100px;
    }
    </style>

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i>
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Add Product</a>
	</li>
	<p class="alert-success">
		<?php
		$message = Session::get('message');
		if ($message) {
			echo $message;
			Session::put('message', null);
		}

		?>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product </h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>

		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/updateproduct',$product_info->product_id) }}" method="post" enctype="multipart/form-data">
				@csrf
				<fieldset>

					<div class="control-group">
						 <label class="control-label" for="date01">Product Name</label>
						<div class="controls">
							<input type="text" class="input-type" id="date01" value="{{ $product_info->product_name }}" name="product_name" >
						</div>
					</div>

					<div class="control-group">


						<label class="control-label" for="selectError3">Product Catagory </label>


						<div class="controls">
							<select id="selectError3" name="category_id">
								<?php
								$all_publish_catagory = DB::table('categories')
									->get();


								foreach ($all_publish_catagory as $view_catagory) { ?>

									<option value="{{$view_catagory->category_id}}">{{$view_catagory->category_name}}</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">sub Catagory</label>


						<div class="controls">
							<select id="selectError3" name="subcategory_id">
								<?php
								$all_publish_subcatagory = DB::table('subcategories')

									->get();


								foreach ($all_publish_subcatagory as $view_subcatagory) { ?>

									<option value="{{$view_subcatagory->subcategory_id}}">{{$view_subcatagory->subcategory_name}}</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Brand Name</label>
						<div class="controls">
							<select id="selectError3" name="brand_id">
								<?php
                                $all_publish_brands = DB::table('brands')
                                    
									
									->get();

								foreach ($all_publish_brands as $view_brand ){ ?>
									<option value="{{$view_brand->brand_id}}">{{$view_brand->brand_name}}</option>
								<?php } ?>
							</select>
						</div>
					</div>


					<div class="control-group hidden-phone">Product short Description</label>
						<div class="controls">
                            <input type="text" name="product_short_description" value=" {{$product_info->product_short_description}}">

						</div>
					</div>

					<div class="control-group hidden-phone">
						<label class="control-label" for="textarea2">Product long Description</label>
						<div class="controls">
							<input type="text" name="product_long_description" value=" {{$product_info->product_long_description}}">
                               
                            
                            
                        </div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Price</label>
						<div class="controls">
                            <input type="text" class="input-type"  name="product_price"  id="date01" value="{{$product_info->product_price }}" required>
                            
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="fileInput">Image</label>
						<div class="controls">
							<input class="input-file uniform_on" name="product_image" value="{{$product_info->product_image }}" id="fileInput" type="file">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Size</label>
						<div class="controls">
							<input type="text" name="product_size" class="input-type" id="date01" value="{{$product_info->product_size }}" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="date01">Product Color</label>
						<div class="controls">
							<input type="text" name="product_color" class="input-type" id="date01" value="{{$product_info->product_color }}" required>
						</div>
					</div>

					

						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="reset" class="btn">Cancel</button>
						</div>
				</fieldset>
			</form>

		</div>
	</div>
	<!--/span-->

</div>
<!--/row-->
@endsection