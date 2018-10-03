<?php

function consultasql($sql){
	$link = mysqli_connect("localhost", "root","pass","DB");
	$resultado = mysqli_query($link, $sql);
	mysqli_close($link);

	return $resultado;
}