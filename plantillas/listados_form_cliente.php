<div class="tab-pane active" id="anclaClientes">
    <div class="form-listados-cliente">
    <form action="" name="listados-cliente" class="" method="post">
        <fieldset name="cliente_legend">
            <legend>CLIENTES</legend>
            <div class="row">
                <div class="form-group col-md-12 col-xs-12">
                    <label for="falta_cliente">ALTA CLIENTE: </label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="falta_cliente_fechas" value="fechas" name="falta_cliente" readonly="readonly"/> 
                                </span>
                                <div class="form-control">
                                    <label for="<fechas">Seleccionar fecha</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="falta_cliente_mes" value="mes" name="falta_cliente" readonly="readonly"/>
                                </span>
                                <div class="form-control">
                                    <label for="mes">Mes actual</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="falta_cliente_anio" value="anio" name="falta_cliente" readonly="readonly"/>
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
                    <label for="cpostal_cliente">CODIGO POSTAL: </label>
                    <input type="text" name="cpostal_cliente" id="cpostal_cliente" class="form-control" placeholder="28002" />
                </div>
                <div class="form-group col-md-5 col-xs-6">
                    <label for="nombre_localidad">LOCALIDAD: </label>
                    <input type="text" name="nombre_localidad" id="nombre_localidad" class="form-control" placeholder="Alcorcón" />
                </div>
                <div class="form-group col-md-4 col-xs-6">
                    <label for="provincia_localidad">PROVINCIA:</label>
                    <input type="text" name="provincia_localidad" id="provincia_localidad" class="form-control" placeholder="Madrid"/>
                </div>
            </div>
             <div class="line-break"></div>
            <div class="row">
                <div class="form-group col-md-6 col-xs-6">
                    <label for="fnac_cliente">EDAD: </label>
                    <div class="row">
                        <div class="col-md-3 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="fnac_cliente_18" value="18" name="fnac_cliente" <?php echo (isset($cliente['fnac_cliente']) && $cliente['fnac_cliente']=='18')?'checked':''; ?> /> 
                                </span>
                                <div class="form-control">
                                    <label for="<18">&lt;18</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="fnac_cliente_1865" value="1865" name="fnac_cliente" />
                                </span>
                                <div class="form-control">
                                    <label for="18-65">18-65</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="fnac_cliente_65" value="65" name="fnac_cliente" />
                                </span>
                                <div class="form-control">
                                    <label for="65">&gt;65</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-6">
                    <label>SEXO:</label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="sexo_cliente_f" value="f" name="sexo_cliente" <?php echo (isset($cliente['sexo_cliente']) && $cliente['sexo_cliente']=='f')?'checked':''; ?> /> 
                                </span>
                                <div class="form-control">
                                    <label for="sexo_cliente_f">Femenino</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="sexo_cliente_m" value="m" name="sexo_cliente" <?php echo (isset($cliente['sexo_cliente']) && $cliente['sexo_cliente']=='m')?'checked':''; ?> />
                                </span>
                                <div class="form-control">
                                    <label for="sexo_cliente_m">Masculino</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line-break"></div>          
            <div class="row">
                <div class="form-group col-md-3 col-xs-3">
                    <label for="id_mascota">MASCOTA:</label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="id_mascota_si" value="si" name="id_mascota" /> 
                                </span>
                                <div class="form-control">
                                    <label for="id_mascota_si">Si</label>
                                </div>
                            </div>
                        </div>
                             <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="id_mascota_no" value="no" name="id_mascota" /> 
                                </span>
                                <div class="form-control">
                                    <label for="id_mascota_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 col-xs-3">
                    <label for="tfno1_cliente">TELÉFONO: </label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="tfno1_cliente_si" value="si" name="tfno1_cliente" /> 
                                </span>
                                <div class="form-control">
                                    <label for="tfno1_cliente_si">Si</label>
                                </div>
                            </div>
                        </div>
                             <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="tfno1_cliente_no" value="no" name="tfno1_cliente" /> 
                                </span>
                                <div class="form-control">
                                    <label for="tfno1_cliente_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 col-xs-3">
                    <label for="email_cliente">EMAIL: </label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="email_cliente_si" value="si" name="email_cliente" /> 
                                </span>
                                <div class="form-control">
                                    <label for="email_cliente_si">Si</label>
                                </div>
                            </div>
                        </div>
                             <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="email_cliente_no" value="no" name="email_cliente" /> 
                                </span>
                                <div class="form-control">
                                    <label for="email_cliente_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 col-xs-3">
                    <label for="mailing_cliente">MAILING:</label>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="mailing_cliente_si" value="si" name="mailing_cliente" /> 
                                </span>
                                <div class="form-control">
                                    <label for="mailing_cliente_si">Si</label>
                                </div>
                            </div>
                        </div>
                             <div class="col-md-4 col-xs-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" id="mailing_cliente_no" value="no" name="mailing_cliente" /> 
                                </span>
                                <div class="form-control">
                                    <label for="mailing_cliente_no">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line-break"></div>
            <div class="form-group">
                <button type="submit" name="buscar_clientes" class="btn btn-primary"><i class="fa fa-search fa-lg"></i>&nbsp; BUSCAR</button>
            </div>
        </fieldset>
    </form>
    <div class="clearfix"></div>
    </div>
</div>
