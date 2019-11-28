@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tumbuhan & Hewan</h1>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <!-- /#page-wrapper -->

        <div class="row">
                <div class="col-lg-12">
                	<div class="panel-group">
					    <div class="panel panel-default">
					     	<div class="panel-heading"></div>
					     		<div class="panel panel-body">
			                    <table class="table table-hover table-bordered" id="dataTables">
			                    	<thead>	
				                    	<th>Nama Sekolah</th>
				                    	<th>Kode Tumbuhan/hewan</th>
				                    	<th>Nama Tumbuhan/hewan</th>
				                    	<th>Nomor Register</th>
				                    	<th>Jenis Tumbuhan/hewan</th>
				                    	<th>Tanggal</th>
				                    	<th>Umur</th>
				                    	<th>Status</th>
				                    	<th>Aksi</th>
				                    </thead>
				                    <tbody>
				                    @foreach($tumbuhanhewan as $row)
				                    	<tr style="background-color: {{ $row->status == 'Ignored' ? '#fffae5': '' }}">
				                    		<td>{{ $row->profile->nama_sekolah }}</td>
				                    		<td><a href="javascript:void(0)" onclick="view({{$row->id}})">{{ $row->kode_tumbuhanhewan }}</a></td>
				                    		<td>{{ $row->nama_tumbuhanhewan }}</td>
				                    		<td>{{ $row->nomor_register }}</td>
				                    		<td>{{ $row->jenis_tumbuhanhewan }}</td>
				                    		<td>{{ $row->tanggal }}</td>
				                    		<td>{{ Carbon\Carbon::parse($row->tanggal)->diffInDays(Carbon\Carbon::now()) }} Hari</td>
				                    		<td><b>{{ $row->status }}</b><br> <small>{{ $row->komentar }}</small></td>
				                    		<td><a href="{{ url('admin/tumbuhanhewan/status/2/'.$row->id) }}">
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
			            </div>
			        </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>


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
		        {{ Form::open(['url'=>'tumbuhanhewan', 'method'=>'post']) }}
		        	@include('tumbuhanhewan.form', ['some' => 'data'])

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
		        {{ Form::open(['url'=>'admin/tumbuhanhewan/ignore', 'method'=>'post']) }}
		        	{{ Form::hidden('id', null, ['id'=>'id']) }}

		        	<div class="form-group">
		        		{{ Form::label('nama_tumbuhanhewan', null, ['class'=>'control-label']) }}
			        	{{ Form::text('nama_tumbuhanhewan', null, ['id'=>'_nama_tumbuhanhewan', 'class'=>'form-control'] ) }}
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
		        	@include('tumbuhanhewan.form', ['some' => 'data'])
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
                url: "{{ url('admin/tumbuhanhewan/getData') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                    $('#id').val(data.id);
                    $('#_nama_tumbuhanhewan').val(data.nama_tumbuhanhewan);

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
                url: "{{ URL('tumbuhanhewan/view') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	$('input[name=kode_tumbuhanhewan]').val(data.kode_tumbuhanhewan);
                	$('input[name=nama_tumbuhanhewan]').val(data.nama_tumbuhanhewan);
                	$('input[name=nomor_register]').val(data.nomor_register);
                	$('input[name=jenis_tumbuhanhewan]').val(data.jenis_tumbuhanhewan);
                	$('input[name=ukuran]').val(data.ukuran);
                	$('input[name=jumlah]').val(data.jumlah);
                	$('input[name=asal_usul]').val(data.asal_usul);
                	$('input[name=tanggal]').val(data.tanggal);
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
