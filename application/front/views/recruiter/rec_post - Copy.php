

<!-- start head -->
<?php
//echo "<pre>"; print_r($recdata); die();
echo $head;
?>


<!--post save success pop up style strat -->


<!--post save success pop up style end -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/profiles/recruiter/recruiter.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>



<!-- END HEADER -->
<?php
$returnpage = $_GET['page'];
if ($returnpage == 'job') {
    echo $job_header2_border;
} else {
    echo $recruiter_header2_border;
}
?>

<body   class="page-container-bg-solid page-boxed">

    <section class="custom-row">
        <div class="container mt-22" id="paddingtop_fixed">
            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" >
                    <button class="btn btn-success  cancel-result" onclick="">Cancel</button>

                    <button class="btn btn-success set-btn upload-result " onclick="myFunction()">Save</button>

                    <div id="message1" style="display:none;">
                        <div id="floatBarsG">
                            <div id="floatBarsG_1" class="floatBarsG"></div>
                            <div id="floatBarsG_2" class="floatBarsG"></div>
                            <div id="floatBarsG_3" class="floatBarsG"></div>
                            <div id="floatBarsG_4" class="floatBarsG"></div>
                            <div id="floatBarsG_5" class="floatBarsG"></div>
                            <div id="floatBarsG_6" class="floatBarsG"></div>
                            <div id="floatBarsG_7" class="floatBarsG"></div>
                            <div id="floatBarsG_8" class="floatBarsG"></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12"  style="visibility: hidden; ">
                    <div id="upload-demo-i" ></div>
                </div>
            </div>


            <div class="">
                <div class="" id="row2">
                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    if($this->uri->segment(3) == $userid){
                    $user_id = $userid;
                  }elseif($this->uri->segment(3) == ""){
                     $user_id = $userid;
                    }else{
                $user_id = $this->uri->segment(3);
                   }  
                    $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 're_status' => '1');
                    $image = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                   $image_ori= $this->config->item('rec_bg_main_upload_path').$image[0]['profile_background'];
           if(file_exists($image_ori) && $image[0]['profile_background'] != '') {
                        ?>

                     
                            <img src="<?php echo base_url($this->config->item('rec_bg_main_upload_path') . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / >
                        <?php
                    } else {
                        ?>

                        
                            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / >
                    <?php }
                    ?>


                </div>
            </div>
        </div>
   
  

<div class="container tablate-container art-profile">    
   
        <?php if ($returnpage == '') { ?>
         <div class="upload-img">
            <label class="cameraButton"><span class="tooltiptext_rec">Upload Cover Photo</span><i class="fa fa-camera" aria-hidden="true"></i>
                <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
            </label>
              </div>
        <?php } ?>

  

    <div class="profile-photo">
        <div class="profile-pho">

            <div class="user-pic padd_img">
               <?php 
               $imageee= $this->config->item('rec_profile_thumb_upload_path').$postdataone[0]['recruiter_user_image'];
           if(file_exists($imageee) && $recdata[0]['recruiter_user_image'] != '')
             
            { ?>
                           <img src="<?php echo base_url($this->config->item('rec_profile_thumb_upload_path') . $postdataone[0]['recruiter_user_image']);?>" alt="" >
                            <?php } else { 

                                $a = $postdataone[0]['rec_firstname'];
               $acr = substr($a, 0, 1);

                $b = $postdataone[0]['rec_lastname'];
               $acr1 = substr($b, 0, 1);
              ?>
              <div class="post-img-user">
             <?php echo  ucfirst(strtolower($acr)) . ucfirst(strtolower($acr1)); ?>
              
             </div>
                          <!--   <img alt="" class="img-circle" src="<?php //echo base_url(NOIMAGE); ?>" alt="" /> -->
                            <?php } ?>
                           
                <?php if ($returnpage == '') { ?>
                    <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                <?php } ?>

            </div>



        </div>

            <div class="job-menu-profile mob-block">
                         <a href="javascript:void(0);" title="<?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?>"><h3><?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?></h3></a>
        <!-- text head start -->
        <div class="profile-text" >
       
           <?php if($returnpage == ''){
                  if ($recdata[0]['designation'] == '') {
                      ?>
               <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <a id="designation" class="designation" title="Designation">Designation</a>
              
               <?php } else {
                  ?> 
               <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
               <a id="designation" class="designation" title="<?php echo ucfirst(strtolower($recdata[0]['designation'])); ?>"><?php echo ucfirst(strtolower($recdata[0]['designation'])); ?></a> 
               <?php }
                  } else { 
                  
                  
                      if ($recdata[0]['designation'] == '') { ?>
               <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <a id="designation" class="designation" title="Designation">Designation</a>

               <?php  } else { ?>
               <a id="designation" class="designation" title="<?php echo ucfirst(strtolower($recdata[0]['designation'])); ?>"> <?php
                  echo ucfirst(strtolower($recdata[0]['designation'])); ?></a> <?php } 
                  } ?>

        
        </div>
     
        
        <!-- text head end -->
    </div>

        <!-- menubar -->
          <div class="profile-main-rec-box-menu profile-box-art col-md-12 padding_les">

