<!-- resources/views/villes/edit.blade.php -->



<?php $__env->startSection('content'); ?>
    <h1>Edit Ville</h1>
    <form action="<?php echo e(route('villes.update', $ville->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="ville">Ville:</label>
            <input type="text" name="ville" class="form-control" value="<?php echo e($ville->ville); ?>" required>
        </div>
        <div class="form-group">
            <label for="pays">Pays:</label>
            <input type="text" name="pays" class="form-control" value="<?php echo e($ville->pays); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/villes/edit.blade.php ENDPATH**/ ?>