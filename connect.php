<?php

	// Conexão com o banco de dados
	$servername = "localhost";
	$username = "u860881213_paulobarra";
	$password = "Ts22082020#";
	$db_name = "u860881213_bolao_pb";

	$connect = mysqli_connect($servername, $username, $password, $db_name);
	mysqli_set_charset($connect, "utf8");

	if(mysqli_connect_error()):
		echo "Falha na conexão".mysqli_connect_error();
	endif;