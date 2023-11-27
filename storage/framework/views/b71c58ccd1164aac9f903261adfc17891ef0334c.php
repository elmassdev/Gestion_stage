<!-- resources/views/filieres/show.blade.php -->



<?php $__env->startSection('content'); ?>
    <h2>Filières</h2>

    <table class="table mt-3">
        <tbody>
            <tr>
                <th>ID</th>
                <td><?php echo e($filiere->id); ?></td>
            </tr>
            <tr>
                <th>Filiere</th>
                <td><?php echo e($filiere->filiere); ?></td>
            </tr>
            <tr>
                <th>Profil</th>
                <td><?php echo e($filiere->profil); ?></td>
            </tr>
        </tbody>
    </table>

    <a href="<?php echo e(route('filieres.index')); ?>" class="btn btn-primary">Retour à la liste des filières</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/filieres/show.blade.php ENDPATH**/ ?>