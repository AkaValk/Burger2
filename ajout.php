<?php 
session_start();
var_dump($_SESSION);

require "panier_req.php";
require "items_req.php";
$id= $_GET["item"]; 
$item= getItem($id);
$qte = 1;
$prix = $item["price"];
$userTemp = $_SESSION["user_id"];



$itemPanier = checkItem($id, $userTemp);
if(empty($itemPanier)){
    // Si le produit n'existe pas dans la table panier
    ajouterProduitAuPanier($id, $qte,$prix, $userTemp);
    header("Location: index.php");
}
else{
    // S'il existe on le met à jour
   $qteUp = $itemPanier["qte"]+1; 
   $updatePrice = $itemPanier["prix"] * $qteUp;
   updatePanier($id, $userTemp,$qteUp, $updatePrice);
   header("Location: index.php");
}
