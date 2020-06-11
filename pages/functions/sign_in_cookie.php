<?php
//GET THE COOKIE VALUE
list($user_cne, $hash) = explode(':', $_COOKIE["remember_me"]);
//LOAD USER DATA
$sql = "select * from etudiant where cne=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_cne]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
if ($stmt->rowCount() == 1) {
    $row = $stmt->fetch();
    //CHECK IF VALIDE COOKIE
    if ($row["cookie_val"] === $_COOKIE["remember_me"]) {
        //SET USER DATA
        $_SESSION['nom'] = $row['nom'];
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['photo'] = $row['photo'];
        $_SESSION['cne'] = $row['cne'];
        $_SESSION['code_apoge'] = $row['code_apoge'];
        include "functions/index-page.php";
        //CHANGE THE HASH VALUE
        $rand_val = md5(time() . $row["mpass"]);
        $cookie_val = $row["cne"] . ':' . $rand_val;
        $expire = 30 * 86400;
        setcookie("remember_me", $cookie_val, $expire, "/");
        $sql = "update etudiant set cookie_val=? where (cne=? or code_apoge=?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cookie_val, $row["cne"], $row["code_apoge"]]);
    } else {
        //INVALIDE COOKIE
        header("Location:login.php");
    }
} else {
    //INVALIDE COOKIE
    header("Location:login.php");
}