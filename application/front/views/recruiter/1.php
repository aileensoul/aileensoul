<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//if (!$_SERVER['HTTP_REFERER']) $this->redirect('/home');

class Job extends MY_Controller {

    public $data;

    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('email_model');
        if (!$this->session->userdata('aileenuser')) {
            redirect('login', 'refresh');
        }

        include ('include.php');
        $this->data['aileenuser_id'] = $this->session->userdata('aileenuser');
    }

    //job seeker basic info controller start

    public function index() {


        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'status' => '0');
        $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if ($jobdata) {

            $this->load->view('job/reactivate', $this->data);
        } else {

            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
            $this->data['job'] = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $contition_array = array('user_id' => $userid, 'status' => '1');
            $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('status' => 1);
            $this->data['language1'] = $this->common->select_data_by_condition('language', $contition_array, $data = '*', $sortby = 'language_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $contition_array = array('status' => '1');
            $this->data['nation'] = $this->common->select_data_by_condition('nation', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            if ($jobdata[0]['job_step'] == 1) {
                redirect('job/job_address_update', refresh);
            } else if ($jobdata[0]['job_step'] == 2) {
                redirect('job/job_education_update', refresh);
            } else if ($jobdata[0]['job_step'] == 3) {
                redirect('job/job_project_update', refresh);
            } else if ($jobdata[0]['job_step'] == 4) {
                redirect('job/job_skill_update', refresh);
            } else if ($jobdata[0]['job_step'] == 5) {
                redirect('job/job_apply_for_update', refresh);
            } else if ($jobdata[0]['job_step'] == 6) {
                redirect('job/job_work_exp_update', refresh);
            } else if ($jobdata[0]['job_step'] == 7) {
                redirect('job/job_curricular_update', refresh);
            } else if ($jobdata[0]['job_step'] == 8) {
                redirect('job/job_reference_update', refresh);
            } else if ($jobdata[0]['job_step'] == 9) {
                redirect('job/job_carrier_update', refresh);
            } else if ($jobdata[0]['job_step'] == 10) {
                redirect('job/job_all_post', refresh);
            } else {
                $this->load->view('job/index', $this->data);
            }
        }
    }

    public function job_basicinfo_update() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('status' => '1');
        $this->data['nation'] = $this->common->select_data_by_condition('nation', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('status' => 1);
        $this->data['language1'] = $this->common->select_data_by_condition('language', $contition_array, $data = '*', $sortby = 'language_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 1 || $step > 1) {
                $this->data['fname1'] = $userdata[0]['fname'];
                $this->data['lname1'] = $userdata[0]['lname'];
                $this->data['email1'] = $userdata[0]['email'];
                $this->data['phnno1'] = $userdata[0]['phnno'];
                $this->data['marital_status1'] = $userdata[0]['marital_status'];
                $this->data['nationality1'] = $userdata[0]['nationality'];
                $this->data['language2'] = $userdata[0]['language'];
                $this->data['dob1'] = $userdata[0]['dob'];
                $this->data['gender1'] = $userdata[0]['gender'];
            }
        }

        $skildata = explode(',', $userdata[0]['language']);
        $this->data['selectdata'] = $skildata;


// code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_post);die();
        $contition_array = array('status' => '1', 'type' => '1');
        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);
        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);
        

        $this->load->view('job/index', $this->data);
    }

    public function job_basicinfo_insert() {


        $userid = $this->session->userdata('aileenuser');

        $this->form_validation->set_rules('fname', 'Firstname', 'required');
        $this->form_validation->set_rules('lname', 'Lastname', 'required');
        $this->form_validation->set_rules('email', 'Store  email', 'required|valid_email');
        $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required');
        $this->form_validation->set_rules('language[]', 'Language', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        $language = $this->input->post('language');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('job/index');
        } else {
            //get data by id only

            $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
            $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            if ($userdata) {
                if ($userdata[0]['job_step'] == 10) {
                    $data = array(
                        'job_step' => 10
                    );
                    $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
                }
                if ($userdata[0]['job_step'] > 1) {
                    $data = array(
                        'job_step' => $userdata[0]['job_step']
                    );
                    $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
                }
                $bod = $this->input->post('dob');
                $bod = str_replace('/', '-', $bod);
                $data = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'phnno' => $this->input->post('phnno'),
                    'marital_status' => $this->input->post('marital_status'),
                    'nationality' => $this->input->post('nationality'),
                    'language' => implode(",", $language),
                    'dob' => date('Y-m-d', strtotime($bod)),
                    'gender' => $this->input->post('gender'),
                    'user_id' => $userid,
                    'modified_date' => date('Y-m-d h:i:s', time())
                );

                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
                if ($updatedata) {
                    $this->session->set_flashdata('success', 'Basic information updated successfully');
                    redirect('job/job_address_update', refresh);
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('job/job_basicinfo_update', refresh);
                }
            } else {

                $data = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'phnno' => $this->input->post('phnno'),
                    'marital_status' => $this->input->post('marital_status'),
                    'nationality' => $this->input->post('nationality'),
                    'language' => implode(",", $language),
                    'dob' => $this->input->post('dob'),
                    'gender' => $this->input->post('gender'),
                    'status' => 1,
                    'is_delete' => 0,
                    'created_date' => date('Y-m-d h:i:s', time()),
                    'user_id' => $userid,
                    'job_step' => 1
                );

                $insert_id = $this->common->insert_data_getid($data, 'job_reg');
                if ($insert_id) {
                    $this->session->set_flashdata('success', 'Basic information updated successfully');
                    redirect('job/job_address_update');
                } else {
                    $this->session->flashdata('error', 'Sorry!! Your data not inserted');
                    redirect('job/job_basicinfo_update', 'refresh');
                }
            }
        }
    }

//job seeker basic info controller end
//job seeker email already exist checking controller start

    public function check_email() {

        $email = $this->input->post('email');

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $email1 = $userdata[0]['email'];


        if ($email1) {
            $condition_array = array('is_delete' => '0', 'user_id !=' => $userid, 'status' => '1');

            $check_result = $this->common->check_unique_avalibility('job_reg', 'email', $email, '', '', $condition_array);
        } else {

            $condition_array = array('is_delete' => '0', 'status' => '1');

            $check_result = $this->common->check_unique_avalibility('job_reg', 'email', $email, '', '', $condition_array);
        }

        if ($check_result) {
            echo 'true';
            die();
        } else {
            echo 'false';
            die();
        }
    }

