  <!-- start head -->
<?php  echo $head; ?>

<!--post save success pop up style strat -->
<style>
body {
  font-family: Arial, sans-serif;
  background-size: cover;
  height: 100vh;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
 }

/*.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.3);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
  z-index: 10;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 30%;
    height: 200px;
    position: relative;
    transition: all 5s ease-in-out;
}

.okk{
  text-align: center;
}

.popup .okbtn {
  position: absolute;
    transition: all 200ms;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    padding: 8px 18px;
    background-color: darkcyan;
    left: 25px;
    margin-top: 15px;
    width: 100px; 
    border-radius: 8px;
}

.popup .cnclbtn {
  position: absolute;
    transition: all 200ms;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    color: #fff;
    padding: 8px 18px;
    background-color: darkcyan;
    right: 25px;
    margin-top: 15px;
    width: 100px;
    border-radius: 8px;
}

.popup .pop_content {
 text-align: center;
 margin-top: 40px;
  
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}*/
</style>

<!--post save success pop up style end -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


<!-- <style type="text/css" media="screen">
    #row2 { overflow: hidden; width: 100%; }
    #row2 img { height: 350px;width: 100%; }
    .upload-img{    float: right;
                    position: relative;
                    margin-top: -135px;
                    right: 50px; }

    label.cameraButton {
        display: inline-block;
        margin: 1em 0;
        cursor: pointer;
        /* Styles to make it look like a button */
        padding: 0.5em;
        border: 2px solid #666;
        border-color: #EEE #CCC #CCC #EEE;
        background-color: #DDD;
        opacity: 0.7;
    }

    /* Look like a clicked/depressed button */
    label.cameraButton:active {
        border-color: #CCC #EEE #EEE #CCC;
    }

    /* This is the part that actually hides the 'Choose file' text box for camera inputs */
    label.cameraButton input[accept*="camera"] {
        display: none;
    }




</style> -->

<!-- END HEAD -->
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>


    <!-- END HEADER -->

<?php
 $returnpage= $_GET['page'];
 if($returnpage == 'job'){
     echo $job_header2; 
 }
 elseif($returnpage == 'notification'){
 }
 else{
  echo $recruiter_header2; 

 }
?>

<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed">
           
      <div class="row" id="row1" style="display:none;">
        <div class="col-md-12 text-center">
        <div id="upload-demo" style="width:100%"></div>
        </div>
        <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
        <button class="btn btn-success  cancel-result" onclick="">Cancel</button>
   
        <button class="btn btn-success  upload-result set-btn" onclick="myFunction()">Upload Image</button>

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
        <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:3px;margin-top:30px"></div>
        </div>
      </div>

     
<div class="container">
  <div class="row" id="row2">
        <?php
       $userid  = $this->session->userdata('aileenuser');
        if($this->uri->segment(3) == $userid){
            $user_id = $userid;
        }elseif($this->uri->segment(3) == ""){
           $user_id = $userid;
        }else{
            $user_id = $this->uri->segment(3);
        }
            $contition_array = array( 'user_id' => $user_id, 'is_delete' => '0' , 're_status' => '1');
            $image = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          
          $image_ori=$image[0]['profile_background'];
           if($image_ori)
           {
            ?>
            <div class="bg-images">
            <img src="<?php echo base_url(RECBGIMAGE . $image[0]['profile_background']);?>" name="image_src" id="image_src" / ></div>
            <?php
           }
           else
           { ?>
         <div class="bg-images">
            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / ></div>
         <?php  }
          
            ?>

    </div>
    </div>
