
<table class="table table-bordered">
    <tr>
        {{-- <th>No</th> --}}
        <th>ID</th>
        <th>Name</th>
        <th>Deskripsi</th>
        <th>Gambar</th>
        {{-- <th width="280px">Action</th> --}}
    </tr>
    @foreach ($service as $product)
    <tr>
        {{-- <td>{{ ++$i }}</td> --}}
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->deskripsi }}</td>
        <td>{{ $product->gambar }}</td>
        <td>
            <form action="{{ route('service.destroy',$product->id) }}" method="POST">
                @csrf
                {{-- <a class="btn btn-info" href="{{ route('service.show',$product->id) }}">Lihat</a> --}}
                @can('product-edit')
                {{-- <a class="btn btn-primary" href="{{ route('service.edit',$product->id) }}">Edit</a> --}}
                @endcan

                @method('DELETE')
                @can('product-delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>

<p class="text-center text-primary"><small>Kelompok 5 Proyek Psw 2</small></p>

