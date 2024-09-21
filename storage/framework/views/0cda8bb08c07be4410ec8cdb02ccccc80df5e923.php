<!-- resources/views/signature/index.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4 mb-2">La gestion des en-têtes </h1>
    <a href="<?php echo e(route('signatures.create')); ?>" class="btn btn-primary mb-3">Ajouter un nouveau en-tête</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ligne 1</th>
                <th>Ligne 2</th>
                <th>Ligne 3</th>
                <th>Activé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $signatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($signature->id); ?></td>
                    <td><?php echo e($signature->head1); ?></td>
                    <td><?php echo e($signature->head2); ?></td>
                    <td><?php echo e($signature->head3); ?></td>
                    <td><?php echo e($signature->is_active ? 'Oui' : 'Non'); ?></td>
                    <td>
                        <a href="<?php echo e(route('signatures.edit', $signature->id)); ?>" class="btn btn-sm "><i class="fa fa-edit text-warning"></i></a>

                        <form action="<?php echo e(route('signatures.destroy', $signature->id)); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm" onclick="return confirm('Etes-vous sûr de vouloir supprimer?');"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/signatures/index.blade.php ENDPATH**/ ?>