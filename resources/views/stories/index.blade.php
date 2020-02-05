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
  <div class="unlimited-alert">
    <div class="unlimited-box rounded">
      <span class="close-alert">X</span>
      <h4 class="text-center text-danger">alert !</h4>
      <p class="text-muted text-center">vous avez atteint le nombre maximale de favoris,
                              vous pouvez achetez l'offre illimité seulement a 20$.</p>
      <form action="{{route('pay')}}" method="post" class="text-center">
        @csrf
        <button class="btn btn-danger my-4" type="submit">Acheter</button>
      </form>
    </div>
  </div>
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

@if(Auth::guard('recruteur')->check())
 @include('search.componentCandidat')
@else
 @include('search.component')
@endif

<!-- CANDIDATES LISTING START -->
<section class="section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">

                </div>
            </div>

            <div class="row">

              @foreach( $stories as $story )
              <div class="col-lg-6">
                <div class="item testi-box rounded p-4 mr-3 ml-2 bg-light position-relative">
                         <p class="text-muted mb-5">{{ $story->description }}</p>
                         <div class="clearfix">
                             <div class="testi-img float-left mr-3">
                                 <img src="images/testi/img-2.png" height="64" alt="" class="rounded-circle shadow">
                             </div>
                             <h5 class="f-18 pt-1"><a href="/candidat/{{$story->id_candidat}}" style="color:black">{{ $story->candidat->nom }} {{ $story->candidat->prenom }}</a></h5>
                             <p class="text-muted mb-0">{{ $story->candidat->email }}</p>
                             <div class="testi-icon">
                                 <i class="mdi mdi-format-quote-open display-2"></i>
                             </div>
                         </div>
                  </div>
              </div>
            @endforeach

            </div>
        </div>
    </section>
<!-- CANDIDATES LISTING END -->

@include('layouts.footer')


@endsection
