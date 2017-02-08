<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FilterBy_model extends MY_Model {
    function __construct() {
        parent::__construct();
    } 
	/*Done*/
	public function addFilterByInfo($addData) {
        $this->db->insert('filter_by',$addData);
        return $user_id;
    }
	
    public function getFilterByList($page) {
        $sendSMSList = [];
        $query = $this->db->get('filter_by');
        // $this->output->enable_profiler(TRUE);
        foreach ($query->result() as $row) {
            $sendSMSList[] = $row;
        }
		return $sendSMSList;
    } 
	
    public function checkFilterByInfo($did) {
        $this->db->where('id', $did);
        $query = $this->db->get('filter_by');
        return $query;        
    }

    public function updateFilterByInfo($data) {
        $this->db->where('id',$data['id']);
        $this->db->update('filter_by',$data);
		
		return $user_id;
    }
	/*Done*/
}