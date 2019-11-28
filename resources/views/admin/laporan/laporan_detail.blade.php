@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Laporan Aset {{ $user->profile->nama_sekolah }}
                    @if ($periode)
                    	<h4>Periode
	                    @if ($periode==1)
	                    	Januari - Maret
	                    @elseif($periode==2)
	                    	April - Juni
						@elseif($periode==3)
							Juli - September
						@elseif($periode==4)
							Aktober - Desember
	                    @endif
	                    Tahun {{ $tahun }}
	                    </h4>
	                    <h6>Kwartal {{ $periode }}</h6>
	                @else
	                	<h4>All Aset</h4>
                    @endif
                   		
                    </h1>
                    <p><a href="javascript:void(0)" onclick="window.print()">Print</a></p>
                    @include('session.info', ['alert' => 'success'])

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<div class="panel-group">
					    <div class="panel panel-success">
					     	<div class="panel-heading">{{ $user->kiba->count() }} Aset Kiba</div>
					     	<div class="panel-body">
			                    <table class="table table-condensed table-striped table-hover table-bordered">
				                	<thead>	
				                    	<tr>
					                    	<th>Nama Sekolah</th>
					                    	<th>Kode Barang</th>
					                    	<th>Nama Barang</th>
					                    	<th>Register</th>
					                    	<th>Luas (m2)</th>
					                    	<th>Tanah Pengadaan</th>
					                    	<th>Letak Alamat</th>
					                    	<th>Status Tanah</th>
					                    	<th>Penggunaan</th>
					                    	<th>Asal Usul</th>
					                    	<th>Harga</th>
					                    	<th>Tanggal</th>
					                    	<th>Keterangan</th>
					                    	<th>Umur</th>
					                    	<th>Status</th>
				                    	</tr>
				                    </thead>
				                    <tbody>
				                    @foreach($user->kiba as $row)
				                    	<tr>
				                    		<td>{{ $row->profile->nama_sekolah }}</td>
				                    		<td>{{ $row->kode_barang }}</td>
				                    		<td>{{ $row->nama_barang }}</td>
				                    		<td>{{ $row->register }}</td>
				                    		<td>{{ $row->luas_m2 }}</td>
				                    		<td>{{ $row->tanah_pengadaan }}</td>
				                    		<td>{{ $row->letak_alamat }}</td>
				                    		<td>{{ $row->status_tanah }}</td>
				                    		<td>{{ $row->penggunaan }}</td>
				                    		<td>{{ $row->asal_usul }}</td>
				                    		<td>{{ $row->harga }}</td>
				                    		<td>{{ $row->tanggal }}</td>
				                    		<td>{{ $row->keterangan }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
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

        <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<div class="panel-group">
					    <div class="panel panel-success">
					     	<div class="panel-heading">{{ $user->kibb->count() }} Asset Kibb</div>
					     	<div class="panel-body">
								<table class="table table-condensed table-striped table-hover table-bordered">
									<thead>	
										<th>Nama Sekolah</th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Register</th>
										<th>Ukuran</th>
										<th>Bahan</th>
										<th>Nomor</th>
										<th>Asal Usul</th>
										<th>Harga</th>
										<th>Tanggal Pembelian</th>
										<th>Keterangan</th>
										<th>Umur</th>
										<th>Status</th>
									</thead>
									<tbody>
									@foreach($user->kibb as $row)
										<tr>
											<td>{{ $row->profile->nama_sekolah }}</td>
											<td>{{ $row->kode_barang }}</td>
											<td>{{ $row->nama_barang }}</td>
											<td>{{ $row->register }}</td>
											<td>{{ $row->ukuran }}</td>
											<td>{{ $row->bahan }}</td>
											<td>{{ $row->nomor }}</td>
											<td>{{ $row->asal_usul }}</td>
											<td>{{ $row->harga }}</td>
											<td>{{ $row->tanggal }}</td>
											<td>{{ $row->keterangan }}</td>
											<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
											<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
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

      	    <div class="row" >
                <div class="col-lg-12">
	            	<div class="panel-group">
					    <div class="panel panel-success">
					     	<div class="panel-heading">{{ $user->kibc->count() }} Asset Kibc</div>
					     	<div class="panel-body">
				                <table class="table table-condensed table-striped table-hover table-bordered">
				                	<thead>	
				                		<tr>
				                			<th>Nama Sekolah</th>
					                    	<th>Kode Bangunan</th>
					                    	<th>Nama Bangunan</th>
					                    	<th>Register</th>
					                    	<th>Kondisi</th>
					                    	<th>Konstruksi</th>
					                    	<th>Luas M2</th>
					                    	<th>Letak Alamat</th>
					                    	<th>Status Tanah</th>
					                    	<th>Nomor Kode Tanah</th>
					                    	<th>Asal Usul</th>
					                    	<th>Harga</th>
					                    	<th>Tanggal Pembangunan</th>
					                    	<th>Keterangan</th>
					                    	<th>Umur</th>
					                    	<th>Status</th>
				                		</tr>
				                    </thead>
				                    <tbody>
				                    @foreach($user->kibc as $row)
				                    	<tr>
				                    		<td>{{ $row->profile->nama_sekolah }}</td>
				                    		<td>{{ $row->kode_bangunan }}</td>
				                    		<td>{{ $row->nama_bangunan }}</td>
				                    		<td>{{ $row->register }}</td>
				                    		<td>{{ $row->kondisi }}</td>
				                    		<td>{{ $row->konstruksi1 }} - {{ $row->konstruksi2 }}</td>
				                    		<td>{{ $row->luas_m2 }}</td>
				                    		<td>{{ $row->letak_alamat }}</td>
				                    		<td>{{ $row->status_tanah }}</td>
				                    		<td>{{ $row->nomor_kode_tanah }}</td>
				                    		<td>{{ $row->asal_usul }}</td>
				                    		<td>{{ $row->harga }}</td>
				                    		<td>{{ $row->tanggal_pembangunan }}</td>
				                    		<td>{{ $row->keterangan }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal_pembangunan)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
				                    	</tr>
				                    @endforeach
				                    </tbody>
				                </table>
				            </div>
				        </div>
				    </div>
            </div>
            <!-- /.row -->
        </div>

        <div class="row">
                <div class="col-lg-12">
                	<div class="panel-group">
					    <div class="panel panel-success">
					     	<div class="panel-heading">{{ $user->perpustakaan->count() }} Asset Perpustakaan</div>
					     	<div class="panel-body">
			                    <table class="table table-condensed table-striped table-hover table-bordered">
			                    	<thead>	
			                    		<th>Nama Sekolah</th>
				                    	<th>Kode Buku</th>
				                    	<th>Nama Buku</th>
				                    	<th>Pengarang</th>
				                    	<th>Penerima</th>
				                    	<th>Keluar</th>
				                    	<th>Sisa</th>
				                    	<th>Tanggal</th>
				                    	<th>Keterangan</th>
				                    	<th>Umur</th>
				                    	<th>Status</th>
				                    </thead>
				                    <tbody>
				                    @foreach($user->perpustakaan as $row)
				                    	<tr>
				                    		<td>{{ $row->profile->nama_sekolah }}</td>
				                    		<td>{{ $row->kode_buku }}</td>
				                    		<td>{{ $row->nama_buku }}</td>
				                    		<td>{{ $row->pengarang }}</td>
				                    		<td>{{ $row->penerima }}</td>
				                    		<td>{{ $row->keluar }}</td>
				                    		<td>{{ $row->sisa }}</td>
				                    		<td>{{ $row->tanggal }}</td>
				                    		<td>{{ $row->keterangan }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
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

        <div class="row">
                <div class="col-lg-12">
                	<div class="panel-group">
					    <div class="panel panel-success">
					     	<div class="panel-heading">{{ $user->tumbuhanhewan->count() }} Asset Tumbuhan & Hewan</div>
					     	<div class="panel-body">
			                    <table class="table table-condensed table-striped table-hover table-bordered">
			                    	<thead>	
			                    		<th>Nama Sekolah</th>
				                    	<th>Kode Tumbuhan/hewan</th>
				                    	<th>Nama Tumbuhan/hewan</th>
				                    	<th>Nomor Register</th>
				                    	<th>Jenis Tumbuhan/hewan</th>
				                    	<th>Ukuran</th>
				                    	<th>Jumlah</th>
				                    	<th>Tanggal</th>
				                    	<th>Keterangan</th>
				                    	<th>Umur</th>
				                    	<th>Status</th>
				                    </thead>
				                    <tbody>
				                    @foreach($user->tumbuhanhewan as $row)
				                    	<tr>
				                    		<td>{{ $row->profile->nama_sekolah }}</td>
				                    		<td>{{ $row->kode_tumbuhanhewan }}</td>
				                    		<td>{{ $row->nama_tumbuhanhewan }}</td>
				                    		<td>{{ $row->nomor_register }}</td>
				                    		<td>{{ $row->jenis_tumbuhanhewan }}</td>
				                    		<td>{{ $row->ukuran }}</td>
				                    		<td>{{ $row->jumlah }}</td>
				                    		<td>{{ $row->tanggal }}</td>
				                    		<td>{{ $row->keterangan }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
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

        <div class="row">
                <div class="col-lg-12">
                	<div class="panel-group">
					    <div class="panel panel-success">
					     	<div class="panel-heading">{{ $user->kesenian->count() }} Asset Kesenian</div>
					     	<div class="panel-body">
			                    <table class="table table-condensed table-striped table-hover table-bordered">
			                    	<thead>	
			                    		<th>Nama Sekolah</th>
				                    	<th>Kode Barang</th>
				                    	<th>Nama Barang</th>
				                    	<th>Nomor Register</th>
				                    	<th>Jenis Barang</th>
				                    	<th>Ukuran</th>
				                    	<th>Jumlah</th>
				                    	<th>Aktivasi Dana</th>
				                    	<th>Umur</th>
				                    	<th>Status</th>
				                    </thead>
				                    <tbody>
				                    @foreach($user->kesenian as $row)
				                    	<tr>
				                    		<td>{{ $row->profile->nama_sekolah }}</td>
				                    		<td>{{ $row->kode_barang }}</td>
				                    		<td>{{ $row->nama_barang }}</td>
				                    		<td>{{ $row->nomor_register }}</td>
				                    		<td>{{ $row->jenis_barang }}</td>
				                    		<td>{{ $row->ukuran }}</td>
				                    		<td>{{ $row->jumlah }}</td>
				                    		<td>{{ $row->aktivasi_dana }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
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
@stop