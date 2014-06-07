<h2 class="">LISTADO CATEGORIAS <span class="label label-default"><?php echo sizeof($resultados); ?></span></h2>
<br/>
<table style="font-size:12px;" class="table table-striped table-condensed table-bordered">
    <tr>
        <th>Cód.</th>
        <th>Denominación</th>
        <th>Descripción</th>
        <th colspan="2">ACCION</th>
    </tr>
    <?php foreach ($resultados as $categoria): ?>
    <tr>
        <td><?php echo $categoria['id_categoria']; ?></td>
        <td><?php echo $categoria['denom_categoria']; ?></td>
        <td><?php echo $categoria['desc_categoria']; ?></td>
        <td><a href="./categorias.php?borrar=true&id_categoria=<?php echo $categoria['id_categoria']; ?>" title="BORRAR" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg"></i>&nbsp;BORRAR</a></td>
        <td><a href="./categorias.php?visualizar=true&id_categoria=<?php echo $categoria['id_categoria']; ?>" title="IR A FICHA" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i>&nbsp;FICHA</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="center-block">
    <p class="center-block"><a href="./categorias.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a></p>
</div>
