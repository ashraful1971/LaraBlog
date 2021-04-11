<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    @if(isset($post))
    <title>{{ $post->title }} - {{ $post->category->name }}</title>
    <meta name="keywords" content="{{ $post->title }}">
    <meta name="description" content="{{ $post->excerpt() }}">
    <meta name="author" content="{{ $post->user->name }}">
    @else
    <title>LaraBlog - Simple Blog Made With Laravel 8</title>
    @endif
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 

    <!-- FontAwesome Icons core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="{{ asset('css/version/marketing.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        @include('frontend.layouts.header')

        <section class="section lb">
            <div class="container">
                <div class="row" style="margin-top: 4.8rem;">
                    @yield('content')

                    @yield('sidebar')
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        @include('frontend.layouts.footer')

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/animate.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>