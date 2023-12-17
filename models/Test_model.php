<?php

class Test_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // When you use the model in this way, you solve all Table connections with a single model file.

	
    public function get_all($table = "", $where = [], $order = "id ASC", $limit = null) {
        return $this->db->where($where)->order_by($order)->limit($limit)->get($table)->result();
    }

    public function get_count($table = "", $where = "", $like = []) {
        return $this->db->where($where)->like($like)->count_all_results($table);
    }

    public function get_search($table = "", $where = [], $where2 = "", $order = "id ASC", $limit = null) {
        return $this->db->where($where)->where($where2)->limit($limit)->order_by($order)->get($table)->result();
    }

    public function get($table = "", $where = [], $order = "id ASC", $limit = null) {
        return $this->db->where($where)->order_by($order)->limit($limit)->get($table)->row();
    }

    public function add($table = "", $data = []) {
        return $this->db->insert($table, $data);
    }

    public function update($table = "", $where = [], $data = []) {
        return $this->db->where($where)->update($table, $data);
    }

    public function delete($table = "", $where = []) {
        return $this->db->where($where)->delete($table);
    }
    

}