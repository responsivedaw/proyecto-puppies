<?php
	// Recibimos las propiedades del objeto en una array asociativo.
	$datos=$cliente->to_array();
	//var_dump($datos);
?>
<div class="cliente-nuevo">
	<h2>CLIENTE INSERTADO CORRECTAMENTE</h2>
	<table class="table table-striped">
		<tr>
			<th>Código:</th>
		</tr>
		<tr>
			<td><?php echo $insertado; ?></td>
		</tr>
		<tr>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>NIF</th>
		</tr>
		<tr>
			<td><?php echo $datos['nombre_cliente']; ?></td>
			<td><?php echo $datos['apellidos_cliente']; ?></td>
			<td><?php echo $datos['nif_cliente']; ?></td>
		</tr>
		<tr>
			<th>Fecha Nac.</th>
			<th>Fecha Alta</th>
			<th>Sexo</th>
		</tr>
		<tr>
			<td><?php echo $datos['fnac_cliente']; ?></td>
			<td><?php echo $datos['falta_cliente']; ?></td>
			<td><?php echo strtoupper($datos['sexo_cliente']); ?></td>
		</tr>
		<tr>
			<th>Tfno. 01</th>
			<th>Tfno. 02</th>
			<th>Email</th>
			<th>Mailing</th>
		</tr>
		<tr>
			<td><?php echo $datos['tfno1_cliente']; ?></td>
			<td><?php echo $datos['tfno2_cliente']; ?></td>
			<td><?php echo $datos['email_cliente']; ?></td>
			<td><?php echo ($datos['mailing_cliente'])?'SI':'NO'; ?></td>
		</tr>
		<tr>
			<th colspan="4">
				Notas
			</th>
		</tr>
		<tr>
			<td colspan="4">
				<?php echo $datos['notas_cliente']; ?>
			</td>
		</tr>
	</table>
	<p class="center-block"><a href="./clientes.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
</div>