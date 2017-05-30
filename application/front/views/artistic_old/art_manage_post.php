  <!-- start head -->
<?php echo $head; ?>


<style type="text/css">
    #popup-form img{display: none;}
</style>



<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<!-- start header -->
<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('dragdrop/fileinput.css'); ?>">
   <link href="<?php echo base_url('dragdrop/themes/explorer/theme.css'); ?>" media="all" rel="stylesheet" type="text/css"/>
    
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/video.css'); ?>">
    <script src="<?php echo base_url('js/mediaelement-and-player.min.js'); ?>"></script>

    <script src="<?php echo base_url('dragdrop/js/plugins/sortable.js'); ?>"></script>
     <script src="<?php echo base_url('dragdrop/js/fileinput.js'); ?>"></script>
      <script src="<?php echo base_url('dragdrop/js/locales/fr.js'); ?>"></script>
       <script src="<?php echo base_url('dragdrop/js/locales/es.js'); ?>"></script>
        <script src="<?php echo base_url('dragdrop/themes/explorer/theme.js'); ?>"></script>
pt>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>-->
<?php echo $art_header2; ?>


<link rel="stylesheet" type="text/css" href="../css/jquery.jMosaic.css">

<!-- END HEADER -->
<body   class="page-container-bg-solid page-boxed">

    <div class="container" id="paddingtop_fixed">

        <div class="row" id="row1" style="display:none;">
            <div class="col-md-12 text-center">
                <div id="upload-demo" style="width:100%"></div>
            </div>
            <div class="col-md-12 cover-pic" style="padding-top: 25px;text-align: center;">
                <button class="btn btn-success cancel-result" onclick="" >Cancel</button>

                <button class="btn btn-success set-btn upload-result" onclick="myFunction()">Save</button>

                <div id="message1" style="display:none;">
                    <div class="loader"><div id="floatBarsG">
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
                
                        <img src="<?php echo base_url($this->config->item('art_bg_main_upload_path') . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / >
                    <?php
                } else {
                    ?>
                    
                        <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" alt="WHITE IMAGE" />
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
    if ($artisticdata[0]['user_id'] == $userid) {
        ?>   
        <div class="upload-img">
            <label class="cameraButton"> <span class="tooltiptext">Upload Cover Photo</span> <i class="fa fa-camera" aria-hidden="true"></i>
                <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
            </label>
        </div>
    <?php } ?>

    <div class="profile-photo">
        <div class="profile-pho">

            <div class="user-pic">
                <?php if ($artisticdata[0]['art_user_image'] != '') { ?>
                    <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image']); ?>" alt="" >
                <?php } else { ?>
                    <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                <?php } ?>

                <?php
                $userid = $this->session->userdata('aileenuser');
                if ($artisticdata[0]['user_id'] == $userid) {
                    ?>                                                                                                                                    
                    <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                <?php } ?>
            </div>

        </div>
        <div class="profile-main-rec-box-menu  col-md-12 padding_les">

            <div class="left-side-menu col-md-1">  </div>
            <div class="right-side-menu col-md-7">
                <ul>


                    <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'art_manage_post') { ?> class="active" <?php } ?>><a title="Dashboard" href="<?php echo base_url('artistic/art_manage_post/' . $artisticdata[0]['user_id']); ?>"> Dashboard</a>
                    </li>

                    <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'artistic_profile') { ?> class="active" <?php } ?>><a title="Details" href="<?php echo base_url('artistic/artistic_profile/' . $artisticdata[0]['user_id']); ?>"> Details</a>
                    </li>


                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    if ($artisticdata[0]['user_id'] == $userid) {
                        ?> 

                        <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'userlist') { ?> class="active" <?php } ?>><a title="Userlist" href="<?php echo base_url('artistic/userlist'); ?>">Userlist</a>
                        </li>
                    <?php } ?>


                    <?php
                    $userid = $this->session->userdata('aileenuser');
                    if ($artisticdata[0]['user_id'] == $userid) {
                        ?>
                        <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers') { ?> class="active" <?php } ?>><a title="Followers" style="padding: 12px 15px 2px 15px" href="<?php echo base_url('artistic/followers'); ?>">Followers <br> (<?php echo (count($followerdata)); ?>)</a>
                        </li>
                        <?php
                    } else {

                        $artregid = $artisticdata[0]['art_id'];
                        $contition_array = array('follow_to' => $artregid, 'follow_status' => '1', 'follow_type' => '1');
                        $followerotherdata = $this->data['followerotherdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                        ?> 
                        <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'followers') { ?> class="active" <?php } ?>><a  title="Followers" style="padding: 12px 15px 2px 15px" href="<?php echo base_url('artistic/followers/' . $artisticdata[0]['user_id']); ?>">Followers <br> (<?php echo (count($followerotherdata)); ?>)</a>
                        </li>

                    <?php } ?> 
                    <?php
                    if ($artisticdata[0]['user_id'] == $userid) {
                        ?>        
                        <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following') { ?> class="active" <?php } ?>><a title="Following" style="padding: 12px 15px 2px 15px" href="<?php echo base_url('artistic/following'); ?>">Following <br> (<?php echo (count($followingdata)); ?>)</a>
                        </li>
                        <?php
                    } else {

                        $artregid = $artisticdata[0]['art_id'];
                        $contition_array = array('follow_from' => $artregid, 'follow_status' => '1', 'follow_type' => '1');
                        $followingotherdata = $this->data['followingotherdata'] = $this->common->select_data_by_condition('follow', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                        ?>
                        <li <?php if ($this->uri->segment(1) == 'artistic' && $this->uri->segment(2) == 'following') { ?> class="active" <?php } ?>><a title="Following" style="padding: 12px 15px 2px 15px" href="<?php echo base_url('artistic/following/' . $artisticdata[0]['user_id']); ?>">Following <br>  (<?php echo (count($followingotherdata)); ?>)</a>
                        </li> 
                    <?php } ?>  



                </ul>
            </div>

            <?php
            $userid = $this->session->userdata('aileenuser');
            if ($artisticdata[0]['user_id'] != $userid) {
                ?>
                <div class="col-md-2 padding_les" style="width: 24%;">
                    <div class="flw_msg_btn fr">
                        <ul>

                            <li class="<?php echo "fruser" . $artisticdata[0]['art_id']; ?>">

                                <?php
                                $userid = $this->session->userdata('aileenuser');

                                $contition_array = array('user_id' => $userid, 'status' => '1');

                                $bup_id = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                $status = $this->db->get_where('follow', array('follow_type' => 1, 'follow_from' => $bup_id[0]['art_id'], 'follow_to' => $artisticdata[0]['art_id']))->row()->follow_status;
                                //echo "<pre>"; print_r($status); die();

                                if ($status == 0 || $status == " ") {
                                    ?>

                                    <div id= "followdiv">
                                        <button id="<?php echo "follow" . $artisticdata[0]['art_id']; ?>" onClick="followuser(<?php echo $artisticdata[0]['art_id']; ?>)">Follow</button>
                                    </div>
                                <?php } elseif ($status == 1) { ?>
                                    <div id= "unfollowdiv">
                                        <button id="<?php echo "unfollow" . $artisticdata[0]['art_id']; ?>" onClick="unfollowuser(<?php echo $artisticdata[0]['art_id']; ?>)"> Following</button>
                                    </div>


                                <?php } ?>
                            </li>

                            <li>

                                <?php
                                $userid = $this->session->userdata('aileenuser');
                                if ($userid != $artisticdata[0]['user_id']) {
                                    ?>
                                <li> <a href="<?php echo base_url('chat/abc/' . $this->uri->segment(3)); ?>">Message</a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>

        </div>  
        <!-- menubar -->      <div class="job-menu-profile">
            <a href="<?php echo site_url('artistic/art_manage_post/' . $artisticdata[0]['user_id']); ?>">
                <h5><?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?></h5></a>

            <!-- text head start -->
            <div class="profile-text" >

                <?php
                if ($artisticdata[0]['designation'] == '') {
                    ?>

                    <?php if ($artisticdata[0]['user_id'] == $userid) { ?>
                        <a id="designation" class="designation" title="Designation">Current Work    </a>

                    <?php } ?>

                <?php } else { ?> 

                    <?php if ($artisticdata[0]['user_id'] == $userid) { ?>

                    <a id="designation" class="designation" title="<?php echo ucwords($artisticdata[0]['designation']); ?>">
                    <?php echo ucwords($artisticdata[0]['designation']); ?>
                        
                    </a>

                        <!-- <a id="myBtn"><?php echo ucwords($artisticdata[0]['designation']); ?></a> -->
                    <?php } else { ?>
                        <a><?php echo ucwords($artisticdata[0]['designation']); ?></a>
                    <?php } ?>

                <?php } ?>


                </div>

            </div>


            <!-- text head end -->

        </div>



    </div>
</div>
</div>
</div>
<div class="user-midd-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module">

                        <div class="head_details1">
                            <span><h5><i class="fa fa-info-circle" aria-hidden="true"></i> Information</h5>
                            </span>      </div>
                        <table class="business_data_table">
                            <tr>
                                <td class="business_data_td1"><i class="fa fa-key" aria-hidden="true"></i></td>
                                <td class="business_data_td2">

                                    <?php
                                    $aud = $artisticdata[0]['art_skill'];
                                    $aud_res = explode(',', $aud);
                                    foreach ($aud_res as $skill) {

                                        $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                                        $skill1[] = $cache_time;
                                    }
                                    $listFinal = implode(', ', $skill1);
                                    if ($artisticdata[0]['other_skill']) {
                                        echo $listFinal . ',' . $artisticdata[0]['other_skill'];
                                    } else {
                                        echo $listFinal;
                                    }
                                    ?>   
                                </td>
                            </tr>

                            <tr>
                                <td class="business_data_td1 detaile_map"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></td>
                                <td class="business_data_td2"><span><?php echo $artisticdata[0]['art_yourart']; ?></span></td>
                            </tr>

                            <tr>
                                <td class="business_data_td1 detaile_map"><i class="fa fa-file-text" aria-hidden="true"></i></td>
                                <td class="business_data_td2"><span><?php echo $this->common->make_links($artisticdata[0]['art_desc_art']); ?></span></td>
                            </tr>

                            <tr>
                                <td class="business_data_td1 detaile_map"><i class="fa fa-envelope-o" aria-hidden="true"></i></td>
                                <td class="business_data_td2"><span><?php echo $artisticdata[0]['art_email']; ?></span></td>
                            </tr>
                            <tr>
                                <td class="business_data_td1  detaile_map" ><i class="fa fa-map-marker"></i></td>
                                <td class="business_data_td2"><span>
                                        <?php
                                        if ($artisticdata[0]['art_address']) {
                                            echo $artisticdata[0]['art_address'];
                                            echo ",";
                                        }
                                        ?> 
                                        <?php
                                        if ($artisticdata[0]['art_city']) {
                                            echo $this->db->get_where('cities', array('city_id' => $artisticdata[0]['art_city']))->row()->city_name;
                                            echo",";
                                        }
                                        ?> 
                                        <?php
                                        if ($artisticdata[0]['art_country']) {
                                            echo $this->db->get_where('countries', array('country_id' => $artisticdata[0]['art_country']))->row()->country_name;
                                        }
                                        ?>

                                    </span></td>
                            </tr>

                        </table>
                    </div>
                </div>

                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module buisness_he_module" style="">

                        <div class="head_details">
                            <a href="<?php echo base_url('artistic/art_photos/' . $artisticdata[0]['user_id']) ?>"><h5><i class="fa fa-camera" aria-hidden="true"></i>   Photos</h5></a>
                        </div>  


                        <?php
                        $contition_array = array('user_id' => $artisticdata[0]['user_id']);
                        $artimage = $this->data['artimage'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                        foreach ($artimage as $val) {



                            $contition_array = array('post_id' => $val['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                            $artmultiimage = $this->data['artmultiimage'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                            $multipleimage[] = $artmultiimage;
                        }
                        ?>
                        <?php
                        $allowed = array('gif', 'png', 'jpg');

                        foreach ($multipleimage as $mke => $mval) {

                            foreach ($mval as $mke1 => $mval1) {
                                $ext = pathinfo($mval1['image_name'], PATHINFO_EXTENSION);

                                if (in_array($ext, $allowed)) {
                                    $singlearray[] = $mval1;
                                }
                            }
                        }
                        ?>


                        <?php
                        if ($singlearray) {
                            ?>

                            <?php
                            $i = 0;
                            foreach ($singlearray as $mi) {
                                ?>
                                <div class="image_profile">

                                    <img src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $mi['image_name']) ?>" alt="img1">

                                </div>
                                <?php
                                $i++;
                                if ($i == 6)
                                    break;
                            }
                            ?>


                        <?php } else { ?>
                            <div class="not_available">  <p>    Photos Not Available</p></div>

                        <?php } ?>

                    </div>
                </div>
                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module">
                        <table class="business_data_table">
                            <div class="head_details">
                                <a href="<?php echo base_url('artistic/art_videos/' . $artisticdata[0]['user_id']) ?>"> <h5><i class="fa fa-video-camera" aria-hidden="true"></i>  Video</h5></a>
                            </div>
                            <?php
                            $contition_array = array('user_id' => $artisticdata[0]['user_id']);
                            $artimage = $this->data['artimage'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                            foreach ($artimage as $val) {



                                $contition_array = array('post_id' => $val['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                                $artmultivideo = $this->data['artmultivideo'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                $multiplevideo[] = $artmultivideo;
                            }
                            ?>
                            <?php
                            $allowesvideo = array('mp4', '3gp', 'avi', 'ogg', '3gp', 'webm');

                            foreach ($multiplevideo as $mke => $mval) {

                                foreach ($mval as $mke1 => $mval1) {
                                    $ext = pathinfo($mval1['image_name'], PATHINFO_EXTENSION);

                                    if (in_array($ext, $allowesvideo)) {
                                        $singlearray1[] = $mval1;
                                    }
                                }
                            }
                            ?>

                            <?php if ($singlearray1) { ?>
                                <tr>

                                    <?php if ($singlearray1[0]['image_name']) { ?>
                                        <td class="image_profile"> 
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray1[0]['image_name']) ?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                    <?php } ?>

                                    <?php if ($singlearray1[1]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray1[1]['image_name']) ?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                    <?php if ($singlearray1[2]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray1[2]['image_name']) ?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>

                                    <?php if ($singlearray1[3]['image_name']) { ?>
                                        <td class="image_profile"> 
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray1[3]['image_name']) ?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                    <?php if ($singlearray1[4]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray1[4]['image_name']) ?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                    <?php if ($singlearray1[5]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray1[5]['image_name']) ?>" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } else { ?>
                                <div class="not_available">  <p> Video Not Available</p></div>
                            <?php } ?>
                        </table>

                    </div>
                </div>

                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module">
                        <table class="business_data_table">
                            <div class="head_details">
                                <a href="<?php echo base_url('artistic/art_audios/' . $artisticdata[0]['user_id']) ?>"> <h5><i class="fa fa-music" aria-hidden="true"></i>  Audio</h5></a>
                            </div>
                            <?php
                            $contition_array = array('user_id' => $artisticdata[0]['user_id']);
                            $artimage = $this->data['artimage'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                            foreach ($artimage as $val) {



                                $contition_array = array('post_id' => $val['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                                $artmultiaudio = $this->data['artmultiaudio'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                $multipleaudio[] = $artmultiaudio;
                            }
                            ?>
                            <?php
                            $allowesaudio = array('mp3');

                            foreach ($multipleaudio as $mke => $mval) {

                                foreach ($mval as $mke1 => $mval1) {
                                    $ext = pathinfo($mval1['image_name'], PATHINFO_EXTENSION);

                                    if (in_array($ext, $allowesaudio)) {
                                        $singlearray2[] = $mval1;
                                    }
                                }
                            }
                            ?>

                            <?php if ($singlearray2) { ?>
                                <tr>

                                    <?php if ($singlearray2[0]['image_name']) { ?>
                                        <td class="image_profile"> 
                                            <video  controls>


                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray2[0]['image_name']) ?>" type="audio/mp3"">
                                                <source src="movie.ogg" type="audio/mp3">
                                                Your browser does not support the audio tag.
                                            </video>
                                        </td>
                                    <?php } ?>

                                    <?php if ($singlearray2[1]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray2[1]['image_name']) ?>" type="audio/mp3"">
                                                <source src="movie.ogg" type="audio/mp3">
                                                Your browser does not support the audio tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                    <?php if ($singlearray2[2]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray2[2]['image_name']) ?> type="audio/mp3"">
                                                        <source src="movie.ogg" type="audio/mp3">
                                                Your browser does not support the audio tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>

                                    <?php if ($singlearray2[3]['image_name']) { ?>
                                        <td class="image_profile"> 
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray2[3]['image_name']) ?>" type="video/mp4">
                                                <source src="movie.ogg" type="audio/mp3">
                                                Your browser does not support the audio tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                    <?php if ($singlearray2[4]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray2[4]['image_name']) ?>" type="audio/mp3"">
                                                <source src="movie.ogg" type="audio/mp3">
                                                Your browser does not support the audio tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                    <?php if ($singlearray2[5]['image_name']) { ?>
                                        <td class="image_profile">
                                            <video  controls>
                                                <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $singlearray2[5]['image_name']) ?>" type="audio/mp3"">
                                                <source src="movie.ogg" type="audio/mp3">
                                                Your browser does not support the audio tag.
                                            </video>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } else { ?>
                                <div class="not_available">  <p>  Audio Not Available</p> </div>
                            <?php } ?>
                        </table>

                    </div>
                </div>
                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module pdf_box">
                        <table class="business_data_table">
                            <div class="head_details">
                                <a href="<?php echo base_url('artistic/art_pdf/' . $artisticdata[0]['user_id']) ?>"> <h5><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  PDF</h5></a>
                            </div>
                            <?php
                            $contition_array = array('user_id' => $artisticdata[0]['user_id']);
                            $artimage = $this->data['artimage'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');


                            foreach ($artimage as $val) {



                                $contition_array = array('post_id' => $val['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                                $artmultipdf = $this->data['artmultipdf'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                $multiplepdf[] = $artmultipdf;
                            }
                            ?>
                            <?php
                            $allowespdf = array('pdf');

                            foreach ($multiplepdf as $mke => $mval) {

                                foreach ($mval as $mke1 => $mval1) {
                                    $ext = pathinfo($mval1['image_name'], PATHINFO_EXTENSION);

                                    if (in_array($ext, $allowespdf)) {
                                        $singlearray3[] = $mval1;
                                    }
                                }
                            }
                            ?>

                            <?php if ($singlearray3) { ?>


                                <?php
                                $i = 0;
                                foreach ($singlearray3 as $mi) {
                                    ?>


                                    <div class="image_profile">


                                        <a href="<?php echo base_url('artistic/creat_pdf/' . $singlearray3[0]['image_id']) ?>"><div class="pdf_img">
                                                <img src="<?php echo base_url('images/PDF.jpg') ?>" style="height: 100%; width: 100%;">
                                            </div></a>
                                    </div>

                                    <?php
                                    $i++;
                                    if ($i == 6)
                                        break;
                                }
                                ?>

                            <?php }else { ?>
                                <div class="not_available">  <p>    Pdf Not Available</p>
                                </div>
                            <?php } ?>
                        </table>

                    </div>
                </div>

            </div>

            <!-- popup start -->
            <div class="col-md-7 col-sm-7 "  >

                <div class="post-editor col-md-12">
                    <div class="main-text-area col-md-12" style="padding-left: 1px;">
                 <div class="popup-img col-md-1"> <img  src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image']); ?>"  alt="" style="
                                                      margin-top: 6px;">
                        </div>
                        <div id="myBtn3"  class="editor-content col-md-11 popup-text">
                            <span> Post Your Art....</span> 
                        
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- The Modal -->
            <div id="myModal3" class="modal-post">

                <!-- Modal content -->
                <div class="modal-content-post">
                    <span class="close3">&times;</span>

                    <div class="post-editor col-md-12">

                        <?php echo form_open_multipart(base_url('artistic/art_post_insert/' . 'manage/' . $artisticdata[0]['user_id']), array('id' => 'artpostform', 'name' => 'artpostform', 'class' => 'clearfix', 'onsubmit' => "return imgval();")); ?>

                        <div class="main-text-area col-md-12" >
                            <div class="popup-img-in col-md-1"> <img  src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image']); ?>"  alt="">
                            </div>
                            <div id="myBtn3"  class="editor-content col-md-10 popup-text" >
                                   <!-- <textarea name="product_title" placeholder="Post Your Product...."></textarea>  -->
                                <textarea id= "test-upload-product" placeholder="Post Your Art...."  onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); onblur=check_length(this.form);
                                          name=my_text rows=4 cols=30 class="post_product_name"></textarea>
                                <div style="position: absolute; top: 21px; right: 19px; border: none;">                        
                                    <input size=1 class="text_num" value=50 name=text_num readonly> 
                                </div>

                            </div>
                        
                            <div class="col-md-1" style="padding-left: 0px;"><i class=" fa fa-camera "  style="margin: 0px;
                                                                                font-size: 27px; cursor: pointer; /* margin-right: -38px; */ margin-top: 25px;"></i> </div>

                        </div>
                        <div class="row"></div>
                        <div  id="text"  class="editor-content col-md-12 popup-textarea" >
                            <textarea id="test-upload-des" name="product_desc" class="description" placeholder="Enter Description"></textarea>

                            <output id="list"></output>
                        </div>
                      
                      
                      

                        <div class="popup-social-icon">
                            <ul class="editor-header">

                                <li>
                               
 <div class="col-md-12"> <div class="form-group">
   <input id="file-1" type="file" class="file" name="postattach[]"  multiple class="file" data-overwrite-initial="false" data-min-file-count="2" style="display: none;">
   </div></div>


     <label for="file-1"><i class=" fa fa-camera "  style=" margin: 8px; cursor:pointer"> Photo</i><i class=" fa fa-video-camera"  style=" margin: 8px; cursor:pointer"> Video </i> <i class="fa fa-music "  style=" margin: 8px; cursor:pointer"> Audio </i><i class=" fa fa-file-pdf-o "  style=" margin: 8px; cursor:pointer"> PDF </i> </label>


                                </li>
                            </ul>


                        </div>
                        <div class="fr">
                            <button type="submit"  value="Submit" style="margin: 0px;">Post</button>    </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- popup end -->
            <div class="col-md-7">

                <div class="job-contact-frnd ">

                    <?php
//echo "<pre>"; print_r($artsdata); die();
                    if(count($artsdata)>0){
                    foreach ($artsdata as $row) {

                        $userid = $this->session->userdata('aileenuser');

                        $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1');
                        $artdelete = $this->data['artdelete'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                        $likeuserarray = explode(',', $artdelete[0]['delete_post']);

                        if (!in_array($userid, $likeuserarray)) {
                            ?>
                            <div id="<?php echo "removepost" . $row['art_post_id']; ?>">
                            <div class="profile-job-post-detail clearfix">
                                <div class=" post-design-box">


                                    <div class="post-design-top col-md-12" >  
                                        <div class="post-design-pro-img col-md-2"> 

                                            <?php
                                            $userimage = $this->db->get_where('art_reg', array('user_id' => $row['user_id']))->row()->art_user_image;
                                            $userimageposted = $this->db->get_where('art_reg', array('user_id' => $row['posted_user_id']))->row()->art_user_image;
                                            ?>

                                            <?php if ($row['posted_user_id']) { ?>
                                            <a  class="post_dot" title="<?php echo ucwords($firstnameposted) . ' ' . ucwords($lastnameposted); ?>" href="<?php echo base_url('artistic/art_manage_post/' . $row['posted_user_id']); ?>">
                                                <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $userimageposted); ?>" name="image_src" id="image_src" /> </a>

                                                 <?php } else { ?>
                                                 <a class="post_dot"  href="<?php echo base_url('artistic/art_manage_post/' . $row['user_id']); ?>">
                                                     <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $userimage); ?>" name="image_src" id="image_src" /> </a>

                                                 <?php } ?>
                                        </div>


                                        <div class="post-design-name fl col-md-9">
                                            <ul>
                                                <li><span>
                                                        <?php
                                                        $firstname = $this->db->get_where('art_reg', array('user_id' => $row['user_id']))->row()->art_name;
                                                        $lastname = $this->db->get_where('art_reg', array('user_id' => $row['user_id']))->row()->art_lastname;

                                                        $firstnameposted = $this->db->get_where('art_reg', array('user_id' => $row['posted_user_id']))->row()->art_name;
                                                        $lastnameposted = $this->db->get_where('art_reg', array('user_id' => $row['posted_user_id']))->row()->art_lastname;
                                                        ?>
                                                    </span>

                                                    <!-- other user post time name strat-->

                                                    <?php if ($row['posted_user_id']) { ?>

                                                        <div class="else_post_d">
                                                            <a  class="post_dot" style="max-width: 30%;" title="<?php echo ucwords($firstnameposted) . ' ' . ucwords($lastnameposted); ?>" href="<?php echo base_url('artistic/art_manage_post/' . $row['posted_user_id']); ?>"><?php echo ucwords($firstnameposted) . ' ' . ucwords($lastnameposted); ?> </a><span style="font-weight: 600; color: #91949d;"> Posted With 
                                                            </span><a class="post_dot1"  href="<?php echo base_url('artistic/art_manage_post/' . $row['user_id']); ?>"><?php echo ucwords($firstname) . ' ' . ucwords($lastname); ?></a><span role="presentation" aria-hidden="true" style="color: #91949d; font-size: 14px;"> · </span>
                                                            <span style="color: #91949d; font-size: 14px;"> <?php echo date('d-M-Y', strtotime($row['created_date'])); ?></span>
                                                        </div>

                                                        <!-- other user post time name end-->
                                                    <?php } else { ?>

                                                        <a  class="post_dot" title="<?php echo ucwords($firstname) . ' ' . ucwords($lastname); ?>"   href="<?php echo base_url('artistic/art_manage_post/' . $row['user_id']); ?>">
                                                            <?php echo ucwords($firstname) . ' ' . ucwords($lastname); ?>

                                                        </a>
                                                        <div class="datespan">
                                                            <span style="font-weight: 400; font-size: 14px; color: #91949d;"> <?php echo date('d-M-Y', strtotime($row['created_date'])); ?></span></div>

                                                    <?php } ?>                          
                                                </li>
                                               
                                            </ul> 
                                        </div>  
<div class="dropdown2">
         <a onClick="myFunction(<?php echo $row['art_post_id']; ?>)" class="dropbtn2 dropbtn2 fa fa-ellipsis-v"></a>
    <div id="<?php echo "myDropdown" . $row['art_post_id']; ?>" class="dropdown-content2">

       <?php if($row['posted_user_id'] != 0){

                  if($this->session->userdata('aileenuser') == $row['posted_user_id']){
                    ?>
             <a id="<?php echo $row['art_post_id']; ?>" onClick="deleteownpostmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete Post</a>

                 <a id="<?php echo $row['art_post_id']; ?>" onClick="editpost(this.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

            <?php }else{
                ?>
           
           <a id="<?php echo $row['art_post_id']; ?>" onClick="deleteownpostmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete Post</a>

              <a href="<?php echo base_url('artistic/artistic_contactperson/' . $row['user_id'] . ''); ?>"><i class="fa fa-user" aria-hidden="true"></i> Contact Person</a>

            <?php } }else{?>  


         <?php
            $userid = $this->session->userdata('aileenuser');
              if ($row['user_id'] == $userid) {
            ?>

                <a id="<?php echo $row['art_post_id']; ?>" onClick="deleteownpostmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete Post</a>
                 <a id="<?php echo $row['art_post_id']; ?>" onClick="editpost(this.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                <?php } else { ?>
                 <a href="<?php echo "#popup5" . $row['art_post_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Post</a>

               


              <a href="<?php echo base_url('artistic/artistic_contactperson/' . $row['user_id'] . ''); ?>"><i class="fa fa-user" aria-hidden="true"></i> Contact Person</a>
                    <?php } }?>

        </div>
 </div>

                                        <div class="post-design-desc ">
                                            <span> 
                                                <div id="<?php echo 'editpostdata' . $row['art_post_id']; ?>" style="display:block;">
                                                    <a><?php echo $this->common->make_links($row['art_post']); ?></a>
                                                </div>

                                                <div id="<?php echo 'editpostbox' . $row['art_post_id']; ?>" style="display:none; margin-bottom: 10px;">
                                                    <input type="text" id="<?php echo 'editpostname' . $row['art_post_id']; ?>" name="editpostname" placeholder="Art name" value="<?php echo $row['art_post']; ?>">
                                                </div>
                                                <div  id="<?php echo 'editpostdetails' . $row['art_post_id']; ?>" style="display:block;">

                                                    <?php
                                                    $text = $this->common->make_links($row['art_description']);
                                                    ?>
                                                    <span class="show"><?php echo $text; ?></span>
                                                </div>

                                                <div id="<?php echo 'editpostdetailbox' . $row['art_post_id']; ?>" style="display:none;">

                                                    <div contenteditable="true" class="editable_text"  id="<?php echo 'editpostdesc' . $row['art_post_id']; ?>" placeholder="Art Description" name="editpostdesc"><?php echo $row['art_description']; ?>
                                                    </div> 
                                                </div>

                                                <button class="fr" id="<?php echo "editpostsubmit" . $row['art_post_id']; ?>" style="display:none;margin: 5px 0px;" onClick="edit_postinsert(<?php echo $row['art_post_id']; ?>)">Save</button>


                                            </span></div>
                                    </div>


                                    <div class="post-design-mid col-md-12" >  

                                        <!-- multiple image code  start-->

                                        <div class="mange_post_image">
                                            <?php
                                            $contition_array = array('post_id' => $row['art_post_id'], 'is_deleted' => '1', 'image_type' => '1');
                                            $artmultiimage = $this->data['artmultiimage'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                            ?>

                                            <?php if (count($artmultiimage) == 1) { ?>

                                                <?php
                                                $allowed = array('gif', 'png', 'jpg');
                                                $allowespdf = array('pdf');
                                                $allowesvideo = array('mp4', 'webm');
                                                $allowesaudio = array('mp3');
                                                $filename = $artmultiimage[0]['image_name'];
                                                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                                                if (in_array($ext, $allowed)) {
                                                    ?>

                                                    <!-- one image start -->
                                                    <div id="basic-responsive-image" style="height: 80%; width: 100%;">
                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img src="<?php echo base_url(ARTPOSTIMAGE . $artmultiimage[0]['image_name']) ?>" style="width: 100%; height: 100%;"> </a>
                                                    </div>
                                                    <!-- one image end -->

                                                <?php } elseif (in_array($ext, $allowespdf)) { ?>

                                                    <!-- one pdf start -->
                                                    <div>
                                                        <a href="<?php echo base_url('artistic/creat_pdf/' . $artmultiimage[0]['image_id']) ?>"><div class="pdf_img">
                                                                <img src="<?php echo base_url('images/PDF.jpg') ?>" style="height: 100%; width: 100%;">
                                                            </div></a>
                                                    </div>
                                                    <!-- one pdf end -->

                                                <?php } elseif (in_array($ext, $allowesvideo)) { ?>

                                                    <!-- one video start -->
                                                    <div class="video_post">
                                                        <video width="100%" class="video" height="55%" controls>


                                                            <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $artmultiimage[0]['image_name']) ?>" type="video/mp4">
                                                            <source src="movie.ogg" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                    <!-- one video end -->

                                                <?php } elseif (in_array($ext, $allowesaudio)) { ?>

                                                    <!-- one audio start -->
                                                    <div>
                                                       <div class="audio_main_div">
                                                                <div class="audio_img">
                                                                  <img src="<?php echo base_url('images/music-icon.png')?> ">  
                                                                </div>
                                                                <div class="audio_source">
                                                            <audio  controls>

                                                            <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $artmultiimage[0]['image_name']); ?>" type="audio/mp3">
                                                            <source src="movie.ogg" type="audio/ogg">
                                                            Your browser does not support the audio tag.
</audio>
</div>
                                                                <div class="audio_mp3">
                                                                   <p title="hellow this is mp3">This text will scroll from right to left</p>
                                                                </div>
                                                               </div> 
                                                    <!-- one audio end -->

                                                <?php } ?>

                                            <?php } elseif (count($artmultiimage) == 2) { ?>

                                                <?php
                                                foreach ($artmultiimage as $multiimage) {
                                                    ?>

                                                    <!-- two image start -->
                                                    <div  id="two_manage_images_art" >
                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="two-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $multiimage['image_name']) ?>" > </a>
                                                    </div>

                                                    <!-- two image end -->
                                                <?php } ?>

                                            <?php } elseif (count($artmultiimage) == 3) { ?>



                                                <!-- three image start -->
                                                <div id="three_images_art" >
                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[0]['image_name']) ?>" style="width: 100%; height:100%; "> </a>
                                                </div>
                                                <div  id="three_images_2_art">
                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[1]['image_name']) ?>" style="width: 100%; height:100%; "> </a>
                                                </div>

                                                <div  id="three_images_2_art">
                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[2]['image_name']) ?>" style="width: 100%; height:100%; "> </a>
                                                </div>

                                                <!-- three image end -->


                                            <?php } elseif (count($artmultiimage) == 4) { ?>


                                                <?php
                                                foreach ($artmultiimage as $multiimage) {
                                                    ?>

                                                    <!-- four image start -->
                                                    <div id="responsive_manage-images-breakpoints">
                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img class="breakpoint" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $multiimage['image_name']) ?>" style="width: 100%; height: 100%;"> </a>

                                                    </div>

                                                    <!-- four image end -->

                                                <?php } ?>


                                            <?php } elseif (count($artmultiimage) > 4) { ?>



                                                <?php
                                                $i = 0;
                                                foreach ($artmultiimage as $multiimage) {
                                                    ?>

                                                    <!-- five image start -->
                                                    <div>
                                                        <div id="responsive-manage_images_2-breakpoints">
                                                            <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $multiimage['image_name']) ?>" style=""> </a>
                                                        </div>
                                                    </div>

                                                    <!-- five image end -->

                                                    <?php
                                                    $i++;
                                                    if ($i == 3)
                                                        break;
                                                }
                                                ?>
                                                <!-- this div view all image start -->
                                                <div>
                                                    <div id="responsive-manage_images_3-breakpoints" >
                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>"><img src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[3]['image_name']) ?>" > </a></div>


                                                    <div class="manage_images_view_more" >


                                                        <a href="<?php echo base_url('artistic/postnewpage/' . $row['art_post_id']) ?>" >View All (+<?php echo (count($artmultiimage) - 4); ?>)</a>
                                                    </div>

                                                </div>
                                                <!-- this div view all image end -->


                                            <?php } ?>
                                            <div>


                                            </div>

                                        </div>     
                                    </div>
                                    </div>
                                    <!-- multiple image code end -->
                                    <!-- khyati 18-4 start-->


                                    <div class="post-design-like-box col-md-12">
                                        <div class="post-design-menu">
                                            <!-- like comment div start -->
                                            <ul>
                                                <li class="<?php echo 'likepost' . $row['art_post_id']; ?>">
                                                    <a id="<?php echo $row['art_post_id']; ?>" onClick="post_like(this.id)">

                                                        <?php
                                                        $userid = $this->session->userdata('aileenuser');
                                                        $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1');
                                                        $artlike = $this->data['artlike'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                        $likeuserarray = explode(',', $artlike[0]['art_like_user']);

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
                                                            if ($row['art_likes_count'] > 0) {
                                                                echo $row['art_likes_count'];
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
                                                            <?php
                                                            if (count($commnetcount) > 0) {
                                                                echo count($commnetcount);
                                                            }
                                                            ?>
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
                                            }
                                            ?>
                                            <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $row['art_post_id']; ?>);">
                                                <?php
                                                $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' => '0');
                                                $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                $likeuser = $commnetcount[0]['art_like_user'];
                                                $countlike = $commnetcount[0]['art_likes_count'] - 1;
                                                $likelistarray = explode(',', $likeuser);
                                                $likelistarray = array_reverse($likelistarray);
                                                $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                                                $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                                                ?>
                                                <div class="like_one_other">
                                                    <?php
                                                    if($userid == $likelistarray[0]){
                                                        echo "You";
                                                    }else{
                                                    echo ucwords($art_fname);
                                                    echo "&nbsp; ";
                                                    echo ucwords($art_lname);
                                                    echo "&nbsp;";
                                                  }
                                                    ?>
                                                       <?php
                                                    if (count($likelistarray) > 1) {
                                                        ?>
                                                        <?php echo "and"; ?>
                                                        <?php
                                                        echo $countlike;
                                                        echo "&nbsp;";
                                                        echo "others";
                                                        ?> 
                                                    <?php } ?>
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
                                        }
                                        ?>
                                        <a href="javascript:void(0);"  onclick="likeuserlist(<?php echo $row['art_post_id']; ?>);">
                                            <?php
                                            $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1', 'is_delete' => '0');
                                            $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                            $likeuser = $commnetcount[0]['art_like_user'];
                                            $countlike = $commnetcount[0]['art_likes_count'] - 1;
                                            $likelistarray = explode(',', $likeuser);
                                            $likelistarray = array_reverse($likelistarray);
                                            $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                                            $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                                            ?>
                                            <div class="like_one_other">
                                                <?php
                                                echo ucwords($art_fname);
                                                echo "&nbsp; ";
                                                echo ucwords($art_lname);
                                                echo "&nbsp;";
                                                ?>
                                                <?php
                                                if (count($likelistarray) > 1) {
                                                    ?>
                                                    <?php echo "and"; ?>
                                                    <?php
                                                    echo $countlike;
                                                    echo "&nbsp;";
                                                    echo "others";
                                                    ?> 
                                                <?php } ?>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- like user list end -->

                                    <!-- <?php } ?>  -->
                                <?php
                                $contition_array = array('art_post_id' => $row['art_post_id'], 'status' => '1');
                                $artdatacondition = $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                if ($artdatacondition) {
                                    ?>
                                    <div class="art-all-comment col-md-12">
                                        <div id="<?php echo "fourcomment" . $row['art_post_id']; ?>" style="display:none">
                                        </div>
                                        <!-- 3 comment start -->
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
                                                                <?php $art_userimage = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->art_user_image; ?>
                                                                <?php if ($art_userimage) { ?>
                                                                <a href="<?php echo base_url('artistic/art_manage_post/' . $rowdata['user_id'] . ''); ?>">
                                                                    <img  src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $art_userimage); ?>"  alt="">
                                                                    </a>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                     <a href="<?php echo base_url('artistic/art_manage_post/' . $rowdata['user_id'] . ''); ?>">
                                                                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
                                                                    </a>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="comment-name">
                                                                <b><?php
                                                                    echo ucwords($artname);
                                                                    echo "&nbsp;";
                                                                    echo ucwords($artlastname);
                                                                    ?></b><?php echo '</br>'; ?>
                                                            </div>

                                                            <div class="comment-details" id= "<?php echo "showcomment" . $rowdata['artistic_post_comment_id']; ?>">
                                                                <?php
                                                                echo $this->common->make_links($rowdata['comments']);
//                                                                echo '</br>';
                                                                ?>
                                                            </div>
                                                           
                                                            <div class="edit-comment-box">
                                                                <div class="inputtype-edit-comment">
                                                                 
                                                                    <div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 81%;" class="editable_text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>"  id="<?php echo "editcomment" . $rowdata['artistic_post_comment_id']; ?>" placeholder="Add a Comment ..." value= ""  onkeyup="commentedit(<?php echo $rowdata['artistic_post_comment_id']; ?>)"><?php echo $rowdata['comments']; ?></div>
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
                                                                        echo $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($rowdata['created_date'])));
                                                                        echo '</br>';
                                                                        ?>
                                                                    </p></div></div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </div> </div>
                                        <!-- khyati changes end -->
                                        <!-- all comments code end -->

                                    </div>
                                <?php } else { ?>

                                    <div id="<?php echo "fourcomment" . $row['art_post_id']; ?>" style="display:none">
                                    </div>

                                    <div  id="<?php echo "threecomment" . $row['art_post_id']; ?>" style="display:block">

                                        <div class="<?php echo 'insertcomment' . $row['art_post_id']; ?>">
                                        </div>
                                    </div>
                                <?php } ?>
                                <!--</div>-->
                                <div class="post-design-commnet-box col-md-12">
                                    <div class="post-design-proo-img">
                                        <?php
                                        $userid = $this->session->userdata('aileenuser');
                                        $art_userimage = $this->db->get_where('art_reg', array('user_id' => $userid, 'status' => 1))->row()->art_user_image;
                                        ?>
                                        <?php
                                        if ($art_userimage) {
                                            ?>
                                            <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $art_userimage); ?>" name="image_src" id="image_src" />
                                            <?php
                                        } else {
                                            ?>
                                            <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="">
                                        <div id="content" class="col-md-12 inputtype-comment" style="width: 80%; padding-left: 7px;">
                                            <div contenteditable="true" class="editable_text" type="text" name="<?php echo $row['art_post_id']; ?>"  id="<?php echo "post_comment" . $row['art_post_id']; ?>" placeholder="Add a Comment ..." value= "" onClick="entercomment(<?php echo $row['art_post_id']; ?>)"></div>
                                        </div>    
                                        <?php echo form_error('post_comment'); ?>

                                        <div class="comment-edit-butn">   
                                            <button style="position: absolute; bottom: 12px;" id="<?php echo $row['art_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button> </div>
                                    </div>

                                </div>
                                <!-- khyati 18-4 end-->
                            </div>
                        </div>
                      
                        <?php
                    }}else {
                    ?>

                                <div class="text-center rio">
                                    <h4 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">No Post Found.</h4>
                                </div>

                    <?php }?>
                </div>

            </div>

        </div>
    </div>     
</section>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- footer start -->
<footer>

    <?php echo $footer; ?>
</footer>
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
 <div class="popup_previred">
                        <img id="preview" src="#" alt="your image" />
                       </div>
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
               
                <span class="mes"></span>
            </div>
        </div>
    </div>
</div>
<!-- Model Popup Close -->
<!-- Bid-modal-2  -->
<div class="modal fade message-box" id="likeusermodal" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
            <div class="modal-body">
                <span class="mes">
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Model Popup Close -->
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>

 <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
 
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>


<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>





<script>
jQuery.noConflict();
 
(function( $ ) {

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
                                              })( jQuery  );

</script>

<!-- script for skill textbox automatic end (option 2)-->


<script type="text/javascript">
                            function divClicked() {
                                var divHtml = $(this).html();
                                var editableText = $("<textarea />");
                                editableText.val(divHtml);
                                $(this).replaceWith(editableText);
                                editableText.focus();
                                // setup the blur event for this new textarea
                                editableText.blur(editableTextBlurred);
                            }

                            function editableTextBlurred() {
                                var html = $(this).val();
                                var viewableText = $("<a>");
                                 if(html == ''){
                         html = "Current Work";
                            }
                                viewableText.html(html);
                                $(this).replaceWith(viewableText);
                                // setup the click event for this new div
                                viewableText.click(divClicked);

                                $.ajax({
                                    url: "<?php echo base_url(); ?>artistic/art_designation",
                                    type: "POST",
                                    data: {"designation": html},
                                    success: function (response) {

                                    }
                                });
                            }

                            $(document).ready(function () {
                            // alert("hi");
                                $("a.designation").click(divClicked);
                            });
                        </script>

<!-- designation script end -->




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

            url: "<?php echo base_url(); ?>artistic/keyskill",
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
    //select2 autocomplete End for skill

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



<!-- popup form edit start -->
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close1")[0];

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

<!-- popup form edit END -->

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
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

<script type="text/javascript">

    //validation for edit email formate form

    $(document).ready(function () {

        $("#artdesignation").validate({

            rules: {

                designation: {

                    required: true,

                },

            },

            messages: {

                designation: {

                    required: "Designation Is Required.",

                },

            },

        });
    });
</script>


<!-- post like script start -->

<script type="text/javascript">
    function post_like(clicked_id)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/like_post" ?>',
            dataType: 'json',
            data: 'post_id=' + clicked_id,
            success: function (data) {
                $('.' + 'likepost' + clicked_id).html(data.like);
                $('.likeusername' + clicked_id).html(data.likeuser);

                $('.likeduserlist' + clicked_id).hide();
                if (data.like_user_count == '0') {
                    document.getElementById('likeusername' + clicked_id).style.display = "none";
                } else {
                    document.getElementById('likeusername' + clicked_id).style.display = "block";
                }
                $('#likeusername' + clicked_id).addClass('likeduserlist1');
            }
        });
    }
