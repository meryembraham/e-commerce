<?php
include "connexion.php";

if(isset($_POST['submit'])){
$nom 	= $_POST['nom'];
$prenom = $_POST['prenom'];
$tel 	= $_POST['tel'];
$email 	= $_POST['email'];
$pass 	= $_POST['pass'];


$query = "INSERT INTO `users`(`nom`, `prenom`, `email`, `motdepasse`, `tel`) VALUES 
('$nom ','$prenom','$email','$pass','$tel')";

$execution = mysqli_query($conn,$query);

session_start();
$_SESSION['auth2E']=true;

$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;


header('location:index.php');

}
?>