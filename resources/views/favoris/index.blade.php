
@extends('layouts.header_footer')

@section('content_body')
  @include('layouts.navbar_recruteur')

  <!-- Start home -->
  <section class="bg-half page-next-level">
      <div class="bg-overlay"></div>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <div class="text-center text-white">
                      <h4 class="text-uppercase title mb-4">Mes Favoris</h4>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- end home -->



  <!-- CANDIDATES LISTING START -->
  <section class="section pt-0">
          <div class="container">
              <div class="row">
                @if(session()->has('add-candidat'))
                  <div class="alert alert-success">{{session()->get('add-candidat')}}</div>
                @endif
                @if(session()->has('delete-candidat'))
                  <div class="alert alert-danger">{{session()->get('delete-candidat')}}</div>
                @endif
                  <div class="col-lg-12 col-md-12">
                      <div class="candidates-listing-item">

                        @forelse($recruteur->favoris()->paginate(5) as $fav)

                          <div class="border mt-4 rounded p-3">
                              <div class="row">
                                  <div class="col-md-9">
                                      <div class="float-left mr-4">
                                          <img src="{{ $fav->photo }}" alt="" class="d-block rounded" height="90">
                                      </div>
                                      <div class="candidates-list-desc overflow-hidden job-single-meta  pt-2">
                                          <h5 class="mb-2"><a href="{{ route('candidat', [ 'show' => $fav->id ] ) }}" class="text-dark">{{ $fav->nom . ' ' .  $fav->prenom }}</a></h5>
                                          <ul class="list-unstyled">
                                              <li class="text-muted"><i class="mdi mdi-account mr-1"></i>{{ $fav->tel }}</li>
                                              <li class="text-muted"><i class="mdi mdi-map-marker mr-1"></i>{{ $fav->adresse }}</li>
                                              <li class="text-muted"><i class="mdi mdi-currency-usd mr-1"></i>{{ $fav->date_de_naissance }}</li>
                                          </ul>
                                          <p class="text-muted mt-1 mb-0">Skills : HTML, CSS, JavaScript, Wordpress, PHP, jQueary.</p>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="candidates-list-fav-btn text-right">
                                        <form method="POST" action="{{url('/favoris')}}">
                                          @csrf
                                          <input type="hidden" name="candidat" value="{{$fav->id}}">
                                        <button type="submit" class="btn">
                                          <div class="fav-icon">
                                              <i class="mdi mdi-heart" style="-webkit-text-fill-color:#e43f52"></i>
                                          </div>
                                        </button>
                                        </form>
                                          <div class="candidates-listing-btn mt-4">
                                              <a href="{{ route('candidat', [ 'show' => $fav->id ] ) }}" class="btn btn-primary-outline btn-sm">View Profile</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @empty
                          <h2>No data</h2>
                          @endforelse

                      </div>

                      <nav aria-label="Page navigation example">
                        {{$recruteur->favoris()->paginate(5)->links()}}
                      </nav>-
                  </div>
              </div>
          </div>
      </section>
  <!-- CANDIDATES LISTING END -->

  @include('layouts.footer')
@endsection
