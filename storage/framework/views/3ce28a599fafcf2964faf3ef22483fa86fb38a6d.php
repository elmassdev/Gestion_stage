<?php $__env->startSection('content'); ?>


<style>

p, span, table, ul, li, .top, .first, .last, .top,.note,.nomsta,.Att_title{
    font-family: 'poppins', sans-serif;
    line-height: 0.9;
}

    .top{
        font-size: 14px;
        position: absolute;
        top: 40px;
        margin-left: 450px;
    }
    .note{
        font-size: 14px;
        margin-top: 20px;
        margin-left: 20px;
    }

    .nomsta{
        font-size: 14px;
        line-height: 0.8;
        margin-top: 05px;
        margin-left: 350px;
    }
    .Att_title{
        text-align: center;
        padding-bottom: 70px;
        margin-top: 75px;
    }
    span{
        font-size: 14px;
        padding-left: 60px;
        padding-top: 40px;
    }
    p{
        font-size: 14px;
        margin-left: 30px;
        margin-right: 30px;
        line-height: 15pt;
    }
    table{
        font-size: 14px;
        margin-left: 20px;
    }
    .tdleft{
        font-size: 14px;
    }
    li{
        font-size: 14px;
        margin-left: 35px;
    }
    .first{
        line-height: 0.7;
    }
    .last{
        line-height: 0.7;
    }
    ul{
        margin-top: 0;
        font-size: 14px;
    }

</style>


<div class="top">
    <?php if(isset($dateLO) && !empty($dateLO)): ?>
    <?php echo e($stagiaire->site); ?>, le <?php echo e($dateLO); ?>

    <?php else: ?>
    <?php echo e($stagiaire->site); ?>, le <?php echo e($dateToShow); ?>

    <?php endif; ?>
</div>







<div class="note"> <small>  OIG/H/DH - ES n° <?php echo e(substr($stagiaire->code, -4)); ?> /<?php echo e(substr($stagiaire->site,0,1)); ?>/<?php echo e($year); ?>  </small> </div>
<div class="nomsta"><small> <b> <?php echo e($stagiaire->titre); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?></b> <br>  S/C de: <?php echo e($stagiaire->etab); ?> (<?php echo e($stagiaire->sigle_etab); ?>) <br> - <?php echo e($stagiaire->ville); ?> -</small> </div>
<table>
    <tr>
        <td> Objet </td>
        <td>: <?php echo e($stagiaire->type_stage); ?> </td>
    </tr>
    <tr>
        <td> Réf </td>
        <td>: Votre demande du <?php echo e($ddemande); ?>  </td>
    </tr>
</table>

<p><?php echo e($stagiaire->titre); ?>, <br>
<p class="first"><span>Suite à votre demande citée en référence,</span>nous avons l’honneur de vous faire part de notre accord pour un <?php echo e($stagiaire->type_stage); ?> au sein du Groupe OCP.</p>
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
<p class="last"><span>Veuillez agréer, <?php echo e($stagiaire->titre); ?>, l'expression de nos sentiments distingués</span></p>
<p class="nb">NB : Le stage ne peut en aucun cas être prolongé au-delà de la durée contractée</p>






        <style>
            .nb{
                margin-top: 0.5;
                font-size: 11px;
            }
            .sign{
                text-align: left;
                margin-left: 370px;
                margin-top: 30px;
                font-size: 15px;
                font-family: 'poppins', sans-serif;
                line-height: 0.8;
                /* font-style: bold; */
            }
            .sujet{
                font-size: 10px;
            }
        </style>

<div class="sign">
    P. Le Président Directeur Général & p.o., <br>
    P. Le Responsable Développement RH

</div>



        <?php if($stagiaire->sujet!=''): ?>
        <div class="sujet"><small> <i>PJ: Sujet de stage </i>  </small></div>
       <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views//stagiaires/convocation_n.blade.php ENDPATH**/ ?>