</script>

<!--post like script end -->

<!-- comment like script start -->

<script type="text/javascript">
//    function comment_like(clicked_id)
//    {
//
//        $.ajax({
//            type: 'POST',
//            url: '<?php echo base_url() . "artistic/like_comment" ?>',
//            data: 'post_id=' + clicked_id,
//            success: function (data) {
//                $('#' + 'likecomment' + clicked_id).html(data);
//
//            }
//        });
//    }
    function comment_like(clicked_id)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/like_comment" ?>',
            data: 'post_id=' + clicked_id,
            success: function (data) {
                $('#' + 'likecomment' + clicked_id).html(data);

            }
        });
    }
</script>

<script type="text/javascript">
//    function comment_like1(clicked_id)
//    {
//
//        $.ajax({
//            type: 'POST',
//            url: '<?php echo base_url() . "artistic/like_comment1" ?>',
//            data: 'post_id=' + clicked_id,
//            success: function (data) {
//                $('#' + 'likecomment1' + clicked_id).html(data);
//
//            }
//        });
//    }

    function comment_like1(clicked_id)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/like_comment1" ?>',
            data: 'post_id=' + clicked_id,
            success: function (data) {
                $('#' + 'likecomment1' + clicked_id).html(data);

            }
        });
    }
</script>
<!--comment like script end -->

