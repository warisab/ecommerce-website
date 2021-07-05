@extends('adminlayout')
@section('admin_content')

		
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Order details</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order details</h2>
						
					</div>					
					<div class="box-content">					
					</p>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                                  <th>Order_Id</th>
								  <th>Customer name</th>
								  <th>order Total</th>						                               
								  <th>Status</th>
								  <th>Action</th>
								  
							  </tr>
						  </thead>   

                         @foreach( $all_order_info as $view_order)

						  <tbody>
							<tr>
								<td >{{$view_order->id}}</td>
								<td class="center">{{$view_order->customer_name}}</td>
                                <td class="center">{{$view_order->order_total}}</td>
                               
								                              						                              								
                                
								<td class="center">
									@if($view_order->order_status==1)
									<span class="label label-success">Processing</span>
								
									@else
									<span class="label label-dager">Pending</span> 

									@endif
								</td>

								<td class="center">
								  @if($view_order->order_status==1)
									<a class="btn btn-danger" href="{{url('/unactive-order/'.$view_order->id)}}">
										<i class="fas fa-thumbs-down"></i>  
									</a>
                                 @else
								 <a class="btn btn-success" href="{{url('/active-order/'.$view_order->id)}}">
										<i class="fas fa-thumbs-up"></i>  
									</a>

								 @endif


								
										<a href="{{url('/view-order/'.$view_order->id)}}" type="button"  class="btn btn-block btn-primary btn-sm">View Order</a>  
									</a>

									
                                    <a href="{{url('/delete-order/'.$view_order->id)}}" type="button"  class="btn btn-block btn-danger btn-sm">Delete Order</a>

									</a>
								</td>
							</tr>
						
						
						  </tbody>

						  @endforeach
					  </table>    
					  <div style="margin-left: 400px">
						{{$all_order_info->links()}}   	  
					</div> 
					      
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			</div><!--/row-->
    


@endsection