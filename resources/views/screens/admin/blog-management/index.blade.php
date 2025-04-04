@extends('layouts.admin.app')
@push('styles')
    @include('includes.admin.data-table-css')
@endpush
@section('title', 'Blogs')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Blogs</h1>
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
                                    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Add Blog</a>
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
                                                Blog Image
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">
                                                Name</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Actions: activate to sort column descending">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr class="odd">
                                                <td>
                                                    @if ($blog->getFirstMediaUrl('blog_image'))
                                                        <img src="{{ $blog->getFirstMediaUrl('blog_image') }} "
                                                            alt="blog Image" style="max-width: 100px; max-height: 100px;">
                                                    @else
                                                        No Image Found
                                                    @endif
                                                </td>

                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $blog->name }}</td>

                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('admin.blog.edit', $blog->slug) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('admin.blog.delete', $blog->slug) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger" id="delete-btn">Delete</button>
                                                    </form>
                                                    <a href="{{ route('admin.blog.show', $blog->slug) }}"
                                                        class="btn btn-info">Details</a>
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
