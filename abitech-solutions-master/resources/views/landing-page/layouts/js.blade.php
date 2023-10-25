
    <!-- JavaScript Libraries -->

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/easing.min.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    <script>
{{--        toogle menu collapse on mobile --}}
        $('#toggleButton').click(function () {
            $('#navbarCollapse').toggleClass('show');
        })
    </script>
