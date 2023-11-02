<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_pacientes_model extends CI_Model 
    {
        public function __construct(){
                parent::__construct();
                if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
                    redirect("Login_contr");
                }
        }
        public function listar_pacientes()
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                    usuarios.usuario_id,
                                                    usuarios_estados.color,
                                                    usuarios.usuario,
                                                    pacientes.nombre,
                                                    pacientes.apellido,
                                                    usuarios_estados.estado,
                                                    pacientes.documento_numero as documento, 
                                                    pacientes.email as email
                                                ')
                                        ->from('usuarios')
                                        //->join('pacientes', 'pacientes.usuario_id = usuarios.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = pacientes.estado_id','left')                                                                           
                                        ->where('usuarios.rol_id', 6)
                                        ->get();
                return $recordset->result_array();
        }//function
        
        public function listar_paciente($usuario_id=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                   usuarios.usuario_id,
                                                   usuarios.usuario,
                                                   pacientes.nombre,
                                                   pacientes.apellido,
                                                   usuarios_estados.estado,
                                                   pacientes.documento_numero,
                                                   documentos_tipos.documento_tipo, 
                                                   pacientes.documento_tipo_id,
                                                   pacientes.fecha_nacimiento,
                                                   pacientes.sexo,
                                                   pacientes.celular1_prefijo,
                                                   pacientes.celular1_numero,
                                                   pacientes.celular2_prefijo,
                                                   pacientes.celular2_numero,
                                                   pacientes.email,
                                                   pacientes.direccion,
                                                   pacientes.direccion_numero,
                                                   pacientes.direccion_depto,
                                                   pacientes.ciudad,
                                                   pacientes.provincia
                                                ')
                                        ->from('pacientes')
                                        ->join('usuarios', 'usuarios.usuario_id = pacientes.usuario_id','left')     
                                        ->join('documentos_tipos', 'documentos_tipos.documento_tipo_id = pacientes.documento_tipo_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id =pacientes.estado_id','left')                                                                           
                                        ->where('usuarios.usuario_id', $usuario_id)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function edita_paciente($datos_usuario,$usuario_id=null)
        {
                $recordset=array();
                $recordset['usuario']=$this->db ->where('usuario_id', $usuario_id)
                                                ->update('pacientes',$datos_usuario);

                $usuario["documento_numero"]=$datos_usuario["documento_numero"];
                $recordset['paciente']=$this->db->set('usuario', $datos_usuario["documento_numero"])
                                                ->where('usuario_id', $usuario_id)
                                                ->update('usuarios');
                return $recordset;
        }//funcion edita paciente

        public function agrega_paciente($datos_usuario=false)
        {
                $recordset=array();
                $fecha_actual=date('Y-m-d H:i:s');
                $recordset["usuario"]=$this->db->set('usuario', $datos_usuario["documento_numero"])
                        ->set('pass', $datos_usuario["documento_numero"])
                        ->set('rol_id', 6)
                        ->set('alta_usuario', $fecha_actual)
                        ->set('estado_id', 2)
                        ->insert('usuarios');
                
                $usuario=$datos_usuario["documento_numero"];
                $datos_usuario["usuario_id"]=$this->db->insert_id();
                $recordset["usuario_id"]=$this->db->insert_id();
                $datos_usuario["estado_id"]=2;
                $recordset["clientes"]=$this->db->insert('clientes',$datos_usuario);
                return $recordset; 
        }//funcion agrega

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
                                        ->join('clientes', 'clientes.usuario_id = usuarios.usuario_id','left')     
                                        ->where('usuarios.usuario', $dni)
                                        ->where('clientes.documento_numero', $dni)
                                        //->where('usuarios.rol_id', 6)
                                        ->get();
                if (empty($recordset->result_array())){
                        return true;
                }else{//if empty
                        return false;
                }//else if empty
        }//function

        public function estado_usuario($accion=false, $usuario_id=false)
	{
                if ($accion=='desactivar'){
                $this->db->set('estado_id', 1 )
                         ->where('usuario_id', $usuario_id)
                         ->update('pacientes');
                }
                else {
                        if ($accion=='activar'){
                        $this->db->set('estado_id', 2 )
                                 ->where('usuario_id', $usuario_id)
                                 ->update('pacientes');
                        }//iff accion activar
                        else{
                                return "error";
                        }//else error
                        
                }//else iff accion activar
        }// funcion desactiva_usuario
}//turnos_model
?>