<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-9">
        <?php if(count($encadrants)): ?>
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="small">
                    <th>titre</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $encadrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encadrant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class=" table table-row my-auto h-10 small">
                    <td><?php echo e($encadrant->titre); ?></td>
                    <td><?php echo e($encadrant->prenom); ?></td>
                    <td><?php echo e($encadrant->nom); ?></td>
                    <td><?php echo e($encadrant->phone); ?></td>
                    <td><?php echo e($encadrant->email); ?></td>
                    <td><?php echo e($encadrant->service); ?></td>
                    <td>
                        <a  href="/encadrants/<?php echo e($encadrant->id); ?>/modification"> <i class="fa fa-edit text-warning"></i></a>
                        <form action="/encadrants/<?php echo e($encadrant->id); ?>" method="POST" style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet encadrant?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                        <a  href="/encadrants/<?php echo e($encadrant->id); ?>"><i class="fa fa-print text-primary"></i></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($encadrants->links()); ?>

        <?php else: ?>
        <p> Pas de encadrants</p>
        <?php endif; ?>
    </div>

    <div class="col-md-3 float-right" style="top: 5; right: 0;">
        <div class="card col-md-8">
            <div class="card-header "><?php echo e(__('Autre informations à ajouter:')); ?></div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/encadrants/index.blade.php ENDPATH**/ ?>