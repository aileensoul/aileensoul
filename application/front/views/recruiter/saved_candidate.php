
<?php echo $head; ?>

<!--post save success pop up style strat -->
<style>
    /*body {
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

    .overlay {
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
*/
    .okk{
        text-align: center;
    }

 /*   .popup .okbtn{
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
*/
    .pop_content .okbtn{
        position: absolute;
        transition: all 200ms;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        padding: 8px 18px;
        background-color: #0A2C5D;
        left: 170px;
        margin-top: 8px;
        width: 100px; 
        border-radius: 8px;
    }

  /*  .popup .cnclbtn {
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
    } */
    .pop_content .cnclbtn {
        position: absolute;
        transition: all 200ms;
        font-size: 16px;
        text-decoration: none;
        color: #fff;
        padding: 8px 18px;
        background-color: #0A2C5D;
        right: 170px;
        margin-top: 8px;
        width: 100px;
        border-radius: 8px;
    }

    .popup .pop_content {
        text-align: center;
        margin-top: 40px;

    }
    .model_ok_cancel{
        width:200px !important;
    }

/*
    @media screen and (max-width: 700px){
        .box{
            width: 70%;
        }
        .popup{
            width: 70%;
        }
    } */
</style>


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
<!-- start header -->
<?php echo $header; ?>

<?php echo $recruiter_header2; ?>



<script type="text/javascript">
    function checkvalue() {
        //alert("hi");
        var searchkeyword = document.getElementById('tags').value;
        var searchplace = document.getElementById('searchplace').value;
// alert(searchkeyword);
// alert(searchplace);
        if (searchkeyword == "" && searchplace == "") {
            //alert('Please enter Keyword');
            return false;
        }
    }
</script>
<!-- END HEADER -->

<body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed">

            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                    <button class="btn btn-success  cancel-result" onclick="">Cancel</button>

                    <button class="btn btn-success upload-result fr" onclick="myFunction()">Upload Image</button>

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
                    <div id="upload-demo-i" style="background:#e1e1e1;width:100%;padding:30px;height:1px;margin-top:30px"></div>
                </div>
            </div>


            <div class="container">
                <div class="row" id="row2">
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
                    //echo "<pre>";print_r($image);
                    $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url(RECBGIMAGE . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / ></div>
                        <?php
                    } else {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / ></div>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>   

<div class="container">    
    <div class="upload-img">


        <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>

    </div>
    <!-- </div>
    -->
    <!-- </div>
    -->   
    <div class="profile-photo">
        <div class="profile-pho">

            <div class="user-pic">
                <?php if ($recruiterdata[0]['recruiter_user_image'] != '') { ?>
                    <img src="<?php echo base_url(USERIMAGE . $recruiterdata[0]['recruiter_user_image']); ?>" alt="" >
                <?php } else { ?>
                    <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                <?php } ?>
                <!-- <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a> -->

                 <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
            </div>

        <!--     <div id="popup-form">
                <?php //echo form_open_multipart(base_url('recruiter/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                <input type="hidden" name="hitext" id="hitext" value="3">
                <input type="submit" name="cancel3" id="cancel3" value="Cancel">
                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                </form>

            </div> -->


        </div>

        <!-- menubar --><div class="profile-main-rec-box-menu  col-md-12 ">

            <div class="left-side-menu col-md-2">  </div>
            <div class="right-side-menu col-md-9">
                <ul class="">


                    <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_profile') { ?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/rec_profile'); ?>">Details</a>
                    </li>


                    <?php if (($this->uri->segment(1) == 'recruiter') && ($this->uri->segment(2) == 'rec_post' || $this->uri->segment(2) == 'rec_profile' || $this->uri->segment(2) == 'add_post' || $this->uri->segment(2) == 'save_candidate') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>

                        <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_post') { ?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/rec_post'); ?>">Post</a>
                        </li>


                        <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save_candidate') { ?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/save_candidate'); ?>">Saved </a>
                        </li> 
                        <fa>
                            </li> 


                        <?php } ?>   

                </ul>
            </div>

        </div>  
        <!-- menubar -->                
    </div>                        <div class="job-menu-profile1">
        <a href="<?php echo site_url('recruiter/rec_profile/' . $recruiterdata[0]['user_id']); ?>"><h5><?php echo $recruiterdata[0]['rec_firstname'] . ' ' . $recruiterdata[0]['rec_lastname']; ?></h5></a>
        <!-- text head start -->
        <div class="profile-text" >

         <?php 
                  
            if ($recruiterdata[0]['designation'] == "") {

               
                ?>
                            <!--<center><a id="myBtn" title="Designation">Designation</a></center>-->
                <a id="designation" class="designation" title="Designation">Designation</a>
            <?php }
             else {
               // echo "hello";
               
                ?> 
                <!--<a id="myBtn" title="<?php echo ucwords($job[0]['designation']); ?>"><?php echo ucwords($job[0]['designation']); ?></a>-->
                <a id="designation" class="designation" title="<?php echo ucwords($recruiterdata[0]['designation']); ?>"><?php echo ucwords($recruiterdata[0]['designation']); ?></a>
            <?php } ?>



            <!-- The Modal -->
          <!--   <div id="myModal" class="modal"> -->
                <!-- Modal content -->
                <!-- <div class="col-md-2"></div>
                <div class="modal-content col-md-8">
                    <span class="close">&times;</span>
                    <fieldset></fieldset>
                    <?php //echo form_open(base_url('recruiter/recruiter_designation/'), array('id' => 'recdesignation', 'name' => 'recdesignation', 'class' => 'clearfix')); ?> -->

                <!--     <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php //echo $recruiterdata[0]['designation']; ?>"></fieldset>
                    <input type="hidden" name="hitext" id="hitext" value="3">
                    <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
                    <?php //echo form_close(); ?>

                </div>

                <div class="col-md-2">

                </div>
            </div> -->
        </div>

        <!-- text head end -->
    </div>
    <div class="col-md-7 col-sm-7">
        <div class="common-form">
            <div class="job-saved-box">
                <h3>Saved Candidate</h3>
                <div class="contact-frnd-post">
                   
                        <?php
