<?php
include_once "db_conexion.php";

function DB_getBooks($search){
  if($search!=""){
    $db=DB_connect();
    if ($db) {
        //echo "SELECT pass FROM books WHERE";
        //echo $search;
        //$res = mysqli_query($db,"SELECT * FROM test WHERE ciudad='grana' ");
        if($search == "*"){
          $res = mysqli_query($db,"SELECT title,author,isbn,price,photo,editorial,genre FROM books");
        }else{
          $res = mysqli_query($db,"SELECT title,author,isbn,price,photo,editorial FROM books WHERE {$search}");
        }
        //echo "<p>Conexión con Éxito</p>";

        if ($res) { // Si no hay error
          if (mysqli_num_rows($res)>0) {
            return $res;
          }else{
            echo "<p>Búsqueda sin resultados</p>";
          }
        }else {
          echo "<p>Error en la consulta</p>";
          echo "<p>Código: ".__FUNCTION__."</p>";
          echo "<p>Mensaje: ".mysqli_error($db)."</p>";
          return "";
        }
    } else {
      echo "<p>Error de conexión</p>";
      echo "<p>Código: ".mysqli_connect_errno()."</p>";
      echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
      die("Adiós");
    }
  } else {
    echo "<p>Sin argumentos de búsqueda o erroreo: </p>";
    echo $busqueda;
  }
}
function DB_editBook($values){
  if(isset($_COOKIE['bookedit']) && $_COOKIE['login'] == "admin"){
    $isbn=$_COOKIE['bookedit'];
    $db=DB_connect();
    if ($db) {
        //echo "SELECT pass FROM books WHERE";
        //echo $search;
        //$res = mysqli_query($db,"SELECT * FROM test WHERE ciudad='grana' ");
          if(isset($values['title']) && $values['title']!=""){
            $res = mysqli_query($db,"UPDATE books SET title='{$values['title']}' WHERE isbn='{$isbn}'");
            if (!$res) { // Si no hay error
              echo "<p>Error en la edición de titulo</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }
          }
          if(isset($values['author'])&& $values['author']!=""){
            $res = mysqli_query($db,"UPDATE books SET author='{$values['author']}' WHERE isbn='{$isbn}'");
            if (!$res) { // Si no hay error
              echo "<p>Error en la edición de autor</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }
          }
          if(isset($values['editorial'])&& $values['editorial']!=""){
            $res = mysqli_query($db,"UPDATE books SET editorial='{$values['editorial']}' WHERE isbn='{$isbn}'");
            if (!$res) { // Si no hay error
              echo "<p>Error en la edición de editorial</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }
          }
          if(isset($values['price'])&& $values['price']!=""){
            $res = mysqli_query($db,"UPDATE books SET price='{$values['price']}' WHERE isbn='{$isbn}'");
            if (!$res) { // Si no hay error
              echo "<p>Error en la edición de precio</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }
          }
          if(isset($values['isbn'])&& $values['isbn']!=""){
            $res = mysqli_query($db,"UPDATE books SET isbn='{$values['isbn']}' WHERE isbn='{$isbn}'");
            if (!$res) { // Si no hay error
              echo "<p>Error en la edición de isbn</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }
          }
          if(isset($values['photo'])&& $values['photo']!=""){
            $res = mysqli_query($db,"UPDATE books SET photo='{$values['photo']}' WHERE isbn='{$isbn}'");
            if (!$res) { // Si no hay error
              echo "<p>Error en la edición de foto</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }
          }
          else{
            echo <<< HTML
            Parece que todo ha sido modificado correctamente
            <html>
            <head>
            <meta http-equiv="Refresh" content="1;url=../controller/index.php?page=catalogo">
            </head>
            </html>
            HTML;
          }
    } else {
      echo "<p>Error de conexión</p>";
      echo "<p>Código: ".mysqli_connect_errno()."</p>";
      echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
      die("Adiós");
    }
  } else {
    echo "<p>Error en la cookie de edicion de libro (isbn) o de autenticación (eres admin?)</p>";
  }
}

function DB_deleteBook(){
  if(isset($_COOKIE['bookdelete']) && $_COOKIE['login'] == "admin"){
    $isbn=$_COOKIE['bookdelete'];
    $db=DB_connect();
    if ($db) {
            $res = mysqli_query($db,"DELETE FROM books WHERE isbn='{$isbn}'");
            if (!$res) { // Si no hay error
              echo "<p>Error eliminando libro</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }else{
              echo <<< HTML
              Libro eliminado correctamente
              <html>
              <head>
              <meta http-equiv="Refresh" content="1;url=../controller/index.php?page=catalogo">
              </head>
              </html>
              HTML;
            }
    } else {
      echo "<p>Error de conexión</p>";
      echo "<p>Código: ".mysqli_connect_errno()."</p>";
      echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
      die("Adiós");
    }
  } else {
    echo "<p>Error en la cookie de edicion de libro (isbn) o de autenticación (eres admin?)</p>";
  }
}

function DB_addBook($values){
  if(isset($_COOKIE['adding']) && $_COOKIE['login'] == "admin"){
    $db=DB_connect();
    if ($db) {
            $res = mysqli_query($db,"INSERT INTO books (title,author,editorial,price,isbn,photo,genre) values (
              '{$values['title']}',
              '{$values['author']}',
              '{$values['editorial']}',
              '{$values['price']}',
              '{$values['isbn']}',
              '{$values['photo']}',
              '{$values['genre']}'
            )");
            if (!$res) { // Si no hay error
              echo "<p>Error añadiendo libro</p>";
              echo "<p>Código: ".__FUNCTION__."</p>";
              echo "<p>Mensaje: ".mysqli_error($db)."</p>";
            }else{
              echo <<< HTML
              Libro añadido correctamente
              <html>
              <head>
              <meta http-equiv="Refresh" content="1;url=../controller/index.php?page=catalogo">
              </head>
              </html>
              HTML;
            }
    } else {
      echo "<p>Error de conexión</p>";
      echo "<p>Código: ".mysqli_connect_errno()."</p>";
      echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
      die("Adiós");
    }
  } else {
    echo "<p>Error en la cookie de edicion de libro (isbn) o de autenticación (eres admin?)</p>";
  }
}
 ?>
