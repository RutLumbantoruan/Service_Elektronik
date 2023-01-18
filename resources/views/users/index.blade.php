@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Tambah User</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<br>

<table class="table table-bordered" id="table_user">
<thead>
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">Lihat</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
  </tbody>
 @endforeach

</table>

<div class="bottommargin mx-auto" style="max-width: 750px; min-height: 350px;">
    <canvas id="chart-0"></canvas>
</div>

{!! $data->render() !!}

@endsection
<!--GRAFIK USER PERBULAN-->
@section('custom_js')
<script>
$('body').on('keyup','#search',function(){
    var searchUser =$(this).val();
    console.log(searchUser)
});
$(document).ready(function() {
    $('#table_user').dataTable();
});
var MONTHS = ["","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var color = Chart.helpers.color;
var barChartData = {
    labels: [
        @foreach($count_user AS $count)
            MONTHS[{{$count->bulan}}],
        @endforeach
    ],
    datasets: [{
        label: 'User',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [
            @foreach($count_user AS $count)
                {{$count->total}},
            @endforeach
        ]
    }]

};

window.onload = function() {
    var ctx = document.getElementById("chart-0").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Bar Chart'
            }
        }
    });

};

</script>
@endsection
