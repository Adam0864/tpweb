<?php include("liste.php"); ?>

<form method="post" action="modifierBD.php">
    <ul>
        <li>
            <label for="prix">Prix unitaire&nbsp;:</label>
            <input type="number" id="prix" name="prix" />
        </li>
        <li>
            <label for="quantite">Quantite&nbsp;:</label>
            <input type="number" id="quantite" name="quantité" />
        </li>
        <button type="button" name="ok">Modifier</button>
    </ul>
</form>