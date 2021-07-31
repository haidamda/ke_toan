<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <title>Datatables Example</title>
    <meta name=csrf-token content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin=anonymous>

</head>
<body>

<div class="container">
    <table class="table table-bordered datatable" id="datatable">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-editor-free@1.6.7/src/dataTables.altEditor.free.min.js?"></script>
{{--<script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js></script>--}}
{{--<script src=https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>--}}
{{--<script src=https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js></script>--}}

{{--<script src=https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js></script>--}}
</body>

<script type=text/javascript>
  // use a global for the submit and return data rendering in the examples

    $(document).ready(function() {
        var editor;
        editor = new $.fn.dataTable.Editor( {
            ajax: "{{ route('users.index') }}",
            table: "#datatable",
            fields: [ {
                label: "name:",
                name: "name"
            }, {
                label: "email:",
                name: "email"
            }
            ]
        } );

        // Activate an inline edit on click of a table cell
        $('#datatable').on( 'click', 'tbody td:not(:first-child)', function (e) {
            editor.inline( this );
        } );

        $('#datatable').DataTable( {
            dom: "Bfrtip",
            ajax: "{{ route('users.index') }}",
            order: [[ 1, 'asc' ]],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            select: {
                style:    'os',
                selector: 'td:first-child'
            },
            buttons: [
                { extend: "create", editor: editor },
                { extend: "edit",   editor: editor },
                { extend: "remove", editor: editor }
            ]
        } );
    } );
    {{--$('.datatable').DataTable({--}}
        {{--processing: true,--}}
        {{--serverSide: true,--}}
        {{--ajax: "{{ route('users.index') }}",--}}
        {{--columns: [--}}
            {{--{data: 'name', name: 'name'},--}}
            {{--{data: 'email', name: 'email'},--}}
            {{--{data: 'action', name: 'action', orderable: false, searchable: false},--}}
        {{--]--}}
    {{--});--}}
</script>
</html>