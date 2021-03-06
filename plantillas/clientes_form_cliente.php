<div class="form-clientes">
<form action="" name="clientes" id="clientes" method="post" role="form">
    <div class="row">
        <div class="form-group col-md-2 col-xs-2">
            <label for="id_cliente">CÓDIGO:</label>
            <input type="text" name="id_cliente" id="id_cliente" class="form-control input-sm" maxlength="6" <?php echo (isset($_GET['visualizar']))?'readonly="readonly"':''; ?> <?php echo (isset($cliente['id_cliente']))?'value="'.$cliente['id_cliente'].'"':''; ?> />
        </div>
        <div class="form-group col-md-5 col-xs-12">
            <label for="nombre_cliente">NOMBRE:</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control input-sm" placeholder="Introduzca un nombre" <?php echo (isset($cliente['nombre_cliente']))?'value="'.$cliente['nombre_cliente'].'"':''; ?> data-validation="custom" data-validation-regexp="^[a-zñáéíóúA-ZÑÁÉÍÓÚÜ]+(\s[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ]+)*$" data-validation-error-msg="Introduzca un nombre correcto." />
        </div>
        <div class="form-group col-md-5 col-xs-12">
            <label for="apellidos_cliente">APELLIDOS:</label>
            <input type="text" name="apellidos_cliente" id="apellidos_cliente" class="form-control input-sm" placeholder="Introduzca los Apellidos" <?php echo (isset($cliente['apellidos_cliente']))?'value="'.$cliente['apellidos_cliente'].'"':''; ?> data-validation="custom" data-validation-regexp="^[a-zñáéíóúA-ZÑÁÉÍÓÚÜ]+(\s[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ]+)*$" data-validation-error-msg="Introduzca un apellido correcto." />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2 col-xs-2">
            <label for="nif_cliente">NIF/NIE:</label>
            <input type="text" name="nif_cliente" id="nif_cliente" maxlength="10" class="form-control input-sm" placeholder="12345678P" <?php echo (isset($cliente['nif_cliente']))?'value="'.$cliente['nif_cliente'].'"':''; ?> data-validation="custom" data-validation-regexp="^\d{8}[a-zA-Z]$" data-validation-error-msg="Introduzca un NIF correcto." />
        </div>
        <div class="form-group col-md-2 col-xs-2">
            <label for="fnac_cliente">FECHA NAC.: </label>
            <input type="text" name="fnac_cliente" id="fnac_cliente" class="form-control  input-sm calendario" placeholder="DD/MM/AAAA" <?php echo (isset($cliente['fnac_cliente']))?'value="'.formatear_fecha($cliente['fnac_cliente']).'"':''; ?> data-validation="date" data-validation-format="dd/mm/yyyy" data-validation-error-msg="Introduzca una fecha correcta." />
        </div>
        <div class="form-group col-md-6 col-xs-5">
            <label>SEXO:</label>
            <div class="row">
                <div class="col-md-4 col-xs-5">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" id="sexo_cliente_f" value="f" name="sexo_cliente" <?php echo (isset($cliente['sexo_cliente']) && $cliente['sexo_cliente']=='f')?'checked':''; ?> /> 
                        </span>
                        <div class="form-control input-sm">
                            <label for="sexo_cliente_f">Femenino</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-5">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" id="sexo_cliente_m" value="m" name="sexo_cliente" <?php echo (isset($cliente['sexo_cliente']) && $cliente['sexo_cliente']=='m')?'checked':''; ?> />
                        </span>
                        <div class="form-control input-sm">
                            <label for="sexo_cliente_m">Masculino</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-2 col-xs-2 col-xs-offset-1">
            <label for="falta_cliente">FECHA ALTA: </label>
            <input type="text" name="falta_cliente" id="falta_cliente" class="form-control calendario input-sm" placeholder="DD/MM/AAAA" <?php echo (isset($cliente['falta_cliente']))?'value="'.formatear_fecha($cliente['falta_cliente']).'"':''; ?> <?php echo (isset($_GET['visualizar']))?'readonly':''; ?> />
        </div>
    </div>
    <div class="line-break"></div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="direccion_cliente">DIRECCIÓN: </label>
            <input type="text" name="direccion_cliente" id="direccion_cliente" class="form-control input-sm" <?php echo (isset($cliente['direccion_cliente']))?'value="'.$cliente['direccion_cliente'].'"':''; ?> placeholder="Introduzca la dirección" data-validation="length" data-validation-length="5-100" data-validation-error-msg="Introduzca una dirección correcta." />
        </div>
        <div class="form-group col-md-4 col-xs-6">
            <label for="cpostal_cliente">LOCALIDAD: </label>
            <select name="cpostal_cliente" id="cpostal_cliente" class="form-control input-sm" data-validation="required" data-validation-error-msg="Seleccione una localidad." />
                <option value=''>Seleccione Localidad ...</option>
                <!-- Recuperamos localidades de la DB. -->
                <?php
                $localidades=get_localidades();
                $provincia=null;
                foreach ($localidades as $localidad){
                    $option="<option value='{$localidad['cpostal_localidad']}'";
                    if (isset($cliente['cpostal_cliente'])&&($cliente['cpostal_cliente']==$localidad['cpostal_localidad'])){
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
            <label for="provincia_cliente">PROVINCIA:</label>
            <input type="text" name="provincia_cliente" id="provincia_cliente" class="form-control input-sm" readonly="readonly" <?php echo (isset($provincia))?'value="'.$provincia.'"':''; ?> />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2 col-xs-2">
            <label for="tfno1_cliente">TFNO. 01: </label>
            <input type="text" name="tfno1_cliente" id="tfno1_cliente" maxlength="13" class="form-control input-sm" <?php echo (isset($cliente['tfno1_cliente']))?'value="'.$cliente['tfno1_cliente'].'"':''; ?> placeholder="Nº teléfono" data-validation="custom" data-validation-regexp="^[6-9]\d{8}$" data-validation-error-msg="Introduzca un teléfono correcto." />
        </div>
        <div class="form-group col-md-2 col-xs-2">
             <label for="tfno2_cliente">TFNO. 02: </label>
            <input type="text" name="tfno2_cliente" id="tfno2_cliente" maxlength="13" class="form-control input-sm" <?php echo (isset($cliente['tfno2_cliente']))?'value="'.$cliente['tfno2_cliente'].'"':''; ?> placeholder="Nº teléfono" data-validation="custom" data-validation-regexp="^[6-9]\d{8}$" data-validation-error-msg="Introduzca un teléfono correcto." data-validation-optional="true" />
        </div>
        <div class="form-group col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1">
            <label for="email_cliente">Email: </label>
            <input type="email" name="email_cliente" id="email_cliente" class="form-control input-sm" <?php echo (isset($cliente['email_cliente']))?'value="'.$cliente['email_cliente'].'"':''; ?> placeholder="email@dominio.com" data-validation="email" data-validation-optional="true" data-validation-error-msg="Introduzca un email correcto." />
        </div>
        <div class="form-group col-md-3 col-xs-3">
            <label>¿RECEPCIÓN EMAILS?</label>
            <div class="row">
                <div class="col-md-4 col-xs-4">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" id="mailing_cliente_1" value="1" name="mailing_cliente" checked="checked" />
                        </span>
                        <div class="form-control input-sm">
                            <label for="mailing_cliente_1">SÍ</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 col-md-offset-1 col-xs-offset-1">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" id="mailing_cliente_0" value="0" name="mailing_cliente" <?php echo (isset($cliente['mailing_cliente']) && $cliente['mailing_cliente']==0)?'checked="checked"':''; ?> />
                        </span>
                        <div class="form-control input-sm">
                            <label for="mailing_cliente_0">NO</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="line-break"></div>
    <p><i class="fa fa-paw fa-lg"></i> <strong>MASCOTAS</strong> <i class="fa fa-paw fa-lg"></i></p>
    <div id="mascotas-cliente">
    <table class="table table-condensed col-md-10">
        <thead>
            <tr>
                <th class="col-md-1">#ID</th>
                <th class="col-md-1">#CHIP</th>
                <th class="col-md-2">NOMBRE</th>
                <th class="col-md-2">RAZA</th>
                <th class="col-md-1">SEXO</th>
                <th class="col-md-1"></th>
            </tr>
        </thead>       
        <tbody id="tabla-mascotas">
            <?php
                if (isset($mascotas)){
                    foreach ($mascotas as $mascota){
                        $salida="<tr>";
                        $salida.="<td>{$mascota['id_mascota']}</td>"; 
                        $salida.="<td>{$mascota['chip_mascota']}</td>"; 
                        $salida.="<td>{$mascota['nombre_mascota']}</td>"; 
                        $salida.="<td>{$mascota['raza_mascota']}</td>"; 
                        $salida.="<td>".strtoupper($mascota['genero_mascota'])."</td>"; 
                        $salida.="<td><a href='./mascotas.php?visualizar=true&id_mascota={$mascota['id_mascota']}' title='IR A FICHA' class='btn btn-success'><i class='fa fa-eye'></i>&nbsp;FICHA</a></td>"; 
                        $salida.="</tr>";
                        echo $salida;
                    }
                }           
            ?>
        </tbody>
    </table>
    </div>
    <div class="line-break"></div>
    <div class="form-group">
        <label for="notas_cliente">OBSERVACIONES</label>
        <textarea name="notas_cliente" class="form-control input-sm" placeholder="Introduzca observaciones ..." rows="5"><?php echo (isset($cliente['notas_cliente']))?$cliente['notas_cliente']:''; ?></textarea>
    </div>
    <div class="line-break"></div>
    <div class="form-group">
        <?php if (isset($_GET['visualizar'])): ?>
            <button type="submit" name="modificar" title="GUARDAR" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i>&nbsp; GUARDAR</button>
            <a href="./clientes.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a>
        <?php else: ?>
            <button type="submit" name="alta" id="btn-alta" class="btn btn-primary"><i class="fa fa-user fa-lg"></i>&nbsp; ALTA NUEVA</button>
            <button type="submit" name="buscar" id="btn-buscar" class="btn btn-primary"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
        <?php endif; ?>
    </div>
</form>
<div class="clearfix"></div>
</div>