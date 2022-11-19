@extends('adminlte::page')

@section('title', 'Edit Data')

@section('content_header')
    <h1>Size Tipe Master Edit</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Size Tipe Master : {{ $sizetipemaster->size_type }}</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="{{ $list_url }}" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>

            <div class="box box-success">
                <div class="box-body">

                        @include('errors.validation')
                        {!! Form::model($sizetipemaster, ['route' => ['sizetipemaster.update',
                        $sizetipemaster->id_size],'method' => 'patch']) !!}
                        <div class="row ">
                            <div class="form-group col-md-2 col-md-offset-4">
                                {{ Form::label('Size Tipe', 'Size Tipe') }}
                                {{ Form::text('size_type', null, ['class'=> 'form-control','autofocus'=>'autofocus']) }}
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4 col-md-offset-4">
                                {{ Form::label('deskripsi', 'Deskripsi') }}
                                {{ Form::textArea('deskripsi', null, ['class'=> 'form-control']) }}
                            </div>
                        </div>
                </div>
                        <div class="box-footer">
                            <div class="row pull-right">
                                <div class="col-md-12">
                                    {{ Form::submit('Update data', ['class' => 'btn btn-success']) }}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
    </div>

</div>
    </div>
    <!-- /.box -->
@stop
