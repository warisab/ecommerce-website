<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\shipping;
use App\Models\order_details;
use App\Models\order;
use App\Models\customerss;
use App\Models\shippingss;
use Cart;
use DB;
// use Illuminate\facade\cache;
class checkout extends Controller
{
    public function index(){
        return view('user.login');
    }
    public function customer_registration(Request $request)
    {
        // $data=array();
        // $data['customer_name']=$request->customer_name;
        // $data['customer_email']=$request->customer_email;
        // $data['password']=$request->password;
        // $data['phone']=$request->phone_number;
        $validatedData = $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email|unique:customers,customer_email',
            'password' =>       'required|min:5',
            'phone_number' => 'required|numeric|unique:customers,phone_number',
        ]);

        $result = customerss::insertGetId($validatedData);
        

        session()->put('customer_id', $result);

        return redirect ('/show-cart');
    }

    public function checkout(){
        $cartCollection = Cart::getContent();

        if(!$cartCollection->count()){
            return view('user.addtocart');
        }
        else {
        return view('user.checkout');
        }
    }
      
    public function customer_login(Request $request){
        $customer_email=$request->customer_email;
        $password=$request->password;
         $result= customerss::where('customer_email', $customer_email)->where('password', $password)->first();
        if($result){
         session()->put('customer_id', $result->id);

      
        return redirect('/show-cart');
        }
        else{
            return redirect('/login-checkout');
        }
    }
    public function customer_logout()
    {
        Session()->flush();
        return redirect ('/');
    }
    public function shipping_details(Request $request){
        
        // $data=array();
        // $data['order_id']=null;
        // $data['shipping_email']=$request->shipping_email;
        // $data['shipping_first_name']=$request->shipping_first_name;
        // $data['shipping_last_name']=$request->shipping_last_name;
        // $data['shipping_phone']=$request->shipping_phone;
        // $data['shipping_address']=$request->shipping_address;
        // $data['shipping_city']=$request->shipping_city;
       
        $validatedData = $request->validate([
            'order_id' => '',
            'shipping_email' => 'required|email',
            'shipping_first_name' => 'required|string',
            'shipping_last_name' => 'required|string',
            'shipping_phone' => 'required|numeric',
            'shipping_address' => 'required',
            'shipping_city' => 'required',
            // 'password' => 'required|min:5',
            // 'email' => 'required|email|unique:users'
        ]);
        
        $shipping_id=shippingss::insertGetId($validatedData);
        
        session()->put('shipping_id', $shipping_id);


        return redirect ('/payment');
    
}
public function payment(){
    return view('user.payment');
}
}