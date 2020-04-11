

<?php 
    session_start();
    include '../Project_code/connexion.php';
    if (isset($_POST['submit_in']) && isset($_POST['cne']) && isset($_POST['mp'])) {
        $sql="select * from etudiant 
              where (cne=? OR code_apoge=?) 
              AND mpass=?";
        $s="select * from etudiant";      
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$_POST['cne'], $_POST['cne'], $_POST['mp']]);
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($stmt->rowCount()==1) {
          # code...

           $row= $stmt->fetch();
            $_SESSION['nom']=$row['nom'];
            $_SESSION['prenom']=$row['prenom'];
            //$_SESSION['statut']=$row['statut'];
            $_SESSION['photo']=$row['photo'];
            $_SESSION['filiere']=$row['filiere'];
                  header('Location:../Project_code/interfaceEtudiant.php');

//REDIRECTION VERS INTERFACE APPROPRIE
             if ($row['statut']=='E') {
                 // header('Location:interfaceEtudiant.php');
            }elseif ($row['statut']=='PA') {
              # code...
            }elseif ($row['statut']=='PC') {
              # code...
            }elseif ($row['statut']=='RC') {
              # code...
                  header('Location:../Project_code/interfaceEtudiant.php');
            }elseif ($row['statut']=='MC') {
              # code...
            }
        }
        /*while ($row=$stmt->fetch()){
          if (($row['cne']==$_POST['cne'] || $row['code_apoge']==$_POST['cne']) && $row['mpass']==$_POST['mp'] ) {
            $_SESSION['nom']=$row['nom'];
            $_SESSION['prenom']=$row['prenom'];
            $_SESSION['statut']=$row['statut'];
            $_SESSION['photo']=$row['photo'];
            $_SESSION['filiere']=$row['filiere'];

//REDIRECTION VERS INTERFACE APPROPRIE
             if ($row['statut']=='E') {
                 // header('Location:interfaceEtudiant.php');
            }elseif ($row['statut']=='PA') {
              # code...
            }elseif ($row['statut']=='PC') {
              # code...
            }elseif ($row['statut']=='RC') {
              # code...
                  echo "Name : ".$row['nom'];
                  header('Location:interfaceEtudiant.php');
            }elseif ($row['statut']=='MC') {
              # code...
            }


            break;
          }
        }*/
       
            
      }
      elseif (isset($_POST['submit_up']) && isset($_POST['cne'])
      && isset($_POST['pw1']) && isset($_POST['email'])) {
        $search_stud="select * from etudiant where cne=? or code_apoge=?";
        $stmt_search=$pdo->prepare($search_stud);
        $stmt_search->execute(array(0 => $_POST['cne'], $_POST['cne']));

        if ($stmt_search->rowCount()==1) {
          $stmt_search->setFetchMode(PDO::FETCH_ASSOC);
          $row=$stmt_search->fetch();

          if ($row['mpass']=="") {
            //WELCOME
            //STUDENTS ARE ALREADY INSERTED TO AVOID WRONG CNE !!
            $update_stud="update etudiant set mpass=? , email=? where cne=?";
            $stmt_update=$pdo->prepare($update_stud);
            $stmt_update->execute(array(0 => $_POST['pw1'], 1 =>  $_POST['email'], 2 => $_POST['cne']));
          }else {
            //ALREADY A MEMBER
            $_GET['member']="member";
            
          }


        }else {
          //STUDENT NOT FOUND
        }

      }
 ?>