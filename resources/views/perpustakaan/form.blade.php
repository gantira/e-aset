                                        {{ Form::hidden('user_id', Auth::user()->id) }}

                                        <div class="form-group">
                                            {{ Form::label('kode_buku') }}
                                            {{ Form::text('kode_buku', $kode_barang, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_buku') }}
                                            {{ Form::text('nama_buku', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('pengarang') }}
                                            {{ Form::text('pengarang', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('penerima (unit)') }}
                                            {{ Form::text('penerima', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keluar (unit)') }}
                                            {{ Form::text('keluar', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('sisa (unit)') }}
                                            {{ Form::text('sisa', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal') }}
                                            {{ Form::date('tanggal', Carbon\Carbon::now(), ['id'=>'', 'class'=>'form-control', 'required', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::text('keterangan', null, ['class'=>'form-control', 'required', 'style'=>'height:90px']) }}
                                        </div>
