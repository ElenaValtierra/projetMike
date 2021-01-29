<?php
class Modele{

    private $dbh;
    
    function __construct(){

        try {
            $this->dbh = new PDO("mysql:dbname=mydb;host=localhost", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            // foreach($this->dbh->query("SELECT `NA`, `nom`, `prenom`, `email`, `password`, `adr`, `tel` FROM `adherents` WHERE email = '$email'") as $row) {
            //     print_r($row);
            // }


            
        } catch (PDOException $e) {
            echo 'Échec de la connexion database ';
            exit;
        }
    }

    function inserUser($nom, $prenom,  $email,  $mp,  $sexe,  $role){

        $sql = " INSERT INTO `user`(`nom`, `prenom`, `email`, `mp`, `sexe`, `role`) VALUES (?, ?, ?, ?, ?)";


//pour sexe et role il faut verifier si c'est en string
        $request = $this->dbh->prepare($sql);
        $request->bindParam(1, $nom, PDO::PARAM_STR); 
        $request->bindParam(2, $prenom, PDO::PARAM_STR); 
        $request->bindParam(3, $email, PDO::PARAM_STR); 
        $request->bindParam(4, $mp, PDO::PARAM_STR); 
        $request->bindParam(5, $sexe, PDO::PARAM_STR); 
        $request->bindParam(6, $role, PDO::PARAM_STR);
        
        $request->execute();

// Verifier insert????

$count = $request->rowCount();
if($count > 0);

echo "Vous êtes bien inscrit"
    }
?>