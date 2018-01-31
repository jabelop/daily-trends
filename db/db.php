<?php
    define('MYSQL_HOST', 'mysql:host=localhost'); // Nombre de host MYSQL (LOCAL)
    define('MYSQL_USUARIO', 'daily');              // Nombre de usuario de MySQL
    define('MYSQL_PASSWORD', 'Daily-Trends');     // Contraseña de usuario de MySQL
    class Conectar {

		function conectaDb(){
			try {
				$db = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
				$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
				return($db);
			} catch (PDOException $e) {
				print "<p>Error: No puede conectarse con la base de datos.</p>\n";
				print "<p>Error: " . $e->getMessage() . "</p>\n";
				exit();
			}
		}

}

?>
