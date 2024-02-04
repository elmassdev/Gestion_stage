<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
    table{
        margin-left: 30px;
    }
    .tdleft{
        font-style: bold;
    }
    .titre{
        text-align: center;
        font-style: bold
    }
    .sujet{
        margin-left: 30px;
    }
    h3{
        margin-left: 30px;
    }
</style>
<div class="note"> <small> <b> OIG/H/DH - ES n° <?php echo e(substr($stagiaire->code, -4)); ?> /<?php echo e(substr($stagiaire->site,0,1)); ?>/<?php echo e($year); ?> </b> </small> </div>

<h4 class="titre"> SUJET DE STAGE</h4>
<table>
    <tr>
        <td class="tdleft">Stagiaire</td>
        <td class="tdright">: <?php echo e($stagiaire->titre); ?> <?php echo e($stagiaire->prenom); ?> <?php echo e($stagiaire->nom); ?></td>
    </tr>
    <tr>
        <td class="tdleft">Spécialité</td>
        <td class="tdright">: <?php echo e($stagiaire->filiere); ?></td>
    </tr>
    <tr>
        <td class="tdleft">Etablissement</td>
        <td class="tdright">: <?php echo e($stagiaire->etab); ?> (<?php echo e($stagiaire->sigle_etab); ?>)</td>
    </tr>
    <tr>
        <td class="tdleft">Lieu de stage</td>
        <td class="tdright">: <?php echo e($stagiaire->lib); ?>(<?php echo e($stagiaire->sigle_service); ?>)</td>
    </tr>
    <tr>
        <td class="tdleft">Période de stage</td>
        <td class="tdright">: Du <?php echo e($date_debut); ?> au <?php echo e($date_fin); ?></td>
    </tr>
    <tr>
        <td class="tdleft">Parrain de stage</td>
        <td class="tdright">: <?php echo e($stagiaire->titreenc); ?> <?php echo e($stagiaire->prenomenc); ?> <?php echo e($stagiaire->nomenc); ?></td>
    </tr>
</table>

<h3> <b>Sujet:</b> </h3><br>
<div class="sujet"><?php echo e($stagiaire->sujet); ?></div>
<?php /**PATH D:\Share\main\Gestion_stage\resources\views//stagiaires/sujet.blade.php ENDPATH**/ ?>