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
                    <h5 class="text-white mb-2">{{ $candidat->nom  }} {{ $candidat->prenom  }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- CANDIDATES PROFILE START -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-dark">Mes compétences: </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="border rounded p-4">
                  <div class="competence border-bottom mb-4">
                    <h4 class="text-dark">Laravel 6</h4>
                    <p class="text-muted">Libero venenatis faucibus ullam quis ante tiam sit amet orci eget eros faucibus tincidunt ed fringilla mauris sit amet nibh Donec sodales sagittis magna ed consequat leo eget bibendum sodales augue velit cursus nunc quis gravida magna mi libero usce vulputate eleifend sapien estibulum purus qua scelerisque ut mollis sed nonummy id metus ullam accumsan lorem Vivamus elementum semper enean vulputate eleifend tellus enean leo ligula porttitor.</p>

                  </div>
                  <div class="competence border-bottom mb-4">
                    <h4 class="text-dark">Laravel 6</h4>
                    <p class="text-muted">Libero venenatis faucibus ullam quis ante tiam sit amet orci eget eros faucibus tincidunt ed fringilla mauris sit amet nibh Donec sodales sagittis magna ed consequat leo eget bibendum sodales augue velit cursus nunc quis gravida magna mi libero usce vulputate eleifend sapien estibulum purus qua scelerisque ut mollis sed nonummy id metus ullam accumsan lorem Vivamus elementum semper enean vulputate eleifend tellus enean leo ligula porttitor.</p>

                  </div>
                  <div class="competence border-bottom mb-4">
                    <h4 class="text-dark">Laravel 6</h4>
                    <p class="text-muted">Libero venenatis faucibus ullam quis ante tiam sit amet orci eget eros faucibus tincidunt ed fringilla mauris sit amet nibh Donec sodales sagittis magna ed consequat leo eget bibendum sodales augue velit cursus nunc quis gravida magna mi libero usce vulputate eleifend sapien estibulum purus qua scelerisque ut mollis sed nonummy id metus ullam accumsan lorem Vivamus elementum semper enean vulputate eleifend tellus enean leo ligula porttitor.</p>

                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4 class="text-dark">Mes formation :</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6 mt-4 pt-5">
                <div class="border rounded candidates-profile-education text-center text-muted">
                    <div class="profile-education-icon border rounded-pill bg-white text-primary">
                        <i class="mdi mdi-36px mdi-school"></i>
                    </div>
                    <h6 class="text-uppercase f-17">Diplome</h6>
                    <p class="mb-0">Domaine</p>
                    <p class="pb-3 mb-0">Lieux</p>

                    <p class="pt-3 border-top mb-0">Date Debut: </p>
                    <p class="pb-3 mb-0">Date fin:</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 pt-5">
                <div class="border rounded candidates-profile-education text-center text-muted">
                    <div class="profile-education-icon border rounded-pill bg-white text-primary">
                        <i class="mdi mdi-36px mdi-school"></i>
                    </div>
                    <h6 class="text-uppercase f-17">Diplome</h6>
                    <p class="mb-0">Domaine</p>
                    <p class="pb-3 mb-0">Lieux</p>

                    <p class="pt-3 border-top mb-0">Date Debut: </p>
                    <p class="pb-3 mb-0">Date fin:</p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <h4 class="text-dark">Mes experiences :</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="job-list-desc candidates-profile-exp-desc">
                                <h5 class="f-19 mb-2 text-dark">intitulé</h5>
                                <p class="text-muted mb-0 f-16">Lieux</p>
                                <p class="text-muted mb-0 f-16">Date debut: - Date fin</p>
                                <p class="text-muted mb-0 mt-2 f-16 border-top">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3 mt-md-0 pt-3">
                <div class="border rounded job-list-box p-4">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="job-list-desc candidates-profile-exp-desc">
                                <h5 class="f-19 mb-2 text-dark">intitulé</h5>
                                <p class="text-muted mb-0 f-16">Lieux</p>
                                <p class="text-muted mb-0 f-16">Date debut: - Date fin</p>
                                <p class="text-muted mb-0 mt-2 f-16 border-top">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    </div>
</section>
<!-- CANDIDATES PROFILE END -->

@include('layouts.footer')

@endsection
