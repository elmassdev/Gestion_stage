<?php $__env->startSection('content'); ?>

<div class="py-4">
    <div class="border border-success py-1"> <div class="card-header"> <b>Recherche stagiaires</b></div>
    <form action="<?php echo e(url()->current()); ?>" method="GET" onsubmit="return validateForm()">
        <!-- Add input fields for the conditions -->
        <label for="start_date">Début:</label>
        <input type="date" name="start_date" class="datepicker" value="<?php echo e(request('start_date')); ?>" id="start_date">

        <label for="end_date">Fin:</label>
        <input type="date" name="end_date" class="col-md-1" value="<?php echo e(request('end_date')); ?>" id="end_date">

        <label for="remunere">Remunere:</label>
        <select name="remunere">
            <option value="" selected></option>
            <option value="1" <?php echo e(request('remunere') == 1 ? 'selected' : ''); ?>>Oui</option>
            <option value="0" <?php echo e(request('remunere') == 0 ? 'selected' : ''); ?>>Non</option>
        </select>
        <label for="OP_etabli">OP établi:</label>
        <select name="OP_etabli">
            <option value="" selected></option>
            <option value="1" <?php echo e(request('OP_etabli') == 1 ? 'selected' : ''); ?>>Oui</option>
            <option value="0" <?php echo e(request('OP_etabli') == 0 ? 'selected' : ''); ?>>Non</option>
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
        <?php
        $showExportButton = !$results->isEmpty() && (!empty(request('start_date')) || !empty(request('end_date')) || !empty(request('remunere')) || !empty(request('service')) || !empty(request('etablissement')) || !empty(request('encadrant')) || !empty(request('type_formation')));
        ?>
        <button type="submit" class="btn bg-warning text-primary"><i class="fa-solid fa-check"></i></button>
        <?php if($showExportButton): ?>
        <a href="<?php echo e(route('export.excel', request()->all())); ?>" class="btn btn-warning" onclick="return validateForm()"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#007552" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V288H216c-13.3 0-24 10.7-24 24s10.7 24 24 24H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM384 336V288H494.1l-39-39c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l80 80c9.4 9.4 9.4 24.6 0 33.9l-80 80c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l39-39H384zm0-208H256V0L384 128z"/></svg> Excel</a>
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
                    <th>CIN</th>
                    <th>Nom Prénom</th>
                    <th>Niveau</th>
                    <th>Diplôme</th>
                    <th>Etablissement</th>
                    <th>Service</th>
                    <th>Encadrant</th>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>OP établi le</th>
                    <th>OP établi par</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class=" table table-row my-auto h-10 small">
                    <td><?php echo e($result->cin); ?></td>
                    <td><?php echo e($result->nom); ?> <?php echo e($result->prenom); ?></td>
                    <td><?php echo e($result->niveau); ?></td>
                    <td><?php echo e($result->diplome); ?></td>
                    <td><?php echo e($result->etablissement); ?></td>
                    <td><?php echo e($result->sigle); ?></td>
                    <td><?php echo e($result->nomenc); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($result->date_debut)->format('d/m/Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($result->date_fin)->format('d/m/Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($result->OP_etabli_le)->format('d/m/Y')); ?></td>
                    <td><?php echo e($result->edited_by); ?></td>
                    <td><a  href="/stagiaires/<?php echo e($result->id); ?>/modification"> <i class="fa fa-edit text-warning"></i></a>
                        <?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
                        <form action="/stagiaires/<?php echo e($result->id); ?>" method="POST"  style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                        <?php endif; ?>
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

<script>
    function validateForm() {
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;

        if (startDate === '' || endDate === '') {
            alert('Merci de remplir les champs de dates.');
            return false;
        }
        // return true;
    }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/indicators/queries.blade.php ENDPATH**/ ?>