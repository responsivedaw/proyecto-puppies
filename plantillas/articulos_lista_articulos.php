<h2 class="">LISTADO ARTICULOS <span class="label label-default"><?php echo sizeof($resultados); ?></span></h2>
<br/>
<table class="table table-striped table-bordered col-sm-12">
	<tr>
		<th>CODIGO</th>
		<th>DENOMINACION</th>
		<th>STOCK</th>
		<th>CATEGORIA</th>
		<th>PROVEEDOR</th>
		<th colspan="2">ACCION</th>
	</tr>
	<?php foreach ($resultados as $fila): ?>	<!-- Arriba declarado $fila_articulo y abajo usado como $fila -->
		<tr>
			<td><?php echo $fila['id_articulo']; ?></td>
			<td><?php echo $fila['denom_articulo']; ?></td>
			<td><?php echo $fila['stock_articulo']; ?></td>
			<td><?php $categoria=Categoria::get_categoria($fila['id_categoria']);
					echo $categoria['denom_categoria'] ?></td>
			<td><?php $proveedor=Proveedor::get_proveedor($fila['id_proveedor']);
					echo $proveedor['nombre_proveedor']; ?></td>
			<td><a href="articulos.php?borrar=true&id_articulo=<?php echo $fila['id_articulo'];?>&id_categoria=<?php echo $fila['id_categoria'];?>&id_proveedor=<?php echo $fila['id_proveedor'];?>" title="borrar" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg"></i>&nbsp;BORRAR</a></td>
			<td><a href="articulos.php?visualizar=true&id_articulo=<?php echo $fila['id_articulo'];?>" title="visualizar" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i>&nbsp;VISUALIZAR</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<div class="center-block">
	<p class="center-block"><a href="./articulos.php" title="volver" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
</div>