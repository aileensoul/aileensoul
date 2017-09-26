<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Feedback extends CI_Controller {

    public $data;

public function __construct()
{
  
        parent::__construct();

        if (!$this->session->userdata('aileen_admin')) 
        {
           
            redirect('login', 'refresh');
        }
   
        // Get Site Information
        $this->data['title'] = 'Feedback | Aileensoul';
        $this->data['module_name'] = 'Feedback Management';

         //Loadin Pagination Custome Config File
         $this->config->load('paging', TRUE);
         $this->paging = $this->config->item('paging');
     
        include('include.php');

}

    public function index() {

       // This is userd for pagination offset and limoi start
          $limit = $this->paging['per_page'];
        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $offset = ($this->uri->segment(5) != '') ? $this->uri->segment(5) : 0;

            $sortby = $this->uri->segment(3);

            $orderby = $this->uri->segment(4);

        } else {

            $offset = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : 0;

            $sortby = 'feedback_id';

            $orderby = 'asc';

        }
  
        $this->data['offset'] = $offset;

       $data='feedback_id,first_name,last_name,user_email,subject,description,created_date,is_delete';
       $contition_array = array('is_delete' => '0');
        $this->data['users'] = $this->common->select_data_by_condition('feedback', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str = array(), $groupby = '');
// This is userd for pagination offset and limoi End

      //echo "<pre>";print_r($this->data['users'] );die();

        //This if and else use for asc and desc while click on any field start
        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $this->paging['base_url'] = site_url("feedback/" . $short_by . "/" . $order_by);

        } else {

            $this->paging['base_url'] = site_url("feedback/");

        }

        if ($this->uri->segment(3) != '' && $this->uri->segment(4) != '') {

            $this->paging['uri_segment'] = 5;

        } else {

            $this->paging['uri_segment'] = 3;

        }
        //This if and else use for asc and desc while click on any field End


        $contition_array = array( 'is_delete =' => '0');
        $this->paging['total_rows'] = count($this->common->select_data_by_condition('feedback', $contition_array, 'feedback_id'));

        $this->data['total_rows'] = $this->paging['total_rows'];

        $this->data['limit'] = $limit;

        $this->pagination->initialize($this->paging);

        $this->data['search_keyword'] = '';
        
        $this->load->view('feedback/index', $this->data);
    }

public function delete($id) {
   

   if($id)
                 {
                         $data = array(
                          'is_delete' => 1,
                          ); 
               
              $updatdata =   $this->common->update_data($data,'feedback','feedback_id',$id);

                  if($updatdata){ 
                        $this->session->set_flashdata('success', ' Feedback deleted successfully');
                        redirect('feedback', refresh);
                  }else{
                            $this->session->flashdata('error','Sorry!! Feedback not deleted');
                            redirect('feedback', refresh);
                  }

      }

  }

}