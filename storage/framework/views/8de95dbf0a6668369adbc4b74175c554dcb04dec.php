<!-- resources/views/signatures/edit.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container my-2">
    <div class="card my-4">
        <div class="card-header"> Modifier l'en-tête  </div>
        <div class="row  card-body">
            <div class="col border border-solid rounded pt-2">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <form action="<?php echo e(route('signatures.update', ['id' => $signature->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-3">
                    <label for="logo" class="col-md-3 col-form-label text-md-left">Logo</label>
                    <div class="col-md-8">
                        <?php if($signature->logo): ?>
                        <div class="mb-2">
                            <img src="<?php echo e(asset('storage/images/logos/'.$signature->logo)); ?>" alt="Logo" style="max-width: 150px; max-height: 100px;">
                        </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" value="<?php echo e(old('logo', $signature->logo)); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="head1" class="col-md-3 col-form-label text-md-left">Ligne 1</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head1" name="head1" value="<?php echo e(old('head1', $signature->head1)); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="head2" class="col-md-3 col-form-label text-md-left">Ligne 2</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head2" name="head2" value="<?php echo e(old('head2', $signature->head2)); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="head3" class="col-md-3 col-form-label text-md-left">Ligne 3</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head3" name="head3" value="<?php echo e(old('head3', $signature->head3)); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="head4" class="col-md-3 col-form-label text-md-left">Ligne 4</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="head4" name="head4" value="<?php echo e(old('head4', $signature->head4)); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sign1" class="col-md-3 col-form-label text-md-left">Signature  1</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sign1" name="sign1" value="<?php echo e(old('sign1', $signature->sign1)); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sign2" class="col-md-3 col-form-label text-md-left">Signature  2</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sign2" name="sign2" value="<?php echo e(old('sign2', $signature->sign2)); ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sign_op" class="col-md-3 col-form-label text-md-left">Signature OP</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sign_op" name="sign_op" value="<?php echo e(old('sign_op', $signature->sign_op)); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sigle" class="col-md-3 col-form-label text-md-left">Sigle</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sigle" name="sigle" value="<?php echo e(old('sigle', $signature->sigle)); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-md-3 col-form-label text-md-left">Phone</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone', $signature->phone)); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Fax" class="col-md-3 col-form-label text-md-left">Fax</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="Fax" name="Fax" value="<?php echo e(old('Fax', $signature->Fax)); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="site" class="col-md-3 col-form-label text-md-left">site</label>
                    <div class="col-md-8">
                        <select id="site" type="text"   class="form-control  <?php $__errorArgs = ['site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site"  autocomplete="site">
                            <option value="<?php echo e($signature->site); ?>" selected><?php echo e($signature->site); ?></option>
                            <option value="Benguerir">Benguerir</option>
                            <option value="Youssoufia"> Youssoufia</option>
                        </select>
                        <?php $__errorArgs = ['site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="is_active" class="col-md-3 col-form-label text-md-left">Activé</label>
                    <div class="col-md-8">
                        <input type="checkbox" id="is_active" name="is_active" value="1" <?php echo e(old('is_active', $signature->is_active) ? 'checked' : ''); ?>>
                    </div>
                </div>
                <button type="submit" class="btn btn-success col-md-3 mx-auto">Mettre à jour</button>
                <a href="<?php echo e(route('signatures.index')); ?>" class="btn btn-warning col-md-3 mx-auto">Annuler</a>
            </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dev/Desktop/Laravel/Gestion_stage/resources/views/signatures/edit.blade.php ENDPATH**/ ?>