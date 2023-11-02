<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_administradores_model extends CI_Model 
    {
        public function __construct(){
                parent::__construct();
                if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
                    redirect("Login_contr");
                }
        }

        public function listar_administradores()
        {
                $recordset=array();
                $recordset =   $this->db->select('  usuarios_estados.color,
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    administradores.nombre,
                                                    administradores.apellido,
                                                    usuarios_estados.estado,
                                                    administradores.documento_numero as documento, 
                                                    administradores.email as email
                                                ')
                                        ->from('administradores')
                                        ->join('usuarios', 'usuarios.usuario_id = administradores.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id =administradores.estado_id','left')                                                                           
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
                                        ->join('administradores', 'administradores.usuario_id = usuarios.usuario_id','left')     
                                        ->where('usuarios.usuario', $dni)
                                        ->where('administradores.documento_numero', $dni)
                                        //->where('usuarios.rol_id', 3)
                                        ->get();
                if (empty($recordset->result_array())){
                        return true;
                }else{//if empty
                        return false;
                }//else if empty
        }//function

        public function listar_administrador($usuario_id=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    administradores.nombre,
                                                    administradores.apellido,
                                                    usuarios_estados.estado,
                                                    administradores.documento_numero,
                                                    documentos_tipos.documento_tipo,
                                                    administradores.documento_tipo_id,
                                                    administradores.fecha_nacimiento,
                                                    administradores.sexo,
                                                    administradores.celular1_prefijo,
                                                    administradores.celular1_numero,
                                                    administradores.celular2_prefijo,
                                                    administradores.celular2_numero,
                                                    administradores.email,
                                                    administradores.direccion,
                                                    administradores.direccion_numero,
                                                    administradores.direccion_depto,
                                                    administradores.ciudad,
                                                    administradores.provincia
                                                ')
                                        ->from('administradores')
                                        ->join('usuarios', 'usuarios.usuario_id = administradores.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = administradores.estado_id','left')                                                                           
                                        ->join('documentos_tipos', 'documentos_tipos.documento_tipo_id = administradores.documento_tipo_id','left')                                                                           
                                        ->where('administradores.usuario_id', $usuario_id)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function edita_administrador($datos_usuario,$usuario_id=null)
        {
                $recordset=array();
                $recordset['usuario']=$this->db ->where('usuario_id', $usuario_id)
                                                ->update('administradores',$datos_usuario);

                $usuario["documento_numero"]=$datos_usuario["documento_numero"];
                $recordset['usuario']=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->where('usuario_id', $usuario_id)
                                                ->update('usuarios');
                return $recordset;
        }//funcion edita administrador

        public function agrega_administrador($datos_usuario=false)
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
                $recordset["administrador"]=$this->db->insert('administradores',$datos_usuario);
                return $recordset;
        }//funcion agrega


        public function estado_usuario($accion=false, $usuario_id=false)
	{
                if ($accion=='desactivar'){
                $this->db->set('estado_id', 1 )
                         ->where('usuario_id', $usuario_id)
                         ->update('administradores');
                }
                else {
                        if ($accion=='activar'){
                        $this->db->set('estado_id', 2 )
                                 ->where('usuario_id', $usuario_id)
                                 ->update('administradores');
                        }//iff accion activar
                        else{
                                return "error";
                        }//else error
                        
                }//else iff accion activar
        }// funcion desactiva_usuario
}//turnos_model
?>