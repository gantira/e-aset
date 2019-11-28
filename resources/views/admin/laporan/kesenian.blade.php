@extends('admin')

@section('content')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">LAPORAN KESENIAN</h3>
                        <table class="table table-striped table-hover table-bordered">
                            <thead> 
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Jumlah Bangunan</th>
                                    <th>Letak Alamat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $row)
                                <tr>
                                    <td><a href="{{ url('admin/arsip/detail/'.$row->id) }}"> {{ $row->profile->nama_sekolah }}</a></td>
                                    <td>{{ $row->kesenian->count() }}</td>
                                    <td>{{ $row->profile->alamat }}</td>
                                    <td>Approved {{ $row->kesenian->where('status', 'Approved')->count() }}
                                        , Ignore {{ $row->kesenian->where('status', 'Ignored')->count() }}
                                        , Inprogress {{ $row->kesenian->where('status', 'Inprogress')->count() }}
                                    </td>                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        
	
@stop

