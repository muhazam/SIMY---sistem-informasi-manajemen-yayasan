<?php

class Calendar_Model_global extends CI_Model {

    public $table = "calendar_events_global";
    public $ID   = "ID";

    function get_by_id($ID) {
        $this->db->where($this->ID, $ID);
        return $this->db->get($this->table)->row();
    }

    public function get_events($start, $end) {
        return $this->db
            ->where("start >=", $start)
            ->where("end <=", $end)
            ->get("calendar_events_global");
    }

    public function add_event($data) {
        $this->db->insert("calendar_events_global", $data);
    }

    public function get_event($id) {
        return $this->db->where("ID", $id)->get("calendar_events_global");
    }

    public function update_event($id, $data) {
        $this->db->where("ID", $id)->update("calendar_events_global", $data);
    }

    public function delete_event($id) {
        $this->db->where("ID", $id)->delete("calendar_events_global");
    }

    public function get() {
      $query = $this->db->get($this->table);
      return $query;
    }
 
    public function get_where($where) {
      $query = $this->db
        ->where($where)
        ->get($this->table); 
      return $query;
    }
 
}