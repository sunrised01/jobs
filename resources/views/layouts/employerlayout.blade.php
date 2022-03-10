<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{ config('app.name', 'Laravel') }}  | Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    @include('includes.head')



    <script>var base_url = "{{ url('/') }}";</script>

</head>

<body data-anm=".anm">

    <div id="app" class="page-wrapper dashboard">
        <div class="ajax-loader">
            <div class="loader"></div>
        </div>
        <div class="preloader"></div>
        <header class="main-header header-shaddow">
            @include('includes.nav')
        </header>

        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        <!-- User Sidebar -->
        <div class="user-sidebar">
            @include('includes.leftsidebar')
        </div>

        <main class="">
            @yield('content')
        </main>

        <!-- Copyright -->
        <div class="copyright-text">
            <p>© @php echo date('Y') @endphp Superio. All Right Reserved.</p>
        </div>

    </div>

    
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('assets/js/mmenu.polyfills.js') }}"></script>
    <script src="{{ asset('assets/js/mmenu.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('assets/js/rellax.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>



    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @php
        $currentURL = \Request::segment(2);
        
    @endphp

    

    <!--Morris Chart-->
    @if($currentURL == 'dashboard')
    <!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
        <script src="{{ asset('assets/js/chart.min.js') }}"></script>
        <script>
            Chart.defaults.global.defaultFontFamily = "Sofia Pro";
            Chart.defaults.global.defaultFontColor = '#888';
            Chart.defaults.global.defaultFontSize = '14';

            var ctx = document.getElementById('chart').getContext('2d');

            var chart = new Chart(ctx, {

                type: 'line',
                // The data for our dataset
                data: {
                    labels: ["January", "February", "March", "April", "May", "June"],
                    // Information about the dataset
                    datasets: [{
                        label: "Views",
                        backgroundColor: 'transparent',
                        borderColor: '#1967D2',
                        borderWidth: "1",
                        data: [196, 132, 215, 362, 210, 252],
                        pointRadius: 3,
                        pointHoverRadius: 3,
                        pointHitRadius: 10,
                        pointBackgroundColor: "#1967D2",
                        pointHoverBackgroundColor: "#1967D2",
                        pointBorderWidth: "2",
                    }]
                },

                // Configuration options
                options: {

                    layout: {
                        padding: 10,
                    },

                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    },

                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: false
                            },
                            gridLines: {
                                borderDash: [6, 10],
                                color: "#d8d8d8",
                                lineWidth: 1,
                            },
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: false
                            },
                            gridLines: {
                                display: false
                            },
                        }],
                    },

                    tooltips: {
                        backgroundColor: '#333',
                        titleFontSize: 13,
                        titleFontColor: '#fff',
                        bodyFontColor: '#fff',
                        bodyFontSize: 13,
                        displayColors: false,
                        xPadding: 10,
                        yPadding: 10,
                        intersect: false
                    }
                },
            });
        </script>
    @elseif($currentURL == 'jobs')
        <script>
        callJobListing();
        </script>
    @else
      @endif

</body>

</html>