<!-- comment delete script start -->


<!--
<script type="text/javascript">

    function comment_deletemodel(abc) {


        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to Delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

</script>

<script type="text/javascript">

    function comment_deletetwomodel(abc) {


        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to Delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

</script>-->

<script type="text/javascript">

    function comment_delete(clicked_id) {
        $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deleted(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

    function comment_deleted(clicked_id)
    {
        var post_delete = document.getElementById("post_delete");
        //alert(post_delete.value);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/delete_comment" ?>',
            data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
            dataType: "json",
            success: function (data) {
                //alert('.' + 'insertcomment' + clicked_id);
              //  alert(data.comment);
                $('.' + 'insertcomment' + post_delete.value).html(data.comment);
                $('#' + 'insertcount' + post_delete.value).html(data.count);
                $('.post-design-commnet-box').show();
            }
        });
    }

    function comment_deletetwo(clicked_id)
    {
        $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='comment_deletedtwo(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

</script>

<script type="text/javascript">
    function comment_deletedtwo(clicked_id)
    {
        var post_delete1 = document.getElementById("post_deletetwo");
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/delete_commenttwo" ?>',
            data: 'post_id=' + clicked_id + '&post_delete=' + post_delete1.value,
            dataType: "json",
            success: function (data) {

                // $('.' + 'insertcomment' + post_delete.value).html(data);
                $('.' + 'insertcommenttwo' + post_delete1.value).html(data.comment);
                $('#' + 'insertcount' + post_delete1.value).html(data.count);
                $('.post-design-commnet-box').show();

            }
        });
    }


//                        function comment_deletetwo(clicked_id)
//                        {
//
//                            var post_delete = document.getElementById("post_delete2");
//
//                            $.ajax({
//                                type: 'POST',
//                                url: '<?php echo base_url() . "artistic/delete_commenttwo" ?>',
//                                data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
//                                success: function (data) {
//
//                                    $('#' + 'fourcomment' + post_delete.value).html(data);
//
//                                }
//                            });
//                        }
</script>


<script type="text/javascript">
//    function comment_delete(clicked_id)
//    {
//
//        var post_delete = document.getElementById("post_delete");
//        // alert(post_delete);
//        $.ajax({
//            type: 'POST',
//            url: '<?php echo base_url() . "artistic/delete_comment" ?>',
//            data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
//            dataType: "json",
//            success: function (data) {
//
//                // $('.' + 'insertcomment' + post_delete.value).html(data);
//                $('#' + 'commnetpost' + post_delete.value).html(data.count);
//                $('.insertcomment' + post_delete.value).html(data.comment);
//
//            }
//        });
//    }


//    function comment_deletetwo(clicked_id)
//    {
//
//        var post_delete = document.getElementById("post_delete2");
//
//        $.ajax({
//            type: 'POST',
//            url: '<?php echo base_url() . "artistic/delete_commenttwo" ?>',
//            data: 'post_id=' + clicked_id + '&post_delete=' + post_delete.value,
//            success: function (data) {
//
//                $('#' + 'fourcomment' + post_delete.value).html(data);
//
//            }
//        });
//    }
</script>

<!--comment delete script end -->


<!-- insert comment using enter -->
<script type="text/javascript">

//    function insert_comment(clicked_id)
//    {
//
//        var post_comment = document.getElementById("post_comment" + clicked_id);
//
//
//        var x = document.getElementById('threecomment' + clicked_id);
//        var y = document.getElementById('fourcomment' + clicked_id);
//
//
//        if (post_comment.value == '') {
//
//            event.preventDefault();
//            return false;
//        } else {
//
//
//            if (x.style.display === 'block' && y.style.display === 'none') {
//
//                $.ajax({
//                    type: 'POST',
//                    url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
//                    data: 'post_id=' + clicked_id + '&comment=' + post_comment.value,
//                    dataType: "json",
//                    success: function (data) {
//                        $('textarea').each(function () {
//                            $(this).val('');
//                        });
//                        //$('.' + 'insertcomment' + clicked_id).html(data);
//                        $('#' + 'commnetpost' + clicked_id).html(data.count);
//                        $('.insertcomment' + clicked_id).html(data.comment);
//                    }
//                });
//            } else {
//
//                $.ajax({
//                    type: 'POST',
//                    url: '<?php echo base_url() . "artistic/insert_comment" ?>',
//                    data: 'post_id=' + clicked_id + '&comment=' + post_comment.value,
//                    // dataType: "json",
//                    success: function (data) {
//                        $('textarea').each(function () {
//                            $(this).val('');
//                        });
//                        $('#' + 'fourcomment' + clicked_id).html(data);
//                    }
//                });
//            }
//        }
//
//    }

    function insert_comment(clicked_id)
    {
        // start khyati code
        var $field = $('#post_comment' + clicked_id);
        var post_comment = $('#post_comment' + clicked_id).html();
         
        // var post_comment = post_comment.html();
                    post_comment = post_comment.replace(/&nbsp;/gi, " ");
                    post_comment = post_comment.replace(/<br>$/, '');
                    if (post_comment == '' || post_comment == '<br>') {
                        return false;
                    }
                    if (/^\s+$/gi.test(post_comment))
                    {
                        return false;
                    }
                    
        $('#post_comment' + clicked_id).html("");

        var x = document.getElementById('threecomment' + clicked_id);
        var y = document.getElementById('fourcomment' + clicked_id);

        if (post_comment == '') {
            event.preventDefault();
            return false;
        } else {
            if (x.style.display === 'block' && y.style.display === 'none') {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
                    data: 'post_id=' + clicked_id + '&comment=' + post_comment,
                    dataType: "json",
                    success: function (data) {
                        //$('.' + 'insertcomment' + clicked_id).html(data);
                        $('#' + 'insertcount' + clicked_id).html(data.count);
                        $('.insertcomment' + clicked_id).html(data.comment);
                    }
                });

            } else {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "artistic/insert_comment" ?>',
                    data: 'post_id=' + clicked_id + '&comment=' + post_comment,
                    dataType: "json",
                    success: function (data) {
                        $('textarea').each(function () {
                            $(this).val('');
                        });
                        $('#' + 'insertcount' + clicked_id).html(data.count);
                        $('#' + 'fourcomment' + clicked_id).html(data.comment);
                    }
                });

            }
        }

    }

