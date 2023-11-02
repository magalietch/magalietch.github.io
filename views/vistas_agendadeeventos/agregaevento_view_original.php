<!doctype html>
<html lang="es">
   <body>
      <?php
         function esDispositivoMovil() {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $dispositivosMoviles = array(
                'Android',
                'iPhone',
                'iPad',
                'Windows Phone',
                'BlackBerry',
                'Tablet',
                'Mobile'
            );
            foreach ($dispositivosMoviles as $dispositivo) {
               if (stripos($userAgent, $dispositivo) !== false) {
                  return true; // Se encontró un dispositivo móvil en el User-Agent
               }//stripos($userAgent, $dispositivo) !== false
            }//foreach ($dispositivosMoviles as $dispositivo)
            return false; // No se detectó un dispositivo móvil en el User-Agent
         }//esDispositivoMovil
      ?>
      <div class="container-fluid">
         <?php $this->load->view("barra_view"); ?>
         <br><br><br>

         <div class="alert alert-warning" style="display:none; z-index: 1000;" id="alerta_reprogramar" role="alert">
         </div>

         <div class= "row text-primary" align="center">
            <div class="col-12">
               <h1>Eventos</h1>
            </div>
         </div>
         <br>    
         <!-- ----------------------------FILTRO TURNOS------------------------------------- -->
         <div class="row">
            <div class="col-12">
               <div class="card text-center border-primary">
                  <div class="card-header text-primary card-title"><h4>Filtros</h4></div>
                  <div class="card-body">
                     <div class="form-row">
                        <div class="col-sm-auto">
                           <label for="selectsede" class="text-primary"><h5>Sede</h5></label>
                           <select class="form-control border-primary" id="selectsede">
                              <option value="">Elegir opción</option>
                              <!-- <option value="1">Garay</option> -->
                           </select>
                        </div>
                        <div class="col-4" id="div_fecha_mes">
                           <label for="fecha_mes" class="text-primary"><h5>Mes/Año</h5></label>
                           <input type="month" name="fecha_mes" id="fecha_mes" class="form-control border-primary">
                        </div>
                     </div> <!-- form-row -->
                  </div> <!-- card-body -->
               </div> <!-- card text-center border-primary -->
            </div> <!-- col-12 -->
         </div> <!-- row -->
         <br>
         <div class="row">
            <?php if (esDispositivoMovil()) { ?>
               <div class="col-sm-3">
                  <button type="button" class="btn btn-lg btn-primary btn-block"  id="borrarfiltros">Restablecer filtros</button>
               </div><!--div col-3 -->
            <?php } else { ?>
               <div class="col-sm-4">
                  <button type="button" class="btn btn-lg btn-primary btn-block"  id="borrarfiltros">Restablecer filtros</button>
               </div><!--div col-4 -->
            <?php } ?>
         </div><!--div row -->
         <br>
         <!-- ---------------------------Comienzo de tabla------------------------------------- --> 
         <div class="row">
            <div class="col-lg-12">
               <div class="table-responsive-sm">
                  <table class="table" class="display"  id="tabla1" style="width:100%">                
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">Id</th>
                           <th scope="col" data-priority="1">Ver mas</th>
                           <th scope="col" data-priority="1">Conf.</th>
                           <th scope="col" data-priority="2" data-column="dia">Día</th>
                           <th scope="col" data-priority="2" data-column="fecha">Fecha</th>
                           <th scope="col" data-priority="2" data-column="hora_inicio">Inicio</th>
                           <th scope="col" data-priority="2" data-column="hora_fin">Fin</th>
                           <th scope="col" data-priority="7" data-column="estado">Estado</th>
                           <th scope="col" data-priority="3" data-column="nombre_cumpleaniero">Nombre del cumpleañero</th>
                           <th scope="col" data-priority="8" data-column="dni_cliente">DNI Cliente</th>
                           <!-- tratamientos requiere de nombre_cumpleanieros -->
                           <th scope="col" data-priority="4" data-column="tematica">Temática</th>
                           <th scope="col" data-priority="1">Acciones</th>
                        </tr>
                     </thead>
                     <tfoot class="thead-dark">
                        <tr>
                           <th>Id</th>
                           <th scope="col">Ver mas</th>
                           <th scope="col">Conf.</th>
                           <th scope="col" data-column="dia">Día</th>
                           <th scope="col" data-column="fecha">Fecha</th>
                           <th scope="col" data-column="hora_inicio">Inicio</th>
                           <th scope="col" data-column="hora_fin">Fin</th>
                           <th scope="col" data-column="estado">Estado</th>
                           <th scope="col" data-column="nombre_cumpleaniero">Cumpleañero</th>
                           <th scope="col" data-column="dni_cliente">DNI Cliente</th>
                           <th scope="col" data-column="tematica">Temática</th>
                           <th scope="col">Acciones</th>
                        </tr>            
                     </tfoot>
                     <tbody class="table-striped">
                     </tbody>
                  </table>
               </div> <!-- responsive -->
            </div> <!-- col-lg-12 -->
         </div> <!-- row -->
         <!-- ----------------------------------------FIN DE LA TABLA----------------------------------------- -->
         <!-- INCLUIMOS LOS MODALES -->
         <?php 
            $this->load->view("vistas_modales/modal_detalle");
            $this->load->view("vistas_modales/modal_nuevo_evento");
            $this->load->view("vistas_modales/modal_editar_turno");
            $this->load->view("vistas_modales/modal_reprogramar_turno");
            $this->load->view("vistas_modales/modal_nuevo_sobreturno");
            $this->load->view("vistas_modales/modal_motivo_turno_cancelado");
            $this->load->view("vistas_modales/modal_paciente");
         ?>
      </div><!--CONTAINER -->

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo base_url ("js/jquery-3.6.0.min.js")?>"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script src="<?php echo base_url ("js/jquery.form.min.js");?>"></script>
      <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
      <script src="https://kit.fontawesome.com/d32ad87880.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script><!--fecha español-->
      <script src="<?php echo base_url ("js/jquery-ui.min.js")?>"></script>
      
      <!-- Librerías de datatables -->
      <script src="<?php echo base_url ("datatables/datatables.min.js");?>"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.print.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
      <script>
         $(document).ready(function(){
            //-------------creamos la fila de filtros-------------------------
            $('#tabla1 tfoot th').each( function () {
               var title = $(this).text();
               var entorno = $(this);
               if ((title=="Acciones") || (title=="Ver mas") || (title=="Confirmado")){
                  entorno.html(' ');
               }else{//if title acciones
                  if(title=="Fecha"){
                     entorno.html( '<input type="date" class="filtros" placeholder="Filtrar por '+title+'" /> ' );
                  }else{//if title acciones
                     if(title=="Inicio" || title=="Fin"){
                     entorno.html( '<input type="time" class="filtros" placeholder="Filtrar por '+title+'" /> ' );
                     }else{
                        entorno.html( '<input type="text" class="filtros" placeholder="Filtrar por '+title+'" /> ' );
                     }//else if title Inicio              
                  }//else if title Fecha              
               }//else if title Acciones              
            }); //each

            //fecha en español
            moment.locale('es', {
               months: 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'.split('_'),
               monthsShort: 'Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.'.split('_'),
               weekdays: 'Domingo_Lunes_Martes_Miércoles_Jueves_Viernes_Sábado'.split('_'),
               weekdaysShort: 'Dom._Lun._Mar._Miér._Jue._Vier._Sáb.'.split('_'),
               weekdaysMin: 'Do_Lu_Ma_Mi_Ju_Vi_Sá'.split('_')
            });

            //variables 
            var url = "<?php echo site_url ("agendadeeventos/Agendadeeventos_contr/listar_eventos");?>";//a donde va a hacer la consulta
            var opselect={'fecha':moment().format('YYYY-MM-DD'), 'sede_id': 1};//dato q le mando a la url de arriba
            var datos=[];//crear turnos libres
            var cont=0;
            var duracion_turno_agenda=0;//duracion de cada agenda
            var selectsedeauxi=1;
            var selectsedeanterior=1;//sacar
            var selectsedeactual=1;//sacar
            var carga_tabla=false;//lo uso para cuando proceso los turnos libres que debo redibujar la tabla
            var arranque=0;//lo uso porque la primera vez que dibuja la tabla no trae datos no se porque¿?
            var carga_init=false;//lo uso para ocultar el overly
            var eventos_confirmados=true;//lo uso en el callback para ver si hay turnos sin confirmar en el día
            var reprogramar=false;//uso para ver si intentaron reprogramar un turno
            var turno_reprogramacion_id = '<?php echo $this->session->userdata("evento_id"); ?>';
            alerta_reprogramacion=true;//lo uso para que me genere la alerta una sola vez cuando vego de otra página para reprogramar
            var datos_reprogramacion='';
            var botones="<div class='btn-group dropdown mr-5 mx-auto dropleft'><button class='btn botones_tabla_dropdown btn-primary dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>Acciones</button><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
            botones+="<button type='button' title='Marcar Llegada del cumpleañero' class='btn botones_tabla btn-success btn-block btnasistencia'><i class='bi bi-person-check'></i> Marcar llegada </botton>";
            botones+="<button type='button' title='Descmarcar Llegada del cumpleañero' class='btn botones_tabla btn-success btn-block btnasistencia'><i class='bi bi-person-check'></i> Desmarcar llegada </botton>";
            // botones+="<button type='button' title='Marcar Ausencia sin aviso del cumpleañero' class='btn botones_tabla btn-danger btn-block btnausencia_sin_aviso'><i class='bi bi-person-dash'></i> Marcar ausente S/A</botton>";
            // botones+="<button type='button' title='Marcar Ausencia con aviso del cumpleañero' class='btn botones_tabla btn-danger text-warning btn-block btnausencia_con_aviso'><i class='bi bi-person-dash'></i> Marcar ausente C/A</botton>";
            botones+="<button type='button' title='Editar evento' class='btn botones_tabla btn-warning btn-block btneditarturno'><i class='bi bi-pen'></i> Editar evento</button>";
            botones+="<button type='button' title='Cancelar evento' class='btn botones_tabla btn-secondary btn-block btncancelar'><i class='bi bi-x-circle-fill'></i> Cancelar evento</botton>";
            botones+="<button type='button' title='Confirmar evento' class='btn botones_tabla btn-success btn-block btnconfirmar'><i class='bi bi-calendar-check'></i> Confirmar evento</botton>";
            botones+="<button type='button' title='Reprogramar evento' class='btn btn-info text-light btn-block btnreprogramarturno'><i class='bi bi-calendar2-plus'></i> Reprogramar evento</button>";
            botones+="</div></div>";
            //establezco desde el principio el la fecha actual como la fecha de los turnos
            $("#fecha_mes").val(moment().format("YYYY-MM"));
            //fin variables
         
            //FUNCIONES-----------------------------
            var recarga_tabla_pagina = function(url){
               
               $.LoadingOverlay("show");
               carga_tabla=true;
               
               // Obtener la página actual antes de llamar a ajax.reload()
               var pagina_actual = table.page();

               table.ajax.reload(function() {
                  // Establecer la página anterior después de que los datos se hayan recargado
                  table.page(pagina_actual).draw('page');
               });//reload
            }//recarga_tabla_pagina

            var recarga_tabla = function(url){
               $.LoadingOverlay("show");
               carga_tabla=true;
               table.ajax.url(url).load();
            }//recarga_tabla
            $.LoadingOverlay("show");

            //-----------------CONSTRUYO EL SELECT SEDES--------------
            $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/listar_sedes");?>",function(datos){
               datos.forEach(function(sede_id){
                  var selectsede = document.getElementById("selectsede");
                  var option = document.createElement("option");
                  option.text = sede_id.sede;
                  option.value= sede_id.sede_id;
                  if(sede_id.valor_por_defecto==2){
                     option.selected = true;
                  }//sede_id.valor_por_defecto==2
                  selectsede.add(option);
               })//datos.forEach
            },"json");//get


            //---------------------------------DATATABLES--------------------------------------------------
            var table = $('#tabla1').DataTable( {
               //parametros---------------------------------------------------------------------------
               "fixedHeader": true, //Deja fijo el encabezado
               "deferRender": true, //dibuja la tabla a medida que se necesita
               //CUIDADO CON MODIFICAR EL NUMERO
               "order": [[ 4, "asc" ],[ 5, "asc" ]], //ordena según la columna fecha y luego hora de inicio
               dom: 'Bfrtip',
               "lengthMenu": [
                  [10, 25, 50, 100],
                  ["Mostrar 10 filas", "Mostrar 25 filas", "Mostrar 50 filas", "Mostrar 100 filas"] 
               ],
               buttons: <?php echo json_encode($configuracionBotones); ?>,
               
               "columnDefs": [
                  {
                     "orderable": false,
                     "targets": "_all",
                  },
                  //Centro el contenido de las columnas
                  {className: "text-center", "targets": "_all"},
                  { "visible": false, "targets": 0 }
               ],
               
               "ajax":{
                  "url": url ,
                  "data": function() {
                     return opselect;
                  },
                  'type' : 'POST',
                  "dataSrc":""
               },//ajax
               
               //DATOS QUE VAN A LLEGAR A LA TABLA
               //no modificar nombre o sino modificar en model tambien
               //aca vienen los datos desde agendadeeventos_model y despues de los dos puntos espera una variable con ese nombre
               "columns":[
                  {"data": "evento_id"},
                  {"defaultContent":"<div class='mas'><i class='bi bi-plus-circle btn btn-primary'></i></div>"},
                  {"data": "boton"},
                  {"data": "dia"},
                  {"data": "fecha"},
                  {"data": "hora_inicio"},
                  {"data": "hora_fin"},
                  {"data": "estado"},
                  {"data": "nombre_cumpleaniero"},
                  {"data": "usuario_dni"},
                  {"data": "tematica"},
                  {"defaultContent": botones}
               ],

               //Traducimos al español
               "language": {
                  "url": "<?php echo site_url ("Lenguaje_contr/lenguaje");?>",
               },
                                 
               "rowId": 'evento_id',//establezco a evento_id como la identificación de la fila

               initComplete: function(){

                  $('.dt-buttons').find('.dt-button').removeClass('dt-button');
                  $('.buttons-page-length').addClass('btn btn-primary');
                  $('.buttons-colvis').addClass('btn btn-info');

                  $.LoadingOverlay("hide");
                  carga_init=true;

                  //----------------------------FILTRO POR COLUMNAS----------------------------------
                  var entorno = this.api();
                  // Esto inicia un bucle que recorre cada columna de la tabla y ejecuta una función para cada una de ellas.
                  this.api().columns().every( function () {
                     //Crea una variable that para hacer referencia al contexto actual, osea a cada columna
                     var that = this;
                     let timeout;
                     // Esto selecciona los elementos <input> en el pie de cada columna de la tabla y 
                     // agrega manejadores de eventos para los eventos keyup, change y clear. Esto
                     //  significa que cada vez que el usuario escribe algo en los campos de entrada, 
                     //  cambia su valor o los borra, se activará esta función
                     $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        clearTimeout(timeout);
                        
                        var columna = $(this).closest('th').attr('data-column');//.data('column'); // Obtenemos el índice de la columna

                        //almacena el valor del campo de entrada actual en la variable valorbusqueda, osea lo q escribis en el filtro
                        var valorbusqueda=this.value;
                        timeout = setTimeout(function() {
                           if ( that.search() !== valorbusqueda){
                              $.LoadingOverlay("show");
                              if (columna=="fecha"){ 
											if(valorbusqueda==""){
                                    //esto se refiere al filtro mes/año
                                    valorbusqueda=moment($("#fecha_mes").val(),"YYYY-MM").format('YYYY-MM-01');
                                 }
                                 var inicio=moment(valorbusqueda, 'YYYY-MM-DD').format('DD');
                                 var fin_mes=moment(valorbusqueda, 'YYYY-MM-DD').endOf('month').format('DD');
                                 valorbusqueda="^";
                                 for(var i=inicio ; i<fin_mes ; i++){
                                    valorbusqueda+=i;
                                    valorbusqueda+="|^";
                                 }
                                 valorbusqueda+=fin_mes;
                                 //se usa para aplicar la búsqueda con el valor especificado en la columna actual y
                                 // luego dibujar la tabla con los resultados actualizados.
                                 that.search( valorbusqueda, true, false).draw();
                              }else{//if selector cols 3
                                 if (columna=="hora_inicio"){
                                    if(valorbusqueda==""){
                                       valorbusqueda="00:00";
                                    };
                                    var inicio=moment(valorbusqueda, 'HH:mm').format('HH');
                                    var hora_moment=moment(valorbusqueda, 'HH:mm');
                                    valorbusqueda='^'+moment(valorbusqueda, 'HH:mm').format('HH')+'|';
                                    for(var i=inicio ; i<24 ; i++){
                                       valorbusqueda+="^"+hora_moment.add(1,'hours').format('HH')+"|";
                                    }
                                    valorbusqueda+='^'+hora_moment.add(1,'hours').format('HH');
                                    that.search( valorbusqueda, true, false).draw();
                                 }else{//if selector col 4
                                    if (columna=="hora_fin"){
                                       if(valorbusqueda==""){
                                          valorbusqueda="23:59";
                                       };
                                       var inicio=moment(valorbusqueda, 'HH:mm').format('HH');
                                       var hora_moment=moment(valorbusqueda, 'HH:mm');
                                       valorbusqueda='^'+moment(valorbusqueda, 'HH:mm').format('HH')+'|';
                                       for(var i=inicio-1 ; i>0 ; i--){
                                          valorbusqueda+="^"+hora_moment.subtract(1,'hours').format('HH')+"|";
                                       }
                                       valorbusqueda+='^'+hora_moment.subtract(1,'hours').format('HH');
                                       that.search( valorbusqueda, true, false).draw();
                                    }else{//if selector col 5
                                       that.search( valorbusqueda ).draw();
                                    }//else if that.selector 5
                                 }//else if that.selector 4
                              }//if selector cols 3
                           }//if that.search
                           $.LoadingOverlay("hide");
                        }, 700)//set timeout
                     });//input
                  });//this.api().columns().every
                  //----------------------------FIN FILTRO POR COLUMNAS----------------------------------
               },//init

               drawCallback: function () {
                  //compruebo si alguna vez ya se cargó la tabla
                  if(carga_init){
                     $.LoadingOverlay("hide");
                  }//carga_init

                  //pinto las filas según el estado
                  var api=this.api();
                  api.rows().every( function () {
                     var evento_id=this.data().evento_id;
                     $("#"+evento_id).addClass(this.data().color);
                  })//this api

                  //Oculto los botones de las filas vacías
                  // Iterar sobre las filas y verificar si son nuevas
                  if(turno_reprogramacion_id!=="" && alerta_reprogramacion){
                     alerta_reprogramacion=false;
                     reprogramar=true;
                     $.ajax({
                        //cambio
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/detalle_evento");?>',
                        type : 'GET',
                        data :  {"evento_id":turno_reprogramacion_id},
                        dataType : 'json',
                        async : false,
                        success : function(datos_turno) {
                           datos_reprogramacion=datos_turno;                     
                        }//success ajax detalle_evento
                     })//ajax detalle_evento

                     //detengo el cierre automático de la alerta generado para los turnos confirmados
                     $("#alerta_reprogramar").empty();
                     
                     var alerta='<div class="d-flex justify-content-between align-items-center">';
                     alerta+='<div class="row align-items-center text-center">';
                     alerta+='<div class="col-auto"><b>ADVERTENCIA!!</b><br> Se está reprogramando el siguiente turno</div>';
                     alerta+='<div class="col-auto datos_alerta_reprogramar">';
                     alerta+='Paciente: '+datos_reprogramacion.turno[0].paciente;
                     alerta+='</div>';
                     alerta+='<div class="col-auto datos_alerta_reprogramar">';
                     alerta+='Fecha y hora: '+moment(datos_reprogramacion.turno[0].fecha_sin_formatear, "YYYY-MM-DD").format("DD/MM/YYYY")+' ';
                     alerta+=moment(datos_reprogramacion.turno[0].hora_inicio, "HH:mm:ss").format("HH:mm")+' - ';
                     alerta+=moment(datos_reprogramacion.turno[0].hora_fin, "HH:mm:ss").format("HH:mm");
                     alerta+='</div>';
                     alerta+='<div class="col-auto datos_alerta_reprogramar">';
                     alerta+='Médico: '+datos_reprogramacion.turno[0].medico;
                     alerta+='</div>';
                     alerta+='<div class="col-auto d-flex justify-content-center align-items-center" id="div_btn_alerta_reprogramar">';
                     alerta+='<button type="button" id="btn_alerta_reprogramar" class="btn btn-danger btn-cancelar">Cancelar</button>';
                     alerta+='</div>';
                     alerta+='</div>';
                     alerta+='</div>';
                     $("#alerta_reprogramar").append(alerta);
                     // Mostrar la alerta
                     $("#alerta_reprogramar").effect("slide","slow");
                     datos_reprogramacion.turno[0].evento_id=turno_reprogramacion_id;
                  }//if(turno_reprogramacion_id!=="")

                  api.rows().every(function() {
                     var data = this.data();
                     var rowNode = this.node();
                     if(!reprogramar){
                        if (data.evento_id.startsWith("filanueva")) {
                           // Ocultar los botones en la fila nueva
                           $(rowNode).find('.botones_tabla').remove();
                           $(rowNode).find('.btnreprogramarturno').html("<i class='bi bi-calendar2-plus'></i> Reprogramar aquí");
                           $(rowNode).find('.botones_tabla_dropdown').hide();
                        }//if data.evento_id.startsWith("filanueva")
                     }else{//if reprogramar
                        if (data.evento_id.startsWith("filanueva")) {
                           $(rowNode).find('.botones_tabla').remove();
                           $(rowNode).find('.btnreprogramarturno').html("<i class='bi bi-calendar2-plus'></i> Reprogramar aquí");
                           $(rowNode).find('.mas').hide();
                           $(rowNode).find('.botones_tabla_dropdown').show();
                        }else{//if data.evento_id.startsWith
                           $(rowNode).find('.botones_tabla_dropdown').hide();
                           $(rowNode).find('.mas').hide();
                        }//else if data.evento_id.startsWith
                     }//else if reprogramar
                  });//api.rows().every

                  //verifico que sea el segundo primer arranque
                  if(arranque==1){
                     carga_tabla=true;
                  }//if(arranque==1)
						console.log("​arranque", arranque);
                  //console.log("​carga_tabla", carga_tabla);
                  arranque++;
                  
                  //reviso si en el día de la fecha hay turnos sin confirmar
                  eventos_confirmados=true;
                  if(carga_tabla){
                     //api.rows().every( function () {
                        //para cada turno compruebo si tiene o no algún turno sin confirmar
                        // if(this.data().evento_confirmado_id==2 && moment('17/07/2023','DD/MM/YYYY').isSame(moment(this.data().fecha, "DD/MM/YYYY"),"day")){
                        //    eventos_confirmados=false;
                        // }//this.data
                     //})//this api
                  
                     // if(!eventos_confirmados){
                     //    $('#alerta_reprogramar').empty();
                     //    var alerta='';
                     //    alerta+='<div class="d-flex justify-content-center">';
                     //    alerta+='<div class="row">';
                     //    alerta+='<div class="col-md-12">';
                     //    alerta+='<b>ADVERTENCIA!!</b> Hay turnos sin confirmar para el profesional en el día actual';
                     //    alerta+='<div class="col-auto d-flex justify-content-center align-items-center" id="btn_alerta_eventos_confirmados">';
                     //    alerta+='<button type="button" id="btn_alerta_reprogramar" class="btn btn-danger btn-cancelar">Cancelar</button>';
                     //    alerta+='</div>';
                     //    alerta+='</div>';
                     //    alerta+='</div>';
                     //    alerta+='</div>';
                     //    $("#alerta_reprogramar").append(alerta);
                     //    // Mostrar la alerta
                     //    $("#alerta_reprogramar").effect("slide","slow");
                     // }//turnos confirmados


                     if(selectsedeactual != "" ){
                        selectsedeactual=selectsede.value;
                        datos=[];
                        //tomo los datos de las filas
                        var that=api;
                        cont=0;
                        duracion_turno_agenda=0;
                        that.rows().every( function () {
                           datos[cont]=this.data();
                           cont++;
                        });//that
                        //console.log("​datos", datos);
                           
                        var sede_id=1;
                        var existencia_evento=false;//lo usaremos para comrobar si hay turnos dados
                        var existencia_agenda=false;//lo usaremos para saber si el profesional tiene alguna agenda en cada día
                        var horarios= false;//lo usaremos para saber evitar errores de agendas sin horarios
                        var horario_actual=false;//lo usaré para ver el horario según el día a analizar
                        var cant_eventos=0;//cuando analizo los turnos cuento cuantos hay para recorrerlos
                        var turno_analizando=null;
                        var numero_fila_nueva=0;

                        var mes=moment($("#fecha_mes").val(),"YYYY-MM");
                        var ultimo_dia_mes = moment($("#fecha_mes").val(),"YYYY-MM").clone().endOf("month");// Obtener el último día del mes
                        var primer_dia_mes = null;
                        //verifico si la fecha actual está dentro del mes elegido para no crear turnos vacíos hacia atrás
                        //si es entonces le pongo la fecha actual y al final al incrementar no va a hacer el resto
                        if(mes.isSame(moment(),"month")){
                           primer_dia_mes = moment();
                        }else{//else if mes.isSame moment "month"
                           if(mes.isSameOrAfter(moment(),"month")){
                              primer_dia_mes = moment($("#fecha_mes").val(),"YYYY-MM").clone().startOf("month");// Obtener el primer día del mes
                           }//if mes.isSameOrAfter moment "month"
                        }//if mes.isSame moment "month"

                        // "usuario_id":selectsedeactual,                                        
                        if(primer_dia_mes!==null){//Compruebo si se asignó alguna fecha
                           //listo la agenda del médico para esas fechas
                           $.ajax({
                              url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/agenda_medicos");?>',
                              data : {"sede_id":sede_id, 
                                       "fecha_inicio":primer_dia_mes.format("YYYY-MM-DD"),
                                       "fecha_fin":ultimo_dia_mes.format("YYYY-MM-DD")},
                              type : 'GET',
                              dataType : 'json',
                              async : false,
                              
                              success : function(agenda) {
                                 var fecha_variable=primer_dia_mes;//Establezco una variable para ir incrementando y dejar intacta el primer dia
                                 var cont=0;
                                 while(fecha_variable.isSameOrBefore(ultimo_dia_mes, "day")){
                                    //compruebo si hay turnos este día
                                    existencia_agenda=false;//si existe en la agenda analizo los turnos libres
                                    horarios=false;//inicializo los horarios como que no existen
                                    existencia_evento=false;
                                    // Dentro de esta función, pos representa 
                                    // la posición del elemento en el arreglo y dat representa el valor del elemento en esa posición.
                                    //compruebo si hay algún turno dado para la fecha analizada
                                    $.each(datos,function(pos, dat){
                                       let fecha_evento=moment(dat.fecha,"DD/MM/YYYY");
                                       if (fecha_variable.isSame(fecha_evento, "day")) {
                                          existencia_evento=true;
                                          return false;
                                       }//if fecha_variable.isSame
                                    })//datos.forEach
                                    
                                    $.each(agenda.agenda,function(pos, d){
                                       let fecha_inicio=moment(d.fecha_inicio,"YYYY-MM-DD");
                                       let fecha_fin=moment(d.fecha_fin,"YYYY-MM-DD");
                                       if (fecha_variable.isSameOrAfter(fecha_inicio, "day") && fecha_variable.isSameOrBefore(fecha_fin, "day")) {
                                          //compruebo las excepciones
                                          if(d.excepcion=="SI"){
                                             if(d.trabaja=="SI"){
                                                existencia_agenda="excepcion_trabaja";
                                                horarios=d.horarios;
                                                return false;
                                             }else{//if d.excepcion=="SI"
                                                existencia_agenda="excepcion_no_trabaja";
                                                horarios=false;
                                                return false;
                                             }//else if d.excepcion=="SI"
                                          }//if d.excepcion=="SI"
                                       }//if fecha_variable.isSameOrAfter
                                    })//agenda.agenda.forEach

                                    if(!existencia_agenda){//compruebo si ya se encontró un horario
                                       $.each(agenda.no_disponible,function(pos, nd){
                                          let fecha_inicio=moment(nd.fecha_inicio,"YYYY-MM-DD");
                                          let fecha_fin=moment(nd.fecha_fin,"YYYY-MM-DD");
                                          if (fecha_variable.isSameOrAfter(fecha_inicio, "day") && fecha_variable.isSameOrBefore(fecha_fin, 'day')) {
                                             existencia_agenda="no_disponible";
                                             horarios=false;
                                             return false;
                                          }//if fecha_variable.isSameOrAfter
                                       })//agenda.no_disponible.forEach
                                    }//!existencia_agenda

                                    if(!existencia_agenda){//compruebo si ya se encontró un horario
                                       $.each(agenda.agenda,function(pos, d){
                                          let fecha_inicio=moment(d.fecha_inicio,"YYYY-MM-DD");
                                          let fecha_fin
                                          if(d.fecha_fin===null){
                                             fecha_fin=d.fecha_fin;
                                          }else{//if d.fecha_fin===null
                                             fecha_fin=moment(d.fecha_fin,"YYYY-MM-DD");
                                          }// else if d.fecha_fin===null
                                          
                                          if (fecha_variable.isSameOrAfter(fecha_inicio, "day") && (fecha_variable.isSameOrBefore(fecha_fin, "day") || fecha_fin===null)){
                                             //compruebo las excepciones
                                             if(d.excepcion=="NO"){
                                                existencia_agenda="agenda";
                                                horarios=d.horarios;
                                                return false;
                                             }//if d.excepcion=="SI"
                                          }//if fecha_variable.isSameOrAfter
                                       })//agenda.agenda.forEach
                                    }//!existencia_agenda

                                    //Si no tiene ningún turno asignado ese día y tiene turnos disponibles en la agenda creo los turnos libres
                                    if(existencia_agenda=="excepcion_trabaja" || existencia_agenda=="agenda"){
                                       if(horarios){//compruebo que hayan horarios
                                          $.each(horarios,function(pos, h){
                                             if(h.dia==fecha_variable.format("dddd")){
                                                if(!existencia_evento){//compruebo si existen turnos para la fecha
                                                   var hora_inicio_agenda_moment = moment(h.hora_inicio, 'HH:mm:ss', true);
                                                   var hora_fin_agenda_moment = moment(h.hora_fin, 'HH:mm:ss', true);
                                                   var duracion_turno_agenda=h.duracion;
                                                   //veo cuanto tiempo tiene disponible entre turno y turno
                                                   var tiempo_disponible=hora_fin_agenda_moment.diff(hora_inicio_agenda_moment, 'minutes');
                                                   //establezco la cantidad de turnos que puedo dar en este espacio libre
                                                   var cant_turn=Math.floor(tiempo_disponible/duracion_turno_agenda);
                                                   for(var i=1 ; i<=cant_turn; i++){
                                                      numero_fila_nueva++;
                                                      var fecha_actual=fecha_variable.format("DD/MM/YYYY");
                                                      var hora_inicio_turno=hora_inicio_agenda_moment.format('HH:mm');
                                                      var hora_fin_turno=hora_inicio_agenda_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                                      table.row.add( {
                                                         "evento_id":       'filanueva'+numero_fila_nueva,
                                                         "defaultContent":"",
                                                         "boton": "",
                                                         "dia":  h.dia   ,
                                                         "fecha":  fecha_actual   ,
                                                         "hora_inicio":  hora_inicio_turno   ,
                                                         "hora_fin":  hora_fin_turno   ,
                                                         "estado": "Libre",
                                                         "nombre_cumpleaniero":     "",
                                                         "usuario_dni":       "",
                                                      //   "motivo":       "Dias sin turnos",
                                                         "tematica":       "",
                                                         "defaultContent": ""
                                                      } );// table.row.add

                                                      //compruebo si es el último horario del día para aplicarle el horario final de la agenda
                                                      if(i==cant_turn && hora_fin_agenda_moment.diff(moment(hora_fin_turno, "HH:mm"),'minutes')>0){
                                                         numero_fila_nueva++;
                                                         table.row.add( {
                                                            "evento_id":       'filanueva'+numero_fila_nueva,
                                                            "defaultContent":"",
                                                            "boton": "",
                                                            "dia":  h.dia   ,
                                                            "fecha":  fecha_actual   ,
                                                            "hora_inicio":  hora_fin_turno   ,
                                                            "hora_fin":  hora_fin_agenda_moment.format("HH:mm")   ,
                                                            "estado": "Libre",
                                                            "nombre_cumpleaniero":     "",
                                                            "usuario_dni":       "",
                                                         //   "motivo":       "Dias sin turnos",
                                                            "tematica":       "",
                                                            "defaultContent": ""
                                                         } );// table.row.add
                                                      }//if i==cant_turn && hora_fin_agenda_moment.diff
                                                   }//for var i=1
                                                }else{//if !existencia_evento
                                                   //compruebo si hay algún turno dado para la fecha analizada
                                                   turno_analizando=[];
                                                   cant_eventos=0;
                                                   $.each(datos,function(pos, dat){
                                                      let fecha_evento=moment(dat.fecha,"DD/MM/YYYY");
                                                      if (fecha_variable.isSame(fecha_evento, "day")){
                                                         turno_analizando[cant_eventos]=dat;
                                                         cant_eventos++;
                                                      }//if fecha_variable.isSame
                                                   })//datos.forEach

                                                   for (var pos=0 ; pos<cant_eventos ; pos++){
                                                      var duracion_turno_agenda=h.duracion;
                                                      //analizo el primer turno
                                                      if(pos==0){
                                                         //primero veo si es el primer turno agendado es el primero del día o no
                                                         var hora_inicio_dia_moment = moment(turno_analizando[pos].hora_inicio, 'HH:mm', true);
                                                         var hora_inicio_agenda_moment = moment(h.hora_inicio, 'HH:mm:ss', true);
                                                         
                                                         //veo cuanto tiempo tiene disponible entre turno y turno
                                                         var tiempo_disponible=hora_inicio_dia_moment.diff(hora_inicio_agenda_moment, 'minutes');
                                                         if(tiempo_disponible>0){
                                                            //establezco la cantidad de turnos que puedo dar en este espacio libre
                                                            var cant=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                                            for(var i=1 ; i<=cant; i++){
                                                               numero_fila_nueva++;
                                                               var hora_inicio_turno=hora_inicio_agenda_moment.format('HH:mm');
                                                               if(i==cant){
                                                                  var hora_fin_turno=hora_inicio_dia_moment.format('HH:mm');
                                                               }else{
                                                                  var hora_fin_turno=hora_inicio_agenda_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                                               };
                                                               table.row.add( {
                                                                  "evento_id":       'filanueva'+numero_fila_nueva,
                                                                  "defaultContent": "",
                                                                  "boton": "",
                                                                  "dia":            turno_analizando[pos].dia   ,
                                                                  "fecha":          turno_analizando[pos].fecha   ,
                                                                  "hora_inicio":    hora_inicio_turno   ,
                                                                  "hora_fin":       hora_fin_turno   ,
                                                                  "estado":         "Libre",
                                                                  "nombre_cumpleaniero":       "",
                                                                  "usuario_dni":         "",
                                                                  //"motivo":         "Primer turno",
                                                                  "tematica":        "",
                                                                  "defaultContent": ""
                                                               });//table.row.add 
                                                            }//for i=1
                                                         }//if tiempo_disponible>0
                                                      }//if pos==0

                                                      //analizo el útlimo turno
                                                      if(pos==cant_eventos-1){
                                                         //primero veo si el último turno agendado es el último del día o no
                                                         var hora_fin_dia_moment = moment(turno_analizando[pos].hora_fin, 'HH:mm', true);
                                                         var hora_fin_agenda_moment = moment(h.hora_fin, 'HH:mm:ss', true);
                                                         //veo cuanto tiempo tiene disponible entre turno y turno
                                                         tiempo_disponible=hora_fin_agenda_moment.diff(hora_fin_dia_moment, 'minutes');
                                                         if(tiempo_disponible>0){
                                                            //establezco la cantidad de turnos que puedo dar en este espacio libre
                                                            var cant=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                                            for(var i=1 ; i<=cant; i++){
                                                               numero_fila_nueva++;
                                                               var hora_inicio_turno=hora_fin_dia_moment.format('HH:mm');
                                                               if(i==cant){
                                                                  var hora_fin_turno=hora_fin_agenda_moment.format('HH:mm');
                                                               }else{
                                                                  var hora_fin_turno=hora_fin_dia_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                                               };
                                                               table.row.add( {
                                                                  "evento_id":       'filanueva'+numero_fila_nueva,
                                                                  "defaultContent": "",
                                                                  "boton": "",
                                                                  "dia":            turno_analizando[pos].dia   ,
                                                                  "fecha":          turno_analizando[pos].fecha   ,
                                                                  "hora_inicio":    hora_inicio_turno   ,
                                                                  "hora_fin":       hora_fin_turno   ,
                                                                  "estado":         "Libre",
                                                                  "nombre_cumpleaniero":       "",
                                                                  "usuario_dni":         "",
                                                                  // "motivo":         "Último turno",
                                                                  "tematica":        "",
                                                                  "defaultContent": ""
                                                               });//table.row.add 
                                                            }//for i=1
                                                         }//if diff
                                                      }//if(pos==cont-1)

                                                      //creo los turnos libres intermedio
                                                      if(pos<cant_eventos-1){
                                                         //turnos intermedios
                                                         var hora_fin_moment = moment(turno_analizando[pos].hora_fin, 'HH:mm', true);
                                                         var hora_inicio_moment = moment(turno_analizando[pos+1].hora_inicio, 'HH:mm', true);
                                                         
                                                         tiempo_disponible=hora_inicio_moment.diff(hora_fin_moment, 'minutes');

                                                         //veo cuanto tiempo tiene disponible entre turno y turno
                                                         if(tiempo_disponible>0){
                                                            //establezco la cantidad de turnos que puedo dar en este espacio libre
                                                            var cant=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                                            
                                                            for(var i=1 ; i<=cant; i++){
                                                               numero_fila_nueva++;
                                                               var hora_inicio_turno=hora_fin_moment.format('HH:mm');
                                                               if(i==cant){
                                                                  var hora_fin_turno=hora_inicio_moment.format('HH:mm');
                                                               }else{
                                                                  var hora_fin_turno=hora_fin_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                                               };
                                                               table.row.add( {
                                                                  "evento_id":       'filanueva'+numero_fila_nueva,
                                                                  "defaultContent": "",
                                                                  "boton": "",
                                                                  "dia":            turno_analizando[pos].dia   ,
                                                                  "fecha":          turno_analizando[pos].fecha   ,
                                                                  "hora_inicio":    hora_inicio_turno   ,
                                                                  "hora_fin":       hora_fin_turno   ,
                                                                  "estado":         "Libre",
                                                                  "nombre_cumpleaniero":       "",
                                                                  "usuario_dni":         "",
                                                                  // "motivo":         "Turnos intermedios",
                                                                  "tematica":        "",
                                                                  "defaultContent": ""
                                                               });//table.row.add 
                                                            }//for i=1
                                                         }//if tiempo_disponible>0
                                                      }//if pos!=cant
                                                   }//for pos
                                                }//else if !existencia_evento
                                             }//if h.dia==fecha_variable.format
                                          })//$.each horarios
                                       }//if horarios
                                    }//if existencia_agenda=="excepcion_trabaja" || existencia_agenda=="excepcion_trabaja"
                                    fecha_variable = fecha_variable.add(1, "day");
                                    cont++;
                                 }//while fecha_variable.isSameOrBefore && cont<=32
                              }//success
                           });//ajax
                        }//primer_dia_mes!=NULL
                     }//selectsede.value != ""
                     carga_tabla=false;
                     table.draw();
                     $.LoadingOverlay("hide");
                  }// if carga tabla
                  
               }//drawcallback       
            });//datatable  
            //---------------------------FIN DE LA TABLA-------------------------------------------------------------
        
            // ----------------------BOTON DETALLES-------------------------------------------
            $("#tabla1 tbody").on("click", '.mas', function () {
               $('#modal_nuevo_evento input').off();
               $('#modal_nuevo_evento select').off();
               //me posiciono al principio de la fila
               var filaTurno = this.closest("tr");
               //obtengo los datos de la fila
               datosdeFilaEvento=table.row(filaTurno).data();
               //obtengo el id de la fila
               var evento_id=datosdeFilaEvento.evento_id;
               
               if(evento_id.indexOf("fila") > -1){ //si el id contiene la palabra fila significa que se quiere programar un nuevo turno
                  $(".modal_nuevo_evento_buscar_por").show();//muestro las opciones
                  $("#modal_nuevo_evento_form").trigger("reset");//reseteo el formulario
                  $("#modal_nuevo_evento_lista_dni button").remove();//borro los datos por si ya lo habían abierto antes
                  $("#modal_nuevo_evento_form").hide();
                  $("#modal_nuevo_evento_datos_paciente").hide();
                  $("#modal_nuevo_evento_por_dni").hide();
                  $("#modal_nuevo_evento_por_nombreyapellido").hide();
                  $("#modal_nuevo_evento_dni").val("");//borro los datos por si ya lo habían abierto antes
                  $(".modal_nuevo_evento_por").prop("checked", false);
                  $("#modal_nuevo_evento_header").css("background-color", "#005eff");
                  $("#modal_nuevo_evento_header").css("color", "white" );
                  $("#modal_nuevo_evento_titulo").text("Nuevo Evento");
                  $("#modal_nuevo_evento_alertas").empty();
                  $(".validacion").removeClass("is-invalid border-danger");
                  $(".validacion").addClass("border-primary");
                  $("#modal_nuevo_evento .select").empty();
                  $("#modal_nuevo_evento_tabla").removeClass("table-danger");
                  //$("#modal_nuevo_evento_tabla_senias").removeClass("table-danger");

                  turno_nuevo_fecha=moment(datosdeFilaEvento.fecha, "DD/MM/YYYY",true).format("YYYY-MM-DD");
                  $("#modal_nuevo_evento_fecha").val(turno_nuevo_fecha);
                  $("#modal_nuevo_evento_hora_inicio").val(datosdeFilaEvento.hora_inicio);
                  $("#modal_nuevo_evento_hora_fin").val(datosdeFilaEvento.hora_fin);
                  var duracion=moment(datosdeFilaEvento.hora_fin,"HH:mm").diff(moment(datosdeFilaEvento.hora_inicio,"HH:mm"), 'minutes');
                  $("#modal_nuevo_evento_duracion").val(duracion);

                  var cant_servicios=0;//detecto cada vez que agrego un servicio
                  //var cant_equipos=0;//detecto cada vez que agregó un equipo
                  var cant_filas=0;//con este voy a comprobar si se envió algún servicio luego
                  var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                  val+="?estado_id=2";
                  val+="&cant_servicios="+cant_servicios;
                  //val+="&cant_equipos="+cant_equipos;
                  val+="&cant_filas="+cant_filas;
                  $("#modal_nuevo_evento_form").prop("action",val);

                  //busco algunos datos de la sede como la duración por defecto de cada cita
                  $.ajax({
                     url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/buscar_sede");?>',
                     type : 'GET',
                     data :  {"sede_id":selectsedeactual},
                     dataType : 'json',
                     async : false,

                     success : function(sedes) {
                        //plasmo los datos de la sede en el modal
                        $("#modal_nuevo_evento_sede").val(sedes.sedes[0].sede);
                        console.log("sedes: ",sedes.sedes[0].sede);
                        $("#modal_nuevo_evento_sede_id").val(sedes.sedes[0].sede_id);
                     }//SUCCESS AJAX BUSCAR_sede
                  });//AJAX BUSCAR_sede
                  
                  //modal select periodicidad
                  $.ajax({
                     url : "<?php echo site_url("agendadeeventos/tratamientos_contr/listar_sedes");?>",
                     dataType : 'json',
                     async : false,

                     success : function(datos) {
                     var option = document.createElement("option");
                     option.text = "Elija una opcion...";
                     option.value= "";
                     $("#modal_nuevo_evento_sede_id").append(option);
                     datos.sedes.forEach(function(sede_servicio){
                        var option = document.createElement("option");
                        option.text = sede_servicio.sede;
                        option.value= sede_servicio.sede_id;
                        $("#modal_nuevo_evento_sede_id").append(option);
                        if(sede_servicio.valor_por_defecto==2){
                           $("#modal_nuevo_evento_sede_id option[value='"+sede_servicio.sede_id+"']"). prop("selected",true);
                        }
                     })//foreach sede
                     }//success listar sede
                  })//ajax listar sede

                  //muestro el modal
                  $("#modal_nuevo_evento").modal("show");

                  //------------------------botón nuevo paciente-------------------
                  $("#modal_nuevo_evento").off("click", "#modal_nuevo_evento_boton_nuevo_cliente").on("click", "#modal_nuevo_evento_boton_nuevo_cliente", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     //reseteo los colores de los campos
                     $(".validacion").addClass("border-primary");
                     $(".validacion").removeClass("is-invalid border-danger");
                     //COMO SACO LA ALERTA FALSA MAL ASIGNADA
                     $("modal_paciente.alert").remove();

                     //preparo el modal
                     $("#modal_paciente_form").trigger("reset");
                     $("#modal_paciente_header").css("background-color", "#005eff");
                     $("#modal_paciente_header").css("color", "white" );
                     $("#modal_paciente_titulo").text("Nuevo cliente");
                     $("#modal_paciente .select").empty();

                     //modal select documento_tipo
                     $.ajax({
                        url : "<?php echo site_url("agendadeeventos/pacientes_contr/listar_documento_tipo");?>",
                        dataType : 'json',
                        async : false,

                        success : function(datos) {
                        
                        var option = document.createElement("option");
                        option.text = "Elija una opcion...";
                        option.value= "";
                        $("#modal_paciente_documento_tipo_id").append(option);

                        datos.documento_tipo.forEach(function(doc_tipo){
                           var option = document.createElement("option");
                           option.text = doc_tipo.documento_tipo;
                           option.value= doc_tipo.documento_tipo_id;
                           $("#modal_paciente_documento_tipo_id").append(option);
                        })//foreach documento_tipo
                        }//success listar documento_tipo
                     })//ajax listar documento_tipo

                     var val="<?php echo site_url("agendadeeventos/pacientes_contr/agrega_paciente"); ?>";
                     $("#modal_paciente_form").prop("action",val);
                     $("#modal_nuevo_evento").modal("hide");
                     $("#modal_paciente").modal("show");

                     let timeout;
                     $("#modal_paciente_documento_numero").on("keyup change", function(){
                        $('##modal_pacient input').off();
                        $('##modal_pacient select').off();
                        var usuario=this.value;
                        clearTimeout(timeout);
                        timeout = setTimeout(function(){
                        $("#modal_paciente_usuario").val(usuario);
                        }, 700)//setTimeout
                     })//on "keyup change" #modal_paciente_documento_numero

                     //--------------FORMULARIO NUEVO PACIENTE---------------------------------
                     var opcionesform = { 
                        beforeSubmit: function(){
                        $(".validacion").removeClass("is-invalid border-danger");
                        $.LoadingOverlay("show");
                        }, //before
                        
                        success: function(datos){
                           //esto saca el overlay cargando
                           $.LoadingOverlay("hide");
                           $("modal_paciente.alert").remove();

                        if(datos.validacion=="ERROR"){
                           var alerta='';
                           if(datos.errores.nombre!=""){
                              $("#modal_paciente_nombre").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.nombre!=""
                           if(datos.errores.apellido!=""){
                              $("#modal_paciente_apellido").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.apellido!=""
                           if(datos.errores.documento_tipo_id!=""){
                              $("#modal_paciente_documento_tipo_id").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.documento_tipo_id!=""
                           if(datos.errores.celular1_numero!=""){
                              $("#modal_paciente_celular1_numero").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.celular1_numero!=""
                           if(datos.errores.celular1_prefijo!=""){
                              $("#modal_paciente_celular1_prefijo").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.celular1_prefijo!=""role="alert">Hay datos incorrectos o incompletos</div>';
                           // }//datos.errores.celular2_prefijo!=""

                           if(datos.errores.documento_numero!=""){
                              alerta+='<div class="alert alert-danger" role="alert">El dni ingresado ya existe o está vacío</div>';
                              $("#modal_paciente_documento_numero").addClass("is-invalid border-danger");
                           }//datos.errores.documento_numero!=""

                           $("#modal_paciente_alertas").append(alerta);
                        }

                        if(datos.validacion=="CORRECTO"){
                           $("#modal_paciente").modal("hide");
                           $("#modal_nuevo_evento").modal("show");
                        }//datos.validacion=="CORRECTO"
                        },  //success   
                        dataType:  'json'
                     };//var

                     $('#modal_paciente').ajaxForm(opcionesform); 
                  })//click modal_nuevo_evento_boton_nuevo_paciente

                  //------------------------elijo la forma de buscar al paciente-----------
                  $("#modal_nuevo_evento").off("click", ".modal_nuevo_evento_por").on("click", ".modal_nuevo_evento_por", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     var opcion=false;
                     $("modal_nuevo_evento.alert").remove();
                     $("#modal_nuevo_evento_dni").val("");
                     $("#modal_nuevo_evento_por_nombre").val("");
                     $("#modal_nuevo_evento_por_apellido").val("");
                     opcion=$(this).val();
                     if(opcion=="dni"){
                        $("#modal_nuevo_evento_lista_dni button").remove();
                        $("#modal_nuevo_evento_por_nombreyapellido").hide();
                        $("#modal_nuevo_evento_por_dni").show();
                        $("#modal_nuevo_evento_form").hide();
                        $("#modal_nuevo_evento_datos_paciente").hide();
                        //enfoco en el input para buscar por paciente
                        $("#modal_nuevo_evento_dni").focus();
                        //en esta función voy a captar el cambio en el imput para buscar el paciente por dni
                        let timeout;
                        $("#modal_nuevo_evento_dni").keyup(function(f){
                           f.stopImmediatePropagation();
                           clearTimeout(timeout);

                           //elimino la lista de pacientes por si hace una nueva búsqueda y escondo y reseteo
                           //el formulario de los datos del paciente anterior
                           $("#modal_nuevo_evento_datos_paciente").trigger("reset");
                           $("#modal_nuevo_evento_lista_dni button").remove();
                           $("#modal_nuevo_evento_datos_paciente").hide();
                           $("#modal_nuevo_evento_form").hide();
                           $('#modal_nuevo_evento_tabla tbody').remove();
                           //$('#modal_nuevo_evento_tabla_senia tbody').remove();
                           $("modal_nuevo_evento.alert").remove();
                           //tomo el dato ingresado por el usuario para después buscarlo en la base de datos
                           var valor_busqueda=this.value;
                           //uso esta funcion para esperar que el usuario termine de escribir
                           timeout = setTimeout(function() {
                              //traigo los pacientes que coinciden con el valor ingresado
                              $.ajax({
                                 url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/buscar_paciente_dni");?>',
                                 type : 'GET',
                                 data :  {"valor_busqueda":valor_busqueda},
                                 dataType : 'json',
                                 async : false,

                                 success : function(datos) {   
                                    //si no puso nada o si no trajo coincidencias muestro que no hay coincidencias
                                    if(datos.buscar=="" || valor_busqueda=="" ){//|| valor_busqueda.length<4
                                       $("#modal_nuevo_evento_lista_dni").append("<button type='button' class='list-group-item list-group-item-action border-primary'>No hay coincidencias</button>");
                                    }else{
                                       //si trajo coincidencias recorro los datos y creo la lista desplegable
                                       datos.buscar.forEach(function(d){
                                          $("#modal_nuevo_evento_lista_dni").append("<button type='button' class='list-group-item list-group-item-action border-primary modal_nuevo_evento_lista_paciente' id='"+d.usuario_id+"'>"+d.paciente+"</button>");
                                       });// foreach
                                    }//if datos.buscar
                                 }//success ajax buscar paciente dni
                              })//ajax buscar paciente dni
                           },700);//settimeout tiempo de espera a que termine de escribir el usuario antes de leer el dato
                        });//keyup change #modal_nuevo_evento_dni
                     }else{//else if opcion=="dni"
                        $("#modal_nuevo_evento_por_nombreyapellido").show();
                        $("#modal_nuevo_evento_por_dni").hide();
                        $("#modal_nuevo_evento_lista_dni button").remove();
                        $("#modal_nuevo_evento_form").hide();
                        $("#modal_nuevo_evento_datos_paciente").hide();
                        $("#modal_nuevo_evento_datos_paciente").trigger("reset");
                        //enfoco en el input para buscar por paciente
                        $("#modal_nuevo_evento_por_nombre").focus();
                        $('#modal_nuevo_evento_tabla tbody').remove();
                        //$('#modal_nuevo_evento_tabla_senia tbody').remove();
                        //en esta función voy a captar el cambio en el imput para buscar el paciente por dni
                        
                        $("#modal_nuevo_evento_nombreyapellido_boton").click(function(f){
                           $('#modal_nuevo_evento input').off();
                           $('#modal_nuevo_evento select').off();
                           f.stopImmediatePropagation();
                           //elimino la lista de pacientes por si hace una nueva búsqueda y escondo y reseteo
                           //el formulario de los datos del paciente anterior
                           $("#modal_nuevo_evento_datos_paciente").trigger("reset");
                           $("#modal_nuevo_evento_lista_dni button").remove();
                           $("#modal_nuevo_evento_datos_paciente").hide();
                           $("#modal_nuevo_evento_form").hide();
                           $('#modal_nuevo_evento_tabla tbody').remove();
                           //$('#modal_nuevo_evento_tabla_senia tbody').remove();
                           $("modal_nuevo_evento.alert").remove();
                           // tomo el dato ingresado por el usuario para después buscarlo en la base de datos
                           var valor_busqueda_nombre=$("#modal_nuevo_evento_por_nombre").val();
                           var valor_busqueda_apellido=$("#modal_nuevo_evento_por_apellido").val();
                           //traigo los pacientes que coinciden con el valor ingresado
                           $.ajax({
                              url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/buscar_paciente_nombre");?>',
                              type : 'GET',
                              data :  {"valor_busqueda_nombre":valor_busqueda_nombre,
                                       "valor_busqueda_apellido":valor_busqueda_apellido},
                              dataType : 'json',
                              async : false,

                              success : function(datos) {
                                 //si no puso nada o si no trajo coincidencias muestro que no hay coincidencias
                                 if(datos.buscar==""){
                                    $("#modal_nuevo_evento_lista_dni").append("<button type='button' class='list-group-item list-group-item-action border-primary'>No hay coincidencias</button>");
                                 }else{
                                    //si trajo coincidencias recorro los datos y creo la lista desplegable
                                    datos.buscar.forEach(function(d){
                                          $("#modal_nuevo_evento_lista_dni").append("<button type='button' class='list-group-item list-group-item-action border-primary modal_nuevo_evento_lista_paciente' id='"+d.usuario_id+"'>"+d.paciente+"</button>");
                                    });// foreach
                                 }//if datos.buscar
                              }//success ajax buscar_paciente
                           });//ajax buscar_paciente
                        });//keyup change #modal_nuevo_evento_dni
                     }//else if opcion=="dni"
                  })//click $(".modal_nuevo_evento_por")

                  //--------------------------detecto el click en el paciente------------------------
                  $("#modal_nuevo_evento").off("click", ".modal_nuevo_evento_lista_paciente").on("click", ".modal_nuevo_evento_lista_paciente", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     //traigo el usuario_id del paciente elegido el cual uso como id de cada botón de la lista
                     var usuario_id=this.id;
                     $("#modal_nuevo_evento_alertas").empty();
                     //verifico si el paciente ya tiene turnos este día
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/verifica_turno_unico");?>',
                        type : 'GET',
                        data :  {"usuario_id":usuario_id,
                                 "fecha":turno_nuevo_fecha
                                 },
                        dataType : 'json',
                        async : false,

                        success : function(datos) {
                           if(datos.duplicado==true){
                              var alerta='<div class="alert alert-warning" role="alert"><b>ADVERTENCIA!!</b><br>El cliente ya tiene un evento para este día:<hr>';
                              datos.detalle.forEach(function(d){
                                 alerta+='Sede: '+d.sede_id+'<br>';
                                 alerta+='Fecha: '+d.fecha+'<br>';
                                 alerta+='Horario: '+d.hora_inicio+' - '+d.hora_fin+'<hr>';
                              })//foreach
                              alerta+='</div>';
                              $("#modal_nuevo_evento_alertas").append(alerta);
                           }//if(datos.duplicado==true)
                        }//success
                     })//ajax verifica_turno_unico

                     $('#modal_nuevo_evento_tabla tbody').remove();
                     //$('#modal_nuevo_evento_tabla_senia tbody').remove();
                     //una vez elegido elimino la lista
                     $("#modal_nuevo_evento_lista_dni button").remove();
                     //busco los datos del paciente por usuario_id
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_paciente");?>',
                        type : 'GET',
                        data : {"usuario_id":usuario_id},
                        dataType : 'json',
                        async : false,

                        //DATOS DEL CLIENTE DEL MODAL AGREGAR NUEVO EVENTO, son los elementos que se muestran en datos del cliente
                        success : function(datos) {   
                           cliente=datos.cliente[0];
                           //comienzo a completar el formulario para que el usuario pueda verificar los datos del cliente
                           //en un futuro se le va a permitir al usuario modificar estos datos desde este punto
                           //$("#modal_nuevo_evento_hc").val(cliente.historia_clinica);
                           $("#modal_nuevo_evento_nombre").val(cliente.nombre);
                           $("#modal_nuevo_evento_apellido").val(cliente.apellido);
                           $("#modal_nuevo_evento_celular").val(cliente.celular);
                           //$("#modal_nuevo_evento_dni_form_tipo").val(cliente.documento_tipo);
                           $("#modal_nuevo_evento_dni_form_numero").val(cliente.documento_numero);
                           $("#modal_nuevo_evento_cliente_id").val(cliente.usuario_id);
                        }//success ajax listar_cliente
                     })//ajax listar_cliente


                     //ACA ESTA LA PARTE DE TOTAL EN SERVICIOS
                     var contenido_tabla = '<tbody><tr id="tr_modal_nuevo_evento_total_turno"><td colspan="5" align="center"><h5>Total</h5></td><td><input type="text" class="form-control border-primary" value="0" id="modal_nuevo_evento_total_turno" readonly="readonly"></td>'
                     //BOTON AGREGAR SERVICIO
                     contenido_tabla += "<tr id='tr_modal_nuevo_evento_agregar_servicio'><td colspan='6' class='text-primary'><button type='button' id='modal_nuevo_evento_agregar_servicio' class='btn btn-primary btn-block'>Agregar servicio</button></td></tr></tbody>";
                     $("#modal_nuevo_evento_tabla").append(contenido_tabla);

                     //BOTON AGREGAR SEÑA
                     // var contenido_tabla_senia = '<tbody><tr id="tr_modal_nuevo_evento_total_senias"><td colspan="5" align="center"><h5>Total señas</h5></td><td><input type="text" class="form-control border-primary" value="0" id="modal_nuevo_evento_total_senias" readonly="readonly"></td>'
                     // contenido_tabla_senia += "<tr id='tr_modal_nuevo_evento_agregar_servicio'><td colspan='6' class='text-primary'><button type='button' id='modal_nuevo_evento_agregar_senia' class='btn btn-primary btn-block'>Agregar seña</button></td></tr></tbody>";
                     // $("#modal_nuevo_evento_tabla_senia").append(contenido_tabla_senia);
                     
                     //una vez completos todos los campos muestro el formulario completo
                     $("#modal_nuevo_evento_datos_paciente").show();
                     $("#modal_nuevo_evento_form").show();
                  });//click modal_nuevo_evento_lista_paciente

                  //-------------------detecto el cambio en el campo duración----------------------
                  //----------FALTA QUE NO SE SOLAPEN LOS TURNOS-------OJO*--------------------------
                  let timeout2;
                  $("#modal_nuevo_evento").off("keyup", "#modal_nuevo_evento_duracion").on("keyup", "#modal_nuevo_evento_duracion", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     var duracion=$(this).val();
                     clearTimeout(timeout2);
                     timeout2 = setTimeout(function() {
                        if($("#modal_nuevo_evento_hora_inicio").val()!=""  && $("#modal_nuevo_evento_duracion").val()!=""){
                           var evento_nuevo_hora_fin=moment($("#modal_nuevo_evento_hora_inicio").val(), 'HH:mm', true);
                           evento_nuevo_hora_fin.add(duracion, 'm');
                           evento_nuevo_hora_fin=moment(evento_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                           $("#modal_nuevo_evento_hora_fin").val(evento_nuevo_hora_fin);

                           
                           /* Recorro todas las filas de tratamientos y 
                           obtener los valores de los checkboxes seleccionados*/
                           $(".select_tratamientos").each(function() {
                              var fila = $(this).closest("tr");
                              var servicio_id = this.value;

                              
                           });//$(".select_tratamientos").each
                        }else{//if($("#modal_nuevo_evento_duracion").val()!="")
                           $("#modal_nuevo_evento_hora_fin").val("");
                        }//if($("#modal_nuevo_evento_hora_inicio").val()!="")

                     }, 700)//set timeout2 modal_nuevo_evento_dni
                  }) //keyup modal_nuevo_evento_dni

                  //---------------------------------detecto el cambio en el campo hora inicio---------------------
                  let timeout4;
                  $("#modal_nuevo_evento").off("keyup", "#modal_nuevo_evento_hora_inicio").on("keyup", "#modal_nuevo_evento_hora_inicio", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     clearTimeout(timeout4);
                     timeout4 = setTimeout(function() {
                        if($("#modal_nuevo_evento_duracion").val()!="" && $("#modal_nuevo_evento_hora_inicio").val()!=""){
                           var duracion=$("#modal_nuevo_evento_duracion").val();
                           evento_nuevo_hora_fin=moment($("#modal_nuevo_evento_hora_inicio").val(), 'HH:mm', true);
                           evento_nuevo_hora_fin.add(duracion, 'm');
                           evento_nuevo_hora_fin=moment(evento_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                           $("#modal_nuevo_evento_hora_fin").val(evento_nuevo_hora_fin);

                           /* Recorro todas las filas de tratamientos y 
                           obtener los valores de los checkboxes seleccionados*/
                           // $(".select_tratamientos").each(function() {
                           //    var fila = $(this).closest("tr");
                           //    var servicio_id = this.value;

                           
                        }else{//if($("#modal_nuevo_evento_hora_inicio").val()!="")
                           $("#modal_nuevo_evento_hora_fin").val("");
                        }//if else($("#modal_nuevo_evento_hora_inicio").val()!="")
                     }, 700)//set timeout4 modal_nuevo_evento_dni
                  }) //keyup modal_nuevo_evento_dni

                  //select de los proveedores de ninios
                  $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_proveedores");?>',
                        type : 'GET',
                        data : {"sede_id":selectsedeactual},
                        dataType : 'json',
                        async : false,

                        success : function(datos) {
                           cant_filas++;
                           //var select_proveedores="<td><select class='form-control border-primary select_proveedores' required name='proveedor'>"; 
                           //proveedores es el nombre del array que me traigo del contr
                           var select_proveedores="";
                           datos.proveedores.forEach(function(prov){
                              select_proveedores += "<option value='"+prov.proveedor_id+"' id='optionproveedor'>"+prov.nombre+"</option>";
                           });//foreach
                           //select_proveedores += "</select></td>";
                           $("#select_proveedores").append(select_proveedores);
                           //EDITAR TURNO
                           $("#modal_editar_turno_form").prop("action",val);
                        }//success ajax listar proveedores
                     });//ajax listar proveedores

                  //-------------------------TABLA SERVICIOS---------------------------------------------

                  //---------------------------------------------------Botón nuevo servicio--------------------------------
                  $("#modal_nuevo_evento").off("click", "#modal_nuevo_evento_agregar_servicio").on("click", "#modal_nuevo_evento_agregar_servicio", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicios");?>',
                        type : 'GET',
                        data : {"sede_id":selectsedeactual},
                        dataType : 'json',
                        async : false,

                        success : function(datos) {
                           cant_filas++;
                           var contenido_tabla="<tr id='modal_nuevo_evento_servicio"+cant_servicios+"'><td><select class='form-control border-primary select_servicios' required name='servicio"+cant_servicios+"'>"; 
                           contenido_tabla += "<option value=''>Elija un servicio...</option>";
                           //servicios es el nombre del array que me traigo del contr
                           datos.servicios.forEach(function(e){
                              contenido_tabla += "<option value='"+e.servicio_id+"'>"+e.servicio+"</option>";
                           });//foreach
                           contenido_tabla += "</select></td>";
                           contenido_tabla += "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>";
                           contenido_tabla += "<td><button title='Borrar servicio' type='button' class='btn btn-danger eliminarserviciovacio'><i class='bi bi-trash'></i></botton></td></tr>";
                           $("#tr_modal_nuevo_evento_total_turno").before(contenido_tabla);
                           cant_servicios++;
                           val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                           val+="?estado_id=2";
                           val+="&cant_servicios="+cant_servicios;
                           //val+="&cant_equipos="+cant_equipos;
                           val+="&cant_filas="+cant_filas;
                           //EDITAR TURNO
                           $("#modal_editar_turno_form").prop("action",val);
                        }//success ajax listar servicios
                     });//ajax listar servicios
                  });//click nuevo_evento_agregar_servicio

                  //-------------------eliminar filas vacias-----------------------------------
                  $("#modal_nuevo_evento").off("click", ".eliminarserviciovacio").on("click", ".eliminarserviciovacio", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     //elimino la fila recién construída
                     $(this).closest("tr").remove();
                     cant_filas--;
                     val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                     val+="?estado_id=2";
                     val+="&cant_servicios="+cant_servicios;
                     // val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_editar_turno_form").prop("action",val);
                  })//click .eliminarserviciovacio

                  //-------------------detecto el cambio de servicio en el select-----------------------------------
                  //COPIA MIA PRUEBA 26/08
                  $("#modal_nuevo_evento").off("change", ".select_servicios").on("change", ".select_servicios", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     var fila=$(this).closest("tr");
                     var id_fila=fila[0].id
                     
                     if (fila.find('td:eq(0) select').val()==""){
                        //recupero los datos para calcular el nuevo total (sigue abajo)
                        var subtotal_anterior=fila.find('td:eq(5)').text();
                        //MODIFICAR ACA EL VALOR DEL INPUT
                        var total_turno_anterior=$("#modal_nuevo_evento_total_turno").val();
                        total_turno=total_turno_anterior-subtotal_anterior;
                        $("#modal_nuevo_evento_total_turno").val(total_turno);
                        //fila.find('td:eq(7)').remove();
                        fila.find('td:eq(6)').remove();
                        fila.find('td:eq(5)').remove();
                        fila.find('td:eq(4)').remove();
                        fila.find('td:eq(3)').remove();
                        fila.find('td:eq(2)').remove();
                        fila.find('td:eq(1)').remove();
                        
                        $("#"+id_fila).append("<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>");
                        $("#"+id_fila).append("<td><button title='Borrar servicio' type='button' class='btn btn-danger eliminarserviciovacio'><i class='bi bi-trash'></i></botton></td>");
                     
                     }else{////if val select != ""
                        var servicio_id=this.value;
                        //recupero los datos para calcular el nuevo total (sigue abajo)
                        //CALCULANDO PRECIO
                        var subtotal_anterior=fila.find('td:eq(5)').text();
                        var total_turno_anterior=$("#modal_nuevo_evento_total_turno").val();
                        total_turno=total_turno_anterior-subtotal_anterior;

                        // if(fila.find('td:eq(2) input').length>0){//compruebo que exista el input
                        //    var subtotal_lista_anterior=fila.find('td:eq(2) input').val();
                        //    var total_turno_lista_anterior=$("#modal_nuevo_turno_total_turno_lista").val();
                        //    total_turno_lista=total_turno_lista_anterior-subtotal_lista_anterior;
                        // }//if fila.find length >0
                        // $("#modal_nuevo_turno_total_turno_lista").val(total_turno_lista);

                        //fila.find('td:eq(7)').remove();
                        fila.find('td:eq(6)').remove();
                        fila.find('td:eq(5)').remove();
                        fila.find('td:eq(4)').remove();
                        fila.find('td:eq(3)').remove();
                        fila.find('td:eq(2)').remove();
                        fila.find('td:eq(1)').remove();

                        $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+servicio_id+"nombre'></td>");
                        $("#"+id_fila).append("<td><input type='time' class='form-control border-primary'  name='"+servicio_id+"hora_inicio' ></td>");
                        $("#"+id_fila).append("<td><input type='time' class='form-control border-primary hora_fin_servicio'  name='"+servicio_id+"hora_fin'></td>");
                        $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+servicio_id+"observaciones'></td>");
                        $("#"+id_fila).append("<td><input type='number' class='form-control border-primary'  name='"+servicio_id+"valor'></td>");
                        $("#"+id_fila).append("<td><button title='Borrar servicio' type='button' class='btn btn-danger eliminarservicio'><i class='bi bi-trash'></i></botton></td>");

                        val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                        val+="?estado_id=2";
                        val+="&cant_servicios="+cant_servicios;
                        // val+="&cant_equipos="+cant_equipos;
                        val+="&cant_filas="+cant_filas;
                        $("#modal_nuevo_evento_form").prop("action",val);

                       
                        //busco los equipos del servicio y los grabo en la tabla
                        $.ajax({
                           url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicio");?>',
                           type : 'GET',
                           data : {"servicio_id":servicio_id},
                           dataType : 'json',
                           async : false,

                           success : function(servicios) {                        
                              //aplico el nuevo total general
                              var servicios_precio=Math.round(parseInt(servicios[0].valor)/10)*10;
                              
                              total_turno+=servicios_precio;
                              $("#modal_nuevo_evento_total_turno").val(total_turno);
                              $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' value='' name='nombre' ></td>");

                              
                              //busco los equipos del servicio y los grabo en la tabla
                              $.ajax({
                                 url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_personal");?>',
                                 type : 'GET',
                                 data : {"servicio_id":servicio_id},
                                 dataType : 'json',
                                 async : false,

                                 success : function(datos_personal) {
                                    var input='';
                                    input+='<td>';
                                    datos_personal.equipos.forEach(function(e){//recorro los equipos del servicio
                                       var comprueba_equipo=true;
                                       datos_personal_turnos.forEach(function(et){//recorro los equipos de los turnos en ese día y esa hora
                                          if(e.equipo_id==et.equipo_id){//comparo para ver si los equipos ya están en uso
                                             comprueba_equipo=false;
                                             return false;
                                          }//if e.equipo_id!=et.equipo_id datos_personal_turnos
                                       })//foreach 
                                       cant_equipos++;
                                       if(comprueba_equipo){
                                          input+="<input class='form-check-input' type='checkbox' value='"+e.equipo_id+"' name='"+e.servicio_id+"equipo"+cant_equipos+"'><label class='form-check-label' for='"+e.servicio_id+"equipo"+cant_equipos+"'>"+e.equipo+"</label><br>";
                                       }else{//if comprueba_equipo
                                          input+="<input class='form-check-input' type='checkbox' disabled value='"+e.equipo_id+"' name='"+e.servicio_id+"equipo"+cant_equipos+"'><span class='text-muted'>(en uso)</span><label class='form-check-label' for='"+e.servicio_id+"equipo"+cant_equipos+"'>"+e.equipo+"</label><br>";
                                       }//else if comprueba_equipo
                                    });//foreach                                        
                                    input+='</td>';
                                    //ACA ME TRAE LOS EQUIPOS EN LA TABLA
                                    //$("#"+id_fila).append(input);
                                 }//success equipos
                              });//ajax listar_equipos

                              // agrego el resto de los campos
                              // nombre
                           }//success servicios
                        });//ajax listar_servicios
                        //donde

                        //compruebo los equipos que se están usando en esa fecha y hora
                       
                     }//else if val select != ""
                  });//change select_servicios

                  //----------------------------------------elimino las filas--------------------------------------------------
                  $("#modal_nuevo_evento").off("click", ".eliminarservicio").on("click", ".eliminarservicio", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     //me pociciono al principio de la fila
                     var ubicacion=$(this).closest("tr");
                     //antes de eliminar la fila recalculo el total recupero los datos para calcular el nuevo total
                     var subtotal_anterior=ubicacion.find('td:eq(5)').text();
                     var total_turno_anterior=$("#modal_nuevo_evento_total_turno").val();
                     var total_turno=Math.round((total_turno_anterior-subtotal_anterior)/10)*10;
                     $("#modal_nuevo_evento_total_turno").val(total_turno);

                     //elimino la fila
                     var datosdefila = ubicacion.remove();
                     cant_filas--;
                     val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                     val+="?estado_id=2";
                     val+="&cant_servicios="+cant_servicios;
                     // val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_nuevo_evento_form").prop("action",val);
                  })//click .eliminarservicio

                  //-------------------------TABLA SENIAS---------------------------------------------
                  
                  //---------------------------------------------------Botón nuevo senia--------------------------------
                  $("#modal_nuevo_evento").off("click", "#modal_nuevo_evento_agregar_senia").on("click", "#modal_nuevo_evento_agregar_senia", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_senias");?>',
                        type : 'GET',
                        data : {"sede_id":selectsedeactual},
                        dataType : 'json',
                        async : false,

                        success : function(datos) {
                           cant_filas++;
                           var contenido_tabla="<tr id='modal_nuevo_evento_senia"+cant_senias+"'><td><select class='form-control border-primary select_senias' required name='senia"+cant_senias+"'>"; 
                           contenido_tabla += "<option value=''>Elija un senia...</option>";
                           //senias es el nombre del array que me traigo del contr
                           datos.senias.forEach(function(e){
                              contenido_tabla += "<option value='"+e.senia_id+"'>"+e.senia+"</option>";
                           });//foreach
                           contenido_tabla += "</select></td>";
                           contenido_tabla += "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>";
                           contenido_tabla += "<td><button title='Borrar senia' type='button' class='btn btn-danger eliminarseniavacio'><i class='bi bi-trash'></i></botton></td></tr>";
                           $("#tr_modal_nuevo_evento_total_turno").before(contenido_tabla);
                           cant_senias++;
                           val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                           val+="?estado_id=2";
                           val+="&cant_senias="+cant_senias;
                           //val+="&cant_equipos="+cant_equipos;
                           val+="&cant_filas="+cant_filas;
                           //EDITAR TURNO
                           $("#modal_editar_turno_form").prop("action",val);
                        }//success ajax listar senias
                     });//ajax listar senias
                  });//click nuevo_evento_agregar_senia

                  //-------------------eliminar filas vacias-----------------------------------
                  $("#modal_nuevo_evento").off("click", ".eliminarseniavacio").on("click", ".eliminarseniavacio", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     //elimino la fila recién construída
                     $(this).closest("tr").remove();
                     cant_filas--;
                     val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                     val+="?estado_id=2";
                     val+="&cant_senias="+cant_senias;
                     // val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_editar_turno_form").prop("action",val);
                  })//click .eliminarseniavacio

                  //-------------------detecto el cambio de senia en el select-----------------------------------
                  //COPIA MIA PRUEBA 26/08
                  $("#modal_nuevo_evento").off("change", ".select_senias").on("change", ".select_senias", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     var fila=$(this).closest("tr");
                     var id_fila=fila[0].id
                     
                     if (fila.find('td:eq(0) select').val()==""){
                        //recupero los datos para calcular el nuevo total (sigue abajo)
                        var subtotal_anterior=fila.find('td:eq(5)').text();
                        //MODIFICAR ACA EL VALOR DEL INPUT
                        var total_turno_anterior=$("#modal_nuevo_evento_total_turno").val();
                        total_turno=total_turno_anterior-subtotal_anterior;
                        $("#modal_nuevo_evento_total_turno").val(total_turno);
                        //fila.find('td:eq(7)').remove();
                        fila.find('td:eq(6)').remove();
                        fila.find('td:eq(5)').remove();
                        fila.find('td:eq(4)').remove();
                        fila.find('td:eq(3)').remove();
                        fila.find('td:eq(2)').remove();
                        fila.find('td:eq(1)').remove();
                        
                        $("#"+id_fila).append("<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>");
                        $("#"+id_fila).append("<td><button title='Borrar senia' type='button' class='btn btn-danger eliminarseniavacio'><i class='bi bi-trash'></i></botton></td>");
                     
                     }else{////if val select != ""
                        var senia_id=this.value;
                        //recupero los datos para calcular el nuevo total (sigue abajo)
                        //CALCULANDO PRECIO
                        var subtotal_anterior=fila.find('td:eq(5)').text();
                        var total_turno_anterior=$("#modal_nuevo_evento_total_turno").val();
                        total_turno=total_turno_anterior-subtotal_anterior;

                        //fila.find('td:eq(7)').remove();
                        fila.find('td:eq(6)').remove();
                        fila.find('td:eq(5)').remove();
                        fila.find('td:eq(4)').remove();
                        fila.find('td:eq(3)').remove();
                        fila.find('td:eq(2)').remove();
                        fila.find('td:eq(1)').remove();

                        //compruebo los equipos que se están usando en esa fecha y hora
                        var datos_equipos_turnos=null;
                        $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/equipos_fecha_hora");?>",
                           {  'fecha':$("#modal_nuevo_evento_fecha").val(),
                              'hora_inicio':$("#modal_nuevo_evento_hora_inicio").val(),
                              'hora_fin':$("#modal_nuevo_evento_hora_fin").val()
                           },
                           
                           function(datos_equipos_turnos)
                           {
                              //busco los equipos del senia y los grabo en la tabla
                              $.ajax({
                                 url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_senia");?>',
                                 type : 'GET',
                                 data : {"senia_id":senia_id},
                                 dataType : 'json',
                                 async : false,

                                 success : function(senias) {                        
                                    //aplico el nuevo total general
                                    var senias_precio=Math.round(parseInt(senias[0].valor)/10)*10;
                                    
                                    total_turno+=senias_precio;
                                    //$("#modal_nuevo_evento_total_turno").val(total_turno);
                                    //$("#"+id_fila).append("<td><input type='text' class='form-control border-primary' value='' name='nombre' ></td>");

                                    
                                    //agrego el resto de los campos
                                    //nombre
                                    $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+senia_id+"nombre'></td>");
                                    $("#"+id_fila).append("<td><input type='time' class='form-control border-primary'  name='"+senia_id+"hora_inicio' ></td>");
                                    $("#"+id_fila).append("<td><input type='time' class='form-control border-primary hora_fin_senia'  name='"+senia_id+"hora_fin'></td>");
                                    $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+senia_id+"observaciones'></td>");
                                    $("#"+id_fila).append("<td><input type='number' class='form-control border-primary'  name='"+senia_id+"valor'></td>");
                                    $("#"+id_fila).append("<td><button title='Borrar senia' type='button' class='btn btn-danger eliminarsenia'><i class='bi bi-trash'></i></botton></td>");
                                 }//success senias
                              });//ajax listar_senias

                              val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                              val+="?estado_id=2";
                              val+="&cant_senias="+cant_senias;
                              // val+="&cant_equipos="+cant_equipos;
                              val+="&cant_filas="+cant_filas;
                              $("#modal_nuevo_evento_form").prop("action",val);
                              //donde
                           },//function get comprueba_equipo
                        "json")//get comprueba_equipo
                        .fail(function(xhr, status, error) {
                           // La función .fail() se ejecutará si la solicitud AJAX falla
                        });//get comprueba_equipo
                     }//else if val select != ""
                  });//change select_senias

                  //----------------------------------------elimino las filas--------------------------------------------------
                  $("#modal_nuevo_evento").off("click", ".eliminarsenia").on("click", ".eliminarsenia", function(){
                     $('#modal_nuevo_evento input').off();
                     $('#modal_nuevo_evento select').off();
                     //me pociciono al principio de la fila
                     var ubicacion=$(this).closest("tr");
                     //antes de eliminar la fila recalculo el total recupero los datos para calcular el nuevo total
                     var subtotal_anterior=ubicacion.find('td:eq(5)').text();
                     var total_turno_anterior=$("#modal_nuevo_evento_total_turno").val();
                     var total_turno=Math.round((total_turno_anterior-subtotal_anterior)/10)*10;
                     $("#modal_nuevo_evento_total_turno").val(total_turno);

                     //elimino la fila
                     var datosdefila = ubicacion.remove();
                     cant_filas--;
                     val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/valida_evento");?>";
                     val+="?estado_id=2";
                     val+="&cant_senias="+cant_senias;
                     // val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_nuevo_evento_form").prop("action",val);
                  })//click .eliminarsenia

                  //--------------FORMULARIO NUEVO TURNO---------------------------------
                  var opcionesform = { 
                     beforeSubmit: function(){
                        $(".validacion").removeClass("is-invalid border-danger");
                        //si es obligatorio
                        $("#modal_nuevo_evento_tabla").removeClass("table-danger");
                        $.LoadingOverlay("show");
                     }, //before

                     success: function(datos){
                        $("#modal_nuevo_evento_alertas").empty();

                        if(datos.validacion=="ERROR"){
                           $.LoadingOverlay("hide");
                           var alerta='';
                           if(datos.errores.fecha!=""){
                              $("#modal_nuevo_evento_fecha").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.fecha!=""
                           if(datos.errores.hora_inicio!=""){
                              $("#modal_nuevo_evento_hora_inicio").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.hora_inicio!=""
                           if(datos.errores.hora_fin!=""){
                              $("#modal_nuevo_evento_hora_fin").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.hora_fin!=""
                           if(datos.errores.cliente_id!=""){
                              $("#modal_nuevo_evento_cliente_id").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.cliente_id!=""
                           if(datos.errores.sede_id!=""){
                              $("#modal_nuevo_evento_sede_id").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.sede_id!=""
                           if(datos.errores.duracion!=""){
                              $("#modal_nuevo_evento_duracion").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.duracion!=""
                           if(datos.errores.nombre_cumpleaniero!=""){
                              $("#modal_nuevo_evento_nombre_cumpleaniero").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.nombre_cumpleaniero!=""
                           if(datos.errores.cumple_anios!=""){
                              $("#modal_nuevo_evento_cumple_anios").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.cumple_anios!=""
                           if(datos.errores.valor_alquiler!=""){
                              $("#modal_nuevo_evento_valor_alquiler").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.cumple_anios!=""
                                                      
                           $("#modal_nuevo_evento_alertas").append(alerta);
                        }

                        if(datos.validacion=="CORRECTO"){
                           $("#modal_nuevo_evento").modal("hide");
                           recarga_tabla_pagina(url);
                           $.LoadingOverlay("hide");
                        }//datos.validacion=="CORRECTO"
                     },  //success   
                     dataType:  'json'
                  };//var

                  $('#modal_nuevo_evento').ajaxForm(opcionesform);
                  //---------------------FIN FORMULARIO NUEVO TURNO---------------------------

               }else{ //DETALLES TURNO EXISTENTE

                  //elimino las filas de la tabla por si se había consultado antes algún otro turno
                  $('#modal_detalle_tabla tr').remove();
                  
                  //consulto a la base de datos los datos del turno, los tratamientos y los equipos asignados a dichos turnos
                  $.ajax({
                     url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/detalle_evento");?>',
                     type : 'GET',
                     data :  {"evento_id":evento_id},
                     dataType : 'json',
                     async : false,
                     success : function(datos) {   
                        //armo el modal con los datos obtenidos
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Fecha y hora:</th><td colspan='2'>"+datos.evento[0].fecha+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Sede:</th><td colspan='2'>"+datos.evento[0].sede+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Alquiler del salón:</th><td colspan='2'>"+datos.evento[0].valor_alquiler+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Nombre del cumpleañero:</th><td colspan='2'>"+datos.evento[0].nombre_cumpleaniero+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Cumple (años):</th><td colspan='2'>"+datos.evento[0].cumple_anios+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Nombre de adulto:</th><td colspan='2'>"+datos.evento[0].nombre_adulto+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Apellido de adulto:</th><td colspan='2'>"+datos.evento[0].apellido_adulto+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>DNI de adulto:</th><td colspan='2'>"+datos.evento[0].documento_numero+"</td></tr>");
                        $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Celular de adulto:</th><td colspan='2'>"+datos.evento[0].celular_adulto+"</td></tr>");

                        //esta funcion define etiqueta como algo que le voy a decir entre comillas osea el nombre del encabezado
                        //y el valor que va a depender de si es null o no y despues abajo llamo a la funcion y le digo que quiero poner en esa col
                        function agregarFilaTabla(etiqueta, valor) {
                           if (valor === null) {
                              valor = "--";
                           }
                           $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>" + etiqueta + ":</th><td colspan='2'>" + valor + "</td></tr>");
                        }
                        // Llamadas a la función para agregar filas a la tabla
                        agregarFilaTabla("Temática", datos.evento[0].tematica);
                        agregarFilaTabla("Estado de invitación", datos.evento[0].observacion_invitacion);
                        agregarFilaTabla("Cantidad de niños", datos.evento[0].cant_ninios);
                        agregarFilaTabla("Cantidad de adultos", datos.evento[0].cant_adultos);
                        agregarFilaTabla("Cocina", datos.evento[0].cocina);
                        agregarFilaTabla("Encargada del evento", datos.evento[0].encargado_evento);
                        agregarFilaTabla("Ambientación", datos.evento[0].ambientacion);
                        agregarFilaTabla("Torta y mesa dulce", datos.evento[0].torta_mesa_dulce);
                        agregarFilaTabla("Lunch de adultos", datos.evento[0].lunch_adultos);
                        agregarFilaTabla("Precio del lunch adultos", datos.evento[0].precio_menu_adulto);
                        agregarFilaTabla("Proveedor adulto", datos.evento[0].proveedor_adultos);
                        agregarFilaTabla("Fecha de pedido", datos.evento[0].fecha_pedido_adultos);
                        agregarFilaTabla("Estado del pedido", datos.evento[0].estado_pedido_adultos);
                        agregarFilaTabla("Fecha de entrega del pedido", datos.evento[0].fecha_entrega_pedido_adultos);
                        agregarFilaTabla("Lunch niños", datos.evento[0].precio_menu_ninios);
                        agregarFilaTabla("Proveedor niños", datos.evento[0].proveedor_ninios);
                        agregarFilaTabla("Fecha de pedido", datos.evento[0].fecha_pedido_ninios);
                        agregarFilaTabla("Estado del pedido", datos.evento[0].estado_pedido_ninios);
                        agregarFilaTabla("Fecha de entrega del pedido", datos.evento[0].fecha_entrega_pedido_ninios);
                        agregarFilaTabla("Observaciones del menu", datos.evento[0].observaciones_menu);
                        agregarFilaTabla("Observaciones del evento", datos.evento[0].observaciones);
                        agregarFilaTabla("Descripción completa", datos.evento[0].descripcion);
                      
                        //preparo los encabezados de la tabla que va a mostrar los servicios para agregarla al modal
                        $titulo_servicios="<tr><th class='text-primary'>Servicio</th>";
                        $titulo_servicios+="<th class='text-primary'>Nombre</th>";
                        $titulo_servicios+="<th class='text-primary'>Horario de inicio</th>";
                        $titulo_servicios+="<th class='text-primary'>Horario de fin</th>";
                        $titulo_servicios+="<th class='text-primary'>Observaciones</th>";
                        $titulo_servicios+="<th class='text-primary'>Valor</th>";
                     
                        //pongo la cabecera en la tabla osea lo de arriba
                        $("#modal_detalle_tabla tbody").append($titulo_servicios);
                        var td_servicios;
                        var total_servicio=0;
                        //recorro los datos de los servicios y armo las celdas

                        if (datos.servicios && Array.isArray(datos.servicios)) {
                           datos.servicios.forEach(function(servicio) {
                              // ... Tu código para mostrar los servicios aquí ...
                           });
                        } else {
                           console.error("datos.servicios no está definido o no es un arreglo.");
                        }
                        
                        //esto se va al controlador y a detalle_evento, de ahi se trae el json[servicios] osea el resultado de lo que se trae desde la base de datos
                        //con todo lo que hay en eventos_servicios. Entonces con el foreach lo recorro y ese nombre servicios es uno cualquiera q le pongo yo
                        //y ahi empiezo a mostrar que del array servicio.selecciono el elemento que yo quiero
                        datos.servicios.forEach(function(servicio){
                           td_servicios+="<tr>";
                           td_servicios+="<td>"+servicio.servicio+"</td>";
                           td_servicios+="<td>"+servicio.nombre_servicio+"</td>";
                           td_servicios+="<td>"+servicio.hora_inicio_servicio+"</td>";
                           td_servicios+="<td>"+servicio.hora_fin_servicio+"</td>";
                           td_servicios+="<td>"+servicio.observaciones_servicio+"</td>";
                           td_servicios+="<td>$"+servicio.valor_servicio+"</td>";
                           td_servicios+="</tr>";
                           //total_servicio+=((100-servicio.descuento)/100)*servicio.importe;
                        });//foreach tratamientos
                        //td_servicios+='<tr><td colspan="5" align="center"><h5>Total</h5></td><td><h5>'+total_servicio+'</h5></td></tr>';
                        $("#modal_detalle_tabla tbody").append(td_servicios);
                     }//success ajax detalle turno
                  });//ajax detalle turno
                  $("#modal_detalle_title").text("Datos del evento");
                  $('#modal_detalle_header').css("background-color", "#005eff");
                  $('#modal_detalle_header').css("color", "white" );
                  $('#modal_detalle').modal('show');
               }//else
            });//#tabla1 body on click

            //---------------------BOTON EDITAR EVENTO--------------------------------
            $('#tabla1 tbody').on("click", ".btneditarturno", function(){
               //elimino los eventos del modal para que no interfieran
               $('#modal_editar_turno input').off();
               $('#modal_editar_turno select').off();

               $('#modal_editar_turno_tabla tbody').remove();
               $("#modal_editar_turno_form").trigger("reset");
               $("#modal_editar_turno .select").empty();
               $("#modal_editar_turno_tabla").removeClass("table-danger");
               $("#modal_editar_turno_alertas").empty();

               //me posiciono al principio de la fila
               var fila = this.closest("tr");
               //obtengo los datos de la fila
               //datosdeFilaEvento=table.row(fila).data();
               var datosdefila=table.row(fila).data();
               //obtengo el id de la fila
               var evento_id=datosdefila.evento_id;
               
               //preparo el modal
               $("#modal_editar_turno_header").css("background-color", "#005eff");
               $("#modal_editar_turno_header").css("color", "white" );
               $("#modal_editar_turno_titulo").text("Edición de evento");
               $("#modal_editar_turno_submit").text("Guardar cambios");
               $("#modal_editar_turno_datos_paciente").show();
               $("#modal_editar_turno_form").show();

               var cant_filas=0;//con este voy a comprobar si se envió algún tratamiento luego
               var cant_servicios=0;//lo uso para después procesar todos los servicios
               var total_evento=0;//calculo el total del evento
               
               //-------------listo los detalles del evento-------------
               $.ajax({
                  url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/detalle_evento");?>',
                  type : 'GET',
                  data :  {"evento_id":evento_id},
                  dataType : 'json',
                  async : false,
                  success : function(datos_evento) {
                     //DEFINIR LA VARIABLE CON LOS DATOS DEL ID CON EL QUE VIENE
                     var usuario_id=datos_evento.evento[0].usuario_id;
                     //busco los datos del paciente
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_paciente");?>',
                        type : 'GET',
                        data :  {"usuario_id" : usuario_id},
                        dataType : 'json',
                        async : false,
                        success : function(datos_cliente) {
                           //datos del cliente
                           $("#modal_editar_turno_nombre").val(datos_cliente.cliente[0].nombre);
                           $("#modal_editar_turno_apellido").val(datos_cliente.cliente[0].apellido);
                           $("#modal_editar_turno_celular").val(datos_cliente.cliente[0].celular);
                           $("#modal_editar_turno_dni_form_numero").val(datos_cliente.cliente[0].documento_numero);
                           $("#modal_editar_turno_usuario_id").val(datos_cliente.cliente[0].usuario_id);
                        }//success ajax listar_paciente
                     })//ajax listar_paciente

                     //fecha hora del evento
                     $("#modal_editar_turno_fecha").val(datos_evento.evento[0].fecha_sin_formatear);
                     $("#modal_editar_turno_hora_inicio").val(datos_evento.evento[0].hora_inicio);
                     $("#modal_editar_turno_hora_fin").val(datos_evento.evento[0].hora_fin);
                     $("#modal_editar_evento_sede").val(datos_evento.evento[0].sede);
                     $("#modal_editar_evento_sede_id").val(datos_evento.evento[0].sede_id);
                     
                     // datos del evento
                     $("#modal_editar_turno_nombre_cumpleaniero").val(datos_evento.evento[0].nombre_cumpleaniero);
                     $("#modal_editar_turno_cumple_anios").val(datos_evento.evento[0].cumple_anios);
                     $("#modal_editar_turno_nombre_evento").val(datos_evento.evento[0].nombre_evento);
                     $("#modal_editar_turno_alquiler").val(datos_evento.evento[0].valor_alquiler);
                     $("#modal_editar_turno_tematica").val(datos_evento.evento[0].tematica);
                     $("#modal_editar_turno_invitacion").val(datos_evento.evento[0].observacion_invitacion);
                     $("#modal_editar_turno_cant_ninios").val(datos_evento.evento[0].cant_ninios);
                     $("#modal_editar_turno_cant_adultos").val(datos_evento.evento[0].cant_adultos);
                     $("#modal_editar_turno_cocina").val(datos_evento.evento[0].cocina);
                     $("#modal_editar_turno_encargada").val(datos_evento.evento[0].encargado_evento);
                     $("#modal_editar_turno_ambientacion").val(datos_evento.evento[0].ambientacion);
                     $("#modal_editar_turno_torta_mesadulce").val(datos_evento.evento[0].torta_mesa_dulce);
                     $("#modal_editar_turno_lunch_adultos").val(datos_evento.evento[0].lunch_adultos);
                     $("#modal_editar_turno_precio_lunch_adultos").val(datos_evento.evento[0].precio_menu_adulto);
                     $("#modal_editar_turno_proveedor_adultos").val(datos_evento.evento[0].proveedor_adultos);
                     $("#modal_editar_turno_pedido_lunch_adultos").val(datos_evento.evento[0].fecha_pedido_adultos);
                     $("#modal_editar_turno_estado_pedido_adultos").val(datos_evento.evento[0].estado_pedido_adultos);
                     $("#modal_editar_turno_entrega_lunch_adultos").val(datos_evento.evento[0].fecha_entrega_pedido_adultos);
                     $("#modal_editar_turno_lunch_ninios").val(datos_evento.evento[0].lunch_ninios);
                     $("#modal_editar_turno_precio_lunch_ninios").val(datos_evento.evento[0].precio_menu_ninios);
                     $("#modal_editar_turno_proveedor_ninios").val(datos_evento.evento[0].proveedor_ninios);
                     $("#modal_editar_turno_pedido_lunch_ninios").val(datos_evento.evento[0].fecha_pedido_ninios);
                     $("#modal_editar_turno_estado_pedido_ninios").val(datos_evento.evento[0].estado_pedido_ninios);
                     $("#modal_editar_turno_entrega_lunch_ninios").val(datos_evento.evento[0].fecha_entrega_pedido_ninios);
                     //$("#modal_editar_turno_observaciones_menu").val(datos_evento.evento[0].observaciones_menu);
                     
                     //calculo la duración
                     var duracion=moment(datos_evento.evento[0].hora_fin, "HH:mm").diff(moment(datos_evento.evento[0].hora_inicio, "HH:mm"), 'minutes');
                     $("#modal_editar_turno_duracion").val(duracion);
                     //no andan esta observacion_menu no se por que no se muestra en el modal de editar
                     $("#modal_editar_turno_observaciones_menu").val(datos_evento.evento[0].observaciones_menu);
                     $("#modal_editar_turno_observaciones").val(datos_evento.evento[0].observaciones);

                     //preparo los encabezados de la tabla que va a mostrar los tratamientos y los equipos para agregarla al modal
                  
                     //INPUT para calcular el TOTAL de los servicios, esto va en contenido_tabla apra que aparezca en la tabla
                     //<tr id="tr_modal_editar_turno_total_turno"><td colspan="5" align="center"><h5>Total</h5></td><td><input type="text" class="form-control border-primary" value="0" id="modal_editar_turno_total_turno" readonly="readonly"></td>;
                     var contenido_tabla = '<tbody>';
                     contenido_tabla += "<tr id='tr_modal_editar_turno_agregar_servicio'><td colspan='6' class='text-primary'><button type='button' id='modal_editar_turno_agregar_servicio' class='btn btn-primary btn-block'>Agregar servicio</button></td></tr></tbody>";
                     $("#modal_editar_turno_tabla").append(contenido_tabla);
                     
                     
                     //----------------listo los servicios------------------
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicios");?>',
                        type : 'GET',
                        data : {"sede_id":datos_evento.evento[0].sede_id},
                        dataType : 'json',
                        async : false,

                        success : function(datos_servicios) {                                             
                           //------agrego los servicios existentes-----
                           //este datos_eventos hace referenia al servicio que tiene este evento
                           datos_evento.servicios.forEach(function(servicio){
                              var servicio_actual=true;//lo uso para comprobar si el servicio actual todavía está activo
                              //aplico el nuevo total general
                              // var tratamiento_precio=Math.round(parseInt(show.importe)/10)*10;
                              // total_turno+=tratamiento_precio;
                              cant_filas++;
                              var contenido_tabla="<tr id='modal_editar_turno_servicio"+cant_servicios+"'><td><select class='form-control border-primary select_servicios' required name='servicio"+cant_servicios+"'>"; 
                              contenido_tabla += "<option value=''>Elija un servicio...</option>";
                              //este datos hace referencia a todos los servicios
                              datos_servicios.servicios.forEach(function(servicio_editar){
                                 //compara de arriba si el servicio que ya esta es igual al nuevo
                                 if(servicio.servicio_id==servicio_editar.servicio_id){
                                    servicio_actual=false;
                                    contenido_tabla += "<option value='"+servicio_editar.servicio_id+"' selected>"+servicio_editar.servicio+"</option>";
                                 }else{
                                    contenido_tabla += "<option value='"+servicio_editar.servicio_id+"'>"+servicio_editar.servicio+"</option>";
                                 }//if t.servicio_id==dt.servicio_id
                              });//foreach datos_servicios.show_magia
                              if(servicio_actual){
                                 contenido_tabla += "<option value='"+servicio.servicio_id+"' selected>"+servicio.servicio+"</option>";
                              }//if tratamiento_actual
                              contenido_tabla += "</select></td>";

                              //agrego el resto de los campos de la tabla
                              contenido_tabla+="<td><input type='text' class='form-control border-primary' value='"+servicio.nombre_servicio+"' name='"+servicio.servicio_id+"nombre' ></td>";
                              contenido_tabla+="<td><input type='time' class='form-control border-primary' value='"+servicio.hora_inicio_servicio+"' name='"+servicio.servicio_id+"hora_inicio' ></td>";
                              contenido_tabla+="<td><input type='time' class='form-control border-primary' value='"+servicio.hora_fin_servicio+"' name='"+servicio.servicio_id+"hora_fin' ></td>";
                              contenido_tabla+="<td><input type='text' class='form-control border-primary' value='"+servicio.observaciones_servicio+"' name='"+servicio.servicio_id+"observaciones'></td>";
                              contenido_tabla+="<td><input type='number' class='form-control border-primary' value='"+servicio.valor_servicio+"' name='"+servicio.servicio_id+"valor'></td>";
                              contenido_tabla+="<td><button title='Borrar servicio' type='button' class='btn btn-danger eliminarservicio'><i class='bi bi-trash'></i></botton></td>";
                              
                              $("#modal_editar_turno_tabla tbody").prepend(contenido_tabla);
                              cant_servicios++;
                           });//foreach  datos_evento.servicio

                           //$("#modal_editar_turno_total_turno").val(total_turno); 
                        }//success
                     });//ajax servicio
                  }//success ajax detalle_evento
               })//ajax detalle_evento
               

               var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/editar_turno");?>";
               val+="?evento_id="+evento_id;
               val+="&cant_servicios="+cant_servicios;
               //val+="&cant_equipos="+cant_equipos;
               val+="&cant_filas="+cant_filas;
               $("#modal_editar_turno_form").prop("action",val);

               //detecto click en agregar tratamiento nuevo
               $("#modal_editar_turno").off("click", "#modal_editar_turno_agregar_servicio").on("click", "#modal_editar_turno_agregar_servicio", function(){
                  $('#modal_editar_turno input').off();
                  $('#modal_editar_turno select').off();
                  $.ajax({
                     url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicios");?>',
                     type : 'GET',
                     data : {"sede_id":1},
                     dataType : 'json',
                     async : false,

                     success : function(datos) {
                        cant_filas++;
                        var contenido_tabla="<tr id='modal_editar_turno_servicio"+cant_servicios+"'><td><select class='form-control border-primary select_servicios' required name='servicio"+cant_servicios+"'>"; 
                        contenido_tabla += "<option value=''>Elija un servicio...</option>";
                        datos.servicios.forEach(function(servicio){
                           contenido_tabla += "<option value='"+servicio.servicio_id+"'>"+servicio.servicio+"</option>";
                        });//foreach
                        contenido_tabla += "</select></td>";
                        contenido_tabla += "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>";
                        contenido_tabla += "<td><button title='Borrar servicio' type='button' class='btn btn-danger eliminarserviciovacio'><i class='bi bi-trash'></i></botton></td></tr>"
                        
                        //$("#tr_modal_editar_turno_total_turno").before(contenido_tabla);

                        //ACA HAGO QUE SE MUESTREN LOS INPUT CUANDO HAGO CLICK EN EL BOTON
                        $("#modal_editar_turno_tabla tbody").prepend(contenido_tabla);
                        cant_servicios++;
                        var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/editar_turno");?>";
                        val+="?evento_id="+evento_id;
                        val+="&cant_servicios="+cant_servicios;
                        //val+="&cant_equipos="+cant_equipos;
                        val+="&cant_filas="+cant_filas;
                        $("#modal_editar_turno_form").prop("action",val);
                     }//success ajax listar servicios
                  });//ajax listar servicios
               });//click modal_editar_turno_agregar_servicio

               $("#modal_editar_turno").modal("show");
               
               $("#modal_editar_turno").off("click", ".eliminarserviciovacio").on("click", ".eliminarserviciovacio", function(){
                  $('#modal_editar_turno input').off();
                  $('#modal_editar_turno select').off();
                  //elimino la fila recién construída
                  $(this).closest("tr").remove();
                  cant_filas++;
                  var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/editar_turno");?>";
                  val+="?evento_id="+evento_id;
                  val+="&cant_servicios="+cant_servicios;
                  //val+="&cant_equipos="+cant_equipos;
                  val+="&cant_filas="+cant_filas;
                  $("#modal_editar_turno_form").prop("action",val);
               })//click .eliminarserviciovacio

               //DETECTO SI CAMBIAN EL TRATAMIENTO
               $("#modal_editar_turno").off("change", ".select_servicios").on("change", ".select_servicios", function(){
                  $('#modal_editar_turno input').off();
                  $('#modal_editar_turno select').off();
                  var fila=$(this).closest("tr");
                  var id_fila=fila[0].id
                  
                  if (fila.find('td:eq(0) select').val()==""){
                     //recupero los datos para calcular el nuevo total (sigue abajo)
                     // var subtotal_anterior=fila.find('td:eq(5)').text();
                     // var total_turno_anterior=$("#modal_editar_turno_total_turno").val();
                     // total_turno=total_turno_anterior-subtotal_anterior;
                     // $("#modal_editar_turno_total_turno").val(total_turno);
                     fila.find('td:eq(6)').remove();
                     fila.find('td:eq(5)').remove();
                     fila.find('td:eq(4)').remove();
                     fila.find('td:eq(3)').remove();
                     fila.find('td:eq(2)').remove();
                     fila.find('td:eq(1)').remove();
                     
                     $("#"+id_fila).append("<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>");
                     $("#"+id_fila).append("<td><button title='Borrar servicio' type='button' class='btn btn-danger eliminarserviciovacio'><i class='bi bi-trash'></i></botton></td>");
                  
                  }else{//if select val != ""
                     var servicio_id=this.value;
                     //recupero los datos para calcular el nuevo total (sigue abajo)
                     // var subtotal_anterior=fila.find('td:eq(5)').text();
                     // var total_turno_anterior=$("#modal_editar_turno_total_turno").val();
                     // total_turno=total_turno_anterior-subtotal_anterior;

                     fila.find('td:eq(6)').remove();
                     fila.find('td:eq(5)').remove();
                     fila.find('td:eq(4)').remove();
                     fila.find('td:eq(3)').remove();
                     fila.find('td:eq(2)').remove();
                     fila.find('td:eq(1)').remove();
                     //busco los equipos del tratamiento y los grabo en la tabla
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicio");?>',
                        type : 'GET',
                        data : {"servicio_id":servicio_id},
                        dataType : 'json',
                        async : false,

                        success : function(tratamiento) {   
                           //agrego el resto de los campos
                           $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+servicio_id+"nombre'></td>");
                           $("#"+id_fila).append("<td><input type='time' class='form-control border-primary'  name='"+servicio_id+"hora_inicio' ></td>");
                           $("#"+id_fila).append("<td><input type='time' class='form-control border-primary hora_fin_servicio'  name='"+servicio_id+"hora_fin'></td>");
                           $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+servicio_id+"observaciones'></td>");
                           //columna valor
                           $("#"+id_fila).append("<td><input type='number' class='form-control border-primary'  name='"+servicio_id+"valor'></td>");
                           $("#"+id_fila).append("<td><button title='Borrar servicio' type='button' class='btn btn-danger eliminarservicio'><i class='bi bi-trash'></i></botton></td>");
                        }//success tratamientos
                     });//ajax listar_servicios

                     var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/editar_turno");?>";
                     val+="?evento_id="+evento_id;
                     val+="&cant_servicios="+cant_servicios;
                     //val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_editar_turno_form").prop("action",val);
                     
                  }//elseif select val != ""
               });//change select_tratamientos

               let timeout;
               $("#modal_editar_turno").off("keyup", "#modal_editar_turno_duracion").on("keyup", "#modal_editar_turno_duracion", function(){
                  $('#modal_editar_turno input').off();
                  $('#modal_editar_turno select').off();
                  var duracion=$(this).val();
                  clearTimeout(timeout);
                  timeout = setTimeout(function() {
                     if($("#modal_editar_turno_hora_inicio").val()!="" && $("#modal_editar_turno_duracion").val()!=""){
                        var evento_nuevo_hora_fin=moment($("#modal_editar_turno_hora_inicio").val(), 'HH:mm', true);
                        evento_nuevo_hora_fin.add(duracion, 'm');
                        evento_nuevo_hora_fin=moment(evento_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                        $("#modal_editar_turno_hora_fin").val(evento_nuevo_hora_fin);

                        /* Recorro todas las filas de tratamientos y 
                        obtener los valores de los checkboxes seleccionados*/
                        $(".select_tratamientos").each(function() {
                           var fila = $(this).closest("tr");
                           var servicio_id = this.value;
                        });//$(".select_tratamientos").each
                     }else{//if($("#modal_editar_turno_duracion").val()!="")
                        $("#modal_editar_turno_hora_fin").val("");
                     }
                  }, 700)//set timeout modal_editar_turno_duracion
               }) //keyup modal_editar_turno_duracion

               //---------------------------------detecto el cambio en el campo hora inicio---------------------
               let timeout4;
               $("#modal_editar_turno").off("keyup", "#modal_editar_turno_hora_inicio").on("keyup", "#modal_editar_turno_hora_inicio", function(){
                  $('#modal_editar_turno input').off();
                  $('#modal_editar_turno select').off();
                  clearTimeout(timeout4);
                  timeout4 = setTimeout(function() {
                     if($("#modal_editar_turno_duracion").val()!=""){
                        if($("#modal_editar_turno_hora_inicio").val()!=""){
                           var duracion=$("#modal_editar_turno_duracion").val();
                           evento_nuevo_hora_fin=moment($("#modal_editar_turno_hora_inicio").val(), 'HH:mm', true);
                           evento_nuevo_hora_fin.add(duracion, 'm');
                           evento_nuevo_hora_fin=moment(evento_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                           $("#modal_editar_turno_hora_fin").val(evento_nuevo_hora_fin);

                            /* Recorro todas las filas de tratamientos y 
                           obtener los valores de los checkboxes seleccionados*/
                           $(".select_tratamientos").each(function() {
                              var fila = $(this).closest("tr");
                              var servicio_id = this.value;
                           });//$(".select_tratamientos").each
                        }else{//if($("#modal_editar_turno_hora_inicio").val()!="")
                           $("#modal_editar_turno_hora_fin").val("");
                        }//if else($("#modal_editar_turno_hora_inicio").val()!="")
                     }//$("#modal_editar_turno_duracion").val()!=""
                  }, 700)//set timeout4 modal_editar_turno_dni
               }) //keyup modal_editar_turno_dni


               $("#modal_editar_turno").off("click", ".eliminarservicio").on("click", ".eliminarservicio", function(){
                  $('#modal_editar_turno input').off();
                  $('#modal_editar_turno select').off();
                  //me pociciono al principio de la fila
                  var ubicacion=$(this).closest("tr");
                  //antes de eliminar la fila recalculo el total recupero los datos para calcular el nuevo total
                  var subtotal_anterior=ubicacion.find('td:eq(5)').text();
                  var total_turno_anterior=$("#modal_editar_turno_total_turno").val();
                  var total_turno=total_turno_anterior-subtotal_anterior;
                  $("#modal_editar_turno_total_turno").val(total_turno);

                  //elimino la fila
                  var datosdefila = ubicacion.remove();
                  cant_filas--;
                  var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/editar_turno");?>";
                  val+="?evento_id="+evento_id;
                  val+="&cant_servicios="+cant_servicios;
                  val+="&cant_filas="+cant_filas;
                  $("#modal_editar_turno_form").prop("action",val);

               })//click .eliminarservicio

               //--------------FORMULARIO EDITAR TURNO---------------------------------
               //ACA ESTAN LAS FUNCIONES ANTES DE EJECUTAR EL SUBMIT OSEA DE APRETAR EL BOTON
               var opcionesform = { 
                  beforeSubmit: function(){
                     $("#modal_editar_turno_tabla").removeClass("table-danger");
                     $(".validacion").removeClass("is-invalid border-danger");
                     $.LoadingOverlay("show");
                  }, //before

                  success: function(datos){
                     $("#modal_editar_turno_alertas").empty();

                     $.LoadingOverlay("hide");
                     if(datos.validacion=="ERROR"){
                        var alerta='';
                        if(datos.errores.fecha!=""){
                           $("#modal_editar_turno_fecha").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.fecha!=""
                        if(datos.errores.hora_inicio!=""){
                           $("#modal_editar_turno_hora_inicio").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.hora_inicio!=""
                        if(datos.errores.hora_fin!=""){
                           $("#modal_editar_turno_hora_fin").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.hora_fin!=""
                        if(datos.errores.usuario_id!=""){
                           $("#modal_editar_turno_usuario_id").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.cliente_id!=""
                        if(datos.errores.sede_id!=""){
                           $("#modal_editar_evento_sede_id").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.sede_id!=""
                        if(datos.errores.duracion!=""){
                           $("#modal_editar_turno_duracion").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.duracion!=""
                        // if(datos.errores.servicios=="ERROR"){
                        //    $("#modal_editar_turno_tabla").addClass("table-danger");
                        //    alerta+='<div class="alert alert-danger" role="alert">Debe agregar un tratamiento</div>';
                        // }//datos.errores.duracion!=""
                        if(datos.errores.nombre_cumpleaniero!=""){
                           $("#modal_editar_turno_nombre_cumpleaniero").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.nombre_cumpleaniero!=""
                        if(datos.errores.cumple_anios!=""){
                           $("#modal_editar_turno_cumple_anios").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.cliente_id!=""
                        if(datos.errores.valor_alquiler!=""){
                           $("#modal_editar_evento_alquiler").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.alquiler!=""
                        
                        if(datos.errores.servicios=="ERROR"){
                           $("#modal_editar_turno_tabla").addClass("table-danger");
                           alerta+='<div class="alert alert-danger" role="alert">Debe agregar un tratamiento</div>';
                        }//datos.errores.servicios!=""
                        
                        $("#modal_editar_turno_alertas").append(alerta);
                     }

                     console.log("​datos.validacion", datos.validacion);
                     if(datos.validacion=="CORRECTO"){
                        $("#modal_editar_turno").modal("hide");
                        recarga_tabla_pagina(url);
                        // $.LoadingOverlay("hide");
                     }//datos.validacion=="CORRECTO"
                  },  //success   
                  dataType:  'json'
               };//var

               $('#modal_editar_turno').ajaxForm(opcionesform); 
               //---------------------FIN FORMULARIO EDITAR TURNO---------------------------
            });//editar turno
            //---------------------FIN BOTON EDITAR TURNO--------------------------------

            // Capturo el click en el profesional, reenvio los parámetros y deshabilito el que selecciono
            //y habilito el que tenía antes seleccionado
            $('#selectsede').click(function() {
               $('#modal_editar_turno input').off();
               $('#modal_editar_turno select').off();
               if(this.value!=selectsedeactual){
                  opselect.sede_id = this.value;//parametro para datatables
                  selectsedeanterior=selectsedeactual;
                  selectsedeactual=this.value;
                  recarga_tabla(url);
               }//if this.value
            });//$('#selectsede')
            //-----------------FIN SELECT PROFESIONALES---------------      

            //-----borramos todos los filtros-----------
            $('#borrarfiltros').on('click', function() {
               $('#modal_editar_turno input').off();
               $('#modal_editar_turno select').off();
               // Recorre cada columna y resetea el valor de búsqueda
               table.columns().every(function() {
                  var column = this;
                  $('input', column.footer()).val('').trigger('change');
               });

               // Vuelve a dibujar la tabla para aplicar los cambios
               table.search('').draw();
            });
            //----FIN BORRADO DE TODOS LOS FILTROS------

            //---------------------DETECCION DE CAMBIO EN FECHAS---------------------
            var timeout;
            $("#fecha_mes").on('change',function(){
               $('#modal_editar_turno input').off();
               $('#modal_editar_turno select').off();
               clearTimeout(timeout);
               timeout = setTimeout(function() {
                 
                     $.LoadingOverlay("show");
                     opselect.fecha=moment($("#fecha_mes").val(), 'YYYY-MM').format('YYYY-MM-DD');
                     //table.ajax.url( url ).load();
                     recarga_tabla(url);
               
               },700);//settimeout tiempo de espera a que termine de escribir el usuario antes de leer el dato
            });//keyup change
            //---------------------FIN DETECCION DE CAMBIO EN FECHAS---------------------

            //--------------------BOTON MARCAR LLEGADA--------------------------------
            $('#tabla1 tbody').on("click", ".btnasistencia", function(){
               $('#modal_editar_turno input').off();
               $('#modal_editar_turno select').off();
               var accion=$(this).text();
               //me posiciono al principio de la fila
               var fila = this.closest("tr");
               //obtengo los datos de la fila
               datosdefila=table.row(fila).data();
               //obtengo el id de la fila
               var evento_id=datosdefila.evento_id;
               var asistencia=false;
               if(!(evento_id.indexOf("fila") > -1)){
                  if(accion==" Marcar llegada "){
                     asistencia='presente';
                  }else{//if accion=="marcar"
                     if(accion==" Desmarcar llegada "){
                        asistencia='agendado';
                     }//if accion=="desmarcar"
                  }//else if accion=="marcar"
                  $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/marcar_asistencia");?>",{'asistencia':asistencia,'evento_id':evento_id},function(datos){
                     recarga_tabla_pagina(url);
                  });//get marcar asistencia
               }//if indexOf
            });//click onclick
            //------------------------------------------------------------------------

            // //--------------------BOTON MARCAR AUSENTE SIN AVISO--------------------------------
            // $('#tabla1 tbody').on("click", ".btnausencia_sin_aviso", function(){
            //    //me posiciono al principio de la fila
            //    var fila = this.closest("tr");
            //    //obtengo los datos de la fila
            //    datosdefila=table.row(fila).data();
            //    //obtengo el id de la fila
            //    var evento_id=datosdefila.evento_id;
            //    if(!(evento_id.indexOf("fila") > -1)){
            //       var asistencia='ausente_sin_aviso';
            //       $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/marcar_asistencia");?>",{'asistencia':asistencia,'evento_id':evento_id},function(datos){
            //          recarga_tabla_pagina(url);
            //       });//get marcar asistencia
            //    }//
            // });//click onclick
            // //------------------------------------------------------------------------

            // //--------------------BOTON MARCAR AUSENTE CON AVISO--------------------------------
            // $('#tabla1 tbody').on("click", ".btnausencia_con_aviso", function(){
            //    //me posiciono al principio de la fila
            //    var fila = this.closest("tr");
            //    //obtengo los datos de la fila
            //    datosdefila=table.row(fila).data();
            //    //obtengo el id de la fila
            //    var evento_id=datosdefila.evento_id;
            //    if(!(evento_id.indexOf("fila") > -1)){
            //       var asistencia='ausente_con_aviso';
            //       $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/marcar_asistencia");?>",{'asistencia':asistencia,'evento_id':evento_id},function(datos){
            //          recarga_tabla_pagina(url);
            //       });//get marcar asistencia
            //    }//!(evento_id.indexOf("fila") > -1)
            // });//click onclick
            //------------------------------------------------------------------------

            //--------------------BOTON MARCAR CANCELAR TURNO--------------------------------
            $('#tabla1 tbody').on("click", ".btncancelar", function(e){
               e.preventDefault();
               //me posiciono al principio de la fila
               var fila = this.closest("tr");
               //obtengo los datos de la fila
               datosdefila=table.row(fila).data();
               //obtengo el id de la fila
               var evento_id=datosdefila.evento_id;
               if(!(evento_id.indexOf("fila") > -1)){
                  var asistencia='cancelado';
                  $("#modal_motivo_turno_cancelado_motivo").val("");
                  $("#modal_motivo_turno_cancelado_titulo").text("Motivo de la cancelación");
                  $('#modal_motivo_turno_cancelado_header').css("background-color", "RED");
                  $('#modal_motivo_turno_cancelado_header').css("color", "white" );
                  $("#modal_motivo_turno_cancelado").on('shown.bs.modal', function(){
                     $("#modal_motivo_turno_cancelado_motivo").focus();
                  });
                  $('#modal_motivo_turno_cancelado').modal('show');
                  $('#modal_motivo_turno_cancelado_btn_cancela_turno').click(function(){
                     var motivo=$("#modal_motivo_turno_cancelado_motivo")[0].value;
                     // $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/motivo_turno_cancelado");?>",{'motivo':motivo,'evento_id':evento_id},function(datos){
                     // });//get observacion_turno_cancelado
                     $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/marcar_asistencia");?>",{'asistencia':asistencia,'evento_id':evento_id},function(datos){
                        $('#modal_motivo_turno_cancelado').modal('hide');
                        recarga_tabla_pagina(url);
                     });//get marcar_asistencia
                  });//click cancelar turno
               }//
            });//click onclick
            //---------------------FIN BOTON MARCAR CANCELAR TURNO----------------------------------

            //--------------------BOTON MARCAR CANCELAR TURNO--------------------------------
            $('#tabla1 tbody').on("click", ".btnconfirmar", function(){
               //me posiciono al principio de la fila
               var fila = this.closest("tr");
               //obtengo los datos de la fila
               datosdefila=table.row(fila).data();
               //obtengo el id de la fila
               var evento_id=datosdefila.evento_id;
               if(!(evento_id.indexOf("fila") > -1)){
                  $.get("<?php echo site_url("agendadeeventos/Agendadeeventos_contr/confirmar_turno");?>",{'evento_id':evento_id},function(datos){
                     recarga_tabla_pagina(url);
                  });//get confirmar_turno
               }//if evento_id.indexOf
            });//click onclick
            //---------------------FIN BOTON MARCAR CANCELAR TURNO----------------------------------

            //--------------------BOTON REPROGRAMAR TURNO--------------------------------
            $('#tabla1 tbody').on('click', '.btnreprogramarturno', function() {
               var texto_boton = $(this).text();
               var fila = $(this).closest("tr");
               var evento_id = fila.attr("id");
               
               //tomael texto del boton para detectar la reprogramacion
               if (texto_boton == " Reprogramar evento") {
                  reprogramar=true;
                  
                  // Ocultar el dropdown en las filas sin ID "filanueva"
                  table.rows().every(function() {
                     var data = this.data();
                     var rowNode = this.node();
                     // Mostrar el dropdown en las filas con ID "filanueva" y escondo los de los turnos
                     if (!data.evento_id.startsWith("filanueva")) {
                        $(rowNode).find('.botones_tabla_dropdown').effect("fold","slow");
                        $(rowNode).find('.mas').effect("fold","slow");
                     }else{
                        $(rowNode).find('.btnreprogramarturno').html("<i class='bi bi-calendar2-plus'></i> Reprogramar aquí");
                        $(rowNode).find('.mas').effect("fold","slow");
                        $(rowNode).find('.botones_tabla_dropdown').effect("slide","slow");
                     }//!data.evento_id.startsWith
                  });//table.rows

                  $.ajax({
                     url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/detalle_evento");?>',
                     type : 'GET',
                     data :  {"evento_id":evento_id},
                     dataType : 'json',
                     async : false,
                     success : function(datos_turno) {
                        datos_reprogramacion=datos_turno;                     
                     }//success ajax detalle_evento
                  })//ajax detalle_evento
                  
                  //detengo el cierre automático de la alerta generado para los turnos confirmados
                  $("#alerta_reprogramar").empty();
                  
                  var alerta='<div class="d-flex justify-content-between align-items-center">';
                  alerta+='<div class="row align-items-center text-center">';
                  alerta+='<div class="col-auto"><b>ADVERTENCIA!!</b><br> Se está reprogramando el siguiente evento</div>';
                  alerta+='<div class="col-auto datos_alerta_reprogramar">';
                  alerta+='Cliente: '+datos_reprogramacion.evento[0].nombre_adulto+ ' ' + datos_reprogramacion.evento[0].apellido_adulto;
                  alerta+='</div>';
                  alerta+='<div class="col-auto datos_alerta_reprogramar">';
                  alerta+='Fecha y hora: '+moment(datos_reprogramacion.evento[0].fecha_sin_formatear, "YYYY-MM-DD").format("DD/MM/YYYY")+' ';
                  alerta+=moment(datos_reprogramacion.evento[0].hora_inicio, "HH:mm:ss").format("HH:mm")+' - ';
                  alerta+=moment(datos_reprogramacion.evento[0].hora_fin, "HH:mm:ss").format("HH:mm");
                  alerta+='</div>';
                  // alerta+='<div class="col-auto datos_alerta_reprogramar">';
                  // alerta+='Médico: '+datos_reprogramacion.evento[0].medico;
                  // alerta+='</div>';
                  alerta+='<div class="col-auto d-flex justify-content-center align-items-center" id="div_btn_alerta_reprogramar">';
                  alerta+='<button type="button" id="btn_alerta_reprogramar" class="btn btn-danger btn-cancelar">Cancelar</button>';
                  alerta+='</div>';
                  alerta+='</div>';
                  alerta+='</div>';
                  $("#alerta_reprogramar").append(alerta);
                  // Mostrar la alerta
                  $("#alerta_reprogramar").effect("slide","slow");
               } else { //if texto_boton == " Reprogramar turno"
                  //---------------------BOTON REPROGRAMAR EVENTO--------------------------------
                  $('#modal_reprogramar_turno_tabla tbody').remove();
                  $("#modal_reprogramar_turno_form").trigger("reset");
                  $("#modal_reprogramar_turno .select").empty();

                  //me posiciono al principio de la fila
                  var fila = this.closest("tr");
                  //obtengo los datos de la fila
                  datosdefila=table.row(fila).data();
                  //obtengo el id de la fila
                  var evento_id=datos_reprogramacion.evento[0].evento_id;
                  var fecha_formateada=moment(datosdefila.fecha,"DD/MM/YYYY").format("YYYY-MM-DD");
                  
                  //preparo el modal
                  $("#modal_reprogramar_turno_header").css("background-color", "#005eff");
                  $("#modal_reprogramar_turno_header").css("color", "white" );
                  $("#modal_reprogramar_turno_titulo").text("Reprogramación de turno");
                  $("#modal_reprogramar_turno_datos_paciente").show();
                  $("#modal_reprogramar_turno_form").show();
                  $("#modal_reprogramar_turno_submit").text("Reprogramar");
                  $("#modal_reprogramar_turno_fecha").val(fecha_formateada);
                  $("#modal_reprogramar_turno_hora_inicio").val(datosdefila.hora_inicio);
                  $("#modal_reprogramar_turno_hora_fin").val(datosdefila.hora_fin);
                  $("#modal_reprogramar_turno_sede").val($("#selectsede").find("option:selected").text());
                  $("#modal_reprogramar_turno_sede_id").val(selectsedeactual);
                  var duracion=moment(datosdefila.hora_fin, "HH:mm").diff(moment(datosdefila.hora_inicio, "HH:mm"), 'minutes');
                  $("#modal_reprogramar_turno_duracion").val(duracion);


                  var cant_filas=0;//con este voy a comprobar si se envió algún tratamiento luego
                  var cant_servicios=0;
                  //var cant_equipos=0;
                  var total_turno=0;

                  //listo las SEDES
                  // $.ajax({
                  //    url : "<?php echo site_url("agendadeeventos/tratamientos_contr/listar_sedes");?>",
                  //    dataType : 'json',
                  //    async : false,
                  //    success : function(datos) {
                  //       var option = document.createElement("option");
                  //       option.text = "Elija una opcion...";
                  //       option.value= "";
                  //       $("#modal_reprogramar_turno_sede_id").append(option);
                  //       datos.sedes.forEach(function(p){
                  //          var option = document.createElement("option");
                  //          option.text = p.sede;
                  //          option.value= p.sede_id;
                  //          $("#modal_reprogramar_turno_sede_id").append(option);
                  //       })//foreach sede
                  //    }//success listar sede
                  // })//ajax listar sede
                  
                  //-------------listo los detalles del turno-------------
                  $.ajax({
                     url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/detalle_evento");?>',
                     type : 'GET',
                     data :  {"evento_id":datos_reprogramacion.evento[0].evento_id},
                     dataType : 'json',
                     async : false,
                     success : function(datos_turno) {
                        var cliente_id=datos_turno.evento[0].usuario_id;
								console.log("​datos_turno.evento[0].usuario_id", datos_turno.evento[0].usuario_id);
                        //busco los datos del paciente
                        $.ajax({
                           url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_paciente");?>',
                           type : 'GET',
                           data :  {"usuario_id" : cliente_id},
                           dataType : 'json',
                           async : false,
                           success : function(datos_paciente) {
                              $("#modal_reprogramar_turno_nombre").val(datos_paciente.cliente[0].nombre);
                              $("#modal_reprogramar_turno_apellido").val(datos_paciente.cliente[0].apellido);
                              $("#modal_reprogramar_turno_celular").val(datos_paciente.cliente[0].celular);
                              $("#modal_reprogramar_turno_dni_form_numero").val(datos_paciente.cliente[0].documento_numero);
                              $("#modal_editar_turno_usuario_id").val(datos_paciente.cliente[0].usuario_id);
                           }//success ajax listar_paciente
                        })//ajax listar_paciente
                        
                        $("#modal_reprogramar_turno_cliente_id").val(datos_turno.evento[0].usuario_id);
                        $("#modal_reprogramar_turno_sede_id option[value='"+datos_turno.evento[0].sede_id+"']").prop("selected",true);
                        
                        $("#modal_reprogramar_turno_motivo").val(datos_turno.evento[0].motivo);

                        //preparo los encabezados de la tabla que va a mostrar los tratamientos y los equipos para agregarla al modal
                        var contenido_tabla = '<tbody><tr id="tr_modal_reprogramar_turno_total_turno"><td colspan="5" align="center"><h5>Total</h5></td><td><input type="text" class="form-control border-primary" value="0" id="modal_reprogramar_turno_total_turno" readonly="readonly"></td>';
                        contenido_tabla += "<tr id='tr_modal_reprogramar_turno_agregar_tratamiento'><td colspan='6' class='text-primary'><button type='button' id='modal_reprogramar_turno_agregar_tratamiento' class='btn btn-primary btn-block'>Agregar tratamiento</button></td></tr></tbody>";
                        $("#modal_reprogramar_turno_tabla").append(contenido_tabla);
                        
                        //----------------listo los tratamientos------------------
                        $.ajax({
                           url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicios");?>',
                           type : 'GET',
                           data : {"usuario_id":selectsedeactual},
                           dataType : 'json',
                           async : false,

                           success : function(datos) {                                             
                                 //------agrego los tratamientos existentes-----
                                 datos_turno.tratamientos.forEach(function(t){
                                    //aplico el nuevo total general
                                    var tratamiento_precio=Math.round(parseInt(t.importe)/10)*10;
                                    total_turno+=tratamiento_precio;

                                    cant_filas++;
                                    var contenido_tabla="<tr id='modal_reprogramar_turno_tratamiento"+cant_servicios+"'><td><select class='form-control border-primary select_tratamientos' required name='tratamiento"+cant_servicios+"'>"; 
                                    contenido_tabla += "<option value=''>Elija un tratamiento...</option>";
                                    datos.tratamientos.forEach(function(dt){
                                       if(t.servicio_id==dt.servicio_id){
                                          contenido_tabla += "<option value='"+dt.servicio_id+"' selected>"+dt.tratamiento+"</option>";
                                       }else{
                                          contenido_tabla += "<option value='"+dt.servicio_id+"'>"+dt.tratamiento+"</option>";
                                       }//if t.servicio_id==dt.servicio_id
                                    });//foreach datos.tratamientos
                                    contenido_tabla += "</select></td>";
                                    
                                    //--------agrego los equipos-----------
                                    $.ajax({
                                       url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_equipos");?>',
                                       type : 'GET',
                                       data : {"servicio_id":t.servicio_id},
                                       dataType : 'json',
                                       async : false,

                                       success : function(datos_equipos) {
                                          contenido_tabla+='<td>';
                                          datos_equipos.equipos.forEach(function(e){
                                             cant_equipos++;
                                             var verificacion=false;
                                             datos_turno.equipos.forEach(function(te){
                                                if(te.equipo_id==e.equipo_id && t.servicio_id==te.servicio_id){
                                                   verificacion=true;
                                                }
                                             });//foreach turnos_equipos.equipos
                                             if(verificacion==true){
                                                contenido_tabla+="<input class='form-check-input' type='checkbox' checked value='"+e.equipo_id+"' name='"+e.servicio_id+"equipo"+cant_equipos+"'><label class='form-check-label' for='equipo'"+e.servicio_id+"equipo"+e.equipo_id+"'>"+e.equipo+"</label><br>";
                                             }else{
                                                contenido_tabla+="<input class='form-check-input' type='checkbox' value='"+e.equipo_id+"'  name='"+e.servicio_id+"equipo"+cant_equipos+"'><label class='form-check-label' for='equipo'"+e.servicio_id+"equipo"+e.equipo_id+"'>"+e.equipo+"</label><br>";
                                             }
                                          });//foreach datos_equipos.equipos
                                          contenido_tabla+='</td>';
                                       }//success equipos
                                    });//ajax listar_equipos

                                    //agrego el resto de los campos
                                    contenido_tabla+="<td><input type='number' class='form-control border-primary' value='"+tratamiento_precio+"' name='"+t.servicio_id+"precio' readonly='readonly'></td>";
                                    contenido_tabla+="<td><input type='number' step='1' min='0' max='100' class='form-control border-primary descuento' value='"+t.descuento+"' name='"+t.servicio_id+"descuento'></td>";
                                    contenido_tabla+="<td><input type='text' class='form-control border-primary' value='"+t.notas+"' name='"+t.servicio_id+"descripcion'></td>";
                                    contenido_tabla+="<td>"+tratamiento_precio+"</td>";
                                    contenido_tabla+="<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminarservicio'><i class='bi bi-trash'></i></botton></td>";
                                    contenido_tabla+='</tr>';
                                    $("#modal_reprogramar_turno_tabla tbody").prepend(contenido_tabla);
                                    cant_servicios++;
                                 });//foreach  datos_turno.tratamientos

                                 $("#modal_reprogramar_turno_total_turno").val(total_turno); 
                           }//success
                        });//ajax tratamientos
                     }//success ajax detalle_evento
                  })//ajax detalle_evento

                  var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/reprogramar_turno");?>";
                  val+="?evento_id="+evento_id;
                  val+="&cant_servicios="+cant_servicios;
                  // val+="&cant_equipos="+cant_equipos;
                  val+="&cant_filas="+cant_filas;
                  $("#modal_reprogramar_turno_form").prop("action",val);

                  $("#modal_reprogramar_turno").modal("show");

                  //detecto click en agregar tratamiento nuevo
                  $("#modal_reprogramar_turno").off("click", "#modal_reprogramar_turno_agregar_tratamiento").on("click", "#modal_reprogramar_turno_agregar_tratamiento", function(){
                     $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicios");?>',
                        type : 'GET',
                        data : {"usuario_id":selectsedeactual},
                        dataType : 'json',
                        async : false,

                        success : function(datos) {
                           cant_filas++;
                           var contenido_tabla="<tr id='modal_reprogramar_turno_tratamiento"+cant_servicios+"'><td><select class='form-control border-primary select_tratamientos' required name='tratamiento"+cant_servicios+"'>"; 
                           contenido_tabla += "<option value=''>Elija un tratamiento...</option>";
                           datos.tratamientos.forEach(function(e){
                                 contenido_tabla += "<option value='"+e.servicio_id+"'>"+e.tratamiento+"</option>";
                           });//foreach
                           contenido_tabla += "</select></td>";
                           contenido_tabla += "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>";
                           contenido_tabla += "<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminarserviciovacio'><i class='bi bi-trash'></i></botton></td></tr>"
                           $("#tr_modal_reprogramar_turno_total_turno").before(contenido_tabla);
                           
                           cant_servicios++;
                           var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/reprogramar_turno");?>";
                           $('#modal_reprogramar_turno input').off();
                           $('#modal_reprogramar_turno select').off();
                           val+="?evento_id="+evento_id;
                           val+="&cant_servicios="+cant_servicios;
                           // val+="&cant_equipos="+cant_equipos;
                           val+="&cant_filas="+cant_filas;
                           $("#modal_reprogramar_turno_form").prop("action",val);
                        }//success ajax listar tratamientos
                     });//ajax listar tratamientos
                  });//click modal_reprogramar_turno_agregar_tratamiento

                  $("#modal_reprogramar_turno").off("click", ".eliminarserviciovacio").on("click", ".eliminarserviciovacio", function(){
                     $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();
                     //elimino la fila recién construída
                     $(this).closest("tr").remove();
                     cant_filas++;
                     var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/reprogramar_turno");?>";
                     val+="?evento_id="+evento_id;
                     val+="&cant_servicios="+cant_servicios;
                     // val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_reprogramar_turno_form").prop("action",val);
                  })//click .eliminarserviciovacio

                  //DETECTO SI CAMBIAN EL TRATAMIENTO
                  $("#modal_reprogramar_turno").off("change", ".select_tratamientos").on("change", ".select_tratamientos", function(){
                     $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();
                     var fila=$(this).closest("tr");
                     var id_fila=fila[0].id
                     
                     if (fila.find('td:eq(0) select').val()==""){
                        //recupero los datos para calcular el nuevo total (sigue abajo)
                        var subtotal_anterior=fila.find('td:eq(5)').text();
                        var total_turno_anterior=$("#modal_reprogramar_turno_total_turno").val();
                        total_turno=total_turno_anterior-subtotal_anterior;
                        $("#modal_reprogramar_turno_total_turno").val(total_turno);
                        fila.find('td:eq(6)').remove();
                        fila.find('td:eq(5)').remove();
                        fila.find('td:eq(4)').remove();
                        fila.find('td:eq(3)').remove();
                        fila.find('td:eq(2)').remove();
                        fila.find('td:eq(1)').remove();
                        
                        $("#"+id_fila).append("<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>");
                        $("#"+id_fila).append("<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminarserviciovacio'><i class='bi bi-trash'></i></botton></td>");
                     
                     }else{//if select val != ""
                        var servicio_id=this.value;
                        //recupero los datos para calcular el nuevo total (sigue abajo)
                        var subtotal_anterior=fila.find('td:eq(5)').text();
                        var total_turno_anterior=$("#modal_reprogramar_turno_total_turno").val();
                        total_turno=total_turno_anterior-subtotal_anterior;

                        fila.find('td:eq(6)').remove();
                        fila.find('td:eq(5)').remove();
                        fila.find('td:eq(4)').remove();
                        fila.find('td:eq(3)').remove();
                        fila.find('td:eq(2)').remove();
                        fila.find('td:eq(1)').remove();

                        //busco los equipos del tratamiento y los grabo en la tabla
                        $.ajax({
                           url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_servicio");?>',
                           type : 'GET',
                           data : {"servicio_id":servicio_id},
                           dataType : 'json',
                           async : false,

                           success : function(tratamiento) {                        
                              //aplico el nuevo total general
                              var tratamiento_precio=Math.round(parseInt(tratamiento[0].precio)/10)*10;
                              
                              total_turno+=tratamiento_precio;
                              $("#modal_reprogramar_turno_total_turno").val(total_turno);
                              
                              //busco los equipos del tratamiento y los grabo en la tabla
                              $.ajax({
                                 url : '<?php echo site_url("agendadeeventos/agendadeeventos_contr/listar_equipos");?>',
                                 type : 'GET',
                                 data : {"servicio_id":servicio_id},
                                 dataType : 'json',
                                 async : false,

                                 success : function(datos) {
                                    var input='';
                                    input+='<td>';
                                    datos.equipos.forEach(function(e){
                                       cant_equipos++;
                                       input+="<input class='form-check-input' type='checkbox' value='"+e.equipo_id+"' name='"+e.servicio_id+"equipo"+cant_equipos+"'><label class='form-check-label' for='"+e.servicio_id+"equipo"+cant_equipos+"'>"+e.equipo+"</label><br>";
                                    });//foreach
                                    input+='</td>';
                                    $("#"+id_fila).append(input);
                                 }//success equipos
                              });//ajax listar_equipos

                              //agrego el resto de los campos
                              $("#"+id_fila).append("<td><input type='number' class='form-control border-primary' value='"+tratamiento_precio+"' name='"+servicio_id+"precio' readonly='readonly'></td>");
                              $("#"+id_fila).append("<td><input type='number' step='1' min='0' max='100' class='form-control border-primary descuento' value='0' name='"+servicio_id+"descuento'></td>");
                              $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+servicio_id+"descripcion'></td>");
                              $("#"+id_fila).append("<td>"+tratamiento_precio+"</td>");
                              $("#"+id_fila).append("<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminarservicio'><i class='bi bi-trash'></i></botton></td>");
                           }//success tratamientos
                        });//ajax listar_servicios

                        var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/reprogramar_turno");?>";
                        val+="?evento_id="+evento_id;
                        val+="&cant_servicios="+cant_servicios;
                        // val+="&cant_equipos="+cant_equipos;
                        val+="&cant_filas="+cant_filas;
                        $("#modal_reprogramar_turno_form").prop("action",val);
                     }//elseif select val != ""
                  });//change select_tratamientos

                  let timeout;
                  $("#modal_reprogramar_turno").off("keyup", "#modal_reprogramar_turno_duracion").on("keyup", "#modal_reprogramar_turno_duracion", function(){
                     $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();
                     var duracion=$(this).val();
                     clearTimeout(timeout);
                     timeout = setTimeout(function() {
                        if($("#modal_reprogramar_turno_hora_inicio").val()!=""){
                           if($("#modal_reprogramar_turno_duracion").val()!=""){
                              var evento_nuevo_hora_fin=moment($("#modal_reprogramar_turno_hora_inicio").val(), 'HH:mm', true);
                              evento_nuevo_hora_fin.add(duracion, 'm');
                              evento_nuevo_hora_fin=moment(evento_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                              $("#modal_reprogramar_turno_hora_fin").val(evento_nuevo_hora_fin);
                           }else{//if($("#modal_reprogramar_turno_duracion").val()!="")
                              $("#modal_reprogramar_turno_hora_fin").val("");
                           }
                        }//if($("#modal_reprogramar_turno_hora_inicio").val()!="")
                     }, 700)//set timeout modal_reprogramar_turno_duracion
                  }) //keyup modal_reprogramar_turno_duracion

                  //---------------------------------detecto el cambio en el campo hora inicio---------------------
                  let timeout4;
                  $("#modal_reprogramar_turno").off("keyup", "#modal_reprogramar_turno_hora_inicio").on("keyup", "#modal_reprogramar_turno_hora_inicio", function(){
                     $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();clearTimeout(timeout4);
                     timeout4 = setTimeout(function() {
                        if($("#modal_reprogramar_turno_duracion").val()!=""){
                           if($("#modal_reprogramar_turno_hora_inicio").val()!=""){
                              var duracion=$("#modal_reprogramar_turno_duracion").val();
                              evento_nuevo_hora_fin=moment($("#modal_reprogramar_turno_hora_inicio").val(), 'HH:mm', true);
                              evento_nuevo_hora_fin.add(duracion, 'm');
                              evento_nuevo_hora_fin=moment(evento_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                              $("#modal_reprogramar_turno_hora_fin").val(evento_nuevo_hora_fin);
                           }else{//if($("#modal_reprogramar_turno_hora_inicio").val()!="")
                              $("#modal_reprogramar_turno_hora_fin").val("");
                           }//if else($("#modal_reprogramar_turno_hora_inicio").val()!="")
                        }//$("#modal_reprogramar_turno_duracion").val()!=""
                     }, 700)//set timeout4 modal_reprogramar_turno_dni
                  }) //keyup modal_reprogramar_turno_dni

                  //controlo los cambios sobre el input descuento
                  let timeout3;
                  $("#modal_reprogramar_turno").off("keyup change", ".descuento").on("keyup change", ".descuento", function(){
                     $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();
                     var ubicacion=$(this);
                     var fila=$(this).closest("tr");
                     clearTimeout(timeout3);
                     timeout3 = setTimeout(function() {
                        //recupero los datos para calcular el nuevo total
                        var subtotal_anterior=fila.find('td:eq(5)').text();
                        var total_turno_anterior=$("#modal_reprogramar_turno_total_turno").val();
                        total_turno=total_turno_anterior-subtotal_anterior;

                        //cambio los datos de la fila
                        var descuento = ubicacion.val();
                        var precio_tratamiento=fila.find('td:eq(2) input').val();
                        var subtotal=Math.round((precio_tratamiento-((precio_tratamiento*descuento)/100))/10)*10;
                        fila.find('td:eq(5)').empty().text(subtotal);

                        //aplico el nuevo total general
                        total_turno+=subtotal;
                        $("#modal_reprogramar_turno_total_turno").val(total_turno);
                     },700);//timeout3 cambio en input descuento
                  });//keyup clase descuento

                  $("#modal_reprogramar_turno").off("click", ".eliminarservicio").on("click", ".eliminarservicio", function(){
                     $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();
                     //me pociciono al principio de la fila
                     var ubicacion=$(this).closest("tr");
                     //antes de eliminar la fila recalculo el total recupero los datos para calcular el nuevo total
                     var subtotal_anterior=ubicacion.find('td:eq(5)').text();
                     var total_turno_anterior=$("#modal_reprogramar_turno_total_turno").val();
                     var total_turno=total_turno_anterior-subtotal_anterior;
                     $("#modal_reprogramar_turno_total_turno").val(total_turno);

                     //elimino la fila
                     var datosdefila = ubicacion.remove();
                     cant_filas--;
                     var val="<?php echo site_url("agendadeeventos/agendadeeventos_contr/reprogramar_turno");?>";
                     val+="?evento_id="+evento_id;
                     val+="&cant_servicios="+cant_servicios;
                     // val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_reprogramar_turno_form").prop("action",val);

                  })//click .eliminarservicio

                  //--------------FORMULARIO EDITAR TURNO---------------------------------
                  var opcionesform = { 
                     beforeSubmit: function(){
                     $(".validacion").removeClass("is-invalid border-danger");
                     $.LoadingOverlay("show");
                     }, //before

                     success: function(datos){
                        // Ocultar la alerta
                        $("#alerta_reprogramar").effect("fold","slow");


                        if(datos.validacion=="ERROR"){
                           $.LoadingOverlay("hide");
                           var alerta='';
                           if(datos.errores.fecha!=""){
                              $("#modal_reprogramar_turno_fecha").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.fecha!=""
                           if(datos.errores.hora_inicio!=""){
                              $("#modal_reprogramar_turno_hora_inicio").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.hora_inicio!=""
                           if(datos.errores.hora_fin!=""){
                              $("#modal_reprogramar_turno_hora_fin").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.hora_fin!=""
                           // if(datos.errores.profesional_id!=""){
                           //    $("#modal_reprogramar_turno_profesional_id").addClass("is-invalid border-danger");
                           //    alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           // }//datos.errores.profesional_id!=""
                           if(datos.errores.cliente_id!=""){
                              $("#modal_reprogramar_turno_cliente_id").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.cliente_id!=""
                           if(datos.errores.sede_id!=""){
                              $("#modal_reprogramar_turno_sede_id").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.sede_id!=""
                           // if(datos.errores.motivo!=""){
                           //    $("#modal_reprogramar_turno_motivo").addClass("is-invalid border-danger");
                           //    alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           // }//datos.errores.motivo!=""
                           if(datos.errores.duracion!=""){
                              $("#modal_reprogramar_turno_duracion").addClass("is-invalid border-danger");
                              alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                           }//datos.errores.duracion!=""
                           
                           $("#modal_reprogramar_turno_alertas").append(alerta);
                        }

                        if(datos.validacion=="CORRECTO"){
                           reprogramar=false;
                           // Ocultar el dropdown en las filas sin ID "filanueva"
                           table.rows().every(function() {
                              var data = this.data();
                              var rowNode = this.node();
                              // Mostrar el dropdown en las filas con ID "filanueva"
                              if (!data.evento_id.startsWith("filanueva")) {
                                 $(rowNode).find('.botones_tabla_dropdown').effect("slide","slow");
                                 $(rowNode).find('.mas').effect("slide","slow");
                              }else{
                                 $(rowNode).find('.btnreprogramarturno').html("<i class='bi bi-calendar2-plus'></i> Reprogramar turno");
                                 $(rowNode).find('.mas').effect("slide","slow");
                                 $(rowNode).find('.botones_tabla_dropdown').effect("fold","slow");
                              }//!data.evento_id.startsWith
                           });//table.rows

                           $("#modal_reprogramar_turno").modal("hide");
                           recarga_tabla_pagina(url);
                           $.LoadingOverlay("hide");
                        }//datos.validacion=="CORRECTO"
                     },  //success   
                     dataType:  'json'
                  };//var

                  $('#modal_reprogramar_turno').ajaxForm(opcionesform); 
                  //---------------------FIN FORMULARIO EDITAR TURNO---------------------------

               }//else if texto_boton == " Reprogramar turno"
            });//on 'click' '.btnreprogramarturno'
            //--------------------BOTON REPROGRAMAR TURNO--------------------------------

            //--------------------BOTON DTB_ALERTA_REPROGRAMAR TURNO--------------------------------
            $(document).on('click','#btn_alerta_reprogramar', function() {
               $('#modal_reprogramar_turno input').off();
                     $('#modal_reprogramar_turno select').off();
               reprogramar=false;
               $("#alerta_reprogramar").effect("fold","slow");
               $('#alerta_reprogramar').empty();
                  
               // Ocultar el dropdown en las filas sin ID "filanueva"
               table.rows().every(function() {
                  var data = this.data();
                  var rowNode = this.node();
                  // Mostrar el dropdown en las filas con ID "filanueva"
                  if (!data.evento_id.startsWith("filanueva")) {
                     $(rowNode).find('.botones_tabla_dropdown').effect("slide","slow");
                     $(rowNode).find('.mas').effect("slide","slow");
                  }else{
                     $(rowNode).find('.btnreprogramarturno').html("<i class='bi bi-calendar2-plus'></i> Reprogramar turno");
                     $(rowNode).find('.mas').effect("slide","slow");
                     $(rowNode).find('.botones_tabla_dropdown').effect("fold","slow");
                  }//!data.evento_id.startsWith
               });//table.rows

               //borro los datos de la variable de sesion del turno a reprogramar
               $.get("<?php echo site_url("agendadeeventos/agendadeeventos_contr/borra_turno_sesion");?>", function(variable){
               },"json");
            })//btn_alerta_reprogramar click
            //--------------------BOTON DTB_ALERTA_REPROGRAMAR TURNO--------------------------------

            //--------------------BOTON BTN_ALERTA_eventos_confirmados TURNO--------------------------------
            $(document).on('click','#btn_alerta_eventos_confirmados', function() {
               $("#alerta_reprogramar").effect("fold","slow");
               $('#alerta_reprogramar').empty();
            })//btn_alerta_reprogramar click
            //--------------------BOTON BTN_ALERTA_eventos_confirmados TURNO--------------------------------
         }); //document ready
      </script>
   </body>
</html>