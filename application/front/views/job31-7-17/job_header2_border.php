

<!--post save success pop up style end -->

<style type="text/css">
  
 .dropdown-content_hover{   display: none;
    position: absolute;
    color: #3b5283;
    background-color: #fff;
    min-width: 180px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-top: 3px;
    z-index: 1;
    left: -23px;
    border-radius: 4px;
 padding-bottom: 7px;}

</style>

 <?php if(($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_all_post')){?>
   
<header>

    <div class="bg-search">
        <div class="header2 headerborder animated fadeInDownBig">
            <div class="container">
                <div class="row">
                 
                    <div class="col-sm-7 col-md-7 col-xs-7 hidden-mob ">
                        <div class="job-search-box1 clearfix">
                        <?php echo $job_search; ?>
                        </div>
                    </div>
                  <div class="col-sm-5 col-md-5 col-xs-12 h2-smladd mob-width">
                       <div class="search-mob-block">
                                 <div class="">
                                     <a href="#search">
                                     <label><i class="fa fa-search" aria-hidden="true"></i></label>
                                     </a>
                                 </div>
                                 <div id="search">
                                    <button type="button" class="close">×</button>
                                    <form action=<?php echo base_url('search/job_search')?> method="get">
                                        <div class="new-search-input">
                                            <input type="search" id="tags1" name="skills" value="" placeholder="Find Your Job" />
                                            <input type="search" id="searchplace1" name="searchplace" value="" placeholder="Find Your Location" />
                                            <button type="submit"  id="search_btn" class="btn btn-primary" onclick="return check();">Search</button>
                                        </div>
                                    </form>
                                </div>
                             </div>
                       <div class="">
                            <ul class="" id="dropdownclass">
                                <li id="art_profile" <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_all_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_all_post'); ?>" title="Home"><span class="bu_home"></span></a>
                                    </li>
                                <!-- Friend Request Start-->
<!-- <h3>hello</h3> -->
                                     <li id="Inbox_link " class="job_con">
                                        <?php if ($message_count) { ?>
                                                           <!--  <span class="badge bg-theme"><?php //echo $message_count;  ?></span> -->
                                        <?php } ?>
                                        <a class="action-button shadow animate" href="#" id="InboxLink" onclick = "return getmsgNotification()"><em class="hidden-xs"> </em> <span class="img-msg"></span>

                                            <span id="message_count"></span>
                                        </a>

                                        <div id="InboxContainer">
                                            <div id="InboxBody" class="Inbox">
                                                <div id="notificationTitle">Messages</div>

                                                <div id="notificationsmsgBody" class="notificationsmsg">
                                                </div>
                                            </div>
                                    </li> 

                                     <li>
                                <!-- Friend Request End-->

<div class="dropdown_hover">
  <span id="art_profile" class="profiletitle" >Job Profile <i class="fa fa-caret-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
      <span class="my_account">
                                        <div class="my_S">Account</div>
                                            
      </span>
      <a href="<?php echo base_url('job/job_printpreview'); ?>" title="View Profile"><span class="h2-img h2-srrt"></span> View Profile</a>
      <a href="<?php echo base_url('job/job_basicinfo_update'); ?>" title="Edit Profile"><span class="h3-img h2-srrt"></span>  Edit Profile</a>

      <?php
      $userid = $this->session->userdata('aileenuser');
      ?>
      <a onClick="deactivate(<?php echo $userid; ?>)" title="Deactive Profile"><span class="h4-img h2-srrt"></span>  Deactive Profile</a>
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
    {?>

      <header>

    <div class="bg-search">
        <div class="header2">
            <div class="container">
                <div class="row">
                 
                    <div class="col-sm-7 col-md-7 col-xs-7 hidden-mob ">
                        <div class="job-search-box1 clearfix">
                        <?php echo $job_search; ?>
                        </div>
                    </div>
                  <div class="col-sm-5 col-md-5 col-xs-5 mob-width">
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
                                            <input type="search" id="tags" name="skills" value="" placeholder="Find Your Job" />
                                            <input type="search" id="searchplace" name="searchplace" value="" placeholder="Find Your Location" />
                                            <button type="submit" onclick="return checkvalue();"  id="search_btn" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                             </div>
                       <div class="">
                            <ul class="" id="dropdownclass">
                                <li id="art_profile" <?php if($this->uri->segment(1) == 'job' && $this->uri->segment(2) == 'job_all_post'){?> class="active" <?php } ?>><a href="<?php echo base_url('job/job_all_post'); ?>" title="Home"><span class="bu_home"></a>
                                    </li>
                                <!-- Friend Request Start-->
<!-- <h3>hello</h3> -->                     
                        
                                     <li id="Inbox_link " class="job_con">
                                        <?php if ($message_count) { ?>
                                                           <!--  <span class="badge bg-theme"><?php //echo $message_count;  ?></span> -->
                                        <?php } ?>
                                        <a class="action-button shadow animate" href="#" id="InboxLink" onclick = "return getmsgNotification()"><em class="hidden-xs"> </em> <span class="img-msg"></span>

                                            <span id="message_count"></span>
                                        </a>

                                        <div id="InboxContainer">
                                            <div id="InboxBody" class="Inbox">
                                                <div id="notificationTitle">Messages</div>

                                                <div id="notificationsmsgBody" class="notificationsmsg">
                                                </div>
                                            </div>
                                    </li> 
                                     <li>
                                <!-- Friend Request End-->

<div class="dropdown_hover">
  <span id="art_profile" class="profiletitle" >Job Profile <i class="fa fa-caret-down" aria-hidden="true"></i></span>
  <div class="dropdown-content_hover" id="dropdown-content_hover">
      <span class="my_account">
                                        <div class="my_S">Account</div>
                                            
      </span>
      <a href="<?php echo base_url('job/job_printpreview'); ?>" title="View Profile"><span class="h2-img h2-srrt"></span> View Profile</a>
      <a href="<?php echo base_url('job/job_basicinfo_update'); ?>" title="Edit Profile"><span class="h3-img h2-srrt"></span>  Edit Profile</a>

      <?php
      $userid = $this->session->userdata('aileenuser');
      ?>
      <a onClick="deactivate(<?php echo $userid; ?>)" title="Deactive Profile"><span class="h4-img h2-srrt"></span>  Deactive Profile</a>
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

    ?>

    

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
       //event.stopPropagation();
    });
});

