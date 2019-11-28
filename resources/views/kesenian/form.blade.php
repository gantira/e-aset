                                        {{ Form::hidden('user_id', Auth::user()->id) }}

                                        <div class="form-group">
                                            {{ Form::label('kode_barang') }}
                                            {{ Form::text('kode_barang', $kode_barang, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_barang') }}
                                            {{ Form::text('nama_barang', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nomor_register') }}
                                            {{ Form::text('nomor_register', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('jenis_barang') }}
                                            {{ Form::text('jenis_barang', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('ukuran') }}
                                            {{ Form::text('ukuran', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('jumlah') }}
                                            {{ Form::text('jumlah', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('aktivasi_dana') }}
                                            {{ Form::text('aktivasi_dana', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal_penerimaan') }}
                                            {{ Form::date('tanggal', Carbon\Carbon::now(), ['id'=>'', 'class'=>'form-control', 'required', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('harga') }}
                                            {{ Form::text('harga', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::text('keterangan', null, ['class'=>'form-control', 'required',  'style'=>'height:90px']) }}
                                        </div>