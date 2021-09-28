<?php

include 'function.php';

if (isset($_GET['id']))
{
  $data = get_item($_GET['id']);

  echo 'EDIT ' . $_GET['id'] . ' ';

  show_form($_GET['id']);
}
elseif (isset($_POST['submit']))
{
  $arr_data = $_POST;

  $w_items = [];

  $w_items = prepareData($arr_data);

  // Теперь надо всё запихнуть в файл

  writeInFile($w_items);

   //header('Location: list_people.php');

   echo '<br><a href="./">К списку</a>';

}
else{

  echo 'СПИСОК ';

  list_all();
}

?>
