
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
   
      <title>Días no laborables</title>
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
      <br><br><br>    
      <div class="container-fluid">
         <div class= "row text-primary" align="center">
            <div class="col-12">
               <h1>Días no laborables</h1>
            </div>
         </div>
         <br>
         <div class= "row">
            <div class="col-12">
               <button class="btn btn-primary btn-lg btn-block" id="btn_nuevo_dia" type="button" class="btn btn-primary">Agregar nuevos días.</button>
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
         <table class="table" class="display"  id="tabla1" style="width:100%">
            <thead class="thead-dark">
               <tr>
                  <th scope="col">Id</th>
                  <th scope="col" data-priority="1">Ver mas</th>
                  <th scope="col" data-priority="3">Fecha de inicio</th>
                  <th scope="col" data-priority="4">Fecha de fin</th>
                  <th scope="col" data-priority="5">Descripcion</th>
                  <th scope="col" data-priority="6">Estado</th>
                  <th scope="col" data-priority="2">Acciones</th>
               </tr>
            </thead>
            <tfoot class="thead-dark">
               <tr>
                  <th>Id</th>
                  <th scope="col">Ver mas</th>
                  <th scope="col">Fecha de inicio</th>
                  <th scope="col">Fecha de fin</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Acciones</th>
               </tr>            
            </tfoot>
            <tbody class="table-striped">
            </tbody>
         </table>
         <?php 
            $this->load->view("vistas_modales/modal_nuevo_dia_no_laborable");
            $this->load->view("vistas_modales/modal_detalle_dias_no_laborables");
            $this->load->view("vistas_modales/modal_turnos_a_reprogramar");
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
            //-------------creamos la fila filtros de la tabla-------------------------
            $('#tabla1 tfoot th').each( function () {
               var title = $(this).text();
               var entorno = $(this);
               if ((title=="Acciones") || (title=="Ver mas")){
                  entorno.html(' ');
               }else{//if title acciones
                  if(title=="Fecha de inicio"){
                     entorno.html( '<input type="date" class="filtros" placeholder="Filtrar por '+title+'" /> ' );
                  }else{//if title Fecha de inicio
                     if(title=="Fecha de fin"){
                        entorno.html( '<input type="date" class="filtros" placeholder="Filtrar por '+title+'" /> ' );
                     }else{//if title Fecha de fin  
                        entorno.html( '<input type="text" class="filtros" placeholder="Filtrar por '+title+'" /> ' );
                     }//else if title Fecha de fin           
                  }//else if title Fecha  de inicio             
               }//else if title Acciones              
            }); //each

            //----Fecha en español----
            moment.locale('es', {
               months: 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'.split('_'),
               monthsShort: 'Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.'.split('_'),
               weekdays: 'Domingo_Lunes_Martes_Miércoles_Jueves_Viernes_Sábado'.split('_'),
               weekdaysShort: 'Dom._Lun._Mar._Miér._Jue._Vier._Sáb.'.split('_'),
               weekdaysMin: 'Do_Lu_Ma_Mi_Ju_Vi_Sá'.split('_')
            });
            //----Fin fecha en español----

            //----Variables Globales-------
            var url = "<?php echo site_url ("agendadeeventos/Dias_no_laborables_contr/listar_dias");?>";
            var fecha_actual=moment().format('YYYY-MM-DD');
            var datos=[];
            var carga_tabla=false;
            var carga_init=false;
            var option;
            var botones= "<div class='btn-group dropdown mr-5 mx-auto dropleft'><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>Acciones</button><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
            botones+="<button type='button' id='btndesactivar' value='desactivar' class='btn btn-danger btn-block btnestado'><i class='bi bi-dash-circle'></i> Desactivar </botton>";
            botones+="<button type='button' id='btnactivar' value='activar' class='btn btn-success btn-block btnestado'><i class='bi bi-plus-circle'></i> Activar </botton>";
            botones+="<button type='button' id='btneditar' class='btn btn-warning btn-block btneditar'><i class='bi bi-pen'></i> Editar </button>";
            botones+="</div></div>";

             //--------Funciones-----------
             var recarga_tabla_pagina = function(url){
               $.LoadingOverlay("show");
               carga_tabla=true;
               
               // Obtener la página actual antes de llamar a ajax.reload()
               var pagina_actual = table.page();

               table.ajax.reload(function() {
                  // Establecer la página anterior después de que los datos se hayan recargado
                  table.page(pagina_actual).draw('page');
               });
            }

            var recarga_tabla = function(url){
               $.LoadingOverlay("show");
               carga_tabla=true;
               table.ajax.url(url).load();
            }//funciones

            $.LoadingOverlay("show");

            var table = $('#tabla1').DataTable( {
               //----------------------------------------parametros--------------------------------------
               "fixedHeader": true, //Deja fijo el encabezado
               "responsive": {details: false},
               "deferRender": true, //dibuja la tabla a medida que se necesita
               "order": [ 2, "asc" ], //ordena según la columna fecha
               
               dom: 'Bfrtip',
               "lengthMenu": [
                  [10, 25, 50, 100],
                  ["Mostrar 10 filas", "Mostrar 25 filas", "Mostrar 50 filas", "Mostrar 100 filas"]
               ],
               buttons: <?php echo json_encode($configuracionBotones); ?>,
               
               "columnDefs": [
                  {
                  "orderable": false,
                  "targets": [1 , 6],
                  },
                  {className: "text-center", "targets": "_all"},
                  { "visible": false, "targets": 0 }
               ],
                        
               "ajax":{
                  "url": url ,  
                  'type' : 'post',
                  "dataSrc":""
               },//ajax
               
               "columns":[
                  {"data": "id"},
                  {"defaultContent":"<div id='mas' class='btneditar'><i class='bi bi-plus-circle btn btn-primary'></i></div>"},
                  {"data": "fecha_inicio"},
                  {"data": "fecha_fin"},
                  {"data": "descripcion"},
                  {"data": "estado"},
                  {"defaultContent": botones}
               ],
               
                     
               //Traducimos al español
               "language": {
                  "url": "<?php echo site_url ("Lenguaje_contr/lenguaje");?>"
               },
                  
               "rowId": 'id',//establezco a turno_id como la identificación de la fila
      
               initComplete: function(){
                  $('.dt-buttons').find('.dt-button').removeClass('dt-button');
                  $('.buttons-page-length').addClass('btn btn-primary');
                  $('.buttons-colvis').addClass('btn btn-info');

                  $.LoadingOverlay("hide");
                  carga_init=true;

                  //----------------------------FILTRO POR COLUMNAS----------------------------------
                  this.api().columns().every( function () {
                     var that = this;
                     $( 'input', this.footer() ).on( 'keyup change', function () {
                        var valorbusqueda=this.value;
                        if ( that.search() !== valorbusqueda) {
                              that.search( valorbusqueda ).draw();
                        }//if
                     });//input          
      
                  });//api
      
               },//init
               
               
                  //-----------------------------------------------------------------------------
               
                  drawCallback: function () {
                     //------------------coloreo las filas----------------------
                     this.api().rows().every( function () {
                        var id=this.data().id;
                        $("#"+id).addClass(this.data().color);
                     })//this api
                     //----------------Fin Coloreo de filas -------------------------
                  }//drawcallback         
               } );//datatable  

            // ----------------------BOTON NUEVO DIA-------------------------------------------
               $('#btn_nuevo_dia').click(function () {


                     //preparo el modal
                     $("#modal_nuevo_dia_no_laborable_form").trigger("reset");
                     $("#modal_nuevo_dia_no_laborable_header").css("background-color", "#005eff");
                     $("#modal_nuevo_dia_no_laborable_header").css("color", "white" );
                     $("#modal_nuevo_dia_no_laborable_titulo").text("Nuevo dia");
                     $("#modal_nuevo_dia_no_laborable_sede_id").empty();
                     
                     //comienzo con la carga de los datos del turno nuevo
                     
                     

                     //CARGO LAS SEDES
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/listar_sedes");?>',
                        dataType : 'json',
                        async : false,

                        success : function(sedes) {
                           var option = document.createElement("option");
                           option.text = "Elija una opcion...";
                           option.value= "";
                           $("#modal_nuevo_dia_no_laborable_sede_id").append(option);
                           sedes.sedes.forEach(function(sede){
                              option = document.createElement("option");
                              option.text = sede.sede;
                              option.value= sede.sede_id;
                              $("#modal_nuevo_dia_no_laborable_sede_id").append(option);
                              // if(sede.valor_por_defecto==2){
                              //    $("#modal_nuevo_dia_no_laborable_sede_id option[value='"+sede.sede_id+"']").prop("selected",true);
                              // }
                           })//foreach sedes
                           $("#modal_nuevo_dia_no_laborable_sede_id option[value='1']").prop("selected",true);
                        }//successs
                     });//ajax sedes


                     
                     //preparo la tabla

                     //borro la tabla del modal
                     $('#modal_nuevo_dia_no_laborable_tabla tbody').remove();

                  
                     var contenido_tabla='<tbody border=="1">';
                     contenido_tabla += "<tr id='tr_agregar_dia_tabla'><td class='text-primary' colspan='5'><button type='button' id='agregar_dia_tabla' class='btn btn-primary btn-block'>Agregar dia</button></td></tr></tbody>";
                     $("#modal_nuevo_dia_no_laborable_tabla").prepend(contenido_tabla);
                     var cant_dias=0;
                     
                           
                     $("#agregar_dia_tabla").click(function(){
                        var contenido_tabla="<tr>";
                        //------------fin select de los días------------------------

                        contenido_tabla +='<td><input type="date" name="fecha_inicio'+cant_dias+'" required></td>';
                        contenido_tabla +='<td><input type="date" name="fecha_fin'+cant_dias+'" required></td>';
                        contenido_tabla +='<td><input type="text" name="descripcion'+cant_dias+'" required></td>';
                        contenido_tabla +="<td><button title='Borrar dias' type='button' id='btn_borrar_dias"+cant_dias+"' class='btn btn-danger eliminadias'><i class='bi bi-trash'></i></botton>";
                        contenido_tabla +="<button title='Duplicar dias' type='button' id='btn_duplicar_dias"+cant_dias+"' class='btn btn-warning duplicadias'><i class='bi bi-files'></i></botton></td>";
                        contenido_tabla +="</tr>";
                        $("#tr_agregar_dia_tabla").after(contenido_tabla);
                        cant_dias++;

                        $('.eliminadias').click(function(){
                           //me posiciono al principio de la fila
                           var datosdefila = $(this).closest("tr").remove();
                           var val="<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/nuevo_dia?cant_dias="); ?>";
                           cant_dias--;
                           val=val+cant_dias;
                           $("#modal_nuevo_dia_no_laborable_form").prop("action",val);
                        })//click

                        var val="<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/nuevo_dia?cant_dias="); ?>";
                        val=val+cant_dias;
                        $("#modal_nuevo_dia_no_laborable_form").prop("action",val);
                     });//click agregar_dia_tabla
                     
               

                     var val="<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/nuevo_dia?cant_dias="); ?>";
                     val=val+cant_dias;
                     $("#modal_nuevo_dia_no_laborable_form").prop("action",val);

                     //muestro el modal
                     $("#modal_nuevo_dia_no_laborable").modal("show");
                     
                     
                     //--------------FORMULARIO NUEVA AGENDA---------------------------------
                     var opcionesform = { 
                     beforeSubmit: function(){
                     $.LoadingOverlay("show");
                     }, //before

                     success: function(datos){
                        $("#modal_nuevo_dia_no_laborable").modal("hide");
                     table.ajax.reload(); //recarga la tabla
                     $.LoadingOverlay("hide");
                     },  //success   

                     dataType:  'json'

                  };//var
                  
                  
                  $('#modal_nuevo_dia_no_laborable').ajaxForm(opcionesform); 
                        
               //---------------------FIN FORMULARIO NUEVO DIA---------------------------
               });//click btn nuevo dias
            //-------------------------FIN BOTON NUEVO HORARIO-----------------------------------

            $('#tabla1 tbody').on('click', '#mas', function () 
               {

               //me posiciono al principio de la fila
               var datosdefila = $(this).closest("tr");
               //obtengo el id de la fila
               var no_disponible_id=datosdefila[0].id;

               
               //traigo los datos del agenda
               $.ajax({
                     url : '<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/listar_dia");?>',
                     data : {"no_disponible_id" : no_disponible_id},
                     type : 'POST',
                     dataType : 'json',
                     async : false,

                     success : function(datos) {
                           //comienzo a completar el formulario para que el usuario pueda verificar los datos del agenda
                           //elimino las filas de la tabla por si se había consultado antes algún otro turno
                           $('#modal_detalle_dias_no_laborables_tabla tr').remove();
                           //armo el modal con los datos obtenidos
                           $("#modal_detalle_dias_no_laborables_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Fecha de inicio:</th><td colspan='2'>"+datos.no_disponible[0].fecha_inicio+"</td></tr>");
                           console.log(datos.no_disponible[0].fecha_inicio);
                           $("#modal_detalle_dias_no_laborables_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Fecha de fin:</th><td colspan='2'>"+datos.no_disponible[0].fecha_fin+"</td></tr>");
                           $("#modal_detalle_dias_no_laborables_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Descripción:</th><td colspan='2'>"+datos.no_disponible[0].descripcion+"</td></tr>");
                           $("#modal_detalle_dias_no_laborables_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Sede:</th><td colspan='2'>"+datos.no_disponible[0].sede+"</td></tr>");
                                                                        
                        }//success
                  });//ajax listar dias
                                                         
                  //preparo el modal
                  
                  $("#modal_detalle_dias_no_laborables_header").css("background-color", "#005eff");
                  $("#modal_detalle_dias_no_laborables_header").css("color", "white" );
                  $("#modal_detalle_dias_no_laborables_title").text("Detalle");
                  $('#modal_detalle_dias_no_laborables').modal('show');  
                     

               });//if on click mas

            

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

               
            
            //----------BOTON ACTUALIZAR TABLA------------
               $('#filtros_actualizar_tabla').click(function(){
               table.ajax.url( url ).load();
               })//click #filtros_actualizar tabla


            //--------------------BOTON DESACTIVAR--------------------------
               $('#tabla1 tbody').on("click", ".btnestado", function(){
                     
               
                     var estado_id=false;
                     if($(this)[0].value=="desactivar"){
                        estado_id=1;
                        var estado_listar_reprogramar_id_1=2;
                        var estado_listar_reprogramar_id_2=7;
                        var estado_reprogramar_id=6;
                        
                     }else{
                        if($(this)[0].value=="activar"){
                           
                           estado_id=2;
                           var estado_listar_reprogramar_id_1=6;
                           var estado_listar_reprogramar_id_2=6;
                           var estado_reprogramar_id=2;
                        }
                     }
                     //me posiciono al principio de la fila
                     var datosdefila = $(this).closest("tr");
                     //obtengo el id de la fila
                     var no_laborable_id=datosdefila[0].id;
                     
                     $.get("<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/estado");?>",{'estado_id':estado_id, 'no_laborable_id':no_laborable_id},function(datos){
                        
                        if(datos["no_laborable"]){

                                    table.ajax.url(url).load();

                                    $.ajax({
                                             url : '<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/listar_dia");?>',
                                             data : {"no_laborable_id" : no_laborable_id},
                                             type : 'POST',
                                             dataType : 'json',
                                             async : false,

                                             success : function(datos_no_laborable) {
                                             
                                             
                                             var fecha_inicio=datos_no_laborable.no_laborable[0].fecha_inicio;
                                             var fecha_fin=datos_no_laborable.no_laborable[0].fecha_fin;
                                             var fecha_inicio_formulario=null;
                                             var fecha_fin_formulario=null;
                                             var hora_actual=null;
                                             
                                             
                                             if(fecha_fin!=null){
                                                //compruebo si la agenda está en curso
                                                   if(moment(fecha_actual, "YYYY-MM-DD", true).isBetween(fecha_inicio,fecha_fin, undefined, '[]')){
                                                      fecha_inicio_formulario=fecha_actual;
                                                      fecha_fin_formulario=fecha_fin;
                                                      hora_actual = moment().format("HH:mm:ss");
                                                   }else{//if fecha actual entre fechas
                                                   //compruebao si la agenda todavía no está activa
                                                      if(moment(fecha_actual, "YYYY-MM-DD", true).isBefore(fecha_inicio)){
                                                         fecha_inicio_formulario=fecha_inicio;
                                                         fecha_fin_formulario=fecha_fin;
                                                      }
                                                   }//else if fecha actual entre fechas
                                                }else{//if fecha fin null
                                                   //compruebo si la agenda está en curso
                                                   if(moment(fecha_actual, "YYYY-MM-DD", true).isAfter(fecha_inicio)){
                                                      fecha_inicio_formulario=fecha_actual;
                                                      hora_actual = moment().format("HH:mm:ss");
                                                   }else{//if fecha actual entre fechas
                                                      if(moment(fecha_actual, "YYYY-MM-DD", true).isBefore(fecha_inicio)){
                                                         fecha_inicio_formulario=fecha_inicio;
                                                      }
                                                   }//else if fecha actual entre fechas
                                                }//if fecha_fin!=null
                                                
                                             $.ajax({
                                                   url : '<?php echo site_url("agendadeeventos/Dias_no_laborables_contr/listar_turnos_agenda");?>',
                                                   data : {'fecha_inicio_formulario':fecha_inicio_formulario, 
                                                         'fecha_fin_formulario':fecha_fin_formulario, 
                                                         'hora_actual':hora_actual,
                                                         'estado_listar_reprogramar_id_1':estado_listar_reprogramar_id_1,
                                                         'estado_listar_reprogramar_id_2':estado_listar_reprogramar_id_2
                                                         },                          
                                                   type : 'POST',
                                                   dataType : 'json',
                                                   async : false,

                                                   success : function(datos_reprogramacion) {
                                                         var cont_check=0;
                                                         var datos_tabla="";

                                                         if(datos_reprogramacion.turnos1.length!=0){
                                                               datos_reprogramacion.turnos1.forEach(function(d2){
                                                               datos_tabla+="<tr>";
                                                               datos_tabla+="<td><div class='form-group form-check'><input type='checkbox' class='form-check-input check_td' checked name='check_"+cont_check+"' value='"+d2.turno_id+"'></div></td>"
                                                               datos_tabla+="<td>"+d2.fecha_formateada+"</td>"
                                                               datos_tabla+="<td>"+d2.paciente+"</td>"
                                                               datos_tabla+="<td>"+d2.fecha_formateada+"</td>"
                                                               datos_tabla+="</tr>";
                                                               cont_check++;
                                                            })//for each turnos1
                                                         }//if turnos1.length

                                                         if(datos_reprogramacion.turnos2!=null && datos_reprogramacion.turnos2.length!=0){
                                                            datos_reprogramacion.turnos2.forEach(function(d2){
                                                               console.log("existe 2");
                                                               datos_tabla+="<tr>";
                                                               datos_tabla+="<td><div class='form-group form-check'><input type='checkbox' class='form-check-input check_td' checked name='check_"+cont_check+"' value='"+d2.turno_id+"'></div></td>"
                                                               datos_tabla+="<td>"+d2.fecha_formateada+"</td>"
                                                               datos_tabla+="<td>"+d2.paciente+"</td>"
                                                               datos_tabla+="<td>"+d2.fecha_formateada+"</td>"
                                                               datos_tabla+="</tr>";
                                                               cont_check++;
                                                            })//for each turnos1
                                                         }//if turnos1.length

                                                         $("#modal_turnos_a_reprogramar_tabla tr").remove();
                                                         $("#check_todos").prop("checked", true);
                                                         $("#modal_turnos_a_reprogramar_tabla tbody").append(datos_tabla);

                                                         
                                                         $("#check_todos").click(function(){
                                                            
                                                            if($('#check_todos').is(":checked")){
                                                               $(".check_td").prop("checked", true);
                                                            }else{
                                                               $(".check_td").prop("checked", false);
                                                            }

                                                         })//click #check_todos

                                                         var val="<?php echo site_url("agendadeeventos/Agenda_prof_contr/reprogramar_turnos?estado_id="); ?>";
                                                         val+=estado_reprogramar_id;
                                                         val+='&cont_check=';
                                                         val+=cont_check;
                                                         $("#modal_turnos_a_reprogramar_form").prop('action' , val);
                                                   }//success reprogramar turnos
                                             })//ajax reprogramar turnos                                              
                                             }//success
                                          })//ajax listar agenda

                                    $("#modal_turnos_a_reprogramar_form").trigger("reset");
                                    $("#modal_turnos_a_reprogramar_header").css("background-color", "#005eff");
                                    $("#modal_turnos_a_reprogramar_header").css("color", "white" );
                                    $("#modal_turnos_a_reprogramar_titulo").text("Turnos a reprogramar");
                                    
                                    $("#modal_turnos_a_reprogramar").modal("show");
                           
                              
                        }//if datos->agenda
                     }, "json");//get estado agenda

                     //--------------FORMULARIO NUEVO HORARIO---------------------------------
                     var opcionesform = { 
                           beforeSubmit: function(){
                              $.LoadingOverlay("show");
                           }, //before

                           success: function(datos){
                              
                              $("#modal_turnos_a_reprogramar").modal("hide");
                              //table.ajax.reload(); //recarga la tabla
                              table.ajax.url(url).load();
                              $.LoadingOverlay("hide");
                           },  //success   

                           dataType:  'json'

                           };//var
                           
                           
                           $('#modal_turnos_a_reprogramar').ajaxForm(opcionesform); 
                                 
                        //---------------------FIN FORMULARIO NUEVO HORARIO---------------------------

                     
               });//click desactivar medicos_agenda
            //---------------------FIN BOTON DESACTIVAR----------------------------------

      }); //document ready
         </script>


   </body>
</html>