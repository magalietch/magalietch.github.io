<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Dias_no_laborables_model extends CI_Model 
    {
        public function nuevo_dia($nuevo_dia=false)
        {
                $recordset=$this->db->insert_batch('eventos_agenda_no_laborables',$nuevo_dia);
                return $recordset;
               
        }// funcion desactiva_medicos_agenda

        public function listar_dias($sede_id=false)
        {
           
            $recordset=array();

            $recordset =   $this->db->select('eventos_agenda_no_laborables.id,
                                              date_format(eventos_agenda_no_laborables.fecha_inicio, "%d/%m/%Y") as fecha_inicio,
                                              date_format(eventos_agenda_no_laborables.fecha_fin, "%d/%m/%Y") as fecha_fin,
                                              eventos_agenda_no_laborables.descripcion,
                                              sedes.sede,
                                              estados.estado,
                                              estados.color
                                            ')
                                    ->from('eventos_agenda_no_laborables')
                                    ->join('estados', 'estados.estado_id=eventos_agenda_no_laborables.estado_id','left')
                                    ->join('sedes', 'sedes.sede_id=eventos_agenda_no_laborables.sede_id','left')
                                    ->get();
           
            return $recordset->result_array();

          
        }//listar_agendas

        
        public function listar_sedes()
        {
                $recordset=array();
                $recordset =   $this->db->select('*')
                                        ->from('sedes')
                                        ->where('estado_id', 2)
                                        ->get();
                
                return $recordset->result_array();
        }//function

        public function estado($estado_id=false, $no_disponible_id=false)
	{
                $recordset=array();
                
                $recordset=$this->db->set('estado_id', $estado_id )
                                ->where('id', $no_disponible_id)
                                ->update('eventos_agenda_no_laborables');
                
                return $recordset;
        }// funcion desactiva_medicos_agenda



        public function listar_dia($no_disponible_id=false)
        {
                echo $no_disponible_id;
                $recordset=array();
                $recordset =   $this->db->select('eventos_agenda_no_laborables.fecha_inicio,
                                                eventos_agenda_no_laborables.fecha_fin,
                                                eventos_agenda_no_laborables.descripcion,
                                                sedes.sede,
                                                estados.estado
                                                ')
                
                                        ->from('eventos_agenda_no_laborables')
                                        ->where('id', $no_disponible_id)
                                        ->join('sedes', 'sedes.sede_id = eventos_agenda_no_laborables.sede_id','left')
                                        ->join('estados', 'estados.estado_id = eventos_agenda_no_laborables.estado_id','left')
                                        ->get();
            
                return $recordset->result_array();
                
        }//function

        public function listar_turnos_agenda($fecha_inicio_formulario=false, $fecha_fin_formulario=false, $hora_actual=false, $estado_reprogramar_id_1=false, $estado_reprogramar_id_2=false)
        {
                $recordset=array();
               
                if($fecha_fin_formulario!=null){
                        //pongo para reprogramar los horarios que quedan del día
                        if($hora_actual!=null){
                                $recordset[1] = $this->db->select('turnos.turno_id as turno_id,                                         
                                                                concat(date_format(turnos.fecha, "%d/%m/%Y") , "<br>" , date_format(turnos.hora_inicio, "%H:%i"), " - " , date_format(turnos.hora_fin, "%H:%i"), "<br>" ,date_format(turnos.fecha, "%W") ) as fecha_formateada,
                                                                concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                                                sedes.sede')
                                                        ->from('turnos')
                                                        ->join('pacientes', 'pacientes.usuario_id = turnos.usuario_paciente_id','left','left')
                                                        ->join('sedes', 'sedes.sede_id = turnos.sede_id','left','left')
                                                        ->where('fecha',$fecha_inicio_formulario)
                                                        ->where('fecha<=',$fecha_fin_formulario)
                                                        ->where('hora_inicio > ',$hora_actual)
                                                        ->where('turnos.estado_id', $estado_reprogramar_id_1)
                                                        ->or_where('turnos.estado_id', $estado_reprogramar_id_2)
                                                        ->get();
                        }else{
                                $recordset[1] =null;
                        }//if hora_actual

                                //pongo para reprogramar el resto de los horarios
                                $recordset[0] = $this->db->select('turnos.turno_id as turno_id,                                         
                                                                concat(date_format(turnos.fecha, "%d/%m/%Y") , "<br>" , date_format(turnos.hora_inicio, "%H:%i"), " - " , date_format(turnos.hora_fin, "%H:%i"), "<br>" ,date_format(turnos.fecha, "%W") ) as fecha_formateada,
                                                                concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                                                sedes.sede')
                                                        ->from('turnos')
                                                        ->join('pacientes', 'pacientes.usuario_id = turnos.usuario_paciente_id','left','left')
                                                        ->join('sedes', 'sedes.sede_id = turnos.sede_id','left','left')
                                                        ->where('fecha > ',$fecha_inicio_formulario)
                                                        ->where('fecha <= ',$fecha_fin_formulario)
                                                        ->where('turnos.estado_id', $estado_reprogramar_id_1)
                                                        ->or_where('turnos.estado_id', $estado_reprogramar_id_2)
                                                        ->get();
                                                        
                }//if $fecha_fin_formulario!=null
                else{
                        //pongo para reprogramar los horarios que quedan del día
                        if($hora_actual!=null){
                                $recordset[1] = $this->db->select('turnos.turno_id as turno_id,                                         
                                                                concat(date_format(turnos.fecha, "%d/%m/%Y") , "<br>" , date_format(turnos.hora_inicio, "%H:%i"), " - " , date_format(turnos.hora_fin, "%H:%i"), "<br>" ,date_format(turnos.fecha, "%W") ) as fecha_formateada,
                                                                concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                                                sedes.sede')
                                                        ->from('turnos')
                                                        ->join('pacientes', 'pacientes.usuario_id = turnos.usuario_paciente_id','left','left')
                                                        ->join('sedes', 'sedes.sede_id = turnos.sede_id','left','left')
                                                        ->where('fecha',$fecha_inicio_formulario)
                                                        ->where('hora_inicio > ',$hora_actual)
                                                        ->where('turnos.estado_id', $estado_reprogramar_id_1)
                                                        ->or_where('turnos.estado_id', $estado_reprogramar_id_2)                                                        
                                                        ->get();
                                                        
                        }else{
                                $recordset[1] =null;
                        }//if hora_actual

                        //pongo para reprogramar el resto de los horarios
                                $recordset[0] = $this->db->select('turnos.turno_id as turno_id,                                         
                                                                concat(date_format(turnos.fecha, "%d/%m/%Y") , "<br>" , date_format(turnos.hora_inicio, "%H:%i"), " - " , date_format(turnos.hora_fin, "%H:%i"), "<br>" ,date_format(turnos.fecha, "%W") ) as fecha_formateada,
                                                                concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
                                                                sedes.sede')
                                                        ->from('turnos')
                                                        ->join('pacientes', 'pacientes.usuario_id = turnos.usuario_paciente_id','left','left')
                                                        ->join('sedes', 'sedes.sede_id = turnos.sede_id','left','left')
                                                        ->where('fecha>',$fecha_inicio_formulario)
                                                        ->where('turnos.estado_id', $estado_reprogramar_id_1)
                                                        ->or_where('turnos.estado_id', $estado_reprogramar_id_2)
                                                        ->get();
                                                        
                }// else if $fecha_fin_formulario!=null

        
                return $recordset;
        }//function listar_turnos_agenda

       
    }//horarioss_model
?>