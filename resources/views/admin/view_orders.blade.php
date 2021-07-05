@extends('adminlayout')
@section('admin_content')

		
            <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Order Details</a></li>
			</ul>

    <div id="docoment" class="row-fluid sortable">		
		    <div class="box span5" >
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
                    
                </div>
				
			
				<div class="box-content">					
					<table class="table" >
						<thead>
							<tr>
								<th>Customer Name</th>								
								<th>Customer Mobile Number</th>
								<th>Customer Email</th>								  								 	                                  														
							</tr>
						</thead>                       

	

						<tbody>    
							@foreach ($view_order_info as  $view_order)
	
                            @endforeach                        
								<tr>

									<td>{{$view_order->customer_name}}</td>
									<td>{{$view_order->phone_number}}</td>
									<td>{{$view_order->customer_email}}</td>								
								</tr>											
						</tbody>
					</table> 					                      					
				</div><!--/span-->					
			</div><!--/row-->	
			<div class="box span7" >
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Details</h2>
                    
                </div>					
				<div class="box-content">					
					<table class="table table-striped" >
						<thead>
							<tr>
								<th>Name</th>																  								 	                                  
								<th>Mobile Number</th>
								<th>Address</th>
								<th>city</th>
								<th>Email</th>
								
							</tr>
						</thead>                       

						<tbody>
							@foreach ($view_order_info as  $view_order_shipping)
	
                            @endforeach  
								<tr>
									<td>{{$view_order_shipping->shipping_first_name}}</td>
									<td>{{$view_order_shipping->shipping_phone}}</td>
									<td>{{$view_order_shipping->shipping_address}}</td>
									<td>{{$view_order_shipping->shipping_city}}</td>
									<td>{{$view_order_shipping->shipping_email}}</td>
								</tr>
																			
						</tbody>
					</table> 					                      					
				</div><!--/span-->					
			</div><!--/row-->	
			
       </div><!--/row-->


<div id="docoment" class="row-fluid sortable">		
	<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
				
			</div>					
			<div class="box-content">					
				</p>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						  <tr>
							  <th>Id</th>								
							  <th>Product Name</th>								  								 	                                  
							  <th>Product Price</th>
							  <th>Product Sales Quantity</th>
							  <th>Sub Total</th>
							 
							  
						  </tr>						  	  
					  </thead> 
					                        

					  <tbody>
						@foreach ($view_order_info as $view_order_product)
						
						<tr>
							<td>{{$view_order_product->orders_id}}</td>							
							<td>{{$view_order_product->product_name}}</td>
							<td>{{$view_order_product->product_price}}</td>
							<td>{{$view_order_product->product_sales_quantity}}</td>
							<td>{{$view_order_product->product_price*$view_order_product->product_sales_quantity}}</td>
							
							
						</tr>	
						@endforeach							
					  </tbody>
					 	
					 
					  <tfoot>
						<td colspan="4">Total</td>
						<td><strong>= {{$view_order->order_total}}</strong></td>
					  </tfoot>
					  <tfoot>
					
						<td colspan="4">coupon</td>
						<td>{{ $view_order->coupon }}</td>
					  </tfoot>
				  </table>            
				
			</div><!--/span-->	

			
	</div><!--/row-->			
</div><!--/row-->    


@endsection