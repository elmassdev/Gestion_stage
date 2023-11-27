<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <h1>Stagiaires by Encadrant and Service</h1>
        <table class="table table-row my-auto h-10">
            <thead>
                <tr>
                    <th>Encadrant</th>
                    <th>Service</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Number of Stagiaires</th>
                </tr>
            </thead>
            <tbody class="table table-row my-auto h-10">
                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($row->encadrant_nom); ?> <?php echo e($row->encadrant_prenom); ?></td>
                        <td><?php echo e($row->service_libelle); ?></td>
                        <td><?php echo e($row->month); ?></td>
                        <td><?php echo e($row->year); ?></td>
                        <td><?php echo e($row->count_stagiaires); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\27-11\Gestion_stage\resources\views/indicators/parservice.blade.php ENDPATH**/ ?>