<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_profesionales_model extends CI_Model 
    {
        public function __construct(){
                parent::__construct();
                if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
                    redirect("Login_contr");
                }
        }

        public function listar_profesionales()
        {
                $recordset=array();
                $recordset =   $this->db->select('  usuarios_estados.color,
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    medicos.nombre,
                                                    medicos.apellido,
                                                    usuarios_estados.estado,
                                                    medicos.documento_numero as documento, 
                                                    medicos.email as email
                                                ')
                                        ->from('medicos')
                                        ->join('usuarios', 'usuarios.usuario_id = medicos.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = medicos.estado_id','left')                                                                           
                                        ->where('usuarios.rol_id', 4)
                                        ->get();
                return $recordset->result_array();
        }//function
        
        public function listar_profesional($usuario_id=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    medicos.nombre,
                                                    medicos.apellido,
                                                    usuarios_estados.estado,
                                                    medicos.documento_numero, 
                                                    documentos_tipos.documento_tipo,
                                                    medicos.documento_tipo_id,
                                                    medicos.fecha_nacimiento,
                                                    medicos.sexo,
                                                    medicos.matricula,
                                                    medicos.celular1_prefijo,
                                                    medicos.celular1_numero,
                                                    medicos.celular2_prefijo,
                                                    medicos.celular2_numero,
                                                    medicos.email,
                                                    medicos.direccion,
                                                    medicos.direccion_numero,
                                                    medicos.direccion_depto,
                                                    medicos.ciudad,
                                                    medicos.provincia
                                                ')
                                        ->from('medicos')
                                        ->join('usuarios', 'usuarios.usuario_id = medicos.usuario_id','left')     
                                        ->join('documentos_tipos', 'documentos_tipos.documento_tipo_id = medicos.documento_tipo_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = medicos.estado_id','left')                                                                           
                                        ->where('usuarios.usuario_id', $usuario_id)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function edita_profesional($datos_usuario,$usuario_id=null)
        {
                $recordset=array();
                $recordset['usuario']=$this->db ->where('usuario_id', $usuario_id)
                                                ->update('medicos',$datos_usuario);

                $usuario["documento_numero"]=$datos_usuario["documento_numero"];
                $recordset['profesional']=$this->db     ->set('usuario', $datos_usuario["documento_numero"])
                                                        ->where('usuario_id', $usuario_id)
                                                        ->update('usuarios');
                return $recordset;
        }//funcion edita profesional

        public function agrega_profesional($datos_usuario=false)
        {
                $recordset=array();
                $fecha_actual=date('Y-m-d H:i:s');
                $recordset["usuario"]=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('rol_id', 4)
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->set('alta_usuario', $fecha_actual)
                                                ->set('estado_id', 2)
                                                ->insert('usuarios');
                
                $usuario=$datos_usuario["documento_numero"];
                $datos_usuario["estado_id"]=2;
                $datos_usuario["usuario_id"]=$this->db->insert_id();
                $recordset["profesional"]=$this->db->insert('medicos',$datos_usuario);                
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
                                        ->join('medicos', 'medicos.usuario_id = usuarios.usuario_id','left')     
                                        ->where('usuarios.usuario', $dni)
                                        ->where('medicos.documento_numero', $dni)
                                        //->where('usuarios.rol_id', 3)
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
                         ->update('medicos');
                }
                else {
                        if ($accion=='activar'){
                        $this->db->set('estado_id', 2 )
                                 ->where('usuario_id', $usuario_id)
                                 ->update('medicos');
                        }//iff accion activar
                        else{
                                return "error";
                        }//else error
                        
                }//else iff accion activar
        }// funcion desactiva_usuario
}//turnos_model
?>