<?php
session_start();
$id = $_POST['id'];
$sql = "select * from evenement where id_event=?";
$sql = $pdo->prepare($sql);
$sql = $pdo->execute([$_POST['id']]);
$data = $sql->fetchAll();
echo json_encode($data);
?>