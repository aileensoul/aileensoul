<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->
<style>
   /* body {
        font-family: Arial, sans-serif;
        background-size: cover;
        height: 100vh;
    }*/
    /*.box {
        width: 40%;
        margin: 0 auto;
        background: rgba(255,255,255,0.2);
        padding: 35px;
        border: 2px solid #fff;
        border-radius: 20px/50px;
        background-clip: padding-box;
        text-align: center;
    }*/
   /* .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        z-index: 10;
    }*/
    /*.overlay:target {
        visibility: visible;
        opacity: 1;
    }*/
    /*.popup {
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
  
/*    @media screen and (max-width: 700px){
        .box{
            width: 70%;
        }
        .popup{
            width: 70%;
        }
    }*/
</style>


<!-- start header -->
<?php echo $header; ?>
<!-- END HEADER -->
<?php echo $freelancer_post_header2_border; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>"><link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" />

        <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>


        <script>
            $(document).ready(function ()
            {


                /* Uploading Profile BackGround Image */
                $('body').on('change', '#bgphotoimg', function ()
                {

                    $("#bgimageform").ajaxForm({target: '#timelineBackground',
                        beforeSubmit: function () {},
                        success: function () {

                            $("#timelineShade").hide();
                            $("#bgimageform").hide();
                        },
                        error: function () {

                        }}).submit();
                });


                /* Banner position drag */
                $("body").on('mouseover', '.headerimage', function ()
                {
                    var y1 = $('#timelineBackground').height();
                    var y2 = $('.headerimage').height();
                    $(this).draggable({
                        scroll: false,
                        axis: "y",
                        drag: function (event, ui) {
                            if (ui.position.top >= 0)
                            {
                                ui.position.top = 0;
                            } else if (ui.position.top <= y1 - y2)
                            {
                                ui.position.top = y1 - y2;
                            }
                        },
                        stop: function (event, ui)
                        {
                        }
                    });
                });


                /* Bannert Position Save*/
                $("body").on('click', '.bgSave', function ()
                {
                    var id = $(this).attr("id");
                    var p = $("#timelineBGload").attr("style");
                    var Y = p.split("top:");
                    var Z = Y[1].split(";");
                    var dataString = 'position=' + Z[0];
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('freelancer/image_saveBG_ajax_hire'); ?>",
                        data: dataString,
                        cache: false,
                        beforeSend: function () { },
                        success: function (html)
                        {
                            if (html)
                            {
                                window.location.reload();
                                $(".bgImage").fadeOut('slow');
                                $(".bgSave").fadeOut('slow');
                                $("#timelineShade").fadeIn("slow");
                                $("#timelineBGload").removeClass("headerimage");
                                $("#timelineBGload").css({'margin-top': html});
                                return false;
                            }
                        }
                    });
                    return false;
                });



            });
        </script>
    </head>
    <body>

        <!-- cover pic start -->
        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">


                    <div class="col-md-4"><div class="profile-box profile-box-left">

                        <div class="full-box-module">    
      
      <div class="profile-boxProfileCard  module">
<div class="profile-boxProfileCard-cover">   
                                    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                       href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"
                                       tabindex="-1"
                                       aria-hidden="true"
                                       rel="noopener">
                                       <!-- rash code start 12-4 -->
                                       <?php
                                       if ($freepostdata[0]['profile_background'] != '') {
                                           ?>
                                        <!-- box image start -->
                                        <img src="<?php echo base_url($this->config->item('free_post_bg_main_upload_path') . $freepostdata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo  $freepostdata[0]['freelancer_post_fullname'] . ' ' . $freepostdata[0]['freelancer_post_username']; ?>"  style="height: 95px;
                                             width: 100%;">
                                        <!-- box image end -->
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo  $freepostdata[0]['freelancer_post_fullname'] . ' ' . $freepostdata[0]['freelancer_post_username']; ?>"  style="height: 95px;
                                             width: 100%;">
                                             <?php
                                         }
                                         ?>
                                        </a>
 </div>
  
    <div class="profile-boxProfileCard-content clearfix">
