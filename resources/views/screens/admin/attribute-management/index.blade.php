@extends('layouts.admin.app')
@push('styles')
    @include('includes.admin.data-table-css')
@endpush
@section('title', 'Attributes')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Attributes</h1>
                    </div>


                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-6 ">

                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                                <div class=" d-flex justify-content-end">
                                    <a href="{{ route('admin.attribute.create') }}" class="btn btn-primary">Create New
                                        Attribute</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ID</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Name</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attributes as $attribute)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $attribute->id }}</td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $attribute->name }}</td>
                                                <td>
                                                    <div class="d-flex gap-20">
                                                        <a href="{{ route('admin.attribute.edit', $attribute->slug) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <form
                                                            action="{{ route('admin.attribute.delete', $attribute->slug) }}"
                                                            method="POST" id="delete-form">
                                                            @csrf
                                                            <button type="button" class="btn btn-danger"
                                                                id="delete-btn">Delete</button>
                                                        </form>
                                                        <a href="{{ route('admin.attribute.details', $attribute->slug) }}"
                                                            class="btn btn-primary">Details</a>
                                                    </div>
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
