@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:2em;">Vehicle Types</h6>
            {{--<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>--}}
        </div>
        {{--'service','description','vehicle_type_id','price','service_type'--}}
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12">
                <table class="table table-bordered" style="width: 100%!important;" id="vehicles-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large teal tooltipped btn modal-trigger" data-position="left" data-tooltip="Add New Price" href="#modal1">
                <i class="large material-icons">add</i>
            </a>

        </div>
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Add New Vehicle Type</h4>
                <div class="row">

                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="name" type="text" class="validate">
                                <label for="name">Vehicle Name</label>
                            </div>

                            <div class="input-field col m6 s12">
                                <textarea id="description" class="materialize-textarea"></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn">Cancel<i class="material-icons right">close</i> </a>
                <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-vehicle-type" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
    @push('custom-scripts')

        <script>
            $(document).ready(function () {
                $(function () {
                    $('#vehicles-table').DataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
                        responsive: true,
                        scrollX: 640,
                        ajax: '{{route('get-vehicles')}}',
                        columns: [
                            {data: 'name', name: 'name'},
                            {data: 'description', name: 'description'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });
                    $('select[name="vehicles-table_length"]').css("display","inline");
                });

            });
            $('#save-vehicle-type').on('click',function(){
                let formData = new FormData();
                formData.append('name', $('#name').val());
                formData.append('description', $('#description').val());
                console.log("vehicles ", formData);

                $.ajax({
                    url: "{{ route('vehicle-types.store') }}",
                    processData: false,
                    contentType: false,
                    data: formData,
                    type: 'post',

                    success: function (response, a, b) {
                        console.log("success",response);
                        alert(response.message);
                        window.location.reload();
                    },
                    error: function (response) {
                        console.log("error",response);
                        let message = error.response.message;
                        let errors = error.response.errors;

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
