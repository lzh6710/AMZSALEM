<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Consts
{
    private $CI;
    public function __construct()
    {
        $this->CI = & get_instance();
        $this->setConstants();
    }
    private function setConstants()
    {
        $query = $this->CI->db->get('amz_config');
        foreach($query->result() as $row)
        {
            define((string)$row->name, $row->configValue);
        }
        return ;
    }
}
?> 