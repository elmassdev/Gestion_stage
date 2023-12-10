<?php $__env->startSection('content'); ?>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    #container {
        display: flex;
        height: 100vh;
    }

    #left {
        flex: 1;
        overflow-y: auto;
        padding: 15px;
    }

    #right {
        flex-shrink: 0;
        width: 300px;
        height: 100%;
        position: fixed;
        top: 5;
        right: 0;
        overflow-y: auto;
    }

    @media (max-width: 767px) {
        #container {
            flex-direction: column;
        }

        #right {
            position: relative;
            width: 100%;
            top: auto;
            bottom: 0;
        }
    }
</style>

<div class="container col-md-12" id="container">
    <div class="row col-md-12">
        <div class="col-md-9" style="overflow-y: scroll;" id="left">
            <div class="card">
                <div class="card-header">Modifier les informations de <b><?php echo e($stagiaire->civilite); ?> <?php echo e($stagiaire->nom); ?></b> </div>


                <div class="card-body">
                    <form method="POST" action="/stagiaires/<?php echo e($stagiaire->id); ?>/modification" enctype="multipart/form-data" onsubmit="return validateDates()">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <script>
                            function validateDates() {
                                const holidays = [];
                                const year = new Date().getFullYear();

                                // New Year
                                holidays.push(`${year}-01-01`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }

                                // 11 janvier
                                holidays.push(`${year}-01-11`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //1er Mai
                                holidays.push(`${year}-05-01`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //30 juillet
                                holidays.push(`${year}-07-30`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //14 Aout
                                holidays.push(`${year}-08-14`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }

                                    //20 aout
                                holidays.push(`${year}-08-20`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //21 aout
                                holidays.push(`${year}-08-21`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }

                                //almassira
                                holidays.push(`${year}-11-06`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }
                                //independance
                                holidays.push(`${year}-11-18`);
                                for (let i = 1; i <= 10; i++) {
                                    holidays.push(`${year+i}-01-01`);
                                    }


                                const startDateInput = document.getElementById("date_debut");
                                const endDateInput = document.getElementById("date_fin");

                                // Get the selected dates
                                const startDate = new Date(startDateInput.value);
                                const endDate = new Date(endDateInput.value);



                                const formattedBeginningDate = startDate.toISOString().slice(0, 10);
                                const formattedEndDate = endDate.toISOString().slice(0, 10);

                                // Check if the beginning date input is a holiday
                                if (holidays.includes(formattedBeginningDate)){
                                    alert('La date de debut est un jour ferié.');
                                    return false;
                                }
                                if (holidays.includes(formattedEndDate)){
                                    alert('La date de fin est un jour ferié.');
                                    return false;
                                }


                                // Check if either date is not a valid date
                                if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
                                    alert("Merci d'entrer des dates valides.");
                                    return false;
                                }


                                if (startDate.getTime() >= endDate.getTime()) {
                                    alert("La date de début doit être antérieure à la date de fin.");
                                    return false;
                                }
                                if (startDate.getDay()===6 || startDate.getDay()===0) {
                                    alert("La date de début correspond à un weekend");
                                    return false;
                                }
                                if (endDate.getDay()===6 || endDate.getDay()===0) {
                                    alert("La date de fin correspond à un weekend");
                                    return false;
                                }
                                // All validation checks passed
                                return true;
                                }

                        </script>
                        <script>
                            //change data values to json
                            var FilSer = <?php echo json_encode($services, 15, 512) ?>;
                            var FilSerEnc = <?php echo json_encode($encadrants, 15, 512) ?>;
                        </script>


                        <div class="row mb-3">
                            <label for="code" class="col-md-3 col-form-label text-md-left" > Code Stagiaire</label>

                            <div class="col-md-8">
                                <input id="code" type="number" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="code" value="<?php echo e($stagiaire->code); ?>"  required autocomplete="code"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"   autofocus>

                                <?php $__errorArgs = ['code'];
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
                            <label for="date_demande" class="col-md-3 col-form-label text-md-left"> Date demande</label>

                            <div class="col-md-8">
                                <input id="date_demande" type="date" value = "<?php echo e($stagiaire->date_demande); ?>" class="form-control datepicker  <?php $__errorArgs = ['date_demande'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="date_demande" value="<?php echo e(old('date_demande')); ?>" pattern="dd/mm/yyyy"  required autocomplete="date_demande" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" autofocus>

                                <?php $__errorArgs = ['date_demande'];
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
                            <label for="site" class="col-md-3 col-form-label text-md-left"> site de stage</label>

                            <div class="col-md-8">

                                <select id="site" type="text"   class="form-control  <?php $__errorArgs = ['site'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site"  autocomplete="site">
                                    <option value="<?php echo e($stagiaire->site); ?>" selected><?php echo e($stagiaire->site); ?></option>
                                    <option value="Benguerir">Benguerir</option>
                                    <option value="Youssoufia"> Youssoufia</option>
                                    
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
                            <label for="photo" class="col-md-3 col-form-label text-md-left">Photo de profile</label>
                            <div class="col-md-8 row">
                                <div class="col-md-7">
                                    <input type="file" name="photo" accept="image/gif, image/jpeg, image/png" id="photo">
                                    <?php if($stagiaire->photo): ?>
                                    <img src="<?php echo e(asset('storage/images/profile/'.$stagiaire->photo)); ?>" alt="Profile Picture" style="max-width: 200px; max-height: 200px;">
                                    <?php else: ?>
                                    <p>No profile picture available.</p>
                                    <?php endif; ?>
                                </div>
                                <?php if(!($stagiaire->photo === 'default_m.jpg') && !($stagiaire->photo === 'default_f.png')): ?>
                                    <div class="col-md-5">
                                        <label for="deletePhoto" class="col-md-7 col-form-label text-md-left"><?php echo e(__('Supprimer la photo?')); ?></label>
                                        <input type="checkbox" name="deletePhoto" id="deletePhoto" value="1">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="civilite" class="col-md-3 col-form-label text-md-left"> Titre de civilité</label>

                            <div class="col-md-8">
                                <select id="civilite" type="text" class="form-control <?php $__errorArgs = ['civilite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="civilite" required autocomplete="civilite">
                                    <option value="<?php echo e($stagiaire->civilite); ?>" selected><?php echo e($stagiaire->civilite); ?></option>
                                    <option value="M." >Monsieur</option>
                                    <option value="Mlle">Mademoiselle</option>
                                    <option value="Mme">Madame</option>
                            </select>
                                <?php $__errorArgs = ['civilite'];
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
                            <label for="prenom" class="col-md-3 col-form-label text-md-left"><?php echo e(__('Prénom')); ?></label>

                            <div class="col-md-8">
                                <input id="prenom" type="text" value="<?php echo e($stagiaire->prenom); ?>" class="form-control <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" name="prenom"   required autocomplete="prenom"  autofocus>

                                <?php $__errorArgs = ['prenom'];
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
                            <label for="nom" class="col-md-3 col-form-label text-md-left"><?php echo e(__('Nom')); ?></label>

                            <div class="col-md-8">
                                <input id="nom" type="text" class="form-control <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nom" value="<?php echo e($stagiaire->nom); ?>" oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)" required autocomplete="nom"  autofocus>

                                <?php $__errorArgs = ['nom'];
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
                            <label for="cin" class="col-md-3 col-form-label text-md-left"><?php echo e(__('CIN')); ?></label>

                            <div class="col-md-8">
                                <input id="cin" type="text" class="form-control <?php $__errorArgs = ['cin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cin" value="<?php echo e($stagiaire->cin); ?>" oninput="this.value = this.value.toUpperCase()" required autocomplete="cin" autofocus>

                                <?php $__errorArgs = ['cin'];
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
                            <label for="phone" class="col-md-3 col-form-label text-md-left"><?php echo e(__('Phone')); ?></label>

                            <div class="col-md-8">
                                <input id="phone" type="tel" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e($stagiaire->phone); ?>"  autocomplete="phone" placeholder="ex: +212662077439" autofocus>

                                <?php $__errorArgs = ['phone'];
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
                            <label for="email" class="col-md-3 col-form-label text-md-left"><?php echo e(__('Email')); ?></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($stagiaire->email); ?>"  autocomplete="email">

                                <?php $__errorArgs = ['email'];
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
                            <label for="niveau" class="col-md-3 col-form-label text-md-left"> Niveau</label>

                            <div class="col-md-8">
                                <select id="niveau" type="text" class="form-control <?php $__errorArgs = ['niveau'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="niveau"  autocomplete="niveau">
                                    <option value="<?php echo e($stagiaire->niveau); ?>" selected><?php echo e($stagiaire->niveau); ?></option>
                                    <option value="1ère année" >1ère année</option>
                                    <option value="2ème année">2ème année</option>
                                    <option value="3ème année">3ème année</option>
                                    <option value="4ème année">4ème année</option>
                                    <option value="5ème année">5ème année</option>
                            </select>
                                <?php $__errorArgs = ['niveau'];
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
                            <label for="diplome" class="col-md-3 col-form-label text-md-left"> Diplome</label>

                            <div class="col-md-8">
                                <select id="diplome" type="text" class="form-control <?php $__errorArgs = ['diplome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="diplome"  autocomplete="diplome">
                                    <option value="<?php echo e($stagiaire->diplome); ?>" selected><?php echo e($stagiaire->diplome); ?></option>
                                    <option value="Qualification Professionnelle" >Qualification Professionnelle</option>
                                    <option value="Technicien">Technicien</option>
                                    <option value="Technicien spécialisé">Technicien spécialisé</option>
                                    <option value="DUT">DUT</option>
                                    <option value="DUT">BTS</option>
                                    <option value="Licence fondamentale">Licence fondamentale</option>
                                    <option value="Licence professionnelle">Licence professionnelle</option>
                                    <option value="Cycle d'ingénieur">Cycle d'ingénieur</option>
                                    <option value="Master">Master</option>
                                    <option value="Master spécialisé">Master spécialisé</option>
                                    <option value="Doctorat">Doctorat</option>
                                    <option value=" ">Master ENCG</option>
                            </select>
                                <?php $__errorArgs = ['diplome'];
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
                            <label for="filiere" class="col-md-3 col-form-label text-md-left"> Filiere</label>
                            <div class="col-md-8">
                                <select id="filiere" type="text" class="form-control <?php $__errorArgs = ['filiere'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="filiere" required autocomplete="filiere">
                                <option value="<?php echo e($stagiaire->filiere); ?>" selected ><?php echo e($stagiaire->filiere); ?></option>
                                <?php $__currentLoopData = $filieres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($f->filiere); ?>"><?php echo e($f->filiere); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                <?php $__errorArgs = ['filiere'];
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
                            <label for="etablissement" class="col-md-3 col-form-label text-md-left"> Etablissement</label>
                            <div class="col-md-8">
                                <select id="etablissement" type="text" class="form-control <?php $__errorArgs = ['etablissement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="etablissement" required autocomplete="etablissement">
                                <option  value="<?php echo e($stagiaire->etablissement); ?>" selected ><?php echo e($stagiaire->etablissement); ?></option>
                                <?php $__currentLoopData = $etablissements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($etab->sigle_etab); ?>"><?php echo e($etab->sigle_etab); ?> - <?php echo e($etab->Etab); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                <?php $__errorArgs = ['etablissement'];
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
                            <label for="ville" class="col-md-3 col-form-label text-md-left"> Ville </label>
                            <div class="col-md-8">
                                <select id="ville" type="text" class="form-control <?php $__errorArgs = ['ville'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ville"  autocomplete="ville">
                                    <option value="<?php echo e($stagiaire->ville); ?>" selected><?php echo e($stagiaire->ville); ?></option>
                                       <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ville->ville); ?>"><?php echo e($ville->ville); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>

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
                            <label for="type_stage" class="col-md-3 col-form-label text-md-left"> Type Stage</label>

                            <div class="col-md-8">
                                <select id="type_stage" type="text" class="form-control <?php $__errorArgs = ['type_stage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type_stage"  autocomplete="type_stage">
                                    <option value="<?php echo e($stagiaire->type_stage); ?>" selected><?php echo e($stagiaire->type_stage); ?></option>
                                    <option value="stage ouvrier" selected>stage ouvrier</option>
                                    <option value="stage d'application">stage d'application</option>
                                    <option value="stage d'observation">stage d'observation</option>
                                    <option value="stage PFE">Stage PFE</option>
                            </select>
                                <?php $__errorArgs = ['type_stage'];
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
                            <label for="encadrant" class="col-md-3 col-form-label text-md-left"> Encadrant</label>
                            <div class="col-md-8">
                                <select id="encadrant" type="text" class="form-control <?php $__errorArgs = ['encadrant'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="encadrant" required autocomplete="encadrant">
                                <option value="<?php echo e($encadr->id); ?>" selected ><?php echo e($encadr->nom); ?>  <?php echo e($encadr->prenom); ?></option>
                                <?php $__currentLoopData = $encadrants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encadrant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($encadrant->id); ?>"><?php echo e($encadrant->nom); ?>  <?php echo e($encadrant->prenom); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                <?php $__errorArgs = ['encadrant'];
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
                            <label for="service" class="col-md-3 col-form-label text-md-left"> Service d'accueil</label>
                            <div class="col-md-8">
                                <select id="service" type="text" class="form-control <?php $__errorArgs = ['service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="service" required autocomplete="service">
                                <option  value="<?php echo e($stagiaire->service); ?>" selected ><?php echo e($stagiaire->service); ?></option>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($service->sigle_service); ?>"><?php echo e($service->sigle_service); ?> - <?php echo e($service->libelle); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                <?php $__errorArgs = ['service'];
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
                            <label for="date_debut" class="col-md-3 col-form-label text-md-left"> Date de début</label>

                            <div class="col-md-8">
                                <input id="date_debut" type="date"  class="form-control datepicker  <?php $__errorArgs = ['date_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="date_debut" value="<?php echo e($stagiaire->date_debut); ?>" pattern="dd/mm/yyyy"  required autocomplete="date_debut" placeholder="dd/mm/yyyy" value="" min="1997-01-01" max="2045-12-31" autofocus>

                                <?php $__errorArgs = ['date_debut'];
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
                            <label for="date_fin" class="col-md-3 col-form-label text-md-left"> Date de fin</label>

                            <div class="col-md-8">
                                <input id="date_fin" type="date"  class="form-control datepicker  <?php $__errorArgs = ['date_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"   name="date_fin" value="<?php echo e($stagiaire->date_fin); ?>" pattern="dd/mm/yyyy"  required autocomplete="date_fin" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" autofocus>

                                <?php $__errorArgs = ['date_fin'];
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
                            <label for="sujet" class="col-md-3 col-form-label text-md-left"><?php echo e(__('Sujet')); ?></label>

                            <div class="col-md-8">
                                <textarea id="sujet" class="form-control <?php $__errorArgs = ['sujet'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sujet" value="<?php echo e($stagiaire->sujet); ?>"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"  autocomplete="sujet"  autofocus oninput="validateDates()" ><?php echo e($stagiaire->sujet); ?></textarea>

                                <?php $__errorArgs = ['sujet'];
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
                            <label for="observation" class="col-md-3 col-form-label text-md-left"><?php echo e(__('Observation')); ?></label>

                            <div class="col-md-8">
                                <textarea id="observation" class="form-control <?php $__errorArgs = ['observation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="observation" value="<?php echo e($stagiaire->observation); ?>"  oninput="this.value = this.value.charAt(0).toUpperCase()+ this.value.slice(1)"  autocomplete="observation"  autofocus ><?php echo e($stagiaire->observation); ?></textarea>

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
                        </div>
                        <div class="row mb-3 display-inline">
                            <div class="col-md-4">
                                <label for="remunere" class="col-md-4 col-form-label text-md-left"><?php echo e(__('Stage remuneré')); ?></label>
                            <input type="checkbox" name="remunere" id="remunere" value="true" <?php echo e(old('remunere', $stagiaire->remunere) ? 'checked' : ''); ?>>
                            </div>
                            <div class="col-md-4">
                                <label for="EI" class="col-md-4 col-form-label text-md-left"><?php echo e(__('Elève Ingénieur')); ?></label>
                            <input type="checkbox" name="EI" id="EI" value="true" <?php echo e(old('EI', $stagiaire->EI) ? 'checked' : ''); ?>>
                            </div>
                            <div class="col-md-4">
                                <label for="annule" class="col-md-4 col-form-label text-md-left"><?php echo e(__('Annulé')); ?></label>
                            <input type="checkbox" name="annule" id="annule" value="true" <?php echo e(old('annule', $stagiaire->annule) ? 'checked' : ''); ?>>
                            </div>

                        </div>

                        

                        


                        <script>
                            var EI = document.getElementById('EI');

                            document.getElementById('site').addEventListener('change', function() {
                                site = this.value;
                                var filtered_services = FilSer.filter(function(services) {
                                    return services.site === site;
                                });
                                //alert(JSON.stringify(filtered_services));

                                var service_select = document.getElementById('service');
                                service_select.innerHTML = '<option value="" disabled>Service de stage</option>';
                                filtered_services.forEach(function(services) {
                                    service_select.innerHTML += '<option value="' + services.sigle_service + '">' + services.sigle_service+' - '+services.libelle + '</option>';
                                });
                            });

                            document.getElementById('encadrant').addEventListener('change', function() {
                                var selectedEncadrantId = this.value;
                                var serviceDropdown = document.getElementById('service');
                                serviceDropdown.innerHTML = '<option selected disabled>Service</option>';

                                if (selectedEncadrantId) {
                                    var selectedEncadrant = FilSerEnc.find(function(encadrant) {
                                        return encadrant.id == selectedEncadrantId;
                                    });

                                    if (selectedEncadrant) {
                                        var option = document.createElement('option');
                                        option.value = selectedEncadrant.service;
                                        option.text = selectedEncadrant.service;
                                        serviceDropdown.appendChild(option);
                                    }
                                }
                                serviceDropdown.innerHTML = '<option value="'+ services.sigle_service + '">' + services.sigle_service+' - '+services.libelle + '</option>';
                            });

                            document.getElementById('diplome').addEventListener('change', function(){
                                var diplome = this.value;
                                var etab = document.getElementById('etablissement').value;
                                var ListEtab = ['ENSMR','EMI','EHTP','ESI','ENA','ENSA','ENSIAS','ENSAM','ENCG','ISCAE','EMINES','FS','FSJES','AIAC']
                                var isMasterOrCycle = diplome === 'Cycle d\'ingénieur' || diplome === 'Master' || diplome === 'Master spécialisé' || diplome ==='Doctorat';
                                document.getElementById('EI').checked = isMasterOrCycle;
                                var isRemunere = ((isMasterOrCycle && ListEtab.includes(etab))|| etab ==='IMM'|| etab ==='IMT');
                                document.getElementById('remunere').checked =isRemunere;
                            });

                            document.getElementById('etablissement').addEventListener('change', function(){
                                var etab = this.value;
                                var diplome = document.getElementById('diplome').value;
                                var ListEtab = ['ENSMR','EMI','EHTP','ESI','ENA','ENSA','ENSIAS','ENSAM','ENCG','ISCAE','EMINES','FS','FSJES','AIAC']
                                var isMoCI = diplome === 'Cycle d\'ingénieur' || diplome === 'Master' || diplome === 'Master spécialisé' || diplome ==='Doctorat';
                                document.getElementById('EI').checked = isMoCI;
                                var isRem = ( (isMoCI && ListEtab.includes(etab)) || etab ==='IMM'|| etab ==='IMT');
                                document.getElementById('remunere').checked =isRem;
                            });

                        </script>






                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" oninput="validateDates()">
                                    <?php echo e(__('Enregisterer la modifcation')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 float-right" style="overflow-y: fixed;" id="right">
        <div class="card col-md-12">
            <div class="card-header bg-primary"><?php echo e(__('Autre informations à ajouter:')); ?></div>
            <table>
                <tr>
                    <a href="/filieres/create" target="/_blank"  class=" col-md-10 mx-auto my-2 btn btn-primary">Ajouter une filière</a>
                    <a href="/etablissements/create" target="/_blank" class=" col-md-10 mx-auto my-2 btn btn-primary">Ajouter un établissement</a>
                    <a href="/services/create" target="/_blank" class=" col-md-10 mx-auto my-2 btn btn-primary">Ajouter un service</a>
                    <a href="/encadrants/create" target="/_blank" class=" col-md-10 mx-auto my-2 btn btn-primary">Ajouter un encadrant </a>
                    <a href="/villes/create" target="/_blank" class=" col-md-10 mx-auto my-2 btn btn-primary">Ajouter une ville</a>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/stagiaires/modification.blade.php ENDPATH**/ ?>