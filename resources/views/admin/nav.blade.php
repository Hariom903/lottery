 <nav class="pc-sidebar">
     <div class="navbar-wrapper">
         <div class="m-header">
             <a href="{{ url('admin/dashboard') }}" class="b-brand text-primary">
                 <!-- ========   Change your logo from here   ============ -->
                 <img src="{{ asset('images/logo-white.svg') }}" alt="logo image" class="logo-lg" />
             </a>
         </div>

         <div class="navbar-content">
             <ul class="pc-navbar">
                 <li class="pc-item pc-caption">
                     <label>Navigation</label>
                 </li>
                 <li class="pc-item">
                     <a href="{{ url('admin/dashboard') }}" class="pc-link"><span class="pc-micon"> <i
                                 class="ph ph-gauge"></i></span><span class="pc-mtext">Dashboard</span></a>
                 </li>

                 <li class="pc-item pc-caption">
                     <label>UI Components</label>
                     <i class="ph ph-compass-tool"></i>
                 </li>
                 <li class="pc-item">
                     <a href="#" class="pc-link">
                         <span class="pc-micon"><i class="ph ph-text-aa"></i></span>
                         <span class="pc-mtext">Typography</span>
                     </a>
                 </li>
                 <li class="pc-item">

                     <a href="{{ url('admin/lottery') }}" class="pc-link">
                         <span class="pc-micon"> <i class="ph ph-ticket"> </i></span>
                         <span class="pc-mtext"> Add Lottery </span>
                     </a>

                 </li>
                 <li class="pc-item">
                     <a href="{{ route('price.add') }}" class="pc-link">
                         <span class="pc-micon"><i class="ph ph-currency-inr"></i></span>
                         <span class="pc-mtext"> Add price </span>
                     </a>
                 </li>
                 <li class="pc-item">
                     <a href="{{ route('carouselr.add') }}" class="pc-link">
                         <span class="pc-micon"><i class="ph ph-slideshow"></i></span>
                         <span class="pc-mtext"> Carousel </span>
                     </a>
                 </li>
                 <li class="pc-item">
                     <a href="{{route("addcouponcode")}}" class="pc-link">
                         <span class="pc-micon"><i class="ph ph-diamonds-four"></i></span>
                         <span class="pc-mtext"> Add Coupon  </span>
                     </a>
                 </li>

                 <li class="pc-item">
                     <a href="#" class="pc-link">
                         <span class="pc-micon"><i class="ph ph-flower-lotus"></i></span>
                         <span class="pc-mtext">Icons</span>
                     </a>
                 </li>

                 <li class="pc-item pc-caption">
                     <label>Pages</label>
                     <i class="ph ph-devices"></i>
                 </li>

                 <li class="pc-item pc-caption">
                     <label>Other</label>
                     <i class="ph ph-suitcase"></i>
                 </li>


             </ul>

         </div>
     </div>
 </nav>

