<?php $__env->startSection('content'); ?>

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
<div class="container">
    <div class="row card my-2">
        <div class="card-header">
            <div class="card">
                <div class="card-header">Exporter les données en SQL: </div>
                <form method="POST" class="mx-auto" action="<?php echo e(route('backup.database')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row my-4">
                        <h6 class="col-md-5">Choisir le tableau :</h6>
                        <div class="col-md-8">
                            <select id="table" type="text" class="form-control <?php $__errorArgs = ['table'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="table"  autocomplete="table">
                                <option value="stagiaires" >Stagiaires</option>
                                <option value="filieres" selected>Filieres</option>
                                <option value="services">Services</option>
                                <option value="encadrants">Encadrants</option>
                                <option value="etablissements">Etablissements</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Sauvegarder')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row card my-2">
        <div class="card-header"> Exporter les données en Excel: </div>
            <div class="card justify-content-center">
                <div class="my-2">
                    <a href="<?php echo e(route('backup.database')); ?>" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Stagiaires</a></a>
                    <a href="/export-filieres" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Filieres</a>
                    <a href="/export-services" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Services</a>
                    <a href="/export-encadrants" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Encadrants</a>
                    <a href="/export-etablissements" class="btn btn-outline-primary col-md-2 my-2 border border-primary rounded-pill fs-5"><i class="fa-solid fa-save"></i> Etablissements</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/export.blade.php ENDPATH**/ ?>