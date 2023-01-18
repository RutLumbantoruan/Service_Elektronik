@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card border-success">
            <div class="card-header bg-success text-white">
                <strong><i class="fa fa-database"></i> Lihat Detail Transaksi</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nama</th>
                                <td>{{$transaksi->name}}</td>
                            </tr>     
                            <tr>
                                <th>Jenis Pembayaran</th>
                                <td>{{$transaksi->jenis}}</td>
                            </tr>   
                            <tr>
                                <th>Nama Toko Yang Dipilih</th>
                                <td>{{$transaksi->namaToko}}</td>
                            </tr>   
                            <tr>
                                <th>No Hp</th>
                                <td><a href="https://api.whatsapp.com/send?phone=62{{$transaksi->noHp}}" class="col md-3 btn btn-success" target="_blank">Hubungi WhatsApp</a></td>
                            </tr>  
                        </table>
                    </div>
                </div>
            </div>
    <a href="{{ route('transaksi.index') }}" class="btn btn-success m-2">Kembali</a>
</div>

    <p class="text-center text-primary"><small>Kelompok 5 Proyek Psw 2</small></p>
@endsection
