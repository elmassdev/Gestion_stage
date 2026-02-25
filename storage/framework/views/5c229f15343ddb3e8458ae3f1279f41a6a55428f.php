<?php $__env->startSection('content'); ?>
<div class="py-4 mx-2 ">
    <div class="mx-2">
        <a href="/stagiaires/create" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#129511" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></a>
        <a href="/stagiaires/<?php echo e($lastId); ?>" class="btn btn-outline-warning">
            
            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#129511" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        </a>
    </div>
    <?php if(count($stagiaires)): ?>
    <table class="table table-striped table-responsive mx-2">
        <thead>
            <tr class="small">
                <th>Titre</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Type de stage</th>
                <th>Niveau</th>
                <th>Diplôme</th>
                <th>Etablissement</th>
                <th>Ville</th>
                <th>Service</th>
                <th>Encadrant</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $stagiaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stagiaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class=" table table-row my-auto h-10 small">
                <td><?php echo e($stagiaire->civilite); ?></td>
                <td><?php echo e($stagiaire->prenom); ?></td>
                <td><?php echo e($stagiaire->nom); ?></td>
                <td><?php echo e($stagiaire->type_stage); ?></td>
                <td><?php echo e($stagiaire->niveau); ?></td>
                <td><?php echo e($stagiaire->diplome); ?></td>
                <td><?php echo e($stagiaire->etablissement); ?></td>
                <td><?php echo e($stagiaire->ville); ?></td>
                <td><?php echo e($stagiaire->sigle); ?></td>
                <td><?php echo e($stagiaire->nomenc); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')); ?></td>
                <td><a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/modification"> <i class="fa fa-edit text-warning"></i></a>
                    <?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
                    <form action="/stagiaires/<?php echo e($stagiaire->id); ?>" method="POST"  style="display:inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                    </form>
                    <?php endif; ?>
                    <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>"><i class="fa fa-eye text-primary"></i></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($stagiaires->links()); ?>

    <?php else: ?>
    <p class="bg-warning text-danger"> Pas de stagiaires</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/stagiaires/index.blade.php ENDPATH**/ ?>