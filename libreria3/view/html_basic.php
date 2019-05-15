<?php
  require_once "html_pages.php";

function HTML_init($page,$res=null){
    if($res == null || $res == ""){
      $res = DB_getBooks("*");
      $check=0;
    }
    HTML_start();
    HTML_head();
    echo "<body>";
    HTML_header();
    if(!isset($check)){
      HTML_nav("none");
    }else{
      HTML_nav($page);
    }
    HTML_login();
    switch($page){
      case "index":HTML_index();break;
      case "catalogo":HTML_catalogo($res);break;
      case "busqueda":HTML_busqueda();break;
      case "tiendas":HTML_tiendas();break;
      case "pedidos":HTML_pedidos();break;
      default:HTML_404();break;
    }
    HTML_aside();
    HTML_footer();
    echo "</body>";
    HTML_end();
}

function HTML_initStart($page="none"){
  HTML_start();
  HTML_head();
  echo "<body>";
  HTML_header();
  HTML_nav($page);
  HTML_login();
}

function HTML_initEnd(){
  HTML_aside();
  HTML_footer();
  echo "</body>";
  HTML_end();
}
    /**/


  function HTML_start(){
    echo <<< HTML
      <!DOCTYPE html>
      <html lang="en">
    HTML;
  }

  function HTML_end(){
    echo <<< HTML
      </html>
    HTML;
  }

  function HTML_head(){
    echo <<< HTML
      <head>
      <meta charset="utf-8">
      <link type="text/css" rel="stylesheet" href="../static/index.css">
      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
      <meta name="autor" content="OscarOsorio">
      <meta name="description" content="Practica 1 TW Ejercicio 4 - Libreria">
      <title>El Lector de Libros</title>
      </head>
    HTML;
  }

  function HTML_header(){
    echo <<< HTML
      <header>
      <div id="h-izq">
      <a href="./index.html"><img id="indexImg" src="../images/book2.png" ></a>
      </div>
      <div id="h-der">
      <h1>El lector de libros</h1>
      <p id="title">Contando historias desde hace 100 años</p>
      </div>
      </header>
    HTML;
  }

  function HTML_nav($page="none"){
    echo <<< HTML
      <nav>
      <ul id="navList">
    HTML;
    switch($page){
      case "index":
        echo <<< HTML
        <li style="background: white;"><a class="link" style="color:#333A37;" href="#">Inicio</a></li>
        <li><a class="link" href="../controller/index.php?page=catalogo">Catálogo</a></li>
        <li><a class="link" href="../controller/index.php?page=busqueda">Búsqueda</a></li>
        <li><a class="link" href="../controller/index.php?page=tiendas">Tiendas</a></li>
        <li><a class="link" href="../controller/index.php?page=pedidos">Pedidos</a></li>
        HTML;
        break;

      case "catalogo":
        echo <<< HTML
        <li><a class="link" href="../controller/index.php?page=index">Inicio</a></li>
        <li style="background: white;"><a class="link" style="color:#333A37;" href="#">Catálogo</a></li>
        <li><a class="link" href="../controller/index.php?page=busqueda">Búsqueda</a></li>
        <li><a class="link" href="../controller/index.php?page=tiendas">Tiendas</a></li>
        <li><a class="link" href="../controller/index.php?page=pedidos">Pedidos</a></li>
        HTML;
        break;

      case "busqueda":
        echo <<< HTML
        <li><a class="link" href="../controller/index.php?page=index">Inicio</a></li>
        <li><a class="link" href="../controller/index.php?page=catalogo">Catálogo</a></li>
        <li style="background: white;"><a class="link" style="color:#333A37;" href="#">Búsqueda</a></li>
        <li><a class="link" href="../controller/index.php?page=tiendas">Tiendas</a></li>
        <li><a class="link" href="../controller/index.php?page=pedidos">Pedidos</a></li>
        HTML;
        break;

      case "tiendas":
        echo <<< HTML
        <li><a class="link" href="../controller/index.php?page=index">Inicio</a></li>
        <li><a class="link" href="../controller/index.php?page=catalogo">Catálogo</a></li>
        <li><a class="link" href="../controller/index.php?page=busqueda">Búsqueda</a></li>
        <li style="background: white;"><a class="link" style="color:#333A37;" href="#">Tiendas</a></li>
        <li><a class="link" href="../controller/index.php?page=pedidos">Pedidos</a></li>
        HTML;
        break;

      case "pedidos":
        echo <<< HTML
        <li><a class="link" href="../controller/index.php?page=index">Inicio</a></li>
        <li><a class="link" href="../controller/index.php?page=catalogo">Catálogo</a></li>
        <li><a class="link" href="../controller/index.php?page=busqueda">Búsqueda</a></li>
        <li><a class="link" href="../controller/index.php?page=tiendas">Tiendas</a></li>
        <li style="background: white;"><a class="link" style="color:#333A37;" href="#">Pedidos</a></li>
        HTML;
        break;
      case "none":
        echo <<< HTML
        <li><a class="link" href="../controller/index.php?page=index">Inicio</a></li>
        <li><a class="link" href="../controller/index.php?page=catalogo">Catálogo</a></li>
        <li><a class="link" href="../controller/index.php?page=busqueda">Búsqueda</a></li>
        <li><a class="link" href="../controller/index.php?page=tiendas">Tiendas</a></li>
        <li><a class="link" href="../controller/index.php?page=pedidos">Pedidos</a></li>
        HTML;
        break;
      default:
        echo <<< HTML
        <li><a class="link" href="../controller/index.php?page=index">Inicio</a></li>
        <li><a class="link" href="../controller/index.php?page=catalogo">Catálogo</a></li>
        <li><a class="link" href="../controller/index.php?page=busqueda">Búsqueda</a></li>
        <li><a class="link" href="../controller/index.php?page=tiendas">Tiendas</a></li>
        <li><a class="link" href="../controller/index.php?page=pedidos">Pedidos</a></li>
        HTML;
        break;
    }
    echo <<< HTML
      </ul>
      </nav>
    HTML;
  }

  function HTML_aside(){
    echo <<< HTML
      <aside>
      <div id="topSell">
      <p><strong>Más vendidos</strong></p>
      <ul>
      <li>El quijote</li>
      <li>Ulises</li>
      <li>Arguiñano cocina</li>
      </ul>
      </div>
      <div id="topPopular">
      <p><strong>Más populares</strong></p>
      <ul>
      <li>Charles Dickens</li>
      <li>Julio Verne</li>
      <li>Edgar Allan Poe</li>
      </ul>
      </div>
      </aside>
    HTML;
  }

  function HTML_footer(){
    echo <<< HTML
    <footer>
    <div id="ubicacion">
    <ul>
    <li>Granada</li>
    <ul>
    <li>Reyes Catolicos (555 112233)</li>
    <li>Avda Dilar (555 332211)</li>
    </ul>
    <li>Málaga</li>
    <ul>
    <li>Marqués de Larios (555 221133)</li>
    </ul>
    </ul>
    </div>
    <div id="rsFoot">
    <img src="../images/twitter.png">
    <img src="../images/facebook.png">
    <img src="../images/pinterest.png">
    <img src="../images/other.png">
    <div id="contacto">
    <img id="emailImg" src="../images/email.png">
    <p id="emailDir">lectordelibros@gemeil.com</p>
    </div>
    </div>
    <div id="infoExtra">
    <ul>
    <li><a class="link" href="#">La empresa</a></li>
    <li><a class="link" href="#">Politica de envio</a></li>
    <li><a class="link" href="#">Preguntas frecuentes</a></li>
    <li><a class="link" href="#">Mapa del sitio</a></li>
    </ul>
    </div>
    </footer>
    HTML;
  }

  function HTML_login(){
    if(isset($_COOKIE["login"])){
      echo <<< HTML
        <div id="login"><p> Identificado como :
      HTML;
      echo $_COOKIE["username"];
      echo "</p></div>";
    }else{
      echo <<< HTML
      <div id="login">
        <form action="../controller/login.php" method="post">
            Usuario <input type="search" name="user"/> Contraseña <input type="search" name="pass"/> <input type="submit" value="Buscar"/>
        </form>
      </div>
      HTML;
    }
  }

  function HTML_editBook(){
    HTML_initStart();
    echo <<< HTML
      <section id="bookForm">
      <form action="../controller/book.php" method="post">
      Titulo <input type="text" name="title"/>
      <br><br>
      Autor <input type="text" name="author"/>
      <br><br>
      Editorial <input type="text" name="editorial"/>
      <br><br>
      Precio <input type="text" name="price"/>
      <br><br>
      ISBN <input type="number" name="isbn"/>
      <br><br>
      Imagen (ruta) <input type="text" name="photo"/>
      <br><br>
    HTML;
    if(isset($_COOKIE['bookedit']) && $_COOKIE['bookedit']!=""){
      echo <<< HTML
        <button name="editing" type="submit" value="yes">Editar
      HTML;
    }else{
      echo <<< HTML
        Género <input type="text" name="genre"/>
        <br><br>
        <button name="adding" type="submit" value="yes">Añadir
      HTML;
    }
    echo <<< HTML
      </button>
      </form>
      </section>
    HTML;
    HTML_initEnd();
  }

  function HTML_deleteBook(){
    HTML_initStart();
    echo <<< HTML
      <section id="bookForm">
      <form action="../controller/book.php" method="post">
      <p>¿Seguro que quiere eliminarlo?</p>
      <button name="deleting" type="submit" value="yes">Eliminar</button>
      </form>
      </section>
    HTML;
    HTML_initEnd();
  }

  function HTML_404(){
    echo  "Esta pagina no se encuentra en este servidor.";
  }
 ?>
