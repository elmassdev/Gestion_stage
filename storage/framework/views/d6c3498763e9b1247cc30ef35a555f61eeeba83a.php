



<?php $__env->startSection('content'); ?>
    <h1>Villes</h1>
    <a href="<?php echo e(route('villes.create')); ?>" class="btn btn-primary">Create Ville</a>

    <table class="table table-row my-auto h-8 small">
        <thead>
            <tr>
                <th>Ville</th>
                <th>Pays</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $vs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($v->ville); ?></td>
                    <td><?php echo e($v->pays); ?></td>
                    <td>
                        <a href="<?php echo e(route('villes.edit', $v->id)); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit text-secondary"></i></a>
                        <form action="<?php echo e(route('villes.destroy', $v->id)); ?>" method="POST" style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Voulez-vous supprimer cette ville?')"><i class="fa fa-trash text-danger"></i></button>
                            
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($vs->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/villes/index.blade.php ENDPATH**/ ?>