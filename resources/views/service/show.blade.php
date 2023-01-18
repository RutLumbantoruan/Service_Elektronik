@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card border-success">
            <div class="card-header bg-success text-white">
                <strong><i class="fa fa-database"></i> Lihat Detail Service</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nama</th>
                                <td>{{$service->name}}</td>
                            </tr>     
                            <tr>
                                <th>Nama Toko</th>
                                <td colspan="3">{{$service->namaToko}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$service->alamat}}</td>
                                <th>Kategori</th>
                                <td>{{$service->kategori}}</td>
                            </tr>   
                            <tr>
                                <th>No Hp</th>
                                <td>0{{$service->noHp}}</td>
                                <th>Nama Toko</th>
                                <td>{{$service->namaToko}}</td>
                            </tr>  
                        </table>
                    </div>
                    <div class="col-3">
                    <img src="{{asset('asset/gambar/'.$service['gambar'])}}" class="card-img-top image-list" alt="...">
                    </div>
                </div>
            </div>
    <a href="{{ route('service.index') }}" class="btn btn-success m-2">Kembali</a>
</div>

    <p class="text-center text-primary"><small>Kelompok 5 Proyek Psw 2</small></p>
@endsection