</script>



<script type="text/javascript">

//    function entercomment(clicked_id)
//    {
//         $('#post_comment' + clicked_id).keypress(function (e) {
//
//
//            if (e.keyCode == 13 && !e.shiftKey) {
//                var val = $('#post_comment' + clicked_id).val();
//                e.preventDefault();
//                if (window.preventDuplicateKeyPresses)
//                    return;
//                window.preventDuplicateKeyPresses = true;
//                window.setTimeout(function () {
//                    window.preventDuplicateKeyPresses = false;
//                }, 500);
//               
//                var x = document.getElementById('threecomment' + clicked_id);
//                var y = document.getElementById('fourcomment' + clicked_id);
//
//
//                if (val == '') {
//
//                    event.preventDefault();
//                    return false;
//                } else {
//                    if (x.style.display === 'block' && y.style.display === 'none') {
//                        $.ajax({
//                            type: 'POST',
//                            url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
//                            data: 'post_id=' + clicked_id + '&comment=' + val,
//                            dataType: "json",
//                            success: function (data) {
//                                $('textarea').each(function () {
//                                    $(this).val('');
//                                });
//                                $('#' + 'commnetpost' + clicked_id).html(data.count);
//                                $('.insertcomment' + clicked_id).html(data.comment);
//                            }
//                        });
//                    } else {
//
//                        $.ajax({
//                            type: 'POST',
//                            url: '<?php echo base_url() . "artistic/insert_comment" ?>',
//                            data: 'post_id=' + clicked_id + '&comment=' + val,
//                            success: function (data) {
//                                $('textarea').each(function () {
//                                    $(this).val('');
//                                });
//                                $('#' + 'fourcomment' + clicked_id).html(data);
//                       
//                            }
//                        });
//                    }
//                }
//                e.preventDefault();
//            }
//        });
//    }


    function entercomment(clicked_id)
    {
        $("#post_comment" + clicked_id).click(function () {
            $(this).prop("contentEditable", true);
        });

        $('#post_comment' + clicked_id).keypress(function (e) {

            if (e.keyCode == 13 && !e.shiftKey) {
                e.preventDefault();
                var sel = $("#post_comment" + clicked_id);
               
                var txt = sel.html();
                
                  txt = txt.replace(/&nbsp;/gi, " ");
                    txt = txt.replace(/<br>$/, '');
                    if (txt == '' || txt == '<br>') {
                        return false;
                    }
                    if (/^\s+$/gi.test(txt))
                    {
                        return false;
                    }
                    
//                if (txt == '') {
//                    return false;
//                }

                $('#post_comment' + clicked_id).html("");

                if (window.preventDuplicateKeyPresses)
                    return;

                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);

                var x = document.getElementById('threecomment' + clicked_id);
                var y = document.getElementById('fourcomment' + clicked_id);

                if (x.style.display === 'block' && y.style.display === 'none') {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "artistic/insert_commentthree" ?>',
                        data: 'post_id=' + clicked_id + '&comment=' + txt,
                        dataType: "json",
                        success: function (data) {
                            $('textarea').each(function () {
                                $(this).val('');
                            });
                            $('#' + 'insertcount' + clicked_id).html(data.count);
                            $('.insertcomment' + clicked_id).html(data.comment);
                        }
                    });
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url() . "artistic/insert_comment" ?>',
                        data: 'post_id=' + clicked_id + '&comment=' + txt,
                        dataType: "json",
                        success: function (data) {
                            $('textarea').each(function () {
                                $(this).val('');
                            });
                            $('#' + 'insertcount' + clicked_id).html(data.count);
                            $('#' + 'fourcomment' + clicked_id).html(data.comment);
                        }
                    });
                }
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }

