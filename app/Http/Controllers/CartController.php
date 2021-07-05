<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\coupon;
use App\Models\customer;
use App\Models\usedcoupon;
use Cart;
use DB; 

class CartController extends Controller
{
    public function add_to_cart(Request $request){
         $qty=$request->qty;
        $product_id = $request->product_id;
        $product_info = DB::table('products')->where('product_id', $product_id)->first();

        $data['quantity']=$qty;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['attributes']['image']=$product_info->product_image;

           Cart::add($data);
        return redirect ('/show-cart');
    }

    public function show_cart(){

            $all_category=category::all();
            return view('user.addtocart');
            
            
    }
    public function delete($id){
               \Cart::remove($id);
               return redirect('/show-cart');
    }
    public function update_cart_p(Request $request){
$id=$request->id;
\Cart::update($id, array('quantity'=> +1 ));
         return redirect('/show-cart');
    }
    public function update_cart_m(Request $request){
        $id=$request->id;
        \Cart::update($id, array('quantity'=> -1 ));
                 return redirect('/show-cart');
            }

            public function ApplyCoupon(){
                  $couponcode = request('code');
                  $coupondata = coupon:: where('code', $couponcode)->first();
                  session()->put('coupon_code', $couponcode);
 
                if(session()->has('customer_id'))
                {
                    if(!$coupondata){
                        session()->put('message', 'coupon is invalid');
                        return back();

                    }
                    $usedcoupon = DB::table('usedcoupons')->where('customer_id', session('customer_id'))
                    ->where('coupon_code', session('coupon_code'))->exists();

                    if($usedcoupon)
                    {
                    session()->put('message', 'already used coupon by you');
                    return back();
                    }
                    // if(session()->has('condition')){
                    //     session()->put('message', 'already used coupon y you');
                    //     return back();
                    // }
                    else{
                    $condition = new \Darryldecode\Cart\CartCondition(array(
                        'name' => $coupondata->name,
                        'type' => $coupondata->type,
                        'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                        'value' => $coupondata->value, 
                        
        
                     ));

                  
                     session()->put('value', $coupondata->value);
                    Cart::condition($condition);
                    // session()->put('coupon_id', $id);
                    session()->put('condition', $condition);
                   
                    usedcoupon::insert([
                        'customer_id'=>session('customer_id'),
                        'coupon_code'=>session('coupon_code')
                    ]);
                    session()->put('message', 'coupon added Successfully');
                   
                    return back();
                    }
                
                    }
                  else{
                      return view('user.login');
                  }

                   
                //   if(!$coupondata)
                //   {
                //       return back()->withMessage('Invalid Coupon Code');
                //   }else{
                //       return redirect ('/show-cart');
                //   }


              
                
                
                // Cart::session($customer_id)->condition($condition); // for a speicifc user's cart
            }
}



