<!-- start head -->
<?php echo $head; ?>

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

<!--post save success pop up style strat -->
<style>

    /* The Modal (background) */
    .modal2 {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content2 {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 65%;
        max-width: 1200px;
    }


    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* The Close Button */
    .close2 {
        color: white;
        position: absolute;
        top: 75px;
        right: 196px;
        font-size: 35px;
        font-weight: bold;
    }

    .close2:hover,
    .close2:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }


    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }
    /*!
     * bootstrap-vertical-tabs - v1.2.2
     * https://dbtek.github.io/bootstrap-vertical-tabs
     * 2016-12-02
     * Copyright (c) 2016 İsmail Demirbilek
     * License: MIT
     */
    .tabs-left, .tabs-right {
        border-bottom: none;
        padding-top: 2px;
    }
    .tabs-left {
        /*border-right: 1px solid #ddd;*/
        padding-top: 15px;
        height: 100%;
    }
    .tabs-right {
        border-left: 1px solid #ddd;
    }
    .tabs-left>li, .tabs-right>li {
        float: none;
        margin-bottom: 2px;
    }
    .tabs-left>li {
        margin-right: -1px;
        padding: 0;
    }
    .tabs-right>li {
        margin-left: -1px;
    }
    .tabs-left>li.active>a,
    .tabs-left>li.active>a:hover,
    .tabs-left>li.active>a:focus {
        border-bottom-color: #ddd;
        border-right-color: transparent;
    }

    .tabs-right>li.active>a,
    .tabs-right>li.active>a:hover,
    .tabs-right>li.active>a:focus {
        border-bottom: 1px solid #ddd;
        border-left-color: transparent;
    }
    .tabs-left>li>a {
        /*border-radius: 4px 0 0 4px;*/
        margin-right: 0;
        display:block;
        letter-spacing: 2px;
        font-size: 18px;
        font-weight: 600;
    }
    .tabs-right>li>a {
        border-radius: 0 4px 4px 0;
        margin-right: 0;

    }
    .sideways {
        margin-top:50px;
        border: none;
        position: relative;
    }
    .sideways>li {
        height: 20px;
        width: 120px;
        margin-bottom: 100px;
    }
    .sideways>li>a {
        border-bottom: 1px solid #ddd;
        border-right-color: transparent;
        text-align: center;
        border-radius: 4px 4px 0px 0px;
    }
    .sideways>li.active>a,
    .sideways>li.active>a:hover,
    .sideways>li.active>a:focus {
        border-bottom-color: transparent;
        border-right-color: #ddd;
        border-left-color: #ddd;
    }
    .sideways.tabs-left {
        left: -50px;
    }
    .sideways.tabs-right {
        right: -50px;
    }
    .sideways.tabs-right>li {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .sideways.tabs-left>li {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
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
    }
</style>

<!--post save success pop up style end -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.jMosaic.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/croppie.css');  ?>">
--><style type="text/css" media="screen">
    #row2 { overflow: hidden; width: 100%; }
    #row2 img { height: 350px;width: 100%; } 
    .upload-img { float: right;
                  position: relative; margin-top: -135px; right: 50px; }

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
</style>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>

 <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->


<!-- script for cropiee immage End-->
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<!-- END HEADER -->

<?php echo $art_header2 ?>


<body   class="page-container-bg-solid page-boxed">

    <section>
         <div class="container" id="paddingtop_fixed">

            <div class="row" id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo" style="width:100%"></div>
                </div>
                <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">

                    <button class="btn btn-success cancel-result">Cancel</button>
                    <button class="btn btn-success set-btn upload-result" onclick="myFunction()">Upload Image</button>

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
                    if ($this->uri->segment(3) == $userid) {
                        $user_id = $userid;
                    } elseif ($this->uri->segment(3) == "") {
                        $user_id = $userid;
                    } else {
                        $user_id = $this->uri->segment(3);
                    }
                    $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 'status' => '1');
                    $image = $this->common->select_data_by_condition('art_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                    $image_ori = $image[0]['profile_background'];
                    if ($image_ori) {
                        ?>
                        <div class="bg-images">
                            <img src="<?php echo base_url(ARTBGIMAGE . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / ></div>
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
    <?php
    $userid = $this->session->userdata('aileenuser');
    if($artisticdata[0]['user_id'] == $userid) {
    ?>     
      <div class="upload-img">
      
        <label class="cameraButton"><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
             </div>
           <?php }?>
    <div class="profile-photo">
        <div class="buisness-menu">
            <div class="profile-pho-bui">

                <div class="user-pic">
<?php if ($artisticdata[0]['art_user_image'] != '') { ?>
                        <img src="<?php echo base_url(ARTISTICIMAGE . $artisticdata[0]['art_user_image']); ?>" alt="" >
                    <?php } else { ?>
                        <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                    <?php } ?>

                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    if ($artisticdata[0]['user_id'] == $userid) {
                        ?>

                                <!--<a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>-->
                        <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
<?php } ?>



                </div>

                <!--                        <div id="popup-form">
<?php echo form_open_multipart(base_url('artistic/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                        <input type="hidden" name="hitext" id="hitext" value="5">
                                        <input type="submit" name="cancel5" id="cancel5" value="Cancel">
                                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
<?php echo form_close(); ?>
                                </div>-->

            </div>

            <div class="bui-menu-profile col-md-10">



                <h4 class="profile-head-text"><a href="<?php echo base_url('artistic/art_manage_post/' . $artisticdata[0]['user_id'] . ''); ?>"> <?php echo ucwords($artisticdata[0]['art_name']); ?><?php echo ucwords($artisticdata[0]['art_lastname']); ?></a></h4>


                <?php
                    if ($artisticdata[0]['designation'] == '') {
                        ?>

                        <?php if ($artisticdata[0]['user_id'] == $userid) { ?>
                            <a id="myBtn">Designation</a>
                        <?php } ?>

                    <?php } else { ?> 

                        <?php if ($artisticdata[0]['user_id'] == $userid) { ?>
                            <a id="myBtn"><?php echo ucwords($artisticdata[0]['designation']); ?></a>
                        <?php } else { ?>
                            <a><?php echo ucwords($artisticdata[0]['designation']); ?></a>
                        <?php } ?>

                    <?php } ?>



            </div>
            <!-- PICKUP -->
            <!-- menubar --><div class="buisness-data-menu  col-md-12 ">

                <div class="left-side-menu col-md-2">   </div>

                <div class="profile-main-box-buis-menu  col-md-9">  
                    <ul class="">


                        <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_manage_post') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/art_manage_post/' . $artisticdata[0]['user_id']); ?>"> Dashboard</a>

                        </li>

                        <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'artistic_profile') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/artistic_profile/' . $artisticdata[0]['user_id']); ?>"> Details</a>
                        </li>


<?php
$userid = $this->session->userdata('aileenuser');
if ($artisticdata[0]['user_id'] == $userid) {
    ?> 

                                       <!--  <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_savepost') { ?> class="active" <?php } ?>><a href="<?php //echo base_url('artistic/art_savepost'); ?>">Saved Post</a>
                                        </li> -->



                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'userlist') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/userlist'); ?>">Userlist</a>
                            </li>
<?php } ?>


                        <?php
                        $userid = $this->session->userdata('aileenuser');
                        if ($artisticdata[0]['user_id'] == $userid) {
                            ?>
                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/followers'); ?>">Followers  <br> (<?php echo (count($followerdata)); ?>)</a>
                            </li>
                        <?php
                        } else {

                            $artregid = $artisticdata[0]['art_id'];
                            $contition_array = array('follow_to' => $artregid, 'follow_status' => '1', 'follow_type' => '1');
                            $followerotherdata = $this->data['followerotherdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                            ?> 
                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/followers/' . $artisticdata[0]['user_id']); ?>">Followers  <br> (<?php echo (count($followerotherdata)); ?>)</a>
                            </li>

                        <?php } ?> 
                        <?php
                        if ($artisticdata[0]['user_id'] == $userid) {
                            ?>        
                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/following'); ?>">Following  <br> (<?php echo (count($followingdata)); ?>)</a>
                            </li>
                        <?php
                        } else {

                            $artregid = $artisticdata[0]['art_id'];
                            $contition_array = array('follow_from' => $artregid, 'follow_status' => '1', 'follow_type' => '1');
                            $followingotherdata = $this->data['followingotherdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                            ?>
                            <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following') { ?> class="active" <?php } ?>><a href="<?php echo base_url('artistic/following/' . $artisticdata[0]['user_id']); ?>">Following <br>  (<?php echo (count($followingotherdata)); ?>)</a>
                            </li> 
                        <?php } ?>  


                    </ul>

                </div>

            </div>

            <!-- pickup -->
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
    <div class="user-midd-section">
        <div class="container "  style="border: 1px solid #d9d9d9;    padding-right: 0px; ">
            <div class="row">


                <div  class="col-sm-12 border_tag padding_low_data padding_les" >

                    <div class="col-xs-3 padding_low_data padding_les"> <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left remove_tab">
                            <li class="active"> <a href="<?php echo base_url('artistic/art_photos/' . $artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-camera" aria-hidden="true"></i>   Photos</a></li>
                            <li> <a href="<?php echo base_url('artistic/art_videos/' . $artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-video-camera" aria-hidden="true"></i>  Video</a></li>
                            <li><a href="<?php echo base_url('artistic/art_audios/' . $artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-music" aria-hidden="true"></i>  Audio</a></li>
                            <li>    <a href="<?php echo base_url('artistic/art_pdf/' . $artisticdata[0]['user_id']) ?>" data-toggle="tab"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Pdf</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-9" style="padding-left: 0; height: 100%; border-left: 1px solid #d9d9d9">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home"><div class="common-form">
                                    <div class="">

                                        <h2 class="add_tag_design"> Photos</h2>
                                        <div class="contact-frnd-post">

                                            <!-- khyati changes start -->
                                            <div class="pictures">

<?php
$i = 1;

$allowed = array('gif', 'png', 'jpg');
foreach ($artistic_data as $mke => $mval) {

    $ext = pathinfo($mval['image_name'], PATHINFO_EXTENSION);

    if (in_array($ext, $allowed)) {
        $databus[] = $mval;
    }
}
//echo "<pre>"; print_r($databus); die();
if ($databus) { 
    foreach ($databus as $data) {
        ?>
            <img src="<?php echo base_url(ARTPOSTIMAGE . str_replace(" ", "_", $data['image_name'])) ?>" onclick="openModal();currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor" width="280" height="300"/>

                    <?php
                    $i++;
                    }
                    } else { 
                     echo "no Images"; 
                         } ?>

                                            </div>

                                            <!-- khyati changes end -->



                                            <div id="myModal1" class="modal2">
                                                <span class="close2 cursor" onclick="closeModal()">&times;</span>
                                                <div class="modal-content2">

                                                    <!-- khyati chnages start-->


<?php
$i = 1;

$allowed = array('gif', 'png', 'jpg');
foreach ($artistic_data as $mke => $mval) {

    $ext = pathinfo($mval['image_name'], PATHINFO_EXTENSION);

    if (in_array($ext, $allowed)) {
        $databus1[] = $mval;
    }
}

foreach ($databus1 as $artdata) {
    ?>

                        <div class="mySlides">
                            <div class="numbertext"><?php echo $i ?> / <?php echo count($databus1) ?></div>
                             <img src="<?php echo base_url(ARTPOSTIMAGE . str_replace(" ", "_", $artdata['image_name'])) ?>" style="width:100%; height: 70%;">

     <!-- 8-5 post art_post page data comment design start -->
     <div class="post-design-like-box col-md-12">
             <div class="post-design-menu">
                 <!-- like comment div start -->
                 <ul>

                     <li class="<?php echo 'likeimg' . $artdata['image_id']; ?>">
                         <a id="<?php echo $artdata['image_id']; ?>" onClick="post_likeimg(this.id)">

                             <?php
    $userid = $this->session->userdata('aileenuser');
    $contition_array = array('post_image_id' => $artdata['image_id'], 'user_id' => $userid, 'is_unlike' => 0);

    $activedata = $this->data['activedata'] = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

    if ($activedata) {
        ?>
                           <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                <?php } else { ?>
                              <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i>
                            <?php } ?>


           <span class="<?php echo 'likeimage' . $artdata['image_id']; ?>"> <?php
             $contition_array = array('post_image_id' => $artdata['image_id'], 'is_unlike' => 0);
              $likecount = $this->common->select_data_by_condition('art_post_image_like', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                   if ($likecount) {
                          echo count($likecount);
                      }
                      ?>

               </span>
                         </a>
                     </li>
                     <li id="<?php echo 'insertcount' . $row['art_post_id']; ?>" style="visibility:show">
                         <?php
                         $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' => '0');
                         $commnetcount = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                         ?>
                         <a  onClick="commentall(this.id)" id="<?php echo $row['art_post_id']; ?>">
                             <i class="fa fa-comment-o" aria-hidden="true">
                                 <?php echo count($commnetcount); ?>
                             </i>  
                         </a>
                     </li>
                 </ul>
                 <!-- like comment div end -->
             </div>
         </div>


         <!-- like user list start -->

         <!-- pop up box start-->
         <?php
         if ($row['art_likes_count'] > 0) {
             ?>
             <div class="likeduserlist<?php echo $row['art_post_id'] ?>">
                 <?php
                 $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' => '0');
                 $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                 $likeuser = $commnetcount[0]['art_like_user'];
                 $countlike = $commnetcount[0]['art_likes_count'] - 1;
                 $likelistarray = explode(',', $likeuser);
                 foreach ($likelistarray as $key => $value) {
                     $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_name;
                     $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_lastname;
                     ?>
                 <?php } ?>
                 <!-- pop up box end-->
                 <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $row['art_post_id']; ?>);">
                     <?php
                     $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' => '0');
                     $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                     $likeuser = $commnetcount[0]['art_like_user'];
                     $countlike = $commnetcount[0]['art_likes_count'] - 1;

                     $likelistarray = explode(',', $likeuser);
                     $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                     $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                     ?>
                     <div class="like_one_other">
                         <?php
                         echo ucwords($art_fname);
                         echo "&nbsp;";
                         echo ucwords($art_lname);
                         echo "&nbsp;";
                         ?>
                         <?php
                         if (count($likelistarray) > 1) {
                             echo "and ";
                             echo $countlike;
                             echo "&nbsp;";
                             echo "others";
                         }
                         ?>
                     </div>
                 </a>
             </div>
             <?php
         }
         ?>
         <div class="<?php echo "likeusername" . $row['art_post_id']; ?>" id="<?php echo "likeusername" . $row['art_post_id']; ?>" style="display:none">
             <?php
             $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' => '0');
             $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             $likeuser = $commnetcount[0]['art_like_user'];
             $countlike = $commnetcount[0]['art_likes_count'] - 1;
             $likelistarray = explode(',', $likeuser);
             foreach ($likelistarray as $key => $value) {
                 $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_name;
                 $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_lastname;
                 ?>
             <?php } ?>
             <!-- pop up box end-->
             <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $row['art_post_id']; ?>);">
                 <?php
                 $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' => '0');
                 $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                 $likeuser = $commnetcount[0]['art_like_user'];
                 $countlike = $commnetcount[0]['art_likes_count'] - 1;

                 $likelistarray = explode(',', $likeuser);
                 $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                 $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                 ?>
                 <div class="like_one_other">
                     <?php
                     echo ucwords($art_fname);
                     echo "&nbsp;";
                     echo ucwords($art_lname);
                     echo "&nbsp;";
                     ?>
                     <?php
                     if (count($likelistarray) > 1) {
                         echo "and ";
                         echo $countlike;
                         echo "&nbsp;";
                         echo "others";
                     }
                     ?>
                 </div>
             </a>
         </div>
         <!-- like user list end -->

         <?php
//                                        $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1');
//                                        $artdatacondition = $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
//                                        if ($artdatacondition) {
//                                            
         ?>

         <div class="art-all-comment col-md-12">
             <!-- 18-4 all comment start-->
             <div id="<?php echo "fourcomment" . $row['art_post_id']; ?>" style="display:none">
             </div>

             <!-- khyati changes start -->

             <div  id="<?php echo "threecomment" . $row['art_post_id']; ?>" style="display:block">
                 <div class="<?php echo 'insertcomment' . $row['art_post_id']; ?>">
                     <?php
                     $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1');
                     $artdata = $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

                     if ($artdata) {
                         foreach ($artdata as $rowdata) {
                             $artname = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id']))->row()->art_name;
                             $artlastname = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id']))->row()->art_lastname;
                             ?>
                             <div class="all-comment-comment-box">
                                 <div class="post-design-pro-comment-img"> 
                                     <?php
                                     $art_userimage = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->art_user_image;
                                     ?>
                                     <?php if ($art_userimage) { ?>
                                         <img  src="<?php echo base_url(ARTISTICIMAGE . $art_userimage); ?>"  alt="">
                                         <?php
                                     } else {
                                         ?>
                                         <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
                                         <?php
                                     }
                                     ?>
                                 </div>
                                 <div class="comment-name">
                                     <b title=" <?php
                                     echo ucwords($artname);
                                     echo "&nbsp;";
                                     echo ucwords($artlastname);
                                     ?>">
                                            <?php
                                            echo ucwords($artname);
                                            echo "&nbsp;";
                                            echo ucwords($artlastname);
                                            ?></b><?php echo '</br>'; ?></div>

                                 <div class="comment-details" id= "<?php echo "showcomment" . $rowdata['artistic_post_comment_id']; ?>">
                                     <?php
                                     echo text2link($rowdata['comments']);
                                     ?>
                                 </div>
                                 <!--                                                                        <div class="col-md-12">
                                                                                                             <div class="col-md-10">
                                                                                                                 <div contenteditable="true"   class="editable_text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>" id="<?php echo "editcomment" . $rowdata['artistic_post_comment_id']; ?>" style="display:none;-webkit-min-height: 40px;" onClick="commentedit(<?php echo $rowdata['artistic_post_comment_id']; ?>)" style="height:50px;" ><?php echo $rowdata['comments']; ?></div>
                                                                                                             </div>
                                 
                                                                                                             <div class="col-md-2 comment-edit-button">
                                                                                                                 <button id="<?php echo "editsubmit" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Comment</button>
                                                                                                             </div>
                                 
                                                                                                         </div>-->
                                 <div class="edit-comment-box">
                                     <div class="inputtype-edit-comment">
                                         <div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>"  id="editcomment<?php echo $rowdata['artistic_post_comment_id']; ?>" placeholder="Enter Your Comment " value= ""  onkeyup="commentedit(<?php echo $rowdata['artistic_post_comment_id']; ?>)"><?php echo $rowdata['comments']; ?></div>
                                         <span class="comment-edit-button"><button id="<?php echo "editsubmit" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Save</button></span>
                                     </div>
                                 </div>

                                 <div class="art-comment-menu-design"> 
                                     <div class="comment-details-menu" id="<?php echo 'likecomment1' . $rowdata['artistic_post_comment_id']; ?>">
                                         <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_like1(this.id)">

                                             <?php
                                             $userid = $this->session->userdata('aileenuser');
                                             $contition_array = array('artistic_post_comment_id' => $rowdata['artistic_post_comment_id'], 'status' => '1');
                                             $artcommentlike = $this->data['artcommentlike'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                             $likeuserarray = explode(',', $artcommentlike[0]['artistic_comment_like_user']);

                                             if (!in_array($userid, $likeuserarray)) {
                                                 ?>

                                                 <i class="fa fa-thumbs-o-up fa-1x" aria-hidden="true"></i> 
                                             <?php } else {
                                                 ?>
                                                 <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                             <?php }
                                             ?>
                                             <span>
                                                 <?php
                                                 if ($rowdata['artistic_comment_likes_count'] > 0) {
                                                     echo $rowdata['artistic_comment_likes_count'];
                                                 }
                                                 ?>
                                             </span>
                                         </a>
                                     </div>


                                     <?php
                                     $userid = $this->session->userdata('aileenuser');

                                     if ($rowdata['user_id'] == $userid) {
                                         ?> 

                                         <span role="presentation" aria-hidden="true"> · </span>
                                         <div class="comment-details-menu">
                                             <div id="<?php echo 'editcommentbox' . $rowdata['artistic_post_comment_id']; ?>" style="display:block;">
                                                 <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editbox(this.id)" class="editbox">Edit
                                                 </a>
                                             </div>
                                             <div id="<?php echo 'editcancle' . $rowdata['artistic_post_comment_id']; ?>" style="display:none;">
                                                 <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editcancle(this.id)">Cancel
                                                 </a>
                                             </div>
                                         </div>
                                     <?php } ?>

                                     <?php
                                     $userid = $this->session->userdata('aileenuser');

                                     $art_userid = $this->db->get_where('art_post', array('art_post_id' => $rowdata['art_post_id'], 'status' => 1))->row()->user_id;


                                     if ($rowdata['user_id'] == $userid || $art_userid == $userid) {
                                         ?> 
                                         <span role="presentation" aria-hidden="true"> · </span>
                                         <div class="comment-details-menu">
                                             <input type="hidden" name="post_delete"  id="post_delete" value= "<?php echo $rowdata['art_post_id']; ?>">
                                             <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['artistic_post_comment_id']; ?>">
                                                 </span>
                                             </a>
                                         </div>
            <?php } ?>

                                     <span role="presentation" aria-hidden="true"> · </span>

                                     <div class="comment-details-menu">
                                         <p> <?php
                                             /*   $new_date = date('Y-m-d H:i:s',strtotime($rowdata['created_date']));
                                              */
                                             /* 							$new_time =	$this->time_elapsed_string($new_date);
                                              */
//							echo $new_time. '<br>';
                                             echo date('d-M-Y', strtotime($rowdata['created_date']));
                                             echo '</br>';
                                             ?>
                                         </p></div></div>
                             </div>
                             <?php
                         }
                     }
                     ?>

                 </div>
             </div>
             <!-- khyati changes end -->

             <!-- all comment end-->


         </div>

             <?php //  }  ?>
         <div class="post-design-commnet-box col-md-12">
             <?php
             $userid = $this->session->userdata('aileenuser');
             $art_userimage = $this->db->get_where('art_reg', array('user_id' => $userid, 'status' => 1))->row()->art_user_image;
             ?>
             <div class="post-design-proo-img">
                 <?php if ($art_userimage) { ?>
                     <img src="<?php echo base_url(ARTISTICIMAGE . $art_userimage); ?>" name="image_src" id="image_src" />
                     <?php
                 } else {
                     ?>
                     <img src="<?php echo base_url(NOIMAGE); ?>" alt="No Image">
                     <?php
                 }
                 ?>
             </div>
             <div class="">
                 <div id="content" class="col-md-10 inputtype-comment" style="padding-left: 7px !important;">
                     <div contenteditable="true" style="min-height:37px !important; margin-top: 0px!important" class="editable_text" name="<?php echo $row['art_post_id']; ?>"  id="<?php echo "post_comment" . $row['art_post_id']; ?>" placeholder="Type Message ..." onClick="entercomment(<?php echo $row['art_post_id']; ?>)"></div>
                 </div>
    <?php echo form_error('post_comment'); ?>
                 <div class="col-md-1 comment-edit-butn">   
                     <button id="<?php echo $row['art_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button> 
                 </div>
             </div>
         </div>
                
                                        <!-- 8-5 comment design end -->
      </div>


    <?php
    $i++;
}
?>
 <!-- khyati chnages end-->
       </div>

     <a class="prev" style="left: 5;" onclick="plusSlides(-1)">&#10094;</a>
     <a class="next" onclick="plusSlides(1)">&#10095;</a>

      <div class="caption-container">
       <p id="caption"></p>
       </div>
        <div>
           </div>
                    </div>
                         </div>

                            </div>
                                </div>
                            </div>
                        </div></div>

                </div>
            </div>

            <div class="clearfix"></div>

        </div>


    </div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


</div>
</div>


</div>
</div>
</section>

</body>
<!-- Bid-modal-2  -->
<div class="modal fade message-box" id="bidmodal-2" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
            <div class="modal-body">
                <span class="mes">
                    <div id="popup-form">
<?php echo form_open_multipart(base_url('artistic/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="5">
                        <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save">
<?php echo form_close(); ?>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Model Popup Close -->


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


</html>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="<?php echo base_url('js/jquery.jMosaic.js'); ?>"></script>


<script>

        var data = <?php echo json_encode($demo); ?>;
// alert(data);


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

//select2 autocomplete start for Location
    $('#searchplace').select2({

        placeholder: 'Find Your Location',
        maximumSelectionLength: 1,
        ajax: {

            url: "<?php echo base_url(); ?>artistic/location",
            dataType: 'json',
            delay: 250,

            processResults: function (data) {

                return {

                    results: data


                };

            },
            cache: true
        }
    });
//select2 autocomplete End for Location


</script>


<script type="text/javascript">
    //For blocks or images of size, you can use $(document).ready
    $(document).ready(function () {
        $('.blocks').jMosaic({items_type: "li", margin: 0});
        $('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
    });

    //If this image without attribute WIDTH or HEIGH, you can use $(window).load
    $(window).load(function () {
        //$('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
    });

    //You can update on $(window).resize
    $(window).resize(function () {
        //$('.pictures').jMosaic({min_row_height: 150, margin: 3, is_first_big: true});
        //$('.blocks').jMosaic({items_type: "li", margin: 0});
    });
</script>

<script>
    function openModal() {
        document.getElementById('myModal1').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal1').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>


<!-- images like script start -->

<script type="text/javascript">
    function mulimg_like(clicked_id)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/mulimg_like" ?>',
            data: 'post_image_id=' + clicked_id,
            success: function (data) {
                $('.' + 'likepost' + clicked_id).html(data);

            }
        });
    }
</script>

<!--images like script end -->

<!-- hide and show data start-->
<script type="text/javascript">
    function commentall(clicked_id) {

        var x = document.getElementById('threecomment' + clicked_id);
        var y = document.getElementById('fourcomment' + clicked_id);
        var z = document.getElementById('insertcount' + clicked_id);



        if (x.style.display === 'block' && y.style.display === 'none') {

            x.style.display = 'none';
            y.style.display = 'block';
            z.style.display = 'none';

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "artistic/multifourcomment" ?>',
                data: 'art_post_id=' + clicked_id,
                //alert(data);
                success: function (data) {
                    $('#' + 'fourcomment' + clicked_id).html(data);

                }
            });

        }

    }
</script>
<!-- hide and show data end-->


<!-- insert comment using enter -->
<script type="text/javascript">

function insert_commentimg(clicked_id)
{
        // start khyati code
  var $field = $('#post_comment' + clicked_id);
  //var data = $field.val();
  var post_comment = $('#post_comment' + clicked_id).html();
// end khyati code



        var x = document.getElementById('threecomment' + clicked_id);
        var y = document.getElementById('fourcomment' + clicked_id);

if(post_comment == ''){ 
event.preventDefault();
 return false;
 }else{ 


        if (x.style.display === 'block' && y.style.display === 'none') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "artistic/mulimg_commentthree" ?>',
                data: 'post_image_id=' + clicked_id + '&comment=' + post_comment,
                dataType: "json",
                success: function (data) { 
                    $('#post_comment' + clicked_id).html("");

                    //  $('.insertcomment' + clicked_id).html(data);
                    $('#' + 'insertcount' + clicked_id).html(data.count);
                    $('.insertcomment' + clicked_id).html(data.comment);

                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "artistic/mulimg_comment" ?>',
                data: 'post_image_id=' + clicked_id + '&comment=' + post_comment,
                // dataType: "json",
                success: function (data) { 
                    
                   $('#post_comment' + clicked_id).html("");

                    $('#' + 'fourcomment' + clicked_id).html(data);
                    // $('#' + 'commnetpost' + clicked_id).html(data.count);
                    //  $('#' + 'fourcomment' + clicked_id).html(data.comment);

                }
            });
        }  }
    }

