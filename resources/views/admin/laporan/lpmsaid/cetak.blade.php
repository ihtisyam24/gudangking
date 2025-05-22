<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Laporan</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: white;" onload="window.print()">

    <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{-- <img src="/assets/images/profile/profile.png" style="position: absolute; width: 200px; height: 75px;"> --}}
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <span style="line-height: 1.6; font-weight: bold;">
                                    KING GROUP
                                    <br>Jl. Ir. H. Juanda, Air Putih, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243 
                                    <br>No Telp
                                </span>
                            </td>
                        </tr>
                    </table>

                    <hr class="line-title">
                    <p align="center">
                        <b>LAPORAN BARANG KELUAR</b><br/>
                    </p>

                    <hr/>

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Barang</th>
                            <th>Kategori</th>
                            <th>Tgl</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>

                        @php $no = 1 @endphp
                        @if($data_barang_keluar_msaid)

                        @foreach ($data_barang_keluar_msaid as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->no_transaksi_keluar_msaid }}</td>
                            <td>{{ $row->nama_barang }}</td>
                            <td>{{ $row->nama_kategori }}</td>
                            <td>{{ date('d/M/Y', strtotime($row->tgl_keluar_msaid)) }}</td>
                            <td>{{ $row->qty_keluar_msaid }} Pcs</td>
                            <td>Rp. {{ number_format($row->total_keluar_msaid) }}</td>
                        </tr>
                        @endforeach

                        @else

                        <tr>
                            <td colspan="7"><center>Data Tidak Ada</center></td>
                        </tr>

                        @endif

                        @if($total_barang_keluar)

                        <tr>
                            <th colspan="6">Seluruh Total</th>
                            <th>Rp. {{ number_format($total_barang_keluar) }}</th>
                        </tr>

                        @else

                        <tr>
                            <th colspan="6">Seluruh Total</th>
                            <th>Rp. 0</th>
                        </tr>

                        @endif
                    </table>

                </div>
            </div>

        </div>
    </div>

</body>
</html>
