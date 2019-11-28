@extends('backend')

@section('content')

    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profil Sekolah</h1>
                    @include('session.info', ['alert' => 'success'])
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            {{ Form::model($profile, ['url' => 'profile/update/'.$profile->id, 'method' => 'patch']) }}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Profil Sekolah
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    {{ Form::hidden('user_id', Auth::user()->id ) }}
                                    
                                    <div class="form-group">
                                        <label>Nama SMA/SMK</label>
                                        {{ Form::text('nama_sekolah', null, ['class'=>'form-control', 'required']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <label class="radio-inline">
                                            {{ Form::radio('status', 'Negeri', ['class'=>'form-control', 'required']) }} Negeri
                                        </label>
                                        <label class="radio-inline">
                                            {{ Form::radio('status', 'Swasta', ['class'=>'form-control', 'required']) }} Swasta
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>NSS/NDS</label>
                                        {{ Form::text('nss', null, ['class'=>'form-control', 'required']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Sekolah</label>
                                        {{ Form::select('jenis', ['PIlih Jenis Sekolah' , '1', '2', '3'], null, ['class'=>'form-control', 'required']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Pendirian</label>
                                        {{ Form::text('tahun_pendirian', null, ['class'=>'form-control', 'required']) }}

                                    </div>
                                    <div class="form-group">
                                        <label>Kurikulum yang Di gunakan</label>
                                        {{ Form::select('kurikulum', ['PIlih Jenis Sekolah', '1', '2', '4'], null, ['class'=>'form-control', 'required']) }}

                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kepala Sekolah</label>
                                        {{ Form::text('kepsek', null, ['class'=>'form-control', 'required']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Komite Sekolah</label>
                                        {{ Form::text('komsek', null, ['class'=>'form-control', 'required']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Luas Tanah</label>
                                        {{ Form::text('luas_m2', null, ['class'=>'form-control']) }}
                                    </div>
                                     <div class="form-group">
                                        <label>Alamat</label>
                                        {{ Form::text('alamat', null, ['class'=>'form-control']) }}
                                    </div>

                                    <button type="submit" class="btn btn-info">Update</button>
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
            {{ Form::close() }}
        </div>
        <!-- /#page-wrapper -->
@stop