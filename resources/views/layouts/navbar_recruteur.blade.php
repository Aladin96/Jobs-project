<?php
  $id = Auth::guard('recruteur')->id();
  $user = App\Recruteur::find($id)->nom;
 ?>

<header id="topnav" class="defaultscroll scroll-active">
    <!-- Tagline STart -->
    <div class="tagline">
        <div class="container">
            <div class="float-left">
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
                <ul class="topbar-list list-unstyled d-flex" style="margin: 11px 0px;">
                    <li class="list-inline-item"><a href="javascript:void(0);"><i class="mdi mdi-account mr-2"></i>{{ $user }}</a></li>
                </ul>
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
        <div class="buy-button">
            <a href="{{url('/offre/create')}}" class="btn btn-primary"><i class="mdi mdi-cloud-upload"></i> Déposer un offre</a>
        </div><!--end login button-->
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
                <li class="has-submenu">
                    <a href="javascript:void(0)">Mon profile</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ url('/recruteur/' . $id . '/edit' ) }}">Modifier Mon profile</a></li>
                        <li><a href="{{ url('/recruteur/' . $id) }}">Voir mon profile</a></li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="javascript:void(0)">Recherche</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="#">Recherche rapide</a></li>
                        <li><a href="#">Recherche avancée</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/candidats') }}">Les candidats</a></li>
                <li>
                    <a href="{{ url('/favoris') }}">Mes favoris</a>
                </li>
                <li>
                    <a href="{{url('/logout')}}">Déconnexion</a>
                </li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
    <!--end end-->
</header><!--end header-->
