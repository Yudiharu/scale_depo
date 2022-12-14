<?php $__env->startSection('title', 'Company'); ?>

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
                        <i class="fa fa-plus"></i> New Company</button>
                    <span class="pull-right"> 
                        <font style="font-size: 16px;"><b>COMPANY</b></font>
                    </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="data-table" width="100%" style="font-size: 12px;">
                    <thead>
                    <tr>
                        <th>Kode Company</th>
                        <th>Nama Company</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Npwp</th>
                        <th>Status</th>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('Nama Company', 'Nama Company:')); ?>

                                    <?php echo e(Form::text('nama_company', null, ['class'=> 'form-control','id'=>'Nama1','required'=>'required', 'placeholder'=>'Nama Company', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                    <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>'4','id'=>'Alamat1','required'=>'required', 'placeholder'=>'Alamat', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('telp', 'Telp:')); ?>

                                    <?php echo e(Form::text('telp', null, ['class'=> 'form-control','id'=>'Telp1','required'=>'required', 'placeholder'=>'No. Telepon', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Npwp', 'Npwp:')); ?>

                                    <input type="text" name="number" style="display:none;">
                                    <?php echo e(Form::text('npwp', null, ['class'=> 'form-control','id'=>'Npwp1','required'=>'required', 'placeholder'=>'NPWP', 'autocomplete'=>'off', 'name'=>'npwp','onkeypress'=>"return hanyaAngka(event)"])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('status', 'Status:')); ?>

                                    <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'Status1','required'=>'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Tipe', 'Tipe:')); ?>

                                    <?php echo e(Form::select('tipe', ['Pusat' => 'Pusat', 'Cabang' => 'Cabang'], null, ['class'=> 'form-control','style'=>'width: 100%','placeholder' => '','id'=>'tipe1','required'=>'required','onchange'=>"tipes();"])); ?>

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group2">
                                    <?php echo e(Form::label('kode', 'Kode Company:')); ?>

                                    <?php echo e(Form::select('kode_comp', $company, null, ['class'=> 'form-control','style'=>'width: 100%','placeholder'=>'','id'=>'company1','required'=>'required'])); ?>

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

    <div class="modal fade" id="editform" tabindex="-1" role="dialog">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                    <?php echo e(Form::label('kode_company', 'Kode:')); ?>

                                    <?php echo e(Form::text('kode_company', null, ['class'=> 'form-control','id'=>'Kode','readonly'])); ?>

                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <?php echo e(Form::label('Nama Company', 'Nama Company:')); ?>

                                <?php echo e(Form::text('nama_company', null, ['class'=> 'form-control','id'=>'Nama', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?php echo e(Form::label('alamat', 'Alamat:')); ?>

                                <?php echo e(Form::textArea('alamat', null, ['class'=> 'form-control','rows'=>'4','id'=>'Alamat', 'autocomplete'=>'off', 'onkeypress'=>"return pulsar(event,this)"])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('telp', 'Telp:')); ?>

                                <?php echo e(Form::text('telp', null, ['class'=> 'form-control','id'=>'Telp', 'autocomplete'=>'off','onkeypress'=>"return hanyaAngka(event)"])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Npwp', 'Npwp:')); ?>

                                <input type="text" name="number" style="display:none;">
                                <?php echo e(Form::text('npwp', null, ['class'=> 'form-control','id'=>'Npwp', 'name'=>'npwp', 'autocomplete'=>'off'])); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('status', 'Status:')); ?>

                                <?php echo e(Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'Non Aktif'], null, ['class'=> 'form-control','id'=>'Status'])); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

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
            <button type="button" class="btn btn-warning btn-xs edit-button" id="editcompany" data-toggle="modal" data-target="">EDIT <i class="fa fa-edit"></i></button>

            <button type="button" class="btn btn-danger btn-xs hapus-button" id="hapuscompany" data-toggle="modal" data-target="">HAPUS <i class="fa fa-times-circle"></i></button>
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
            $('.form-group2').hide();
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
            $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo route('company.data'); ?>',
            columns: [
                { data: 'kode_company', name: 'kode_company' },
                { data: 'nama_company', name: 'nama_company' },
                { data: 'alamat', name: 'alamat' },
                { data: 'telp', name: 'telp' },
                { data: 'npwp', name: 'npwp' },
                { data: 'status', name: 'status' },
            ]
            });
        });

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            $("input[name='npwp']").on("keyup change", function(){
            $("input[name='number']").val(destroyMask(this.value));
                this.value = createMask($("input[name='number']").val());
            })

            function createMask(string){
                return string.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/,"$1.$2.$3.$4-$5.$6");
            }

            function destroyMask(string){
                return string.replace(/\D/g,'').substring(0,15);
            }

            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            var table = $('#data-table').DataTable();

            $('#data-table tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected bg-gray') ) {
                    $(this).removeClass('selected bg-gray');
                }
                else {
                    table.$('tr.selected').removeClass('selected bg-gray');
                    $(this).addClass('selected bg-gray');
                    var select = $('.selected').closest('tr');
                }
            });

            $('#editcompany').click( function () {
                var select = $('.selected').closest('tr');
                var kode_company = select.find('td:eq(0)').text();
                var row = table.row( select );
                $.ajax({
                    url: '<?php echo route('company.edit_company'); ?>',
                    type: 'POST',
                    data : {
                        'id': kode_company
                    },
                    success: function(results) {
                        console.log(results);
                        $('#Kode').val(results.kode_company);
                        $('#Nama').val(results.nama_company);
                        $('#Alamat').val(results.alamat);
                        $('#Telp').val(results.telp);
                        $('#Npwp').val(results.npwp);
                        $('#Status').val(results.status);
                        $('#editform').modal('show');
                        }
         
                });
            });

            $('#hapuscompany').click( function () {
                var select = $('.selected').closest('tr');
                var kode_company = select.find('td:eq(0)').text();
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
                            url: '<?php echo route('company.hapus_company'); ?>',
                            type: 'POST',
                            data : {
                                'id': kode_company
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

        function tipes() {
            var type = $("#tipe1").val();
            // console.log(type)
            if(type == 'Pusat'){
                $('.form-group2').hide();
                document.getElementById("company1").disabled = true;
            }else if(type == 'Cabang'){
                $('.form-group2').show();
                document.getElementById("company1").disabled = false;
            }
        }

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
            if ((("0123456789.-").indexOf(keychar) > -1)) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }   

        function refreshTable() {
             $('#data-table').DataTable().ajax.reload(null,false);;
        }

        $('#ADD').submit(function (e) {
            e.preventDefault();
            var registerForm = $("#ADD");
            var formData = registerForm.serialize();

                $.ajax({
                    url:'<?php echo route('company.store'); ?>',
                    type:'POST',
                    data:formData,
                    success:function(data) {
                        console.log(data);
                        $('#Nama1').val('');
                        $('#Alamat1').val('');
                        $('#Telp1').val('');
                        $('#Npwp1').val('');
                        $('#tipe1').val('').trigger('change');
                        $('#Status1').val('').trigger('change');
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
                    url:'<?php echo route('company.ajaxupdate'); ?>',
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