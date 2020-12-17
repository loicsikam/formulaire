<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$servername;dbname=enregistrement", $username, $password);
try {
   
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql = "CREATE DATABASE myDBPDO";
    // use exec() because no results are returned
    //$conn->exec($sql);
    echo "Database created successfully<br>";
    $requete=$conn->prepare(
        "INSERT INTO formulaire(Nom,Prenom,Numero,Filiere,Activites)
         VALUES(:nom,:prenom,:telephone,:filiere,:activites) "
    );
    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':prenom',$prenom);
    $requete->bindParam(':telephone',$telephone);
    $requete->bindParam(':filiere',$filiere);
    $requete->bindParam(':activites',$activites);
   
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $telephone=$_POST["telephone"];
    $filiere=$_POST["filiere"];
    $activites=$_POST["activites"];
    $requete->execute();
    }
catch(PDOException $e)
    {
    echo 'Echec de la connexion' . "<br>" . $e->getMessage();
    }

$conn = null;
?> 