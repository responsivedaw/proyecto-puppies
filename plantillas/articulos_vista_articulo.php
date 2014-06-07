<div class="panel panel-success">
<!-- Default panel contents -->
    <div class="panel-heading">
        <i class="fa fa-info-circle fa-lg"></i>
        <?php 
        if (isset($_POST['alta'])){
        echo ' ARTICULO CREADO CORRECTAMENTE ';
        } elseif (isset($_POST['modificar'])){
        echo ' ARTICULO ACTUALIZADO CORRECTAMENTE ';
        } else {
        echo ' ARTICULO ELIMINADO CORRECTAMENTE ';
        }      
        ?>
        <i class="fa fa-info-circle fa-lg"></i>
    </div>
    <div class="panel-body">
        <div class="row">
        <table class="table col-md-10">
            <tr class="success">
				<th>CODIGO</th>
				<th>DENOMINACIÓN</th>
				<th>STOCK</th>
				<th>CATEGORIA</th>
			</tr>
			<tr>
				<td><?php echo (isset($insertado))?$insertado:$datos['id_articulo']; ?></td>
				<td><?php echo $datos['denom_articulo']; ?></td>
				<td><?php echo $datos['stock_articulo']; ?></td>
				<td><?php echo $categoria['denom_categoria']; ?></td>
			</tr>
			<tr class="success">
				<th>PROVEEDOR</th>
				<th>PRECIO PROVEEDOR</th>
				<th>PRECIO VENTA</th>
				<th>IVA</th>
			</tr>
			<tr>
				<td><?php echo $proveedor['nombre_proveedor']; ?></td>
				<td><?php echo $datos['prcompra_articulo']; ?></td>
				<td><?php echo $datos['prventa_articulo']; ?></td>
				<td><?php echo $datos['iva_articulo']; ?></td>
			</tr>
			<tr class="success">
				<th colspan="4">NOTAS</th>
			</tr>
			<tr>
				<td colspan="4"><?php echo $datos['notas_articulo']; ?></td>
			</tr>
		</table>
		</div>
		<div class="line-break"></div>
		<p class="center-block"><a href="./articulos.php" title="volver" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
	</div>
</div>