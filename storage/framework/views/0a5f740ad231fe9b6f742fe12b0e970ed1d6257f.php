<!-- resources/views/filieres/edit.blade.php -->



<?php $__env->startSection('content'); ?>
    <h2>Modifier la filière</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('filieres.update', $filiere->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="filiere" class="form-label">Filière</label>
            <input type="text" class="form-control" id="filiere" name="filiere" value="<?php echo e($filiere->filiere); ?>" required>
        </div>
        <div class="mb-3">
            <label for="profil" class="form-label">Profil</label>
            <input type="text" class="form-control" id="profil" name="profil" value="<?php echo e($filiere->profil); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Confirmer</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/filieres/edit.blade.php ENDPATH**/ ?>