<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_secretarias_model extends CI_Model 
    {
   

        public function __construct(){
                parent::__construct();
                if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
                    redirect("Login_contr");
                }
        }
            
        public function listar_secretarias()
        {
                $recordset=array();
                $recordset =   $this->db->select('  date_format(usuarios.ultimo_ingreso,"%d/%m/%Y") as ultimo_ingreso,
                                                    usuarios_estados.color,
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    secretarias.nombre,
                                                    secretarias.apellido,
                                                    usuarios_estados.estado,
                                                    secretarias.documento_numero as documento, 
                                                    secretarias.email as email
                                                ')
                                        ->from('secretarias')
                                        ->join('usuarios', 'secretarias.usuario_id = usuarios.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = secretarias.estado_id','left')                                                                           
                                        ->where('usuarios.rol_id', 3)
                                        ->or_where('usuarios.rol_id', 1)
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
                                        ->join('secretarias', 'secretarias.usuario_id = usuarios.usuario_id','left')     
                                        ->where('usuarios.usuario', $dni)
                                        ->where('secretarias.documento_numero', $dni)
                                        //->where('usuarios.rol_id', 3)
                                        ->get();
                if (empty($recordset->result_array())){
                        return true;
                }else{//if empty
                        return false;
                }//else if empty
        }//function
        
        public function listar_secretaria($usuario_id=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                   usuarios.usuario_id,
                                                   usuarios.usuario,
                                                   usuarios.rol_id,
                                                   roles.rol,
                                                   secretarias.nombre,
                                                   secretarias.apellido,
                                                   usuarios_estados.estado,
                                                   secretarias.documento_numero, 
                                                   documentos_tipos.documento_tipo,
                                                   secretarias.documento_tipo_id,
                                                   secretarias.fecha_nacimiento,
                                                   secretarias.sexo,
                                                   secretarias.celular1_prefijo,
                                                   secretarias.celular1_numero,
                                                   secretarias.celular2_prefijo,
                                                   secretarias.celular2_numero,
                                                   secretarias.email,
                                                   secretarias.direccion,
                                                   secretarias.direccion_numero,
                                                   secretarias.direccion_depto,
                                                   secretarias.ciudad,
                                                   secretarias.provincia
                                                ')
                                        ->from('secretarias')
                                        ->join('usuarios', 'secretarias.usuario_id = usuarios.usuario_id','left')     
                                        ->join('documentos_tipos', 'documentos_tipos.documento_tipo_id = secretarias.documento_tipo_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id =secretarias.estado_id','left')                                                                           
                                        ->join('roles', 'roles.rol_id = usuarios.rol_id','left')                                                                           
                                        ->where('usuarios.usuario_id', $usuario_id)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function edita_secretaria($datos_usuario=false,$usuario_id=null,$rol_id=false)
        {
                $recordset=array();
                $recordset['usuario']=$this->db ->where('usuario_id', $usuario_id)
                                                ->update('secretarias',$datos_usuario);

                $usuario["documento_numero"]=$datos_usuario["documento_numero"];
                $recordset['administrador']=$this->db   ->set('usuario', $datos_usuario["documento_numero"])
                                                        ->set('rol_id', $rol_id)
                                                        ->where('usuario_id', $usuario_id)
                                                        ->update('usuarios');
                return $recordset;
        }//funcion edita secretaria

        public function agrega_secretaria($datos_usuario=false, $rol_id=false)
        {
                $recordset=array();
                $fecha_actual=date('Y-m-d H:i:s');
                $recordset["usuario"]=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->set('rol_id', $rol_id)
                                                ->set('alta_usuario', $fecha_actual)
                                                ->set('estado_id', 2)
                                                ->insert('usuarios');
                
                $usuario=$datos_usuario["documento_numero"];
                $datos_usuario["usuario_id"]=$this->db->insert_id();
                $datos_usuario["estado_id"]=2;
                $recordset["secretarias"]=$this->db->insert('secretarias',$datos_usuario);
                return $recordset; 
        }//funcion agrega


        public function estado_usuario($accion=false, $usuario_id=false)
	{
                if ($accion=='desactivar'){
                $this->db->set('estado_id', 1 )
                         ->where('usuario_id', $usuario_id)
                         ->update('secretarias');
                }
                else {
                        if ($accion=='activar'){
                        $this->db->set('estado_id', 2 )
                                 ->where('usuario_id', $usuario_id)
                                 ->update('secretarias');
                        }//iff accion activar
                        else{
                                return "error";
                        }//else error
                        
                }//else iff accion activar
        }// funcion desactiva_usuario
}//turnos_model
?>