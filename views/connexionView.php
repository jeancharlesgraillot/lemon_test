<?php
  include("template/header.php")
 ?>

    <a href="index.php" class="btn btn-primary mt-4 ml-4">Retour acceuil</a>

	<form action="connexion.php" method="post" class="my-4 ml-4">

    <p>
        <label for="firstname">Prénom :</label><br>
        <input id="firstname" type="text" name="firstname" placeholder="Ex: Boris" required>
    </p>
    <p>
        <label for="lastname">Nom :</label><br>
        <input id="lastname" type="text" name="lastname" placeholder="Ex: Dupont" required>
    </p>
    <p>
        <input type="submit" name="connexion" value="Envoyer">
    </p>

	</form>

    <p class="ml-4"><?php echo $message ?></p>

 <?php
   include("template/footer.php")
  ?>