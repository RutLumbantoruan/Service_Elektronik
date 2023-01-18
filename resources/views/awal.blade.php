@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide rev_slider_wrapper" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="asset/gambar/about-us.jpg" alt="First slide" style="width: 100%;height:300px;">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="asset/gambar/logo.jpg" alt="Second slide" style="width: 100%;height:300px;">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="asset/gambar/Tukang-Service-Elektronik.png" alt="Second slide" style="width: 100%;height:300px;">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="asset/gambar/logo2.jpg" alt="Second slide" style="width: 100%;height:300px;">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><br><br>
<div class="container">
    <form id="form_filter">
        <select onchange="load_kategori();" name="kategori" class="form-control">
            <option value="" selected disabled>Pilih opsi</option>
            <option value="semua">Semua</option>
            <option value="Lagu Boti">Laguboti</option>
            <option value="Lintong">Lintong Nihuta</option>
            <option value="Porsea">Porsea</option>
            <option value="Siborong-Borong">Siborong-Borong</option>
        </select>
    </form>
<a class="btn btn-success" href="javascript:void(0);" onclick="open_modal('#ModalCreateTransaksi')" style="width: 20%;">Transaksi Service</a>
    <div class="container clearfix mt-2">
        @foreach($newServices as $service)
        <article class="portfolio-item pf-media">
            <div class="feature-box media-box">
                <div class="fbox-media">
                    <div class="portfolio-image">
                        <img src="{{asset('asset/gambar/'.$service['gambar'])}}" style="width:100%;height:250px;" class="card-img-top img-thumbnail">                              
                    <div class="portfolio-overlay">
                        <a href="{{ url('/lihat/'.$service->id)}}" data-lightbox="ajax" class="center-icon"><i class="icon-line-expand"></i></a>
                    </div>
                    </div>
                </div>
                <div class="fbox-desc">
                    <h3>Nama Toko : {{$service->namaToko}}<span class="subtitle"><a href="#"  style="color: #37b87c;"><b>Nama Pemilik: {{$service->name}}</b></a></span></h3>
                    <p><b>{{$service->alamat}}</b></p>
                    <a href="{{ url('/lihat/'.$service->id)}}" class="float-right" style="color: #37b87c;"><b> Detail >></b></a>
                </div>
            </div>
        </article>
        @endforeach
    </div>
    </div>
@endsection
@include('transaksi')
@section('custom_js')
<script type="text/javascript">
    function load_kategori(){
       let data = $('#form_filter').serialize();
       location.href = '?' + data;
    }
    function open_modal(id)
    {
        $(id).modal('show');
    }
</script>
@endsection
