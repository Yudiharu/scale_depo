@extends('adminlte::page')

@section('title', 'Edit Data')

@section('content_header')
    <h1>User Edit</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Company : {{ $Company->nama_company }}</h3>
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
            {!! Form::model($Company, ['route' => ['company.update', $Company->kode_company],'method' => 'put']) !!}

                <div class="form-group col-md-2 col-md-offset-4">
                    {{ Form::label('name', 'Kode Company:') }}
                    {{ Form::text('kode_company', null, ['class'=> 'form-control','autofocus'=>'autofocus']) }}
                </div>

                <div class="form-group col-md-4 col-md-offset-4">
                    {{ Form::label('name', 'Nama Company:') }}
                    {{ Form::text('nama_company', null, ['class'=> 'form-control']) }}
                </div>

                <div class="form-group col-md-6 col-md-offset-4">
                    {{ Form::label('name', 'Alamat:') }}
                    {{ Form::text('alamat','null', ['class'=> 'form-control']) }}
                </div>

                <div class="form-group col-md-2 col-md-offset-4">
                    {{ Form::label('name', 'No Telepon:') }}
                    {{ Form::text('no_telepon', null, ['class'=> 'form-control']) }}
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
