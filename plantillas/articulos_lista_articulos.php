<form name="articulos" action="" method="post">
<table>
	<tr>
		<th>CODIGO</th>
		<th>DENOMINACION</th>
		<th>STOCK</th>
		<th>CATEGORIA</th>
		<th colspan="2">ACCION</th>
	</tr>
	<?php foreach ($resultados as $fila_articulo): ?>
		<tr>
			<td><?php echo $fila['id_articulo']; ?></td>
			<td><?php echo $fila['denom_articulo']; ?></td>
			<td><?php echo $fila['stock_articulo']; ?></td>
			<td><?php echo $fila['id_categoria']; ?></td>
			<td><input type="submit" name="eliminar" value="BORRAR" class="btn-eliminar"/>&nbsp;
				<input type="submit" name="visualizar" value="VISUALIZAR" class="btn-visualizar"/></td>
		</tr>
		<!-- DIBUJAR CADA UNA DE LAS FILAS Y SUS BOTONES SUBMIT -->
	<?php endforeach; ?>
	}
</table>
</form>