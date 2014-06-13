<div class="tab-pane active">
    <div class="form-listados-mascota">
    <form action="" name="listados-mascota" id="listados-mascota" class="" method="post">
        <fieldset name="mascota_legend">
            <div class="row">
                <div class="form-group col-md-12 col-xs-12">
                    <label for="falta_mascota">ALTA MASCOTA: </label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="falta_mascota_fechas" value="fechas" name="falta_mascota" readonly="readonly"/> 
                                </span>
                                <div class="form-control">
                                    <label for="<fechas">Seleccionar fecha</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="falta_mascota_mes" value="mes" name="falta_mascota" readonly="readonly"/>
                                </span>
                                <div class="form-control">
                                    <label for="mes">Mes actual</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="falta_mascota_anio" value="anio" name="falta_mascota" readonly="readonly"/>
                                </span>
                                <div class="form-control">
                                    <label for="anio">Año actual</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line-break"></div> 
            <div class="row">
                 <div class="form-group col-md-3 col-xs-6">
                    <label for="raza_mascota">RAZA:</label>
                    <input type="text" name="raza_mascota" id="raza_mascota" class="form-control" placeholder="Raza" />
                </div>
                <div class="form-group col-md-4 col-xs-6">
                    <label for="peso_mascota">PESO: </label>
                    <div class="row">
                        <div class="col-md-3 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="peso_mascota_5" value="5" name="peso_mascota" <?php echo (isset($mascota['peso_mascota']) && $mascota['peso_mascota']=='5')?'checked':''; ?> readonly="readonly"/> 
                                </span>
                                <div class="form-control">
                                    <label for="<5">&lt;5</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="peso_mascota_510" value="510" name="peso_mascota" readonly="readonly"/>
                                </span>
                                <div class="form-control">
                                    <label for="5-10">5-10</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="peso_mascota_10" value="10" name="peso_mascota" readonly="readonly"/>
                                </span>
                                <div class="form-control">
                                    <label for="10">&gt;10</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-5 col-xs-6">
                    <label>SEXO:</label>
                    <div class="row">
                        <div class="col-md-5 col-xs-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="genero_mascota_f" value="hembra" name="genero_mascota" <?php echo (isset($mascota['genero_mascota']) && $mascota['genero_mascota']=='hembra')?'checked':''; ?> /> 
                                </span>
                                <div class="form-control">
                                    <label for="genero_mascota_f">Femenino</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="genero_mascota_m" value="macho" name="genero_mascota" <?php echo (isset($mascota['genero_mascota']) && $mascota['genero_mascota']=='macho')?'checked':''; ?> />
                                </span>
                                <div class="form-control">
                                    <label for="genero_mascota_m">Masculino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line-break"></div>                  
            <div class="row">
               <div class="form-group col-md-5 col-xs-6">
                    <label for="fnac_mascota">EDAD: </label>
                    <div class="row">
                        <div class="col-md-3 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="fnac_mascota_2" value="2" name="fnac_mascota" <?php echo (isset($mascota['fnac_mascota']) && $mascota['fnac_mascota']=='2')?'checked':''; ?> readonly="readonly"/> 
                                </span>
                                <div class="form-control">
                                    <label for="<2">&lt;2</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="fnac_mascota_210" value="210" name="fnac_mascota" readonly="readonly"/>
                                </span>
                                <div class="form-control">
                                    <label for="2-10">2-10</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="fnac_mascota_10" value="10" name="fnac_mascota" readonly="readonly"/>
                                </span>
                                <div class="form-control">
                                    <label for="10">&gt;10</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 col-xs-3">
                    <label for="id_cliente">CLIENTE:</label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="id_cliente_si" value="si" name="id_cliente" readonly="readonly"/> 
                                </span>
                                <div class="form-control">
                                    <label for="id_cliente_si">Si</label>
                                </div>
                            </div>
                        </div>
                             <div class="col-md-4 col-md-offset-1 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="id_cliente_no" value="no" name="id_cliente" readonly="readonly"/> 
                                </span>
                                <div class="form-control">
                                    <label for="id_cliente_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 col-xs-3">
                    <label for="librovac_mascota">VACUNACIÓN:</label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="librovac_mascota_si" value="1" name="librovac_mascota" <?php echo (isset($mascota['librovac_mascota']) && $mascota['librovac_mascota']=='1')?'checked':''; ?>/>
                                </span>
                                <div class="form-control">
                                    <label for="librovac_mascota_si">Si</label>
                                </div>
                            </div>
                        </div>
                             <div class="col-md-4 col-md-offset-1 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="librovac_mascota_no" value="0" name="librovac_mascota" <?php echo (isset($mascota['librovac_mascota']) && $mascota['librovac_mascota']=='0')?'checked':''; ?>/>
                                </span>
                                <div class="form-control">
                                    <label for="librovac_mascota_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line-break"></div>
            <div class="form-group">
                <button type="submit" name="buscar_mascotas" class="btn btn-primary"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
            </div>
        </fieldset>
    </form>
    <div class="clearfix"></div>
    </div>
</div>
