<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="/stagiaires/create"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un stagiaire</a>
                            <a href="/filieres"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter une filière</a>
                            <a href="/etablissements"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un établissement</a>
                            <a href="/services"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un service</a>
                            <a href="/encadrants/create"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un encadrant </a>
                            <a href="/villes"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter une ville</a>
                        </div>
                        <div class="col-md-6">
                            <a href="/indicators/index"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Indicateurs</a>
                            <a href="/stagiaires"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Liste des stagiaires</a>
                            <a href="/etablissements"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un établissement</a>
                            <a href="/services"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un service</a>
                            <a href="/encadrants/create"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter un encadrant </a>
                            <a href="/villes"  class=" col-md-8 mx-auto my-2 btn btn-lg btn-outline-success rounded-pill " >Ajouter une ville</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/home.blade.php ENDPATH**/ ?>