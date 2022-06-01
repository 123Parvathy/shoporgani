@extends('front/layout')
@section('page_title','Order Detail Page')
@section('container')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->         

  <section id="cart-view">
   <div class="container">
     <div class="row">
      <div class="col-md-6">
        <div class="order_detail">
        <h3>Details Address</h3>
             Parvathy({{$orders_details[0]->mobile}}) <br/>{{$orders_details[0]->address}}<br/>{{$orders_details[0]->city}}
             
          </div> 
          <b>Track Details</b><br/>
          {{$orders_details[0]->track_details}} 
      </div>
      <div class="col-md-6">
          <div class="order_detail">
            <h3>Order Details</h3>
             Order Status :{{$orders_details[0]->orders_status}}<br/>
             Payment Status: {{$orders_details[0]->payment_status}}<br/>
             Payment Type: {{$orders_details[0]->payment_type}}<br/>
             <?php
              if($orders_details[0]->payment_id!=''){
                  echo 'Payment ID: '.$orders_details[0]->payment_id;
              }
             ?>
             
          </div> 
      </div>
     

       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
             
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                     @php 
                     $totalAmt=0;
                     @endphp
                     @foreach($orders_details as $list)
                     @php 
                     $totalAmt=$totalAmt+($list->price*$list->qty);
                     @endphp
                     <tr>
                        <td>{{$list->name}}</td>
                        <td>{{$list->price}}</td>
                        <td>{{$list->qty}}</td>
                        <td>{{$list->price*$list->qty}}</td>
                      </tr>
                     @endforeach
                     <tr>
                        <td colspan="3">&nbsp;</td>
                        <td><b>Total</b></td>
                        <td><b>{{$totalAmt}}</b></td>
                      </tr>
                      <?php
                      if($orders_details[0]->coupon_value>0){
                        echo '<tr>
                          <td colspan="5">&nbsp;</td>
                          <td><b>Coupon <span class="coupon_apply_txt">('.$orders_details[0]->coupon_code.')</span></b></td>
                          <td>'.$orders_details[0]->coupon_value.'</td>
                        </tr>';
                        $totalAmt=$totalAmt-$orders_details[0]->coupon_value;
                        echo '<tr>
                          <td colspan="5">&nbsp;</td>
                          <td><b>Final Total</b></td>
                          <td>'.$totalAmt.'</td>
                        </tr>';
                      }
                      
                      
                      ?>
                    </tbody>
                  </table>
                </div>
             </form>
             <button onclick="window.print()" class="btn btn-primary">print </button>
             <!-- Cart Total view -->
           
		   </div>
         </div>
       </div>
     </div>
   </div>
 </section> 
@endsection