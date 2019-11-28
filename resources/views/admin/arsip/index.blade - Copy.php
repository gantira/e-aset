@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">{{ $user->profile->nama_sekolah }}</h3>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
	                <div class="panel panel-default">
						<div class="panel-heading">Aset Kib A</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Register</th>
										<th>Luas M2</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($user->arsip_kiba as $row)
										<tr>
											<td>{{ $row->kode_barang }}</td>
											<td>{{ $row->nama_barang }}</td>
											<td>{{ $row->register }}</td>
											<td>{{ $row->luas_m2 }}</td>
											<td>{{ $row->status }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>

					  </div>
					</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
	                <div class="panel panel-default">
						<div class="panel-heading">Aset Kib B</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Register</th>
										<th>Ukuran</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($user->arsip_kibb as $row)
										<tr>
											<td>{{ $row->kode_barang }}</td>
											<td>{{ $row->nama_barang }}</td>
											<td>{{ $row->register }}</td>
											<td>{{ $row->ukuran }}</td>
											<td>{{ $row->status }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>

					  </div>
					</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
	                <div class="panel panel-default">
						<div class="panel-heading">Aset Kib C</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Register</th>
										<th>Kondisi</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($user->arsip_kibc as $row)
										<tr>
											<td>{{ $row->kode_bangunan }}</td>
											<td>{{ $row->nama_bangunan }}</td>
											<td>{{ $row->register }}</td>
											<td>{{ $row->kondisi }}</td>
											<td>{{ $row->status }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>

					  </div>
					</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
	                <div class="panel panel-default">
						<div class="panel-heading">Aset Perpustakaan</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Kategori</th>
										<th>Jumlah Unit</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($user->arsip_perpustakaan as $row)
										<tr>
											<td>{{ $row->kode_buku }}</td>
											<td>{{ $row->nama_buku }}</td>
											<td>{{ $row->pengarang }}</td>
											<td>{{ $row->penerima }}</td>
											<td>{{ $row->status }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>

					  </div>
					</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
	                <div class="panel panel-default">
						<div class="panel-heading">Aset Tumbuhan & Hewan</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Kode Buku</th>
										<th>Nama Buku</th>
										<th>Kuantitas</th>
										<th>Harga</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($user->arsip_tumbuhanhewan as $row)
										<tr>
											<td>{{ $row->kode_tumbuhanhewan }}</td>
											<td>{{ $row->nama_tumbuhanhewan }}</td>
											<td>{{ $row->nomor_register }}</td>
											<td>{{ $row->jenis_tumbuhanhewan }}</td>
											<td>{{ $row->status }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>

					  </div>
					</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
	                <div class="panel panel-default">
						<div class="panel-heading">Aset Kesenian</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Kode Buku</th>
										<th>Nama Buku</th>
										<th>Pengarang</th>
										<th>Penerima</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($user->arsip_kesenian as $row)
										<tr>
											<td>{{ $row->kode_barang }}</td>
											<td>{{ $row->nama_barang }}</td>
											<td>{{ $row->nomor_register }}</td>
											<td>{{ $row->jenis_barang }}</td>
											<td>{{ $row->status }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>

					  </div>
					</div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

@stop