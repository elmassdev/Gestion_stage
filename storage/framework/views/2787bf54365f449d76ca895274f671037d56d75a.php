<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row ">
        <div class="col-md-6">



            <div class="card mt-2">
                <div class="card-header"><?php echo e(__('Ajouter une ville')); ?></div>

                <div class="card-body">
                    <form method="POST" action="/villes" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="ville" class="col-md-3 col-form-label text-md-left" > Ville</label>

                            <div class="col-md-8">
                                <input id="ville" type="text" class="form-control <?php $__errorArgs = ['ville'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="ville" value="<?php echo e(old('ville')); ?>"  required autocomplete="ville" placeholder="ville stagiaire" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                <?php $__errorArgs = ['ville'];
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
                            <label for="pays" class="col-md-3 col-form-label text-md-left" > pays</label>

                            <div class="col-md-8">
                                <input id="pays" type="text" class="form-control <?php $__errorArgs = ['pays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="pays" value="<?php echo e(old('pays')); ?>"  required autocomplete="pays" placeholder="Pays" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                <?php $__errorArgs = ['pays'];
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
                                    <?php echo e(__('Enregisterer')); ?>

                                </button>
                            </div>

                            <?php echo $msg; ?>

                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="card mt-2" id="editville">
                    <div class="card-header"><?php echo e(__('Modifier une ville')); ?></div>
                    <div class="card-body">
                        <form method="POST" action="/villes" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="newville" class="col-md-3 col-form-label text-md-left" > Ville</label>

                                    <div class="col-md-8">
                                        <input id="newville" type="text" class="form-control <?php $__errorArgs = ['newville'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="newville" value="<?php echo e(old('newville')); ?>"  required autocomplete="newville" placeholder="Entrer le nouveau nom de la ville " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                        <?php $__errorArgs = ['newville'];
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
                                    <label for="newpays" class="col-md-3 col-form-label text-md-left" > newpays</label>

                                    <div class="col-md-8">
                                        <input id="newpays" type="text" class="form-control <?php $__errorArgs = ['newpays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="newpays" value="<?php echo e(old('newpays')); ?>"  required autocomplete="newpays" placeholder="newpays" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                        <?php $__errorArgs = ['newpays'];
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
                                        <button type="submit" class="btn btn-warning">
                                            <?php echo e(__('Modifier')); ?>

                                        </button>
                                    </div>

                                </div>

                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
        <div class="col-md-6">
            <div class="card mt-2">
                <div class="card-header"><?php echo e(__('Rechercher une ville')); ?></div>
                <div class="card-body">
                    <form method="GET" action="/villes" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="search" class="col-md-4 col-form-label text-md-left" > Ville à rechercher</label>

                        <div class="col-md-8">
                            <input id="search" type="text" class="form-control <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="search" value="<?php echo e(old('search')); ?>"  required autocomplete="search" placeholder="search stagiaire" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

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
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Rechercher')); ?>

                            </button>
                        </div>
                    </div>
                    </form>


                        <?php if(count($results)): ?>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr class="small">
                                    <th>Ville</th>
                                    <th>Pays</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody><?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class=" table table-row my-auto h-10 small">
                                                <td><?php echo e($result->ville); ?></td>
                                                <td><?php echo e($result->pays); ?></td>
                                                <td ><a onclick="moveto()"><i class="fa fa-edit text-warning"></i></a></td>
                                                <td >
                                                    <form action="/villes/<?php echo e($result->id); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cette ville?')"><i class="fa fa-trash text-warning"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>

                        <?php echo e($results->links()); ?>

                        <?php else: ?>
                       <p class="bg-warning text-danger">
                           pas de résultats
                       </p>
                       <?php endif; ?>

            </div>
        </div>
    </div>





    </div>
</div>

<script>
    function moveto() {
     document.getElementById("oldville").focus();
}
</script>







<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/villes.blade.php ENDPATH**/ ?>