<div class="buisness-profile-txext col-md-4">
       
                                                              <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" 
                                                              href="<?php echo base_url('freelancer/freelancer_post_profile/' . $freelancerdata[0]['user_id']); ?>" title="<?php echo $freelancerdata[0]['freelancer_post_fullname']. ' ' . $freelancerdata[0]['freelancer_post_username']; ?>" tabindex="-1" aria-hidden="true" rel="noopener">
                                                   <?php
                                            if ($freepostdata[0]['freelancer_post_user_image']) {
                                                ?>
                                                 <img src="<?php echo base_url($this->config->item('free_post_profile_thumb_upload_path') . $freepostdata[0]['freelancer_post_user_image']); ?>" alt="<?php echo $freepostdata[0]['freelancer_post_fullname']. ' ' . $freepostdata[0]['freelancer_post_username']; ?>"  style="    height: 77px;
    width: 71px;
    z-index: 3;
    position: relative;
">
                                                <?php
                                            } else {
                                                ?>
                                                 <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $freepostdata[0]['freelancer_post_fullname']. ' ' . $freepostdata[0]['freelancer_post_username']; ?>"   style="   height: 80px;
                                                     width: 77px;     z-index: 3;
                                                     position: relative;"> <?php
                                            }
                                            ?>
                                        </a>
</div>
<div class="profile-box-user  profile-text-bui-user  fr col-md-9">
            <span class="profile-company-name ">
                                         <a style="font-size: 18px; font-weight: 600;" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php echo ucwords($userdata[0]['first_name']) . ' ' . ucwords($userdata[0]['last_name']); ?></a>
                                        </span>
       
         
         <div class="profile-boxProfile-name">
        <a style=" font-weight: 600; font-size: 15px;" href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><?php
if ($freepostdata[0]['designation']) {
    echo ucwords($freepostdata[0]['designation']);
} else {
    echo "Current Work";
}
?></a></div>
     
     
    </div>
   
          <div class="profile-box-job-menu  col-md-12">
         
                                    <ul class="">
                                             <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_post_profile')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>">Details</a>
                                                </li>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save_post'); ?>">Saved </a>
                                                </li>
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_applied_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_applied_post'); ?>">Applied</a>
                                                </li>
                                </ul>
     
      </div>
     
  </div>
  </div>
  </div>
           

                        </div>

                    </div>
                    <!-- cover pic end -->




                    <!-- pop up box start-->
                    <div id="popup1" class="overlay">
                        <div class="popup">

                            <div class="pop_content">
                                Your Post is Successfully Saved.
                                <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                            </div>

                        </div>
                    </div>
                    <!-- pop up box end-->

                    <!-- pop up box start-->
                    <div id="popup2" class="overlay">
                        <div class="popup">

                            <div class="pop_content">
                                Successfully Apply this post..
                                <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                            </div>

                        </div>
                    </div>
                    <!-- pop up box end-->

                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3>Search Result</h3>


                                <div class="contact-frnd-post">

                                <?php

