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
                    <h4 class="text-uppercase title mb-4">Modifier mon profile</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<section class="section">
  <div class="container">
    <div class="row">
            <div class="col-lg-12">
                <h5 class="text-dark">Information General :</h5>
            </div>

            <div class="col-12 mt-3">
                <div class="custom-form p-4 border rounded">
                    <img src="{{asset($data->logo)}}" class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt="">
                    <form method="POST" action="{{ url('recruteur/' . $data->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <label class="text-muted">Nom: </label>
                                    <input id="first-name" type="text" name="nom" class="form-control resume" value="{{ $data->nom}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group app-label">
                                    <label class="text-muted">Site web: </label>
                                    <input type="text" name="website" class="form-control resume" value="{{ $data->site_web}}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>Télephone</label>
                                    <input type="text" class="form-control" value="{{$data->tel}}" name="tel" >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>Adresse <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$data->adresse}}" name="adresse">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>Email: </label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{$data->email}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>Password: </label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <input type="hidden" class="form-control" placeholder="Password" name="old-password" value="{{$data->password}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <div class="input-group mt-2 mb-2">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="logo">
                                                <label class="custom-file-label rounded"><i class="mdi mdi-cloud-upload mr-1"></i> Upload Image profile</label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-inline-item">
                                        <h6 class="text-muted mb-0">Upload Images</h6>
                                    </li>
                                </ul>
                              </div>

                            <div class="col-12 mt-4">
                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Modifier">
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
  </div>
</section>

@include('layouts.footer')

@endsection
