<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            Sauvegarder la liste des stagiaires en cours: <a class="btn text-success  rounded-pill" href="/surete/save"> <i class="fa-solid fa-file-export" ></i></a>
        </div>
        <div class="col">


        </div>
    </div>
</div>
<div class="py-4 mx-2">
    <?php if(count($stagiaires)): ?>
    <table class="table table-striped table-responsive mx-2">
        <thead>
            <tr class="small">
                <th>Photo</th>
                <th>Titre</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>CIN</th>
                <th>Niveau</th>
                <th>Diplôme</th>
                <th>Etablissement</th>
                <th>Ville</th>
                <th>Service</th>
                <th>Encadrant</th>
                <th>Date debut</th>
                <th>Date fin</th>

            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $stagiaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stagiaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class=" table table-row my-auto h-10 small">
                <td> <img src="<?php echo e(asset('storage/images/profile/'.$stagiaire->photo)); ?>"  class="img-fluid img-thumbnail mh-80"  style="max-height: 6rem; min-width:2rem" alt="photo de profile" ></td>
                <td><?php echo e($stagiaire->civilite); ?></td>
                <td><?php echo e($stagiaire->prenom); ?></td>
                <td><?php echo e($stagiaire->nom); ?></td>
                <td><?php echo e($stagiaire->cin); ?></td>
                <td><?php echo e($stagiaire->niveau); ?></td>
                <td><?php echo e($stagiaire->diplome); ?></td>
                <td><?php echo e($stagiaire->etablissement); ?></td>
                <td><?php echo e($stagiaire->ville); ?></td>
                <td><?php echo e($stagiaire->sigle); ?></td>
                <td><?php echo e($stagiaire->nomenc); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($stagiaires->links()); ?>


    <?php else: ?>
    <p class="bg-warning text-danger"> Pas de stagiaires</p>
    <?php endif; ?>
</div>
<style>
     li{
        list-style: none;
    }
    table td{
        border: 1px solid;
        border-radius: 5px;
        font-family: 'Roboto', sans-serif;
    }
</style>


<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/surete/index.blade.php ENDPATH**/ ?>