@extends('layouts.app')

@section('content')
<div class="border-success">
    <div class="card-header bg-success text-white">
        <strong><i class="fa fa-database"></i> Service Anda </strong>
    </div>
    <div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @can('service-create')
                <a class="btn btn-primary" href="{{ route('service.create') }}"> Tambah Service</a>
                @endcan
		        <a href="/cetak-pdf" class="btn btn-danger">CETAK PDF</a>
                <a href="/export-excel" class="btn btn-success my-3" target="_blank">CETAK EXCEL</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
    @can('role-create')
    <table class="table cart">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Deskripsi</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($service as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->deskripsi }}</td>
	        <td>
                <form action="{{ route('service.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('service.show',$product->id) }}">Lihat</a>
                    @can('service-edit')
                    <a class="btn btn-primary" href="{{ route('service.edit',$product->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('service-delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    @else
        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Deskripsi</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($service as $product)
        @if(Auth::user()->id==$product->usersId)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->deskripsi }}</td>
	        <td>
                <form action="{{ route('service.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('service.show',$product->id) }}">Lihat</a>
                    @can('service-edit')
                    <a class="btn btn-primary" href="{{ route('service.edit',$product->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('service-delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    @endcan
                </form>
	        </td>
	    </tr>
        @endif
	    @endforeach
    </table>
    @endif
    </div>
</div>
</div>
    {!! $service->links() !!}
<p class="text-center text-primary"><small>Kelompok 05 Proyek PSW 2</small></p>
@endsection