</script>

<!--comment insert script end -->
<!-- comment edit script start -->

<!-- comment edit box start-->
<script type="text/javascript">

//    function comment_editbox(clicked_id) {
//        document.getElementById('editcomment' + clicked_id).style.display = 'block';
//        document.getElementById('showcomment' + clicked_id).style.display = 'none';
//        document.getElementById('editsubmit' + clicked_id).style.display = 'block';
//        document.getElementById('editbox' + clicked_id).style.display = 'none';
//        document.getElementById('editcancle' + clicked_id).style.display = 'block';
//
//    }
//
//    function comment_editcancle(clicked_id) {
//
//        document.getElementById('editbox' + clicked_id).style.display = 'block';
//        document.getElementById('editcancle' + clicked_id).style.display = 'none';
//
//        document.getElementById('editcomment' + clicked_id).style.display = 'none';
//        document.getElementById('showcomment' + clicked_id).style.display = 'block';
//        document.getElementById('editsubmit' + clicked_id).style.display = 'none';
//
//    }
//    function comment_editboxtwo(clicked_id) {
//
//        document.getElementById('editcommenttwo' + clicked_id).style.display = 'block';
//        document.getElementById('showcommenttwo' + clicked_id).style.display = 'none';
//        document.getElementById('editsubmittwo' + clicked_id).style.display = 'block';
//        document.getElementById('editboxtwo' + clicked_id).style.display = 'none';
//        document.getElementById('editcancletwo' + clicked_id).style.display = 'block';
//
//    }
//
//
//
//    function comment_editcancletwo(clicked_id) {
//
//        document.getElementById('editboxtwo' + clicked_id).style.display = 'block';
//        document.getElementById('editcancletwo' + clicked_id).style.display = 'none';
//
//        document.getElementById('editcommenttwo' + clicked_id).style.display = 'none';
//        document.getElementById('showcommenttwo' + clicked_id).style.display = 'block';
//        document.getElementById('editsubmittwo' + clicked_id).style.display = 'none';
//
//    }

    function comment_editbox(clicked_id) {
        document.getElementById('editcomment' + clicked_id).style.display = 'inline-block';
        document.getElementById('showcomment' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit' + clicked_id).style.display = 'inline-block';
        //document.getElementById('editbox' + clicked_id).style.display = 'none';
        document.getElementById('editcommentbox' + clicked_id).style.display = 'none';
        document.getElementById('editcancle' + clicked_id).style.display = 'block';
        $('.post-design-commnet-box').hide();
    }


    function comment_editcancle(clicked_id) {
        document.getElementById('editcommentbox' + clicked_id).style.display = 'block';
        document.getElementById('editcancle' + clicked_id).style.display = 'none';
        document.getElementById('editcomment' + clicked_id).style.display = 'none';
        document.getElementById('showcomment' + clicked_id).style.display = 'block';
        document.getElementById('editsubmit' + clicked_id).style.display = 'none';

        $('.post-design-commnet-box').show();
    }

    function comment_editboxtwo(clicked_id) {

        $('div[id^=editcommenttwo]').css('display', 'none');
        $('div[id^=showcommenttwo]').css('display', 'block');
        $('button[id^=editsubmittwo]').css('display', 'none');
        $('div[id^=editcommentboxtwo]').css('display', 'block');
        $('div[id^=editcancletwo]').css('display', 'none');

        document.getElementById('editcommenttwo' + clicked_id).style.display = 'inline-block';
        document.getElementById('showcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('editsubmittwo' + clicked_id).style.display = 'inline-block';
        document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'none';
        document.getElementById('editcancletwo' + clicked_id).style.display = 'block';
        $('.post-design-commnet-box').hide();
    }


    function comment_editcancletwo(clicked_id) {

        document.getElementById('editcommentboxtwo' + clicked_id).style.display = 'block';
        document.getElementById('editcancletwo' + clicked_id).style.display = 'none';

        document.getElementById('editcommenttwo' + clicked_id).style.display = 'none';
        document.getElementById('showcommenttwo' + clicked_id).style.display = 'block';
        document.getElementById('editsubmittwo' + clicked_id).style.display = 'none';
        $('.post-design-commnet-box').show();
    }

    function comment_editbox3(clicked_id) { //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
        document.getElementById('editcomment3' + clicked_id).style.display = 'block';
        document.getElementById('showcomment3' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit3' + clicked_id).style.display = 'block';

        document.getElementById('editcommentbox3' + clicked_id).style.display = 'none';
        document.getElementById('editcancle3' + clicked_id).style.display = 'block';
        $('.post-design-commnet-box').hide();

    }

    function comment_editcancle3(clicked_id) {

        document.getElementById('editcommentbox3' + clicked_id).style.display = 'block';
        document.getElementById('editcancle3' + clicked_id).style.display = 'none';

        document.getElementById('editcomment3' + clicked_id).style.display = 'none';
        document.getElementById('showcomment3' + clicked_id).style.display = 'block';
        document.getElementById('editsubmit3' + clicked_id).style.display = 'none';

        $('.post-design-commnet-box').show();

    }

    function comment_editbox4(clicked_id) { //alert(clicked_id); alert('editcomment' + clicked_id); alert('showcomment' + clicked_id); alert('editsubmit' + clicked_id); 
        document.getElementById('editcomment4' + clicked_id).style.display = 'block';
        document.getElementById('showcomment4' + clicked_id).style.display = 'none';
        document.getElementById('editsubmit4' + clicked_id).style.display = 'block';

        document.getElementById('editcommentbox4' + clicked_id).style.display = 'none';
        document.getElementById('editcancle4' + clicked_id).style.display = 'block';

        $('.post-design-commnet-box').hide();

    }

    function comment_editcancle4(clicked_id) {

        document.getElementById('editcommentbox4' + clicked_id).style.display = 'block';
        document.getElementById('editcancle4' + clicked_id).style.display = 'none';

        document.getElementById('editcomment4' + clicked_id).style.display = 'none';
        document.getElementById('showcomment4' + clicked_id).style.display = 'block';
        document.getElementById('editsubmit4' + clicked_id).style.display = 'none';

        $('.post-design-commnet-box').show();

    }

</script>

<!--comment edit box end-->

<!-- comment edit insert start -->
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
//    function edit_comment(abc)
//    {
//
//        var post_comment_edit = document.getElementById("editcomment" + abc);
//
//        if (post_comment_edit.value == '') {
//            $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
//            $('#bidmodal').modal('show');
//
//        } else {
//
//            $.ajax({
//                type: 'POST',
//                url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
//                data: 'post_id=' + abc + '&comment=' + post_comment_edit.value,
//                success: function (data) {
//
//
//                    document.getElementById('editcomment' + abc).style.display = 'none';
//                    document.getElementById('showcomment' + abc).style.display = 'block';
//                    document.getElementById('editsubmit' + abc).style.display = 'none';
//
//                    document.getElementById('editbox' + abc).style.display = 'block';
//                    document.getElementById('editcancle' + abc).style.display = 'none';
//
//                    $('#' + 'showcomment' + abc).html(data);
//
//
//
//                }
//            });
//        }
//    }


    function edit_comment(abc)
    {
        $("#editcomment" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });

        var sel = $("#editcomment" + abc);
        var txt = sel.html();
        
        txt = txt.replace(/&nbsp;/gi, " ");
        txt = txt.replace(/<br>$/, '');
                   
         if (txt == '' || txt == '<br>') {
            $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
            $('#bidmodal').modal('show');
            return false;
                    }
                   
         if (/^\s+$/gi.test(txt)){
                        return false;
                    }
                    
//        if (txt == '' || txt == '<br>') {
//           
//            return false;
//        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
            data: 'post_id=' + abc + '&comment=' + txt,
            success: function (data) {
                document.getElementById('editcomment' + abc).style.display = 'none';
                document.getElementById('showcomment' + abc).style.display = 'block';
                document.getElementById('editsubmit' + abc).style.display = 'none';
                document.getElementById('editcommentbox' + abc).style.display = 'block';
                document.getElementById('editcancle' + abc).style.display = 'none';
                $('#' + 'showcomment' + abc).html(data);
                $('.post-design-commnet-box').show();
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }
</script>


<script type="text/javascript">
    function edit_comment2(abc)
    {

        var post_comment_edit = document.getElementById("editcomment2" + abc);

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
            data: 'post_id=' + abc + '&comment=' + post_comment_edit.value,
            success: function (data) {


                document.getElementById('editcomment2' + abc).style.display = 'none';
                document.getElementById('showcomment2' + abc).style.display = 'block';
                document.getElementById('editsubmit2' + abc).style.display = 'none';

                $('#' + 'showcomment' + abc).html(data);



            }
        });

    }
</script>

<script type="text/javascript">

//    function commentedit(abc)
//    {
//        $('#editcomment' + abc).keypress(function (e) {
//            if (e.keyCode == 13 && !e.shiftKey) {
//                var val = $('#editcomment' + abc).val();
//                e.preventDefault();
//
//                if (window.preventDuplicateKeyPresses)
//                    return;
//
//                window.preventDuplicateKeyPresses = true;
//                window.setTimeout(function () {
//                    window.preventDuplicateKeyPresses = false;
//                }, 500);
//
//                if (val == '') {
//
//                    $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
//                    $('#bidmodal').modal('show');
//
//                } else {
//
//                    $.ajax({
//                        type: 'POST',
//                        url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
//                        data: 'post_id=' + abc + '&comment=' + val,
//                        success: function (data) {
//
//
//                            document.getElementById('editcomment' + abc).style.display = 'none';
//                            document.getElementById('showcomment' + abc).style.display = 'block';
//                            document.getElementById('editsubmit' + abc).style.display = 'none';
//
//                            document.getElementById('editbox' + abc).style.display = 'block';
//                            document.getElementById('editcancle' + abc).style.display = 'none';
//
//                            $('#' + 'showcomment' + abc).html(data);
//                        }
//                    });
//                }
//            }
//        });
//    }

    function commentedit(abc)
    {
        $("#editcomment" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });
        $('#editcomment' + abc).keypress(function (event) {
            if (event.which == 13 && event.shiftKey != 1) {
                event.preventDefault();
                var sel = $("#editcomment" + abc);
                var txt = sel.html();
                
                    txt = txt.replace(/&nbsp;/gi, " ");
                    txt = txt.replace(/<br>$/, '');
                    if (txt == '' || txt == '<br>') {
                    $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_delete(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                    $('#bidmodal').modal('show');
                        return false;
                    }
                    if (/^\s+$/gi.test(txt))
                    {
                        return false;
                    }
                    
//                if (txt == '' || txt == '<br>') {
//                   
//                    return false;
//                }
                if (window.preventDuplicateKeyPresses)
                    return;
                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                    data: 'post_id=' + abc + '&comment=' + txt,
                    success: function (data) {
                        document.getElementById('editcomment' + abc).style.display = 'none';
                        document.getElementById('showcomment' + abc).style.display = 'block';
                        document.getElementById('editsubmit' + abc).style.display = 'none';
                        document.getElementById('editcommentbox' + abc).style.display = 'block';
                        document.getElementById('editcancle' + abc).style.display = 'none';
                        $('#' + 'showcomment' + abc).html(data);
                        $('.post-design-commnet-box').show();
                    }
                });
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }
</script>

<script type="text/javascript">
//    function edit_commenttwo(abc)
//    {
//        var post_comment_edit = document.getElementById("editcommenttwo" + abc);
//        if (post_comment_edit.value == '') {
//
//            $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
//            $('#bidmodal').modal('show');
//
//        } else {
//
//            $.ajax({
//                type: 'POST',
//                url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
//                data: 'post_id=' + abc + '&comment=' + post_comment_edit.value,
//                success: function (data) {
//                    document.getElementById('showcommenttwo' + abc).style.display = 'block';
//                    document.getElementById('showcommenttwo' + abc).innerHTML = data;
//                    document.getElementById('editboxtwo' + abc).style.display = 'block';
//
//                    document.getElementById('editcommenttwo' + abc).style.display = 'none';
//
//                    document.getElementById('editsubmittwo' + abc).style.display = 'none';
//                    document.getElementById('editcancletwo' + abc).style.display = 'none';
//
//                }
//            });
//        }
//
//    }

    function edit_commenttwo(abc)
    {
        $("#editcommenttwo" + abc).click(function () {
            $(this).prop("contentEditable", true);
        });

        var sel = $("#editcommenttwo" + abc);
        var txt = sel.html();
        
        txt = txt.replace(/&nbsp;/gi, " ");
        txt = txt.replace(/<br>$/, '');
                    
        if (txt == '' || txt == '<br>') {
            $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
            $('#bidmodal').modal('show');
                        return false;
                    }
                    if (/^\s+$/gi.test(txt))
                    {
                        return false;
                    }
       
//        if (txt == '' || txt == '<br>') {
//          
//            return false;
//        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
            data: 'post_id=' + abc + '&comment=' + txt,
            success: function (data) {
                document.getElementById('editcommenttwo' + abc).style.display = 'none';
                document.getElementById('showcommenttwo' + abc).style.display = 'block';
                document.getElementById('editsubmittwo' + abc).style.display = 'none';
                document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                document.getElementById('editcancletwo' + abc).style.display = 'none';
                $('#' + 'showcommenttwo' + abc).html(data);
                $('.post-design-commnet-box').show();
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }
</script>


<script type="text/javascript">

//    function commentedittwo(abc)
//    {
//
//        $('#editcommenttwo' + abc).keypress(function (e) {
//       
//            if (e.keyCode == 13 && !e.shiftKey) {
//                var val = $('#editcommenttwo' + abc).val();
//                e.preventDefault();
//
//                if (window.preventDuplicateKeyPresses)
//                    return;
//
//                window.preventDuplicateKeyPresses = true;
//                window.setTimeout(function () {
//                    window.preventDuplicateKeyPresses = false;
//                }, 500);
//
//                if (val == '') {
//
//                    $('.biderror .mes').html("<div class='pop_content'>Are you sure want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
//                    $('#bidmodal').modal('show');
//
//                } else {
//                    $.ajax({
//                        type: 'POST',
//                        url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
//                        data: 'post_id=' + abc + '&comment=' + val,
//                        success: function (data) {
//
//
//                            document.getElementById('editcommenttwo' + abc).style.display = 'none';
//                            document.getElementById('showcommenttwo' + abc).style.display = 'block';
//                            document.getElementById('editsubmittwo' + abc).style.display = 'none';
//
//                            document.getElementById('editboxtwo' + abc).style.display = 'block';
//                            document.getElementById('editcancletwo' + abc).style.display = 'none';
//
//                            $('#' + 'showcommenttwo' + abc).html(data);
//                        }
//                    });
//                }
//            }
//            e.preventDefault();
//        });
//        
//    }

    function commentedittwo(abc)
    {
        $("#editcommenttwo" + abc).click(function () {
            $(this).prop("contentEditable", true);
            //$(this).html("");
        });
        $('#editcommenttwo' + abc).keypress(function (event) {
            if (event.which == 13 && event.shiftKey != 1) {
                event.preventDefault();
                var sel = $("#editcommenttwo" + abc);
                var txt = sel.html();
                
                txt = txt.replace(/&nbsp;/gi, " ");
                    txt = txt.replace(/<br>$/, '');
                    if (txt == '' || txt == '<br>') {
                    $('.biderror .mes').html("<div class='pop_content'>Are you sure you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='comment_deletetwo(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                    $('#bidmodal').modal('show');
                        return false;
                    }
                    if (/^\s+$/gi.test(txt))
                    {
                        return false;
                    }
                    
//                if (txt == '' || txt == '<br>') {.
//                    return false;
//                }

                if (window.preventDuplicateKeyPresses)
                    return;

                window.preventDuplicateKeyPresses = true;
                window.setTimeout(function () {
                    window.preventDuplicateKeyPresses = false;
                }, 500);

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "artistic/edit_comment_insert" ?>',
                    data: 'post_id=' + abc + '&comment=' + txt,
                    success: function (data) {
                        document.getElementById('editcommenttwo' + abc).style.display = 'none';
                        document.getElementById('showcommenttwo' + abc).style.display = 'block';
                        document.getElementById('editsubmittwo' + abc).style.display = 'none';

                        document.getElementById('editcommentboxtwo' + abc).style.display = 'block';
                        document.getElementById('editcancletwo' + abc).style.display = 'none';

                        $('#' + 'showcommenttwo' + abc).html(data);
                        $('.post-design-commnet-box').show();

                    }
                });
            }
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }

</script>

<!--comment edit insert script end -->

<!-- hide and show data start-->
<script type="text/javascript">
    function commentall(clicked_id) {


        var x = document.getElementById('threecomment' + clicked_id);
        var y = document.getElementById('fourcomment' + clicked_id);
        var z = document.getElementById('insertcount' + clicked_id);

        if (x.style.display === 'block' && y.style.display === 'none') {
            x.style.display = 'none';
            y.style.display = 'block';
            z.style.visibility = 'show';
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "artistic/fourcomment" ?>',
                data: 'art_post_id=' + clicked_id,
                //alert(data);
                success: function (data) {
                    $('#' + 'fourcomment' + clicked_id).html(data);

                }
            });

        }
        // } else {
        //      x.style.display = 'block';
        //      y.style.display = 'block';
        //      z.style.display = 'block';

        //      $.ajax({ 
        //             type:'POST',
        //             url:'<?php echo base_url() . "artistic/fourcomment" ?>',
        //             data:'art_post_id='+clicked_id,
        //             //alert(data);
        //             success:function(data){
        //       $('#' + 'threecomment' + clicked_id).html(data);

        //       }
        //         });
        // }
    }
</script>
<!-- hide and show data end-->



<!-- cover image start -->
<script>
    function myFunction() {
        document.getElementById("upload-demo").style.visibility = "hidden";
        document.getElementById("upload-demo-i").style.visibility = "hidden";
        document.getElementById('message1').style.display = "block";

        //setTimeout(function () { location.reload(1); }, 5000);

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
                    if (html)
                    {
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

        $.ajax({

            url: "<?php echo base_url(); ?>artistic/image",
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
    /* When the user clicks on the button, 
     toggle between hiding and showing the dropdown content */
    function myFunction1(clicked_id) {
        document.getElementById('myDropdown' + clicked_id).classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn1')) {

            var dropdowns = document.getElementsByClassName("dropdown-content1");
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
<script>
    /* When the user clicks on the button, 
     toggle between hiding and showing the dropdown content */
    function myFunction(clicked_id) {
        document.getElementById('myDropdown' + clicked_id).classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn2')) {

            var dropdowns = document.getElementsByClassName("dropdown-content2");
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

<script>
    $(function () {
        var showTotalChar = 200, showChar = "More", hideChar = "less";
        $('.show').each(function () {
           // var content = $(this).text();
            var content = $(this).html();
            if (content.length > showTotalChar) {
                var con = content.substr(0, showTotalChar);
                var hcon = content.substr(showTotalChar, content.length - showTotalChar);
                var txt = con + '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<a href="" class="showmoretxt">' + showChar + '</a></span>';
                $(this).html(txt);
            }
        });
        $(".showmoretxt").click(function () {
            if ($(this).hasClass("sample")) {
                $(this).removeClass("sample");
                $(this).text(showChar);
            } else {
                $(this).addClass("sample");
                $(this).text(hideChar);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
</script>


<!-- falguni post in sert script start -->

<script type="text/javascript">

    $(document).ready(function () {
        $('.modal-close').on('click', function () {
            $('.modal-post').hide();
        });
    });

</script>

<!-- falguni script end -->


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


<!-- falguni script start -->


<!-- remove save post start -->


<script type="text/javascript">

    function deleteownpostmodel(abc) {

        $('div[id^=myDropdown]').hide().removeClass('show');
        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to Delete Your post?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='remove_ownpost(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

</script>



<script type="text/javascript">
    function remove_ownpost(abc)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/art_deletepost" ?>',
            data: 'art_post_id=' + abc,
            //alert(data);
            success: function (data) {

                $('#' + 'removepost' + abc).html(data);


            }
        });

    }
</script>

<!-- remove save post end -->

<!-- remove particular user post start -->

<script type="text/javascript">
    function del_particular_userpost(abc)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/del_particular_userpost" ?>',
            data: 'art_post_id=' + abc,
            //alert(data);
            success: function (data) {

                $('#' + 'removepost' + abc).html(data);


            }
        });

    }
</script>

<!-- remove particular user post end -->



<!-- edit post start -->

<script type="text/javascript">
    function editpost(abc)
    {
//        document.getElementById('editpostdata' + abc).style.display = 'none';
//        document.getElementById('editpostbox' + abc).style.display = 'block';
//        document.getElementById('editpostdetails' + abc).style.display = 'none';
//        document.getElementById('editpostdetailbox' + abc).style.display = 'block';
//        document.getElementById('editpostsubmit' + abc).style.display = 'block';

        $('div[id^=myDropdown]').hide().removeClass('show');

        document.getElementById('editpostdata' + abc).style.display = 'none';
        document.getElementById('editpostbox' + abc).style.display = 'block';
        document.getElementById('editpostdetails' + abc).style.display = 'none', 'display:inline !important';
        document.getElementById('editpostdetailbox' + abc).style.display = 'block';
        document.getElementById('editpostsubmit' + abc).style.display = 'block';
    }
</script>


<script type="text/javascript">
//    function edit_postinsert(abc)
//    {
//        var editpostname = document.getElementById("editpostname" + abc);
//        var editpostdetails = document.getElementById("editpostdesc" + abc);
//        var $field = $('#editpostdesc' + abc);
//        var editpostdetails = $('#editpostdesc' + abc).html();
//
//        $.ajax({
//            type: 'POST',
//            url: '<?php echo base_url() . "artistic/edit_post_insert" ?>',
//            data: 'art_post_id=' + abc + '&art_post=' + editpostname.value + '&art_description=' + editpostdetails,
//            dataType: "json",
//            success: function (data) {
//
//                document.getElementById('editpostdata' + abc).style.display = 'block';
//                document.getElementById('editpostbox' + abc).style.display = 'none';
//                document.getElementById('editpostdetails' + abc).style.display = 'block';
//                document.getElementById('editpostdetailbox' + abc).style.display = 'none';
//
//                document.getElementById('editpostsubmit' + abc).style.display = 'none';
//
//                $('#' + 'editpostdata' + abc).html(data.title);
//                $('#' + 'editpostdetails' + abc).html(data.description);
//
//            }
//        });
//
//    }


    function edit_postinsert(abc)
    {

        var editpostname = document.getElementById("editpostname" + abc);
        var editpostdetails = document.getElementById("editpostdesc" + abc);
        // start khyati code
        var $field = $('#editpostdesc' + abc);
        //var data = $field.val();
        var editpostdetails = $('#editpostdesc' + abc).html();
        // end khyati code

        if (editpostname.value == '' && editpostdetails == '') {
            $('.biderror .mes').html("<div class='pop_content'>You must either fill title or description.");
            $('#bidmodal').modal('show');

            document.getElementById('editpostdata' + abc).style.display = 'block';
            document.getElementById('editpostbox' + abc).style.display = 'none';
            document.getElementById('editpostdetails' + abc).style.display = 'block';
            document.getElementById('editpostdetailbox' + abc).style.display = 'none';

            document.getElementById('editpostsubmit' + abc).style.display = 'none';
        } else {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "artistic/edit_post_insert" ?>',
                data: 'art_post_id=' + abc + '&art_post=' + editpostname.value + '&art_description=' + editpostdetails,
                dataType: "json",
                success: function (data) {

                    document.getElementById('editpostdata' + abc).style.display = 'block';
                    document.getElementById('editpostbox' + abc).style.display = 'none';
                    document.getElementById('editpostdetails' + abc).style.display = 'block';
                    document.getElementById('editpostdetailbox' + abc).style.display = 'none';

                    document.getElementById('editpostsubmit' + abc).style.display = 'none';



                    $('#' + 'editpostdata' + abc).html(data.title);
                    $('#' + 'editpostdetails' + abc).html(data.description);

                }
            });
        }

    }
</script>


<!-- edit post end -->

<!-- save post start -->

<script type="text/javascript">
    function save_post(abc)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/artistic_save" ?>',
            data: 'art_post_id=' + abc,
            success: function (data) {
                $('.' + 'savedpost' + abc).html(data);
            }
        });

    }
</script>

<!-- save post end -->

<!-- falguni script end -->


<script>
    // Get the modal
    var modal = document.getElementById('myModal3');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn3");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close3")[0];

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


<!-- follow user script start -->

<script type="text/javascript">
    function remove_post(abc)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/art_deletepost" ?>',
            data: 'art_post_id=' + abc,
            //alert(data);
            success: function (data) {

                $('#' + 'removepost' + abc).html(data);


            }
        });

    }
