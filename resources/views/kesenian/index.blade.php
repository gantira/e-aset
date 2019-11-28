@extends('backend')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kesenian</h1>
                    @include('session.info', ['alert' => 'success'])

                    <button class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> New Entry</button>
                    <button type="button" class="btn btn-default"><span class="fa fa-folder-o"></span></button>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ asset('doc/kesenian.xls') }}">Format Dokumen</a></li>
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
				                    	<th>Kode Barang</th>
				                    	<th>Nama Barang</th>
				                    	<th>Nomor Register</th>
				                    	<th>Umur</th>
				                    	<th>Status</th>
				                    	<th>Aksi</th>
				                    </thead>
				                    <tbody>
				                    @foreach($user->kesenian as $row)
				                    	<tr style="background-color: {{ $row->status == 'Ignored' ? '#fffae5': '' }}">
				                    		<td><a href="javascript:void(0)" onclick="view({{$row->id}})">{{ $row->kode_barang }}</a></td>
				                    		<td>{{ $row->nama_barang }}</td>
				                    		<td>{{ $row->nomor_register }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
				                    		<td><a href="{{ url('kesenian/edit/'.$row->id) }}">Edit</a> | <a href="{{ url('kesenian/delete/'.$row->id) }}">Delete</a></td>
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
		        {{ Form::open(['url'=>'kesenian', 'method'=>'post']) }}
		        	@include('kesenian.form', ['some' => 'data'])

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
		        <h4 class="modal-title">Upload Dokumen Kesenian</h4>
		      </div>
		      <div class="modal-body">
		      	{{ Form::open(['url'=>'kesenian/upload', 'files' => true]) }}
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
		        	@include('kesenian.form', ['some' => 'data'])
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
                url: "{{ URL('kesenian/view') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	$('input[name=kode_barang]').val(data.kode_barang);
                	$('input[name=nama_barang]').val(data.nama_barang);
                	$('input[name=nomor_register]').val(data.nomor_register);
                	$('input[name=jenis_barang]').val(data.jenis_barang);
                	$('input[name=ukuran]').val(data.ukuran);
                	$('input[name=jumlah]').val(data.jumlah);
                	$('input[name=tanggal]').val(data.tanggal);
                	$('input[name=aktivasi_dana]').val(data.aktivasi_dana);
                	$('input[name=harga]').val(data.harga);
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