</script>

<script type="text/javascript">
 function entercommentimg(clicked_id){
      

//var $field = $('#post_comment' + clicked_id);
  //var data = $field.val();
 // var post_comment = $('#post_comment' + clicked_id).html();

    //$(document).ready(function($) {
              $("#post_comment" +clicked_id).click(function(){
          $(this).prop("contentEditable", true);
          $(this).html("");
        });


        $( "#post_comment" +clicked_id).keypress(function( event ) { //alert(post_comment);
          if ( event.which == 13 && event.shiftKey != 1) { //alert(post_comment);
             event.preventDefault();
             var sel = $("#post_comment" +clicked_id);
             var txt = sel.html();

             $('#post_comment' + clicked_id).html("");
             // $("#result").html(txt);
             // sel.html("")
             // sel.blur();
            //alert('.insertcomment' + clicked_id);

          var x = document.getElementById('threecomment' + clicked_id);
          var y = document.getElementById('fourcomment' + clicked_id);
   

   if(txt == ''){ 

    event.preventDefault();
        return false;
   }else{   
 if (x.style.display === 'block' && y.style.display === 'none') {  
       $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/mulimg_commentthree" ?>',
                  data: 'post_image_id=' + clicked_id + '&comment=' + txt,
                 dataType: "json",
                   success:function(data){ 
        
       //  $('.insertcomment' + clicked_id).html(data);
          $('#' + 'insertcount' + clicked_id).html(data.count);
          $('.insertcomment' + clicked_id).html(data.comment);

          }
            }); 
 
      } else { 

        $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/mulimg_comment" ?>',
                 data:'post_id='+clicked_id + '&comment='+txt,
                // dataType: "json",
                   success:function(data){ 
         $('#' + 'fourcomment' + clicked_id).html(data);
        // $('#' + 'commnetpost' + clicked_id).html(data.count);
        //  $('#' + 'fourcomment' + clicked_id).html(data.comment);

          }
            }); 
     } 
   }

          }
        });     $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
      });
            
   // });

  }
  </script>

