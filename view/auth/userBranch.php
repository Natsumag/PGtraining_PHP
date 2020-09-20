<?php

if (isset($_POST['edit']) == true) {
  $no = $_POST['no'];
  header('Location: userEdit.php?no='.$no);
  exit();
}
if (isset($_POST['delete']) == true) {
  $no = $_POST['no'];
  header('Location: userDelete.php?no='.$no);
  exit();
}

?>