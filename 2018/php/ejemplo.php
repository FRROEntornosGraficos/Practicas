<?php
include "funciones.php";

if(!empty($_POST['nombre'])){

	if(strlen($_POST['nombre']) < 10){
		$mensaje = "El nombre es corto";
	}else{
		//Ejemplo:
		consultasql("INSERT INTO servicios VALUES ('','".$_POST['nombre']."');");
		//INSERT INTO servicios VALUES ('','Juan Perez');
	}
}

if(!empty($_GET['b']))
	consultasql("DELETE FROM servicios WHERE id = ".$_GET['b']);

if(true):
	rand();
	rand();
	rand();
	rand();
endif;


?>
</!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>

		<h1>Servicios</h1>
		<?php
		if(!empty($mensaje))
			echo "<span style='color:red;'>".$mensaje."</span>";
		?>
		<form method="POST" action="" name="f1">
			<span id="errores"></span>
			Nombre: <input type="text" name="nombre" />
			Apellido: <input type="text" name="apellido" />
			<input type="button" onclick="validar()" name="Crear" />
		</form>
		<script type="text/javascript">
			function validar(){
				var nombre = document.f1.nombre.value;
				var apellido = document.f1.apellido.value;
				var error = 0;


				if(nombre == "" || nombre == undefined){
					error = error + 1;
				}
				if(apellido == "" || apellido == undefined){
					error = error + 1;
				}

				if(error == 0){
					document.f1.submit;
				}else{
					alert("Complete todos los campos, tiene" + error + "errores");
					//document.f1.errores.html = "Error en 1,sfdfdsgsd";
				}
			}
		</script>
		<br />
		<hr />
		<br />
		<?php
		$resultadoServicios = consultasql("SELECT * FROM servicios ORDER BY id DESC;");

		if(!empty($resultadoServicios)){
			?>
			<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Eliminar</th>
					<th>Eliminar 2</th>
					<th>Eliminar 3</th>
				</tr>
				<?php
				while ($servicio = mysqli_fetch_array($resultadoServicios)) {
					echo "<tr>";
						echo "<td>".$servicio['id']."</td>";
						echo "<td>".$servicio['nombre']."</td>";
						echo "<td><a onclick='return confirm(\"Borrar? \");' href='ejemplo.php?b=".$servicio['id']."'>Eliminar</a></td>";

						

						echo "<td>";
						?>
						<a onclick='return confirm("Borrar? ");' 
							href='ejemplo.php?b=<?php echo $servicio['id']; ?>'>
							Eliminar
						</a>
						<?php
						echo "</td>";



						
						?>
						<td>
							<a onclick='return confirm("Borrar? ");' 
								href='ejemplo.php?b=<?= $servicio['id'] ?>'>
								Eliminar
							</a>
						</td>
						<?php
						

					echo "</tr>";
				}
				?>
			</table>

			<?php
		}
		?>
	</body>
</html>