//job seeker email already exist checking controller End
//job seeker address controller start
    public function job_address_update() {
        $userid = $this->session->userdata('aileenuser');

        //for getting country data
        $contition_array = array('status' => 1);
        $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        //for getting state data
        $contition_array = array('status' => 1);
        $this->data['states'] = $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //for getting city data
        $contition_array = array('status' => 1);
        $this->data['cities'] = $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        //for getting job registration table data    
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 2 || $step > 2 || ($step >= 1 && $step <= 2)) {
                $this->data['country1'] = $userdata[0]['country_id'];
                $this->data['state1'] = $userdata[0]['state_id'];
                $this->data['city1'] = $userdata[0]['city_id'];
                $this->data['pincode1'] = $userdata[0]['pincode'];
                $this->data['address1'] = $userdata[0]['address'];
                $this->data['country1_permenant'] = $userdata[0]['country_permenant'];
                $this->data['state1_permenant'] = $userdata[0]['state_permenant'];
                $this->data['city1_permenant'] = $userdata[0]['city_permenant'];
                $this->data['pincode1_permenant'] = $userdata[0]['pincode_permenant'];
                $this->data['address1_permenant'] = $userdata[0]['address_permenant'];
            }
        }

        // code for search
        $contition_array = array('re_status' => '1');
        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name,other_skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);
        $this->load->view('job/job_address', $this->data);
    }

    public function ajax_data() {

        // ajax for degree start

        if (isset($_POST["degree_id"]) && !empty($_POST["degree_id"])) {
            //Get all state data
            $contition_array = array('degree_id' => $_POST["degree_id"], 'status' => 1);
            $stream = $this->data['stream'] = $this->common->select_data_by_condition('stream', $contition_array, $data = '*', $sortby = 'stream_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //Count total number of rows
            //Display states list
            if (count($stream) > 0) {
                echo '<option value="">Select stream</option>';
                foreach ($stream as $st) {
                    echo '<option value="' . $st['stream_id'] . '">' . $st['stream_name'] . '</option>';
                }
            } else {
                echo '<option value="">Stream not available</option>';
            }
        }

        // ajax for degree end

        if (isset($_POST["country_id"]) && !empty($_POST["country_id"])) {
            //Get all state data
            $contition_array = array('country_id' => $_POST["country_id"], 'status' => 1);
            $state = $this->data['states'] = $this->common->select_data_by_condition('states', $contition_array, $data = '*', $sortby = 'state_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            //Count total number of rows
            //Display states list
            if (count($state) > 0) {
                echo '<option value="">Select state</option>';
                foreach ($state as $st) {
                    echo '<option value="' . $st['state_id'] . '">' . $st['state_name'] . '</option>';
                }
            } else {
                echo '<option value="">State not available</option>';
            }
        }

        if (isset($_POST["state_id"]) && !empty($_POST["state_id"])) {
            //Get all city data
            $contition_array = array('state_id' => $_POST["state_id"], 'status' => 1);
            $city = $this->data['city'] = $this->common->select_data_by_condition('cities', $contition_array, $data = '*', $sortby = 'city_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            //Display cities list
            if (count($city) > 0) {
                echo '<option value="">Select city</option>';
                foreach ($city as $cit) {
                    echo '<option value="' . $cit['city_id'] . '">' . $cit['city_name'] . '</option>';
                }
            } else {
                echo '<option value="">City not available</option>';
            }
        }
    }

    public function job_address_insert() {
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($this->input->post('previous')) {
            redirect('job/job_basicinfo_update', refresh);
        }
        if ($this->input->post('next')) {  //echo "hii"; die();
            $contition_array = array('status' => 1);
            $this->data['countries'] = $this->common->select_data_by_condition('countries', $contition_array, $data = '*', $sortby = 'country_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
            $this->form_validation->set_rules('address', 'address', 'required');
            $this->form_validation->set_rules('country_permenant', 'country', 'required');
            $this->form_validation->set_rules('state_permenant', 'state', 'required');
            $this->form_validation->set_rules('address_permenant', 'address', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('job/job_address', $this->data);
            } else {

                if ($userdata[0]['job_step'] == 10) {
                    $data = array(
                        'job_step' => 10
                    );

                    $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
                } else if ($userdata[0]['job_step'] > 2) {
                    $data = array(
                        'job_step' => $userdata[0]['job_step']
                    );

                    $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
                } else {
                    $data = array(
                        'job_step' => 2
                    );

                    $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
                }

                $data = array(
                    'country_id' => $this->input->post('country'),
                    'state_id' => $this->input->post('state'),
                    'city_id' => $this->input->post('city'),
                    'address' => $this->input->post('address'),
                    'pincode' => $this->input->post('pincode'),
                    'country_permenant' => $this->input->post('country_permenant'),
                    'state_permenant' => $this->input->post('state_permenant'),
                    'city_permenant' => $this->input->post('city_permenant'),
                    'address_permenant' => $this->input->post('address_permenant'),
                    'pincode_permenant' => $this->input->post('pincode_permenant'),
                    'modified_date' => date('Y-m-d h:i:s', time())
                );


                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

                if ($updatedata) {

                    $this->session->set_flashdata('success', 'Address updated successfully');
                    redirect('job/job_education_update');
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('job/job_address_update', 'refresh');
                }
            }
        }
    }

    //job seeker address controller end
    //job seeker EDUCATION controller start
    public function job_education_update() {

        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);

        //for getting degree data
        $contition_array = array('status' => 1);
        $this->data['degree_data'] = $this->common->select_data_by_condition('degree', $contition_array, $data = '*', $sortby = 'degree_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //for getting univesity data
        $contition_array = array('status' => 1);
        $this->data['university_data'] = $this->common->select_data_by_condition('university', $contition_array, $data = '*', $sortby = 'university_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 3 || ($step >= 1 && $step <= 3) || $step > 3) {

                $userid = $this->session->userdata('aileenuser');

                $contition_array = array('user_id' => $userid, 'grad_step' => 1, 'status' => 1);
                $jobdata1 = $this->data['jobdata1'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                // echo "<pre>";print_r( $this->data['jobdata']);die();
            }
        }

        // code for search
        $contition_array = array('re_status' => '1');
        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name,other_skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);

        //For Counting user education data start

        /* $contition_array = array('user_id' => $userid);
          $this->data['edudata']= $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = ''); */

        // echo "<pre>";print_r(($this->data['degree1']));die();
        //For Counting user education data End

        $this->load->view('job/job_education', $this->data);
    }

//Insert Primary Education Data start
    public function job_education_primary_insert() {
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //upload education certificate process start
        $config['upload_path'] = 'uploads/job_edu_certificate/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
        // $config['file_name'] = $_FILES['picture']['name'];
        $config['file_name'] = $_FILES['edu_certificate_primary']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('edu_certificate_primary')) {
            $uploadData = $this->upload->data();
            //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
            $certificate = $uploadData['file_name'];
            // echo $certificate;die();
        } else {
            $certificate = '';
        }
        //upload education certificate process End

        $contition_array = array('user_id' => $userid);
        $userdata = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $edu_certificate_primary = $_FILES['edu_certificate_primary']['name'];

            if ($edu_certificate_primary == "") {
                $data = array(
                    'edu_certificate_primary' => $this->input->post('image_hidden_primary')
                );
            } else {
                $data = array(
                    'edu_certificate_primary' => $certificate
                );
            }

            $updatedata = $this->common->update_data($data, 'job_add_edu', 'user_id', $userid);

            $data = array(
                'user_id' => $userid,
                'board_primary' => $this->input->post('board_primary'),
                'school_primary' => $this->input->post('school_primary'),
                'percentage_primary' => $this->input->post('percentage_primary'),
                'pass_year_primary' => $this->input->post('pass_year_primary')
            );

            // echo '<pre>'; print_r($data);die();
            $updatedata = $this->common->update_data($data, 'job_add_edu', 'user_id', $userid);

            if ($jobdata[0]['job_step'] == 10) {


                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 3) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 3
                );
            }
            $updatedata1 = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            //Update only one field into database End 

            if ($updatedata && $updatedata1) {
                $this->session->set_flashdata('success', 'Primary Education updated successfully');
                //  redirect('job/job_project_update');
                redirect('job/job_education_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_education_update', refresh);
            }
        } else {
            $data = array(
                'user_id' => $userid,
                'board_primary' => $this->input->post('board_primary'),
                'school_primary' => $this->input->post('school_primary'),
                'percentage_primary' => $this->input->post('percentage_primary'),
                'pass_year_primary' => $this->input->post('pass_year_primary'),
                'edu_certificate_primary' => $certificate,
                'status' => 1
            );
            // echo '<pre>'; print_r($data);die();
            $insert_id = $this->common->insert_data_getid($data, 'job_add_edu');

            if ($jobdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 3) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 3
                );
            }



            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
            //Update only one field into database End 

            if ($insert_id && $updatedata) {
                $this->session->set_flashdata('success', 'Primary Education updated successfully');
                // redirect('job/job_project_update');
                redirect('job/job_education_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_education_update', refresh);
            }
        }
    }

//Insert Primary Education Data End
//Insert Secondary Education Data start
    public function job_education_secondary_insert() {
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //upload education certificate process start
        $config['upload_path'] = 'uploads/job_edu_certificate/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
        // $config['file_name'] = $_FILES['picture']['name'];
        $config['file_name'] = $_FILES['edu_certificate_secondary']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('edu_certificate_secondary')) {
            $uploadData = $this->upload->data();
            //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
            $certificate = $uploadData['file_name'];
            // echo $certificate;die();
        } else {
            $certificate = '';
        }
        //upload education certificate process End

        $contition_array = array('user_id' => $userid);
        $userdata = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $edu_certificate_secondary = $_FILES['edu_certificate_secondary']['name'];

            if ($edu_certificate_secondary == "") {
                $data = array(
                    'edu_certificate_secondary' => $this->input->post('image_hidden_secondary')
                );
            } else {
                $data = array(
                    'edu_certificate_secondary' => $certificate
                );
            }
            $updatedata = $this->common->update_data($data, 'job_add_edu', 'user_id', $userid);

            $data = array(
                'user_id' => $userid,
                'board_secondary' => $this->input->post('board_secondary'),
                'school_secondary' => $this->input->post('school_secondary'),
                'percentage_secondary' => $this->input->post('percentage_secondary'),
                'pass_year_secondary' => $this->input->post('pass_year_secondary')
            );

            // echo '<pre>'; print_r($data);die();
            $updatedata = $this->common->update_data($data, 'job_add_edu', 'user_id', $userid);

            if ($jobdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 3) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 3
                );
            }
            $updatedata1 = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

            //Update only one field into database End 

            if ($updatedata && $updatedata1) {
                $this->session->set_flashdata('success', 'Secondary Education updated successfully');
                // redirect('job/job_project_update');
                redirect('job/job_education_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_education_update', refresh);
            }
        } else {
            $data = array(
                'user_id' => $userid,
                'board_secondary' => $this->input->post('board_secondary'),
                'school_secondary' => $this->input->post('school_secondary'),
                'percentage_secondary' => $this->input->post('percentage_secondary'),
                'pass_year_secondary' => $this->input->post('pass_year_secondary'),
                'edu_certificate_secondary' => $certificate,
                'status' => 1
            );
            // echo '<pre>'; print_r($data);die();
            $insert_id = $this->common->insert_data_getid($data, 'job_add_edu');

            if ($jobdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 3) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 3
                );
            }
            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);



            //Update only one field into database End 

            if ($insert_id && $updatedata) {
                $this->session->set_flashdata('success', 'Secondary Education updated successfully');
                //  redirect('job/job_project_update');
                redirect('job/job_education_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_education_update', refresh);
            }
        }
    }

