<!-- resources/views/services/index.blade.php -->


<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('services.create')); ?>" class="btn btn-btn btn-primary my-3 mt-2">Ajouter un Service</a>
<div class="row">

<div class="col-md-6">

    <div class="card">
        <div class="card-header"><?php echo e(__('List des services')); ?></div>

        <div class="card-body">
            <table class="table table-row my-auto h-10">
                <thead>
                    <tr>
                        <th>Sigle Service</th>
                        <th>Libelle</th>
                        <!-- Add more columns as needed -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table table-row my-auto h-10">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($service->sigle_service); ?></td>
                            <td><?php echo e($service->libelle); ?></td>
                            <!-- Add more columns as needed -->
                            <td>
                                <a href="<?php echo e(route('services.show', $service->id)); ?>"><i class="fa fa-eye text-primary"></i></a>
                                <a href="<?php echo e(route('services.edit', $service->id)); ?>"><i class="fa fa-edit text-warning"></i></a>
                                <!-- Add delete button/form as needed -->
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($services->links()); ?>


        </div>
    </div>
</div>
<div class="col-md-3 float-right" style="top: 5; right: 0;">
    <div class="card col-md-8">
        <div class="card-header bg-secondary"><?php echo e(__('Autre informations à ajouter:')); ?></div>
        <table >
            <tr>
                <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Liste des encadrants</a>
                <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Rechercher un encadrant</a>
                <a href="/services" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter un service</a>
                <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter un stagiaire </a>
                <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-secondary">Ajouter une ville</a>
            </tr>
        </table>
    </div>
</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/services/index.blade.php ENDPATH**/ ?>