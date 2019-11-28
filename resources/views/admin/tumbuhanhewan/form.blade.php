                                        <div class="form-group">
                                            {{ Form::label('kode_buku') }}
                                            {{ Form::text('kode_buku', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_buku') }}
                                            {{ Form::text('nama_buku', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('pengarang') }}
                                            {{ Form::text('pengarang', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('penerima') }}
                                            {{ Form::text('penerima', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keluar') }}
                                            {{ Form::text('keluar', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('sisa') }}
                                            {{ Form::text('sisa', null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal') }}
                                            {{ Form::text('tanggal', null, ['id'=>'datepicker', 'class'=>'form-control', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::textarea('keterangan', null, ['class'=>'form-control']) }}
                                        </div>