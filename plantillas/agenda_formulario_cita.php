<div class="line-break"></div>    
<div class="panel panel-primary form-cita">
    <div class="panel-heading">
        <h3 class="panel-title">NUEVA CITA</h3>
    </div>
    <div class="panel-body">
        <form action="" name="cita-nueva" id="cita-nueva" method="post">
            <div class="row">
                <div class="form-group col-xs-2">
                    <label for="id_mascota">CÓD. MASCOTA</label>
                    <select name="id_mascota" id="id_mascota" class="form-control input-sm">
                        <option value="">Seleccione ...</option>
                        <?php
                        // Recuperamos codigos mascota de la DB.                    
                        ?>
                    </select>
                </div>
                <div class="form-group col-xs-4">
                    <label for="nombre_mascota">NOMBRE MASCOTA</label>
                    <input type="text" name="nombre_mascota" readonly="readonly" class="form-control input-sm" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2 col-xs-3">
                    <label for="fecha_cita">FECHA</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
                        <input type="text" name="fecha_cita" id="fecha_cita" class="form-control input-sm calendario" value="<?php echo (date("d/m/Y")); ?>" readonly="readonly">
                    </div>
                </div>
                <div class="form-group col-xs-3">
                    <label>HORA</label>
                    <div class="input-group hora-compuesta">
                        <select name="horas_cita" id="horas_cita" class="form-control input-sm">
                            <option value="08">08</option>
                            <option value="08">09</option>
                            <option value="08">10</option>
                            <option value="08">11</option>
                            <option value="08">12</option>
                            <option value="08">13</option>
                            <option value="08">14</option>
                            <option value="08">15</option>
                            <option value="08">16</option>
                            <option value="08">17</option>
                            <option value="08">18</option>
                            <option value="08">19</option>
                            <option value="08">20</option>
                        </select>
                        <span class="input-group-addon">:</span>
                        <select name="minutos_cita" id="minutos_cita" class="form-control input-sm">
                            <option value="00">00</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-xs-2">
                    <label for="categoria_cita">CATEGORÍA</label>
                    <select name="categoria_cita" id="categoria_cita" class="form-control input-sm">
                        <option value="plq">PELUQUERÍA</option>
                        <option value="grd">GUARDERÍA</option>
                        <option value="rcg">RECOGIDA</option>
                    </select>
                </div>
                <div class="form-group col-xs-2 col-xs-offset-3">
                    <label>&nbsp;</label>
                    <button type="submit" name="modificar" title="GUARDAR" class="form-control btn btn-success"><i class="fa fa-floppy-o fa-lg"></i>&nbsp; GUARDAR</button>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="notas_mascota">NOTAS</label>
                    <textarea name="notas_mascota" id="notas_mascota" class="form-control input-sm" placeholder="Introduzca observaciones ..." rows="5"><?php echo (isset($mascota['notas_mascota']))?$mascota['notas_mascota']:''; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</div>