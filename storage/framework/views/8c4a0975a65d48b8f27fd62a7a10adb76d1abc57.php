<?php $__env->startSection('content'); ?>


<style>

    .top{
        position: absolute;
        top: 40px;
        margin-left: 450px;
    }
    .note{
        font-size: 16px;
        margin-top: 20px;
        margin-left: 20px;
    }

    .nomsta{
        margin-top: 05px;
        margin-left: 350px;
        font-family: sans-serif;
        font-size: 1rem;
    }
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 80px;
    }
    span{
        padding-left: 60px;
        padding-top: 100px;
    }
    p{
        margin-left: 30px;
        margin-right: 30px;
        line-height: 15pt;
    }
    table{
        margin-left: 30px;
    }
    .tdleft{
        font-style: bold;
    }
    li{
        margin-left: 35px;
    }
</style>

<div class="top"> <?php echo e($stagiaire->site); ?>, le <?php echo e($today); ?></div>

<div class="note"> <small> <b> OIG/H/DH - ES n° <?php echo e(substr($stagiaire->code, -4)); ?> /<?php echo e(substr($stagiaire->site,0,1)); ?>/<?php echo e($year); ?> </b> </small> </div>
<div class="nomsta"> <b> <?php echo e($stagiaire->titre); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?> </b><br>S/C de: <?php echo e($stagiaire->etab); ?> (<?php echo e($stagiaire->sigle_etab); ?>) <br> - <?php echo e($stagiaire->ville); ?> - </div>

<p><?php echo e($stagiaire->titre); ?>, <br>
<p><span>Suite à votre demande, </span>nous avons l’honneur de vous faire part de notre accord pour l'organisation d'un <?php echo e($stagiaire->type_stage); ?> au sein du Groupe OCP.</p>

<table>
    <tr>
        <td class="tdleft">
            Année d'étude et spécialité
        </td>
        <td class="tdright">
            : <?php echo e($stagiaire->niveau); ?> - <?php echo e($stagiaire->diplome); ?> - <?php echo e($stagiaire->filiere); ?>

        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Période de stage
        </td>
        <td class="tdright">
            : Du <?php echo e($date_debut); ?> au <?php echo e($date_fin); ?>

        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Direction d' accueil :
        </td>
        <td class="tdright">
            : <?php echo e($stagiaire->direction); ?>

        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Entité d'accueil
        </td>
        <td class="tdright">
            : <?php echo e($stagiaire->lib); ?>(<?php echo e($stagiaire->sigle); ?>)
        </td>
    </tr>
    <tr>
        <td class="tdleft">
            Parrain de stage :
        </td>
        <td class="tdright">
            : <?php echo e($stagiaire->titreenc); ?> <?php echo e($stagiaire->prenomenc); ?> <?php echo e($stagiaire->nomenc); ?>

        </td>
    </tr>
</table>
<p>Conditions générales :</p>

<ul>
    <li>
        Hébergement et restauration : à la charge des stagiaires
    </li>
    <li>
        Assurance : Les stagiaires doivent être assurés par leurs soins ou leur
école contre les risques encourus durant leur séjour au sein
du Groupe OCP (accident de travail, de trajet, maladie,...)
    </li>
</ul>
<p><span>Veuillez agréer, <?php echo e($stagiaire->titre); ?>, l'expression de nos sentiments distingués.</span></p>
<p>NB : Le stage ne peut en aucun cas être prolongé au delà de la durée contractée</p>






        <style>
            .sign{
                text-align: left;
                margin-top: 40px;
                margin-left: 320px;
                line-height: 22pt;
            }
            .sujet{
                font-size: 10px;
            }
        </style>

        <div class="sign">  <p> <b>
            P. Le Président Directeur Général & p.o., <br>
            P. Le Responsable développement RH </b> </p>

        </div>



        <?php if($stagiaire->sujet!=''): ?>
        <div class="sujet"><small> <i>PJ: Sujet de stage </i>  </small></div>
       <?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views//stagiaires/convocation.blade.php ENDPATH**/ ?>