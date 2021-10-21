<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>


<style>
	table tr td {
		border: #333 1px solid;
	}
</style>

<?php
include("configuracion.php");

$query = "SELECT * FROM distritos";
$result = mysql_query($query);


?>


<table>
	<tr>
		<th>id</th>
		<th>nombre</th>
		<th>distrito</th>
		<th>clave</th>
		<th>municipio</th>
		<th>zona</th>
		<th>casilla</th>
		<th>pan</th>
		<th>pri</th>
		<th>prd</th>
		<th>morena</th>
	</tr>

<?php

while($row = mysql_fetch_assoc($result)) {

	$id 		= $row['id'];
	$distrito 	= $row['distrito'];
	$zona 		= $row['zona'];
	$clave 		= $row['clave'];


	//$municipio 	= mb_convert_encoding($row['municipio'], 'ASCII');

	$municipio 	= utf8_encode($row['municipio']);
	

	$array_casillas = ['Básica', 'Contigua 1', 'Extraordinaria', 'Especial'];
	$array_nombre = ['Luis', 'Juan', 'Daniel', 'Pedro', 'Martha', 'María', 'Guadalupe'];
	$conteo_array_casillas = count($array_casillas);


	$array_1 		= [455, 410, 492, 401, 510];
	$array_2 		= [405, 360, 452, 351, 400];
	$array_3 		= [355, 310, 402, 301, 410];
	$array_pocos 	= [5, 10, 2, 17, 0];
	



	for($i = 0; $i < $conteo_array_casillas; $i++) {

		$random		= rand(  1, count($array_casillas)  );
		$casilla 	= $array_casillas[ ($random - 1) ];	
		unset( $array_casillas[ ($random - 1) ] );
		sort($array_casillas);
		$nombre = $array_nombre[ rand(0, (count($array_nombre)-1)) ];

		
		
		$pan = $array_3[rand(0, 4)];
		$pri = $array_2[rand(0, 4)];
		$prd = $array_3[rand(0, 4)];
		$pt = $array_pocos[rand(0, 4)];
		$pv = $array_pocos[rand(0, 4)];
		$na = $array_pocos[rand(0, 4)];

		$morena = $array_1[rand(0, 4)];

		$es = $array_pocos[rand(0, 4)];
		$ind = $array_pocos[rand(0, 4)];


		$query_insert = "INSERT INTO votoxvoto VALUES('', '', '$nombre', '$distrito', '$clave', '$municipio', '$zona', '$casilla', '$pan', '$pri', '$prd', '$pt', '$pv', '$na', '$morena', '$es', '$ind')";

		mysql_query($query_insert);

	?>



		<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $nombre; ?></td>
			<td><?php echo $distrito; ?></td>

			<td><?php echo $clave; ?></td>
			<td><?php echo $municipio; ?></td>

			<td><?php echo $zona; ?></td>
			<td><?php echo $casilla; ?></td>

			<td><?php echo $pan; ?></td>
			<td><?php echo $pri; ?></td>
			<td><?php echo $prd; ?></td>
			<td><?php echo $morena; ?></td>
		</tr>
	
		

	<?php }

}

echo "</table>";
?>


	
</body>
</html>