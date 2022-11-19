@extends('adminlte::page')

@section('title', 'Barang Create')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Barang</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="{{ $list_url }}" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            @include('errors.validation')
            <form class="form-horizontal" role="form" method="POST" action="{{ route('barangs.store') }}">
                {{ csrf_field() }}
                <div class="box box-success">
                <div class="box-body">
                    
                    <div class="form-group{{ $errors->has('kode_barang') ? ' has-error' : '' }}">
                            <label for="kode_customer" class="col-md-4 control-label">Kode Barang</label>

                            <div class="col-md-2">
                                <input id="kode_barang" type="kode_barang" class="form-control" name="kode_barang" value="{{ old('kode_barang') }}" required >

                                @if ($errors->has('kode_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                            <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>

                            <div class="col-md-3">
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}" required>

                                @if ($errors->has('nama_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('tipe_barang') ? ' has-error' : '' }}">
                            <label for="no_telepon" class="col-md-4 control-label">Tipe Barang</label>
                            <div class="col-md-2">
                                {{ Form::select('tipe_barang',['RAW MATERIAL'=>'RAW MATERIAL','FINISH GOOD'=>'FINISH GOOD'],null,['class' => 'form-control']) }}
                                @if ($errors->has('tipe_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipe_barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row pull-right">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
    <!-- /.box -->
@stop
