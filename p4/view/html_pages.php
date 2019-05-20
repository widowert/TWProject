<?php
include_once "html_basic.php";
include_once "../model/db_book.php";
include_once "html_book.php";

function HTML_index(){
  echo <<< HTML
    <main>
    <article>
    <!--<h1>Eventos</h1>-->
    HTML;
    HTML_busquedaIncidencia();
    echo <<< HTML
      <section class="evento">
      <div class="incidencia">
      </div>
      </section>
      </article>
      </main>
    HTML;
}
function HTML_busquedaIncidencia(){
  echo <<< HTML
    <div id="busquedaIncidencia">
    <form action="procesar.php" method="post">
    <h1>Criterios de búsqueda:</h1>
    <div id="ordenarIncidencia">
    <h2>Ordenar por:<h2>
    <input type="radio" name="ordenarPor" value="antiguedad"/>
    Antiguedad(primero las más recientes)<br>
    <input type="radio" name="ordenarPor" value="npositivos"/>
    Número de positivos (de más a menos)<br>
    <input type="radio" name="ordenarPor" value="npositivosNetos" checked/>
    Número de positivos netos (de más a menos)<br>
    </div>
    <div id="buscarIncidencia">
    <h2>Incidencias que contengan:</h2>
    Texto en búsqueda <br><input type="search" name="busqueda"/>
    <br><br>
    Lugar <br><input type="search" name="lugar"/>
    </div>
    <div id="estadoIncidencia">
      <h2>Estado:</h2>
      Pendiente <input type="checkbox" name="estado" value="pendiente">
      Comprobada <input type="checkbox" name="estado" value="comprobada">
      Tramitada <input type="checkbox" name="estado" value="tramitada">
      Irresoluble <input type="checkbox" name="estado" value="irresoluble">
      Resuelta <input type="checkbox" name="estado" value="resuelta">
    </div>
    <br>
    <select name="numIncidencias">
    <option value="None" disabled selected>Número de incidencias por página</option>
    <option value="5">5 items</option>
    <option value="10">10 items</option>
    <option value="15">15 items</option>
  </select>
    </form>
    </div>
    <div class="incidencias">
    </div>
  HTML;
}
function HTML_catalogo($res){
  if ($res && $res != "") { // Si hay alguna tupla de respuesta
      //HTML_initStart();
      echo <<< HTML
        <main><article id="catalogo">
      HTML;
      $i=0;
      while($tupla=mysqli_fetch_array($res)){
        if($i%2 == 0){
          echo <<< HTML
            <div><section class="catalogoItem1">
          HTML;
        }else{
          echo <<< HTML
            <section class="catalogoItem2">
          HTML;
        }
        echo <<< HTML
          <img src={$tupla['photo']}>
          <h2>{$tupla['title']}</h2>
          <p>{$tupla['author']}</p>
          <p>{$tupla['price']} €</p>
          <form action="../controller/book.php" method="post">
          <button name="purchase" type="submit" value={$tupla['isbn']}>Comprar</button>
        HTML;
        if(isset($_COOKIE['login']) && $_COOKIE['login']=="admin"){
          echo <<< HTML
            <button name="edit" type="submit" value={$tupla['isbn']}>Editar</button>
            <button name="delete" type="submit" value={$tupla['isbn']}>Eliminar</button>
          HTML;
        }
        echo <<< HTML
          </form>
          <p></p>
        HTML;
        if($i%2 == 0){
          echo "</section>";
        }else{
          echo "</section></div>";
        }
        $i++;
      }
      if($i%2!=0){
        echo "</div>";
      }
      if(isset($_COOKIE['login']) && $_COOKIE['login']=="admin"){
        echo <<< HTML
          <form action="../controller/book.php" method="post">
          <button name="newbook" type="submit" value=new>Añadir nuevo libro</button>
          </form>
        HTML;
      }
      echo "</article></main>";
      //HTML_initEnd();
  }else{
    echo "ERROR en CONSULTA de LIBRO";
  }
}
function HTML_busqueda(){
  echo <<< HTML
    <main>
    <article id="busqueda">
    <form action="../controller/search.php" method="post">
    Título <input type="search" name="title"/>
    ISBN <input type="tel" name="isbn"/>
    Género <select name="genre">
    <option value="none" disabled selected>- elija el género -</option>
  HTML;
  $res=DB_getBooks("*");
  if($res){
    $genres="";
    while($tupla=mysqli_fetch_array($res)){
      if(stripos($genres,$tupla['genre'])===false){
        $genres="{$genres} {$tupla['genre']} ";
        echo <<< HTML
          <option value={$tupla['genre']}>{$tupla['genre']}</option>
        HTML;
      }
    }
  }
  echo <<< HTML
    </select>
    <br><br>
    <input type="submit" value="Buscar"/>
    </form>
    </article>
    </main>
  HTML;
}
function HTML_tiendas(){
  echo <<< HTML
    <main>
    <article id="tiendas">
    <section>
    <table border="1">
    <thead>
    <tr><th>Granada</th></tr>
    </thead>
    <tbody>
    <tr>
    <th>Librería Agapea</th>
    <td>Calle Pontezuelas, 28, 18002</td>
    <td>958 26 71 68</td>
    <td>Abierto de 10:00-15:00 y 16:00-21:00 menos domingo</td>
    <td>4,5 (114) estrellas</td>
    <td><img src="../images/t1.jpg" width=300></td>
    </tr>
    <tr>
    <th>Librería Picasso</th>
    <td>Calle Obispo Hurtado, 5, 18002</td>
    <td>958 53 69 10</td>
    <td>Abierto de 10:00-14:00 y 17:30-21:00 menos domingo</td>
    <td>4,6 (562) estrellas</td>
    <td><img src="../images/t2.jpg" width=300></td>
    </tr>
    </tbody>
    </table>
    </section>
    </br>
    <section>
    <table border="1">
    <thead>
    <tr><th>Málaga</th></tr>
    </thead>
    <tbody>
    <tr>
    <th>Librería Luces</th>
    <td>Alameda Principal, 37, Calle Trinidad Grund, 30, 29001</td>
    <td>952 12 21 00</td>
    <td>Abierto de 10:00-21:00 menos domingo</td>
    <td>4,5 (525) estrellas</td>
    <td><img src="../images/t4.jpg" width=300></td>
    </tr>
    <tr>
    <th>Librería Proteo Prometeo</th>
    <td>Calle Puerta Buenaventura, 3, 29008</td>
    <td>952 21 90 19</td>
    <td>Abierto de 10:00-14:00 y 16:30-20:30 días laborales</td>
    <td>4,3 (297) estrellas</td>
    <td><img src="../images/t3.jpg" width=300></td>
    </tr>
    </tbody>
    </table>
    </section>
    </article>
    </main>
  HTML;
}

