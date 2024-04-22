<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abitech Solution</title>


    @include('landing-page.layouts.css')
</head>
<body>

    <div class="bg-white p-0">

        <!-- Spinner Start -->
        @include('landing-page.layouts.spinner')
        <!-- Spinner End -->
        
        <!-- Navbar & Hero Start -->
        <header>
            @include('landing-page.layouts.header')
        </header>
        <!-- Navbar & Hero End -->

        <!-- Content start -->
        <main>
            @yield('content')
        </main>
        <!-- Content end -->

        <!-- Footer Start -->
        <footer>
            @include('landing-page.layouts.footer')
        </footer>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top"><i class="fa-solid fa-arrow-up"></i></a>
    </div>

    @include('landing-page.layouts.js')
</body>
</html>
