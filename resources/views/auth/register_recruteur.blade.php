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
                                <h4 class="mb-4">Inscription Recruteur</h4>
                                @if(session()->has("register-success"))
                                  <p class="alert alert-success">{{ session()->get('register-success') }}</p>
                                @endif
                            </div>
                            <form class="login-form" method="POST" action="{{ url('register/recruteur') }}">
                              @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="First Name" name="nom" required="" value="{{ old('nom') }}">
                                            @error('nom')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('nom') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="type">
                                              <option value='1'>Public</option>
                                              <option value="2">Société</option>
                                            </select>
                                            @error('type')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('type') }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Télephone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="" name="tel" required="" value="{{ old('tel') }}">
                                            @error('tel')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('tel') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Site web <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="" name="site_web" required="" value="{{ old('site_web') }}">
                                            @error('site_web')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('site_web') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Adresse <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="adresse" name="adresse" required="" value="{{ old('email') }}">
                                            @error('adresse')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('adresse') }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" required="" value="{{ old('email') }}">
                                            @error('email')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('email') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                            @error('password')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('password') }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required="">
                                            @error('password')
                                              <div class="invalid-feedback" style="display:block">{{ $errors->first('password') }}</div>
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
