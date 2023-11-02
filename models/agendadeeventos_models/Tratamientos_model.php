<?php
   defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

   class Tratamientos_model extends CI_Model 
   {
      public function __construct(){
         parent::__construct();
         if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
            redirect("Login_contr");
         }
      }

      public function listar_tratamientos()
      {
         $recordset=array();
         $recordset =   $this->db->select(' servicios.servicio_id,
                                             servicios.servicio,
                                             servicios.descripcion,
                                             servicios.valor,
                                             servicios.proveedor,
                                             servicios.observaciones,
                                             estados.color,
                                             estados.estado
                                          ')
                                 ->from('servicios')
                                 ->join('estados', 'estados.estado_id = servicios.estado_id','left')                                                                           
                                 ->get();
         return $recordset->result_array();
      }//function listar_tratamientos
               
      //ORIGINAL EMMA
      // public function listar_tratamientos()
      // {
      //    $recordset=array();
      //    $recordset =   $this->db->select(' tratamientos.tratamiento_id,
      //                                        tratamientos.tratamiento,
      //                                        tratamientos.descripcion,
      //                                        tratamientos.precio,
      //                                        estados.color,
      //                                        estados.estado
      //                                     ')
      //                            ->from('tratamientos')
      //                            ->join('estados', 'estados.estado_id = tratamientos.estado_id','left')                                                                           
      //                            ->get();
      //    return $recordset->result_array();
      // }//function listar_tratamientos

      public function listar_periodicidades()
      {
         $recordset=array();
         $recordset =   $this->db->select('*')
                                 ->from('tratamientos_periodicidad')
                                 ->where('estado_id', 2)
                                 ->get();
         return $recordset->result_array();
      }//function listar_periodicidades
      
      public function listar_profesiones()
      {
         $recordset=array();
         $recordset =   $this->db->select('*')
                                 ->from('medicos_profesion')
                                 ->where('estado_id', 2)
                                 ->get();
         return $recordset->result_array();
      }//function listar_profesiones
      
      public function listar_sedes()
      {
         $recordset=array();
         $recordset =   $this->db->select('*')
                                 ->from('sedes')
                                 ->where('estado_id', 2)
                                 ->get();
         return $recordset->result_array();
      }//function listar_sedees

      public function agrega_tratamiento($datos_tratamiento=false, $nuevo_equipo=false, $cont=false)
      {
         $recordset=array();
         $recordset["tratamiento"]=$this->db->insert('tratamientos', $datos_tratamiento);
         if($recordset){
            if($cont>0){
               $tratamiento_id = $this->db->insert_id();
               for($i=0 ; $i<$cont ; $i++){
                  $nuevo_equipo[$i]["tratamiento_id"] = $tratamiento_id;
               }//for
               $recordset=$this->db->insert_batch('tratamientos_equipos',$nuevo_equipo);
            }
         }else{
            $recordset["agenda"]=false;
         }
         return $recordset; 
      }//funcion agrega_tratamiento
         
      public function tratamiento_existe($tratamiento=false)
      {
               $recordset=array();
               $recordset =   $this->db->select('*')
                                       ->from('tratamientos')
                                       ->where('tratamientos.tratamiento', $tratamiento)
                                       ->get();
               if (empty($recordset->result_array())){
                        return true;
               }else{//if empty
                        return false;
               }//else if empty
      }//function tratamiento_existe
         
      public function listar_tratamiento($tratamiento_id=false)
      {
         $recordset=array();
         $recordset[]=$this->db ->select('tratamientos.tratamiento_id,
                                       tratamientos.tratamiento,
                                       tratamientos.periodicidad_id,
                                       tratamientos_periodicidad.periodicidad,
                                       tratamientos.profesion_id,
                                       medicos_profesion.profesion,
                                       tratamientos.sede_id,
                                       sedes.sede,
                                       tratamientos.descripcion,
                                       tratamientos.precio,
                                       tratamientos.notas
                                       ')
                              ->from('tratamientos')
                              ->where('tratamientos.tratamiento_id', $tratamiento_id)
                              ->join('tratamientos_periodicidad','tratamientos_periodicidad.periodicidad_id=tratamientos.periodicidad_id','left')
                              ->join('sedes','sedes.sede_id=tratamientos.sede_id','left')
                              ->join('medicos_profesion','medicos_profesion.medicos_profesion_id=tratamientos.profesion_id','left')
                              ->get();

         $recordset[] = $this->db->select( 'tratamientos_equipos.equipo_id,
                                             equipos.equipo')
                              ->from('tratamientos_equipos')
                              ->join('equipos', 'equipos.equipo_id = tratamientos_equipos.equipo_id')
                              ->where('tratamientos_equipos.tratamiento_id',$tratamiento_id)
                              ->get();
         return $recordset;
      }//function listar_tratamiento

      public function edita_tratamiento($datos_tratamiento=false, $tratamiento_id=false, $nuevo_equipo=false, $cont=false)
      {
         $recordset=array();
         if($tratamiento_id!=false){
            $recordset['tratamiento']=$this->db ->where('tratamiento_id', $tratamiento_id)
                                                ->update('tratamientos',$datos_tratamiento);
         }else{
            $recordset['tratamiento']=false;
         }

         if($recordset['tratamiento']){
            if($cont>0){
               $this->db->where('tratamiento_id',$tratamiento_id)
                        ->delete('tratamientos_equipos');
               for ($e=0 ; $e<=$cont ; $e++) {
                  if(isset($nuevo_equipo[$e])){
                        $nuevo_equipo[$e]["tratamiento_id"] = $tratamiento_id;
                  }// if($cont!=false OR empty($cont))
               }//for equipos 
               $recordset["equipos"]=$this->db->insert_batch('tratamientos_equipos',$nuevo_equipo);
            }else{//$cont!=false AND !empty($nuevo_equipo)
               $recordset['equipos']=false;
            }
         }else{
            $recordset['tratamiento']=false;
         }
         
         return $recordset;
      }//funcion edita_tratamiento

      public function estado_tratamiento($estado_id=false, $tratamiento_id=false)
      {
         $this->db->set('estado_id', $estado_id )
                  ->where('tratamiento_id', $tratamiento_id)
                  ->update('tratamientos');
      }// funcion estado_tratamiento

      public function listar_equipos()
      {
         $recordset=array();
         $recordset =   $this->db->select('  equipos.equipo_id,
                                             equipos.equipo,
                                             equipos.descripcion,
                                             equipos.notas,
                                             equipos.cantidad,
                                             estados.color,
                                             estados.estado
                                          ')
                                 ->from('equipos')
                                 ->where('equipos.estado_id',2)
                                 ->join('estados', 'estados.estado_id = equipos.estado_id','left')
                                 ->get();
         return $recordset->result_array();
      }//function listar_equipos
   }//turnos_model
?>