<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('page_title')</title>
    <link href="{{asset('front_assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet">   
    <link href="{{asset('front_assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/jquery.simpleLens.css')}}">    
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/nouislider.css')}}">
    <link id="switcher" href="{{asset('front_assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  
      
    <script>
    var PRODUCT_IMAGE="{{asset('storage/media/')}}";
    </script>

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>9400257158</p>
                </div>
                <!-- / cellphone -->
              </div>
               <!-- / header top left -->
               <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  
                  <li class="hidden-xs"><a href="{{url('/cart')}}">My Cart</a></li>
                  
                  @if(session()->has('FRONT_USER_LOGIN')!=null)
                  
                <li><a href="{{url('/order')}}">My Order</a></li>
                
                  <li><a href="{{url('/logout')}}">Logout</a></li>
                  @else
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif
                  

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{url('/')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>ORGANI<strong>SHOP</strong></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="javascript:void(0)"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
               @php
$getAddToCartTotalItem=getAddToCartTotalItem();
$totalCartItem=count($getAddToCartTotalItem);
$totalPrice=0;
               @endphp
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">CART</span>
                  <span class="aa-cart-notify">{{$totalCartItem}}</span>
                </a>
                <div class="aa-cartbox-summary">
                @if($totalCartItem>0)
                
                  <ul>
                    @foreach($getAddToCartTotalItem as $cartItem)
                    <?php
                    @$totalPrice=$totalPrice+($cartItem->qty*$cartItem->price)
                    ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{asset('storage/media/'.$cartItem->image)}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{$cartItem->name}}</a></h4>
                        <p>{{$cartItem->qty}} * Rs {{$cartItem->price}}</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>   
                    @endforeach                
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                      Rs {{$totalPrice}}
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{url('/cart')}}">Cart</a>
                
            @endif
            </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" id="search_str" placeholder="Search here">
                  <button type="button" onclick="funSearch()"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{url('/category/{id}')}}">Vegetables</a></li>
              <li><a href="{{url('/category/{id}')}}">Exotic Vegetables</a></li>
              <li><a href="{{url('/category/{id}')}}">Fresh Cuts</a></li>
              <li><a href="{{url('/category/{id}')}}">Nutrition Chargers</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  
  <!-- / menu -->
  <!-- Start slider -->
  
  @section('container')
  @show      
  
  
  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">Our Farmers</a></li>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    
                  </ul>
                </div>
              </div>

            
             
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p>Organishop,Kakkanad, Eranakulam</p>
                      <p><span class="fa fa-phone"></span>9400257158</p>
                      <p><span class="fa fa-envelope"></span>organishop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>

    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by Organishop.com</p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  @php
  if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd'])){
    $login_email=$_COOKIE['login_email'];
    $login_pwd=$_COOKIE['login_pwd'];
    $is_remember="checked='checked'";
  } else{
    $login_email='';
    $login_pwd='';
    $is_remember="";
  }   

  @endphp    
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div id="popup_login">
            <h4>LOGIN OR REGISTER</h4>
            <form class="aa-login-form" id="frmLogin">
              <label for="">Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="str_login_email" required value="{{$login_email}}">

              <label for="">Password<span>*</span></label>
              <input type="password" placeholder="Password" name="str_login_password" required value="{{$login_pwd}}">
              
              <button class="aa-browse-btn" type="submit" id="btnLogin">Login</button>
              <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme" name="rememberme" {{$is_remember}}> Remember me </label>

              <div id="login_msg"></div>

              <p class="aa-lost-password"><a href="javascript:void(0)" onclick="forgot_password()">Forgot password</a></p>
              
              <div class="aa-register-now">
                Don't have an account?<a href="{{url('registration')}}">Register now!</a>
              </div>
              @csrf
            </form>
          </div>
          <div id="popup_forgot" style="display:none;">
            <h4>FORGOT PASSWORD</h4>
            <form class="aa-login-form" id="frmForgot">
              <label for="">Email address<span>*</span></label>
              <input type="email" placeholder="Email" name="str_forgot_email" required>
              <button class="aa-browse-btn" type="submit" id="btnForgot">Submit</button>
              <br><br>
              <div id="forgot_msg"></div>
             
              <div class="aa-register-now">
                Login Form?<a href="javascript:void(0)" onclick="show_login_popup()">Login now!</a>
              </div>
              @csrf
            </form>
          </div>

        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>     

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{asset('front_assets/js/bootstrap.js')}}"></script>  
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <script src="{{asset('front_assets/js/sequence.js')}}"></script>
  <script src="{{asset('front_assets/js/sequence-theme.modern-slide-in.js')}}"></script>  
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleLens.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/slick.js')}}"></script>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6296e32a7b967b1179924459/1g4emep69';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  <script type="text/javascript" src="{{asset('front_assets/js/nouislider.js')}}"></script>
  <script src="{{asset('front_assets/js/custom.js')}}"></script> 
  </body>
</html>