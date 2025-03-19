@extends('layouts.vendor-store.app')
@section('title', 'All Notifications')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Notifications</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                                {{-- <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create
                                        Category</a>
                                </div> --}}
                            </div>

                            <div class="card-body">
                                @forelse ($notifications as $notification)
                                    <a href="{{ $notification['data']['url'] }}" class="dropdown-item">
                                        <i class="fas fa-envelope mr-2"></i>
                                        {{ $notification['data']['title'] }}
                                        <p class="txt"> {{ $notification['data']['message'] }}</p>

                                        <div class="row d-flex align-items-center" style="justify-content: end">
                                            <span
                                                class="text-muted text-sm">{{ $notification['created_at']->diffForHumans() }}</span>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @empty
                                @endforelse
                                <div class="row">
                                    <div class="mt-4">
                                        {{ $notifications->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
