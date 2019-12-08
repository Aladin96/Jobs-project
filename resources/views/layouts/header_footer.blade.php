
<!DOCTYPE html>
<html lang="fr" class="no-js">


<!-- Mirrored from themesdesign.in/jobya/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 13:53:45 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobya - Laravel 6 Project</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/materialdesignicons.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/fontawesome.css') }}" />

    <!-- selectize css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/selectize.css') }}" />

    <!--Slider-->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.transitions.css') }}" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}" />

</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->

@yield('content_body')

<!-- javascript -->
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins.js') }}"></script>

<!-- selectize js -->
<script src="{{ URL::asset('assets/js/selectize.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/counter.int.js') }}"></script>

<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script src="{{ URL::asset('assets/js/home.js') }}"></script>

</body>

<!-- Mirrored from themesdesign.in/jobya/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2019 13:54:49 GMT -->
</html>
