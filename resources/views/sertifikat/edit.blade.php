@extends('backend')

@section('content')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Sertifikat</h1>
                    @include('session.info', ['alert' => 'success'])
                    @include('errors.lists', ['some' => 'data'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    {{ Form::model($sertifikat, ['url'=>'sertifikat/update/'.$sertifikat->id, 'method'=>'patch', 'files' => true]) }}
                                        @include('sertifikat.form', ['some' => 'data'])

                                        <button type="submit" class="btn btn-info">Update</button>
                                    {{ Form::close() }}
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@stop
