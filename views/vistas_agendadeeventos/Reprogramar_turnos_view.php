
<!doctype html>
<html lang="es">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.2/css/fixedHeader.bootstrap4.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"/>
      
      <!-- Datatables CSS -->
      <link rel="stylesheet" href="<?php echo base_url ("datatables/datatables.min.css");?>">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
      
      <title>Reprogramacion de turnos!!</title>

      <style>
         #tabla1 tfoot input{
               width: 100%;
               padding: 3px;
               box-sizing: border-box;
         }
         #tabla1 tfoot {
               display: table-header-group !important;
         }
         textarea {
            resize: none;
         }
      </style>
   </head>

   <body>
      <?php $this->load->view("barra_view"); ?>
      <div class="container-fluid">
         <br><br><br>
         <div class= "row text-primary" align="center">
            <div class="col-12">
               <h1>Turnos a reprogramar</h1>
            </div>
         </div>
         <!-- ---------------------------FILTRO TURNOS------------------------------------- -->
         <br>
         <div class="row">
            <div class="col-12">
               <div class="card text-center border-primary">
                  <div class="card-header text-primary card-title"><h4>Filtros</h4></div>
                  <div class="card-body">
                     <div class="form-row">
                        <div class="col-sm-auto">
                           <label for="selectprof" class="text-primary"><h5>Profesional</h5></label>
                           <select class="form-control border-primary" id="selectprof">
                              <option value="NADA">Elija un profesional</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <br>
         <div class="row">
            <div class="col-4">
               <button type="button" class="btn btn-lg btn-primary btn-block"  id="borrarfiltros">Restablecer filtros</button>
            </div><!--div col-4 -->
            <div class="col-4">
               <button type="button" class="btn btn-lg btn-primary btn-block"  id="filtros_actualizar_tabla">Actualizar datos de tabla</button>
            </div><!--div col-4 -->
         </div><!--div row -->
         <br>

         <!-- ---------------------------Comienzo de tabla------------------------------------- --> 
         <div class="row">
            <div class="col-lg-12">
               <table class="table" class="display"  id="tabla1" style="width:100%">
                  <thead class="thead-dark">
                     <tr>
                     <th scope="col">Id</th>
                        <th scope="col" data-priority="1">Ver mas</th>
                        <th scope="col" data-priority="2" data-column="dia">Día</th>
                        <th scope="col" data-priority="2" data-column="fecha">Fecha</th>
                        <th scope="col" data-priority="2" data-column="hora_inicio">Inicio</th>
                        <th scope="col" data-priority="2" data-column="hora_fin">Fin</th>
                        <th scope="col" data-priority="3" data-column="paciente">Paciente</th>
                        <th scope="col" data-priority="8" data-column="motivo">Motivo</th>
                        <th scope="col" data-priority="4" data-column="tratamientos">Tratamientos</th>
                        <th scope="col" data-priority="1">Acciones</th>
                     </tr>
                  </thead>
                  <tfoot class="thead-dark">
                     <tr>
                        <th>Id</th>
                        <th scope="col">Ver mas</th>
                        <th scope="col" data-column="dia">Día</th>
                        <th scope="col" data-column="fecha">Fecha</th>
                        <th scope="col" data-column="hora_inicio">Inicio</th>
                        <th scope="col" data-column="hora_fin">Fin</th>
                        <th scope="col" data-column="paciente">Paciente</th>
                        <th scope="col" data-column="motivo">Motivo</th>
                        <th scope="col" data-column="tratamiento">Tratamientos</th>
                        <th scope="col">Acciones</th>
                     </tr>            
                  </tfoot>
               <tbody class="table-striped">
               </tbody>
            </table>
         </div>
         <?php 
            $this->load->view("vistas_modales/modal_detalle");
            $this->load->view("vistas_modales/modal_nuevo_turno");
            $this->load->view("vistas_modales/modal_motivo_turno_cancelado");
         ?>
      <!-- ----------------------------------------FIN DE LA TABLA----------------------------------------- -->
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

            var url = "<?php echo site_url ("agendadeturnos/Reprogramar_turnos_contr/listar_turnos");?>";
            var opselect={'fecha':moment().format('YYYY-MM-DD')};
            var datos=[];
            var cont=0;
            var carga_tabla=false;
            var carga_init=false;
            var selectprofanterior="NADA";
            var selectprofactual="NADA";
            
            var botones="<div class='btn-group dropdown mr-5 mx-auto dropleft'><button class='btn botones_tabla_dropdown btn-primary dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>Acciones</button><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
               botones+="<button type='button' title='Editar turno' class='btn botones_tabla btn-warning btn-block btneditarturno'><i class='bi bi-pen'></i> Editar turno</button>";
               botones+="<button type='button' title='Cancelar turno' id='' class='btn botones_tabla btn-secondary btn-block btncancelar'><i class='bi bi-x-circle-fill'></i> Cancelar turno</botton>";
               botones+="<button type='button' title='Reprogramar turno' class='btn btn-info text-light btn-block btnreprogramarturno'><i class='bi bi-calendar2-plus'></i> Reprogramar turno</button>";
               botones+="</div></div>";

         //FUNCIONES---------------------------------------------------------
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
         
         var table = $('#tabla1').DataTable( {
            //parametros---------------------------------------------------------------------------
            "fixedHeader": true, //Deja fijo el encabezado
            "responsive": {details: false},
            "deferRender": false, //dibuja la tabla a medida que se necesita
            "order": [ 3, "asc" ], //ordena según la columna fecha
            //"retrieve": false,

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
               "data": function(){
                  return opselect;
               },//data
               'type' : 'post',
               "dataSrc":""
            },//ajax

            "columns":[
               {"data": "turno_id"},
               {"defaultContent":"<div class='mas'><i class='bi bi-plus-circle btn btn-primary'></i></div>"},
               {"data": "dia"},
               {"data": "fecha"},
               {"data": "hora_inicio"},
               {"data": "hora_fin"},
               {"data": "paciente"},
               {"data": "motivo"},
               {"data": "tratamientos"},
               {"defaultContent": botones}
            ],
            //Traducimos al español
            "language": {
               "url": "<?php echo site_url ("Lenguaje_contr/lenguaje");?>"
            },
               
            "rowId": 'turno_id',//establezco a turno_id como la identificación de la fila

            initComplete: function(){
               $('.dt-buttons').find('.dt-button').removeClass('dt-button');
               $('.buttons-page-length').addClass('btn btn-primary');
               $('.buttons-colvis').addClass('btn btn-info');

               $.LoadingOverlay("hide");
               carga_init=true;
               
               //----------------------------FILTRO POR COLUMNAS----------------------------------
               var entorno = this.api();
               this.api().columns().every( function () {
                  var that = this;
                  let timeout;
                  $( 'input', this.footer() ).on( 'keyup change clear', function () {
                     clearTimeout(timeout);
                     
                     var columna = $(this).closest('th').attr('data-column');//.data('column'); // Obtenemos el índice de la columna

                     var valorbusqueda=this.value;
                     timeout = setTimeout(function() {
                        if ( that.search() !== valorbusqueda){
                           $.LoadingOverlay("show");
                           if (columna=="fecha"){ 
                              if(valorbusqueda==""){
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
      
               if(carga_init){
                  $.LoadingOverlay("hide");
               }

               //coloreo las filas según los estados
               var api=this.api();
               api.rows().every( function () {
                  var turno_id=this.data().turno_id;
                  $("#"+turno_id).addClass(this.data().color);
               })//this api
               
               //traigo los turnos
               if(selectprof.value != "NADA" ){
                  selectprofactual=selectprof.value;               
                  datos=[];
                  //tomo los datos de las filas
                  var that=this.api();
                  var cont=0;
                  that.rows().every( function () {
                     var turno_id=this.data().turno_id;
                     datos[cont]=this.data();
                     cont++;
                  });//that
                  //compruebo si hay turnos
                  if(datos.length === 0){
                     $("#tabla1").append("<tr class'table-warning text-danger'><td colspan='8' align='center'><b>No se encontraron turnos a reprogramar para este profesional</b></td></tr>");
                  }//if datos length
               }//if selectprof
            }//drawcallback         
         } );//datatable  
         //---------------------------FIN DE LA TABLA-------------------------------------------------------------

         //-------------------------BOTON DETALLES-----------------------------------
         $('#tabla1 tbody').on("click", '#mas', function () {
            //me posiciono al principio de la fila
            var fila = this.closest("tr");
            //obtengo los datos de la fila
            datosdefila=table.row(fila).data();
            //obtengo el id de la fila
            var turno_id=datosdefila.turno_id;

            //elimino las filas de la tabla por si se había consultado antes algún otro turno
            $('#modal_detalle_tabla tr').remove();
                              
            //consulto a la base de datos los datos del turno, los tratamientos y los equipos asignados a dichos turnos
            $.ajax({
               url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/detalle_turno");?>',
               type : 'GET',
               data :  {"turno_id":turno_id},
               dataType : 'json',
               async : false,
               success : function(datos) {   
                  //armo el modal con los datos obtenidos
                  $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Fecha y hora:</th><td colspan='2'>"+datos.turno[0].fecha+"</td></tr>");
                  $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Paciente:</th><td colspan='2'>"+datos.turno[0].paciente+"</td></tr>");
                  $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Profesional:</th><td colspan='2'>"+datos.turno[0].medico+"</td></tr>");
                  $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Motivo:</th><td colspan='2'>"+datos.turno[0].motivo+"</td></tr>");
                  $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Sede:</th><td colspan='2'>"+datos.turno[0].sede+"</td></tr>");
                  $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Total:</th><td colspan='2'>"+datos.turno[0].importe+"</td></tr>");


                  //preparo los encabezados de la tabla que va a mostrar los tratamientos y los equipos para agregarla al modal
                  $titulo_tratamientos="<tr><th class='text-primary'>Tratamiento</th>";
                  $titulo_tratamientos+="<th class='text-primary'>Equipo</th>";
                  $titulo_tratamientos+="<th class='text-primary'>Valor</th>";
                  $titulo_tratamientos+="<th class='text-primary'>Descuento</th>";
                  $titulo_tratamientos+="<th class='text-primary'>Detalle</th>";
                  $titulo_tratamientos+="<th class='text-primary'>Total</th></tr>";
               
                  //pongo la cabecera en la tabla
                  $("#modal_detalle_tabla tbody").append($titulo_tratamientos);
                  var td_tratamientos;
                  var total_turno=0;
                  //recorro los datos de los tratamientos y armo las celdas
                  datos.tratamientos.forEach(function(t){
                  
                     td_tratamientos+="<tr><td>"+t.tratamiento+"</td>";
                     td_tratamientos+="<td>";
                     //recorro el dato de los equipos ligados a los tratamientos
                     datos.equipos.forEach(function(e){
                        //me traigo los equipos que coincidan con el tratamiento
                        if(e.tratamiento_id==t.tratamiento_id){
                              td_tratamientos+=e.equipo+" ";
                        }//if e.tratamiento_id
                     });//foreach equipos
                     
                     td_tratamientos+="</td>";
                     td_tratamientos+="<td>"+t.importe+"</td>";
                     td_tratamientos+="<td>"+t.descuento+"%</td>";
                     td_tratamientos+="<td>"+t.notas+"</td>";
                     td_tratamientos+="<td>"+((100-t.descuento)/100)*t.importe+"</td>";//calculo el descuento
                     td_tratamientos+="</tr>";
                     total_turno+=((100-t.descuento)/100)*t.importe;
                  });//foreach tratamientos
                  td_tratamientos+='<tr><td colspan="5" align="center"><h5>Total</h5></td><td><h5>'+total_turno+'</h5></td></tr>';
                  $("#modal_detalle_tabla tbody").append(td_tratamientos);
               }//success ajax detalle turno
            });//ajax detalle turno
            $("#modal_detalle_title").text("Datos del turno");
            $('#modal_detalle_header').css("background-color", "#005eff");
            $('#modal_detalle_header').css("color", "white" );
            $('#modal_detalle').modal('show');
         } );//#tabla1 body
         //-------------------------FIN BOTON DETALLES-----------------------------------

         //-----------------SELECT PROFESIONALES---------------
         $.get("<?php echo site_url("agendadeturnos/Reprogramar_turnos_contr/listar_profesionales");?>",function(datos){
            datos.forEach(function(profesional_id){
               var selectprofesional = document.getElementById("selectprof");
               var option = document.createElement("option");
               option.text = profesional_id.medico;
               option.value= profesional_id.usuario_id;
               selectprofesional.add(option);
            })
         },"json");//get

         //----------SELECT FILTROS---------------------------
         // Capturo el click en el profesional, reenvio los parámetros y deshabilito el que selecciono
         //y habilito el que tenía antes seleccionado 
         $('#selectprof').click(function() {
            if(this.value!=selectprofanterior){
               opselect.usuario_medico_id = this.value;
               recarga_tabla(url);
               selectprofanterior=this.value;
            }//if this.value
         });//$('#selectprof')

         //-----borramos todos los filtros-----------
         $('#borrarfiltros').on('click', function() {
            // Recorre cada columna y resetea el valor de búsqueda
            table.columns().every(function() {
               var column = this;
               $('input', column.footer()).val('').trigger('change');
            });

            // Vuelve a dibujar la tabla para aplicar los cambios
            table.search('').draw();
         });
         //----FIN BORRADO DE TODOS LOS FILTROS------

         //--------------------BOTON CANCELAR TURNO--------------------------------
         $('#tabla1 tbody').on("click", ".btncancelar", function(e){
            e.preventDefault();
            //obtengo el html de la fila
            var datosdefila = $(this).closest("tr");
            //obtengo el id de la fila
            var turno_id=datosdefila[0].id;
            var asistencia='cancelado';

            $("#modal_motivo_turno_cancelado_motivo").val("");
            $("#modal_motivo_turno_cancelado_titulo").text("Motivo de la cancelación");
            $('#modal_motivo_turno_cancelado_header').css("background-color", "RED");
            $('#modal_motivo_turno_cancelado_header').css("color", "white" );
            $("#modal_motivo_turno_cancelado").on('shown.bs.modal', function(){
                  $("#modal_motivo_turno_cancelado_motivo").focus();
            });
            $('#modal_motivo_turno_cancelado').modal('show');   
            $('#modal_motivo_turno_cancelado_btn_cancela_turno').click(function(d){
               d.preventDefault();
               $('#modal_motivo_turno_cancelado').modal('hide');
               var motivo=$("#modal_motivo_turno_cancelado_motivo")[0].value;
               
               $.get("<?php echo site_url("agendadeturnos/Reprogramar_turnos_contr/motivo_turno_cancelado");?>",{'motivo':motivo,'turno_id':turno_id},function(datos){
               });//get observacion_turno_cancelado
               
               $.get("<?php echo site_url("agendadeturnos/Reprogramar_turnos_contr/marcar_asistencia");?>",{'asistencia':asistencia,'turno_id':turno_id},function(datos){
                  table.ajax.url( url ).load();
               });//get marcar_asistencia
            });//click cancelar turno
         });//click onclick
         //---------------------FIN BOTON MARCAR CANCELAR TURNO----------------------------------

         //---------------------BOTON EDITAR TURNO--------------------------------
         $('#tabla1 tbody').on("click", ".btneditarturno", function(e){
            $('#modal_editar_turno_tabla tbody').remove();
            $("#modal_editar_turno_form").trigger("reset");
            $("#modal_editar_turno .select").empty();

            //me posiciono al principio de la fila
            var fila = this.closest("tr");
            //obtengo los datos de la fila
            datosdefila=table.row(fila).data();
            //obtengo el id de la fila
            var turno_id=datosdefila.turno_id;
            
            //preparo el modal
            $("#modal_editar_turno_header").css("background-color", "#005eff");
            $("#modal_editar_turno_header").css("color", "white" );
            $("#modal_editar_turno_titulo").text("Edición de turno");
            $("#modal_editar_turno_datos_paciente").show();
            $("#modal_editar_turno_form").show();
            $("#modal_editar_turno_submit").text("Guardar cambios");

            var cant_filas=0;//con este voy a comprobar si se envió algún tratamiento luego
            var cant_tratamientos=0;
            var cant_equipos=0;
            var total_turno=0;

            //listo las SEDES
            $.ajax({
               url : "<?php echo site_url("agendadeturnos/tratamientos_contr/listar_sedes");?>",
               dataType : 'json',
               async : false,
               success : function(datos) {
                  var option = document.createElement("option");
                  option.text = "Elija una opcion...";
                  option.value= "";
                  $("#modal_editar_turno_sede_id").append(option);
                  datos.sedes.forEach(function(p){
                     var option = document.createElement("option");
                     option.text = p.sede;
                     option.value= p.sede_id;
                     $("#modal_editar_turno_sede_id").append(option);
                  })//foreach sede
               }//success listar sede
            })//ajax listar sede
            
            //-------------listo los detalles del turno-------------
            $.ajax({
               url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/detalle_turno");?>',
               type : 'GET',
               data :  {"turno_id":turno_id},
               dataType : 'json',
               async : false,
               success : function(datos_turno) {
                  var paciente_id=datos_turno.turno[0].usuario_paciente_id;
                  //busco los datos del paciente
                  $.ajax({
                     url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/listar_paciente");?>',
                     type : 'GET',
                     data :  {"usuario_id" : paciente_id},
                     dataType : 'json',
                     async : false,
                     success : function(datos_paciente) {
                        $("#modal_editar_turno_hc").val(datos_paciente.paciente[0].historia_clinica);
                        $("#modal_editar_turno_nombre").val(datos_paciente.paciente[0].nombre);
                        $("#modal_editar_turno_apellido").val(datos_paciente.paciente[0].apellido);
                        $("#modal_editar_turno_dni_form_tipo").val(datos_paciente.paciente[0].documento_tipo);
                        $("#modal_editar_turno_dni_form_numero").val(datos_paciente.paciente[0].documento_numero);
                     }//success ajax listar_paciente
                  })//ajax listar_paciente
                  $("#modal_editar_turno_fecha").val(datos_turno.turno[0].fecha_sin_formatear);
                  $("#modal_editar_turno_hora_inicio").val(datos_turno.turno[0].hora_inicio);
                  $("#modal_editar_turno_hora_fin").val(datos_turno.turno[0].hora_fin);
                  $("#modal_editar_turno_paciente_id").val(datos_turno.turno[0].usuario_paciente_id);
                  $("#modal_editar_turno_profesional_id").val(datos_turno.turno[0].usuario_medico_id);
                  $("#modal_editar_turno_sede_id option[value='"+datos_turno.turno[0].sede_id+"']").prop("selected",true);

                  //calculo la duración
                  var duracion=moment(datos_turno.turno[0].hora_fin, "HH:mm").diff(moment(datos_turno.turno[0].hora_inicio, "HH:mm"), 'minutes');
                  $("#modal_editar_turno_duracion").val(duracion);
                  $("#modal_editar_turno_profesional").val(datos_turno.turno[0].medico);
                  $("#modal_editar_turno_motivo").val(datos_turno.turno[0].motivo);

                  //preparo los encabezados de la tabla que va a mostrar los tratamientos y los equipos para agregarla al modal
               
                  var contenido_tabla = '<tbody><tr id="tr_modal_editar_turno_total_turno"><td colspan="5" align="center"><h5>Total</h5></td><td><input type="text" class="form-control border-primary" value="0" id="modal_editar_turno_total_turno" readonly="readonly"></td>';
                  contenido_tabla += "<tr id='tr_modal_editar_turno_agregar_tratamiento'><td colspan='6' class='text-primary'><button type='button' id='modal_editar_turno_agregar_tratamiento' class='btn btn-primary btn-block'>Agregar tratamiento</button></td></tr></tbody>";
                  $("#modal_editar_turno_tabla").append(contenido_tabla);
                  
                  //----------------listo los tratamientos------------------
                  $.ajax({
                     url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/listar_tratamientos");?>',
                     type : 'GET',
                     data : {"usuario_id":datos_turno.turno[0].usuario_medico_id},
                     dataType : 'json',
                     async : false,

                     success : function(datos) {                                             
                           //------agrego los tratamientos existentes-----
                           datos_turno.tratamientos.forEach(function(t){
                              //aplico el nuevo total general
                              var tratamiento_precio=Math.round(parseInt(t.importe)/10)*10;
                              total_turno+=tratamiento_precio;

                              cant_filas++;
                              var contenido_tabla="<tr id='modal_editar_turno_tratamiento"+cant_tratamientos+"'><td><select class='form-control border-primary select_tratamientos' required name='tratamiento"+cant_tratamientos+"'>"; 
                              contenido_tabla += "<option value=''>Elija un tratamiento...</option>";
                              datos.tratamientos.forEach(function(dt){
                                 if(t.tratamiento_id==dt.tratamiento_id){
                                    contenido_tabla += "<option value='"+dt.tratamiento_id+"' selected>"+dt.tratamiento+"</option>";
                                 }else{
                                    contenido_tabla += "<option value='"+dt.tratamiento_id+"'>"+dt.tratamiento+"</option>";
                                 }//if t.tratamiento_id==dt.tratamiento_id
                              });//foreach datos.tratamientos
                              contenido_tabla += "</select></td>";
                              
                              //--------agrego los equipos-----------
                              $.ajax({
                                 url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/listar_equipos");?>',
                                 type : 'GET',
                                 data : {"tratamiento_id":t.tratamiento_id},
                                 dataType : 'json',
                                 async : false,

                                 success : function(datos_equipos) {
                                    contenido_tabla+='<td>';
                                    datos_equipos.equipos.forEach(function(e){
                                       cant_equipos++;
                                       var verificacion=false;
                                       datos_turno.equipos.forEach(function(te){
                                          if(te.equipo_id==e.equipo_id && t.tratamiento_id==te.tratamiento_id){
                                             verificacion=true;
                                          }
                                       });//foreach turnos_equipos.equipos
                                       if(verificacion==true){
                                          contenido_tabla+="<input class='form-check-input' type='checkbox' checked value='"+e.equipo_id+"' name='"+e.tratamiento_id+"equipo"+cant_equipos+"'><label class='form-check-label' for='equipo'"+e.tratamiento_id+"equipo"+e.equipo_id+"'>"+e.equipo+"</label><br>";
                                       }else{
                                          contenido_tabla+="<input class='form-check-input' type='checkbox' value='"+e.equipo_id+"'  name='"+e.tratamiento_id+"equipo"+cant_equipos+"'><label class='form-check-label' for='equipo'"+e.tratamiento_id+"equipo"+e.equipo_id+"'>"+e.equipo+"</label><br>";
                                       }
                                    });//foreach datos_equipos.equipos
                                    contenido_tabla+='</td>';
                                 }//success equipos
                              });//ajax listar_equipos

                              //agrego el resto de los campos
                              contenido_tabla+="<td><input type='number' class='form-control border-primary' value='"+tratamiento_precio+"' name='"+t.tratamiento_id+"precio' readonly='readonly'></td>";
                              contenido_tabla+="<td><input type='number' step='1' min='0' max='100' class='form-control border-primary descuento' value='"+t.descuento+"' name='"+t.tratamiento_id+"descuento'></td>";
                              contenido_tabla+="<td><input type='text' class='form-control border-primary' value='"+t.notas+"' name='"+t.tratamiento_id+"descripcion'></td>";
                              contenido_tabla+="<td>"+tratamiento_precio+"</td>";
                              contenido_tabla+="<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminartratamiento'><i class='bi bi-trash'></i></botton></td>";
                              contenido_tabla+='</tr>';
                              $("#modal_editar_turno_tabla tbody").prepend(contenido_tabla);
                              cant_tratamientos++;
                           });//foreach  datos_turno.tratamientos

                           $("#modal_editar_turno_total_turno").val(total_turno); 
                     }//success
                  });//ajax tratamientos
               }//success ajax detalle_turno
            })//ajax detalle_turno

            var val="<?php echo site_url("agendadeturnos/agendadeturnos_contr/editar_turno");?>";
            val+="?turno_id="+turno_id;
            val+="&cant_tratamientos="+cant_tratamientos;
            val+="&cant_equipos="+cant_equipos;
            val+="&cant_filas="+cant_filas;
            $("#modal_editar_turno_form").prop("action",val);

            //detecto click en agregar tratamiento nuevo
            $("#modal_editar_turno").off("click", "#modal_editar_turno_agregar_tratamiento").on("click", "#modal_editar_turno_agregar_tratamiento", function(){
               $.ajax({
                  url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/listar_tratamientos");?>',
                  type : 'GET',
                  data : {"usuario_id":selectprofactual},
                  dataType : 'json',
                  async : false,

                  success : function(datos) {
                     cant_filas++;
                     var contenido_tabla="<tr id='modal_editar_turno_tratamiento"+cant_tratamientos+"'><td><select class='form-control border-primary select_tratamientos' required name='tratamiento"+cant_tratamientos+"'>"; 
                     contenido_tabla += "<option value=''>Elija un tratamiento...</option>";
                     datos.tratamientos.forEach(function(e){
                           contenido_tabla += "<option value='"+e.tratamiento_id+"'>"+e.tratamiento+"</option>";
                     });//foreach
                     contenido_tabla += "</select></td>";
                     contenido_tabla += "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>";
                     contenido_tabla += "<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminartratamientovacio'><i class='bi bi-trash'></i></botton></td></tr>"
                     $("#tr_modal_editar_turno_total_turno").before(contenido_tabla);
                     
                     cant_tratamientos++;
                     var val="<?php echo site_url("agendadeturnos/agendadeturnos_contr/editar_turno");?>";
                     val+="?turno_id="+turno_id;
                     val+="&cant_tratamientos="+cant_tratamientos;
                     val+="&cant_equipos="+cant_equipos;
                     val+="&cant_filas="+cant_filas;
                     $("#modal_editar_turno_form").prop("action",val);
                  }//success ajax listar tratamientos
               });//ajax listar tratamientos
            });//click modal_editar_turno_agregar_tratamiento

            $("#modal_editar_turno").modal("show");

            $("#modal_editar_turno").off("click", ".eliminartratamientovacio").on("click", ".eliminartratamientovacio", function(){
               //elimino la fila recién construída
               $(this).closest("tr").remove();
               cant_filas++;
               var val="<?php echo site_url("agendadeturnos/agendadeturnos_contr/editar_turno");?>";
               val+="?turno_id="+turno_id;
               val+="&cant_tratamientos="+cant_tratamientos;
               val+="&cant_equipos="+cant_equipos;
               val+="&cant_filas="+cant_filas;
               $("#modal_editar_turno_form").prop("action",val);
            })//click .eliminartratamientovacio

            //DETECTO SI CAMBIAN EL TRATAMIENTO
            $("#modal_editar_turno").off("change", ".select_tratamientos").on("change", ".select_tratamientos", function(){
               var fila=$(this).closest("tr");
               var id_fila=fila[0].id
               
               if (fila.find('td:eq(0) select').val()==""){
                  //recupero los datos para calcular el nuevo total (sigue abajo)
                  var subtotal_anterior=fila.find('td:eq(5)').text();
                  var total_turno_anterior=$("#modal_editar_turno_total_turno").val();
                  total_turno=total_turno_anterior-subtotal_anterior;
                  $("#modal_editar_turno_total_turno").val(total_turno);
                  fila.find('td:eq(6)').remove();
                  fila.find('td:eq(5)').remove();
                  fila.find('td:eq(4)').remove();
                  fila.find('td:eq(3)').remove();
                  fila.find('td:eq(2)').remove();
                  fila.find('td:eq(1)').remove();
                  
                  $("#"+id_fila).append("<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>");
                  $("#"+id_fila).append("<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminartratamientovacio'><i class='bi bi-trash'></i></botton></td>");
               
               }else{//if select val != ""
                  var tratamiento_id=this.value;
                  //recupero los datos para calcular el nuevo total (sigue abajo)
                  var subtotal_anterior=fila.find('td:eq(5)').text();
                  var total_turno_anterior=$("#modal_editar_turno_total_turno").val();
                  total_turno=total_turno_anterior-subtotal_anterior;

                  fila.find('td:eq(6)').remove();
                  fila.find('td:eq(5)').remove();
                  fila.find('td:eq(4)').remove();
                  fila.find('td:eq(3)').remove();
                  fila.find('td:eq(2)').remove();
                  fila.find('td:eq(1)').remove();

                  //busco los equipos del tratamiento y los grabo en la tabla
                  $.ajax({
                     url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/listar_tratamiento");?>',
                     type : 'GET',
                     data : {"tratamiento_id":tratamiento_id},
                     dataType : 'json',
                     async : false,

                     success : function(tratamiento) {                        
                        //aplico el nuevo total general
                        var tratamiento_precio=Math.round(parseInt(tratamiento[0].precio)/10)*10;
                        
                        total_turno+=tratamiento_precio;
                        $("#modal_editar_turno_total_turno").val(total_turno);
                        
                        //busco los equipos del tratamiento y los grabo en la tabla
                        $.ajax({
                           url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/listar_equipos");?>',
                           type : 'GET',
                           data : {"tratamiento_id":tratamiento_id},
                           dataType : 'json',
                           async : false,

                           success : function(datos) {
                              var input='';
                              input+='<td>';
                              datos.equipos.forEach(function(e){
                                 cant_equipos++;
                                 input+="<input class='form-check-input' type='checkbox' value='"+e.equipo_id+"' name='"+e.tratamiento_id+"equipo"+cant_equipos+"'><label class='form-check-label' for='"+e.tratamiento_id+"equipo"+cant_equipos+"'>"+e.equipo+"</label><br>";
                              });//foreach
                              input+='</td>';
                              $("#"+id_fila).append(input);
                           }//success equipos
                        });//ajax listar_equipos

                        //agrego el resto de los campos
                        $("#"+id_fila).append("<td><input type='number' class='form-control border-primary' value='"+tratamiento_precio+"' name='"+tratamiento_id+"precio' readonly='readonly'></td>");
                        $("#"+id_fila).append("<td><input type='number' step='1' min='0' max='100' class='form-control border-primary descuento' value='0' name='"+tratamiento_id+"descuento'></td>");
                        $("#"+id_fila).append("<td><input type='text' class='form-control border-primary' name='"+tratamiento_id+"descripcion'></td>");
                        $("#"+id_fila).append("<td>"+tratamiento_precio+"</td>");
                        $("#"+id_fila).append("<td><button title='Borrar tratamiento' type='button' class='btn btn-danger eliminartratamiento'><i class='bi bi-trash'></i></botton></td>");
                     }//success tratamientos
                  });//ajax listar_tratamientos

                  var val="<?php echo site_url("agendadeturnos/agendadeturnos_contr/editar_turno");?>";
                  val+="?turno_id="+turno_id;
                  val+="&cant_tratamientos="+cant_tratamientos;
                  val+="&cant_equipos="+cant_equipos;
                  val+="&cant_filas="+cant_filas;
                  $("#modal_editar_turno_form").prop("action",val);
               }//elseif select val != ""
            });//change select_tratamientos

            let timeout;
            $("#modal_editar_turno").off("keyup", "#modal_editar_turno_duracion").on("keyup", "#modal_editar_turno_duracion", function(){
               var duracion=$(this).val();
               clearTimeout(timeout);
               timeout = setTimeout(function() {
                  if($("#modal_editar_turno_hora_inicio").val()!=""){
                     if($("#modal_editar_turno_duracion").val()!=""){
                        var turno_nuevo_hora_fin=moment($("#modal_editar_turno_hora_inicio").val(), 'HH:mm', true);
                        turno_nuevo_hora_fin.add(duracion, 'm');
                        turno_nuevo_hora_fin=moment(turno_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                        $("#modal_editar_turno_hora_fin").val(turno_nuevo_hora_fin);
                     }else{//if($("#modal_editar_turno_duracion").val()!="")
                        $("#modal_editar_turno_hora_fin").val("");
                     }
                  }//if($("#modal_editar_turno_hora_inicio").val()!="")
               }, 700)//set timeout modal_editar_turno_duracion
            }) //keyup modal_editar_turno_duracion

            //---------------------------------detecto el cambio en el campo hora inicio---------------------
            let timeout4;
            $("#modal_editar_turno").off("keyup", "#modal_editar_turno_hora_inicio").on("keyup", "#modal_editar_turno_hora_inicio", function(){
               clearTimeout(timeout4);
               timeout4 = setTimeout(function() {
                  if($("#modal_editar_turno_duracion").val()!=""){
                     if($("#modal_editar_turno_hora_inicio").val()!=""){
                        var duracion=$("#modal_editar_turno_duracion").val();
                        turno_nuevo_hora_fin=moment($("#modal_editar_turno_hora_inicio").val(), 'HH:mm', true);
                        turno_nuevo_hora_fin.add(duracion, 'm');
                        turno_nuevo_hora_fin=moment(turno_nuevo_hora_fin, 'HH:mm', true).format('HH:mm');
                        $("#modal_editar_turno_hora_fin").val(turno_nuevo_hora_fin);
                     }else{//if($("#modal_editar_turno_hora_inicio").val()!="")
                        $("#modal_editar_turno_hora_fin").val("");
                     }//if else($("#modal_editar_turno_hora_inicio").val()!="")
                  }//$("#modal_editar_turno_duracion").val()!=""
               }, 700)//set timeout4 modal_editar_turno_dni
            }) //keyup modal_editar_turno_dni

            //controlo los cambios sobre el input descuento
            let timeout3;
            $("#modal_editar_turno").off("keyup change", ".descuento").on("keyup change", ".descuento", function(){
               var ubicacion=$(this);
               var fila=$(this).closest("tr");
               clearTimeout(timeout3);
               timeout3 = setTimeout(function() {
                  //recupero los datos para calcular el nuevo total
                  var subtotal_anterior=fila.find('td:eq(5)').text();
                  var total_turno_anterior=$("#modal_editar_turno_total_turno").val();
                  total_turno=total_turno_anterior-subtotal_anterior;

                  //cambio los datos de la fila
                  var descuento = ubicacion.val();
                  var precio_tratamiento=fila.find('td:eq(2) input').val();
                  var subtotal=Math.round((precio_tratamiento-((precio_tratamiento*descuento)/100))/10)*10;
                  fila.find('td:eq(5)').empty().text(subtotal);

                  //aplico el nuevo total general
                  total_turno+=subtotal;
                  $("#modal_editar_turno_total_turno").val(total_turno);
               },700);//timeout3 cambio en input descuento
            });//keyup clase descuento

            $("#modal_editar_turno").off("click", ".eliminartratamiento").on("click", ".eliminartratamiento", function(){
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
               var val="<?php echo site_url("agendadeturnos/agendadeturnos_contr/editar_turno");?>";
               val+="?turno_id="+turno_id;
               val+="&cant_tratamientos="+cant_tratamientos;
               val+="&cant_equipos="+cant_equipos;
               val+="&cant_filas="+cant_filas;
               $("#modal_editar_turno_form").prop("action",val);

            })//click .eliminartratamiento

            //--------------FORMULARIO EDITAR TURNO---------------------------------
            var opcionesform = { 
               beforeSubmit: function(){
               $(".validacion").removeClass("is-invalid border-danger");
               $.LoadingOverlay("show");
               }, //before

               success: function(datos){
                  $("modal_editar_turno.alert").remove();

                  if(datos.validacion=="ERROR"){
                     $.LoadingOverlay("hide");
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
                     if(datos.errores.profesional_id!=""){
                        $("#modal_editar_turno_profesional_id").addClass("is-invalid border-danger");
                        alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                     }//datos.errores.profesional_id!=""
                     if(datos.errores.paciente_id!=""){
                        $("#modal_editar_turno_paciente_id").addClass("is-invalid border-danger");
                        alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                     }//datos.errores.paciente_id!=""
                     if(datos.errores.sede_id!=""){
                        $("#modal_editar_turno_sede_id").addClass("is-invalid border-danger");
                        alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                     }//datos.errores.sede_id!=""
                     if(datos.errores.motivo!=""){
                        $("#modal_editar_turno_motivo").addClass("is-invalid border-danger");
                        alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                     }//datos.errores.motivo!=""
                     if(datos.errores.duracion!=""){
                        $("#modal_editar_turno_duracion").addClass("is-invalid border-danger");
                        alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                     }//datos.errores.duracion!=""
                     
                     $("#modal_editar_turno_alertas").append(alerta);
                  }

                  if(datos.validacion=="CORRECTO"){
                     $("#modal_editar_turno").modal("hide");
                     recarga_tabla_pagina(url);
                     $.LoadingOverlay("hide");
                  }//datos.validacion=="CORRECTO"
               },  //success   
               dataType:  'json'
            };//var

            $('#modal_editar_turno').ajaxForm(opcionesform); 
            //---------------------FIN FORMULARIO EDITAR TURNO---------------------------
         });//editar turno
         //---------------------FIN BOTON EDITAR TURNO--------------------------------

         //--------------------BOTON MARCAR CANCELAR TURNO--------------------------------
         $('#tabla1 tbody').on("click", ".btnreprogramarturno", function(){
            //me posiciono al principio de la fila
            var fila = this.closest("tr");
            //obtengo los datos de la fila
            datosdefila=table.row(fila).data();
            //obtengo el id de la fila
            var turno_id=datosdefila.turno_id;
            $.post("<?php echo site_url("agendadeturnos/Agendadeturnos_pacientes_contr/reprogramar_turno");?>",{'turno_id':turno_id},function(datos){
            },"json")//if turno_id.indexOf
            window.location.href = "<?php echo site_url('agendadeturnos/Agendadeturnos_contr/interfaz'); ?>";          
         });//click onclick
         //---------------------FIN BOTON MARCAR CANCELAR TURNO----------------------------------
      }); //document ready
   </script>


   </body>
</html>