//Insert Secondary Education Data End
//Insert Higher Secondary Education Data start
    public function job_education_higher_secondary_insert() {
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //upload education certificate process start
        $config['upload_path'] = 'uploads/job_edu_certificate/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
        // $config['file_name'] = $_FILES['picture']['name'];
        $config['file_name'] = $_FILES['edu_certificate_higher_secondary']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('edu_certificate_higher_secondary')) {
            $uploadData = $this->upload->data();
            //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
            $certificate = $uploadData['file_name'];
            // echo $certificate;die();
        } else {
            $certificate = '';
        }
        //upload education certificate process End

        $contition_array = array('user_id' => $userid);
        $userdata = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $edu_certificate_secondary = $_FILES['edu_certificate_higher_secondary']['name'];

            if ($edu_certificate_secondary == "") {
                $data = array(
                    'edu_certificate_higher_secondary' => $this->input->post('image_hidden_higher_secondary')
                );
            } else {
                $data = array(
                    'edu_certificate_higher_secondary' => $certificate
                );
            }
            $updatedata = $this->common->update_data($data, 'job_add_edu', 'user_id', $userid);

            $data = array(
                'user_id' => $userid,
                'board_higher_secondary' => $this->input->post('board_higher_secondary'),
                'stream_higher_secondary' => $this->input->post('stream_higher_secondary'),
                'school_higher_secondary' => $this->input->post('school_higher_secondary'),
                'percentage_higher_secondary' => $this->input->post('percentage_higher_secondary'),
                'pass_year_higher_secondary' => $this->input->post('pass_year_higher_secondary')
            );

            // echo '<pre>'; print_r($data);die();
            $updatedata = $this->common->update_data($data, 'job_add_edu', 'user_id', $userid);


            if ($jobdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 3) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 3
                );
            }
            $updatedata1 = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            //Update only one field into database End 

            if ($updatedata && $updatedata1) {
                $this->session->set_flashdata('success', 'Higher Secondary Education updated successfully');
                //  redirect('job/job_project_update');
                redirect('job/job_education_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_education_update', refresh);
            }
        } else {
            $data = array(
                'user_id' => $userid,
                'board_higher_secondary' => $this->input->post('board_higher_secondary'),
                'stream_higher_secondary' => $this->input->post('stream_higher_secondary'),
                'school_higher_secondary' => $this->input->post('school_higher_secondary'),
                'percentage_higher_secondary' => $this->input->post('percentage_higher_secondary'),
                'pass_year_higher_secondary' => $this->input->post('pass_year_higher_secondary'),
                'edu_certificate_higher_secondary' => $certificate,
                'status' => 1
            );
            // echo '<pre>'; print_r($data);die();
            $insert_id = $this->common->insert_data_getid($data, 'job_add_edu');

            if ($jobdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 3) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 3
                );
            }
            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);



            //Update only one field into database End 

            if ($insert_id && $updatedata) {
                $this->session->set_flashdata('success', 'Higher Secondary Education updated successfully');
                //  redirect('job/job_project_update');
                redirect('job/job_education_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_education_update', refresh);
            }
        }
    }

//Insert Higher Secondary Education Data End
//Insert Degree Education Data start
    public function job_education_insert() {
        // echo "<pre>";print_r($_FILES);die();

        $userid = $this->session->userdata('aileenuser');

        if ($this->input->post('previous')) {
            redirect('job/job_address_update', refresh);
        }

//Click on Add_More_Education Process start
        if ($this->input->post('add_edu')) {


            $contition_array = array('user_id' => $userid);
            $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $count = count($jobdata);

            if ($count != 5) {

                redirect('job/job_add_education', refresh);
            } else {
                echo "<script>alert('You Can only add 5 Education field');</script>";
                redirect('job/job_education_update', refresh);
            }
        }
//Click on Add_More_Education Process End
        //Add Multiple field into database start   
        $userdata[] = $_POST;
        $count1 = count($userdata[0]['degree']);
        // $certificate[]=$_FILES;
        // Multiple Image insert code start

        $config = array(
            'upload_path' => 'uploads/job_edu_certificate/',
            'max_size' => 1024 * 100,
            'allowed_types' => 'gif|jpeg|jpg|png'
        );
        $images = array();
        $this->load->library('upload');

        $files = $_FILES;
        $count = count($_FILES['certificate']['name']);


        for ($i = 0; $i < $count; $i++) {

            $_FILES['certificate']['name'] = $files['certificate']['name'][$i];
            $_FILES['certificate']['type'] = $files['certificate']['type'][$i];
            $_FILES['certificate']['tmp_name'] = $files['certificate']['tmp_name'][$i];
            $_FILES['certificate']['error'] = $files['certificate']['error'][$i];
            $_FILES['certificate']['size'] = $files['certificate']['size'][$i];

            $fileName = $_FILES['certificate']['name'];
            $images[] = $fileName;
            $config['file_name'] = $fileName;
            // echo $config['file_name'];die();

            $this->upload->initialize($config);
            $this->upload->do_upload();
            if ($this->upload->do_upload('certificate')) {//echo "hello"; die();
                $fileData = $this->upload->data();
                $uploadData[$i]['file_name'] = $fileData['file_name'];
            } else {

                $uploadData[$i]['file_name'] = '';
            }
        }
        // Multiple Image insert code End
        $contition_array = array('user_id' => $userid, 'grad_step' => 1);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($jobdata) {



            //Edit Multiple field into database Start 
            for ($x = 0; $x < $count1; $x++) {

                $files[] = $_FILES;
                //echo "<pre>";print_r($files);die();
                $edu_certificate = $files['certificate']['name'][$x];
                //echo  $edu_certificate;die();


                if ($edu_certificate == "") {

                    $data = array(
                        'edu_certificate' => $this->input->post('image_hidden_degree' . $jobdata[$x]['edu_id'])
                    );
                } else {
                    $data = array(
                        'edu_certificate' => $uploadData[$x]['file_name']
                    );
                }
                $updatedata = $this->common->update_data($data, 'job_add_edu', 'edu_id', $jobdata[$x]['edu_id']);


                $data = array(
                    'user_id' => $userid,
                    'degree' => $userdata[0]['degree'][$x],
                    'stream' => $userdata[0]['stream'][$x],
                    'university' => $userdata[0]['university'][$x],
                    'college' => $userdata[0]['college'][$x],
                    'grade' => $userdata[0]['grade'][$x],
                    'percentage' => $userdata[0]['percentage'][$x],
                    'pass_year' => $userdata[0]['pass_year'][$x],
                    // 'edu_certificate'=>  $uploadData[$x]['file_name'],
                    'grad_step' => 1
                );

                $updatedata1 = $this->common->update_data($data, 'job_add_edu', 'edu_id', $jobdata[$x]['edu_id']);

                //echo "<pre>";print_r($data);
            }
            //Edit Multiple field into database End 
        } else {

            //Add Multiple field into database Start 
            for ($x = 0; $x < $count1; $x++) {

                $i = $x + 1;
                //echo $x;die();
                $data = array(
                    'user_id' => $userid,
                    'degree' => $userdata[0]['degree'][$x],
                    'stream' => $userdata[0]['stream'][$x],
                    'university' => $userdata[0]['university'][$x],
                    'college' => $userdata[0]['college'][$x],
                    'grade' => $userdata[0]['grade'][$x],
                    'percentage' => $userdata[0]['percentage'][$x],
                    'pass_year' => $userdata[0]['pass_year'][$x],
                    'edu_certificate' => $uploadData[$x]['file_name'],
                    'degree_sequence' => degree . $i,
                    'stream_sequence' => stream . $i,
                    'grad_step' => 1,
                    'status' => 1
                );
                //echo '<pre>'; print_r($data);
                $insert_id = $this->common->insert_data_getid($data, 'job_add_edu');
                $i++;
            }

            //Add Multiple field into database End 
        }

        //Update only one field into database start
        $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata[0]['job_step'] == 10) {
            $data = array(
                'modified_date' => date('Y-m-d h:i:s', time()),
                'job_step' => 10
            );
        } else if ($userdata[0]['job_step'] > 3) {
            $data = array(
                'modified_date' => date('Y-m-d h:i:s', time()),
                'job_step' => $userdata[0]['job_step']
            );
        } else {
            $data = array(
                'modified_date' => date('Y-m-d h:i:s', time()),
                'job_step' => 3
            );
        }
        $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
        //Update only one field into database End 




        if ($insert_id && $updatedata || $updatedata1 && $updatedata) {

            $this->session->set_flashdata('success', 'Education updated successfully');
            redirect('job/job_project_update');
        } else {
            //echo "welome";die();
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('job/job_education_update', 'refresh');
        }
    }

//End first time insert and update
//Insert Degree Education Data End
//More education Insert Start
    public function job_add_education() {
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);

        //for getting degree data
        $contition_array = array('status' => 1);
        $this->data['degree_data'] = $this->common->select_data_by_condition('degree', $contition_array, $data = '*', $sortby = 'degree_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //for getting univesity data
        $contition_array = array('status' => 1);
        $this->data['university_data'] = $this->common->select_data_by_condition('university', $contition_array, $data = '*', $sortby = 'university_name', $orderby = 'ASC', $limit = '', $offset = '', $join_str = array(), $groupby = '');



        $this->load->view('job/job_add_education', $this->data);
    }

    public function job_add_education_insert() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('user_id' => $userid);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $count = count($jobdata);
        $count_incr = $count + 1;


        //upload education certificate process start
        $config['upload_path'] = 'uploads/job_edu_certificate/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
        // $config['file_name'] = $_FILES['picture']['name'];
        $config['file_name'] = $_FILES['certificate']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('certificate')) {
            $uploadData = $this->upload->data();
            //$picture = $uploadData['file_name']."-".date("Y_m_d H:i:s");
            $certificate = $uploadData['file_name'];
            // echo $certificate;die();
        } else {
            $certificate = '';
        }
        //upload education certificate process End

        $data = array(
            'user_id' => $userid,
            'degree' => $this->input->post('degree'),
            'stream' => $this->input->post('stream'),
            'university' => $this->input->post('university'),
            'college' => $this->input->post('college'),
            'grade' => $this->input->post('grade'),
            'percentage' => $this->input->post('percentage'),
            'pass_year' => $this->input->post('pass_year'),
            'edu_certificate' => $certificate,
            'degree_sequence' => degree . $count_incr,
            'stream_sequence' => stream . $count_incr,
            'grad_step' => 1,
            'status' => 1
        );
        // echo '<pre>'; print_r($data);die();
        $insert_id = $this->common->insert_data_getid($data, 'job_add_edu');

        if ($insert_id) {
            $this->session->set_flashdata('success', 'Education updated successfully');
            redirect('job/job_education_update');
        } else {
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('job/job_add_education', 'refresh');
        }
    }

