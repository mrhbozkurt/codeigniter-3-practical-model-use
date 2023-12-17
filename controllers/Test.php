<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

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

    }


}