# codeigniter-3-practical-model-use
 Codeigniter 3 provides an example of the most practical use of the model. There is a related explanation in the coding. This code is the most practical way so far to create a single model file with unlimited table connections.

// When you use the model in this way, you solve all Table connections with a single model file.

MODEL:

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

    
CONTROLLERS

 // As seen below, we can perform operations such as "all data", "single data", "add new data", "update data", "delete data" by connecting to only one model. 
 // It can be used unlimitedly by changing the "table name" in the table connections here.

        
        // ALL DATA
        $get_all = $this->test_model->get_all("tablo_name", ["which" => 1], "id ASC");

        // ONE DATA
        $get = $this->test_model->get("tablo_name", ["id" => 1]);


        // NEW DATA
        $add_data = [
            'id' => 1,
            'which' => 1,
            'date' => date("Y-m-d H:i:s")
        ];

        $this->test_model->add("tablo_name", $add_data);


        // UPDATE DATA
        $update_data = [
            'which' => 1,
            'date' => date("Y-m-d H:i:s")
        ];

        $this->test_model->update("tablo_name", ["id" => 1], $update_data);


        // DELETE DATA
        $this->test_model->delete("tablo_name", ["id" => 1]);

        
    
