<!-- resources/views/services/show.blade.php -->


<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e($service->sigle_service); ?> <a href="<?php echo e(route('services.edit', $service->id)); ?>" class="float-right"><i class="fa fa-edit text-warning "></i></a></div>
                <p><strong>Sigle Service:</strong> <?php echo e($service->sigle_service); ?></p>
                <p><strong>Libelle:</strong> <?php echo e($service->libelle); ?></p>
                <p><strong>Entité:</strong> <?php echo e($service->entite); ?></p>
                <p><strong>Direction:</strong> <?php echo e($service->direction); ?></p>
                <p><strong>Site:</strong> <?php echo e($service->site); ?></p>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/services/show.blade.php ENDPATH**/ ?>