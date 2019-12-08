@extends('layouts.header_footer')

@section('content_body')

@if(Auth::guard('candidat')->check())
  @include('layouts.navbar_candidat')

@elseif(Auth::guard('recruteur')->check())
  @include('layouts.navbar_recruteur')
@else
  @include('layouts.navbar_guest')
@endif


<!-- Start home -->
<section class="bg-half page-next-level">
  <div class="unlimited-alert">
    <div class="unlimited-box rounded">
      <span class="close-alert">X</span>
      <h4 class="text-center text-danger">alert !</h4>
      <p class="text-muted text-center">vous avez atteint le nombre maximale de favoris,
                              vous pouvez achetez l'offre illimité seulement a 20$.</p>
      <form action="{{route('pay')}}" method="post" class="text-center">
        @csrf
        <button class="btn btn-danger my-4" type="submit">Acheter</button>
      </form>
    </div>
  </div>
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h4 class="text-uppercase title mb-4">Candidates Listing</h4>
                    <ul class="page-next d-inline-block mb-0">
                        <li><a href="index-2.html" class="text-uppercase font-weight-bold">Home</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Pages</a></li>
                        <li><a href="#" class="text-uppercase font-weight-bold">Candidates</a></li>
                        <li>
                            <span class="text-uppercase text-white font-weight-bold">Candidates List</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

@include('search.component')

<!-- CANDIDATES LISTING START -->
<section class="section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="show-results">
                        <div class="float-left">
                            <h5 class="text-dark mb-0 pt-2">Showing  Results : {{$candidats->firstItem()}}-{{ $candidats->count() }} of {{$candidats->total()}}</h5>
                        </div>
                        <div class="sort-button text-center float-sm-right">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item mb-0 mr-3">
                                    <select class="nice-select" style="display: none;">
                                        <option data-display="Sort By">Nothing</option>
                                        <option value="1">Web Developer</option>
                                        <option value="2">PHP Developer</option>
                                        <option value="3">Web Designer</option>
                                    </select><div class="nice-select" tabindex="0"><span class="current">Sort By</span><ul class="list"><li data-value="Nothing" data-display="Sort By" class="option selected focus">Nothing</li><li data-value="1" class="option">Web Developer</li><li data-value="2" class="option">PHP Developer</li><li data-value="3" class="option">Web Designer</li></ul></div>
                                </li>

                                <li class="list-inline-item">
                                    <select class="nice-select" style="display: none;">
                                        <option data-display="Default">Nothing</option>
                                        <option value="1">Web Developer</option>
                                        <option value="2">PHP Developer</option>
                                        <option value="3">Web Designer</option>
                                    </select><div class="nice-select" tabindex="0"><span class="current">Default</span><ul class="list"><li data-value="Nothing" data-display="Default" class="option selected focus">Nothing</li><li data-value="1" class="option">Web Developer</li><li data-value="2" class="option">PHP Developer</li><li data-value="3" class="option">Web Designer</li></ul></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="candidates-listing-item">

                      @foreach( $candidats as $candidat )
                        @php
                         if(App\Http\Controllers\FavoriController::checkIfIsFavorite(Auth::guard('recruteur')->id(), $candidat->id))
                           $class="active";
                         else
                           $class="";

                        @endphp
                        <div class="border mt-4 rounded p-3">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="float-left mr-4">
                                        <img src="{{ $candidat->photo }}" alt="" class="d-block rounded" height="90">
                                    </div>
                                    <div class="candidates-list-desc overflow-hidden job-single-meta  pt-2">
                                        <h5 class="mb-2"><a href="{{ route('candidat', [ 'show' => $candidat->id ] ) }}" class="text-dark">{{ $candidat->nom . ' ' .  $candidat->prenom }}</a></h5>
                                        <ul class="list-unstyled">
                                            <li class="text-muted"><i class="mdi mdi-account mr-1"></i>{{ $candidat->tel }}</li>
                                            <li class="text-muted"><i class="mdi mdi-map-marker mr-1"></i>{{ $candidat->adresse }}</li>
                                            <li class="text-muted"><i class="mdi mdi-currency-usd mr-1"></i>{{ $candidat->date_de_naissance }}</li>
                                        </ul>
                                        <p class="text-muted mt-1 mb-0">Skills : HTML, CSS, JavaScript, Wordpress, PHP, jQueary.</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="candidates-list-fav-btn text-right">
                                      <form method="POST" action="{{url('/favoris')}}">
                                        @csrf
                                        <input type="hidden" name="candidat" value="{{$candidat->id}}">
                                      <button type="submit" class="btn">
                                        <div class="fav-icon">
                                            <i class="mdi mdi-heart {{$class}}" ></i>
                                        </div>
                                      </button>
                                      </form>
                                        <div class="candidates-listing-btn mt-4">
                                            <a href="{{ route('candidat', [ 'show' => $candidat->id ] ) }}" class="btn btn-primary-outline btn-sm">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <nav aria-label="Page navigation example">
                      {{ $candidats->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>
<!-- CANDIDATES LISTING END -->

@include('layouts.footer')


@endsection