<!-- insert comment end -->

<!-- comment like script start -->

<script type="text/javascript">
    function comment_like(clicked_id)
    {
        //alert(clicked_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/mulimg_comment_like" ?>',
            data: 'post_image_comment_id=' + clicked_id,
            success: function (data) { //alert(data);
                $('#' + 'likecomment' + clicked_id).html(data);

            }
        });
    }


    function comment_liketwo(clicked_id)
    {
        //alert(clicked_id);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/mulimg_comment_like1" ?>',
            data: 'post_image_comment_id=' + clicked_id,
            success: function (data) { //alert(data);
                $('#' + 'likecommentone' + clicked_id).html(data);

            }
        });
    }
</script>
<!-- comment like script end -->

<!-- comment edit insert start -->

<script type="text/javascript">
    function edit_comment(abc)
    { //alert('editsubmit' + abc);

        //var post_comment_edit = document.getElementById("editcomment" + abc);

 // start khyati code
  var $field = $('#editcomment' + abc);
  //var data = $field.val();
  var post_comment_edit = $('#editcomment' + abc).html();
// end khyati code


if(post_comment_edit == ''){ 
      $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
        
   }else{ 


        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/mul_edit_com_insert" ?>',
            data: 'post_image_comment_id=' + abc + '&comment=' + post_comment_edit,
            success: function (data) { //alert('falguni');

                //  $('input').each(function(){
                //     $(this).val('');
                // }); 
                document.getElementById('editcomment' + abc).style.display = 'none';
                document.getElementById('showcomment' + abc).style.display = 'block';
                document.getElementById('editsubmit' + abc).style.display = 'none';

                document.getElementById('editcommentbox' + abc).style.display = 'block';
                document.getElementById('editcancle' + abc).style.display = 'none';
                //alert('.' + 'showcomment' + abc);
                $('#' + 'showcomment' + abc).html(data);



            }
        });
     }
        //window.location.reload();
    }
