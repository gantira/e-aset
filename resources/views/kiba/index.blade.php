@extends('backend')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kib-A</h1>
                    @include('session.info', ['alert' => 'success'])

                    <button class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> New entry</button>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Dokumen
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ asset('doc/kiba.xls') }}">Format Dokumen</a></li>
						<li><a href="javascript:void(0)" data-toggle="modal" data-target="#myUpload">Upload Dokumen</a></li>
					</ul>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>
			
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
		           	<div class="panel-group">
					    <div class="panel panel-default">
					      <div class="panel-heading"></div>
					      <div class="panel-body">
					      		<table class="table table-hover table-bordered" id="dataTables">
				                	<thead>	
				                    	<tr>
					                    	<th>Kode Barang</th>
					                    	<th>Nama Barang</th>
					                    	<th>Letak Alamat</th>
					                    	<th>Umur</th>
					                    	<th>Status</th>
					                    	<th>Aksi</th>
				                    	</tr>
				                    </thead>
				                    <tbody>
				                    @foreach($user->kiba as $row)
				                    	<tr style="background-color: {{ $row->status == 'Ignored' ? '#fffae5': '' }}">
				                    		<td><a href="javascript:void(0)" onclick="view({{$row->id}})">{{ $row->kode_barang }}</a></td>
				                    		<td>{{ $row->nama_barang }}</td>
				                    		<td>{{ $row->letak_alamat }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
				                    		<td><a href="{{ url('kiba/edit/'.$row->id) }}">Edit</a> | <a href="{{ url('kiba/delete/'.$row->id) }}">Delete</a></td>
				                    	</tr>
				                    @endforeach
				                    </tbody>
				                </table>
					      </div>
					    </div>
				    </div>
		           		
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tambah Data</h4>
		      </div>
		      <div class="modal-body">
		        {{ Form::open(['url'=>'kiba', 'method'=>'post']) }}
		        	@include('kiba.form', ['some' => 'data'])

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      	{{ Form::submit('Simpan Aset', ['class'=>'btn btn-primary']) }}
		        {{ Form::close() }}
		      </div>
		    </div>

		  </div>
		</div>

		<!-- Modal Upload-->
		<div id="myUpload" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Upload Dokumen Kib A</h4>
		      </div>
		      <div class="modal-body">
		      	{{ Form::open(['url'=>'kiba/upload', 'files' => true]) }}
		        	{{ Form::file('xls') }}
		        	<br>
		        	{{ Form::submit('Import', ['class'=>'btn btn-default']) }}
		        {{ Form::close() }}
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>

		<!-- Detail  -->
		<div id="myView" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">View Data</h4>
		      </div>
		      <div class="modal-body">
		        	@include('kiba.form', ['some' => 'data'])
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>


@stop

@push('scripts')
	<script type="text/javascript">

		function view(id) {
			$('#myView').modal('show');
			var dataString = { 
                    id : id,
                    _token : '{{ csrf_token() }}'
            };
                
            $.ajax({
                url: "{{ URL('kiba/view') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	$('input[name=kode_barang]').val(data.kode_barang);
                	$('input[name=nama_barang]').val(data.nama_barang);
                	$('input[name=register]').val(data.register);
                	$('input[name=luas_m2]').val(data.luas_m2);
                	$('input[name=tanah_pengadaan]').val(data.tanah_pengadaan);
                	$('input[name=letak_alamat]').val(data.letak_alamat);
                	$('input[name=status_tanah]').val(data.status_tanah);
                	$('input[name=penggunaan]').val(data.penggunaan);
                	$('input[name=asal_usul]').val(data.asal_usul);
                	$('input[name=harga]').val(data.harga);
                	$('input[name=tanggal]').val(data.tanggal);
                	$('input[name=keterangan]').val(data.keterangan);
                    console.log(data);

                },
                error: function(data) {
                	console.log(data);
                }

            });

		}

		$('#myView').on('hidden.bs.modal', function () {
		    $('input').val('');
		})


	</script>
@endpush