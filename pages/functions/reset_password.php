<?php session_start();
include '../../../pfa_db_connection/connexion.php';
if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "select * from etudiant 
              where email=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['email']]);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() == 1) {
        //	UPDATE PASSWORD
        $new_pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $sql_ = "update etudiant set mpass = ?
              		where email=?";

        $stmt_ = $pdo->prepare($sql_);
        $stmt_->execute([$new_pass, $_POST['email']]);

        if ($stmt_->rowCount() == 1) {
            $_SESSION['msg'] = 'Mot de passe réinitialisé avec succès.';
        } else {
            //ONE OR BOTH THE CREDENTIALS IS FALSE
            $_SESSION['msg'] = 'Erreur de chargement. Veuillez réessayer plus tard.';
        }
    } else {
        //ONE OR BOTH THE CREDENTIALS IS FALSE
        $_SESSION['msg'] = 'Revérifiez vos données.';
    }

    $_SESSION['context'] = 'Réinitialiser le mot de passe';
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
