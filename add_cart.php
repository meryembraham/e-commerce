<?php 
session_start();
 include_once("fonction_panier.php");
$conn = mysqli_connect('localhost','root','','e-commerce');
$id = $_GET["id"];
$sql= "SELECT * FROM `produit` WHERE id_p=$id";
$query = mysqli_query($conn,$sql);
$num = mysqli_num_rows($query);

	while($array = mysqli_fetch_array($query)){
	$libelle 	    = $array['libelle_p'];
	$prix           = $array['prix'];
	$id_p 	    = $array['id_p'];
	$sql_img = "SELECT * FROM `img_produits` WHERE id_p=$id_p  ";

$query_img = mysqli_query($conn,$sql_img);
 
 

$array_img = mysqli_fetch_array($query_img);
    $id_img 	    = $array_img['id_img'];
	$libelle_img    = $array_img['libelle_img'];
 

    }
 ajouterArticle($id_p,1,$prix);
 header("location:cart.php");

 ?>