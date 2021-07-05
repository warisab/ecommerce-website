@extends('layout')
@section('content')

<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $content=Cart::getContent();

             
                    
                // echo "<pre>";
                //     print_r($content) ;
                //     echo "</pre>";
                
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" >Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td class="a">Action</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                    @if(count($content) <= 0)
                    <div> Your cart is empty </div>
                @else
                    <?php foreach ($content as $view_content){ 
                        ?>
                        
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ $view_content->attributes->image }}" height="50px" width="50px" ></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $view_content->name }}</a></h4>
                            
                        </td>
                        <td class="cart_price">
                            <p>{{ $view_content->price }} tk</p>
                        </td>
                        
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                 {{-- <form action="{{ url('/update-cart') }}" method="post">  --}}
                                    {{-- @csrf                        --}}
                                <a class="cart_quantity_down" href="{{ url('update-cart-m/'.$view_content->id.'/'.$view_content->quantity) }}"> - </a> 
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $view_content->quantity }}" autocomplete="off" size="1">
                                <input type="hidden" name="id" value="{{ $view_content->id }}">           
                                <a class="cart_quantity_up" href="{{ url('update-cart-p/'.$view_content->id.'/'.$view_content->quantity) }}"> + </a>                             
                                 {{-- <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">  --}}

                          {{-- </form>  --}}
                            </div>
                        </td>
                       
                        <td class="cart_total">
                            <p class="cart_total_price">{{$view_content->getPriceSum()}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ url('/delete-to-cart/' . $view_content->id) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>

                <?php } ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        {{-- <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div> --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <form action="{{ url('/coupon')}}" method="get">
                            @csrf
                            <input name="code" placeholder="Enter Your Coupon">
                            <button class="btn">Apply</button>
                            <p class="alert-success">
                                <?php
                                   $message=Session()->get('message');
                                   if($message)
                                   {
                                       echo $message;
                                       Session()->put('message',null);
                                   }
                                   
                                ?>
                        </form>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{ Cart::getsubTotal() }}</span></li>
                        <li>Coupon <span>{{ session('value') }}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li name="total">Total <span>{{ Cart::getTotal() }}</span></li>

                    </ul>
             
                        <a class="btn btn-warning update" href="{{ url('/') }}">Back to Home</a>
                        <?php $customer_id=Session::get('customer_id') ?>
                        @if ($customer_id != null)
                        <a class="btn btn-warning check_out" href="{{ url('/checkout') }}">Check Out</a> 
                        @else
                        <a class="btn btn-warning check_out" href="{{ url('/login-checkout') }}">Check Out</a>
                        @endif 
                       @endif
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection