<!-- menubar --> 
<?php
 $returnpage= $_GET['page'];
 $userid = $this->session->userdata('aileenuser');?>
 <div class="profile-main-rec-box-menu col-sm-12 col-md-12 col-lg-12 padding_less_right">

<div class="left-side-menu col-md-2">  </div>
<div class="right-side-menu col-md-6 padding_less_right">  
    <ul class="">
                                <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_printpreview'){?> class="active" <?php } ?>>

                                     <?php if($returnpage == 'recruiter'){?>
     <a title="Details" href="<?php echo base_url('job/job_printpreview/'.$this->uri->segment(3).'?page='.$returnpage); ?>">Details</a>
        <?php }else{?>
     <a title="Details" href="<?php echo base_url('job/job_printpreview/'); ?>">Details</a>
        <?php }?>

                               
                                    </li>
 <?php
                                    if(($this->uri->segment(1) == 'job') && ($this->uri->segment(2) == 'job_all_post' || $this->uri->segment(2) == 'job_printpreview' || $this->uri->segment(2) == 'job_resume' || $this->uri->segment(2) == 'job_save_post' || $this->uri->segment(2) == 'job_applied_post') && ($this->uri->segment(3) == $this->session->userdata('aileenuser')|| $this->uri->segment(3) == '')) { ?>

                                    <!-- <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_resume'){?> class="active" <?php } ?>><a title="Resume" href="<?php echo base_url('job/job_resume'); ?>">Resume</a>
                                    </li> -->

                                     <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_save_post'){?> class="active" <?php } ?>><a title="Saved Job" href="<?php echo base_url('job/job_save_post'); ?>">Saved </a>
                                    </li>

                                    <li <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_applied_post'){?> class="active" <?php } ?>><a title="Applied Job" href="<?php echo base_url('job/job_applied_post'); ?>">Applied </a>
                                    </li>

                                    <?php }?>

      
</ul>
</div>

       <div class="col-md-3 padding_less_right" style="width: 32%">
                <div class="flw_msg_btn fr">
                    <ul>

                         <!-- <li class="fruser2">
                                <div id="unfollowdiv">
                                <a id="unfollow2" onclick="unfollowuser(2)"> Following</a>
                                </div>
                        </li> -->
                        
                       <?php 
                       //echo $this->uri->segment(3);
                       //echo $userid; die();

        if($this->uri->segment(3) != ""){ 
            if($this->uri->segment(3) != $userid){
                ?>
                         
                         <?php
              
            $contition_array = array('from_id' => $userid, 'to_id' => $this->uri->segment(3), 'save_type' => 1, 'status' => '0');
             $data = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                //echo "<pre>"; print_r($data); die();
             if ($data) {
          ?> 
                        <li> 
                 <a class="button saved save_saved_btn">Saved</a>
                           

                           <!--  <input type="hidden" id="<?php echo 'hideenuser' . $this->uri->segment(3); ?>" value= "<?php echo $this->uri->segment(3); ?>"> -->
                    
                        </li>
                                                                <?php } else{ ?>
                        <li> 
                         <a id="<?php echo $this->uri->segment(3); ?>" onClick="savepopup(<?php echo $this->uri->segment(3); ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $this->uri->segment(3); ?> button save_saved_btn">
                        Save
                    </a>
                        </li>
                                                                <?php } ?>
                       <li> <a href="<?php echo base_url('chat/abc/' . $this->uri->segment(3)); ?>">Message</a> </li>
                       <?php } }?>
                    </ul>
                </div>
            </div>
        <!-- <div class="col-md-3">

        </div> -->
</div>

