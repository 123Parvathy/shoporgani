<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['orders']=DB::table('orders')
        ->select('orders.*','orders_status.orders_status')
        ->leftJoin('orders_status','orders_status.id','=','orders.order_status')
        ->get();  
        return view('admin.order',$result);
    } 
    
    public function order_detail(Request $request,$id)
    {
        $result['orders_details']=
                  DB::table('orders_details')
                  ->select('orders.*','orders.coupon_code','orders.coupon_value','orders.total_amt','orders_details.price','orders_details.qty','products.name','products.image','orders_status.orders_status')
                  ->leftJoin('orders','orders.id','=','orders_details.orders_id')
                  ->leftJoin('products','products.id','=','orders_details.product_id')
                  ->leftJoin('orders_status','orders_status.id','=','orders.order_status')
                  ->where(['orders.id'=>$id])
                  ->get();

                $result['orders_status']=
            DB::table('orders_status')
            ->get();
        $result['payment_status']=['Pending','Success','Fail'];      
        return view('admin.order_detail',$result);
    } 

    public function update_payemnt_status(Request $request,$status,$id)
    {
        DB::table('orders')
        ->where(['id'=>$id])
        ->update(['payment_status'=>$status]);
        return redirect('/admin/order_detail/'.$id);
    } 

    public function update_order_status(Request $request,$status,$id)
    {
        DB::table('orders')
        ->where(['id'=>$id])
        ->update(['order_status'=>$status]);
        return redirect('/admin/order_detail/'.$id);
    } 

    public function update_track_detail(Request $request,$id)
    {
        $track_details=$request->post('track_details');
        DB::table('orders')
        ->where(['id'=>$id])
        ->update(['track_details'=>$track_details]);
        return redirect('/admin/order_detail/'.$id);
    } 
    
    
    
}
