@extends('admin')

@section('content')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Laporan</h3>

                    <div class = "panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <li><a href="{{ url('admin/laporan/kiba') }}">Aset Kib A</a></li>
                                <li><a href="{{ url('admin/laporan/kibb') }}">Aset Kib B</a></li>
                                <li><a href="{{ url('admin/laporan/kibc') }}">Aset Kib C</a></li>
                                <li><a href="{{ url('admin/laporan/perpustakaan') }}">Aset Perpustakaan</a></li>
                                <li><a href="{{ url('admin/laporan/tumbuhanhewan') }}">Aset Tumbuhan & Hewan</a></li>
                                <li><a href="{{ url('admin/laporan/kesenian') }}">Aset Kesenian</a></li>
                            </div>
                        </div>
                    </div>
                </div>
                   
            </div>
        </div>

        
	
@stop

@push('scripts')
	<script>
		$('#input-daterange1').each(function() {
		    $(this).datepicker({
                todayHighlight: true,
                language: "id",
                format: 'yyyy-mm-dd'
            })
		});

        $('#input-daterange2').each(function() {
            $(this).datepicker({
                todayHighlight: true,
                language: "id",
                format: 'yyyy-mm-dd'
            })
        });
	</script>
@endpush