
@section('modal')
<div id="ModalCreateTransaksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="CreateTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="CreateTransaksiLabel">Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form_create_transaksi">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="name_transaksi">Nama</label>
                                <input type="text" class="form-control" id="name_transaksi" name="name" placeholder="name" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="jenis_transaksi">Jenis</label>
                                <select id="jenis_transaksi" name="jenis" class="form-control" required>
                                    <option disabled selected>Pilih jenis pembayaran</option>
                                    <option value="Cash">Cash</option>
                                    <option value="ATM">ATM</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nohp_transaksi">Nomor HP</label>
                                <input type="number" class="form-control" id="nohp_transaksi" name="noHp" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nohp_transaksi">Nama Toko</label>
                                <input type="text" class="form-control" id="namatoko_transaksi" name="namaToko" required>
                            </div>
                        </div>
                        <button type="submit" id="tombol_kirim_transaksi"  onclick="upload_form_modal('#tombol_kirim_transaksi','#form_create_transaksi','{{route('transaksi_store')}}','#ModalCreateTransaksi');" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection