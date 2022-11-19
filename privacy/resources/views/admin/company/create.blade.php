@extends('adminlte::page')

@section('title', 'Company Create')

@section('content_header')
    <h1>Company</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Company</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="{{ $list_url }}" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('company.store') }}">
                {{ csrf_field() }}
                <div class="box box-success">
                <div class="box-body">
                    <div class="form-group{{ $errors->has('kode_company') ? ' has-error' : '' }}">
                            <label for="kode_company" class="col-md-4 control-label">Kode Company</label>

                            <div class="col-md-2">
                                <input id="kode_company" type="kode_company" class="form-control" name="kode_company" value="{{ old('kode_company') }}" required autofocus>

                                @if ($errors->has('kode_company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_company') ? ' has-error' : '' }}">
                            <label for="nama_company" class="col-md-4 control-label">Nama Company</label>

                            <div class="col-md-4">
                                <input id="nama_company" type="text" class="form-control" name="nama_company" value="{{ old('nama_company') }}" required >

                                @if ($errors->has('nama_company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_telepon') ? ' has-error' : '' }}">
                            <label for="no_telepon" class="col-md-4 control-label">No Telepon</label>

                            <div class="col-md-2">
                                <input id="no_telepon" type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}">

                                @if ($errors->has('no_telepon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_telepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </div>
                <div class="box-footer">
                    <div class="row pull-right">
                        <div class="col-md-12 ">
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
