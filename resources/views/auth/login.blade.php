@extends('layouts.header_footer')

@section('content_body')

<!-- Hero Start -->
<section class="vh-100" style="background: url('images/user.jpg') center center;">

    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="login-page bg-white shadow rounded p-4">
                            <div class="text-center">
                                <h4 class="mb-4">Login</h4>
                            </div>
                            
                            @isset($url)
                            <form class="login-form" method="POST" action="{{ url("/login/$url") }}">
                            @else
                            <form class="login-form" method="POST" action="{{ url('/login') }}">
                            @endisset
                              @csrf
                                <div class="row">
                                  @if(Session::has('error'))
                                    <div class="col-lg-12">
                                      <div class="alert alert-warning">
                                        {!! session()->get('error') !!}
                                      </div>
                                   @endif
                                  </div>
                                    <div class="col-lg-12">
                                        <div class="form-group position-relative">
                                            <label>Your Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert" style="display:block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group position-relative">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert" style="display:block">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <p class="float-right forgot-pass"><a href="recovery_passward.html" class="text-dark font-weight-bold">Forgot password ?</a></p>
                                        <div class="form-group">
                                            <div class="custom-control m-0 custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                                <label class="custom-control-label" for="customCheck1">Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-0">
                                        <button class="btn btn-primary w-100">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div><!---->
                    </div> <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </div>
    </div>
</section><!--end section-->
<!-- Hero End -->

@endsection
