<!--
To change this template use Tools | Templates.
-->
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<!-- FORMULARIO RECLAMAPHONE.ES -->

    
    <div class="row">
	<div class="col-md-9">
		<div id="order_steps" class="steps3 row stepsContainer">
			<div class="col-md-4">
						<a href="/app/reclamacion/otros/edit/404/1">
							<div class=" well step_disable">
					<span>
						<span>
							<span class="step-number">1</span>
							<span class="step-information">Información</span>
															<span class="step-arrow disable"></span>
														</span>
					</span>
				</div>
						</a>
					</div>
				<div class="col-md-4">
						<a href="/app/reclamacion/otros/edit/404/2">
							<div class=" well step_disable">
					<span>
						<span>
							<span class="step-number">2</span>
							<span class="step-information">Selecciona tu operador</span>
															<span class="step-arrow disable"></span>
														</span>
					</span>
				</div>
						</a>
					</div>
				<div class="col-md-4">
							<div class="step_end well step_current">
					<span>
						<span>
							<span class="step-number">3</span>
							<span class="step-information">Rellena tus datos</span>
															<span class="step-arrow current"></span>
														</span>
					</span>
				</div>
					</div>
		</div>

<div class="step-hint">
	<p>Cumplimenta el siguiente formulario con tus datos. Todos los campos son obligatorios, salvos los marcados como opcionales.</p>
	<p></p>	
