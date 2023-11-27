<!-- resources/views/services/show.blade.php -->


<?php $__env->startSection('content'); ?>

<div class="container row">
    <div class=" col-md-8 float-left">
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
    <div class="col-md-4 float-right" style="top: 5; right: 0;">
        <div class="card">
            <div class="card-header bg-warning"><?php echo e(__('Autre informations à ajouter:')); ?></div>
            <table >
                <tr>
                    <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Liste des encadrants</a>
                    <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Rechercher un encadrant</a>
                    <a href="/services" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un stagiaire </a>
                    <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/services/show.blade.php ENDPATH**/ ?>