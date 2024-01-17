<?php 
session_start();
require "panier_req.php";
require "items_req.php";
$action = $_GET["action"]; 
$product_id = $_GET["productId"];
$item= getItem($id);
$qte = $item["qte"];
$prix = $item["price"];
$userTemp = $_SESSION["user_id"];

if( empty($action) || !isset($action) || !isset($product_id) || empty($product_id) || !isset($user_id) || empty($user_id) ){
    echo "Erreur qq part";
    die(); 
} 

if($action== "qteMoins"){
   qteMoins($id, $userTemp, $qte, $prix);    
}
else if($action== "qtePlus"){
    qtePlus($id, $userTemp, $qte, $prix);
}
// Id produit // Qté
// si action = qteMoins 
// qteMoins()

function qteMoins($id, $userTemp, $qte, $price){
    $qteDown = $qte-1; 
   $updatePrice = $price - $price;
   if($qteDown==0){
    deleteItem($id);
   }
   else{
    updatePanier($id, $userTemp,$qteDown, $updatePrice);
    header("Location: index.php");
   }
  
  
    //var = Get Item
    // var[qte]-1 
    // update Panier
    // Si nouvelle qté = 0 on supprime
}
function qtePlus($id, $userTemp, $qte, $price){
    $qteUp = $qte+1; 
    $updatePrice = $price * $qteUp;
    updatePanier($id, $userTemp,$qteUp, $updatePrice);
    header("Location: index.php");
}
