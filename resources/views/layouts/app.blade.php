<!DOCTYPE html>
<html lang="{{\App::getLocale()}}" class="no-js">
<head prefix="{{\App\Utils\SocialMarkup::makeRegisteredPrefixes()}}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel='alternate' href='{{url()->current()}}' hreflang="{{\Config::get('app.hreflang')}}">
    <link rel="canonical" href="{{ url()->current() }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Style -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-patch.css">
    <link rel="stylesheet" href="/css/fonts.css">

    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="{{asset('skins/flat/_all.css')}}">
    <link rel="stylesheet" href="/css/faq.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Scripts -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery-extension.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script type="text/javascript" src="{{asset('js/icheck.js')}}"></script>
    <script type="text/javascript" src="/js/faq.js"></script>

    <script>
        $(document).ready(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-red',
                radioClass: 'iradio_flat-red'
            });
        });
    </script>

    <script>
        $(function(){
            $("#upload_link").on('click', function(e){
                e.preventDefault();
                $(".hiddenUploadInput").trigger('click');
            });
        });
    </script>

    <script>
        $(document).ready(function(){

            $('.check').on('ifChecked', function(event){
                var e = this.getAttribute("id");
                var d = e + 'e';
                document.getElementById(d).style.display = "block";

            });

            $('.check').on('ifUnchecked', function(event){
                var e = this.getAttribute("id");
                var d = e + 'e';
                document.getElementById(d).style.display = "none";

            });


        })
    </script>


    @yield('head')

</head>
<body class="body-main">

    @yield('header')

    <div id="container">

        @if(Session::has('error'))
            <p class="alert alert-warning">{{ Session::get('error') }}</p>
        @endif
        @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('info'))
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        @endif

        @yield('container')
    </div>


    @yield('footer')

</body>
</html>
