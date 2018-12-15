<?php
  include("template/header.php")
 ?>

    <a href="adminBack.php" class="btn btn-primary mt-4 ml-4">Retour backoffice</a>

	<form action="adminBackAdd.php" method="post" class="my-4 ml-4">

    <p>
        <label for="firstname">Prénom :</label><br>
        <input id="firstname" type="text" name="firstname" placeholder="Ex: Boris" required>
    </p>
    <p>
        <label for="lastname">Nom :</label><br>
        <input id="lastname" type="text" name="lastname" placeholder="Ex: Dupont" required>
    </p>
    <p>
        <label for="birthdate">Date de naissance :</label><br>
        <input id="birthdate" type="date" name="birthdate" required>
    </p>
    <p>
        <label for="email">Email :</label><br>
        <input id="email" type="email" name="email" required>
    </p>
    <p>
        <label for="gender">Genre :</label><br>

        <input type="radio" name="gender" value="homme" id="homme" /> <label for="homme">Homme</label>
        <input type="radio" name="gender" value="femme" id="femme" /> <label for="femme">Femme</label>
    </p>
    <p>
        <label for="country">Pays :</label><br>
        <input type="text" name="country" id="country" required>
    </p>
    <p>
        <label for="profession">Profession :</label><br>
        <select name="profession" id="profession" required>
           <option value="cadre">Cadre</option>
           <option value="employé de la fonction publique">Employé de la fonction publique</option>
           <option value="agriculteur">Agriculteur</option>
           <option value="artisan">Artisan</option>
           <option value="ouvrier">Ouvrier</option>
       </select><br>
    </p>
    <p>
        <input type="submit" name="add" value="Envoyer">
    </p>

	</form>

    <p class="ml-4"><?php echo $message ?></p>

 <?php
   include("template/footer.php")
  ?>