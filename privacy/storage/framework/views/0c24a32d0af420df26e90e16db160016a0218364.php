<?php $__env->startSection('title', 'Customer'); ?>

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
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addform">
                        <i class="fa fa-plus"></i> New Customer</button>
                    <span class="pull-right"> 
                        <font style="font-size: 16px;"><b>CUSTOMER</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="customer-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr>
                        <th>Kode Customer</th>
                        <th>Nama Customer</th>
                        <th>No Telepon</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                     </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addform" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'ADD']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_customer', 'Nama Customer:')); ?>

                                    <?php echo e(Form::text('nama_customer', null, ['class'=> 'form-control','id'=>'nama1','required'=>'required', 'placeholder'=>'Nama Customer', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_telepon', 'No Telepon:',['class'=>'control-label'])); ?>

                                    <?php echo e(Form::text('no_telepon', null, ['class'=> 'form-control','id'=>'telepon1','required'=>'required', 'placeholder'=>'No Telepon', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row">
                            <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success crud-submit'])); ?>

                            <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                        </div>
                    </div>
                <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="editform" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit Data</h4>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['id'=>'EDIT']); ?>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('kode_customer', 'Kode Customer:')); ?>

                                    <?php echo e(Form::text('kode_customer', null, ['class'=> 'form-control','id'=>'kode','required'=>'required','readonly'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('nama_customer', 'Nama Customer:')); ?>

                                    <?php echo e(Form::text('nama_customer', null, ['class'=> 'form-control','id'=>'nama','required'=>'required', 'placeholder'=>'Nama Customer', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('no_telepon', 'No Telepon:',['class'=>'control-label'])); ?>

                                    <?php echo e(Form::text('no_telepon', null, ['class'=> 'form-control','id'=>'telepon','required'=>'required', 'placeholder'=>'Tipe Barang', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row">
                            <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success crud-submit'])); ?>

                            <?php echo e(Form::button('Close', ['class' => 'btn btn-danger','data-dismiss'=>'modal'])); ?>&nbsp;
                        </div>
                    </div>
                <?php echo Form::close(); ?>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editcustomer" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>

            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuscustomer" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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
            ajax: '<?php echo route('customer.data'); ?>',
            columns: [
                { data: 'kode_customer', name: 'kode_customer' },
                { data: 'nama_customer', name: 'nama_customer' },
                { data: 'no_telepon', name: 'no_telepon' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
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
                }
            });

            $('#editcustomer').click( function () {
                var select = $('.selected').closest('tr');
                var kode_customer = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('customer.edit_customer'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_customer
                    },
                    success: function(results) {
                        console.log(results);
                        $('#kode').val(results.kode_customer);
                        $('#nama').val(results.nama_customer);
                        $('#telepon').val(results.no_telepon);
                        $('#editform').modal('show');
                        }
         
                });
            });

            $('#hapuscustomer').click( function () {
                var select = $('.selected').closest('tr');
                var kode_customer = select.find('td:eq(0)').text();
                var row = table.row( select );
                swal({
                    title: "Hapus?",
                    text: "Pastikan dahulu item yang akan di hapus",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal!",
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                        $.ajax({
                            url: '<?php echo route('customer.hapus_customer'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode_customer
                            },

                            success: function (results) {
                                if (results.success === true) {
                                    swal("Berhasil!", results.message, "success");
                                } else {
                                    swal("Gagal!", results.message, "error");
                                }
                                refreshTable();
                            }
                        });
                    }
                });
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function pulsar(e,obj) {            
              tecla = (document.all) ? e.keyCode : e.which;
              //alert(tecla);
              if (tecla!="8" && tecla!="0"){
                obj.value += String.fromCharCode(tecla).toUpperCase();
                return false;
              }else{
                return true;
              }
        }

        function hanyaAngka(e, decimal) {
            var key;
            var keychar;
             if (window.event) {
                 key = window.event.keyCode;
             } else
             if (e) {
                 key = e.which;
             } else return true;
          
            keychar = String.fromCharCode(key);
            if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
                return true;
            } else
            if ((("0123456789").indexOf(keychar) > -1)) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }

        function refreshTable() {
             $('#customer-table').DataTable().ajax.reload(null,false);;
        }

        $('#ADD').submit(function (e) {
            e.preventDefault();
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('customer.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#kode1').val('');
                        $('#nama1').val('');
                        $('#telepon1').val('');
                        $('#addform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
        });

        $('#EDIT').submit(function (e) {
            e.preventDefault();
            var registerForm = $("#EDIT");
            var formData = registerForm.serialize();
            
                $.ajax({
                    url:'<?php echo route('customer.ajaxupdate'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#editform').modal('hide');
                        refreshTable();
                        if (data.success === true) {
                            swal("Berhasil!", data.message, "success");
                        } else {
                            swal("Gagal!", data.message, "error");
                        }
                    },
                });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>