<?php 
require_once('../../private/initialize.php'); 

$test = $_GET['test'] ?? '';

if ($test == '404') {
  error_404();
}
elseif($test == '500') {
  error_500();
}
elseif($test == 'redirect') {
  redirect_to(url_for('/salamanders/index.php'));
}
?>

<?php $page_title = 'Create salamander'; 
require_once(SHARED_PATH . '/salamander-header.php');?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a>

  <div class="salamander-new">
    <h1>Create Salamander</h1>

    <form action="<?php echo url_for('/salamanders/create.php'); ?>" method="post">
      <label for="salamanderName">Salamander Name</label>
      <input type="text" name="salamanderName" value=""><br>
      <input type="submit" value="Create salamander">
    </form>
  </div>
</div>

<?php require_once(SHARED_PATH . '/salamander-footer.php'); ?>
