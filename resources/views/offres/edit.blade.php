@extends('layouts.header_footer')

@section('content_body')

@include('layouts.navbar_recruteur')

<!-- Start home -->
<section class="bg-half page-next-level">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h4 class="text-uppercase title mb-4">Modifier l'offre</h4>
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
                        @if( session()->has('updated') )
                          <p class="alert alert-success">{{ session()->get('updated')}}</p>
                        @endif
                      </div>
                        <form method="POST" action="{{url('/offre/'.$offer->id.'/modifier')}}" name="contact-form" id="contact-form3">
                          @csrf
                          @method('PUT')
                            <h4 class="text-dark mb-3">Modifier l'offre :</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Intitulé</label>
                                        <input id="company-name" type="text" class="form-control resume" name="intitule"  value="{{ $offer->intitule }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Type:</label>
                                        <div class="form-button">
                                            <select class="form-control" name="type" required>
                                                <option value="1" {{ $offer->type == 'Stage' ? 'selected' : ''}}>Stage</option>
                                                <option value="2" {{ $offer->type == 'Cdi' ? 'selected' : ''}}>Cdi</option>
                                                <option value="3" {{ $offer->type == 'Cdd' ? 'selected' : ''}}>Cdd</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Domaine: </label>
                                        <input type="text" class="form-control resume" name="domaine" value="{{ $offer->domaine }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Lieu de travail: </label>
                                        <input type="text" class="form-control resume" name="lieu" placeholder="" value="{{ $offer->lieu_de_travail }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Diplôme: </label>
                                        <input type="text" class="form-control resume" name="diplome" placeholder="" value="{{ $offer->diplome }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Competences: </label>
                                        <input type="text" class="form-control resume" name="competences"  value="{{ $offer->competences }}" required>
                                        <span class="text-muted">Separer chaque competence par une vergule (,)</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Rémunération: </label>
                                        <input id="maximum-salary" type="text" class="form-control resume" name="remuneration" value="{{ $offer->remuneration }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Date de début prévu: </label>
                                        <input type="date" name="date_debut" class="form-control" value="{{ $offer->date_debut }}" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Nombre d'année d'experience</label>
                                        <div class="form-button">
                                            <select class="form-control" name="annee_experience" required>
                                                @for ($i=1; $i <= 30; $i++)
                                                  <option value="{{$i}}" {{ $offer->annee_experience == $i ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Durée: </label>
                                        <div class="form-button">
                                            <select class="form-control" name="duree" required>
                                                <option value="1" {{ $offer->duree == 'CDD' ? 'selected' : '' }}>CDD</option>
                                                <option value="2" {{ $offer->duree == 'Stage' ? 'selected' : '' }}>Stage</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group app-label mt-2">
                                        <label class="">Description: </label>
                                        <textarea id="description" rows="6" class="form-control resume" name="description" placeholder="" required>{{$offer->description}}</textarea>
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
