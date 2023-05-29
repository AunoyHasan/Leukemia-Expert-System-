@extends('layouts.app')

<div class="card" align="center" style="color: green">
    <h5>Welcome {{ Session::get('logged_name') }} To The Dashboard</h5>
</div>

<br>

@section('title', 'Dashboard')

@section('content')
    <div class="card " style="width: 100%">
        <div class="card-header d-flex justify-content-between align-items-center">
            <p class="m-0">Patient lists</p>
            <a href="{{ route('patient.create') }}" title="create" class="btn btn-sm btn-info">Create Patient</a>
        </div>
        <div class="card-body">
            <div align="center">
                @if(Session::has('message'))<span class="alert alert-info">{{Session::get('message')}}</span><br><br>@endif
            </div>

            <table id="table" class="table table-bordered data-table" >
                <thead>
                    <tr>
                        <th scope="col" width="50px">Id</th>
                        <th scope="col" width="300px">Name</th>
                        <th scope="col">Email</th>
                        <th>Status</th>
                        <th scope="col" width="500px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('jquery/jQuery.js') }}"></script>
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            info:true,
            ajax:"{{ route('patient.list') }}",
            'pageLength': 10,
            'aLengthMenu': [[10,25,50,-1],[10,25,50,'All']],
            columns: [
                // {data:'id',name:'id'},
                {data:'DT_RowIndex',name:'DT_RowIndex'},
                {data: 'name', name: 'name',orderable: true, searchable: true},
                {data: 'email', name: 'email',orderable: true, searchable: true},
                {data: 'status',name: 'status',orderable: false,searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        // Change status alert
        function statusConfirm(id) {
            event.preventDefault();
            swal({
                title: `Are you sure?`,
                text: 'You want to change patient status ?',
                buttons: true,
                dangerMode: true,
            }).then((willChangeStatus) => {
                if (willChangeStatus) {
                    changeStatus(id);
                }
            });
        }

        // Change status
        function changeStatus(id) {
            var url = '{{ route("patient.change-status", ":id") }}';
            $.ajax({
                url: url.replace(':id', id ),
                method: "PUT",
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function(response) {
                    if (response.success === true) {
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                    }
                },
                error: function(error) {
                    alert(error);
                }
            });
        }

    </script>
@endsection
