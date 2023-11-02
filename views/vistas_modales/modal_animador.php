<!-- ---------------------------------------------MODAL ANIMADOR---------------------------------------- -->
<div class="modal fade" id="modal_animador" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modal_animador_header">
                <h5 class="modal-title" id="modal_animador_titulo"><b></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                            <!-- ------INICIO DEL FORMULARIO MODAL------ -->
                    <form id="modal_animador_form" method="post"  action="">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label">Los campos (<?php echo CAMPO_CLAVE ?>) son requeridos</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="usuario" class="col-form-label">Usuario: <?php echo CAMPO_CLAVE ?></label>
                                <input type="text" class="form-control border-primary" id="modal_animador_usuario" name="usuario" readonly="readonly">
                            </div>                                                           
                            <div class="form-group col-md-3">
                                <label for="nombre" class="col-form-label">Nombre: <?php echo CAMPO_CLAVE ?></label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_nombre" name="nombre">
                                <div class="invalid-feedback">
                                    - Campo requerido
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="apellido" class="col-form-label">Apellido: <?php echo CAMPO_CLAVE ?></label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_apellido" name="apellido">
                                <div class="invalid-feedback">
                                    - Campo requerido
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="documento_tipo_id" class="col-form-label">Tipo de documento: <?php echo CAMPO_CLAVE ?></label>
                                <select class="form-control border-primary select validacion" id="modal_animador_documento_tipo_id" name="documento_tipo_id">
                                </select>
                                <div class="invalid-feedback">
                                    - Elija una opcion<br>
                                    - Campo requerido
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="documento_numero" class="col-form-label">Número de documento: <?php echo CAMPO_CLAVE ?></label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_documento_numero" name="documento_numero">
                                <div class="invalid-feedback">
                                    - Debe ingresar solo números<br>
                                    - Ingrese mas de 6 dígitos<br>
                                    - No puede empezar con "0"<br>
                                    - El dni no puede repetirse<br>
                                    - Campo requerido
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fecha_nacimiento" class="col-form-label">Fecha de nacimiento:</label>
                                <input type="date" class="form-control border-primary" id="modal_animador_fecha_nacimiento" name="fecha_nacimiento">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sexo" class="col-form-label">Sexo:</label>
                                <select class="form-control border-primary" id="modal_animador_sexo" name="sexo">
                                    <option value="">Elija una opcion...</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="celular1" class="col-form-label">Celular: <?php echo INFO_CELULAR ?></label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular1_prefijo" class="col-form-label">Prefijo:</label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_celular1_prefijo" name="celular1_prefijo">
                                <div class="invalid-feedback">
                                    - Debe ingresar solo números<br>
                                    - No puede empezar con "0"<br>
                                    - Campo requerido
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular1_numero" class="col-form-label">Número:</label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_celular1_numero" name="celular1_numero">
                                <div class="invalid-feedback">
                                    - Debe ingresar solo números<br>
                                    - Debe ingresar el número sin el 15<br>
                                    - No puede empezar con "0"
                                </div>
                            </div>
                            </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="celular2" class="col-form-label">Celular familiar: <?php echo INFO_CELULAR ?></label>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular2_prefijo" class="col-form-label">Prefijo:</label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_celular2_prefijo" name="celular2_prefijo">
                                <div class="invalid-feedback">
                                    - Debe ingresar solo números<br>
                                    - No puede empezar con "0"<br>
                                    - Campo requerido
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="celular2_numero" class="col-form-label">Número:</label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_celular2_numero" name="celular2_numero">
                                <div class="invalid-feedback">
                                    - Debe ingresar solo números<br>
                                    - Debe ingresar el número sin el 15<br>
                                    - No puede empezar con "0"
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" class="form-control border-primary validacion" id="modal_animador_email" name="email">
                                <div class="invalid-feedback">
                                    - El mail ingresado es incorrecto<br>
                                    - El mail debe contener un @<br>
                                    Ej.: ejemplo@ejemplo.com.ar
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="direccion" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control border-primary validacion" id="modal_animador_direccion" name="direccion">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="direccion_numero" class="col-form-label">Número:</label>
                                <input type="text" class="form-control border-primary" id="modal_animador_direccion_numero" name="direccion_numero">
                                <div class="invalid-feedback">
                                    - Debe ingresar solo números<br>
                                    - No puede empezar con "0"
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="direccion_depto" class="col-form-label">Departamento:</label>
                                <input type="text" class="form-control border-primary" id="modal_animador_direccion_depto" name="direccion_depto">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ciudad" class="col-form-label">Ciudad:</label>
                                <input type="text" class="form-control border-primary" id="modal_animador_ciudad" name="ciudad">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="provincia" class="col-form-label">Provincia:</label>
                                <input type="text" class="form-control border-primary" id="modal_animador_provincia" name="provincia">
                            </div>
                        </div>
                                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="modal_animador_submit" name="modal_animador_submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                                        <!-- ------fin de formulario modal-------- -->
                    </div><!-- container-fluid -->
            </div> <!-- modal body -->
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal fade -->
   <!-- -------------------------------------------FIN MODAL BASE----------------------------------- --> 