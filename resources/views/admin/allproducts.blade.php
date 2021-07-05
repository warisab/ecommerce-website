@extends('adminlayout')
@section('admin_content')

		
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Product</a></li>
			</ul>
			<p class="alert-success">
					<?php
					   $message=Session::get('message');
					   if($message)
					   {
						   echo $message;
						   Session::put('message',null);
					   }
					   
					?>

			<div id="docoment" class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
						
					</div>					
					<div class="box-content">					
					</p>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th>Id</th>
								  <th>Product name</th>
								  <th>Product price</th>
								  <th>Product image</th>								  								 
								  <th>Catagory</th>
								  <th>SubCatagory</th>
                                  <th>Brand</th>
								  
								  <th>Action</th>
								  
							  </tr>
						  </thead>   

                         @foreach( $all_product_info as $view_product)

						  <tbody>
							<tr>
								<td >{{$view_product->product_id}}</td>
								<td class="center">{{$view_product->product_name}}</td>
								<td class="center">{{$view_product->product_price}}</td>
								<td ><img src="{{$view_product->product_image}}" style="height: 120px;width: 100px;">
								</td>
								<td class="center">{{$view_product->category_name}}</td>
								<td class="center">{{$view_product->subcategory_name}}</td>
                                <td class="center">{{$view_product->brand_name}}</td>                               						                              								
                                
							

								<td class="center">
								
                                    <a href="{{url('/editproduct', $view_product->product_id)}}" type="button"  class="btn btn-block btn-primary btn-sm">Update</a>
										<i class="halflings-icon white edit"></i>  
									</a>

                                    <a href="{{url('/deleteproduct', $view_product->product_id)}}" type="button"  class="btn btn-block btn-danger btn-sm">Delete</a>
									
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						
							
						  </tbody>

						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			</div><!--/row-->
    


@endsection