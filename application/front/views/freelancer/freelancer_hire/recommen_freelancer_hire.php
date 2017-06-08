<!-- start head  -->
<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->
<?php echo $header; ?>

<?php echo $freelancer_hire_header2_border; ?>


<!--post save success pop up style strat -->
<!--post save success pop up style end -->


<!-- END HEADER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>">

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

       



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
                        url: "<?php echo base_url('freelancer/image_saveBG_ajax'); ?>",
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
                   

                    <div class="col-md-4 profile-box profile-box-left"><div class="">


                            <div class="full-box-module">    

                                <div class="profile-boxProfileCard  module">
                                    <div class="profile-boxProfileCard-cover">    <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                      href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>"  tabindex="-1" aria-hidden="true" rel="noopener" 
                                             title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">

                                            <?php
                                            if ($freehiredata[0]['profile_background'] != '') {
                                                ?>
                                                <!-- box image start -->
                                              <div class=" data_img">
                                                <img src="<?php echo base_url($this->config->item('free_hire_bg_main_upload_path') . $freehiredata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"  >
</div>
                                                <!-- box image end -->
                                                <?php
                                            } else {
                                                ?>
                                                <div class=" data_img">
                                                <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"  >
                                                </div>
                                                     <?php
                                                 }
                                                 ?>


                                        </a>
                                    </div>

                                    <div class="profile-boxProfileCard-content clearfix">
                                        <div class="buisness-profile-txext col-md-4">
                                            <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock" href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>""  tabindex="-1" aria-hidden="true" rel="noopener" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                                                <?php
                                                if ($freehiredata[0]['freelancer_hire_user_image']) {
                                                    ?>
                                                    <div class="data_img_2">
                                                    <img src="<?php echo base_url($this->config->item('free_hire_profile_thumb_upload_path') . $freehiredata[0]['freelancer_hire_user_image']); ?>" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>   ">
                                                        </div> <?php
                                                     } else {
                                                         ?>
                                                         <div class="data_img_2">
                                                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>">
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="profile-box-user  profile-text-bui-user  fr col-md-9">
                                            <span class="profile-company-name ">
                                                <a href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"> <?php echo ucwords($freehiredata[0]['fullname']) . ' ' . ucwords($freehiredata[0]['username']); ?></a>  
                                            </span>

<div class="profile-boxProfile-name">
          <a href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" title="<?php echo $freehiredata[0]['fullname'] . " " . $freehiredata[0]['username']; ?>"><?php
           if ($freehiredata[0]['designation']) {
            echo $freehiredata[0]['designation'];
                 } else {
            echo "Designation";
                }
           ?></a></div>
                                           

                                        </div>

          <div class="profile-box-job-menu  col-md-12 rec_menubox">

                                            <ul class="">
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_hire_profile')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>" > Details</a></li>
                                                <li><a href="<?php echo base_url('freelancer/freelancer_hire_post'); ?>">Posts</a></li>
<!--                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save'); ?>">Message</a>
                                                </li>-->
                                                <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_save'); ?>">Saved</a></li>
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            </div>
                             <div  class="add-post-button">

                            <a class="btn btn-3 btn-3b" href="<?php echo base_url('freelancer/freelancer_add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
                        </div>
                        </div>
                       

                    </div>

                    <?php

                    function text2link($text) {
                        $text = preg_replace('/(((f|ht){1}t(p|ps){1}:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1" target="_blank" rel="nofollow">\\1</a>', $text);
                        $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2" target="_blank" rel="nofollow">\\2</a>', $text);
                        $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1" rel="nofollow" target="_blank">\\1</a>', $text);
                        return $text;
                    }
                    ?>


  <div class="col-md-7 col-sm-7 col-md-push-4 custom-right col-sm-push-4">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3>Search Results</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                        <!-- body tag inner data start-->
                                        <?php
                                       

                                        if ($freelancerpostdata) {
                                            foreach ($freelancerpostdata as $row) {
                                                
                                                    
                                                    ?> 

                                                    <div class="profile-job-post-detail clearfix search">


                                                        
                                                        <div id="popup1" class="overlay">
                                                            <div class="popup">

                                                                <div class="pop_content">
                                                                    Your User is Successfully Saved.
                                                                    <p class="okk"><a class="okbtn" href="">Ok</a></p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                      
                                                        <div class="profile-job-post-title-inside clearfix">
                                                            <div class="profile-job-profile-button clearfix">
                                                                <div class="profile-job-post-location-name-rec">
                                                                
                                                                        
                                                                        
                                                                                <div style="display: inline-block; float: left;">
                                                                                <div  class="buisness-profile-pic-candidate">
                                                                                    <?php
                                            if ($row['freelancer_post_user_image']) {
                                                
                                                ?>
                                                <a style="margin-right: 4px;" href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>">
                                                <img src="<?php echo base_url($this->config->item('free_post_profile_thumb_upload_path') . $row['freelancer_post_user_image']); ?>" alt="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>" > </a>
                                                <?php
                                            } else {
                                                
                                                ?>
                                                <a style="margin-right: 4px;" href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>">
                                                <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"> </a>
                                                <?php
                                            }
                                            ?>
                                                                                    
                                                                                </div></div>
                                                                                       <div class="designation_rec" style="float: left;">
          <ul>
               <li>
             <a style="margin-right: 4px;" href="<?php echo base_url('freelancer/freelancer_post_profile/' . $row['user_id'].'?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"><h6>
              <?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?></h6>
            </a>
          </li>

          <li style="display: block;" ><a href="#"> <?php
                 if ($row['designation']) {
                  echo $row['designation'];
                } else {
                  echo PROFILENA;
                   }
                ?> </a></li>
       </ul>
       </div>



                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        </div>  <div class="profile-job-post-title clearfix">

                                                            <div class="profile-job-profile-menu">

                                                                <ul>

                                                                    <li><b>Skills</b><span>
            <?php
            
            $aud = $row['freelancer_post_area'];
            $aud_res = explode(',', $aud);

            if(!$row['freelancer_post_area']){
                    echo $row['freelancer_post_otherskill'];
                  }
                  elseif(!$row['freelancer_post_otherskill']){

            foreach ($aud_res as $skill) {

                  $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                        $skillsss[] = $cache_time;
                    }
                     $listskill = implode(', ', $skillsss);

                    echo $listskill;
                     unset($skillsss);
            }elseif($row['freelancer_post_area'] && $row['freelancer_post_otherskill']){

              foreach ($aud_res as $skillboth) {

                  $cache_time = $this->db->get_where('skill', array('skill_id' => $skillboth))->row()->skill;
                        $skilldddd[] = $cache_time;
                    }

                    $listFinal = implode(', ', $skilldddd);
                    echo $listFinal.",".$row['freelancer_post_otherskill'];
                    unset($skilldddd);

            }
            ?>   </span>    

                                                                    </li>


            

                                                                    

        <?php $cityname = $this->db->get_where('cities', array('city_id' => $row['freelancer_post_city']))->row()->city_name; ?>

                                                                <li><b>Location</b><span> <?php if($cityname){ echo $cityname;} else{ echo PROFILENA;} ?></span></li>
                                                                <li><b>Skill Description</b> <span> <p>
        <?php if($row['freelancer_post_skill_description']) {echo $row['freelancer_post_skill_description'];} else {echo PROFILENA;} ?></p></span>
                                                                </li>
                                                                
                                                                <li><b>Avaiability</b><span>
                                                                    <?php 
                                                                    if($row['freelancer_post_work_hour'])
                                                                    { echo $row['freelancer_post_work_hour'] . "  " . "Hours per week "; 
                                                                } else 
                                                                {
                                                                    echo PROFILENA;
                                                                    }?></span>
                                                                </li>
                                                                <li><b>Rate Hourly</b> <span>
                          <?php if ($row['freelancer_post_hourly']){
                              $currency = $this->db->get_where('currency', array('currency_id' => $row['freelancer_post_ratestate']))->row()->currency_name;

                                      if($row['freelancer_post_fixed_rate'] == '1'){ 
                                        echo $row['freelancer_post_hourly'] . "   " . $currency. " (Also work on fixed Rate)";}
                                        else{ 
                                            echo $row['freelancer_post_hourly'] . "   " . $currency;
                                        }
                                          }
                                                    else{
                                                                    echo PROFILENA;
                                                                }
                                                                    ?></span>
                                                                
                                                                </li>
                                                                <li><b>Total Experience</b>
       <span> <?php if ($row['freelancer_post_exp_year'] ||$row['freelancer_post_exp_month'] ){echo $row['freelancer_post_exp_year'] . ' ' . $row['freelancer_post_exp_month'];} else{ echo PROFILENA;} ?></span>
                                                                </li>
                                                                <input type="hidden" name="search" id="search" value="<?php echo $keyword; ?>">
                                                                </ul>
                                                            </div>

                                                            <div class="profile-job-profile-button clearfix">
             <div class="apply-btn fr">

            <?php
            $userid = $this->session->userdata('aileenuser');
            $contition_array = array('from_id' => $userid, 'to_id' => $row['user_id'], 'save_type' => 2, 'status' => '0');
            $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                        ?>
             
            <?php   
            
            if($userid != $row['user_id']){ ?>
          <a href="<?php echo base_url('chat/abc/' . $row['user_id']); ?>">Message</a>

          <?php
            if (!$data) {
                ?> 
        <input type="hidden" id="<?php echo 'hideenuser' . $row['user_id']; ?>" value= "<?php echo $data[0]['save_id']; ?>">
               
              <a id="<?php echo $row['user_id']; ?>" onClick="savepopup(<?php echo $row['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save</a>
         
                <?php
            } else {
                ?>


       

    <a class="saved">Saved </a> 
              
                <?php
                // khayti changes end 6-4                              
            } }
            ?> 
                 </div>
                                                            </div>
                                                        </div>
                                                    </div>

        <?php
        }
    
} else {
    ?>
                                            <div class="text-center rio">
                                                <h4 class="page-heading  product-listing" >No Recommended Freelancer Found.</h4>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <!-- body tag inner data end -->


                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    </section>
                    <footer>
<?php echo $footer; ?>
                    </footer>

                    <!-- pallavi changes 15-4 -->
 <!-- Model Popup Open -->
                <!-- Bid-modal  -->
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
                <!-- Model Popup Close -->

               
                    </body>

                    </html>

    <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                    <!-- script for skill textbox automatic end (option 2)-->
                     <script src="<?php echo base_url('js/jquery.highlite.js'); ?>"></script> 

                    <script type="text/javascript">
                   
                                                                     var text = document.getElementById("search").value;
                                                                     //alert(text);

                                                                     $(".search").highlite({

                                                                         text: text

                                                                     });

                    </script>

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

                    <!-- save post start -->

                    <script type="text/javascript">
                  function save_user(abc)
                        {
           var saveid = document.getElementById("hideenuser" + abc);
                $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . "freelancer/save_user1" ?>',
        data: 'user_id=' + abc + '&save_id=' + saveid.value,
        success: function (data) {
    $('.' + 'saveduser' + abc).html(data).addClass('saved');
                                }
                            });
                        }
                    </script>


                    <!-- save post end-->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
                   
                    <script>
                        function savepopup(id) {
                            save_user(id);
                      
            $('.biderror .mes').html("<div class='pop_content'>Your post is successfully saved.");
            $('#bidmodal').modal('show');
                        }
                    </script>
                    <!-- pallavi changes end 15-4