<div class=" right-side-menu art-side-menu padding_less_right right-menu-jr">  
  
            
       
               <?php 
               $userid = $this->session->userdata('aileenuser');
               if($recdata[0]['user_id'] == $userid){
               
               ?>     
                <ul class="current-user pro-fw4">
                   
                   <?php }else{?>
                 <ul class="pro-fw">
                   <?php } ?>  

                    <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_profile') { ?> class="active" <?php } ?>>
                        <?php if ($returnpage == 'job') { ?>
                            <a title="Details" href="<?php echo base_url('recruiter/rec_profile/' . $this->uri->segment(3) . '?page=' . $returnpage); ?>">Details</a>
                        <?php } else { ?>
                            <a title="Details" href="<?php echo base_url('recruiter/rec_profile'); ?>">Details</a>
                        <?php } ?>
                    </li>




                    <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_post') { ?> class="active" <?php } ?>>
                        <?php if ($returnpage == 'job') { ?>
                            <a title="Post" href="<?php echo base_url('recruiter/rec_post/' . $this->uri->segment(3) . '?page=' . $returnpage); ?>">Post</a>
                        <?php } else { ?>
                            <a title="Post" href="<?php echo base_url('recruiter/rec_post'); ?>">Post</a>
                        <?php } ?>
                    </li>


                    <?php if (($this->uri->segment(1) == 'recruiter') && ($this->uri->segment(2) == 'rec_post' || $this->uri->segment(2) == 'rec_profile' || $this->uri->segment(2) == 'add_post' || $this->uri->segment(2) == 'save_candidate') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>
                        <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save_candidate') { ?> class="active" <?php } ?>><a title="Saved Candidate" href="<?php echo base_url('recruiter/save_candidate'); ?>">Saved </a>
                        </li> 


                        <?php } ?>   
                </ul>
                 <div class="flw_msg_btn fr">
                   <ul>
                    <?php
                    if($this->uri->segment(3) != "" && $this->uri->segment(3) != $userid){ ?>
                       <li>
                           <?php
                           $returnpage= $_GET['page'];
                           
                           if($returnpage == "job"){ ?>
                               
                           <a href="<?php echo base_url('chat/abc/1/2/'  . $this->uri->segment(3)); ?>">Message</a>
                      <?php     }else{ ?>
                           <a href="<?php echo base_url('chat/abc/2/1/'  . $this->uri->segment(3)); ?>">Message</a>
                               
                     <?php      }?>
                     

                     
                        
                       </li>  <?php } ?>
                    </ul>
                </div>
            </div>

           
        </div>  


        <!-- menubar -->    
      
    </div>                       
