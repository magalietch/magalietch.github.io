<?php
 defined('BASEPATH') OR exit('No se permite el ingreso sin iniciar sesión');

class Traducciondefecha_model extends CI_Model {

function __construct()
{
    // Call the Model constructor
    parent::__construct();
    $this->db->query("SET lc_time_names = 'es_ES'");
}
}

?>