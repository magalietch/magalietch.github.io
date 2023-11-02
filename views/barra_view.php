<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
<div class="container-fluid">
  <a class="navbar-brand" href="<?php echo site_url("agendadeeventos/Agendadeeventos_contr");?>"><?php echo TITULO;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php if($_SESSION["rol_id"]!=4){?>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
     
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Usuarios
        </a>

        <div class="dropdown-menu">

        <?php if($_SESSION["rol_id"]==1 OR $_SESSION["rol_id"]==8){?>
        
          <!-- <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Profesionales_contr/usuarios_profesionales");?>">Profesionales</a> -->
          
          <!-- <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Secretarias_contr/usuarios_secretarias");?>">Secretarias</a> -->
          
        <?php } ?>

        <?php if(($_SESSION["rol_id"]==8) or $_SESSION["rol_id"]==1){?>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/administradores_contr/usuarios_administradores");?>">Administradores</a>
        <?php } ?>

        <?php if(($_SESSION["rol_id"]==8) or $_SESSION["rol_id"]==1){?>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/animadores_contr/usuarios_animadores");?>">Animadores</a>
        <?php } ?>

        <?php if(($_SESSION["rol_id"]==8) or $_SESSION["rol_id"]==1){?>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/camareros_contr/usuarios_camareros");?>">Camareros</a>
        <?php } ?>

        <?php if(($_SESSION["rol_id"]==8) or $_SESSION["rol_id"]==1){?>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/cocineros_contr/usuarios_cocineros");?>">Cocineros</a>
        <?php } ?>

        <?php if(($_SESSION["rol_id"]==8) or $_SESSION["rol_id"]==1){?>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/cocineros_contr/usuarios_cocineros");?>">Cocineros</a>
        <?php } ?>

        <?php if(($_SESSION["rol_id"]==8) or $_SESSION["rol_id"]==1){?>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/entretenedores_contr/usuarios_entretenedores");?>">Entretenedores</a>
        <?php } ?>
        
        <!-- <?php if($_SESSION["rol_id"]==1 OR $_SESSION["rol_id"]==8 OR $_SESSION["rol_id"]==3){?>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Pacientes_contr/usuarios_pacientes");?>">Pacientes</a> 
        <?php } ?> -->

        </div>
      </li>

      
      <?php if($_SESSION["rol_id"]==1 OR  $_SESSION["rol_id"]==8){?>
      <li class="nav-item dropdown">
     
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Agenda de eventos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Agenda_sede_contr");?>">Agendas</a>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Dias_no_laborables_contr");?>">Dias no laborables</a>
        </div>
      </li>
      <?php } ?>

      <!-- <li class="nav-item dropdown">
     
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Turnos
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Agendadeeventos_contr");?>">Turnos</a>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Agendadeeventos_pacientes_contr");?>">Turnos por paciente</a>
          <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Reprogramar_turnos_contr");?>">Turnos para reprogramar</a>

        </div>
      </li> -->

      <?php if($_SESSION["rol_id"]==1 OR $_SESSION["rol_id"]==8){?>
        <li class="nav-item dropdown">
          <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Configuraciones
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Tratamientos_contr");?>">Tratamientos</a>
            <a class="dropdown-item" href="<?php echo site_url("agendadeeventos/Equipos_contr");?>">Equipos</a> 
          </div>-->
        </li>
      <?php } ?>
      
    </ul>
  </div>
  <?php } ?>



  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    
   <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url("login_contr/salir");?>"><i class="fa-solid fa-right-from-bracket"></i>
           Salir</a>
      </li>
      </ul>
    </div>
</div>

</nav>