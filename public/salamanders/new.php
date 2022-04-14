<?php 
require_once('../../private/initialize.php'); 
?>

<?php $page_title = 'Create salamander'; 
require_once(SHARED_PATH . '/salamander-header.php');?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a>

  <div class="salamander-new">
    <h1>Create Salamander</h1>

    <form action="<?php echo url_for('salamanders/create.php'); ?>" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" value=""><br>
      
      <label for ="habitat">Habitat:</label><br>
      <textarea id ="habitat" name="habitat" rows="5" cols="50"></textarea><br>

      <label for ="description">Description:</label><br>
      <textarea id="description" name="description" rows="5" cols="50"></textarea><br>

      <input type="submit" value="Create salamander">
    </form>
  </div>
</div>

<?php require_once(SHARED_PATH . '/salamander-footer.php'); ?>
