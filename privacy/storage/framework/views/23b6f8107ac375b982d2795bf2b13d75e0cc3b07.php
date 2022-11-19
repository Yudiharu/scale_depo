<?php $__env->startSection('title', 'Form Transaksi'); ?>

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
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
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
                            <?php echo e(Form::label('name', 'No Transaksi:')); ?>

                            <?php echo e(Form::text('no_transaksi', null, ['class'=> 'form-control'])); ?>

                        </div>
                        
                        <div class="form-group">
                            <?php echo e(Form::label('name', 'No PO/DO:')); ?>

                            <?php echo e(Form::text('no_po', null, ['class'=> 'form-control',])); ?>

                        </div>

                        <div class="form-group" id="no_polisi">
                            <?php echo e(Form::label('name', 'No Polisi:')); ?>

                            <?php echo e(Form::text('no_polisi', null, ['class'=> 'form-control'])); ?>

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
          // $(".jenis1").css("display","none");
          // $(".jenis2").css("display","none");
          // $(".jenis3").css("display","none");
        }

        function refreshButton() {
            let berat1 = $('#berat1');
            let url = "<?php echo e(route('openserial.test')); ?>";
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
            ajax: '<?php echo route('form.data'); ?>',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>