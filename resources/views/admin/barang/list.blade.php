@extends('layout.layout')

@section('content')

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Barang</h4>
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
						<a href="#">Data</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Barang</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">silahkan coret untuk kategori stok</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Barang</h4>
								<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
									<i class="fa fa-plus"></i>
									Tambah Data
								</button>
							</div>
						</div>
						<div class="card-body">							
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
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
                                        @foreach ( $data_barang as $row)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $row->nama_barang }}</td>
											<td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->stok }} gram / pack </td>
                                            <td>Rp. {{ number_format($row->harga) }}</td>
											<td>
												<a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
												<a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</a>
											</td>
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
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
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
			<form method="POST" action="barang/store" enctype="multipart/form-data">
            @csrf
			<div class="modal-body">
				
                <input type="hidden" name="stok" value="0" required>
				
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang..." required>
				</div>

                <div class="form-group">
					<label>Nama Kategori</label>
					<select class="form-control" name="id_kategori" required>
                        <option value="" hidden>-- Pilih Kategori --</option>
                        @foreach ($data_kategori as $z)
                            <option value="{{ $z->id }}">{{ $z->nama_kategori }}</option>   
                        @endforeach  
                    </select>
				</div>
                
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">RP</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Harga...." name="harga" required>
                    </div>
                </div>
                
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
			</div>
			</form>
		</div>
	</div>
</div>

@foreach ( $data_barang as $d)

<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Edit</span> 
					<span class="fw-light">
						Barang
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="barang/update{{ $d->id }}" enctype="multipart/form-data">
            @csrf
			<div class="modal-body">
				
				<input type="hidden" name="stok" value="{{ $d->stok }}" required>
				
				<div class="form-group">
					<label>Nama Barang</label>
					<input type="text" class="form-control" value="{{ $d->nama_barang }}" name="nama_barang" placeholder="Nama Barang..." required>
				</div>

                <div class="form-group">
					<label>Nama Kategori</label>
					<select class="form-control" name="id_kategori" required>
                        <option value="{{$d->id_kategori}}" hidden>{{ $d->nama_kategori }}</option>
                        @foreach ($data_kategori as $x)
                            <option value="{{ $x->id }}">{{ $x->nama_kategori }}</option>   
                        @endforeach  
                    </select>
				</div>
                
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">RP</span>
                        </div>
                        <input type="number" class="form-control" value="{{ $d->nama_harga }}"  placeholder="Harga...." name="harga" required>
                    </div>
                </div>

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save Changes</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
@endforeach

@foreach ( $data_barang as $b)

<div class="modal fade" id="modalHapus{{ $b->id }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					Hapus</span> 
					<span class="fw-light">
						Barang
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="GET" action="barang/destroy{{ $d->id }}" enctype="multipart/form-data">
            @csrf
			<div class="modal-body">
												
					
				<div class="form-group">
					<h4>Apakah Anda Ingin Hapus Data?</h4>
				</div>
                  
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endsection