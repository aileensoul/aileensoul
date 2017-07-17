<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Chat_model extends CI_Model {  
  
	function add_message($message, $nickname, $guid,$userid,$id, $message_from_profile, $message_from_profile_id, $message_to_profile, $message_to_profile_id)
	{
                date_default_timezone_set('Asia/Calcutta');
		$data1 = array(
			'message'	=> (string) $message,
			'nickname'	=> (string) $nickname,
			'message_from'	=> (string) $userid,
			'message_to'	=> (string) $id,
			'message_from_profile'	=> (int) $message_from_profile,
			'message_from_profile_id'	=> (int) $message_from_profile_id,
			'message_to_profile'	=> (int) $message_to_profile,
			'message_to_profile_id'	=> (int) $message_to_profile_id,
			'guid'		=> (string) $guid,
			'timestamp'	=> time(),
		);
		  
		$this->db->insert('messages', $data1);
                $msg_insert_id = $this->db->insert_id();
                
                if($message_from_profile == 1){
                    $not_from = 2; 
                }
                elseif($message_from_profile == 2){
                    $not_from = 1;
                }
                elseif($message_from_profile == 3){
                    $not_from = 5;
                }
                elseif($message_from_profile == 4){
                    $not_from = 4;
                }
                elseif($message_from_profile == 5){
                    $not_from = 6;
                }
                else{
                    $not_from = 3;
                }
               
                $data2 = array(
			'not_type'	=> 2,
			'not_from_id'	=> $userid,
			'not_to_id'	=> $id,
                        'not_read' => 2,
                        'not_img' => 0,                       
                        'not_active' => 1,
                        'not_from' => $not_from,
                        'not_product_id' => $msg_insert_id,
                        'not_created_date' => date('Y-m-d H:i:s'),
			
		);
		  
		$this->db->insert('notification', $data2);
	}
 
	function get_messages($timestamp,$userid,$id,$message_from_profile,$message_to_profile)
	{ 

	// khyati start 
        
       $this->db->where('timestamp >', $timestamp);
       $where = '((message_from="' . $userid . '"AND message_to ="' . $id . '") OR (message_to="' . $userid . '" AND message_from ="' . $id . '")) AND message_from_profile = "'.$message_from_profile.'" AND message_to_profile ="'.$message_to_profile.'" ';
       $this->db->where($where);

		// khyati end
		
		//$this->db->where('message_from', $userid);
		//$this->db->where('message_to', $id);
		$this->db->order_by('timestamp', 'DESC');
	//	$this->db->limit(10); 
		$query = $this->db->get('messages');
		//echo $this->db->last_query(); die();
		return array_reverse($query->result_array());
	}
 
}