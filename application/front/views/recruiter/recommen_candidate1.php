<!-- start head -->

<?php echo $head; ?>
<!-- END HEAD -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/demo.css'); ?>">
<!--post save success pop up style strat -->
<style>
    /* body {
         font-family: Arial, sans-serif;
         background-size: cover;
         height: 100vh;
     }*/
    /*.designation_rec ul li{    display: block;
    padding-bottom: 10px;
    padding-left: 10px;
padding-top: 1px;}
    */
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
    /*.overlay {
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
    /* .overlay:target {
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
     }*/
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
</style>

<!--post save success pop up style end -->


<!-- start header -->
<?php echo $header; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<!-- END HEADER -->
<?php echo $job_header2_border; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
    <body>

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">


                    <div class="col-md-4 profile-box profile-box-left"><div class="">
                            <div class="full-box-module">    

                                <div class="profile-boxProfileCard  module">
                                    <div class="profile-boxProfileCard-cover">  
                                        <a class="profile-boxProfileCard-bg u-bgUserColor a-block"
                                           href="<?php echo base_url('recruiter/rec_profile'); ?>"
                                           tabindex="-1"
                                           aria-hidden="true"
                                           rel="noopener">
                                           
                                            <!-- rash code start 12-4 -->

                                       <?php
                                       if ($recdata[0]['profile_background'] != '') {
                                           ?>
                                        <!-- box image start -->
                                        <img src="<?php echo base_url($this->config->item('rec_bg_thumb_upload_path')  . $recdata[0]['profile_background']); ?>" class="bgImage" alt="<?php echo  $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?>"  style="height: 95px;
                                             width: 100%;">
                                        <!-- box image end -->
                                        <?php
                                    } else {
                                        ?>
                                        <img src="<?php echo base_url(WHITEIMAGE); ?>" class="bgImage" alt="<?php echo  $recdata[0]['rec_firstname'] . ' ' . $recdata[0]['rec_lastname']; ?>"  style="height: 95px;
                                             width: 100%;">
                                             <?php
                                         }
                                         ?>
                                            <!-- rash code end 12-4 -->



                                        </a></div>
                                  
                                     <div class="profile-boxProfileCard-content clearfix">
                                        <div class="buisness-profile-txext col-md-4">
                                      <a class="profile-boxProfilebuisness-avatarLink2 a-inlineBlock"  href="<?php echo base_url('recruiter/rec_profile/' . $recruiterdata1[0]['user_id']); ?>" title="<?php echo $recruiterdata1[0]['rec_firstname'] . ' ' . $recruiterdata1[0]['rec_lastname']; ?>" tabindex="-1" aria-hidden="true" rel="noopener">
                                                <?php
//echo "<pre>"; print_r($recruiterdata1); die();
                                                if ($recruiterdata1[0]['recruiter_user_image'] != '') {
                                                    // echo "hii"; die();
                                                    ?>
                       <img src="<?php echo base_url($this->config->item('rec_profile_thumb_upload_path') . $recruiterdata1[0]['recruiter_user_image']); ?>" alt="<?php echo $recruiterdata1[0]['rec_firstname'] . ' ' . $recruiterdata1[0]['rec_lastname']; ?>" >
                                   <?php
                              } else {
                           ?>
                       <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $recruiterdata1[0]['rec_firstname'] . ' ' . $recruiterdata1[0]['rec_lastname']; ?>">
                            <?php
                                   }
                             ?>
                                            </a>
                                        </div>
                                        <div class="profile-box-user  profile-text-bui-user  fr col-md-9">
                                            <span class="profile-company-name ">
                                                <a href="<?php echo site_url('recruiter/rec_profile'); ?>" title="<?php echo $recruiterdata1['rec_firstname'] . ' ' . $recruiterdata1['rec_lastname']; ?>">   <?php echo $recruiterdata1[0]['rec_firstname'] . ' ' . $recruiterdata1[0]['rec_lastname']; ?></a>
                                            </span>
                                            <div class="profile-boxProfile-name">
                                                <a href="<?php echo site_url('recruiter/rec_profile/' . $recruiterdata1[0]['user_id']); ?>" title="<?php echo ucwords($recruiterdata1[0]['designation']); ?>">
                                                    <?php
                                                    if (ucwords($recruiterdata1[0]['designation'])) {
                                                        echo ucwords($recruiterdata1[0]['designation']);
                                                    } else {
                                                        echo "Designation";
                                                    }
                                                    ?></a></div>
                                        </div>
                                        <div class="profile-box-rec-menu  col-md-12">
                                            <ul class="">
                                                <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'rec_profile') { ?> class="active" <?php } ?>><a href="<?php echo base_url('recruiter/rec_profile'); ?>"> Profile</a>
                                                </li>                                                
                                                <li <?php if ($this->uri->segment(1) == 'filefilefilefilefilefilefilefilefilefilerecruiter' && $this->uri->segment(2) == 'rec_post') { ?> class="active" <?php } ?>><a title="Post" href="<?php echo base_url('recruiter/rec_post'); ?>">Post</a>
                                                </li>
                                                <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save_candidate') { ?> class="active" <?php } ?>><a title="Saved Candidate" href="<?php echo base_url('recruiter/save_candidate'); ?>">Saved </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                               <div  class="add-post-button">

                            <a class="btn btn-3 btn-3b" href="<?php echo base_url('recruiter/add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
                        </div>
                        </div>
                     
                    </div>



                    <!--- search end -->

                   <div class="col-md-7 col-sm-7 col-md-push-4 custom-right">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3>Search Results</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">

                                        

