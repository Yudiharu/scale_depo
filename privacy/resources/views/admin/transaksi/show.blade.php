@extends('adminlte::page')

@section('title', 'Show Data')

@section('content_header')
    <h1>Show Transaksi</h1>
@stop

@section('content')
<body onLoad="load()">
    <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-danger">
                <div class="box-body">
                    <a href="{{ $info['list_url'] }}" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a class="btn btn-warning btn-xs" href="{{ route('transaksis.pdf', $transaksi->no_transaksi) }}" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                    <span class="pull-right">
                        <font style="font-size: 16px;"> Detail Transaksi <b>{{$transaksi->no_transaksi}}</b></font>
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="customer-table" width="100%" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td>{{$transaksi->tanggal_masuk}}</td>
                        </tr>
                        <tr>
                            <th>No Transaksi</th>
                            <td>{{$transaksi->no_transaksi}}</td>
                        </tr>
                        <tr>
                            <th>No PO/DO</th>
                            <td>{{$transaksi->no_po}}</td>
                        </tr>
                        <tr>
                            <th>No Polisi</th>
                            <td>{{$transaksi->no_polisi}}</td>
                        </tr>
                        <tr>
                            <th>No Seal</th>
                            <td>{{$transaksi->no_seal}}</td>
                        </tr>
                        <tr>
                            <th>No Container</th>
                            <td>{{$transaksi->no_container}}</td>
                        </tr>
                        <tr>
                            <th>Tipe Container</th>
                            <td>{{$transaksi->sizetipemaster->size_type??'Tidak Ada'}}</td>
                        </tr>
                        <tr>
                            <th>Muatan</th>
                            <td>{{$transaksi->muatan}}</td>
                        </tr>
                        <tr>
                            <th>Nama Supir</th>
                            <td>{{$transaksi->nama_supir}}</td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td>{{$transaksi->barang->nama_barang??'Tidak Ada'}}</td>
                        </tr>
                        <tr>
                            <th>Nama Supplier</th>
                            <td>{{$transaksi->supplier->nama_supplier??'Tidak Ada'}}</td>
                        </tr>
                        <tr>
                            <th>Nama Customer</th>
                            <td>{{$transaksi->customer->nama_customer??'Tidak Ada'}}</td>
                        </tr>
                        <tr>
                            <th>Nama Company</th>
                            <td>{{$transaksi->company->nama_company??'Tidak Ada'}}
                            </td>
                        </tr>
                        <tr>
                            <th>Berat 1</th>
                            <td>{{$transaksi->berat1}}</td>
                        </tr>
                        <tr>
                            <th>Berat 2</th>
                            <td>{{$transaksi->berat2}}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{$transaksi->keterangan}}</td>
                        </tr>
                    <thead>
                </table>
            </div>
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
    <!-- /.box -->
</body>
@stop
@push('js')
    <script>
        function load(){
          startTime();
          $('.back2Top').show();
        } 

        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });
        });
    </script>
@endpush