//More education Insert End
//job seeker EDUCATION controller end
//job seeker Project And Training / Internship controller start
    public function job_project_update() {

        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);


        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 4 || ($step >= 1 && $step <= 4) || $step > 4) {
                $this->data['project_name1'] = $userdata[0]['project_name'];
                $this->data['project_duration1'] = $userdata[0]['project_duration'];
                $this->data['project_description1'] = $userdata[0]['project_description'];
                $this->data['training_as1'] = $userdata[0]['training_as'];
                $this->data['training_duration1'] = $userdata[0]['training_duration'];
                $this->data['training_organization1'] = $userdata[0]['training_organization'];
            }
        }

        // code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');

        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $this->data['demo'] = array_values($result1);

        $this->load->view('job/job_project', $this->data);
    }

    public function job_project_insert() {
        $userid = $this->session->userdata('aileenuser');


        if ($this->input->post('previous')) {
            redirect('job/job_education_update', refresh);
        }
        if ($this->input->post('next')) {

            $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
            $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($userdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 4) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 4
                );
            }
            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            $data = array(
                'project_name' => $this->input->post('project_name'),
                'project_duration' => $this->input->post('project_duration'),
                'project_description' => $this->input->post('project_description'),
                'training_as' => $this->input->post('training_as'),
                'training_duration' => $this->input->post('training_duration'),
                'training_organization' => $this->input->post('training_organization'),
                'modified_date' => date('Y-m-d h:i:s', time())
            );


            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            if ($updatedata) {

                $this->session->set_flashdata('success', 'Project And Training / Internship updated successfully');
                redirect('job/job_skill_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_project_update', 'refresh');
            }
        }
    }

//job seeker Project And Training / Internship controller end 
//job seeker skill controller start
    public function job_skill_update() {
        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('status' => '1', 'type' => '1');
        $this->data['skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $contition_array = array('user_id' => $userid, 'status' => '1', 'type' => '3');
        $this->data['skill_other'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        //echo "<pre>";print_r( $skill_other);die();

        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);

        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 5 || ($step >= 1 && $step <= 5) || $step > 5) {
                $this->data['keyskill1'] = $userdata[0]['keyskill'];
            }
        }

        $contition_array = array('status' => '1', 'is_delete' => 0, 'user_id' => $userid);
        $this->data['postdata'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // $this->data['postdata'] = $this->common->select_data_by_id('job_reg','user_id', $userid, $data = '*', $join_str = array());

        $skildata = explode(',', $this->data['postdata'][0]['keyskill']);
        $this->data['selectdata'] = $skildata;

        // code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');

        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $this->data['demo'] = array_values($result1);

        $this->load->view('job/job_skill', $this->data);
    }

    public function job_skill_insert() {

        $userid = $this->session->userdata('aileenuser');
        $keyskill = $this->input->post('skills');
        $otherskill = $this->input->post('other_skill');
        $otherskill1 = $this->input->post('other_skill1');

        //echo $otherskill; die();

        if ($this->input->post('previous')) {
            redirect('job/job_project_update', refresh);
        }
        if ($this->input->post('next')) {
            $this->form_validation->set_rules('skills', 'Keyskill', 'required');


            $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
            $userjobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $contition_array = array('user_id' => $userid, 'status' => '1', 'type' => '3');
            $skill_other = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            $count = count($skill_other);
            //echo"<pre>"; print_r($userjobdata[0]['keyskill']); die();
            // check skill is already in inserted while click on next button
            $contition_array = array('user_id' => $userid, 'status' => '1', 'type' => '3', 'skill' => $otherskill1);
            $skill_data = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            if ($userjobdata[0]['job_step'] == 5) { //echo "falguni"; die();
//echo "<pre>";print_r($skill_other);die();
                for ($x = 0; $x < $count; $x++) {


                    $data1 = array(
                        'skill' => $this->input->post("other_skill" . $skill_other[$x]['skill_id']),
                    );

                    //echo "<pre>";print_r($data1);die();
                    $updatedata = $this->common->update_data($data1, 'skill', 'skill_id', $skill_other[$x]['skill_id']);
                }

                if (count($skill_data) == 0) {
                    if ($otherskill1 != "") {
                        $data1 = array(
                            'skill' => $this->input->post('other_skill1'),
                            'type' => 3,
                            'status' => 1,
                            'user_id' => $userid
                        );
                        //echo "<pre>";print_r($data1);die();
                        $insertid = $this->common->insert_data_getid($data1, 'skill');
                    }
                }
            } else {
                if (count($skill_data) == 0) {
                    if ($otherskill != "") {
                        $data1 = array(
                            'skill' => $otherskill,
                            'type' => 3,
                            'status' => 1,
                            'user_id' => $userid
                        );

                        $insertid = $this->common->insert_data_getid($data1, 'skill');
                    }
                }
            }



            if ($userjobdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userjobdata[0]['job_step'] > 5) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 5
                );
            }
            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            $data = array(
                'keyskill' => implode(",", $keyskill),
                //'other_skill' => $this->input->post('other_skill'),
                'modified_date' => date('Y-m-d h:i:s', time())
            );

            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

            if ($updatedata) {

                $this->session->set_flashdata('success', 'Skill updated successfully');
                redirect('job/job_apply_for_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_skill_update', 'refresh');
            }
        }
    }

//job seeker skill controller end
//keyskill automatic retrieve controller start
    public function keyskill() {
        $json = [];
        $where = "type='1' AND status='1'";
        //$this->load->database('aileensoul');

        if (!empty($this->input->get("q"))) {
            $this->db->like('skill', $this->input->get("q"));
            $query = $this->db->select('skill_id as id,skill as text')
                    ->where($where)
                    ->limit(10)
                    ->get("skill");
            $json = $query->result();
        }


        echo json_encode($json);
    }

//keyskill automatic retrieve controller End
//location automatic retrieve controller start
    public function location() {
        $json = [];

        //$this->load->database('aileensoul');

        if (!empty($this->input->get("q"))) {
            $this->db->like('city_name', $this->input->get("q"));
            $query = $this->db->select('city_id as id,city_name as text')
                    ->order_by("city_name", "asc")
                    ->limit(10)
                    ->get("cities");
            $json = $query->result();
        }


        echo json_encode($json);
    }

//location automatic retrieve controller End
    //job seeker APPLY FOR controller start
    public function job_apply_for_update() {

        $userid = $this->session->userdata('aileenuser');


        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);


        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // echo '<pre>'; print_r($userdata); die();

        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 6 || ($step >= 1 && $step <= 6) || $step > 6) {
                $this->data['ApplyFor1'] = $userdata[0]['ApplyFor'];
            }
        }

//for retreiveing option value Start
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => '1');
        $jobdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($jobdata[0]['keyskill']) {

            $aud = $jobdata[0]['keyskill'];

            $aud_res = explode(',', $aud);
            //echo "<pre>";print_r( $aud_res);echo "</pre>";die();       
            $json = array();
            foreach ($aud_res as $skill) {  //echo $skill; die();
                // echo $skill;
                //         $newarray[] =$cache_time;   
                $join_str[0]['table'] = 'job_reg';
                $join_str[0]['join_table_id'] = $skill;
                $join_str[0]['from_table_id'] = 'skill.skill_id';
                $join_str[0]['join_type'] = '';


                $contition_array = array('job_reg.user_id' => $userid, 'skill.status' => '1', 'skill.type' => '1', 'job_reg.is_delete' => 0, 'job_reg.status' => '1');

                $data = 'skill.skill_id,skill.skill';
                $data = $this->data['data'] = $this->common->select_data_by_condition('skill', $contition_array, $data, $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');

                $newarray[] = $data;
            }
            //echo "<pre>";print_r($newarray);

            $other_skill = $jobdata[0]['other_skill'];

            $cache_time = $this->db->get_where('skill', array('skill' => $other_skill))->row()->skill_id;



            $contition_array = array('user_id' => $userid, 'type' => 3, 'status' => 1);
            $data = 'skill,skill_id';
            $data2 = $this->common->select_data_by_condition('skill', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $newarray2[] = $data2;
            //echo "<pre>";print_r($newarray2);

            $array[] = array_merge($newarray, $newarray2);
            $this->data['postskill'] = $array;
            //echo "<pre>";print_r($this->data['postskill']) ;die();              
        } else {
            $contition_array = array('user_id' => $userid, 'type' => 3, 'status' => 1);
            $data = 'skill,skill_id';
            $data2 = $this->common->select_data_by_condition('skill', $contition_array, $data, $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


            $newarray2[] = $data2;
            //echo "<pre>";print_r($newarray2);
            $array[] = $newarray2;
            $this->data['postskill'] = $array;
            //echo "<pre>";print_r($this->data['postskill']) ;die(); 
        }

        //for retreiveing option value End
        //for fetch data at edit time start
        $this->data['postdata'] = $this->common->select_data_by_id('job_reg', 'user_id', $userid, $data = 'ApplyFor', $join_str = array());
        $skildata = explode(',', $this->data['postdata'][0]['ApplyFor']);
        $this->data['selectdata'] = $skildata;
        //for fetch data at edit time End
        // code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_post);die();
        $contition_array = array('status' => '1', 'type' => '1');
        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);
        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);
        // echo "<pre>"; print_r($this->data['demo']);die();
        //echo "<pre>"; print_r($this->data['postdetail']); die();
        $this->load->view('job/job_apply_for', $this->data);
        //$this->load->view('job/job_apply_for'); 
    }

    public function job_apply_for_insert() {
        $userid = $this->session->userdata('aileenuser');


        if ($this->input->post('previous')) {
            redirect('job/job_skill_update', refresh);
        }
        if ($this->input->post('next')) {

            $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
            $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            if ($userdata[0]['job_step'] == 10) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 10
                );
            } else if ($userdata[0]['job_step'] > 6) {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => $userdata[0]['job_step']
                );
            } else {
                $data = array(
                    'modified_date' => date('Y-m-d h:i:s', time()),
                    'job_step' => 6
                );
            }

            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

            $data = array(
                'ApplyFor' => $this->input->post('ApplyFor'),
                'modified_date' => date('Y-m-d h:i:s', time())
            );

            //echo "<pre>";print_r($data);die();   
            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            if ($updatedata) {

                $this->session->set_flashdata('success', 'Apply For updated successfully');
                redirect('job/job_work_exp_update');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_apply_for_update', 'refresh');
            }
        }
    }

    //job seeker APPLY FOR controller end
