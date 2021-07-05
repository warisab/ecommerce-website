@extends('layout')
@section('content')

<section id="cart_item">
    <p class="alert-success">
        <?php
           $message=Session()->get('message');
           if($message)
           {
               echo $message;
               Session()->put('message',null);
           }
           
        ?>
   <div class="container"> 
    <div class="register-req">
        
        <p>Please give your information to confrim your order</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
        <div class="row">
            
            <div class="col-sm-12 clearfix">
                <div class="bill-to">
                    <p>shipping Address</p>
                    <div class="form-one">
                        <form action="{{ url('/save-shipping-details') }}" method="POST">   
                            @csrf                         
                            <input type="text" name="shipping_email"  placeholder="Email*">
                            @if ($errors->has('shipping_email'))
                            <span class="text-danger">{{ $errors->first('shipping_email') }}</span>
                        @endif                          
                            <input type="text" name="shipping_first_name"  placeholder="First Name *">
                            @if ($errors->has('shipping_first_name'))
                            <span class="text-danger">{{ $errors->first('shipping_first_name') }}</span>
                        @endif 
                            
                        <input type="text" name="shipping_last_name"  placeholder="Last Name *">
                        @if ($errors->has('shipping_first_name'))
                        <span class="text-danger">{{ $errors->first('shipping_first_name') }}</span>
                    @endif    
                        <input type="text" name="shipping_phone"  placeholder="Phone *">
                        @if ($errors->has('shipping_phone'))
                        <span class="text-danger">{{ $errors->first('shipping_phone') }}</span>
                    @endif    
                        <input type="text" name="shipping_address"  placeholder="Address  *">
                        @if ($errors->has('shipping_address'))
                        <span class="text-danger">{{ $errors->first('shipping_address') }}</span>
                    @endif    
                        <input type="text" name="shipping_city"  placeholder="City*">
                        @if ($errors->has('shipping_city'))
                        <span class="text-danger">{{ $errors->first('shipping_city') }}</span>
                    @endif    
                        <input type="submit" class="btn btn-warning" value="Done">
                        </form>
                    </div>                   
                </div>
            </div>				
        </div>
    </div>
    <div class="review-payment">
        <h2>Review & Payment</h2>
    </div>
   </div>
</section>
@endsection