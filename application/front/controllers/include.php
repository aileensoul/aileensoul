<?php // user detail $userid =  $this->session->userdata('aileenuser');  $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');         $this->data['userdata']  = $this->common->select_data_by_condition('user', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');// $this->data['userdata'] =  $this->common->select_data_by_id('user', 'user_id', $userid, $data = '*', $join_str = array());// recruiter detail $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 're_status' => '1');         $this->data['recdata']  = $this->common->select_data_by_condition('recruiter', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');// $this->data['recdata'] =  $this->common->select_data_by_id('recruiter', 'user_id', $userid, $data = 're_step', $join_str = array());// job detail$contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');         $this->data['jobdata']  = $this->common->select_data_by_condition('job_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');// $this->data['jobdata'] =  $this->common->select_data_by_id('job_reg', 'user_id', $userid, $data = 'job_step', $join_str = array());// freelancer hire detail $contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');         $this->data['freehiredata']  = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');        // $this->data['freehiredata'] =  $this->common->select_data_by_id('freelancer_hire_reg', 'user_id', $userid, $data = 'free_hire_step', $join_str = array());// freelancer post detail$contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');         $this->data['freepostdata']  = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');// $this->data['freepostdata'] =  $this->common->select_data_by_id('freelancer_post_reg', 'user_id', $userid, $data = 'free_post_step', $join_str = array());// business profile detail $contition_array = array( 'user_id' => $userid, 'is_deleted' => '0' , 'status' => '1');         $this->data['businessdata']  = $this->common->select_data_by_condition('business_profile', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');// $this->data['businessdata'] =  $this->common->select_data_by_id('business_profile', 'user_id', $userid, $data = 'business_step', $join_str = array());// artistics detail$contition_array = array( 'user_id' => $userid, 'is_delete' => '0' , 'status' => '1');         $this->data['artdata']  = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');        // echo '<pre>'; print_r($this->data['artdata']); die();// $this->data['artdata'] =  $this->common->select_data_by_id('art_reg', 'user_id', $userid, $data = 'art_step', $join_str = array());//for message notification start$contition_array = array('notification.not_type' => 2, 'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'message',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'message.message_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*',' message.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['user_message'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'message_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id'); 	$this->data['message_count'] = count($this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'message_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id'));//for message notification end// general notification start // 1-5 notification start// recruiter notfication start $contition_array = array('notification.not_type' => 3, 'notification.not_to_id' => $userid, 'notification.not_read' => 2,'notification.not_from' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'job_apply',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'job_apply.app_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*','job_apply.*','user.user_id', 'user.first_name','user.user_image','user.last_name');$this->data['rec_not'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// recruiter notification end// job notfication start $contition_array = array('notification.not_type' => 4, 'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'job_apply',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'job_apply.app_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*',' job_apply.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['job_not'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// job notification end // freelancer hire  notification start $contition_array = array('notification.not_type' => 3,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(    array(        'join_type' => '',        'table' => 'freelancer_apply',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'freelancer_apply.app_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id')      );$data = array('notification.*','freelancer_apply.*','user.user_id', 'user.first_name','user.user_image','user.last_name');$this->data['hire_not'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id'); // freelancer hire notification end// freelancer post notification start$contition_array = array('notification.not_type' => 4, 'notification.not_from' => 4,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'job_apply',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'job_apply.app_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*',' job_apply.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['work_post'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'app_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// freelancer post notification end//artistic notification start// follow notification start  $contition_array = array('notification.not_type' => 8,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'follow',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'follow.follow_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*',' follow.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['artfollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// follow notification end// comment notification start $contition_array = array('notification.not_type' => 6,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'artistic_post_comment',        'join_table_id' => 'notification.not_product_id',    'from_table_id' => 'artistic_post_comment.artistic_post_comment_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*',' artistic_post_comment.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['artcommnet'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'artistic_post_comment_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// comment notification end// like notification start $contition_array = array('notification.not_type' => 5,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'art_post',        'join_table_id' => 'notification.not_product_id',    'from_table_id' => 'art_post.art_post_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*','art_post.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['artlike'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'art_post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// like notification end// artistic notification end// business profile notification start// follow notification start  $contition_array = array('notification.not_type' => 8,'notification.not_from' => 3,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'follow',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'follow.follow_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*','follow.*','user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['artfollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// follow notification end// comment notification start$contition_array = array('notification.not_type' => 6,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(    'join_type' => '',    'table' => 'business_profile_post_comment',    'join_table_id' => 'notification.not_product_id',    'from_table_id' => 'business_profile_post_comment.business_profile_post_comment_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id')      );$data = array('notification.*','business_profile_post_comment.*','user.user_id','user.first_name','user.user_image','user.last_name');$this->data['buscommnet'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'business_profile_post_comment_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// comment notification end// like notification start$contition_array = array('notification.not_type' => 5,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'business_profile_post',        'join_table_id' => 'notification.not_product_id',    'from_table_id' => 'business_profile_post.business_profile_post_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*',' business_profile_post.*',' user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['buslike'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'business_profile_post_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// like notification end// follow notification start  $contition_array = array('notification.not_type' => 8,'notification.not_from' => 6,  'notification.not_to_id' => $userid, 'notification.not_read' => 2);$join_str = array(array(        'join_type' => '',        'table' => 'follow',        'join_table_id' => 'notification.not_product_id',        'from_table_id' => 'follow.follow_id'),    array(        'join_type' => '',        'table' => 'user',        'join_table_id' => 'notification.not_from_id',        'from_table_id' => 'user.user_id'));$data = array('notification.*','follow.*','user.user_id', 'user.first_name', 'user.user_image','user.last_name');$this->data['busifollow'] = $this->common->select_data_by_condition('notification', $contition_array, $data, $sortby = 'follow_id', $orderby = 'desc', $limit = '', $offset = '', $join_str, $groupby = 'not_from_id');// business profile notification end// 1-5 notification end// general notification end$this->data['head'] = $this->load->view('head', $this->data, true);$this->data['header'] = $this->load->view('header', $this->data, true);// $this->data['leftbar'] = $this->load->view('leftbar', $this->data, true);// $this->data['quick_leftbar'] = $this->load->view('quick_leftbar', $this->data, true);$this->data['footer'] = $this->load->view('footer', $this->data, true);// khyati facebook login start//$this->data['social'] = $this->load->view('Social/Social', $this->data, true);// khyati facebook login end// rash code strat// // Start Recruiter$this->data['rec_left'] = $this->load->view('recruiter/rec_left', $this->data, true);$this->data['rec_cover'] = $this->load->view('recruiter/rec_cover', $this->data, true);$this->data['rec_search'] = $this->load->view('recruiter/rec_search', $this->data, true);// // End Recruiter// Start Job$this->data['job_cover'] = $this->load->view('job/job_cover', $this->data, true);$this->data['job_left'] = $this->load->view('job/job_left', $this->data, true);$this->data['job_search'] = $this->load->view('job/job_search', $this->data, true);$this->data['job_menubar'] =$this->load->view('job/menubar',$this->data,true);// End Job// Bussiness Profile start$this->data['business_left'] = $this->load->view('business_profile/business_left', $this->data, true);$this->data['business_cover'] = $this->load->view('business_profile/business_cover', $this->data, true);$this->data['business_search'] = $this->load->view('business_profile/business_search', $this->data, true);// Bussiness profile End // Artistic Start$this->data['artistic_cover'] = $this->load->view('artistic/artistic_cover', $this->data, true);$this->data['artistic_left'] = $this->load->view('artistic/artistic_left', $this->data, true);$this->data['artistic_search'] = $this->load->view('artistic/artistic_search', $this->data, true);// Artistic End$this->data['freelancer_post_cover'] = $this->load->view('freelancer/freelancer_post/freelancer_post_cover', $this->data, true);$this->data['freelancer_post_left'] = $this->load->view('freelancer/freelancer_post/freelancer_post_left', $this->data, true);$this->data['freelancer_post_search'] = $this->load->view('freelancer/freelancer_post/freelancer_post_search', $this->data, true);$this->data['freelancer_hire_left'] = $this->load->view('freelancer/freelancer_hire/freelancer_hire_left', $this->data, true);$this->data['freelancer_hire_cover'] = $this->load->view('freelancer/freelancer_hire/freelancer_hire_cover', $this->data, true);$this->data['freelancer_hire_search'] = $this->load->view('freelancer/freelancer_hire/freelancer_hire_search', $this->data, true);//rash code end//falguni code for follower and following count artistic start   $artregid = $this->data['artdata'][0]['art_id'];$contition_array = array('follow_to' => $artregid, 'follow_status' =>'1',  'follow_type' =>'1');$followerdata = $this->data['followerdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');//echo "<pre>"; print_r(count($this->data['followerdata']));die();$contition_array = array('follow_from' => $artregid, 'follow_status' =>'1',  'follow_type' =>'1');$followingdata = $this->data['followingdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');//falguni code for follower and following count artistic end//falguni code for follower and following count business_profile start     $businessregid =  $this->data['businessdata'][0]['business_profile_id']; $contition_array = array('follow_to' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');$businessfollowerdata = $this->data['businessfollowerdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');//echo "<pre>"; print_r(count($this->data['followerdata']));die();$contition_array = array('follow_from' => $businessregid, 'follow_status' =>'1',  'follow_type' =>'2');$businessfollowingdata = $this->data['businessfollowingdata'] =  $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');//falguni code for follower and following count artistic end//second header start$this->data['art_header2'] = $this->load->view('artistic/art_header2', $this->data, true);$this->data['freelancer_hire_header2'] = $this->load->view('freelancer/freelancer_hire/freelancer_hire_header2', $this->data, true);$this->data['freelancer_post_header2'] = $this->load->view('freelancer/freelancer_post/freelancer_post_header2', $this->data, true);$this->data['business_header2'] = $this->load->view('business_profile/business_header2', $this->data, true);$this->data['recruiter_header2'] = $this->load->view('recruiter/recruiter_header2', $this->data, true);$this->data['job_header2'] = $this->load->view('job/job_header2', $this->data, true);//second header end?>