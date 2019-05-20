<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title id="titulo">Variables recibidas</title>
	</head>

	<body>
		<?php
			require_once "../view/html_basic.php";
			HTML_init($_GET['page']);
			$datos['name']="oscar";
			$datos['surname']="osorio giraldez";
			$datos['email']="oscar@prueba.com";
			$datos['type']=True;
			$datos['pass']="admin";
			$db = mysqli_connect("localhost","admin","admin","p4");
if ($db) {
//$res = mysqli_query($db,"SELECT * FROM test WHERE ciudad='grana' ");
$res = mysqli_query($db,"INSERT INTO users (name,surname,email,type,pass) VALUES ('{$datos['name']}','{$datos['surname']}','{$datos['email']}','{$datos['type']}','{$datos['pass']}')");
echo "<p>Conexión con Éxito</p>";

if ($res) { // Si no hay error
	/*		if (mysqli_num_rows($res)>0) { // Si hay alguna tupla de respuesta
		$tupla=mysqli_fetch_array($res);
		echo "<p>{$tupla['test1']} y {$tupla['ciudad']} ";
	} else
		echo "<p>No hay resultados para la consulta</p>";
		mysqli_free_result($res); // Liberar memoria de la consulta			*/
} else {
echo "<p>Error en la consulta</p>";
echo "<p>Código: ".__FUNCTION__."</p>";
	echo "<p>Mensaje: ".mysqli_error($db)."</p>";
}


} else {
echo "<p>Error de conexi�n</p>";
echo "<p>Código: ".mysqli_connect_errno()."</p>";
echo "<p>Mensaje: ".mysqli_connect_error()."</p>";
die("Adiós");
}
// Establecer la codificaci�n de los datos almacenados
mysqli_set_charset($db,"utf8");
		?>
		<?php echo"
		<p>Variables GET: </p>";
		echo"<ul>";
		foreach ($_GET as $c => $v)
			if (is_array($v)) {
				echo"<li>$c = ";
				print_r($v);
			echo"</li>";
			} else
				echo"<li>$c = $v</li>";
			echo"</ul>";

			echo"<p>Variables POST: </p>";
			echo"<ul>";
			foreach ($_POST as $c => $v) {
				if (is_array($v)) {
					echo"<li>$c = ";
					print_r($v);echo"</li>";
				} else
					echo"<li>$c = $v</li>";
			}
		echo"</ul>";

		?>

	</body>
</html>
