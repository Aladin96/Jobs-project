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
                       <h4 class="text-uppercase title mb-4">Modifier CV</h4>
                       <ul class="page-next d-inline-block mb-0">
                           <li><a href="index-2.html" class="text-uppercase font-weight-bold">Accueil</a></li>
                           <li><a href="#" class="text-uppercase font-weight-bold">Mes cv</a></li>
                           <li>
                               <span class="text-uppercase text-white font-weight-bold">Modifier cv</span>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- end home -->

   <!-- CREATE RESUME START -->
   <section class="section">
       <div class="container">
         <form class="" action="{{url('/cv/modifier')}}" method="POST">
           @csrf
           <div class="row">
               <div class="col-lg-12">
                 @if( session()->has('modified') )
                 <p class="alert alert-success">{{ session()->get('modified')}}</p>
                 @endif
               </div>
               <div class="col-lg-12">
                   <h5 class="text-dark">Information General :</h5>
               </div>

               <div class="col-12 mt-3">
                   <div class="custom-form p-4 border rounded">
                       <div class="section-wwrapper">
                           <div class="row mt-4">


                               <div class="col-lg-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Intitulé cv :</label>
                                       <input type="text" class="form-control resume" name="intitule_cv" value="{{ $cv-> titre }}">
                                       <input type="hidden" name="id_cv" value="{{$cv->id}}">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>


           <div class="row">
               <div class="col-lg-12">
                   <h5 class="text-dark mt-5">Formation :</h5>
               </div>

               <div class="col-12 mt-3">
                   <div class="custom-form p-4 border rounded">
                       <div class="section-wrapper formation">
                         @php
                         $all = App\Cv::with('formation')->find($cv->id);
                         $formations = $all->formation;
                         @endphp
                         @foreach($formations as $formation)
                         <div class="row relative">
                           <i class="fas fa-minus-circle fa-lg minus-btn" name="supprimer"></i>
                             <div class="col-md-6">
                                 <div class="form-group app-label">
                                     <label class="text-muted">Diplome</label>
                                     <input type="text" class="form-control resume" name="diplome[]" value="{{ $formation->diplome }}">
                                     <input type="hidden" name="formation_action[]" class="action" value="update">
                                     <input type="hidden" name="formation_id[]" value="{{ $formation->id }}">
                                 </div>
                             </div>

                             <div class="col-md-6">
                                 <div class="form-group app-label">
                                     <label class="text-muted">Domaine</label>
                                     <input type="text" class="form-control resume" name="domaine[]" value="{{ $formation->domaine }}">
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="form-group app-label">
                                     <label class="text-muted">Lieu</label>
                                     <input type="text" class="form-control resume" name="lieu[]" value="{{ $formation->lieu }}">
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group app-label">
                                             <label class="text-muted">Date debut</label>
                                             <input type="text" class="form-control resume" name="dd_formation[]" value="{{ $formation->date_debut }}">
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="form-group app-label">
                                             <label class="text-muted">Date fin</label>
                                             <input name="df_formation[]" type="text" class="form-control resume" value="{{ $formation->date_fin }}">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @endforeach
                       </div>
                       <div class="row">
                         <div class="col-12">
                           <button class="btn btn-primary float-right add-more"><i class="fas fa-plus"></i></button>
                         </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="row">
               <div class="col-12 mt-5">
                   <h5 class="text-dark">Experience :</h5>
               </div>

               <div class="col-12 mt-3">
                   <div class="custom-form p-4 border rounded">
                       <div class="section-wrapper experience">
                         @php
                         $all = App\Cv::with('experience')->find($cv->id);
                         $experiences = $all->experience;
                         @endphp
                         @foreach($experiences as $experience)
                           <div class="row relative">
                             <i class="fas fa-minus-circle fa-lg minus-btn" name="supprimer"></i>
                               <div class="col-md-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Intitulé</label>
                                       <input name="intitule_experience[]" type="text" value="{{ $experience->intitule }}" class="form-control resume">
                                       <input type="hidden" name="experience_action[]" class="action" value="update">
                                       <input type="hidden" name="experience_id[]" value="{{ $experience->id }}">
                                   </div>
                               </div>

                               <div class="col-lg-6">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Location</label>
                                       <div class="form-button">
                                           <select name="wilaya[]" class="form-control">
                                               <option hidden >Wilaya</option>
                                               <option value="Alger">Alger</option>
                                               <option value="Tlemcen" selected>Tlemcen</option>
                                               <option value="Oran">Oran</option>
                                               <option value="Adrar">Adrar</option>
                                               <option value="Annaba">Annaba</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>

                               <div class="col-lg-6">
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group app-label">
                                               <label class="text-muted">Date debut</label>
                                               <input name="dd_experience[]" type="text" class="form-control resume" value="{{ $experience->date_debut }}">
                                           </div>
                                       </div>

                                       <div class="col-md-6">
                                           <div class="form-group app-label">
                                               <label class="text-muted">Date fin</label>
                                               <input name="df_experience[]" type="text" class="form-control resume" value="{{ $experience->date_fin }}">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @endforeach
                       </div>
                       <div class="row">
                         <div class="col-12">
                           <button class="btn btn-primary float-right add-more"><i class="fas fa-plus"></i></button>
                         </div>
                       </div>
                   </div>
               </div>
           </div>


           <div class="row">
               <div class="col-12 mt-5">
                   <h5 class="text-dark">Compétence :</h5>
               </div>

               <div class="col-12 mt-3">
                   <div class="custom-form p-4 border rounded">
                       <div class="section-wrapper competence">
                         @php
                         $all = App\Cv::with('competence')->find($cv->id);
                         $competences = $all->competence;
                         @endphp
                         @foreach($competences as $competence)
                           <div class="row relative">
                             <i class="fas fa-minus-circle fa-lg minus-btn" name="supprimer"></i>
                               <div class="col-lg-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Comptence</label>
                                       <input name="intitule_competence[]" type="text" class="form-control resume" value="{{ $competence->intitule }}">
                                       <input type="hidden" name="competence_action[]" class="action" value="update">
                                       <input type="hidden" name="competence_id[]" value="{{ $competence->id }}">
                                   </div>
                               </div>

                               <div class="col-lg-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Description :</label>
                                       <textarea name="description[]" rows="4" class="form-control resume">{{ $competence->description }}</textarea>
                                   </div>
                               </div>
                           </div>
                          @endforeach
                       </div>
                       <div class="row">
                         <div class="col-12">
                           <button class="btn btn-primary float-right add-more"><i class="fas fa-plus"></i></button>
                         </div>
                       </div>
                   </div>
               </div>

               <div class="col-12 mt-4">
                   <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Submit Resume">
               </div>
           </div>

         </form>
       </div>
   </section>
   <!-- CREATE RESUME END -->

   <!-- subscribe start -->
   <section class="section bg-light">
       <div class="container">
           <div class="row">
               <div class="col-lg-4 col-md-5">
                   <div class="float-left position-relative notification-icon mr-2">
                       <i class="mdi mdi-bell-outline text-primary"></i>
                       <span class="badge badge-pill badge-danger">1</span>
                   </div>
                   <h5 class="mt-2 mb-0">Your Job Notification</h5>
               </div>
               <div class="col-lg-8 col-md-7 mt-4 mt-sm-0">
                   <form>
                       <div class="form-group mb-0">
                           <div class="input-group mb-0">
                               <input name="email" id="email" type="email" class="form-control" placeholder="Your email :" required="" aria-describedby="newssubscribebtn">
                               <div class="input-group-append">
                                   <button class="btn btn-primary submitBnt" type="submit" id="newssubscribebtn">Subscribe</button>
                               </div>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
   <!-- subscribe end -->
   @include('layouts.footer')

  @endsection
