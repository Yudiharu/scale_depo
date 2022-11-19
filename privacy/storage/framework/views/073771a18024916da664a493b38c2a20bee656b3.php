<?php $__env->startSection('title', 'Transaksi'); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<?php echo $__env->make('sweet::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box box-danger">
                <div class="box-body">
                    <a href="<?php echo e($create_url); ?>" class="btn btn-success btn-xs">New Transaksi</a>
                    <div class="pull-right">
                    <!-- <a href="<?php echo e(route('transaksis.laporanExcel')); ?>" class="btn btn-success btn-xs">Export to Excel</a>
                    <a href="<?php echo e(route('transaksis.laporanPDF')); ?>" class="btn btn-danger btn-xs">Export to PDF</a> -->
                        <span class="pull-right"> 
                            <font style="font-size: 16px;"><b>TRANSAKSI</b></font>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="customer-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr>
                        <th width="20px" align="center">Tanggal Masuk</th>
                        <th width="20px" align="center">No Transaksi</th>
                        <th width="20px" align="center">No PO/DO</th>
                        <th width="20px" align="center">No Polisi</th>
                        <th width="10px" align="center">No Container</th>
                        <th width="20px" align="center">No Seal</th>
                        <th width="20px" align="center">Muatan</th>
                        
                       
                        
                        <th width="100px" align="center">Action</th>
                     </tr>
                    </thead>
                </table>
            </div>
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

            /* Button used to open the contact form - fixed at the bottom of the page */
            .hapus-button {
                background-color: #F63F3F;
                bottom: 186px;
            }

            .edit-button {
                background-color: #FDA900;
                bottom: 216px;
            }

            .view-button {
                background-color: #1674c7;
                bottom: 246px;
            }

            #mySidenav button {
              position: fixed;
              right: -30px;
              transition: 0.3s;
              padding: 4px 8px;
              width: 70px;
              text-decoration: none;
              font-size: 12px;
              color: white;
              border-radius: 5px 0 0 5px ;
              opacity: 0.8;
              cursor: pointer;
              text-align: left;
            }

            #mySidenav button:hover {
              right: 0;
            }

            #about {
              top: 70px;
              background-color: #4CAF50;
            }

            #blog {
              top: 130px;
              background-color: #2196F3;
            }

            #projects {
              top: 190px;
              background-color: #f44336;
            }

            #contact {
              top: 250px;
              background-color: #555
            }
        </style>

        <div id="mySidenav" class="sidenav">
            <!-- <button type="button" class="btn btn-warning btn-xs edit-button" id="edittransaksi" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>

            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapustransaksi" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>

            <button type="button" class="btn btn-primary btn-xs view-button" id="button5">VIEW <i class="fa fa-eye"></i></button> -->
            <a href="#" id="addpembelian"><button type="button" class="btn btn-info btn-xs add-button" data-toggle="modal" data-target="">EDIT <i class="fa fa-plus"></i></button></a>
        </div>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
  
    <script>
        function load(){
            startTime();
            $('.back2Top').show();
        }

        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 1) {
                $('#back2Top').show();
            } else {
                $('#back2Top').show();
            }
        });

        $(function() {
            $('#customer-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('transaksi.data'); ?>',
            order: [[ 0, "desc" ]],
            columns: [
                { data: 'tanggal_masuk', name: 'tanggal_masuk'},
                { data: 'no_transaksi', name: 'no_transaksi' },
                { data: 'no_po', name: 'no_po' },
                { data: 'no_polisi', name: 'no_polisi' },
                { data: 'no_container', name: 'no_container' },
                { data: 'no_seal', name: 'no_seal' },
                { data: 'muatan', name: 'muatan' },
                //{ data: 'nama_supir', name: 'nama_supir' },
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
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            var table = $('#customer-table').DataTable();

            $('#customer-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                    var no_pembelian = select.find('td:eq(1)').text();
                    var add = $("#addpembelian").attr("href","http://localhost/scale-depo/admin/transaksis/"+no_pembelian+"/edit");
                }
            });

            // $('#editsupplier').click( function () {
            //     var select = $('.selected').closest('tr');
            //     var kode_supplier = select.find('td:eq(0)').text();
            //     var row = table.row( select );
            //     $.ajax({
            //         url: '<?php echo route('supplier.edit_supplier'); ?>',
            //         type: 'POST',
            //         data : {
            //             'id': kode_supplier
            //         },
            //         success: function(results) {
            //             console.log(results);
            //             $('#kode').val(results.kode_supplier);
            //             $('#nama').val(results.nama_supplier);
            //             $('#alamat').val(results.alamat);
            //             $('#editform').modal('show');
            //             }
         
            //     });
            // });

            // $('#hapussupplier').click( function () {
            //     var select = $('.selected').closest('tr');
            //     var kode_supplier = select.find('td:eq(0)').text();
            //     var row = table.row( select );
            //     swal({
            //         title: "Hapus?",
            //         text: "Pastikan dahulu item yang akan di hapus",
            //         type: "warning",
            //         showCancelButton: !0,
            //         confirmButtonText: "Ya, Hapus!",
            //         cancelButtonText: "Batal!",
            //         reverseButtons: !0
            //     }).then(function (e) {
            //         if (e.value === true) {
            //             $.ajax({
            //                 url: '<?php echo route('supplier.hapus_supplier'); ?>',
            //                 type: 'POST',
            //                 data : {
            //                     'id': kode_supplier
            //                 },

            //                 success: function (results) {
            //                     if (results.success === true) {
            //                         swal("Berhasil!", results.message, "success");
            //                     } else {
            //                         swal("Gagal!", results.message, "error");
            //                     }
            //                     refreshTable();
            //                 }
            //             });
            //         }
            //     });
            // });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function refreshTable() {
             $('#customer-table').DataTable().ajax.reload(null,false);;
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>