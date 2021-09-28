<?php

function list_all()
{
  $items = file('pricelist-3.txt');
  // To check the number of lines
  echo '(' . count($items) .') :<br>';
  foreach($items as $item)
  {
     $data = explode(';', $item);
     $num = count($data);

     $edit = '<a href="./?edit=yes&id=' . $data[0] . '">EDIT</a>';

     $aa = '';
     for ($c=0; $c < $num; $c++) {
          $aa .= $data[$c] . '  ';
     }

     echo $aa .  '  ' . $edit . '<br>';
  }
}

function get_item($id)
{
  $items = file('pricelist-3.txt');
  $item = $items[$id-1];
  return $item;
}

function show_form($id)
{
  $data = get_item($id);
  $data = explode(';', $data);

  echo '<form action="index.php" method="post">';
  echo '<input type="hidden" name="id" value="' . $id . '"><br>';
  echo '<input type="text" name="name" value="' . $data[1] . '"><br>';
  echo '<input type="text" name="price" value="' . $data[2] . '"><br>';
  echo '<input type="text" name="price_opt" value="' . $data[3] . '"><br>';
  echo '<input type="text" name="sklad1" value="' . $data[4] . '"><br>';
  echo '<input type="text" name="sklad2" value="' . $data[5] . '"><br>';
  echo '<input type="text" name="country" value="' . $data[6] . '"><br>';
  echo '<input type="submit" name="submit" value="Сохранить">';
}

function writeInFile($items)
{
  if (($handle = fopen("pricelist-3.txt", "w")) !== FALSE){

    foreach ($items as $item) {

    fputs($handle, $item);
    }

  }
  fclose($handle);
}

function prepareData($arrPost)
{
  $arr = array_values($arrPost);

  unset($arr[7]);

  $new_data = implode(";", $arr);

  $items = file('pricelist-3.txt');

  $id_nd = $arr[0]-1;

  $items[$id_nd] = $new_data . "\n";

  return $items;
}