</script>


<script type="text/javascript">
 function commentedit(abc){ 
      
        $("#editcomment" + abc).click(function(){
          $(this).prop("contentEditable", true);
          $(this).html("");
        });


        $("#editcomment" + abc).keypress(function(event) { //alert(post_comment);
          if (event.which == 13 && event.shiftKey != 1) { //alert(post_comment);
             event.preventDefault();
             var sel = $("#editcomment" + abc);
             var txt = sel.html();

             
            

      
   if (txt == '') {  
       $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
 
      } else { 

        $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "artistic/mul_edit_com_insert" ?>',
                data: 'post_image_comment_id=' + abc + '&comment=' + txt,
                // dataType: "json",
                   success:function(data){ 

                $('#editcomment' + abc).html("");
                
         document.getElementById('editcomment' + abc).style.display = 'none';
         document.getElementById('showcomment' + abc).style.display = 'block';
        document.getElementById('editsubmit' + abc).style.display = 'none';

        document.getElementById('editcommentbox' + abc).style.display = 'block';
        document.getElementById('editcancle' + abc).style.display = 'none';
                            //alert('.' + 'showcomment' + abc);
             $('#' + 'showcomment' + abc).html(data); 
          }
            }); 
     } 
   

          }
        });     $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
      });
            
   // });

  }
  </script>



