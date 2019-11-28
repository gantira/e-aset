@extends('admin')

@section('content')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">LAPORAN KIB B</h3>
                        <table class="table table-striped table-hover table-bordered">
                            <thead> 
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Jumlah Peralatan / Mesin</th>
                                    <th>Letak ALamat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $row)
                                <tr>
                                    <td><a href="{{ url('admin/arsip/detail/'.$row->id) }}"> {{ $row->profile->nama_sekolah }}</a></td>
                                    <td>{{ $row->kibb->count() }}</td>
                                    <td>{{ $row->profile->alamat }}</td>
                                    <td>Approved {{ $row->kibb->where('status', 'Approved')->count() }}
                                        , Ignore {{ $row->kibb->where('status', 'Ignored')->count() }}
                                        , Inprogress {{ $row->kibb->where('status', 'Inprogress')->count() }}
                                    </td>                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        
	
@stop

