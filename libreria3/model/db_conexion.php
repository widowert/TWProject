<?php
function DB_connect(){
  $db = mysqli_connect("localhost","admin","admin","p4");
  //$db = mysqli_connect("localhost","oog39961819","Y0TfHFxM","oog39961819");
  return $db;
}

?>
