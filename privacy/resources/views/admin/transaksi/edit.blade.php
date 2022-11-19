@extends('adminlte::page')

@section('title', 'Edit Data')

@section('content_header')
    <h1>Transaksi Edit</h1>
@stop

@section('content')
<div class="col-md-8">
    <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Transaksi</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <a href="{{ $list_url }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <div class="pull-right">
                        <button type="button" onclick="refreshButton2()" class="btn btn-warning btn-sm">Timbang</button>
                    </div>
            </div>
    </div>
</div>
<div class="col-md-4"> 
    <div class="">   
                <div class="small-box bg-red">
                    <div class="inner" >
                        <h3 id="beratlabel">0000</h3>
                        
                    </div>
                    <div class="icon">
                        <i class="">
                            KG
                        </i>
                    </div>
                    <div class="small-box-footer">
                        <b> WEIGHT </b>
                    </div>
                </div> 
    </div>
</div>
<body onLoad="load()">

<div class="col-md-12">
<div class="box box-success">
    <div class="box-header with border">
        <div class="col-md-3">
        {{-- <select name="tipe" id="tipe" class="form-control" onchange="tukul()">
            <option value="1" selected >Pilih Tipe</option>                              
            <option value="2">Truk/Container</option>
            <option value="3">Mobil Cap</option>
            <option value="4">Container</option>                                
        </select> --}}
        </div>
    </div>
            {!! Form::model($transaksi, ['route' => ['transaksis.update', $transaksi->no_transaksi],'method' => 'patch','id'=>'form']) !!}
            <div class="box-body">
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-body">
                        
                            <div class="form-group">
                                {{ Form::label('name', 'No Transaksi:') }}
                                {{ Form::text('no_transaksi', null, ['class'=> 'form-control','readonly'=>'readonly']) }}
                            </div>
                        
                            <div class="form-group">
                                {{ Form::label('name', 'No Polisi:') }}
                                {{ Form::text('no_polisi', null, ['class'=> 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'No PO/DO:') }}
                                {{ Form::text('no_po', null, ['class'=> 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'No Seal:') }}
                                {{ Form::text('no_seal', null, ['class'=> 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'No Container:') }}
                                {{ Form::text('no_container', null, ['class'=> 'form-control']) }}
                            </div>

                            <div class="form-group">
                                    {{ Form::label('name', 'Size Tipe:') }}
                                     {{ Form::select('kode_ukuran', $sizeAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Tipe Container']) }}
                                   {{--  <select name="id_size" id="id_size" class="form-control">
                                                @foreach($sizeAll as $size)
                                                    <option value="{{ $size->id_size }}">
                                                        {{ $size->size_type }}
                                                    </option>
                                                @endforeach
                                    </select> --}}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-danger">
                        <div class="box-body">
                        
                            <div class="form-group">
                                {{ Form::label('name', 'Muatan:') }}
                                {{ Form::text('muatan', null, ['class'=> 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Nama Supir:') }}
                                {{ Form::text('nama_supir', null, ['class'=> 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Nama Barang:') }}
                                 {{ Form::select('kode_barang', $barangAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Barang']) }}
                                {{-- <select name="kode barang" id="kode_barang" class="form-control">
                                            @foreach($barangAll as $barang)
                                                <option value="{{ $barang->kode_barang }}">
                                                    {{ $barang->nama_barang }}
                                                </option>
                                            @endforeach
                                </select> --}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Nama Supplier:') }}
                                 {{ Form::select('kode_supplier', $supplierAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Supplier']) }}
                                {{-- <select name="kode supplier" id="kode_supplier" class="form-control">
                                            @foreach($supplierAll as $supplier)
                                                <option value="{{ $supplier->kode_supplier }}">
                                                    {{ $supplier->nama_supplier }}
                                                </option>
                                            @endforeach
                                </select> --}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Nama Customer:') }}
                                 {{ Form::select('kode_customer', $customerAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Customer']) }}
                                {{-- <select name="kode customer" id="kode_customer" class="form-control">
                                            @foreach($customerAll as $customer)
                                                <option value="{{ $customer->kode_customer }}">
                                                    {{ $customer->nama_customer }}
                                                </option>
                                            @endforeach
                                </select> --}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Nama Company:') }}
                                 {{ Form::select('kode_company', $companyAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Company']) }}
                               {{--  <select name="kode company" id="kode_company" class="form-control">
                                            @foreach($companyAll as $company)
                                                <option value="{{ $company->kode_company }}">
                                                    {{ $company->nama_company }}
                                                </option>
                                            @endforeach
                                </select> --}}
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-body">
                           <div class="form-group">
                                {{ Form::label('name', 'Berat 1:') }}
                                {{ Form::text('berat1', null, ['class'=> 'form-control','id'=> 'berat1']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Berat 2:') }}
                                {{ Form::text('berat2', null, ['class'=> 'form-control','id'=> 'berat2']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Keterangan:') }}
                                {{ Form::textArea('keterangan', null, ['class'=> 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
        </div>

                <div class="box box-footer">
                    <div class="pull-right">
                    {{ Form::submit('Update data', ['class' => 'btn btn-success']) }}
                    </div>
                </div>


            {!! Form::close() !!}
    </div>
    <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i>{{ $nama_company }}</i> <b>({{ $nama_lokasi }})</b></button>

        <style type="text/css">
            #back2Top {
                width: 400px;
                line-height: 27px;
                overflow: hidden;
                z-index: 999;
                display: none;
                cursor: pointer;
                position: fixed;
                bottom: 0;
                text-align: left;
                font-size: 15px;
                color: #000000;
                text-decoration: none;
            }
            #back2Top:hover {
                color: #fff;
            }
        </style>

</div>
</body>
        
    <!-- /.box -->
@stop
@push('js')
    <script>

        function load(){
          startTime();
          $('.back2Top').show();
          // $('#form :input').attr('disabled', true);
        } 

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
        });
        
        // function getTextFromFile(fileName,callBack)
        // {
        //     var file = new XMLHttpRequest();
        //     file.open("GET", fileName, true);
        //     file.onreadystatechange = function ()
        //     {
        //         if(file.readyState === 4)
        //         {
        //             if(file.status === 200 || file.status == 0)
        //             {
        //                 var text = file.responseText;
        //                 callBack(text);
        //             }
        //         }
        //     }
        //     file.send(null);
        // }

        function getTextFromFile(fileName,callBack)
        {
            var file = new XMLHttpRequest();
            file.open("GET", fileName, true);
            file.onreadystatechange = function ()
            {
                if(file.readyState === 4)
                {
                    if(file.status === 200 || file.status == 0)
                    {
                        var text = file.responseText;
                        document.getElementById("beratlabel").value = text;
                        callBack(text);
                    }
                }
            }
            file.send(null);
        }

        function refreshButton2() {
            getTextFromFile("http://127.0.0.1:8887/text_timbang.txt",function(text){
                let berat2 = $('#berat2');
                var filter = text.slice(2, 9);
                var filter2 = Number(filter);
                document.getElementById("beratlabel").innerHTML = filter2;
                berat2.val(filter2);
            });
        }

        function refreshButton() {
            let berat2 = $('#berat2');
            let url = "{{ route('openserial.test') }}";
            // berat2.val('');
            $.get(url, function(data, status){
                var filter = data.slice(4,9);
                document.getElementById("beratlabel").innerHTML = filter;
                berat2.val(filter);
                console.log(filter);
            });
        }

        // interval = setInterval(refreshButton, 1);

        function tukul() {
            
            var type = $("#tipe").val();
            var form = $("#form");
            console.log(type)
            if (type == 1) {
                 $('#form :input').attr('disabled', true);
            }else if(type == 2){
                $('#form :input').attr('disabled', false);
            }else if(type == 3){
                $('#form :input').attr('disabled', false);
                document.getElementById("no_polisi").disabled = false;
                document.getElementById("no_seal").disabled = true;
                document.getElementById("no_container").disabled = true;
            }else if(type== 4){
                $('#form :input').attr('disabled', false);
                document.getElementById("no_polisi").disabled = true;
                document.getElementById("no_seal").disabled = false;
                document.getElementById("no_container").disabled = false;
            }
        }

    </script>
@endpush
