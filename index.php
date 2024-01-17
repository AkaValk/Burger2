<?php

session_start();
if(!isset($_SESSION["user_id"])){
    $_SESSION["user_id"]= session_id();
}
else{
    $_SESSION["user_id"] = $_SESSION["user_id"];
}
// Récupérer les fonctions
require "items_req.php";
// Stocker les différentes catégories
$categories = getCategories();


?>

<!DOCTYPE html>
<html>

<head>
    <title>Burger Code</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container site">

        <div style="text-align:center; display:flex; justify-content:center; align-items:center" class="text-logo">
            <h1>Burger Doe</h1>
            <a href="panier.php" class="bi bi-basket3 cart-icon"> </a>
        </div>

        <nav>
            <ul class="nav nav-pills" role="tablist">
                <!-- On boucle sur le tableau qui contient les catégories pour les afficher dans la nav!-->
                <?php foreach ($categories as $category) { ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?=$category["id"] ==1?"active" :''?>" data-bs-toggle="pill" data-bs-target="#tab<?= $category["id"] ?>" role="tab"><?= $category["name"] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="tab-content">
        <?php foreach ($categories as $category) { ?>        
        <div class="tab-pane active" id="tab<?= $category["id"]?>" role="tabpanel">
            <div class="row">
                <?php
                $items = getItemsByCategory( $category["id"]);
                foreach ($items as $item) {
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="img-thumbnail">
                        <img src="images/<?=$item["image"]?>" class="img-fluid" alt="...">
                        <div class="price"><?= $item["price"]?></div>
                        <div class="caption">
                            <h4><?= $item["name"]?></h4>
                            <p><?= $item["description"]?></p>
                            <a href="ajout.php?item=<?=$item["id"]?>" class="btn btn-order" role="button"><span class="bi-cart-fill"></span> Commander</a>
                        </div>
                    </div>
                </div>
                <?php } ?>      
            </div>
          
        </div>
        <?php } ?>                    
    </div>
</body>

</html>
