
<!-- <?php //echo $postid;  die(); ?> -->
<!-- start head --> 
<?php echo $head; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />

<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<!--post save success pop up style strat -->


<!--post save success pop up style end -->
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>

<?php echo $recruiter_header2_border; ?>

    <!-- END HEADER -->
  
    <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>
<body>

<div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">

    
    <div class="col-md-4">


   <div class="add-post-button">
     
      <a href="<?php echo base_url('recruiter/rec_post'); ?>"><div class="back">
        <div class="but1">
             Back To Post
        </div>
   </div></a>

   </div>


  </div>


      <!--- search end -->
        
                    <div class="col-md-7 col-sm-7 all-form-content">
                        <div class="common-form">
                            <div class="job-saved-box">

                                <h3>Applied candidate</h3>
                                <div class="contact-frnd-post">
                                    <div class="job-contact-frnd ">
                                           


<?php
if ($user_data) {
  foreach ($user_data as $row) {
    

?>
 <div class="profile-job-post-detail clearfix">
<div class="profile-job-post-title-inside clearfix"> <div class="profile-job-profile-button clearfix">



                                                            <div class="profile-job-post-location-name-rec">
                                                                <div style="display: inline-block; float: left;">
                                                                     <div  class="buisness-profile-pic-candidate">


                                                                     <?php
                                               $imageee= $this->config->item('job_profile_thumb_upload_path').$row['job_user_image'];
                                              if(file_exists($imageee) && $row['job_user_image'] != '') { ?>

                                                                     <img src="<?php echo base_url($this->config->item('job_profile_thumb_upload_path'). $row['job_user_image']); ?>" alt="" >

                                                          <?php 
                                                        }
                                                        else
                                                        {
                                                          
                                                            $a = $row['fname'];
                                                             $acr = substr($a, 0, 1);

                                                             $b = $row['lname'];
                                                             $acr1 = substr($b, 0, 1);
                                                               ?>
                                                              <div class="post-img-profile">
                                                          <?php echo  ucfirst(strtolower($acr)) . ucfirst(strtolower($acr1)); ?>
              
                                                               </div>

                                                           <!-- <img src="<?php //echo base_url(NOIMAGE); ?>" alt=""> -->

                                                           <?php }
                                                           ?>
                                                                            </div>

                     </div>
               <div class="designation_rec" style="float: left;">
                     <ul>
                         <li>
                             <a style="  font-size: 19px;
    font-weight: 600;" href="<?php echo base_url('job/job_printpreview/' . $row['userid'].'?page=recruiter'); ?>">
                <?php echo ucfirst(strtolower($row['fname'])) . ' ' . ucfirst(strtolower($row['lname'])); ?></a>
                          </li>
                         <li class="show">
                   <a  style="font-size: 19px;" href="javascript: void(0)">
                      <?php
                   if ($row['designation']) {
                       ?>
                   <?php echo $row['designation']; ?>
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
                                                
                                                  <div class="profile-job-profile-menu">
                                                   
                                                        <ul class="clearfix">
                                                        

                                         <?php 
                                                                            if ($row['work_job_title']) {
                                                                                $contition_array = array('status' => 'publish', 'title_id' => $row['work_job_title']);
                                                                                $jobtitle = $this->common->select_data_by_condition('job_title', $contition_array, $data = 'name', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                                ?>
                                                                            <li> <b> Job Title</b> <span>
    <?php echo $jobtitle[0]['name']; ?>
                                                                                </span>
                                                                            </li>

<?php } ?>
                                                                    <?php
                                                                    if ($row['keyskill']) {  $jobskil = array(); ?>
                                                                        
                                                                            <li> <b> Skills</b> <span>
                                                                        <?php $work_skill = explode(',', $row['keyskill']);
                                                                        foreach ($work_skill as $skill) {
                                                                            $contition_array = array('skill_id' => $skill);
                                                                            $skilldata = $this->common->select_data_by_condition('skill', $contition_array, $data = 'skill_id,skill', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str5 = '', $groupby = '');
                                                                            $jobskil[] = $skilldata[0]['skill'];
                                                                        } echo implode(',', $jobskil); ?>
                                                                                </span>
                                                                            </li>
                                                                            <?php } ?>

                                                                            <?php
                                                                            if ($row['work_job_industry']) {
                                                                                $contition_array = array('industry_id' => $row['work_job_industry']);
                                                                                $industry = $this->common->select_data_by_condition('job_industry', $contition_array, $data = 'industry_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                                ?>
                                                                            <li> <b> Industry</b> <span>
    <?php echo $industry[0]['industry_name']; ?>
                                                                                </span>
                                                                            </li>
                                                                    <?php } ?>
                                                                    <?php
                                                                    if ($row['work_job_city']) {
                                                                        $work_city = explode(',', $row['work_job_city']);
                                                                        foreach ($work_city as $city) {
                                                                            $contition_array = array('city_id' => $city);
                                                                            $citydata = $this->common->select_data_by_condition('cities', $contition_array, $data = 'city_id,city_name', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str5 = '', $groupby = '');
                                                                            if ($citydata) {
                                                                                $cities[] = $citydata[0]['city_name'];
                                                                            }
                                                                        }
                                                                        ?>
                                                                            <li> <b> Preferred Cites</b> <span>
    <?php echo implode(',', $cities); ?>                                                        
                                                                                </span>
                                                                            </li>
                                                                    <?php } ?> 
                                                      


                                     <!-- <li><b>Other Skill </b> 
                                    <span> <?php
                                     if($row['other_skill']){
                                    echo ucwords($row['other_skill']);
                                    }else{
                                      echo "-";
                                    } 
                                      ?></span>
                                                       
                                    </li> -->


  <?php 

$contition_array =array('user_id' => $row['userid'], 'experience' => 'Experience', 'status' => '1');

        //echo "<pre>"; print_r($other_skill);
  $experiance = $this->common->select_data_by_condition('job_add_workexp', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
  

if($experiance[0]['experience_year'] != ''){ ?>
  <?php 

            

            $total_work_year=0;
            $total_work_month=0;
            foreach ($experiance as $work1) {

            $total_work_year+=$work1['experience_year'];
            $total_work_month+=$work1['experience_month'];
            }
             ?>
          <li> <b> Total Experience</b>
              <span>
                   <?php
              if($total_work_month == '12 month' && $total_work_year =='0 year'){
                echo "1 year";
            }
             elseif($total_work_year !='0 year' && $total_work_month >= '12 month'){
                 $month = explode(' ', $total_work_year);
                 //print_r($month);
                                                $year=$month[0];
                                                $y=0;
                                                for($i=0;$i<=$y;$i++)
                                                {
                                                   if($total_work_month >= 12)
                                                   {
                                                      $year=$year + 1;
                                                      $total_work_month = $total_work_month - 12;
                                                      $y++;
                                               
                                                   }
                                                   else
                                                   {
                                                      $y=0;
                                                   }
                                                }

                                                
                                                 echo $year; echo "&nbsp"; echo "Year";
                                                 echo "&nbsp";
                                                 if($total_work_month != 0)
                                                 {
                                                   echo $total_work_month; echo "&nbsp"; echo "Month";
                                                }

            
            }
            else{
                echo $total_work_year; echo "&nbsp"; echo "Year";
            echo "&nbsp";
            echo $total_work_month; echo "&nbsp"; echo "Month";
            }   ?>
               </span>
                </li>
             <?php } else{ 

              if($row['experience'] == 'Fresher')
              {
              ?>
              <li> <b> Total Experience</b>
              <span><?php echo $row['experience']; ?></span>
                </li>
            <?php   } //if complete
            }//else complete
            ?>

                                <!--  <li><b> Location</b> <span>

                                 <?php //if($row['city_permenant']) { ?>
                                 <?php// $cache_time  =  //$this->db->get_where('cities',array('city_id' => $row['city_permenant']))->row()->city_name;  
                                         // echo $cache_time; ?>
                                       <?php// }else{ echo PROFILENA; }?>                   
                                    </span> </li> -->
<?php

$contition_array = array('user_id' => $row['userid']);
        $graduation_data = $this->common->select_data_by_condition('job_graduation', $contition_array, $data = '*', $sortby = 'job_graduation_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = ''); 
       // echo "<pre>";print_r($graduation_data);
       // echo  $graduation_data[0]['degree'];die();
        //echo $row['userid'];
 ?>
            <?php if($row['board_primary'] && $row['board_secondary'] && $row['board_higher_secondary'] && $graduation_data){ ?>
            <li>
              <b>Degree</b><span>
              <?php 
               $cache_time = $this->db->get_where('degree', array('degree_id' =>  $graduation_data[0]['degree']))->row()->degree_name;
                            if ($cache_time) {
                                             echo $cache_time;
                                             } else {
                                                 echo PROFILENA;
                                                                        }
                                                                      ?>

               </span>
               </li>
               <li><b>Stream</b>
                 <span>
                   <?php

                     $cache_time = $this->db->get_where('stream', array('stream_id' =>  $graduation_data[0]['stream']))->row()->stream_name;
                             if ($cache_time) {
                                      echo $cache_time;
                                               } else {
                                                 echo PROFILENA;
                                                      }
                                                                        
                   ?>
                 </span>
              </li>
             <?php }
              elseif($row['board_secondary'] && $row['board_higher_secondary'] &&  $graduation_data){
                ?>
               <li>
              <b>Degree</b><span>
            

<?php 
               $cache_time = $this->db->get_where('degree', array('degree_id' =>  $graduation_data[0]['degree']))->row()->degree_name;
                            if ($cache_time) {
                                             echo $cache_time;
                                             } else {
                                                 echo PROFILENA;
                                                                        }
                                                                      ?>

               </span>
               </li>
               <li><b>Stream</b>
                 <span>
                   <?php

                     $cache_time = $this->db->get_where('stream', array('stream_id' =>  $graduation_data[0]['stream']))->row()->stream_name;
                                    if ($cache_time) {
                                                                            echo $cache_time;
                                                                        } else {
                                                                            echo PROFILENA;
                                                                        }
                                                                        
                   ?>
                 </span>
              </li>


                <?php }
              elseif($row['board_higher_secondary'] &&  $graduation_data){?>

              <li>
              <b>Degree</b><span>
<?php 
               $cache_time = $this->db->get_where('degree', array('degree_id' =>  $graduation_data[0]['degree']))->row()->degree_name;
                            if ($cache_time) {
                                             echo $cache_time;
                                             } else {
                                                 echo PROFILENA;
                                                                        }
                                                                      ?>

               </span>
               </li>
               <li><b>Stream</b>
                 <span>
                   <?php

                  $cache_time = $this->db->get_where('stream', array('stream_id' =>  $graduation_data[0]['stream']))->row()->stream_name;
                                                                        if ($cache_time) {
                                                                            echo $cache_time;
                                                                        } else {
                                                                            echo PROFILENA;
                                                                        }
                                                                        
                   ?>
                 </span>
              </li>

              <?php } else if($row['board_secondary'] &&  $graduation_data){
             ?>
               <li>
              <b>Degree</b><span>
<?php 
               $cache_time = $this->db->get_where('degree', array('degree_id' =>  $graduation_data[0]['degree']))->row()->degree_name;
                            if ($cache_time) {
                                             echo $cache_time; 
                                             } else {
                                                 echo PROFILENA;
                                                                        }
                                                                      ?>

               </span>
               </li>
               <li><b>Stream</b>
                 <span>
                   <?php

                   $cache_time = $this->db->get_where('stream', array('stream_id' =>  $graduation_data[0]['stream']))->row()->stream_name;
                              if ($cache_time) {
                                  echo $cache_time;
                                          } else {
                                              echo PROFILENA;
                                              }
                                                                        
                   ?>
                 </span>
              </li>

             <?php } elseif($row['board_primary'] &&  $graduation_data){?>
               <li>
              <b>Degree</b><span>
<?php 
               $cache_time = $this->db->get_where('degree', array('degree_id' =>  $graduation_data[0]['degree']))->row()->degree_name;
                            if ($cache_time) {
                                             echo $cache_time;
                                             } else {
                                                 echo PROFILENA;
                                                                        }
                                                                      ?>

               </span>
               </li>
               <li><b>Stream</b>
                 <span>
                   <?php

                        $cache_time = $this->db->get_where('stream', array('stream_id' =>  $graduation_data[0]['stream']))->row()->stream_name;
                                        if ($cache_time) {
                                                      echo $cache_time;
                                                   } else {
                                                        echo PROFILENA;
                                                        }
                                                                        
                   ?>
                 </span>
              </li>

             <?php } elseif($row['board_primary'] && $row['board_secondary'] && $row['board_higher_secondary']){?>
             <li><b>Board of Higher Secondary</b>
                <span>
                  <?php echo $row['board_higher_secondary'];?>
                </span>
                </li>
                <li><b>Percentage of Higher Secondary</b>
                <span>
                  <?php echo $row['percentage_higher_secondary'];?>
                </span>
                </li>


              <?php } elseif($row['board_secondary'] && $row['board_higher_secondary']){ ?>
             <li><b>Board of Higher Secondary</b>
                <span>
                  <?php echo $row['board_higher_secondary'];?>
                </span>
                </li>
                <li><b>Percentage of Higher Secondary</b>
                <span>
                  <?php echo $row['percentage_higher_secondary'];?>
                </span>
                </li>

               <?php } elseif($row['board_primary'] && $row['board_higher_secondary']){ ?>


<li><b>Board of Higher Secondary</b>
                <span>
                  <?php echo $row['board_higher_secondary'];?>
                </span>
                </li>
                <li><b>Percentage of Higher Secondary</b>
                <span>
                  <?php echo $row['percentage_higher_secondary'];?>
                </span>
                </li>


                 <?php }elseif($row['board_primary'] && $row['board_secondary']){?>

 <li><b>Board of Secondary</b>
                <span>
                  <?php echo $row['board_secondary'];?>
                </span>
                </li>
                <li><b>Percentage of Secondary</b>
                <span>
                  <?php echo $row['percentage_secondary'];?>
                </span>
                </li>

                 <?php } elseif($graduation_data){?>

<li>
              <b>Degree</b><span>
            

<?php 
               $cache_time = $this->db->get_where('degree', array('degree_id' =>  $graduation_data[0]['degree']))->row()->degree_name;
                            if ($cache_time) {
                                             echo $cache_time;
                                             } else {
                                                 echo PROFILENA;
                                                                        }
                                                                      ?>

               </span>
               </li>
               <li><b>Stream</b>
                 <span>
                   <?php

                 $cache_time = $this->db->get_where('stream', array('stream_id' => $graduation_data[0]['stream']))->row()->stream_name;
                              if ($cache_time) {
                                             echo $cache_time;
                                            } else {
                                             echo PROFILENA;
                                               }
                                                                        
                   ?>
                 </span>
              </li>

                  <?php }elseif($row['board_higher_secondary']){?>

                <li><b>Board of Higher Secondary</b>
                <span>
                  <?php echo $row['board_higher_secondary'];?>
                </span>
                </li>
                <li><b>Percentage of Higher Secondary</b>
                <span>
                  <?php echo $row['percentage_higher_secondary'];?>
                </span>
                </li>


                  <?php }elseif($row['board_secondary']){?> 

  <li><b>Board of Secondary</b>
                <span>
                  <?php echo $row['board_secondary'];?>
                </span>
                </li>
                <li><b>Percentage of Secondary</b>
                <span>
                  <?php echo $row['percentage_secondary'];?>
                </span>
                </li>

                  <?php } elseif($row['board_primary']){?>

 <li><b>Board of Primary</b>
                <span>
                  <?php echo $row['board_primary'];?>
                </span>
                </li>
                <li><b>Percentage of Primary</b>
                <span>
                  <?php echo $row['percentage_primary'];?>
                </span>
                </li>

                  <?php }else{?> <li> No Education </li> <?php }?>



 
   <li><b>E-mail</b>
      <span><?php
       echo $row['email'];
     ?></span>
     </li>

     <?php
              if($row['phnno'])
                {
      ?>
               <li><b>Mobile Number</b>
                      <span>

                  <?php    
                   echo $row['phnno'];
               ?></span>
               </li>
      <?php
            }
          ?>


               </ul>
             </div>
                                              
                  <div class="profile-job-profile-button clearfix">
                                     <div class="apply-btn fr">
                                                  
 <?php $userid = $this->session->userdata('aileenuser');
 if($userid != $row['userid']){ 
             
    $contition_array = array('from_id' => $userid, 'to_id' => $row['userid'], 'save_type' => 1, 'status' => '0');
    $savedata = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

     ?>

            <a  class="button invite_border" href="<?php echo base_url('chat/abc/' . $row['userid'].'/2/1'); ?>">Message</a>

            <?php  $contition_array = array('invite_user_id' => $row['userid'], 'post_id' => $postid);
        $userdata = $this->common->select_data_by_condition('user_invite', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
        if($userdata){ ?>
      <a href="#" class="button invited" id="<?php echo 'invited' . $row['userid']; ?>" style="cursor: default;"> Invited</a>      
         <?php }else{ ?>

              <a  href="#" class="button invite_border" id="<?php echo 'invited' . $row['userid']; ?>" onClick="inviteusermodel(<?php echo $row['userid']; ?>)"> Invite</a>
              <!-- <a href="#"><div class="button invite_border" id="<?php echo 'invited' . $row['user_id']; ?>" onClick="inviteuser(<?php echo $row['user_id']; ?>)"> Invite</div></a> -->
 <?php  } ?>



       <?php if ($savedata) { ?> 
<!--        <div id="invited" onclick="inviteuser()"> Invite</div> -->         
       
<a class="saved">Saved </a> 
       
     <?php } else { ?>
       <input type="hidden" id="<?php echo 'hideenuser' . $row['userid']; ?>" value= "<?php echo $data[0]['save_id']; ?>"> 
       <a class="button invite_border"  id="<?php echo $row['userid']; ?>" onClick="savepopup(<?php echo $row['userid']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $row['userid']; ?>">Save</a>
        <?php }
         
       
        } ?>
                                                </div> </div>
                                                
                                               <!--  <div class="profile-job-profile-button clearfix">
                                                    </div> -->
                                               
                                               
                                             </div>
                                        </div>

                            <?php }   } else {
                            ?>
                              <div class="art-img-nn">
         <div class="art_no_post_img">

           <img src="<?php echo base_url('img/job-no1.png')?>">
        
         </div>
         <div class="art_no_post_text">
          No Applied Candidate  Available.
         </div>
          </div>
                            <?php
                        }
                        ?>      
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







<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">

<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-3.min.css'); ?>"> -->
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>" />

<!-- script for skill textbox automatic end (option 2)-->

<!-- <script>
//select2 autocomplete start for skill
$('#searchskills').select2({
        
        placeholder: 'Find Your Skills',
       
        ajax:{

         
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
 --> 
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

<!-- Cover Image upload Start--> 

<script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script> 


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

var data1 = <?php echo json_encode($de); ?>;
//alert(data);

        
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

var data= <?php echo json_encode($demo); ?>;
//alert(data);

        
$(function() {
    // alert('hi');
$( "#tags1" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#tags1").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#tags1").val(ui.item.label);
    }
});
});
  
</script>

<script>

var data1 = <?php echo json_encode($de); ?>;
//alert(data);

        
$(function() {
    // alert('hi');
$( "#searchplace1" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data1, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#searchplace1").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#searchplace1").val(ui.item.label);
    }
});
});
  
</script>



<script>
$(document).ready(function()
{


/* Uploading Profile BackGround Image */
$('body').on('change','#bgphotoimg', function()
{

$("#bgimageform").ajaxForm({target: '#timelineBackground',
beforeSubmit:function(){},
success:function(){

$("#timelineShade").hide();
$("#bgimageform").hide();
},
error:function(){

} }).submit();
});



/* Banner position drag */
$("body").on('mouseover','.headerimage',function ()
{
var y1 = $('#timelineBackground').height();
var y2 =  $('.headerimage').height();
$(this).draggable({
scroll: false,
axis: "y",
drag: function(event, ui) {
if(ui.position.top >= 0)
{
ui.position.top = 0;
}
else if(ui.position.top <= y1 - y2)
{
ui.position.top = y1 - y2;
}
},
stop: function(event, ui)
{
}
});
});


/* Bannert Position Save*/
$("body").on('click','.bgSave',function ()
{
var id = $(this).attr("id");
var p = $("#timelineBGload").attr("style");
var Y =p.split("top:");
var Z=Y[1].split(";");
var dataString ='position='+Z[0];
$.ajax({
type: "POST",
url: "<?php echo base_url('recruiter/image_saveBG_ajax'); ?>",
data: dataString,
cache: false,
beforeSend: function(){ },
success: function(html)
{
if(html)
{
  window.location.reload();
$(".bgImage").fadeOut('slow');
$(".bgSave").fadeOut('slow');
$("#timelineShade").fadeIn("slow");
$("#timelineBGload").removeClass("headerimage");
$("#timelineBGload").css({'margin-top':html});
return false;
}
}
});
return false;
});



});
</script>
<!-- Cover Image upload Start--> 

<!-- save post start -->

<script type="text/javascript">
   function save_user(abc)
   {  
      
 var saveid = document.getElementById("hideenuser" + abc);

      $.ajax({ 
                type:'POST',
                url:'<?php echo base_url() . "recruiter/save_search_user" ?>',
                data:'user_id='+abc + '&save_id='+saveid.value,
                success:function(data){ 
                
                 $('.' + 'saveduser' + abc).html(data).addClass('saved');
                 

                }
            }); 
        
}
</script>

<!-- save post end -->

 <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script>
    function savepopup(id) { 
      //alert(id);
                        
      save_user(id);
//                       
    $('.biderror .mes').html("<div class='pop_content'>Candidate successfully saved.");
        $('#bidmodal').modal('show');
          }
        </script>
                    
                    
  <script type="text/javascript">
   

   function inviteusermodel(abc){
    //alert(abc);


    $('.biderror .mes').html("<div class='pop_content'>Do you want to invite this candidate for interview?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='inviteuser(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
    $('#bidmodal').modal('show');

   } 

   function inviteuser(clicked_id)
    {  

      var post_id = "<?php echo $postid; ?>";
       // alert(post_id);

     //alert(clicked_id);
      var post_id = "<?php echo $postid; ?>";
        //alert(post_id);

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "recruiter/invite_user" ?>',
            data: 'post_id=' + post_id + '&invited_user=' + clicked_id,
            success: function (data) { //alert(data);
                $('#' + 'invited' + clicked_id).html(data).addClass('invited').removeClass('invite_border').removeAttr("onclick");

               $('#' + 'invited' + clicked_id).css('cursor', 'default');


              //    $('.biderror .mes').html("<div class='pop_content'>Candidate invite successfully.");
              // $('#bidmodal').modal('show');
          }
           
        });
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
<script type="text/javascript">
function checkvalue(){
   //alert("hi");
  var searchkeyword=$.trim(document.getElementById('tags').value);
  var searchplace=$.trim(document.getElementById('searchplace').value);
  // alert(searchkeyword);
  // alert(searchplace);
  if(searchkeyword == "" && searchplace == ""){
     //alert('Please enter Keyword');
    return false;
  }
}
  
</script>
<!-- comment like script end -->

<!-- all popup close close using esc start -->
 <script type="text/javascript">
   

    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal').modal('hide');
    }
});  

 </script>
 <!-- all popup close close using esc end -->