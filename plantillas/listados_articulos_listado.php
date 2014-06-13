<h2 class="">LISTADO BÚSQUEDA ARTICULOS <span class="label label-default"><?php echo sizeof($resultados); ?></span></h2>
<br/>
<table style="font-size:12px;" class="table table-striped table-condensed table-bordered">
    <tr>
        <th>Cód.</th>
        <th>Denominación</th>
        <th>Stock</th>
        <th>Categoría</th>
        <th>Proveedor</th>
    </tr>
    <?php foreach ($resultados as $fila): ?>
    <tr>
        <td><?php echo $fila['id_articulo']; ?></td>
        <td><?php echo $fila['denom_articulo']; ?></td>
        <td><?php echo $fila['stock_articulo']; ?></td>
        <td><?php $categoria=Categoria::get_categoria($fila['id_categoria']);
                echo $categoria['denom_categoria'] ?></td>
        <td><?php $proveedor=Proveedor::get_proveedor($fila['id_proveedor']);
                echo $proveedor['nombre_proveedor']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="center-block">
    <p class="center-block">
        <a href="./articulos.php?imprimir=true&id_articulo=<?php echo $articulo['id_articulo']; ?>" title="IMPRIMIR" class="btn btn-success" disabled="disabled"><i class="fa fa-print fa-lg"></i>&nbsp;IMPRIMIR</a>
        <a href="./articulos.php?exportar=true&id_articulo=<?php echo $articulo['id_articulo']; ?>" title="EXPORTAR" class="btn btn-success" disabled="disabled"><i class="fa fa-save fa-lg"></i>&nbsp;EXPORTAR</a>
        <a href="./listados.php" title="VOLVER" class="btn btn-primary"><i class="fa fa-undo fa-lg"></i> VOLVER</a>
    </p>
</div>
