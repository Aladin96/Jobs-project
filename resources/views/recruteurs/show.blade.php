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
    <section class="bg-half page-next-level new-Pad">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <div class="text-sm-center">
                            <img src="{{ asset($recruteur->logo) }}" alt="" class="img-fluid mx-md-auto d-block img-center">
                            <h4 class="mt-3"><a href="#" class="text-white">{{ $recruteur->nom }}</a></h4>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-3">
                                    <p class="text-white mb-0"><i class="mdi mdi-map-marker mr-2 "></i>{{ $recruteur->adresse }}</p>
                                </li>

                                <li class="list-inline-item">
                                    <p class="text-success mb-0"><i class="mdi mdi-bookmark-check mdi-18px mr-2"></i>Verified</p>
                                </li>
                            </ul>

                            <ul class="list-inline mb-2">
                                <li class="list-inline-item mr-3 ">
                                    <p class="text-wwhite"><i class="mdi mdi-earth mr-2"></i>{{ $recruteur->site_web }}</p>
                                </li>

                                <li class="list-inline-item mr-3">
                                    <p class="text-white"><i class="mdi mdi-email mr-2"></i>{{ $recruteur->email }}</p>
                                </li>

                                <li class="list-inline-item">
                                    <p class="text-white"><i class="mdi mdi-cellphone-iphone mr-2"></i>{{ $recruteur->tel }}</p>
                                </li>
                                @if(Auth::guard('candidat')->check())
                                <li class="list-inline-item">
                                    <button class="btn btn-primary pl-5 pr-5">Spontaner</button>
                                </li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- EMPLOYERS DETAILS START -->
    <section class="section ">
        <div class="container">

            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="border-top border-bottom pt-4 pb-4">
                        <div class="row justify-content-sm-center">
                            <div class="col-lg-2 col-md-3 col-6">
                                <div class="text-sm-center m-14">
                                    <h5 class="text-dark mb-2">Employer</h5>
                                    <p class="text-muted mb-0">5540 +</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3 col-6">
                                <div class="text-sm-center m-14">
                                    <h5 class="text-dark mb-2">Type</h5>
                                    <p class="text-muted mb-0">Create Website</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3 col-6">
                                <div class="text-sm-center m-14">
                                    <h5 class="text-dark mb-2">Experience</h5>
                                    <p class="text-muted mb-0">4 Years + Exp.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3 col-6">
                                <div class="text-sm-center m-14">
                                    <h5 class="text-dark mb-2">Salary</h5>
                                    <p class="text-muted mb-0">$700 - $2000/month</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3 col-6">
                                <div class="text-sm-center m-14">
                                    <h5 class="text-dark mb-2">Followers</h5>
                                    <p class="text-muted mb-0">584230 +</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            @if(Auth::guard('recruteur')->id() == $recruteur->id)
              <div class="row border-bottom" id="{{$recruteur->id}}">
                <div class="col-6 p-0">
                  <p class="recruiter-switch text-center p-3 active">Mes offres</p>
                </div>
                <div class="col-6 p-0">
                  <p class="recruiter-switch text-center p-3">Statistiques</p>
                </div>
              </div>
            @endif


            <div class="row" id="active-section">
                <div class="col-lg-12 mt-4 pt-2">
                  @if( count($offers) )
                    <h4 class="mb-4">Offres de l'entreprise:</h4>
                    @foreach($offers as $offer)
                        <div class="job-list-box border rounded">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col-lg-2">
                                        <div class="company-logo-img">
                                            <img src="{{asset($offer->recruteur->logo)}}" style="height : 120px" class="img-fluid mx-auto d-block">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-9">
                                        <div class="job-list-desc">
                                            <h4 class="mb-2"><a href="{{url('offre/'.$offer->id)}}" class="text-dark">{{ $offer->intitule }}</a></h4>
                                            <p class="text-muted mb-2"><i class="mdi mdi-bank mr-2"></i>{{$offer->recruteur->nom}}</p>
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
                                                <a href="/offre/{{$offer->id}}" class="btn btn-sm btn-primary">Voir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                  @else
                  <h2 class="text-center text-muted m-5 p-5">Aucun offre n'est disponible</h2>
                  @endif
                </div>
        </div>
    </section>
    <!-- EMPLOYERS DETAILS END -->

    <!-- subscribe start -->
    <section class="section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="float-left position-relative notification-icon mr-2">
                        <i class="mdi mdi-bell-outline text-primary"></i>
                        <span class="badge badge-pill badge-danger">1</span>
                    </div>
                    <h5 class="mt-2 mb-0">Your Job Notification</h5>
                </div>
                <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                    <form>
                        <div class="form-group mb-0">
                            <div class="input-group mb-0">
                                <input name="email" id="email" type="email" class="form-control" placeholder="Your email :" required="" aria-describedby="newssubscribebtn">
                                <div class="input-group-append">
                                    <button class="btn btn-primary submitBnt" type="submit" id="newssubscribebtn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe end -->

@include('layouts.footer')

@endsection
