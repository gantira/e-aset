                                        {{ Form::hidden('user_id', Auth::user()->id) }}
                                        
                                        <div class="form-group">
                                            {{ Form::label('kode_bangunan') }}
                                            {{ Form::text('kode_bangunan', $kode_barang, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nama_bangunan') }}
                                            {{ Form::text('nama_bangunan', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('register') }}
                                            {{ Form::text('register', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            <label class="radio">Kondisi</label>
                                            <label class="radio-inline">
                                                {{ Form::radio('kondisi', 'Bagus', true) }}Bagus
                                            </label>
                                            <label class="radio-inline">
                                                 {{ Form::radio('kondisi', 'Rusak Ringan') }}Rusak Ringan
                                            </label>
                                            <label class="radio-inline">
                                                {{ Form::radio('kondisi', 'Rusak Berat') }}Rusak Berat
                                            </label>
                                        </div>
                                        <div class="form-inline">
                                            <label class="">Konstruksi</label>
                                            {{ Form::select('konstruksi1', ['Bertingkat'=>'Bertingkat', 'Tidak Bertingkat'=>'Tidak Bertingkat'], null, ['class'=>'form-control']) }}
                                            {{ Form::select('konstruksi2', ['Beton'=>'Beton', 'Batu Bata'=>'Batu Bata'], null, ['class'=>'form-control']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('luas_m2') }}
                                            {{ Form::text('luas_m2', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('letak_alamat') }}
                                            {{ Form::text('letak_alamat', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('status_tanah') }}
                                            {{ Form::text('status_tanah', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('nomor_kode_tanah') }}
                                            {{ Form::text('nomor_kode_tanah', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('asal_usul') }}
                                            {{ Form::text('asal_usul', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('harga') }}
                                            {{ Form::text('harga', null, ['class'=>'form-control', 'required']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('tanggal pembangunan') }}
                                            {{ Form::date('tanggal_pembangunan', Carbon\Carbon::now(), ['id'=>'', 'class'=>'form-control', 'required', 'placeholder'=>'yyyy/mm/dd']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('keterangan') }}
                                            {{ Form::text('keterangan', null, ['class'=>'form-control', 'required', 'style'=>'height:90px']) }}
                                        </div>