<!-- @nk!t 7-4-2017 start -->
                                        <?php
                                        if ($postdetail) {
                                            ?>
<!-- @nk!t 7-4-2017 end -->
<?php
                                            foreach ($postdetail as $p) {
                                                ?>

                                                <div class="profile-job-post-detail clearfix ">

                                                  <div id="popup1" class="overlay">
                                                            <div class="popup">

                                                                <div class="pop_content">
                                                                    Your User is Successfully Saved.
                                                                    <p class="okk"><a class="okbtn" href="#">Ok</a></p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <div class="profile-job-post-title-inside clearfix">
           <div class="profile-job-profile-button clearfix">
             <div class="profile-job-post-location-name-rec">


               <div style="display: inline-block; float: left;">
             
                <div  class="buisness-profile-pic-candidate ">
                <?php
                if ($p['job_user_image']) {
               ?>
           <a href="<?php echo base_url('job/job_printpreview/' . $p['user_id'].'?page=recruiter'); ?>" title=" <?php echo $p['fname'] . ' ' . $p['lname']; ?>"> 
           <img src="<?php echo base_url($this->config->item('job_profile_thumb_upload_path')  . $p['job_user_image']); ?>" alt="<?php echo $p[0]['fname'] . ' ' . $p[0]['lname']; ?>">
            </a>
             <?php
            } else {
              ?>
              <a href="<?php echo base_url('job/job_printpreview/' . $p['user_id'].'?page=recruiter'); ?>" title=" <?php echo $p['fname'] . ' ' . $p['lname']; ?>"> 
           <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo $p[0]['fname'] . ' ' . $p[0]['lname']; ?>"> </a>
             <?php
                }
               ?>                      </div>
                  </div> 


            <div class="designation_rec" style="float: left;">
                <ul>
                         

                     <li>
                   <a style=" font-size: 19px;
         font-weight: 600;" href="<?php echo base_url('job/job_printpreview/' . $p['user_id']); ?>">
                   <?php echo ucwords($p['fname']) . ' ' . ucwords($p['lname']); ?>
                     
                 </a></li>

            <li style="display: block;"><a href="#">  <?php
                  if ($p['designation']) {
                          ?>
                      <?php echo $p['designation']; ?>
                                                     
                   <?php
                    } else {
                     ?>
                   <?php echo "Designation"; ?>
                 <?php
                    }
                  ?> </a>  </li>
            
          </ul>
        </div>

      </div>
       </div>
       </div>

        <div class="profile-job-post-title clearfix search1">

                                                        <div class="profile-job-profile-menu  search ">

                 <ul>
              
                                                                <?php
                                                                if ($p['keyskill']) {
                                                                    ?>
                                                                    <li><b>Skills</b>
                                                                      <span>  <?php
                                                                        $comma = ", ";
                                                                        $k = 0;
                                                                        $aud = $p['keyskill'];
                                                                        $aud_res = explode(',', $aud);
                                                                        foreach ($aud_res as $skill) {
                                                                            if ($k != 0) {
                                                                                echo $comma;
                                                                            }
                                                                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;


                                                                            echo $cache_time;
                                                                            $k++;
                                                                        }
                                                                        ?>       
</span>
                                                                    </li>
                                                                    <?php
                                                                }
                                                                ?>

                                                                <?php
                                                                if ($p['other_skill']) {
                                                                    ?>
                                                                    
                                                                    <li><b>Other Skill</b>
                                                                       <span> <?php echo $p['other_skill']; ?></span>
                                                                    </li>


                                                                
                                                                    <?php
                                                                }
                                                                ?>
                                                                <li> <b> Total Experience </b>
                                                                <span><?php echo $p['experience_year']; ?>  <?php echo $p['experience_month']; ?> 
</span>
                                                                </li>


                                                                <li><b>Location</b> 

       <span> <?php echo $countryname; ?> <?php echo $cityname; ?></span></li>


                                                                <li> <b> Degree </b>
                                                                   <span> <?php
                                                                    $cache_time = $this->db->get_where('degree', array('degree_id' => $p['degree']))->row()->degree_name;
                                                                    echo $cache_time;
                                                                    ?> </span>

                                                                </li>

                                                                <li> <b>Stream </b>
                                                                    <span><?php
                                                                    $cache_time = $this->db->get_where('stream', array('stream_id' => $p['stream']))->row()->stream_name;
                                                                    echo $cache_time;
                                                                    ?>
</span>
                                                                </li>

                                                                <?php
                                                                $countryname = $this->db->get_where('countries', array('country_id' => $p['country_id']))->row()->country_name;
                                                                $cityname = $this->db->get_where('cities', array('city_id' => $p['city_id']))->row()->city_name;
                                                                ?>






                                                                  <li><b>E-mail</b><span>
                                                                    <?php
                                                                    echo $p['email'];
                                                                    ?></span>
                                                                </li>

                                                                <li><b>Mobile Number</b>
                                                                 <span>   <?php
                                                                    echo $p['phnno'];
                                                                    ?></span>
                                                                </li>




                                                                <input type="hidden" name="search" id="search" value="<?php echo $keyword; ?>">

                                                                <input type="hidden" name="search" id="search1
                                                                       " value="<?php echo $keyword1; ?>">

                                                            </ul>
                                                        </div>

                                                        <div class="profile-job-profile-button clearfix">
      <div class="apply-btn fr">
   <?php
 $userid = $this->session->userdata('aileenuser');
$contition_array = array('from_id' => $userid, 'to_id' => $p['user_id'], 'save_type' => 1, 'status' => '0');
$data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                
 if($userid != $p['user_id']){       
 if (!$data) {
     ?> 
                     
    <a href="<?php echo base_url('chat/abc/' . $p['user_id']); ?>">Message</a> 

<!--                     <a href="#">Invite</a>-->

             <input type="hidden" id="<?php echo 'hideenuser' . $p['user_id']; ?>" value= "<?php echo $data[0]['save_id']; ?>">
                <!-- <a id="<?php echo $row['user_id']; ?>" onClick="save_user(this.id)" href="#popup1" class="<?php echo 'saveduser' . $row['user_id']; ?>">Save User</a> -->
              <a id="<?php echo $p['user_id']; ?>" onClick="savepopup(<?php echo $p['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $p['user_id']; ?>">Save</a>

                <?php
            } else {
                 ?>
    <a href="<?php echo base_url('chat/abc/' . $p['user_id']); ?>">Message</a> 
<!--    <a href="#">Invite</a>   -->
    <a class="saved">Saved </a> 
                                                        <?php } }
        ?> 
                                                            </div>  </div>

                                                        <!--  <div class="profile-job-profile-button clearfix">
                                                               
                                                              </div> -->


                                                    </div>
                                                </div>



                                            <?php }
                                            ?>
                                            <!-- @nk!t 7-4-2017 start -->
                                            <?php
                                        } else {
                                            ?>
                                            <div class="text-center rio">
                                                <h1 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">Oops No Data Found.</h1>
                                                <p style="margin-left:4%;text-transform:none !important;border:0px;">We couldn't find what you were looking for.</p>
                                                <ul>
                                                    <li style="text-transform:none !important; list-style: none;">Make sure you used the right keywords.</li>
                                                </ul>
                                            </div>
<?php } ?>
                                        <!-- @nk!t 7-4-2017 start -->
                                        <!-- khyati end -->
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>

