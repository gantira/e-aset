@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kib-C</h1>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" >
                <div class="col-lg-12">
	                @forelse ($kibc as $row)
		           			<li><a href="{{ url('admin/kibc/needapprove/'.$row->user_id) }}">{{ $row->profile->nama_sekolah }} (<i>{{ $row->whereUserId($row->user_id)->whereStatus(1)->count() }}</i>)</a></li>
		           		@empty
		           			<i>No assets need to approve</i>
	           		@endforelse	
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
		        {{ Form::open(['url'=>'kibc', 'method'=>'post']) }}
		        	@include('kibc.form', ['some' => 'data'])

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
		        {{ Form::open(['url'=>'admin/kibc/ignore', 'method'=>'post']) }}
		        	{{ Form::hidden('id', null, ['id'=>'id']) }}

		        	<div class="form-group">
		        		{{ Form::label('nama_bangunan', null, ['class'=>'control-label']) }}
			        	{{ Form::text('nama_bangunan', null, ['id'=>'_nama_bangunan', 'class'=>'form-control'] ) }}
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
		        	@include('kibc.form', ['some' => 'data'])
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
                url: "{{ url('admin/kibc/getData') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                    $('#id').val(data.id);
                    $('#_nama_bangunan').val(data.nama_bangunan);

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
                url: "{{ URL('kibc/view') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	$('input[name=kode_bangunan]').val(data.kode_bangunan);
                	$('input[name=nama_bangunan]').val(data.nama_bangunan);
                	$('input[name=register]').val(data.register);
                	$('input[name=luas_m2]').val(data.luas_m2);
                	$('input[name=letak_alamat]').val(data.letak_alamat);
                	$('input[name=status_tanah]').val(data.status_tanah);
                	$('input[name=nomor_kode_tanah]').val(data.nomor_kode_tanah);
                	$('input[name=asal_usul]').val(data.asal_usul);
                	$('input[name=harga]').val(data.harga);
                	$('input[name=tanggal_pembangunan]').val(data.tanggal_pembangunan);
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
