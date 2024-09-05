<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_db extends CI_Model {
    public function Get_user_by_id($tbl_name,$clm_name,$user_id) {
        return $this->db->get_where($tbl_name, array($clm_name => $user_id))->row();
    }

    public function Get_All_byid($tbl_name,$clm_name,$user_id) {
        return $this->db->get_where($tbl_name, array($clm_name => $user_id))->result_array();
    }
    public function insert_All($tblnya,$data)
    {
        return $this->db->insert($tblnya, $data);
    }
    public function insert_AllandGetid($tblnya,$data)
    {
        $this->db->insert($tblnya, $data);
        return $this->db->insert_id();
    }
    public function insert_Allid($data) {
        $this->db->insert('folders', $data);
        return $this->db->insert_id();
    }

    public function delete_Data($tbl,$clm,$id_user) {
        $this->db->where($clm, $id_user);
        $ress = $this->db->delete($tbl);
        if ($ress) {
            return true;
        } else {
            return false;
        }

    }
    public function get_All_data($tbl_name){
        $query = $this->db->query('SELECT * FROM `'.$tbl_name.'`')->result_array();
        return $query;
    }

    public function getDataLevel($location_id,$level){
        $query = $this->db->query('SELECT * FROM `t_level_akun` WHERE role_id='.$level.' AND location_id = '.$location_id.';')->row();
        return $query;
    }

    public function update_Data($tbl_name,$clm_name,$user_id ,$datas) {
      $qry = $this->db->where($clm_name, $user_id);
      $qry = $this->db->update($tbl_name, $datas);
      return $qry;
    }

    public function Countdb($table)
    {
        $this->db->from($table);
        $count = $this->db->count_all_results();
        return $count;
    }
    public function Countdbbyid($table,$clm,$id)
    {
        $this->db->from($table);
        $this->db->where($clm, $id);
        $count = $this->db->count_all_results();
        return $count;
    }


}