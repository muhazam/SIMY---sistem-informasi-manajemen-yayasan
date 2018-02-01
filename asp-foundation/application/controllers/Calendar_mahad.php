<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_mahad extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->library("ssp");
        $this->load->model("Calendar_model_mahad");
        cek_akses_module();
    }

    public function data() {
        $table = 'calendar_events_mahad';
        $primaryKey = 'ID';
        $columns = array(
            array('db' => 'ID', 'dt' => 'ID'),
            array('db' => 'title', 'dt' => 'title'),
            array('db' => 'start', 'dt' => 'start'),
            array('db' => 'end', 'dt' => 'end'),
            array('db' => 'description', 'dt' => 'description'),
            array(
                'db' => 'ID',
                'dt' => 'aksi',
                'formatter' => function( $d) {
                    return anchor('calendar_mahad/delete/'.$d,'<i class="fa fa-trash"></i>','class="btn btn-xs btn-danger btn-flat tooltips" data-placement="top" title="Delete"').'
                         '.anchor('calendar_mahad/details/'.$d,'<i class="fa fa-eye"></i>','class="btn btn-xs btn-primary btn-flat tooltips" data-placement="top" title="Details"');;
                }
            )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );

        echo json_encode(
                SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
        );
    }


    public function index() {
        // $this->load->view("calendar/index.php", array());
        $this->template->load('template', 'calendarevent/event_mahad/event_mahad');
    }

    function modul() {
        $this->template->load('template', 'calendarevent/event_mahad/modul');
    }

    function delete(){

        $ID = $this->uri->segment(3);
        if(!empty($ID)){
            // proses delete data
            $this->db->where('ID',$ID);
            $this->db->delete('calendar_events_mahad');
        }
        redirect('calendar_mahad/modul');
    }

    public function details($ID) {

        $row = $this->Calendar_model_mahad->get_by_id($ID);
        if ($row) {
            $data = array(
        'ID'            => $row->ID,
        'title'         => $row->title,
        'start'         => $row->start,
        'end'           => $row->end,
        'description'   => $row->description
        );
            $this->template->load('template','calendarevent/event_mahad/details', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('calendar_mahad/list');
        }
    }

    public function get_events() {
	     // Our Start and End Dates
	     $start    = $this->input->get("start");
	     $end      = $this->input->get("end");

	     $startdt  = new DateTime('now'); // setup a local datetime
	     $startdt->setTimestamp($start); // Set the date based on timestamp
	     $start_format = $startdt->format('Y-m-d H:i:s');

	     $enddt    = new DateTime('now'); // setup a local datetime
	     $enddt->setTimestamp($end); // Set the date based on timestamp
	     $end_format = $enddt->format('Y-m-d H:i:s');

	     $events   = $this->Calendar_model_mahad->get_events($start_format, $end_format);

	     $data_events = array();

	     foreach($events->result() as $r) {

	         $data_events[] = array(
	             "id"          => $r->ID,
	             "title"       => $r->title,
	             "description" => $r->description,
	             "end"         => $r->end,
	             "start"       => $r->start
	         );
	     }

	     echo json_encode(array("events" => $data_events));
	     exit();
	 }

    public function add_event() {
	    /* Our calendar data */
	    $name          = strtoupper($this->input->post("name", TRUE));
	    $desc          = $this->input->post("description", TRUE);
	    $start_date    = $this->input->post("start_date", TRUE);
	    $end_date      = $this->input->post("end_date", TRUE);

	    if(!empty($start_date)) {
	       $sd                     = DateTime::createFromFormat("Y/m/d H:i", $start_date);
	       $start_date             = $sd->format('Y-m-d H:i:s');
	       $start_date_timestamp   = $sd->getTimestamp();
	    } else {
	       $start_date             = date("Y-m-d H:i:s", time());
	       $start_date_timestamp   = time();
	    }

	    if(!empty($end_date)) {
	       $ed                     = DateTime::createFromFormat("Y/m/d H:i", $end_date);
	       $end_date               = $ed->format('Y-m-d H:i:s');
	       $end_date_timestamp     = $ed->getTimestamp();
	    } else {
	       $end_date               = date("Y-m-d H:i:s", time());
	       $end_date_timestamp     = time();
	    }

	    $this->Calendar_model_mahad->add_event(array(
	       "title"         => $name,
	       "description"   => $desc,
	       "start"         => $start_date,
	       "end"           => $end_date
	       )
	    );

	    redirect(site_url("calendar_mahad"));
	}

    public function edit_event() 
    {
        $eventid    = intval($this->input->post("eventid"));
        $event      = $this->Calendar_model_mahad->get_event($eventid);
        if($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name       = strtoupper($this->input->post("name"));
        $desc       = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date   = $this->input->post("end_date");
        $delete     = intval($this->input->post("delete"));

        if(!$delete) {

            if(!empty($start_date)) {
                $sd                     = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                $start_date             = $sd->format('Y-m-d H:i:s');
                $start_date_timestamp   = $sd->getTimestamp();
            } else {
                $start_date             = date("Y-m-d H:i:s", time());
                $start_date_timestamp   = time();
            }

            if(!empty($end_date)) {
                $ed                     = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                $end_date               = $ed->format('Y-m-d H:i:s');
                $end_date_timestamp     = $ed->getTimestamp();
            } else {
                $end_date               = date("Y-m-d H:i:s", time());
                $end_date_timestamp     = time();
            }

            $this->Calendar_model_mahad->update_event($eventid, array(
                "title"                 => $name,
                "description"           => $desc,
                "start"                 => $start_date,
                "end"                   => $end_date,
                )
            );
            
        } else {
            $this->Calendar_model_mahad->delete_event($eventid);
        }

        redirect(site_url("calendar_mahad"));
    }

}
