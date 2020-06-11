<?php
session_start();
print_r($_POST);
require_once '../../../../../pfa_db_connection/connexion.php';
if (isset($_POST['submit_dif']) or isset($_POST['submit_sel'])) {

	$_SESSION['context'] = 'Création de tâche';

	//INSERT THE TASK IN THE TASK TABLE
	if (trim($_POST['titre']) != '' and trim($_POST['desc']) != '') {
		try {
			$pdo->beginTransaction();
			//CREATE TASK
			$titre = trim($_POST['titre']);
			$desc = trim($_POST['desc']);
			$sysdate = date('Y-m-d H:i:s');
			//CHECK DATES
			if ($sysdate > $_POST['date']) {
				throw new Exception('Invalid date');
			}
			$insert_task = "insert into tache (titre_tache, desc_tache, date_deb_tache, date_fin_tache, id_cellule, cne) values(?,?,?,?,?,?)";
			$stmt_insert_task = $pdo->prepare($insert_task);
			$stmt_insert_task->execute([$titre, $desc, $sysdate, $_POST['date'], $_SESSION['id_cellule_for_change_resp'], $_SESSION['cne']]);


			//ASSIGN THE TASK	
			if (isset($_POST['submit_dif'])) {
				# DIFFUSION A TOUS LES MEMBRES
				$etat = 'NV';
				//GET THE ID OF THE LAST INSERTED TASK
				$id_tache = $pdo->lastInsertId();

				$all = $_SESSION['all_cell_members'];
				print_r($_SESSION['all_cell_members']);
				$tasks_broadcast = "insert into tache_assignee (id_tache, cne, etat) values (?,?,?) ";
				$array_tasks = [$id_tache, $all[0]['cne'], $etat];

				for ($i = 1; $i < count($all); $i++) {
					$tasks_broadcast .= ',(?,?,?)';
					array_push($array_tasks, $id_tache, $all[$i]['cne'], $etat);
				}
				echo $tasks_broadcast;
				print_r($array_tasks);
				$assign_task = $pdo->prepare($tasks_broadcast);
				$assign_task->execute($array_tasks);
				$pdo->commit();
				$_SESSION['msg'] = 'Tâche diffusée à tous les membres.';
				header("Location:" . $_SERVER['HTTP_REFERER']);
			} elseif (isset($_POST['submit_sel'])) {
				# SELECTION DES MEMBRES
				$etat = 'NV';
				//GET THE ID OF THE LAST INSERTED TASK
				$id_tache = $pdo->lastInsertId();

				$all = $_POST['sel_member'];

				$tasks_broadcast = "insert into tache_assignee (id_tache, cne, etat) values (?,?,?) ";
				$array_tasks = [$id_tache, $all[0], $etat];

				for ($i = 1; $i < count($all); $i++) {
					$tasks_broadcast .= ',(?,?,?)';
					array_push($array_tasks, $id_tache, $all[$i], $etat);
				}

				$assign_task = $pdo->prepare($tasks_broadcast);
				$assign_task->execute($array_tasks);

				$pdo->commit();
				$_SESSION['msg'] = 'Tâche diffusée aux membres séléctionnés.';
				header("Location:" . $_SERVER['HTTP_REFERER']);
			}
		} catch (Exception $e) {
			$pdo->rollBack();
			$_SESSION['msg'] = 'Erreur lors de la Création. Veuillez essayer ultérieurement.';
			header("Location:" . $_SERVER['HTTP_REFERER']);
		}
	} else {
		//INSERTIONS VIDES
	}
}
