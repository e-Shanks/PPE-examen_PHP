<?php

require_once './mesClasses/CligneFHF.php';

$oLigneFHFs = CligneFHFs::GetInstance();

$oCurrentVisiteur = unserialize($_SESSION['visitauth']);
$mois = getAnneeMois();

?>

<div class="container">
    <h4><p class="text-primary">Récapitulatif des frais hors forfait du mois :<?=' '.moisEnFrancais(date('F')).' ('.count($oLigneFHFs->GetLigneFHFByIdVisitMois($oCurrentVisiteur->Id, $mois))." lignes) " ;?><span class="glyphicon glyphicon-align-justify"></span></p></h4>
    <table class="table table-hover">
        <thead>
            <tr class="bg-info">
                <th>Libellé</th>
                <th>Montant</th>
                <th>Action</th> <!-- supprimer ligne -->
            </tr>
        </thead>
        <tbody>
            <?php
            $ocollLigneFHFsByVisiteur = $oLigneFHFs->GetLigneFHFByIdVisitMois($oCurrentVisiteur->Id, $mois);
            if(count($ocollLigneFHFsByVisiteur) > 0){
                foreach($ocollLigneFHFsByVisiteur as $LigneFHF){
                    ?>
                    <tr>
                        <td><?=$LigneFHF->Libelle?></td>
                        <td <?=($LigneFHF->Montant >= 100)?"class='text-danger'":"";?>><?=$LigneFHF->Montant?></td>
                        <td><a href="saisirFicheFrais.php?idLFHF=<?=$LigneFHF->Id?>" class="btn btn-danger" id="btnSuppLigneFHF" role="button">Supprimer</a></td>
                    </tr>
                <?php }
            }
            else{
                if(!isset($errorMsg)){ //sinon d'autre message prioritaire
                    $errorMsg = "Pas de frais hors forfait enregistrés.";
                }
            }
            ?>
        </tbody>
    </table>
</div>