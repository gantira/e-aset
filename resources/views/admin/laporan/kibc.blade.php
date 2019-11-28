@extends('admin')

@section('content')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">LAPORAN KIB C</h3>
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
                                    <td>{{ $row->kibc->count() }}</td>
                                    <td>{{ $row->profile->alamat }}</td>
                                    <td>Approved {{ $row->kibc->where('status', 'Approved')->count() }}
                                        , Ignore {{ $row->kibc->where('status', 'Ignored')->count() }}
                                        , Inprogress {{ $row->kibc->where('status', 'Inprogress')->count() }}
                                    </td>                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        
	
@stop

