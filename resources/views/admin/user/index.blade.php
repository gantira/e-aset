@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Approval</h1>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-condensed table-hover table-bordered" id="dataTables">
                    	<thead>	
	                    	<th>Yayasan</th>
                            <th>Alamat</th>
	                    	<th>Email</th>
	                    	<th>Aksi</th>
	                    </thead>
	                    <tbody>
	                    @foreach($user as $row)
	                    	<tr style="background-color: {{ $row->status == 'Ignored' ? '#F7F7F7': '' }}">
	                    		<td>{{ $row->profile->nama_sekolah }}</td>
                                <td>{{ $row->profile->alamat }}</td>
	                    		<td>{{ $row->email }}</td>
	                    		<td><a href="{{ url('admin/user/acc/'.$row->id) }}">
	                    			<button class="btn btn-primary">Approve</button>
	                    			</a>
		                    	</td>
                        @if ($loop->last)
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td><a href="{{ url('admin/user/accall') }}">
                                    <button class="btn btn-danger">Approve All</button>
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                        @endif

	                    @endforeach
	                    </tbody>
                        
                    </table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

@stop