</div> <div  class="add-post-button mob-block">
            <?php if ($returnpage == '') { ?>
                <a class="btn btn-3 btn-3b" href="<?php echo base_url('recruiter/add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Post a Job</a>
            <?php } ?>
        </div>
        <div class="middle-part container rec_res">
    <div class="job-menu-profile mob-none  pt20">
                         <a href="javascript:void(0);" title="<?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?>"><h5><?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?></h5></a>
        <!-- text head start -->
        <div class="profile-text" >
       
            <?php
            if ($returnpage == '') {  
                //echo "hii";
                if ($recdata[0]['designation'] == "") { 
                    ?>
                                                    <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                    <a id="designation" class="designation" title="Designation">Designation</a>
                    <?php
                } else {
                    ?> 
                    
                    <a id="designation" class="designation" title="<?php echo ucfirst(strtolower($postdataone[0]['designation'])); ?>"><?php echo ucfirst(strtolower($recdata[0]['designation'])); ?></a>
                    <?php
                }
            }
             else {
                //echo "hhhhhh";
                echo ucfirst(strtolower($postdataone['designation']));
            }
            ?>

        
        </div>
        <div  class="add-post-button">
            <?php if ($returnpage == '') { ?>
                <a class="btn btn-3 btn-3b" href="<?php echo base_url('recruiter/add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Post a Job</a>
            <?php } ?>
        </div>

        
        <!-- text head end -->
    </div>
    <div class="col-md-7 col-sm-12 mob-clear ">
        <div class="common-form">
            <div class="job-saved-box">
                <h3>Post</h3>
                <div class="contact-frnd-post">
                    <?php
                    $returnpage = $_GET['page'];
                    if ($returnpage == 'job')
                    {
                      if(count($postdata) != ''){
                    foreach ($postdata as $post) {
                        ?>
                        <div class="job-contact-frnd ">
                            <div class="profile-job-post-detail clearfix" id="<?php echo "removepost" . $post['post_id']; ?>">
                                <!-- vishang 14-4 end -->
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
       <div class="profile-job-details col-md-12">
          <ul>
              <li class="fr date_re">
                  Created Date : <?php echo date('d-M-Y',strtotime($post['created_date'])); ?>
               </li>
     
              <li class="">
              <a class="post_title" href="javascript:void(0)" title="Post Title">
               <?php 
                                              $cache_time = $this->db->get_where('job_title', array('title_id' => $post['post_name']))->row()->name;
                                              if($cache_time)
                                              {
                                                  echo  $cache_time;
                                              }
                                              else
                                              {
                                                echo $post['post_name'];
                                              }
                                           ?>  </a>     
              </li>
     
             <li>  
             <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name;
            $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?> 

            <?php  
             if($cityname || $countryname)
               { 
                ?>

            <div class="fr lction">
            <p title="Location"><i class="fa fa-map-marker" aria-hidden="true"></i>

            <?php if($cityname){
            echo $cityname .', ';}?>
            <?php 
             echo $countryname; ?> 
            </p>
                  
            </div>
             <?php
             }




            ?>
           <a class="display_inline" title="<?php echo $post['re_comp_name']?>" href="javascript:void(0)">
            <?php   $out = strlen($post['re_comp_name']) > 40 ? substr($post['re_comp_name'],0,40)."..." : $post['re_comp_name'];
             echo $out;?> </a>
              </li>
              <li class="fw"><a class="display_inline" title="Recruiter Name" href="javascript:void(0)"> <?php echo ucfirst(strtolower($post['rec_firstname'])).''.ucfirst(strtolower($post['rec_lastname'])); ?> </a></li>
                                                <!-- vishang 14-4 end -->    
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                             <li> <b> Skills</b> <span> 
                             <?php
                            $comma = ", ";
                            $k = 0;
                            $aud = $post['post_skill'];
                            $aud_res = explode(',', $aud);

                            if(!$post['post_skill']){

                                echo $post['other_skill'];

                            }else if(!$post['other_skill']){


                                foreach ($aud_res as $skill) {
                            
                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;

                            if($cache_time != " "){                                                                                                                                                                                                                                              
                                if ($k != 0) {
                                echo $comma;
                                 
                            }echo $cache_time;
                             $k++;  }
                            }


                            }else if($post['post_skill'] && $post['other_skill']){
                            foreach ($aud_res as $skill) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;


                            echo $cache_time;
                                $k++;
                            } echo ",". $post['other_skill']; }
                        ?>     
                                                
                                                </span>
                                            </li>
                                            <!-- <li><b>Other Skill</b><span> <?php if($post['other_skill'] != ''){ echo $post['other_skill']; } else{ echo PROFILENA;} ?></span>
                                            </li> -->
                                            <li><b>Job Description</b><span><pre><?php echo $this->common->make_links($post['post_description']); ?></pre></span>
                                            </li>
                                            <li><b>Interview Process</b><span>
                                            

                                            <?php if($post['interview_process'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['interview_process']); ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>

                                            <!-- vishang 14-4 start -->
                                              <li>
                                                <b>Required Experience</b>
<!--                                                 <span>
                                                   <p title="Min - Max">
                                                       <?php 


//                                                            if(($post['min_year'] !='0' || $post['max_year'] !='0') && ($post['fresher'] == 1))
//                                                            { 
// 
//
//                                                               echo $post['min_year'].' Year - '.$post['max_year'] .' Year'." , ".   "Fresher can also apply.";
//                                                                 } 
//                                                             else if(($post['min_year'] !='0' || $post['max_year'] !='0'))
//                                                                  {
//                                                               echo $post['min_year'].' Year - '.$post['max_year'] . ' Year';
//                                                                    }
//                                                                  else
//                                                                {
//                                                                  echo "Fresher";
//         
//                                                                  }

                                                                  ?> 
    
                                                                  </p>  
                                                                  </span>-->
                                                                  </li>


                                             <li><b>Salary</b><span title="Min - Max" >
                                         <?php


            $currency = $this->db->get_where('currency', array('currency_id' => $post['post_currency']))->row()->currency_name;

          if($post['min_sal'] || $post['max_sal']) {
          echo $post['min_sal']." - ".$post['max_sal'].' '. $currency . ' '. $post['salary_type']; } 
          else { echo PROFILENA;} ?></span>
                                            </li>
                                          


                   <li><b>No of Position</b><span><?php echo $post['post_position'].' '. 'Position'; ?></span>
                 </li>

                  <li><b>Industry Type</b> <span>
                                                                  <?php
                                                                      $cache_time = $this->db->get_where('job_industry', array('industry_id' => $post['industry_type']))->row()->industry_name;
                                                                         echo $cache_time;
                                                                       ?>
                                                                         </span> 
                                                                  </li>

                          

<?php if ($post['degree_name'] != '' || $post['other_education'] != '') { ?>

    <li> <b>Education Required</b> <span> 
  

                                                                 
                             <?php
                            $comma = ", ";
                            $k = 0;
                            $edu = $post['degree_name'];
                            $edu_nm = explode(',', $edu);

                            if(!$post['degree_name']){

                                echo $post['other_education'];

                            }else if(!$post['other_education']){


                                foreach ($edu_nm as $edun) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('degree', array('degree_id' => $edun))->row()->degree_name;


                            echo $cache_time;
                                $k++;
                            }


                            }else if($post['degree_name'] && $post['other_education']){
                            foreach ($edu_nm as $edun) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('degree', array('degree_id' => $edun))->row()->degree_name;


                            echo $cache_time;
                                $k++;
                            } echo ",". $post['other_education']; }
                        ?>     
                                                
                                                </span>
                                            </li>

                                            <?php }

                                            else
                                            { ?>

                                            <li><b>Education Required</b><span>
                                            <?php
                                              echo PROFILENA; ?>
                                              </span>
                                            </li>
                                      <?php      }
                                            ?>                   <li><b>Employment Type</b><span>
                                            

                                            <?php if($post['emp_type'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['emp_type']).'  Job'; ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>

                                            <li><b>Company Profile</b><span>
                                            

                                            <?php if($post['re_comp_profile'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['re_comp_profile']); ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>
                                          

                 </ul>
                 </div>
                             <div class="profile-job-profile-button clearfix">
                             <div class="profile-job-details col-md-12">
                                         <?php
                                        $this->data['userid'] = $userid = $this->session->userdata('aileenuser');

                                          $contition_array = array('post_id' => $post['post_id'], 'job_delete' => 0, 'user_id' => $userid);
                                          $jobapply = $this->data['jobsave'] = $this->common->select_data_by_condition('job_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                if ($jobapply) {
                                                     ?>

                                                 <a href="javascript:void(0);" class="button applied">Applied</a>
                                                 <?php
                                                 } else {
                                                 ?>
                                                 <li class="fr">
                                               <a href="javascript:void(0);"  class= "<?php echo 'applypost' . $post['post_id']; ?>  button" onclick="applypopup(<?php echo $post['post_id'] ?>,<?php echo $post['user_id'] ?>)">Apply</a>

                                                    </li>
                                                 <li class="fr">
                                               <?php
                                   $userid = $this->session->userdata('aileenuser');
                                  $contition_array = array('user_id' => $userid, 'job_save' => '2', 'post_id ' => $post['post_id'], 'job_delete' => '1');
               
                                  $jobsave = $this->data['jobsave'] = $this->common->select_data_by_condition('job_apply', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                  //  echo "<pre>";print_r($jobsave);

                                 if ($jobsave) {
                                             ?>
                                            <a class="button saved">Saved</a>
                                            <?php } else { ?>
                                            <a id="<?php echo $post['post_id']; ?>" onClick="savepopup(<?php echo $post['post_id']; ?>)" href="javascript:void(0);" class="<?php echo 'savedpost' . $post['post_id']; ?> button">Save</a>
                                            <?php } ?>
                                            </li>
                                         <?php
                                        }
                                     ?>       
      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    } }else{ ?>

                     <div class="art-img-nn">
         <div class="art_no_post_img">

           <img src="<?php echo base_url('img/job-no.png')?>">
        
         </div>
         <div class="art_no_post_text">
           No  Post Available.
         </div>
          </div>
                   <?php }
                }
                else
                    {

                      if(count($postdata) != ''){
                    foreach ($postdata as $post) {
                        ?>

                        <div class="job-contact-frnd ">
                            <div class="profile-job-post-detail clearfix" id="<?php echo "removepost" . $post['post_id']; ?>">
                                <!-- vishang 14-4 end -->
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                     <div class="profile-job-details col-md-12">
                                       <ul>
                                         <li class="fr date_re">
                                           Created Date : <?php echo date('d-M-Y',strtotime($post['created_date'])); ?>
                                          </li>
               
                                           <li class="">
                                            <a class="post_title" href="javascript:void(0)" title="Post Title">
                                             <?php 
                                              $cache_time = $this->db->get_where('job_title', array('title_id' => $post['post_name']))->row()->name;
                                              if(  $cache_time)
                                              {
                                                  echo  $cache_time;
                                              }
                                              else
                                              {
                                                echo $post['post_name'];
                                              }
                                             ?> 
                                            </a> 
                                            </li>
                  
                                             <li> 
                                            <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name;
                                             $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>  
                     
                                                  <?php  
                                                   if($cityname || $countryname)
                                                     { 
                                                        ?>
                                                       <div class="fr lction">
                  
                    
                                                      <p title="Location"><i class="fa fa-map-marker" aria-hidden="true"></i>

                                                          <?php if($cityname){echo $cityname .', ';} echo $countryname; ?> 
                                                        </p>
                                                       
                                                      </div>
                                                      <?php   }    ?>
                                                      <a class="display_inline" title="<?php echo $post['re_comp_name'];?>" href="javascript:void(0)"> <?php 
                                                          $out = strlen($post['re_comp_name']) > 40? substr($post['re_comp_name'],0,40)."..." : $post['re_comp_name'];

                                                                 
                                                            echo $out;
                                                     ?> </a>
                                                </li>
                                                <li ><a class="display_inline" title="Recruiter Name" href="javascript:void(0)"> <?php echo ucfirst(strtolower($post['rec_firstname'])) . ' '.ucfirst(strtolower($post['rec_lastname'])) ; ?> </a></li>
                                                <!-- vishang 14-4 end -->    
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                            <li> <b> Skills</b> <span> 
                             <?php
                            $comma = ", ";
                            $k = 0;
                            $aud = $post['post_skill'];
                            $aud_res = explode(',', $aud);

                            if(!$post['post_skill']){

                                echo $post['other_skill'];

                            }else if(!$post['other_skill']){


                                foreach ($aud_res as $skill) {
                             
                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                              if($cache_time != " "){
                                if ($k != 0) {
                                echo $comma;
                                 
                            }echo $cache_time;
                             $k++;  }

                               
                            }


                            }else if($post['post_skill'] && $post['other_skill']){
                            foreach ($aud_res as $skill) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;


                            echo $cache_time;
                                $k++;
                            } echo ",". $post['other_skill']; }
                        ?>     
                                                
                                                </span>
                                            </li>
                                            <!-- <li><b>Other Skill</b><span> <?php if($post['other_skill'] != ''){ echo $post['other_skill']; } else{ echo PROFILENA;} ?></span>
                                            </li> -->
                                            <li><b>Job Description</b><span><pre><?php echo $this->common->make_links($post['post_description']); ?></pre></span>
                                            </li>
                                            <li><b>Interview Process</b><span>
                                            

                                            <?php if($post['interview_process'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['interview_process']); ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>

                                            <!-- vishang 14-4 start -->
                                              <li>
                                                <b>Required Experience</b>
                                                 <span>
                                                   <p title="Min - Max">
                                                       <?php 


                                                            if(($post['min_year'] !='0' || $post['max_year'] !='0') && ($post['fresher'] == 1))
                                                            { 
 

                                                               echo $post['min_year'].' Year - '.$post['max_year'] .' Year'." , ".   "Fresher can also apply.";
                                                                 } 
                                                             else if(($post['min_year'] !='0' || $post['max_year'] !='0'))
                                                                  {
                                                               echo $post['min_year'].' Year - '.$post['max_year'] . ' Year';
                                                                    }
                                                                  else
                                                                {
                                                                  echo "Fresher";
         
                                                                  }

                                                                  ?> 
    
                                                                  </p>  
                                                                  </span>
                                                
                                                                  </li>


                                             <li><b>Salary</b><span title="Min - Max" >
                                         <?php


            $currency = $this->db->get_where('currency', array('currency_id' => $post['post_currency']))->row()->currency_name;

          if($post['min_sal'] || $post['max_sal']) {
          echo $post['min_sal']." - ".$post['max_sal'].' '. $currency . ' '. $post['salary_type']; } 
          else { echo PROFILENA;} ?></span>
                                            </li>
                                          


                   <li><b>No of Position</b><span><?php echo $post['post_position'].' '. 'Position'; ?></span>
                 </li>

                  <li><b>Industry Type</b> <span>
                                                                  <?php
                                                                      $cache_time = $this->db->get_where('job_industry', array('industry_id' => $post['industry_type']))->row()->industry_name;
                                                                         echo $cache_time;
                                                                       ?>
                                                                         </span> 
                                                                  </li>

                          

<?php if ($post['degree_name'] != '' || $post['other_education'] != '') { ?>

    <li> <b>Education Required</b> <span> 
  

                                                                 
                             <?php
                            $comma = ", ";
                            $k = 0;
                            $edu = $post['degree_name'];
                            $edu_nm = explode(',', $edu);

                            if(!$post['degree_name']){

                                echo $post['other_education'];

                            }else if(!$post['other_education']){


                                foreach ($edu_nm as $edun) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('degree', array('degree_id' => $edun))->row()->degree_name;


                            echo $cache_time;
                                $k++;
                            }


                            }else if($post['degree_name'] && $post['other_education']){
                            foreach ($edu_nm as $edun) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('degree', array('degree_id' => $edun))->row()->degree_name;


                            echo $cache_time;
                                $k++;
                            } echo ",". $post['other_education']; }
                        ?>     
                                                
                                                </span>
                                            </li>

                                            <?php }

                                            else
                                            { ?>

                                            <li><b>Education Required</b><span>
                                            <?php
                                              echo PROFILENA; ?>
                                              </span>
                                            </li>
                                      <?php      }
                                            ?>                   <li><b>Employment Type</b><span>
                                            

                                            <?php if($post['emp_type'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['emp_type']).'  Job'; ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>

                                             <li><b>Company Profile</b><span>
                                            

                                            <?php if($post['re_comp_profile'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['re_comp_profile']); ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>
                                          
                                           
                                        </ul>
                                    </div>
                                    <div class="profile-job-profile-button  clearfix" >
                                        <div class="profile-job-details col-md-12">
                                            <ul><li class="job_all_post last_date">
                                                    Last Date :<?php if($post['post_last_date'] != "0000-00-00"){ echo date('d-M-Y',strtotime($post['post_last_date'])); }else{ echo PROFILENA;} ?></li>
                                                <li class="fr">
                                                    

<a href="javascript:void(0);" class="button" onclick="removepopup(<?php echo $post['post_id'] ?>)">Remove</a>
<a href="<?php echo base_url('recruiter/edit_post/' . $post['post_id']); ?>" class="button">Edit</a>
<!-- <a href="#popup1" class="button">Remove </a> -->
 <?php 


            $join_str[0]['table'] = 'job_reg';
            $join_str[0]['join_table_id'] = 'job_reg.user_id';
            $join_str[0]['from_table_id'] = 'job_apply.user_id';
            $join_str[0]['join_type'] = '';

             $condition_array = array('post_id' => $post['post_id'], 'job_apply.job_delete' => '0','job_reg.status'=> '1','job_reg.is_delete'=> '0','job_reg.job_step' => 10);
             $data= "job_apply.*,job_reg.job_id";
            $apply_candida = $this->common->select_data_by_condition('job_apply', $condition_array, $data, $short_by='', $order_by='', $limit, $offset, $join_str,$groupby = '');

            //echo "<pre>"; print_r($apply_candida);

            $countt = count($apply_candida);

            //die();

  ?>

  
                                                        <a href="<?php echo base_url('recruiter/view_apply_list/' . $post['post_id']); ?>" class="button">Applied  Candidate : <?php echo $countt; ?></a>
                                                </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                  }else{ ?>

                 <div class="art-img-nn">
         <div class="art_no_post_img">

           <img src="<?php echo base_url('img/job-no.png')?>">
        
         </div>
         <div class="art_no_post_text">
           No  Post Available.
         </div>
          </div>
                <?php  }
                }
                    ?>
                </div>
            </div>
</div>
</div>
</div>
<!DOCTYPE html>
  </section>
    <footer>

                        <?php echo $footer; ?>
                    </footer>
                     <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
                    <div class="modal-dialog modal-lm">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>         
                            <div class="modal-body">
                             
                                <span class="mes"></span>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                                <div class="modal-body">
                                    <span class="mes">
                                        <div id="popup-form">
                                            <?php echo form_open_multipart(base_url('recruiter/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                            <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                            <input type="hidden" name="hitext" id="hitext" value="1">
                                           <div class="popup_previred">
                                            <img id="preview" src="#" alt="your image"/>
                                            </div>
                                          
                                            <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                                            <?php echo form_close(); ?>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Model Popup Open -->
                    <!-- Bid-modal  -->
                    <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
                        <div class="modal-dialog modal-lm">
                            <div class="modal-content">
                                <button type="button" class="modal-close" data-dismiss="modal">&times;</button>         
                                <div class="modal-body">
                                   
                                    <span class="mes"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model Popup Close -->
                </body>

            </html>
           
            <!-- script for skill textbox automatic end (option 2)-->


            <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
            <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
            <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
            <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
            
            <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
            <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">

            <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
			<link rel="stylesheet" href="css/jquery.fancybox.css">
			<script type="text/javascript" src="<?php echo base_url('js/jquery.fancybox.js'); ?>"></script>
			
            <script>

                 //   var data = <?php //echo json_encode($demo); ?>;
                    //alert(data);


                    $(function () {
                        // alert('hi');
                        $("#tags").autocomplete({
                            source: function (request, response) {
                                var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                                response($.grep(data, function (item) {
                                    return matcher.test(item.label);
                                }));
                            },
                            minLength: 1,
                            select: function (event, ui) {
                                event.preventDefault();
                                $("#tags").val(ui.item.label);
                                $("#selected-tag").val(ui.item.label);
                                // window.location.href = ui.item.value;
                            }
                            ,
                            focus: function (event, ui) {
                                event.preventDefault();
                                $("#tags").val(ui.item.label);
                            }
                        });
                    });

            </script>

             <script>

                   // var data1 = <?php// echo json_encode($de); ?>;
                    //alert(data);


                    $(function () {
                        // alert('hi');
                        $("#searchplace").autocomplete({
                            source: function (request, response) {
                                var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                                response($.grep(data1, function (item) {
                                    return matcher.test(item.label);
                                }));
                            },
                            minLength: 1,
                            select: function (event, ui) {
                                event.preventDefault();
                                $("#searchplace").val(ui.item.label);
                                $("#selected-tag").val(ui.item.label);
                                // window.location.href = ui.item.value;
                            }
                            ,
                            focus: function (event, ui) {
                                event.preventDefault();
                                $("#searchplace").val(ui.item.label);
                            }
                        });
                    });

            </script>

              <script>

                  //  var data = <?php //echo json_encode($demo); ?>;
                    //alert(data);


                    $(function () {
                        // alert('hi');
                        $("#tags1").autocomplete({
                            source: function (request, response) {
                                var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                                response($.grep(data, function (item) {
                                    return matcher.test(item.label);
                                }));
                            },
                            minLength: 1,
                            select: function (event, ui) {
                                event.preventDefault();
                                $("#tags1").val(ui.item.label);
                                $("#selected-tag").val(ui.item.label);
                                // window.location.href = ui.item.value;
                            }
                            ,
                            focus: function (event, ui) {
                                event.preventDefault();
                                $("#tags1").val(ui.item.label);
                            }
                        });
                    });

            </script>

             <script>

                    //var data1 = <?php// echo json_encode($de); ?>;
                    //alert(data);


                    $(function () {
                        // alert('hi');
                        $("#searchplace1").autocomplete({
                            source: function (request, response) {
                                var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                                response($.grep(data1, function (item) {
                                    return matcher.test(item.label);
                                }));
                            },
                            minLength: 1,
                            select: function (event, ui) {
                                event.preventDefault();
                                $("#searchplace1").val(ui.item.label);
                                $("#selected-tag").val(ui.item.label);
                                // window.location.href = ui.item.value;
                            }
                            ,
                            focus: function (event, ui) {
                                event.preventDefault();
                                $("#searchplace1").val(ui.item.label);
                            }
                        });
                    });

            </script>
          
           
            <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
            <script>
                    function removepopup(id) {
                        $('.biderror .mes').html("<div class='pop_content'>Do you want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show').fadeIn();
                    }
					/*function removepopup(id) {
                        $('.biderror .mes').html("<div class='pop_content'>Do you want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show').fadeIn();
                    }*/
                    function updateprofilepopup(id) {
                        $('#bidmodal-2').modal('show').fadeIn("slow");
                    }
					
					$(document).ready(function () {
						$("body").click(function (event) {
							//$('#bidmodal').modal('hide').fadeOut();
						});

					});
            </script>

            <script type="text/javascript">
                function checkvalue() {
                    //alert("hi");
                    var searchkeyword =$.trim(document.getElementById('tags').value);
                    var searchplace =$.trim(document.getElementById('searchplace').value);
                    // alert(searchkeyword);
                    // alert(searchplace);
                    if (searchkeyword == "" && searchplace == "") {
                        // alert('Please enter Keyword');
                        return false;
                    }
                }
            </script>

            <script type="text/javascript">
                        function check() {
                            var keyword = $.trim(document.getElementById('tags1').value);
                            var place = $.trim(document.getElementById('searchplace1').value);
                            if (keyword == "" && place == "") {
                                return false;
                            }
                        }
                    </script>
  <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function () {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>

            <!-- cover image start -->
            <script>
                function myFunction() {
                    // alert("hhhjhj");
                    document.getElementById("upload-demo").style.visibility = "hidden";
                    document.getElementById("upload-demo-i").style.visibility = "hidden";
                    document.getElementById('message1').style.display = "block";


                    //setTimeout(function () { location.reload(1); }, 5000);

                }


                function showDiv() {
                    //alert(hi);
                    document.getElementById('row1').style.display = "block";
                    document.getElementById('row2').style.display = "none";
                     $("#upload").val('');
                }
            </script>

            <script type="text/javascript">
                $uploadCrop = $('#upload-demo').croppie({
                    enableExif: true,
                    viewport: {
                        width: 1250,
                        height: 350,
                        type: 'square'
                    },
                    boundary: {
                        width: 1250,
                        height: 350
                    }
                });


                $('.upload-result').on('click', function (ev) {
                    //  alert("hi");
                    $uploadCrop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function (resp) {

                        $.ajax({
                            url: "<?php echo base_url() ?>recruiter/ajaxpro",
                            type: "POST",
                            data: {"image": resp},
                            success: function (data) {
                                html = '<img src="' + resp + '" />';
                                if (html) {
                                    window.location.reload();
                                }
                            }
                        });

                    });
                });

                $('.cancel-result').on('click', function (ev) {

                    document.getElementById('row2').style.display = "block";
                    document.getElementById('row1').style.display = "none";
                    document.getElementById('message1').style.display = "none";

                });

                //aarati code start
                $('#upload').on('change', function () {
                    //alert("hello");


                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $uploadCrop.croppie('bind', {
                            url: e.target.result
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });

                    }
                    reader.readAsDataURL(this.files[0]);

                });

                $('#upload').on('change', function () {

                    var fd = new FormData();
                    fd.append("image", $("#upload")[0].files[0]);

                    files = this.files;
                    size = files[0].size;

 // pallavi code start for file type support
if (!files[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
    //alert('not an image');
    picpopup();

    document.getElementById('row1').style.display = "none";
    document.getElementById('row2').style.display = "block";
    return false;
  }
  // file type code end

                    if (size > 26214400)
                    {
                        //show an alert to the user
                        alert("Allowed file size exceeded. (Max. 25 MB)")

                        document.getElementById('row1').style.display = "none";
                        document.getElementById('row2').style.display = "block";

                        return false;
                    }


                    $.ajax({

                        url: "<?php echo base_url(); ?>recruiter/image",
                        type: "POST",
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: function (response) {

                        }
                    });
                });

                //aarati code end
            </script>
            <!-- cover image end -->
            <!-- remove post start -->

            <script type="text/javascript">
                function remove_post(abc)
                {


                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "recruiter/remove_post" ?>',
                        data: 'post_id=' + abc,
                        success: function (data) {

                            $('#' + 'removepost' + abc).html(data);
                            $('#' + 'removepost' + abc).parent().removeClass();
                            var numItems = $('.contact-frnd-post .job-contact-frnd').length;

                            if (numItems == '0') {
                              
                                var nodataHtml = "<div class='art-img-nn'><div class='art_no_post_img'><img src='<?php echo base_url('img/job-no.png')?>'></div><div class='art_no_post_text'> No Post Available.</div></div>";
                                $('.contact-frnd-post').html(nodataHtml);
                            }

                        }
                    });

                }
            </script>

            <script>
                function divClicked() {
                    var divHtml = $(this).html();
                    var editableText = $("<textarea/>");
                    editableText.val(divHtml);
                    $(this).replaceWith(editableText);
                    editableText.focus();
                    // setup the blur event for this new textarea
                    editableText.blur(editableTextBlurred);
                }

                function editableTextBlurred() {
                    var html = $(this).val();
                    var viewableText = $("<a>");
                      if (html.match(/^\s*$/) || html == '') { 
                                html = "Designation";
                                }
                    viewableText.html(html);
                    $(this).replaceWith(viewableText);
                    // setup the click event for this new div
                    viewableText.click(divClicked);

                    $.ajax({
                        url: "<?php echo base_url(); ?>recruiter/ajax_designation",
                        type: "POST",
                        data: {"designation": html},
                        success: function (response) {

                        }
                    });
                }

                $(document).ready(function () {
                    $("a.designation").click(divClicked);
                });
            </script>

            <script type="text/javascript">
                    function save_post(abc)
                    {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() . "job/job_save" ?>',
                            data: 'post_id=' + abc,
                            success: function (data) {
                                $('.' + 'savedpost' + abc).html(data).addClass('saved');
                            }
                        });

                    }
                </script>

                <!-- save post end -->

                <!-- apply post start -->

                <script type="text/javascript">
                    function apply_post(abc, xyz) {
                        //var alldata = document.getElementById("allpost" + abc);
                        var alldata = 'all';
                        //var user = document.getElementById("userid" + abc);
                        var user = xyz;

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() . "job/job_apply_post" ?>',
//                            data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
                            data: 'post_id=' + abc + '&allpost=' + alldata + '&userid=' + user,
                            success: function (data) {
                                $('.savedpost' + abc).hide();
                                $('.applypost' + abc).html(data);
                                $('.applypost' + abc).attr('disabled', 'disabled');
                                $('.applypost' + abc).attr('onclick', 'myFunction()');
                                $('.applypost' + abc).addClass('applied');
                            }
                        });
                    }
                </script>


                 <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                <script>
                    function savepopup(id) {
                        save_post(id);
//                        $('.biderror .mes').html("<div class='pop_content'>Your Post is Successfully Saved.<div class='model_ok_cancel'><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal' style='right:235px !important;'>Ok</a></div></div>");
                        $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
                        $('#bidmodal').modal('show');
                    }
                    function applypopup(postid, userid) {
                        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to apply this post?<div class='model_ok_cancel'><a class='okbtn' id=" + postid + " onClick='apply_post(" + postid + "," + userid + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show');
                    }
                </script>

