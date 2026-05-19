<?php
function getCatalogue() : array {

    // Connection a la base de données 
    require_once __DIR__ . "/../db/connexion.php" ;
    $connexion = getConnexion() ;

    // Execution réelle de la requete 
    $requeteSQL = "SELECT * FROM catalogue" ;
    $requete = $connexion -> prepare($requeteSQL) ; // requete est le ticket cf cours 
    $requete ->execute() ;

    // Récupération des enregistrements 
    $requete ->setFetchMode(PDO::FETCH_ASSOC) ;
    // Pour récuperer un tableau
    $catalogue = $requete->fetchAll() ;
    return $catalogue ;
}
?>