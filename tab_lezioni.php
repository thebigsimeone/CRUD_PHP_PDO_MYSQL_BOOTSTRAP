<?php

include "dbconnection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Alunni-Lezione</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Lezioni</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allievi_tab.php">Alunni</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="professore_tab.php">Professori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lezioni_tab.php">Lezioni</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="row centered-form">
      <div class="col-lg-12 ">
        <div class="panel panel-default">

          <div class="panel-heading">
            <h3 class="panel-title">Lista delle lezioni per studente</h3> </div>
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Cognome</th>
                  <th>Lezione</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                      $sql = "SELECT allievi.nome, allievi.cognome, lezioni.lezione FROM allievi INNER JOIN lezioni ON allievi.idlezione=lezioni.id ORDER BY lezioni.lezione ASC";
                      $query= $dbconnection -> prepare($sql);
                      $query-> execute();
                      $results = $query -> fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query -> rowCount() > 0)
                      {
                      foreach($results as $result)
                      {
                      ?>
                  <tr>
                    <td><?php echo htmlentities($result->nome);?></td>
                    <td><?php echo htmlentities($result->cognome);?></td>
                    <td><?php echo htmlentities($result->lezione);?></td>
                  </tr>
                  <?php  $cnt=$cnt+1; } } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
  <style type="text/css">

  body {
    background-color: #fff;
  }
  
  .centered-form {
    margin-top: 60px;
  }
  
  .centered-form .panel {
    background: rgba(255, 255, 255, 0.8);
    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
  }
  </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


