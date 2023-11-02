<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_model extends CI_Model 
    {

        
        public function check_login($usuario="",$password="")
        {   
            $recordset=$this->db->where("usuario",$usuario)
                                ->where("pass",$password)
                                ->where("estado_id",2)
                                ->where("rol_id!=", 6)
                                ->limit(1)
                                ->get("usuarios");
        
            return $recordset->row_array();
        }//check_login

        public function check_nueva_pass($pass_actual="")
        {
            $usuario_id=$this->session->userdata("usuario_id");
            $recordset=$this->db->where("usuario_id",$usuario_id)
                                ->where("pass",$pass_actual)
                                ->where("estado_id",2)
                                ->limit(1)        
                                ->get("usuarios");
        
            return $recordset->row_array();
        }//check_login

        public function cambia_pass($pass=false)
        {
            $usuario_id=$this->session->userdata("usuario_id");
            $recordset=$this->db->where("usuario_id",$usuario_id)
                                ->set("pass",$pass)
                                ->limit(1)
                                ->update("usuarios");
            
            return $recordset;
        }//check_login

        function actualiza_ultimo_login($usuario_id="")
        {
            $recordset=$this->db->where("usuario_id",$usuario_id)
                                ->set("ultimo_ingreso","now()",false)
                                ->limit(1)
                                ->update("usuarios");
            
            return $recordset;
        }//actualiza_ultimo_ingreso

        function actualiza_ultimo_egreso($usuario_id="")
        {
            $recordset=$this->db->where("usuario_id",$usuario_id)
                            ->set("ultimo_egreso","now()",false)
                            ->limit(1)
                            ->update("usuarios");

            return $recordset;
        }//actualiza_ultimo_ingreso

        public function agregar_usuario($nuevo=false)
        {
            if(!isset($nuevo["alta_usuario"])){
                
                $nuevo["alta_usuario"]=date('Y-m-d H:i:s');
            }
                                
            $this->db->insert("usuarios",$nuevo);
        
            if($this->db->affected_rows()){
                return $this->db->insert_id();
            }else{
                return false;
            }//else
        }//funcion agrega        
        
        public function editar_usuario($nuevousuario=false,$usuario_id=null)
        {                      
            $this->db->where('usuario_id', $usuario_id)
                    ->update('usuarios',$nuevousuario);
        
            if($this->db->affected_rows()){
                return $this->db->insert_id();
            }else{
                return false;
            }//else
        }//funcion agrega

        public function listar_usuario($opselect=false)
        {
            $recordset=array();
                $usuario_id=$this->session->userdata("usuario_id");          
                $recordset=$this->db->get("usuarios");  
            
                return $recordset->result_array();
        }//listar_gasto
        
        public function eliminar_usuario($usuario_id=null)
        {
            $consulta=$this->db->where('usuario_id',$usuario_id)
                        ->delete('usuarios');
            $error=$this->db->affected_rows();
            return $error;
        }//eliminar usuario

    }//controlador
?>