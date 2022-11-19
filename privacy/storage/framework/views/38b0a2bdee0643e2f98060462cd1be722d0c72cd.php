<?php $__env->startSection('title', $info['title']); ?>

<?php $__env->startSection('content_header'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="load()">
    <div class="box box-solid">
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($info['list_url']); ?>" class="btn btn-light btn-xs pull-left"> <i class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <?php echo $__env->make('errors.validation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo Form::model($permission, ['route' => ['permissions.update', $permission->id],'method' => 'put']); ?>


                <div class="form-group">
                    <?php echo e(Form::label('name', 'Name:')); ?>

                    <?php echo e(Form::text('name', null, ['class'=> 'form-control','readonly'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('display_name', 'Display Name:')); ?>

                    <?php echo e(Form::text('display_name', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::label('description', 'Description:')); ?>

                    <?php echo e(Form::text('description', null, ['class'=> 'form-control'])); ?>

                </div>

                <div class="form-group">
                    <?php echo e(Form::submit('Update', ['class' => 'btn btn-success btn-sm'])); ?>

                </div>

            <?php echo Form::close(); ?>


        </div>

    </div>
    <!-- /.box -->

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
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>