<!-- script for profile pic strat -->
<script type="text/javascript">
    

     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
            
            document.getElementById('preview').style.display = 'block';
                $('#preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#profilepic").change(function(){
         // pallavi code for not supported file type 10/06/2017
      profile = this.files;
      //alert(profile);
      if (!profile[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
       //alert('not an image');
        $('#profilepic').val('');
         picpopup();
         return false;
          }else{
          readURL(this);}

          // end supported code 
    });
</script>

<!-- script for profile pic end -->


<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>


<script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#userimage").validate({

                    rules: {

                        profilepic: {

                            required: true,
                         
                        },
  

                    },

                    messages: {

                        profilepic: {

                            required: "Photo Required",
                            
                        },

                },

                });
                   });
  </script>
  <script>
function picpopup() {
                            
                      
            $('.biderror .mes').html("<div class='pop_content'>Only Image Type Supported");
            $('#bidmodal').modal('show');
                        }
                    </script>

<!-- all popup close close using esc start -->
 <script type="text/javascript">
   

    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal').modal('hide');
    }
});  


    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal-2').modal('hide');
    }
});

 </script>
 <!-- all popup close close using esc end -->

 <script type="text/javascript">
//For Scroll page at perticular position js Start
$(document).ready(function(){
 
//  $(document).load().scrollTop(1000);
     
    $('html,body').animate({scrollTop:265}, 100);

});
//For Scroll page at perticular position js End
</script>
<script>
    // recruiter search header 2  start
