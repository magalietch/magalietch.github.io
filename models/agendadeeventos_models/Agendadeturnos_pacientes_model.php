<?php
   defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

   class Agendadeturnos_pacientes_model extends CI_Model 
   {
      public function listar_turnos($usuario_id=false)
      {
         $recordset=array();            
         $recordset =   $this->db->select(   'turnos.turno_id as turno_id,
                                             turnos_estados.color,                                         
                                             concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                             concat(medicos.apellido, ", ", medicos.nombre) as medico,
                                             date_format(turnos.fecha, "%W") as dia, 
                                             turnos.motivo,
                                             turnos.sede_id, 
                                             date_format(turnos.hora_inicio, "%H:%i") as hora_inicio,
                                             date_format(turnos.hora_fin, "%H:%i") as hora_fin,
                                             date_format(turnos.fecha, "%d/%m/%Y") as fecha,
                                             turnos_estados.estado as estado,
                                             turnos.turno_confirmado_id,
                                             turnos_confirmados.boton as boton
                                             ')
                                 ->from('turnos')
                                 ->join('pacientes', 'pacientes.usuario_id = turnos.usuario_paciente_id','left')
                                 ->join('medicos', 'medicos.usuario_id = turnos.usuario_medico_id','left')                                            
                                 ->join('turnos_estados', 'turnos_estados.estado_id = turnos.estado_id','left')
                                 ->join('turnos_confirmados', 'turnos_confirmados.id = turnos.turno_confirmado_id','left')
                                 ->where('turnos.usuario_paciente_id',$usuario_id)
                                 ->order_by('turnos.fecha', 'DESC')
                                 ->order_by('turnos.hora_inicio', 'DESC')
                                 ->get();
         return $recordset->result_array();
      }//listar_turno listar_turnos

      public function listar_profesionales()
      {
         $recordset=array();
         $recordset =$this->db->select('usuarios.usuario_id, 
                                       concat(medicos.apellido, ", ", medicos.nombre) as medico')
                                 ->from('usuarios')
                                 ->join('medicos', 'medicos.usuario_id = usuarios.usuario_id')
                                 ->where('medicos.estado_id',2, false)
                                 ->where('usuarios.rol_id',4)
                                 ->get();
         return $recordset->result_array();
      }//function listar_profesionales

      public function buscar_medico($usuario_id=false)
      {
         $recordset=$this->db ->select(  'medicos_agenda_horarios.duracion,
                                          concat(medicos.apellido, ", ", medicos.nombre) as medico,
                                          sedes.sede,
                                          medicos.usuario_id')
                              ->from('medicos')
                              ->join('medicos_agenda_horarios', 'medicos_agenda_horarios.usuario_id = medicos.usuario_id', 'left')
                              ->join('sedes', 'sedes.sede_id = medicos_agenda_horarios.sede_id', 'left')
                              ->where('medicos.usuario_id',$usuario_id)
                              ->get();
         return $recordset->result_array();
      }//function buscar_medico

      public function marcar_asistencia($asistencia=false,$turno_id=false)
      {
         $asistencia_id=false;
         if($asistencia=='agendado'){
               $asistencia_id=2;
         }else{
               if($asistencia=='presente'){
                  $asistencia_id=3;
               }else{
                  if($asistencia=='cancelado'){
                     $asistencia_id=4;
                  }else{
                     if($asistencia=='atendido'){
                           $asistencia_id=5;
                     }else{
                           if($asistencia=='ausente_con_aviso'){
                              $asistencia_id=8;
                           }else{
                              if($asistencia=='ausente_sin_aviso'){
                                 $asistencia_id=9;
                              }else{
                                 if($asistencia=='en_atencion'){
                                       $asistencia_id=10;
                                 }else{
                                       $asistencia_id=false;
                                 }//else en atención
                              }//else ausente sin aviso
                           }//else ausente con aviso
                     }//else atendido
                  }//else cancelado
               }//else presente
         }//else agendado

         $recordset =  $this->db->set('estado_id', $asistencia_id)
                                 ->where('turno_id',$turno_id)
                                 ->update('turnos');
         
         
         return $recordset;
      }//function marcar_asistencia
      
      public function motivo_turno_cancelado($motivo=false, $turno_id=false)
      {    
         $recordset=$this->db ->set('motivo', $motivo)
                              ->where('turno_id',$turno_id)
                              ->update('turnos');
         return $recordset;
      }//function motivo_turno_cancelado

      public function agenda_medicos($usuario_id=false, $dia=false, $sede_id=false)
      {
         $recordset=$this->db ->select('medicos_agenda_horarios.dia_id as dia_id,
                                       medicos_agenda_horarios.hora_inicio as hora_inicio,
                                       medicos_agenda_horarios.hora_fin as hora_fin,
                                       medicos_agenda_horarios.duracion as duracion')
                              ->from('medicos_agenda_horarios')
                              ->join('medicos_agenda', 'medicos_agenda.medicos_agenda_id = medicos_agenda_horarios.medicos_agenda_id', 'left')
                              ->join('dias', 'medicos_agenda_horarios.dia_id = dias.dia_id', 'left')
                              ->where('medicos_agenda.usuario_id',$usuario_id)
                              ->where('dias.dia',$dia)
                              ->where('medicos_agenda.estado_id',2)
                              ->where('medicos_agenda.sede_id',$sede_id)
                              ->get();
         return $recordset->result_array();
      }//function agenda_medicos

      public function listar_tratamientos($usuario_id=false)
      {
         $aux=$this->db ->select('*')
                        ->from('medicos')
                        ->where('usuario_id', $usuario_id)
                        ->get();

         $profesional=$aux->result_array();
         $profesion_id=$profesional[0]['profesion_id'];
         $recordset=$this->db ->select('*')
                              ->from('tratamientos')
                              ->where('estado_id', 2)
                              ->where('profesion_id', $profesion_id)
                              ->order_by("tratamiento", "ASC")
                              ->get();
         return $recordset->result_array();
      }//function listar_tratamientos

      public function listar_equipos($tratamiento_id=false)
      {
         $recordset=$this->db ->select('*')
                              ->from('tratamientos_equipos')
                              ->join('equipos', 'equipos.equipo_id = tratamientos_equipos.equipo_id', 'left')
                              ->join('tratamientos', 'tratamientos.tratamiento_id = tratamientos_equipos.tratamiento_id', 'left')
                              ->where('tratamientos_equipos.tratamiento_id', $tratamiento_id)
                              ->get();
         return $recordset->result_array();
      }//function listar_equipos

      public function listar_sedes()
      {
         $recordset=array();
         $recordset =   $this->db->select('*')
                                 ->from('sedes')
                                 ->where('estado_id', 2)
                                 ->get();
         return $recordset->result_array();
      }//function listar_sedees

      public function editar_turno($editaturno=false, $tratamientos=false, $cant_tratamientos=false, $equipos=false, $cant_equipos=false, $turno_id=false)
      {
         $recordset=array();
         if($turno_id!=false){
               $recordset["turno"] =$this->db->where('turno_id',$turno_id)
                                             ->update('turnos', $editaturno);
         }else{
               $recordset["turno"]=false;
         }
         
         if($recordset["turno"]){
               if($cant_tratamientos!=false){
                  $this->db->where('turno_id',$turno_id)
                           ->delete('turnos_tratamientos');
                  $this->db->where('turno_id',$turno_id)
                           ->delete('turnos_equipos');

                  for ($t=0 ; $t<=$cant_tratamientos ; $t++) {
                     if(isset($tratamientos[$t])){
                           $tratamientos[$t]["turno_id"] = $turno_id;
                     }
                  }//for tratamientos 
                  $recordset["tratamientos"]=$this->db->insert_batch('turnos_tratamientos',$tratamientos);

                  if($cant_equipos!=false AND !empty($equipos)){
                     for ($e=0 ; $e<=$cant_equipos ; $e++) {
                           if(isset($equipos[$e])){
                              $equipos[$e]["turno_id"] = $turno_id;
                           }// if($cant_equipos!=false OR empty($cant_equipos))
                     }//for equipos 
                     $recordset["equipos"]=$this->db->insert_batch('turnos_equipos',$equipos);
                  }//
               }//if cant tratamientos != false
         }else{
               $recordset["turno"]=false;
         }
         return $recordset;
      }//function editar_turno

      public function equipos_fecha_hora($fecha=false,$hora_inicio=false,$hora_fin=false)
      {
         //Listo todos los turnos que usan un equipo en particular para ver la disponibilidad de dicho equipo
         $recordset = $this->db->select('turnos_equipos.equipo_id,
                                          equipos.equipo,
                                          turnos.turno_id,
                                          concat(medicos.apellido, ", ", medicos.nombre) as profesional,
                                          date_format(turnos.hora_inicio, "%H:%i") as hora_inicio,
                                          date_format(turnos.hora_fin, "%H:%i") as hora_fin')
                                 ->from('turnos')
                                 ->join('turnos_equipos', 'turnos.turno_id = turnos_equipos.turno_id')
                                 ->join('medicos', 'medicos.usuario_id = turnos.usuario_medico_id')
                                 ->join('equipos', 'equipos.equipo_id = turnos_equipos.equipo_id')
                                 ->where('turnos.fecha', $fecha)
                                 ->group_start()
                                       ->group_start()
                                          ->where('turnos.hora_inicio >', $hora_inicio)
                                          ->where('turnos.hora_inicio <', $hora_fin)
                                       ->group_end()
                                       ->or_group_start()
                                          ->where('turnos.hora_fin >', $hora_inicio)
                                          ->where('turnos.hora_fin <', $hora_fin)
                                       ->group_end()
                                 ->group_end()
                                 ->get();
         return $recordset->result_array();
         //return $this->db->last_query();
      }//funcion equipos_fecha_hora

      public function listar_tratamiento($tratamiento_id=false)
      {            
         $recordset =  $this->db->select('*')
                                 ->from('tratamientos')
                                 ->where('estado_id', 2)
                                 ->where('tratamiento_id', $tratamiento_id)
                                 ->get();
         return $recordset->result_array();
      }//function listar_tratamiento

      public function listar_tratamientos_turnos($turno_id=false)
      {
         $recordset =  $this->db->select('tratamientos.tratamiento')
                                 ->from('turnos_tratamientos')
                                 ->join('tratamientos', 'tratamientos.tratamiento_id = turnos_tratamientos.tratamiento_id','left')
                                 ->where('turnos_tratamientos.turno_id',$turno_id)
                                 ->get();
         return $recordset->result_array();
      }//listar_tratamientos_turnos

      public function detalle_turno($turno_id = false)
      {
               $recordset[] =  $this->db->select(  'turnos_estados.estado as estado,
                                             turnos.turno_id,
                                             turnos.usuario_medico_id,
                                             turnos.usuario_paciente_id,
                                             concat(date_format(turnos.fecha, "%W"), "<br>" ,date_format(turnos.fecha, "%d/%m/%Y") , "<br>" , date_format(turnos.hora_inicio, "%H:%i"), " - " , date_format(turnos.hora_fin, "%H:%i")) as fecha,
                                             concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                             concat(medicos.apellido, ", ", medicos.nombre) as medico,
                                             sedes.sede as sede,
                                             turnos.sede_id,
                                             turnos.motivo as motivo, 
                                             turnos.importe as importe,
                                             turnos.usuario_paciente_id,
                                             turnos.hora_inicio,
                                             turnos.hora_fin,
                                             turnos.fecha as fecha_sin_formatear
                                             ')
                                 ->from('turnos')
                                 ->join('sedes', 'sedes.sede_id = turnos.sede_id','left')
                                 ->join('pacientes', 'pacientes.usuario_id = turnos.usuario_paciente_id','left')
                                 ->join('medicos', 'medicos.usuario_id = turnos.usuario_medico_id','left')
                                 ->join('turnos_estados', 'turnos_estados.estado_id = turnos.estado_id','left')                                
                                 ->where('turnos.turno_id',$turno_id)
                                 ->get();
         
         $recordset[] = $this->db->select( ' tratamientos.tratamiento, 
                                             turnos_tratamientos.tratamiento_id,
                                             turnos_tratamientos.importe,
                                             turnos_tratamientos.notas,
                                             turnos_tratamientos.descuento')
                                 ->from('turnos_tratamientos')
                                 ->join('tratamientos', 'tratamientos.tratamiento_id = turnos_tratamientos.tratamiento_id','left')                                        
                                 ->where('turnos_tratamientos.turno_id',$turno_id)
                                 ->get();

         $recordset[] = $this->db->select( 'equipo, turnos_equipos.equipo_id, tratamiento_id')
                                 ->from('turnos_equipos')
                                 ->join('equipos', 'equipos.equipo_id = turnos_equipos.equipo_id')
                                 ->where('turnos_equipos.turno_id',$turno_id)
                                 ->get();
         return $recordset;
         //return $recordset->result_array();
         
      }//function detalle_turno

      public function listar_paciente($usuario_id=false)
      {
               $recordset =  $this->db->select('usuario_id,
                                             apellido,
                                             nombre,
                                             historia_clinica,
                                             documentos_tipos.documento_tipo,
                                             documento_numero,
                                             ')
                                 ->from('pacientes')
                                 ->join('documentos_tipos','documentos_tipos.documento_tipo_id=pacientes.documento_tipo_id')
                                 ->where('usuario_id',$usuario_id)
                                 ->get();
         return $recordset->result_array();
      }//function listar_paciente

      public function confirmar_turno($turno_id=false)
      {
         $recordset=array();            
         $recordset["turno"] =  $this->db->set('turno_confirmado_id', 2)
                                          ->where('turno_id',$turno_id)
                                          ->update('turnos');
         return $turno_id;
      }//function confirmar_turno
   }//turnos_model
?>