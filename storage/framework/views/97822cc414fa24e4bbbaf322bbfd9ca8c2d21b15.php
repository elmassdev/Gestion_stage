<!-- resources/views/filieres/create.blade.php -->



<?php $__env->startSection('content'); ?>
    <h2>Ajouter une nouvelle filière: </h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('filieres.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="filiere" class="form-label">Filière</label>
            <input type="text" class="form-control" id="filiere" name="filiere" required>
        </div>
        <div class="mb-3">
            <label for="profil" class="form-label">Profil</label>
            <input type="text" class="form-control" id="profil" name="profil" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\27-11\Gestion_stage\resources\views/filieres/create.blade.php ENDPATH**/ ?>