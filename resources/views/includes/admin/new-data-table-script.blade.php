@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush


<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    let url = @json($url);
    let defaultOrder = []; // fallback order
    $(document).ready(function() {

        // initialize Datatables
        table = $('#example1').DataTable({
            serverSide: true,
            ajax: url,
            columns: columns,
            order: typeof order !== 'undefined' ? order : defaultOrder
        })
    });
</script>
