@extends('adminlte::page')

@section('title', 'Size Tipe Master Create')

@section('content_header')
    <h1>Size Tipe Master</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Size Tipe Master</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="{{ $list_url }}" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('sizetipemaster.store') }}">
                {{ csrf_field() }}
                <div class="box box-success">
                <div class="box-body">
                    @include('errors.validation')
                    <div class="form-group{{ $errors->has('size_type') ? ' has-error' : '' }}">
                            <label for="size_type" class="col-md-4 control-label">Size Tipe</label>

                            <div class="col-md-2">
                                <input id="size_type" type="size_type" class="form-control" name="size_type" value="{{ old('size_type') }}" required autofocus>

                                @if ($errors->has('size_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('size_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-4">
                                {{ Form::textArea('deskripsi', null, ['class'=> 'form-control']) }}
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
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
