
<?php $__env->startSection('content'); ?>
<?php if(count($encadrants)): ?>
<table class="table table-striped table-responsive">
    <thead>
        <tr class="small">
            <th>titre</th>
            <th>Prenom</th>
            <th>Nom</th>  
            <th>phone</th>
            <th>email</th>              
            <th>Service</th>          
        </tr>
    </thead>
    <tbody><?php $__currentLoopData = $encadrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encadrant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class=" table table-row my-auto h-10 small">
                        <td><?php echo e($encadrant->titre); ?></td>
                        <td><?php echo e($encadrant->prenom); ?></td>
                        <td><?php echo e($encadrant->nom); ?></td>                                
                        <td><?php echo e($encadrant->phone); ?></td>
                        <td><?php echo e($encadrant->email); ?></td>                                
                        <td><?php echo e($encadrant->service); ?></td>
                        <td ><a  href="/encadrants/<?php echo e($encadrant->id); ?>/modification"> <i class="fa fa-edit text-warning"></i></a></td>
                        <td > 
                        <form action="/encadrants/<?php echo e($encadrant->id); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="fa fa-trash text-danger"></button>
                        </form>
                        </td>
                        <td> <a  href="/encadrants/<?php echo e($encadrant->id); ?>"><i class="fa fa-print text-primary"></i></a></td>                           
                    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<?php echo e($encadrants->links()); ?>


<?php else: ?>
<p> Pas de encadrants</p>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/encadrants/index.blade.php ENDPATH**/ ?>