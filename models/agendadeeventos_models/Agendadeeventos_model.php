<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Agendadeeventos_model extends CI_Model 
    {

        public function listar_eventos($sede_id=false, $fecha=false)
        {
            $recordset=array();
            $fechaComoEntero = strtotime($fecha);
            $mes=date("m",$fechaComoEntero);
            $anio=date("Y",$fechaComoEntero);
            
            //aca viene desde agendaeventos
            //turnos.motivo,
            // concat(pacientes.apellido, ", ", pacientes.nombre) as paciente, 
            // concat(medicos.apellido, ", ", medicos.nombre) as medico,
            // eventos.motivo,botones_tabla_dropdown
            $recordset =   $this->db->select( 'eventos.evento_id evento_id,
                                                eventos_estados.color,  
                                                eventos.nombre_cumpleaniero as paciente,                                      
                                                concat(UCASE(SUBSTRING(DATE_FORMAT(eventos.fecha_inicio, "%W"), 1, 1)), SUBSTRING(DATE_FORMAT(eventos.fecha_inicio, "%W"), 2)) as dia, 
                                                eventos.sede_id, 
                                                date_format(eventos.hora_inicio, "%H:%i") as hora_inicio,
                                                date_format(eventos.hora_fin, "%H:%i") as hora_fin,
                                                date_format(eventos.fecha_inicio, "%d/%m/%Y") as fecha,
                                                eventos_estados.estado as estado,
                                                eventos.nombre_cumpleaniero as nombre_cumpleaniero,
                                                eventos.nombre_evento as nombre_evento,
                                                eventos.tematica as tematica,
                                                eventos_confirmados.boton as boton,
                                                usuarios.usuario_id as usuario_id,
                                                usuarios.usuario as usuario_dni,
                                                eventos.evento_confirmado_id')
                                    ->from('eventos')
                                    // ->join('pacientes', 'pacientes.usuario_id = eventos.usuario_paciente_id','left')
                                    // ->join('medicos', 'medicos.usuario_id = eventos.sede_id','left')                                                 
                                    ->join('eventos_estados', 'eventos_estados.estado_id = eventos.estado_id','left')
                                    ->join('usuarios', 'usuarios.usuario_id = eventos.usuario_id', 'left')
                                    ->join('eventos_confirmados', 'eventos_confirmados.id = eventos.evento_confirmado_id','left')
                                    //estos son como filtros que si no estan se muestran menos de la mitad de eventos
                                    ->where('year(fecha_inicio)',$anio, false)
                                    ->where('month(fecha_inicio)',$mes, false)
                                    //esto hace que se muestren TODAS LAS FECHAS QUE HAY
                                    ->where('date(fecha_inicio)>=',$fecha, true)
                                    //->where('medicos.usuario_id',$sede_id, true)
                                    //->where('eventos.sede_id ==',1)
                                    // ->where('eventos.estado_id !=',4)
                                    // ->where('eventos.estado_id !=',6)
                                    // ->where('eventos.estado_id !=',8)
                                    // ->where('eventos.estado_id !=',9)
                                    ->where('eventos.sede_id',$sede_id)
                                    ->get();
            return $recordset->result_array();
        }//listar_turno

        public function listar_servicios_turnos($evento_id=false)
        {
            $recordset =  $this->db->select('servicios.servicio_id
                                            servicios.servicio
                                            eventos_servicios.tratamiento
                                            servicios.tratamiento
                                            servicios.tratamiento')
                                    ->from('eventos_servicios')
                                    ->join('tratamientos', 'tratamientos.tratamiento_id = turnos_tratamientos.tratamiento_id','left')
                                    ->where('turnos_tratamientos.evento_id',$evento_id)
                                    ->get();
            return $recordset->result_array();
        }//listar_tratamientos_turnos

        // public function listar_tratamientos_turnos($evento_id=false)
        // {
        //     $recordset =  $this->db->select('tratamientos.tratamiento')
        //                             ->from('turnos_tratamientos')
        //                             ->join('tratamientos', 'tratamientos.tratamiento_id = turnos_tratamientos.tratamiento_id','left')
        //                             ->where('turnos_tratamientos.evento_id',$evento_id)
        //                             ->get();
        //     return $recordset->result_array();
        // }//listar_tratamientos_turnos

        public function detalle_evento($evento_id = false)
        {
            $recordset[] =  $this->db->select('eventos_estados.estado as estado,
                                                eventos.usuario_id,
                                                eventos.evento_id,
                                                concat(date_format(eventos.fecha_inicio, "%W"), "<br>" ,date_format(eventos.fecha_inicio, "%d/%m/%Y") , "<br>" , date_format(eventos.hora_inicio, "%H:%i"), " - " , date_format(eventos.hora_fin, "%H:%i")) as fecha,
                                                sedes.sede as sede,
                                                eventos.sede_id as sede_id, 
                                                eventos.nombre_evento as nombre_evento, 
                                                eventos.nombre_cumpleaniero as nombre_cumpleaniero,
                                                eventos.cumple_anios as cumple_anios,
                                                eventos.valor_alquiler as valor_alquiler,
                                                eventos.hora_inicio,
                                                eventos.hora_fin,
                                                eventos.fecha_inicio as fecha_sin_formatear,
                                                clientes.nombre as nombre_adulto,
                                                clientes.apellido as apellido_adulto,
                                                clientes.documento_numero as documento_numero,
                                                CONCAT(celular1_prefijo, celular1_numero) as celular_adulto,
                                                eventos.tematica as tematica,
                                                eventos.observacion_invitacion as observacion_invitacion,
                                                eventos.observaciones_menu as observaciones_menu,
                                                eventos.cant_ninios as cant_ninios,
                                                eventos.cant_adultos as cant_adultos,
                                                eventos.cocina as cocina,
                                                eventos.encargado_evento as encargado_evento,
                                                eventos.ambientacion as ambientacion,
                                                eventos.torta_mesa_dulce as torta_mesa_dulce,
                                                eventos.lunch_adultos as lunch_adultos,
                                                eventos.precio_menu_adulto as precio_menu_adulto,
                                                eventos.proveedor_adultos as proveedor_adultos,
                                                eventos.fecha_pedido_adultos as fecha_pedido_adultos,
                                                eventos.estado_pedido_adultos as estado_pedido_adultos,
                                                eventos.fecha_entrega_pedido_adultos as fecha_entrega_pedido_adultos,
                                                eventos.lunch_ninios as lunch_ninios,
                                                eventos.precio_menu_ninios as precio_menu_ninios,
                                                eventos.proveedor_ninios as proveedor_ninios,
                                                eventos.fecha_pedido_ninios as fecha_pedido_ninios,
                                                eventos.estado_pedido_ninios as estado_pedido_ninios,
                                                eventos.fecha_entrega_pedido_ninios as fecha_entrega_pedido_ninios,
                                                eventos.observaciones as observaciones,
                                                eventos.descripcion as descripcion,
                                            ')
                                ->from('eventos')
                                ->join('sedes', 'sedes.sede_id = eventos.sede_id','left')
                                ->join('clientes', 'clientes.usuario_id = eventos.usuario_id','left')
                                ->join('eventos_estados', 'eventos_estados.estado_id = eventos.estado_id','left') 
                                //esto es para cuando tenga todo para poner los id por ahora se almacena en observaciones
                                // estado_invitacion.estado_id as estado_invitacion_id,
                                //->join('estado_invitacion', 'estado_invitacion.estado_id = eventos.estado_invitacion_id','left')                               
                                ->where('eventos.evento_id',$evento_id)
                                ->get();

                                // eventos_servicios.evento_id as evento_id_servicio,
                                // eventos_servicios.servicio_eventos_id as servicio_eventos_id,
                                // eventos_servicios.servicios_estado_id as servicios_estado_id,
            $recordset[] =  $this->db->select('servicios.servicio,
                                                eventos_servicios.servicio_id as servicio_id,
                                                eventos_servicios.hora_inicio as hora_inicio_servicio,
                                                eventos_servicios.hora_fin as hora_fin_servicio,
                                                eventos_servicios.nombre as nombre_servicio,
                                                eventos_servicios.observaciones as observaciones_servicio,
                                                eventos_servicios.valor as valor_servicio,
                                                eventos_servicios.proveedor as proveedor_servicio
                                            ')
                                ->from('eventos_servicios')
                                //->join('eventos_servicios', 'eventos_servicios.evento_id = eventos.evento_id','left')
                                ->join('servicios', 'servicios.servicio_id = eventos_servicios.servicio_id','left')
                                ->where('eventos_servicios.evento_id',$evento_id)
                                ->get();
            return $recordset;
            
        }//function detalle_turno
 
        public function listar_sedes()
        {
            $recordset=array();
            $recordset =   $this->db->select('sedes.sede as sede,
                                            sedes.sede_id as sede_id,
                                            sedes.valor_por_defecto')
                                    ->from('sedes')
                                    //->join('medicos', 'medicos.sede_id = sedes.sede_id')
                                    ->where('sedes.estado_id',2, false)
                                    //->where('sedes.rol_id',4)
                                    ->get();
            return $recordset->result_array();
        }//function listar_sedes

        //proveedores.nombre as nombre,
        public function listar_proveedores()
        {
            $recordset=array();
            $recordset =   $this->db->select('
                                            CONCAT(nombre, apellido) as nombre,
                                            proveedores.proveedor_id as proveedor_id
                                            ')
                                    ->from('proveedores')
                                    //->join('medicos', 'medicos.proveedor_id = proveedores.proveedor_id')
                                    ->where('proveedores.estado_id',2, false)
                                    //->where('proveedores.rol_id',4)
                                    ->get();
            return $recordset->result_array();
        }//function listar_proveedores

        public function buscar_paciente_dni($valor_busqueda=false)
        {
            $recordset =  $this->db->select(  'usuario_id, 
                                            concat(apellido, ", " , nombre) as paciente')
                                ->from('clientes')
                                ->like('documento_numero',$valor_busqueda, 'after')
                                ->get();
            return $recordset->result_array();
        }//function buscar_paciente_dni

        public function buscar_paciente_nombre($valor_busqueda_nombre=false, $valor_busqueda_apellido=false)
        {
             
            if($valor_busqueda_nombre!="" AND $valor_busqueda_apellido==""){
                $recordset =  $this->db->select(  'usuario_id, 
                                                    concat(apellido, ", " , nombre) as paciente')
                                        ->from('clientes')
                                        ->like('nombre',$valor_busqueda_nombre, 'both')
                                        ->get();
                                        return $recordset->result_array();
            }else{//if $valor_busqueda_nombre!="" AND $valor_busqueda_apellido==""
                if($valor_busqueda_nombre=="" AND $valor_busqueda_apellido!=""){
                    $recordset =  $this->db->select(  'usuario_id, 
                                                        concat(apellido, ", " , nombre) as paciente')
                                            ->from('clientes')
                                            ->like('apellido',$valor_busqueda_apellido, 'both')
                                            ->get();
                                            return $recordset->result_array();
                }else{//if $valor_busqueda_nombre=="" AND $valor_busqueda_apellido!=""
                    if($valor_busqueda_nombre!="" AND $valor_busqueda_apellido!=""){
                        $recordset =  $this->db->select(  'usuario_id, 
                                                            concat(apellido, ", " , nombre) as paciente')
                                                ->from('clientes')
                                                ->like('nombre',$valor_busqueda_nombre, 'both')
                                                ->like('apellido',$valor_busqueda_apellido, 'both')
                                                ->get();
                                                return $recordset->result_array();
                    }else{//if $valor_busqueda_nombre!="" AND $valor_busqueda_apellido!=""
                        $recordset="";
                        return $recordset;
                    }//if else $valor_busqueda_nombre=="" AND $valor_busqueda_apellido!=""
                }//else if $valor_busqueda_nombre=="" AND $valor_busqueda_apellido!=""
            }//else if $valor_busqueda_nombre!="" AND $valor_busqueda_apellido==""
            
            
            
        }//function buscar_paciente_nombre

        public function listar_paciente($usuario_id=false)
        {
                $recordset =  $this->db->select('usuario_id,
                                                nombre,
                                                apellido,
                                                documento_numero,
                                                CONCAT(celular1_prefijo, celular1_numero) as celular
                                               ')
                                    ->from('clientes')
                                    //->join('documentos_tipos','documentos_tipos.documento_tipo_id=clientes.documento_tipo_id')
                                    ->where('usuario_id',$usuario_id)
                                    ->get();
            return $recordset->result_array();
        }//function listar_paciente

        // concat(medicos.apellido, ", ", medicos.nombre) as medico,
        // medicos.sede_id')
        public function buscar_sede($sede_id=false,$evento_nuevo_fecha=false)
        {
                
                $recordset =  $this->db->select(  'sedes.sede,
                                                    sedes.sede_id')
                                    ->from('sedes')
                                    //->join('eventos_agenda', 'eventos_agenda.sede_id = medicos.sede_id', 'left')
                                    //->join('sedes', 'sedes.sede_id = eventos_agenda.sede_id', 'left')
                                    ->where('sedes.sede_id',$sede_id)
                                    ->get();
            
            return $recordset->result_array();
            
        }//function buscar_medico

        public function marcar_asistencia($asistencia=false,$evento_id=false)
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
                                    ->where('evento_id',$evento_id)
                                    ->update('eventos');
            
            
            return $recordset;
        }//function marcar_asistencia

        public function motivo_turno_cancelado($motivo=false, $evento_id=false)
        {    
            $recordset =  $this->db->set('motivo', $motivo)
                                    ->where('evento_id',$evento_id)
                                    ->update('turnos');
            return $recordset;
        }//function motivo_turno_cancelado

        public function agenda_medicos($usuario_id=false, $sede_id=false, $fecha_inicio=false, $fecha_fin=false)
        {
            $recordset =  $this->db->select('*')
                                    ->from('eventos_agenda')
                                    //->where('eventos_agenda.usuario_id',$usuario_id)
                                    ->where('eventos_agenda.estado_id !=',1)
                                    ->where('eventos_agenda.estado_id != ',5)
                                    ->where('eventos_agenda.sede_id',$sede_id)
                                    ->group_start()
                                        ->group_start()
                                            ->where('eventos_agenda.fecha_inicio<=',$fecha_inicio)
                                            ->group_start()
                                                ->where('eventos_agenda.fecha_fin>=',$fecha_inicio)
                                                ->or_where('eventos_agenda.fecha_fin is NULL')                                                
                                            ->group_end()
                                        ->group_end()
                                        ->or_group_start()
                                            ->where('eventos_agenda.fecha_inicio<=',$fecha_fin)
                                            ->group_start()
                                                ->where('eventos_agenda.fecha_fin>=',$fecha_fin)
                                                ->or_where('eventos_agenda.fecha_fin is NULL')                                                
                                            ->group_end()
                                        ->group_end()
                                        ->or_group_start()
                                            ->where('eventos_agenda.fecha_inicio>',$fecha_inicio)
                                            ->group_start()
                                                ->where('eventos_agenda.fecha_fin<',$fecha_fin)
                                                ->or_where('eventos_agenda.fecha_fin is NULL')                                                
                                            ->group_end()
                                        ->group_end()
                                    ->group_end()
                                    ->get();

            
            return $recordset->result_array();       
        }//function agenda_medicos

        public function dias_no_disponibles($fecha_inicio=false, $fecha_fin=false, $sede_id=false)
        {
            $recordset =  $this->db->select('*')
                                    ->from('eventos_agenda_no_laborables')
                                    ->where('eventos_agenda_no_laborables.estado_id',2)
                                    ->where('eventos_agenda_no_laborables.sede_id',$sede_id)
                                    ->group_start()
                                        ->group_start()
                                            ->where('eventos_agenda_no_laborables.fecha_inicio<=',$fecha_inicio)
                                            ->group_start()
                                                ->where('eventos_agenda_no_laborables.fecha_fin>=',$fecha_inicio)
                                                ->or_where('eventos_agenda_no_laborables.fecha_fin is NULL')                                                
                                            ->group_end()
                                        ->group_end()
                                        ->or_group_start()
                                            ->where('eventos_agenda_no_laborables.fecha_inicio<=',$fecha_fin)
                                            ->group_start()
                                                ->where('eventos_agenda_no_laborables.fecha_fin>=',$fecha_fin)
                                                ->or_where('eventos_agenda_no_laborables.fecha_fin is NULL')                                                
                                            ->group_end()
                                        ->group_end()
                                        ->or_group_start()
                                            ->where('eventos_agenda_no_laborables.fecha_inicio>',$fecha_inicio)
                                            ->group_start()
                                                ->where('eventos_agenda_no_laborables.fecha_fin<',$fecha_fin)
                                                ->or_where('eventos_agenda_no_laborables.fecha_fin is NULL')                                                
                                            ->group_end()
                                        ->group_end()
                                    ->group_end()
                                    ->get();

            return $recordset->result_array();       
        }//function dias_no_disponibles

        public function horarios_medicos($agenda_id=false)
        {
                
                $recordset =  $this->db->select('*,
                                                dias.dia')
                                        ->from('eventos_agenda_horarios')
                                        ->join('dias', 'eventos_agenda_horarios.dia_id = dias.dia_id', 'left')
                                        ->where('eventos_agenda_horarios.eventos_agenda_id',$agenda_id)
                                        ->get();
            return $recordset->result_array();
                
        }//function horarios_medicos

        
        //PARA AGREGAR ENTRETENIMIENTOS AL AGREGAR NUEVOS EVENTOS 
        public function listar_servicios($sede_id=false)
        {
            $recordset =  $this->db->select('servicios.servicio_id,
                                            servicios.servicio
                                            ')
                                    ->from('servicios')
                                    ->where('estado_id', 2)
                                    ->where('sede_id', $sede_id)
                                    ->order_by("servicio", "ASC")
                                    ->get();
            return $recordset->result_array();
        }//function listar_servicios

        public function listar_servicio($servicio_id=false)
        {            
            $recordset =  $this->db->select('*')
                                    ->from('servicios')
                                    ->where('estado_id', 2)
                                    ->where('servicio_id', $servicio_id)
                                    ->get();
            return $recordset->result_array();
        }//function listar_servicio

        public function listar_personal($servicio_id=false)
        {
            switch ($servicio_id) {
                case 5:
                    $recordset = $this->db->select('animadores.nombre as nombre_personal,
                                                    animadores.apellido as apellido_personal,
                                                    animadores.animador_id as animador_id_personal,
                                                    animadores.usuario_id as usuario_id,
                                                    animadores.estado_id as estado_id_personal')
                        ->from('animadores')
                        ->where('animadores.estado_id', 2) 
                        ->get();
                    return $recordset->result_array();
                    break;
                case 6:
                    $recordset = $this->db->select('camareros.nombre as nombre_personal,
                                                    camareros.apellido as apellido_personal,
                                                    camareros.camarero_id as camarero_id_personal,
                                                    camareros.usuario_id as usuario_id,
                                                    camareros.estado_id as estado_id_personal')
                        ->from('camareros')
                        ->where('camareros.estado_id', 2) 
                        ->get();
                    return $recordset->result_array();
                    break;
                case 7:
                    $recordset = $this->db->select('entretenedores.nombre as nombre_personal,
                                                    entretenedores.apellido as apellido_personal,
                                                    entretenedores.entretenedor_id as animador_id_personal,
                                                    entretenedores.usuario_id as usuario_id,
                                                    entretenedores.estado_id as estado_id_personal')
                        ->from('entretenedores')
                        ->where('entretenedores.estado_id', 2) 
                        ->get();
                    return $recordset->result_array();
                    break;
            }
            // $recordset =  $this->db->select('*')
            //                         ->from('tratamientos_equipos')
            //                         ->join('equipos', 'equipos.equipo_id = tratamientos_equipos.equipo_id', 'left')
            //                         ->join('tratamientos', 'tratamientos.servicio_id = tratamientos_equipos.servicio_id', 'left')
            //                         ->where('tratamientos_equipos.servicio_id', $servicio_id)
            //                         ->get();
            // return $recordset->result_array();
        }//function listar_equipos
        public function listar_equipos($tratamiento_id=false)
        {
            $recordset =  $this->db->select('*')
                                    ->from('tratamientos_equipos')
                                    ->join('equipos', 'equipos.equipo_id = tratamientos_equipos.equipo_id', 'left')
                                    ->join('tratamientos', 'tratamientos.tratamiento_id = tratamientos_equipos.tratamiento_id', 'left')
                                    ->where('tratamientos_equipos.tratamiento_id', $tratamiento_id)
                                    ->get();
            return $recordset->result_array();
        }//function listar_equipos

        //$equipos=false, $senias=false, $cont_senias=false
        // $cont_equipos=false,
        public function agregar_evento($nuevoevento=false, $servicios=false, $cont_servicios=false )
        {
            $recordset=array();
            $recordset["evento"]=$this->db->insert('eventos',$nuevoevento);
            if($recordset["evento"]){
                $evento_id = $this->db->insert_id();
                
                if($cont_servicios>0){
                    for ($t=0 ; $t<$cont_servicios ; $t++) {
                        $servicios[$t]["evento_id"] = $evento_id;
                    }//for servicios 
                    $recordset["servicios"]=$this->db->insert_batch('eventos_servicios',$servicios);

                    // if($cont_equipos>0){
                    //     for ($e=0 ; $e<$cont_equipos ; $e++) {
                    //         $equipos[$e]["evento_id"] = $evento_id;
                    //     }//for equipos 
                    //     $recordset["equipos"]=$this->db->insert_batch('turnos_equipos',$equipos);
                    // }//
                }//if cant tratamientos != false

                // if($cont_senias>0){
                //     for ($s=0 ; $s<$cont_senias ; $s++) {
                //         $senias[$s]["evento_id"] = $evento_id;
                //     }//for senias 
                //     $recordset["senias"]=$this->db->insert_batch('eventos_senias',$senias);

                //     // if($cont_equipos>0){
                //     //     for ($e=0 ; $e<$cont_equipos ; $e++) {
                //     //         $equipos[$e]["evento_id"] = $evento_id;
                //     //     }//for equipos 
                //     //     $recordset["equipos"]=$this->db->insert_batch('turnos_equipos',$equipos);
                //     // }//
                // }//if cant tratamientos != false
            }else{
                $recordset["evento"]=false;
            }
            return $recordset;

            // $recordset=array();
            // $recordset["animador"]=$this->db->insert('eventos',$nuevoevento);
            // if($recordset["animador"]){
            //     $evento_id = $this->db->insert_id();
                
            //     if($cont_tratamientos>0){
            //         for ($t=0 ; $t<$cont_tratamientos ; $t++) {
            //             $tratamientos[$t]["evento_id"] = $evento_id;
            //         }//for tratamientos 
            //         $recordset["servicios"]=$this->db->insert_batch('eventos_servicios',$tratamientos);

            //         // if($cont_equipos>0){
            //         //     for ($e=0 ; $e<$cont_equipos ; $e++) {
            //         //         $equipos[$e]["evento_id"] = $evento_id;
            //         //     }//for equipos 
            //         //     $recordset["equipos"]=$this->db->insert_batch('turnos_equipos',$equipos);
            //         // }//
            //     }//if cant tratamientos != false
            // }else{
            //     $recordset["evento"]=false;
            // }
            // return $recordset;
        }//function agregar_evento

        //ORIGINAL EMMA
        // public function agregar_evento($nuevoevento=false, $tratamientos=false, $cont_tratamientos=false, $equipos=false, $cont_equipos=false)
        // {
        //     $recordset=array();
        //     $recordset["turno"]=$this->db->insert('turnos',$nuevoevento);
        //     if($recordset["turno"]){
        //         $evento_id = $this->db->insert_id();
                
        //         if($cont_tratamientos>0){
        //             for ($t=0 ; $t<$cont_tratamientos ; $t++) {
        //                 $tratamientos[$t]["evento_id"] = $evento_id;
        //             }//for tratamientos 
        //             $recordset["tratamientos"]=$this->db->insert_batch('turnos_tratamientos',$tratamientos);

        //             if($cont_equipos>0){
        //                 for ($e=0 ; $e<$cont_equipos ; $e++) {
        //                     $equipos[$e]["evento_id"] = $evento_id;
        //                 }//for equipos 
        //                 $recordset["equipos"]=$this->db->insert_batch('turnos_equipos',$equipos);
        //             }//
        //         }//if cant tratamientos != false
        //     }else{
        //         $recordset["turno"]=false;
        //     }
        //     return $recordset;
        // }//function agregar_evento

        //$equipos=false, $cant_equipos=false,
        //EL ORDEND E LAS VARIABLES CAMBIA TODOOOOOOOOOOOO
        public function editar_turno($editaturno=false, $servicios=false, $cant_servicios=false, $evento_id=false )
        {
            $recordset=array();
            if($evento_id!=false){
                $recordset["evento"] =  $this->db->where('evento_id',$evento_id)
                                                ->update('eventos', $editaturno);
            }else{
                $recordset["evento"]=false;
            }
            
            if($recordset["evento"]){
                if($cant_servicios!=false){
                    $this->db->where('evento_id',$evento_id)
                            ->delete('eventos_servicios');
                    // $this->db->where('evento_id',$evento_id)
                    //         ->delete('turnos_equipos');

                    for ($t=0 ; $t<=$cant_servicios ; $t++) {
                        if(isset($servicios[$t])){
                            $servicios[$t]["evento_id"] = $evento_id;
                        }
                    }//for servicios 
                    $recordset["servicios"]=$this->db->insert_batch('eventos_servicios',$servicios);

                    // if($cant_equipos!=false AND !empty($equipos)){
                    //     for ($e=0 ; $e<=$cant_equipos ; $e++) {
                    //         if(isset($equipos[$e])){
                    //             $equipos[$e]["evento_id"] = $evento_id;
                    //         }// if($cant_equipos!=false OR empty($cant_equipos))
                    //     }//for equipos 
                    //     $recordset["equipos"]=$this->db->insert_batch('turnos_equipos',$equipos);
                    // }//
                }//if cant servicios != false
            }else{
                $recordset["evento"]=false;
            }
            return $recordset;
        }//function editar_turno

        public function reprogramar_turno($reprogramar_turno=false, $tratamientos=false, $cant_tratamientos=false, $equipos=false, $cant_equipos=false, $evento_id=false)
        {
            $recordset=array();
            if($evento_id!=false){
                $recordset["turno"] =  $this->db->where('evento_id',$evento_id)
                                                ->update('turnos', $reprogramar_turno);
            }else{
                $recordset["turno"]=false;
            }
            
            if($recordset["turno"]){
                if($cant_tratamientos!=false){
                    $this->db->where('evento_id',$evento_id)
                            ->delete('turnos_tratamientos');
                    $this->db->where('evento_id',$evento_id)
                            ->delete('turnos_equipos');

                    for ($t=0 ; $t<=$cant_tratamientos ; $t++) {
                        if(isset($tratamientos[$t])){
                            $tratamientos[$t]["evento_id"] = $evento_id;
                        }
                    }//for tratamientos 
                    $recordset["tratamientos"]=$this->db->insert_batch('turnos_tratamientos',$tratamientos);

                    if($cant_equipos!=false AND !empty($equipos)){
                        for ($e=0 ; $e<=$cant_equipos ; $e++) {
                            if(isset($equipos[$e])){
                                $equipos[$e]["evento_id"] = $evento_id;
                            }// if($cant_equipos!=false OR empty($cant_equipos))
                        }//for equipos 
                        $recordset["equipos"]=$this->db->insert_batch('turnos_equipos',$equipos);
                    }//
                }//if cant tratamientos != false
            }else{
                $recordset["turno"]=false;
            }
            return $recordset;
        }//function reprogramar_turno

        // concat(medicos.apellido, ", ", medicos.nombre) as medico,
        public function verifica_turno_unico($usuario_id=false, $fecha=false)
        {
            $recordset=array();            
            $recordset =   $this->db->select('date_format(eventos.fecha_inicio, "%W") as dia, 
                                                eventos.sede_id, 
                                                date_format(eventos.hora_inicio, "%H:%i") as hora_inicio,
                                                date_format(eventos.hora_fin, "%H:%i") as hora_fin,
                                                date_format(eventos.fecha_inicio, "%d/%m/%Y") as fecha')
                                    ->from('eventos')
                                    //->join('medicos', 'medicos.usuario_id = eventos.sede_id','left') 
                                    ->join('eventos_estados', 'eventos_estados.estado_id = eventos.estado_id','left')                                               
                                    ->where('eventos.fecha_inicio',$fecha)
                                    ->where('eventos.usuario_id',$usuario_id)
                                    ->group_start()
                                        ->where('eventos.estado_id =',2)
                                        ->or_where('eventos.estado_id =',6)
                                        ->or_where('eventos.estado_id =',7)
                                    ->group_end()
                                    ->get();
            return $recordset->result_array();
        }//function verifica_turno_unico

        // public function verifica_turno_unico($paciente_id=false, $fecha=false)
        // {
        //     $recordset=array();            
        //     $recordset =   $this->db->select(   'concat(medicos.apellido, ", ", medicos.nombre) as medico,
        //                                         date_format(eventos.fecha, "%W") as dia, 
        //                                         eventos.sede_id, 
        //                                         date_format(eventos.hora_inicio, "%H:%i") as hora_inicio,
        //                                         date_format(eventos.hora_fin, "%H:%i") as hora_fin,
        //                                         date_format(eventos.fecha, "%d/%m/%Y") as fecha')
        //                             ->from('eventos')
        //                             ->join('medicos', 'medicos.usuario_id = eventos.sede_id','left') 
        //                             ->join('eventos_estados', 'eventos_estados.estado_id = eventos.estado_id','left')                                               
        //                             ->where('eventos.fecha',$fecha)
        //                             ->where('eventos.usuario_paciente_id',$paciente_id)
        //                             ->group_start()
        //                                 ->where('eventos.estado_id =',2)
        //                                 ->or_where('eventos.estado_id =',6)
        //                                 ->or_where('eventos.estado_id =',7)
        //                             ->group_end()
        //                             ->get();
        //     return $recordset->result_array();
        // }//function verifica_turno_unico

        public function confirmar_turno($evento_id=false)
        {
            $recordset=array();            
            $recordset["turno"] =  $this->db->set('evento_confirmado_id', 2)
                                            ->where('evento_id',$evento_id)
                                            ->update('eventos');
            return $evento_id;
        }//function confirmar_turno

        public function equipos_fecha_hora($fecha=false,$hora_inicio=false,$hora_fin=false)
	    {
            //Listo todos los turnos que usan un equipo en particular para ver la disponibilidad de dicho equipo
            $recordset = $this->db->select('turnos_equipos.equipo_id,
                                            equipos.equipo,
                                            turnos.evento_id,
                                            concat(medicos.apellido, ", ", medicos.nombre) as profesional,
                                            date_format(turnos.hora_inicio, "%H:%i") as hora_inicio,
                                            date_format(turnos.hora_fin, "%H:%i") as hora_fin')
                                    ->from('turnos')
                                    ->join('turnos_equipos', 'turnos.evento_id = turnos_equipos.evento_id')
                                    ->join('medicos', 'medicos.usuario_id = turnos.sede_id')
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
    }//turnos_model
?>