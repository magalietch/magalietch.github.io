
<!doctype html>
<html lang="es">
   <head> 
      <!-- //comit -->
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
      
      <title>Agendas</title>
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
               <h1>Agenda</h1>
            </div>
         </div>
         <br>
         <div class= "row">
            <div class="col-12">
               <button class="btn btn-primary btn-lg btn-block" id="btn_nueva_agenda" type="button" class="btn btn-primary">Agregar nuevo horario.</button>
            </div>
         </div>
         <br>
         <!-- ---------------------------FILTRO TURNOS------------------------------------- -->
         <div class="row">
            <div class="col-12">
               <div class="card text-center border-primary">
                  <div class="card-header text-primary card-title"><h4>Filtros</h4></div>
                     <div class="card-body">
                        <div class="form-row">
                           <div class="col-sm-auto">
                              <!-- cambio profesional por sede selectsede por selectsede -->
                              <label for="selectsede" class="text-primary"><h5>Sede</h5></label>
                              <select class="form-control border-primary" id="selectsede">
                                 <option value="">Elija una sede</option>
                              </select>
                           </div>
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
         </div><!--div row -->
         <br>
         <!-- ---------------------------Comienzo de tabla------------------------------------- --> 
         <table class="table" class="display"  id="tabla1" style="width:100%">
            <thead class="thead-dark">
               <tr>
                  <th scope="col">Id</th>
                  <th scope="col" data-priority="1">Ver mas</th>
                  <th scope="col" data-priority="2">Sede</th>
                  <th scope="col" data-priority="2">Fecha de inicio</th>
                  <th scope="col" data-priority="7">Fecha de fin</th>
                  <th scope="col" data-priority="5">Exepción</th>
                  <th scope="col" data-priority="5">Trabaja</th>
                  <th scope="col" data-priority="3">Notas</th>
                  <th scope="col" data-priority="8">Estado</th>
                  <th scope="col" data-priority="6">Acciones</th>
               </tr>
            </thead>
            <tfoot class="thead-dark">
               <tr>
                  <th>Id</th>
                  <th scope="col">Ver mas</th>
                  <!-- cambio nombre profesional a sede -->
                  <th scope="col">Sede</th>
                  <th scope="col">Fecha de inicio</th>
                  <th scope="col">Fecha de fin</th>
                  <th scope="col">Exepción</th>
                  <th scope="col">Trabaja</th>
                  <th scope="col">Notas</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Acciones</th>
               </tr>            
            </tfoot>
            <tbody class="table-striped">
            </tbody>
         </table>
         <?php 
            $this->load->view("vistas_modales/modal_nueva_agenda_sede");
            $this->load->view("vistas_modales/modal_detalle_agenda_sede");
            $this->load->view("vistas_modales/modal_informacion");
            $this->load->view("vistas_modales/modal_cerrar_agenda");
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
            //-------------creamos la fila de filtros-------------------------
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
            var fecha_actual=moment().format('YYYY-MM-DD');
            var hora_actual=moment().format('HH:mm:ss');
            var url = "<?php echo site_url ("agendadeeventos/Agenda_sede_contr/listar_agendas");?>";
            //aca le digo que fecha y sede buscar
            var opselect={'sede_id':'1', 'fecha':fecha_actual};
            var datos=[];
            //guardo el profesional anterior que estoy cambiando para que si seleciona el mismootra vez no vuelva a cargar todo de vuelta
            //cambie de selectsedeanterior
            var selectsedeanterior="NADA";
            //guardo el profesional al q le hice click- cambie de selectsedeactual
            var selectsedeactual="NADA";
            var carga_tabla=false;
            var carga_init=false;
            var option;
            var botones= "<div class='btn-group dropdown mr-5 mx-auto dropleft'><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>Acciones</button><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
            botones+="<button type='button' id='btndesactivar' value='desactivar' class='btn btn-danger btn-block'><i class='bi bi-dash-circle'></i> Desactivar </botton>";
            botones+="<button type='button' id='btnduplicar' class='btn btn-warning btn-block'><i class='bi bi-files'></i> Duplicar </button>";
            botones+="<button type='button' id='btncerraragenda' class='btn btn-warning text-danger btn-block'><i class='bi bi-file-check-fill'></i> Cierre de agenda </button>";
            botones+="</div></div>";
            //---Fin variables globales

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
               "deferRender": false, //dibuja la tabla a medida que se necesita
               "order": [ 3, "asc" ], //ordena según la columna fecha
               
               dom: 'Bfrtip',
               "lengthMenu": [
                  [10, 25, 50, 100],
                  ["Mostrar 10 filas", "Mostrar 25 filas", "Mostrar 50 filas", "Mostrar 100 filas"]
               ],
               buttons: <?php echo json_encode($configuracionBotones); ?>,
               
               "columnDefs": [
                  {
                  "orderable": false,
                  "targets": [1 , 9],
                  },
                  //Centro el contenido de las columnas
                  {className: "text-center", "targets": "_all"},
                  //ESTO OCULTA COLUMMNAS
                  { "visible": false, "targets": [0] }
               ],
               "ajax":{
                  "url": url ,
                  "data": function(){
                     return opselect;
                  },//data
                  'type' : 'post',
                  "dataSrc":""
               },//ajax
               // {"data": "medico"},
               "columns":[
                  {"data": "eventos_agenda_id"},
                  {"defaultContent":"<div id='mas' class='btneditar'><i class='bi bi-plus-circle btn btn-primary'></i></div>"},
                  {"data": "sede"},
                  {"data": "fecha_inicio"},
                  {"data": "fecha_fin"},
                  {"data": "excepcion"},
                  {"data": "trabaja"},
                  {"data": "nota"},
                  {"data": "estado"},
                  {"defaultContent": botones}
               ],
               //Traducimos al español
               "language": {
                  "url": "<?php echo site_url ("Lenguaje_contr/lenguaje");?>"
               },
               
               "rowId": 'eventos_agenda_id',//establezco a turno_id como la identificación de la fila
   
               initComplete: function(){
                  $('.dt-buttons').find('.dt-button').removeClass('dt-button');
                  $('.buttons-page-length').addClass('btn btn-primary');
                  $('.buttons-colvis').addClass('btn btn-info');

                  $.LoadingOverlay("hide");
                  carga_init=true;

                  //----------------------------FILTRO POR COLUMNAS----------------------------------
                  this.api().columns().every( function () {
                     var that = this;
                     let timeout;
                     $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        clearTimeout(timeout);
                        var valorbusqueda=this.value;
                        timeout = setTimeout(function() {
                           $.LoadingOverlay("show");
                           if ( that.search() !== valorbusqueda){
                              if (that.selector.cols==2 || that.selector.cols==3){ 
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
                                 that.search( valorbusqueda ).draw();
                              }//if selector cols 3
                           }//if that.search
                           $.LoadingOverlay("hide");
                        }, 700)//set timeout
                     });//input          
                  });//api
               },//init
               //-----------------------------------------------------------------------------
               drawCallback: function () {
                  if(carga_init){
                     $.LoadingOverlay("hide");
                  }
                  //-------Pinto las filas de color según su estado-------                      
                  this.api().rows().every( function () {
                     var eventos_agenda_id=this.data().eventos_agenda_id;
                     $("#"+eventos_agenda_id).addClass(this.data().color);
                  })//this api
                  //-----------------------------------Fin Coloreo de filas --------------------------------------------
               }//drawcallback         
            });//datatable  

            // ----------------------BOTON NUEVO HORARIO-------------------------------------------
            $('#btn_nueva_agenda').click(function () {
               //reseteo los colores de los campos
               $(".validacion").addClass("border-primary");          
               $(".validacion").removeClass("is-invalid border-danger");
               $("#modal_nueva_agenda_sede_tabla").removeClass("table-danger");
               $("#modal_nueva_agenda_sede_alertas").empty();

               //preparo el modal
               $("#modal_nueva_agenda_sede_form").trigger("reset");
               $("#modal_nueva_agenda_sede_header").css("background-color", "#005eff");
               $("#modal_nueva_agenda_sede_header").css("color", "white" );
               $("#modal_nueva_agenda_sede_titulo").text("Nuevo horario");
               $("#modal_nueva_agenda_sede .select").empty();
               $("#modal_nueva_agenda_sede_fecha_inicio").val(fecha_actual);
               //borro la tabla del modal
               $('#modal_nueva_agenda_sede_tabla tbody').remove();

               //comienzo con la carga de los datos del turno nuevo
               //cargo el profesional
               $.ajax({
                  url : "<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_sedes");?>",
                  dataType : 'json',
                  async : false,
                  success : function(sedes) {
                     var option = document.createElement("option");
                     option.text = "Elija una opcion...";
                     option.value= "";
                     $("#modal_nueva_agenda_sede_sede_id").append(option);
                     sedes.sedes.forEach(function(sedes){
                        var option = document.createElement("option");
                        option.text = sedes.sede;
                        option.value= sedes.sede_id;
                        $("#modal_nueva_agenda_sede_sede_id").append(option);
                     })//foreach sedes
                     //-------------con value 1 funciona pero despues cambiar si quiero cambiar la sede--------------------
                     $("#modal_nueva_agenda_sede_sede_id option[value='1']").prop("selected",true);
                  }//success
               })//ajax
               
               // //CARGO LAS SEDES
               // $.ajax({
               //    url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_sedes");?>',
               //    dataType : 'json',
               //    async : false,
               //    success : function(sedes) {
               //       var option = document.createElement("option");
               //       option.text = "Elija una opcion...";
               //       option.value= "";
               //       $("#modal_nueva_agenda_sede_sede_id").append(option);
               //       sedes.sedes.forEach(function(e){
               //          option = document.createElement("option");
               //          option.text = e.sede;
               //          option.value= e.sede_id;
               //          $("#modal_nueva_agenda_sede_sede_id").append(option);
               //          if(e.valor_por_defecto==2){
               //             $("#modal_nueva_agenda_sede_sede_id option[value='"+e.sede_id+"']"). prop("selected",true);
               //          }//if(e.valor_por_defecto==2)
               //       })//foreach sedes
               //    }//successs
               // });//ajax sedes

               var cant_horarios = 0;
               var cant_filas = 0;
					
               var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
               val += "?cant_filas=" + cant_filas;
               $("#modal_nueva_agenda_sede_form").prop("action", val);

               var contenido_tabla = "<tbody><tr id='tr_modal_nueva_agenda_sede_agregar_horario'><td class='text-primary' colspan='5'><button type='button' id='modal_nueva_agenda_sede_agregar_horario' class='btn btn-primary btn-block'>Agregar horario</button></td></tr></tbody>";
               $("#modal_nueva_agenda_sede_tabla").append(contenido_tabla);

               $('#modal_nueva_agenda_sede_tabla').off('click', '#modal_nueva_agenda_sede_agregar_horario').on("click", "#modal_nueva_agenda_sede_agregar_horario", function() {
                  var contenido_tabla = "<tr class='fila_horario'>";
                  $.ajax({
                     url: '<?php echo site_url("agendadeeventos/agenda_sede_contr/listar_dias"); ?>',
                     type: 'POST',
                     dataType: 'json',
                     async: false,
                     success: function(dias) {
                        //-----------construyo el select para que elija los días-----------
                        contenido_tabla += "<td><select name='dia" + cant_horarios + "' required>";
                        contenido_tabla += "<option value=''>Elija un dia...</option>";
                        dias.dias.forEach(function(e) {
                        contenido_tabla += "<option value='" + e.dia_id + "'>" + e.dia + "</option>";
                        }); //foreach
                        contenido_tabla += "</select></td>";
                     } //success ajax agendadeeventos/agenda_sede_contr/listar_dias
                  }); //ajax agendadeeventos/agenda_sede_contr/listar_dias
                  //------------fin select de los días------------------------

                  contenido_tabla += '<td><input type="time" name="hora_inicio' + cant_horarios + '" required></td>';
                  contenido_tabla += '<td><input type="time" name="hora_fin' + cant_horarios + '" required></td>';
                  contenido_tabla += '<td><input type="text" name="duracion' + cant_horarios + '" required></td>';
                  contenido_tabla += "<td><button title='Borrar horario' type='button' class='btn btn-danger eliminahorario'><i class='bi bi-trash'></i></button>";
                  contenido_tabla += "<button title='Duplicar horario' type='button' class='btn btn-warning duplicahorario'><i class='bi bi-files'></i></button></td>";
                  contenido_tabla += "</tr>";
                  $("#tr_modal_nueva_agenda_sede_agregar_horario").before(contenido_tabla);
                  cant_horarios++;
                  cant_filas++;
                  var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                  val += "?cant_filas=" + cant_filas;
                  val += "&cant_horarios=" + cant_horarios;
                  $("#modal_nueva_agenda_sede_form").prop("action", val);

               }); //click modal_nueva_agenda_sede_agregar_horario

               $('#modal_nueva_agenda_sede_tabla').off("click", ".eliminahorario").on("click", ".eliminahorario", function() {
                  //me posiciono al principio de la fila
                  var datosdefila = $(this).closest("tr").remove();
                  cant_filas--;
                  var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                  val += "?cant_filas=" + cant_filas;
                  val += "&cant_horarios=" + cant_horarios;
                  $("#modal_nueva_agenda_sede_form").prop("action", val);
               }); //click

               $('#modal_nueva_agenda_sede_tabla').off("click", ".duplicahorario").on("click", ".duplicahorario", function(d) {
                  cant_filas++;
                  var $filaActual = $(this).closest('tr'); // Obtener la fila actual
                  var $nuevaFila = $filaActual.clone(); // Clonar la fila actual

                  // Modificar el atributo name de los elementos clonados
                  $nuevaFila.find('input, select').each(function() {
                     var name = $(this).attr('name');
                     var newName = name.substring(0, name.length - 1) + cant_horarios; // Cambiar el último dígito por el valor de cant_horarios
                     $(this).attr('name', newName);
                  });

                  $("#tr_modal_nueva_agenda_sede_agregar_horario").before($nuevaFila); // Insertar la nueva fila después de la fila actual

                  // Actualizar el contador de horarios
                  cant_horarios++;

                  // Actualizar la acción del formulario
                  var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                  val += "?cant_filas=" + cant_filas;
                  val += "&cant_horarios=" + cant_horarios;
                  $("#modal_nueva_agenda_sede_form").prop("action", val);
               });//on click .duplicahorario

               //ACTIVO EL CHECK NO SE TRABAJA 
               $("#modal_nueva_agenda_sede_excepcion").prop("checked", false);
               $("#modal_nueva_agenda_sede_trabaja").prop("disabled", true);
               $("#modal_nueva_agenda_sede_excepcion").change(function () {
                  $("#modal_nueva_agenda_sede_tabla").show();                  
                  if ($('#modal_nueva_agenda_sede_excepcion').is(":checked")) {
                     $("#modal_nueva_agenda_sede_trabaja").prop("disabled", false);
                  } else {
                     $("#modal_nueva_agenda_sede_trabaja").prop("disabled", true);
                     $('#modal_nueva_agenda_sede_trabaja').prop("checked", false);
                  }//$('#modal_nueva_agenda_sede_excepcion').is(":checked")
               });//change #modal_nueva_agenda_sede_excepcion

               $("#modal_nueva_agenda_sede_trabaja").change(function(){
                  if($('#modal_nueva_agenda_sede_trabaja').is(":checked")){
                     $('.fila_horario').remove();
                     cant_horarios=0;
                     cant_filas=0;
                     // Actualizar la acción del formulario
                     var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                     val += "?cant_filas=" + cant_filas;
                     val += "&cant_horarios=" + cant_horarios;
                     $("#modal_nueva_agenda_sede_form").prop("action", val);
                     $('#modal_nueva_agenda_sede_horario_label').hide();
                     $("#modal_nueva_agenda_sede_tabla").hide();                        
                  }else{
                     $('#modal_nueva_agenda_sede_horario_label').show();
                     $("#modal_nueva_agenda_sede_tabla").show();                        
                     //$("#modal_nueva_agenda_sede_tabla").removeClass("d-none");                        
                  }//if trabaja checked
               })//click en todo el dia

               //muestro el modal
               $("#modal_nueva_agenda_sede").modal("show");
               //--------------FORMULARIO NUEVA AGENDA---------------------------------
               var opcionesform = { 
                  beforeSubmit: function(){
                     $(".validacion").removeClass("is-invalid border-danger");
                     $("#modal_nueva_agenda_sede_tabla").removeClass("table-danger");
                     $.LoadingOverlay("show");
                  }, //before

                  success: function(datos){
                     $("#modal_nueva_agenda_sede_alertas").empty();
                     var alerta='';
                     if(datos.validacion=="ERROR"){
                        $.LoadingOverlay("hide");
                        if(datos.errores.fecha_inicio!=""){
                           $("#modal_nueva_agenda_sede_fecha_inicio").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.fecha_inicio!=""
                        if(datos.errores.sede_id!=""){
                           $("#modal_nueva_agenda_sede_sede_id").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.sede_id!=""
                        if(datos.errores.profesional_id!=""){
                           $("#modal_nueva_agenda_sede_sede_id").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.profesional_id!=""
                        if(datos.errores.fecha_fin!=""){
                           $("#modal_nueva_agenda_sede_fecha_fin").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.fecha_fin!=""

                        $("#modal_nueva_agenda_sede_alertas").append(alerta);

                        if(datos.errores.fecha_fin=="FECHA_POSTERIOR"){
                           $.LoadingOverlay("hide");
                           $("#modal_nueva_agenda_sede_fecha_fin").addClass("table-danger");
                           alerta='<div class="alert alert-danger" role="alert">La fecha de fin no debe ser anterior a la fecha actual</div>';
                           $("#modal_nueva_agenda_sede_alertas").append(alerta);
                        }//if(datos.fechas=="ERROR")

                        if(datos.errores.fecha_inicio=="FECHA_POSTERIOR"){
                           $.LoadingOverlay("hide");
                           $("#modal_nueva_agenda_sede_fecha_inicio").addClass("table-danger");
                           alerta='<div class="alert alert-danger" role="alert">La fecha de inicio no debe ser anterior a la fecha actual</div>';
                           $("#modal_nueva_agenda_sede_alertas").append(alerta);
                        }//if(datos.fechas=="ERROR")

                     }//if datos.validacion=="ERROR"

                     if(datos.validacion_horarios=="ERROR"){
                        $.LoadingOverlay("hide");
                        $("#modal_nueva_agenda_sede_tabla").addClass("table-danger");
                        alerta='<div class="alert alert-danger" role="alert">Debe agregar algún horario</div>';
                        $("#modal_nueva_agenda_sede_alertas").append(alerta);
                     }//if(datos.validacion=="HORARIOS")

                     if(datos.fechas=="ERROR"){
                        $.LoadingOverlay("hide");
                        $("#modal_nueva_agenda_sede_fecha_fin").addClass("table-danger");
                        alerta='<div class="alert alert-danger" role="alert">La fecha de fin no debe ser anterior a la fecha de inicio</div>';
                        $("#modal_nueva_agenda_sede_alertas").append(alerta);
                     }//if(datos.fechas=="ERROR")

                     if(datos.solapamiento=="ERROR"){
                        $.LoadingOverlay("hide");
                        alerta='<div class="alert alert-danger" role="alert">El horario que quiere crear se solapa con otro horario.';
                        alerta+='<br>Si está intentando crear una agenda esta no puede solaparse con otra agenda pero si puede solaparse con una excepción.'
                        alerta+='<br>Si está intentando crear una excepción esta no puede solaparse con otra excepción pero si puede solaparse con una agenda.'
                        alerta+='<br>Porfavor revise los datos ingresados y vuelva a intentarlo.'
                        alerta+='</div>'
                        $("#modal_nueva_agenda_sede_alertas").append(alerta);
                     }//if(datos.validacion=="HORARIOS")

                     if(datos.validacion=="CORRECTO" && datos.validacion_horarios=="CORRECTO"){
                        $("#modal_nueva_agenda_sede").modal("hide");
                        if(datos.tipo_agenda=="excepcion" || datos.tipo_agenda=="no trabaja"){
									console.log("​datos.agenda", datos.agenda);
                           $.ajax({
                              url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agenda");?>',
                              data : {"eventos_agenda_id" : datos.agenda},
                              type : 'POST',
                              dataType : 'json',
                              async : false,
                              success : function(datos_agenda) {
                                 $.LoadingOverlay("hide");
                                    //---------------------REVISO LOS TURNOS QUE QUEDAN FUERA DE LA FECHA DE FIN DE LA AGENDA---------------------------
                                    var usuario_id=datos_agenda.agenda[0].usuario_id;
												console.log("​usuario_id", usuario_id);
                                    var fecha_inicio_formulario=datos_agenda.agenda[0].fecha_inicio;
												console.log("​fecha_inicio_formulario", fecha_inicio_formulario);
                                    var fecha_fin_formulario=datos_agenda.agenda[0].fecha_fin;//fecha a enviar
												console.log("​fecha_fin_formulario", fecha_fin_formulario);
                                    //compruebo si la agenda está en curso

                                    $.ajax({
                                       url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_turnos_agenda");?>',
                                       data : {'fecha_inicio_formulario':fecha_inicio_formulario, 
                                             'fecha_fin_formulario':fecha_fin_formulario, 
                                             'usuario_id':usuario_id
                                             },                          
                                       type : 'POST',
                                       dataType : 'json',
                                       async : false,
                                       success : function(datos_reprogramacion) {
														console.log("​datos_reprogramacion", datos_reprogramacion);
                                          var cont_check=0;
                                          var datos_tabla="";
                                          if(datos_reprogramacion.turnos.length!=0){
                                             datos_reprogramacion.turnos.forEach(function(d2){
                                                var turno=true;
                                                if(turno){
                                                   datos_tabla+="<tr>";
                                                   datos_tabla+="<td><div class='form-group form-check'><input type='checkbox' class='form-check-input check_td' checked name='check_"+cont_check+"' value='"+d2.turno_id+"'></div></td>";
                                                   datos_tabla+="<td>"+d2.fecha_formateada+"</td>";
                                                   datos_tabla+="<td>"+d2.paciente+"</td>";
                                                   datos_tabla+="</tr>";
                                                   cont_check++;
                                                }// if turno
                                             })//forEach datos_reprogramacion.turnos1
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
                                             var val="<?php echo site_url("agendadeeventos/Agenda_sede_contr/reprogramar_turnos"); ?>";
                                             val+='?cont_check='+cont_check;
                                             $("#modal_turnos_a_reprogramar_form").prop('action' , val);
                                             $("#modal_turnos_a_reprogramar_form").trigger("reset");
                                             $("#modal_turnos_a_reprogramar_header").css("background-color", "#005eff");
                                             $("#modal_turnos_a_reprogramar_header").css("color", "white" );
                                             $("#modal_turnos_a_reprogramar_titulo").text("Turnos a reprogramar");
                                             $("#modal_turnos_a_reprogramar").modal("show");
                                          }else{//if turnos1.length
                                             $("#modal_informacion_body").empty();
                                             $("#modal_informacion_boton").text("Aceptar");
                                             $("#modal_informacion_header").addClass("bg-warning");
                                             $("#modal_informacion_header").css("color", "red" );
                                             $("#modal_informacion_title").text("¡¡ATENCIÓN!!");
                                             $("#modal_informacion_body").html("<p>No hay turnos para reprogramar.</p>");
                                             $("#modal_informacion_cancelar").hide();
                                             $("#modal_informacion_boton").show();
                                             $("#modal_informacion").modal("show");
                                          }//else if turnos1.length
                                       }//success reprogramar turnos
                                    })//ajax reprogramar turnos 
                                                
                                    //--------------FORMULARIO NUEVO HORARIO---------------------------------
                                    var opcionesform = { 
                                       beforeSubmit: function(){
                                          $.LoadingOverlay("show");
                                       }, //before
                                       success: function(datos){
                                          $("#modal_turnos_a_reprogramar").modal("hide");
                                          $.LoadingOverlay("hide");
                                       },  //success   
                                       dataType:  'json'
                                    };//var
                                    $('#modal_turnos_a_reprogramar').ajaxForm(opcionesform); 
                                    //---------------------FIN FORMULARIO NUEVO HORARIO---------------------------
                              }//success ajax listar agenda
                           })//ajax listar agenda
                        }
                        recarga_tabla(url); //recarga la tabla
                        $.LoadingOverlay("hide");
                     }//datos.validacion=="CORRECTO"
                  
                  },  //success                     
                  
                  dataType:  'json'
               };//var
               $('#modal_nueva_agenda_sede').ajaxForm(opcionesform); 
            });//click btn nuevo horario
            //-------------------------FIN BOTON NUEVO HORARIO-----------------------------------

            // ----------------------BOTON DUPLICAR AGENDA-------------------------------------------
            $('#tabla1 tbody').on('click', '#btnduplicar', function () {
               //me posiciono al principio de la fila
               var datosdefila = $(this).closest("tr");
               //obtengo el id de la fila
               var eventos_agenda_id=datosdefila[0].id;
               //reseteo los colores de los campos
               $(".validacion").addClass("border-primary");          
               $(".validacion").removeClass("is-invalid border-danger");
               $("#modal_nueva_agenda_sede_tabla").removeClass("table-danger");
               $("#modal_nueva_agenda_sede_alertas").empty();


               //preparo el modal
               $("#modal_nueva_agenda_sede_form").trigger("reset");
               $("#modal_nueva_agenda_sede_header").css("background-color", "#005eff");
               $("#modal_nueva_agenda_sede_header").css("color", "white" );
               $("#modal_nueva_agenda_sede_titulo").text("Nuevo horario");
               $("#modal_nueva_agenda_sede .select").empty();
               $("#modal_nueva_agenda_sede_fecha_inicio").val(fecha_actual);
               //borro la tabla del modal
               $('#modal_nueva_agenda_sede_tabla tbody').remove();

               //comienzo con la carga de los datos del turno nuevo
               //cargo el profesional
               $.ajax({
                  url : "<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_profesionales");?>",
                  dataType : 'json',
                  async : false,
                  success : function(profesionales) {
                     var option = document.createElement("option");
                     option.text = "Elija una opcion...";
                     option.value= "";
                     $("#modal_nueva_agenda_sede_sede_id").append(option);
                     profesionales.forEach(function(e){
                        var option = document.createElement("option");
                        option.text = e.medico;
                        option.value= e.usuario_id;
                        $("#modal_nueva_agenda_sede_sede_id").append(option);
                     })//foreach profesionales
                  }//success
               })//ajax
               
               //CARGO LAS SEDES
               $.ajax({
                  url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_sedes");?>',
                  dataType : 'json',
                  async : false,
                  success : function(sedes) {
                     var option = document.createElement("option");
                     option.text = "Elija una opcion...";
                     option.value= "";
                     $("#modal_nueva_agenda_sede_sede_id").append(option);
                     sedes.sedes.forEach(function(e){
                        option = document.createElement("option");
                        option.text = e.sede;
                        option.value= e.sede_id;
                        $("#modal_nueva_agenda_sede_sede_id").append(option);
                        if(e.valor_por_defecto==2){
                           $("#modal_nueva_agenda_sede_sede_id option[value='"+e.sede_id+"']"). prop("selected",true);
                        }//if(e.valor_por_defecto==2)
                     })//foreach sedes
                  }//successs
               });//ajax sedes

               var cant_horarios = 0;
               var cant_filas = 0;

               var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
               val += "?cant_filas=" + cant_filas;
               $("#modal_nueva_agenda_sede_form").prop("action", val);

               var contenido_tabla = "<tbody><tr id='tr_modal_nueva_agenda_sede_agregar_horario_duplicar'><td class='text-primary' colspan='5'><button type='button' id='modal_nueva_agenda_sede_agregar_horario_duplicar' class='btn btn-primary btn-block'>Agregar horario</button></td></tr></tbody>";
               $("#modal_nueva_agenda_sede_tabla").append(contenido_tabla);

               //traigo los datos del agenda
               $.ajax({
                  url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agenda");?>',
                  data : {"eventos_agenda_id" : eventos_agenda_id},
                  type : 'POST',
                  dataType : 'json',
                  async : false,
                  success : function(datos) {
                     $("#modal_nueva_agenda_sede_sede_id option[value='"+datos.agenda[0].usuario_id+"']"). prop("selected",true);
                     $("#modal_nueva_agenda_sede_sede_id option[value='"+datos.agenda[0].sede_id+"']").prop("selected",true);
                     //campo excepcion
                     $("#modal_nueva_agenda_sede_excepcion option[value='"+datos.agenda[0].excepcion+"']").prop("selected",true);
                     //campo fecha fin
                     $("#modal_nueva_agenda_sede_nota").val(datos.agenda[0].nota);
                     
                     if(datos.agenda[0].excepcion=="SI"){
                        $("#modal_nueva_agenda_sede_excepcion").prop("checked", true);
                        $("#modal_nueva_agenda_sede_trabaja").prop("disabled", false);
                        if(datos.agenda[0].trabaja=="SI"){
                           $("#modal_nueva_agenda_sede_trabaja").prop("checked", false);
                           $('#modal_nueva_agenda_sede_horario_label').show();
                           $("#modal_nueva_agenda_sede_tabla").show();                           
                        }else{//if trabaja==SI
                           $('.fila_horario').remove();
                           $('#modal_nueva_agenda_sede_horario_label').hide();
                           $("#modal_nueva_agenda_sede_tabla").hide();
                           $("#modal_nueva_agenda_sede_trabaja").prop("checked", true);
                           cant_horarios=0;
                           cant_filas=0;
                           // Actualizar la acción del formulario
                           var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                           val += "?cant_filas=" + cant_filas;
                           val += "&cant_horarios=" + cant_horarios;
                           $("#modal_nueva_agenda_sede_form").prop("action", val);
                        }//else if trabaja==SI
                     }else{//if excepcion==SI
                        $("#modal_nueva_agenda_sede_excepcion").prop("checked", false);
                        $("#modal_nueva_agenda_sede_trabaja").prop("checked", false);
                        $("#modal_nueva_agenda_sede_trabaja").prop("disabled", true);
                        $('#modal_nueva_agenda_sede_horario_label').show();
                        $("#modal_nueva_agenda_sede_tabla").show();                           
                     }//else if excepcion==SI
                     
                     $.ajax({
                        url : '<?php echo site_url("agendadeeventos/agenda_sede_contr/listar_dias");?>',
                        type : 'POST',
                        dataType : 'json',
                        async : false,
                        success : function(dias) {
                           //obtengo los horarios de los días
                           $.ajax({
                              url : '<?php echo site_url("agendadeeventos/agenda_sede_contr/listar_horario");?>',
                              data : {"eventos_agenda_id" : eventos_agenda_id, "orden" : "ASC"},
                              type : 'POST',
                              dataType : 'json',
                              async : false,
                              success : function(horarios) {
                                 horarios.horario.forEach(function(h){
                                    var contenido_tabla="<tr class='duplicado_fila_horario'>";
                                    //-----------construyo el select para que elija los días-----------
                                    contenido_tabla+="<td><select name='dia"+cant_horarios+"'>";
                                    contenido_tabla += "<option value='NADA'>Elija un dia...</option>";
                                    dias.dias.forEach(function(e){
                                       //comparo los días id con el día id que me traje para seleccionarlo
                                       if(h.dia_id==e.dia_id){
                                          contenido_tabla += "<option value='"+e.dia_id+"' selected>"+e.dia+"</option>";
                                       }else{
                                          contenido_tabla += "<option value='"+e.dia_id+"'>"+e.dia+"</option>";
                                       }
                                    });//foreach
                                    
                                    contenido_tabla += "</select></td>";
                                    //------------fin select de los días------------------------
                                    contenido_tabla +='<td><input type="time" name="hora_inicio'+cant_horarios+'" value="'+h.hora_inicio+'" required></td>';
                                    contenido_tabla +='<td><input type="time" name="hora_fin'+cant_horarios+'" value="'+h.hora_fin+'" required></td>';
                                    contenido_tabla +='<td><input type="text" name="duracion'+cant_horarios+'" value="'+h.duracion+'" required></td>';
                                    contenido_tabla += "<td><button title='Borrar horario' type='button' class='btn btn-danger eliminahorario_duplicar'><i class='bi bi-trash'></i></button>";
                                    contenido_tabla += "<button title='Duplicar horario' type='button' class='btn btn-warning duplicahorario_duplicar'><i class='bi bi-files'></i></button></td>";
                                    contenido_tabla +="</tr>";
                                    //$("#modal_nueva_agenda_sede_tabla tbody").append(contenido_tabla);
                                    $("#tr_modal_nueva_agenda_sede_agregar_horario_duplicar").before(contenido_tabla);
                                    cant_filas++;
                                    cant_horarios++;
                                    var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                                    val += "?cant_filas=" + cant_filas;
                                    val += "&cant_horarios=" + cant_horarios;
                                    $("#modal_nueva_agenda_sede_form").prop("action", val);
                                 }); // foreach horarios.horario
                              }//success listar horarios
                           })//ajax listar horarios
                        }//success
                     });//ajax listar dias
                  }//success
               });//ajax listar agenda

               $('#modal_nueva_agenda_sede').off('click', '#modal_nueva_agenda_sede_agregar_horario_duplicar').on("click", "#modal_nueva_agenda_sede_agregar_horario_duplicar", function(h) {
                  var contenido_tabla = "<tr class='duplicado_fila_horario'>";
                  $.ajax({
                     url: '<?php echo site_url("agendadeeventos/agenda_sede_contr/listar_dias"); ?>',
                     type: 'POST',
                     dataType: 'json',
                     async: false,
                     success: function(dias) {
                        
                        //-----------construyo el select para que elija los días-----------
                        contenido_tabla += "<td><select name='dia" + cant_horarios + "' required>";
                        contenido_tabla += "<option value=''>Elija un dia...</option>";
                        dias.dias.forEach(function(e) {
                        contenido_tabla += "<option value='" + e.dia_id + "'>" + e.dia + "</option>";
                        }); //foreach
                        contenido_tabla += "</select></td>";
                     } //success ajax agendadeeventos/agenda_sede_contr/listar_dias
                  }); //ajax agendadeeventos/agenda_sede_contr/listar_dias
                  //------------fin select de los días------------------------

                  contenido_tabla += '<td><input type="time" name="hora_inicio' + cant_horarios + '" required></td>';
                  contenido_tabla += '<td><input type="time" name="hora_fin' + cant_horarios + '" required></td>';
                  contenido_tabla += '<td><input type="text" name="duracion' + cant_horarios + '" required></td>';
                  contenido_tabla += "<td><button title='Borrar horario' type='button' class='btn btn-danger eliminahorario_duplicar'><i class='bi bi-trash'></i></button>";
                  contenido_tabla += "<button title='Duplicar horario' type='button' class='btn btn-warning duplicahorario_duplicar'><i class='bi bi-files'></i></button></td>";
                  contenido_tabla += "</tr>";
                  $("#tr_modal_nueva_agenda_sede_agregar_horario_duplicar").before(contenido_tabla);
                  cant_horarios++;
                  cant_filas++;
                  var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                  val += "?cant_filas=" + cant_filas;
                  val += "&cant_horarios=" + cant_horarios;
                  $("#modal_nueva_agenda_sede_form").prop("action", val);

               }); //click modal_nueva_agenda_sede_agregar_horario_duplicar

               $("#modal_nueva_agenda_sede").off("click", ".eliminahorario_duplicar").on("click", ".eliminahorario_duplicar", function() {
                  //me posiciono al principio de la fila
                  var datosdefila = $(this).closest("tr").remove();
                  cant_filas--;
                  var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                  val += "?cant_filas=" + cant_filas;
                  val += "&cant_horarios=" + cant_horarios;
                  $("#modal_nueva_agenda_sede_form").prop("action", val);
               }); //click

               $("#modal_nueva_agenda_sede").off("click", ".duplicahorario_duplicar").on("click", ".duplicahorario_duplicar", function(d) {
                  cant_filas++;
                  var $filaActual = $(this).closest('tr'); // Obtener la fila actual
                  var $nuevaFila = $filaActual.clone(); // Clonar la fila actual

                  // Modificar el atributo name de los elementos clonados
                  $nuevaFila.find('input, select').each(function() {
                     var name = $(this).attr('name');
                     var newName = name.substring(0, name.length - 1) + cant_horarios; // Cambiar el último dígito por el valor de cant_horarios
                     $(this).attr('name', newName);
                  });

                  $("#tr_modal_nueva_agenda_sede_agregar_horario_duplicar").before($nuevaFila); // Insertar la nueva fila después de la fila actual

                  // Actualizar el contador de horarios
                  cant_horarios++;

                  // Actualizar la acción del formulario
                  var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                  val += "?cant_filas=" + cant_filas;
                  val += "&cant_horarios=" + cant_horarios;
                  $("#modal_nueva_agenda_sede_form").prop("action", val);
               });//on click .duplicahorario_duplicar

               $("#modal_nueva_agenda_sede_excepcion").change(function () {
                  $("#modal_nueva_agenda_sede_tabla").show();                  
                  if ($('#modal_nueva_agenda_sede_excepcion').is(":checked")) {
                     $("#modal_nueva_agenda_sede_trabaja").prop("disabled", false);
                  } else {
                     $("#modal_nueva_agenda_sede_trabaja").prop("disabled", true);
                     $('#modal_nueva_agenda_sede_trabaja').prop("checked", false);
                  }//$('#modal_nueva_agenda_sede_excepcion').is(":checked")
               });//change #modal_nueva_agenda_sede_excepcion

               $("#modal_nueva_agenda_sede_trabaja").change(function(){
                  if($('#modal_nueva_agenda_sede_trabaja').is(":checked")){
                     $('.duplicado_fila_horario').remove();
                     cant_horarios=0;
                     cant_filas=0;
                     // Actualizar la acción del formulario
                     var val = "<?php echo site_url('agendadeeventos/agenda_sede_contr/nueva_agenda'); ?>";
                     val += "?cant_filas=" + cant_filas;
                     val += "&cant_horarios=" + cant_horarios;
                     $("#modal_nueva_agenda_sede_form").prop("action", val);
                     $('#modal_nueva_agenda_sede_horario_label').hide();
                     $("#modal_nueva_agenda_sede_tabla").hide();                        
                  }else{
                     $('#modal_nueva_agenda_sede_horario_label').show();
                     $("#modal_nueva_agenda_sede_tabla").show();                        
                     //$("#modal_nueva_agenda_sede_tabla").removeClass("d-none");                        
                  }//if trabaja checked
               })//click en todo el dia

               //muestro el modal
               $("#modal_nueva_agenda_sede").modal("show");
               //--------------FORMULARIO NUEVA AGENDA---------------------------------
               var opcionesform = { 
                  beforeSubmit: function(){
                     $(".validacion").removeClass("is-invalid border-danger");
                     $("#modal_nueva_agenda_sede_tabla").removeClass("table-danger");
                     $.LoadingOverlay("show");
                  }, //before

                  success: function(datos){
                     $("#modal_nueva_agenda_sede_alertas").empty();
                     var alerta='';
                     if(datos.validacion=="ERROR"){
                        $.LoadingOverlay("hide");
                        if(datos.errores.fecha_inicio!=""){
                           $("#modal_nueva_agenda_sede_fecha_inicio").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.fecha_inicio!=""
                        if(datos.errores.sede_id!=""){
                           $("#modal_nueva_agenda_sede_sede_id").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.sede_id!=""
                        if(datos.errores.profesional_id!=""){
                           $("#modal_nueva_agenda_sede_sede_id").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.profesional_id!=""
                        if(datos.errores.fecha_fin!=""){
                           $("#modal_nueva_agenda_sede_fecha_fin").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.fecha_fin!=""

                        $("#modal_nueva_agenda_sede_alertas").append(alerta);

                        if(datos.errores.fecha_fin=="FECHA_POSTERIOR"){
                           $.LoadingOverlay("hide");
                           $("#modal_nueva_agenda_sede_fecha_fin").addClass("table-danger");
                           alerta='<div class="alert alert-danger" role="alert">La fecha de fin no debe ser anterior a la fecha actual</div>';
                           $("#modal_nueva_agenda_sede_alertas").append(alerta);
                        }//if(datos.fechas=="ERROR")

                        if(datos.errores.fecha_inicio=="FECHA_POSTERIOR"){
                           $.LoadingOverlay("hide");
                           $("#modal_nueva_agenda_sede_fecha_inicio").addClass("table-danger");
                           alerta='<div class="alert alert-danger" role="alert">La fecha de inicio no debe ser anterior a la fecha actual</div>';
                           $("#modal_nueva_agenda_sede_alertas").append(alerta);
                        }//if(datos.fechas=="ERROR")
                     }//if datos.validacion=="ERROR"

                     if(datos.validacion_horarios=="ERROR"){
                        $.LoadingOverlay("hide");
                        $("#modal_nueva_agenda_sede_tabla").addClass("table-danger");
                        alerta='<div class="alert alert-danger" role="alert">Debe agregar algún horario</div>';
                        $("#modal_nueva_agenda_sede_alertas").append(alerta);
                     }//if(datos.validacion=="HORARIOS")

                     if(datos.fechas=="ERROR"){
                        $.LoadingOverlay("hide");
                        $("#modal_nueva_agenda_sede_fecha_fin").addClass("table-danger");
                        alerta='<div class="alert alert-danger" role="alert">La fecha de fin no debe ser anterior a la fecha de inicio</div>';
                        $("#modal_nueva_agenda_sede_alertas").append(alerta);
                     }//if(datos.fechas=="ERROR")

                     if(datos.solapamiento=="ERROR"){
                        $.LoadingOverlay("hide");
                        alerta='<div class="alert alert-danger" role="alert">El horario que quiere crear se solapa con otro horario.';
                        alerta+='<br>Si está intentando crear una agenda esta no puede solaparse con otra agenda pero si puede solaparse con una excepción.'
                        alerta+='<br>Si está intentando crear una excepción esta no puede solaparse con otra excepción pero si puede solaparse con una agenda.'
                        alerta+='<br>Porfavor revise los datos ingresados y vuelva a intentarlo.'
                        alerta+='</div>'
                        $("#modal_nueva_agenda_sede_alertas").append(alerta);
                     }//if(datos.validacion=="HORARIOS")

                     if(datos.validacion=="CORRECTO" && datos.validacion_horarios=="CORRECTO"){
                        $("#modal_nueva_agenda_sede").modal("hide");
                        recarga_tabla(url); //recarga la tabla
                        $.LoadingOverlay("hide");
                     }//datos.validacion=="CORRECTO"
                  
                  },  //success                     
                  
                  dataType:  'json'
               };//var
               $('#modal_nueva_agenda_sede').ajaxForm(opcionesform); 
            })//onclick btnduplicar
            
            // ----------------------BOTON DETALLE AGENDA-------------------------------------------
            $('#tabla1 tbody').on('click', '#mas', function () {
               //me posiciono al principio de la fila
               var datosdefila = $(this).closest("tr");
               //obtengo el id de la fila
               var eventos_agenda_id=datosdefila[0].id;     
               //traigo los datos del agenda
               $.ajax({
                  url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agenda");?>',
                  data : {"eventos_agenda_id" : eventos_agenda_id},
                  type : 'POST',
                  dataType : 'json',
                  async : false,
                  success : function(datos) {
                     //comienzo a completar el formulario para que el usuario pueda verificar los datos del agenda
                     //elimino las filas de la tabla por si se había consultado antes algún otro turno
                     $('#modal_detalle_agenda_sede_tabla tr').remove();
                     //armo el modal con los datos obtenidos
                     //$("#modal_detalle_agenda_sede_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Médico:</th><td colspan='2'>"+datos.agenda[0].medico+"</td></tr>");
                     $("#modal_detalle_agenda_sede_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Sede:</th><td colspan='2'>"+datos.agenda[0].sede+"</td></tr>");
                     if(datos.agenda[0].fecha==null){
                        $("#modal_detalle_agenda_sede_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Fecha:</th><td colspan='2'>&nbsp;</td></tr>");
                     }else{
                        $("#modal_detalle_agenda_sede_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Fecha:</th><td colspan='2'>"+datos.agenda[0].fecha+"</td></tr>");
                     }
                     $("#modal_detalle_agenda_sede_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Excepción:</th><td colspan='2'>"+datos.agenda[0].excepcion+"</td></tr>");
                     if(datos.agenda[0].fecha==null){
                        $("#modal_detalle_agenda_sede_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Nota:</th><td colspan='2'>&nbsp;</td></tr>");
                     }else{
                        $("#modal_detalle_agenda_sede_tabla tbody").append("<tr><th class='text-primary' colspan='2'>Nota:</th><td colspan='2'>"+datos.agenda[0].nota+"</td></tr>");
                     }
                  }//success
               });//ajax listar agenda
               
               //preparo los encabezados de la tabla que va a mostrar los tratamientos y los equipos para agregarla al modal
               var $titulo_horario="<tr class='table-primary'>";
               $titulo_horario+="<th class='text-primary'>Día</th>";
               $titulo_horario+="<th class='text-primary' colspan='2'>Horario</th>";
               $titulo_horario+="<th class='text-primary'>Duración</th>";
               $titulo_horario+="</tr>";
               //pongo la cabecera en la tabla
               $("#modal_detalle_agenda_sede_tabla tbody").append($titulo_horario);
               $.ajax({
                  url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_horario");?>',
                  data : {"eventos_agenda_id" : eventos_agenda_id, "orden" : "ASC"},
                  type : 'POST',
                  dataType : 'json',
                  async : false,
                  success : function(datos) {
                     //recorro los datos de los tratamientos y armo las celdas
                     datos.horario.forEach(function(t){
                        var td_horarios="<tr>";                              
                        td_horarios+="<td>"+t.dia+"</td>";
                        td_horarios+="<td colspan='2'>"+t.horario+"</td>";
                        td_horarios+="<td>"+t.duracion+"</td>";
                        td_horarios+="</tr>";
                        $("#modal_detalle_agenda_sede_tabla tbody").append(td_horarios);
                     });//foreach tratamientos
                  }//success
               });//ajax listar hirario
               //preparo el modal
               $("#modal_detalle_agenda_sede_header").css("background-color", "#005eff");
               $("#modal_detalle_agenda_sede_header").css("color", "white" );
               $("#modal_detalle_agenda_sede_title").text("Datos de agenda");
               $('#modal_detalle_agenda_sede').modal('show');  
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

            //INSERTAMOS EN EL SELECT DE SEDES TODOS LOS OPTIONS SEGÚN LOS DATOS DE LA DB
            $.get("<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_sedes");?>",function(datos){
               //datos tiene lo que pedi del otro lado y sede_id es lo q recorre tipo foreach as ....
               datos.sedes.forEach(function(sede_id){
                  var selectsede = document.getElementById("selectsede");
                  var option = document.createElement("option");
                  option.text = sede_id.sede;
                  option.value= sede_id.sede_id;
                  selectsede.add(option);
               })
               //ESTO ME SELECCIONA AUTOMATICAMENTE EL SELECT DE LA SEDE_ID
               $("#selectsede option[value='1']"). prop("selected",true);
            },"json");//get

            // Capturo el click en el profesional, reenvio los parámetros y deshabilito el que selecciono
            //y habilito el que tenía antes seleccionado 
            $('#selectsede').click(function() {
               if(this.value!=selectsedeanterior){
                  opselect.usuario_medico_id = this.value;
                  table.ajax.url( url ).load();
                  selectsedeanterior=this.value;
               }//if this.value
            });//$('#selectsede')

            //--------------------BOTON DESACTIVAR--------------------------
            $('#tabla1 tbody').on("click", "#btndesactivar", function(){
               //me posiciono al principio de la fila
               var datosdefila = $(this).closest("tr");
               //obtengo el id de la fila
               var eventos_agenda_id=datosdefila[0].id;

               $.ajax({
                  url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agenda");?>',
                  data : {"eventos_agenda_id" : eventos_agenda_id},
                  type : 'POST',
                  dataType : 'json',
                  async : false,
                  success : function(datos_agenda) {
                     var usuario_id=datos_agenda.agenda[0].usuario_id;//medico de la agenda
                     var fecha_inicio=moment(datos_agenda.agenda[0].fecha_inicio, "YYYY-MM-DD", true);//fecha de inicio de la agenda
                     var fecha_fin= moment(datos_agenda.agenda[0].fecha_fin, "YYYY-MM-DD", true);//fecha de fin de la agenda
                     var fecha_inicio_formulario=null;//fecha de inicio que voy a mandar a la accion
                     var fecha_fin_formulario=null;//fecha de fin que voy a mandar a la accion
                     var condicion=true;
                     //establezco las condiciones
                     if(datos_agenda.agenda[0].fecha_fin!=null){
                        condicion=moment(fecha_actual, "YYYY-MM-DD", true).isBetween(fecha_inicio,fecha_fin, undefined, '[]');
                     }else{//if fecha_fin!=null
                        condicion=moment(fecha_actual, "YYYY-MM-DD", true).isAfter(fecha_inicio);
                     }//else if fecha_fin!=null

                     //analizo si la agenda está en curso
                     $("#modal_informacion_body").empty();
                     if(condicion){
                        $("#modal_informacion_header").addClass("bg-warning");
                        $("#modal_informacion_header").css("color", "red" );
                        $("#modal_informacion_title").text("¡¡ATENCIÓN!!");
                        $("#modal_informacion_body").html("<p>No se puede desactivar una agenda en curso, debe cerrar o cambiar la fecha de cierre de la agenda.</p>");
                        $("#modal_informacion_boton").show();
                        $("#modal_informacion_boton").text("Aceptar");
                        $("#modal_informacion_cancelar").hide();
                        $("#modal_informacion").modal("show");
                     }else{
                        $("#modal_informacion_header").addClass("bg-warning");
                        $("#modal_informacion_header").css("color", "red" );
                        $("#modal_informacion_title").text("¡¡ATENCIÓN!!");
                        $("#modal_informacion_body").html("<p>Esta acción no se puede revertir</p><p>¿Desea continuar?</p>");
                        $("#modal_informacion_boton").show();
                        $("#modal_informacion_boton").text("Aceptar");
                        $("#modal_informacion_cancelar").show();
                        $("#modal_informacion").modal("show");

                        $('#modal_informacion_boton').click(function(){
                           $.LoadingOverlay("show");
                           $.get("<?php echo site_url("agendadeeventos/Agenda_sede_contr/estado");?>",{'eventos_agenda_id':eventos_agenda_id},function(datos){
                              $.LoadingOverlay("hide");
                              if(datos["estado_agenda"] && datos_agenda.agenda[0].estado_id!=4){
                                 $.LoadingOverlay("show");
                                 if(fecha_fin!=null){
                                    //compruebao si la agenda todavía no está activa
                                    if(moment(fecha_actual, "YYYY-MM-DD", true).isBefore(fecha_inicio)){
                                       fecha_inicio_formulario=fecha_inicio.format('YYYY-MM-DD');
                                       fecha_fin_formulario=fecha_fin.format('YYYY-MM-DD');
                                    }//if(moment(fecha_actual, "YYYY-MM-DD", true).isBefore(fecha_inicio))
                                 }else{//if fecha fin null
                                    if(moment(fecha_actual, "YYYY-MM-DD", true).isBefore(fecha_inicio)){
                                       fecha_inicio_formulario=fecha_inicio.format('YYYY-MM-DD');
                                    }
                                 }//if fecha_fin!=null

                                 $.ajax({
                                    url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agendas");?>',
                                    data : {'usuario_medico_id':usuario_id,
                                             'fecha':fecha_inicio_formulario},
                                    type : 'POST',
                                    dataType : 'json',
                                    async : false,
                                    success : function(agendas) {                                                
                                       $.ajax({
                                          url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_turnos_agenda");?>',
                                          data : {'fecha_inicio_formulario':fecha_inicio_formulario, 
                                                'fecha_fin_formulario':fecha_fin_formulario, 
                                                'usuario_id':usuario_id
                                                },                          
                                          type : 'POST',
                                          dataType : 'json',
                                          async : false,
                                          success : function(datos_reprogramacion) {
                                             var cont_check=0;
                                             var datos_tabla="";
                                             if(datos_reprogramacion.turnos.length!=0){
                                                datos_reprogramacion.turnos.forEach(function(d2){
                                                   var turno=true;
                                                   if(datos_agenda.agenda[0].estado_id==2){
                                                      agendas.forEach(function(ag){
                                                         var fecha_turno=moment(d2.fecha, "YYYY-MM-DD", true);
                                                         var fecha_inicio_agenda=moment(ag.fecha_inicio, "DD/MM/YYYY", true);
                                                         var fecha_fin_agenda=moment(ag.fecha_fin, "DD/MM/YYYY", true);
                                                         if((fecha_turno.isBetween(fecha_inicio_agenda,fecha_fin_agenda, undefined, '[]')) && ag.excepcion=="SI" && ag.trabaja=="SI"){
                                                            turno=false;
                                                         }//if fecha_turno.isBetween
                                                      })//for each agendas
                                                   }//if datos_agenda.
                                                   if(turno){
                                                      datos_tabla+="<tr>";
                                                      datos_tabla+="<td><div class='form-group form-check'><input type='checkbox' class='form-check-input check_td' checked name='check_"+cont_check+"' value='"+d2.turno_id+"'></div></td>";
                                                      datos_tabla+="<td>"+d2.fecha_formateada+"</td>";
                                                      datos_tabla+="<td>"+d2.paciente+"</td>";
                                                      datos_tabla+="</tr>";
                                                      cont_check++;
                                                   }// if turno
                                                })//forEach datos_reprogramacion.turnos1
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
                                                //preparo el modal
                                                var val="<?php echo site_url("agendadeeventos/Agenda_sede_contr/reprogramar_turnos"); ?>";
                                                val+='?cont_check='+cont_check;
                                                $("#modal_turnos_a_reprogramar_form").prop('action' , val);
                                                $("#modal_turnos_a_reprogramar_form").trigger("reset");
                                                $("#modal_turnos_a_reprogramar_header").css("background-color", "#005eff");
                                                $("#modal_turnos_a_reprogramar_header").css("color", "white" );
                                                $("#modal_turnos_a_reprogramar_titulo").text("Turnos a reprogramar");
                                                $("#modal_turnos_a_reprogramar").modal("show");
                                             }else{//if turnos1.length
                                                $("#modal_informacion_body").empty();
                                                $("#modal_informacion_boton").text("Aceptar");
                                                $("#modal_informacion_header").addClass("bg-warning");
                                                $("#modal_informacion_header").css("color", "red" );
                                                $("#modal_informacion_title").text("¡¡ATENCIÓN!!");
                                                $("#modal_informacion_body").html("<p>No hay turnos para reprogramar.</p>");
                                                $("#modal_informacion_cancelar").hide();
                                                $("#modal_informacion_boton").show();
                                                $("#modal_informacion").modal("show");
                                             }//else if turnos1.length
                                          }//success reprogramar turnos
                                       })//ajax reprogramar turnos 
                                    }//success ajax listar agendas
                                 })//ajax listar agendas
                                 
                                 $.LoadingOverlay("hide");
                                             
                                 //--------------FORMULARIO NUEVO HORARIO---------------------------------
                                 var opcionesform = { 
                                    beforeSubmit: function(){
                                       $.LoadingOverlay("show");
                                    }, //before
                                    success: function(datos){
                                       $("#modal_turnos_a_reprogramar").modal("hide");
                                       recarga_tabla(url);
                                       $.LoadingOverlay("hide");
                                    },  //success   
                                    dataType:  'json'
                                 };//var
                                 $('#modal_turnos_a_reprogramar').ajaxForm(opcionesform); 
                                 //---------------------FIN FORMULARIO NUEVO HORARIO---------------------------
                              }//if datos["estado_agenda"]
                              else{
                                 recarga_tabla(url);
                                 $.LoadingOverlay("hide");
                              }
                           }, "json")//get listar agenda
                        });//click modal informacion
                     }//else if condicion
                  }//success ajax listar_agenda
               })//ajax listar_agenda
            });//click desactivar medicos_agenda
            //---------------------FIN BOTON DESACTIVAR----------------------------------

            //--------------------BOTON CERRAR AGENDA--------------------------
            $('#tabla1 tbody').on("click", "#btncerraragenda", function(){
               $(".validacion").removeClass("is-invalid border-danger");
               $(".validacion").addClass("border-primary");
               //me posiciono al principio de la fila
               var datosdefila = $(this).closest("tr");
               //obtengo el id de la fila
               var agenda_id=datosdefila[0].id;
               var final_original_agenda;
               $.ajax({
                  url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agenda");?>',
                  data : {"eventos_agenda_id" : agenda_id},
                  type : 'POST',
                  dataType : 'json',
                  async : false,
                  success : function(datos_agenda) {
                     final_original_agenda=datos_agenda.agenda[0].fecha_fin;
                  }//success ajax listar agenda
               })//ajax listar agenda

               $("#modal_cerrar_agenda_form").trigger("reset");
               $("#modal_cerrar_agenda_header").css("background-color", "#005eff");
               $("#modal_cerrar_agenda_header").css("color", "white" );
               $("#modal_cerrar_agenda_titulo").text("Cerrar agenda");
               var val="<?php echo site_url("agendadeeventos/Agenda_sede_contr/cerrar_agenda"); ?>";
               val+="?agenda_id="+agenda_id;
               $("#modal_cerrar_agenda_form").prop("action", val);
               $('#modal_cerrar_agenda').modal('show');

               //--------------FORMULARIO NUEVO HORARIO---------------------------------
               var opcionesform = { 
                  beforeSubmit: function(){
                     $(".validacion").removeClass("is-invalid border-danger");
                     $.LoadingOverlay("show");
                  }, //before
                  success: function(datos){
                     $(".alert").remove();
                     if(datos.validacion=="ERROR"){
                        $.LoadingOverlay("hide");
                        var alerta='';              
                        if(datos.errores.fecha_fin!=""){
                           $("#modal_cerrar_agenda_fecha_fin").addClass("is-invalid border-danger");
                           alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                        }//datos.errores.fecha_fin!=""
                        
                        $("#modal_cerrar_agenda_alertas").append(alerta);
                     }//if datos.validacion== error

                     if(datos.validacion=="CORRECTO"){
                        recarga_tabla(url);
                        $("#modal_cerrar_agenda").modal("hide");
                        $.ajax({
                           url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agenda");?>',
                           data : {"eventos_agenda_id" : agenda_id},
                           type : 'POST',
                           dataType : 'json',
                           async : false,
                           success : function(datos_agenda) {
                              $.LoadingOverlay("hide");
                              if(datos_agenda.agenda[0].estado_id!=4){                        
                                 //---------------------REVISO LOS TURNOS QUE QUEDAN FUERA DE LA FECHA DE FIN DE LA AGENDA---------------------------
                                 var usuario_id=datos_agenda.agenda[0].usuario_id;
                                 var fecha_inicio_formulario=datos_agenda.agenda[0].fecha_fin;
                                 var fecha_fin_formulario=final_original_agenda;//fecha a enviar
                                 //compruebo si la agenda está en curso

                                 $.ajax({
                                    url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_agendas");?>',
                                    data : {'usuario_medico_id':usuario_id,
                                             'fecha':fecha_inicio_formulario},
                                    type : 'POST',
                                    dataType : 'json',
                                    async : false,
                                    success : function(agendas) {                                                
                                       $.ajax({
                                          url : '<?php echo site_url("agendadeeventos/Agenda_sede_contr/listar_turnos_agenda");?>',
                                          data : {'fecha_inicio_formulario':fecha_inicio_formulario, 
                                                'fecha_fin_formulario':fecha_fin_formulario, 
                                                'usuario_id':usuario_id
                                                },                          
                                          type : 'POST',
                                          dataType : 'json',
                                          async : false,
                                          success : function(datos_reprogramacion) {
                                             var cont_check=0;
                                             var datos_tabla="";
                                             if(datos_reprogramacion.turnos.length!=0){
                                                datos_reprogramacion.turnos.forEach(function(d2){
                                                   var turno=true;
                                                   if(datos_agenda.agenda[0].estado_id==2){
                                                      agendas.forEach(function(ag){
                                                         var fecha_turno=moment(d2.fecha, "YYYY-MM-DD", true);
                                                         var fecha_inicio_agenda=moment(ag.fecha_inicio, "DD/MM/YYYY", true);
                                                         var fecha_fin_agenda=moment(ag.fecha_fin, "DD/MM/YYYY", true);
                                                         if((fecha_turno.isBetween(fecha_inicio_agenda,fecha_fin_agenda, undefined, '[]')) && ag.excepcion=="SI" && ag.trabaja=="SI"){
                                                            turno=false;
                                                         }//if fecha_turno.isBetween
                                                      })//for each agendas
                                                   }//if datos_agenda.
                                                   if(turno){
                                                      datos_tabla+="<tr>";
                                                      datos_tabla+="<td><div class='form-group form-check'><input type='checkbox' class='form-check-input check_td' checked name='check_"+cont_check+"' value='"+d2.turno_id+"'></div></td>";
                                                      datos_tabla+="<td>"+d2.fecha_formateada+"</td>";
                                                      datos_tabla+="<td>"+d2.paciente+"</td>";
                                                      datos_tabla+="</tr>";
                                                      cont_check++;
                                                   }// if turno
                                                })//forEach datos_reprogramacion.turnos1
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
                                             var val="<?php echo site_url("agendadeeventos/Agenda_sede_contr/reprogramar_turnos"); ?>";
                                             val+='?cont_check='+cont_check;
                                             $("#modal_turnos_a_reprogramar_form").prop('action' , val);
                                          }//success reprogramar turnos
                                       })//ajax reprogramar turnos 
                                    }//success ajax listar agendas
                                 })//ajax listar agendas
                           
                                 $("#modal_turnos_a_reprogramar_form").trigger("reset");
                                 $("#modal_turnos_a_reprogramar_header").css("background-color", "#005eff");
                                 $("#modal_turnos_a_reprogramar_header").css("color", "white" );
                                 $("#modal_turnos_a_reprogramar_titulo").text("Turnos a reprogramar");
                                 $("#modal_turnos_a_reprogramar").modal("show");
                                             
                                 //--------------FORMULARIO NUEVO HORARIO---------------------------------
                                 var opcionesform = { 
                                    beforeSubmit: function(){
                                       $.LoadingOverlay("show");
                                    }, //before
                                    success: function(datos){
                                       $("#modal_turnos_a_reprogramar").modal("hide");
                                       $.LoadingOverlay("hide");
                                    },  //success   
                                    dataType:  'json'
                                 };//var
                                 $('#modal_turnos_a_reprogramar').ajaxForm(opcionesform); 
                                 //---------------------FIN FORMULARIO NUEVO HORARIO---------------------------
                              }//if datos_agenda.estado_id!=4
                              else{
                                 recarga_tabla(url);
                                 $.LoadingOverlay("hide");
                              }
                           }//success ajax listar agenda
                        })//ajax listar agenda
                     }//datos.validacion=="CORRECTO"
                  },//success                     
                  dataType:  'json'
               };//var
               $('#modal_cerrar_agenda').ajaxForm(opcionesform); 
               //---------------------FIN FORMULARIO NUEVO HORARIO---------------------------
               
            });//click btncerraragenda
            //---------------------FIN BOTON ACTIVAR----------------------------------
         }); //document ready
      </script>
   </body>
</html>