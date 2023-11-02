<?php
   defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

   class Agenda_sede_model extends CI_Model 
   {
      public function nueva_agenda($nueva_agenda=false, $nuevo_horario=false, $cont=false)
      {
         $recordset=$this->db->insert('eventos_agenda',$nueva_agenda);
         if($recordset){
            $agenda_id = $this->db->insert_id();
            if($cont>0){
               for($i=0 ; $i<$cont ; $i++){
                  $nuevo_horario[$i]["eventos_agenda_id"] = $agenda_id;
               }//for
               $this->db->insert_batch('eventos_agenda_horarios',$nuevo_horario);
            }
            $recordset=$agenda_id;
         }else{
            $recordset["agenda"]=false;
         }
         return $recordset;
      }// funcion desactiva_eventos_agenda

      // concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
      // concat(medicos.apellido, ", ", medicos.nombre) as medico,
      public function listar_turnos($opselect=false, $sede_id=false, $fecha=false)
      {
         $recordset=array();
         $fechaComoEntero = strtotime($fecha);
         $mes=date("m",$fechaComoEntero);
         $anio=date("Y",$fechaComoEntero);
         $recordset =   $this->db->select(   'eventos.evento_id as evento_id,
                                             eventos_estados.color,                                         
                                             date_format(eventos.fecha, "%W") as dia, 
                                             eventos.nombre_evento,
                                             eventos.sede_id, 
                                             date_format(eventos.hora_inicio, "%H:%i") as hora_inicio,
                                             date_format(eventos.hora_fin, "%H:%i") as hora_fin,
                                             date_format(eventos.fecha_inicio, "%d/%m/%Y") as fecha,
                                             eventos_estados.estado as estado')
                                 ->from('eventos')
                                 // ->join('pacientes', 'pacientes.sede_id = eventos.usuario_paciente_id','left')
                                 // ->join('medicos', 'medicos.sede_id = eventos.usuario_medico_id','left')                                                 
                                 ->join('eventos_estados', 'eventos_estados.estado_id = eventos.estado_id','left')
                                 ->where('year(fecha)',$anio, false)
                                 ->where('month(fecha)',$mes, false)
                                 ->where('date(fecha)>=',$fecha, true)
                                 //->where('medicos.sede_id',$usuario_medico_id, true)
                                 ->where('eventos.estado_id !=',4)
                                 ->where('eventos.estado_id !=',8)
                                 ->where('eventos.sede_id',1)
                                 ->get();
         return $recordset->result_array();
      }//listar_turno

      //cambie por sede
      public function listar_agendas($sede_id=false, $fecha=false)
      {
         $recordset=array();
         // concat(eventos.apellido, ", ", eventos.nombre) as medico
         //IDENTIFICAR DE Q TABLA LO SACO
         $recordset =   $this->db->select('  eventos_agenda.eventos_agenda_id,
                                             sedes.sede,
                                             eventos_agenda.excepcion,
                                             eventos_agenda.trabaja,
                                             eventos_agenda.nota,
                                             date_format(eventos_agenda.fecha_inicio, "%d/%m/%Y") as fecha_inicio,
                                             date_format(eventos_agenda.fecha_fin, "%d/%m/%Y") as fecha_fin,
                                             eventos_agenda_estados.estado,
                                             eventos_agenda_estados.color,
                                          ')
                                 ->from('eventos_agenda')
                                 // ->join('eventos', 'eventos.sede_id = eventos_agenda.sede_id', 'felt')
                                 ->join('sedes', 'sedes.sede = sedes.sede', 'felt')
                                 ->join('eventos_agenda_estados', 'eventos_agenda_estados.estado_id = eventos_agenda.estado_id','left')
                                 ->where('eventos_agenda.sede_id',$sede_id)
                                 //->group_start()
                                    // ->where('eventos_agenda.fecha_fin >=',$fecha)
                                    //->where('eventos_agenda.fecha_fin is NULL')
                                 //->group_end()
                                 ->group_start()
                                       ->where('eventos_agenda.estado_id',2)
                                       ->or_where('eventos_agenda.estado_id',3)
                                       ->or_where('eventos_agenda.estado_id',4)
                                 ->group_end()
                                 ->get();
         return $recordset->result_array();
      }//listar_agendas

      public function listar_profesionales()
      {
         $recordset=array();
         $recordset =   $this->db->select('usuarios.sede_id, 
                                       concat(medicos.apellido, ", ", medicos.nombre) as medico')
                                 ->from('usuarios')
                                 ->join('medicos', 'medicos.sede_id = usuarios.sede_id', 'felt')
                                 ->where('medicos.estado_id',2, false)
                                 ->where('usuarios.rol_id',4)
                                 ->get();
         return $recordset->result_array();
      }//function

      public function estado_agenda($accion=false, $eventos_agenda_id=false)
      {
         $recordset=array();
         if ($accion=='desactivar'){
            $recordset=$this->db ->set('estado_id', 1 )
                                 ->where('eventos_agenda_id', $eventos_agenda_id)
                                 ->update('eventos_agenda');
         }else {
            if ($accion=='activar'){
               $recordset=$this->db->set('estado_id', 2 )
                              ->where('eventos_agenda_id', $eventos_agenda_id)
                              ->update('eventos_agenda');
            }//iff accion activar
            else{
                     $recordset=false;
            }//else error
         }//else iff accion activar
         return $recordset;
      }// funcion desactiva_eventos_agenda
      
      // concat(medicos.apellido, ", ", medicos.nombre) as medico                              
      // eventos_agenda.sede_id,
      public function listar_agenda($eventos_agenda_id=false)
      {
         $recordset=array();
         $recordset =   $this->db->select('sedes.sede,
                                       concat(date_format(eventos_agenda.fecha_inicio, "%d/%m/%Y")," - ",date_format(eventos_agenda.fecha_fin, "%d/%m/%Y")) as fecha,
                                       eventos_agenda.estado_id,
                                       eventos_agenda.sede_id,
                                       eventos_agenda.trabaja,
                                       eventos_agenda.excepcion,
                                       eventos_agenda.fecha_inicio,
                                       eventos_agenda.fecha_fin,
                                       eventos_agenda.nota')
                                 ->from('eventos_agenda')
                                 ->where('eventos_agenda.eventos_agenda_id', $eventos_agenda_id)
                                 //->join('medicos', 'medicos.sede_id = eventos_agenda.sede_id', 'felt')
                                 ->join('sedes', 'sedes.sede_id = eventos_agenda.sede_id', 'left')
                                 ->get();
            return $recordset->result_array();
      }//function

      public function listar_horario($eventos_agenda_id=false, $orden="ASC")
      {
         $recordset=array();
         $recordset =   $this->db->select('dias.dia,
                                       eventos_agenda_horarios.dia_id,
                                       concat(date_format(eventos_agenda_horarios.hora_inicio, "%H:%i")," - ", date_format(eventos_agenda_horarios.hora_fin, "%H:%i")) as horario,
                                       eventos_agenda_horarios.hora_inicio,
                                       eventos_agenda_horarios.hora_fin,
                                       eventos_agenda_horarios.duracion')
                                 ->from('eventos_agenda_horarios')
                                 ->where('eventos_agenda_id', $eventos_agenda_id)
                                 ->join('dias', 'dias.dia_id = eventos_agenda_horarios.dia_id', 'felt')
                                 ->order_by('eventos_agenda_horarios.dia_id', $orden)
                                 ->get();      
         return $recordset->result_array();
      }//function

      public function listar_sedes()
      {
         $recordset=array();
         $recordset =   $this->db->select('*')
                                 ->from('sedes')
                                 ->where('estado_id', 2)
                                 ->get();
         return $recordset->result_array();
      }//function

      public function listar_dias()
      {
         $recordset=array();
         $recordset=$this->db ->select('*')
                              ->from('dias')
                              ->get();
         return $recordset->result_array();
      }//function

      public function reprogramar_turnos($turno=false)
      {
         $recordset=$this->db->update_batch('turnos', $turno, 'turno_id');
         return $recordset;
      }//function

      public function estado($eventos_agenda_id=false)
      {
         $recordset=array();
         $recordset=$this->db ->set('estado_id', 1)
                              ->where('eventos_agenda_id', $eventos_agenda_id)
                              ->update('eventos_agenda');
         return $recordset;
      }// funcion desactiva_eventos_agenda

      public function listar_turnos_agenda($fecha_inicio_formulario=false, $fecha_fin_formulario=false, $sede_id=false)
      {
         $recordset=array();
         if($fecha_fin_formulario!=null){
            //pongo para reprogramar los horarios que quedan del día                        
            //pongo para reprogramar el resto de los horarios
            $recordset =$this->db->select('turnos.turno_id as turno_id,
                                             turnos.estado_id_anterior,
                                             turnos.fecha,
                                             concat(date_format(turnos.fecha, "%d/%m/%Y") , "<br>" , date_format(turnos.hora_inicio, "%H:%i"), " - " , date_format(turnos.hora_fin, "%H:%i"), "<br>" ,date_format(turnos.fecha, "%W") ) as fecha_formateada,
                                             concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                             sedes.sede')
                                    ->from('turnos')
                                    ->join('pacientes', 'pacientes.sede_id = turnos.usuario_paciente_id','left')
                                    ->join('sedes', 'sedes.sede_id = turnos.sede_id','left')
                                    ->where('usuario_medico_id',$sede_id)
                                    ->where('fecha >= ',$fecha_inicio_formulario)
                                    ->where('fecha <= ',$fecha_fin_formulario)
                                    ->where('turnos.estado_id', 2)
                                    ->or_where('turnos.estado_id', 7)
                                    ->order_by('turnos.fecha', 'asc')
                                    ->order_by('turnos.hora_inicio', 'asc')
                                    ->get();
         }//if $fecha_fin_formulario!=null
         else{
            //pongo para reprogramar los horarios que quedan del día
            //pongo para reprogramar el resto de los horarios
            $recordset =$this->db->select('turnos.turno_id as turno_id,
                                             turnos.estado_id_anterior,
                                             turnos.fecha,
                                             concat(date_format(turnos.fecha, "%d/%m/%Y") , "<br>" , date_format(turnos.hora_inicio, "%H:%i"), " - " , date_format(turnos.hora_fin, "%H:%i"), "<br>" ,date_format(turnos.fecha, "%W") ) as fecha_formateada,
                                             concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                             sedes.sede')
                                    ->from('turnos')
                                    ->join('pacientes', 'pacientes.sede_id = turnos.usuario_paciente_id','left')
                                    ->join('sedes', 'sedes.sede_id = turnos.sede_id','left')
                                    ->where('usuario_medico_id',$sede_id)
                                    ->where('fecha>',$fecha_inicio_formulario)
                                    ->where('turnos.estado_id', 2)
                                    ->or_where('turnos.estado_id', 7)
                                    ->order_by('turnos.fecha', 'asc')
                                    ->order_by('turnos.hora_inicio', 'asc')
                                    ->get();
         }//else if $fecha_fin_formulario!=null
         return $recordset->result_array();
      }//function listar_turnos_agenda

      public function cerrar_agenda($agenda_id=false,$fecha_fin=false)
      {
          $recordset=array();            
          $recordset["turno"] =  $this->db->set('fecha_fin', $fecha_fin)
                                          ->where('eventos_agenda_id',$agenda_id)
                                          ->update('eventos_agenda');
          return $recordset;
      }//function

      public function comprueba_solapamiento_agendas($fecha_inicio=false, $fecha_fin=false, $tipo_agenda=false, $sede_id=false)
      {
         $recordset=array();
         if($fecha_fin=="" AND $tipo_agenda=="agenda"){
            $recordset=$this->db ->select('*')
                                 ->from('eventos_agenda')
                                 ->where('sede_id',$sede_id)
                                 ->where('estado_id', 2)
                                 ->group_start()
                                    ->where('fecha_fin IS NULL')
                                    ->or_where('fecha_fin >', $fecha_inicio)
                                 ->group_end()
                                 ->get();
         }//if $fecha_fin==""
         else{//if $fecha_fin=="" AND $tipo_agenda=="agenda"
            if($fecha_fin!="" AND $tipo_agenda=="agenda"){
               $recordset=$this->db ->select('*')
                                 ->from('eventos_agenda')
                                 ->where('sede_id',$sede_id)
                                 ->where('estado_id', 2)
                                 ->group_start()
                                    ->group_start()
                                       ->where('fecha_fin IS NULL')
                                       ->where('fecha_inicio <', $fecha_fin)
                                    ->group_end()
                                    ->or_group_start()
                                       ->where('fecha_inicio >=', $fecha_inicio)
                                       ->where('fecha_inicio <=', $fecha_fin)
                                    ->group_end()
                                    ->or_group_start()
                                       ->where('fecha_fin >=', $fecha_inicio)
                                       ->where('fecha_fin <=', $fecha_fin)
                                    ->group_end()                                    
                                 ->group_end()
                                 ->get();
            }//if $fecha_fin!="" AND $tipo_agenda=="agenda"
            else{
               if($fecha_fin!="" AND $tipo_agenda=="excepcion"){
                  $recordset=$this->db ->select('*')
                                 ->from('eventos_agenda')
                                 ->where('sede_id',$sede_id)
                                 ->group_start()
                                    ->where('estado_id', 3)
                                    ->or_where('estado_id', 4)
                                 ->group_end()
                                 ->group_start()
                                    ->group_start()
                                       ->where('fecha_inicio >=', $fecha_inicio)
                                       ->where('fecha_inicio <=', $fecha_fin)
                                    ->group_end()
                                    ->or_group_start()
                                       ->where('fecha_fin >=', $fecha_inicio)
                                       ->where('fecha_fin <=', $fecha_fin)
                                    ->group_end()
                                    ->or_group_start()
                                       ->where('fecha_inicio <=', $fecha_inicio)
                                       ->where('fecha_fin >=', $fecha_fin)
                                    ->group_end()
                                 ->group_end()
                                 ->get();
               }//if $fecha_fin!="" AND $tipo_agenda=="excepcion"
               else{
                  return "ERROR";
               }//else if $fecha_fin!="" AND $tipo_agenda=="excepcion"
            }//esle if $fecha_fin!="" AND $tipo_agenda=="agenda"
         }//else if $fecha_fin=="" AND $tipo_agenda=="agenda"

         if ($recordset->num_rows() > 0) {
            return "ERROR";
         }else{//if $recordset->num_rows
            return "CORRECTO";
         }//else if $recordset->num_rows
      }//comprueba_solapamiento_agendas

   }//horarios_model
?>