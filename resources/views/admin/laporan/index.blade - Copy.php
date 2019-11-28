@extends('admin')

@section('content')
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Aset</h1>
                    <div class = "panel panel-warning">
                    <div class = "panel-heading">
                        Periode 1 : Januari - Maret</br>
                        Periode 2 : April - Juni</br>
                        Periode 3 : Juli - September</br>
                        Periode 4 : Oktober - Desember</br>
                    </div>

                    <div class = "panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                        {{ Form::open(['url'=>'admin/laporan', 'method'=>'post']) }}
                            <div class="input-group">
                                <span class="input-group-addon">periode</span>
                                <input type="number" name="periode" max="4" min="1" class="form-control">
                                <span class="input-group-addon">tahun</span>
                                <input type="number" name="tahun" maxlength="4" class="form-control">
                                <span class="input-group-btn">
                                <input class="btn btn-primary" type="submit">Submit</input>
                            </div>
                        {{ Form::close() }}
                        </div>
                        </div>
                    </div>
                    </div>
                   
                </div>
            </div>


            {{ $user->totalignore() }}
            {{ $user->totalapprove() }}
	
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