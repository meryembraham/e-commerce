<?php

/**
 * Verifie si le panier existe, le crée sinon
 * @return booleen
 */
function creationPanier(){
   if (!isset($_SESSION['cart'])){
      $_SESSION['cart']=array();
      $_SESSION['cart']['id_p'] = array();
      $_SESSION['cart']['qteProduit'] = array();
      $_SESSION['cart']['prixProduit'] = array();
      $_SESSION['cart']['verrou'] = false;
   }
   return true;
}


/**
 * Ajoute un article dans le cart
 * @param string $id_p
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticle($id_p,$qteProduit,$prixProduit){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($id_p,  $_SESSION['cart']['id_p']);

      if ($positionProduit !== false)
      {
         $_SESSION['cart']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['cart']['id_p'],$id_p);
         array_push( $_SESSION['cart']['qteProduit'],$qteProduit);
         array_push( $_SESSION['cart']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $id_p
 * @param $qteProduit
 * @return void
 */
function modifierQTeArticle($id_p,$qteProduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le cart
         $positionProduit = array_search($id_p,  $_SESSION['cart']['id_p']);

         if ($positionProduit !== false)
         {
            $_SESSION['cart']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($id_p);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du panier
 * @param $id_p
 * @return unknown_type
 */
function supprimerArticle($id_p){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['id_p'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['verrou'] = $_SESSION['cart']['verrou'];

      for($i = 0; $i < count($_SESSION['cart']['id_p']); $i++)
      {
         if ($_SESSION['cart']['id_p'][$i] !== $id_p)
         {
            array_push( $tmp['id_p'],$_SESSION['cart']['id_p'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['cart']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['cart']['prixProduit'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['cart'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Montant total du panier
 * @return int
 */
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['cart']['id_p']); $i++)
   {
      $total += $_SESSION['cart']['qteProduit'][$i] * $_SESSION['cart']['prixProduit'][$i];
   }
   return $total;
}


/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['cart']);
}

/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['cart']) && $_SESSION['cart']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['cart']))
   return count($_SESSION['cart']['id_p']);
   else
   return 0;

}

?>