<?php echo $footer; ?>


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
    


<script src="<?php echo base_url('js/jquery.highlite.js'); ?>"></script>


<script>

var data= <?php echo json_encode($demo); ?>;
//alert(data);

        
$(function() {
    //alert('data');
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
<script>

var data1 = <?php echo json_encode($de); ?>;
//alert(data);

        
$(function() {
    //alert('data');
$( "#searchplace" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data1, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#searchplace").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#searchplace").val(ui.item.label);
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
       //     alert('Please enter Keyword');
            return false;
        }
    }
</script>


  

<script type="text/javascript">
    var text = document.getElementById("search").value;
//alert(text);

    $(".search").highlite({

        text: text



    });
</script>
<script type="text/javascript">

    var text = document.getElementById("search1").value;
    alert(text);

    $(".search1").highlite({

        text: text

    });

</script>


<!-- script for skill textbox automatic end (option 2)-->



<!-- script for skill textbox automatic end (option 2)-->


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

<!-- Cover Image upload Start--> 

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
                url: "<?php echo base_url('recruiter/image_saveBG_ajax'); ?>",
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


<!-- Cover Image upload Start--> 
<script type="text/javascript">
                  function save_user(abc)
                        {
           var saveid = document.getElementById("hideenuser" + abc);
                $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . "recruiter/save_search_user" ?>',
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