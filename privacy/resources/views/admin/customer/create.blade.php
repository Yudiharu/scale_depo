@extends('adminlte::page')

@section('title', 'Customer Create')

@section('content_header')
    <h1>Customer</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Customer</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="{{ $list_url }}" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.store') }}">
                {{ csrf_field() }}
                <div class="box box-success">
                <div class="box-body">
                    <div class="form-group{{ $errors->has('kode_customer') ? ' has-error' : '' }}">
                            <label for="kode_customer" class="col-md-4 control-label">Kode Customer</label>

                            <div class="col-md-2">
                                <input id="kode_customer" type="kode_customer" class="form-control" name="kode_customer" value="{{ old('kode_customer') }}" required autofocus>

                                @if ($errors->has('kode_customer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_customer') ? ' has-error' : '' }}">
                            <label for="nama_customer" class="col-md-4 control-label">Nama Customer</label>

                            <div class="col-md-3">
                                <input id="nama_customer" type="text" class="form-control" name="nama_customer" value="{{ old('nama_customer') }}" required >

                                @if ($errors->has('nama_customer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_customer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_telepon') ? ' has-error' : '' }}">
                            <label for="no_telepon" class="col-md-4 control-label">No Telepon</label>

                            <div class="col-md-2">
                                <input id="no_telepon" type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}" required>

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
