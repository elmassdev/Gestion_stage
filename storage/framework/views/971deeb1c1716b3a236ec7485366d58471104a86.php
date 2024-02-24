<?php $__env->startSection('content'); ?>

<a href="<?php echo e(route('services.create')); ?>" class="btn btn-btn btn-primary my-2 mt-4 mx-3">Ajouter un Service</a>
<div class="row col-md-12 px-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header"><?php echo e(__('List des services')); ?></div>

            <div class="card-body">
                <table class="table table-row my-auto h-10">
                    <thead>
                        <tr>
                            <th>Sigle Service</th>
                            <th>Libelle</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table table-row my-auto h-10">
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($service->sigle_service); ?></td>
                                <td><?php echo e($service->libelle); ?></td>
                                <td>
                                    <a href="<?php echo e(route('services.show', $service->id)); ?>"><i class="fa fa-eye text-primary"></i></a>
                                    <a href="<?php echo e(route('services.edit', $service->id)); ?>"><i class="fa fa-edit text-warning"></i></a>
                                    <form action="<?php echo e(route('services.destroy', $service->id)); ?>" method="POST" style="display:inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer ce service?')"><i class="fa fa-trash text-danger"></i></button>
                                    </form>
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
        <div class="card col-md-11">
            <div class="card-header bg-primary"><?php echo e(__('Autre informations à ajouter:')); ?></div>
            <table >
                <tr>
                    <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Liste des encadrants</a>
                    <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Rechercher un encadrant</a>
                    <a href="/services/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter un service</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter un stagiaire </a>
                    <a href="/villes/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-primary">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/services/index.blade.php ENDPATH**/ ?>