



<!--post save success pop up style strat -->
<style type="text/css">
  .dropdown-content_hover {
    display: none;
    position: absolute;
    color: #3b5283;
    background-color: #fff;
    min-width: 180px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-top: 3px;
    z-index: 1;
    left: 25px;
    border-radius: 9px;
    padding-bottom: 7px;
} .dropdown-content_hover::before {
    /* top: -1px; */
    content: '';
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    color: transparent;
    border: 9px solid black;
    border-color: transparent transparent #fff;
    margin-top: -18px;
    /* margin-left: 104px; */
    right: 9px;
</style>

<!--post save success pop up style end -->
<?php if(($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_apply_post')){?>


<header>
    <div class="bg-search">
        <div class="header2 headerborder animated fadeInDownBig">
            <div class="container">
                <div class="row">
                      
                    <?php echo $freelancer_post_search; ?>
                  <div class="col-sm-5 col-md-5 col-xs-6 fw-479">
                      <div class="search-mob-block">
                                 <div class="">
                                     <a href="#search">
                                     <label><i class="fa fa-search" aria-hidden="true"></i></label>
                                     </a>
                                 </div>
                                 <div id="search">
                                    <button type="button" class="close">×</button>
                                    <form>
                                        <div class="new-search-input">
                                            <input type="search" value="" placeholder="Find Your Job" />
                                            <input type="search" value="" placeholder="Find Your Location" />
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                             </div>
                       <div class=" ">
                            <ul class="" id="dropdownclass">
                               
                                  
      <li <?php if(($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_apply_post')){?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_apply_post'); ?>">Home</a>
                                    </li>

                                <!-- Friend Request Start-->

                              <li>
  


<div class="dropdown_hover">
  <span id="art_profile">Freelancer Profile <i class="fa fa-caret-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
                  <span class="my_account">
                                        <div class="my_S">Account</div>
                                            
      </span>
    <a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><span class="h2-img h2-srrt"></span> View Profile</a>
    <a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>"><span class="h3-img h2-srrt"></span> Edit Profile</a>

    <?php
      $userid = $this->session->userdata('aileenuser');
      ?>
    <a onClick="deactivate(<?php echo $userid; ?>)"><span class="h4-img h2-srrt"></span> Deactive Profile</a>
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
    <?php }
    else
      { ?>
        <header>
    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">
                      
                    <?php echo $freelancer_post_search; ?>
                  <div class="col-sm-5 col-md-5 col-xs-6 fw-479">
                      <div class="search-mob-block">
                                 <div class="">
                                     <a href="#search">
                                     <label><i class="fa fa-search" aria-hidden="true"></i></label>
                                     </a>
                                 </div>
                                 <div id="search">
                                    <button type="button" class="close">×</button>
                                    <form>
                                        <div class="new-search-input">
                                            <input type="search" value="" placeholder="Find Your Job" />
                                            <input type="search" value="" placeholder="Find Your Location" />
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                             </div>
                       <div class=" ">
                            <ul class="" id="dropdownclass">
                               
                                  
      <li <?php if(($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_apply_post')){?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_apply_post'); ?>">Home</a>
                                    </li>

                                <!-- Friend Request Start-->

                              <li>
  


<div class="dropdown_hover">
  <span id="art_profile">Freelancer Profile <i class="fa fa-caret-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
                  <span class="my_account">
                                        <div class="my_S">Account</div>
                                            
      </span>
    <a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><span class="h2-img h2-srrt"></span> View Profile</a>
    <a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>"><span class="h3-img h2-srrt"></span> Edit Profile</a>

    <?php
      $userid = $this->session->userdata('aileenuser');
      ?>
    <a onClick="deactivate(<?php echo $userid; ?>)"><span class="h4-img h2-srrt"></span> Deactive Profile</a>
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

      <?php  }?>



<!-- Bid-modal  -->
                    <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
                        <div class="modal-dialog modal-lm deactive">
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
      $('.biderror .mes').html("<div class='pop_content'> Are you sure you want to deactive your Freelancer Apply profile?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='deactivate_profile(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
          $('#bidmodal').modal('show');
 }

 function deactivate_profile(clicked_id){

                  $.ajax({
                      type: 'POST',
                      url: '<?php echo base_url() . "freelancer/deactivate" ?>',
                      data: 'id=' + clicked_id,
                        success: function (data) {
                          window.location= "<?php echo base_url() ?>dashboard";
                                    
                                }
                            });



 }
 </script>


 <!-- all popup close close using esc start -->
 <script type="text/javascript">
   

   $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        $( "#dropdown-content_hover" ).hide();
    }
});  


    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal').modal('hide');
    }
});  

 </script>
 <!-- all popup close close using esc end -->