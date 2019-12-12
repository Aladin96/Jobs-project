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
                        <h4 class="text-uppercase title mb-4">offre Detail</h4>
                        <ul class="page-next d-inline-block mb-0">
                            <li><a href="index-2.html" class="text-uppercase font-weight-bold">accueil</a></li>
                            <li><a href="#" class="text-uppercase font-weight-bold">offres</a></li>
                            <li>
                                <span class="text-uppercase text-white font-weight-bold">offre Detail</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

@include('search.component')

    <!-- JOB DETAILS START -->
    <section class="section">
        <div class="container">

            <div class="row">
              @if($haveRight)
                <div class="col-12 mb-5">
                  <a href="{{url('offre/'.$offer->id.'/modifier')}}">
                    <button class="btn btn-light">Modififer <i class="far fa-edit"></i></button>
                  </a>
                  @if($offer->status == "Publiée")
                  <button class="btn btn-danger float-right">Desactiver <i class="far fa-eye-slash"></i></button>
                  @else
                  <button class="btn btn-primary float-right">Activer <i class="far fa-eye"></i></button>
                  @endif
                </div>
              @endif
                <div class="col-lg-8 col-md-7">
                    <div class="job-detail border rounded p-4">
                        <div class="job-detail-content">
                            <img src="{{ asset($offer->recruteur->logo) }}" alt="" class="img-fluid float-left mr-md-3 mr-2 mx-auto d-block">
                            <div class="job-detail-com-desc overflow-hidden d-block">
                                <h4 class="mb-2"><a href="#" class="text-dark">{{ $offer->intitule }}</a></h4>
                                <p class="text-muted mb-0"><i class="mdi mdi-link-variant mr-2"></i>{{$offer->recruteur->nom}}</p>
                                <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{$offer->lieu_de_travail}}</p>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-dark mt-4">Description :</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="job-detail border rounded mt-2 p-4">
                                <div class="job-detail-desc">
                                    <p class="text-muted mb-3">
                                      {{ $offer->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-dark mt-4">Compétences :</h5>
                        </div>
                    </div>
                    @php
                    $skills = explode (',' , $offer->competences);
                    @endphp
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="job-detail border rounded mt-2 p-4">
                                <div class="job-detail-desc">
                                  @foreach($skills as $skill)
                                    <div class="job-details-desc-item">
                                        <div class="float-left mr-3">
                                            <i class="mdi mdi-send text-primary"></i>
                                        </div>
                                        <p class="text-muted mb-2">{{ $skill }}</p>
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 mt-4 mt-sm-0">
                    <div class="job-detail border rounded p-4">
                        <h5 class="text-muted text-center pb-2"></i>Details</h5>

                        <div class="job-detail-location pt-4 border-top">
                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-bank text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">: {{ $offer->recruteur->nom }}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-email text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">: {{ $offer->recruteur->email }}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-web text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">: {{ $offer->recruteur->site_web }}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-cellphone-iphone text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">: {{ $offer->recruteur->tel }}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-currency-usd text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">: {{ $offer->remuneration.' DA/Mois' }}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-security text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">: {{ $offer->annee_experience.' Ans' }}</p>
                            </div>

                            <div class="job-details-desc-item">
                                <div class="float-left mr-2">
                                    <i class="mdi mdi-clock-outline text-muted"></i>
                                </div>
                                <p class="text-muted mb-2">: {{$offer->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    @if($haveRight)
                    <div class="job-detail border rounded mt-4 p-4">
                        <h5 class="text-muted text-center pb-2">Statistiques</h5>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fa fa-eye text-muted"></i>
                            </div>
                            <p class="text-muted mb-2"> Nombre de vues : {{ $offer->vues}}</p>
                        </div>

                        <div class="job-details-desc-item">
                            <div class="float-left mr-2">
                                <i class="fas fa-layer-group text-muted"></i>
                            </div>
                            <p class="text-muted mb-2"> Nombre de candidatures : 12</p>
                        </div>
                    </div>
                    @endif
                    @php
                      $candidat = $guest = false ;
                      if( Auth::guard('candidat')->check()) {
                        $candidat = true;
                        $id_candidat = Auth::guard('candidat')->id();
                        $cvs = App\Cv::All()->where('id_candidat' , $id_candidat) ;
                        $ifExist = App\Candidature::All()->where('id_offre' , $offer->id)->where('id_candidat' , $id_candidat);
                      }
                      elseif ( !Auth::guard('recruteur')->check())
                        $guest = true;
                    @endphp
                    <div class="job-detail border rounded mt-4">
                        <form class="directApply" action="../login/candidat" method="get" id="form">
                          @csrf
                          @if($guest)
                            <button type="submit" class="btn btn-primary btn-block">Candidater</button>
                          @elseif($candidat)
                            <input type="hidden" name="offer_id" value="{{$offer->id}}">
                            @if( !count($ifExist))
                            <button type="submit" class="btn btn-primary btn-block" name="{{count($cvs) > 1 ? 'choice' : 'direct'}}Apply">Candidater</button>
                            @else
                            <button name="unapply" class="btn btn-danger btn-block">Annuler la candidature</button>
                            @endif
                          @endif
                        </form>
                    </div>
                    @if($candidat && count($cvs) > 1)
                          <div class="apply-wrapper">
                            <form class="apply" action="{{url('/candidater')}}" method="post">
                              @csrf
                              <input type="hidden" name="offer" value="{{$offer->id}}">
                              <span class="text-muted">Candidater avec : </span>
                              <select class="form-control mb-4 mt-2" style="display:inline" name="choice">
                                <option value="0" selected>Profile</option>
                                @foreach($cvs as $cv)
                                  <option value="{{$cv->id}}">{{$cv->titre}}</option>
                                @endforeach
                              </select>
                              <button type="submit" name="button" class="btn btn-primary">Candidater</button>
                              <button class="btn btn-danger float-right">Annuler</button>
                            </form>
                          </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- JOB DETAILS END -->


@include('layouts.footer')

@endsection
