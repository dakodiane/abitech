<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('assets/img/logos/favicon.png')}}" type="image/x-icon">
    <title>
        @yield('title', 'Abitech Solutions')
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <link href="{{asset('assets/styles/notify.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet"/>
    <link id="pagestyle" href="{{asset('assets/styles/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet"/>

    <link href="{{ asset('css/adminstyle.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-100 ">
@auth
    @yield('auth')
@endauth
@guest
    @yield('guest')
@endguest
@include('notify::components.notify')
<script src="{{asset('assets/scripts/notify.js')}}"></script>
<script src="{{asset('assets/scripts/js/plugins/jquery.min.js')}}"></script>
<script src="{{asset('assets/scripts/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/scripts/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/scripts/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('assets/scripts/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/scripts/js/plugins/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/scripts/js/plugins/chartjs.min.js')}}"></script>
@stack('dashboard')
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>
<script defer>
    function removeAdditionalForm(id) {
        $('#additionnalInformationsForm' + id).remove()
    }

    $('document').ready(function () {
            $('.addInformation').on('click', function (event) {
                let additionalFieldsDiv;
                if (event.currentTarget.id ) {
                    const inUpdate = event.currentTarget.id
                    additionalFieldsDiv = $('#additionnalInformationsForm' + inUpdate)
                }else{
                    additionalFieldsDiv = $('#additionnalInformationsForm')
                }
                console.log(additionalFieldsDiv)
                const additionalFieldsDivElementsSize = additionalFieldsDiv.children().length + 1
                additionalFieldsDiv
                    .append('<div class="additionnalInformationsForm row align-items-center" id="additionnalInformationsForm' + additionalFieldsDivElementsSize + '">' +
                    '<div class="col-md-5">' +
                    '<label for="">Libellé</label>' +
                    '<input type="text" class="form-control" required name="additional_information[label][]" >' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<label for="">Valeur</label>' +
                    '<input type="text" class="form-control" required name="additional_information[value][]">' +
                    '</div>' +
                    '<div class="col-md-1 d-flex align-items-center justify-content-center">' +
                    '<i class="fa fa-minus text-danger cursor-pointer" role="button" id="removeInformation" additionnalId="' + additionalFieldsDivElementsSize + '"' +
                    'onclick="removeAdditionalForm(' + additionalFieldsDivElementsSize + ')"' +
                    '></i>' +
                    '</div>' +
                    '</div>'
                )
            })
        }
    )
</script>
</html>
