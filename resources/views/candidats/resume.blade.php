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
                       <h4 class="text-uppercase title mb-4">Creer un CV</h4>
                       <ul class="page-next d-inline-block mb-0">
                           <li><a href="index-2.html" class="text-uppercase font-weight-bold">Accueil</a></li>
                           <li><a href="#" class="text-uppercase font-weight-bold">Déposer un cv</a></li>
                           <li>
                               <span class="text-uppercase text-white font-weight-bold">Creer un cv</span>
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
           <div class="row">
               <div class="col-lg-12">
                   <h5 class="text-dark">Information General :</h5>
               </div>

               <div class="col-12 mt-3">
                   <div class="custom-form p-4 border rounded">
                       <img src="{{ asset('assets/images/employers/img-1.jpg')}}" class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt="">
                       <form>
                           <div class="row mt-4">



                               <div class="col-md-4">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Sex<span class="text-danger">*</span> :</label>
                                       <div class="form-button">
                                           <select class="form-control">
                                               <option data-display="sex">Sex</option>
                                               <option value="1">Male</option>
                                               <option value="2">Female</option>
                                               <option value="3">Other</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>

                               <div class="col-md-4">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Status</label>
                                       <div class="form-button">
                                           <select class="form-control">
                                               <option hidden selected>Status</option>
                                               <option value="1">Marrié</option>
                                               <option value="2">Celibataire</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Wilaya</label>
                                       <div class="form-button">
                                           <select class="form-control">
                                               <option hidden selected>Wilaya</option>
                                               <option value="1">Adrar</option>
                                               <option value="2">Alger</option>
                                               <option value="3">Oran</option>
                                               <option value="4">Tlemcen</option>
                                               <option value="5">Bejai</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-lg-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Address :</label>
                                       <textarea id="address" rows="4" class="form-control resume" placeholder=""></textarea>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>


           <div class="row">
               <div class="col-lg-12">
                   <h5 class="text-dark mt-5">Formation :</h5>
               </div>

               <div class="col-12 mt-3">
                   <div class="custom-form p-4 border rounded">
                       <form class="training">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group app-label">
                                     <label class="text-muted">Diplome</label>
                                     <input id="graduation" type="text" class="form-control resume" placeholder="">
                                 </div>
                             </div>

                             <div class="col-md-6">
                                 <div class="form-group app-label">
                                     <label class="text-muted">Domaine</label>
                                     <input id="university/college" type="text" class="form-control resume" placeholder="">
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="form-group app-label">
                                     <label class="text-muted">Lieu</label>
                                     <input id="degree/certification" type="text" class="form-control resume" placeholder="">
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group app-label">
                                             <label class="text-muted">Date debut</label>
                                             <input id="degree/certification" type="text" class="form-control resume" placeholder="JJ/MM/AAAA">
                                         </div>
                                     </div>

                                     <div class="col-md-6">
                                         <div class="form-group app-label">
                                             <label class="text-muted">Date fin</label>
                                             <input id="course-title" type="text" class="form-control resume" placeholder="JJ/MM/AAAA">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                       </form>
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
                       <form>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Intitulé</label>
                                       <input id="company-name" type="text" class="form-control resume" placeholder="">
                                   </div>
                               </div>

                               <div class="col-lg-6">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Location</label>
                                       <div class="form-button">
                                           <select class="form-control">
                                               <option hidden selected>Wilaya</option>
                                               <option value="1">Alger</option>
                                               <option value="2">Tlemcen</option>
                                               <option value="3">Oran</option>
                                               <option value="4">Adrar</option>
                                               <option value="5">Annaba</option>
                                           </select>
                                       </div>
                                   </div>
                               </div>

                               <div class="col-lg-6">
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group app-label">
                                               <label class="text-muted">Date debut</label>
                                               <input id="date-from" type="text" class="form-control resume" placeholder="01-Jan-2018">
                                           </div>
                                       </div>

                                       <div class="col-md-6">
                                           <div class="form-group app-label">
                                               <label class="text-muted">Date fin</label>
                                               <input id="date-to" type="text" class="form-control resume" placeholder="31-March-2019">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </form>
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
                       <form>
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Comptence</label>
                                       <input id="skills" type="text" class="form-control resume" placeholder="HTML, CSS, PHP, javascript, ...">
                                   </div>
                               </div>

                               <div class="col-lg-12">
                                   <div class="form-group app-label">
                                       <label class="text-muted">Description :</label>
                                       <textarea id="address" rows="4" class="form-control resume" placeholder=""></textarea>
                                   </div>
                               </div>
                           </div>
                       </form>
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
