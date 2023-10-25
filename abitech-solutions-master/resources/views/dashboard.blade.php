@extends('layouts.user_type.auth')

@section('content')

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Types de formations</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$data['categories_count']}}
                                    <span class="text-success text-sm font-weight-bolder mx-2">{{$data['categories_active_count']}} active(s)</span> -
                                    <span class="text-danger text-sm font-weight-bolder"> {{$data['categories_inactive_count']}} inactive(s)</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Formations</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$data['formations_count']}}
                                    <span class="text-success text-sm font-weight-bolder"> {{$data['formations_active_count']}} active(s)</span> -
                                    <span class="text-danger text-sm font-weight-bolder"> {{$data['formations_inactive_count']}} inactive(s)</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Visiteurs</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{$data['visitors_count']}}
                                    <span class="text-danger text-sm font-weight-bolder mx-2">{{$data['visitors_today_count'] }} aujourd'hui</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder mb-0">
                                    $103,430
                                    <span class="text-success text-sm font-weight-bolder">+5%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0 mb-4">
            <div class="card z-index-2">
                <div class="card-body p-3">
                    <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                    <h6 class="ms-2 mt-4 mb-0"> Visites  (<span class="text-sm ms-2 {{ $visitsHistoryTotal['total'] - $visitsHistoryTotalOld['total'] > 0 ? 'text-success' : 'text-danger' }}"> <strong>{{  $visitsHistoryTotalOld['total'] != 0 ? round((($visitsHistoryTotal['total'] - $visitsHistoryTotalOld['total']) / $visitsHistoryTotalOld['total']) * 100, 2) : 0 }}%</strong> </span>)
                        <i class="{{ $visitsHistoryTotal['total'] - $visitsHistoryTotalOld['total'] > 0 ? 'fa fa-arrow-up text-success' : 'fa fa-arrow-down text-danger' }}"></i> </h6>
                    <p class="text-sm ms-2"> Cette semaine <strong>({{ $visitsHistoryTotal['total'] }})</strong> - La semaine dernière <strong>({{ $visitsHistoryTotalOld['total'] }})</strong></p>

                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Formations les plus visitées</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-pie" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('dashboard')
    <script>
        const labels = {{ Js::from($visitsHistory->pluck('date')) }};
        const data =  {{ Js::from($visitsHistory->pluck('total')) }};
        const pieLabels = {{ Js::from($mostVisitedFormations->pluck('name')) }};
        const pieData = {{ Js::from($mostVisitedFormations->pluck('visited')) }};
        window.onload = function () {
            var ctx = document.getElementById("chart-bars").getContext("2d");

            new Chart(ctx, {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Nombre de visites",
                        tension: 0.4,
                        borderWidth: 0,
                        borderRadius: 4,
                        borderSkipped: false,
                        backgroundColor: "#fff",
                        data: data,
                        maxBarThickness: 6
                    },],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                            },
                            ticks: {
                                suggestedMin: 0,
                                suggestedMax: 500,
                                beginAtZero: true,
                                padding: 15,
                                font: {
                                    size: 14,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                                color: "#fff"
                            },
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false
                            },
                            ticks: {
                                display: false
                            },
                        },
                    },
                },
            });
            var ctx2 = document.getElementById("chart-pie").getContext("2d");
            //max height of 300px
            new Chart(ctx2,{
                type: 'pie',
                data:{
                    labels: pieLabels,
                    datasets: [{
                        label: 'Formations les plus visitées',
                        data: pieData,
                        backgroundColor: pieLabels.map((label) => {
                            return '#' + Math.floor(Math.random()*16777215).toString(16);
                        }),
                        hoverOffset: 4
                    }],

                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom',
                            labels: {
                                font: {
                                    size: 14,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        }
                    },
                }
            })

        }
    </script>
@endpush

