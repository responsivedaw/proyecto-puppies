<div class="form-proveedores">
<form action="" name="proveedores" class="" method="post" id="proveedores">
    <div class="row">
        <div class="form-group col-md-2 col-xs-2">
            <label for="id_proveedor">Cod.:</label>
            <input type="text" name="id_proveedor" id="id_proveedor" class="form-control" maxlength="6" value="<?php if(isset($datos['id_proveedor'])) echo $datos['id_proveedor']; ?>" <?php echo (isset($_GET['visualizar']))?'readonly="readonly"':''; ?> />
        </div>
        <div class="form-group col-md-2 col-xs-2">
            <label for="nif_proveedor">CIF:</label>
            <input type="text" name="nif_proveedor" id="nif_proveedor" maxlength="10" class="form-control" placeholder="A12345678" value="<?php if(isset($datos['nif_proveedor'])) echo $datos['nif_proveedor']; ?>" data-validation="custom" data-validation-regexp="^\[A-Z]d{8}$" data-validation-error-msg="Introduzca un CIF correcto."/>
        </div>
        <div class="form-group col-md-8 col-xs-12">
            <label for="nombre_proveedor">Nombre:</label>
            <input type="text" name="nombre_proveedor" id="nombre_proveedor" class="form-control" placeholder="Empresa, S.A." value="<?php if(isset($datos['nombre_proveedor'])) echo $datos['nombre_proveedor']; ?>" data-validation="custom" data-validation-regexp="^[0-9a-zñáéíóúA-ZÑÁÉÍÓÚÜ]+(\s[0-9a-zñáéíóúA-ZÑÁÉÍÓÚÜ]+)*,?\sS\.[ALC]\.([AL]\.)?$" data-validation-error-msg="Introduzca un nombre correcto."/>
        </div>
    </div>
    <div class="line-break"></div>
    <div class="row">
        <div class="form-group col-md-12 col-xs-12">
            <label for="direccion_proveedor">Dirección: </label>
            <input type="text" name="direccion_proveedor" id="direccion_proveedor" class="form-control" placeholder="Introduzca la dirección" value="<?php if(isset($datos['direccion_proveedor'])) echo $datos['direccion_proveedor']; ?>" />
        </div>
        
        <div class="form-group col-md-4 col-xs-6">
            <label for="localidad_proveedor">Código Postal: </label>
            <select name="localidad_proveedor" id="localidad_proveedor" class="form-control" data-validation="required" data-validation-error-msg="Seleccione una localidad." />
				<option value=''>Seleccione Localidad ...</option>
				<!-- Recuperamos localidades de la DB. -->
				<?php
				$localidades=get_localidades();
				//$provincia=null;
				foreach ($localidades as $localidad){
					$option="<option value='{$localidad['cpostal_localidad']}'";
					if (isset($datos['localidad_proveedor'])&&($datos['localidad_proveedor']==$localidad['cpostal_localidad'])){
						$option.=' selected="selected"';
						$provincia=$localidad['provincia_localidad'];
					}
					$option.=">{$localidad['cpostal_localidad']} - {$localidad['nombre_localidad']}</option>";
					echo $option;
				}
				?>
			</select>
        </div>
		<div class="form-group col-md-2 col-xs-6">
            <label for="provincia_proveedor">Provincia:</label>
            <input type="text" name="provincia_proveedor" id="provincia_proveedor" class="form-control" readonly="readonly" <?php echo (isset($provincia))?'value="'.$provincia.'"':''; ?> />
        </div>   
    </div>
    <div class="row">
        <div class="form-group col-md-2 col-xs-4">
            <label for="tfno1_proveedor">Tfno. 01: </label>
            <input type="text" name="tfno1_proveedor" id="tfno1_proveedor" maxlength="13" class="form-control" placeholder="Nº teléfono" value="<?php if(isset($datos['tfno1_proveedor'])) echo $datos['tfno1_proveedor']; ?>" data-validation="custom" data-validation-regexp="^[6-9]\d{8}$" data-validation-error-msg="Introduzca un teléfono correcto."/>
        </div>
        <div class="form-group col-md-2 col-xs-4">
            <label for="tfno2_proveedor">Tfno. 02: </label>
            <input type="text" name="tfno2_proveedor" id="tfno2_proveedor" maxlength="13" class="form-control" placeholder="Nº teléfono" value="<?php if(isset($datos['tfno2_proveedor'])) echo $datos['tfno2_proveedor']; ?>" data-validation="custom" data-validation-regexp="^[6-9]\d{8}$" data-validation-error-msg="Introduzca un teléfono correcto." data-validation-optional="true"/>
        </div>
        <div class="form-group col-md-2 col-xs-4">
            <label for="fax_proveedor">Fax: </label>
            <input type="text" name="fax_proveedor" id="fax_proveedor" class="form-control" placeholder="Nº fax" value="<?php if(isset($datos['fax_proveedor'])) echo $datos['fax_proveedor']; ?>" data-validation="custom" data-validation-regexp="^[6-9]\d{8}$" data-validation-error-msg="Introduzca un fax correcto."/>
        </div>
        <div class="form-group col-md-6 col-xs-12">
            <label for="email_proveedor">Email: </label>
            <input type="text" name="email_proveedor" id="email_proveedor" class="form-control" placeholder="email@dominio.com" value="<?php if(isset($datos['email_proveedor'])) echo $datos['email_proveedor']; ?>" data-validation="email" data-validation-optional="true" data-validation-error-msg="Introduzca un email correcto." data-validation-optional="true"/>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-xs-6">
            <label for="web_proveedor">Página web: </label>
            <input type="text" name="web_proveedor" id="web_proveedor" class="form-control" placeholder="http://www.pagina.com" value="<?php if(isset($datos['web_proveedor'])) echo $datos['web_proveedor']; ?>" data-validation="url" data-validation-error-msg="Introduzca una dirección Web correcta."/>
        </div>
        <div class="form-group col-md-6 col-xs-6">
            <label for="contacto_proveedor">Persona de contacto: </label>
            <input type="text" name="contacto_proveedor" id="contacto_proveedor" class="form-control" placeholder="Nombre Apellido" value="<?php if(isset($datos['contacto_proveedor'])) echo $datos['contacto_proveedor']; ?>" data-validation-regexp="^[a-zñáéíóúA-ZÑÁÉÍÓÚÜ]+(\s[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ]+)*$" data-validation-error-msg="Introduzca un nombre y apellido correctos."/>
        </div>
    </div>
    <div class="line-break"></div>
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
			<label for="notas_proveedor">OBSERVACIONES</label>
			<textarea name="notas_proveedor" class="form-control" placeholder="Introduzca observaciones ..." rows="5"><?php echo (isset($proveedor['notas_proveedor']))?$cliente['proveedor_proveedor']:''; ?></textarea>
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