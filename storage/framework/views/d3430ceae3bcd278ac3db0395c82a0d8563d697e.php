<!-- resources/views/etablissements/index.blade.php -->



<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Etablissements</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('etablissements.create')); ?>" class="btn btn-primary">Ajouter un nouveau établissement</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Sigle</th>
                <th>Etablissement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $etablissements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etablissement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($etablissement->sigle_etab); ?></td>
                    <td><?php echo e($etablissement->Etab); ?></td>
                    <td>
                        <a href="<?php echo e(route('etablissements.show', $etablissement->sigle_etab)); ?>" class="btn btn-sm"><i class="fa fa-eye text-primary"></i></a>
                        <a href="<?php echo e(route('etablissements.edit', $etablissement->sigle_etab)); ?>" class="btn btn-sm"><i class="fa fa-edit text-warning"></i></a>
                        <form action="<?php echo e(route('etablissements.destroy', $etablissement->sigle_etab)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm" onclick="return confirm('vous allez supprimer cet établissement?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($etablissements->links()); ?>



</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/etablissements/index.blade.php ENDPATH**/ ?>