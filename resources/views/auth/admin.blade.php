@extends('layouts.header_footer')

@section('content_body')

<!-- Hero Start -->

<section class="vh-100" >

  <div class="admin">
    <div class="container cover">
      <div class="row flex cover">
        <form action="dashboard" class="adminLogin" method="POST">
          @csrf
          <h2>Welcome !</h2>
          @if(Session::has('error'))
            <p class="alert alert-danger" style="width:80%;margin:auto;">{!! session()->get('error') !!}</p>
          @endif
          <div class="wrapper">
            <input type="text" name="user" placeholder="username" autocomplete="off" required>
            <input type="password" name="pass"  placeholder="password" required>
            <input type="submit" name="" value="Log in">
          </div>
        </form>
      </div>
    </div>
  </div>
  <ul class="cubes">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</section><!--end section-->
<!-- Hero End -->

@endsection
