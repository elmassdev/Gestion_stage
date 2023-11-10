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
        <a href="/stagiaires/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un stagiaire</a>
        <a href="/filiere" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une filière</a>
        <a href="/etablissement" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un établissement</a>
        <a href="/service" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
        <a href="/encadrants/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un encadrant </a>
        <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
    
    </div>
    <div class="col-md-6">
        <a href="/statistiques" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Statistiques</a>
        <a href="/stagiaires" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">liste des stagiaires</a>
        <a href="/etablissement" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un établissement</a>
        <a href="/service" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un service</a>
        <a href="/encadrants/create" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter un encadrant </a>
        <a href="/villes" target="/blank" class=" col-md-8 mx-auto my-2 btn btn-warning">Ajouter une ville</a>
    
    </div>


</div>
                   
                  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\L\Desktop\Laravel\Gestion_stage\resources\views/home.blade.php ENDPATH**/ ?>