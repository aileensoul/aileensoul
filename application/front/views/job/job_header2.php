

<!--post save success pop up style end -->

<style>
  
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

<style type="text/css">
  
 .dropdown-content_hover{   display: none;
    position: absolute;
    color: #3b5283;
    background-color: #fff;
    min-width: 139px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-top: 3px;
    z-index: 1;
    left: -25px;
    border-radius: 4px;}
</style>
   
<header>

    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">
                 
                    <div class="col-sm-7 col-md-7 ">
                        <div class="job-search-box1 clearfix">
                        <?php echo $job_search; ?>
                        </div>
                    </div>
                  <div class="col-sm-5 col-md-5">
                       <div class="">
                            <ul class="">
                                <li id="art_profile" <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_all_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_all_post'); ?>" title="Home">Home</a>
                                    </li>
                                <!-- Friend Request Start-->

                                     <li>
                                <!-- Friend Request End-->

<div class="dropdown_hover">
  <span id="art_profile" class="profiletitle" style="font-size: 13px;" >Job Profile <i class="fa fa-angle-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
      <a href="<?php echo base_url('job/job_printpreview'); ?>" title="View Profile"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
      <a href="<?php echo base_url('job/job_basicinfo_update'); ?>" title="Edit Profile"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a>

      <?php
      $userid = $this->session->userdata('aileenuser');
      ?>
      <a onClick="deactivate(<?php echo $userid; ?>)" title="Deactive Profile"><i class="fa fa-minus-circle" aria-hidden="true"></i> Deactive Profile</a>
  </div>
</div>
</li>
                

                                     <!-- Friend Request End-->

                                <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                        </div> 
                    </div>
                  
                    
                </div>
            </div>
        </div>
       </div> 
    </header>

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


    <script type="text/javascript">
  

$(document).ready(function(){
    $('.dropdown_hover').click(function(event){
        event.stopPropagation();
         $(".dropdown-content_hover").slideToggle("fast");
    });
    $(".dropdown-content_hover").on("dropdown_hover", function (event) {
        event.stopPropagation();
    });
});

$(document).on("dropdown_hover", function () {
    $(".dropdown-content_hover").hide();
});

$(document).ready(function() {
     $("body").click(function(event) {
        $(".dropdown-content_hover").hide();
        event.stopPropagation();
    });
 
});
</script>


<script type="text/javascript">

  function deactivate(clicked_id) { 
      $('.biderror .mes').html("<div class='pop_content'> Are you sure you want to deactive your job_profile?.<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='deactivate_profile(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
          $('#bidmodal').modal('show');
 }

 function deactivate_profile(clicked_id){

                  $.ajax({
                      type: 'POST',
                      url: '<?php echo base_url() . "job/deactivate" ?>',
                      data: 'id=' + clicked_id,
                        success: function (data) {
                          window.location= "<?php echo base_url() ?>dashboard";
                                    
                                }
                            });



 }
 </script>