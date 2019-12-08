<div class="container">
  <div class="home-form-position">
      <div class="row justify-content-center">
          <div class="col-lg-10">
              <div class="home-registration-form job-list-reg-form bg-light shadow p-4">
                  <form class="registration-form" method="get" action="/search">
                      <div class="row">
                          <div class="col-lg-3 col-md-6">
                              <div class="registration-form-box">
                                  <i class="fa fa-briefcase"></i>
                                  <input type="text" id="exampleInputName1" name="q" class="form-control rounded registration-input-box" placeholder="Ex: informatique" required>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="registration-form-box">
                                  <i class="fa fa-location-arrow"></i>
                                  <select name="societe" id="select-country" class="demo-default" placeholder="Sélectionner une entreprise.." required>
                                    <option value="">Sélectionner une entreprise.</option>
                                    <option value="-1">Toutes les entreprise</option>
                                    @php
                                      $societes = App\Recruteur::all();
                                      foreach( $societes as $s ){
                                        echo '<option value="' . $s->id . '">' . $s->nom .'</option>';
                                      }
                                    @endphp

                                  </select>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="registration-form-box">
                                  <i class="fa fa-list-alt"></i>
                                  <select id="select-category" name="domaine" class="demo-default" placeholder="Sélectionner un domaine.." required> 
                                    <option value="">Sélectionner une domaine.</option>
                                    <option value="-1">Tous les domaines</option>
                                    @php
                                      $offres = App\Offre::all();
                                      foreach( $offres as $d ){
                                        echo '<option value="' . $d->domaine . '">' . $d->domaine .'</option>';
                                      }
                                    @endphp
                                  </select>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="registration-form-box">
                                  <input type="submit" id="submit" class="submitBnt btn btn-primary btn-block" value="Submit">
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
