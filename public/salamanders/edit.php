<?php 
require_once('../../private/initialize.php'); 

if(!isset($_GET['id'])) {
  redirect_to(url_for('salamanders/index.php'));
}

$id= $_GET ['id'];

if(is_post_request()) {

  $salamanders = [];
  $salamanders['id'] = $id;
  $salamanders['name'] = $_POST['name'] ?? '';
  $salamanders['habitat'] = $_POST['habitat'] ?? '';
  $salamanders['description'] = $_POST['description'] ?? '';

  $result = update_salamander($salamanders);
  if($result === true) {
    redirect_to(url_for('salamanders/show.php?id=' .$id));
  }
  else {
    $errors = $result;
    //var_dump($errors);
  }
}
else {
  $salamanders = find_salamander_by_id($id);
}

$page_title = 'Edit Salamander';
include(SHARED_PATH . '/salamander-header.php'); 

?>
<p><a href="<?php echo url_for('salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<h1>Edit Salamander</h1>

<?php echo display_errors($errors); ?>

<form action="<?php echo url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" value="<?php echo h($salamanders['name']); ?>"><br>
      
  <label for ="habitat">Habitat:</label><br>
  <textarea id="habitat" name="habitat" rows="5" cols="50"><?php echo h($salamanders['habitat']); ?></textarea><br>

  <label for ="description">Description:</label><br>
  <textarea id="description" name="description" rows="5" cols="50"><?php echo h($salamanders['description']); ?></textarea><br>

  <input type="submit" value="Edit salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