//                        echo '<pre>';
//                        print_r($recdata);
//                        exit;
                        if ($recdata) {
                            foreach ($recdata as $rec) {


                                $userid = $this->session->userdata('aileenuser');
                                $contition_array = array('from_id' => $userid, 'save_id' => $rec['save_id']);
                                $userdata = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                if ($userdata[0]['status'] != 1) {
                                    ?>
 <div class="job-contact-frnd ">
     <div class="profile-job-post-detail clearfix" id="<?php echo "removeuser" . $userdata[0]['save_id']; ?>">

     <div class="profile-job-post-title-inside clearfix">
                                           <!--  <div class="profile-job-post-location-name"> --> 

     <div class="profile-job-profile-button clearfix"> 

                                                <!-- pop up box start-->
                                                <!-- <div id="popup1" class="overlay">
                                                    <div class="popup">-->
<!-- khati changes 11-4 start -->
                                                     <!--    <div class="pop_content">
                                                            Are You Sure want to delete this user?.

                                                            <p class="okk"><a class="okbtn" id="<?php echo $rec['save_id']; ?>" onClick="remove_user(this.id)" href="#">Yes</a></p>

                                                            <p class="okk"><a class="cnclbtn" href="#">No</a></p>

                                                        </div> -->
<!-- khati changes 11-4 start -->
<!-- 
                                                    </div>
                                                </div>  -->
                                                <!-- pop up box end-->

                  <div class="profile-job-post-location-name-rec">
                 <div style="display: inline-block; float: left;">
<div class="buisness-profile-pic-candidate" >
                                <!-- <rash code 12-4 start> -->

                  <?php
                 if ($rec['job_user_image']) {
                    ?>
                <img src="<?php echo base_url(USERIMAGE . $rec['job_user_image']); ?>" alt="<?php echo $rec[0]['fname']. ' ' . $rec[0]['lname']; ?>">
                     <?php
                       } else {
                          ?>
                <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $rec[0]['fname']. ' ' . $rec[0]['lname']; ?>">
                       <?php
                      }
                   ?>

                <!-- <rash code 12-4 end> -->

                                 </div>
                                </div>

                               
                <div class="designation_rec_1 fl ">
             <ul>
                <li> 
      <a class="post_name"  href="<?php echo base_url('job/job_printpreview/' . $rec['user_id'].'?page=recruiter'); ?>" title="<?php echo $rec[0]['fname']. ' ' . $rec[0]['lname']; ?>">
        <?php echo $this->db->get_where('job_reg', array('user_id' => $rec['to_id']))->row()->fname . ' ' . $this->db->get_where('job_reg', array('user_id' => $rec['to_id']))->row()->lname; ?></a>
                 </li>
   
          <li style="display: block;">

                <a class="post_designation"  href="<?php echo base_url('job/job_printpreview/' . $rec['user_id']); ?>" title=" <?php echo $rec['designation']; ?>">
                 <?php
               if ($rec['designation']) {
                    ?>
              <?php echo $rec['designation']; ?>
                <?php
                 } else {
                ?>
              <?php echo "Designation"; ?>
                 <?php
                   }
                    ?> 
                </a>
              </li>
        </ul>
        </div>

       </div>
    </div>
   </div>

                                        <div class="profile-job-post-title clearfix">
                                           <!--  <div class="profile-job-profile-button clearfix">
                                                <div class="profile-job-details">
                                                    <ul>
                                                       
                                                         <li> <b>
                                                            <?php //echo date("jS F Y", strtotime($rec['created_date'])); ?> <!-- ( 1 hours ago  )--></b>
                                               <!--      </li>


                                                    </ul>
                                                </div>
                                            </div> --> 
                                            <div class="profile-job-profile-menu">
                                                <ul class="clearfix">
                                                   

                                         <li> <b> Skill</b> <span>
                                                        <?php
                    $comma = ", ";
                    $k = 0;
                    $aud = $rec['keyskill'];
                    $aud_res = explode(',', $aud);
                    foreach ($aud_res as $skill) {
                    if ($k != 0) {
                       echo $comma;
                      }
                    $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                     echo $cache_time;
                     $k++;
                        }
                     ?>    </span>
                   </li>
                                                      

 <?php
                                                                if ($rec['other_skill']) {
                                                                    ?>
                                                                    <li><b>Other Skill</b><span>
                                                                        <?php echo $rec['other_skill']; ?>
                                                                    </span></li>
                                                                    <?php
                                                                }
                                                                ?>

                                                                <li> <b> Total Experience</b>
                                                                <span title="Min - Max">

                                                                      <?php if ($rec['experience_year'] ||$rec['experience_month'] ){echo $rec['experience_year'] . ' ' . $rec['experience_month'];} else{ echo PROFILENA;} ?>
                                                                 </span>

                                                                </li>

                                                                 <?php
                                                                $countryname = $this->db->get_where('countries', array('country_id' => $rec['country_id']))->row()->country_name;
                                                                $cityname = $this->db->get_where('cities', array('city_id' => $rec['city_id']))->row()->city_name;
                                                                ?>

                <li><b>Location</b> <span>
             <?php if($countryname || $cityname )
                  { 
                     

                      echo $cityname . ', ' . $countryname; 
                 } 
                else
                    { echo PROFILENA;} ?>
                     </span></li>
              <li> <b> Degree </b><span>
                 <?php
                 $cache_time = $this->db->get_where('degree', array('degree_id' => $rec['degree']))->row()->degree_name;
                                                                    

                                                                     if($cache_time)
                                                                    {
                                                                         echo $cache_time;
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }
                                                                    ?> 
                                                                    </span>
                                                                </li>

                                                                  <li> <b>Stream </b>
                                                                <span>
                                                                    <?php
                                                                    $cache_time = $this->db->get_where('stream', array('stream_id' => $rec['stream']))->row()->stream_name;
                                                                     if($cache_time)
                                                                    {
                                                                         echo $cache_time;
                                                                    }
                                                                    else
                                                                    {
                                                                       echo PROFILENA; 
                                                                    }
                                                                    ?>
                                                                    </span>

                                                                </li>

 
                                                              <li><b>E-mail</b><span>
                                                                    <?php
                                                                    if($rec['email'])
                                                                    {
                                                                    echo $rec['email'];
                                                                    }
                                                                    else
                                                                        {echo PROFILENA; }
                                                                    ?></span>
                                                                </li>

                                                                <li><b>Mobile Number</b><span>
                                                                    <?php
                                                                     if($rec['phnno'])
                                                                    {
                                                                          echo $rec['phnno'];
                                                                    }
                                                                    else{
                                                                        echo PROFILENA;
                                                                    }
                                                                    ?></span>
                                                                </li>



                                                </ul>
                                            </div>
                                            <div class="profile-job-profile-button clearfix">
                                                <div class="apply-btn fr" >
                                     <?php $userid = $this->session->userdata('aileenuser');
                                     if($userid != $rec['user_id']){ ?>
                                             <a href="<?php echo base_url('chat/abc/' . $rec['user_id']); ?>">Message</a>
                                       <!--<a href="#popup1" class="button">Remove Candidate </a>-->
                                                    <a href="javascript:void(0);" class="button" onclick="removepopup(<?php echo $rec['save_id'] ?>)">Remove</a>
                                     <?php } ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                         </div>
                           <?php  }
                        } else { ?>
                            <div class="text-center rio">
                                <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Saved Candidate Found.</h4>
                            </div>
                            <?php } ?>
                        </div>

            </div>
        </div>
    </div>
</section>
<!--  <?php //echo $footer;    ?> -->
<!-- Model Popup Open -->
<!-- Bid-modal  -->
<!-- <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>         
            <div class="modal-body">
                <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
               <!--  <span class="mes"></span>
            </div>
        </div>
    </div>
</div> --> 
<!-- Model Popup Close -->
  <div class="modal fade message-box" id="bidmodal-2" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
            <div class="modal-body">
                <span class="mes">
                    <div id="popup-form">
                        <?php echo form_open_multipart(base_url('recruiter/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="3">
                      <!--   <input type="submit" name="cancel3" id="cancel2" value="Cancel"> -->
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                        <?php echo form_close(); ?>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="modal fade message-box biderror" id="bidmodal" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>         
            <div class="modal-body">
                <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
                <span class="mes"></span>
            </div>
        </div>
    </div>
</div>
</body>

</html>



<!-- script for skill textbox automatic end (option 2)-->

<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
 
 <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
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



 <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
    function removepopup(id) {
        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_user(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
    function updateprofilepopup(id) {
        $('#bidmodal-2').modal('show');
    }
</script>

<script>
//select2 autocomplete start for skill
    $('#searchskills').select2({

        placeholder: 'Find Your Skills',

        ajax: {

            url: "<?php echo base_url(); ?>recruiter/keyskill",
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
//select2 autocomplete End for skill

//select2 autocomplete start for Location
    $('#searchplace').select2({

        placeholder: 'Find Your Location',
        maximumSelectionLength: 1,
        ajax: {

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
        document.getElementById("upload-demo").style.visibility = "hidden";
        document.getElementById("upload-demo-i").style.visibility = "hidden";
        document.getElementById('message1').style.display = "block";

        //setTimeout(function () { location.reload(1); }, 5000);

    }

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


<!-- remove save post start -->

<script type="text/javascript">
    function remove_user(abc)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "recruiter/remove_candidate" ?>',
            data: 'save_id=' + abc,
            success: function (data) {

                $('#' + 'removeuser' + abc).html(data);
                $('#' + 'removeuser' + abc).parent().removeClass();
                var numItems = $('.contact-frnd-post .job-contact-frnd').length;

                if (numItems == '0') {
                    var nodataHtml = "<div class='text-center rio'><h4 class='page-heading  product-listing' style='border:0px;margin-bottom: 11px;'>No Applied Job.</h4></div>";
                    $('.contact-frnd-post').html(nodataHtml);
                }


            }
        });

    }
</script>

<!-- remove save post end

<!-- remove  post end -->
<!-- <script src="<?php //echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
    function removepopup(id) {
        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id="+ id +" onClick='remove_user(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }
</script> -->

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
