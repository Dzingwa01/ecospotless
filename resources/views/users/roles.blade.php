@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:2em;">Users</h6>
            {{--<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>--}}
        </div>
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12">
                <table class="table table-bordered" style="width: 100%!important;" id="users-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{--<th>Job Title</th>--}}
                        <th>System Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large teal tooltipped btn modal-trigger" data-position="left" data-tooltip="Add New User" href="#modal1">
                <i class="large material-icons">add</i>
            </a>

        </div>
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Add New User</h4>
                <div class="row">

                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Name</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="surname" type="text" class="validate">
                                <label for="surname">Surname</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col m6">
                                <input id="contact_number" type="tel" class="validate">
                                <label for="contact_number">Contact Number</label>
                            </div>
                        </div>
                        <div class="row">
                            {{--<div class="input-field col m6">--}}
                                {{--<input id="job_title" type="text" class="validate">--}}
                                {{--<label for="job_title">Job Title</label>--}}
                            {{--</div>--}}
                            <div class="input-field col m6">
                                <select id="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <label>System Role</label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn">Cancel<i class="material-icons right">close</i> </a>
                <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-user" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
    @push('custom-scripts')

        <script>
            $(document).ready(function () {
                $(function () {
                    $('#users-table').DataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
                        responsive: true,
                        scrollX: 640,
                        ajax: '{{route('get-users')}}',
                        columns: [
                            {data: 'name', name: 'name'},
                            {data: 'surname', name: 'surname'},
                            {data: 'email', name: 'email'},
                            {data: 'contact_number', name: 'contact_number'},
//                            {data: 'job_title', name: 'job_title'},
                            {data:'roles[0].name',name:'roles[0].name'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });
                    $('select[name="users-table_length"]').css("display","inline");
                });

            });
            $('#save-user').on('click',function(){
                let formData = new FormData();
                formData.append('name', $('#name').val());
                formData.append('surname', $('#surname').val());
                formData.append('email', $('#email').val());
                formData.append('contact_number', $('#contact_number').val());
                formData.append('job_title', $('#job_title').val());
                formData.append('role_id', $('#role_id').val());
                console.log("user ", formData);

                $.ajax({
                    url: "{{ route('users.store') }}",
                    processData: false,
                    contentType: false,
                    data: formData,
                    type: 'post',

                    success: function (response, a, b) {
                        console.log("success",response);
                        alert(response.data.message);
                        window.location.reload();
                    },
                    error: function (response) {
                        console.log("error",response);
                        let message = error.response.data.message;
                        let errors = error.response.data.errors;

                        for (var error in   errors) {
                            console.log("error",error)
                            if( errors.hasOwnProperty(error) ) {
                                message += errors[error] + "\n";
                            }
                        }
                        alert(message);
                        $("#modal1").close();
                    }
                });
            });
        </script>
    @endpush
@endsection
