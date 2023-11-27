<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="card col-md-8">
        <div class="card-header"><?php echo e(__('Ajouter une ville')); ?></div>
        <div class="card-body">
            <form action="<?php echo e(route('villes.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <!-- Display validation errors, if any -->
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Display success message, if any -->
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>

                <!-- Display error message, if any -->
                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('error')); ?>

                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="ville">Ville:</label>
                    <input type="text" name="ville" class="form-control" value="<?php echo e(old('ville')); ?>" required>
                </div>
                <div class="form-group">
                    <label for="pays">Pays:</label>
                    <input type="text" name="pays" class="form-control" value="<?php echo e(old('pays')); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary my-2 col-md-2">Ajouter</button>
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
                    <a href="/services" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
                    <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un stagiaire </a>
                    <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>




<hr>
<div class="row">
    <a href="/"  class=" col-md-4 mx-auto my-2 btn btn-warning">Page d'accueil</a>
    <a href="/stagiaires/create"  class=" col-md-4 mx-auto my-2 btn btn-warning">Ajouter un stagiaire</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/villes/create.blade.php ENDPATH**/ ?>