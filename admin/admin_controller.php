<?php 
require "admin_req.php";
//Vérifier si l'id passée en parametre existe
function checkId($id){
    $item = getItem($id);
    if(empty($item)){
       echo "Désolée cet item n'existe pas";
       die(); 
    }
    
}
// Fonction qui permet de vérifier que l'utilisateur a envoyé une image de < 1MO 
function uploadImage($file) {
    if (!isset($file['image']) || $file['image']['error'] !== UPLOAD_ERR_OK) {
        echo 'Erreur lors de l\'envoi du fichier';
        die();
    }
    
    $image = $file['image'];

    if ($image['size'] > 1000000) {
        echo 'Fichier trop grand';
        die();
    }
    
    $fileInfo = pathinfo($image['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];

    if (!in_array($extension, $allowedExtensions)) {
        echo 'Fichier avec mauvaise extension';
        die();
    }
    
    $destination = '../images/' . basename($image['name']);
    if (!move_uploaded_file($image['tmp_name'], $destination)) {
        echo 'Erreur lors de l\'enregistrement du fichier';
        die();
    }

    return basename($image['name']);
}
// Fonction qui vérifie si le champs en parametres existe et n'est pas vide puis enleve une entrée malveillante
function validateFormField($fieldName) {
    if (isset($fieldName) && !empty($fieldName)) {
        return htmlspecialchars($fieldName);
    } else {
        die("Erreur à $fieldName");
    }
}