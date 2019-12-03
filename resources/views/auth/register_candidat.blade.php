@extends('layouts.header_footer')

@section('content_body')

<div class="back-to-home rounded d-none d-sm-block">
            <a href="{{ url('/') }}" class="text-white rounded d-inline-block text-center"><i class="mdi mdi-home"></i></a>
</div>

<!-- Hero Start -->
<section class="p-4" style="background:url({{asset('assets/images/user.jpg')}}) center center;">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="login_page bg-white shadow rounded p-4">
                            <div class="text-center">
                                <h4 class="mb-4">Inscription Candidat</h4>
                                @if(session()->has("register-success"))
                                  <p class="alert alert-success">{{ session()->get('register-success') }}</p>
                                @endif
                            </div>
                            <form class="login-form" method="POST" action="{{ url('register/candidat') }}">
                              @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="@error('nom') is-invalid @enderror form-control" placeholder="First Name" name="nom" required="" value="{{ old('nom') }}">
                                            @error('nom')
                                              <div class="invalid-feedback">{{ $errors->first('nom') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Prénom <span class="text-danger">*</span></label>
                                            <input type="text" class="@error('prenom') is-invalid @enderror form-control" placeholder="Prénom" name="prenom" required="" value="{{ old('prenom') }}">
                                            @error('prenom')
                                              <div class="invalid-feedback">{{ $errors->first('prenom') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group app-label">
                                        <label>Civilité <span class="text-danger">*</span></label>
                                        <div class="form-button">
                                            <select class="form-control" style="" name="civilite">
                                                <option value="1">M</option>
                                                <option value="2">Mme</option>
                                                <option value="3">Mlle</option>
                                                <option value="4">Dr</option>
                                                <option value="5">Pr</option>

                                            </select>

                                        </div>
                                        @error('civilite')
                                          <div class="invalid-feedback" style="display:block">{{ $errors->first('civilite') }}</div>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Télephone <span class="text-danger">*</span></label>
                                            <input type="text" class="@error('tel') is-invalid @enderror form-control" placeholder="" name="tel" required="" value="{{ old('tel') }}">
                                            @error('tel')
                                              <div class="invalid-feedback">{{ $errors->first('tel') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Adresse <span class="text-danger">*</span></label>
                                            <input type="text" class="@error('adresse') is-invalid @enderror form-control" placeholder="adresse" name="adresse" required="" value="{{ old('adresse') }}">
                                            @error('adresse')
                                              <div class="invalid-feedback">{{ $errors->first('adresse') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Date de naissance <span class="text-danger">*</span></label>
                                            <input type="date" class="@error('date_de_naissance') is-invalid @enderror form-control" placeholder="" name="date_de_naissance" required="" value="{{ old('date_de_naissance') }}">
                                            @error('date_de_naissance')
                                              <div class="invalid-feedback">{{ $errors->first('date_de_naissance') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" class="@error('email') is-invalid @enderror form-control" placeholder="Email" name="email" required="" value="{{ old('email') }}">
                                            @error('email')
                                              <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" class="@error('password') is-invalid @enderror form-control" placeholder="Password" name="password" required="">
                                            @error('password')
                                              <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="@error('password') is-invalid @enderror form-control" placeholder="Confirm Password" required="" name="password_confirmation">
                                            @error('password')
                                              <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </div>
    </div>
</section><!--end section-->
<!-- Hero End -->

@endsection
