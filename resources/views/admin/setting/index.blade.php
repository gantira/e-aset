@extends('admin')

@section('content')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Setting</h1>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Send Notification
                        </div>
                        <div class="panel-body">
                        {{ Form::model($setting, ['url' => 'admin/setting/'.$setting->id , 'method' => 'patch']) }}
                                <div class="form-group">
                                    <label class="radio">Email Activation</label>
                                    <label class="radio-inline">
                                        {{ Form::radio('email',  true) }}Yes
                                    </label>
                                    <label class="radio-inline">
                                         {{ Form::radio('email', false) }}No
                                    </label>
                                    <label class="radio-inline">
                                         {{ Form::submit('Save') }}
                                    </label>
                                </div>
                          {{ Form::close() }}       
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- /#page-wrapper -->
@stop