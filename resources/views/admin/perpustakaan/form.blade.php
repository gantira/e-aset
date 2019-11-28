                                        <div class="form-group">
                                            {{ Form::label('kode_barang') }}
                                            {{ Form::text('kode_barang', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_barang') }}
                                            {{ Form::text('nama_barang', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('kategori') }}
                                            {{ Form::text('kategori', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('jumlah_unit') }}
                                            {{ Form::text('jumlah_unit', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('jumlah_dana') }}
                                            {{ Form::text('jumlah_dana', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('total_dana') }}
                                            {{ Form::text('total_dana', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal') }}
                                            {{ Form::text('tanggal', null, ['id'=>'datepicker', 'class'=>'form-control', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::textarea('keterangan', null, ['class'=>'form-control']) }}
                                        </div>