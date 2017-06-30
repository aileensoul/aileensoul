<!DOCTYPE html>
<html lang="en">


<head>
  <title>aileensoul main</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/common-style.css">
  <link rel="stylesheet" href="css/style-main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php echo $head; ?>

<?php echo $header; ?>
    <!-- <header class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h2 class="logo"><a href="#">Aileensoul</a></h2>
                </div> -->
                <!--div class="col-md-8 col-sm-9">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><img src="img/all.png"></a></li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/noty.png"></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/msg.png"></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="user-icone" src="img/user.jpg"> User Name <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </li>
                        </ul>
                </div-->
           <!--  </div>
        </div>
    </header> -->
    <div class="middle-section">
        <div class="container">
            <section class="banner">
                <div class="banner-box">
                    <div class="banner-img" id="row2">
                        <!-- <img src="img/banner1.jpg"> -->

                        
                        <img src="<?php echo base_url($this->config->item('user_bg_main_upload_path'). $userdata[0]['profile_background']); ?>" name="image_src" id="image_src" / >
                        
                    </div>

                        <!-- <a href="#"><img src="img/cam.png"></a> -->
                         <div  id="row1" style="display:none;">
                <div class="col-md-12 text-center">
                    <div id="upload-demo"></div>
                </div>
                <div class="col-md-12 cover-pic" >
                    <button class="btn btn-success  cancel-result" onclick="myFunction()">Cancel</button>

                    <button class="btn btn-success upload-result fr" onclick="myFunction()">Save</button>

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
                    <div id="upload-demo-i"></div>
                </div>
            </div>

                    <div class="upload-camera">

                        <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
                    </div>

                    <div class="left-profile">


                        <div class="profile-photo">


                         <?php
                $image_ori = $userdata[0]['user_image'];
                if ($image_ori) {
                    ?>
                    <img src="<?php echo base_url($this->config->item('user_thumb_upload_path') . $userdata[0]['user_image']); ?>" alt="" >

                <?php } else { ?>

                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="" > 
                   <?php } ?>

                   <a class="upload-profile" href="javascript:void(0);" onclick="updateprofilepopup();">
                       <span class="fa-camera"></span>
                   </a>
                        </div>


                        <div class="profile-detail">
                            <h2><?php echo ucwords($userdata[0]['first_name']); echo ucwords($userdata[0]['last_name']);?></h2>

                            <p>Ahmedabad, Gujarat</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="all-profile">


                <?php if($job[0]['job_step'] != 10){?>
                <div class="box-profile deactive-profile">

                    <div class="profile-box-1 job">
                        <a class="active-profile" href="<?php echo base_url('job'); ?>">
                            <div class="all-img">
                                <img src="img/job.png">
                            </div>
                            <div class="all-discription">
                                <h4>Job Profile</h4>
                                <p>You can get job here.</p>
                            </div>
                        </a>
                    </div>
                    <div class="profile-box-1 box-hover">
                        <div class="hover-content">
                            <p><a href="<?php echo base_url('job'); ?>">How it work</a></p>
                            <p><a href="<?php echo base_url('job'); ?>">Register</a></p>
                        </div>
                    </div>
                </div>

                <?php }else{ ?>


                <div class="box-profile">

                    <div class="profile-box-1 job">
                        <a class="active-profile" href="<?php echo base_url('job'); ?>">
                            <div class="all-img">
                                <img src="img/job.png">
                            </div>
                            <div class="all-discription">
                                <h4>Job Profile</h4>
                                <p>You can get job here.</p>
                            </div>
                        </a>
                    </div>
                    
                </div>

                <?php }?>

                <?php if($recrdata[0]['re_step'] != 3){?>

                <div class="box-profile deactive-profile">
                    <div class="profile-box-1 rec">
                        <a class="active-profile" href="<?php echo base_url('recruiter'); ?>">
                            <div class="all-img">
                                <img src="img/rec.png">
                            </div>
                            <div class="all-discription">
                                <h4>Recruiter Profile</h4>
                                <p>You can get employee over here.</p>
                            </div>
                        </a>
                    </div>
                    <div class="profile-box-1 box-hover">
                        <div class="hover-content">
                            <p><a href="<?php echo base_url('recruiter'); ?>">How it work</a></p>
                            <p><a href="<?php echo base_url('recruiter'); ?>">Register</a></p>
                        </div>
                    </div>
                </div>

                <?php }else{?>

                <div class="box-profile">
                    <div class="profile-box-1 rec">
                        <a class="active-profile" href="<?php echo base_url('recruiter'); ?>">
                            <div class="all-img">
                                <img src="img/rec.png">
                            </div>
                            <div class="all-discription">
                                <h4>Recruiter Profile</h4>
                                <p>You can get employee over here.</p>
                            </div>
                        </a>
                    </div>
                    
                </div>

                <?php }?>

                <div class="box-profile deactive-profile">
                    <div class="profile-box-1 free">
                        <a class="active-profile" href="<?php echo base_url('freelancer'); ?>">
                            <div class="all-img">
                                <img src="img/freelancer.png">
                            </div>
                            <div class="all-discription">
                                <h4>freelancer Profile</h4>
                                <p>You can get freelance work over here.</p>
                            </div>
                        </a>
                    </div>
                    <div class="profile-box-1 box-hover">
                        <div class="hover-content">
                            <p><a href="<?php echo base_url('freelancer'); ?>">How it work</a></p>
                            <p><a href="<?php echo base_url('freelancer'); ?>">Register</a></p>
                        </div>
                    </div>
                </div>


                <?php if($busdata[0]['business_step'] != 4){ ?>

                <div class="box-profile deactive-profile">
                    <div class="profile-box-1 bus">
                        <a class="active-profile" href="<?php echo base_url('business_profile'); ?>">
                            <div class="all-img">
                                <img src="img/business.png">
                            </div>
                            <div class="all-discription">
                                <h4>Business Profile</h4>
                                <p>You can grow your business over here.</p>
                            </div>
                        </a>
                    </div>
                    <div class="profile-box-1 box-hover">
                        <div class="hover-content">
                            <p><a href="<?php echo base_url('business_profile'); ?>">How it work</a></p>
                            <p><a href="<?php echo base_url('business_profile'); ?>">Register</a></p>
                        </div>
                    </div>
                </div>
                <?php }else{?>


                <div class="box-profile">
                    <div class="profile-box-1 bus">
                        <a class="active-profile" href="<?php echo base_url('business_profile'); ?>">
                            <div class="all-img">
                                <img src="img/business.png">
                            </div>
                            <div class="all-discription">
                                <h4>Business Profile</h4>
                                <p>You can grow your business over here.</p>
                            </div>
                        </a>
                    </div>
                </div>

                <?php }?>

                <?php if($artdata[0]['art_step'] != 4){?>
                <div class="box-profile deactive-profile">
                    <div class="profile-box-1 art">
                        <a class="active-profile" href="<?php echo base_url('artistic'); ?>">
                            <div class="all-img">
                                <img src="img/art.png">
                            </div>
                            <div class="all-discription">
                                <h4>artistic Profile</h4>
                                <p>You can get job here.</p>
                            </div>
                        </a>
                    </div>
                    <div class="profile-box-1 box-hover">
                        <div class="hover-content">
                            <p><a href="<?php echo base_url('artistic'); ?>">How it work</a></p>
                            <p><a href="<?php echo base_url('artistic'); ?>">Register</a></p>
                        </div>
                    </div>
                </div>

                <?php }else{?>


                 <div class="box-profile">
                    <div class="profile-box-1 art">
                        <a class="active-profile" href="<?php echo base_url('artistic'); ?>">
                            <div class="all-img">
                                <img src="img/art.png">
                            </div>
                            <div class="all-discription">
                                <h4>artistic Profile</h4>
                                <p>You can get job here.</p>
                            </div>
                        </a>
                    </div>

                </div>



                <?php }?>
                
            </section>
        </div>
    </div>

