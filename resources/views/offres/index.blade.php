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
      <div class="bg-overlay"></div>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <div class="text-center text-white">
                      <h4 class="text-uppercase title mb-4">offres</h4>
                      <ul class="page-next d-inline-block mb-0">
                          <li><a href="index-2.html" class="text-uppercase font-weight-bold">accueil</a></li>
                          <li><a href="#" class="text-uppercase font-weight-bold">offres</a></li>
                          <li>
                              <span class="text-uppercase text-white font-weight-bold">list des offres</span>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- end home -->

  @if(Auth::guard('recruteur')->check())
   @include('search.componentCandidat')
 @else
   @include('search.component')
 @endif

  <!-- JOB LIST START -->
  <section class="section pt-0">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-12">
                  <div class="section-title text-center mb-4 pb-2">
                      <h4 class="title title-line pb-5">Available job for you</h4>
                      <p class="text-muted para-desc mx-auto mb-1">Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-3">
                  <div class="left-sidebar">
                      <div class="accordion" id="accordionExample">
                          <div class="card rounded mt-4">
                              <a data-toggle="collapse" href="#collapseOne" class="job-list" aria-expanded="true" aria-controls="collapseOne">
                                  <div class="card-header" id="headingOne">
                                      <h6 class="mb-0 text-dark f-18">Date Posted</h6>
                                  </div>
                              </a>
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                                  <div class="card-body p-0">
                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted" for="customRadio1">Last Hour</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted" for="customRadio2">Last 24 hours</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted" for="customRadio3">Last 7 days</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted" for="customRadio4">Last 14 days</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted" for="customRadio5">Last 30 days</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- collapse one end -->
                          <div class="card rounded mt-4">
                              <a data-toggle="collapse" href="#collapsetwo" class="job-list" aria-expanded="true" aria-controls="collapsetwo">
                                  <div class="card-header" id="headingtwo">
                                      <h6 class="mb-0 text-dark f-18">Categories</h6>
                                  </div>
                              </a>
                              <div id="collapsetwo" class="collapse show" aria-labelledby="headingtwo">
                                  <div class="card-body p-0">
                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio7" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio7">Digital & Creative</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio8" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio8">Accountancy</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio9" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio9">Banking</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio10" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio10">IT Contractor</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio11" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio11">Graduate</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio12" name="customRadio1" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio12">Estate Agency</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- collapse one end -->
                          <div class="card rounded mt-4">
                              <a data-toggle="collapse" href="#collapsethree" class="job-list" aria-expanded="true" aria-controls="collapsethree">
                                  <div class="card-header" id="headingthree">
                                      <h6 class="mb-0 text-dark f-18">Experince</h6>
                                  </div>
                              </a>
                              <div id="collapsethree" class="collapse show" aria-labelledby="headingthree">
                                  <div class="card-body p-0">
                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio13" name="customRadio2" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio13">1Year to 2Year</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio14" name="customRadio2" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio14">2Year to 3Year</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio15" name="customRadio2" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio15">3Year to 4Year</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio16" name="customRadio2" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio16">IT Contractor</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- collapse one end -->
                          <div class="card rounded mt-4">
                              <a data-toggle="collapse" href="#collapsefour" class="job-list" aria-expanded="true" aria-controls="collapsefour">
                                  <div class="card-header" id="headingfour">
                                      <h6 class="mb-0 text-dark f-18">Gender</h6>
                                  </div>
                              </a>
                              <div id="collapsefour" class="collapse show" aria-labelledby="headingfour">
                                  <div class="card-body p-0">
                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio17" name="customRadio3" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio17">Male</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio18" name="customRadio3" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio18">Female</label>
                                      </div>

                                      <div class="custom-control custom-radio">
                                          <input type="radio" id="customRadio19" name="customRadio3" class="custom-control-input">
                                          <label class="custom-control-label ml-1 text-muted f-15" for="customRadio19">Others</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- collapse one end -->
                      </div>
                  </div>
              </div>
                <div class="col-lg-9 mt-4 pt-2">
                  <div class="row align-items-center">
                      <div class="col-lg-12">
                          <div class="show-results">
                              <div class="float-left">
                                  <h5 class="text-dark mb-0 pt-2 f-18">Showing results {{ $offers->perPage() }}-{{ $offers->total() }}</h5>
                              </div>

                              <div class="sort-button float-right d-flex">
                                <span class="text-muted mt-2 mr-3">Trier: </span>
                                  <form style="display:inline" method="get" action="/offres" class="filtrer">

                                    <select class="form-control" name="societe">
                                        <option data-display="Select" value="">Par societée</option>
                                        @foreach(App\Recruteur::has('offres')->get() as $company)
                                          <option value="{{ $company->id }}"> {{ $company->nom }} </option>
                                        @endforeach
                                    </select>

                                    <select class="form-control" name="domaine">
                                        <option data-display="Select" value="">Par domaine</option>
                                        @foreach(App\Offre::select('domaine')->distinct('domaine')->get() as $offre)
                                          <option value="{{ $offre->domaine }}"> {{ $offre->domaine }} </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i></button>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    @forelse($offers as $offer)
                      <div class="col-lg-12 mt-4 pt-2">
                          <div class="job-list-box border rounded">
                              <div class="p-3">
                                  <div class="row align-items-center">
                                      <div class="col-lg-2">
                                          <div class="company-logo-img">
                                              <img src="{{asset($offer->recruteur->logo)}}" alt="" class="img-fluid mx-auto d-block">
                                          </div>
                                      </div>
                                      <div class="col-lg-7 col-md-9">
                                          <div class="job-list-desc">
                                              <h6 class="mb-2"><a href="{{url('offre/'.$offer->id)}}" class="text-dark">{{ $offer->intitule }}</a></h6>
                                              <p class="text-muted mb-0"><i class="mdi mdi-bank mr-2"></i>{{$offer->recruteur->nom}}</p>
                                              <ul class="list-inline mb-0">
                                                  <li class="list-inline-item mr-3">
                                                      <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{ $offer->lieu_de_travail }}</p>
                                                  </li>

                                                  <li class="list-inline-item">
                                                      <p class="text-muted mb-0"><i class="fas fa-chalkboard-teacher"></i> Experience : {{ $offer->annee_experience }} Ans</p>
                                                  </li>

                                                  <li class="list-inline-item">
                                                      <p class="text-muted mb-0"><i class="mdi mdi-clock-outline mr-2"></i>{{ $offer->updated_at->diffForHumans() }}</p>
                                                  </li>

                                              </ul>
                                          </div>
                                      </div>
                                      <div class="col-lg-3 col-md-3">
                                          <div class="job-list-button-sm text-right">
                                              <span class="badge badge-success">Type : {{ $offer->type }}</span>

                                              <div class="mt-3">
                                                  <a href="#" class="btn btn-sm btn-primary">Candidater</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @empty
                      <div class="col-lg-12 mt-4 pt-2">
                        <h2 class="text-muted p-5 m-5 text-center">Pas d'offres actuellement</h2>
                      </div>
                    @endforelse

                      <div class="col-lg-12 mt-4 pt-2">
                        <nav aria-label="Page navigation example">
                          {!! $links !!}
                        </nav>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- JOB LIST START -->

@include('layouts.footer')

@endsection