<script type="text/javascript">
function edit_commenttwo(abc)
{ //alert('editsubmit' + abc);

    //var post_comment_edit = document.getElementById("editcommenttwo" + abc);

        // start khyati code
  var $field = $('#editcommenttwo' + abc);
  //var data = $field.val();
  var post_comment_edit = $('#editcommenttwo' + abc).html();
// end khyati code

if(post_comment_edit == ''){ 
      $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
        
   }else{ 

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/mul_edit_com_insert" ?>',
            data: 'post_image_comment_id=' + abc + '&comment=' + post_comment_edit,
            success: function (data) { //alert('falguni');

                //  $('input').each(function(){
                //     $(this).val('');
                // }); 
                document.getElementById('editcommenttwo' + abc).style.display = 'none';
                document.getElementById('showcommenttwo' + abc).style.display = 'block';
                document.getElementById('editsubmittwo' + abc).style.display = 'none';

                document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                document.getElementById('editcancletwo' + abc).style.display = 'none';
                //alert('.' + 'showcomment' + abc);
                $('#' + 'showcommenttwo' + abc).html(data);



            }
        }); }

    }
</script>

<script type="text/javascript">

function commentedittwo(abc)
{
       
        $("#editcommenttwo" + abc).click(function(){
          $(this).prop("contentEditable", true);
          $(this).html("");
        });

            $('#editcommenttwo' + abc).keypress(function (event) {
                if (event.which == 13 && event.shiftKey != 1) {
                   
                    e.preventDefault();
                    var sel = $("#editcomment" + abc);
                    var txt = sel.html();

                   $('#editcommenttwo' + abc).html("");


        if (txt == '') {  
       $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
 
      } else {

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "artistic/mul_edit_com_insert" ?>',
                        data: 'post_image_comment_id=' + abc + '&comment=' + val,
                        success: function (data) { //alert('falguni');

                            //  $('input').each(function(){
                            //     $(this).val('');
                            // }); 
                            document.getElementById('editcommenttwo' + abc).style.display = 'none';
                            document.getElementById('showcommenttwo' + abc).style.display = 'block';
                            document.getElementById('editsubmittwo' + abc).style.display = 'none';

                            document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                            document.getElementById('editcancletwo' + abc).style.display = 'none';
                            //alert('.' + 'showcomment' + abc);
                            $('#' + 'showcommenttwo' + abc).html(data);

                        }
                    }); }

                    //alert(val);
                }
            });
            $(".scroll").click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
      });
       

    }