// recruiter search header 2 location start
  var base_url = '<?php echo base_url(); ?>';
$(function () {  
    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(".rec_search_loc").bind("keydown", function (event) { 
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })
            .autocomplete({
                minLength: 2,
                source: function (request, response) {
                    // delegate back to autocomplete, but extract the last term
                    $.getJSON(base_url + "recruiter/get_location", {term: extractLast(request.term)}, response);
                },
                focus: function () {
                    // prevent value inserted on focus
                    return false;
                },
                select: function (event, ui) {

                    var text = this.value;
                    var terms = split(this.value);

                    text = text == null || text == undefined ? "" : text;
                    var checked = (text.indexOf(ui.item.value + ', ') > -1 ? 'checked' : '');
                    if (checked == 'checked') {

                        terms.push(ui.item.value);
                        this.value = terms.split(", ");
                    }//if end

                    else {
                        if (terms.length <= 1) {
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(ui.item.value);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            this.value = terms.join(", ");
                            return false;
                        } else {
                            var last = terms.pop();
                            $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                            $(this).effect("highlight", {}, 1000);
                            $(this).attr("style", "border: solid 1px red;");
                            return false;
                        }
                    }
                }//end else
            });
});

// recruiter searc location end
// recruiter searc title start
$(function () { 
    function split(val) {
        return val.split(/,\s*/);
    }
    function extractLast(term) {
        return split(term).pop();
    }

    $(".rec_search_title").bind("keydown", function (event) { 
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).autocomplete("instance").menu.active) {
            event.preventDefault();
        }
    })
            .autocomplete({
                minLength: 2,
                source: function (request, response) {
                    // delegate back to autocomplete, but extract the last term
                    $.getJSON(base_url + "recruiter/get_job_tile", {term: extractLast(request.term)}, response);
                },
                focus: function () {
                    // prevent value inserted on focus
                    return false;
                },
                select: function (event, ui) {

                    var text = this.value;
                    var terms = split(this.value);

                    text = text == null || text == undefined ? "" : text;
                    var checked = (text.indexOf(ui.item.value + ', ') > -1 ? 'checked' : '');
                    if (checked == 'checked') {

                        terms.push(ui.item.value);
                        this.value = terms.split(", ");
                    }//if end

                    else {
                        if (terms.length <= 1) {
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(ui.item.value);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            this.value = terms.join(", ");
                            return false;
                        } else {
                            var last = terms.pop();
                            $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                            $(this).effect("highlight", {}, 1000);
                            $(this).attr("style", "border: solid 1px red;");
                            return false;
                        }
                    }
                }//end else
            });
});

// recruiter searc title end
// recruiter search end
    </script>