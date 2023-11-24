<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 border border-success">
            <h4 class="text-success"> <u> Nombre des stagiaires en cours par services </u></h4>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="small">
                        <th>Service</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $stagiaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stagiaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class=" table table-row my-auto h-10 small">
                        <td><?php echo e($stagiaire->service); ?></td>
                        <td><?php echo e($stagiaire->total); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-6 border border-success">
            <h4 class="text-success"> <u>Nombre des stagiaires en cours par encadrants </u></h4>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="small">
                        <th>Encadrant</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $stagenc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class=" table table-row my-auto h-10 small">
                        <td> <?php echo e($st->nomenc); ?></td>
                        <td><?php echo e($st->total); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row card">
        <div class="card-header">
            <div class="card-body">
                <form method="GET" action="/statistiques" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <h4 class="text-success col-md-5"><u>Liste des stagiaires pour une date:</u></h4>
                        <div class="col-md-3">
                            <input id="search" type="date" class="form-control <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="search" value="<?php echo e(old('search')); ?>"  required autocomplete="search"   autofocus>
                            <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Valider')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row card border border-success" style="overflow-y: scroll;">
        <?php if(count($results)): ?>
<table class="table table-striped table-responsive">
    <thead>
        <tr class="small">
            <th>Titre</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Type de stage</th>
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
    <tbody><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class=" table table-row my-auto h-10 small">
                        <td><?php echo e($res->civilite); ?></td>
                        <td><?php echo e($res->prenom); ?></td>
                        <td><?php echo e($res->nom); ?></td>
                        <td><?php echo e($res->type_stage); ?></td>
                        <td><?php echo e($res->niveau); ?></td>
                        <td><?php echo e($res->diplome); ?></td>
                        <td><?php echo e($res->etablissement); ?></td>
                        <td><?php echo e($res->ville); ?></td>
                        <td><?php echo e($res->service); ?></td>
                        <td><?php echo e($res->nomenc); ?></td>
                        <td><?php echo e($res->date_debut); ?></td>
                        <td><?php echo e($res->date_fin); ?></td>
                        <td> <a  href="/stagiaires/<?php echo e($res->id); ?>"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>

<?php else: ?>
<p> Pas de stagiaires pour cette date</p>
<?php endif; ?>
    </div>

    <div class="row card">
        <div class="card-header">
            <div class="card-body">
                <form method="GET" action="/statistiques" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <h4 class="text-success col-md-5"><u>Liste des stagiaires pour aujourd'hui:</u></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row card border border-success" style="overflow-y: scroll;">
        <?php if(count($statoday)): ?>
<table class="table table-striped table-responsive">
    <thead>
        <tr class="small">
            <th>Titre</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Type de stage</th>
            <th>Niveau</th>
            <th>Diplome</th>
            <th>Etablissement</th>
            <th>Ville</th>
            <th>Service</th>
            <th>Encadrant</th>
            <th>Date debut</th>
            <th>Date fin</th>
        </tr>
    </thead>
    <tbody><?php $__currentLoopData = $statoday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statdy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class=" table table-row my-auto h-10 small">
                        <td><?php echo e($statdy->civilite); ?></td>
                        <td><?php echo e($statdy->prenom); ?></td>
                        <td><?php echo e($statdy->nom); ?></td>
                        <td><?php echo e($statdy->type_stage); ?></td>
                        <td><?php echo e($statdy->niveau); ?></td>
                        <td><?php echo e($statdy->diplome); ?></td>
                        <td><?php echo e($statdy->etablissement); ?></td>
                        <td><?php echo e($statdy->ville); ?></td>
                        <td><?php echo e($statdy->service); ?></td>
                        <td><?php echo e($statdy->nomenc); ?></td>
                        <td><?php echo e($statdy->date_debut); ?></td>
                        <td><?php echo e($statdy->date_fin); ?></td>
                        <td> <a  href="/stagiaires/<?php echo e($statdy->id); ?>"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>

<?php else: ?>
<p> Pas de stagiaires pour aujourd'hui</p>
<?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/statistiques.blade.php ENDPATH**/ ?>