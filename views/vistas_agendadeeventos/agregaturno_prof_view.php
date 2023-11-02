
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
         
      <title>Agenda de turnos!!</title>

      <style>
         #turnos tfoot input{
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
         }
         #turnos tfoot {
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
               <h1>Turnos</h1>
            </div>
         </div>
         <br>    
         <div class="row">
         <div class="col-12">
            <div class="card text-center border-primary">
               <div class="card-header text-primary card-title"><h4>Filtros</h4></div>
                  <div class="card-body">
                     <div class="col-xl-2" id="div_fecha_mes" style="display:none">
                        <label for="fecha_mes" class="text-primary"><h5>Mes/Año</h5></label>
                        <input type="month" name="fecha_mes" id="fecha_mes" class="form-control border-primary">
                     </div>
                  </div> <!-- card-body -->
               </div> <!-- card-header -->
            </div> <!-- card text-center -->
         </div> <!-- col-12 -->
         </div> <!-- row -->
         <br>
         <div class="row">
            <div class="col-4">
               <button type="button" class="btn btn-lg btn-primary btn-block"  id="borrarfiltros">Restablecer filtros</button>
            </div><!--div col-4 -->
         </div><!--div row -->
         <br>
         <!-- ---------------------------Comienzo de tabla------------------------------------- --> 
         <div class="row">
            <div class="col-lg-12">
               <table class="table" class="display"  id="turnos" style="width:100%">
                  <thead class="thead-dark">
                     <tr>
                        <th scope="col">Id</th>
                        <th scope="col" data-priority="2">Fecha</th>
                        <th scope="col" data-priority="7">Estado</th>
                        <th scope="col" data-priority="3">Paciente</th>
                        <th scope="col" data-priority="8">Motivo</th>
                        <th scope="col" data-priority="6">Acciones</th>
                     </tr>
                  </thead>
                  <tfoot class="thead-dark">
                     <tr>
                        <th>Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Motivo</th>
                        <th scope="col">Acciones</th>
                     </tr>            
                  </tfoot>
                  <tbody class="table-striped">
                  </tbody>
               </table>
               <!-- Incluimos los modales -->
               <?php 
                  $this->load->view("vistas_modales/modal_detalle");
               ?>
            </div>
         </div>
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
            $('#turnos tfoot th').each( function () {
               var title = $(this).text();
               if ((title=="Acciones") || (title=="Ver mas")){
                  $(this).html(' ');
               }//if title acciones
               else{
                  $(this).html( '<input type="text" class="filtros" placeholder="Filtrar por '+title+'" /> ' );
               }//else if title acciones
            } ); //each

            //fecha en español
            moment.locale('es', {
               months: 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'.split('_'),
               monthsShort: 'Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.'.split('_'),
               weekdays: 'Domingo_Lunes_Martes_Miércoles_Jueves_Viernes_Sábado'.split('_'),
               weekdaysShort: 'Dom._Lun._Mar._Miér._Jue._Vier._Sáb.'.split('_'),
               weekdaysMin: 'Do_Lu_Ma_Mi_Ju_Vi_Sá'.split('_')
            });

            //VARIABLES-----------------------------------------------------
            //cambio
            echo "LLEGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
            var url = "<?php echo site_url ("agendadeturnos/Agendadeeventos_contr/listar_turnos");?>";
            var usuario_medico_id=<?php echo $_SESSION["usuario_id"]?>;
            var opselect={'opselect':'btndiario','fecha':moment().format('YYYY-MM-DD'), 'usuario_medico_id':usuario_medico_id};
            var datos=[];
            var carga_tabla=false;
            var botones="<div class='btn-group dropdown mr-5 mx-auto dropleft'><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>Acciones</button><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
            botones+="<button type='button' id='btnatendido' class='btn btn-success btn-block'><i class='bi bi-person-check'></i> Finalizar turno </botton>";
            botones+="<button type='button' id='btnenatencion' class='btn btn-warning btn-block'><i class='bi bi-person-heart'></i> Tomar turno </botton>";
            //botones+="<button type='button' id='btnhistoriaclinica' class='btn btn-primary btn-block'><i class='bi bi-person-lines-fill'></i> Ver HC </botton>";
            botones+="</div>";

            //establezco desde el principio el la fecha actual como la fecha de los turnos
            $("#fecha_dia").val(moment().format('YYYY-MM-DD'));
            $("#fecha_mes").val(moment().format("YYYY-MM"));
            $("#fecha_anio").val(moment().format("YYYY"));
            
            //FUNCIONES---------------------------------------------------------
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
            }

            $.LoadingOverlay("show");
            
            //---------------------------------datatables--------------------------------------------------
            var table = $('#turnos').DataTable( {
               //parametros---------------------------------------------------------------------------
               "fixedHeader": true, //Deja fijo el encabezado
               "responsive": {details: false},
               "deferRender": false, //dibuja la tabla a medida que se necesita
               "order": [ 1, "asc" ], //ordena según la columna fecha
               
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
                  {"data": "fecha_formateada"},
                  {"data": "estado"},
                  {"data": "paciente"},
                  {"data": "motivo"},
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
                  this.api().columns().every( function () {
                     var that = this;
                     let timeout;
                     $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        clearTimeout(timeout);
                        var valorbusqueda=this.value;
                        timeout = setTimeout(function() {
                           $.LoadingOverlay("show");
                           if ( that.search() !== valorbusqueda){
                              if (that.selector.cols==3){ 
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
                                 if (that.selector.cols==4){
                                    var inicio=moment(valorbusqueda, 'HH:mm').format('HH');
                                    var hora_moment=moment(valorbusqueda, 'HH:mm');
                                    valorbusqueda='^'+moment(valorbusqueda, 'HH:mm').format('HH')+'|';
                                    for(var i=inicio ; i<24 ; i++){
                                       valorbusqueda+="^"+hora_moment.add(1,'hours').format('HH')+"|";
                                    }
                                    valorbusqueda+='^'+hora_moment.add(1,'hours').format('HH');
                                    that.search( valorbusqueda, true, false).draw();
                                 }else{//if selector col 4
                                    if (that.selector.cols==5){
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
                  });//api
               },//init
         
               drawCallback: function () {  
                  $.LoadingOverlay("hide");
                  //-------Pinto las filas de color según su estado-------                      
                  this.api().rows().every( function () {
                     var turno_id=this.data().turno_id;
                     $("#"+turno_id).addClass(this.data().color);
                  })//this api
                  if(carga_tabla==true){
                     if(selectprof.value != "NADA" ){
                        selectprofactual=selectprof.value;               
                        datos=[];
                        //tomo los datos de las filas
                        var that=this.api();
                        cont=0;
                        duracion_turno_agenda=0;
                        that.rows().every( function () {
                           datos[cont]=this.data();
                           cont++;                          
                        });//that
                        var horarios= false;
                        var sede_id=11;
                        var cant_turn=false;
                        var agenda_medico="NADA";
                        if(opselect.opselect=="btnmensual"){
                           var mes=moment($("#fecha_mes").val(),"YYYY-MM");
                        }
                           
                        //verifico si la fecha actual está dentro del mes elegido para no crear turnos vacíos hacia atrás
                        //si es entonces le pongo la fecha actual y al final al incrementar no va a hacer el resto
                        if(moment(mes.format('YYYY-MM-DD')).isSameOrBefore(moment().format('YYYY-MM-DD'),"month")){
                           var fecha_analizando = moment();
                        }else{
                           var fecha_analizando = moment($("#fecha_mes").val(),"YYYY-MM");
                        }

                        var fin_while=0;
                        while(moment(mes.format('YYYY-MM-DD')).isSame(fecha_analizando.format('YYYY-MM-DD'),"month") && fin_while<=33){
                           fin_while++;
                           var existencia_turno=false;
                           //compruebo si hay turnos este día
                           $.each(datos,function(pos, d){
                              var auxiliar=moment(d.fecha,'DD/MM/YYYY').format('YYYY-MM-DD');//formateo la fecha para poder usarla en isSame
                              var auxiliar2=fecha_analizando.format('YYYY-MM-DD');
                              if(moment(auxiliar2).isSame(auxiliar)){//comparo si en los datos aparece la fecha actual
                                 existencia_turno=true;
                                 return false;
                              }//if(moment(fecha).isSame(auxiliar))
                           })//datos.forEach
                              
                           if(!existencia_turno){ //si hay alguna fecha del mes que no está
                              //compruebo si el profesional atiende este día
                              var fecha=fecha_analizando.format('YYYY-MM-DD');
                              var dia=fecha_analizando.format('dddd');
                              $.ajax({
                                 url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/agenda_medicos");?>',
                                 data : {"usuario_id":selectprofactual, 
                                          "dia":dia, 
                                          "sede_id":sede_id, 
                                          "fecha":fecha},
                                 type : 'GET',
                                 dataType : 'json',
                                 async : false,

                                 success : function(agenda) {
                                    agenda_medico=agenda.agenda;
                                    horarios=agenda.horarios;
                                 }//success
                              });//ajax
                                 
                              //-------compruebo si hay turnos--------
                              //posibles estados de horarios:
                              //true: hay una excepción con horarios o hay una agenda con horarios
                              //no_trabaja: es un feriado
                              //no_disponible: el médico no tiene horarios en la agenda para ese día
                              if(horarios==true){
                                 if(agenda_medico.length != 0){
                                    var hora_inicio_agenda_moment = moment(agenda_medico[0].hora_inicio, 'HH:mm:ss', true);
                                    var hora_fin_agenda_moment = moment(agenda_medico[0].hora_fin, 'HH:mm:ss', true);
                                    duracion_turno_agenda=agenda_medico[0].duracion;
                                    //veo cuanto tiempo tiene disponible entre turno y turno
                                    tiempo_disponible=hora_fin_agenda_moment.diff(hora_inicio_agenda_moment, 'minutes');
                                    //establezco la cantidad de turnos que puedo dar en este espacio libre
                                    cant_turn=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                    
                                    for(var i=1 ; i<=cant_turn; i++){
                                       var fecha_actual=moment(fecha,"YYYY-MM-DD").format("DD/MM/YYYY");
                                       var hora_inicio_turno=hora_inicio_agenda_moment.format('HH:mm');
                                       var hora_fin_turno=hora_inicio_agenda_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                       table.row.add( {
                                          "turno_id":       'filanueva'+i,
                                          "defaultContent":"",
                                          "dia":  dia   ,
                                          "fecha":  fecha_actual   ,
                                          "hora_inicio":  hora_inicio_turno   ,
                                          "hora_fin":  hora_fin_turno   ,
                                          "estado": "Libre",
                                          "paciente":     "",
                                          "motivo":       "",
                                       //   "motivo":       "Dias sin turnos",
                                          "tratamientos":       "",
                                          "defaultContent": ""
                                       } );// table.row.add
                                    }//for var i=1
                                 }//if agenda_medico.lengt
                              }//if(horarios==true)
                           }//if(!existencia_turno)
                           fecha_analizando=fecha_analizando.add(1, 'd');// incremento el día a analizar en 1
                        }//while(mes.format('MM')==fecha_analizando.format('MM'))

                        //--------------------------------------ANALIZO LOS TURNOS DADOS----------------------------
                        var auxiliar;
                        var auxiliar2;
                        if(datos.length !=0 ){//compruebo si hay turnos agendados
                           for (var pos=0 ; pos<cont ; pos++){//recorro todos los turnos
                              //--------------Traigo la agenda para el primer turno o para cuando cambia de día----------
                              var fecha_moment=moment(datos[pos].fecha,'DD/MM/YYYY')
                              var fecha=fecha_moment.format('YYYY-MM-DD');
                              var dia=fecha_moment.format('dddd');
                              $.ajax({
                                 url : '<?php echo site_url("agendadeturnos/agendadeturnos_contr/agenda_medicos");?>',
                                 data : {"usuario_id":selectprofactual, 
                                          "dia":dia, 
                                          "sede_id":sede_id, 
                                          "fecha":fecha},
                                 type : 'GET',
                                 dataType : 'json',
                                 async : false,

                                 success : function(agenda) {
                                       agenda_medico=agenda.agenda;
                                       horarios=agenda.horarios;
                                 }//success ajax agenda_medicos
                              });//ajax agenda_medicos

                              if(horarios==true){
                                 if(agenda_medico.length != 0){
                                    //analizo el primer turno
                                    if(pos==0){
                                       //primero veo si es el primer turno agendado es el primero del día o no
                                       var hora_inicio_dia_moment = moment(datos[pos].hora_inicio, 'HH:mm', true);
                                       var hora_inicio_agenda_moment = moment(agenda_medico[0].hora_inicio, 'HH:mm:ss', true);
                                       duracion_turno_agenda=agenda_medico[0].duracion;
                                       //veo cuanto tiempo tiene disponible entre turno y turno
                                       tiempo_disponible=hora_inicio_dia_moment.diff(hora_inicio_agenda_moment, 'minutes');
                                       if(tiempo_disponible>0){
                                          //establezco la cantidad de turnos que puedo dar en este espacio libre
                                          cant_turn=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                          for(var i=1 ; i<=cant_turn; i++){
                                             var hora_inicio_turno=hora_inicio_agenda_moment.format('HH:mm');
                                             if(i==cant_turn){
                                                var hora_fin_turno=hora_inicio_dia_moment.format('HH:mm');                   
                                             }else{
                                                var hora_fin_turno=hora_inicio_agenda_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                             };
                                             table.row.add( {
                                                "turno_id":       'filanueva'+pos,
                                                "defaultContent": "",
                                                "dia":            datos[pos].dia   ,
                                                "fecha":          datos[pos].fecha   ,
                                                "hora_inicio":    hora_inicio_turno   ,
                                                "hora_fin":       hora_fin_turno   ,
                                                "estado":         "Libre",
                                                "paciente":       "",
                                                "motivo":         "",
                                                // "motivo":         "Primer turno de todos",
                                                "tratamientos":        "",
                                                "defaultContent": ""
                                             });//table.row.add 
                                          }//for i=1
                                       }//if tiempo_disponible>0
                                    }//if pos==0

                                    //--------------analizo el último turno----------
                                    if(pos==cont-1){
                                       //primero veo si el último turno agendado es el último del día o no
                                       var hora_fin_dia_moment = moment(datos[pos].hora_fin, 'HH:mm', true);
                                       var hora_fin_agenda_moment = moment(agenda_medico[0].hora_fin, 'HH:mm:ss', true);
                                       duracion_turno_agenda=agenda_medico[0].duracion;
                                       //veo cuanto tiempo tiene disponible entre turno y turno
                                       tiempo_disponible=hora_fin_agenda_moment.diff(hora_fin_dia_moment, 'minutes');
                                       if(tiempo_disponible>0){
                                          //establezco la cantidad de turnos que puedo dar en este espacio libre
                                          cant_turn=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                          for(var i=1 ; i<=cant_turn; i++){
                                             var hora_inicio_turno=hora_fin_dia_moment.format('HH:mm');
                                             if(i==cant_turn){
                                                var hora_fin_turno=hora_fin_agenda_moment.format('HH:mm');                   
                                             }else{
                                                var hora_fin_turno=hora_fin_dia_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                             };
                                             table.row.add( {
                                                "turno_id":       'filanueva'+pos,
                                                "defaultContent": "",
                                                "dia":            datos[pos].dia   ,
                                                "fecha":          datos[pos].fecha   ,
                                                "hora_inicio":    hora_inicio_turno   ,
                                                "hora_fin":       hora_fin_turno   ,
                                                "estado":         "Libre",
                                                "paciente":       "",
                                                "motivo":         "",
                                                // "motivo":         "Último turno de todos",
                                                "tratamientos":        "",
                                                "defaultContent": ""
                                             });//table.row.add 
                                          }//for i=1
                                       }//if diff
                                    }//if(pos==cont-1)

                                    if(pos!=cont-1){
                                       auxiliar=moment(datos[pos].fecha,'DD/MM/YYYY').format('YYYY-MM-DD');
                                       auxiliar2=moment(datos[pos+1].fecha,'DD/MM/YYYY').format('YYYY-MM-DD');
                                       //Veo los turnos de fin de cada día
                                       if(!moment(auxiliar2).isSame(auxiliar)){
                                          //si el día cambia analizo los últimos turnos de los días intermedios
                                          var hora_fin_moment = moment(agenda_medico[0].hora_fin, 'HH:mm:ss', true);
                                          var hora_inicio_moment = moment(datos[pos].hora_fin, 'HH:mm', true);
                                          duracion_turno_agenda=agenda_medico[0].duracion;
                                          tiempo_disponible=hora_fin_moment.diff(hora_inicio_moment, 'minutes');
                                          //veo cuanto tiempo tiene disponible entre turno y turno
                                          if(tiempo_disponible>0){
                                             //establezco la cantidad de turnos que puedo dar en este espacio libre
                                             cant_turn=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                             for(var i=1 ; i<=cant_turn; i++){
                                                var hora_inicio_turno=hora_inicio_moment.format('HH:mm');
                                                if(i==cant_turn){
                                                   var hora_fin_turno=hora_fin_moment.format('HH:mm');                   
                                                }else{
                                                   var hora_fin_turno=hora_inicio_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                                };
                                                table.row.add( {
                                                   "turno_id":       'filanueva'+pos,
                                                   "defaultContent": "",
                                                   "dia":            datos[pos].dia   ,
                                                   "fecha":          datos[pos].fecha   ,
                                                   "hora_inicio":    hora_inicio_turno   ,
                                                   "hora_fin":       hora_fin_turno   ,
                                                   "estado":         "Libre",
                                                   "paciente":       "",
                                                   "motivo":         "",
                                                   // "motivo":         "Últimos turnos de cada día",
                                                   "tratamientos":        "",
                                                   "defaultContent": ""
                                                });//table.row.add 
                                             }//for i=1
                                          }//if tiempo_disponible>0
                                       }//if !moment(auxiliar2).isSame(auxiliar)

                                       //-----------------TURNOS INTERMEDIOS------------------
                                       if(moment(auxiliar2).isSame(auxiliar)){
                                          var hora_fin_moment = moment(datos[pos].hora_fin, 'HH:mm', true);
                                          var hora_inicio_moment = moment(datos[pos+1].hora_inicio, 'HH:mm', true);
                                          duracion_turno_agenda=agenda_medico[0].duracion;
                                          tiempo_disponible=hora_inicio_moment.diff(hora_fin_moment, 'minutes');
                                          //veo cuanto tiempo tiene disponible entre turno y turno
                                          if(tiempo_disponible>0){
                                             //establezco la cantidad de turnos que puedo dar en este espacio libre
                                             cant_turn=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                             
                                             for(var i=1 ; i<=cant_turn; i++){
                                                
                                                var hora_inicio_turno=hora_fin_moment.format('HH:mm');
                                                if(i==cant_turn){
                                                   var hora_fin_turno=hora_inicio_moment.format('HH:mm');                   
                                                }else{
                                                   var hora_fin_turno=hora_fin_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                                };
                                                table.row.add( {
                                                   "turno_id":       'filanueva'+pos,
                                                   "defaultContent": "",
                                                   "dia":            datos[pos].dia   ,
                                                   "fecha":          datos[pos].fecha   ,
                                                   "hora_inicio":    hora_inicio_turno   ,
                                                   "hora_fin":       hora_fin_turno   ,
                                                   "estado":         "Libre",
                                                   "paciente":       "",
                                                   "motivo":         "",
                                                   // "motivo":         "Turnos intermedios",
                                                   "tratamientos":        "",
                                                   "defaultContent": ""
                                                });//table.row.add 
                                             }//for i=1
                                          }//if tiempo_disponible>0
                                       }//if moment(auxiliar2).isSame(auxiliar)
                                    }//if(pos!=cont-1)

                                    if(pos!=0){
                                       //analizo en el cambio de día la agenda
                                       auxiliar=moment(datos[pos].fecha,'DD/MM/YYYY').format('YYYY-MM-DD');
                                       auxiliar2=moment(datos[pos-1].fecha,'DD/MM/YYYY').format('YYYY-MM-DD');
                                       //Analizo el principio de cada día
                                       if(!moment(auxiliar2).isSame(auxiliar)){
                                          //primero veo los últimos turnos
                                          var hora_inicio_moment = moment(agenda_medico[0].hora_inicio, 'HH:mm:ss', true);
                                          var hora_fin_moment = moment(datos[pos].hora_inicio, 'HH:mm', true);
                                          duracion_turno_agenda=agenda_medico[0].duracion;
                                          tiempo_disponible=hora_fin_moment.diff(hora_inicio_moment, 'minutes');
                                          //veo cuanto tiempo tiene disponible entre turno y turno
                                          if(tiempo_disponible>0){
                                             //establezco la cantidad de turnos que puedo dar en este espacio libre
                                             cant_turn=Math.ceil(tiempo_disponible/duracion_turno_agenda);
                                             for(var i=1 ; i<=cant_turn; i++){
                                                var hora_inicio_turno=hora_inicio_moment.format('HH:mm');
                                                if(i==cant_turn){
                                                   var hora_fin_turno=hora_fin_moment.format('HH:mm');                   
                                                }else{
                                                   var hora_fin_turno=hora_inicio_moment.add(duracion_turno_agenda, 'm').format('HH:mm');
                                                };
                                                table.row.add( {
                                                   "turno_id":       'filanueva'+pos,
                                                   "defaultContent": "",
                                                   "dia":            datos[pos].dia   ,
                                                   "fecha":          datos[pos].fecha   ,
                                                   "hora_inicio":    hora_inicio_turno   ,
                                                   "hora_fin":       hora_fin_turno   ,
                                                   "estado":         "Libre",
                                                   "paciente":       "",
                                                   "motivo":         "",
                                                   // "motivo":         "Primer turno de cada día",
                                                   "tratamientos":        "",
                                                   "defaultContent": ""
                                                });//table.row.add 
                                             }//for i=1
                                          }//if tiempo_disponible>0
                                       }//if moment(auxiliar2).isSame(auxiliar)
                                    }//if pos!=0
                                 }//if agenda_medico.lengt
                              }//if(horarios==true)
                           }//for pos=0
                        }//if(datos.length !=0 )
                     }//if selectprof
                     carga_tabla=false;
                     table.draw();
                  }// if carga tabla
               }//drawcallback       
            });//datatable  
            //---------------------------FIN DE LA TABLA-------------------------------------------------------------
   
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

            // Capturo el click en mensual/diario/anual, reenvio los parámetros y deshabilito el que selecciono
            //y habilito el que tenía antes seleccionado 
            $(".periodo").click(function() {
               $.LoadingOverlay("show");
               var id = this.id;
               var opselectanterior=table.ajax.params();
               $("#"+opselectanterior.opselect).removeAttr('disabled');
               opselect.opselect = id;
               if(id=="btndiario"){
                  $("#div_fecha_dia").show();
                  $("#div_fecha_mes").hide();
                  $("#div_fecha_anio").hide();
                  $("#"+id).attr('disabled','disabled');
               }
               else{                    
                  if(id=="btnmensual"){
                  $("#div_fecha_dia").hide();
                  $("#div_fecha_mes").show();
                  $("#div_fecha_anio").hide();
                  $("#"+id).attr('disabled','disabled');
                  }else{
                     if(id=="btnanual"){
                        $("#div_fecha_dia").hide();
                        $("#div_fecha_mes").hide();
                        $("#div_fecha_anio").show();
                        $("#"+id).attr('disabled','disabled');
                     }//if btnanual
                  }//else if btnmensual
               }//else if btndiario
               recarga_tabla(url)
            });//clik

            //---------------------DETECCION DE CAMBIO EN FECHAS---------------------
            //si se modifica el campo fecha modifico lo asigno a opselect
            let timeout;
            $("#fecha_dia").on('change',function(){
               $.LoadingOverlay("show");
               clearTimeout(timeout);
               timeout = setTimeout(function() {
                  opselect.fecha=$("#fecha_dia").val();
                  recarga_tabla(url);
               },700);//settimeout tiempo de espera a que termine de escribir el usuario antes de leer el dato
            });//keyup change

            $("#fecha_mes").on('change',function(){
               $.LoadingOverlay("show");
               clearTimeout(timeout);
               timeout = setTimeout(function() {
                  opselect.fecha=$("#fecha_mes").val()+'-01';
                  recarga_tabla(url);
               },700);//settimeout tiempo de espera a que termine de escribir el usuario antes de leer el dato
            });//keyup change
            
            $("#fecha_anio").on('change',function(){
               $.LoadingOverlay("show");
               clearTimeout(timeout);
               timeout = setTimeout(function() {
                  opselect.fecha=$("#fecha_anio").val();
                  recarga_tabla(url);
               },700);//settimeout tiempo de espera a que termine de escribir el usuario antes de leer el dato
            });//keyup change
            //---------------------FIN DETECCION DE CAMBIO EN FECHAS---------------------

            //--------------------BOTON MARCAR TOMA DE TURNO--------------------------------
            $('#turnos tbody').on("click", "#btnenatencion", function(e){
               e.preventDefault();
               //obtengo el html de la fila
               var datosdefila = $(this).closest("tr");
               //obtengo el id de la fila
               var turno_id=datosdefila[0].id;
               var asistencia='enatencion';
               $.get("<?php echo site_url("agendadeturnos/Agendadeturnos_contr/marcar_asistencia");?>",{'asistencia':asistencia,'turno_id':turno_id},function(datos){
               recarga_tabla(url);
               });//get marcar asistencia
            });//click onclick
            //-----------------------FIN BOTON MARCAR TOMA DE TURNO-------------------------------------------------

            //--------------------BOTON MARCAR TOMA DE TURNO--------------------------------
            $('#turnos tbody').on("click", "#btnatendido", function(e){
               e.preventDefault();
               //obtengo el html de la fila
               var datosdefila = $(this).closest("tr");
               //obtengo el id de la fila
               var turno_id=datosdefila[0].id;
               var asistencia='atendido';
               $.get("<?php echo site_url("agendadeturnos/Agendadeturnos_contr/marcar_asistencia");?>",{'asistencia':asistencia,'turno_id':turno_id},function(datos){
                  table.ajax.url( url ).load();
               });//get marcar asistencia
            });//click onclick
            //-----------------------FIN BOTON MARCAR TOMA DE TURNO-------------------------------------------------
         }); //document ready
      </script>
   </body>
</html>