</script>
<!-- comment edit insert end -->


<!-- comment edit box start-->
<script type="text/javascript">

    function comment_editbox(clicked_id) {
        document.getElementById('editcomment' + clicked_id).style.display = 'block';
        document.getElementById('showcomment' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit' + clicked_id).style.display = 'block';


        document.getElementById('editcommentbox' + clicked_id).style.display = 'none';
        document.getElementById('editcancle' + clicked_id).style.display = 'block';


    }

    function comment_editcancle(clicked_id) {

        document.getElementById('editcommentbox' + clicked_id).style.display = 'block';
        document.getElementById('editcancle' + clicked_id).style.display = 'none';

        document.getElementById('editcomment' + clicked_id).style.display = 'none';
        document.getElementById('showcomment' + clicked_id).style.display = 'block';
        document.getElementById('editsubmit' + clicked_id).style.display = 'none';

    }

    function comment_editboxtwo(clicked_id) {  //alert('editsubmit2' + clicked_id);
        document.getElementById('editcommenttwo' + clicked_id).style.display = 'block';
        document.getElementById('showcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('editsubmittwo' + clicked_id).style.display = 'block';


        document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'none';
        document.getElementById('editcancletwo' + clicked_id).style.display = 'block';

    }

    function comment_editcancletwo(clicked_id) {

        document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'block';
        document.getElementById('editcancletwo' + clicked_id).style.display = 'none';

        document.getElementById('editcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('showcommenttwo' + clicked_id).style.display = 'block';
        document.getElementById('editsubmittwo' + clicked_id).style.display = 'none';

    }

</script>
<!-- comment edit box end -->

<!-- comment delete start -->


<script type="text/javascript">
  
function comment_deletemodel(abc){


    $('.biderror .mes').html("<div class='pop_content'>Are you sure want to Delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc +")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
    $('#bidmodal').modal('show');
}

</script>
<script type="text/javascript">
  
function comment_deletetwomodel(abc){


    $('.biderror .mes').html("<div class='pop_content'>Are you sure want to Delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc +")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
    $('#bidmodal').modal('show');
}

</script>


<script type="text/javascript">
    function comment_delete(clicked_id)
    {
       
        var post_delete = document.getElementById("post_delete" + clicked_id);
        //alert('.insertcomment' + post_delete.value);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/mul_delete_comment" ?>',
            dataType: "json",
            data: 'post_image_comment_id=' + clicked_id + '&post_delete=' + post_delete.value,
            success: function (data) { 

                $('#' + 'insertcount' + post_delete.value).html(data.count);
                $('.insertcomment' + post_delete.value).html(data.comment);

            }
        });
    }

    function comment_deletetwo(clicked_id)
    { 

        var post_deleteone = document.getElementById("post_deletetwo" + clicked_id);
       
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/mul_delete_commenttwo" ?>',
            data: 'post_image_comment_id=' + clicked_id + '&post_delete=' + post_deleteone.value,
            success: function (data) { 
               

                $('#' + 'fourcomment' + post_deleteone.value).html(data);
                //$('.' + 'insertcommenttwo' + post_deleteone.value).html(data);

            }
        });
    }
