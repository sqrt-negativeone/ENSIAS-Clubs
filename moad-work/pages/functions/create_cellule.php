<?php

$cel_name = $_POST['name'];
$club_id = $_POST['club'];
$sql = "insert into cellule (intitule,id_club)  values (?,?)";
$sql = $pdo->prepare($sql);
$sql = $pdo->execute([$cel_name,$club_id]);
