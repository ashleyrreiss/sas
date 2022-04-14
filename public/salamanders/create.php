<?php 

require_once('../../private/initialize.php'); 

if(is_post_request()) {

  $salamanders = [];
  $salamanders['name'] = $_POST['name'] ?? '';
  $salamanders['habitat'] = $_POST['habitat'] ?? '';
  $salamanders['description'] = $_POST['description'] ?? '';

  $result = insert_salamander($salamanders);
  $newID = mysqli_insert_id($db);
  redirect_to(url_for('salamanders/show.php?id=' . $newID));
  
}
else {
  redirect_to(url_for('salamanders/new.php'));
}

?>