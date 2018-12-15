<?php
  include("template/header.php")
 ?>

<a href="index.php" class="btn btn-primary mt-4 ml-4">Retour acceuil</a>

<div class="col-12 mx-auto mt-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">firstname</th>
              <th scope="col">lastname</th>
              <th scope="col">birthdate</th>
              <th scope="col">email</th>
              <th scope="col">gender</th>
              <th scope="col">country</th>
              <th scope="col">profession</th>
              <th scope="col">add</th>
              <th scope="col">delete</th>
              <th scope="col">update</th>

            </tr>
          </thead>
          <tbody id="usersInfos">
          <?php

            foreach ($usersByCountry as $userByCountry)
            {
            ?>

            <tr>
                <td><?php echo $userByCountry->getFirstname(); ?></td>
                <td><?php echo $userByCountry->getLastname(); ?></td>
                <td><?php echo $userByCountry->getBirthdate(); ?></td>
                <td><?php echo $userByCountry->getEmail(); ?></td>
                <td><?php echo $userByCountry->getGender(); ?></td>
                <td><?php echo $userByCountry->getCountry(); ?></td>
                <td><?php echo $userByCountry->getProfession(); ?></td> 
                <td>
                  <form class="add" action="adminBackAdd.php" method="post">
				 		      <input type="submit" name="add" value="Add">
			 		        </form>
                </td>
                <td>
                  <form class="delete" action="adminBack.php" method="post">
				 		      <input type="hidden" name="id" value="<?php echo $userByCountry->getId(); ?>"  required>
				 		      <input type="submit" name="delete" value="Delete">
			 		        </form>
                </td>
                <td>
                  <form class="update" action="adminBackUpdate.php" method="post">
				 		      <input type="hidden" name="id" value="<?php echo $userByCountry->getId(); ?>"  required>
				 		      <input type="submit" name="update" value="Update">
			 		        </form>
                </td>

            </tr>


            <?php
            }
            ?>
          </tbody>

        </table>



</div>

<?php
   include("template/footer.php")
?>