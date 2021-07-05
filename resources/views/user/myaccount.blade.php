@extends('layout')
@section('content')

<div id="docoment" class="row-fluid sortable">		
  <div class="box span12">
    <div class="box-header" data-original-title>
      <h2><i class="halflings-icon user"></i><span class="break"></span>My Orders</h2>
      
    </div>	
   			
    <div class="box-content">					
    </p>
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th>Name</th>
            <th>order Total</th>						                               
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>   
        {{-- @php
        $all_order_info = DB::table('orders')->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
    ->select('orders.*', 'customers.customer_name')->get();
    @endphp	 --}}
                   @foreach( $all_order_info as $view_order)

        <tbody>
        <tr>
          {{-- <td >{{$view_order->order_id}}</td> --}}
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


          
              <a href="{{url('/customer-order/'.$view_order->id)}}" type="button"  class="btn btn-block btn-primary btn-sm">View Order</a>  
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
<div style="margin-left: 400px"> 
{{ $all_order_info->links()}}	
</div>
@endsection