@extends('front/layout')
@section('page_title','Order Placed Page')
@section('container')

  <!-- product category -->
  <section id="aa-product-category">
   <div class="container">
      <div class="row" style="text-align:center;">
        <br/><br/><br/>
            <h2>Your order has been placed</h2>
            <h2>Order Id:- {{session()->get('ORDER_ID')}}</h2>

            <br/>
            
        
      </div>
   </div>
   
</section>
@endsection