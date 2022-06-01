@extends('front/layout')
@section('page_title','Category')
@section('container')

  <!-- product category -->
<section id="aa-product-category">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
            <div class="aa-product-catg-content">
               <div class="aa-product-catg-head">
                  <div class="aa-product-catg-head-left">
                     <form action="" class="aa-sort-form">
                        <label for="">Sort by</label>
                        <select name="" onchange="sort_by()" id="sort_by_value">
                           <option value="" selected="Default">Default</option>
                           <option value="name">Name</option>
                           <option value="price-desc">Price -desc</option>
                           <option value="price=asc">Price -asc</option>
                        </select>
                     </form>
                   
                  </div>
                  <div class="aa-product-catg-head-right">
                     <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                     <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                  </div>
               </div>
               <div class="aa-product-catg-body">
                  <ul class="aa-product-catg">
                     <!-- start single product item -->
                     
                     @if(isset($product[0]))
                       @foreach($product as $productArr)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productArr->id)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                            <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr->id}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->id)}}">{{$productArr->name}}</a></h4>
                              <span class="aa-product-price">Rs {{$productArr->price}}</span><span class="aa-product-price"><del>Rs {{$productArr->mrp}}</del></span>
                            </figcaption>
                          </figure>                          
                        </li>  
                        @endforeach    
                        @else
                        <li>
                          <figure>
                            No data found
                          <figure>
                        <li>
                        @endif
                     
                  </ul>
                  <!-- quick view modal -->                  
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
            <aside class="aa-sidebar">
               <!-- single sidebar -->
               <div class="aa-sidebar-widget">
                  <h3>Category</h3>
                  <ul class="aa-catg-nav">
                     <li><a href="#">Vegetables</a></li>
                     <li><a href="">Exotic Vegetables</a></li>
                     <li><a href="">Fresh Cuts</a></li>
                     <li><a href="">Nutrition Chargers</a></li>
                  </ul>
               </div>
               
               <!-- single sidebar -->
              
            </aside>
         </div>
      </div>
   </div>
</section>
<!-- / product category -->

<input type="hidden" id="qty" value="1"/>
  <form id="frmAddToCart">
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form> 
  
  <input type="hidden" id="qty" value="1"/>
  <form id="categoryFilter">
    <input type="text" id="sort" name="sort"/>          
    @csrf
  </form> 
@endsection