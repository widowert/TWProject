<?php
include_once "db_conexion.php";

function DB_authentication($user,$pass){
  if($user != "" && $pass != ""){
        $db=DB_connect();
        if ($db) {
            //$res = mysqli_query($db,"SELECT * FROM test WHERE ciudad='grana' ");
            $res = mysqli_query($db,"SELECT pass FROM users WHERE name='{$user}'");
            //echo "<p>Conexión con Éxito</p>";

            if ($res) { // Si no hay error
                $passdb=mysqli_fetch_assoc($res);
                mysqli_free_result($res);
                if($passdb['pass'] == $pass){
                    return true;
                }else{
                  return false;
            }
        } else {
          echo "<p>Error en la consulta</p>";
          echo "<p>Código: ".__FUNCTION__."</p>";
          echo "<p>Mensaje: ".mysqli_error($db)."</p>";
          return false;
        }
    } else {
      echo "<p>Error de conexión</p>";
      echo "<p>Código: ".mysqli_connect_errno()."</p>";
      echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
      die("Adiós");
      return false;
    }
  }else{
    return false;
  }
}
?>
