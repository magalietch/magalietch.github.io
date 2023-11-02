<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_entretenedores_model extends CI_Model 
    {
        public function __construct(){
                parent::__construct();
                if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
                    redirect("Login_contr");
                }
        }

        public function listar_entretenedores()
        {
                $recordset=array();
                $recordset =   $this->db->select('  usuarios_estados.color,
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    entretenedores.nombre,
                                                    entretenedores.apellido,
                                                    usuarios_estados.estado,
                                                    entretenedores.documento_numero as documento, 
                                                    entretenedores.email as email
                                                ')
                                        ->from('entretenedores')
                                        ->join('usuarios', 'usuarios.usuario_id = entretenedores.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id =entretenedores.estado_id','left')                                                                           
                                        ->where('usuarios.rol_id', 8)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function listar_documento_tipo()
        {
                $recordset=array();
                $recordset =   $this->db->select('*')
                                        ->from('documentos_tipos')
                                        ->get();
                return $recordset->result_array();
        }//function

        public function usuario_existe($dni=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('usuarios.usuario')
                                        ->from('usuarios')
                                        ->join('entretenedores', 'entretenedores.usuario_id = usuarios.usuario_id','left')     
                                        ->where('usuarios.usuario', $dni)
                                        ->where('entretenedores.documento_numero', $dni)
                                        //->where('usuarios.rol_id', 3)
                                        ->get();
                if (empty($recordset->result_array())){
                        return true;
                }else{//if empty
                        return false;
                }//else if empty
        }//function

        public function listar_entretenedor($usuario_id=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    entretenedores.nombre,
                                                    entretenedores.apellido,
                                                    usuarios_estados.estado,
                                                    entretenedores.documento_numero,
                                                    documentos_tipos.documento_tipo,
                                                    entretenedores.documento_tipo_id,
                                                    entretenedores.fecha_nacimiento,
                                                    entretenedores.sexo,
                                                    entretenedores.celular1_prefijo,
                                                    entretenedores.celular1_numero,
                                                    entretenedores.celular2_prefijo,
                                                    entretenedores.celular2_numero,
                                                    entretenedores.email,
                                                    entretenedores.direccion,
                                                    entretenedores.direccion_numero,
                                                    entretenedores.direccion_depto,
                                                    entretenedores.ciudad,
                                                    entretenedores.provincia
                                                ')
                                        ->from('entretenedores')
                                        ->join('usuarios', 'usuarios.usuario_id = entretenedores.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = entretenedores.estado_id','left')                                                                           
                                        ->join('documentos_tipos', 'documentos_tipos.documento_tipo_id = entretenedores.documento_tipo_id','left')                                                                           
                                        ->where('entretenedores.usuario_id', $usuario_id)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function edita_entretenedor($datos_usuario,$usuario_id=null)
        {
                $recordset=array();
                $recordset['usuario']=$this->db ->where('usuario_id', $usuario_id)
                                                ->update('entretenedores',$datos_usuario);

                $usuario["documento_numero"]=$datos_usuario["documento_numero"];
                $recordset['usuario']=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->where('usuario_id', $usuario_id)
                                                ->update('usuarios');
                return $recordset;
        }//funcion edita entretenedor

        public function agrega_entretenedor($datos_usuario=false)
        {
                $recordset=array();
                $fecha_actual=date('Y-m-d H:i:s');
                $recordset["usuario"]=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->set('rol_id', 8)
                                                ->set('alta_usuario', $fecha_actual)
                                                ->set('estado_id', 2)
                                                ->insert('usuarios');
                
                $usuario=$datos_usuario["documento_numero"];
                $datos_usuario["usuario_id"]=$this->db->insert_id();
                $datos_usuario["estado_id"]=2;
                $recordset["entretenedor"]=$this->db->insert('entretenedores',$datos_usuario);
                return $recordset;
        }//funcion agrega


        public function estado_usuario($accion=false, $usuario_id=false)
	{
                if ($accion=='desactivar'){
                $this->db->set('estado_id', 1 )
                         ->where('usuario_id', $usuario_id)
                         ->update('entretenedores');
                }
                else {
                        if ($accion=='activar'){
                        $this->db->set('estado_id', 2 )
                                 ->where('usuario_id', $usuario_id)
                                 ->update('entretenedores');
                        }//iff accion activar
                        else{
                                return "error";
                        }//else error
                        
                }//else iff accion activar
        }// funcion desactiva_usuario
}//turnos_model
?>