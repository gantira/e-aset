@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kib-B</h1>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
	               		<table class="table table-hover table-bordered" id="dataTables">
	                    	<thead>	
	                    		<tr>
	                    			<th>Nama Sekolah</th>
			                    	<th>Kode Barang</th>
			                    	<th>Nama Barang</th>
			                    	<th>Register</th>
			                    	<th>Tanggal Pembelian</th>
			                    	<th>Keterangan</th>
			                    	<th>Umur</th>
			                    	<th>Status</th>
			                    	<th>Aksi</th>
	                    		</tr>
		                    </thead>
		                    <tbody>
		                    @foreach ($kibb as $row)
		                    	<tr style="background-color: {{ $row->status == 'Ignored' ? '#fffae5': '' }}">
		                    		<td>{{ $row->profile->nama_sekolah }}</td>
		                    		<td><a href="javascript:void(0)" onclick="view({{$row->id}})">{{ $row->kode_barang }}</a></td>
		                    		<td>{{ $row->nama_barang }}</td>
		                    		<td>{{ $row->register }}</td>
		                    		<td>{{ $row->tanggal }}</td>
		                    		<td>{{ $row->keterangan }}</td>
		                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
		                    		<td><b>{{ $row->status }}</b><br> <h6>{{ $row->komentar }}</h6></td>
		                    		<td><a href="{{ url('admin/kibb/status/2/'.$row->id) }}">
		                    			<button class="btn btn-primary btn-xs">approve</button>
		                    			</a>
		                    			<br>
		                    			{{-- <a href="{{ url('admin/kiba/status/3/'.$row->id) }}">
		                    			ignore
		                    			</a>
		                    			<br> --}}
		                    			<a href="javascript:void(0)" onclick="getData({{ $row->id }})">
		                    			<button class="btn btn-default btn-xs">ignore</button>
		                    			</a>
		                    		</td>
		                    	</tr>
		                    @endforeach
		                    </tbody>
	                    </table>
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
		        {{ Form::open(['url'=>'kibb', 'method'=>'post']) }}
		        	@include('kibb.form', ['some' => 'data'])

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      	{{ Form::submit('Simpan Aset', ['class'=>'btn btn-primary']) }}
		        {{ Form::close() }}
		      </div>
		    </div>

		  </div>
		</div>

		<!-- Modal Comment -->
		<div id="myComment" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><span class="alert alert-success">Ignore</span></h4>
		      </div>
		      <div class="modal-body">
		        {{ Form::open(['url'=>'admin/kibb/ignore', 'method'=>'post']) }}
		        	{{ Form::hidden('id', null, ['id'=>'id']) }}

		        	<div class="form-group">
		        		{{ Form::label('nama_barang', null, ['class'=>'control-label']) }}
			        	{{ Form::text('nama_barang', null, ['id'=>'_nama_barang', 'class'=>'form-control'] ) }}
					</div>

					<div class="form-group">
		        		{{ Form::label('komentar', null, ['class'=>'control-label']) }}
			        	{{ Form::textarea('komentar', null, ['id'=>'komentar', 'class'=>'form-control'] ) }}
					</div>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	{{ Form::submit('Ignored', ['class'=>'btn btn-danger']) }}
		        {{ Form::close() }}
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
		        	@include('kibb.form', ['some' => 'data'])
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
@stop

@push('scripts')

    <script>
    	function getData(id) {

            var dataString = { 
                id : id,
                _token : '{{ csrf_token() }}'
            };

            $.ajax({
                url: "{{ url('admin/kibb/getData') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                    $('#id').val(data.id);
                    $('#_nama_barang').val(data.nama_barang);

                    $('#myComment').modal();
                    console.log(data);
                },
                error : function(data){
                	console.log(data);
                }
            });

		}

		function view(id) {
			$('#myView').modal('show');
			var dataString = { 
                    id : id,
                    _token : '{{ csrf_token() }}'
            };
                
            $.ajax({
                url: "{{ URL('kibb/view') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	$('input[name=kode_barang]').val(data.kode_barang);
                	$('input[name=nama_barang]').val(data.nama_barang);
                	$('input[name=register]').val(data.register);
                	$('input[name=ukuran]').val(data.ukuran);
                	$('input[name=bahan]').val(data.bahan);
                	$('input[name=nomor]').val(data.nomor);
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
