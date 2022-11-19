<?php $__env->startSection('title', 'Edit Data'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Transaksi Edit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-8">
    <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Create Transaksi</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
                    <div class="pull-right">
                        <button type="button" onclick="refreshButton()" class="btn btn-danger btn-sm">Timbang</button>
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
        
        </div>
    </div>
            <?php echo Form::model($transaksi, ['route' => ['transaksis.update', $transaksi->no_transaksi],'method' => 'patch','id'=>'form']); ?>

            <div class="box-body">
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-body">
                        
                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No Transaksi:')); ?>

                                <?php echo e(Form::text('no_transaksi', null, ['class'=> 'form-control','readonly'=>'readonly'])); ?>

                            </div>
                        
                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No Polisi:')); ?>

                                <?php echo e(Form::text('no_polisi', null, ['class'=> 'form-control'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No PO/DO:')); ?>

                                <?php echo e(Form::text('no_po', null, ['class'=> 'form-control'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No Seal:')); ?>

                                <?php echo e(Form::text('no_seal', null, ['class'=> 'form-control'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No Container:')); ?>

                                <?php echo e(Form::text('no_container', null, ['class'=> 'form-control'])); ?>

                            </div>

                            <div class="form-group">
                                    <?php echo e(Form::label('name', 'Size Tipe:')); ?>

                                     <?php echo e(Form::select('kode_ukuran', $sizeAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Tipe Container'])); ?>

                                   
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-danger">
                        <div class="box-body">
                        
                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Muatan:')); ?>

                                <?php echo e(Form::text('muatan', null, ['class'=> 'form-control'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Nama Supir:')); ?>

                                <?php echo e(Form::text('nama_supir', null, ['class'=> 'form-control'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Nama Barang:')); ?>

                                 <?php echo e(Form::select('kode_barang', $barangAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Barang'])); ?>

                                
                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Nama Supplier:')); ?>

                                 <?php echo e(Form::select('kode_supplier', $supplierAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Supplier'])); ?>

                                
                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Nama Customer:')); ?>

                                 <?php echo e(Form::select('kode_customer', $customerAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Customer'])); ?>

                                
                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Nama Company:')); ?>

                                 <?php echo e(Form::select('kode_company', $companyAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Company'])); ?>

                               
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="box box-warning">
                        <div class="box-body">
                           <div class="form-group">
                                <?php echo e(Form::label('name', 'Berat 1:')); ?>

                                <?php echo e(Form::text('berat1', null, ['class'=> 'form-control','id'=> 'berat1'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Berat 2:')); ?>

                                <?php echo e(Form::text('berat2', null, ['class'=> 'form-control','id'=> 'berat2'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Keterangan:')); ?>

                                <?php echo e(Form::textArea('keterangan', null, ['class'=> 'form-control'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
        </div>

                <div class="box box-footer">
                    <div class="pull-right">
                    <?php echo e(Form::submit('Update data', ['class' => 'btn btn-success'])); ?>

                    </div>
                </div>


            <?php echo Form::close(); ?>

    </div>
</div>

</body>
        
    <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>

        // function load(){
        //   $('#form :input').attr('disabled', true);
        // } 

        function refreshButton() {
            let berat2 = $('#berat2');
            let url = "<?php echo e(route('openserial.test')); ?>";
            berat2.val('');
            $.get(url, function(data, status){
                var filter = data.slice(4, 9);
                document.getElementById("beratlabel").innerHTML = filter;
                berat2.val('');
                berat2.val(filter);
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
            }else if(type== 4){
                $('#form :input').attr('disabled', false);
                document.getElementById("no_polisi").disabled = true;
                document.getElementById("no_seal").disabled = false;
                document.getElementById("no_container").disabled = false;
            }
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>