function text2link($text) {
    $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
    $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
    $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
    return $text;
}
?>
                                    <div >
                                        <!-- start -->
                                        <!-- @nk!t 7-4-2017 start -->
                                        <?php
                                        if ($freelancerhiredata) {
                                            ?>
                                            <!-- @nk!t 7-4-2017 end -->
                                            <?php
                                            // foreach($postdetail as $post_key => $post_value){ 
                                            foreach ($freelancerhiredata as $post) {
                                                $userid = $this->session->userdata('aileenuser');



                                                $contition_array = array('user_id' => $userid, 'post_id' => $post['post_id'], 'job_delete' => 0);
                                                $jobdata = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                                                if ($jobdata[0]['job_save'] != 2) {
                                                    ?>
                                                    <div class="job-post-detail clearfix search">
                                                        <div id="<?php echo "popup11" . $post['post_id']; ?>" class="overlay">
                                                            <div class="popup">

                                                                <div class="pop_content">
                                                                    Are You Sure want to apply this post?.

                                                                    <p class="okk"><a class="okbtn" id="<?php echo $post['post_id']; ?>" onClick="apply_post(this.id)" href="#">Apply</a></p>

                                                                    <p class="okk"><a class="cnclbtn" href="#">Cancle</a></p>

                                                                </div>

                                                            </div>
                                                        </div>
                                    
                                                           <div class="job-contact-frnd ">
                                        <div class="profile-job-post-detail clearfix" id="<?php echo "removeapply" . $post['post_id']; ?>">
                                            <div class="profile-job-post-title-inside clearfix">

                  <div class="profile-job-post-title clearfix search" style="margin-bottom:0px">
                  <div class="profile-job-profile-button clearfix">
                     <div class="profile-job-details col-md-12">
                          <ul>
                           <li class="fr">
                              Created Date : <?php
                            echo trim(date('d-M-Y', strtotime($post['created_date'])));
                                   ?>
                            </li>
                             <li>
                              <a href="#" title="Post Title" class="post_title " >
                              <?php echo ucwords(text2link($post['post_name'])); ?> </a>   </li>

                             

                         <?php
                $firstname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->fullname;
                $lastname = $this->db->get_where('freelancer_hire_reg', array('user_id' => $post['user_id']))->row()->username;
                    ?>

                            <li><a class="display_inline" title="<?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>" href="<?php echo base_url('freelancer/freelancer_hire_profile/' . $post['user_id'].'?page=freelancer_post'); ?>"><?php echo ucwords($firstname); ?>&nbsp;<?php echo ucwords($lastname); ?>
                            </a>

                            <div class="fr lction">
                              <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name; ?>
                              <?php $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?>

                        <p><span title="Location"><i class="fa fa-map-marker" aria-hidden="true">  <?php echo $cityname.","; ?><?php echo $countryname; ?></i> </span></p>
                                 </div>
                            </li>
                
                </ul>
             </div>
          </div>
                       <div class="profile-job-profile-menu">
                            <ul class="clearfix">
                              <li> <b> Field</b> <span><?php echo $this->db->get_where('category', array('category_id' => $post['post_field_req']))->row()->category_name;?>
                              
                                                                    </span>
                                                                </li>
                               <li> <b> Skills</b> <span> 
                               <?php
                  $comma = ", ";
                  $k = 0;
                                                                $aud = $post['post_skill'];
                                                                $aud_res = explode(',', $aud);
                                                                foreach ($aud_res as $skill) {
                                                                    if ($k != 0) {
                                                                        echo $comma;
                                                                    }
                                                                    $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;

                                                                    if($cache_time){
                                                                    echo $cache_time;}
                                                                    else{echo PROFILENA;}
                                                                    $k++;
                                                                }
                                                                ?>     
                              
                                                                    </span>
                                                                </li>


                                                                <?php if ($post['other_skill']) { ?>
                                                                    <li><b>Other Skill</b><span><?php echo $post['other_skill']; ?></span>
                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li><b>Other Skill</b><span><?php echo "-"; ?></span></li><?php } ?>

                                                                <li><b>Post Description</b><span><p>
                                                                            <?php if($post['post_description']){echo text2link($post['post_description']);}else{echo PROFILENA;} ?> </p></span>
                                                                </li>
                                                                <li><b>Rate</b><span>
                                                                        <?php if($post['post_rate']){
                     echo $post['post_rate'];
                     echo "&nbsp";
                     echo $this->db->get_where('currency', array('currency_id' => $post['post_currency']))->row()->currency_name; echo "&nbsp";
                      if($post['post_rating_type'] == 1){
                        echo "Hourly";
                      }else{echo "Fixed";}}
                     else{ echo PROFILENA;}
                        ?></span>
                                                                </li>
                                                               
                                                                <li>
                                                                    <b>Required Experience</b>
                                                                    <span>
                                                                        <?php if($post['post_exp_month'] ||  $post['post_exp_year']){
            echo $post['post_exp_year'].".";   ?><?php  echo $post['post_exp_month']." Year";}
                else{echo PROFILENA;} ?>
                                                                    </span>
                                                                </li>

                                                                <li><b>Estimated Time</b><span> <?php if($post['post_est_time']) {echo $post['post_est_time'];} else{echo PROFILENA; } ?></span>
                                                                </li>


                                                            </ul>
                                                        </div>
                                                        <div class="profile-job-profile-button clearfix">
                                                            <div class="profile-job-details col-md-12">
                      <ul><li class="job_all_post last_date">
                           Last Date : <?php if($post['post_last_date']){echo date('d-M-Y', strtotime($post['post_last_date']));} else{echo PROFILENA;} ?>                                                          </li>

                                                                    <input type="hidden" name="search" id="search" value="<?php echo $keyword; ?>">
                                                                                            
                                          <li class=fr>
                                                          <?php
$this->data['userid'] = $userid = $this->session->userdata('aileenuser');
 $contition_array = array('post_id' => $post['post_id'], 'job_delete' => 0, 'user_id' => $userid);
$freelancerapply1 = $this->data['freelancerapply'] = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = 'desc', $limit = '', $offset = '', $join_str = array(), $groupby = '');
 if ($freelancerapply1) {
          ?>
        <a href="javascript:void(0);" class="button applied">Applied</a>
 <?php
} else {
?>

 <a href="javascript:void(0);"  class= "<?php echo 'applypost' . $post['post_id']; ?>  button" onclick="applypopup(<?php echo $post['post_id'] ?>,<?php echo $post['user_id'] ?>)">Apply</a>
                                                                    </li> 
                <li>
                <?php
$userid = $this->session->userdata('aileenuser');
            
 $contition_array = array('user_id' => $userid, 'job_save' => '2', 'post_id ' => $post['post_id'], 'job_delete' => '1');
 $data = $this->data['jobsave'] = $this->common->select_data_by_condition('freelancer_apply', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
            if ($data){
                ?>
       <a class="saved  button <?php echo 'savedpost' . $post['post_id']; ?>">Saved</a>
    <?php } else { ?>
             
<a id="<?php echo $post['post_id']; ?>" onClick="savepopup(<?php echo $post['post_id']; ?>)" href="javascript:void(0);" class="<?php echo 'savedpost' . $post['post_id']; ?> button">Save</a>

                <?php }?>
                <?php }?>
                                                                   </li>                        
                                                                   </ul>
                                                            </div>

                                                        </div>
                                                        </div>
                                                    </div>
                                        </div>


                                                </div>
                                                
                                                <div class="col-md-1">
                                                </div>
                                           
                                         </div>
                                    
                                    <!-- @nk!t 7-4-2017 start -->
                                <?php   }  }} else {
                                    ?>
                                    <div class="text-center rio">
                                        <h1 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">Oops No Data Found.</h1>
                                        <p style="margin-left:4%;text-transform:none !important;border:0px;">We couldn't find what you were looking for.</p>
                                        <ul>
                                            <li style="text-transform:none !important; list-style: none;">Make sure you used the right keywords.</li>
                                        </ul>
                                    </div>
                                    <?php }
                                ?> 
                                <!-- @nk!t 7-4-2017 end -->
                          
 </div>

                        </div>
                    </div>
                </div>
                </section>

                <footer>
                    <?php echo $footer; ?>
                </footer>
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

                <!-- script for skill textbox automatic start (option 2)-->

                <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
                <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
                <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
                <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

                <script>

                         var data = <?php echo json_encode($demo); ?>;
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


                <script src="<?php echo base_url('js/jquery.highlite.js'); ?>"></script>

                <!-- script for skill textbox automatic end -->

                <script type="text/javascript">
          var text = document.getElementById("search").value;
          //alert(text);

          $(".search").highlite({

              text: text

          });

                </script>


                <script>
                    //select2 autocomplete start for skill
                    $('#searchskills').select2({

                        placeholder: 'Find Your Skills',

                        ajax: {

                            url: "<?php echo base_url(); ?>freelancer/keyskill",
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

                            url: "<?php echo base_url(); ?>freelancer/location",
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
                    /* When the user clicks on the button, 
                     toggle between hiding and showing the dropdown content */
                    function myFunction() {
                        document.getElementById("myDropdown_h").classList.toggle("show");
                    }

                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function (event) {
                        if (!event.target.matches('.dropbtn_h')) {

                            var dropdowns = document.getElementsByClassName("dropdown-content_h");
                            var i;
                            for (i = 0; i < dropdowns.length; i++) {
                                var openDropdown = dropdowns[i];
                                if (openDropdown.classList.contains('show')) {
                                    openDropdown.classList.remove('show');
                                }
                            }
                        }
                    }
                </script>
                <!-- for search validation -->
                <script type="text/javascript">
                    function checkvalue() {
                        // alert("hi");
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
                <!-- save post start -->
                
               

                  <script type="text/javascript">
                    function save_post(abc)
                    {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() . "freelancer/save_user" ?>',
                            data: 'post_id=' + abc,
                            success: function (data) {
                                $('.' + 'savedpost' + abc).html(data).addClass('saved');
                            }
                        });

                    }
                </script>
                
              
    
         <script type="text/javascript">
                    function apply_post(abc, xyz) {
                        //var alldata = document.getElementById("allpost" + abc);
                        var alldata = 'all';
                        //var user = document.getElementById("userid" + abc);
                        var user = xyz;

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url() . "freelancer/apply_insert" ?>',
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
                <!-- apply post end-->
                              <!-- save post end -->
 <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                     <script>
                    function savepopup(id) {
                        //alert(id);
                        save_post(id);
//                       
                        $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
                        $('#bidmodal').modal('show');
                    }
           function applypopup(postid, userid) {
                        $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to apply this post?<div class='model_ok_cancel'><a class='okbtn' id=" + postid + " onClick='apply_post(" + postid + "," + userid + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                        $('#bidmodal').modal('show');
                    }
                   
                    </script>


                