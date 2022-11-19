<?php $__env->startSection('title', 'Transaksi Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Transaksi</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body onLoad="load()">
    

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
<div class="col-md-12">
    <div class="box box-success">
        
        
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
        <?php echo Form::open(['route' => ['transaksis.store'],'method' => 'post','id'=>'form']); ?>   
            <div class="box-body">
                    <div class="col-md-4">
                        <div class="box box-info">
                            <div class="box-body">
                            
                            
                            
                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No PO/DO:')); ?>

                                <?php echo e(Form::text('no_po', null, ['class'=> 'form-control',])); ?>

                            </div>

                            <div class="form-group" >
                                <?php echo e(Form::label('name', 'No Polisi:')); ?>

                                <?php echo e(Form::text('no_polisi', null, ['class'=> 'form-control','id'=>'no_polisi'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No Container:')); ?>

                                <?php echo e(Form::text('no_container', null, ['class'=> 'form-control','id'=>'no_container'])); ?>

                            </div>

                            <div class="form-group">
                                <?php echo e(Form::label('name', 'No Seal:')); ?>

                                <?php echo e(Form::text('no_seal', null, ['class'=> 'form-control','id'=>'no_seal'])); ?>

                            </div>

                            <div class="form-group">
                                    <?php echo e(Form::label('name', 'Size Tipe:')); ?>

                                    <?php echo e(Form::select('', $sizeAll, null, ['class'=> 'form-control',
                                    'placeholder' => 'Pilih Tipe Container','id'=>'id_size'])); ?>

                                    
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
                                
                                <div class="form-group jenis1">
                                        <?php echo e(Form::label('name', 'Nama Supplier:')); ?>

                                        <?php echo e(Form::select('kode_supplier', $supplierAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Supplier'])); ?>

                                    
                                    </div>

                                <div class="form-group jenis2">
                                        <?php echo e(Form::label('name', 'Nama Customer:')); ?>

                                        <?php echo e(Form::select('kode_customer', $customerAll, null, ['class'=> 'form-control','placeholder' => 'Pilih Customer'])); ?>

                                    
                                    </div>

                                <div class="form-group jenis3">
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

                                    <?php echo e(Form::text('berat1', 0, ['class'=> 'form-control','id'=> 'berat1'])); ?>

                                </div>

                                <div class="form-group">
                                    <?php echo e(Form::label('name', 'Berat 2:')); ?>

                                    <?php echo e(Form::text('berat2', 0, ['class'=> 'form-control'])); ?>

                                </div>

                                <div class="form-group">
                                    <?php echo e(Form::label('name', 'Keterangan:')); ?>

                                    <?php echo e(Form::textArea('keterangan', null, ['class'=> 'form-control'])); ?>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class=" box-footer">
                    <div class="pull-right">
                <?php echo e(Form::submit('Create data', ['class' => 'btn btn-success'])); ?>

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
        function load(){
          $('#form :input').attr('disabled', true);
          $(".jenis1").hide();
          $(".jenis2").hide();
          $(".jenis3").hide();
        }

        function refreshButton() {
            let berat1 = $('#berat1');
            let url = "<?php echo e(route('openserial.test')); ?>";
            berat1.val('');
            $.get(url, function(data, status){
                console.log(data);
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
            }else if(type == 4){
                $('#form :input').attr('disabled', false);
                document.getElementById("no_seal").disabled = false;
                document.getElementById("no_container").disabled = false;
                document.getElementById("no_polisi").disabled = true;
            }
        }

        function jenis() {
           var jenis = $("#jenis").val();
           console.log(jenis)
            if (jenis == 1) {
                 $(".jenis1").show();
                 $(".jenis3").hide();
            }else if(jenis == 2){
                $(".jenis1").hide();
                $(".jenis2").show();
            }else if(jenis == 3){
                $(".jenis1").hide();
                $(".jenis2").hide();
                $(".jenis3").show();
            }else if(jenis == 0){
                $(".jenis1").hide();
                $(".jenis2").hide();
                $(".jenis3").hide();
            }
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>