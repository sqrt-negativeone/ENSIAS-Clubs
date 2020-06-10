<?php 
	session_start();
	require_once '../../../../../pfa_db_connection/connexion.php'; 
	//$pdo->quote => empêcher les injections SQL
	//REGISTER 
	if (isset($_POST['register'])) {
		$_SESSION['context']='Création de compte';
		//CHECK IF ENSIAS STUDENT (SUPPOSE THE ADMINISTRATION PROVIDED US WITH THE NECESSARY INFO ABOUT STUDENTS AND THEY ARE ALREADY STORED IN DATABASE -> emaail not provided)
		$check_ensias="select * from etudiant natural join choix_filiere where (cne=? or code_apoge=?) and upper(nom)=? and upper(prenom)=? and id_filiere=? and annee_etude=? order by date_f desc limit 1";
		$stmt_check=$pdo->prepare($check_ensias);
		$stmt_check->execute([$_POST['code'], $_POST['code'], strtoupper($_POST['last_name']), strtoupper($_POST['first_name']), $_POST['fil'], $_POST['annee']]);

		$stmt_check->setFetchMode(PDO::FETCH_ASSOC);
		if ($row=$stmt_check->fetch()) {
			//STUDENT OF ENSIAS
			if ($row['mpass']!='') {
				//MESSAGE 'ACCOUNT EXISTS'
				$_SESSION['msg']='Vous avez déjà un compte. Essayez de vous connecter.';
				header("Location:../register.php");
			}else{
				//CHECK THAT NO OTHER STUDENT HAS THE SAME PASSWORD OR EMAIL
				$check_p_e="select * from etudiant where email=? or mpass=?";
				$stmt_check_p_e=$pdo->prepare($check_p_e);
				$stmt_check_p_e->execute([$_POST['email'] , $_POST['password']]);
				$stmt_check_p_e->setFetchMode(PDO::FETCH_ASSOC);
				if ($res=$stmt_check_p_e->fetch()) {
					//PASSWORD OR EMAIL EXISTS
					$_SESSION['msg']='Revérifiez votre mot de passe / email.';
				 	header("Location:../register.php");
				}else{
					//HASH PASSWORD
					$hash=password_hash($_POST['password'], PASSWORD_BCRYPT);

					//UPDATE PASSWORD
					$register="update etudiant set mpass=?, email=? where cne=? or code_apoge=?";
					$s_register=$pdo->prepare($register);
					$s_register->execute([$hash, $_POST['email'] , $_POST['code'] , $_POST['code']]);
					//SEND A CONFIRMATION EMAIL 

					//ACCOUNT CREATED
					$_SESSION['msg']="Votre compte a été créé avec succès.";
					header("Location:../register.php");
				}
				
			}
		}else{
			//CHECK FIRST NAME LAST FILIERE ANNEE APOGEE
			//ERROR MESSAGE
			$_SESSION['msg']='Revérifiez nom, prénom, filière, code apogée ou année d\'étude';
			header("Location:../register.php");
		}
	}
 ?>