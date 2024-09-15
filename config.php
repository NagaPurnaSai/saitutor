<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
 /*******************connection to database*******************/
  $con = mysqli_connect('localhost' ,'sample', 'Sample1234!@#$', 'samplesai');
  if( mysqli_connect_error() ){
  echo " Error: ". mysqli_connect_error();
  exit;
  }
?>