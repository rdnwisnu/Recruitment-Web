<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitment_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($table)
    {

        return $this->db->get($this->$table)->result();
    }
    
    public function getById($table,$id)
    {
        $result = $this->db->get_where($table, ["users_id" => $id])->row();
        return $result;
    }

    public function getByWhere($table,$where)
    {
        $result = $this->db->get_where($table, $where)->row();
        return $result;
    }

    public function insert($table,$data)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function update($table,$data,$where)
    {
        $result = $this->db->update($table, $data, $where);
        return $result;
    }

    public function delete($table, $where)
    {
        $result = $this->db->delete($table, $where);
        return $result;
    }

    public function countAll($table,$condition){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($condition);
        $num_results = $this->db->count_all_results();
        if ($num_results > 0){
            return True;
        }else{
            return False;
        }
    }
}
