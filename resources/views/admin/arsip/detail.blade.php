@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Aset {{ $user->profile->nama_sekolah }}</h1>
                    @include('session.info', ['alert' => 'default'])

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>

            @if (!($user->kiba->count()+$user->kibb->count()+$user->kibc->count()+$user->perpustakaan->count()+$user->tumbuhanhewan->count()+$user->Kesenian->count()))
            	<center><i class="text mute">Tidak mempunyai aset</center>
            @endif
            <!-- /.row -->
            @if ($user->kiba->count())
            <div class="row">
                <div class="col-lg-12">
                	<p><span class="label label-default">{{ $user->kiba->count() }} Aset Kiba</span></p>
                    <table class="table table-hover table-bordered">
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
                <!-- /.col-lg-12 -->
            </div>
            @endif
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        <!-- /.row -->
        @if ($user->kibb->count())
        	{{-- expr --}}
            <div class="row">
                <div class="col-lg-12">
                	<p><span class="label label-default">{{ $user->kibb->count() }} Aset Kibb</span></p>
                	<table class="table table-hover table-bordered">
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
                <!-- /.col-lg-12 -->
            	</div>
           		<!-- /.row -->
     	    </div>
      	    <!-- /#page-wrapper -->
        @endif

        @if ($user->kibc->count())
        	
      	    <div class="row" >
                <div class="col-lg-12">
                <p><span class="label label-default">{{ $user->kibc->count() }} Aset Kibc</span></p>
	            	<table class="table table-hover table-bordered">
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
            <!-- /.row -->
        </div>
        @endif

        @if ( $user->perpustakaan->count())
        	
        <div class="row">
                <div class="col-lg-12">
                	<p><span class="label label-default">{{ $user->perpustakaan->count() }} Aset Perpustakaan</span></p>
			                    <table class="table table-hover table-bordered">
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        @endif

        @if ($user->tumbuhanhewan->count())
        	
        <div class="row">
                <div class="col-lg-12">
                	<p><span class="label label-default">{{ $user->tumbuhanhewan->count() }} Asset Tumbuhan & Hewan</span></p>
			                    <table class="table table-hover table-bordered">
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        @endif

        @if ($user->kesenian->count())
        	
        <div class="row">
                <div class="col-lg-12">
                	<p><span class="label label-default">{{ $user->kesenian->count() }} Asset Kesenian</span></p>
			                    <table class="table table-hover table-bordered">
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        @endif
@stop