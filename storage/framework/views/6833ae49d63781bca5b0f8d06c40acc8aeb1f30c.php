<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h1><?php echo e($chart1->options['chart_title']); ?></h1>
                    <?php echo $chart1->renderHtml(); ?>


                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<?php echo $chart1->renderChartJsLibrary(); ?>

<?php echo $chart1->renderJs(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/indicators/charts.blade.php ENDPATH**/ ?>