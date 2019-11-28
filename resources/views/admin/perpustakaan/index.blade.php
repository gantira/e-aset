@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Perpustakaan</h1>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                	@forelse ($perpustakaan as $row)
	           			<li><a href="{{ url('admin/perpustakaan/needapprove/'.$row->user_id) }}">{{ $row->profile->nama_sekolah }} (<i>{{ $row->whereUserId($row->user_id)->whereStatus(1)->count() }}</i>)</a></li>
		           		@empty
		           			<i>No assets need to approve</i>
	           		@endforelse	
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
       		</div>

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
		        {{ Form::open(['url'=>'perpustakaan', 'method'=>'post']) }}
		        	@include('perpustakaan.form', ['some' => 'data'])

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
		        {{ Form::open(['url'=>'admin/perpustakaan/ignore', 'method'=>'post']) }}
		        	{{ Form::hidden('id', null, ['id'=>'id']) }}

		        	<div class="form-group">
		        		{{ Form::label('nama_buku', null, ['class'=>'control-label']) }}
			        	{{ Form::text('nama_buku', null, ['id'=>'_nama_buku', 'class'=>'form-control'] ) }}
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
		        	@include('perpustakaan.form', ['some' => 'data'])
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
                url: "{{ url('admin/perpustakaan/getData') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                    $('#id').val(data.id);
                    $('#_nama_buku').val(data.nama_buku);
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
                url: "{{ URL('perpustakaan/view') }}",
                type: "post",
                data: dataString,
                dataType: "json",
                cache: false,
                success: function(data){
                	$('input[name=kode_buku]').val(data.kode_buku);
                	$('input[name=nama_buku]').val(data.nama_buku);
                	$('input[name=pengarang]').val(data.pengarang);
                	$('input[name=penerima]').val(data.penerima);
                	$('input[name=keluar]').val(data.keluar);
                	$('input[name=sisa]').val(data.sisa);
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
