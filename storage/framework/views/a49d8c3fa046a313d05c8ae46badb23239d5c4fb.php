<!-- resources/views/villes/create.blade.php -->



<?php $__env->startSection('content'); ?>
    <h1>Create Ville</h1>
    <!-- In your Blade view -->
<form action="<?php echo e(route('villes.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <!-- Display validation errors, if any -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Display success message, if any -->
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Display error message, if any -->
    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(Session::get('error')); ?>

        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="ville">Ville:</label>
        <input type="text" name="ville" class="form-control" value="<?php echo e(old('ville')); ?>" required>
    </div>
    <div class="form-group">
        <label for="pays">Pays:</label>
        <input type="text" name="pays" class="form-control" value="<?php echo e(old('pays')); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary my-2 col-md-2">Create</button>
</form>
<hr>
<div class="row">
    <a href="/"  class=" col-md-4 mx-auto my-2 btn btn-warning">Page d'accueil</a>
    <a href="/stagiaires/create"  class=" col-md-4 mx-auto my-2 btn btn-warning">Ajouter un stagiaire</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/villes/create.blade.php ENDPATH**/ ?>