</script>

<!-- remove save post end -->


<!-- remove particular user post start -->

<script type="text/javascript">

    function deletepostmodel(abc) {


        $('.biderror .mes').html("<div class='pop_content'>Are you sure want to Delete this post From Your Profile?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='del_particular_userpost(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
        $('#bidmodal').modal('show');
    }

</script>
<script type="text/javascript">
    function del_particular_userpost(abc)
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/del_particular_userpost" ?>',
            data: 'art_post_id=' + abc,
            //alert(data);
            success: function (data) {

                $('#' + 'removepost' + abc).html(data);


            }
        });

    }

</script>



<script type="text/javascript">
    function followuser(clicked_id)
    { //alert(clicked_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/follow" ?>',
            data: 'follow_to=' + clicked_id,
            success: function (data) {

                $('.' + 'fruser' + clicked_id).html(data);

            }
        });
    }
</script>

<!--follow like script end -->

<!-- Unfollow user script start -->

<script type="text/javascript">
    function unfollowuser(clicked_id)
    {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/unfollow" ?>',
            data: 'follow_to=' + clicked_id,
            success: function (data) {

                $('.' + 'fruser' + clicked_id).html(data);

            }
        });
    }
</script>

<!--follow like script end -->


<script>
    $('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif']
    });
    $("#file-0").fileinput({
        'allowedFileExtensions': ['jpg', 'png', 'gif']
    });
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });

    $("#file-3").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
            "http://lorempixel.com/1920/1080/transport/1",
            "http://lorempixel.com/1920/1080/transport/2",
            "http://lorempixel.com/1920/1080/transport/3",
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
            {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3},
        ],
    });
    $("#file-4").fileinput({
        uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function () {
        var $el = $("#file-4");
        if ($el.attr('disabled')) {
            $el.fileinput('enable');
        } else {
            $el.fileinput('disable');
        }
    });
    $(".btn-info").on('click', function () {
        $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
    });

    $(document).ready(function () {
        $("#test-upload").fileinput({
            'showPreview': false,
            'allowedFileExtensions': ['jpg', 'png', 'gif'],
            'elErrorContainer': '#errorBlock'
        });
        $("#kv-explorer").fileinput({
            'theme': 'explorer',
            'uploadUrl': '#',
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/nature/1",
                "http://lorempixel.com/1920/1080/nature/2",
                "http://lorempixel.com/1920/1080/nature/3",
            ],
            initialPreviewConfig: [
                {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3},
            ]
        });

    });
