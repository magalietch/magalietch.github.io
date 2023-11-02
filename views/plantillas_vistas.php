<!DOCTYPE html>
<html>
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <?php $this->load->view('configuracion_css'); ?>
      
      <title>Eventos</title>

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
         /* Hago que la alerta se mueva con la barra */
         #alerta_reprogramar {
            position: fixed;
            top: 56px;
            left: 0;
            right: 0;
            z-index: 9999;
         }
      </style>
   </head>
   <body>
      <?php $this->load->view($vista); ?>
      <?php $this->load->view('pie_paginas'); ?> <!-- Carga la vista parcial footer.php -->
   </body>
</html>