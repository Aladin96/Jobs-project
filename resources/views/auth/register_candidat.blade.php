@extends('layouts.header_footer')

@section('content_body')

<!-- Hero Start -->
<section class="vh-100" style="background:url('assets/images/user.jpg') center center;">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="login_page bg-white shadow rounded p-4">
                            <div class="text-center">
                                <h4 class="mb-4">Inscription Candidat</h4>
                                @if(session()->has("register-success"))
                                <p class="register-success">{{ session()->get('register-success') }}</p>
                                @endif
                            </div>
                            <form class="login-form" method="POST" action="{{ url('register/candidat') }}">
                              @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="First Name" name="nom" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Prénom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Prénom" name="prenom" required="">
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
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Télephone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="" name="tel" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Adresse <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="adresse" name="adresse" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Date de naissance <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="" name="date_de_naissance" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group position-relative">
                                            <label>Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" required="">
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
