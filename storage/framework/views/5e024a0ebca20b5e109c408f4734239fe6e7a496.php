<?php $__env->startSection('content'); ?>

<style>
    .sign{
        font-size: 10px;
    }
</style>
<div class="container py-4">
    <a href="/stagiaires/create" class="btn btn-outline-warning my-1"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#12976f" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></a>
    <div class="row">
        
        <div class="col-md-7">
            <div class="row">
                <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                </div>
                <?php endif; ?>
                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('error')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="card p-1 py-2" >
                <div class="row ">
                    <div class="row ">
                                <div class="col-md-3  p-2">
                                    <div class="center mx-4">
                                        <img src="<?php echo e(asset('storage/images/profile/'.$stagiaire->photo)); ?>"  class="img-fluid img-thumbnail mh-80"  style="max-height: 6rem; min-width:2rem" alt="photo de profile" >
                                    </div>
                                </div>
                                <div class="col-md-6  position my-auto top-0 end-0">
                                    <div class="allergy"><b><?php echo e($stagiaire->civilite); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?></b></div>
                                    <div class="allergy text-secondary"><span><?php echo e($stagiaire->type_stage); ?></span> - <span><?php echo e($stagiaire->code); ?></span></div>
                                    <div class="allergy text-secondary"><i class="fa fa-address-card"></i> - <?php echo e($stagiaire->cin); ?></div>
                                    <div class="allergy text-secondary"><i class="fa fa-phone" aria-hidden="true"></i> -  <a href="tel:<?php echo e($stagiaire->phone); ?>"><?php echo e($stagiaire->phone); ?></a> </div>
                                    <div class="allergy text-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> - <a href="mailto:<?php echo e($stagiaire->email); ?>"><?php echo e($stagiaire->email); ?></a></div>

                                </div>

                                <?php if($stagiaire->annule): ?>
                                <div class="col-md-3 text-center"> <p class="bg-warning text-danger rounded-pill" style="font-size: larger"> Stage annulé <b>X</b> </p> </div>
                                <?php endif; ?>
                                <?php if(($stagiaire->phone) &&(!$stagiaire->annule)): ?>
                                <div class="col-md-3 text-center"> <a href="https://wa.me/<?php echo e($stagiaire->phone); ?>?text=Bonjour,%20<?php echo e($stagiaire->civilite); ?>%20<?php echo e($stagiaire->prenom); ?>%20<?php echo e($stagiaire->nom); ?>: %0Avotre%20stage%20est%20approuvé,%20du%20<?php echo e(\Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y')); ?>%20au%20<?php echo e(\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')); ?>,  <?php if($stagiaire->sujet): ?> %20et%20votre%20sujet%20est%20:%20<?php echo e($stagiaire->sujet); ?>, <?php endif; ?>, Merci de se présenter le premier jour de votre stage au CCI/UM6P : https://maps.app.goo.gl/J8ZP8REoFHxYqVUs9" target="_blank"> <p class=" btn text-warning btn-secondary"> <b>Notifier!</b>  </p> </a> </div>

                                
                                    
                                <?php endif; ?>




                            <div class="stats">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head"> <b>Niveau</b></span> <span class="text-left bottom"><?php echo e($stagiaire->niveau); ?></span> </div>
                                            </td>
                                            <td class="col-md-3">
                                                <div class="d-flex flex-column"> <span class="text-left head"> <b>Diplome</b> </span> <span class="text-left bottom"><?php echo e($stagiaire->diplome); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head"> <b>Etablissement</b> </span> <span class="text-left bottom"><?php echo e($stagiaire->etablissement); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head"> <b>Ville</b> </span> <span class="text-left bottom"><?php echo e($stagiaire->ville); ?></span> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head"> <b>Date de début</b> </span> <span class="text-left bottom"><?php echo e(\Carbon\Carbon::parse($stagiaire->date_debut)->format('d/m/Y')); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head"> <b>Date de fin</b> </span> <span class="text-left bottom"><?php echo e(\Carbon\Carbon::parse($stagiaire->date_fin)->format('d/m/Y')); ?></span> </div>
                                            </td>
                                            <td>
                                                <?php if(isset($service) && $service->sigle_service): ?>
                                                    <div class="d-flex flex-column">
                                                        <span class="text-left head"> <b>Service d'accueil</b> </span>
                                                        <span class="text-left bottom"><?php echo e($service->sigle_service); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <div class="d-flex flex-column"> <span class="text-left head"> <b>Encadrant</b> </span> <span class="text-left bottom"><?php echo e($encadrant->titre); ?> <?php echo e($encadrant->prenom); ?> <?php echo e($encadrant->nom); ?></span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-1 my-2">
                    <table>
                        <tbody>
                            <tr>
                                <td> <a href="<?php echo e(URL::to( 'stagiaires/' . $previous )); ?>" class="btn btn-success text-light"> <i class="fa fa-chevron-left" aria-hidden="true"></i> </a></td>
                                <td><a href="<?php echo e(URL::to( 'stagiaires/' . $next )); ?>" class="btn btn-success text-light"> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/" class="btn btn-success text-light"> <i class="fa fa-list" aria-hidden="true"></i></a></td>
                                <td><a href="/stagiaires/<?php echo e($stagiaire->id); ?>/modification"  class="btn btn-warning text-light"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                                <td>
                                    <form action="<?php echo e(route('stagiaires.duplicate', ['id' => $stagiaire->id])); ?>" method="GET">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-warning text-primary"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fff" d="M384 336H192c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16l140.1 0L400 115.9V320c0 8.8-7.2 16-16 16zM192 384H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H192c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H256c35.3 0 64-28.7 64-64V416H272v32c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192c0-8.8 7.2-16 16-16H96V128H64z"/></svg></button>
                                    </form>
                                </td>
                                <?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
                                <td><form action="/stagiaires/<?php echo e($stagiaire->id); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn text-danger" onclick="return confirm('Voulez-vous supprimer cet enregistrement?')"><i class="fa fa-trash" aria-hidden="true"></i></button></form>
                                </td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <?php if(!($stagiaire->annule)): ?>
                <div class="card">
                    <table>
                        <tr>
                            <td>
                                <?php if(($stagiaire->date_fin<=now()) && !($stagiaire->annule)): ?>
                                <div class="card col-md-12">
                                    <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/attestation" class="btn" target="_blank"><i class="fa fa-print text-primary"></i> Attestation de stage</a>
                                </div>
                                <?php endif; ?>
                                <?php if(($stagiaire->date_fin > now()) && !($stagiaire->annule)): ?>
                                <div class=" card col-md-12">
                                    <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/convocation" class="btn" target="_blank" id="LO" class="print-link" data-id="<?php echo e($stagiaire->id); ?>><i class="fa fa-print text-primary"></i> Lettre d'offre</a>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(($stagiaire->sujet!='') && !($stagiaire->annule)): ?>
                                <div class="card col-md-12">
                                    <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/sujet" class="btn" target="_blank"><i class="fa fa-print text-primary"></i> Sujet de stage</a>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(($stagiaire->date_fin<=now()) && ($stagiaire->remunere) && !($stagiaire->annule) &&($stagiaire->OP_etabli_le==null)): ?>
                                <div class="card col-md-12">
                                    <a  href="/stagiaires/<?php echo e($stagiaire->id); ?>/op" class="btn" target="_blank"><i class="fa fa-print text-primary"></i> Ordre de paiement</a>
                                </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div> <?php endif; ?>
                <div class="card p-1 py-2">
                    <form method="POST" action="/stagiaires/<?php echo e($stagiaire->id); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row mb-3">
                            <label for="dateLO" class="col-md-3 mx-1 col-form-label text-md-left"> Lettre d'offre éditée le: </label>
                            <div class="col-md-5">
                                <input id="dateLO" type="date" value = "<?php echo e($stagiaire->dateLO); ?>" class="form-control datepicker  <?php $__errorArgs = ['dateLO'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="dateLO" value="<?php echo e(old('dateLO')); ?>"    autocomplete="dateLO"  autofocus>
                                <?php $__errorArgs = ['dateLO'];
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
                            <?php if($stagiaire->dateLO): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e(\Carbon\Carbon::parse($stagiaire->dateLO)->format('d/m/Y')); ?></p></div>
                            <?php endif; ?>
                        </div>

                        <div class="row mb-3">
                            <label for="date_reception_FFS" class="col-md-3 mx-1 col-form-label text-md-left"> FA + FP reçues le: </label>
                            <div class="col-md-5">
                                <input id="date_reception_FFS" type="date" value = "<?php echo e($stagiaire->date_reception_FFS); ?>" class="form-control datepicker  <?php $__errorArgs = ['date_reception_FFS'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="date_reception_FFS" value="<?php echo e(old('date_reception_FFS')); ?>"    autocomplete="date_reception_FFS" lang="fr-CA" autofocus>
                                <?php $__errorArgs = ['date_reception_FFS'];
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
                            <?php if($stagiaire->date_reception_FFS): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e(\Carbon\Carbon::parse($stagiaire->date_reception_FFS)->format('d/m/Y')); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-3">
                            <label for="date_Att_etablie" class="col-md-3 mx-1 col-form-label text-md-left"> Attestation établie le: </label>
                            <div class="col-md-5">
                                <input id="date_Att_etablie" type="date" value = "<?php echo e($stagiaire->date_Att_etablie); ?>" class="form-control datepicker  <?php $__errorArgs = ['date_Att_etablie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="date_Att_etablie" value="<?php echo e(old('date_Att_etablie')); ?>"    autocomplete="date_Att_etablie" lang="fr-CA" autofocus>
                                <?php $__errorArgs = ['date_Att_etablie'];
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
                            <?php if($stagiaire->date_Att_etablie): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e(\Carbon\Carbon::parse($stagiaire->date_Att_etablie)->format('d/m/Y')); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-3">
                            <label for="Attestation_remise_le" class="col-md-3  mx-1 col-form-label text-md-left"> Attestation remise le:</label>
                            <div class="col-md-5">
                                <input id="Attestation_remise_le" type="date" value = "<?php echo e($stagiaire->Attestation_remise_le); ?>" class="form-control datepicker  <?php $__errorArgs = ['Attestation_remise_le'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="Attestation_remise_le" value="<?php echo e(old('Attestation_remise_le')); ?>"    autocomplete="Attestation_remise_le" lang="fr-CA" autofocus>
                                <?php $__errorArgs = ['Attestation_remise_le'];
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
                            <?php if($stagiaire->Attestation_remise_le): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e(\Carbon\Carbon::parse($stagiaire->Attestation_remise_le)->format('d/m/Y')); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-3">
                            <label for="Att_remise_a" class="col-md-3 mx-1 col-form-label text-md-left"><?php echo e(__('Attestation remise à: ')); ?></label>
                            <div class="col-md-5">
                                <input id="Att_remise_a" type="text" value="<?php echo e($stagiaire->Att_remise_a); ?>" class="form-control <?php $__errorArgs = ['Att_remise_a'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" name="Att_remise_a"    autocomplete="Att_remise_a"  autofocus>
                                <?php $__errorArgs = ['Att_remise_a'];
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
                            <?php if($stagiaire->Att_remise_a): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e($stagiaire->Att_remise_a); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-3">
                            <label for="observation" class="col-md-3 mx-1 col-form-label text-md-left"><?php echo e(__('Observation: ')); ?></label>
                            <div class="col-md-5">
                                <input id="observation" type="text" value="<?php echo e($stagiaire->observation); ?>" class="form-control <?php $__errorArgs = ['observation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" name="observation"    autocomplete="observation"  autofocus>
                                <?php $__errorArgs = ['observation'];
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
                            <?php if($stagiaire->observation): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e($stagiaire->observation); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-3">
                            <label for="OP_etabli_le" class="col-md-3 mx-1 col-form-label text-md-left"> OP établie le: </label>
                            <div class="col-md-5">
                                <input id="OP_etabli_le" type="date" value = "<?php echo e($stagiaire->OP_etabli_le); ?>" class="form-control datepicker  <?php $__errorArgs = ['OP_etabli_le'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="OP_etabli_le" value="<?php echo e(old('OP_etabli_le')); ?>"    autocomplete="OP_etabli_le" lang="fr-CA" autofocus>
                                <?php $__errorArgs = ['OP_etabli_le'];
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
                            <?php if($stagiaire->OP_etabli_le): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e(\Carbon\Carbon::parse($stagiaire->OP_etabli_le)->format('d/m/Y')); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-3">
                            <label for="indemnite_remise_le" class="col-md-3 mx-1 col-form-label text-md-left"> Indemnité remise le:</label>
                            <div class="col-md-5">
                                <input id="indemnite_remise_le" type="date" value = "<?php echo e($stagiaire->indemnite_remise_le); ?>" class="form-control datepicker  <?php $__errorArgs = ['indemnite_remise_le'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="indemnite_remise_le" value="<?php echo e(old('indemnite_remise_le')); ?>"    autocomplete="indemnite_remise_le" lang="fr-CA" autofocus>
                                <?php $__errorArgs = ['indemnite_remise_le'];
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
                            <?php if($stagiaire->indemnite_remise_le): ?>
                            <div class="col-md-3 mx-auto border border-warning"> <p class="text-center"><?php echo e(\Carbon\Carbon::parse($stagiaire->indemnite_remise_le)->format('d/m/Y')); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-0">
                            <div class="sign d-flex flex-column"> <span class="text-primary"> <small>Saisi par: <?php echo e($stagiaire->created_by); ?> : <?php echo e($stagiaire->created_at); ?></small> </span> </div>
                            <div class="sign d-flex flex-column"> <span class="text-primary"> <small>Modifié par: <?php echo e($stagiaire->edited_by); ?> : <?php echo e($stagiaire->updated_at); ?></small> </span> </div>
                            <div >
                                <button type="submit" class="btn btn-warning my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fff" d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/></svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>


        
        <div class="col-md-5">
            <div class="card p-1 ">
                <div class=" card  p-1 my-2 ">
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
                    <table class="table table-striped col-md-12 border-solid">
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>CIN</th>
                        <th>Date_debut</th>
                        <th>Date_fin</th>
                        <tbody class="table-striped">
                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->nom); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->prenom); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e($result->cin); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e(\Carbon\Carbon::parse($result->date_debut)->format('d/m/Y')); ?></a></td>
                                    <td><a href="/stagiaires/<?php echo e($result->id); ?>"><?php echo e(\Carbon\Carbon::parse($result->date_fin)->format('d/m/Y')); ?></a></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/stagiaires/show.blade.php ENDPATH**/ ?>