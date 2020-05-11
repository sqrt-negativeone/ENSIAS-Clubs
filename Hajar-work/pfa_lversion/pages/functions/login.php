<?php session_start() ?>
<?php 
    include '../../../../../pfa_db_connection/connexion.php';
    if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
        $sql="select * from etudiant 
              where email=?
              AND mpass=?";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$_POST['email'], $_POST['password']]);
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->rowCount()==1) {
          # code...

            $row= $stmt->fetch();
            $_SESSION['nom']=$row['nom'];
            $_SESSION['prenom']=$row['prenom'];
            $_SESSION['email']=$row['email'];
            $_SESSION['photo']=$row['photo'];
            $_SESSION['cne']=$row['cne'];
            header('Location:index-page.php');

        }else{
            //ONE OR BOTH THE CREDENTIALS IS FALSE
        }    
    }else{
        //USER HAS NOT SET THE EMAIL OR PASSWORD
    }       
     ?>