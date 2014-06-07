<div class="panel panel-success">
<!-- Default panel contents -->
    <div class="panel-heading">
        <i class="fa fa-info-circle fa-lg"></i>
        <?php 
        if (isset($_POST['alta'])){
        echo ' PROVEEDOR CREADO CORRECTAMENTE ';
        } elseif (isset($_POST['modificar'])){
        echo ' PROVEEDOR ACTUALIZADO CORRECTAMENTE ';
        } else {
        echo ' PROVEEDOR ELIMINADO CORRECTAMENTE ';
        }      
        ?>
        <i class="fa fa-info-circle fa-lg"></i>
    </div>
    <div class="panel-body">
        <div class="row">
        <table class="table col-md-10">
            <tr class="success">
                <th>Código:</th>
                <th>Nombre</th>
                <th>NIF</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Web</th>
            </tr>
            <tr>
                <td><?php echo (isset($insertado))?$insertado:$datos['id_proveedor']; ?></td>
                <td><?php echo $datos['nombre_proveedor']; ?></td>
                <td><?php echo $datos['nif_proveedor']; ?></td>
                <td><?php echo $datos['tfno1_proveedor']; ?></td>
                <td><?php echo $datos['email_proveedor']; ?></td>
                <td><?php echo $datos['web_proveedor']; ?></td>
            </tr>
            <tr class="success">
                <th colspan="2">Dirección</th>
                <th>Localidad</th>
                <th>Tfno. 02</th>
                <th>Fax</th>
                <th>Persona de contacto</th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $datos['direccion_proveedor']; ?></td>
                <td><?php echo $datos['localidad_proveedor']; ?></td>
                <!-- LOCALIDAD??? -->
                <td><?php echo $datos['tfno2_proveedor']; ?></td>
                <td><?php echo $datos['fax_proveedor']; ?></td>
                <td><?php echo $datos['contacto_proveedor']; ?></td>
            </tr>
            <tr class="success">
                <th colspan="7">Observaciones</th>
            </tr>
            <tr>
                <td><?php echo $datos['notas_proveedor']; ?></td>
            </tr>
        </table>
        </div>
        <div class="line-break"></div>
        <p class="center-block"><a href="./proveedores.php" title="VOLVER" class="btn btn-success"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
    </div>
</div>