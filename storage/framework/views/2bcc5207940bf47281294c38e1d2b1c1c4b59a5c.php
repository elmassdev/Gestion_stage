<!-- resources/views/etablissements/create.blade.php -->



<?php $__env->startSection('content'); ?>

<div class="container py-4">
    <div class="card">
        <div class="card-header"><?php echo e(__('Ajouter un nouveau établissement')); ?></div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('etablissements.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="sigle_etab" class="form-label">Sigle</label>
                    <input type="text" class="form-control" id="sigle_etab" name="sigle_etab" required>
                </div>
                <div class="mb-3">
                    <label for="etab" class="form-label">Etablissement</label>
                    <input type="text" class="form-control" id="etab" name="etab" required>
                </div>
                <div class="mb-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select id="statut" type="text" class="form-control <?php $__errorArgs = ['statut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="statut"  autocomplete="statut">
                        <option value="Etatique" >Etatique</option>
                        <option value="Privé">Privé</option>
                        <option value="Etranger">Etranger</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" type="text" class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type"  autocomplete="type">
                        <option value="Ecoles Supérieures" >ECOLES SUPERIEURES</option>
                        <option value="OFPPT">OFPPT</option>
                        <option value="Faculté">Faculté</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="statut" class="form-label">Article</label>
                    <select id="article" type="text" class="form-control <?php $__errorArgs = ['article'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="article"  autocomplete="article">
                        <option value="à la">à la</option>
                        <option value="à">à</option>
                        <option value="au">au</option>
                        <option value="à l'">à l'</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pays" class="form-label">Pays</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['pays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pays" name="pays" required>
                    <?php $__errorArgs = ['pays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>


                <button type="submit" class="btn btn-primary">Ajouter </button>
            </form>
        </div>
    </div>



</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/etablissements/create.blade.php ENDPATH**/ ?>