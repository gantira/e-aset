@extends('admin')

@section('content')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">File Masuk</h1>
                </div>
            </div>
            <br>
			
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Sekolah</th>
                                <th>Deskripsi</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($sertifikat as $no => $row)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $row->created_at->format('d M Y') }}</td>
                                <td>{{ $row->profile->nama_sekolah }}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>{{ Html::image($row->file, '', ['width'=>'100px']) }}</td>
                                <td>Delete</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
	
@stop