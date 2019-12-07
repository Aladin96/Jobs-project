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
                <div class="candidates-profile-details text-center">
                    <img src="{{ asset($candidat->photo) }}" height="150" alt="" class="d-block mx-auto shadow rounded-pill mb-4">
                    <h5 class="text-white mb-2"><span class="badge badge-primary">{{ $candidat->civilite }}</span>  {{ $candidat->nom . ' ' .  $candidat->prenom }}</h5>
                    @if($isRecruiter)
                    @php
                     if(App\Http\Controllers\FavoriController::checkIfIsFavorite(Auth::guard('recruteur')->id(), $candidat->id))
                       $class="active";
                     else
                       $class="";
                    @endphp
                    <form method="POST" action="{{url('/favoris')}}">
                      @csrf
                      <input type="hidden" name="candidat" value="{{$candidat->id}}">
                    <button type="submit" class="btn">
                      <div class="fav-icon">
                          <i class="mdi mdi-heart {{ $class }}" ></i>
                      </div>
                    </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- CANDIDATES PROFILE START -->
<section class="section">

    <div class="container">

      @if( count($cv) == 0 )
      <div class="row">
          <div class="col-lg-12">
              <h2 class="text-center text-muted p-5">Pas de cv actuellement</h2>
          </div>
      </div>
      @elseif(count($cv) == 1)
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center text-muted p-4">{{ $cv[0]->titre }}
                  @if( $haveRight )
                  <div class="cv-panel float-right">
                    <a href="{{ url('modifier/cv/'.$cv[0]->id)}}"><i class="far fa-edit fa-xs text-primary" name="Modifier"></i></a>
                    <i class="far fa-trash-alt fa-xs text-danger" name="Supprimer"></i>
                  </div>
                  @endif
                </h2>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-dark">Mes compétences: </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="border rounded p-4">
                  @php
                  $all = App\Cv::with('competence')->find($cv[0]->id);
                  $competences = $all->competence;
                  @endphp
                  @foreach($competences as $competence)
                  <div class="competence border-bottom mb-4">
                    <h4 class="text-dark">{{ $competence->intitule }}</h4>
                    <p class="text-muted">{{ $competence->description }}</p>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4 class="text-dark">Mes formations :</h4>
            </div>
        </div>

        <div class="row">
          @php
          $all = App\Cv::with('formation')->find($cv[0]->id);
          $formations = $all->formation;
          @endphp
          @foreach ($formations as $formation)
            <div class="col-lg-4 col-md-6 mt-4 pt-5">
                <div class="border rounded candidates-profile-education text-center text-muted">
                    <div class="profile-education-icon border rounded-pill bg-white text-primary">
                        <i class="mdi mdi-36px mdi-school"></i>
                    </div>
                    <h6 class="text-uppercase f-17">{{$formation->diplome}}</h6>
                    <p class="mb-0">{{$formation->domaine}}</p>
                    <p class="pb-3 mb-0 text-primary">{{$formation->lieu}}</p>

                    <p class="pt-3 border-top mb-0">date debut : {{$formation->date_debut}} </p>
                    <p class="pb-3 mb-0">date fin : {{$formation->date_fin}}</p>
                </div>
            </div>
          @endforeach

        </div>

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4 class="text-dark">Mes experiences :</h4>
            </div>
        </div>

        <div class="row">
          @php
          $all = App\Cv::with('experience')->find($cv[0]->id);
          $experiences = $all->experience;
          @endphp
          @foreach($experiences as $experience)
          <div class="col-md-6 mt-3 mt-md-0 pt-3">
              <div class="border rounded job-list-box p-4">
                  <div class="row">
                      <div class="col-lg-12 text-center">
                          <div class="job-list-desc candidates-profile-exp-desc">
                              <h5 class="f-19 mb-2 text-dark">{{ $experience->intitule }}</h5>
                              <p class="text-muted mb-2 f-16">{{ $experience->lieu }}</p>
                              <p class="text-muted mb-0 f-16 pt-2 border-top">{{ $experience->date_debut }} - {{ $experience->date_fin }}</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach



        </div>
        @if($haveRight)
        <section class="delete">
          <span>X</span>
          <div class="border rounded">
            <h4>Etes vous sure de vouloir supprimez ce cv</h4>
            <div class="row">
              <div class="col-6 text-center">
                <form action="{{ url('supp_cv/'.$cv[0]->id)}}" method="post">
                  @csrf
                  {{ method_field('DELETE') }}
                  <input class="btn btn-danger" type="submit" value="Confirmer">
                </form>
              </div>
              <div class="col-6 text-center">
                <button type="button" class="btn btn-primary">Annuler</button>
              </div>
            </div>
          </div>
        </section>
        @endif
        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4 class="text-dark">Mon CV:</h4>
            </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <a href="#" class="btn btn-success btn-cv">Télecharge Mon CV </a>
          </div>
        </div>
        @else

        <div class="row">
              <div class="col-lg-12">
                  <h2 class="text-center text-muted p-4">Mes cvs : </h2>
              </div>
          @foreach($cv as $cv_actuel)<div class="col-lg-4 col-md-6 mt-4 pt-5">
              <div class="border rounded candidates-profile-education text-center text-muted">
                  <div class="profile-education-icon border rounded-pill bg-white text-primary">
                      <i class="fas fa-briefcase fa-lg"></i>
                  </div>
                  <h6 class="text-uppercase f-17"> <a href="{{ url('/candidat/'.$candidat->id.'/'.$cv_actuel->id) }}">{{ $cv_actuel->titre}}</a> </h6>
                  <p class="pt-3 border-top mb-0"> {{ $cv_actuel->created_at}} </p>
              </div>
          </div>
          @endforeach
        </div>
        @endif
    </div>

</section>
<!-- CANDIDATES PROFILE END -->

@include('layouts.footer')

@endsection
