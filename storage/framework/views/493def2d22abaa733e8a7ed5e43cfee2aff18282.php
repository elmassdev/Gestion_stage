<?php $__env->startSection('content'); ?>
<div class="container my-2">
    <div class="card my-4">
        <div class="card-header"> <?php echo e(__('Ajouter un nouveau en-tête')); ?>  </div>
        <div class="row  card-body">
            <div class="col border border-solid rounded pt-2">
                <form action="<?php echo e(route('signatures.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="logo">Logo :</label>
                        <div class="col-md-8">
                            <input type="file" name="logo" id="logo" class="form-control">
                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head1">la première ligne:</label>
                        <div class="col-md-8">
                        <input type="text" name="head1" id="head1" class="form-control" value="<?php echo e(old('head1')); ?>" required>
                        <?php $__errorArgs = ['head1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head2">Ligne 2:</label>
                        <div class="col-md-8">
                        <input type="text" name="head2" id="head2" class="form-control" value="<?php echo e(old('head2')); ?>" required>
                        <?php $__errorArgs = ['head2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head3">Ligne 3:</label>
                        <div class="col-md-8">
                        <input type="text" name="head3" id="head3" class="form-control" value="<?php echo e(old('head3')); ?>" required>
                        <?php $__errorArgs = ['head3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="head4">Ligne 4:</label>
                        <div class="col-md-8">
                        <input type="text" name="head4" id="head4" class="form-control" value="<?php echo e(old('head4')); ?>" required>
                        <?php $__errorArgs = ['head4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sign1">Signature 1:</label>
                        <div class="col-md-8">
                        <input type="text" name="sign1" id="sign1" class="form-control" value="<?php echo e(old('sign1')); ?>" required>
                        <?php $__errorArgs = ['sign1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sign2">Signature 2:</label>
                        <div class="col-md-8">
                        <input type="text" name="sign2" id="sign2" class="form-control" value="<?php echo e(old('sign2')); ?>" required>
                        <?php $__errorArgs = ['sign2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sign_op">Signature OP:</label>
                        <div class="col-md-8">
                        <input type="text" name="sign_op" id="sign_op" class="form-control" value="<?php echo e(old('sign_op')); ?>" required>
                        <?php $__errorArgs = ['sign_op'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="sigle">Sigle:</label>
                        <div class="col-md-8">
                        <input type="text" name="sigle" id="sigle" class="form-control" value="<?php echo e(old('sigle')); ?>" required>
                        <?php $__errorArgs = ['sigle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="phone">Phone:</label>
                        <div class="col-md-8">
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e(old('phone')); ?>" required>
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="Fax">Fax:</label>
                        <div class="col-md-8">
                        <input type="text" name="Fax" id="Fax" class="form-control" value="<?php echo e(old('Fax')); ?>" required>
                        <?php $__errorArgs = ['Fax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="site">Site:</label>
                        <div class="col-md-8">
                        <select id="site" type="text" class="form-control  <?php $__errorArgs = ['site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site"  autocomplete="site">
                            <option value="Benguerir" <?php if(Auth::user()->site =='Benguerir'): ?> selected     <?php endif; ?>>Benguerir</option>
                            <option value="Youssoufia" <?php if(Auth::user()->site =='Youssoufia'): ?> selected     <?php endif; ?> > Youssoufia</option>
                        </select>
                        <?php $__errorArgs = ['site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="effective_date">Date d'effet:</label>
                        <div class="col-md-8">
                        <input type="date" name="effective_date" id="effective_date" class="form-control" value="<?php echo e(old('effective_date')); ?>" required>
                        <?php $__errorArgs = ['effective_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label text-md-left" for="is_active" class="form-check-label">Activé</label>
                        <div class="col-md-8">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input form-control"
                            value="1" <?php echo e(old('is_active', $signature->is_active ?? false) ? 'checked' : ''); ?>>
                        <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-md-3 mx-auto">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/signatures/create.blade.php ENDPATH**/ ?>