<?php 

require "connexion.php";

// Fonction qui permet d'ajouter un item au panier
function ajouterProduitAuPanier($id_item, $qte,$prix, $userTemp) {
    global $pdo;
    $query = 'INSERT INTO panier(id_item, qte, prix , userTemp) VALUES (:id_item, :qte , :prix, :userTemp)';
    $req = $pdo->prepare($query);
    $req->bindValue(':id_item', $id_item, PDO::PARAM_INT);
    $req->bindValue(':qte', $qte, PDO::PARAM_INT);
    $req->bindValue(':prix', $prix, PDO::PARAM_INT);
    $req->bindValue(':userTemp', $userTemp, PDO::PARAM_INT);
    $req->execute();
  
}
function checkItem($id_item, $id_user){
    global $pdo;
    $query = "SELECT * FROM panier WHERE id_item = :id_item AND userTemp = :userTemp";
    $item = $pdo->prepare($query);
    $item->bindValue(':id_item', $id_item, PDO::PARAM_INT);
    $item->bindValue(':userTemp', $id_user, PDO::PARAM_INT);
    $item->execute(); 
    return $item->fetch();
}    

function updatePanier($id_item, $id_user,$qte, $prix)
{
    global $pdo;
    $requete = "UPDATE panier SET qte = :qte, prix = :prix WHERE id_item = :id_item AND userTemp = :userTemp";
    $item = $pdo ->prepare($requete);
    $item->bindValue(':qte', $qte, PDO::PARAM_INT);
    $item->bindValue(':prix', $prix, PDO::PARAM_INT);
    $item->bindValue(':id_item', $id_item, PDO::PARAM_INT);
    $item->bindValue(':userTemp', $id_user, PDO::PARAM_INT);
    $item->execute();
}
function getItemsFromPanier($id_user){
    global $pdo;
    $query = "SELECT * from panier INNER JOIN items ON panier.id_item = item.id WHERE userTemp=:userTemp";
    $items = $pdo->prepare($query);
    $items->bindValue(':userTemp', $id_user, PDO::PARAM_INT);
    $items->execute();

    return $items->fetchAll(PDO::FETCH_ASSOC);
}
function deleteItem($id)
{
    global $pdo;
    $query = "DELETE from panier WHERE id=:id";
    $items = $pdo->prepare($query);
    $items->bindValue(':id', $id, PDO::PARAM_INT);
    $items->execute();
}