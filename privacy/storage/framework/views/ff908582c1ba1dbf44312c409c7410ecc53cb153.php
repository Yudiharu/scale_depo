<?php $__env->startSection('title', $info['title'] ); ?>


<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="/gui_inventory_laravel/css/logo_gui.png" sizes="16x16" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<body onLoad="load()">
    <div class="box box-solid">
        <?php echo Form::open(['route' => ['permissions.store']]); ?>

        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="row">
                <div class="col-md-4">
                   <div class="box">
                       <div class="box-header">
                           <h3 class="box-title">Permission Parameter</h3>
                       </div>
                       <div class="box-body">
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'read',null)); ?> Read
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'create',null)); ?> Create
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'Post',null)); ?> Post
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'unpost',null)); ?> Unpost
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'delete',null)); ?> Delete
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'update',null)); ?> Update
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'add',null)); ?> Add Detail
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'view',null)); ?> View Detail
                               </label>
                           </div>
                           <div class="form-group">
                               <label>
                                   <?php echo e(Form::checkbox('parameter[]', 'print',null)); ?> Print
                               </label>
                           </div>
                       </div>
                   </div>
                </div>

                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Permission Entry</h3>
                        </div>
                        <div class="box-body">

                                <div class="form-group">
                                    <?php echo e(Form::label('name', 'Name:')); ?>

                                    <?php echo e(Form::text('name', null, ['class'=> 'form-control', 'placeholder'=> 'Please enter permission name'])); ?>

                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->

        <?php echo Form::close(); ?>

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
</body>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 1) {
                $('#back2Top').show();
            } else {
                $('#back2Top').show();
            }
        });
        
        $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        });

        function load(){
            startTime();
            $('.back2Top').show();
        }

        var app = new Vue({
            el: '.box',
            data: {
                message: 'Hello Vue!'
            },

            mounted() {
                this.checkedAll()
            },

            methods: {
                update: function (event) {
                    var url = ''
                    var data = $('#form_roles_edit').serialize();

                    axios.put(url, data).then(function (response) {
                        console.log(response.data)
                        if (response.data.success){
                            swal({
                                title: "<b>Proses Sedang Berlangsung</b>",
                                type: "warning",
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                        swal("Berhasil!", response.data.message, "success");
                        }
                    })
                },

                checkedAll: function (event) {
                    $('#checkAll').click(function () {
                        $('.selected').prop('checked', this.checked);
                    });
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>