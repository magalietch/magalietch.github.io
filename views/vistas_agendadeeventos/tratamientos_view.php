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
   
    <title>Tratamientos!!</title>

    <style>
      #tbl tfoot input{
          width: 100%;
          padding: 3px;
          box-sizing: border-box;
      }
      #tbl tfoot {
          display: table-header-group !important;
      }
      textarea {
        resize: none;
      }
    </style>
  </head>
  <body>
    <?php $this->load->view("barra_view"); ?>
    <div class="container-fluid" id="contenedor_principal">
      <br><br><br>
      <div class= "row text-primary" align="center">
          <div class="col-12">
            <h1>Tratamientos</h1>
          </div>
      </div>
      <br>
      <div class= "row">
        <div class="col-12">
        <button class="btn btn-primary btn-lg btn-block" id="btnagregatratamiento" type="button" class="btn btn-primary">Agregar nuevo Tratamiento.</button>
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
      <div class="row">
        <div class="col-lg-12">
          <table class="table" class="display"  id="tbl" style="width:100%">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th data-priority="1">Ver mas</th>
                <th data-priority="3">Tratamiento</th>
                <th data-priority="4">Descripcion</th>
                <th data-priority="5">Precio</th>
                <th data-priority="2">Estado</th>
                <th data-priority="1">Acciones</th>
              </tr>
            </thead>
            <tfoot class="thead-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Ver mas</th>
                <th scope="col">Tratamiento</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>            
            </tfoot>
            <tbody class="table-striped"></tbody>
          </table>
        </div><!-- div class="col" -->
      </div><!-- div class="row" -->
      <!-- ----------------------------------------FIN DE LA TABLA----------------------------------------- -->
      
      <!------------ CARGA DE MODALES --------------------------->
      <?php 
        $this->load->view("vistas_modales/modal_tratamiento");
        $this->load->view("vistas_modales/modal_detalle");
      ?>
      <!------------FIN CARGA DE MODALES --------------------------->
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
        $('#tbl tfoot th').each( function () {
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

        //variables
        var url = "<?php echo site_url ("agendadeturnos/tratamientos_contr/listar_tratamientos");?>";
        var datos=[];
        var primera_recarga=false;
        var carga_init=false;
        var botones="<div class='btn-group dropdown mr-5 mx-auto dropleft'><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown' aria-expanded='false'>Acciones</button><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
        botones+="<button type='button' id='desactivar' class='btn btn-danger btn-block estado'><i class='bi bi-person-dash'></i> Desactivar </botton>";
        botones+="<button type='button' id='activar' class='btn btn-success btn-block estado'><i class='bi bi-person-plus'></i> Activar </botton>";
        botones+="<button type='button' id='btneditar' class='btn btn-warning btn-block'><i class='bi bi-pen'></i> Editar </button>";
        botones+="</div>";
        
        // funciones-----------------------------
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

        //------------------Datatables------------------------
        var table = $('#tbl').DataTable( {
         
          //parametros---------------------------------------------------------------------------
          "fixedHeader": true, //Deja fijo el encabezado
          "responsive": {details: false},
          "deferRender": true, //dibuja la tabla a medida que se necesita
          "order": [ 2, "asc" ], //ordena según la columna tratamiento
          
          dom: 'Bfrtip',
          "lengthMenu": [
            [10, 25, 50, 100],
            ["Mostrar 10 filas", "Mostrar 25 filas", "Mostrar 50 filas", "Mostrar 100 filas"]
          ],
          buttons: <?php echo json_encode($configuracionBotones); ?>,
          
          "columnDefs": [
            {
              "orderable": false,
              "targets": [1,6],
            },
            //Centro el contenido de las columnas
            {className: "text-center", "targets": "_all"},
            { "visible": false, "targets": 0 }
          ],
          "ajax":{
            "url": url ,
            'type' : 'post',
            "dataSrc":""
          },//ajax
          "columns":[
            {"data": "tratamiento_id"},
            {"defaultContent":"<div id='mas' class='mas'><i class='bi bi-plus-circle btn btn-primary'></i></div>"},
            {"data": "tratamiento"},
            {"data": "descripcion"},
            {"data": "precio"},
            {"data": "estado"},
            {"defaultContent": botones}           
          ],
          //Traducimos al español
          "language": {
            "url": "<?php echo site_url ("Lenguaje_contr/lenguaje");?>"
          },
          "rowId": 'tratamiento_id',//establezco a tratamiento_id como la identificación de la fila

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
                  if ( that.search() !== valorbusqueda) {
                    $.LoadingOverlay("show");
                    that.search( valorbusqueda ).draw();
                  }//if that.search()
                  $.LoadingOverlay("hide");
                }, 700)//set timeout
              });//input this.footer()
            });//api columns().every
          },//init

          drawCallback: function(){
            if(carga_init){
              $.LoadingOverlay("hide");
            }

            //pinto las filas según el estado
            this.api().rows().every( function () {
              var tratamiento_id=this.data().tratamiento_id;
              $("#"+tratamiento_id).addClass(this.data().color);
            })//this api
          }//draw callback
        });//datatable  
        //---------------------------FIN DE LA TABLA-------------------------------------------------------------
  
        // ----------------------BOTON NUEVO TRATAMIENTO-------------------------------------------
        $('#btnagregatratamiento').click(function () {
          $('#modal_tratamiento input').off();
          //reseteo los colores de los campos
          $(".validacion").addClass("border-primary");          
          $(".validacion").removeClass("is-invalid border-danger");
          $("#modal_tratamiento_alertas").empty();

          //preparo el modal
          $("#modal_tratamiento_form").trigger("reset");
          $("#modal_tratamiento_header").css("background-color", "#005eff");
          $("#modal_tratamiento_header").css("color", "white" );
          $("#modal_tratamiento_titulo").text("Nuevo tratamiento");
          $("#modal_tratamiento .select").empty();
          $('#modal_tratamiento_tabla tbody').remove();

          //modal select periodicidad
          $.ajax({
            url : "<?php echo site_url("agendadeturnos/tratamientos_contr/listar_periodicidades");?>",
            dataType : 'json',
            async : false,

            success : function(datos) {
              var option = document.createElement("option");
              option.text = "Elija una opcion...";
              option.value= "";
              $("#modal_tratamiento_periodicidad_id").append(option);
              datos.periodicidades.forEach(function(p){
                var option = document.createElement("option");
                option.text = p.periodicidad;
                option.value= p.periodicidad_id;
                $("#modal_tratamiento_periodicidad_id").append(option);
              })//foreach periodicidad
            }//success listar periodicidad
          })//ajax listar periodicidad

          //modal select periodicidad
          $.ajax({
            url : "<?php echo site_url("agendadeturnos/tratamientos_contr/listar_profesiones");?>",
            dataType : 'json',
            async : false,

            success : function(datos) {
              var option = document.createElement("option");
              option.text = "Elija una opcion...";
              option.value= "";
              $("#modal_tratamiento_profesion_id").append(option);
              datos.profesiones.forEach(function(p){
                var option = document.createElement("option");
                option.text = p.profesion;
                option.value= p.medicos_profesion_id;
                $("#modal_tratamiento_profesion_id").append(option);
              })//foreach profesion
            }//success listar profesion
          })//ajax listar profesion

          //modal select periodicidad
          $.ajax({
            url : "<?php echo site_url("agendadeturnos/tratamientos_contr/listar_sedes");?>",
            dataType : 'json',
            async : false,

            success : function(datos) {
              var option = document.createElement("option");
              option.text = "Elija una opcion...";
              option.value= "";
              $("#modal_tratamiento_sede_id").append(option);
              datos.sedes.forEach(function(p){
                var option = document.createElement("option");
                option.text = p.sede;
                option.value= p.sede_id;
                $("#modal_tratamiento_sede_id").append(option);
                if(p.valor_por_defecto==2){
                  $("#modal_tratamiento_sede_id option[value='"+p.sede_id+"']"). prop("selected",true);
                }
              })//foreach sede
            }//success listar sede
          })//ajax listar sede

          var cant_equipos = 0;
          var cant_filas = 0;

          var val="<?php echo site_url("agendadeturnos/tratamientos_contr/agrega_tratamiento"); ?>";
          val+="?cant_equipos="+cant_equipos;
          val+="&cant_filas="+cant_filas;
          $("#modal_tratamiento_form").prop("action",val);

          var contenido_tabla = "<tbody><tr id='tr_modal_tratamiento_agregar_equipo'><td class='text-primary' colspan='2'><button type='button' id='modal_tratamiento_agregar_equipo' class='btn btn-primary btn-block'>Agregar equipo</button></td></tr></tbody>";
          $("#modal_tratamiento_tabla").append(contenido_tabla);

          $('#modal_tratamiento_tabla').off('click', '#modal_tratamiento_agregar_equipo').on("click", "#modal_tratamiento_agregar_equipo", function(h) {
            var contenido_tabla = "<tr class='fila_equipo'>";
            //listo los equipos
            $.ajax({
              url: '<?php echo site_url("agendadeturnos/tratamientos_contr/listar_equipos"); ?>',
              type: 'POST',
              dataType: 'json',
              async: false,
              success: function(equipos) {
                //-----------construyo el select para que elija los equipos-----------
                contenido_tabla += "<td><select name='equipo" + cant_equipos + "' required>";
                contenido_tabla += "<option value=''>Elija un equipo...</option>";
                equipos.forEach(function(e) {
                  contenido_tabla += "<option value='" + e.equipo_id + "'>" + e.equipo + "</option>";
                }); //foreach
                contenido_tabla += "</select></td>";
              } //success ajax agendadeturnos/agenda_prof_contr/listar_equipos
            }); //ajax agendadeturnos/agenda_prof_contr/listar_equipos

            //------------fin select de los equipos------------------------
            contenido_tabla += "<td><button title='Borrar equipo' type='button' class='btn btn-danger eliminaequipo'><i class='bi bi-trash'></i></button></td>";
            contenido_tabla += "</tr>";
            $("#tr_modal_tratamiento_agregar_equipo").before(contenido_tabla);
            cant_equipos++;
            cant_filas++;
            var val="<?php echo site_url("agendadeturnos/tratamientos_contr/agrega_tratamiento"); ?>";
            val+="?cant_equipos="+cant_equipos;
            val+="&cant_filas="+cant_filas;
            $("#modal_tratamiento_form").prop("action",val);

          }); //click modal_tratamiento_agregar_equipo

          $(document).off("click", ".eliminaequipo").on("click", ".eliminaequipo", function() {
            //me posiciono al principio de la fila
            var datosdefila = $(this).closest("tr").remove();
            cant_filas--;
            var val="<?php echo site_url("agendadeturnos/tratamientos_contr/agrega_tratamiento"); ?>";
            val+="?cant_equipos="+cant_equipos;
            val+="&cant_filas="+cant_filas;
            $("#modal_tratamiento_form").prop("action",val);
          }); //click

          $("#modal_tratamiento").modal("show");

          //--------------FORMULARIO NUEVO TRATAMIENTO---------------------------------
          var opcionesform = { 
            beforeSubmit: function(){
              $(".validacion").removeClass("is-invalid border-danger");
              $.LoadingOverlay("show");
            }, //before

            success: function(datos){
              $("#modal_tratamiento_alertas").empty();
              $.LoadingOverlay("hide");
              if(datos.validacion=="ERROR"){
                var alerta='';              
                if(datos.errores.tratamiento=="requerido"){
                  $("#modal_tratamiento_tratamiento").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.tratamiento!=""
                if(datos.errores.periodicidad_id!=""){
                  $("#modal_tratamiento_periodicidad_id").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.periodicidad_id!=""
                if(datos.errores.profesion_id!=""){
                  $("#modal_tratamiento_profesion_id").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.profesion_id!=""
                if(datos.errores.sede_id!=""){
                  $("#modal_tratamiento_sede_id").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.sede_id!=""
                if(datos.errores.precio!=""){
                  $("#modal_tratamiento_precio").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.precio!=""
                if(datos.errores.tratamiento=="existe"){
                  $("#modal_tratamiento_tratamiento").addClass("is-invalid border-danger");
                  alerta+='<div class="alert alert-danger" role="alert">El tratamiento ya existe</div>';
                }//datos.errores.tratamiento!=""
                
                $("#modal_tratamiento_alertas").append(alerta);
              }

              if(datos.validacion=="CORRECTO"){
                $("#modal_tratamiento").modal("hide");
                recarga_tabla(url); //recarga la tabla
              }//datos.validacion=="CORRECTO"
              
            },  //success   
            dataType:'json'
          };//var
          $('#modal_tratamiento').ajaxForm(opcionesform); 
          //---------------------FIN FORMULARIO NUEVO TRATAMIENTO---------------------------
        });//click btnagregatratamiento

        // ----------------------BOTON EDITAR-------------------------------------------
        $('#tbl tbody').on("click", '#btneditar', function () {
          $('#modal_tratamiento input').off();
          //me posiciono al principio de la fila
          var fila = this.closest("tr");
          //obtengo los datos de la fila
          datosdefila=table.row(fila).data();
          //obtengo el id de la fila
          var tratamiento_id=datosdefila.tratamiento_id;
          var edita_tratamiento=false;

          $(".validacion").addClass("border-primary");
          $(".validacion").removeClass("is-invalid border-danger");
          $("#modal_tratamiento_alertas").empty();

          //preparo el modal
          $("#modal_tratamiento_form").trigger("reset");
          $("#modal_tratamiento_header").css("background-color", "#005eff");
          $("#modal_tratamiento_header").css("color", "white" );
          $("#modal_tratamiento_titulo").text("Editar tratamiento");
          $("#modal_tratamiento .select").empty();
          $('#modal_tratamiento_tabla tbody').remove();

          //modal select periodicidades
          $.ajax({
            url : "<?php echo site_url("agendadeturnos/tratamientos_contr/listar_periodicidades");?>",
            dataType : 'json',
            async : false,

            success : function(datos) {
              var option = document.createElement("option");
              option.text = "Elija una opcion...";
              option.value= "";
              $("#modal_tratamiento_periodicidad_id").append(option);

              datos.periodicidades.forEach(function(p){
                var option = document.createElement("option");
                option.text = p.periodicidad;
                option.value= p.periodicidad_id;
                $("#modal_tratamiento_periodicidad_id").append(option);
              })//foreach periodicidad_id
            }//success listar periodicidad_id
          })//ajax listar periodicidad_id

          //modal select profesiones
          $.ajax({
            url : "<?php echo site_url("agendadeturnos/tratamientos_contr/listar_profesiones");?>",
            dataType : 'json',
            async : false,

            success : function(datos) {
              var option = document.createElement("option");
              option.text = "Elija una opcion...";
              option.value= "";
              $("#modal_tratamiento_profesion_id").append(option);

              datos.profesiones.forEach(function(p){
                var option = document.createElement("option");
                option.text = p.profesion;
                option.value= p.medicos_profesion_id;
                $("#modal_tratamiento_profesion_id").append(option);
              })//foreach profesion_id
            }//success listar profesion_id
          })//ajax listar profesion_id

          //modal select sedes
          $.ajax({
            url : "<?php echo site_url("agendadeturnos/tratamientos_contr/listar_sedes");?>",
            dataType : 'json',
            async : false,

            success : function(datos) {
              var option = document.createElement("option");
              option.text = "Elija una opcion...";
              option.value= "";
              $("#modal_tratamiento_sede_id").append(option);

              datos.sedes.forEach(function(p){
                var option = document.createElement("option");
                option.text = p.sede;
                option.value= p.sede_id;
                $("#modal_tratamiento_sede_id").append(option);
              })//foreach sede_id
            }//success listar sede_id
          })//ajax listar sede_id

          var cant_equipos = 0;
          var cant_filas = 0;
          var edita_tratamiento = false;

          //traigo los datos de la tratamiento
          $.ajax({
            url : '<?php echo site_url("agendadeturnos/tratamientos_contr/listar_tratamiento");?>',
            data : {"tratamiento_id":tratamiento_id},
            type : 'GET',
            dataType : 'json',
            async : false,
            success : function(datos_tratamiento) {
              //comienzo a completar el formulario para que el usuario pueda verificar los datos_tratamiento del tratamiento
              $("#modal_tratamiento_tratamiento").val(datos_tratamiento.tratamiento[0].tratamiento);
              $("#modal_tratamiento_descripcion").val(datos_tratamiento.tratamiento[0].descripcion);
              $("#modal_tratamiento_notas").val(datos_tratamiento.tratamiento[0].notas);
              $("#modal_tratamiento_precio").val(datos_tratamiento.tratamiento[0].precio);
              $("#modal_tratamiento_periodicidad_id option[value='"+datos_tratamiento.tratamiento[0].periodicidad_id+"']").prop("selected",true);
              $("#modal_tratamiento_profesion_id option[value='"+datos_tratamiento.tratamiento[0].profesion_id+"']").prop("selected",true);
              $("#modal_tratamiento_sede_id option[value='"+datos_tratamiento.tratamiento[0].sede_id+"']").prop("selected",true);

              //detecto el cambio de numero de documento
              let timeout;
              $("#modal_tratamiento_tratamiento").on("keyup change", function(){
                var tratamiento=this.value;
                clearTimeout(timeout);
                timeout = setTimeout(function(){
                  $("#modal_tratamiento_form").prop("action",val);
                  if(tratamiento.localeCompare(datos_tratamiento.tratamiento[0].tratamiento, undefined, { sensitivity: 'base' }) !== 0){
                    edita_tratamiento=true;
                  }else{
                    edita_tratamiento=false;
                  }//if(tratamiento!=datos_tratamiento.tratamiento[0].tratamiento)
                  var val="<?php echo site_url("agendadeturnos/tratamientos_contr/edita_tratamiento"); ?>";
                  val+="?tratamiento_id="+tratamiento_id;
                  val+="&edita_tratamiento="+edita_tratamiento;
                  val+="&cant_equipos="+cant_equipos;
                  val+="&cant_filas="+cant_filas;
                  $("#modal_tratamiento_form").prop("action",val);
                }, 700)//setTimeout
              })//on "keyup change" #modal_tratamiento_tratamiento
              var contenido_tabla = "<tbody><tr id='tr_modal_tratamiento_agregar_equipo'><td class='text-primary' colspan='2'><button type='button' id='modal_tratamiento_agregar_equipo' class='btn btn-primary btn-block'>Agregar equipo</button></td></tr></tbody>";
              $("#modal_tratamiento_tabla").append(contenido_tabla);

              //listo los equipos existentes
              $.ajax({
                url: '<?php echo site_url("agendadeturnos/tratamientos_contr/listar_equipos"); ?>',
                type: 'POST',
                dataType: 'json',
                async: false,
                success: function(equipos) {  
                  //------agrego los tratamientos existentes-----
                  datos_tratamiento.equipos.forEach(function(de){
                    contenido_tabla ="<tr>";                   
                    contenido_tabla += "<td><select name='equipo" + cant_equipos + "' required>";
                    contenido_tabla += "<option value=''>Elija un equipo...</option>";
                    equipos.forEach(function(eq){
                      if(de.equipo_id==eq.equipo_id){
                        contenido_tabla += "<option value='"+de.equipo_id+"' selected>"+de.equipo+"</option>";
                      }else{
                        contenido_tabla += "<option value='"+eq.equipo_id+"'>"+eq.equipo+"</option>";
                      }//if e.equipo_id==eq.equipo_id

                    });//foreach datos_tratamientos.equipos
                    contenido_tabla += "</select></td>";
                    contenido_tabla += "<td><button title='Borrar equipo' type='button' class='btn btn-danger eliminaequipo'><i class='bi bi-trash'></i></button></td>";
                    contenido_tabla += "</tr>";
                    cant_equipos++;
                    cant_filas++;
                    $("#tr_modal_tratamiento_agregar_equipo").before(contenido_tabla);
                  });//foreach
                }//success
              });//ajax equipos
            }//success ajax listar_tratamiento
          })//ajax listar_tratamiento

          $('#modal_tratamiento_tabla').off('click', '#modal_tratamiento_agregar_equipo').on("click", "#modal_tratamiento_agregar_equipo", function(h) {
            var contenido_tabla = "<tr>";
            //listo los equipos
            $.ajax({
              url: '<?php echo site_url("agendadeturnos/tratamientos_contr/listar_equipos"); ?>',
              type: 'POST',
              dataType: 'json',
              async: false,
              success: function(equipos) {
                //-----------construyo el select para que elija los equipos-----------
                contenido_tabla += "<td><select name='equipo" + cant_equipos + "' required>";
                contenido_tabla += "<option value=''>Elija un equipo...</option>";
                equipos.forEach(function(e) {
                  contenido_tabla += "<option value='" + e.equipo_id + "'>" + e.equipo + "</option>";
                }); //foreach
                contenido_tabla += "</select></td>";
              } //success ajax agendadeturnos/agenda_prof_contr/listar_equipos
            }); //ajax agendadeturnos/agenda_prof_contr/listar_equipos
            //------------fin select de los equipos------------------------
            contenido_tabla += "<td><button title='Borrar equipo' type='button' class='btn btn-danger eliminaequipo'><i class='bi bi-trash'></i></button></td>";
            contenido_tabla += "</tr>";
            $("#tr_modal_tratamiento_agregar_equipo").before(contenido_tabla);
            cant_equipos++;
            cant_filas++;
            var val="<?php echo site_url("agendadeturnos/tratamientos_contr/edita_tratamiento"); ?>";
            val+="?tratamiento_id="+tratamiento_id;
            val+="&edita_tratamiento="+edita_tratamiento;
            val+="&cant_equipos="+cant_equipos;
            val+="&cant_filas="+cant_filas;
            $("#modal_tratamiento_form").prop("action",val);          
          }); //click modal_tratamiento_agregar_equipo

          $(document).off("click", ".eliminaequipo").on("click", ".eliminaequipo", function() {
            //me posiciono al principio de la fila
            $(this).closest("tr").remove();
            cant_filas--;
            var val="<?php echo site_url("agendadeturnos/tratamientos_contr/edita_tratamiento"); ?>";
            val+="?tratamiento_id="+tratamiento_id;
            val+="&edita_tratamiento="+edita_tratamiento;
            val+="&cant_equipos="+cant_equipos;
            val+="&cant_filas="+cant_filas;
            $("#modal_tratamiento_form").prop("action",val);
          }); //click

          var val="<?php echo site_url("agendadeturnos/tratamientos_contr/edita_tratamiento"); ?>";
          val+="?tratamiento_id="+tratamiento_id;
          val+="&edita_tratamiento="+edita_tratamiento;
          val+="&cant_equipos="+cant_equipos;
          val+="&cant_filas="+cant_filas;
          $("#modal_tratamiento_form").prop("action",val);

          $("#modal_tratamiento").modal("show");

          //--------------FORMULARIO EDITAR TRATAMIENTO---------------------------------
          var opcionesform = { 
            beforeSubmit: function(){
              $(".validacion").removeClass("is-invalid border-danger");
              $.LoadingOverlay("show");
            }, //before
            success: function(datos){
              $("#modal_tratamiento_alertas").empty();
              if(datos.validacion=="ERROR"){
                $.LoadingOverlay("hide");
                var alerta='';              
                if(datos.errores.periodicidad_id!=""){
                  $("#modal_tratamiento_periodicidad_id").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.periodicidad_id!=""
                if(datos.errores.profesion_id!=""){
                  $("#modal_tratamiento_profesion_id").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.profesion_id!=""
                if(datos.errores.sede_id!=""){
                  $("#modal_tratamiento_sede_id").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.sede_id!=""
                if(datos.errores.precio!=""){
                  $("#modal_tratamiento_precio").addClass("is-invalid border-danger");
                  alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                }//datos.errores.precio!=""

                if(datos.errores.tratamiento=="existe"){
                  $("#modal_tratamiento_tratamiento").addClass("is-invalid border-danger");
                  alerta+='<div class="alert alert-danger" role="alert">El tratamiento ingresado ya existe</div>';  
                }else{//datos.errores.tratamiento!=""
                  if(datos.errores.tratamiento!=""){
                    $("#modal_tratamiento_tratamiento").addClass("is-invalid border-danger");
                    alerta='<div class="alert alert-danger" role="alert">Hay datos incorrectos o incompletos</div>';
                  }//if datos.errores.tratamiento!=""           
                }//else if datos.errores.tratamiento=="existe"

                $("#modal_tratamiento_alertas").append(alerta);

              }//error
              if(datos.validacion=="CORRECTO"){
                $("#modal_tratamiento").modal("hide");
                recarga_tabla_pagina(url); //recarga la tabla
              }//datos.validacion=="CORRECTO"

            },  //success   
            dataType:  'json'
          };//var
          $('#modal_tratamiento').ajaxForm(opcionesform); 
        });//editar tratamiento
        //   --------------FORMULARIO EDITAR TRATAMIENTO---------------------------------

        // ----------------------BOTON DETALLES-------------------------------------------
        $('#tbl tbody').on("click", '#mas', function () {
          //me posiciono al principio de la fila
          var fila = this.closest("tr");
          //obtengo los datos de la fila
          datosdefila=table.row(fila).data();
          //obtengo el id de la fila
          var tratamiento_id=datosdefila.tratamiento_id;
          
          //traigo los datos de la tratamiento
          $.ajax({
            url : '<?php echo site_url("agendadeturnos/tratamientos_contr/listar_tratamiento");?>',
            data : {"tratamiento_id":tratamiento_id},
            type : 'GET',
            dataType : 'json',
            async : false,
            success : function(datos) {
              //elimino las filas de la tabla por si se había consultado antes algún otro turno
              $('#modal_detalle_tabla tr').remove();
              //armo el modal con los datos obtenidos
              $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Tratamiento:</th><td colspan='2'>"+datos.tratamiento[0].tratamiento+"</td></tr>");
              $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Periodicidad:</th><td colspan='2'>"+datos.tratamiento[0].periodicidad+"</td></tr>");
              $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Profesion:</th><td colspan='2'>"+datos.tratamiento[0].profesion+"</td></tr>");
              $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Sede:</th><td colspan='2'>"+datos.tratamiento[0].sede+"</td></tr>");
              $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Descripcion:</th><td colspan='2'>"+datos.tratamiento[0].descripcion+"</td></tr>");
              $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Precio:</th><td colspan='2'>"+datos.tratamiento[0].precio+"</td></tr>");
              $("#modal_detalle_tabla tbody").append("<tr><th class='text-primary'>Notas:</th><td colspan='2'>"+datos.tratamiento[0].notas+"</td></tr>");

              //preparo los encabezados de la tabla que va a mostrar los tratamientos y los equipos para agregarla al modal
              $titulo_tratamientos="<tr>";
              $titulo_tratamientos+="<th class='text-primary'>Equipos:</th>";
          
              //recorro los datos de los tratamientos y armo las celdas
              $titulo_tratamientos+="<td colspan='2'>";
              datos.equipos.forEach(function(de){
                $titulo_tratamientos+="-"+de.equipo+"<br>";
              });//foreach tratamientos
              $titulo_tratamientos+="</td></tr>";
              //pongo la cabecera en la tabla
              $("#modal_detalle_tabla tbody").append($titulo_tratamientos);
							console.log("​$titulo_tratamientos", $titulo_tratamientos);
            }//success
          });//ajax listar tratamientos
          
          //preparo el modal
          $("#modal_detalle_form").trigger("reset");
          $("#modal_detalle_header").css("background-color", "#005eff");
          $("#modal_detalle_header").css("color", "white" );
          $("#modal_detalle_title").text("Detalles del tratamiento");
          $("#modal_detalle").modal("show");

        });//if on click mas
        //-------------------------FIN BOTON EDITAR-----------------------------------

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

        $('#tbl tbody').on("click", ".estado", function(e){
          if(this.id=="activar"){
            var estado_id=2;
          }else{
            var estado_id=1;
          }

          //me posiciono al principio de la fila
          var fila = this.closest("tr");
          //obtengo los datos de la fila
          datosdefila=table.row(fila).data();
          //obtengo el id de la fila
          var tratamiento_id=datosdefila.tratamiento_id;
          $.get("<?php echo site_url("agendadeturnos/tratamientos_contr/estado_tratamiento");?>",{'estado_id':estado_id, 'tratamiento_id':tratamiento_id},function(datos){
            recarga_tabla_pagina(url);          
          });//get marcar_asistencia
        });//click desactivar usuario
        //---------------------FIN BOTON DESACTIVAR----------------------------------
      }); //document ready
    </script>
  </body>
</html>