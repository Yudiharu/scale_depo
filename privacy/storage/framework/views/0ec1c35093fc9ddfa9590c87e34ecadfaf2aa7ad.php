<?php $__env->startSection('title', 'Users Create'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>User Data</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create User</h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box box-info">
                <div class="box-body">
                    <a href="<?php echo e($list_url); ?>" class="btn btn-default btn-sm">Lihat Data</a>
                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('users.store')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="box box-success">
                <div class="box-body">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                    <hr>
                    <div class="form-group">
                        <label for="roles" class="col-md-4 control-label">Roles:</label>
                        <div class="col-md-6">
                            <select name="roles[]" id="role" multiple class="form-control">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->display_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="roles" class="col-md-4 control-label">Company</label>
                        <div class="col-md-6">
                            <select name="roles[]" id="role" class="form-control">
                                <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($companys->kode_company); ?>"><?php echo e($companys->nama_company); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <div class="row pull-right">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Create User</button>
                        </div>
                    </div>

                </div>

            </div>
            </form>
        </div>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>