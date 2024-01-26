<?php $__env->startSection('content'); ?>

<div class="container">
    <a href="/encadrants/create" class="btn btn-warning text-primary my-4 mx-4"><i class="fa fa-plus" aria-hidden="true"></i></a>
    <div class="row">
        
        <div class="col-md-6">
            <div class="card p-1">
                <div class="row ">
                    <div class="row ">
                            <div class="col-md-8  position my-auto top-0 end-0">
                                <div class="allergy"><b><?php echo e($encadrant->titre); ?> <?php echo e($encadrant->prenom); ?> <?php echo e($encadrant->nom); ?></b></div>
                                <div class="allergy"><b><?php echo e($encadrant->sigle); ?></b></div>
                                <div class="allergy text-secondary"><i class="fa fa-phone" aria-hidden="true"></i> -  <a href="tel:<?php echo e($encadrant->phone); ?>"><?php echo e($encadrant->phone); ?></a> </div>
                                <div class="allergy text-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> - <a href="mailto:<?php echo e($encadrant->email); ?>"><?php echo e($encadrant->email); ?></a></div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="card p-1">
                    <table>
                        <tbody>
                            <tr>
                                <td> <a href="<?php echo e(URL::to( 'encadrants/' . $previous )); ?>" class="btn btn-success "> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a></td>
                                <td><a href="<?php echo e(URL::to( 'encadrants/' . $next )); ?>" class="btn btn-success text-light"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></td>
                                <td><a href="/encadrants/" class="btn btn-primary text-light"> <i class="fa fa-list" aria-hidden="true"></i></a></td>
                                <td><a href="/encadrants/<?php echo e($encadrant->id); ?>/modification"  class="btn btn-warning text-light"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                <td><form action="/encadrants/<?php echo e($encadrant->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

        </div>

        
        <div class="col-md-6">
            <div class="card p-1">
                <div class=" card  p-1">
                    <div class="card-header"><?php echo e(__('Rechercher un encadrant')); ?></div>
                    <div class=" card-body py-2">

                <form method="GET" action="/encadrants/<?php echo e($encadrant->id); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="column" class="col-md-6 col-form-label text-md-left"> Rechercher un encadrant:</label>

                        <div class="col-md-6">
                            <select id="column" type="text" class="form-control <?php $__errorArgs = ['column'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="column" required autocomplete="column">
                                <option value="nom" selected>Rechercher par nom</option>
                                <option value="prenom">Rechercher par prenom</option>
                                <option value="service">Rechercher service </option>
                        </select>
                            <?php $__errorArgs = ['column'];
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
                    </div>
                    <div class="row mb-3">
                        <label for="term" class="col-md-6 col-form-label text-md-left"><?php echo e(__('Entrer votre recherche')); ?></label>

                        <div class="col-md-6">
                            <input id="term" type="text" name="term" class="form-control <?php $__errorArgs = ['term'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"    value="<?php echo e(old('term')); ?>"  required autocomplete="term"  autofocus>

                            <?php $__errorArgs = ['term'];
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
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Rechercher')); ?>

                            </button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
                <div>
                    <?php if(count($results)): ?>
                    <table class="table table-striped col-md-12">
                        <th>Civilité</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Service</th>
                        <tbody>
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><a href="/encadrants/<?php echo e($result->id); ?>"><?php echo e($result->titre); ?></a></td>
                                <td><a href="/encadrants/<?php echo e($result->id); ?>"><?php echo e($result->nom); ?></a></td>
                                <td><a href="/encadrants/<?php echo e($result->id); ?>"><?php echo e($result->prenom); ?></a></td>
                                <td><a href="/encadrants/<?php echo e($result->id); ?>"><?php echo e($result->sigle); ?></a></td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                    <?php echo e($results->links()); ?>

                    <?php else: ?>
                    <p>
                        pas de résultats
                    </p>
                    <?php endif; ?>


                </div>


            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/encadrants/show.blade.php ENDPATH**/ ?>