</script>



<!-- end search validation -->

<script>
    function updateprofilepopup(id) {
        $('#bidmodal-2').modal('show');
    }
</script>



<!-- insert post validtation start -->


<script type="text/javascript">

    function imgval() {

        var fileInput = document.getElementById("file-1").files;
        var product_name1 = document.getElementById("test-upload-product").value;
        var product_description1 = document.getElementById("test-upload-des").value;
        var product_fileInput1 = document.getElementById("file-1").value;


        if (product_fileInput1 == '' && product_name1 == '' && product_description1 == '')
        {

            $('.biderror .mes').html("<div class='pop_content'>This post appears to be blank. Please write or attach (photos, videos, audios, pdf) to post.");
            $('#bidmodal').modal('show');
            setInterval('window.location.reload()', 10000);
            // window.location='';
            event.preventDefault();
            return false;

        } else {

            for (var i = 0; i < fileInput.length; i++)
            {
                var vname = fileInput[i].name;
                var vfirstname = fileInput[0].name;
                var ext = vfirstname.split('.').pop();
                var ext1 = vname.split('.').pop();
                var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                var allowesvideo = ['mp4', 'webm'];
                var allowesaudio = ['mp3'];
                var allowespdf = ['pdf'];

                var foundPresent = $.inArray(ext, allowedExtensions) > -1;
                var foundPresentvideo = $.inArray(ext, allowesvideo) > -1;
                var foundPresentaudio = $.inArray(ext, allowesaudio) > -1;
                var foundPresentpdf = $.inArray(ext, allowespdf) > -1;

                if (foundPresent == true)
                {
                    var foundPresent1 = $.inArray(ext1, allowedExtensions) > -1;

                    if (foundPresent1 == true && fileInput.length <= 10) {
                    } else {

                        $('.biderror .mes').html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf.");
                        $('#bidmodal').modal('show');
                        setInterval('window.location.reload()', 10000);
                        // window.location='';
                        event.preventDefault();
                        return false;
                    }

                } else if (foundPresentvideo == true)
                {

                    var foundPresent1 = $.inArray(ext1, allowesvideo) > -1;

                    if (foundPresent1 == true && fileInput.length == 1) {
                    } else {
                        $('.biderror .mes').html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf.");
                        $('#bidmodal').modal('show');
                        setInterval('window.location.reload()', 10000);
                        event.preventDefault();
                        return false;
                    }
                } else if (foundPresentaudio == true)
                {

                    var foundPresent1 = $.inArray(ext1, allowesaudio) > -1;

                    if (foundPresent1 == true && fileInput.length == 1) {
                    } else {
                        $('.biderror .mes').html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf.");
                        $('#bidmodal').modal('show');
                        setInterval('window.location.reload()', 10000);
                        event.preventDefault();
                        return false;
                    }
                } else if (foundPresentpdf == true)
                {

                    var foundPresent1 = $.inArray(ext1, allowespdf) > -1;

                    if (foundPresent1 == true && fileInput.length == 1) {


                        if (product_name1 == '') {
                            $('.biderror .mes').html("<div class='pop_content'>You have to add pdf title.");
                            $('#bidmodal').modal('show');
                            setInterval('window.location.reload()', 10000);
                            event.preventDefault();
                            return false;
                        }
                    } else {
                        $('.biderror .mes').html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf.");
                        $('#bidmodal').modal('show');
                        setInterval('window.location.reload()', 10000);
                        event.preventDefault();
                        return false;
                    }
                }
                else if (foundPresentvideo == false) {

                    $('.biderror .mes').html("<div class='pop_content'>This File Format is not supported Please Try to Upload MP4 or WebM files..");
                    $('#bidmodal').modal('show');
                    setInterval('window.location.reload()', 10000);
                    event.preventDefault();
                    return false;

                } 
            }
        }
    }

