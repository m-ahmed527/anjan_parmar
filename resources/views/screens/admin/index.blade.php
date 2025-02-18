@extends('layouts.admin.app')
@section('scripts')
    {{-- <script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/sparklines/sparkline.js') }}"></script>
    <script>
        $(function() {

            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })


        })
    </script>
@endsection --}}
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                {{-- <h3>{{ $currentMonthOrdersCount }}</h3> --}}

                                <p>New Orders in {{ \Carbon\Carbon::now()->format('F') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            {{-- <a href="{{ route('admin.orders.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                {{-- <h3>$ {{ $currenMonthRevenue }}</h3> --}}

                                <p>Generated Revenue in {{ \Carbon\Carbon::now()->format('F') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>

                            {{-- <a href="#" class="small-box-footer">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                {{-- <h3>$ {{ $totalRevenue }}</h3> --}}

                                <p>Total Revenue</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                {{-- <h3>{{ $currenMonthRegisteredUserCount }}</h3> --}}

                                <p>User Registrations in {{ \Carbon\Carbon::now()->format('F') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{-- <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                {{-- <h3>{{ $currenMonthSubscribedUsers }}</h3> --}}

                                <p>User Subscribed in {{ \Carbon\Carbon::now()->format('F') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-link"></i>
                            </div>
                            {{-- <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                {{-- <h3>{{ $currenMonthCanceledOrders }}</h3> --}}

                                <p>Canceled Orders in {{ \Carbon\Carbon::now()->format('F') }}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-close"></i>
                            </div>
                            {{-- <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                {{-- <h3>{{ $pendingOrders }}</h3> --}}

                                <p>Total Pending Orders </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-load-a"></i>
                            </div>
                            {{-- <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

            </div>
        </section>
    </div>
@endsection
