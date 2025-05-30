@extends('layouts.admin.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
@endpush
@section('title', 'Categories')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Categories</h1>
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
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create
                                        Category</a>
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
                                                Image
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Attributes
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $category->id }}</td>

                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $category->name }}</td>
                                                <td>
                                                    @if ($category->getFirstMediaUrl('category'))
                                                        <img src="{{ $category->getFirstMediaUrl('category') }} "
                                                            alt="Category Image"
                                                            style="max-width: 100px; max-height: 100px;">
                                                    @else
                                                        No Image Found
                                                    @endif
                                                </td>

                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    @forelse ($category->attributes as $attribute)
                                                        {{ $loop->iteration }}-{{ $attribute->name }}<br>
                                                    @empty
                                                    @endforelse
                                                </td>
                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('admin.category.edit', $category->slug) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('admin.category.delete', $category->slug) }}"
                                                        method="POST" id="delete-form">
                                                        @csrf
                                                        <button type="button" class="btn btn-danger"
                                                            id="delete-btn">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
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
    {{-- @include('includes.admin.data-table-scripts') --}}
    @include('includes.admin.scripts.delete-script')
    <script>
        let columns = [];
        // Define columns based on type

        columns = [{
                data: 'search_key',
                render: function(data, type, row) {

                    return row.id;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.name;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    if (row.image) {
                        return `
                                <img src="${row.image}" alt="blog Image" style="max-width: 100px; max-height: 100px;">
                        `;
                    } else {
                        return "No Image";
                    }
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {
                    if (row.attributes && row.attributes.length > 0) {
                        return row.attributes.map((attribute, index) => `${index + 1} - ${attribute.name}<br>`).join('');
                    } else {
                        return "No Attributes";
                    }
                }

            },

            {
                data: null,
                render: function(data) {
                    console.log(data);

                    return `
                       <div class="d-flex gap-20">
                                    <a href="{{ route('admin.category.edit', '') }}/${data.slug}"
                                        class="btn btn-primary">Edit</a>
                                    <form
                                        action="{{ route('admin.category.delete', '') }}/${data.slug}"
                                        method="POST" id="delete-form">
                                        @csrf
                                        <button type="button" class="btn btn-danger"
                                            id="delete-btn">Delete</button>
                                    </form>

                             </div>
                        `;
                },
            }
        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('admin.category.get.data')])
@endsection
