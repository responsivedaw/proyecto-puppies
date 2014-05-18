<div class="panel panel-success">
<!-- Default panel contents -->
    <div class="panel-heading">
        <i class="fa fa-info-circle fa-lg"></i>
        <?php 
        if (isset($_POST['alta'])){
        echo ' CLIENTE CREADO CORRECTAMENTE ';
        } elseif (isset($_POST['modificar'])){
        echo ' CLIENTE ACTUALIZADO CORRECTAMENTE ';
        } else {
        echo ' CLIENTE ELIMINADO CORRECTAMENTE ';
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
                <th>Apellidos</th>
                <th>NIF</th>
                <th>Fecha Alta</th>
                <th>Sexo</th>
                <th>Fecha Nac.</th>
            </tr>
            <tr>
                <td><?php echo $ult_cliente; ?></td>
                <td><?php echo $datos['nombre_cliente']; ?></td>
                <td><?php echo $datos['apellidos_cliente']; ?></td>
                <td><?php echo $datos['nif_cliente']; ?></td>
                <td><?php echo $datos['falta_cliente']; ?></td>
                <td><?php echo strtoupper($datos['sexo_cliente']); ?></td>
                <td><?php echo $datos['fnac_cliente']; ?></td>
            </tr>
            <tr class="success">
                <th colspan="2">Dirección</th>
                <th>Localidad</th>
                <th>Tfno. 01</th>
                <th>Tfno. 02</th>
                <th>Email</th>
                <th>Mailing</th>
            </tr>
            <tr>
                <td colspan="2"><?php echo $datos['direccion_cliente']; ?></td>
                <td><?php echo $datos['cpostal_cliente']; ?></td>
                <td><?php echo $datos['tfno1_cliente']; ?></td>
                <td><?php echo $datos['tfno2_cliente']; ?></td>
                <td><?php echo $datos['email_cliente']; ?></td>
                <td><?php echo ($datos['mailing_cliente']==1)?'SI':'NO'; ?></td>
            </tr>
            <tr class="success">
                <th colspan="7">Observaciones</th>
            </tr>
            <tr>
                <td colspan="7"><?php echo $datos['notas_cliente']; ?></td>
            </tr>
        </table>
        </div>
        <div class="line-break"></div>
        <p class="center-block"><a href="./clientes.php" title="VOLVER" class="btn btn-success"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
    </div>
</div>