<div class="form-categorias">
<form action="" name="categorias" class="" method="post" id="categorias">
    <div class="row">
        <div class="form-group col-md-2 col-xs-2">
            <label for="id_categoria">Cod.:</label>
            <input type="text" name="id_categoria" id="id_categoria" class="form-control" maxlength="6" value="<?php if(isset($datos['id_categoria'])) echo $datos['id_categoria']; ?>" <?php echo (isset($_GET['visualizar']))?'readonly="readonly"':''; ?> />
        </div>
        <div class="form-group col-md-4 col-xs-8">
			<label for="denom_categoria">Denominación:</label>
			<input type="text" name="denom_categoria" id="denom_categoria" class="form-control" maxlength="6" value="<?php if(isset($datos['denom_categoria'])) echo $datos['denom_categoria']; ?>" data-validation="length" data-validation-length="5-100" data-validation-error-msg="Introduzca una denominación de artículo correcta."/>
		</div>
    </div>
    <div class="row">
        <div class="form-group">
			<label for="desc_categoria">Descripción:</label>
			<textarea rows="4" cols="40" name="desc_categoria" class="form-control" placeholder="Introduzca la descripción de la categoría" ><?php echo (isset($cliente['desc_categoria']))?$cliente['desc_categoria']:''; ?></textarea>
		</div>
    </div>
    <p><i class="fa fa-shopping-cart fa-lg"></i> <strong>ÚLTIMOS PEDIDOS</strong> <i class="fa fa-shopping-cart fa-lg"></i></p>
    <div id="pedidos-proveedores">
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
    <div class="form-group">
			<label for="notas_categoria">OBSERVACIONES</label>
			<textarea rows="4" cols="40" name="notas_categoria" class="form-control" placeholder="Introduzca observaciones ..." ><?php echo (isset($categoria['notas_categoria']))?$categoria['notas_categoria']:''; ?></textarea>
		</div>
	<div class="line-break"></div>
    <div class="form-group">
        <?php if (isset($_GET['visualizar'])): ?>
            <button type="submit" name="modificar" title="GUARDAR" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i>&nbsp; GUARDAR</button>
            <a href="./proveedores.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a>
        <?php else: ?>
            <button type="submit" name="alta" class="btn btn-primary"><i class="fa fa-user fa-lg"></i>&nbsp; ALTA NUEVA</button>
            <button type="submit" name="buscar" class="btn btn-primary" id="btn-buscar"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
        <?php endif; ?>
    </div>
</form>
<div class="clearfix"></div>
</div>