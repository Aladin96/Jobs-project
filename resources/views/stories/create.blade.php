@extends('layouts.header_footer')

@section('content_body')

@include('layouts.navbar_candidat')

<!-- Start home -->
<section class="bg-half page-next-level">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h4 class="text-uppercase title mb-4">Succes stories</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- POST A JOB START -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="rounded shadow bg-white p-4">
                    <div class="custom-form">
                        <div id="message3">
                        @if( session()->has('publiée') )
                          <p class="alert alert-success">{{ session()->get('publiée')}}</p>
                        @endif
                      </div>
                        <form method="POST" action="{{url('/stories/create')}}" name="contact-form" id="contact-form3">
                          @csrf
                            <h4 class="text-dark mb-3">Your Story :</h4>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group app-label mt-2">
                                      <label class="">Description: </label>
                                      <textarea id="description" rows="6" class="form-control resume" name="description" placeholder="" required>{{old('description')}}</textarea>
                                  </div>
                              </div>
                            </div>


                              <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <input type="submit" class="btn btn-primary" value="Confirmer">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- POST A JOB END -->

@endsection
