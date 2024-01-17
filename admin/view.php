<?php 
require "admin_controller.php";

checkId($_GET["id"]);
$item = getItem($_GET["id"]);

?>
<!DOCTYPE html>
<html>
    <head>
      <title>Burger Code</title>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
      <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="../styles.css">
    </head>
    
    <body>
      <h1 class="text-logo"><span class="bi-shop"></span> Burger Code <span class="bi-shop"></span></h1>
      <div class="container admin">
        <div class="row">
          <div class="col-md-6">
            <h1><strong>Voir un item</strong></h1>
            <br>
            <form>
              <div>
                <label>Nom:<?= $item["name"]?></label>
              </div>
              <br>
              <div>
                <label>Description: <?= $item["description"]?></label>
              </div>
              <br>
              <div>
                <label>Prix: <?= $item["price"]?></label>
              </div>
              <br>
              <div>
                <label>Catégorie: <?= $item["category"]?></label>
              </div>
              <br>
              <div>
                <label>Image:</label>
              </div>
            </form>
            <br>
            <div class="form-actions">
              <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
            </div>
          </div>
          <div class="col-md-6 site">
            <div class="img-thumbnail">
              <img src="../images/<?= $item["image"]?>" alt="<?= $item["name"]?>">
              <div class="price"> <?= $item["price"]?></div>
              <div class="caption">
                <h4><?= $item["name"]?></h4>
                <p><?= $item["description"]?></p>
                
              </div>
            </div>
          </div>
        </div>
      </div>   
    </body>
</html>

