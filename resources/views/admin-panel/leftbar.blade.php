   <div class="vertical-menu">

       <div data-simplebar class="h-100">

           <!--- Sidemenu -->
           <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <ul class="metismenu list-unstyled" id="side-menu">
                   <li class="menu-title" key="t-menu">Menu</li>

                   <li>
                       <a href="{{ route('home') }}" class="waves-effect">
                           <i class="bx bx-home-circle"></i>
                           {{-- <span class="badge rounded-pill bg-info float-end">04</span> --}}
                           <span key="t-dashboards">Dashboard</span>
                       </a>
                   </li>

                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="bx bx-store"></i>
                           <span key="t-ecommerce">Restaurant</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="{{ route('add-category') }}" key="t-products">Add Category</a></li>
                           <li><a href="{{ route('subcat-list') }}" key="t-products">SubCategory List</a></li>
                           <li><a href="{{ route('add-product') }}" key="t-products">Add Product</a></li>
                           <li><a href="{{ route('product-listing') }}" key="t-products">Product Listing</a></li>
                           {{-- <li><a href="{{ route('demo-listing') }}" key="t-products">Demo</a></li> --}}
                       </ul>
                   </li>
                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="bx bxs-user-detail"></i>
                           <span key="t-contacts">Admins</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="{{ route('add-admin') }}" key="t-user-grid">Add Admin(s)</a></li>
                           <li><a href="{{ route('add-customer') }}" key="t-user-grid">Add Customer(s)</a></li>

                           {{-- <li><a href="contacts-profile.html" key="t-profile">Profile</a></li> --}}
                       </ul>
                   </li>

               </ul>
           </div>
           <!-- Sidebar -->
       </div>
   </div>
