<?php
  include("template/header.php")
 ?>


            <form action="admin.php" method="post" class="my-4 ml-4">

            <p>
                <label for="firstname">Prénom :</label><br>
                <input id="firstname" type="text" name="firstname" placeholder="Ex: Boris" required>
            </p>
            
            <p>
                <label for="lastname">Nom :</label><br>
                <input id="lastname" type="text" name="lastname" placeholder="Ex: Dupont" required>
            </p>

            <p>
                <label for="email">Email :</label><br>
                <input id="email" type="email" name="email" required>
            </p>

            <p>
                <input type="submit" name="inscription_admin" value="Envoyer">
            </p>

            </form>


            <p class="ml-4"><?php echo $message ?></p>

 <?php
   include("template/footer.php")
  ?>