<?php
  //pour récupérer les informations dans le formulaire login dans login.html
  $email = $_POST['email'];
  $motDePasse = $_POST['password'];
  //hashage
  $motDePasse = hash('sha3-512', $motDePasse);

  //connexion à la bd
   $con = new mysqli("localhost","root","","webshop");
   if($con->connect_error){
       die("failed to connect : ".$con->connect_error);
   }else{
       $stmt = $con->prepare("select * from log_in where email=?");
       $stmt->bind_param("s", $email);
       $stmt->execute();
       $stmt_result = $stmt->get_result();
       if($stmt_result->num_rows > 0){
           $data = $stmt_result->fetch_assoc();
           //afin de rediriger l'utilisateur sur la page ESPACE MEMBRE
           if($data['motDePasse'] === $motDePasse && $data['type'] === 'C'){
             header("Location: index.html");
             die();
           }
           //afin de rediriger l'utilisateur sur la page ADMIN
           if($data['motDePasse'] === $motDePasse && $data['type'] === 'A'){
            header("Location: admin.html");
            die();
           }
            else{
            echo "<h2>EMAIL/MOT DE PASSE INVALIDE</h2>";
           }
       }else{
              echo "<h2>EMAIL/MOT DE PASSE INVALIDE</h2>";
              echo $motDePasse;
       } 
}
?>
