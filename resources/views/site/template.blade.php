<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('site/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/dashboard.css') }}">
</head>

<body>
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-d-12 headerbg">
                    <img src=" {{ asset('site/img/photo.png') }}" alt="" width="30">
                    Welcome Shishir


                </div>
            </div>
        </div>
    </section>
    <Section id="topheader">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="sitemenu">
                        <li> <a href="{{ url('/dashboard') }}">Dashboard</a> </li>
                        <li> <a href="{{ url('/product') }}">Product</a> </li>
                        <li> <a href="{{ route('getCategory') }}">Category</a> </li>
                        <li> <a href="{{ route('getOrder') }}">Order</a> </li>
                        <li> <a href="">Shipping Information</a> </li>
                        <li> <a href="">Logout</a> </li>
                        @yield('testingContent')
                    </ul>
                </div>
                <div class="col-md-8">
                    @yield('pageContent')
                </div>


            </div>

    </Section>
    <footer>
        <p class="text-center"> &copy; shishiracharya.com.np &copy;</p>
    </footer>
    <script src="{{asset('jquery.js')}}"></script>
    <script src="{{ asset('site/bootstrap/js/bootstrap.js') }}"> </script>
   @yield('js')
</body>

</html>