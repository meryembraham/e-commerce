<?php
include "connexion.php";
//1 récupération des variables

if(isset($_POST['submit'])){
$log 	= $_POST['email'];
$pass 	= $_POST['password'];

//2- connexion au serveur + base de donné
$conn = mysqli_connect('localhost','root','','e-commerce');

//3- préparation de la requête
$sql = "SELECT * FROM `users` WHERE (email='$log' or tel='$log') and motdepasse='$pass' ";
echo $sql;

//4- exécution de la requête
$exec = mysqli_query($conn,$sql);

//5- vérification
$num = mysqli_num_rows($exec);
if($num == 1){
	session_start();
	$_SESSION['auth2E']=true;
	
	$array = mysqli_fetch_array($exec);
	$nom 	= $array['nom'];
	$prenom = $array['prenom'];
	$id_u = $array['id_u'];
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
    $_SESSION['id_u'] = $id_u;
	header("location:index.php");
	echo "bienvenu sur votre espace  $nom $prenom";
}else{
	header("location:sign-in.php?error=1");
	echo "merci de vérifier vos accès";
}
}
?>