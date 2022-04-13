<?php 
require_once('../../private/initialize.php');

$salamander_set = find_all_salamanders();

$page_title = 'Salamanders';

require_once(SHARED_PATH . '/salamander-header.php');

?>

<h1>Salamanders</h1>

  <a href="<?php echo url_for('/salamanders/new.php'); ?>">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Description</th>
  </tr>

      <?php while($salamander = mysqli_fetch_assoc($salamander_set)) { ?>
        <tr>
         
          <td><?php echo h($salamander['id']); ?></td>
    	    <td><?php echo h($salamander['name']); ?></td>
          <td><?php echo h($salamander['habitat']); ?></td>
          <td><?php echo h($salamander['description']); ?></td>
          <td><a class="action" href="<?= url_for('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
          <td><a class="action" href="<?= url_for('salamanders/edit.php?id=' . h(u($salamander['id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?= url_for('salamanders/delete.php?id=' . h(u($salamander['id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($salamander_set);
    ?>

<?php require_once(SHARED_PATH . '/salamander-footer.php'); ?>
