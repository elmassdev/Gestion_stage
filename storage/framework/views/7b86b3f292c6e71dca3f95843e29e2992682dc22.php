<!-- resources/views/etablissements/show.blade.php -->



<?php $__env->startSection('content'); ?>
    <h2>Etablissement Details</h2>

    <table class="table mt-3">
        <tbody>
            <tr>
                <th>Sigle</th>
                <td><?php echo e($etablissement->sigle_etab); ?></td>
            </tr>
            <tr>
                <th>Etablissement</th>
                <td><?php echo e($etablissement->etab); ?></td>
            </tr>
            <tr>
                <th>Statut</th>
                <td><?php echo e($etablissement->statut); ?></td>
            </tr>
            <!-- Add other fields as needed -->
        </tbody>
    </table>

    <a href="<?php echo e(route('etablissements.index')); ?>" class="btn btn-primary">Back to Etablissements</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/etablissements/show.blade.php ENDPATH**/ ?>