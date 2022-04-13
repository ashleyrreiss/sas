<?php 
require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; 

$salamanders = find_salamander_by_id($id);

$page_title = 'View Salamander';
include(SHARED_PATH . '/salamander-header.php'); 

?>


  <a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <h1>Salamander: <?php echo h($salamanders['name']); ?></h1>
  <p> Salamander ID: <?= h($id); ?> </p>
  <table>
    <tr>
      <th>Name:</td>
      <td><?php echo h($salamanders['name']); ?></td>
    </tr>

    <tr>
      <th>Habitat:</td>
      <td><?php echo h($salamanders['habitat']); ?></td>
    </tr>

    <tr>
      <th>Description:</td>
      <td><?php echo h($salamanders['description']); ?></td>
    </tr>
  </table>


<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