</div>
  </div>
  </div>   

    <div class="container">    
      <div class="upload-img">
      
        <?php if($returnpage == ''){ ?>
      <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
        <?php }?>
      </div>
  
            <div class="profile-photo">
              <div class="profile-pho">

                <div class="user-pic">
                                <?php if($recdata[0]['recruiter_user_image'] != '' ){ ?>
                           <img src="<?php echo base_url(USERIMAGE . $recdata[0]['recruiter_user_image']);?>" alt="" >
                            <?php } else { ?>
                            <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?>
                            <!-- <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
 -->
                        <?php if($returnpage == ''){ ?>
                         <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                        <?php }?>
                        </div>
                       
                        <!-- <div id="popup-form">
                        <?php echo form_open_multipart(base_url('recruiter/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="2">
                        <input type="submit" name="cancel2" id="cancel2" value="Cancel">
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                     <?php echo form_close(); ?>
                      
                </div> -->

                 </div>
                    <!-- menubar --><div class="profile-main-rec-box-menu  col-md-12 ">

<div class="left-side-menu col-md-2">  </div>
<div class="right-side-menu col-md-5">  
 <ul class="">
                                  
 <li <?php if($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_profile'){?> class="active" <?php } ?>>
        <?php if($returnpage == 'job'){?>
     <a title="Details" href="<?php echo base_url('recruiter/rec_profile/'.$this->uri->segment(3).'?page='.$returnpage); ?>">Details</a>
        <?php }else{?>
     <a title="Details" href="<?php echo base_url('recruiter/rec_profile'); ?>">Details</a>
        <?php }?>
                                    </li>



                                    <?php
                                    if(($this->uri->segment(1) == 'recruiter') && ($this->uri->segment(2) == 'rec_post' || $this->uri->segment(2) == 'rec_profile' || $this->uri->segment(2) == 'add_post' || $this->uri->segment(2) == 'save_candidate') && ($this->uri->segment(3) == $this->session->userdata('aileenuser')|| $this->uri->segment(3) == '' ||  $this->uri->segment(3) != '')) { ?>

                                       <li <?php if($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_post'){?> class="active" <?php } ?>>
                                           <?php if($returnpage == 'job'){ ?>
                                           <a title="Candidate Post" href="<?php echo base_url('recruiter/rec_post/'.$this->uri->segment(3).'?page='.$returnpage); ?>">Post</a>
                                           <?php } else {?>
                                           <a title="Candidate Post" href="<?php echo base_url('recruiter/rec_post'); ?>">Post</a>
                                           <?php }?>
                                    </li>


                                    <?php }?>    

                                    <?php
                                    if(($this->uri->segment(1) == 'recruiter') && ($this->uri->segment(2) == 'rec_post' || $this->uri->segment(2) == 'rec_profile' || $this->uri->segment(2) == 'add_post' || $this->uri->segment(2) == 'save_candidate') && ($this->uri->segment(3) == $this->session->userdata('aileenuser')|| $this->uri->segment(3) == '')) { ?>

                                    <li <?php if($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save_candidate'){?> class="active" <?php } ?>><a title="Saved Candidate" href="<?php echo base_url('recruiter/save_candidate'); ?>">Saved </a>
                                    </li> 
                                                                          <fa>
                                    </li> 


                                    <?php }?>               
</ul>
</div>

   <div class="col-md-2">
                <div class="flw_msg_btn fr">
                    <ul>
                    <?php
                    if($this->uri->segment(3) != ""){ ?>
                       <li> <a href="<?php echo base_url('chat/abc/' . $this->uri->segment(3)); ?>">Message</a> </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

  </div>  
    <!-- menubar -->                
  <div class="job-menu-profile1 col-md-3">
                         <a href="javascript:void(0);" title="<?php echo $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?>"><h5><?php echo $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?></h5></a>
                            <!-- text head start -->
                    <div class="profile-text" >
                   
                     <?php 
                if($returnpage == ''){   
                  if ($recdata[0]['designation'] == "") {
               ?>
                            <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                        
                <center><a id="designation" class="designation" title="Designation">Designation</a></center>
            <?php }
             else {
               
                ?> 
                <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
                <a id="designation" class="designation" title="<?php echo ucwords($recdata[0]['designation']); ?>"><?php echo ucwords($recdata[0]['designation']); ?></a>
             <?php }
             
             } else {  echo ucwords($recdata[0]['designation']);  }  ?>

                    <!-- The Modal -->
            <!--         <div id="myModal" class="modal">
                      <!-- Modal content --><!-- <div class="col-md-2"></div> -->
                      <!-- <div class="modal-content col-md-8">
                        <span class="close">&times;</span>
                        <fieldset></fieldset>
                         <?php //echo form_open(base_url('recruiter/recruiter_designation/'), array('id' => 'recdesignation','name' => 'recdesignation', 'class' => 'clearfix')); ?>

  <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php //echo $recdata[0]['designation']; ?>"></fieldset> -->
        <!--  <input type="hidden" name="hitext" id="hitext" value="2">
  <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
                        <?php// echo form_close();?>
  
                    
                     
                    </div>
                    <div class="col-md-2"></div>
              </div>
             --> 
            </div>
            
  <div  class="add-post-button">
        <?php if($returnpage == '') {?>
        <a class="btn btn-3 btn-3b" href="<?php echo base_url('recruiter/add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
        <?php } ?>
  </div>
  </div>


            <!-- text head end -->
                      </div>
                      <div class="col-md-7 col-sm-7">
                        <div class="common-form">
                            <div class="job-saved-box">
                              
                             <h3>Details  </h3>
                               
<?php

function text2link($text){
    $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
    $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
    $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
    return $text;
  } 

?>  






          
                               
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                        <div class="profile-job-post-detail clearfix">
                                          
                                            <div class="profile-job-post-title clearfix">
                                                 <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
              <li> <p class="details_all_tital "> Basic Information</p></li>
                                                          
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <li> <b> Name</b> <span> 
                                                        <?php 
                   if($recdata[0]['rec_firstname'] || $recdata[0]['rec_lastname'] )
                    { 
                    echo $recdata[0]['rec_firstname'] . $recdata[0]['rec_lastname'];
                     } 
                    else
                    {
                     echo PROFILENA;
                   }
                   ?> </span>
                                                        </li>
                                                       
                                                      <li> <b>Email </b><span> 
                                                    <?php 

                                                     if($recdata[0]['rec_email'])
                                                      {
                                                        echo $recdata[0]['rec_email'];
                                                      }
                                                      else
                                                      {
                                                     echo PROFILENA; 
                                                      }

                                                        ?> </span>
                                                        </li>
                                                        <li><b> Phone Number</b> <span><?php 

                                                         if($recdata[0]['rec_phone'])
                                                      {
                                                        echo $recdata[0]['rec_phone'];
                                                      }
                                                      else
                                                      {
                                                     echo PROFILENA; 
                                                      }

                                                         ?></span> </li>
                                                       
                                                    </ul>
                                               
                                                </div>
                                            </div>
                                           <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
              
           <li><p class="details_all_tital ">Company Information</p></li>
                                                          
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                         <li> <b>Company Name</b><span><?php 

                                                      if($recdata[0]['re_comp_name'])
                                                      {
                                                        echo $recdata[0]['re_comp_name'];
                                                      }
                                                      else
                                                      {
                                                     echo PROFILENA; 
                                                      }

                                                         ?></span>
                                                        </li>
                                                        <li><b> Company Email Address</b> <span><?php 

                                                    if($recdata[0]['re_comp_email'])
                                                      {
                                                        echo $recdata[0]['re_comp_email'];
                                                      }
                                                      else
                                                      {
                                                     echo PROFILENA; 
                                                      }

                                                         ?></span> </li>
                                                             <li> <b>Company Phone Number</b><span> <?php 
                                                               if($recdata[0]['re_comp_phone'])
                                                      {
                                                        echo $recdata[0]['re_comp_phone'];
                                                      }
                                                      else
                                                      {
                                                     echo PROFILENA; 
                                                      }

                                                      ?></span>
                                                        </li>

                                                      <?php 
                                                      if($recdata[0]['re_comp_site'])
                                                      {
                                                      ?>
                                                      <li> <b>Company Website</b><span><a href="http://<?php echo $recdata[0]['re_comp_site'] ?>" target="_blank"><?php 

                                                      if($recdata[0]['re_comp_site'])
                                                      {
                                                        echo $recdata[0]['re_comp_site'];
                                                      }
                                                      else
                                                      {
                                                     echo PROFILENA; 
                                                      }
                                                       ?></a></span>
                                                        </li>
                                                      <?php
                                                    }
                                                    ?>


                                                    <?php 
                                                      if($recdata[0]['re_comp_interview'])
                                                      {
                                                      ?>
                                                         <li> <b>Company Interview Process</b><span>  
                                             <?php 

                                              if($recdata[0]['re_comp_interview'])
                                                      {
                                                        echo text2link($recdata[0]['re_comp_interview']);
                                                      }
                                                      else
                                                      {
                                                     echo PROFILENA; 
                                                      }
                                                       ?>
                                                         </span>
                                                        </li>
                                                          <?php
                                                    }
                                                    ?>

                                                    
                                                        <?php
                                                          if($recdata[0]['re_comp_project'])
                                                          {
                                                        ?>
                                                        <li><b> Company Best Project</b> <span>
                                                       <?php 
                                                      if($recdata[0]['re_comp_project'])
                                                                    {
                                                                        echo text2link($recdata[0]['re_comp_project']);
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }
                                                           ?></span> </li>
                                                        </li>
                                                          <?php
                                                      }
                                                      ?>
                                                          

                                                          <?php
                                                          if($recdata[0]['re_comp_activities'])
                                                          {
                                                          ?>
                                                          <li><b> Other Activities</b> <span>
                                                          <?php 
                                             if($recdata[0]['re_comp_activities'])
                                                                    {
                                                                        echo text2link($recdata[0]['re_comp_activities']);
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }
                                                            ?></span> </li>
                                                        </li>
                                                          <?php
                                                                }
                                                          ?>

                                                    </ul>
                                                </div>
                                                      <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
            
          <li><p class="details_all_tital ">Company Address</p></li>
                                                          
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                           <li> <b> Country</b> <span><?php $cache_time = $this->db->get_where('countries',array('country_id' => $recdata[0]['re_comp_country']))->row()->country_name; 

                                                            if($cache_time)
                                                                    {
                                                                         echo $cache_time;
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }
                                                                   ?></span>
                                                        </li>
                                                       
                                                        <li> <b>State </b><span> <?php  $cache_time=$this->db->get_where('states',array('state_id' => $recdata[0]['re_comp_state']))->row()->state_name; 
                                                          if($cache_time)
                                                                    {
                                                                         echo $cache_time;
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }

                                                         ?> </span>
                                                        </li>

                                                        <?php
                                                          if($recdata[0]['re_comp_city'])
                                                          {
                                                        ?>
                                                        <li><b> City</b> <span><?php $cache_time= $this->db->get_where('cities',array('city_id' => $recdata[0]['re_comp_city']))->row()->city_name;  
                                                         if($cache_time)
                                                                    {
                                                                         echo $cache_time;
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }


                                                        ?></span> </li>
                                                        </li>
                                                        <?php
                                                      }
                                                      ?>

                                                          <li> <b>Postal Address</b><span> <?php
                                                          if($recdata[0]['re_comp_address'])
                                                                    {
                                                                          echo $recdata[0]['re_comp_address'];
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }
                                                            ?> </span>
                                                        </li>

                                                    </ul>
                                                </div>

                                        </div>
                                        </div>
                    </div>
                    </div>
                      </div>
                      </div>

<div class="user-midd-section">
            <div class="container">
                <div class="row">
                       <div class="col-md-3"> 
  </div>
                      
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <div class="modal fade message-box" id="bidmodal-2" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
            <div class="modal-body">
                <span class="mes">
                    <div id="popup-form">
                        <?php echo form_open_multipart(base_url('recruiter/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="2">
                        <!-- <input type="submit" name="cancel3" id="cancel2" value="Cancel"> -->
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                        <?php echo form_close(); ?>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<!-- 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->

 <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
       <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<script>

var data= <?php echo json_encode($demo); ?>;
//alert(data);

        
$(function() {
    // alert('hi');
$( "#tags" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
    }
});
});
  
</script>

  <script type="text/javascript">
function checkvalue(){
   //alert("hi");
  var searchkeyword=document.getElementById('tags').value;
  var searchplace=document.getElementById('searchplace').value;
  // alert(searchkeyword);
  // alert(searchplace);
  if(searchkeyword == "" && searchplace == ""){
     //alert('Please enter Keyword');
    return false;
  }
}
  
</script>

<script>
//select2 autocomplete start for skill

//select2 autocomplete End for skill

//select2 autocomplete start for Location
$('#searchplace').select2({
        
        placeholder: 'Find Your Location',
         maximumSelectionLength: 1,
        ajax:{

         
          url: "<?php echo base_url(); ?>recruiter/location",
          dataType: 'json',
          delay: 250,
          
          processResults: function (data) {
            
            return {
              //alert(data);

              results: data


            };
            
          },
           cache: true
        }
      });
//select2 autocomplete End for Location



  </script>

  <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
    function removepopup(id) {
        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
    function updateprofilepopup(id) {
        $('#bidmodal-2').modal('show');
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
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<!-- cover image start -->
<script>
function myFunction() {
   document.getElementById("upload-demo").style.visibility = "hidden";
   document.getElementById("upload-demo-i").style.visibility = "hidden";
   document.getElementById('message1').style.display = "block";

   //setTimeout(function () { location.reload(1); }, 5000);
   
   }

  // <?php //echo "hi"; ?>

    function showDiv() {
        //alert(hi);
        document.getElementById('row1').style.display = "block";
        document.getElementById('row2').style.display = "none";
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



        if (size > 4194304)
        {
            //show an alert to the user
            alert("Allowed file size exceeded. (Max. 4 MB)")

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
                      