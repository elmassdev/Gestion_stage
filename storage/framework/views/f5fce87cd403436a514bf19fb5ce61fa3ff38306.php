<!-- resources/views/villes/edit.blade.php -->



<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="card col-md-8">
        <div class="card-header"><?php echo e(__('Modifier les informations :')); ?></div>
        <div class="card-body">
            <form action="<?php echo e(route('villes.update', $ville->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label for="ville">Ville:</label>
                    <input type="text" name="ville" class="form-control" value="<?php echo e($ville->ville); ?>" required>
                </div>
                <div class="form-group">
                    <label for="pays">Pays:</label>
                    <input type="text" name="pays" class="form-control" value="<?php echo e($ville->pays); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div class="col-md-3 float-right" style="top: 5; right: 0;">
        <div class="card col-md-8">
            <div class="card-header bg-warning"><?php echo e(__('Autre informations à ajouter:')); ?></div>
            <table >
                <tr>
                    <a href="/encadrants" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Liste des encadrants</a>
                    <a href="/encadrants/1" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Rechercher un encadrant</a>
                    <a href="/services/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un stagiaire </a>
                    <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/villes/edit.blade.php ENDPATH**/ ?>