<!-- resources/views/services/edit.blade.php -->


<?php $__env->startSection('content'); ?>

<div class="col-md-6">

    <div class="card">
        <div class="card-header"><?php echo e(__('Modifier les informations du Service')); ?></div>
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

    <form action="<?php echo e(route('services.update', $service->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <!-- Add form fields as needed -->
        <div class="form-group">
            <label for="sigle_service">Sigle Service:</label>
            <input type="text" name="sigle_service" class="form-control" value="<?php echo e($service->sigle_service); ?>" required>
        </div>

        <div class="form-group">
            <label for="libelle">Libelle:</label>
            <input type="text" name="libelle" class="form-control" value="<?php echo e($service->libelle); ?>" required>
        </div>

        <div class="form-group">
            <label for="entite">Entite:</label>
            <input type="text" name="entite" class="form-control" value="<?php echo e($service->entite); ?>" required>
        </div>

        <div class="form-group">
            <label for="site">Site:</label>
            <input type="text" name="site" class="form-control" value="<?php echo e($service->site); ?>" required>
        </div>

        <div class="form-group">
            <label for="direction">Direction:</label>
            <input type="text" name="direction" class="form-control" value="<?php echo e($service->direction); ?>" required>
        </div>

        <div class="form-group">
            <label for="secretariat">Secretariat:</label>
            <input type="text" name="secretariat" class="form-control" value="<?php echo e($service->secretariat); ?>" >
        </div>

        <div class="form-group">
            <label for="EPI">EPI:</label>
            <input type="checkbox" name="EPI" class="form-check-input" <?php echo e($service->EPI ? 'checked' : ''); ?> >
        </div>

        <button type="submit" class="btn btn-primary my-4 mx-4">Meetre à jour </button>
    </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/services/edit.blade.php ENDPATH**/ ?>