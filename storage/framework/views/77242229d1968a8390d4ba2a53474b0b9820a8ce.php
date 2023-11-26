

<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="row ">        
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header"><?php echo e(__('Ajouter un service')); ?></div>

                <div class="card-body">
                    <form method="POST" action="/service" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="sigle_service" class="col-md-3 col-form-label text-md-left" > sigle service</label>

                            <div class="col-md-8">
                                <input id="sigle_service" type="text" class="form-control <?php $__errorArgs = ['sigle_service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="sigle_service" value="<?php echo e(old('sigle_service')); ?>"  required autocomplete="sigle_service" placeholder="sigle_service " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                <?php $__errorArgs = ['sigle_service'];
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
                            <label for="libelle" class="col-md-3 col-form-label text-md-left" >Service</label>

                            <div class="col-md-8">
                                <input id="libelle" type="text" class="form-control <?php $__errorArgs = ['libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="libelle" value="<?php echo e(old('libelle')); ?>"  required autocomplete="libelle" placeholder="libelle " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                <?php $__errorArgs = ['libelle'];
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
                            <label for="entite" class="col-md-3 col-form-label text-md-left" > sigle entité</label>

                            <div class="col-md-8">
                                <input id="entite" type="text" class="form-control <?php $__errorArgs = ['entite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="entite" value="<?php echo e(old('entite')); ?>"  required autocomplete="entite" placeholder="entite " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>

                                <?php $__errorArgs = ['entite'];
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
                            <label for="site" class="col-md-3 col-form-label text-md-left"> Site </label>

                            <div class="col-md-8">
                               
                                <select id="site" type="text"   class="form-control  <?php $__errorArgs = ['site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site"  autocomplete="site">
                                    <option value="Benguerir">Benguerir</option>
                                    <option value="Youssoufia"> Youssoufia</option>
                                    <option value="Youssoufia"> Safi</option>
                                    <option value="Benguerir">Jorf Lasfar</option>
                                    <option value="Youssoufia"> Khouribga</option>
                            </select>                            
                                <?php $__errorArgs = ['site'];
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
                            <label for="direction" class="col-md-3 col-form-label text-md-left"> Direction</label>

                            <div class="col-md-8">
                               
                                <select id="direction" type="text"   class="form-control  <?php $__errorArgs = ['direction'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="direction"  autocomplete="direction">
                                    <option value="Benguerir">Direction du Site Gantour</option>
                                    <option value="Youssoufia"> Direction Industrielle Achats</option>
                                </select>                            
                                <?php $__errorArgs = ['direction'];
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
                            <div class="col-md-8">
                                <label for="EPI" class="col-md-6 col-form-label text-md-left">EPI est nécéssaire?</label>
                                <input type="checkbox" name="EPI" id="EPI" value="true">
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
                <div class="card-header"><?php echo e(__('Rechercher un service')); ?></div>
                <div class="card-body">
                    <form method="GET" action="/service" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="search" class="col-md-4 col-form-label text-md-left" > services à rechercher</label>
                            <div class="col-md-8">
                                <input id="search" type="text" class="form-control <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="search" value="<?php echo e(old('search')); ?>"  required autocomplete="search" placeholder="rechercher un service " oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"   autofocus>
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
                        <table class="table table-striped table-responsive">
                            <th>sigle_service</th>
                            <th>service</th>
                            <th>site</th>
                            <tbody>  
                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                             
                                <tr>                                   
                                    <td> <b><?php echo e($result->sigle_service); ?>  </b> </td>
                                    <td><?php echo e($result->libelle); ?></td>  
                                    <td><?php echo e($result->site); ?></td>              
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
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Github\Gestion_stage\resources\views/service.blade.php ENDPATH**/ ?>