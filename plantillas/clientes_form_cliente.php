<div class="container">
    <div class="row">
    <div class="col-md-10 form-clientes">
        <form action="" class="form-inline" name="form-clientes" method="post">
            <div class="form-group">
                <div class="col-md-2">
                    <label for="id_cliente" class="col-md-5">Cód.:&nbsp;</label>
                    <input type="text" name="id_cliente" id="id_cliente" class="col-md-7" size="5" <?php echo (isset($_GET['visualizar']))?'readonly="readonly"':''; ?> <?php echo (isset($cliente['id_cliente']))?'value="'.$cliente['id_cliente'].'"':''; ?>/>
                </div>
                <div class="col-md-5">
                    <label for="nombre_cliente" class="col-md-3">Nombre:&nbsp;</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" class="col-md-9" size="15" placeholder="Introduzca un nombre" <?php echo (isset($cliente['nombre_cliente']))?'value="'.$cliente['nombre_cliente'].'"':''; ?> />
                </div>
                <div class="col-md-5">
                    <label for="apellidos_cliente" class="col-md-3">Apellidos:&nbsp;</label>
                    <input type="text" name="apellidos_cliente" id="apellidos_cliente" class="col-md-9" size="50" placeholder="Introduzca los Apellidos" <?php echo (isset($cliente['apellidos_cliente']))?'value="'.$cliente['apellidos_cliente'].'"':''; ?> />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    <label for="nif_cliente" class="col-md-5">NIF/NIE: </label>
                    <input type="text" name="nif_cliente" id="nif_cliente" size="8" class="col-md-7" placeholder="12345678P" <?php echo (isset($cliente['nif_cliente']))?'value="'.$cliente['nif_cliente'].'"':''; ?> />
                </div>
                <div class="col-md-3">
                    <label for="fnac_cliente" class="col-md-6">Fecha Nac.: </label>
                    <input type="text" name="fnac_cliente" id="fnac_cliente" class="col-md-6" placeholder="DD/MM/AAAA" <?php echo (isset($cliente['fnac_cliente']))?'value="'.formatear_fecha($cliente['fnac_cliente']).'"':''; ?> />
                </div>
                <div class="col-md-3">
                    <label for="falta_cliente" class="col-md-6">Fecha Alta: </label>
                    <input type="text" name="falta_cliente" id="falta_cliente" class="col-md-6" placeholder="DD/MM/AAAA" <?php echo (isset($cliente['falta_cliente']))?'value="'.formatear_fecha($cliente['falta_cliente']).'"':''; ?> <?php echo (isset($_GET['visualizar']))?'readonly':''; ?> />
                </div>
                <div class="col-md-3">
                    <label for="sexo_cliente" class="col-md-3">SEXO: </label>
                    <input type="radio" name="sexo_cliente" id="sexo_mujer" class="col-md-1" value='f' <?php echo (isset($cliente['sexo_cliente']) && $cliente['sexo_cliente']=='f')?'checked':''; ?> />
                    <label for="sexo_mujer" class="col-md-3"> Mujer </label>
                    <input type="radio" name="sexo_cliente" id="sexo_hombre" class="col-md-1" value='m' <?php echo (isset($cliente['sexo_cliente']) && $cliente['sexo_cliente']=='m')?'checked':''; ?> /><label for="sexo_hombre" class="col-md-4"> Hombre</label>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="direccion_cliente" class="col-md-2">Dirección: </label>
                    <input type="text" name="direccion_cliente" id="direccion_cliente" size="200" class="col-md-10" <?php echo (isset($cliente['direccion_cliente']))?'value="'.$cliente['direccion_cliente'].'"':''; ?> />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label for="cpostal_cliente" class="col-md-4">Localidad: </label>
                    <input type="text" name="cpostal_cliente" id="cpostal_cliente" class="col-md-8" <?php echo (isset($cliente['cpostal_cliente']))?'value="'.$cliente['cpostal_cliente'].'"':''; ?> />
                </div>
                <div class="col-md-6">
                    <label for="provincia_cliente" class="col-md-3">Provincia: </label>
                    <input type="text" name="provincia_cliente" id="provincia_cliente" class="col-md-9" <?php echo (isset($cliente['cpostal_cliente']))?'value="PROVINCIA-SQL"':''; ?> />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    <label for="tfno1_cliente" class="col-md-5">Tfno. 01: </label>
                    <input type="text" name="tfno1_cliente" id="tfno1_cliente" class="col-md-7" <?php echo (isset($cliente['tfno1_cliente']))?'value="'.$cliente['tfno1_cliente'].'"':''; ?> />
                </div>
                <div class="col-md-3">
                    <label for="tfno2_cliente" class="col-md-5">Tfno. 02: </label>
                    <input type="text" name="tfno2_cliente" id="tfno2_cliente" class="col-md-7" <?php echo (isset($cliente['tfno2_cliente']))?'value="'.$cliente['tfno2_cliente'].'"':''; ?> />
                </div>
                <div class="col-md-4">
                    <label for="email_cliente" class="col-md-4">Email: </label>
                    <input type="text" name="email_cliente" id="email_cliente" class="col-md-8" <?php echo (isset($cliente['email_cliente']))?'value="'.$cliente['email_cliente'].'"':''; ?> />
                </div>
                <div class="col-md-2">
                    <label for="mailing_cliente" class="col-md-10">Mailings??: </label>
                    <input type="checkbox" name="mailing_cliente" id="mailing_cliente" class="col-md-2" value='1' <?php echo (isset($cliente['mailing_cliente']) && $cliente['mailing_cliente']=='1')?'checked':''; ?> />
                </div>
            </div><hr/>
            <div class="form-group">
                <p>Mascotas:</p>
                <div style="display:inline-block;">
                <table style="float:left; vertical-align:middle;" class="table">
                    <tr>
                        <th>Chip ID</th>
                        <th>Nombre</th>
                        <th>Fecha Nac.</th>
                        <th>Sexo</th>
                        <th>Raza</th>
                        <th>Seleccionar</th>
                    </tr>
                    <tr>
                        <td>1235268265</td>
                        <td>Maya</td>
                        <td>01/01/2009</td>
                        <td>Hembra</td>
                        <td>Caniche</td>
                        <td>radioBTN</td>
                    </tr>
                    <tr>
                        <td>1235268265</td>
                        <td>Maya</td>
                        <td>01/01/2009</td>
                        <td>Hembra</td>
                        <td>Caniche</td>
                        <td>radioBTN</td>
                    </tr>
                </table>
                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-paw"></i> IR A FICHA</a>
                </div><div class="float-reset"></div>
            </div><hr/>
            <div class="form-group">
                <p>Observaciones:</p>
                <textarea cols="110" rows="5" name="notas_cliente"></textarea>
            </div><hr/>
            <div class="form-group">
                <?php if (isset($_GET['visualizar'])): ?>
                <button type="submit" name="modificar" title="GUARDAR" class="btn btn-success"><i class="fa fa-floppy-o fa-lg"></i>&nbsp; GUARDAR</button>
                <a href="./clientes.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a>
                <?php else: ?>
                <button type="submit" name="alta" class="btn btn-primary"><i class="fa fa-user fa-lg"></i>&nbsp; ALTA NUEVA</button>
                <button type="submit" name="buscar" class="btn btn-primary"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
    <div class="col-md-2 img-form">
        <img src="images/clientes512.png" alt="clientes" title="CLIENTES" width="120" height="120">
        <h1 class="img-title">CLIENTES</h1>
    </div>
    </div>
</div>