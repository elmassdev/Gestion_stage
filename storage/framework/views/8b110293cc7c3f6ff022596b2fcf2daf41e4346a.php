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
    <div class="col-md-9 left">
        <div class="row">
            <div class="col-md-6 border">
                <h6>Bilan stagiaires en cours par service: <a class="btn text-success  rounded-pill" href="/indicators/ExcelStaSer"><i class="fa-solid fa-file-export" ></i></a> </h6>
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
                <canvas id="myPieChart" height="200px"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var data = <?php echo json_encode($stagiaires, 15, 512) ?>;

                    var labels = data.map(function(item) {
                        return item.sigle_service;
                    });

                    var values = data.map(function(item) {
                        return item.total;
                    });

                    // Function to calculate the gradient color based on the value
                    function calculateColor(value) {
                        // Adjust the gradient based on your requirements
                        var normalizedValue = (value - 7) / (8 - 7); // Normalize the value between 0 and 1
                        var green = Math.round(255 - normalizedValue * 255);
                        var red = Math.round(normalizedValue * 255);
                        return `rgba(${red}, ${green}, 0, 0.7)`;
                    }

                    var backgroundColors = values.map(function(value) {
                        return calculateColor(value);
                    });

                    var ctx = document.getElementById('myPieChart').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Nombre de stagiaires:',
                                data: values,
                                backgroundColor: backgroundColors,
                                borderColor: 'rgba(0, 0, 0, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bilan stagiaires en cours par service: ' + new Date().toLocaleDateString('en-GB'),
                                    padding: {
                                        top: 10,
                                        bottom: 30
                                    }
                                },
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                    document.getElementById('myPieChart').style.height = document.querySelector('.left > div').style.height;
                </script>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 border">
                <h6> Bilan stagiaires en cours par encadrant: <a class="btn text-success  rounded-pill" href="/indicators/ExcelStaEnc"><i class="fa-solid fa-file-export" ></i></a> </h6>
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
            <div class="col-md-6 border">
                <canvas id="stagenc" height="200px"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var data = <?php echo json_encode($stagenc, 15, 512) ?>;

                    var labels = data.map(function(item) {
                        return item.nomenc;
                    });

                    var values = data.map(function(item) {
                        return item.total;
                    });

                    // Function to calculate the gradient color based on the value
                    function calculateColor(value) {
                        // Adjust the gradient based on your requirements
                        var normalizedValue = (value - 7) / (8 - 7); // Normalize the value between 0 and 1
                        var green = Math.round(255 - normalizedValue * 255);
                        var red = Math.round(normalizedValue * 255);
                        return `rgba(${red}, ${green}, 0, 0.7)`;
                    }

                    var backgroundColors = values.map(function(value) {
                        return calculateColor(value);
                    });

                    var ctx = document.getElementById('stagenc').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Nombre de stagiaires',
                                data: values,
                                backgroundColor: backgroundColors,
                                borderColor: 'rgba(0, 0, 0, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Bilan stagiaires en cours par encadrant: ' + new Date().toLocaleDateString('en-GB'),
                                    padding: {
                                        top: 10,
                                        bottom: 30
                                    }
                                },
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                    document.getElementById('stagenc').style.height = document.querySelector('.left > div').style.height;
                </script>
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
                                <input id="search" type="date" value="<?php echo date('Y-m-d');?>" class="form-control <?php $__errorArgs = ['search'];
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

        <div class="row card border">
            <h6 class="bg-warning text-primary"><u> <b>stagiaires en cours</b></u></h6>

             <?php if(count($statoday)): ?>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="small">
                        <th>Titre</th>
                        <th>Prenom</th>
                        <th>Nom</th>
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
    <div class="col-md-2  mx-auto py-2 right">
        <span class="col-md-7 btn-outline-warning text-success fs-6"> <b>Exporter la liste des stagiaires en cours:</b>  <a class="btn text-success  rounded-pill" href="/indicators/ListeCurrentSta"> <i class="fa-solid fa-file-export" ></i></a></span> <span class="btn-outline-warning mx-4 fs-6 text-success"> <b>Exportation détaillée:</b> <a class="btn text-success  rounded-pill" href="/indicators/queries"> <b><i class="fa-solid fa-plus" ></i></b> </a></span>
        <div class="card">
            <div class="card-header"><?php echo e(__('Exportation des données vers un fichier Excel:')); ?></div>
            <form method="GET" action="/indicators/ExportSta" id="export-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="container">
                    <p>Merci de choisir l'interval souhaité: </p>
                    <div class="row mb-3">
                        <label for="firstdate" class="col-md-3 col-form-label text-md-left"> Début d'interval</label>
                        <div class="col-md-8">
                            <input id="firstdate" type="date" value="<?php echo date('Y-m-d');?>"  class="form-control datepicker  <?php $__errorArgs = ['firstdate'];
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
                            <input id="secdate" type="date" value="<?php echo date('Y-m-d');?>" class="form-control datepicker  <?php $__errorArgs = ['secdate'];
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

                    <div class="col-md-4 my-2 mx-auto">
                        <button type="submit" id="export-button" class="btn btn-primary rounded-pill" onclick="validateDate()">
                            Exporter
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <canvas id="monthlyStagiairesChart" width="400" height="300"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                var data = <?php echo json_encode($monthlysta, 15, 512) ?>;
                var months = [];
                var counts = [];

                data.forEach(function(item) {
                    months.push(item.mois + '/' + item.annee);
                    counts.push(item.total);
                });

                var ctx = document.getElementById('monthlyStagiairesChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: 'Stagiaires per Month',
                            data: counts,
                            fill: false, // Set to false to display a line without filling the area underneath
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            pointRadius: 5, // Set to adjust the size of data points
                            pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Set to the color of data points
                            tension: 0.4,
                        }]
                    },
                    options: {
                        plugins: {
                                title: {
                                    display: true,
                                    text: 'Bilan des stagiaires par mois : ',
                                    padding: {
                                        top: 10,
                                        bottom: 30
                                    }
                                },
                                legend: {
                                    display: false
                                }
                            },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            

        </div>
    </div>
</div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startDateInput = document.getElementById("firstdate");
            const endDateInput = document.getElementById("secdate");
            const exportButton = document.getElementById("export-button");

            function validateDate() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
                    alert("Merci d'entrer des dates valides.");
                    return false;
                }

                if (startDate.getTime() >= endDate.getTime()) {
                    alert("La date de début doit être antérieure à la date de fin.");
                    return false;
                } else {
                    return true;
                }
            }

            function updateButtonStatus() {
                exportButton.disabled = !validateDate();
            }

            function updateButtonOnEndDateChange() {
                updateButtonStatus();
            }

            startDateInput.addEventListener('input', updateButtonStatus);
            endDateInput.addEventListener('input', updateButtonOnEndDateChange);
        });
    </script>








</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/indicators/index.blade.php ENDPATH**/ ?>