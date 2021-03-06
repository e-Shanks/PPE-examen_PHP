<?php

$errorMsg = null;
$successMsg = null;

$oLignFHFs = CligneFHFs::GetInstance();

if(isset($_POST['btnFHF'])){
    if(isset($_POST["libelle"]) && isset($_POST["montant"])){
        try{
            $oLignFHFs->insertLigneFHF($_POST["libelle"], $_POST["montant"]);
        } catch (Exception $ex) {
            $errorMsg = "Erreur lors de l'insertion dans la base.".$ex->getMessage()." Prévenir l'administrateur.";
        }
    }
}

?>

<div class="container">
    <h3><p class="text-primary page-header">Saisie des frais hors forfait <span class="text-primary glyphicon glyphicon-pencil"></span></p></h3>
    <br>
    <form id="formFHF" class="form-horizontal" role="form" method="POST" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="libelle">Libellé :</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name="libelle" placeholder="Entrer  libellé frais" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="montant">Montant :</label>
            <div class="col-sm-10">
                <input class="form-control" name="montant" placeholder="Entrer montant frais" required="required" type="number" min="0" step="0.01">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btnFHF" class="btn btn-default">Enregistrer</button>
            </div>
        </div>
    </form>

    <br><br><br>
</div>
