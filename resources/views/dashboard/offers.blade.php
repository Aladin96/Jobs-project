@extends('layouts.dashboard')

@section('dash_content')


    <div class="container">
          <div class="row">

            <div class="col-12">
              <h2 class="pl-4 pd-5 mb-5 text-white border-bottom">Pending offers</h2>
            </div>
            @if( count($offers))
            <div class="table-responsive">
              <table class="table table-dark table-hover text-center">
                  <thead>
                    <tr>
                      <th style="width : 10%">ID</th>
                      <th style="width : 30%">Recruiter</th>
                      <th style="width : 30%">Posted</th>
                      <th style="width : 50%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($offers as $offer)
                    <tr>
                      <td>{{$offer->id}}</th>
                      <td>{{$offer->recruteur->nom}}</td>
                      <td>{{$offer->created_at->diffForHumans()}}</td>
                      <td>
                        <a href="../offre/{{$offer->id}}" target="_blank"><button class="btn btn-light">View</button></a>
                        <button class="btn btn-primary">Accept</button>
                        <button class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
            @else
            <div class="col-12">
              <h2 class="text-muted text-center p-5 m-5">No offers are available</h2>
            </div>
            @endif


          </div>
    </div>



@endsection
