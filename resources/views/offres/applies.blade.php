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
                        <h4 class="text-uppercase title mb-4">Candidatures</h4>
                        <ul class="page-next d-inline-block mb-0">
                            <li><a href="index-2.html" class="text-uppercase font-weight-bold">accueil</a></li>
                            <li><a href="#" class="text-uppercase font-weight-bold">offre</a></li>
                            <li>
                                <span class="text-uppercase text-white font-weight-bold">Candidatures</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- JOB DETAILS START -->
    <section class="section">
        <div class="container">
            <div class="row">
              @if ( !count($applies) )
                <div class="col-12">
                  <h2 class="text-center text-muted m-5 p-5">Aucune candidatures</h2>
                </div>
              @else
              <div class="col-12">
                <h4 class="pb-4">Liste des candidatures :</h4>
              </div>
                <table class="table table-hover">
                    <thead class="thead-dark text-center">
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">Cv</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($applies as $apply)
                      <tr class="text-center">
                        <td>{{$apply->candidat->nom}}</td>
                        <td>{{$apply->candidat->prenom}}</td>
                        <td>{{$apply->candidat->date_de_naissance}}</td>
                        <td><a href="../candidat/{{$apply->candidat->id}}{{$apply->choix == 0 ? '': '/'.$apply->choix}}">Aperçu</a></td>
                      </tr>
                      @endforeach
                    </tbody>
              </table>
              @endif
            </div>
        </div>
    </section>
    <!-- JOB DETAILS END -->


@include('layouts.footer')

@endsection
