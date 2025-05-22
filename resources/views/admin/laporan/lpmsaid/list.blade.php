@extends('layout.layout')

@section('content')

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Laporan Barang Keluar MSaid</h4>
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
						<a href="#">Laporan</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Barang Keluar MSaid</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Laporan Barang Keluar MSaid</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCetak">
									<i class="fa fa-print"></i>
									Cetak Data
								</button>
							</div>
						</div>
						<div class="card-body">							
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>No Transaksi</th>
											<th>Barang</th>
                                            <th>Kategori</th>
                                            <th>Tgl</th>
                                            <th>Qty</th>
											<th>Total</th>
											
										</tr>
									</thead>									
									<tbody>
                                        @php $no=1 @endphp
                                        @foreach ( $data_barang_keluar_msaid as $row)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $row->no_transaksi_keluar_msaid }}</td>
											<td>{{ $row->nama_barang }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ date('d/M/Y', strtotime($row->tgl_keluar_msaid)) }}</td>
                                            <td>{{ $row->qty_keluar_msaid }} gram / pack</td>
                                            <td>Rp. {{ number_format($row->total_keluar_msaid) }}</td>
											
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<!-- Modal -->
<div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Cetak</span> 
					<span class="fw-light">
						Data
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="lapbarangkeluarmsaid/cetakkeluarmsaid" target="_blank" enctype="multipart/form-data">
            @csrf
			<div class="modal-body">
												
					
				<div class="form-group">
					<label>Tgl Mulai</label>
					<input type="date" class="form-control" name="tgl_mulai" required>
				</div>
                
                <div class="form-group">
					<label>Tgl akhir</label>
					<input type="date" class="form-control" name="tgl_selesai" required>
				</div>
                
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>Cetak</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
			</div>
			</form>
		</div>
	</div>
</div>


@endsection