</div>		<form action="/app/reclamacion/otros/edit/404/3" method="post" name="complaint" class="validate-form" enctype="multipart/form-data" id="complaint">		
		<div class="row">
			<div class="col-md-11">
				<div class="form-group">
					<label for="nombre_titular">
						Nombre del titular del contrato o tarjeta:
					</label>
					<input type="text" id="nombre_titular" class="form-control" value="" name="nombre_titular">
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="numero_documentacion">
								Nº de documento:
							</label>
							<input type="text" id="numero_identificacion" class="form-control" value="" name="numero_identificacion">
						</div>
					</div>
					<div class="col-md-9">
												<div class="form-group">
							<label for="identificacion">
								Adjuntar documento(s) de identificación del titular (DNI, NIE, Pasaporte, CIF):
							</label>
							<div>	
								<span class="btn btn-success fileinput-button">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Seleccionar archivos...</span>			
									<input id="identificacion" type="file" name="file[]" multiple="">
								</span>
								
								<ul id="identificacionFiles" class="uploaded-files list-inline">
																	</ul>
							</div>
								
							<script>
							; $(function () {
								var updateFileList = function(selector, fileList)
								{
									var list = $(selector).empty();
									$.each(fileList, function (index, file) {								
										var li = $('<li/>').addClass('btn-group btn-group-xs');
										var fileIcon = $('<span/>').addClass('glyphicon glyphicon-file');
										var removeIcon = $('<span/>').addClass('glyphicon glyphicon-remove');
										var divName = $('<div/>').addClass('btn btn-default').text(file.name).prepend(fileIcon);
										var divRemove = $('<div/>').addClass('btn btn-default removeButton').append(removeIcon).data('remove-url', file.removeUrl);
										li.append(divName).append(divRemove);
										list.append(li);
									});
								};
							
								$( document ).on('click', '.uploaded-files .removeButton', function() {
									var url = $(this).data('remove-url');

									$.get(url, function(data) {
										updateFileList('#identificacionFiles', data.files);
									}, 'json');
								});
								
								$('#identificacion').fileupload({
									url: '/app/reclamacion/otros/uploadFile',
									formData: {'id_complaint': '404', 'formtype': 'otros', 'type': 'identificacion', 't' : new Date().getMilliseconds()},
									dataType: 'json',					
									done: function (e, data) {								
										if (data.result.errors)
										{
											$.each(data.result.errors, function (index, error) {
												alert('"' + error.name + '": ' + error.msg);
											});
										}
										else
										{									
											updateFileList('#identificacionFiles', data.result.files);
										}
									}
								});
							});
							</script>
						</div>	
						
					</div>
				</div>
				<div class="form-group">
					<label for="representante">
						Datos del representante legal <small>(si procede)</small>:
					</label>
					<input type="text" id="representante" value="" name="representante" class="form-control">
				</div>
				<div class="form-group">
					<label for="domicilio">
						Domicilio:
					</label>
					<input type="text" id="domicilio" value="" name="domicilio" class="form-control">
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label for="codigo_postal">
							Código postal:
						</label>
						<input type="text" id="codigo_postal" value="" name="codigo_postal" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label for="localidad">
							Localidad:
						</label>
						<input type="text" id="localidad" value="" name="localidad" class="form-control">
					</div>
					<div class="form-group col-md-4">
						<label for="provincia">
							Provincia:
						</label>
						<input type="text" id="provincia" value="" name="provincia" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="email_contacto1">
							Email contacto 1:
						</label>
						<input type="text" id="email_contacto1" value="" name="email_contacto1" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="email_contacto2">
							Email contacto 2:
						</label>
						<input type="text" id="email_contacto2" value="" name="email_contacto2" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="telefono_contacto1">
							Teléfono contacto 1:
						</label>
						<input type="text" id="telefono_contacto1" value="" name="telefono_contacto1" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="telefono_contacto2">
							Teléfono contacto 2:
						</label>
						<input type="text" id="telefono_contacto2" value="" name="telefono_contacto2" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="numero_linea_telefonica">
							Nº de línea telefónica objeto de la reclamación:
						</label>
						<input type="text" id="numero_linea_telefonica" value="" name="numero_linea_telefonica" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="importe_reclamacion">
							Importe de la reclamación (Opcional):
						</label>
						<input type="text" id="importe_reclamacion" value="" name="importe_reclamacion" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">
							¿La reclamación afecta a varias facturas?						</label>
						<div class="row">
							<div class="col-md-4 col-xs-4 col-xs-offset-2 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="reclamacion_varias_facturas_yes" value="1" name="reclamacion_varias_facturas"> 
									</span>
									<div class="form-control">
										<label for="reclamacion_varias_facturas_yes">sí</label>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-4">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="reclamacion_varias_facturas_no" value="0" checked="checked" name="reclamacion_varias_facturas">
									</span>
									<div class="form-control">
										<label for="reclamacion_varias_facturas_no">no</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label>
							¿Se realizó grabación telefónica de la contratación?						</label>
						<div class="row">
							<div class="col-md-4 col-xs-4 col-xs-offset-2 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="grabacion_telefonica_contratacion_yes" value="1" name="grabacion_telefonica_contratacion"> 
									</span>
									<div class="form-control">
										<label for="grabacion_telefonica_contratacion_yes">sí</label>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-4">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="grabacion_telefonica_contratacion_no" value="0" checked="checked" name="grabacion_telefonica_contratacion">
									</span>
									<div class="form-control">
										<label for="grabacion_telefonica_contratacion_no">no</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label>
							¿Ha reclamado ante el servicio de Atención al cliente?						</label>
						<div class="row">
							<div class="col-md-4 col-xs-4 col-xs-offset-2 col-md-offset-2">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="reclamacion_atencion_cliente_yes" value="1" name="reclamacion_atencion_cliente"> 
									</span>
									<div class="form-control">
										<label for="reclamacion_atencion_cliente_yes">sí</label>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-4">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" id="reclamacion_atencion_cliente_no" value="0" checked="checked" name="reclamacion_atencion_cliente">
									</span>
									<div class="form-control">
										<label for="reclamacion_atencion_cliente_no">no</label>
									</div>
								</div>
							</div>
						</div>
					</div>
										
					<div id="reclamacion_atencion_cliente_dependent" style="display: none">
						<div class="form-group col-md-3">
							<label for="numero_reclamacion_ac">
								Nº reclamación:
							</label>
							<input type="text" id="numero_reclamacion_ac" value="" name="numero_reclamacion_ac" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label for="fecha_reclamacion_ac">
								Fecha de reclamación:
							</label>
							<div class="input-group">
								<input type="text" id="fecha_reclamacion_ac" value="" name="fecha_reclamacion_ac" class="form-control datepicker">
								<span class="input-group-addon">
									<label for="fecha_reclamacion_ac">
										<span class="glyphicon glyphicon-calendar"></span>
									</label>
								</span>
							</div>
						</div>
					</div>
				</div>
	
								
				<div class="form-group">
					<label for="documentacion">
						Adjuntar las facturas y otra documentación necesaria para hacer la reclamación:
					</label>
					<div>	
						<span class="btn btn-success fileinput-button">
							<i class="glyphicon glyphicon-plus"></i>
							<span>Seleccionar archivos...</span>			
							<input id="documentacion" type="file" name="file[]" multiple="">
						</span>
						
						<ul id="documentacionFiles" class="uploaded-files list-inline">
													</ul>
					</div>
						
					<script>
					; $(function () {
						var updateFileList = function(selector, fileList)
						{
							var list = $(selector).empty();
							$.each(fileList, function (index, file) {								
								var li = $('<li/>').addClass('btn-group btn-group-xs');
								var fileIcon = $('<span/>').addClass('glyphicon glyphicon-file');
								var removeIcon = $('<span/>').addClass('glyphicon glyphicon-remove');
								var divName = $('<div/>').addClass('btn btn-default').text(file.name).prepend(fileIcon);
								var divRemove = $('<div/>').addClass('btn btn-default removeButton').append(removeIcon).data('remove-url', file.removeUrl);
								li.append(divName).append(divRemove);
								list.append(li);
							});
						};
					
						$( document ).on('click', '.uploaded-files .removeButton', function() {
							var url = $(this).data('remove-url');

							$.get(url, function(data) {
								updateFileList('#documentacionFiles', data.files);
							}, 'json');
						});
						
						$('#documentacion').fileupload({
							url: '/app/reclamacion/otros/uploadFile',
							formData: {'id_complaint': '404', 'formtype': 'otros', 'type': 'documentacion', 't' : new Date().getMilliseconds()},
							dataType: 'json',					
							done: function (e, data) {								
								if (data.result.errors)
								{
									$.each(data.result.errors, function (index, error) {
										alert('"' + error.name + '": ' + error.msg);
									});
								}
								else
								{									
									updateFileList('#documentacionFiles', data.result.files);
								}
							}
						});
					});
					</script>
				</div>	
		
				<div class="form-group">
					<label for="descripcion_breve">
						Breve descripción de la reclamación					</label>
					<textarea id="descripcion_breve" name="descripcion_breve" class="form-control" data-maxlength="1000" style="margin: 0px -116.625px 0px 0px; height: 60px; width: 774px;"></textarea>
					<label for="descripcion_breve">
						<small>
							Te quedan <span class="num-chars">1000</span> caracteres.						</small>
					</label>
				</div>
								<div class="complaint-footer">
					<div class="button-form">
						<input name="submit" type="submit" id="submitbutton" class="btn btn-primary btn-lg" value="Finaliza la reclamación >">
					</div>
									</div>
			</div>
		</div>
		<script type="text/javascript">
