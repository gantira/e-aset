                                        {{ Form::hidden('user_id', Auth::user()->id) }}

                                        <div class="form-group">
                                            {{ Form::label('kode_barang') }}
                                            {{ Form::text('kode_barang', $kode_barang,  ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_barang') }}
                                            {{ Form::text('nama_barang', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('register') }}
                                            {{ Form::text('register', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('luas (m2)') }}
                                            {{ Form::text('luas_m2', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanah_pengadaan') }}
                                            {{ Form::text('tanah_pengadaan', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('letak_alamat') }}
                                            {{ Form::text('letak_alamat', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('status_tanah') }}
                                            {{ Form::text('status_tanah', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('penggunaan') }}
                                            {{ Form::text('penggunaan', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('asal_usul') }}
                                            {{ Form::text('asal_usul', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('harga') }}
                                            {{ Form::text('harga', null, ['class'=>'form-control',  'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal') }}
                                            {{ Form::date('tanggal', Carbon\Carbon::now(), [ 'class'=>'form-control',  'required', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::text('keterangan', null, ['class'=>'form-control',  'required',  'style'=>'height:90px']) }}
                                        </div>
