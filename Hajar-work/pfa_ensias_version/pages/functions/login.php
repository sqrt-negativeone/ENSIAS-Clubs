<?php session_start() ?>
<?php
include '../../../../../pfa_db_connection/connexion.php';
if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "select * from etudiant 
              where email=?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['email']]);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() == 1) {
        # code...
        $row = $stmt->fetch();
        if (password_verify($_POST['password'], $row['mpass'])) {
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['photo'] = $row['photo'];
            $_SESSION['cne'] = $row['cne'];
            $_SESSION['code_apoge'] = $row['code_apoge'];
            //STORE A COOKIE IN USER'S BROWSER IF HE CHOOSE REMEMBER ME OPTION
            if (isset($_POST['remember'])) {
                //CREATE COOKIE VALUE
                $rand_val = md5(time() . $row["mpass"]);
                $val_cookie = $row["cne"] . ':' . $rand_val;
                //REMEMBER FOR A MONTH
                $expire = 30 * 86400;
                //SET THE COOKIE
                setcookie("remember_me", $val_cookie, time() + $expire, "/");
                //UPDATE THE COOKIE IN THE DB
                $sql = "update etudiant set val_cookie=? where (cne=? or code_apoge=?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$val_cookie, $row["cne"], $row["code_apoge"]]);
            }
            header("Location: ../index.php");
        } else {
            //ONE OR BOTH THE CREDENTIALS IS FALSE
            $_SESSION['msg'] = 'Email et/ou mot de passe incorrects.';
            $_SESSION['context'] = 'Connexion à votre espace';
            header("Location: ../login.php");
        }
    } else {
        //ONE OR BOTH THE CREDENTIALS IS FALSE
        $_SESSION['msg'] = 'Email et/ou mot de passe incorrects.';
        $_SESSION['context'] = 'Connexion à votre espace';
        header("Location: ../login.php");
    }
}
?>