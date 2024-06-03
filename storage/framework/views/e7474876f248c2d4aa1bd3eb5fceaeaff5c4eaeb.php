<?php $__env->startSection('content'); ?>

<style>

    .Att_title{
        text-align: center;
        padding-bottom: 20px;
        margin-top: 80px;
    }
    span{
        padding-left: 60px;
        padding-top: 100px;
    }
    p{
        margin-left: 30px;
        margin-right: 30px;
        line-height: 16pt;
    }
    .sign{
        text-align: left;
        margin-left: 340px;
        line-height: 0.9;

    }
    .date{
        text-align: left;
        margin-top: 70px;
        margin-left: 340px;
    }
</style>
<?php
    \Carbon\Carbon::setLocale('fr');
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
?>

    <h4 class="Att_title"> ATTESTATION DE STAGE</h4>

        <p> <span><?php echo e($stagiaire->titre); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?>, </span> étudiant<?php echo e($stagiaire->genre); ?> <?php echo e($stagiaire->article); ?> <?php echo e($stagiaire->etab); ?> (<?php echo e($stagiaire->sigle_etab); ?>) de <?php echo e($stagiaire->ville); ?>,
        Specialité: <?php echo e($stagiaire->filiere); ?> a effectué un <?php echo e($stagiaire->type_stage); ?> au sein de la <?php echo e($stagiaire->direction); ?> et ce pendant la période du <?php echo $dd_long  ?> au <?php echo e($fin_long); ?> ( du <?php echo e($dd_short); ?> au <?php echo e($fin_short); ?>)     <br>   </p>
        <p>
            <span>Faite</span> à la demande de l'intéressé<?php echo e($stagiaire->genre); ?> pour servir et valoir ce que de droit.

        </p>


<p class="date"><?php echo e($stagiaire->site); ?>, le <?php echo e($today); ?> <br></p>
        <p class="sign">
            P. Le président Directeur Générale et p.o. <br>
            P. Le Responsable Développement RH
        </p>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views//stagiaires/attestation.blade.php ENDPATH**/ ?>