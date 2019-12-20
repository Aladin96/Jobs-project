<div class="col-lg-12 mt-4 pt-2">
    <h4 class="mb-4">Offres de l'entreprise:</h4>
    @foreach($offers as $offer)
        <div class="job-list-box border rounded">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="company-logo-img">
                            <img src="{{asset($offer->recruteur->logo)}}" style="height : 120px" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-9">
                        <div class="job-list-desc">
                            <h4 class="mb-2"><a href="{{url('offre/'.$offer->id)}}" class="text-dark">{{ $offer->intitule }}</a></h4>
                            <p class="text-muted mb-2"><i class="mdi mdi-bank mr-2"></i>{{$offer->recruteur->nom}}</p>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-3">
                                    <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>{{ $offer->lieu_de_travail }}</p>
                                </li>

                                <li class="list-inline-item">
                                    <p class="text-muted mb-0"><i class="fas fa-chalkboard-teacher"></i> Experience : {{ $offer->annee_experience }} Ans</p>
                                </li>

                                <li class="list-inline-item">
                                    <p class="text-muted mb-0"><i class="mdi mdi-clock-outline mr-2"></i>{{ $offer->updated_at->diffForHumans() }}</p>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="job-list-button-sm text-right">
                            <span class="badge badge-success">Type : {{ $offer->type }}</span>

                            <div class="mt-3">
                                <a href="/offre/{{$offer->id}}" class="btn btn-sm btn-primary">Voir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
