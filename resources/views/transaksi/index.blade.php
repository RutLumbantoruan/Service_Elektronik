@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transaksi</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('awal') }}" class="btn btn-success my-3">Kembali</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <input type="text" name="q" class="form-control my-3 search-input">
    </div>
    <br>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Jenis</th>
            <th>NoHp</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
	<tbody class="search-result">
        @foreach ($data as $product)
	    <tr>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->jenis }}</td>
            <td>{{ $product->noHp }}</td>
	        <td>
                <form action="{{ route('transaksi.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('transaksi.show',$product->id) }}">Lihat</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </tbody>  
    </table>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".search-input").on('keyup',function(){
            var _q=$(this).val();
            if(_q.length>=1){
                $.ajax({
                    url:"{{url('searchLive')}}",
                    data:{
                        q:_q
                    },
                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result").html('<li>Loading..</li>');
                    },  
                    success:function(res){
                        var _html='';
                        $.each(res.data,function(index,data){
                            _html+='<table class="table table-bordered"><tr><td>'+data.name+'</td><td>'+data.jenis+'</td><td>'+data.noHp+'</td><td><form action="{{ route("transaksi.destroy",$product->id) }}" method="POST"><a class="btn btn-success" href="{{ route("transaksi.show",$product->id) }}">Lihat</a>@csrf @method("DELETE")<button type="submit" class="btn btn-danger">Hapus</button></form></td></tr></table>';
                        });
                        $(".search-result").html(_html);
                    }
                })
            }
            else{
                return false;
            }
        });
    });
</script>
<p class="text-center text-primary"><small>Kelompok 05 Proyek PSW 2</small></p>
@endsection



