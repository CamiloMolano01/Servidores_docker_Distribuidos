<?php


$user = "wwwdata";

$password = "12345678";
//$password = "camilo123A*";

//$ipdb = "2.tcp.ngrok.io:18256";
$ipdb = "mysql";

$database = "products_database";

$table = "clientes";

//Desde github
//$propFileName = file_get_contents("https://raw.githubusercontent.com/CamiloMolano01/CamiloMolano01.github.io/master/propiedades.txt");

$propFileName = file_get_contents("https://drive.google.com/uc?id=1fNeUNcDHmVjhf6BmOviNJcYqMKiHic99&export=download");

//Link normal, se debe editar para descargar
//$propFileName = file_get_contents("https://drive.google.com/file/d/1fNeUNcDHmVjhf6BmOviNJcYqMKiHic99/view");

//Como se haría con un archivo local
//$propFileName = "/home/camilo/Downloads/propiedades4punto.txt";
//$ini_array = parse_ini_file($propFileName);
echo "Hola soy el servidor #1";

$ini_array = parse_ini_string($propFileName, true);
//echo "<p>" . $ini_array . "</p>"
echo "<p>Propiedades</p>";
echo "<p>Primer Nombre: " . $ini_array['user.name.first'] . "</p>";
echo "<p>Segundo Nombre: " . $ini_array['user.name.second'] . "</p>";
echo "<p>Primer Apellido: " . $ini_array['user.lastname.first'] . "</p>";
echo "<p>Segundo Apellido: " . $ini_array['user.lastname.second'] . "</p>";
echo "<p>Fecha de nacimiento: " . $ini_array['user.date.born'] . "</p>";





try {

  $db = new PDO("mysql:host=$ipdb;dbname=$database", $user, $password);

  echo "<h2>TODO</h2><ol>";

  foreach($db->query("SELECT nombre,telefono FROM $table") as $row) {

    echo "<li>" ."Nombre o ID: ". $row['nombre']." Descripcion: ".$row['telefono'] . "</li>";

  }

  echo "</ol>";
  
} catch (PDOException $e) {

    print "Error!: " . $e->getMessage() . "<br/>";

    die();

}

