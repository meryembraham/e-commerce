<?php
//2- connexion au serveur + base de donné
include "connexion.php";

//1 récupération des variables
$log 	= $_POST['email'];
$pass 	= $_POST['password'];




//3- préparation de la requête
$sql = "select * from users where (email='$log' or tel='$log') and motdepasse='$pass' and role='admin' ";
//echo $sql;

//4- exécution de la requête
$exec = mysqli_query($conn,$sql);

//5- vérification
$num = mysqli_num_rows($exec);
if($num == 1){
	session_start();
	$_SESSION['auth2']=true;
	
	$array = mysqli_fetch_array($exec);
	$nom 	= $array['nom'];
	$prenom = $array['prenom'];
	$id_u = $array['id_u'];
	$_SESSION['id_u'] = $id_u;
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;

	header("location:index.php");
	echo "bienvenu sur votre espace admin $nom $prenom";
}else{
	header("location:sign-in.php?error=1");
	echo "merci de vérifier vos accès";
}

?>