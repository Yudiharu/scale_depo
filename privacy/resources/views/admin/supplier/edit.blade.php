@extends('adminlte::page')

@section('title', 'Edit Data')

@section('content_header')
    <h1>Supplier Edit</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Supplier : {{ $Supplier->nama_supplier }}</h3>
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
                        {!! Form::model($Supplier, ['route' => ['supplier.update', $Supplier->kode_supplier],'method' => 'patch']) !!}
                        <div class="row ">
                            <div class="form-group col-md-2 col-md-offset-4">
                                {{ Form::label('name', 'Kode Supplier') }}
                                {{ Form::text('kode_supplier', null, ['class'=> 'form-control','autofocus'=>'autofocus']) }}
                            </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-3 col-md-offset-4">
                               {{ Form::label('nama', 'Nama Supplier') }}
                               {{ Form::text('nama_supplier', null, ['class'=> 'form-control']) }}
                           </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-md-offset-4">
                                    {{ Form::label('name', 'Alamat') }}
                                    {{ Form::text('alamat', null, ['class'=> 'form-control']) }}
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
