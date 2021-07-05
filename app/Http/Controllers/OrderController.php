<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\order;
use App\Models\shipping;
use App\Models\order_det;
use App\Models\orderss;
use App\Models\usedcoupon;
use App\Models\coupon;
use DB;
use Cart;

class OrderController extends Controller
{
    public function order_place(Request $request)
{

    $odata=array();
    $odata['customer_id']=session()->get('customer_id');
    $odata['shipping_id']=session()->get('shipping_id');
    $odata['payment_method']=$request->payment_method;
    $odata['order_total']=Cart::getTotal();
    $odata['order_status']=0;
    $odata['coupon']=null;
    $order_id=orderss::insertGetId($odata);

    session()->put('order_id', $order_id);
   
    // $cus=array();
    // $cus['customer_name']= session()->get('customer_name');
    // $cus['customer_email']= session()->get('customer_email');
    // $cus['phone_number']= session()->get('phone_number');
    // $cus['password'] = session()->get('password');
    // $cus['order_id'] = session()->get('order_id');

    // DB::table('customers')->insertGetid($cus);
    //       where('customer_id',$cus)
    //       ->insert($cus);
    $cus=array();
    $cus['id']=Session()->get('order_id');

    DB::table('ordersses')
          ->where('id',$cus)
          ->update(['coupon'=> session()->get('value')]);

        //   $ship=array();
        //   $ship['shipping_id']=Session()->get('shipping_id');
  
        //   DB::table('shippings')
        //         ->where('shipping_id',$ship)
        //         ->update(['order_id'=>$order_id]);


    $content=Cart::getContent();
    $od_data=array();

    // foreach ($content as $view_content) {
    //     order_det::insert([
    //         'orders_id' => $order_id, 
    //         'products_id' => $view_content->id,
    //         'product_name' => $view_content->name,
    //         'product_price' => $view_content->price,
    //         'product_sales_quantity' => $view_content->quantity,

    //     ]);
    
    foreach($content as $view_content)
    {
        $od_data['orders_id']=$order_id;
        $od_data['products_id']=$view_content->id;
        $od_data['product_name']=$view_content->name;
        $od_data['product_price']=$view_content->price;
        $od_data['product_sales_quantity']=$view_content->quantity;

        order_det::insertGetId($od_data);
    }
        Cart::clear();
        session()->forget('value');
        session()->forget('coupon_code');
        session()->flush('condition');
    return view('user.cash_on_delivery');


}
public function index(){
    $all_order_info = orderss::join('customersses', 'ordersses.customer_id', '=', 'customersses.id')
    ->select('ordersses.*', 'customersses.customer_name')->orderby('id')->paginate(10);
    return view ('admin.manage_orders', ['all_order_info'=>$all_order_info]);
  

        return view ('admin.manage_orders', ['all_order_info'=>$all_order_info]);

}
    public function view_order($id){
        // $view_order_info = orderss::with('order_det')->where('id', $id)->get();

        // $view_order_info=orderss::
        //       join('order_dets','ordersses.id','=','order_dets.orders_id')
        //     ->join('customersses','ordersses.customer_id','=','customersses.id')
        //     ->join('shippingsses','ordersses.shipping_id','=','shippingsses.id')
        //     ->where('order_dets.orders_id',$id)
        //  ->select('ordersses.*','customersses.customer_name','customersses.phone_number','customersses.customer_email',
        //   'ordersses.*','shippingsses.shipping_first_name','shippingsses.shipping_phone','shippingsses.shipping_address','shippingsses.shipping_email','shippingsses.shipping_city'
        //   ,)
        //   ->get();
$view_order_info = orderss::find($id)
->join('customersses','ordersses.customer_id','=','customersses.id')
->join('shippingsses','ordersses.shipping_id','=','shippingsses.id')
->join('order_dets','ordersses.id','=','order_dets.orders_id')
->where('order_dets.orders_id',$id)
->select('ordersses.*','customersses.customer_name','customersses.phone_number','customersses.customer_email',
'ordersses.*','shippingsses.shipping_first_name','shippingsses.shipping_phone','shippingsses.shipping_address','shippingsses.shipping_email','shippingsses.shipping_city'
,'ordersses.*', 'order_dets.orders_id','order_dets.product_name', 'order_dets.product_price', 'order_dets.product_sales_quantity'
,'ordersses.*', 'ordersses.coupon'
)->get();
return view('admin.view_orders',['view_order_info'=> $view_order_info]);

        // $view_order_info = orderss::with('products')->where('id', $id)->get();
        //     return view('admin.view_orders',['view_order_info'=> $view_order_info]);

    }
    // public function view_order($id){
    //     $view_order_info = orderss::find($id);
    //     $view_order_info->order_id;

    // }
    // public function view_order($order_id){

    //     $view_order_info=order::
    //     //    join('customers','orders.customer_id','=','customers.customer_id')
    //     //   ->where('customers.order_id',$order_id)
    //     //  join('order_details','orders.order_id','=','order_details.order_id')
    //     //   ->where('order_details.order_id',$order_id)
    //     // //   ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
    //     // //   ->where('shippings.order_id',$order_id)

    //     // ->select('orders.*','order_details.product_name', 'order_details.product_price','order_details.product_sales_quantity')
    //     // ->get();
    //     // ,'orders.*','shippings.shipping_first_name','shippings.shipping_phone','shippings.shipping_address','shippings.shipping_email','shippings.shipping_city'
    //     //   'orders.*','customers.customer_name','customers.phone_number','customers.customer_email',
    //     // ->join('order_details','orders.order_id','=','order_details.order_id')
    //     // ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
        
    //     // ->where('order_details.order_id',$order_id)
    //     // ->where('shippings.order_id',$order_id)
    //     // ->select('orders.*','customers.customer_name','customers.phone','customers.customer_email')
    //     // ->select('orders.*','shippings.shipping_first_name','shippings.shipping_phone','shippings.shipping_address','shippings.shipping_email','shippings.shipping_city')
    //     // ->get();

    //     return view('admin.view_orders',['view_order_info'=> $view_order_info]);

    // }
    public function delete_order($id)
    {
            orderss::
                where('id',$id)
                ->delete();

                orderss::where('order_id',$id)
                ->delete();

                orderss::where('id',$id)
                ->delete();    
                    return redirect ('/manage-order');

    
    }

    public function active_order($id)
    {
        orderss::where('id',$id)
            ->update(['order_status'=>1]);

            return redirect ('/manage-order');
            Session()->put('message','order active Successfully !! ');
      
       
    }
    public function unactive_order($id)
    {
        orderss::where('id',$id)
            ->update(['order_status'=>0]);

            return redirect ('/manage-order');
            Session()->put('message','order Unactive Successfully !! ');
      
       
    }


}
