<div class="form-articulos">
	<form name="articulos" class="" method="post" action="" id="articulos">
		<div class="row">
			<div class="form-group col-md-2 col-xs-4">
				<label for="codigo">Cod:</label>
				<input type="text" name="id_articulo" class="form-control" maxlength="6"  value="<?php if(isset($datos['id_articulo'])) echo $datos['id_articulo']; ?>" <?php echo(isset($_GET['visualizar']))?'readonly':"";?>  />
			</div>
			<div class="form-group col-md-4 col-xs-8">
				<label for="nombre">Nombre:</label>
				<input type="text" name="denom_articulo" class="form-control" placeholder="Introduzca un artículo" value="<?php if(isset($datos['denom_articulo'])) echo $datos['denom_articulo']; ?>" data-validation="custom" data-validation-regexp="^[a-zñáéíóúA-ZÑÁÉÍÓÚÜ0-9]+(\s[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ0-9]+)*$" data-validation-error-msg="Introduzca un artículo correcto."/>
			</div>
			<div class="form-group col-md-4 col-xs-8">
				<label for="nombre">Categoría:</label>
				<select name="id_categoria" class="form-control" data-validation="required"  data-validation-error-msg="Tiene que seleccionar una categoría"> 
					<option value="">Seleccionar categoría</option>
						<?php foreach($categorias as $categoria): ?>
							<option value="<?php echo $categoria['id_categoria']; ?>" <?php echo (isset($datos['id_categoria']) && ($datos['id_categoria']==$categoria['id_categoria']))?' selected="selected" ':' ';?>><?php echo $categoria['denom_categoria']; ?></option>
						<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-2 col-xs-4">
				<label for="nombre">Stock:</label>
				<input type="text" name="stock_articulo" class="form-control" placeholder="Cantidad" value="<?php if(isset($datos['stock_articulo'])) echo $datos['stock_articulo']; ?>" data-validation="number" data-validation-allowing="float" data-validation-decimal-separator="," data-validation-error-msg="Introduzca una cantidad válida"/>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4 col-xs-8">
				<label for="proveedor">Proveedor:</label>
				<select name="id_proveedor" class="form-control" data-validation="required"  data-validation-error-msg="Tiene que seleccionar un proveedor">
					<option value="">Seleccionar proveedor</option>
					<?php foreach($proveedores as $proveedor): ?>
						<option value="<?php echo $proveedor['id_proveedor']; ?>" <?php echo (isset($datos['id_proveedor']) && ($datos['id_proveedor']==$proveedor['id_proveedor']))?' selected="selected" ':' ';?>><?php echo $proveedor['nombre_proveedor']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-3 col-xs-4">
				<label for="prcompra">Precio proveedor(€):</label>
				<input type="text" name="prcompra_articulo" class="form-control" placeholder="Precio de compra" value="<?php if(isset($datos['prcompra_articulo'])) echo $datos['prcompra_articulo']; ?>" data-validation="number" data-validation-allowing="float" data-validation-help="Introduce cantidad con el formato 0,0" data-validation-error-msg="Tiene que seleccionar precio válido"/>
			</div>
			<div class="form-group col-md-3 col-xs-4">
				<label for="prventa">Precio venta(€):</label>
				<input type="text" name="prventa_articulo" class="form-control" placeholder="Precio de venta 0,0" value="<?php if(isset($datos['prventa_articulo'])) echo $datos['prventa_articulo']; ?>" data-validation="number" data-validation-allowing="float" data-validation-help="Introduce cantidad con el formato 0,0" data-validation-error-msg="Tiene que seleccionar precio válido"/>
			</div>
			<div class="form-group col-md-2 col-xs-4">
				<label for="IVA">IVA(%):</label>
				<input type="text" name="iva_articulo" class="form-control" placeholder="IVA aplicado" value="<?php if(isset($datos['iva_articulo'])) echo $datos['iva_articulo']; ?>"  data-validation="number" data-validation-allowing="range[1;40]" data-validation-error-msg="Introduzca un IVA correcto"/>
			</div>
		</div>
		<div class="line-break"></div>
		<p><i class="fa fa-shopping-cart fa-lg"></i> <strong>ÚLTIMOS PEDIDOS</strong> <i class="fa fa-shopping-cart fa-lg"></i></p>
		<div id="pedidos-articulos">
			<table class="table table-condensed col-md-10">
				<tbody>
					<tr>
						<th class="col-md-1">ID PEDIDO</th>
						<th class="col-md-1">FECHA</th>
						<th class="col-md-1">CANTIDAD</th>
						<th class="col-md-1">IMPORTE</th>
						<th class="col-md-2">PROVEEDOR</th>
						<th class="col-md-1">VER FICHA</th>
					</tr>
					<tr>
						<td>1237</td>
						<td>22/10/2013</td>
						<td>20</td>
						<td>310.6€</td>
						<td>Purina</td>
						<td><a href="" title="ver ficha" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
					</tr>
					<tr>
						<td>1235</td>
						<td>20/05/2013</td>
						<td>10</td>
						<td>155.3€</td>
						<td>Grupo Asis S.L.</td>
						<td><a href="" title="ver ficha" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="line-break"></div>
		<p><i class="fa fa-barcode fa-lg"></i> <strong> ÚLTIMAS FACTURAS</strong> <i class="fa fa-barcode fa-lg"></i></p>
		<div id="facturas-articulos">
			<table class="table table-condensed col-md-10">
				<tbody>
					<tr>
						<th class="col-md-1">ID FACTURA</th>
						<th class="col-md-1">FECHA</th>
						<th class="col-md-1">IMPORTE</th>
						<th class="col-md-1">FORMA PAGO</th>
						<th class="col-md-1">VER FICHA</th>
					</tr>
						<tr>
						<td>22478</td>
						<td>22/10/2013</td>
						<td>33.25€</td>
						<td>Efectivo</td>
						<td><a href="./images/prototipos/facturacion.jpg" title="ver ficha" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
					</tr>
						</tr>
						<tr>
						<td>15789</td>
						<td>11/04/2013</td>
						<td>66€</td>
						<td>Visa</td>
						<td><a href="./images/prototipos/facturacion.jpg" title="ver ficha" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="line-break"></div>
		<div class="form-group">
			<label for="notas_articulo">OBSERVACIONES</label>
			<textarea rows="4" cols="40" name="notas_articulo" class="form-control" placeholder="Introduzca observaciones ..." ><?php echo (isset($articulo['notas_articulo']))?$articulo['notas_articulo']:''; ?></textarea>
		</div>
		<div class="line-break"></div>
		<div class="form-group">
			<?php if (isset($_GET['visualizar'])): ?>
			<button type="submit" name="modificar" title="GUARDAR" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i>&nbsp; GUARDAR</button>
			<a href="./articulos.php" title="volver" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a>
			<?php else: ?>
			<button type="submit" name="alta" class="btn btn-primary"><i class="fa fa-user fa-lg"></i>&nbsp; ALTA NUEVA</button>
			<button type="submit" name="buscar" class="btn btn-primary" id="btn-buscar"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
			<?php endif; ?>
		</div>		
	</form>
	<div class="clearfix"></div>
</div>