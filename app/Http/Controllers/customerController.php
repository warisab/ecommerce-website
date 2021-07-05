<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\order;
use App\Models\shipping;
use App\Models\order_details;
use App\Models\orderss;
use App\Models\customersses;
use App\Models\order_det;
use App\Models\shippingss;
use DB;
use Cart;
class customerController extends Controller
{
    public function customer_orders($id){
        $all_order_info = orderss::join('customersses', 'ordersses.customer_id', '=', 'customersses.id')
        ->where('ordersses.customer_id', $id)
        ->select('ordersses.*', 'customersses.customer_name', 'customersses.id', 'ordersses.id')->paginate(5);
        return view('user.myaccount', ['all_order_info'=>$all_order_info]);
    }
    public function view_order($id){

      $view_order_info=orderss::
      join('customersses','ordersses.customer_id','=','customersses.id')
      ->join('order_dets','ordersses.id','=','order_dets.orders_id')
      ->where('order_dets.orders_id',$id)
      ->join('shippingsses','ordersses.shipping_id','=','shippingsses.id')
    //   
->select('ordersses.*','customersses.customer_name','customersses.phone_number','customersses.customer_email',
'ordersses.*','shippingsses.shipping_first_name','shippingsses.shipping_phone','shippingsses.shipping_address','shippingsses.shipping_email','shippingsses.shipping_city'
,'ordersses.*', 'order_dets.product_name', 'order_dets.product_price', 'order_dets.product_sales_quantity'
,'ordersses.*','ordersses.coupon')
->get();
        return view('user.customer_orders',['view_order_info'=> $view_order_info]);

    }
}
