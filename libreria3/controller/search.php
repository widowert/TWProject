<?php
require "../model/db_book.php";
require "../view/html_pages.php";

/*$search="";
if(isset($_POST['isbn']) && is_numeric($_POST['isbn'])){//compronar que son 2 numeros iguales
  $search = "{$search} isbn= '{$_POST['isbn']}' ";
}else{
  if(isset($_POST['author']) && is_string($_POST['author']) && $_POST['author']!=""){
    $search = "{$search} author= '{$_POST['author']}' ";
  }
  if(isset($_POST['title']) && is_string($_POST['title']) && $_POST['title']!=""){
    if($search!="")$search="{$search}";
    $search = "{$search} AND title= '{$_POST['title']}' ";
  }
  if(isset($_POST['priceMin']) && is_numeric($_POST['priceMin'])){
    if($search!="")$search="{$search} ";
    $search = "{$search} AND price> '{$_POST['priceMin']}' ";
  }
  if(isset($_POST['priceMax']) && is_numeric($_POST['priceMax'])){
    if($search!="")$search="{$search} ";
    $search = "{$search} AND price< '{$_POST['priceMax']}' ";
  }
}*/
$search="";
if(isset($_POST['isbn']) && $_POST['isbn']!=""){
  $search=" isbn= {$_POST['isbn']}";
  HTML_resultadosLibros(DB_getBooks($search));
}else{
  if(isset($_POST['genre']) && $_POST['genre'] != "none"){
        $search=" genre= '{$_POST['genre']}' ";
  }else if(isset($_POST['title'])){
    $res=DB_getBooks("*");
    if ($res && $res != "") { // Si hay alguna tupla de respuesta
        //HTML_initStart();
        while($tupla=mysqli_fetch_array($res)){
          if(stripos($tupla['title'],$_POST['title'])!==false || stripos($tupla['author'],$_POST['title'])!==false){
            if($search=="")$search="$search isbn= '{$tupla['isbn']}'";
            else$search="$search OR isbn= '{$tupla['isbn']}'";
            echo "SELECT title,author,isbn,price,photo,editorial FROM books WHERE {$search}";
          }
        }
    }else{
      echo "ERROR en CONSULTA de LIBRO";
    }
  }
      //echo $search;
      HTML_resultadosLibros(DB_getBooks($search));
}



?>
