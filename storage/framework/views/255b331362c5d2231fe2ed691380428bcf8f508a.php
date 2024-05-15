<?php $__env->startSection('content'); ?>

<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 80px;
    }
    span{
        padding-left: 40px;
        padding-top: 100px;
    }
    p{
        margin-left: 30px;
        margin-right: 30px;
        line-height: 16pt;
    }
</style>


    <h4 class="Att_title"> ATTESTATION DE STAGE</h4>

    <p><span>Le Responsable Développement RH</span> de Gantour du Groupe OCP.sa certifie que
        <?php echo e($stagiaire->titre); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?> étudiant<?php echo e($stagiaire->genre); ?> <?php echo e($stagiaire->article); ?> <?php echo e($stagiaire->etab); ?> (<?php echo e($stagiaire->sigle_etab); ?>) de <?php echo e($stagiaire->ville); ?>, Spécialité: <?php echo e($stagiaire->filiere); ?>, a effectué avec assiduité un <?php echo e($stagiaire->type_stage); ?> :</p>

        <p>
        - <b>à la <?php echo e($stagiaire->direction); ?> </b> <br>
        - du <b> <?php echo $dd_long  ?> au <?php echo e($fin_long); ?> ( du <?php echo e($dd_short); ?> au <?php echo e($fin_short); ?>)   </b>  <br>   </p>
        <p>
            <span>La présente attestation est délivrée à l'intéressé<?php echo e($stagiaire->genre); ?> pour servir et
                valoir ce que de droit.</span>

        </p>

        <style>
            .sign{
                text-align: left;
                margin-left: 370px;
                line-height: 0.7;
            }
            .date{
                text-align: left;
                font-size: 15px;
                margin-top: 40px;
                margin-left: 370px;
            }
        </style>
        <p class="date">
            <?php echo e($stagiaire->site); ?>, le <?php echo e($today); ?> <br>
        </p>

        <div class="sign">

            P. Le Responsable Développement RH

        </div>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views//stagiaires/attestation_n.blade.php ENDPATH**/ ?>