@extends('layouts.admin-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <h6 style="text-transform:uppercase;text-align: center;font-weight: bolder;margin-top:2em;">Prices</h6>
            {{--<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>--}}
        </div>
        {{--'service','description','vehicle_type_id','price','service_type'--}}
        <div class="row" style="margin-left: 2em;margin-right: 2em;">
            <div class="col s12">
                <table class="table table-bordered" style="width: 100%!important;" id="prices-table">
                    <thead>
                    <tr>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Vehicle Type</th>
                        <th>Service Type</th>
                        <th>Price</th>
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
                <h4>Add New Price</h4>
                <div class="row">

                    <form class="col s12">
                        @csrf
                        <div class="row">
                            <div class="input-field col m6">
                                <input id="service" type="text" class="validate">
                                <label for="service">Service Name</label>
                            </div>

                            <div class="input-field col m6 s12">
                                <textarea id="description" class="materialize-textarea"></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m6">
                                <select id="vehicle_type_id">
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                                    @endforeach
                                </select>
                                <label>Vehicle Type</label>
                            </div>
                            <div class="input-field col m6">
                                <select id="service_type">
                                    <option value="standard">Standard Service</option>
                                    <option value="extras">Extras</option>
                                </select>
                                <label>Service Type</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col m6">
                                <input id="price" type="number" step="0.01" class="validate">
                                <label for="price">Price</label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn">Cancel<i class="material-icons right">close</i> </a>
                <button class="btn waves-effect waves-light" style="margin-left:2em;" id="save-price" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
    @push('custom-scripts')

        <script>
            $(document).ready(function () {
                $(function () {
                    $('#prices-table').DataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
                        responsive: true,
                        scrollX: 640,
                        ajax: '{{route('get-prices')}}',
                        columns: [
                            {data: 'service', name: 'service'},
                            {data: 'description', name: 'description'},
                            {data:'vehicle.name',name:'vehicle.name'},
                            {data: 'service_type', name: 'service_type'},
                            {data: 'price', name: 'price'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });
                    $('select[name="prices-table_length"]').css("display","inline");
                });

            });
            $('#save-price').on('click',function(){
                let formData = new FormData();
                formData.append('service', $('#service').val());
                formData.append('description', $('#description').val());
                formData.append('vehicle_type_id', $('#vehicle_type_id').val());
                formData.append('service_type', $('#service_type').val());
                formData.append('price', $('#price').val());
                console.log("price ", formData);

                $.ajax({
                    url: "{{ route('prices.store') }}",
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
