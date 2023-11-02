<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_cocineros_model extends CI_Model 
    {
        public function __construct(){
                parent::__construct();
                if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
                    redirect("Login_contr");
                }
        }

        public function listar_cocineros()
        {
                $recordset=array();
                $recordset =   $this->db->select('  usuarios_estados.color,
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    cocineros.nombre,
                                                    cocineros.apellido,
                                                    usuarios_estados.estado,
                                                    cocineros.documento_numero as documento, 
                                                    cocineros.email as email
                                                ')
                                        ->from('cocineros')
                                        ->join('usuarios', 'usuarios.usuario_id = cocineros.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id =cocineros.estado_id','left')                                                                           
                                        ->where('usuarios.rol_id', 4)
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
                                        ->join('cocineros', 'cocineros.usuario_id = usuarios.usuario_id','left')     
                                        ->where('usuarios.usuario', $dni)
                                        ->where('cocineros.documento_numero', $dni)
                                        //->where('usuarios.rol_id', 3)
                                        ->get();
                if (empty($recordset->result_array())){
                        return true;
                }else{//if empty
                        return false;
                }//else if empty
        }//function

        public function listar_cocinero($usuario_id=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    cocineros.nombre,
                                                    cocineros.apellido,
                                                    usuarios_estados.estado,
                                                    cocineros.documento_numero,
                                                    documentos_tipos.documento_tipo,
                                                    cocineros.documento_tipo_id,
                                                    cocineros.fecha_nacimiento,
                                                    cocineros.sexo,
                                                    cocineros.celular1_prefijo,
                                                    cocineros.celular1_numero,
                                                    cocineros.celular2_prefijo,
                                                    cocineros.celular2_numero,
                                                    cocineros.email,
                                                    cocineros.direccion,
                                                    cocineros.direccion_numero,
                                                    cocineros.direccion_depto,
                                                    cocineros.ciudad,
                                                    cocineros.provincia
                                                ')
                                        ->from('cocineros')
                                        ->join('usuarios', 'usuarios.usuario_id = cocineros.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = cocineros.estado_id','left')                                                                           
                                        ->join('documentos_tipos', 'documentos_tipos.documento_tipo_id = cocineros.documento_tipo_id','left')                                                                           
                                        ->where('cocineros.usuario_id', $usuario_id)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function edita_cocinero($datos_usuario,$usuario_id=null)
        {
                $recordset=array();
                $recordset['usuario']=$this->db ->where('usuario_id', $usuario_id)
                                                ->update('cocineros',$datos_usuario);

                $usuario["documento_numero"]=$datos_usuario["documento_numero"];
                $recordset['usuario']=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->where('usuario_id', $usuario_id)
                                                ->update('usuarios');
                return $recordset;
        }//funcion edita cocinero

        public function agrega_cocinero($datos_usuario=false)
        {
                $recordset=array();
                $fecha_actual=date('Y-m-d H:i:s');
                $recordset["usuario"]=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->set('rol_id', 4)
                                                ->set('alta_usuario', $fecha_actual)
                                                ->set('estado_id', 2)
                                                ->insert('usuarios');
                
                $usuario=$datos_usuario["documento_numero"];
                $datos_usuario["usuario_id"]=$this->db->insert_id();
                $datos_usuario["estado_id"]=2;
                $recordset["cocinero"]=$this->db->insert('cocineros',$datos_usuario);
                return $recordset;
        }//funcion agrega


        public function estado_usuario($accion=false, $usuario_id=false)
	{
                if ($accion=='desactivar'){
                $this->db->set('estado_id', 1 )
                         ->where('usuario_id', $usuario_id)
                         ->update('cocineros');
                }
                else {
                        if ($accion=='activar'){
                        $this->db->set('estado_id', 2 )
                                 ->where('usuario_id', $usuario_id)
                                 ->update('cocineros');
                        }//iff accion activar
                        else{
                                return "error";
                        }//else error
                        
                }//else iff accion activar
        }// funcion desactiva_usuario
}//turnos_model
?>