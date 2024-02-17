<?php $__env->startSection('content'); ?>


<style>

    .top{
        position: absolute;
        top: 40px;
        margin-left: 450px;
    }
    .note{
        font-size: 15px;
        margin-top: 20px;
        margin-left: 20px;
    }

    .nomsta{
        font-size: 15px;
        margin-top: 05px;
        margin-left: 350px;
        font-family: sans-serif;
    }
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 75px;
    }
    span{
        font-size: 15px;
        padding-left: 60px;
        padding-top: 40px;
    }
    p{
        font-size: 15px;
        margin-left: 30px;
        margin-right: 30px;
        line-height: 15pt;
    }
    table{
        font-size: 15px;
        margin-left: 20px;
    }
    .tdleft{
        font-size: 15px;
        font-style: bold;
    }
    li{
        font-size: 15px;
        margin-left: 35px;
    }

</style>

<div class="top"> <?php echo e($stagiaire->site); ?>, le <?php echo e($today); ?></div>

<div class="note"> <small> <b> OIG/H/DH - ES n° <?php echo e(substr($stagiaire->code, -4)); ?> /<?php echo e(substr($stagiaire->site,0,1)); ?>/<?php echo e($year); ?> </b> </small> </div>
<div class="nomsta"><small> <b> <?php echo e($stagiaire->titre); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?> </b><br>  S/C de: <?php echo e($stagiaire->etab); ?> (<?php echo e($stagiaire->sigle_etab); ?>) <br> - <?php echo e($stagiaire->ville); ?> -</small> </div>
<table>
    <tr>
        <td> <b>Objet</b> </td>
        <td>: <?php echo e($stagiaire->type_stage); ?> </td>
    </tr>
    <tr>
        <td> <b>Réf</b> </td>
        <td>: Votre demande du <?php echo e($ddemande); ?>  </td>
    </tr>
</table>

<p><?php echo e($stagiaire->titre); ?>, <br>
<p><span>Suite à votre demande citée en référence,</span>nous avons l’honneur de vous faire part de notre accord pour un <?php echo e($stagiaire->type_stage); ?> au sein du Groupe OCP.</p>
<span>Nous vous donnons ci-après les indications relatives à l'organisation du stage :</span>
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
            Direction d'accueil
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
</table>

<p>Conditions générales        :  </p>

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
<p><span>Veuillez agréer, <?php echo e($stagiaire->titre); ?>, l'expression de nos sentiments distingués</span></p>
<p>NB : Le stage ne peut en aucun cas être prolongé au delà de la durée contractée</p>






        <style>
            .sign{
                text-align: left;
                margin-top: 15;
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

<?php echo $__env->make('layouts.doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views//stagiaires/convocation_n.blade.php ENDPATH**/ ?>