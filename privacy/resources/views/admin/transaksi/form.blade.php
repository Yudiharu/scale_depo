@extends('adminlte::page')

@section('title', 'Form Transaksi')

@section('content_header')
    <h1>Transaksi</h1>
@stop

@section('content')
<body onLoad="load()">
    

<div class="col-md-8">
    <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Create Transaksi</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <button class="btn btn-warning btn-sm" id="edit">Edit</button>
                <div class="col-md-12">
                    <table class="table table-striped" id="data-table" width="100%">
                    <thead>
                        <tr  width="100%">
                            <th>Tanggal/Jam Masuk</th>
                            <th>No Transaksi</th>
                            <th>No PO/DO</th>
                            <th>No Polisi</th>
                            <th>No Container</th>
                            <th>No Seal</th>
                            <th>Muatan</th>
                            <th>Nama Supir</th>
                            <th>Action</th>
                        </tr>
                    <thead>
                    <tbody>
                        
                    </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <a href="{{ $list_url }}" class="btn btn-default btn-sm">Lihat Data</a>
                    <div class="pull-right">
                        <button type="button" onclick="refreshButton()" class="btn btn-danger btn-sm">Timbang</button>
                    </div>
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
<div class="col-md-12">
<div class="box box-success">
    {{-- <button id="button">OK</button> --}}
    <div class="box-header with border">
        <div class="col-md-3">
        <select name="tipe" id="tipe" class="form-control" onchange="tukul()">
            <option value="1" selected>Pilih Tipe</option>                              
            <option value="2">Truk/Container</option>
            <option value="3">Mobil Cap</option>
            <option value="4">Container</option>                                
        </select>
        
        </div>
        <div class="col-md-3">
            <select name="tipe" id="jenis" class="form-control" onchange="jenis()">
                <option value="0" selected>Pilih Jenis</option>                              
                <option value="1">Supplier</option>
                <option value="2">Customer</option>
                <option value="3">Company</option>                                
            </select>
        </div>
    </div>

        {!! Form::open(['route' => ['transaksis.store'],'method' => 'post','id'=>'form']) !!}

       {{--  {!! Form::model($transaksi, ['route' => ['transaksis.update', $transaksi->no_transaksi],'method' => 'patch','id'=>'form']) !!}
         --}}
         <div class="box-body">
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-body">
                        
                        <div class="form-group">
                            {{ Form::label('name', 'No Transaksi:') }}
                            {{ Form::text('no_transaksi', null, ['class'=> 'form-control']) }}
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('name', 'No PO/DO:') }}
                            {{ Form::text('no_po', null, ['class'=> 'form-control',]) }}
                        </div>

                        <div class="form-group" id="no_polisi">
                            {{ Form::label('name', 'No Polisi:') }}
                            {{ Form::text('no_polisi', null, ['class'=> 'form-control']) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('name', 'No Container:') }}
                            {{ Form::text('no_container', null, ['class'=> 'form-control','id'=>'no_container']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('name', 'No Seal:') }}
                            {{ Form::text('no_seal', null, ['class'=> 'form-control','id'=>'no_seal']) }}
                        </div>

                         <div class="form-group">
                                {{ Form::label('name', 'Size Tipe:') }}
                                {{ Form::select('', $sizeAll, null, ['class'=> 'form-control',
                                'placeholder' => 'Pilih Tipe Container','id'=>'id_size']) }}
                                {{-- <select name="id size" id="id_size" class="form-control">
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
                                {{-- <select name="kode barang" id="kode_barang" class="form-control" required="required">
                                <option value="--">Pilih Barang</option>
                                            @foreach($barangAll as $barang)
                                                <option value="{{ $barang->kode_barang }}">
                                                    {{ $barang->nama_barang }}
                                                </option>
                                            @endforeach
                                </select> --}}
                            </div>
                            
                            <div class="form-group jenis1">
                                    {{ Form::label('name', 'Nama Supplier:') }}
                                    {{ Form::select('kode_supplier', $supplierAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Supplier']) }}
                                   {{--  <select name="kode supplier" id="kode_supplier" class="form-control">
                                    <option value="--">Pilih Supplier</option>
                                                @foreach($supplierAll as $supplier)
                                                    <option value="{{ $supplier->kode_supplier }}">
                                                        {{ $supplier->nama_supplier }}
                                                    </option>
                                                @endforeach
                                    </select> --}}
                                </div>

                            <div class="form-group jenis2">
                                    {{ Form::label('name', 'Nama Customer:') }}
                                    {{ Form::select('kode_customer', $customerAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Customer']) }}
                                   {{--  <select name="kode customer" id="kode_customer" class="form-control">
                                    <option value="--">Pilih Customer</option>
                                                @foreach($customerAll as $customer)
                                                    <option value="{{ $customer->kode_customer }}">
                                                        {{ $customer->nama_customer }}
                                                    </option>
                                                @endforeach
                                    </select> --}}
                                </div>

                            <div class="form-group jenis3">
                                    {{ Form::label('name', 'Nama Company:') }}
                                    {{ Form::select('kode_company', $companyAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Company']) }}
                                   {{--  <select name="kode company" id="kode_company" class="form-control">
                                    <option value="--">Pilih Company</option>
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
                                {{ Form::text('berat1', 0, ['class'=> 'form-control','id'=> 'berat1']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Berat 2:') }}
                                {{ Form::text('berat2', 0, ['class'=> 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Keterangan:') }}
                                {{ Form::textArea('keterangan', null, ['class'=> 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>
        </div>

                <div class=" box-footer">
                    <div class="pull-right">
                    {{ Form::submit('Create data', ['class' => 'btn btn-success']) }}
                    </div>
                </div>

        {!! Form::close() !!}
</div>
</div>    
        

</body>
    <!-- /.box -->
@stop

@push('js')
    <script>
        function load(){
          $('#form :input').attr('disabled', true);
          // $(".jenis1").css("display","none");
          // $(".jenis2").css("display","none");
          // $(".jenis3").css("display","none");
        }

        function refreshButton() {
            let berat1 = $('#berat1');
            let url = "{{ route('openserial.test') }}";
            berat1.val('');
            $.get(url, function(data, status){
                var filter = data.slice(4, 9);
                document.getElementById("beratlabel").innerHTML = filter;
                berat1.val('');
                berat1.val(filter);
                console.log(filter);
            });
        }
        
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
                document.getElementById("id_size").disabled = true;
            }else if(type== 4){
                $('#form :input').attr('disabled', false);
                document.getElementById("no_polisi").disabled = true;
                document.getElementById("no_seal").disabled = false;
                document.getElementById("no_container").disabled = false;
            }
        }

        function jenis() {
           var jenis = $("#jenis").val();
           console.log(jenis)
            if (jenis == 1) {
                 $(".jenis1").fadeIn('slow');
                 $(".jenis3").fadeOut('slow');
            }else if(jenis == 2){
                $(".jenis1").fadeOut('slow');
                $(".jenis2").fadeIn('slow');
            }else if(jenis == 3){
                $(".jenis1").fadeOut('slow');
                $(".jenis2").fadeOut('slow');
                $(".jenis3").fadeIn('slow');
            }else if(jenis == 0){
                $(".jenis1").fadeOut('slow');
                $(".jenis2").fadeOut('slow');
                $(".jenis3").fadeOut('slow');
            }
        }

        $(function() {
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('form.data') !!}',
            scrollX: true,
            scrollY: 200,
            order: [[ 0, "desc" ]],
            columns: [
                { data: 'tanggal_masuk', name: 'tanggal_masuk'},
                { data: 'no_transaksi', name: 'no_transaksi' },
                { data: 'no_po', name: 'no_po' },
                { data: 'no_polisi', name: 'no_polisi' },
                { data: 'no_container', name: 'no_container' },
                { data: 'no_seal', name: 'no_seal' },
                { data: 'muatan', name: 'muatan' },
                { data: 'nama_supir', name: 'nama_supir' },
                //{ data: 'supplier.nama_supplier', name: 'supplier.nama_supplier' },
                //{ data: 'customer.nama_customer', name: 'customer.nama_customer' },
                //{ data: 'company.nama_company', name: 'company.nama_company'},
                //{ data: 'barang.nama_barang', name: 'barang.nama_barang' },
                //{ data: 'keterangan', name: 'keterangan' },
                //{ data: 'jam_masuk', name: 'jam_masuk' },
                //{ data: 'berat1', name: 'berat1' },
                //{ data: 'berat2', name: 'berat2' },
                //{ data: 'created_at', name: 'created_at' },
                //{ data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action' }
            ]
            });
        });

        $(document).ready(function() {
            var table = $('#data-table').DataTable( {
                dom: 'Bfrtip',
                select: true,
                buttons: [
                    {
                        text: 'Select all',
                        action: function () {
                            table.rows().select();
                        }
                    },
                    {
                        text: 'Select none',
                        action: function () {
                            table.rows().deselect();
                        }
                    }
                ]
            } );
        } );

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }
        function del(id, url) {
            var result = confirm("Want to delete?");
            if (result) {
                // console.log(id)
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(result) {
                        console.log(result);
                        $.notify(result.message, "success");
                        refreshTable();
                    }
                });
            }

        }

    </script>
@endpush
