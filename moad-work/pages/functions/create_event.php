<?php
$club_id=$_POST['club_id'];
$title=$_POST['title'];
$date=$_POST['date'];
$descr=$_POST['description'];


$id_event=$pdo->query('select count(*) from blah')->fetchColumn();
$id_event++;

$pic='/uploads/events/photos/'.$id_event.'.'.strtolower(pathinfo(basename($_FILES["pic"]["name"]),PATHINFO_EXTENSION));
if (getimagesize($_FILES["pic"]["tmp_name"])!==false) {
    move_uploaded_file($_FILES["pic"]["tmp_name"], '..'.$pic);
}


$vid='/uploads/events/videos/'.$id_event.'.'.strtolower(pathinfo(basename($_FILES["vid"]["name"]),PATHINFO_EXTENSION));
$vid_type=strtolower(pathinfo($vid,PATHINFO_EXTENSION));

if (isset($_FILES['vid']['tmp_name'])){
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['vid']['tmp_name']);
    if ($mime == 'video/mp4') {
        move_uploaded_file($_FILES["vid"]["tmp_name"], '..'.$vid);
    }
    finfo_close($finfo);
}

$sql = "insert into evenement (date_deb,date_fin,video,titre,photo)  values (?,?,?,?,?)";
$sql = $pdo->prepare($sql);
$sql = $pdo->exec([date('Y-m-d'),$date,$vid,$title,$pic]);

$sql = "insert into organisation values (?,?)";
$sql = $pdo->prepare($sql);
$sql = $pdo->exec([$id_club,$id_event]);
