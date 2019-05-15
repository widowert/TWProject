<?php
require "../model/db_login.php";
require "../view/html_pages.php";

$auth=DB_authentication($_POST['user'],$_POST['pass']);
if($auth){
  setcookie("login","admin",time()+500);
  setcookie("username",$_POST['user'],time()+500);
  HTML_Loginok();
}else{
  HTML_Loginerror();
}
 ?>
