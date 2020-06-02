<?php 
    //TODO: get the data of the matched users from db
    //if the search string is empty return all
    //the return data should be HTML
    $data=$_POST['data'];
?>
<p><?php echo htmlspecialchars($data); ?></p>