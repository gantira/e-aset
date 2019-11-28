                                        <div class="form-group">
                                            {{ Form::label('kode_barang') }}
                                            {{ Form::text('kode_barang', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_barang') }}
                                            {{ Form::text('nama_barang', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('register') }}
                                            {{ Form::text('register', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('ukuran') }}
                                            {{ Form::text('ukuran', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('bahan') }}
                                            {{ Form::text('bahan', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nomor') }}
                                            {{ Form::text('nomor', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('asal_usul') }}
                                            {{ Form::text('asal_usul', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('harga') }}
                                            {{ Form::text('harga', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal pembelian') }}
                                            {{ Form::text('tanggal', null, ['id'=>'datepicker', 'class'=>'form-control', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::textarea('keterangan', null, ['class'=>'form-control']) }}
                                        </div>