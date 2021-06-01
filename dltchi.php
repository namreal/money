<?php
  require_once('./_private/bundle.php');
  if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
    $id=$_GET['id'];
    $sql = "DELETE FROM chi WHERE id='$id'";
  }
  if ($DB->query($sql) === TRUE) {
      echo "Xoá thành công!";
      header('Location: /index1.php');
  }
?>