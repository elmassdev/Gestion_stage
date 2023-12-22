<?php $__env->startSection('content'); ?>

<style>
    .left{
        padding-left: 2%;
        width:60%;
    }
    .right{
        width:35%;
    }
</style>
<div class="row py-4">
    <div class="col-md-8 left">
        <div class="row">
            <div class="col-md-6 border">
                <h6>Bilan stagiaires en cours par services: <a class="btn text-success  rounded-pill" href="/indicators/ExcelStaSer"><i class="fa-solid fa-file-export" ></i></a> </h6>
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
                            <td><?php echo e($stagiaire->sigle_service); ?></td>
                            <td><?php echo e($stagiaire->total); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6 border">
                <h6> Bilan stagiaires en cours par encadrants: <a class="btn text-success  rounded-pill" href="/indicators/ExcelStaEnc"><i class="fa-solid fa-file-export" ></i></a> </h6>
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
        <div class="row card my-2">
            <div class="card-header">
                <div class="card">
                    <form method="GET" action="/indicators/index" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <h6 class="col-md-5">Liste des stagiaires pour une date:</h6>
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
                                    <?php echo e(__('Rechercher')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if(request()->has('search')): ?>
        <div class="row card border" id="datesearch" >
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
                        <td><?php echo e(\Carbon\Carbon::parse($res->date_debut)->format('d/m/Y')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($res->date_fin)->format('d/m/Y')); ?></td>
                        <td> <a  href="/stagiaires/<?php echo e($res->id); ?>"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($results->links()); ?>

            <?php else: ?>
            <p class="bg-warning text-danger"> Pas de stagiaires pour cette date</p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="row card border" style="overflow-y: scroll;">
            <h6 class="col-md-5">Liste des stagiaires en cours: <a class="btn text-success  rounded-pill" href="/indicators/ListeCurrentSta"> <i class="fa-solid fa-file-export" ></i></a></h6>
            <?php if(count($statoday)): ?>
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
                        <td><?php echo e(\Carbon\Carbon::parse($statdy->date_debut)->format('d/m/Y')); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($statdy->date_fin)->format('d/m/Y')); ?></td>
                        <td> <a  href="/stagiaires/<?php echo e($statdy->id); ?>"><i class="fa fa-print text-primary"></i></a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($statoday->links()); ?>

            <?php else: ?>
            <p> Pas de stagiaires en ce moment!</p>
            <?php endif; ?>
        </div>

    </div>
    <div class="col-md-3 right">
        <div class="card">
            <div class="card-header bg-secondary"><?php echo e(__('Exportation des données vers un fichier Excel:')); ?></div>
            <form method="GET" action="/indicators/ExportSta" id="export-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="container">
                    <p>Merci de choisir l'interval spuhaité: </p>
                    <div class="row mb-3">
                        <label for="firstdate" class="col-md-3 col-form-label text-md-left"> Début d'interval</label>
                        <div class="col-md-8">
                            <input id="firstdate" type="date"  class="form-control datepicker  <?php $__errorArgs = ['firstdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="firstdate" value="<?php echo e(old('firstdate')); ?>" pattern="dd/mm/yyyy"  required autocomplete="firstdate" placeholder="dd/mm/yyyy" value="" min="1997-01-01" max="2045-12-31" autofocus>
                            <?php $__errorArgs = ['firstdate'];
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
                        <label for="secdate" class="col-md-3 col-form-label text-md-left"> Fin d'interval</label>
                        <div class="col-md-8">
                            <input id="secdate" type="date"  class="form-control datepicker  <?php $__errorArgs = ['secdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="secdate" value="<?php echo e(old('secdate')); ?>" pattern="dd/mm/yyyy"  required autocomplete="secdate" placeholder="dd/mm/yyyy" value="" min="1997-01-01" max="2045-12-31" autofocus>
                            <?php $__errorArgs = ['secdate'];
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

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary rounded-pill" onclick="validateDate()"  >
                            Exporter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
         function validateDate() {
        const startDateInput = document.getElementById("firstdate");
        const endDateInput = document.getElementById("secdate");
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
            alert("Merci d'entrer des dates valides.");
            return false;
        }

        if (startDate.getTime() >= endDate.getTime()) {
            alert("La date de début doit être antérieure à la date de fin.");
            return false;
        }else{
            document.getElementById("export-form").submit();
        }

    }
    </script>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/indicators/index.blade.php ENDPATH**/ ?>