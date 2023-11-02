<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

    class Usuarios_proveedores_model extends CI_Model 
    {
        public function __construct(){
                parent::__construct();
                if(!($this->session->userdata("usuario_id") and $this->session->userdata("usuario"))){
                    redirect("Login_contr");
                }
        }

        public function listar_proveedores()
        {
                $recordset=array();
                $recordset =   $this->db->select('  usuarios_estados.color,
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    proveedores.nombre,
                                                    proveedores.apellido,
                                                    usuarios_estados.estado,
                                                    proveedores.documento_numero as documento, 
                                                    proveedores.email as email
                                                ')
                                        ->from('proveedores')
                                        ->join('usuarios', 'usuarios.usuario_id = proveedores.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id =proveedores.estado_id','left')                                                                           
                                        ->where('usuarios.rol_id', 9)
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
                                        ->join('proveedores', 'proveedores.usuario_id = usuarios.usuario_id','left')     
                                        ->where('usuarios.usuario', $dni)
                                        ->where('proveedores.documento_numero', $dni)
                                        //->where('usuarios.rol_id', 3)
                                        ->get();
                if (empty($recordset->result_array())){
                        return true;
                }else{//if empty
                        return false;
                }//else if empty
        }//function

        public function listar_proveedor($usuario_id=false)
        {
                $recordset=array();
                $recordset =   $this->db->select('
                                                    usuarios.usuario_id,
                                                    usuarios.usuario,
                                                    proveedores.nombre,
                                                    proveedores.apellido,
                                                    usuarios_estados.estado,
                                                    proveedores.documento_numero,
                                                    documentos_tipos.documento_tipo,
                                                    proveedores.documento_tipo_id,
                                                    proveedores.fecha_nacimiento,
                                                    proveedores.sexo,
                                                    proveedores.celular1_prefijo,
                                                    proveedores.celular1_numero,
                                                    proveedores.celular2_prefijo,
                                                    proveedores.celular2_numero,
                                                    proveedores.email,
                                                    proveedores.direccion,
                                                    proveedores.direccion_numero,
                                                    proveedores.direccion_depto,
                                                    proveedores.ciudad,
                                                    proveedores.provincia
                                                ')
                                        ->from('proveedores')
                                        ->join('usuarios', 'usuarios.usuario_id = proveedores.usuario_id','left')     
                                        ->join('usuarios_estados', 'usuarios_estados.estado_id = proveedores.estado_id','left')                                                                           
                                        ->join('documentos_tipos', 'documentos_tipos.documento_tipo_id = proveedores.documento_tipo_id','left')                                                                           
                                        ->where('proveedores.usuario_id', $usuario_id)
                                        ->get();
                return $recordset->result_array();
        }//function

        public function edita_proveedor($datos_usuario,$usuario_id=null)
        {
                $recordset=array();
                $recordset['usuario']=$this->db ->where('usuario_id', $usuario_id)
                                                ->update('proveedores',$datos_usuario);

                $usuario["documento_numero"]=$datos_usuario["documento_numero"];
                $recordset['usuario']=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->where('usuario_id', $usuario_id)
                                                ->update('usuarios');
                return $recordset;
        }//funcion edita proveedor

        public function agrega_proveedor($datos_usuario=false)
        {
                $recordset=array();
                $fecha_actual=date('Y-m-d H:i:s');
                $recordset["usuario"]=$this->db ->set('usuario', $datos_usuario["documento_numero"])
                                                ->set('pass', $datos_usuario["documento_numero"])
                                                ->set('rol_id', 9)
                                                ->set('alta_usuario', $fecha_actual)
                                                ->set('estado_id', 2)
                                                ->insert('usuarios');
                
                $usuario=$datos_usuario["documento_numero"];
                $datos_usuario["usuario_id"]=$this->db->insert_id();
                $datos_usuario["estado_id"]=2;
                $recordset["proveedor"]=$this->db->insert('proveedores',$datos_usuario);
                return $recordset;
        }//funcion agrega


        public function estado_usuario($accion=false, $usuario_id=false)
	{
                if ($accion=='desactivar'){
                $this->db->set('estado_id', 1 )
                         ->where('usuario_id', $usuario_id)
                         ->update('proveedores');
                }
                else {
                        if ($accion=='activar'){
                        $this->db->set('estado_id', 2 )
                                 ->where('usuario_id', $usuario_id)
                                 ->update('proveedores');
                        }//iff accion activar
                        else{
                                return "error";
                        }//else error
                        
                }//else iff accion activar
        }// funcion desactiva_usuario
}//turnos_model
?>