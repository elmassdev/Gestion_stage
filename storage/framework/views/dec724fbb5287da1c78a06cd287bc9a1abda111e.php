<?php $__env->startSection('content'); ?>
<div class=" card  p-1 my-2 ">
    <div class=" card-body py-2">
        <form action="<?php echo e(route('graph')); ?>" method="get" class="mb-4 mt-2">
            <?php echo csrf_field(); ?>
            <div class="form-group row align-items-center">
                <label for="year" class="col-md-2 col-form-label text-md-right">Choisir année:</label>
                <div class="col-md-3">
                    <select id="year" name="year" class="form-control">
                        <?php
                            $currentYear = date('Y');
                            $selectedYear = isset($year) ? $year : $currentYear;
                        ?>
                        <?php for($y = $currentYear; $y >= $currentYear - 10; $y--): ?>
                            <option value="<?php echo e($y); ?>" <?php echo e($selectedYear == $y ? 'selected' : ''); ?>><?php echo e($y); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>




    <div class="container">
        <!-- Chart for Stagiaire Type Formation -->
        <a href="/export/stagiaire-type-formation" class="btn text-success  rounded-pill"><i class="fa-solid fa-file-export" ></i></a>
        <canvas id="typeFormationChart" width="400" height="200"></canvas>

        <!-- Chart for Stagiaire Services -->
        <canvas id="servicesChart" width="400" height="200"></canvas>

        <!-- Chart for Stagiaire Entite -->
        <canvas id="entiteChart" width="400" height="200"></canvas>

        <!-- Chart for Remunere and OP-etabli counts -->
        <div class="row">
            <div class="col-md-5">
                <canvas id="remunereChart" width="100" height="100"></canvas>
            </div>

            <!-- Pie Chart for OP-etabli -->
            <div class="col-md-5">
                <canvas id="opEtabliChart" width="100" height="100"></canvas>
            </div>
        </div>

    </div>

    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Chart for Stagiaire Type Formation
        var typeFormationChart = new Chart(document.getElementById('typeFormationChart'), {
            type: 'bar',
            data: {
                labels: <?php echo $sta_type_f->pluck('type_formation'); ?>,
                datasets: [{
                    label: 'Stagiaire par Type Formation',
                    data: <?php echo $sta_type_f->pluck('count'); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Chart for Stagiaire Services
        var servicesChart = new Chart(document.getElementById('servicesChart'), {
            type: 'bar',
            data: {
                labels: <?php echo $sta_ser->pluck('sigle_service'); ?>,
                datasets: [{
                    label: 'Stagiaire par Services',
                    data: <?php echo $sta_ser->pluck('count'); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });

        // Chart for Stagiaire Entite
        var entiteChart = new Chart(document.getElementById('entiteChart'), {
            type: 'bar',
            data: {
                labels: <?php echo $sta_ent->pluck('entite'); ?>,
                datasets: [{
                    label: 'Stagiaire par Entite ',
                    data: <?php echo $sta_ent->pluck('count'); ?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            }
        });

        var remunereChart = new Chart(document.getElementById('remunereChart'), {
        type: 'pie',
        data: {
            labels: ['Remunéré', 'Non Remunéré'],
            datasets: [{
                data: [<?php echo e($remunereCount); ?>, <?php echo e($notRemunereCount); ?>],
                backgroundColor: ['#36A21B','#FFCE56']
            }]
        }
    });

    // Create Pie chart for OP_etabli and Not OP_etabli
    var opEtabliChart = new Chart(document.getElementById('opEtabliChart'), {
        type: 'pie',
        data: {
            labels: ['OP établi', ' OP non établi'],
            datasets: [{
                data: [<?php echo e($opEtabliCount); ?>, <?php echo e($notOpEtabliCount); ?>],
                backgroundColor: ['#36A21B','#FFCE56']
            }]
        }
    });



    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/indicators/graph.blade.php ENDPATH**/ ?>