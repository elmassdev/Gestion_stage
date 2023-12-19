<?php $__env->startSection('content'); ?>
<div class="py-4">
    <a href="/stagiaires/create" class="btn btn-warning text-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
    <a href="/stagiaires/1" class="btn btn-primary text-warning"><i class="fa-solid fa-magnifying-glass"></i></a>
<?php if(count($stagiaires)): ?>
<table class="table table-striped table-responsive">
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
            <th>Date debut</th>
            <th>Date fin</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody><?php $__currentLoopData = $stagiaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stagiaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <form action="/stagiaires/<?php echo e($stagiaire->id); ?>" method="POST"  style="display:inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                            </form>
                            <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>"><i class="fa fa-print text-primary"></i></a>
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