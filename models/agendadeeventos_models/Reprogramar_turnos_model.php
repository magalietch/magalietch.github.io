<?php
defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

   class Reprogramar_turnos_model extends CI_Model 
   {
      public function listar_turnos($usuario_medico_id=false)
      {
         $recordset=array();
         
         $recordset =   $this->db->select(   'turnos.turno_id as turno_id,
                                             turnos_estados.color,                                         
                                             concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                             concat(medicos.apellido, ", ", medicos.nombre) as medico,
                                             CONCAT(UCASE(SUBSTRING(DATE_FORMAT(turnos.fecha, "%W"), 1, 1)), SUBSTRING(DATE_FORMAT(turnos.fecha, "%W"), 2)) as dia, 
                                             turnos.motivo,
                                             turnos.sede_id, 
                                             date_format(turnos.hora_inicio, "%H:%i") as hora_inicio,
                                             date_format(turnos.hora_fin, "%H:%i") as hora_fin,
                                             date_format(turnos.fecha, "%d/%m/%Y") as fecha,
                                             turnos_estados.estado as estado,
                                             turnos_confirmados.boton as boton,
                                             turnos.turno_confirmado_id')
                                 ->from('turnos')
                                 ->join('pacientes', 'pacientes.usuario_id = turnos.usuario_paciente_id','left')
                                 ->join('medicos', 'medicos.usuario_id = turnos.usuario_medico_id','left')                                                 
                                 ->join('turnos_estados', 'turnos_estados.estado_id = turnos.estado_id','left')
                                 ->join('turnos_confirmados', 'turnos_confirmados.id = turnos.turno_confirmado_id','left')
                                 ->where('medicos.usuario_id',$usuario_medico_id, true)
                                 ->where('turnos.estado_id',6)
                                 ->where('turnos.sede_id',11)
                                 ->get();
         return $recordset->result_array();
      }//listar_turno

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

      public function listar_profesionales()
      {
         $recordset=array();
         $recordset =   $this->db->select('usuarios.usuario_id, 
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
         $recordset =  $this->db->select(  'medicos_agenda_horarios.duracion,
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
         if($asistencia=='presente'){
            $asistencia_id=3;
         }else{
            if($asistencia=='cancelado'){
               $asistencia_id=4;
            }else{
               if($asistencia=='atendido'){
                     $asistencia_id=5;
               }else{
                     if($asistencia=='ausente'){
                        $asistencia_id=8;
                     }else{
                        if($asistencia=='enatencion'){
                           $asistencia_id=9;
                        }else{
                        $asistencia_id=false;
                        }//else ausente
                     }//else ausente
               }//else atendido
            }//else cancelado
         }//else presente

         $recordset =  $this->db->set('estado_id', $asistencia_id)
                                 ->where('turno_id',$turno_id)
                                 ->update('turnos');
         return $recordset;
      }//function marcar_asistencia

      public function motivo_turno_cancelado($motivo=false, $turno_id=false)
      {    
         $recordset =  $this->db->set('motivo', $motivo)
                                 ->where('turno_id',$turno_id)
                                 ->update('turnos');
         return $recordset;
      }//function

      public function listar_tratamientos($usuario_id=false)
      {
         $aux =    $this->db->select('*')
                              ->from('medicos')
                              ->where('usuario_id', $usuario_id)
                              ->get();

         $profesional=$aux->result_array();
         $profesion_id=$profesional[0]['profesion_id'];

         $recordset =  $this->db->select('*')
                              ->from('tratamientos')
                              ->where('estado_id', 2)
                              ->where('profesion_id', $profesion_id)
                              ->order_by("tratamiento", "ASC")
                              ->get();
         
         return $recordset->result_array();
      }//function listar_tratamientos

      public function listar_equipos($tratamiento_id=false)
      {
         $recordset =  $this->db->select('*')
                                 ->from('tratamientos_equipos')
                                 ->join('equipos', 'equipos.equipo_id = tratamientos_equipos.equipo_id', 'left')
                                 ->join('tratamientos', 'tratamientos.tratamiento_id = tratamientos_equipos.tratamiento_id', 'left')
                                 ->where('tratamientos_equipos.tratamiento_id', $tratamiento_id)
                                 ->get();
         
         return $recordset->result_array();
      }//function

      public function listar_tratamientos_turnos($turno_id=false)
      {
         $recordset =  $this->db->select('tratamientos.tratamiento')
                                 ->from('turnos_tratamientos')
                                 ->join('tratamientos', 'tratamientos.tratamiento_id = turnos_tratamientos.tratamiento_id','left')
                                 ->where('turnos_tratamientos.turno_id',$turno_id)
                                 ->get();
         return $recordset->result_array();
      }//listar_tratamientos_turnos
   }//turnos_model
?>