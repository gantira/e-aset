@extends('admin')

@section('content')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">LAPORAN PERPUSTAKAAN</h3>
                        <table class="table table-striped table-hover table-bordered">
                            <thead> 
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Jumlah Buku</th>
                                    <th>Letak Alamat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $row)
                                <tr>
                                    <td><a href="{{ url('admin/arsip/detail/'.$row->id) }}"> {{ $row->profile->nama_sekolah }}</a></td>
                                    <td>{{ $row->perpustakaan->count() }}</td>
                                    <td>{{ $row->profile->alamat }}</td>
                                    <td>Approved {{ $row->perpustakaan->where('status', 'Approved')->count() }}
                                        , Ignore {{ $row->perpustakaan->where('status', 'Ignored')->count() }}
                                        , Inprogress {{ $row->perpustakaan->where('status', 'Inprogress')->count() }}
                                    </td>                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        
	
@stop

