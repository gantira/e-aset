@extends('admin')

@section('content')
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-header">Arsip Yayasan</h1>
                    {{-- <p><a href="javascript:void(0)" onclick="window.print()">Print</a></p> --}}
                    @include('session.info', ['alert' => 'success'])

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <br>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-hover table-bordered">
	                	<thead>	
	                    	<tr>
		                    	<th>Nama Sekolah</th>
		                    	<th>KIB A <br>(Luas (m2))</th>
		                    	<th>KIB B <br>(Jumlah Peralatan&mesin)</th>
		                    	<th>KIB C <br>(Jumlah Bangunan)</th>
		                    	<th>KIB D <br>(Jumlah Buku)</th>
		                    	<th>KIB D <br>(Jumlah Tumbuhan&Hewan)</th>
		                    	<th>KIB D <br>(Jumlah Kesenian)</th>
	                    	</tr>
	                    </thead>
	                    <tbody>
	                    @foreach($arsip as $row)
	                    	<tr>
	                    		<td><a href="{{ url('admin/arsip/detail/'.$row->id) }}"> {{ $row->profile->nama_sekolah }}</a></td>
	                    		<td>{{ $row->kiba->count() }}</td>
	                    		<td>{{ $row->kibb->count() }}</td>
	                    		<td>{{ $row->kibc->count() }}</td>
	                    		<td>{{ $row->perpustakaan->count() }}</td>
	                    		<td>{{ $row->tumbuhanhewan->count() }}</td>
	                    		<td>{{ $row->kesenian->count() }}</td>
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

@stop