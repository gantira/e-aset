                                        <div class="form-group">
                                            {{ Form::label('kode_buku') }}
                                            {{ Form::text('kode_buku', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_buku') }}
                                            {{ Form::text('nama_buku', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('kuantitas') }}
                                            {{ Form::text('kuantitas', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('harga') }}
                                            {{ Form::text('harga', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('sumber') }}
                                            {{ Form::text('sumber', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('referensi') }}
                                            {{ Form::text('referensi', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal_penerimaan') }}
                                            {{ Form::text('tanggal', null, ['id'=>'datepicker', 'class'=>'form-control', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>