<?php 
  /* ------------------------------------------------------------------
    
  1.)
  * Use require_once to reference the initialize.php file
  * Use a relative file path

  2.)

    Enter your code in the salamander array below

    Use this array element to start your array.
    ['id' => '1', 'salamanderName' => 'Red-Legged Salamander'],
    
    Add these salamanders to your array
    id 2 Pigeon Mountain Salamander
    id 3 ZigZag Salamander'
    id 4 Slimy Salamander

    ------------------------------------------------------------------ */


$salamanders = [
];

$page_title = 'Salamanders';

/* ------------------------------------------------------------------
Use require_once with the SHARED_PATH constant to reference 
the salamander-header.php file
------------------------------------------------------------------ */

?>

<h1>Salamanders</h1>

  <a href="#">Create Salamander</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

      <?php foreach($salamanders as $salamander) { ?>
        <tr>
          <!------------------------------------------------------------------
        Your code here
        Delete this line.

        Add the table data for the
        row 1: salamander id
        row 2: salamander name
        rows 3, 4, and 5 are already done for you.
        
        You will need to reference the salamander id and name from the salamanders array
      ------------------------------------------------------------------>
          <td><!-- row 1 --></td>
    	    <td><!-- row 2 --></td>
          <td><a class="action" href="<?= url_for('salamanders/show.php?id=' . h(u($salamander['id']))); ?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
