<?php $__env->startSection('content'); ?>




<div class="py-4">
    <div>
        <form action="<?php echo e(route('indicators.queries')); ?>" method="GET">
            <!-- Add input fields for the conditions -->
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" value="<?php echo e(request('start_date')); ?>">

            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" value="<?php echo e(request('end_date')); ?>">

            <label for="remunere">Remunere:</label>
            <select name="remunere">
                <option value="1" <?php echo e(request('remunere') == 1 ? 'selected' : ''); ?>>Yes</option>
                <option value="0" <?php echo e(request('remunere') == 0 ? 'selected' : ''); ?>>No</option>
            </select>

            <!-- Add more input fields for other conditions -->

            <button type="submit">Search</button>
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
        <?php echo e($results->appends(request()->query())->links('/indicators/queries')); ?>

        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views//indicators/queries.blade.php ENDPATH**/ ?>