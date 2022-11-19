<?php $__env->startSection('title', 'Show Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Show Transaksi</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-danger">
                <div class="box-body">
                    <a href="<?php echo e($info['list_url']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a class="btn btn-warning btn-xs" href="<?php echo e(route('transaksis.pdf', $transaksi->no_transaksi)); ?>"><i class="fa fa-print"></i> Cetak</a>
                    <span class="pull-right">
                        <font style="font-size: 16px;"> Detail Transaksi <b><?php echo e($transaksi->no_transaksi); ?></b></font>
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="customer-table" width="100%" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td><?php echo e($transaksi->tanggal_masuk); ?></td>
                        </tr>
                        <tr>
                            <th>No Transaksi</th>
                            <td><?php echo e($transaksi->no_transaksi); ?></td>
                        </tr>
                        <tr>
                            <th>No PO/DO</th>
                            <td><?php echo e($transaksi->no_po); ?></td>
                        </tr>
                        <tr>
                            <th>No Polisi</th>
                            <td><?php echo e($transaksi->no_polisi); ?></td>
                        </tr>
                        <tr>
                            <th>No Seal</th>
                            <td><?php echo e($transaksi->no_seal); ?></td>
                        </tr>
                        <tr>
                            <th>No Container</th>
                            <td><?php echo e($transaksi->no_container); ?></td>
                        </tr>
                        <tr>
                            <th>Tipe Container</th>
                            <td><?php echo e($transaksi->sizetipemaster->size_type??'Tidak Ada'); ?></td>
                        </tr>
                        <tr>
                            <th>Muatan</th>
                            <td><?php echo e($transaksi->muatan); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Supir</th>
                            <td><?php echo e($transaksi->nama_supir); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td><?php echo e($transaksi->barang->nama_barang??'Tidak Ada'); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Supplier</th>
                            <td><?php echo e($transaksi->supplier->nama_supplier??'Tidak Ada'); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Customer</th>
                            <td><?php echo e($transaksi->customer->nama_customer??'Tidak Ada'); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Company</th>
                            <td><?php echo e($transaksi->company->nama_company??'Tidak Ada'); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Berat 1</th>
                            <td><?php echo e($transaksi->berat1); ?></td>
                        </tr>
                        <tr>
                            <th>Berat 2</th>
                            <td><?php echo e($transaksi->berat2); ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?php echo e($transaksi->keterangan); ?></td>
                        </tr>
                    <thead>
                </table>
            </div>
        </div>
        <button type="button" class="back2Top btn btn-warning btn-xs" id="back2Top"><i class="fa fa-arrow-up" style="color: #fff"></i> <i><?php echo e($nama_company); ?></i> <b>(<?php echo e($nama_lokasi); ?>)</b></button>

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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>