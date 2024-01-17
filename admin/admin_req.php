<?php
include "../connexion.php";

// Récupérer tout les items avec les noms des catégories
function getAllItems()
{
    global $pdo;
    $query = "SELECT i.id as produit_id , i.name AS nom_produit, i.description, i.price , c.name as nom_categorie FROM items i
    INNER JOIN categories c ON i.category = c.id
    ";
    $items = $pdo->prepare($query);
    $items->execute();

    return $items->fetchAll(PDO::FETCH_ASSOC);
}
// Fonction qui supprime un item de la bdd
function deleteItem($id)
{
    global $pdo;
    $query = "DELETE from items WHERE id=:id";
    $items = $pdo->prepare($query);
    $items->bindValue(':id', $id, PDO::PARAM_INT);
    $items->execute();
}
// Fonction qui récupère un item grace a son id
function getItem($id)
{
    global $pdo;
    $query = "SELECT * from items WHERE id=:id";
    $item = $pdo->prepare($query);
    $item->execute(["id" => $id]);
    return $item->fetch();
}
// Fonction qui crée un item dans la bdd
function createItem($name, $description, $price, $category, $image)
{
    global $pdo;
    $query = 'INSERT INTO items(name, description, price , image, category) VALUES (:name, :description , :price, :image, :category)';
    $req = $pdo->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':price', $price, PDO::PARAM_INT);
    $req->bindValue(':category', $category, PDO::PARAM_STR);
    $req->bindValue(':image', $image, PDO::PARAM_STR);
    $req->execute();
}
// Fonction qui met à jour un item de la bdd 
function majItem($id, $name, $description, $price, $category, $image)
{
    global $pdo;
    $requete = "UPDATE items SET name = :name, description = :description, price = :price , category = :category, image = :image WHERE id = :id";
    $item = $pdo ->prepare($requete);
    $item->bindValue(':id', $id, PDO::PARAM_INT);
    $item->bindValue(':name', $name, PDO::PARAM_STR);
    $item->bindValue(':description', $description, PDO::PARAM_STR);
    $item->bindValue(':price', $price, PDO::PARAM_INT);
    $item->bindValue(':category', $category, PDO::PARAM_STR);
    $item->bindValue(':image', $image, PDO::PARAM_STR);
    $item->execute();
}
