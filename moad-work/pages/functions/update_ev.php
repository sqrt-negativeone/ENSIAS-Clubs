<?php
$id_event = $_POST['id_event'];
$title = $_POST['title'];
$date = $_POST['date'];
$descr = $_POST['description'];
//UPDATE THE TITLE,DATE AND DISCRIPTION FROM DB
$sql = "update evenement set titre=? date_fin=? date_deb=? description=? where id_event=?";
$sql = $pdo->prepare($sql);
$sql = $pdo->execute([$title,$date,date('Y-m-d'),$descr,$id_event]);


//GET THE PATH TO THE COVER AND THE VIDEO FROM DB
$sql = "select photo,video from evenement where id_event=?";
$sql = $pdo->prepare($sql);
$sql = $pdo->execute([$id_event]);
$data = $sql->fetchAll();
$cover=$data['photo'];
$video=$data['video'];

//UPDATE THE PHOTO
if (getimagesize($_FILES["pic"]["tmp_name"])!==false) {
    move_uploaded_file($_FILES["pic"]["tmp_name"], $cover);
}

//UPDATE THE VIDEO
$uploaded_file=$_FILES['vid']['name'];
$vid_type=strtolower(pathinfo($uploaded_file,PATHINFO_EXTENSION));

if (isset($_FILES['vid']['tmp_name'])){
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['vid']['tmp_name']);
    if ($mime == 'video/mp4') {
        move_uploaded_file($_FILES["vid"]["tmp_name"], $video);
    }
    finfo_close($finfo);
}