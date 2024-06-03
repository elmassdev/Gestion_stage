<?php $__env->startSection('content'); ?>

<div class="container">
    <a href="<?php echo e(route('visites.create')); ?>" class="btn btn-primary mb-3 my-4">Ajouter une visite</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date Demande</th>
                <th>Date Visite</th>
                <th>Demandeur</th>
                <th>Effectif</th>
                <th>Destination</th>
                <th>Annulé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $visites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($visite->id); ?></td>
                    <td><?php echo e($visite->date_demande); ?></td>
                    <td><?php echo e($visite->date_visite); ?></td>
                    <td><?php echo e($visite->demandeur); ?></td>
                    <td><?php echo e($visite->effectif); ?></td>
                    <td><?php echo e($visite->destination); ?></td>
                    <td><?php echo e($visite->annule ? 'Oui' : 'Non'); ?></td>
                    <td>
                        <a href="<?php echo e(route('visites.edit', $visite->id)); ?>" class="btn btn-sm"><i class="fa fa-edit text-warning"></i></a>
                        <?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
                        <form action="<?php echo e(route('visites.destroy', $visite->id)); ?>" method="POST"  style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div class="container">


    <h2>Statistiques</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Année</th>
                <th>Nombre des visites</th>
                <th>Effectif</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($stat->year); ?></td>
                    <td><?php echo e($stat->number_of_visits); ?></td>
                    <td><?php echo e($stat->total_effectif); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/visites/index.blade.php ENDPATH**/ ?>