$(document).on("dropdown_hover", function () {
    $(".dropdown-content_hover").hide(600);
});

$(document).ready(function() {
     $("body").click(function(event) {
        $(".dropdown-content_hover").hide(600);
        // event.stopPropagation();
    });
 
});

</script>

<script type="text/javascript">

  function deactivate(clicked_id) { 
      $('.biderror .mes').html("<div class='pop_content'> Are you sure you want to deactive your job profile?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='deactivate_profile(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
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
 
 
<script type="text/javascript" charset="utf-8">

    function addmsg1(type, msg)
    {
        if (msg == 0)
        {
            $("#message_count").html('');
            $("span#message_count").removeAttr("style");
            $('#InboxLink').removeClass('msg_notification_available');
        } else
        {
            $('#message_count').html(msg);
            $('#message_count').css({"background-color": "#FF4500", "padding": "3px"});
            $('#InboxLink').addClass('msg_notification_available');
            //alert("welcome");
        }


    }

    function waitForMsg1()
    {
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>notification/select_msg_noti/1",

            async: true,
            cache: false,
            timeout: 50000,

            success: function (data) {
                addmsg1("new", data);
                setTimeout(
                        waitForMsg1,
                        10000
                        );
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
//                addmsg1("error", textStatus + " (" + errorThrown + ")");
//                setTimeout(
//                        waitForMsg1,
//                        15000);
            }
        });
    }
    ;

    $(document).ready(function () {

        waitForMsg1();

    });
    $(document).ready(function () {
        $menuLeft = $('.pushmenu-left');
        $nav_list = $('#nav_list');

        $nav_list.click(function () {
            $(this).toggleClass('active');
            $('.pushmenu-push').toggleClass('pushmenu-push-toright');
            $menuLeft.toggleClass('pushmenu-open');
        });
    });

</script>
<!-- script for fetch all unread message notification end-->

 
 
<!-- script for update all read notification start-->
<script type="text/javascript">

    function getmsgNotification() {
        msgNotification();
        msgheader();
    }

    function msgNotification() {
        // first click alert('here'); 
        $.ajax({
            url: "<?php echo base_url(); ?>notification/update_msg_noti/1",
            type: "POST",
            //data: {uid: 12341234}, //this sends the user-id to php as a post variable, in php it can be accessed as $_POST['uid']
            success: function (data) {
                data = JSON.parse(data);
                //alert(data);
                //update some fields with the updated data
                //you can access the data like 'data["driver"]'
            }
        });
    }
    function msgheader()
    {
        // $("#fad" + clicked_id).fadeOut(6000);
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . "notification/msg_header/" . $this->uri->segment(3) . "" ?>',
            data: 'message_from_profile=1&message_to_profile=2',
            success: function (data) {
                $('#' + 'notificationsmsgBody').html(data);
            }
        });

    }
</script>
 <!-- all popup close close using esc end -->