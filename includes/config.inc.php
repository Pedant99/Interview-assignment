<?php
  $host_name = 'db5007073198.hosting-data.io';
  $database = 'dbs5838367';
  $user_name = 'dbu3127136';
  $password = 'Amazinggod444';

  $link = new mysqli($host_name, $user_name, $password, $database);

  if ($link->connect_error) {
    die('<p>Failed to connect to MySQL: '. $link->connect_error .'</p>');
  } else {
    echo '';
  }
?>
