@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create Data Barang Keluar</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Create Data Barang Keluar</h4>
                            </div>
                        </div>
                        <form method="POST" action="/juanda/store">
                        @csrf
                        <div class="card-body">

                            <input type="hidden" id="id" name="id_barang">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="nama_barang" readonly placeholder="Nama Barang ..." required>
                                            <div class="input-group-prepend">
                                                <button type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary"> RP</button>
                                            </div>
                                            <input type="text" class="form-control" id="harga" placeholder="Harga ..." readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="stok" class="form-control" placeholder="Stok ..." readonly required>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary"> gram / Pcs</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Qty Keluar</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="qty_keluar_juanda" id="qty_keluar_juanda" placeholder="Qty Keluar ..." required>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary"> gram / Pcs</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Transaksi</label>
                                        <input type="text" class="form-control" value="{{ $no_transaksi_keluar_juanda }}" name="no_transaksi_keluar_juanda" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tgl Keluar</label>
                                        <input type="date" class="form-control" name="tgl_keluar_juanda" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" class="form-control" placeholder="Total ..." id="total_keluar_juanda" name="total_keluar_juanda" readonly required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                            <a href="/juanda" class="btn btn-danger"><i class="fa fa-undo"></i> Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Tambah</span>
                    <span class="fw-light">
                        Barang
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp
                            @foreach ($data_barang as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_barang }}</td>
                                <td>{{ $row->nama_kategori }}</td>
                                <td>{{ $row->stok }} Pcs</td>
                                <td>Rp. {{ number_format($row->harga) }}</td>
                                <td>
                                    <center>
                                        <button class="btn btn-xs btn-primary" id="pilihBarang"
                                             data-id="{{ $row->id }}"
                                             data-nama_barang="{{ $row->nama_barang }}"
                                             data-harga="{{ $row->harga }}"
                                             data-stok="{{ $row->stok }}">
                                             <i class="fa fa-check-circle"></i> Pilih
                                        </button>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#pilihBarang', function() {
            var id          = $(this).data('id');
            var nama_barang = $(this).data('nama_barang');
            var harga       = $(this).data('harga');
            var stok        = $(this).data('stok');
            $('#id').val(id);
            $('#nama_barang').val(nama_barang);
            $('#harga').val(harga);
            $('#stok').val(stok);
            $('#modalTambah').modal('hide');
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#harga, #qty_keluar_juanda").keyup(function() {
            var harga      = $("#harga").val();
            var qty_keluar_juanda = $("#qty_keluar_juanda").val();

            var total_keluar_juanda = parseInt(harga) * parseInt(qty_keluar_juanda);
            $("#total_keluar_juanda").val(total_keluar_juanda);
        });
    });
</script>

@endsection
