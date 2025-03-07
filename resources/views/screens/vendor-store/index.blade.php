@extends('layouts.vendor-store.app')
@section('title', 'Dashboard')

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
                                {{-- <h3>{{ $allProductsCount }}</h3> --}}

                                <p>All Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.product.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                {{-- <h3>{{ $premiumProductsCount }}</h3> --}}

                                <p>Premium Products</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>

                            <a href="{{ route('admin.product.premium.index') }}" class="small-box-footer">More info
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                {{-- <h3>{{ $allUsersCount }}</h3> --}}

                                <p>All Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                {{-- <h3>{{ $allVendorsCount }}</h3> --}}

                                <p>All Vendors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-link"></i>
                            </div>
                            <a href="{{ route('admin.vendors.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                {{-- <h3>{{ $allApprovedVendorsCount }}</h3> --}}

                                <p>Approved Vendors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            {{-- <a href="{{ route('admin.vendors.index', ['status' => 'approved']) }}"
                                class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                            <a href="{{ route('admin.vendors.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                {{-- <h3>{{ $allRejectedVendorsCount }}</h3> --}}

                                <p>Rejected Vendors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-close"></i>
                            </div>
                            {{-- <a href="{{ route('admin.vendors.index', ['status' => 'rejected']) }}"
                                class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                            <a href="{{ route('admin.vendors.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                {{-- <h3>{{ $allPendingVendorsCount }}</h3> --}}

                                <p>Pending Vendors </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-load-a"></i>
                            </div>
                            {{-- <a href="{{ route('admin.vendors.index', ['status' => 'pending']) }}"
                                class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                            <a href="{{ route('admin.vendors.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
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
