<?php $__env->startSection('content'); ?>

<div class="py-4">
    <div class="border border-success py-1"> <div class="card-header"> <b>Recherche stagiaires</b></div>
    <form action="<?php echo e(url()->current()); ?>" method="GET">
        <!-- Add input fields for the conditions -->
        <label for="start_date">Début:</label>
        <input type="date" name="start_date" class="datepicker" value="<?php echo e(request('start_date')); ?>">

        <label for="end_date">Fin:</label>
        <input type="date" name="end_date" class="col-md-1" value="<?php echo e(request('end_date')); ?>">

        <label for="remunere">Remunere:</label>
        <select name="remunere">
            <option value="" selected></option>
            <option value="1" <?php echo e(request('remunere') == 1 ? 'selected' : ''); ?>>Oui</option>
            <option value="0" <?php echo e(request('remunere') == 0 ? 'selected' : ''); ?>>Non</option>
        </select>
        <label for="service"> Service</label>
        <select name="service" class="col-md-1">
            <option value="" <?php echo e(request('service') === '' ? 'selected' : ''); ?>></option>
            <?php $__currentLoopData = $ss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($s->id); ?>" <?php echo e(request('service') == $s->id ? 'selected' : ''); ?>>
                    <?php echo e($s->sigle_service); ?> - <?php echo e($s->libelle); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <label for="etablissement"> etablissement</label>
        <select name="etablissement">
            <option value="" <?php echo e(request('etablissement') === '' ? 'selected' : ''); ?>></option>
            <?php $__currentLoopData = $xx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($x->sigle_etab); ?>" <?php echo e(request('etablissement') == $x->sigle_etab ? 'selected' : ''); ?>>
            
                <?php echo e($x->sigle_etab); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <label for="encadrant"> encadrant</label>
        <select name="encadrant">
            <option value="" <?php echo e(request('encadrant') === '' ? 'selected' : ''); ?>></option>
            <?php $__currentLoopData = $ee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($e->id); ?>" <?php echo e(request('encadrant') == $e->id ? 'selected' : ''); ?>>
                <?php echo e($e->nom); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <label for="type_formation" > Type Formation</label>
        <select id="type_formation" type="text"  name="type_formation"  value="<?php echo e(request('type_formation')); ?>">
            <option value="" selected></option>
            <option value="EI" >EI</option>
            <option value="OFPPT">OFPPT</option>
            <option value="EST+ FAC+BTS">EST+ FAC+BTS</option>
            <option value="Cycle Préparatoire (CI)">Cycle Préparatoire (CI)</option>
            <option value="IMM+IMT">IMM+IMT</option>
            <option value="Autres">Autres</option>
        </select>

        <!-- Add more input fields for other conditions -->

        <button type="submit" class="btn bg-warning text-primary"><i class="fa-solid fa-check"></i></button>
        <?php if(!$results->isEmpty()): ?>
        <a href="<?php echo e(route('export.excel')); ?>" class="btn btn-success"><i class="fa-solid fa-file-export" ></i></a>
        <?php endif; ?>

    </form>
    </div>
    <div>
        <?php if($results->isEmpty()): ?>
        <p>No results found.</p>
        <?php else: ?>
        <table class="table table-striped table-responsive">
            <thead>
                <tr class="small">
                    <th>Titre</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Niveau</th>
                    <th>Diplôme</th>
                    <th>Etablissement</th>
                    <th>Service</th>
                    <th>Encadrant</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class=" table table-row my-auto h-10 small">
                    <td><?php echo e($result->civilite); ?></td>
                    <td><?php echo e($result->prenom); ?></td>
                    <td><?php echo e($result->nom); ?></td>
                    <td><?php echo e($result->niveau); ?></td>
                    <td><?php echo e($result->diplome); ?></td>
                    <td><?php echo e($result->etablissement); ?></td>
                    <td><?php echo e($result->sigle); ?></td>
                    <td><?php echo e($result->nomenc); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($result->date_debut)->format('d/m/Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($result->date_fin)->format('d/m/Y')); ?></td>
                    <td><a  href="/stagiaires/<?php echo e($result->id); ?>/modification"> <i class="fa fa-edit text-warning"></i></a>
                        <form action="/stagiaires/<?php echo e($result->id); ?>" method="POST"  style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                        <a  href="/stagiaires/<?php echo e($result->id); ?>"><i class="fa fa-print text-primary"></i></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <?php echo e($results->appends(request()->query())->links()); ?>

        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/indicators/queries.blade.php ENDPATH**/ ?>