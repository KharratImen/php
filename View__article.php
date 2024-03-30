<!DOCTYPE HTML>
<html>

<head>
    <style>
        td {
            vertical-align: top;
        }

        h1 {
            text-align: center;
        }

        .st {
            color: blue;
        }

        .msgE {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    include 'Art.php';
    include 'fournisseur.php';


    //Les messages d'erreurs sont initialement vides
    $msgErreurRef = "";
    $msgErreurLib = "";
    $msgErreurPV = "";
    $msgErreurPrix = "";
    $msgErreurQte = "";
    $msgErreurFour = "";
    $submit = False;

    $ref = "";
    $libelle = "";
    $PV = array();
    $four = array();
    $prix = "";
    $qte = "";


    if (isset($_POST["ref"])) //si le formulaire a été soumis (l'utilisateur a cliqué sur "submit")
    {
        $submit = True;
        if (!empty($_POST["ref"]))
            $ref = $_POST["ref"];
        else {
            $msgErreurRef = "le champ reference est requis";
            $submit = False;
        }
        if (!empty($_POST["prix"]))
            $prix = $_POST["prix"];
        else {
            $msgErreurPrix = "le champ Prix est requis";
            $submit = False;
        }
        if (!empty($_POST["qte"]))
            $qte = $_POST["qte"];
        else {
            $msgErreurQte = "le champ Qte en stock est requis";
            $submit = False;
        }

        if (!empty($_POST["libelle"]))
            $libelle = $_POST["libelle"];
        else {
            $msgErreurLib = "le champ libelle est requis";
            $submit = False;
        }

        if (!empty($_POST["PV"]))
            $PV = $_POST["PV"];
        else {
            $msgErreurPV = "il faut choisir au moins un point de vente";
            $submit = False;
        }
        if (!empty($_POST["four"]))
            $four = $_POST["four"];
        else {
            $msgErreurFour = "il faut choisir au moins un fournisseur";
            $submit = False;
        }

    }


    /*L'attribut value définit la valeur qui sera envoyée côté serveur  */
    ?>

    <h1>Saisir un article</h1><br><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td><label for="ref">référence</label>:
                </td>
                <td><input name="ref" type="text" value="<?= $ref ?>" />
                    <span class="msgE">
                        <?= $msgErreurRef ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td><label for="libelle">libellé</label>: </td>
                <td><input name="libelle" type="text" value="<?= $libelle ?>" />
                    <span class="msgE">
                        <?= $msgErreurLib ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td><label for="prix">Prix</label>: </td>
                <td><input name="prix" type="text" value="<?= $prix ?>" />
                    <span class="msgE">
                        <?= $msgErreurPrix ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td><label for="qte">Qte en stock</label>: </td>
                <td><input name="qte" type="text" value="<?= $qte ?>" />
                    <span class="msgE">
                        <?= $msgErreurQte ?>
                    </span>
                </td>
            </tr>

            <tr>
                <td> <label for="four">Fournisseur</label>:</td>
                <td>
                    <select name="four[]" multiple>
                        <?php
                        echo $fournisseurr . "<br>";
                        echo $fournisseurr1 . "<br>";
                        echo $fournisseurr2 . "<br>";
                        echo $fournisseurr3 . "<br>";

                        ?>
                    </select>
                    <span class="msgE">
                        <?= $msgErreurFour ?>
                    </span>
                </td>
                </td>
            </tr>
            <tr>
                <td> <label for="PV">Point de vente</label></td>
                <td>
                    <input type="checkbox" name="PV[]" value="Sfax" <?php if (in_array("Sfax", $PV))
                        echo "checked"; ?>>Sfax
                    <br>
                    <input type="checkbox" name="PV[]" value="Gabes" <?php if (in_array("Gabes", $PV))
                        echo "checked"; ?>>Gabes
                    <br>
                    <input type="checkbox" name="PV[]" value="Tunis" <?php if (in_array("Tunis", $PV))
                        echo "checked"; ?>>Tunis
                    <br>
                    <input type="checkbox" name="PV[]" value="Sousse" <?php if (in_array("Sousse", $PV))
                        echo "checked"; ?>>Sousse
                    <span class="msgE">
                        <?= $msgErreurPV ?>
                    </span>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit">


    </form>

    <?php
    if ($submit) { ?>
        <h3> Informations de l'article</h3><br><br>
        <span class="st">Référence:</span>
        <?php echo $ref; ?><br>
        <span class="st">Libelle:</span>
        <?php echo $libelle; ?><br>
        <span class="st">Prix:</span>
        <?php echo $prix; ?><br>
        <span class="st">Quantité en stock:</span>
        <?php echo $qte; ?><br>
        <span class="st">Fournisseur:</span>
        <ul>
            <?php
            foreach ($four as $f)
                echo "<li> $f </li>";
            ?>
        </ul>

        <span class="st">Points de vente: </span>
        <ul>
            <?php
            foreach ($PV as $p)
                echo "<li> $p </li>";
            ?>
        </ul>
    <?php } ?>
</body>

</html>