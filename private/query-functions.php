<?php

function find_all_salamanders() {
  global $db;

  $sql = "SELECT * FROM salamander ";
  $sql .= "ORDER BY name ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_salamander_by_id($id) {
  global $db;

  $sql = "SELECT * FROM salamander ";
  $sql .= "WHERE id='" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $salamanders = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $salamanders;
}

function validate_salamander($salamander) {
  $errors = [];
 
  if(is_blank($salamander['name'])) {
    $errors[] = "Name cannot be blank.";
  }
  elseif(!has_length($salamander['name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }
  if(is_blank($salamander['description'])) {
    $errors[] = "Description cannot be blank.";
  }
  if(is_blank($salamander['habitat'])) {
    $errors[] = "Habitat cannot be blank.";
  }
 
  return $errors;
 }
 
function insert_salamander($salamanders) {
  global $db;

  $errors = validate_salamander($salamanders);
  if(!empty($errors)) {
    return $errors;
  }

  $sql = "INSERT INTO salamander ";
  $sql .= "(name, habitat, description) ";
  $sql .= "VALUES (";
  $sql .= "'" . $salamanders['name'] . "', ";
  $sql .= "'" . $salamanders['habitat'] . "', ";
  $sql .= "'" . $salamanders['description'] . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  if($result) {
    return true;
  }

  else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_salamander($salamanders) {
  global $db;

  $errors = validate_salamander($salamanders);
  if(!empty($errors)) {
    return $errors;
  }

  $sql = "UPDATE salamander SET ";
  $sql .= "name='" . $salamanders['name'] . "', ";
  $sql .= "habitat='" . $salamanders['habitat'] . "', ";
  $sql .= "description='" . $salamanders['description'] . "' ";
  $sql .= "WHERE id='" . $salamanders['id'] . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  if($result) {
    return true;
  }
  else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_salamander($id) {
  global $db;

  $sql = "DELETE FROM salamander ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    }
    else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

?>