; (function ($) {
	$(function () {
		$.fn.validateFormFields = function () {
			var errors = [];
			
			$.fn.validateInputTextRequired(errors, 'nombre_titular', 'Debes rellenar el campo: Nombre del titular del contrato o tarjeta');
			$.fn.validateInputTextRequired(errors, 'numero_identificacion', 'Debes rellenar el campo: Nº de documento');
			$.fn.validateInputTextRequired(errors, 'domicilio', 'Debes rellenar el campo: Domicilio');
			$.fn.validateInputTextRequired(errors, 'codigo_postal', 'Debes rellenar el campo: Código Postal');
			$.fn.validateInputTextRequired(errors, 'localidad', 'Debes rellenar el campo: Localidad');
			$.fn.validateInputTextRequired(errors, 'provincia', 'Debes rellenar el campo: Provincia');
			$.fn.validateInputTextRequired(errors, 'email_contacto1', 'Debes rellenar el campo: Email de contacto 1');
			
			if ($.fn.validateInputTextRequired(errors, 'telefono_contacto1', 'Debes rellenar el campo: Teléfono de contacto 1'))
			{
				$.fn.validateInputTextTelephone(errors, 'telefono_contacto1', 'El campo: Teléfono de contacto 1 debe ser un número de 9 cifras')
			}  			
			
			if ($('input[name=telefono_contacto2]').val())
			{
				$.fn.validateInputTextTelephone(errors, 'telefono_contacto2', 'El campo: Teléfono de contacto 2 debe ser un número de 9 cifras')
			}
			
			if ($.fn.validateInputTextRequired(errors, 'numero_linea_telefonica', 'Debes rellenar el campo: Nº línea telefónica'))
			{
				$.fn.validateInputTextTelephone(errors, 'numero_linea_telefonica', 'El campo: Nº línea telefónica debe ser un número de 9 cifras')
			}  
			
			$.fn.validateInputTextRequired(errors, 'reclamacion_varias_facturas', 'Debes rellenar el campo: La reclamación afecta a varias facturas');			
			$.fn.validateInputTextRequired(errors, 'grabacion_telefonica_contratacion', 'Debes rellenar el campo: ¿Se realizó grabación telefónica de la contratación?');			
			$.fn.validateInputTextRequired(errors, 'reclamacion_atencion_cliente', 'Debes rellenar el campo: ¿Ha reclamado ante el servicio de Atención al cliente?');		

			
			
			if ($('#reclamacion_atencion_cliente_yes:checked').length)
			{			
				$.fn.validateInputTextRequired(errors, 'numero_reclamacion_ac', 'Debes rellenar el campo: Nº reclamación');
				$.fn.validateInputTextRequired(errors, 'fecha_reclamacion_ac', 'Debes rellenar el campo: Fecha de reclamación');
			}			
			
			$.fn.validateTextareaRequired(errors, 'descripcion_breve', 'Debes rellenar el campo: Breve descripción de la reclamación');		
			
			
			
			if (!errors.length)
			{
				$.fn.validateInputTextMaxLength(errors, 'nombre_titular', 128, 'El campo Nombre del titular del contrato o tarjeta debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'representante', 128, 'El campo Datos del representante legal (si procede) debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'domicilio', 128, 'El campo Domicilio debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'localidad', 128, 'El campo Localidad debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'provincia', 64, 'El campo Provincia debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'codigo_postal', 5, 'El campo Código Postal debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'email_contacto1', 255, 'El campo Email de contacto 1 debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'email_contacto2', 255, 'El campo Email de contacto 2 debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'telefono_contacto1', 16, 'El campo Teléfono de contacto 1 debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'telefono_contacto2', 16, 'El campo Teléfono de contacto 2 debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'numero_linea_telefonica', 16, 'El campo Nº línea telefónica debe contener un máximo de [:maxLength] caracteres');
				
				$.fn.validateInputTextMaxLength(errors, 'importe_reclamacion', 16, 'El campo Importe de la reclamación debe contener un máximo de [:maxLength] caracteres');
			}
			
			return errors;
		};
		
		$('input[type=radio][name="reclamacion_atencion_cliente"]').change(function (e) {
			if ($('#reclamacion_atencion_cliente_yes:checked').length)
			{
				$('#reclamacion_atencion_cliente_dependent').show('slow');
			}
			else
			{
				$('#reclamacion_atencion_cliente_dependent').hide('slow');
			}
		});
		
	});
	
})(jQuery);
</script><input name="formtype" type="hidden" value="otros"><input name="step" type="hidden" value="3"><input name="id_complaint" type="hidden" value="404">		</form>	</div>
	<div class="col-md-3">	
		<div class="help-title">
	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-8">
			<span class="help-q">
				¿Tienes				<strong>alguna duda?</strong>
			</span>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<span class="font-icon-arrow-down-simple-thin"></span>
		</div>
	</div>
</div><div class="help-box">
	Puedes hacernos llegar tus dudas o comentarios a través de las siguientes opciones:	<ul class="arrow-list">
		<li><span>Rellena nuestro formulario de contacto <a href="/contacto" title="Formulario de contacto">en este enlace</a></span></li>
				<li><span>o escribiéndonos un email <a href="mailto:info@reclamaphone.es" title="mail">info@reclamaphone.es</a></span></li>
	</ul>
</div>
	</div>
</div>
    
</body>
</html>