<!-- Bid-modal-2  -->
<div class="modal fade message-box" id="bidmodal-2" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>         
            <div class="modal-body">
                <span class="mes">
                    <div id="popup-form">
<?php echo form_open_multipart(base_url('dashboard/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
 <div class="popup_previred">
                        <img id="preview" src="#" alt="your image"/>
</div>
                        <!--<input type="hidden" name="hitext" id="hitext" value="3">-->
                        <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
<?php echo form_close(); ?>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Bid-modal-2  -->


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


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    © 2017 | by Aileensoul
                </div>
                <div class="col-md-6 col-sm-8">
                    <ul>
                        <li><a href="<?php echo base_url('about_us'); ?>">About Us</a>|</li>
                        <li><a href="<?php echo base_url('contact_us'); ?>">Contact Us</a>|</li>
                        <li><a href="javascript:void(0);">Blogs</a>|</li>
                        <li><a href="<?php echo base_url('feedback'); ?>">Send Us Feedback</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

<script>
    $( document ).ready(function() {
    
        // hover
        $(function(){
        $(".dropdown").hover(            
                function() {
                    $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                    $(this).toggleClass('open');
                    //$('b', this).toggleClass("caret caret-up");                
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                    $(this).toggleClass('open');
                    //$('b', this).toggleClass("caret caret-up");                
                });
        });

            
            
    
    });
</script>



<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script>
                    function updateprofilepopup(id) {
                        $('#bidmodal-2').modal('show');
                    }
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
        // pallavi code for not supported file type 15/06/2017
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


 <script>
         function picpopup() {           
            $('.biderror .mes').html("<div class='pop_content'>Only Image Type Supported");
            $('#bidmodal').modal('show');
                        }
                    </script>

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
// all popup close close using esc start
    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal-2').modal('hide');
    }
});  

     $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal').modal('hide');
    }
});  
    //all popup close close using esc end
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
                //url: "https://www.aileensoul.com/dashboard/ajaxpro",
                url: "<?php echo base_url() ?>dashboard/ajaxpro",
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

        // pallavi code start for file type support
if (!files[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
    //alert('not an image');
    picpopup();

    document.getElementById('row1').style.display = "none";
    document.getElementById('row2').style.display = "block";
    $("#upload").val('');

    return false;
  }
  // file type code end

        if (size > 10485760)
        {
            //show an alert to the user
            alert("Allowed file size exceeded. (Max. 10 MB)")

            document.getElementById('row1').style.display = "none";
            document.getElementById('row2').style.display = "block";

            // window.location.href = "https://www.aileensoul.com/dashboard"
            //reset file upload control
            return false;
        }

        $.ajax({

            url: "<?php echo base_url(); ?>dashboard/image",
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


</body>
</html>