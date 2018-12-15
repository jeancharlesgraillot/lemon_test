<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Lemon Test</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/normalize.css">
  <link rel="stylesheet" href="../../assets/css/main.css">
</head>

<body>

<header class="d-flex align-items-center bg-light border-bottom border-secondary">
  <div class="container-fluid my-3">
    <div class="logonavbar row">
      <div class="logo col-3 col-lg-3">
        <a href="index.php" class="text-decoration-none">
          <h1 class="h5 blackText">Lemon test</h1>
        </a>
      </div>
      <div class="col-6 d-flex flex-column flex-md-row">
        <div class="memberSpace text-center my-1 mx-1 ">
            <form action="inscription.php" method="post">
              <input type="submit" name="inscription" value="Inscription" class="btn btn-primary">
            </form>
        </div>
        <div class="memberSpace text-center my-1 mx-1 ">
            <form action="connexion.php" method="post">
              <input type="submit" name="connexion" value="Connexion" class="btn btn-primary">
            </form>
        </div>
        <div class="memberSpace text-center my-1 mx-1 ">
            <form action="deconnexion.php" method="post">
              <input type="submit" name="deconnexion" value="Deconnexion" class="btn btn-primary">
            </form>
        </div>
      </div>
      <div class="col-3 displayPseudo text-center my-auto">
        <p>
            <?php
            if (isset($_SESSION['firstname']))
            {
                echo 'Bonjour ' . $_SESSION['firstname'] . ', ' . $query['country'];
            }
            ?>
        </p>
      </div>

    </div>
  </div>
</header>