//job seeker WORK EXPERIENCE controller start
    public function job_work_exp_update() {

        $userid = $this->session->userdata('aileenuser');


        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);


        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 7 || ($step >= 1 && $step <= 7) || $step > 7) {

                $contition_array = array('user_id' => $userid, 'experience !=' => 'Fresher', 'status' => 1);
                $workdata = $this->data['workdata'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            }
        }
        //echo "<pre>";print_r($jobdata);die();
        // code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');

        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name,other_skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }

        $results = array_unique($result);
         foreach($results as $key =>$value){
            $result1[$key]['label']=$value;
            $result1[$key]['value']=$value;
          }
          
          $this->data['demo']=array_values($result1);

        $this->load->view('job/job_work_exp', $this->data);
    }

    public function job_work_exp_insert() {
        //echo "<pre>";print_r($_POST);die();
        $userid = $this->session->userdata('aileenuser');

        $userdata[] = $_POST;
        $count1 = count($userdata[0]['experience_year']);

        if ($this->input->post('previous')) {  //echo "hi";die();
            redirect('job/job_apply_for_update', refresh);
        }

//Click on Add_More_WorkExp Process start
        if ($this->input->post('add_workexp')) {


            $contition_array = array('user_id' => $userid, 'experience !=' => 'Fresher', 'status' => 1);
            $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $count = count($jobdata);

            if ($count != 5) {

                redirect('job/job_add_workexp', refresh);
            } else {
                echo "<script>alert('You Can only add 5 Work Experience field');</script>";
                redirect('job/job_work_exp_update', refresh);
            }
        }
//Click on Add_More_WorkExp Process End

        if ($this->input->post('next')) {

            $exp = $this->input->post('radio');

            if ($exp == "Fresher") {

                $exp = $this->input->post('radio');
                $exp_year = '';
                $exp_month = '';
                $job_title = '';
                $companyname = '';
                $companyemail = '';
                $companyphn = '';
                $certificate1 = '';

                $config['upload_path'] = 'uploads/job_work_certificate/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';

                $config['file_name'] = $_FILES['certificate']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('certificate')) {
                    $uploadData = $this->upload->data();

                    $certificate = $uploadData['file_name'];
                } else {
                    $certificate = '';
                }

                //upload work certificate process end

                $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
                $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['job_step'] == 10) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 10
                    );
                } else if ($userdata[0]['job_step'] > 7) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => $userdata[0]['job_step']
                    );
                } else {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 7
                    );
                }
                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


                $data = array(
                    'experience' => $exp,
                    'modified_date' => date('Y-m-d h:i:s', time())
                );


                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

                //update data at job_add_workexp table start

                $data1 = array(
                    'experience' => $exp,
                    'experience_year' => '',
                    'experience_month' => '',
                    'jobtitle' => '',
                    'companyname' => '',
                    'companyemail' => '',
                    'companyphn' => '',
                    'work_certificate' => '',
                    'status' => 1
                );


                $updatedata1 = $this->common->update_data($data1, 'job_add_workexp', 'user_id', $userid);
                //update data at job_add_workexp table end         

                if ($updatedata && $updatedata1) {

                    $this->session->set_flashdata('success', 'Work Experience updated successfully');
                    redirect('job/job_curricular_update');
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('job/job_work_exp_update', 'refresh');
                }
            } else {

                // $exp = $this->input->post('radio');

                $exp = 'Experience';


// Multiple Image insert code start

                $config = array(
                    'upload_path' => 'uploads/job_work_certificate/',
                    'max_size' => 1024 * 100,
                    'allowed_types' => 'gif|jpeg|jpg|png'
                );
                $images = array();
                $this->load->library('upload');

                $files = $_FILES;
                $count = count($_FILES['certificate']['name']);


                for ($i = 0; $i < $count; $i++) {

                    $_FILES['certificate']['name'] = $files['certificate']['name'][$i];
                    $_FILES['certificate']['type'] = $files['certificate']['type'][$i];
                    $_FILES['certificate']['tmp_name'] = $files['certificate']['tmp_name'][$i];
                    $_FILES['certificate']['error'] = $files['certificate']['error'][$i];
                    $_FILES['certificate']['size'] = $files['certificate']['size'][$i];

                    $fileName = $_FILES['certificate']['name'];
                    $images[] = $fileName;
                    $config['file_name'] = $fileName;
                    // echo $config['file_name'];die();

                    $this->upload->initialize($config);
                    $this->upload->do_upload();
                    if ($this->upload->do_upload('certificate')) {//echo "hello"; die();
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                    } else {
                        $uploadData[$i]['file_name'] = '';
                    }
                }
                // Multiple Image insert code End

                $contition_array = array('user_id' => $userid, 'status' => 1);
                $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                if ($jobdata) {
                    //Edit Multiple field into database Start 
                    for ($x = 0; $x < $count1; $x++) {

                        $files[] = $_FILES;
                        //echo "<pre>";print_r($files);die();
                        $work_certificate = $files['certificate']['name'][$x];
                        //echo  $edu_certificate;die();


                        if ($work_certificate == "") {

                            $data = array(
                                'work_certificate' => $this->input->post('image_hidden_certificate' . $jobdata[$x]['work_id'])
                            );
                        } else {
                            $data = array(
                                'work_certificate' => $uploadData[$x]['file_name']
                            );
                        }
                        $updatedata = $this->common->update_data($data, 'job_add_workexp', 'work_id', $jobdata[$x]['work_id']);

                        $data = array(
                            'user_id' => $userid,
                            'experience' => $exp,
                            'experience_year' => $userdata[0]['experience_year'][$x],
                            'experience_month' => $userdata[0]['experience_month'][$x],
                            'jobtitle' => $userdata[0]['jobtitle'][$x],
                            'companyname' => $userdata[0]['companyname'][$x],
                            'companyemail' => $userdata[0]['companyemail'][$x],
                            'companyphn' => $userdata[0]['companyphn'][$x]
                                //'work_certificate'=>  $uploadData[$x]['file_name']
                        );

                        $updatedata1 = $this->common->update_data($data, 'job_add_workexp', 'work_id', $jobdata[$x]['work_id']);

                        //echo "<pre>";print_r($data);
                    }
                    //Edit Multiple field into database End 
                } else {
                    //Add Multiple field into database Start 
                    for ($x = 0; $x < $count1; $x++) {


                        $data = array(
                            'user_id' => $userid,
                            'experience' => $exp,
                            'experience_year' => $userdata[0]['experience_year'][$x],
                            'experience_month' => $userdata[0]['experience_month'][$x],
                            'jobtitle' => $userdata[0]['jobtitle'][$x],
                            'companyname' => $userdata[0]['companyname'][$x],
                            'companyemail' => $userdata[0]['companyemail'][$x],
                            'companyphn' => $userdata[0]['companyphn'][$x],
                            'work_certificate' => $uploadData[$x]['file_name'],
                            'status' => 1
                        );

                        $insert_id = $this->common->insert_data_getid($data, 'job_add_workexp');
                        $i++;
                    }

                    //Add Multiple field into database End 
                }

                $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
                $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['job_step'] == 10) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 10
                    );
                } else if ($userdata[0]['job_step'] > 7) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => $userdata[0]['job_step']
                    );
                } else {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 7
                    );
                }
                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

                //Update only one field into database start
                $data = array(
                    'experience' => $exp,
                    'modified_date' => date('Y-m-d h:i:s', time())
                );

                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
                //Update only one field into database End



                if ($insert_id && $updatedata || $updatedata1 && $updatedata) {

                    $this->session->set_flashdata('success', 'Work Experience updated successfully');
                    redirect('job/job_curricular_update');
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('job/job_work_exp_update', 'refresh');
                }
            }
        }
    }

    //End first time insert and update
