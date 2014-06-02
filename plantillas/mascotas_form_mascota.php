<div class="form-mascotas">
<form action="" name="mascotas" id="mascotas" method="post" role="form" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="id_mascota">CÓDIGO:</label>
                    <input type="text" name="id_mascota" id="id_mascota" class="form-control input-sm" maxlength="6" <?php echo (isset($_GET['visualizar']))?'readonly="readonly"':''; ?> <?php echo (isset($mascota['id_mascota']))?'value="'.$mascota['id_mascota'].'"':''; ?> />
                </div>
                <div class="form-group col-md-3">
                    <label for="chip_mascota">CHIP:</label>
                    <input type="text" name="chip_mascota" id="chip_mascota" maxlength="15" class="form-control input-sm" placeholder="# Chip" <?php echo (isset($mascota['chip_mascota']))?'value="'.$mascota['chip_mascota'].'"':''; ?> data-validation="custom" data-validation-regexp="^\d{15}$" data-validation-error-msg="Introduzca un nº chip de 15 dígitos." />
                </div>
                <div class="form-group col-md-3 col-md-offset-4">
                    <label for="falta_mascota">FECHA ALTA:</label>
                    <input type="text" name="falta_mascota" id="falta_mascota" class="form-control calendario input-sm" placeholder="DD/MM/AAAA" <?php echo (isset($mascota['falta_mascota']))?'value="'.formatear_fecha($mascota['falta_mascota']).'"':''; ?> <?php echo (isset($_GET['visualizar']))?'readonly':''; ?> data-validation="date" data-validation-format="dd/mm/yyyy" data-validation-error-msg="Introduzca una fecha alta correcta." data-validation-optional="true" />
                </div>
            </div>
            <div class="row">
                 <div class="form-group col-md-4">
                    <label for="nombre_mascota">NOMBRE:</label>
                    <input type="text" name="nombre_mascota" id="nombre_mascota" class="form-control input-sm" placeholder="Nombre de la mascota" <?php echo (isset($mascota['nombre_mascota']))?'value="'.$mascota['nombre_mascota'].'"':''; ?> data-validation="custom" data-validation-regexp="^[a-zñáéíóúA-ZÑÁÉÍÓÚÜ]+(\s[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ]+)*$" data-validation-error-msg="Introduzca un nombre correcto." />
                </div>
                <div class="form-group col-md-4">
                    <label for="raza_mascota">RAZA:</label>
                    <input type="text" name="raza_mascota" id="raza_mascota" class="form-control input-sm" placeholder="Raza" <?php echo (isset($mascota['raza_mascota']))?'value="'.$mascota['raza_mascota'].'"':''; ?> data-validation="custom" data-validation-regexp="^[a-zñáéíóúA-ZÑÁÉÍÓÚÜ]+(\s[a-zñáéíóúüA-ZÑÁÉÍÓÚÜ]+)*$" data-validation-error-msg="Introduzca una raza correcta." />
                </div>
                <div class="form-group col-md-3 col-md-offset-1">
                    <label for="fnac_mascota">FECHA NAC.:</label>
                    <input type="text" name="fnac_mascota" id="fnac_mascota" class="form-control calendario input-sm" placeholder="DD/MM/AAAA" <?php echo (isset($mascota['fnac_mascota']))?'value="'.formatear_fecha($mascota['fnac_mascota']).'"':''; ?> data-validation="date" data-validation-format="dd/mm/yyyy" data-validation-error-msg="Introduzca una fecha nacimiento correcta." />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label>SEXO:</label>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="sexo_mascota_h" value="hembra" name="genero_mascota" <?php echo (isset($mascota['genero_mascota']) && $mascota['genero_mascota']=='hembra')?'checked':''; ?> data-validation="required" /> 
                                </span>
                                <div class="form-control input-sm">
                                    <label for="sexo_mascota_h">Hembra</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="sexo_mascota_m" value="macho" name="genero_mascota" <?php echo (isset($mascota['genero_mascota']) && $mascota['genero_mascota']=='macho')?'checked':''; ?> data-validation="required" />
                                </span>
                                <div class="form-control input-sm">
                                    <label for="sexo_mascota_m">Macho</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="peso_mascota">PESO:</label>
                    <input type="text" name="peso_mascota" id="peso_mascota" class="form-control input-sm" placeholder="Peso (xx.xxx) kgs." <?php echo (isset($mascota['peso_mascota']))?'value="'.$mascota['peso_mascota'].'"':''; ?> data-validation="custom" data-validation-regexp="^\d{1,2}([.]\d{1,3})?$" data-validation-error-msg="Introduzca un peso correcto." data-validation-optional="true" />
                </div>
                <div class="form-group col-md-4 col-md-offset-1">
                    <label for="librovac_mascota">&nbsp;</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" id="librovac_mascota" value="1" name="librovac_mascota" <?php echo (isset($mascota['librovac_mascota']) && $mascota['librovac_mascota']==1)?'checked':''; ?> /> 
                        </span>
                        <div class="form-control input-sm">
                            <label for="librovac_mascota">CARTILLA VACUNAS</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="thumbnail">
                <?php
                    if (isset($mascota['id_mascota']) && file_exists(Mascota::$url_fotos.$mascota['id_mascota'].".jpg")){
                        $url=Mascota::$url_fotos.$mascota['id_mascota'].".jpg";
                        $title=$mascota['nombre_mascota']." - ".$mascota['raza_mascota']." - ".formatear_fecha($mascota['fnac_mascota']);
                        $alt=$mascota['id_mascota'].".jpg";
                    } else {
                        $url=Mascota::$url_fotos."no_photo.jpg";
                        $title="NO HAY FOTO";
                        $alt="no_photo.jpg";
                    }
                ?>
                <a href="<?php echo $url; ?>" data-lightbox="image-1" data-title="<?php echo $title; ?>">
                <img alt="<?php echo $alt; ?>" src="<?php echo $url; ?>" title="<?php echo $title; ?>" class="img-rounded" id="img-frame" data-lightbox="image-1" data-title="PLUTO" />
                </a>
                <div class="fileUpload btn btn-info btn-sm center-block">
                    <span><i class="fa fa-camera fa-lg"></i>&nbsp;&nbsp;ADJUNTAR</span>
                    <input id="btn-add-photo" type="file" class="upload" name="foto_mascota" data-validation="mime size" data-validation-allowing="jpg, png" 
		 data-validation-max-size="1M" data-validation-optional="true" data-validation-error-msg="Seleccione archivo JPG/PNG menor de 1024Kb." />
                </div>
                <input id="url-add-photo" class="form-control" placeholder="Choose File" disabled="disabled" />
            </div>
        </div>
    </div>
    <div class="line-break"></div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="id_cliente">CLIENTE: </label>
            <select name="id_cliente" id="id_cliente" class="form-control input-sm" data-validation="required" data-validation-error-msg="Seleccione un cliente.">
                <option value=''>Código ...</option>
                <!-- Recuperamos clientes de la DB. -->
                <?php
                    $clientes=Cliente::get_clientes(1);    //Solo quiero los clientes activo=1(true).
                    //var_dump($clientes);
                    foreach($clientes as $cliente){
                        $option="<option value='{$cliente['id_cliente']}'";
                        if (isset($mascota['id_cliente'])&&($mascota['id_cliente']==$cliente['id_cliente'])){
                            $option.=' selected="selected"';
                            $id_cliente=$cliente['id_cliente'];
                            $nombre=$cliente['nombre_cliente'];
                            $apellidos=$cliente['apellidos_cliente'];
                            $nif=$cliente['nif_cliente'];
                            $tfno1=$cliente['tfno1_cliente'];
                            $tfno2=$cliente['tfno2_cliente'];
                            $email=$cliente['email_cliente'];
                            $localidad=$cliente['cpostal_cliente']." - ".$cliente['nombre_localidad'];
                        }
                        $option.=">{$cliente['id_cliente']}</option>";
                        echo $option;
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-md-3 col-md-offset-1">
            <label for="nombre_cliente">NOMBRE:</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control input-sm" placeholder="Nombre del Cliente" <?php echo (isset($nombre))?'value="'.$nombre.'"':''; ?> disabled="disabled" />
        </div>
        <div class="form-group col-md-4">
            <label for="apellidos_cliente">APELLIDOS:</label>
            <input type="text" name="apellidos_cliente" id="apellidos_cliente" class="form-control input-sm" placeholder="Apellidos del Cliente" <?php echo (isset($apellidos))?'value="'.$apellidos.'"':''; ?> disabled="disabled" />
        </div>
        <div class="form-group col-md-2">
            <label for="nif_cliente">NIF:</label>
            <input type="text" name="nif_cliente" id="nif_cliente" class="form-control input-sm" placeholder="NIF del Cliente" <?php echo (isset($nif))?'value="'.$nif.'"':''; ?> disabled="disabled" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="tfno1_cliente">TFNO. 01:</label>
            <input type="text" name="tfno1_cliente" id="tfno1_cliente" class="form-control input-sm" placeholder="Tfno. 01" <?php echo (isset($tfno1))?'value="'.$tfno1.'"':''; ?> disabled="disabled" />
        </div>
        <div class="form-group col-md-2">
            <label for="tfno2_cliente">TFNO. 02:</label>
            <input type="text" name="tfno2_cliente" id="tfno2_cliente" class="form-control input-sm" placeholder="Tfno. 02" <?php echo (isset($tfno2))?'value="'.$tfno2.'"':''; ?> disabled="disabled" />
        </div>
        <div class="form-group col-md-4">
            <label for="email_cliente">EMAIL:</label>
            <input type="text" name="email_cliente" id="email_cliente" class="form-control input-sm" placeholder="Email" <?php echo (isset($email))?'value="'.$email.'"':''; ?> disabled="disabled" />
        </div>
        <div class="form-group col-md-2">
            <label for="localidad_cliente">LOCALIDAD:</label>
            <input type="text" name="localidad_cliente" id="localidad_cliente" class="form-control input-sm" placeholder="Localidad" <?php echo (isset($localidad))?'value="'.$localidad.'"':''; ?> disabled="disabled" />
        </div>
        <div class="form-group col-md-2">
            <label for="">&nbsp;</label>
            <div class="input-group">
            <a href="<?php echo (isset($id_cliente))?'./clientes.php?visualizar=true&id_cliente='.$id_cliente:'#'; ?>" title="IR A FICHA" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i>&nbsp;&nbsp;VER FICHA&nbsp;&nbsp;</a>
            </div>
        </div>
    </div>
    <div class="line-break"></div>
    <p><i class="fa fa-calendar fa-lg"></i>&nbsp;&nbsp;<strong>LISTADO DE CITAS</strong>&nbsp;&nbsp;<i class="fa fa-calendar fa-lg"></i></p>
    <div id="citas-mascota">
        <table class="table table-condensed col-md-10">
            <tr>
                <th class="col-md-1">FECHA</th>
                <th class="col-md-1">HORA</th>
                <th class="col-md-1">SERVICIO</th>
                <th class="col-md-3">DESCRIPCION</th>
                <th class="col-md-1">VER CITA</th>
            </tr>
            <tr>
                <td>10/10/2009</td>
                <td>10:30</td>
                <td>PELUQUERIA</td>
                <td>Corte Normal + Corte uñas.asdaadsasdadasda d asd a sd a sd a sd a d a d a sd as dasd</td>
                <td><a href="./citas.php?ver_cita=1" title="IR A CITA" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
            </tr>
            <tr>
                <td>10/10/2009</td>
                <td>10:30</td>
                <td>PELUQUERIA</td>
                <td>Corte Normal + Corte uñas.</td>
                <td><a href="./citas.php?ver_cita=1" title="IR A CITA" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
            </tr>
            <tr>
                <td>10/10/2009</td>
                <td>10:30</td>
                <td>PELUQUERIA</td>
                <td>Corte Normal + Corte uñas.</td>
                <td><a href="./citas.php?ver_cita=1" title="IR A CITA" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
            </tr>
            <tr>
                <td>10/10/2009</td>
                <td>10:30</td>
                <td>PELUQUERIA</td>
                <td>Corte Normal + Corte uñas.</td>
                <td><a href="./citas.php?ver_cita=1" title="IR A CITA" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
            </tr>        
        </table>
    </div>
    <div class="line-break"></div>
    <div class="form-group">
        <label for="notas_mascota">OBSERVACIONES</label>
        <textarea name="notas_mascota" class="form-control" placeholder="Introduzca observaciones ..." rows="5"><?php echo (isset($mascota['notas_mascota']))?$mascota['notas_mascota']:''; ?></textarea>
    </div>
    <div class="line-break"></div>
    <div class="form-group">
        <?php if (isset($_GET['visualizar'])): ?>
            <button type="submit" name="modificar" title="GUARDAR" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i>&nbsp; GUARDAR</button>
            <a href="./mascotas.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a>
        <?php else: ?>
            <button type="submit" name="alta" id="btn-alta" class="btn btn-primary"><i class="fa fa-user fa-lg"></i>&nbsp; ALTA NUEVA</button>
            <button type="submit" name="buscar" id="btn-buscar" class="btn btn-primary"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
        <?php endif; ?>
    </div>
</form>
<div class="clearfix"></div>
</div>