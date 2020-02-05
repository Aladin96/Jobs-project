<!-- Navigation Bar-->
 <header id="topnav" class="defaultscroll scroll-active">
     <!-- Tagline STart -->
     <div class="tagline">
         <div class="container">
             <div class="float-left" style="margin-top: 12px;">
                 <div class="phone">
                     <i class="mdi mdi-phone-classic"></i> +1 800 123 45 67
                 </div>
                 <div class="email">
                     <a href="#">
                         <i class="mdi mdi-email"></i> Support@mail.com
                     </a>
                 </div>
             </div>
             <div class="float-right">
                       <div class="buy-button">
                           <a href="{{ url('login/candidat') }}" class="btn btn-primary"><i class="mdi mdi-cloud-upload"></i> Candidat </a>
                       </div><!--end login button-->
                       <div class="buy-button mr-2">
                         <span>Se connecter : </span>
                           <a href="{{ url('login/recruteur') }}" class="btn btn-primary"><i class="mdi mdi-cloud-upload"></i> Recruteur </a>
                       </div><!--end login button-->

             </div>
             <div class="clearfix"></div>
         </div>
     </div>
     <!-- Tagline End -->

     <!-- Menu Start -->
     <div class="container">
         <!-- Logo container-->
         <div>
             <a href="{{ url('/') }}" class="logo">
                 <img src="images/logo-light.png" alt="" class="logo-light" height="18" />
                 <img src="images/logo-dark.png" alt="" class="logo-dark" height="18" />
             </a>
         </div>


         <!-- End Logo container-->
         <div class="menu-extras">
             <div class="menu-item">
                 <!-- Mobile menu toggle-->
                 <a class="navbar-toggle">
                     <div class="lines">
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>
                 </a>
                 <!-- End mobile menu toggle-->
             </div>
         </div>

         <div id="navigation">
             <!-- Navigation Menu-->
             <ul class="navigation-menu">
                 <li><a href="{{ url('/') }}">Acceuil</a></li>
                 <li><a href="/offres">Offres d'emploi</a></li>

                 <li class="has-submenu">
                     <a href="javascript:void(0)">S'inscrire</a><span class="menu-arrow"></span>
                     <ul class="submenu">
                         <li><a href="{{ url('/register/candidat') }}">Candidat</a></li>
                         <li><a href="{{ url('/register/recruteur') }}">Recruteur</a></li>
                     </ul>
                 </li>
                 <li>
                     <a href="/stories">Stories</a>
                 </li>
             </ul><!--end navigation menu-->
         </div><!--end navigation-->
     </div><!--end container-->
     <!--end end-->
 </header><!--end header-->
 <!-- Navbar End -->
