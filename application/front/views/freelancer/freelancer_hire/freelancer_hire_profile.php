  <!-- start head -->
<?php  echo $head; ?>
 
<style type="text/css">
    #popup-form img{display: none;}
</style>

    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">


<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

  
  
  
    <!-- END HEADER -->
   <?php
     $returnpage=$_GET['page'];
    if($returnpage=='freelancer_post'){
    echo $freelancer_post_header2;
    }
    else{
    echo $freelancer_hire_header2;
    }?>


       <body   class="page-container-bg-solid page-boxed">

    <section>
        <div class="container" id="paddingtop_fixed">
            
      <div class="row" id="row1" style="display:none;">
        <div class="col-md-12 text-center">
        <div id="upload-demo" ></div>
        </div>
        <div class="col-md-12 cover-pic" >
            <button class="btn btn-success  cancel-result" onclick="" >Cancel</button>
    
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
        $contition_array = array( 'user_id' => $user_id, 'is_delete' => '0' , 'status' => '1');
            $image = $this->common->select_data_by_condition('freelancer_hire_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
          // echo "<pre>";print_r($image);
            $image_ori=$image[0]['profile_background'];
           if($image_ori)
           {
            ?>
            
            <img src="<?php echo base_url($this->config->item('free_hire_bg_main_upload_path').$image[0]['profile_background']);?>" name="image_src" id="image_src" / >
            <?php
           }
           else
           { ?>

          
             <img src="<?php echo WHITEIMAGE; ?>" name="image_src" id="image_src" / >
        <?php }
          
            ?>

    </div>
    </div>
</div>
  </div>
  </div>   

    <div class="container">    
      <div class="upload-img">
      <?php if($returnpage == ''){ ?>
        <label class="cameraButton"><span class="tooltiptext">Upload Cover Photo</span><i class="fa fa-camera" aria-hidden="true"></i>
            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
        </label>
      <?php }?>
      </div>
 
               
                <div class="profile-photo">
                    <div class="profile-pho">

                        <div class="user-pic padd_img">
                        <?php if($freelancerhiredata[0]['freelancer_hire_user_image'] != ''){ ?>
                           <img src="<?php echo base_url($this->config->item('free_hire_profile_thumb_upload_path').$freelancerhiredata[0]['freelancer_hire_user_image']);?>" alt="" >
                            <?php } else { ?>
                            <img alt="" class="img-circle" src="<?php echo base_url(NOIMAGE); ?>" alt="" />
                            <?php } ?>
                            <!-- <a href="#popup-form" class="fancybox"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a> -->
                            <?php if($returnpage == ''){ ?>
                            <a href="javascript:void(0);" onclick="updateprofilepopup();"><i class="fa fa-camera" aria-hidden="true"></i> Update Profile Picture</a>
                            <?php }?>
                        </div>

                        
                        <!-- <div id="popup-form"> -->
                        <!-- <?php //echo form_open_multipart(base_url('freelancer/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?> -->
                        <!-- <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="1">
                        <input type="submit" name="cancel4" id="cancel4" value="Cancel">
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save"> -->
                    <!-- </form> -->
                <!-- </div> -->

                    </div>

<div class="profile-main-rec-box-menu  col-md-12 ">

<div class="left-side-menu col-md-2">  </div>
<div class="right-side-menu col-md-6">  
 <ul class="">
                                     <li <?php if(($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_hire_profile')){?> class="active" <?php } ?>>
                                          <?php if($returnpage=='freelancer_post') {?><a title="Employer Details" href="<?php echo base_url('freelancer/freelancer_hire_profile/'.$this->uri->segment(3).'?page=freelancer_post'); ?>">Employer Details</a> <?php } else {?> <a title="Employer Details" href="<?php echo base_url('freelancer/freelancer_hire_profile'); ?>">Employer Details</a> <?php }?>
                                    </li>
                                    <li <?php if(($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save')){?> class="active" <?php } ?>> 
                                        <?php if ($returnpage=='freelancer_post'){?><a title="Post"  href="<?php echo base_url('freelancer/freelancer_hire_post/'.$this->uri->segment(3).'?page=freelancer_post'); ?>">Post</a><?php } else { ?><a title="Post" href="<?php echo base_url('freelancer/freelancer_hire_post'); ?>">Post</a><?php }?>
                                    </li>
                                   
                                    


                                    <?php 


                                if(($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_hire_post' || $this->uri->segment(2) == 'freelancer_hire_profile' || $this->uri->segment(2) == 'freelancer_add_post' || $this->uri->segment(2) == 'freelancer_save') && ($this->uri->segment(3) == $this->session->userdata('aileenuser')|| $this->uri->segment(3) == '')) { ?>

                                    
                                   

                                    <li <?php if(($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_save')){?> class="active" <?php } ?>><a title="Saved Freelancer" href="<?php echo base_url('freelancer/freelancer_save'); ?>">Saved Freelancer</a>
                                    </li>

                                    <?php }?>
                                   

    </ul>
    </div>

    <div class="col-md-3" style="width:32%;">
                <div class="flw_msg_btn fr">
                    <ul>
                     
                        <?php $userid = $this->session->userdata('aileenuser');
                        if($userid != $this->uri->segment(3)){
                             if($this->uri->segment(3) != ""){?>
                        <li> <a href="<?php echo base_url('chat/abc/' . $this->uri->segment(3)); ?>">Message</a> </li>
                       
                             <?php }
                              }
                              ?>
                    </ul>
                </div>
            </div>

</div>
               
        <div class="job-menu-profile1">
                    <a href="javascript:void(0);">
                           <h5> <?php echo ucwords($freelancerhiredata[0]['fullname']) . ' '.ucwords($freelancerhiredata[0]['username']); ?></h5>
                           </a>
                           <div class="profile-text">

                     <?php
                     
                     if($returnpage == ''){
                     if($freelancerhiredata[0]['designation'] == '')
                     {
                     ?>
                     <a id="designation" class="designation" title="Designation">Current Work</a>

                     <?php }else{?> 
                      <a id="designation" class="designation" title="<?php echo ucwords($freelancerhiredata[0]['designation']); ?>"><?php echo ucwords($freelancerhiredata[0]['designation']); ?></a>
                     <?php }} else {echo ucwords($freelancerhiredata[0]['designation']);}
                     ?>
                      </div>
                           
    <div  class="add-post-button">
        <?php if($returnpage == ''){ ?>
        <a class="btn btn-3 btn-3b" href="<?php echo base_url('freelancer/freelancer_add_post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Add Post</a>
        <?php }?>
  </div>
                      </div>
                      <!-- The Modal -->
                    <!-- <div id="myModal" class="modal"> -->
                      <!-- Modal content --><div class="col-md-2"></div>
                      <!-- <div class="modal-content col-md-8"> -->
                        <!-- <span class="close">&times;</span> -->
                        <!-- <fieldset></fieldset> -->
                   <!--       <?php //echo form_open(base_url('freelancer/hire_designation'), array('id' => 'hiredesignation','name' => 'hiredesignation', 'class' => 'clearfix')); ?>

  <fieldset class="col-md-8"> <input type="text" name="designation" id="designation" placeholder="Enter Your Designation" value="<?php echo $freehiredata[0]['designation']; ?>">

  <?php //echo form_error('designation'); ?>
  </fieldset>

         <input type="hidden" name="hitext" id="hitext" value="1">
  <fieldset class="col-md-2"><input type="submit"  id="submitdes" name="submitdes" value="Submit"></fieldset>
                        <?php echo form_close();?>
  
                    
                     
                    </div>
</div> -->

                     <div class="col-md-8 col-sm-7">
                        <div class="common-form">
                            <div class="job-saved-box">
                                <h3>Employer Details</h3>

                                <div class=" fr rec-edit-pro">
                                 <?php 
                                    $userid = $this->session->userdata('aileenuser');

                                    if($freelancerhiredata[0]['user_id'] ===  $userid){ 
                                    ?>
                               <ul>
                           <!--     <li> <a href="<?php //echo base_url('freelancer_hire/freelancer_hire_basic_info'); ?>">Edit </a> </li>
                                    <li>  <a href="<?php //echo base_url('freelancer/deactivate_hire/'. $this->session->userdata('aileenuser')); ?>" onclick="return confirm('Are you sure you want to Deactivate?')">Deactivate </a>
                                  </li> -->
                                    </ul>

                                     <?php }?>
                                    </div> 
                                

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
                                                <div class="profile-job-profile-button clearfix">
                                                    <div class="profile-job-details">
                                                        <ul>
           <li> <p class="details_all_tital "> Basic Information</p> </li>
                                                          
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                     <li> <b>First Name</b> <span> <?php echo $freelancerhiredata[0]['fullname'];?> </span>
                                                        </li>
                                                     <li> <b>Last Name</b> <span> <?php echo $freelancerhiredata[0]['username'];?> </span>
                                                        </li>
                                                       
                                                        <li> <b>Email </b><span> <?php echo $freelancerhiredata[0]['email'];?></span>
                                                        </li>
                                                        <li><b> Phone Number</b> <span><?php echo $freelancerhiredata[0]['phone'];?></span> </li>
                                                             <li> <b>Skype Id </b> <span> <?php echo $freelancerhiredata[0]['skyupid'];?> </span>
                                                        </li> 
                                                    </ul>
                                                </div>
                                                 <div class="profile-job-post-title clearfix">
                                                <div class="profile-job-profile-button clearfix">
                                                 <div class="profile-job-details">
                                                        <ul>
             <li> <p class="details_all_tital "> Address</p> </li>
                                                          
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="profile-job-profile-menu">
                                                    <ul class="clearfix">
                                                        <li> <b> Country</b> <span> <?php echo  $this->db->get_where('countries',array('country_id' => $freelancerhiredata[0]['country']))->row()->country_name;  ?> </span>
                                                        </li>
                                                       
                                                        <li> <b>State </b><span><?php echo  
                                                        $this->db->get_where('states',array('state_id' => $freelancerhiredata[0]['state']))->row()->state_name;  ?> </span>
                                                        </li>
                                                        <li><b> City</b> <span><?php echo  
                                                        $this->db->get_where('cities',array('city_id' => $freelancerhiredata[0]['city']))->row()->city_name;  ?></span> </li>
                                                           
                                                         <li> <b>Pincode </b><span><?php echo $freelancerhiredata[0]['pincode'];?></span>
                                                        </li>
                 <li> <b>Postal Address </b><span><p> <?php echo $freelancerhiredata[0]['address'];?> 
                 </p></span>
                 </li>
                                                      
                               </ul>
                         </div>
                         </div>
    
           <div class="profile-job-post-title clearfix">
            <div class="profile-job-profile-button clearfix">
               <div class="profile-job-details">
                    <ul>
          
          <li><p class="details_all_tital ">Professional Information</p></li>
                                                          
               </ul>
                     </div>
                   </div>
             <div class="profile-job-profile-menu">
                  <ul class="clearfix">
            <li> <b>Professional Information </b> <span> 
            <p>  <?php echo $this->common->make_links($freelancerhiredata[0]['professional_info']);?> 
            </p></span>
            </li>
                                                      
                                                    
                                                    </ul>
                                                </div>
                                                </div> 
                                                        <div class="profile-job-post-title clearfix">
                                        
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

       <?php echo $footer;?>
        </footer>
<!-- model for popup start -->
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
                    <!-- model for popup -->
<!-- Bid-modal-2  -->
                        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
                            <div class="modal-dialog modal-lm">
                                <div class="modal-content">
                                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                                    <div class="modal-body">
                                        <span class="mes">
                                            <div id="popup-form">
                                                <?php echo form_open_multipart(base_url('freelancer/user_image_insert'), array('id' => 'userimage','name' => 'userimage', 'class' => 'clearfix')); ?>
                                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                                <input type="hidden" name="hitext" id="hitext" value="4">
                                                 <div class="popup_previred">
                                                <img id="preview" src="#" alt="your image"/>
                                               
                                               </div>
                                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
                                                <?php echo form_close(); ?>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Model Popup Close -->


</body>

</html>

<!-- script for skill textbox automatic start (option 2)-->

  

 <script src="<?php echo base_url('js/jquery.js'); ?>"></script>         
    

    <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
    

     <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
     <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>


<!-- script for skill textbox automatic end (option 2)-->
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
<script>

var data1= <?php echo json_encode($city_data); ?>;
//alert(data1);

        
$(function() {
    // alert('hi');
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



                        <script>
                            function updateprofilepopup(id) {
                                $('#bidmodal-2').modal('show');
                            }
                        </script>


  <script type="text/javascript">
function checkvalue(){
   //alert("hi");
  var searchkeyword=document.getElementById('tags').value;
  var searchplace=document.getElementById('searchplace').value;
  // alert(searchkeyword);
  // alert(searchplace);
  if(searchkeyword == "" && searchplace == ""){
  //   alert('Please enter Keyword');
    return false;
  }
}
</script>
 

<!-- <script>
//select2 autocomplete start for skill
$('#searchskills').select2({
        
        placeholder: 'Find Your Skills',
       
        ajax:{

         
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
       
        ajax:{

         
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
 -->


<!-- cover image start -->
<script>
function myFunction() {
  // alert("hi");
   document.getElementById("upload-demo").style.visibility = "hidden";
   document.getElementById("upload-demo-i").style.visibility = "hidden";
   document.getElementById('message1').style.display = "block";

  // setTimeout(function () { location.reload(1); }, 5000);
   
   }
  

   function showDiv() {
    // alert(7855);
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
  // alert("thank you");
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {

    $.ajax({
       url: "<?php echo base_url(); ?>freelancer/ajaxpro_hire",
      
      type: "POST",
      data: {"image":resp},
      success: function (data) {
        html = '<img src="' + resp + '" />';
         if(html){
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
  // alert("hiiiii");
  
  
  var reader = new FileReader();
  //alert(reader);
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
      
    }
    reader.readAsDataURL(this.files[0]);

    

});

$('#upload').on('change', function () { 

  var fd = new FormData();
 fd.append( "image", $("#upload")[0].files[0]);

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

     if (size > 4194304)
        {
           //show an alert to the user
           alert("Allowed file size exceeded. (Max. 4 MB)")

           document.getElementById('row1').style.display = "none";
            document.getElementById('row2').style.display = "block";
            

           //reset file upload control
           return false;
        }


 
    $.ajax({

        url: "<?php echo base_url(); ?>freelancer/image_hire",
        type: "POST",
        data: fd,
        processData: false,
        contentType: false,
        success:function(response){
          //alert(response);

        }
      });
    //alert(789);
  });

//aarati code end
</script>
<!-- cover image end -->
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
 

<!-- popup form edit END -->
<script>
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
                                 if (html.match(/^\s*$/) || html == '') { 
                                html = "Current Work";
                                }
                                viewableText.html(html);
                                $(this).replaceWith(viewableText);
                                // setup the click event for this new div
                                viewableText.click(divClicked);

                                $.ajax({
                                    url: "<?php echo base_url(); ?>freelancer/hire_designation",
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
  <!-- popup for file type -->
  <script>
                        function picpopup() {
                            
                      
            $('.biderror .mes').html("<div class='pop_content'>Image Type is not Supported");
            $('#bidmodal').modal('show');
                        }
                    </script>
                   

<!-- all popup close close using esc start -->
 <script type="text/javascript">

     $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal-2').modal('hide');
    }
});  


 </script>
 <!-- all popup close close using esc end -->