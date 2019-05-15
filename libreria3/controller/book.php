<?php
include "../view/html_basic.php";

if(isset($_POST['purchase'])){
  setcookie("bookpurchase",$_POST['purchase'],time()+120);
  echo <<< HTML
  <html>
  <head>
  <meta http-equiv="Refresh" content="0;url=../controller/index.php?page=pedidos">
  </head>
  </html>
  HTML;
}else if(isset($_POST['edit']) && $_COOKIE['login'] == "admin"){
  setcookie("bookedit",$_POST['edit'],time()+120);
  if(isset($_COOKIE['adding'])){
    setcookie('adding','',time()-100);
  }
  HTML_editBook();
}else if(isset($_POST['delete']) && $_COOKIE['login'] == "admin"){
  setcookie("bookdelete",$_POST['delete'],time()+120);
  HTML_deleteBook();
}else if(isset($_POST['editing']) && $_COOKIE['login'] == "admin"){
  DB_editBook($_POST);
}else if(isset($_POST['deleting']) && $_COOKIE['login'] == "admin"){
  DB_deleteBook();
}else if(isset($_POST['newbook']) && $_COOKIE['login'] == "admin"){
  HTML_editBook();
  if(isset($_COOKIE['bookedit'])){
    setcookie('bookedit','',time()-100);
  }
  setcookie('adding','yes',time()+120);
}else if(isset($_POST['adding']) && $_COOKIE['login'] == "admin"){
  if($_POST['title']!="" && $_POST['author']!="" && $_POST['price']!="" && $_POST['editorial']!="" && $_POST['isbn']!="" && $_POST['photo']!="" && $_POST['genre']!=""){
    DB_addBook($_POST);
  }else{
    echo "Debe rellenar todos los datos para añadir un libro";
  }
}else{
  echo "ERROR EN EL PROCESO, puede que no estes intentando acceder a donde no debes o no estes logeado como admin.";
  echo <<< HTML
  <html>
  <head>
  <meta http-equiv="Refresh" content="0;url=../controller/index.php?page=catalogo">
  </head>
  </html>
  HTML;
}

?>