//More Work Experience Insert Start

    public function job_add_workexp() {
        $userid = $this->session->userdata('aileenuser');

        $this->load->view('job/job_add_workexp');
    }

    public function job_add_workexp_insert() {
        $userid = $this->session->userdata('aileenuser');


        //upload work certificate process start
        $config['upload_path'] = 'uploads/job_work_certificate/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';

        $config['file_name'] = $_FILES['certificate']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('certificate')) {
            $uploadData = $this->upload->data();

            $certificate = $uploadData['file_name'];
        } else {
            $certificate = '';
        }

        //upload work certificate process end

        $contition_array = array('user_id' => $userid, 'experience' => 'Fresher', 'status' => 1);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        //echo"<pre>";print_r($jobdata[0]['work_id']);die();


        if ($jobdata) {
            $data = array(
                'user_id' => $userid,
                'experience' => 'Experience',
                'experience_year' => $this->input->post('experience_year'),
                'experience_month' => $this->input->post('experience_month'),
                'jobtitle' => $this->input->post('jobtitle'),
                'companyname' => $this->input->post('companyname'),
                'companyemail' => $this->input->post('companyemail'),
                'companyphn' => $this->input->post('companyphn'),
                'work_certificate' => $certificate
            );
            $updatedata = $this->common->update_data($data, 'job_add_workexp', 'work_id', $jobdata[0]['work_id']);
        } else {

            $data = array(
                'user_id' => $userid,
                'experience' => 'Experience',
                'experience_year' => $this->input->post('experience_year'),
                'experience_month' => $this->input->post('experience_month'),
                'jobtitle' => $this->input->post('jobtitle'),
                'companyname' => $this->input->post('companyname'),
                'companyemail' => $this->input->post('companyemail'),
                'companyphn' => $this->input->post('companyphn'),
                'work_certificate' => $certificate,
                'status' => 1
            );

            //echo '<pre>'; print_r($data);die();
            $insert_id = $this->common->insert_data_getid($data, 'job_add_workexp');
        }

        if ($insert_id || $updatedata) {
            $this->session->set_flashdata('success', 'Work Experience updated successfully');
            redirect('job/job_work_exp_update');
        } else {
            $this->session->flashdata('error', 'Your data not inserted');
            redirect('job/job_add_workexp', 'refresh');
        }
    }

