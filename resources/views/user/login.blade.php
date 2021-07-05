@extends('layout')
@section('content')

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-3 ">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="/customer-login" method="post">
                       @csrf
                        <input type="email" placeholder="Email Address" name="customer_email" required=""/>
                        <input type="password" placeholder="Enter Password" name="password" required=""/>
                        
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-5">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="{{ url('/customer-registration') }}" method="post">
                        @csrf
                        <input type="text" placeholder="Enter Full Name" name="customer_name" required=""/>
                        @if ($errors->has('customer_name'))
                            <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                        @endif 
                       
                        <input type="email" placeholder="Enter Email Address" name="customer_email" required=""/>
                        @if ($errors->has('customer_email'))
                        <span class="text-danger">{{ $errors->first('customer_email') }}</span>
                    @endif 
                        <input type="text" placeholder="Enter Phone Number" name="phone_number" required=""/>
                        @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                        @endif 
                        <input type="password" placeholder="Password" name="password" required=""/>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif 
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection