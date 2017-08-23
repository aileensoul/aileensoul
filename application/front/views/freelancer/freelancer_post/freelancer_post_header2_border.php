

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
    <header>
        <div class="bg-search">
            <?php if (($this->uri->segment(1) == 'freelancer' && $this->uri->segment(2) == 'freelancer_apply_post')) { ?>
                <div class="header2 headerborder animated fadeInDownBig">
                <?php } else { ?>
                    <div class="header2 headerborder">
                    <?php } ?>
                    <div class="container">
                        <div class="row">

                            <?php echo $freelancer_post_search; ?>
                            <div class="col-sm-5 col-md-5 col-xs-12 h2-smladd mob-width">
                                <div class="search-mob-block">
                                    <div class="">
                                        <a href="#search">
                                            <label><i class="fa fa-search" aria-hidden="true"></i></label>
                                        </a>
                                    </div>
                                    <div id="search">
                                        <button type="button" class="close">×</button>
                                        <form action=<?php echo base_url('search/freelancer_post_search') ?> method="get">
                                            <div class="new-search-input">
                                                <input type="text" id="tags1" name="skills" placeholder="Find freelancer" />
                                                <input type="text" id="searchplace1" name="searchplace" placeholder="Find Your Location" />
                                                <button type="submit" onclick="return check()" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class=" ">
                                    <ul class="" id="dropdownclass">
                                        <li <?php if (($this->uri->segment(1) == 'freelancer') && ($this->uri->segment(2) == 'freelancer_apply_post')) { ?> class="active" <?php } ?>><a href="<?php echo base_url('freelancer/freelancer_apply_post'); ?>"><span class="home-22x22-h"></a>
                                        </li>
                                        <li id="Inbox_link">
                                            <?php if ($message_count) { ?>
                                                                  <!--  <span class="badge bg-theme"><?php //echo $message_count;   ?></span> -->
                                            <?php } ?>
                                            <a class="action-button shadow animate" href="#" id="InboxLink" onclick = "return getmsgNotification()"><em class="hidden-xs"> </em> <span class="message3-24x24-h"></span>

                                                <span id="message_count"></span>
                                            </a>

                                            <div id="InboxContainer">
                                                <div id="InboxBody" class="Inbox">
                                                    <div id="notificationTitle">Messages<span class="see_link" id="seemsg"> </span></div>
                                                    <div class="content mCustomScrollbar light notifications" id="notification_main_in" data-mcs-theme="minimal-dark">

                                                        <div>
                                                            <ul class="notification_data_in_h2">

                                                            </ul></div>
                                                    </div>
                                                </div>
                                        </li> 
                                        <!-- Friend Request Start-->

                                        <li>



                                            <div class="dropdown_hover">
                                                <span id="art_profile">Freelancer Profile <i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                                <div class="dropdown-content_hover" id="dropdown-content_hover">
                                                    <span class="my_account">
                                                        <div class="my_S">Account</div>

                                                    </span>
                                                    <a href="<?php echo base_url('freelancer/freelancer_post_profile'); ?>"><span class="icon-view-profile edit_data"></span>
                                                        <span> View Profile </span></a>
                                                    <a href="<?php echo base_url('freelancer/freelancer_post_basic_information'); ?>"><span class="icon-edit-profile edit_data"></span>  
                                                        <span>Edit Profile </span></a>
                                                    <?php
                                                    $userid = $this->session->userdata('aileenuser');
                                                    ?>
                                                    <a onClick="deactivate(<?php echo $userid; ?>)"><span class="icon-delete edit_data"></span>  <span>Deactive Profile</span></a>
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
        $(document).ready(function () {
            $('.dropdown_hover').click(function (event) {
                event.stopPropagation();
                $(".dropdown-content_hover").fadeToggle("fast");
            });
            $(".dropdown-content_hover").on("dropdown_hover", function (event) {
                event.stopPropagation();
            });
        });

        $(document).on("dropdown_hover", function () {
            $(".dropdown-content_hover").hide();
        });

        $(document).ready(function () {
            $("body").click(function (event) {
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

        function deactivate_profile(clicked_id) {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "freelancer/deactivate" ?>',
                data: 'id=' + clicked_id,
                success: function (data) {
                    window.location = "<?php echo base_url() ?>dashboard";

                }
            });
        }
    </script>


    <!-- all popup close close using esc start -->
    <script type="text/javascript">
        $(document).on('keydown', function (e) {
            if (e.keyCode === 27) {
                $("#dropdown-content_hover").hide();
            }
        });
        $(document).on('keydown', function (e) {
            if (e.keyCode === 27) {
                //$( "#bidmodal" ).hide();
                $('#bidmodal').modal('hide');
            }
        });

    </script>
    <!-- all popup close close using esc end -->


    <script type="text/javascript" charset="utf-8">

        function addmsg1(type, msg)
        {
            if (msg == 0)
            {
                $("#message_count").html('');
                $('span#message_count').removeAttr('style');
                $('#InboxLink').removeClass('msg_notification_available');
                document.getElementById('message_count').style.display = "none";
            } else
            {
                $('#message_count').html(msg);
                $('#message_count').css({"background": "#FF4500", "padding": '4px 6px 4px 5.5px', "line-height": '1', "border-radius": ' 100%', "line-height": '9px', "font-size": '10px'});
                $('#InboxLink').addClass('msg_notification_available');
                //     $('#message_count').addClass('count_add');
                //alert("welcome");
            }
        }

        function waitForMsg1()
        {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>notification/select_msg_noti/5",

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

        $(document).ready(function () {
            var segment = '<?php echo "" . $this->uri->segment(1) . "" ?>';
            if (segment != "chat") {
                chatmsg();
            }
            ;
        }); 
        function chatmsg()
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "chat/userajax/4/3" ?>',
                dataType: 'json',
                data: '',
                success: function (data) { //alert(data);

                    $('#userlist').html(data.leftbar);
                    $('.notification_data_in_h2').html(data.headertwo);
                    $('#seemsg').html(data.seeall);
                    setTimeout(
                            chatmsg,
                            1000
                            );
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                }
            });

        }
        ;

        function getmsgNotification() {
            msgNotification();
            msgheader();
        }

        function msgNotification() {
            // first click alert('here'); 
            $.ajax({
                url: "<?php echo base_url(); ?>notification/update_msg_noti/5",
                type: "POST",
                success: function (data) {
                    data = JSON.parse(data);
                }
            });
        }
        function msgheader()
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . "notification/msg_header/" . $this->uri->segment(3) . "" ?>',
                data: 'message_from_profile=4&message_to_profile=3',
                success: function (data) {
                    $('.' + 'notification_data_in_h2').html(data);
                }
            });

        }
    </script>
    <!-- all popup close close using esc end -->