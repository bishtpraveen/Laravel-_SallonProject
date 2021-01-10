@extends('service_provider.sp_layout')
@section('s_p-menu')
    

<style>
thead tr th{
    text-align:center;
}
</style>

<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="normal-table-list mg-t-30">
            <div class="basic-tb-hd">
                <h2>All Appointments</h2>
                <p>These are the appointments</p>
            </div>
            <div class="bsc-tbl-bdr">
                <table class="table table-bordered text-center table-striped">
                    <thead >
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Shop Name</th>
                            <th>Payment Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointment_data as $appointment_data)
                        <tr>
                            <td>{{$appointment_data->appoint_user_name}}</td>
                            <td>{{$appointment_data->appoint_user_email}}</td>
                            <td>{{$appointment_data->appoint_date}} </td>
                            <td>{{$appointment_data->appoint_time}} </td>
                            @foreach($shop_data as $shop_d)
                            @if($appointment_data->shop_appoint_id == $shop_d->id)
                            <td>{{$shop_d->shop_name}} </td>
                            @endif
                            @endforeach
                            @if($appointment_data->status == 1)
                            <td>Done </td>
                            @else
                            <td>Due</td>
                            @endif
                            <!-- <td>{{$appointment_data->appoint_time}} </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@section('s_p-footer')
    
    @endsection()
    
    
@endsection()
    