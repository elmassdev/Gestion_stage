<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Modifier la visite</h1>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('visites.update', $visite->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="date_demande">Date Demande:</label>
                            <input type="date" class="form-control" id="date_demande" name="date_demande" value="<?php echo e($visite->date_demande); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="date_visite">Date Visite:</label>
                            <input type="date" class="form-control" id="date_visite" name="date_visite" value="<?php echo e($visite->date_visite); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="demandeur">Demandeur:</label>
                            <input type="text" class="form-control" id="demandeur" name="demandeur" value="<?php echo e($visite->demandeur); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="effectif">Effectif:</label>
                            <input type="number" class="form-control" id="effectif" name="effectif" value="<?php echo e($visite->effectif); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" class="form-control" id="destination" name="destination" value="<?php echo e($visite->destination); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="annule">Annulé:</label>
                            <select class="form-control" id="annule" name="annule" required>
                                <option value="0" <?php echo e($visite->annule == 0 ? 'selected' : ''); ?>>Non</option>
                                <option value="1" <?php echo e($visite->annule == 1 ? 'selected' : ''); ?>>Oui</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/visites/edit.blade.php ENDPATH**/ ?>