</script>

<script type="text/javascript">

    // $(document).ready(function () {
    //     $('.modal-close').on('click', function () {
    //         $('.modal-post').hide();
    //     });
    // });

</script>


<!-- insert validation end -->

<!-- zalak script for more decription strat -->

<script>
    $(function () {
        var showTotalChar = 200, showChar = "More", hideChar = "less";
        $('.show').each(function () {
            //var content = $(this).text();
            var content = $(this).html();
            if (content.length > showTotalChar) {
                var con = content.substr(0, showTotalChar);
                var hcon = content.substr(showTotalChar, content.length - showTotalChar);
                var txt = con + '<span class="dots">...</span><span class="morectnt"><span>' + hcon + '</span>&nbsp;&nbsp;<a href="" class="showmoretxt">' + showChar + '</a></span>';
                $(this).html(txt);
            }
        });
        $(".showmoretxt").click(function () {
            if ($(this).hasClass("sample")) {
                $(this).removeClass("sample");
                $(this).text(showChar);
            } else {
                $(this).addClass("sample");
                $(this).text(hideChar);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
</script>

<!-- zalak script for more decription end -->

<!-- textarea js -->

<script type="text/javascript">
    function h(e) {
        $(e).css({
            'height': '29px',
            'overflow-y': 'hidden'
        }).height(e.scrollHeight);
    }
    $('.textarea').each(function () {
        h(this);
    }).on('input', function () {
        h(this);
    });
</script>


<script type="text/javascript">
    function likeuserlist(post_id) {

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "artistic/likeuserlist" ?>',
            data: 'post_id=' + post_id,
            dataType: "html",
            success: function (data) {
                var html_data = data;
                $('#likeusermodal .mes').html(html_data);
                $('#likeusermodal').modal('show');
            }
        });
    }
</script>


<!-- scrtipt for count title number start -->

<script language=JavaScript>
                             
                             
                                   
                            function check_length(my_form)
                            {
                                maxLen = 50;
                                // max number of characters allowed
                                if (my_form.my_text.value.length > maxLen) {
                                    // Alert message if maximum limit is reached. 
                                    // If required Alert can be removed. 
                                    var msg = "You have reached your maximum limit of characters allowed";
                                //    alert(msg);
                                    
                       $('.biderror .mes').html("<div class='pop_content'>" + msg + "</div>");
                        $('#bidmodal').modal('show');
                                    // Reached the Maximum length so trim the textarea
                                    my_form.my_text.value = my_form.my_text.value.substring(0, maxLen);
                                } else {
                                    // Maximum length not reached so update the value of my_text counter
                                    my_form.text_num.value = maxLen - my_form.my_text.value.length;
                                }
                            }
                            //-->
                        </script>
<!-- script end -->
<style type="text/css">
    .likeduser{
        width: 100%;
        background-color: #00002D;
    }
    .likeduser-title{
        color: #fff;
        margin-bottom: 5px;
        padding: 7px;
    }
    .likeuser_list{
        background-color: #ccc;
        float: left;
        margin: 0px 6px 5px 9px;
        padding: 5px;
        width: 47%;
        font-size: 14px;
    }
    .likeduserlist, .likeduserlist1 {
        float: left;
        /*        margin-left: 15px;
                margin-right: 15px;*/
        width: 96%;
        background-color: #fff !important;
    }
    div[class^="likeduserlist"]{
        width: 100% !important;
        background-color: #fff !important;
    }
    .like_one_other{/*
        margin-left: 15px;
*/        /*  margin-right: 15px;*/

    }

</style>
<!-- This  script use for close dropdown in every post -->
<script type="text/javascript">
    $('body').on("click", "*", function (e) {
        var classNames = $(e.target).attr("class").toString().split(' ').pop();
//        alert(classNames);
        $('div[id^=myDropdown]').hide().removeClass('show');
//        $('#myModal3').hide();
        
        if (classNames == 'fa-ellipsis-v') {
            $('div[id^=myDropdown]').show().addClass('show');
        }
//        else if (classNames == 'popup-text' || classNames == 'modal-post' ) {
//            $('#myModal3').show();
//        }

    });

</script>



<!-- This  script use for close dropdown in every post -->

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
        readURL(this);
    });
</script>

<!-- script for profile pic end -->




  <script>
    $(document).ready(function() {
        $('.video').mediaelementplayer({
            alwaysShowControls: false,
            videoVolume: 'horizontal',
            features: ['playpause','progress','volume','fullscreen']
        });
    });
    </script>
    
    <script>
    $('.modal-close').on('click',function(){
       $('#myModal3').modal(show);
    });
    </script>