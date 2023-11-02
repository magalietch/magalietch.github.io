<?php
   defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

   class Equipos_model extends CI_Model 
   {
      public function __construct(){
         parent::__construct();
         if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
            redirect("Login_contr");
         }
      }
               
      public function listar_equipos()
      {
         $recordset=array();
         $recordset =   $this->db->select(' equipos.equipo_id,
                                             equipos.equipo,
                                             equipos.descripcion,
                                             equipos.notas,
                                             equipos.cantidad,
                                             estados.color,
                                             estados.estado
                                          ')
                                 ->from('equipos')
                                 ->join('estados', 'estados.estado_id = equipos.estado_id','left')                                                                           
                                 ->get();
         return $recordset->result_array();
      }//function listar_equipos

      public function agrega_equipo($datos_equipo=false)
      {
         $recordset=array();
         $recordset["equipo"]=$this->db->insert('equipos', $datos_equipo);
         return $recordset; 
      }//funcion agrega_equipo
         
      public function equipo_existe($equipo=false)
      {
               $recordset=array();
               $recordset =   $this->db->select('*')
                                       ->from('equipos')
                                       ->where('equipos.equipo', $equipo)
                                       ->get();
               if (empty($recordset->result_array())){
                        return true;
               }else{//if empty
                        return false;
               }//else if empty
      }//function equipo_existe
         
      public function listar_equipo($equipo_id=false)
      {
         $recordset=array();
         $recordset=$this->db ->select(' equipos.equipo_id,
                                       equipos.equipo,
                                       equipos.descripcion,
                                       equipos.notas,
                                       equipos.cantidad,
                                       estados.color,
                                       estados.estado
                                    ')
                              ->from('equipos')
                              ->where('equipos.equipo_id', $equipo_id)
                              ->join('estados', 'estados.estado_id = equipos.estado_id','left')
                              ->get();
         return $recordset->result_array();
      }//function listar_equipo

      public function edita_equipo($datos_equipo=false, $equipo_id=false)
      {
         $recordset=array();
         $recordset['equipo']=$this->db   ->where('equipo_id', $equipo_id)
                                          ->update('equipos',$datos_equipo);
         return $recordset;
      }//funcion edita_equipo

      public function estado_equipo($estado_id=false, $equipo_id=false)
      {
         $this->db->set('estado_id', $estado_id )
                  ->where('equipo_id', $equipo_id)
                  ->update('equipos');
      }// funcion estado_equipo
   }//turnos_model
?>