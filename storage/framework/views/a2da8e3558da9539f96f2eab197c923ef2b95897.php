<!-- resources/views/filieres/index.blade.php -->



<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Filieres</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('filieres.create')); ?>" class="btn btn-primary">Ajouter une nouvelle filière</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Filière</th>
                <th>Profil</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filiere): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($filiere->id); ?></td>
                    <td><?php echo e($filiere->filiere); ?></td>
                    <td><?php echo e($filiere->profil); ?></td>
                    <td>
                        <a href="<?php echo e(route('filieres.show', $filiere->id)); ?>" class="btn btn-sm"><i class="fa fa-eye text-primary"></i></a>
                        <a href="<?php echo e(route('filieres.edit', $filiere->id)); ?>" class="btn btn-sm"><i class="fa fa-edit text-warning"></i></a>
                        <form action="<?php echo e(route('filieres.destroy', $filiere->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm" onclick="return confirm('Vous allez supprimer une filière?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($filieres->links()); ?>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\27-11\Gestion_stage\resources\views/filieres/index.blade.php ENDPATH**/ ?>