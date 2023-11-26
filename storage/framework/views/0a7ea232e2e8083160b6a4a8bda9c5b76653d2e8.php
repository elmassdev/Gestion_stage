

<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="row ">        
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header"><?php echo e(__('Ajouter un établissement')); ?></div>

                <div class="card-body">
                    <form method="POST" action="/etablissement" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="sigle_etab" class="col-md-3 col-form-label text-md-left" > sigle</label>

                            <div class="col-md-8">
                                <input id="sigle_etab" type="text" class="form-control <?php $__errorArgs = ['sigle_etab'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="sigle_etab" value="<?php echo e(old('sigle_etab')); ?>"  required autocomplete="sigle_etab" placeholder="sigle établissement " oninput="this.value = this.value.toUpperCase()"   autofocus>

                                <?php $__errorArgs = ['sigle_etab'];
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
                            <label for="etab" class="col-md-3 col-form-label text-md-left" > Libellé </label>

                            <div class="col-md-8">
                                <input id="etab" type="text" class="form-control <?php $__errorArgs = ['etab'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="etab" value="<?php echo e(old('etab')); ?>"  required autocomplete="etab" placeholder="Entrer le libellé d'établissement" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                <?php $__errorArgs = ['etab'];
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
                            <label for="Statut" class="col-md-3 col-form-label text-md-left">Statut</label>

                            <div class="col-md-8">
                                <select id="statut" type="text" class="form-control <?php $__errorArgs = ['statut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="statut"  autocomplete="statut">
                                    <option value="Etatique" >Etatique</option>
                                    <option value="Privé">Privé</option>
                                    <option value="Etranger">Etranger</option>
                                </select>
                                <?php $__errorArgs = ['Statut'];
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
                            <label for="type" class="col-md-3 col-form-label text-md-left">Type</label>

                            <div class="col-md-8">
                                <select id="type" type="text" class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type"  autocomplete="type">
                                    <option value="Ecoles Supérieures" >ECOLES SUPERIEURES</option>
                                    <option value="OFPPT">OFPPT</option>
                                    <option value="Faculté">Faculté</option>
                                </select>
                                <?php $__errorArgs = ['type'];
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
                            <label for="article" class="col-md-3 col-form-label text-md-left">Article</label>

                            <div class="col-md-8">
                                <select id="article" type="text" class="form-control <?php $__errorArgs = ['article'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="article"  autocomplete="article">
                                    <option value="à la">à la</option>
                                    <option value="à">à</option>
                                    <option value="au">au</option>
                                    <option value="à l'">à l'</option>
                                </select>
                                <?php $__errorArgs = ['article'];
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
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><?php echo e(__('Rechercher un établissement')); ?></div>
                <div class="card-body">
                    <form method="GET" action="/etablissement" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="search" class="col-md-4 col-form-label text-md-left" > Sigle</label>

                        <div class="col-md-8">
                            <input id="search" type="text" class="form-control <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="search" value="<?php echo e(old('search')); ?>"  required autocomplete="search" placeholder="ٌRechercher par sigle d'établissement" oninput="this.value = this.value.toUpperCase()"    autofocus>

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
                    <ul>
                        <?php if(count($results)): ?> 
                        <table class=" table table-striped table-responsive mx-0">
                            <th>sigle_etab</th>
                            <th>etablissement</th>
                            <tbody>
                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <b><?php echo e($result->sigle_etab); ?>  </b> </td>
                                    <td><?php echo e($result->Etab); ?></td>                                   
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
                        
                    </ul>            
            </div>           
        </div>
    </div>

    

                        

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/etablissement.blade.php ENDPATH**/ ?>