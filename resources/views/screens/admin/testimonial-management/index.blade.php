@extends('layouts.admin.app')
@push('styles')
    @include('includes.admin.data-table-css')
@endpush
@section('title', 'Testimonials')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Testimonials</h1>
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
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">Create
                                        Testimonial</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Featured Image: activate to sort column descending">
                                                Title
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Blog's Category: activate to sort column descending">
                                                Description</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Actions: activate to sort column descending">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testimonials as $testimonial)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $testimonial->name }}</td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {!! $testimonial->description !!}</td>
                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('admin.testimonial.edit', $testimonial->slug) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form
                                                        action="{{ route('admin.testimonial.delete', $testimonial->slug) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="button" id="delete-btn"
                                                            class="btn btn-danger">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    @include('includes.admin.data-table-scripts')
    @include('includes.admin.scripts.delete-script')
@endsection
