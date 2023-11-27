<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        
        <div class="col-md-7">
            <div class="card p-1 bg-light">
                <div class="row ">
                    <div class="row ">
                            <div class="col-md-3  p-2">
                                <div class="center mx-4">
                                    <img src="<?php echo e(asset('storage/images/profile/'.$stagiaire->photo)); ?>"  class="img-fluid img-thumbnail mh-80"  style="max-height: 6rem; min-width:2rem" alt="photo de profile" >
                                </div>
                            </div>
                            <div class="col-md-8  position my-auto top-0 end-0">
                                <div class="allergy"><b><?php echo e($stagiaire->civilite); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?></b></div>
                                <div class="allergy text-secondary"><span><?php echo e($stagiaire->type_stage); ?></span></div>
                                <div class="allergy text-secondary"><i class="fa fa-address-card"></i> - <?php echo e($stagiaire->cin); ?></div>
                                <div class="allergy text-secondary"><i class="fa fa-phone" aria-hidden="true"></i> -  <a href="tel:<?php echo e($stagiaire->phone); ?>"><?php echo e($stagiaire->phone); ?></a> </div>
                                <div class="allergy text-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> - <a href="mailto:<?php echo e($stagiaire->email); ?>"><?php echo e($stagiaire->email); ?></a></div>

                            </div>


                            <div class="stats">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Niveau</span> <span class="text-left bottom"><?php echo e($stagiaire->niveau); ?></span> </div>
                                            </td>
                                            <td class="col-md-3">
                                                <div class="d-flex flex-column"> <span class="text-left head">Diplome</span> <span class="text-left bottom"><?php echo e($stagiaire->diplome); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Etablissement</span> <span class="text-left bottom"><?php echo e($stagiaire->etablissement); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Ville</span> <span class="text-left bottom"><?php echo e($stagiaire->ville); ?></span> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Date de début</span> <span class="text-left bottom"><?php echo e($stagiaire->date_debut); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Date de fin</span> <span class="text-left bottom"><?php echo e($stagiaire->date_fin); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Service d'accueil</span> <span class="text-left bottom"><?php echo e($stagiaire->service); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head">Encadrant</span> <span class="text-left bottom"><?php echo e($encadrant->titre); ?> <?php echo e($encadrant->prenom); ?> <?php echo e($encadrant->nom); ?></span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-1">
                    <table>
                        <tbody>
                            <tr>
                                <td> <a href="<?php echo e(URL::to( 'stagiaires/' . $previous )); ?>" class="btn btn-success text-light"> Precedant </a></td>
                                <td><a href="<?php echo e(URL::to( 'stagiaires/' . $next )); ?>" class="btn btn-success text-light"> Suivant</a></td>
                                <td><a href="/stagiaires/" class="btn btn-primary text-light"> Liste stagiaires</a></td>
                                <td><a href="/stagiaires/<?php echo e($stagiaire->id); ?>/modification"  class="btn btn-warning text-dark">Modifier</a></td>
                                <td><form action="/stagiaires/<?php echo e($stagiaire->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')">Supprimer</button></form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="card p-1">
                    <table>
                        <tr class="col-md-12  float-left">
                            <td>
                                <?php if($stagiaire->date_fin<=now()): ?>
                        <div class="card col-md-12 my-2">
                            <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/attestation" class="btn btn-warning text-dark"><i class="fa fa-print text-primary"></i> Attestation de stage</a>

                        </div>
                    <?php endif; ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="col-md-12  float-left">
                            <?php if($stagiaire->date_debut>=now()): ?>
                            <td>
                                <div class=" card col-md-11 bg-warning">
                                    <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/convocation" class="btn btn-warning text-dark" ><i class="fa fa-print text-primary  mx-2"></i> Lettre d'offre de stage</a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <?php if($stagiaire->sujet!=''): ?>
                                    <div class="card col-md-11 bg-warning">
                                        <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/sujet" class="btn btn-warning text-dark"><i class="fa fa-print text-primary mx-2"></i> Sujet de stage</a>
                                    </div>
                                 <?php endif; ?>
                               </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </div>
        </div>

        
        <div class="col-md-5">
            <div class="card p-1 ">
                <div class=" card  p-1">
                    <div class="card-header"><?php echo e(__('Rechercher un stagiaire')); ?></div>
                    <div class=" card-body py-2">

                <form method="GET" action="/stagiaires/<?php echo e($stagiaire->id); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="column" class="col-md-6 col-form-label text-md-left"> Rechercher un stagiaire:</label>

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
                                <option value="cin">Rechercher par CIN</option>
                                <option value="code">Rechercher par code</option>
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
                    <style>
                        a{
                            color: inherit;
                            text-decoration: none;
                        }
                    </style>
                    <?php if(count($results)): ?>
                    <table>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>CIN</th>
                        <th>Date_debut</th>
                        <th>Date_fin</th>
                        <tbody >
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->nom); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->prenom); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->cin); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->date_debut); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->date_fin); ?></a></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\27-11\Gestion_stage\resources\views/stagiaires/show.blade.php ENDPATH**/ ?>