function HTML_pedidos(){
  if(isset($_COOKIE["bookpurchase"])){
    $search="isbn= '{$_COOKIE["bookpurchase"]}' ";
    $res=DB_getBooks($search);
    if($res){
      $tupla=mysqli_fetch_array($res);
        echo <<< HTML
          <main>
          <article id="pedido">
          <section>
        HTML;
        echo <<< HTML
          <img src={$tupla['photo']}>
          <p><strong>{$tupla['title']}</strong></p>
          <p><i>{$tupla['author']}</i></p>
          <p><strong>Editorial:</strong> {$tupla['editorial']}</p>
          <p><strong>ISBN </strong><i>{$tupla['isbn']}</i></p>
        HTML;
        HTML_bookTextx($_COOKIE["bookpurchase"]);
        echo <<< HTML
          <p><strong>PRECIO </strong><i>{$tupla['price']}</i> €</p>
          </section>
          <section id="pedidoForm">
          <form action="procesar.php" method="post">
          Nombre y apellidos <input type="text" name="nombre"/>
          <br><br>
          Direccion de envío <textarea name="direccion" cols=20 rows=2></textarea>
          <br><br>
          Email <input type="email" name="email"/>
          <br><br>
          Número de tarjeta <input type="tel" name="tarjeta"/>
          <br><br>
          Fecha de caducidad <input type="text" name="tfecha"/>
          CVC <input type="tel" name="tcvc"/>
          <br><br>
          Marque si procede:
          <br>
          <input type="checkbox" name="condiciones" value="True"> He leído y acepto las condiciones de compra
          <br>
          <input type="checkbox" name="recibirInfo" value="True"> Deseo recibir informción sobre novedades
          <br>
          <input type="checkbox" name="regalo" value="True"> Deseo el envío envuelto para regalo
          <br><br>
          <input type="submit" value="Pedir"/>
          </form>
          </section>
          </article>
          </main>
        HTML;
    }
  }
}

function HTML_Loginerror(){
  echo <<< HTML
  <html>
  <head>
  <link type="text/css" rel="stylesheet" href="../static/index.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <meta http-equiv="Refresh" content="3;url=../controller/index.php?page=index">
  </head>
  <body><div class="err">Contraseña o usuario incorrecto</div></body>
  </html>
  HTML;
}
function HTML_Loginok(){
  echo <<< HTML
  <html>
  <head>
  <link type="text/css" rel="stylesheet" href="../static/index.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <meta http-equiv="Refresh" content="1;url=../controller/index.php?page=index">
  </head>
  <body><div>Autenticado con éxito!</div></body>
  </html>
  HTML;
}
function HTML_incidencia(){
  
}
function HTML_resultadosLibros($res){
  HTML_init("catalogo",$res);
}
?>
