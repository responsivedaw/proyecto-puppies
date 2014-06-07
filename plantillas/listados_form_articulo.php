<div class="tab-pane active" id="anclaArticulos">
	<div class="form-listados-articulo">
	<form action="" name="listados-articulo" class="" method="post">
		<fieldset name="articulo_legend">
			<legend>ARTICULOS</legend>
			<div class="row">
				<div class="form-group col-md-5 col-xs-8">
					<label for="nombre">Categoría:</label>
					<select name="id_categoria" class="form-control"> 
						<option value="0">Seleccionar categoría</option>
							<?php foreach($categorias as $categoria): ?>
								<option value="<?php echo $categoria['id_categoria']; ?>" <?php echo (isset($datos['id_categoria']) && ($datos['id_categoria']==$categoria['id_categoria']))?' selected="selected" ':' ';?>><?php echo $categoria['denom_categoria']; ?></option>
							<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-5 col-xs-8">
					<label for="proveedor">Proveedor:</label>
					<select name="id_proveedor" class="form-control">
						<option value="0">Seleccionar proveedor</option>
						<?php foreach($proveedores as $proveedor): ?>
							<option value="<?php echo $proveedor['id_proveedor']; ?>" <?php echo (isset($datos['id_proveedor']) && ($datos['id_proveedor']==$proveedor['id_proveedor']))?' selected="selected" ':' ';?>><?php echo $proveedor['nombre_proveedor']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-2 col-xs-4">
					<label for="nombre">Stock:</label>
					<input type="text" name="stock_articulo" class="form-control" placeholder="Cantidad" value="<?php if(isset($datos['stock_articulo'])) echo $datos['stock_articulo']; ?>"/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-3 col-xs-4">
					<label for="prcompra">Precio proveedor(€):</label>
					<input type="text" name="prcompra_articulo" class="form-control" placeholder="Precio de compra" value="<?php if(isset($datos['prcompra_articulo'])) echo $datos['prcompra_articulo']; ?>"/>
				</div>
				<div class="form-group col-md-3 col-xs-4">
					<label for="prventa">Precio venta(€):</label>
					<input type="text" name="prventa_articulo" class="form-control" placeholder="Precio de venta" value="<?php if(isset($datos['prventa_articulo'])) echo $datos['prventa_articulo']; ?>"/>
				</div>
				<div class="form-group col-md-2 col-xs-4">
					<label for="IVA">IVA(%):</label>
					<input type="text" name="iva_articulo" class="form-control" placeholder="IVA aplicado" value="<?php if(isset($datos['iva_articulo'])) echo $datos['iva_articulo']; ?>"/>
				</div>
			</div>
			<div class="line-break"></div>
			<div class="form-group">
				<button type="submit" name="buscar_articulos" class="btn btn-primary"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
			</div>
		</fieldset>
	</form>
	<div class="clearfix"></div>
	</div>
</div>