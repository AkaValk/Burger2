<?php 
require "connexion.php";
// Retourne le nom et l'id de toutes les catégories
function getCategories(){
    global $pdo;
    $query ="SELECT * from categories";
    $categories = $pdo -> prepare($query); 
    $categories->execute();
    return $categories->fetchAll(PDO::FETCH_ASSOC);
}
// Retourne les items qui correspondent à la catégorie
function getItemsByCategory($category){
    global $pdo;
    $query = "SELECT * FROM items WHERE category = :category";
    $items = $pdo -> prepare($query);
   $items->bindValue(":category", $category, PDO::PARAM_INT);
   $items->execute();
   return $items->fetchAll();
}
function getItem($id)
{
    global $pdo;
    $query = "SELECT * from items WHERE id=:id";
    $item = $pdo->prepare($query);
    $item->execute(["id" => $id]);
    return $item->fetch();
}