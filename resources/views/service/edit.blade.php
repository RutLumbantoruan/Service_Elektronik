@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Service</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('service.index') }}">Kembali</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan inputan<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('service.update',$service->id) }}" method="POST">
    	@csrf
        @method('PUT')


        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama:</strong>
		            <input type="text" name="name" value="{{ $service->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama Toko:</strong>
		            <input type="text" name="namaToko" class="form-control" placeholder="Nama Toko.." value="{{ $service->namaToko }}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>NoHp:</strong>
		            <input type="number" name="noHp" class="form-control" placeholder="Isi nomor hp.." value="{{ $service->noHp }}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Alamat:</strong>
		            <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat service anda.." value="{{ $service->alamat }}">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
					<label for="kategori" class="col-form-label">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" value="{{ $service->kategori }}">
                            <option value="Lagu Boti">LaguBoti</option>
                            <option value="Porsea">Porsea</option>
                            <option value="Lintong">Lintong</option>
                            <option value="Siborong-Borong">Siborong-Borong</option>
                        </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Deskripsi:</strong>
		            <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="deskripsi">{{ $service->deskripsi }}</textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Kelompok 5 Proyek Psw 2</small></p>
@endsection