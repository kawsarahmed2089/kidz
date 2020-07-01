<?php

class MY_Model extends CI_Model {
    const DB_TABLE = 'abstract';
    const DB_TABLE_PK = 'abstract';
    

    private function insert() {
        $this->db->insert($this::DB_TABLE, $this);
        $this->{$this::DB_TABLE_PK} = $this->db->insert_id();
    }
    

    private function update() {
        $this->db->update($this::DB_TABLE, $this, $this::DB_TABLE_PK);
    }
    

    public function populate($row) {
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }
    

    public function load($id) {
        $query = $this->db->get_where($this::DB_TABLE, array(
            $this::DB_TABLE_PK => $id,
        ));
        $this->populate($query->row());
    }
    
    public function load_any($attribut_name,$attribut_value) {
        $query = $this->db->get_where($this::DB_TABLE, array(
            $attribut_name => $attribut_value,
        ));
        $this->populate($query->row());
    }
    

    public function delete() {
        $this->db->delete($this::DB_TABLE, array(
           $this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK}, 
        ));
        unset($this->{$this::DB_TABLE_PK});
    }
    

    public function save() {
        if (isset($this->{$this::DB_TABLE_PK})) {
            $this->update();
        }
        else {
            $this->insert();
			return $this->db->insert_id();
        }
    }
    

    public function get($limit = 0, $offset = 0,$order_by = '') {
        if ($limit) {
				if($order_by){$this->db->order_by($order_by,'desc');}
            $query = $this->db->get($this::DB_TABLE, $limit, $offset);
        }
        else {
				if($order_by){$this->db->order_by($order_by,'asc');}
            $query = $this->db->get($this::DB_TABLE);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
    }
}