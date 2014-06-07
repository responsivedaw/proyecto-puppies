<h2 class="">LISTADO PROVEEDORES <span class="label label-default"><?php echo sizeof($resultados); ?></span></h2>
<br/>
<table style="font-size:12px;" class="table table-striped table-condensed table-bordered">
    <tr>
        <th>Cód.</th>
        <th>NIF</th>
        <th>Nombre</th>
        <th>C.Postal</th>
        <th>Tfno. 01</th>
        <th>Fax</th>
        <th>Email</th>
        <th>Web</th>
        <th>Borrar</th>
        <th>Visualizar</th>
    </tr>
    <?php foreach ($resultados as $proveedor): ?>
    <tr>
        <td><?php echo $proveedor['id_proveedor']; ?></td>
        <td><?php echo $proveedor['nif_proveedor']; ?></td>
        <td><?php echo $proveedor['nombre_proveedor']; ?></td>
        <td><?php echo $proveedor['localidad_proveedor']; ?></td>
        <!-- LOCALIDAD??? -->
        <td><?php echo $proveedor['tfno1_proveedor']; ?></td>
        <td><?php echo $proveedor['fax_proveedor']; ?></td>
        <td><?php echo $proveedor['email_proveedor']; ?></td>
        <td><?php echo $proveedor['web_proveedor']; ?></td>
        <td><a href="./proveedores.php?borrar=true&id_proveedor=<?php echo $proveedor['id_proveedor']; ?>" title="BORRAR" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg"></i>&nbsp;BORRAR</a></td>
        <td><a href="./proveedores.php?visualizar=true&id_proveedor=<?php echo $proveedor['id_proveedor']; ?>" title="IR A FICHA" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i>&nbsp;FICHA</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="center-block">
<p class="center-block"><a href="./proveedores.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
</div>