</script>

<!-- commenmt delete end -->

<!-- end search validation -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
function updateprofilepopup(id) {
$('#bidmodal-2').modal('show');
}
</script>
<!-- cover image start -->
<script>
    function myFunction() {
        document.getElementById("upload-demo").style.visibility = "hidden";
        document.getElementById("upload-demo-i").style.visibility = "hidden";
        document.getElementById('message1').style.display = "block";

        // setTimeout(function () { location.reload(1); }, 9000);

    }


    function showDiv() {
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
                url: "<?php echo base_url() ?>artistic/ajaxpro",
                type: "POST",
                data: {"image": resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    if (html) {
                        window.location.reload();
                    }
                    //  $("#kkk").html(html);
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


        var reader = new FileReader();
        //alert(reader);
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

        //alert(size);

        if (size > 4194304)
        {
            //show an alert to the user
            alert("Allowed file size exceeded. (Max. 4 MB)")

            document.getElementById('row1').style.display = "none";
            document.getElementById('row2').style.display = "block";

            // window.location.href = "https://www.aileensoul.com/dashboard"
            //reset file upload control
            return false;
        }

        $.ajax({

            url: "<?php echo base_url(); ?>artistic/image",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                //alert(response);

            }
        });
    });

//aarati code end
</script>
<!-- cover image end -->
