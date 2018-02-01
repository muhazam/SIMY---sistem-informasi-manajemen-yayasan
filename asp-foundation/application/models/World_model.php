<?php

class World_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function json() {
        $this->datatables->select('ID,city.Name as namakota,city.Population as populasi,country.Name as namanegara');
        $this->datatables->from('city');
        $this->datatables->join('country', 'city.CountryCode = country.Code');
        $this->datatables->add_column('view', '<a href="world/edit/$1">edit</a> | <a href="world/delete/$1">delete</a>', 'ID');
        return $this->datatables->generate();
    }
}