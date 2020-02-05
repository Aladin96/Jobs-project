<div class="container">
  <div class="home-form-position">
      <div class="row justify-content-center">
          <div class="col-lg-10">
              <div class="home-registration-form job-list-reg-form bg-light shadow p-4">
                  <form class="registration-form" method="get" action="/search/candidat">
                      <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="registration-form-box">
                                <i class="fa fa-list-alt"></i>
                                <select id="select-category" name="civ" class="demo-default" placeholder="Sélectionner une civilite.." required>
                                  <option value="">Sélectionner une civilite.</option>
                                  <option value="-1">Tous les civilites</option>
                                  <option value="Dr">Dr</option>
                                  <option value="Pr">Pr</option>
                                  <option value="M">M</option>
                                  <option value="Mlle">Mlle</option>
                                  <option value="Mme">Mme</option>
                                </select>
                            </div>
                        </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="registration-form-box">
                                  <i class="fa fa-location-arrow"></i>
                                  <select name="wilaya" id="select-country" class="demo-default" placeholder="Sélectionner une wilaya.." required>
                                    <option value="">Sélectionner une Wilaya.</option>
                                    <option value="-1">Toutes les wilaya</option>
                                    <option value="tlemcen"> Tlemcen </option>
                                    <option value="oran">Oran</option>
                                    <option value="Adrar">Adrar</option>
                                    <option value="Chlef">Chlef</option>
                                    <option value="Laghouat">Laghouat</option>
                                    <option value="Setif">Setif</option>
                                    <option value="Alger">Alger</option>
                                    <option value="Annaba">Annaba</option>
                                    <option value="Constantine">Constantine</option>
                                    <option value="Béjaïa">Béjaïa</option>
                                    <option value="Biskra">Biskra</option>
                                    <option value="Sidi belabbes">Sidi belabbes</option>
                                    <option value="Béchar">Béchar</option>
                                    <option value="Blida">Blida</option>
                                    <option value="Bouira">Bouira</option>
                                    <option value="Tebssa">Tebssa</option>
                                    <option value="Tizi Ouzou">Tizi Ouzou</option>
                                    <option value="Aïn Témouchent">Aïn Témouchent</option>
                                    <option value="Relizane">Relizane</option>
                                    <option value="Ghardaïa">Ghardaïa</option>
                                    <option value="Tindouf">Tindouf</option>
                                    <option value="Boumerdès">Boumerdès</option>
                                    <option value="Tipaza">Tipaza</option>
                                    <option value="Khenchela">Khenchela</option>
                                    <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                                    <option value="Mostaganem">Mostaganem</option>
                                    <option value="Médéa">Médéa</option>
                                    <option value="Guelma">Guelma</option>
                                    <option value="Tiaret">Tiaret</option>
                                    <option value="Batna">Batna</option>
                                    <option value="Djelfa">Djelfa</option>
                                    <option value="Jijel">Jijel</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="registration-form-box">
                                  <i class="fa fa-list-alt"></i>
                                  <select id="select-category" name="formation" class="demo-default" placeholder="Sélectionner un domaine.." required>
                                    <option value="">Sélectionner un domaine.</option>
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
