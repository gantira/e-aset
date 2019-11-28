@extends('backend')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">File Masuk</h1>
                    @include('session.info', ['alert' => 'success'])
                    @include('errors.lists', ['some' => 'data'])
                    <button class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-cloud-upload"></i> Upload</button>

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
			                    <table class="table table-condensed table-striped table-hover table-bordered" id="dataTables">
			                    	<thead>
			                    		<th width="10px">No</th>
				                    	<th>Tanggal</th>
				                    	<th>Deskripsi</th>
				                    	<th>File</th>
				                    	<th>Aksi</th>
				                    </thead>
				                    <tbody>
				                    @foreach($user->sertifikat as $no => $row)
				                    	<tr>
				                    		<td>{{ $no+1 }}</td>
				                    		<td>{{ $row->created_at->format('d M Y') }}</td>
				                    		<td>{{ $row->deskripsi }}</td>
				                    		<td><img src="{{ $row->file }}" height="50px"></td>
				                    		<td><a href="{{ url('sertifikat/edit/'.$row->id) }}">Edit</a> | <a href="{{ url('sertifikat/delete/'.$row->id) }}">Delete</a> | <a href="{{ $row->file }}">Preview</a></td>
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
		{{ Form::open(['url'=>'sertifikat', 'method'=>'post' ,'files' => true]) }}
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Upload File</h4>
		      </div>
		      <div class="modal-body">

		        	@include('sertifikat.form', ['some' => 'data'])

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      	{{ Form::submit('Upload File', ['class'=>'btn btn-primary']) }}

		      </div>
		    </div>

		  </div>
		</div>
		{{ Form::close() }}

@stop
