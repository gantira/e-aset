                                        {{ Form::hidden('user_id', Auth::user()->id) }}

                                        <div class="form-group">
                                            {{ Form::label('kode_tumbuhan/hewan') }}
                                            {{ Form::text('kode_tumbuhanhewan', $kode_barang, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_tumbuhan/hewan') }}
                                            {{ Form::text('nama_tumbuhanhewan', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nomor_register') }}
                                            {{ Form::text('nomor_register', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('jenis_tumbuhan/hewan') }}
                                            {{ Form::text('jenis_tumbuhanhewan', null, ['class'=>'form-control', 'required']) }}
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
                                            {{ Form::label('asal_usul') }}
                                            {{ Form::text('asal_usul', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal') }}
                                            {{ Form::date('tanggal', Carbon\Carbon::now(), ['id'=>'', 'class'=>'form-control', 'required', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('harga') }}
                                            {{ Form::text('harga', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::text('keterangan', null, ['class'=>'form-control', 'required', 'style'=>'height:90px']) }}
                                        </div>