//More Work Experience Insert End
//job seeker WORK EXPERIENCE controller end
//job seeker CURRICULAR FOR controller start
    public function job_curricular_update() {

        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);


        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 8 || ($step >= 1 && $step <= 8) || $step > 8) {
                $this->data['curricular1'] = $userdata[0]['curricular'];
            }
        }
        // code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_post);die();
        $contition_array = array('status' => '1', 'type' => '1');
        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);
        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);


        

        $this->load->view('job/job_curricular', $this->data);
    }

    public function job_curricular_insert() {
        $userid = $this->session->userdata('aileenuser');


        if ($this->input->post('previous')) {
            redirect('job/job_work_exp_update', refresh);
        }
        if ($this->input->post('next')) {


            $this->form_validation->set_rules('curricular', 'Curricular', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('job/job_curricular');
            } else {

                $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
                $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['job_step'] == 10) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 10
                    );
                } else if ($userdata[0]['job_step'] > 8) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => $userdata[0]['job_step']
                    );
                } else {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 8
                    );
                }
                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

                $data = array(
                    'curricular' => $this->input->post('curricular'),
                    'modified_date' => date('Y-m-d h:i:s', time())
                );


                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


                if ($updatedata) {

                    $this->session->set_flashdata('success', 'Curricular updated successfully');
                    redirect('job/job_reference_update');
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('job/job_curricular_update', 'refresh');
                }
            }
        }
    }

    //job seeker CURRICULAR FOR controller end 
    //job seeker INTEREST & REFERENCE controller start
    public function job_reference_update() {

        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);

        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        if ($userdata) {
            $step = $userdata[0]['job_step'];

            if ($step == 9 || ($step >= 1 && $step <= 9) || $step > 9) {
                $this->data['interest1'] = $userdata[0]['interest'];
                $this->data['reference1'] = $userdata[0]['reference'];
            }
        }
        
        // code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_post);die();
        $contition_array = array('status' => '1', 'type' => '1');
        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);
        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);

        $this->load->view('job/job_reference', $this->data);
    }

    public function job_reference_insert() {
        $userid = $this->session->userdata('aileenuser');

        if ($this->input->post('previous')) {
            redirect('job/job_curricular_update', refresh);
        }
        if ($this->input->post('next')) {



            $this->form_validation->set_rules('interest', 'Interest', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('job/job_reference');
            } else {

                $contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
                $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                if ($userdata[0]['job_step'] == 10) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 10
                    );
                } else if ($userdata[0]['job_step'] > 9) {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => $userdata[0]['job_step']
                    );
                } else {
                    $data = array(
                        'modified_date' => date('Y-m-d h:i:s', time()),
                        'job_step' => 9
                    );
                }
                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

                $data = array(
                    'interest' => $this->input->post('interest'),
                    'reference' => $this->input->post('reference'),
                    'modified_date' => date('Y-m-d h:i:s', time())
                );


                $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


                if ($updatedata) {

                    $this->session->set_flashdata('success', 'Reference updated successfully');
                    redirect('job/job_carrier_update');
                } else {
                    $this->session->flashdata('error', 'Your data not inserted');
                    redirect('job/job_reference_update', 'refresh');
                }
            }
        }
    }

    //job seeker INTEREST & REFERENCE controller end
    //job seeker CARRIER controller start
    public function job_carrier_update() {

        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);



        $userdata = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if ($userdata) {
            $step = $userdata[0]['job_step'];
            if ($step == 10 || ($step >= 1 && $step <= 10)) {
                $this->data['carrier1'] = $userdata[0]['carrier'];
            }
        }
       
        // code for search
        $contition_array = array('re_status' => '1');
        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_post);die();
        $contition_array = array('status' => '1', 'type' => '1');
        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        
        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);
        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {
                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);
        
        $this->load->view('job/job_carrier', $this->data);
    }

    public function job_carrier_insert() {
        $userid = $this->session->userdata('aileenuser');

        if ($this->input->post('previous')) {
            redirect('job/job_reference_update', refresh);
        }



        $this->form_validation->set_rules('checkbox', 'Checkbox', 'required');
        $this->form_validation->set_rules('carrier', 'Carrier', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('job/job_carrier');
        } else {
            $data = array(
                'carrier' => $this->input->post('carrier'),
                'modified_date' => date('Y-m-d h:i:s', time()),
                'job_step' => 10,
            );


            $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            if ($updatedata) {

                $this->session->set_flashdata('success', 'Carrier updated successfully');
                redirect('job/job_printpreview');
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_carrier_update', 'refresh');
            }
        }
    }

    //job seeker CARRIER controller end
    //job seeker PRINTDATA controller Start
    public function job_printpreview($id="") {

        $userid = $this->session->userdata('aileenuser');

        if ($id == $userid || $id == '') {

            //for getting data job_reg table
            $contition_array = array('job_reg.user_id' => $userid, 'job_reg.is_delete' => 0, 'job_reg.status' => 1);

            $data = '*';

            $this->data['job'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);
            //echo "<pre>";print_r( $this->data['job']);die();
            //for getting data job_add_edu table
            $contition_array = array('user_id' => $userid, 'status' => '1');

            $data = '*';

            $this->data['job_edu'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);


            //for getting data job_add_workexp table
            $contition_array = array('user_id' => $userid, 'experience' => 'Experience', 'status' => '1');

            $data = '*';

            $this->data['job_work'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);
            // echo "<pre>";print_r( $this->data['job_work']);die();
            //for getting other skill data
            $contition_array = array('user_id' => $userid, 'type' => 3, 'status' => 1);

            $this->data['other_skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            //echo "<pre>";print_r( $this->data['other_skill']);die();
        } else {

            //for getting data job_reg table
            $contition_array = array('job_reg.user_id' => $id, 'job_reg.is_delete' => 0, 'job_reg.status' => 1);

            $data = '*';

            $this->data['job'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);


            //for getting data job_add_edu table
            $contition_array = array('user_id' => $userid, 'status' => '1');

            $data = '*';

            $this->data['job_edu'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);

            //for getting data job_add_workexp table
            $contition_array = array('user_id' => $userid, 'experience' => 'Experience', 'status' => '1');

            $data = '*';

            $this->data['job_work'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);
        }


// code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');

        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }
        $this->data['demo'] = array_values($result1);
        $this->load->view('job/job_printpreview', $this->data);
        //for getting other skill data
        $contition_array = array('user_id' => $userid, 'type' => 3, 'status' => 1);
        $this->data['other_skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
    }

    //job seeker PRINTDATA controller end
    //job seeker Resume controller Start
    public function job_resume($id) {

        $userid = $this->session->userdata('aileenuser');


        if ($id == $userid || $id == '') {

            //for getting data job_reg table
            $contition_array = array('job_reg.user_id' => $userid, 'job_reg.is_delete' => 0, 'job_reg.status' => 1);

            $data = '*';

            $this->data['job'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);
            //echo "<pre>";print_r( $this->data['job']);die();
            //for getting data job_add_edu table
            $contition_array = array('user_id' => $userid);

            $data = '*';

            $this->data['job_edu'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);


            //for getting data job_add_workexp table
            $contition_array = array('user_id' => $userid, 'experience' => 'Experience');

            $data = '*';

            $this->data['job_work'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);
            // echo "<pre>";print_r( $this->data['job_work']);die();
            //for getting other skill data
            $contition_array = array('user_id' => $userid, 'type' => 1, 'status' => 1);

            $this->data['other_skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            //echo "<pre>";print_r( $this->data['other_skill']);die();
        } else {
            //for getting data job_reg table
            $contition_array = array('job_reg.user_id' => $userid, 'job_reg.is_delete' => 0, 'job_reg.status' => 1);

            $data = '*';

            $this->data['job'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);
            //echo "<pre>";print_r( $this->data['job']);die();
            //for getting data job_add_edu table
            $contition_array = array('user_id' => $userid);

            $data = '*';

            $this->data['job_edu'] = $this->common->select_data_by_condition('job_add_edu', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);


            //for getting data job_add_workexp table
            $contition_array = array('user_id' => $userid, 'experience' => 'Experience');

            $data = '*';

            $this->data['job_work'] = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);
            // echo "<pre>";print_r( $this->data['job_work']);die();
            //for getting other skill data
            $contition_array = array('user_id' => $userid, 'type' => 1, 'status' => 1);

            $this->data['other_skill'] = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            //echo "<pre>";print_r( $this->data['other_skill']);die();
        }

// code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');

        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $this->data['demo'] = array_values($result1);
        // echo "<pre>"; print_r($this->data['demo']);die();

        $this->load->view('job/job_resume', $this->data);

        //count of incoice management
    }

    //job seeker Resume controller end
    //job seeker PDF Download controller end
    public function job_download() {
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => '1');
        $this->data['job'] = $this->common->select_database_id('job_reg', $contition_array, $data = '*');

        //load the view and saved it into $html variable
        $html = $this->load->view('job/job_pdf', $this->data, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = "Resume.pdf";


        //load mPDF library
        $this->load->library('m_pdf');

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    //job seeker PDF Download controller end
    //job seeker SAVE PDF Download controller end
    public function job_savedownload() {

        ob_clean();
        $userid = $this->session->userdata('aileenuser');
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => '1');
        $this->data['job'] = $job_data = $this->common->select_database_id('job_reg', $contition_array, $data = '*');
        foreach ($job_data as $j_data) {

            $lang = $j_data['language'];
            $lang = explode(',', $lang);
            foreach ($lang as $key => $val) {
                $contition_array = array('language_id' => $val, 'status' => '1');
                $language = $this->common->select_database_id('language', $contition_array, $data = 'language_name');
                $language_know .= $language[0]['language_name'] . ',';
            }

            $language_know = trim($language_know, ',');
            $this->data['job'][0]['language'] = $language_know;

            $contition_array = array('nation_id' => $j_data['nationality'], 'status' => '1');
            $nationality = $this->common->select_database_id('nation', $contition_array, $data = 'nation_name');
            $nationality = $nationality[0]['nation_name'];
            $this->data['job'][0]['nationality'] = $nationality;
        }
        $pdfFilePath = FCPATH . "/download_pdf/Resume.pdf";


        if (file_exists($pdfFilePath) != FALSE) {


            ini_set('memory_limit', '32M'); // boost the memory limit if it's low ;)

            $html = $this->load->view('job/job_pdf_save', $this->data, true); // render the view into HTML


            $this->load->library('pdf');

            $pdf = $this->pdf->load();


            $pdf->WriteHTML($html); // write the HTML into the PDF

            $pdf->Output($pdfFilePath, 'F'); // save to file because we can
        }

        redirect("/download_pdf/Resume.pdf");
        ob_end_clean();
    }

    //job seeker SAVE PDF Download controller end
    //job seeker Job All Post Start
    public function job_all_post() {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
// job seeker detail
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

// post detail
        $contition_array = array('is_delete' => 0, 'status' => 1);
        $postdata = $this->data['postdata'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $newarray = array();
        foreach ($postdata as $post) {
            $skill_id = explode(',', $post['post_skill']);
            foreach ($skill_id as $skill) {
                $newarr = array();
                if ($skill == $jobdata[0]['ApplyFor']) {
                    $contition_array = array('post_id' => $post['post_id']);
                    $data = $this->data['data'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                    $newarr = $data[0];
                    //$newarray[] = $data;
                    array_push($newarray, $newarr);
                }
            }
        }

        $this->data['postdetail'] = $newarray;
        // echo "<pre>"; print_r($this->data['postdetail']);die();
        $this->data['falguni'] = 1;
// code for search
        $contition_array = array('re_status' => '1');
        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name,other_skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $this->data['demo'] = array_values($result1);





        $this->load->view('job/job_all_post', $this->data);
    }

    //job seeker Job All Post controller end
    //job seeker Apply post at all post page & save post page controller Start
    public function job_apply_post() {  //echo $para2; die();
        //echo "falguni"; die();
        $id = $_POST['post_id'];
        $para = $_POST['allpost'];
        $notid = $_POST['userid'];

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('post_id' => $id, 'user_id' => $userid, 'is_delete' => 0);
        $userdata = $this->common->select_data_by_condition('job_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $app_id = $userdata[0]['app_id'];

        if ($userdata) {

            $contition_array = array('job_delete' => 1);
            $jobdata = $this->common->select_data_by_condition('job_apply', $contition_array, $data = 'app_id', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

            $data = array(
                'job_delete' => 0
                
            );


            $updatedata = $this->common->update_data($data, 'job_apply', 'app_id', $app_id);


            // insert notification

            $data = array(
                'not_type' => 3,
                'not_from_id' => $userid,
                'not_to_id' => $notid,
                'not_read' => 2,
                'not_from' => 2,
                'not_product_id' => $app_id
            );

            $updatedata = $this->common->insert_data_getid($data, 'notification');
            // end notoification



            if ($updatedata) {

                if ($para == 'all') {
                    $applypost = 'Applied';
                }
            }
            echo $applypost;
        } else {

            $data = array(
                'post_id' => $id,
                'user_id' => $userid,
                'status' => 1,
                'created_date' => date('Y-m-d h:i:s', time()),
                'is_delete' => 0,
                'job_delete' => 0
            );


            $insert_id = $this->common->insert_data_getid($data, 'job_apply');


            // insert notification

            $data = array(
                'not_type' => 3,
                'not_from_id' => $userid,
                'not_to_id' => $notid,
                'not_read' => 2,
                'not_from' => 2,
                'not_product_id' => $insert_id
            );

            $updatedata = $this->common->insert_data_getid($data, 'notification');
            // end notoification


            if ($insert_id) {

                $applypost = 'Applied';
            }
            echo $applypost;
        }
    }

    //job seeker Apply post at all post page & save post page controller End
//job seeker view all applied post controller Start
    public function job_applied_post() {
        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
// job seeker detail
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

// post detail
        $contition_array = array('is_delete' => 0, 'status' => 1);
        $postdata = $this->data['postdata'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        $new_insert_array = array();
        foreach ($postdata as $post) {
            $skill_id = explode(',', $post['post_skill']);
            foreach ($skill_id as $skill) {
                if ($skill == $jobdata[0]['keyskill'])
                 {
                    $join_str[0]['table'] = 'job_apply';
                    $join_str[0]['join_table_id'] = 'job_apply.post_id';
                    $join_str[0]['from_table_id'] = 'rec_post.post_id';
                    $join_str[0]['join_type'] = '';
                    $contition_array = array('rec_post.post_id' => $post['post_id'], 'job_apply.job_delete' => 0, 'job_apply.user_id' => $userid);
                    $data = $this->data['data'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'rec_post.*,job_apply.app_id,job_apply.user_id as userid', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');
                    //$newarray[] = $data;
                    if ($data) {
                        array_push($new_insert_array, $data[0]);
                    }
                }
            }
        }

        //$this->data['postdetail'] = $newarray;
        $this->data['postdetail'] = $new_insert_array;


        echo "<pre>"; print_r($this->data['postdetail']); die();
// code for search
        $contition_array = array('re_status' => '1');
        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();
        $contition_array = array('status' => '1');
        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_post);die();
        $contition_array = array('status' => '1', 'type' => '1');
        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $this->data['demo'] = array_values($result1);
        // echo "<pre>"; print_r($this->data['demo']);die();







        $this->load->view('job/job_applied_post', $this->data);
    }

    //job seeker view all applied post controller End
//job seeker Delete all Applied & Save post controller Start
    public function job_delete_apply() {

        $id = $_POST['app_id'];
        $para = $_POST['para'];
        $userid = $this->session->userdata('aileenuser');

        $data = array(
            'job_delete' => 1,
            'modify_date' => date('Y-m-d h:i:s', time())
        );

        $updatedata = $this->common->update_data($data, 'job_apply', 'app_id', $id);
    }

    //job seeker Delete all Applied & Save post controller End
//job seeker Save post controller Start

    public function job_save() {

        $id = $_POST['post_id'];


        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('post_id' => $id, 'user_id' => $userid, 'is_delete' => 0);
        $userdata = $this->common->select_data_by_condition('job_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');


        $app_id = $userdata[0]['app_id'];

        if ($userdata) {

            $contition_array = array('job_delete' => 1);
            $jobdata = $this->common->select_data_by_condition('job_apply', $contition_array = array(), $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');



            $data = array(
                'job_delete' => 0,
                'job_save' => 2
            );

            $updatedata = $this->common->update_data($data, 'job_apply', 'app_id', $app_id);


            if ($updatedata) {

                $savepost = 'Saved';
            }
            echo $savepost;
        } else {

            $data = array(
                'post_id' => $id,
                'user_id' => $userid,
                'status' => 1,
                'created_date' => date('Y-m-d h:i:s', time()),
                'is_delete' => 0,
                'job_delete' => 0,
                'job_save' => 2
            );

            $insert_id = $this->common->insert_data_getid($data, 'job_apply');
            if ($insert_id) {

                $savepost = 'Saved';
            } echo $savepost;
        }
    }

//job seeker Save post controller End
//job seeker view all Saved post controller Start
    public function job_save_post() {


        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');
// job seeker detail
        $contition_array = array('user_id' => $userid, 'is_delete' => 0, 'status' => 1);
        $jobdata = $this->data['jobdata'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

// post detail
        $join_str[0]['table'] = 'job_apply';
        $join_str[0]['join_table_id'] = 'job_apply.post_id';
        $join_str[0]['from_table_id'] = 'rec_post.post_id';
        $join_str[0]['join_type'] = '';

        $contition_array = array('job_apply.job_delete' => 0, 'job_apply.user_id' => $userid, 'job_apply.job_save' => 2);
        $postdetail = $this->data['postdetail'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'rec_post.*,job_apply.app_id,job_apply.user_id as userid', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = '');

// code for search
        $contition_array = array('re_status' => '1');

        $results_recruiter = $this->data['results'] = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 're_comp_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($results_recruiter);die();

        $contition_array = array('status' => '1');

        $results_post = $this->data['results'] = $this->common->select_data_by_condition('rec_post', $contition_array, $data = 'post_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);

        // echo "<pre>"; print_r($results_post);die();

        $contition_array = array('status' => '1', 'type' => '1');

        $skill = $this->data['results'] = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);
        // echo "<pre>"; print_r($skill);die();
        // $return_array = array(); 
        //        //  //echo  $return_array;
        //           foreach ($artdata as $get) {
        //               $return = array();
        //               $return = $get;
        //               $return['firstname'] =$get['art_name'] . " " . $get['art_lastname'];
        //                            unset($return['art_name']);
        //               unset($return['art_lastname']);
        //               array_push($return_array, $return);
        //             //echo $returnarray; 
        //           }
        // $contition_array = array('status' => '1');
        // $artpost= $this->data['results'] =  $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $$join_str = array(), $groupby);




        $uni = array_merge($results_recruiter, $results_post, $skill);
        //   echo count($unique);


        foreach ($uni as $key => $value) {
            foreach ($value as $ke => $val) {
                if ($val != "") {


                    $result[] = $val;
                }
            }
        }
        $results = array_unique($result);
        foreach ($results as $key => $value) {
            $result1[$key]['label'] = $value;
            $result1[$key]['value'] = $value;
        }


        $this->data['demo'] = array_values($result1);
        // echo "<pre>"; print_r($this->data['demo']);die();
        //echo "<pre>"; print_r($this->data['postdetail']); die();

        $this->load->view('job/job_save_post', $this->data);
    }

    //job seeker view all Saved post controller End
//for pop up image

    public function user_image_insert() {


        $userid = $this->session->userdata('aileenuser');


        if ($this->input->post('cancel1')) {
            redirect('job/job_all_post', refresh);
        } elseif ($this->input->post('cancel2')) {
            redirect('job/job_printpreview', refresh);
        } elseif ($this->input->post('cancel3')) {
            redirect('job/job_applied_post', refresh);
        } elseif ($this->input->post('cancel4')) {
            redirect('job/job_save_post', refresh);
        }

        if (empty($_FILES['profilepic']['name'])) {
            $this->form_validation->set_rules('profilepic', 'Upload profilepic', 'required');
        } else {
            $config['upload_path'] = 'uploads/user_image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|3gp|mpeg|mpg|mpe|qt|mov|avi|pdf';

            $config['file_name'] = $_FILES['profilepic']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('profilepic')) {
                $uploadData = $this->upload->data();

                $picture = $uploadData['file_name'];
            } else {
                $picture = '';
            }

            $data = array(
                'job_user_image' => $picture,
                'modified_date' => date('Y-m-d', time())
            );


            $updatdata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

            if ($updatdata) {
                if ($this->input->post('hitext') == 1) {
                    redirect('job/job_all_post', refresh);
                } elseif ($this->input->post('hitext') == 2) {
                    redirect('job/job_printpreview', refresh);
                } elseif ($this->input->post('hitext') == 3) {
                    redirect('job/job_applied_post', refresh);
                } elseif ($this->input->post('hitext') == 4) {
                    redirect('job/job_save_post', refresh);
                }
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_all_post', refresh);
            }
        }
    }

// pop image end
//job serach user for recruiter start 

    public function job_user($id) {

        $userid = $this->session->userdata('aileenuser');

        $contition_array = array('job_reg.user_id' => $id, 'job_reg.is_delete' => 0);

        $data = '*';

        $this->jobdata['job'] = $this->common->select_data_by_condition('job_reg', $contition_array, $data, $sortby, $orderby, $limit, $offset, $join_str, $groupby);



        $this->load->view('job/job_printpreview', $this->jobdata);
    }

//job user end
    //deactivate user start
    public function deactivate($id) {

        $data = array(
            'status' => 0
        );

        $update = $this->common->update_data($data, 'job_reg', 'user_id', $id);
        $data = array(
            'status' => 0
        );

        $update1 = $this->common->update_data($data, 'job_add_edu', 'user_id', $id);
        $data = array(
            'status' => 0
        );

        $update2 = $this->common->update_data($data, 'job_add_workexp', 'user_id', $id);
        $data = array(
            'status' => 0
        );

        $update3 = $this->common->update_data($data, 'skill', 'user_id', $id);

        if ($update && $update1 && $update2 && $update3) {


            $this->session->set_flashdata('success', 'You are deactivate successfully.');
            redirect('dashboard', 'refresh');
        } else {
            $this->session->flashdata('error', 'Sorry!! Your are not deactivate!!');
            redirect('job', 'refresh');
        }
    }

// deactivate user end
    //enter designation start

    public function job_designation() {  //echo "hello"; die();
        $userid = $this->session->userdata('aileenuser');


        $this->form_validation->set_rules('designation', 'Designation', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('job/job_all_post');
        } else {
            $data = array(
                'designation' => $this->input->post('designation'),
                'modified_date' => date('Y-m-d', time())
            );

            $updatdata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);


            if ($updatdata) {

                if ($this->input->post('hitext') == 1) {
                    redirect('job/job_all_post', refresh);
                } elseif ($this->input->post('hitext') == 2) {
                    redirect('job/job_printpreview', refresh);
                } elseif ($this->input->post('hitext') == 3) {
                    redirect('job/job_save_post', refresh);
                } elseif ($this->input->post('hitext') == 4) {
                    redirect('job/job_applied_post', refresh);
                }
            } else {
                $this->session->flashdata('error', 'Your data not inserted');
                redirect('job/job_all_post', refresh);
            }
        }
    }

//designation end
// cover pic controller

    public function ajaxpro() {
        $userid = $this->session->userdata('aileenuser');

        $data = $_POST['image'];

        $imageName = time() . '.png';
        $base64string = $data;
        file_put_contents('uploads/job_bg/' . $imageName, base64_decode(explode(',', $base64string)[1]));

        $contition_array = array('user_id' => $userid);
        $job_reg_data = $this->common->select_data_by_condition('job_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $job_reg_prev_image = $job_reg_data[0]['profile_background'];

        if ($job_reg_prev_image != '') {
            $job_image_path = 'uploads/job_bg/';
            $job_bg_full_image = $job_image_path . $job_reg_prev_image;
            if (isset($job_bg_full_image)) {
                unlink($job_bg_full_image);
            }
        }

        $data = array(
            'profile_background' => $imageName
        );

        $update = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

        $this->data['jobdata'] = $this->common->select_data_by_id('job_reg', 'user_id', $userid, $data = '*', $join_str = array());

        echo '<img src="' . $this->data['jobdata'][0]['profile_background'] . '" />';
    }

    public function image() {
        $userid = $this->session->userdata('aileenuser');

        $config['upload_path'] = 'uploads/job_bg';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $config['file_name'] = $_FILES['image']['name'];

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {

            $uploadData = $this->upload->data();

            $image = $uploadData['file_name'];
        } else {

            $image = '';
        }

        $contition_array = array('user_id' => $userid);
        $job_reg_data = $this->common->select_data_by_condition('job_reg', $contition_array, $data = 'profile_background_main', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        $job_reg_prev_image = $job_reg_data[0]['profile_background_main'];

        if ($job_reg_prev_image != '') {
            $job_image_path = 'uploads/job_bg/';
            $job_bg_full_image = $job_image_path . $job_reg_prev_image;
            if (isset($job_bg_full_image)) {
                unlink($job_bg_full_image);
            }
        }

        $data = array(
            'profile_background_main' => $image,
            'modified_date' => date('Y-m-d h:i:s', time())
        );


        $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);

        if ($updatedata) {
            echo $userid;
        } else {
            echo "welcome";
        }
    }

    public function ajax_designation() {
        $userid = $this->session->userdata('aileenuser');
        $data = array(
            'designation' => $_POST['designation']
        );
        $updatedata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
        if ($updatedata) {
            echo 'ok';
        } else {
            echo 'error';
        }
    }

// cover pic end
//Other Skill Insert Controller Start
    public function other_skill_insert() {
        $userid = $this->session->userdata('aileenuser');
        $otherskill = $this->input->post('other_skill');
        //echo $otherskill;
        //die();
        $contition_array = array('skill' => $otherskill, 'user_id' => $userid);

        $skilldata = $this->common->select_data_by_condition('skill', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

        // $skilldata = $this->common-> select_data_by_id('skill', 'skill', $otherskill, $data = '*', $join_str = array());
        //echo $skilldata;

        if ($skilldata) {
            
        } else {
            if ($otherskill != "") {
                $data1 = array(
                    'skill' => $otherskill,
                    'type' => 3,
                    'status' => 1,
                    'user_id' => $userid
                );

                $insertid = $this->common->insert_data_getid($data1, 'skill');
            }
        }

        if ($insertid) {
            $success = "Skill Inserted Successfully";
            echo $success;
        } else {
            $failer = "Skill Already Available In Keyskill Textbox";
            echo $failer;
        }
    }

//Other Skill Insert Controller End
//reactivate account start

    public function reactivate() {

        $userid = $this->session->userdata('aileenuser');
        $data = array(
            'status' => 1,
            'modified_date' => date('y-m-d h:i:s')
        );

        $updatdata = $this->common->update_data($data, 'job_reg', 'user_id', $userid);
        if ($updatdata) {

            redirect('job/job_all_post', refresh);
        } else {

            redirect('job/reactivate', refresh);
        }
    }

    public function other_skill_remove() {
        $post_data = $this->input->post();
        $skill_id = $post_data['skill_id'];

        $delete_data = $this->common->delete_data('skill', 'skill_id', $skill_id);
        if ($delete_data) {
            echo 'ok';
        }
    }

//reactivate accont end    
}